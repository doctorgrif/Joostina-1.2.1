<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
require_once ($mainframe->getPath('front_html', 'com_content'));
global $gid, $task, $Itemid, $option, $my;
$id = intval(mosGetParam($_REQUEST, 'id', 0));
$sectionid = intval(mosGetParam($_REQUEST, 'sectionid', 0));
$pop = intval(mosGetParam($_REQUEST, 'pop', 0));
$limit = intval(mosGetParam($_REQUEST, 'limit', 0));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));
$year = intval(mosGetParam($_REQUEST, 'year', date('Y')));
$month = intval(mosGetParam($_REQUEST, 'month', date('m')));
$module = intval(mosGetParam($_REQUEST, 'module', 0));
$filter = strval(mosGetParam($_REQUEST, 'filter', ''));
$order = strval(mosGetParam($_REQUEST, 'order', ''));
// Editor usertype check
$access = new stdClass();
$access->canEdit = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'all');
$access->canEditOwn = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'own');
$access->canPublish = $acl->acl_check('action', 'publish', 'users', $my->usertype, 'content', 'all');
// cache activation
$cache = &mosCache::getCache('com_content');
// loads function for frontpage component
if ($option == 'com_frontpage') {
	$cache->call('frontpage', $gid, $access, $pop, 0, $limit, $limitstart);
	return;
}
switch ($task) {
	case 'mycontent':
		showMyItems($access, $limit, $order, $limitstart);
		break;
	case 'findkey':
		findKeyItem($gid, $access, $pop, $option, 0);
		break;
	case 'view':
		if ($mosConfig_enable_stats) {
			showItem($id, $gid, $access, $pop, $option, 0);
		} else {
			$cache->call('showItem', $id, $gid, $access, $pop, $option, 0, $limit, $limitstart);
		}
		break;
	case 'section':
		$cache->call('showSection', $id, $gid, $access, 0);
		break;
	case 'category':
		$selected = strval(mosGetParam($_REQUEST, 'order', ''));
		$selected = preg_replace('/[^a-z]/i', '', $selected);
		$filter = stripslashes(strval(mosGetParam($_REQUEST, 'filter', '')));
		$cache->call('showCategory', $id, $gid, $access, $sectionid, $limit, null, $limitstart, 0, $selected, $filter);
		break;
	case 'blogsection':
// Itemid is a dummy value to cater for caching
		$cache->call('showBlogSection', $id, $gid, $access, $pop, $Itemid, $limit, $limitstart);
		break;
	case 'blogcategorymulti':
	case 'blogcategory':
// Itemid is a dummy value to cater for caching
		$cache->call('showBlogCategory', $id, $gid, $access, $pop, $Itemid, $limit, $limitstart);
		break;
	case 'archivesection':
// Itemid is a dummy value to cater for caching
		$cache->call('showArchiveSection', $id, $gid, $access, $pop, $option, $year, $month, $limit, $limitstart, $Itemid);
		break;
	case 'archivecategory':
// Itemid is a dummy value to cater for caching
		$cache->call('showArchiveCategory', $id, $gid, $access, $pop, $option, $year, $month, $module, $limit, $limitstart, $Itemid);
		break;
	case 'edit':
		editItem($id, $gid, $access, 0, $task, $Itemid);
		break;
	case 'new':
		editItem(0, $gid, $access, $sectionid, $task, $Itemid);
		break;
	case 'save':
	case 'apply':
	case 'apply_new':
		mosCache::cleanCache('com_content');
		saveContent($access, $task);
		break;
	case 'cancel':
		cancelContent($access);
		break;
	case 'emailform':
		emailContentForm($id, $gid);
		break;
	case 'emailsend':
		emailContentSend($id, $gid);
		break;
	case 'vote':
		recordVote();
		break;
	default:
		header('HTTP/1.0 404 Not Found');
		echo _NOT_EXIST;
		break;
}

/**
 * @param int The access level of the user
 * @param int The section id
 * @param int The number of items to dislpay
 * @param int The offset for pagination
 */
function showMyItems(&$access, $limit, $selected, $limitstart) {
	global $database, $mainframe, $Itemid, $my;
// Paramters
	$params = new stdClass();
	if ($Itemid) {
		$menu = new mosMenu($database);
		$menu->load($Itemid);
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosParameters('');
	}
	$params->def('date', 1);
	$params->def('hits', 1);
	$params->def('filter', 1);
	$params->def('title', 1);
	$params->def('section', 1);
	$params->def('order_select', 1);
	$params->def('headings', 1);
	$params->def('navigation', 1);
	$params->def('page_title', 1);
	$params->def('allow_create', 1);
	$params->def('display_num', 50);
	$params->def('display', 1);
	if ($selected) {
		$orderby = $selected;
	} else {
		$orderby = $params->get('orderby', 'rdate');
		$selected = $orderby;
	}
// Ordering control
	$orderby = _orderby_sec($orderby);
// get the total number of published items in the category filter functionality
	$and = '';
	if ($params->get('filter')) {
		$filter = mosGetParam($_POST, 'filter', '');
		if ($filter) {
// clean filter variable
			$filter = strtolower($filter);
			switch ($params->get('filter_type')) {
				case 'title':
					$and = "\n AND LOWER(a.title) LIKE '%$filter%'";
					break;
				case 'hits':
					$and = "\n AND a.hits LIKE '%$filter%'";
					break;
			}
		}
	}
	$pagetitle = '';
	if ($Itemid) {
		$menu = new mosMenu($database);
		$menu->load($Itemid);
		$pagetitle = $menu->name;
	} // if
	$query = "SELECT COUNT(a.id)"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by"
	. "\n LEFT JOIN #__groups AS g ON a.access = g.id"
	. "\n LEFT JOIN #__categories AS c on a.catid = c.id"
	. "\n LEFT JOIN #__sections AS s on s.id = c.section"
	. "\n WHERE a.created_by = $my->id"
	. "\n AND a.state > -1"
	. $and;
	$database->setQuery($query);
	$total = $database->loadResult();
	$limit = $limit ? $limit : $params->get('display_num');
	if ($total <= $limit)
		$limitstart = 0;
	require_once($GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total, $limitstart, $limit);
// get the list of items for this category
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.sectionid, a.checked_out, a.id, a.state AS published, a.title, a.hits, a.created_by, a.created_by_alias, a.created AS created, a.access, u.name AS author, a.state, g.name AS groups,"
	. "\n c.name AS category, s.name AS section"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by"
	. "\n LEFT JOIN #__groups AS g ON a.access = g.id"
	. "\n LEFT JOIN #__categories AS c on a.catid = c.id"
	. "\n LEFT JOIN #__sections AS s on s.id = c.section"
	. "\n WHERE a.created_by = $my->id"
	. "\n AND a.state > -1"
	. $and
	. "\n ORDER BY $orderby"
	. "\n LIMIT $limitstart, $limit"
	;
	$database->setQuery($query);
	$items = $database->loadObjectList();
	$check = 0;
	if ($params->get('date')) {
		$order[] = mosHTML::makeOption('date', _ORDER_DROPDOWN_DA);
		$order[] = mosHTML::makeOption('rdate', _ORDER_DROPDOWN_DD);
		$check .= 1;
	}
	if ($params->get('title')) {
		$order[] = mosHTML::makeOption('alpha', _ORDER_DROPDOWN_TA);
		$order[] = mosHTML::makeOption('ralpha', _ORDER_DROPDOWN_TD);
		$check .= 1;
	}
	if ($params->get('hits')) {
		$order[] = mosHTML::makeOption('hits', _ORDER_DROPDOWN_HA);
		$order[] = mosHTML::makeOption('rhits', _ORDER_DROPDOWN_HD);
		$check .= 1;
	}
	if ($params->get('section')) {
		$order[] = mosHTML::makeOption('section', '������ / ��������� �� �����������');
		$order[] = mosHTML::makeOption('rsection', '������ / ��������� �� ��������');
		$check .= 1;
	}
	$order[] = mosHTML::makeOption('order', _ORDER_DROPDOWN_O);
	$lists['order'] = mosHTML::selectList($order, 'order', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $selected);
	if ($check < 1) {
		$lists['order'] = '';
		$params->set('order_select', 0);
	}
	$lists['task'] = 'category';
	$lists['filter'] = $filter;
	$lists['limit'] = $limit;
	$lists['limitstart'] = $limitstart;
// Dynamic Page Title
	$mainframe->SetPageTitle($pagetitle);
	HTML_content::showMyContentList($items, $access, $params, $pageNav, $lists, $selected);
}

// showCategory
/**
 * Searches for an item by a key parameter
 * @param int The user access level
 * @param object Actions this user can perform
 * @param int
 * @param string The url option
 * @param string A timestamp
 */

function findKeyItem($gid, $access, $pop, $option) {
	global $database;
	$keyref = stripslashes(strval(mosGetParam($_REQUEST, 'keyref', '')));
	$query = "SELECT id"
	. "\n FROM #__content"
	. "\n WHERE attribs LIKE '%keyref=" . $database->getEscaped($keyref, true) . "\n%'";
	$database->setQuery($query);
	$id = $database->loadResult();
	if ($id > 0) {
		showItem($id, $gid, $access, $pop, $option, 0);
	} else {
		echo _KEY_NOT_FOUND;
	}
}

//function frontpage($gid, &$access, $pop, $now, $limit, $limitstart) { //php 5.2
function frontpage($gid, $access, $pop, $now, $limit, $limitstart) { //php 5.3
	global $database, $mainframe, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	$now = _CURRENT_SERVER_TIME;
	$noauth = !$mainframe->getCfg('shownoauth');
// Parameters
	$menu = $mainframe->get('menu');
	$params = new mosParameters($menu->params);
// Ordering control
	$orderby_sec = $params->def('orderby_sec', '');
	$orderby_pri = $params->def('orderby_pri', '');
	$order_sec = _orderby_sec($orderby_sec);
	$order_pri = _orderby_pri($orderby_pri);
// voting control
	$voting = $params->def('rating', '');
	$voting = votingQuery($voting);
	$where = _where(1, $access, $noauth, $gid, 0, $now, null, null, $params);
	$where = (count($where) ? "\n WHERE " . implode("\n AND ", $where) : '');
// Limit & limitstart
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$limit = $intro + $leading + $links;
// query to determine total number of records
	$query = "SELECT COUNT(a.id) FROM #__content AS a INNER JOIN #__content_frontpage AS f ON f.content_id = a.id"
	. "\n INNER JOIN #__categories AS cc ON cc.id = a.catid INNER JOIN #__sections AS s ON s.id = a.sectionid"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by LEFT JOIN #__groups AS g ON a.access = g.id" .
	$where;
	$database->setQuery($query);
	$total = $database->loadResult();
	if ($total <= $limit) {
		$limitstart = 0;
	}
// query records
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.attribs, a.id, a.title, a.title_alias, a.introtext, a.notetext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by," .
	"\n a.checked_out, a.checked_out_time, a.publish_up, a.publish_down, a.images, a.urls, a.ordering, a.metakey, a.metadesc, a.access, a.hits," .
	"\n CHAR_LENGTH(a.fulltext) AS readmore, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups" .
	"\n, s.id AS sec_id, cc.id as cat_id" . $voting['select'] . "\n FROM #__content AS a" .
	"\n INNER JOIN #__content_frontpage AS f ON f.content_id = a.id" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n INNER JOIN #__sections AS s ON s.id = a.sectionid" . "\n LEFT JOIN #__users AS u ON u.id = a.created_by" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $voting['join'] . $where . "\n ORDER BY $order_pri $order_sec";
	$database->setQuery($query, $limitstart, $limit);
	$rows = $database->loadObjectList();
// Dynamic Page Title
//$mainframe->SetPageTitle($menu->name);
// Makes the page title more dynamic, uses the pagetitle parameter instead of the menu name;
	if (trim($params->get('page_name')) != '') {
		$mainframe->SetPageTitle($menu->name, $params);
	} else
	if ($params->get('header') != '') {
		$mainframe->SetPageTitle($params->get('header', 1), $params);
	} else {
		$mainframe->SetPageTitle($menu->name, $params);
	}
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total);
}

//function showSection($id, $gid, &$access, $now) { //php 5.2
function showSection($id, $gid, $access, $now) { //php 5.3
	global $database, $mainframe, $Itemid, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	$section = new mosSection($database);
	$section->load((int) $id);
	/** Check if section is published */
	if (!$section->published) {
		mosNotAuth();
		return;
	}
	/** check whether section access level allows access */
	if ($section->access > $gid) {
		mosNotAuth();
		return;
	}
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
	$noauth = !$mainframe->getCfg('shownoauth');
// Paramters
	$params = new stdClass();
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosEmpty();
	}
	$orderby = $params->get('orderby', '');
	$params->set('type', 'section');
	$params->def('page_title', 1);
	$params->def('pageclass_sfx', '');
	$params->def('description_sec', 1);
	$params->def('description_sec_image', 1);
	$params->def('other_cat_section', 1);
	$params->def('empty_cat_section', 0);
	$params->def('other_cat', 1);
	$params->def('empty_cat', 0);
	$params->def('cat_items', 1);
	$params->def('cat_description', 1);
	$params->def('back_button', $mainframe->getCfg('back_button'));
	$params->def('pageclass_sfx', '');
// param controls whether unpublished items visible to publishers and above
	$params->def('unpublished', 1);
// Ordering control
	$orderby = _orderby_sec($orderby);
// Description & Description Image control
	$params->def('description', $params->get('description_sec'));
	$params->def('description_image', $params->get('description_sec_image'));
	if ($access->canEdit) {
		$xwhere = '';
		if ($params->get('unpublished')) {
// shows unpublished items for publishers and above
			$xwhere2 = "\n AND (b.state >= 0 or b.state is null)";
		} else {
// unpublished items NOT shown for publishers and above
			$xwhere2 = "\n AND (b.state = 1 or b.state is null)";
		}
	} else {
		$xwhere = "\n AND a.published = 1";
		$xwhere2 = "\n AND b.state = 1" . "\n AND (b.publish_up = " . $database->Quote($nullDate) .
				" OR b.publish_up <= " . $database->Quote($now) . ")" . "\n AND (b.publish_down = " .
				$database->Quote($nullDate) . " OR b.publish_down >= " . $database->Quote($now) .
				")";
	}
	$empty = '';
	$empty_sec = '';
	if ($params->get('type') == 'category') {
// show/hide empty categories
		if (!$params->get('empty_cat')) {
			$empty = "\n HAVING numitems > 0";
		}
	}
	if ($params->get('type') == 'section') {
// show/hide empty categories in section
		if (!$params->get('empty_cat_section')) {
			$empty_sec = "\n HAVING numitems > 0";
		}
	}
	$access_check = '';
	$access_check_content = '';
	if ($noauth) {
		$access_check = "\n AND a.access <= " . (int) $gid;
		$access_check_content = "\n AND (b.access <= " . (int) $gid .
				" OR b.access is null)";
	}
// Query of categories within section
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.*, COUNT(b.id) AS numitems" . "\n FROM #__categories AS a" . "\n LEFT JOIN #__content AS b ON b.catid = a.id" .
			$xwhere2 . "\n WHERE a.section = '" . (int) $section->id . "'" . $xwhere . $access_check . $access_check_content .
			"\n GROUP BY a.id" . $empty . $empty_sec . "\n ORDER BY $orderby";
	$database->setQuery($query);
	$categories = $database->loadObjectList();
// If categories exist, the "new content" icon may be displayed
	$categories_exist = false;
	if ($access->canEdit) {
		$query = "SELECT count(*) as numCategories" . "\n FROM #__categories as a" . "\n WHERE a.section = '" . (int)
				$section->id . "'" . $access_check;
		$database->setQuery($query);
		$categories_exist = ($database->loadResult()) > 0;
	}
// remove slashes
	$section->name = stripslashes($section->name);
	$mainframe->SetPageTitle($menu->name, $params);
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	$null = null;
	HTML_content::showContentList($section, $null, $access, $id, $null, $gid, $params, $null, $categories, $null, $null, $categories_exist);
}

/**
 * @param int The category id
 * @param int The group id of the user
 * @param int The access level of the user
 * @param int The section id
 * @param int The number of items to dislpay
 * @param int The offset for pagination
 */
//function showCategory($id, $gid, &$access, $sectionid, $limit, $selected, $limitstart, $now, $selected, $filter) { //php 5.2
function showCategory($id, $gid, $access, $sectionid, $limit, $selected, $limitstart, $now, $selected, $filter) { //php 5.3
	global $database, $mainframe, $Itemid, $mosConfig_list_limit, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	$category = new mosCategory($database);
	$category->load((int) $id);
	/** Check if category is published */
	if (!$category->published) {
		mosNotAuth();
		return;
	}
	/** check whether category access level allows access */
	if ($category->access > $gid) {
		mosNotAuth();
		return;
	}
	$section = new mosSection($database);
	$section->load($category->section);
	/** Check if category is published */
	if (!$section->published) {
		mosNotAuth();
		return;
	}
	/** check whether section access level allows access */
	if ($section->access > $gid) {
		mosNotAuth();
		return;
	}
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
	$noauth = !$mainframe->getCfg('shownoauth');
// Paramters
	$params = new stdClass();
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosParameters('');
	}
	$lists['order_value'] = '';
	if ($selected) {
		$orderby = $selected;
		$lists['order_value'] = $selected;
	} else {
		$orderby = $params->get('orderby', 'rdate');
		$selected = $orderby;
	}
	$params->set('type', 'category');
	$params->def('description_cat', 1);
	$params->def('description_cat_image', 1);
	$params->def('page_title', 1);
	$params->def('title', 1);
	$params->def('hits', $mainframe->getCfg('hits'));
	$params->def('author', !$mainframe->getCfg('hideAuthor'));
	$params->def('date', !$mainframe->getCfg('hideCreateDate'));
	$params->def('date_format', _DATE_FORMAT_LC);
	$params->def('navigation', 2);
	$params->def('display', 1);
	$params->def('display_num', $mosConfig_list_limit);
	$params->def('other_cat', 1);
	$params->def('empty_cat', 0);
	$params->def('cat_items', 1);
	$params->def('cat_description', 0);
	$params->def('back_button', $mainframe->getCfg('back_button'));
	$params->def('pageclass_sfx', '');
	$params->def('headings', 1);
	$params->def('order_select', 1);
	$params->def('filter', 1);
	$params->def('filter_type', 'title');
// param controls whether unpublished items visible to publishers and above
	$params->def('unpublished', 1);
// Ordering control
	$orderby = _orderby_sec($orderby);
// Description & Description Image control
	$params->def('description', $params->get('description_cat'));
	$params->def('description_image', $params->get('description_cat_image'));
	if ($sectionid == 0) {
		$sectionid = $category->section;
	}
	if ($access->canEdit) {
		$xwhere = '';
		if ($params->get('unpublished')) {
// shows unpublished items for publishers and above
			$xwhere2 = "\n AND b.state >= 0";
		} else {
// unpublished items NOT shown for publishers and above
			$xwhere2 = "\n AND b.state = 1";
		}
	} else {
		$xwhere = "\n AND c.published = 1";
		$xwhere2 = "\n AND b.state = 1" . "\n AND (b.publish_up = " . $database->Quote($nullDate) .
				" OR b.publish_up <= " . $database->Quote($now) . ")" . "\n AND (b.publish_down = " .
				$database->Quote($nullDate) . " OR b.publish_down >= " . $database->Quote($now) .
				")";
	}
// show/hide empty categories
	$empty = '';
	if (!$params->get('empty_cat'))
		$empty = "\n HAVING COUNT(b.id) > 0";
// get the list of other categories
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN c.*, COUNT(b.id) AS numitems" . "\n FROM #__categories AS c" . "\n LEFT JOIN #__content AS b ON b.catid = c.id " .
			$xwhere2 . ($noauth ? "\n AND b.access <= " . (int) $gid : '') . "\n WHERE c.section = '" . (int)
			$category->section . "'" . $xwhere . ($noauth ? "\n AND c.access <= " . (int) $gid : '') . "\n GROUP BY c.id" .
			$empty . "\n ORDER BY c.ordering";
	$database->setQuery($query);
	$other_categories = $database->loadObjectList();
// get the total number of published items in the category filter functionality
	$and = null;
	if ($params->get('filter')) {
		if ($filter) {
// clean filter variable
			$filter = strtolower($filter);
			switch ($params->get('filter_type')) {
				case 'title':
					$and = "\n AND LOWER(a.title) LIKE '%" . $database->getEscaped($filter, true) . "%'";
					break;
				case 'author':
					$and = "\n AND ((LOWER(u.name) LIKE '%" . $database->getEscaped($filter, true) .
							"%') OR (LOWER(a.created_by_alias) LIKE '%" . $database->getEscaped($filter, true) .
							"%'))";
					break;
				case 'hits':
					$and = "\n AND a.hits LIKE '%" . $database->getEscaped($filter, true) . "%'";
					break;
			}
		}
	}
	if ($access->canEdit) {
		if ($params->get('unpublished')) {
// shows unpublished items for publishers and above
			$xwhere = "\n AND a.state >= 0";
		} else {
// unpublished items NOT shown for publishers and above
			$xwhere = "\n AND a.state = 1";
		}
	} else {
		$xwhere = "\n AND a.state = 1" . "\n AND (publish_up = " . $database->Quote($nullDate) .
				" OR publish_up <= " . $database->Quote($now) . ")" . "\n AND (publish_down = " . $database->Quote($nullDate) .
				" OR publish_down >= " . $database->Quote($now) . ")";
	}
// query to determine total number of records
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN COUNT(a.id) as numitems" . "\n FROM #__content AS a" . "\n LEFT JOIN #__users AS u ON u.id = a.created_by" .
			"\n LEFT JOIN #__groups AS g ON a.access = g.id" . "\n WHERE a.catid = " . (int) $category->id .
			$xwhere . ($noauth ? "\n AND a.access <= " . (int) $gid : '') . "\n AND " . (int) $category->access .
			" <= " . (int) $gid . $and . "\n ORDER BY $orderby";
	$database->setQuery($query);
	$counter = $database->loadObjectList();
	$total = $counter[0]->numitems;
	$limit = $limit ? $limit : $params->get('display_num');
	if ($total <= $limit) {
		$limitstart = 0;
	}
	require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total, $limitstart, $limit);
// get the list of items for this category
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.id, a.title, a.hits, a.created_by, a.created_by_alias, a.created AS created, a.access, u.name AS author, a.state, g.name AS groups" .
	"\n FROM #__content AS a" . "\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__groups AS g ON a.access = g.id" .
	"\n WHERE a.catid = " . (int) $category->id . $xwhere . ($noauth ? "\n AND a.access <= " .
	(int) $gid : '') . "\n AND " . (int) $category->access . " <= " . (int) $gid . $and . "\n ORDER BY $orderby";
	$database->setQuery($query, $limitstart, $limit);
	$items = $database->loadObjectList();
	$check = 0;
	if ($params->get('date')) {
		$order[] = mosHTML::makeOption('date', _ORDER_DROPDOWN_DA);
		$order[] = mosHTML::makeOption('rdate', _ORDER_DROPDOWN_DD);
		$check .= 1;
	}
	if ($params->get('title')) {
		$order[] = mosHTML::makeOption('alpha', _ORDER_DROPDOWN_TA);
		$order[] = mosHTML::makeOption('ralpha', _ORDER_DROPDOWN_TD);
		$check .= 1;
	}
	if ($params->get('hits')) {
		$order[] = mosHTML::makeOption('hits', _ORDER_DROPDOWN_HA);
		$order[] = mosHTML::makeOption('rhits', _ORDER_DROPDOWN_HD);
		$check .= 1;
	}
	if ($params->get('author')) {
		$order[] = mosHTML::makeOption('author', _ORDER_DROPDOWN_AUA);
		$order[] = mosHTML::makeOption('rauthor', _ORDER_DROPDOWN_AUD);
		$check .= 1;
	}
	$order[] = mosHTML::makeOption('order', _ORDER_DROPDOWN_O);
	$lists['order'] = mosHTML::selectList($order, 'order', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $selected);
	if ($check < 1) {
		$lists['order'] = '';
		$params->set('order_select', 0);
	}
	$lists['task'] = 'category';
	$lists['filter'] = $filter;
// remove slashes
	$category->name = stripslashes($category->name);
// Makes the page title more dynamic, uses the pagetitle parameter instead of the menu name;
	$mainframe->SetPageTitle($menu->name, $params);
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	HTML_content::showContentList($category, $items, $access, $id, $sectionid, $gid, $params, $pageNav, $other_categories, $lists, $selected, true);
}

// showCategory

//function showBlogSection($id = 0, $gid, &$access, $pop, $now = null, $limit, $limitstart) { //php 5.2
function showBlogSection($id = 0, $gid, $access, $pop, $now = null, $limit, $limitstart) { //php 5.3
	global $database, $mainframe, $Itemid, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
// needed for check whether section is published
	$check = ($id ? $id : 0);
	$now = _CURRENT_SERVER_TIME;
	$noauth = !$mainframe->getCfg('shownoauth');
// Parameters
	$params = new stdClass();
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosParameters('');
	}
// new blog multiple section handling
	if (!$id) {
		$id = $params->def('sectionid', 0);
	}
	$where = _where(1, $access, $noauth, $gid, $id, $now, null, null, $params);
	$where = (count($where) ? "\n WHERE " . implode("\n AND ", $where) : '');
// Ordering control
	$orderby_sec = $params->def('orderby_sec', 'rdate');
	$orderby_pri = $params->def('orderby_pri', '');
	$order_sec = _orderby_sec($orderby_sec);
	$order_pri = _orderby_pri($orderby_pri);
// voting control
	$voting = $params->def('rating', '');
	$voting = votingQuery($voting);
// Limit & limitstart
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$limit = $limit ? $limit : ($intro + $leading + $links);
// query to determine total number of records
	$query = "SELECT COUNT(a.id)" . "\n FROM #__content AS a INNER JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by LEFT JOIN #__sections AS s ON a.sectionid = s.id"
	. "\n LEFT JOIN #__groups AS g ON a.access = g.id" . $where;
	$database->setQuery($query);
	$total = $database->loadResult();
	if ($total <= $limit) {
		$limitstart = 0;
	}
// Main data query
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.id, a.attribs , a.title, a.title_alias, a.introtext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by," .
	"\n a.checked_out, a.checked_out_time, a.publish_up, a.publish_down, a.images, a.urls, a.ordering, a.metakey, a.metadesc, a.access,"
	. "\n CHAR_LENGTH(a.fulltext) AS readmore, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups"
	. $voting['select'] . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id"
	. "\n LEFT JOIN #__groups AS g ON a.access = g.id" . $voting['join'] . $where . "\n ORDER BY $order_pri $order_sec";
	$database->setQuery($query, $limitstart, $limit);
	$rows = $database->loadObjectList();
// Dynamic Page Title
	if ($menu) {
		if (trim($params->get('page_name'))) {
			$mainframe->SetPageTitle($menu->name, $params);
		} else
		if ($params->get('header') != '') {
			$mainframe->SetPageTitle($params->get('header', 1), $params);
		} else {
			$mainframe->SetPageTitle($menu->name, $params);
		}
	}
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
// check whether section is published
	if (!count($rows) && $check) {
		$secCheck = new mosSection($database);
		$secCheck->load((int) $check);
		/** check whether section is published */
		if (!$secCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether section access level allows access */
		if ($secCheck->access > $gid) {
			mosNotAuth();
			return;
		}
	}
	BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total);
}

//function showBlogCategory($id = 0, $gid, &$access, $pop, $now, $limit, $limitstart) { //php 5.2
function showBlogCategory($id = 0, $gid, $access, $pop, $now, $limit, $limitstart) { //php 5.3
	global $database, $mainframe, $Itemid, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	$now = _CURRENT_SERVER_TIME;
	$noauth = !$mainframe->getCfg('shownoauth');
// needed for check whether section & category is published
	$check = ($id ? $id : 0);
// Paramters
	$params = new stdClass();
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosParameters('');
	}
// new blog multiple section handling
	if (!$id) {
		$id = $params->def('categoryid', 0);
	}
	$where = _where(2, $access, $noauth, $gid, $id, $now, null, null, $params);
	$where = (count($where) ? "\n WHERE " . implode("\n AND ", $where) : '');
// Ordering control
	$orderby_sec = $params->def('orderby_sec', 'rdate');
	$orderby_pri = $params->def('orderby_pri', '');
	$order_sec = _orderby_sec($orderby_sec);
	$order_pri = _orderby_pri($orderby_pri);
// voting control
	$voting = $params->def('rating', '');
	$voting = votingQuery($voting);
// Limit & limitstart
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$limit = $limit ? $limit : ($intro + $leading + $links);
// query to determine total number of records
	$query = "SELECT COUNT(a.id)" . "\n FROM #__content AS a" . "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $where;
	$database->setQuery($query);
	$total = $database->loadResult();
	if ($total <= $limit) {
		$limitstart = 0;
	}
// Main data query
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.id, a.notetext,a.attribs, a.title, a.title_alias, a.introtext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by," .
	"\n a.checked_out, a.checked_out_time, a.publish_up, a.publish_down, a.images, a.urls, a.ordering, a.metakey, a.metadesc, a.access," .
	"\n CHAR_LENGTH(a.fulltext) AS readmore, s.published AS sec_pub,cc.published AS sec_pub, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups" .
	$voting['select'] . "\n FROM #__content AS a" . "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $voting['join'] . $where . "\n ORDER BY $order_pri $order_sec";
	$database->setQuery($query, $limitstart, $limit);
	$rows = $database->loadObjectList();
// check whether section & category is published
	if (!count($rows) && $check) {
		$catCheck = new mosCategory($database);
		$catCheck->load((int) $check);
		/** check whether category is published */
		if (!$catCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if ($catCheck->access > $gid) {
			mosNotAuth();
			return;
		}
		$secCheck = new mosSection($database);
		$secCheck->load($catCheck->section);
		/** check whether section is published */
		if (!$secCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if ($secCheck->access > $gid) {
			mosNotAuth();
			return;
		}
	}
	if ($params->get('header') == "") {
		$mainframe->SetPageTitle($menu->name, $params);
	} else {
		$mainframe->SetPageTitle($params->get('header'));
	}
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total);
}

//function showArchiveSection($id = null, $gid, &$access, $pop, $option, $year, $month, $limit, $limitstart) { //php 5.2
function showArchiveSection($id = null, $gid, $access, $pop, $option, $year, $month, $limit, $limitstart) { //php 5.3
	global $database, $mainframe, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	global $Itemid;
	$secID = ($id ? $id : 0);
	$noauth = !$mainframe->getCfg('shownoauth');
	$params = new stdClass();
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = "";
		$params = new mosParameters('');
	}
	$params->set('intro_only', 1);
	$params->set('year', $year);
	$params->set('month', $month);
// Ordering control
	$orderby_sec = $params->def('orderby_sec', 'rdate');
	$orderby_pri = $params->def('orderby_pri', '');
	$order_sec = _orderby_sec($orderby_sec);
	$order_pri = _orderby_pri($orderby_pri);
// used in query
	$where = _where(-1, $access, $noauth, $gid, $id, null, $year, $month);
	$where = (count($where) ? "\n WHERE " . implode("\n AND ", $where) : '');
// checks to see if 'All Sections' options used
	if ($id == 0) {
		$check = '';
	} else {
		$check = "\n AND a.sectionid = " . (int) $id;
	}
// query to determine if there are any archived entries for the section
	$query = "SELECT a.id" . "\n FROM #__content as a" . "\n WHERE a.state = -1" . $check;
	$database->setQuery($query);
	$items = $database->loadObjectList();
	$archives = count($items);
// voting control
	$voting = $params->def('rating', '');
	$voting = votingQuery($voting);
// Limit & limitstart
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$limit = $limit ? $limit : ($intro + $leading + $links);
// query to determine total number of records
	$query = "SELECT COUNT(a.id)" . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $where;
	$database->setQuery($query);
	$total = $database->loadResult();
	if ($total <= $limit) {
		$limitstart = 0;
	}
// Main Query
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.id, a.title, a.title_alias, a.introtext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by," .
	"\n a.checked_out, a.checked_out_time, a.publish_up, a.publish_down, a.images, a.urls, a.ordering, a.metakey, a.metadesc, a.access," .
	"\n CHAR_LENGTH(a.fulltext) AS readmore, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups" .
	$voting['select'] . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $voting['join'] . $where . "\n ORDER BY $order_pri $order_sec";
	$database->setQuery($query, $limitstart, $limit);
	$rows = $database->loadObjectList();
// check whether section is published
	if (!count($rows) && $secID != 0) {
		$secCheck = new mosSection($database);
		$secCheck->load((int) $secID);
		/** check whether section is published */
		if (!$secCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether section access level allows access */
		if ($secCheck->access > $gid) {
			mosNotAuth();
			return;
		}
	}
// initiate form
	$link = 'index.php?option=com_content&amp;task=archivesection&amp;id=' . $id . '&amp;Itemid=' . $Itemid;
	echo '<form action="' . sefRelToAbs($link) . '" method="post">';
// Dynamic Page Title
	if ($params->get('header') == "") {
		$mainframe->SetPageTitle($menu->name, $params);
	} else {
		$mainframe->SetPageTitle($params->get('header'));
	}
# Joomlatwork: change into the dynamic robots metatag
# Remark: Primairly the settings of blogsection, second the global settings ..
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	if (!$archives) {
// if no archives for category, hides search and outputs empty message
		echo '<div>' . _CATEGORY_ARCHIVE_EMPTY . '</div>';
	} else {
		BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total, 1, 1);
	}
	echo '<input type="hidden" name="id" value="' . $id . '" />';
	echo '<input type="hidden" name="Itemid" value="' . $Itemid . '" />';
	echo '<input type="hidden" name="task" value="archivesection" />';
	echo '<input type="hidden" name="option" value="com_content" />';
	echo '</form>';
}

//function showArchiveCategory($id = 0, $gid, &$access, $pop, $option, $year, $month, $module, $limit, $limitstart) { //php 5.2
function showArchiveCategory($id = 0, $gid, $access, $pop, $option, $year, $month, $module, $limit, $limitstart) { //php 5.3
	global $database, $mainframe, $mosConfig_MetaDesc, $mosConfig_MetaKeys;
	global $Itemid;
	$noauth = !$mainframe->getCfg('shownoauth');
// needed for check whether section & category is published
	$catID = ($id ? $id : 0);
// used by archive module
	if ($module) {
		$check = '';
	} else {
		$check = "\n AND a.catid = " . (int) $id;
	}
	if ($Itemid) {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	} else {
		$menu = '';
		$params = new mosParameters('');
	}
	$params->set('year', $year);
	$params->set('month', $month);
// Ordering control
	$orderby_sec = $params->def('orderby', 'rdate');
	$order_sec = _orderby_sec($orderby_sec);
// used in query
	$where = _where(-2, $access, $noauth, $gid, $id, null, $year, $month);
	$where = (count($where) ? "\n WHERE " . implode("\n AND ", $where) : '');
// ��������� ����� �������� ��������. �������������� �� ������: smart (http://joomlaforum.ru/index.php/topic,20369.msg119792.html#msg119792)
	$query = "SELECT COUNT(a.id)" . "\n FROM #__content as a" . "\n WHERE a.state = -1" .
			$check;
	$database->setQuery($query);
	$archives = $database->loadResult();
// voting control
	$voting = $params->def('rating', '');
	$voting = votingQuery($voting);
// Limit & limitstart
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$limit = $limit ? $limit : ($intro + $leading + $links);
// query to determine total number of records
	$query = "SELECT COUNT(a.id)" . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $where;
	$database->setQuery($query);
	$total = $database->loadResult();
	if ($total <= $limit) {
		$limitstart = 0;
	}
// main query
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN a.id, a.title, a.title_alias, a.introtext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by," .
	"\n a.checked_out, a.checked_out_time, a.publish_up, a.publish_down, a.images, a.urls, a.ordering, a.metakey, a.metadesc, a.access," .
	"\n CHAR_LENGTH(a.fulltext) AS readmore, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups" .
	$voting['select'] . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS cc ON cc.id = a.catid" .
	"\n LEFT JOIN #__users AS u ON u.id = a.created_by" . "\n LEFT JOIN #__sections AS s ON a.sectionid = s.id" .
	"\n LEFT JOIN #__groups AS g ON a.access = g.id" . $voting['join'] . $where . "\n ORDER BY $order_sec";
	$database->setQuery($query, $limitstart, $limit);
	$rows = $database->loadObjectList();
// check whether section & category is published
	if (!count($rows) && $catID != 0) {
		$catCheck = new mosCategory($database);
		$catCheck->load((int) $catID);
		/** check whether category is published */
		if (!$catCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if ($catCheck->access > $gid) {
			mosNotAuth();
			return;
		}
		$secCheck = new mosSection($database);
		$secCheck->load($catCheck->section);
		/** check whether section is published */
		if (!$secCheck->published) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if ($secCheck->access > $gid) {
			mosNotAuth();
			return;
		}
	}
// initiate form
	$link = ampReplace('index.php?option=com_content&amp;task=archivecategory&amp;id=' . $id . '&Itemid=' . $Itemid);
	echo '<form action="' . sefRelToAbs($link) . '" method="post" class="form">';
// Dynamic Page Title
	if ($params->get('header') == "") {
		$mainframe->SetPageTitle($menu->name, $params);
	} else {
		$mainframe->SetPageTitle($params->get('header'), $params);
	}
# Joomlatwork: change into the dynamic robots metatag
# Remark: Primairly the settings of blogsection, second the global settings ..
	set_robot_metatag($params->get('robots'));
	if ($params->get('meta_description') != "") {
		$mainframe->addMetaTag('description', $params->get('meta_description'));
	} else {
		$mainframe->addMetaTag('description', $mosConfig_MetaDesc);
	}
	if ($params->get('meta_keywords') != "") {
		$mainframe->addMetaTag('keywords', $params->get('meta_keywords'));
	} else {
		$mainframe->addMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($params->get('meta_author') != "") {
		$mainframe->addMetaTag('author', $params->get('meta_author'));
	}
	if (!$archives) {
// if no archives for category, hides search and outputs empty message
		echo '<div>' . _CATEGORY_ARCHIVE_EMPTY . '</div>';
	} else {
// if coming from the Archive Module, the Archive Dropdown selector is not shown
		if ($id) {
			BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total, 1, 1);
		} else {
			BlogOutput($rows, $params, $gid, $access, $pop, $menu, $limitstart, $limit, $total, 0, 1);
		}
	}
	echo '<input type="hidden" name="id" value="' . $id . '" />';
	echo '<input type="hidden" name="Itemid" value="' . $Itemid . '" />';
	echo '<input type="hidden" name="task" value="archivecategory" />';
	echo '<input type="hidden" name="option" value="com_content" />';
	echo '</form>';
}

function BlogOutput(&$rows, &$params, $gid, &$access, $pop, &$menu, $limitstart, $limit, $total, $archive = null, $archive_page = null) {
	global $mainframe, $Itemid, $task, $id, $option, $database, $mosConfig_live_site;
// parameters
	if ($params->get('page_title', 1) && $menu) {
		$header = $params->def('header', $menu->name);
	} else {
		$header = '';
	}
	$columns = $params->def('columns', 2);
	if ($columns == 0) {
		$columns = 1;
	}
	$intro = $params->def('intro', 4);
	$leading = $params->def('leading', 1);
	$links = $params->def('link', 4);
	$pagination = $params->def('pagination', 2);
	$pagination_results = $params->def('pagination_results', 1);
	$pagination_results = $params->def('pagination_results', 1);
	$descrip = $params->def('description', 1);
	$descrip_image = $params->def('description_image', 1);
// needed for back button for page
	$back = $params->get('back_button', $mainframe->getCfg('back_button'));
// needed to disable back button for item
	$params->set('back_button', 0);
	$params->def('pageclass_sfx', '');
	$params->set('intro_only', 1);
	$i = 0;
// used to display section/catagory description text and images currently not supported in Archives
	if ($menu && $menu->componentid && ($descrip || $descrip_image)) {
		switch ($menu->type) {
			case 'content_blog_section':
				$description = new mosSection($database);
				$description->load((int) $menu->componentid);
				break;
			case 'content_blog_category':
				$description = new mosCategory($database);
				$description->load((int) $menu->componentid);
				break;
			default:
				$menu->componentid = 0;
				break;
		}
	}
// Page Output
// page header
	if ($header) {
		echo '<div class="componentheading' . $params->get('pageclass_sfx') . '">' . $header . '</div>';
	}
	if ($archive) {
		echo '<div>';
		echo mosHTML::monthSelectList('month', 'size="1" class="inputbox"', $params->get('month'));
		echo mosHTML::integerSelectList(2000, 2010, 1, 'year', 'size="1" class="inputbox"', $params->get('year'), "%04d");
		echo '<input type="submit" class="button" value="' . _SUBMIT_BUTTON . '" />';
		echo '</div>';
	}
// checks to see if there are there any items to display
	if ($total) {
		$col_with = 100 / $columns; // width of each column
		//$width = 'width="' . intval($col_with) . '%"';
		$width = 'class="col_'.intval($col_with).'"';
		if ($archive) {
// Search Success message
			$msg = sprintf(_ARCHIVE_SEARCH_SUCCESS, $params->get('month'), $params->get('year'));
			echo '<div>' . $msg . '</div>';
		}
		echo '<table class="blog">'; // test div start
// Secrion/Category Description & Image
		if ($menu && $menu->componentid && ($descrip || $descrip_image)) {
			$link = $mosConfig_live_site . '/images/stories/' . $description->image;
			echo '<tr>';
			echo '<td class="contentdescription">';
			if ($descrip_image && $description->image) {
				echo '<img src="' . $link . '" style="float:' . $description->image_position . ';" alt="' . $header . '" />';
			}
			if ($descrip && $description->description) {
				echo $description->description;
			}
			echo '</td>';
			echo '</tr>';
		}
// Leading story output
		if ($leading) {
			echo '<tr>';
			echo '<td>';
			for ($z = 0; $z < $leading; $z++) {
				if ($i >= ($total - $limitstart)) {
// stops loop if total number of items is less than the number set to display as leading
					break;
				}
				echo '<div>';
				show($rows[$i], $params, $gid, $access, $pop);
				echo '</div>';
				++$i;
			}
			echo '</td>';
			echo '</tr>';
		}
		if ($intro && ($i < $total)) {
			echo '<tr>';
			echo '<td>';
			echo '<div class="col_100">';
// intro story output
			for ($z = 0; $z < $intro; $z++) {
				if ($i >= ($total - $limitstart)) {
// stops loop if total number of items is less than the number set to display as intro + leading
					break;
				}
				//if (!($z % $columns) || $columns == 1) {
				//	echo '<div>';
				//}
				echo '<div ' . $width . '>';
// outputs either intro or only a link
				if ($z < $intro) {
					show($rows[$i], $params, $gid, $access, $pop);
				} else {
					echo '</div>';
					echo '<div class="clearfix"></div>';
					//echo '</div>';
					break;
				}
				echo '</div>';
				++$i;
// this is required to output a closing </tr> tag if one of the 3 conditions are met
// 1. No of intro story output = number of columns
// 2. Total number of items is reached before the number set to display
// 3. Reached the last item but it does not fully fill the last row of output - a blank column is left
				//if (!(($z + 1) % $columns) || $columns == 1) {
				//	echo '</div>';
				//} else
				//if ($i >= $total) {
					echo '</div>';
				//} else
				//if ((($z + 1) == $intro) && ($intro % $columns)) {
				//	echo '</div>';
				//}
			}
			echo '</div>';
			echo '</td>';
			echo '</tr>';
		}
// Links output
		if ($links && ($i < $total - $limitstart)) {
			$showmore = $leading + $intro;
			echo '<tr>';
			echo '<td>';
			echo '<div class="blog_more">';
			HTML_content::showLinks($rows, $links, $total, $i, $showmore);
			echo '</div>';
			echo '</td>';
			echo '</tr>';
		}
// Pagination output
		if ($pagination) {
			if (($pagination == 2) && ($total <= $limit)) {
// not visible when they is no 'other' pages to display
			} else {
				require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php');
// get the total number of records
				$limitstart = $limitstart ? $limitstart : 0;
				$pageNav = new mosPageNav($total, $limitstart, $limit);
				if ($Itemid && $Itemid != 99999999) {
// where Itemid value is returned, do not add Itemid to url
					$Itemid_link = '&amp;Itemid=' . $Itemid;
				} else {
// where Itemid value is NOT returned, do not add Itemid to url
					$Itemid_link = '';
				}
				if ($option == 'com_frontpage') {
					$link = 'index.php?option=com_frontpage' . $Itemid_link;
				} else
				if ($archive_page) {
					$year = $params->get('year');
					$month = $params->get('month');

					if (!$archive) {
// used when access via archive module
						$pid = '&amp;id=0';
						$module = '&amp;module=1';
					} else {
// used when access via menu item
						$pid = '&amp;id=' . $id;
						$module = '';
					}
					$link = 'index.php?option=com_content&amp;task=' . $task . $pid . $Itemid_link . '&amp;year=' . $year . '&amp;month=' . $month . $module;
				} else {
					$link = 'index.php?option=com_content&amp;task=' . $task . '&amp;id=' . $id . $Itemid_link;
				}
				echo '<tr>';
				echo '<td>';
				echo $pageNav->writePagesLinks($link);
				echo '</td>';
				echo '</tr>';
				if ($pagination_results) {
					echo '<tr>';
					echo '<td>';
					echo $pageNav->writePagesCounter();
					echo '</td>';
					echo '</tr>';
				}
			}
		}
		echo '</table>'; // test div stop
		echo '<div class="clearfix"></div>';
	} else
	if ($archive && !$total) {
// Search Failure message for Archives
		$msg = sprintf(_ARCHIVE_SEARCH_FAILURE, $params->get('month'), $params->get('year'));
		echo '<div>' . $msg . '</div>';
	} else {
// Generic blog empty display
		echo _EMPTY_BLOG;
	}
// Back Button
	$params->set('back_button', $back);
	mosHTML::BackButton($params);
}

//function showItem($uid, $gid, &$access, $pop) { //php 5.2
function showItem($uid, $gid, $access, $pop) { //php 5.3
	global $database, $mainframe, $mosConfig_disable_date_state, $mosConfig_disable_access_control;
	global $mosConfig_MetaTitle, $mosConfig_MetaAuthor;
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
	if ($access->canEdit) {
		$xwhere = '';
	} else {
		$xwhere = "\n AND (a.state = 1 OR a.state = -1)";
		if (!$mosConfig_disable_date_state) {
			$xwhere .= "\n AND (a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")";
			$xwhere .= "\n AND (a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")";
		}
		;
	}
	if (!$mosConfig_disable_access_control)
		$where_ac = "\n AND a.access <= " . (int) $gid;
	else
		$where_ac = '';
// main query
	$query = "SELECT a.*, u.name AS author, u.usertype, s.name AS section, cc.name AS category, g.name AS groups, s.published AS sec_pub, cc.published AS cat_pub, s.access AS sec_access, cc.access AS cat_access, s.id AS sec_id, cc.id as cat_id"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = cc.section AND s.scope = 'content'"
	. "\n LEFT JOIN #__users AS u ON u.id = a.created_by"
	. "\n LEFT JOIN #__groups AS g ON a.access = g.id"
	. "\n WHERE a.id = " . (int) $uid . $xwhere .
	$where_ac;
	$database->setQuery($query);
	$row = null;
	if ($database->loadObject($row)) {
		/** check whether category is published */
		if (!$row->cat_pub && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section is published */
		if (!$row->sec_pub && $row->sectionid) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if (($row->cat_access > $gid) && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section access level allows access */
		if (($row->sec_access > $gid) && $row->sectionid) {
			mosNotAuth();
			return;
		}
		$params = new mosParameters($row->attribs);
		$params->set('intro_only', 0);
		$params->def('back_button', $mainframe->getCfg('back_button'));
		if ($row->sectionid == 0) {
			$params->set('item_navigation', 0);
		} else {
			$params->set('item_navigation', $mainframe->getCfg('item_navigation'));
		}
// loads the links for Next & Previous Button
		if ($params->get('item_navigation')) {
// Paramters for menu item as determined by controlling Itemid
			$menu = $mainframe->get('menu');
			$mparams = new mosParameters($menu->params);
// the following is needed as different menu items types utilise a different param to control ordering
// for Blogs the `orderby_sec` param is the order controlling param
// for Table and List views it is the `orderby` param
			$mparams_list = $mparams->toArray();
			if (array_key_exists('orderby_sec', $mparams_list)) {
				$order_method = $mparams->get('orderby_sec', '');
			} else {
				$order_method = $mparams->get('orderby', '');
			}
// additional check for invalid sort ordering
			if ($order_method == 'front') {
				$order_method = '';
			}
//����������, ��������� �������� � ������� ���������� �� ��������� start
			else {
				$order_method = 'ordering';
			}
//����������, ��������� �������� � ������� ���������� �� ��������� end
			$orderby = _orderby_sec($order_method);
			$where_ac = (!$mosConfig_disable_access_control ? '' : "\n AND a.access <= " . (int) $gid);
			$uname = '';
			$ufrom = '';
			if ($order_method == 'author' OR $order_method == 'rauthor') {
				$uname = ', u.name ';
				$ufrom = ', #__users AS u ';
			}
// array of content items in same category correctly ordered
/* add STRAIGHT_JOIN */
			$query = "SELECT STRAIGHT_JOIN a.id, a.title $uname FROM #__content AS a $ufrom"
			. "\n WHERE a.catid = " . (int) $row->catid
			. "\n AND a.state = " . (int) $row->state . ($access->canEdit ? '' : $where_ac) . $xwhere
			. "\n ORDER BY $orderby";
			$database->setQuery($query);
			$list = $database->loadObjectList();
// this check needed if incorrect Itemid is given resulting in an incorrect result
//��� ������� �� ����, ���� ���� ���� ��������� ������ - loadObjectList
//if(!is_array($list)) {
//$list = array();
//}
// location of current content item in array list
			$prev = null;
			$current = array_shift($list);
			$next = array_shift($list);
			while ($current->id != $uid) {
				$prev = $current;
				$current = $next;
				$next = array_shift($list);
			}
			$row->prev = '';
			$row->next = '';
			if (!empty($prev)) {
				$row->prev = $prev->id;
				$row->prev_title = $prev->title;
			}
			if (!empty($next)) {
				$row->next = $next->id;
				$row->next_title = $next->title;
			}
			unset($list);
		}
		show($row, $params, $gid, $access, $pop);
// page title
		$mainframe->setPageTitle($row->title, $params);
		if ($mosConfig_MetaTitle == '1') {
			$mainframe->addMetaTag('title', $row->title);
		}
		if ($mosConfig_MetaAuthor == '1') {
			if ($row->created_by_alias != "") {
				$mainframe->addMetaTag('author', $row->created_by_alias);
			} else {
				$mainframe->addMetaTag('author', $row->author);
			}
		}
		if ($params->get('robots') == 0) {
			$mainframe->addMetaTag('robots', 'index, follow');
		}
		if ($params->get('robots') == 1) {
			$mainframe->addMetaTag('robots', 'index, nofollow');
		}
		if ($params->get('robots') == 2) {
			$mainframe->addMetaTag('robots', 'noindex, follow');
		}
		if ($params->get('robots') == 3) {
			$mainframe->addMetaTag('robots', 'noindex, nofollow');
		}
	} else {
		mosNotAuth();
		return;
	}
}

//function show($row, $params, $gid, &$access, $pop) { //php 5.2
function show($row, $params, $gid, $access, $pop) { //php 5.3
	global $database, $mainframe, $mosConfig_content_hits;
	global $cache;
	$noauth = !$mainframe->getCfg('shownoauth');
	if ($access->canEdit) {
		if ($row->id === null || $row->access > $gid) {
			mosNotAuth();
			return;
		}
	} else {
		if ($row->id === null || $row->state == 0) {
			mosNotAuth();
			return;
		}
		if ($row->access > $gid) {
			if ($noauth) {
				mosNotAuth();
				return;
			} else {
				if (!($params->get('intro_only'))) {
					mosNotAuth();
					return;
				}
			}
		}
	}
// GC Parameters
	$params->def('link_titles', $mainframe->getCfg('link_titles'));
	$params->def('author', !$mainframe->getCfg('hideAuthor'));
	$params->def('createdate', !$mainframe->getCfg('hideCreateDate'));
	$params->def('modifydate', !$mainframe->getCfg('hideModifyDate'));
	$params->def('print', !$mainframe->getCfg('hidePrint'));
	$params->def('pdf', !$mainframe->getCfg('hidePdf'));
	$params->def('email', !$mainframe->getCfg('hideEmail'));
	$params->def('rating', $mainframe->getCfg('vote'));
	$params->def('icons', $mainframe->getCfg('icons'));
	$params->def('readmore', $mainframe->getCfg('readmore'));
// Other Params
	$params->def('image', 1);
	$params->def('section', 0);
	$params->def('section_link', 0);
	$params->def('category', 0);
	$params->def('category_link', 0);
	$params->def('introtext', $params->get('introtext', 1));
//$params->def('introtext',1);
	$params->def('pageclass_sfx', '');
	$params->def('item_title', 1);
	$params->def('url', 1);
// if a popup item (e.g. print page) set popup param to correct value
	if ($pop) {
		$params->set('popup', 1);
	}
// check if voting/rating enabled
	if ($params->get('rating')) {
		$row->rating = null;
		$row->rating_count = null;
		global $voteLoad, $task;
		if (!isset($voteLoad)) {
			$query = "SELECT ROUND(rating_sum/rating_count) AS rating, rating_count, content_id FROM #__content_rating";
			$task == 'view' ? $query .= "\n WHERE content_id=$row->id" : '';
			$database->setQuery($query);
			$Allvote = $database->loadObjectList();
			$voteLoad = array();
			foreach ($Allvote as $vote) {
				$voteLoad[$vote->content_id]['rating'] = $vote->rating;
				$voteLoad[$vote->content_id]['rating_count'] = $vote->rating_count;
			}
		}
		;
		if (isset($voteLoad[$row->id])) {
			$row->rating = $voteLoad[$row->id]['rating'];
			$row->rating_count = $voteLoad[$row->id]['rating_count'];
		}
	}
	$row->category = htmlspecialchars(stripslashes($row->category), ENT_QUOTES);
	if ($params->get('section_link') || $params->get('category_link')) {
// loads the link for Section name
		if ($params->get('section_link') && $row->sectionid) {
// pull values from mainframe
			$secLinkID = $mainframe->get('secID_' . $row->sectionid, -1);
			$secLinkURL = $mainframe->get('secURL_' . $row->sectionid);
// check if values have already been placed into mainframe memory
			if ($secLinkID == -1) {
			/* add STRAIGHT_JOIN */
				$query = "SELECT STRAIGHT_JOIN id, link"
				. "\n FROM #__menu"
				. "\n WHERE published = 1"
				. "\n AND type IN ('content_section', 'content_blog_section')"
				. "\n AND componentid = " . (int) $row->sectionid
				. "\n ORDER BY type ordering, DESC";
				$database->setQuery($query);
//$secLinkID = $database->loadResult();
				$result = $database->loadRow();
				$secLinkID = $result[0];
				$secLinkURL = $result[1];
				if ($secLinkID == null) {
					$secLinkID = 0;
// save 0 query result to mainframe
					$mainframe->set('secID_' . $row->sectionid, 0);
				} else {
// save query result to mainframe
					$mainframe->set('secID_' . $row->sectionid, $secLinkID);
					$mainframe->set('secURL_' . $row->sectionid, $secLinkURL);
				}
			}
			$_Itemid = '';
// use Itemid for section found in query
			if ($secLinkID != -1 && $secLinkID) {
				$_Itemid = '&amp;Itemid=' . $secLinkID;
			}
			if ($secLinkURL) {
				$secLinkURL = ampReplace($secLinkURL);
				$link = sefRelToAbs($secLinkURL . $_Itemid);
			} else {
				$link = sefRelToAbs('index.php?option=com_content&amp;task=section&amp;id=' . $row->sectionid . $_Itemid);
			}
			$row->section = '<a href="' . $link . '" title="' . $row->section . '">' . $row->section . '</a>';
		}
// loads the link for Category name
		if ($params->get('category_link') && $row->catid) {
// pull values from mainframe
			$catLinkID = $mainframe->get('catID_' . $row->catid, -1);
			$catLinkURL = $mainframe->get('catURL_' . $row->catid);
// check if values have already been placed into mainframe memory
			if ($catLinkID == -1) {
			/* add STRAIGHT_JOIN */
				$query = "SELECT STRAIGHT_JOIN id, link"
				. "\n FROM #__menu"
				. "\n WHERE published = 1"
				. "\n AND type IN ('content_category', 'content_blog_category')"
				. "\n AND componentid = " . (int) $row->catid
				. "\n ORDER BY type ordering, DESC";
				$database->setQuery($query);
//$catLinkID = $database->loadResult();
				$result = $database->loadRow();
				$catLinkID = $result[0];
				$catLinkURL = $result[1];
				if ($catLinkID == null) {
					$catLinkID = 0;
// save 0 query result to mainframe
					$mainframe->set('catID_' . $row->catid, 0);
				} else {
// save query result to mainframe
					$mainframe->set('catID_' . $row->catid, $catLinkID);
					$mainframe->set('catURL_' . $row->catid, $catLinkURL);
				}
			}
			$_Itemid = '';
// use Itemid for category found in query
			if ($catLinkID != -1 && $catLinkID) {
				$_Itemid = '&amp;Itemid=' . $catLinkID;
			} else
			if (isset($secLinkID) && $secLinkID != -1 && $secLinkID) {
// use Itemid for section found in query
				$_Itemid = '&amp;Itemid=' . $secLinkID;
			}
			if ($catLinkURL) {
				$link = sefRelToAbs($catLinkURL . $_Itemid);
			} else {
				$link = sefRelToAbs('index.php?option=com_content&amp;task=category&amp;sectionid=' . $row->sectionid . '&amp;id=' . $row->catid . $_Itemid);
			}
			$row->category = '<a href="' . $link . '" title="' . $row->category . '">' . $row->category . '</a>';
		}
	}
// show/hides the intro text
/*ToDo: �������� ������������ �������*/
	if ($params->get('introtext')) {
		if ($params->get('jeditable'))
			$row->text = '<div class="introtext">' . $row->introtext . '</div>' . ($params->get('intro_only') ? '' : chr(13) . '<div id="jneditf-' . $row->id . '">' . chr(13) . '</div>' . '<div class="fulltext">' . $row->fulltext . '</div>' . chr(13) . chr(13) . '<div class="notetext">' . $row->notetext . '</div>');
		else
			$row->text = '<div class="introtext">' . $row->introtext . '</div>' . ($params->get('intro_only') ? '' : chr(13) . chr(13) . '<div class="fulltext">' . $row->fulltext . '</div>' . chr(13) . chr(13) . '<div class="notetext">' . $row->notetext . '</div>');
	} else {
		$row->text = '<div class="fulltext">' . $row->fulltext . '</div>';
	}
// deal with the {mospagebreak} mambots only permitted in the full text area
	$page = intval(mosGetParam($_REQUEST, 'limitstart', 0));
// ������ �������� ���������
	if (!$params->get('intro_only') && ($page == 0) && ($mosConfig_content_hits)) {
		$obj = new mosContent($database);
		$obj->hit($row->id);
	}
// needed for caching purposes to stop different cachefiles being created for same item does not affect anything else as hits data not outputted
	$row->hits = 0;

	$cache->call('HTML_content::show', $row, $params, $access, $page);
}

function editItem($uid, $gid, &$access, $sectionid = 0, $task, $Itemid) {
	global $database, $my, $mainframe;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;
// boston, ��� �������������� ��������� � ������ ��������� ����� ���� ������� - ������������ ����� �� ������� ���������� �� ������� ��� ����������, � ����� ���������
	global $mosConfig_module_on_edit_off;
	if ($mosConfig_module_on_edit_off == 1) {
		$GLOBALS['_MOS_MODULES'] = '';
	}
//$mainframe->set('loadEditor', false);
	$nullDate = $database->getNullDate();
	$row = new mosContent($database);
// load the row from the db table
	$row->load((int) $uid);
// fail if checked out not by 'me'
	if ($row->isCheckedOut($my->id)) {
		mosErrorAlert("[ " . $row->title . " ] " . _CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE);
	}
	if ($uid) {
// existing record
		if (!($access->canEdit || ($access->canEditOwn && $row->created_by == $my->id))) {
			mosNotAuth();
			return;
		}
	} else {
// new record
		if (!($access->canEdit || $access->canEditOwn)) {
			mosNotAuth();
			return;
		}
		if ($Itemid == 0 || $Itemid == 99999999) {
// security check to see if link exists in a menu
			$link = 'index.php?option=com_content&amp;task=new&amp;sectionid=' . (int) $sectionid;
			$query = "SELECT id FROM #__menu WHERE (link LIKE '%$link' OR link LIKE '%$link&%') AND published = 1";
			$database->setQuery($query);
			$exists = $database->loadResult();
			if (!$exists) {
				mosNotAuth();
				return;
			}
		}
	}
	if ($uid) {
		$link = 'index.php?option=com_content&amp;task=new';
		$q = "SELECT params FROM #__menu WHERE (link LIKE '%$link' OR link LIKE '%$link&%') AND published = 1";
		$database->setQuery($q);
		$params0 = $database->loadResult();
		$params = new mosParameters($params0);
	} else {
		$menu = $mainframe->get('menu');
		$params = new mosParameters($menu->params);
	}
// ��������� ���������� �� �������� ������ � ����
	$ids_user = $params->get('ids_user', 0); // ��������� �������� ID
	$ids_action = $params->get('ids_action', 0); // ��� ��������� ��������� ID
	$where_c = "";
	$where_s = "";
	if ($ids_action) {
		switch ($ids_action) {
			case '1':
			default:
				$where_s = " AND (s.id IN (" . $ids_user . "))";
				break;
			case '2':
				$where_c = " AND (c.id IN (" . $ids_user . "))";
				break;
			case '3':
				$where_s = " AND (s.id NOT IN (" . $ids_user . "))";
				break;
			case '4':
				$where_c = " AND (c.id NOT IN (" . $ids_user . "))";
				break;
		}
	}
	if ($uid) {
		$sectionid = $row->sectionid;
	}
	$lists = array();
// get the type name - which is a special category
	$query = "SELECT name FROM #__sections WHERE id = " . (int) $sectionid;
	$database->setQuery($query);
	$section = $database->loadResult();
	if ($uid == 0) {
		$row->catid = 0;
	}
	if ($uid) {
		$row->checkout($my->id);
		if (trim($row->images)) {
			$row->images = explode("\n", $row->images);
		} else {
			$row->images = array();
		}
		$row->created = mosFormatDate($row->created, _CURRENT_SERVER_TIME_FORMAT);
		$row->modified = $row->modified == $nullDate ? '' : mosFormatDate($row->modified, _CURRENT_SERVER_TIME_FORMAT);
		$row->publish_up = mosFormatDate($row->publish_up, _CURRENT_SERVER_TIME_FORMAT);
		if (trim($row->publish_down) == $nullDate || trim($row->publish_down) == '' ||
				trim($row->publish_down) == '-') {
			$row->publish_down = '�������';
		}
		$row->publish_down = mosFormatDate($row->publish_down, _CURRENT_SERVER_TIME_FORMAT);
		$query = "SELECT name FROM #__users WHERE id = " . (int) $row->created_by;
		$database->setQuery($query);
		$row->creator = $database->loadResult();
// test to reduce unneeded query
		if ($row->created_by == $row->modified_by) {
			$row->modifier = $row->creator;
		} else {
			$query = "SELECT name FROM #__users WHERE id = " . (int) $row->modified_by;
			$database->setQuery($query);
			$row->modifier = $database->loadResult();
		}
		$query = "SELECT content_id FROM #__content_frontpage WHERE content_id = " . (int) $row->id;
		$database->setQuery($query);
		$row->frontpage = $database->loadResult();
	} else {
		$row->sectionid = $sectionid;
		$row->version = 0;
		$row->ordering = 0;
		$row->images = array();
		$row->publish_up = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] + ($mosConfig_offset * 60 * 60));
		$row->publish_down = '�������';
		$row->creator = 0;
		$row->modifier = 0;
		$row->frontpage = 0;
// ���������� ��������
// Publishing state hardening for Authors
		$auto_publish = $params->get('auto_publish', 0);
		if (!$auto_publish) { // ���� ������ ������ �������� - ����� �� �������
			if (!$access->canPublish) {
				$row->state = 0;
			} else {
				$row->state = 1;
			}
		} else {
			$row->state = 1;
		}
	}
// pull param column from category info
	$query = "SELECT params FROM #__categories WHERE id = " . (int) $row->catid;
	$database->setQuery($query);
	$categoryParam = $database->loadResult();
	$paramsCat = new mosParameters($categoryParam, $mainframe->getPath('com_xml', 'com_categories'), 'component');
	$selected_folders = $paramsCat->get('imagefolders', '');
	if (!$selected_folders) {
		$selected_folders = '*2*';
	}
// check if images utilizes settings from section
	if (strpos($selected_folders, '*2*') !== false) {
		unset($selected_folders);
// load param column from section info
		$query = "SELECT params FROM #__sections WHERE id = " . (int) $row->sectionid;
		$database->setQuery($query);
		$sectionParam = $database->loadResult();
		$paramsSec = new mosParameters($sectionParam, $mainframe->getPath('com_xml', 'com_sections'), 'component');
		$selected_folders = $paramsSec->get('imagefolders', '');
	}
	if (trim($selected_folders)) {
		$temps = explode(',', $selected_folders);
		foreach ($temps as $temp) {
			$folders[] = mosHTML::makeOption($temp, $temp);
		}
	} else {
		$folders[] = mosHTML::makeOption('*1*');
	}
// calls function to read image from directory
	$pathA = $mosConfig_absolute_path . '/images/stories';
	$pathL = $mosConfig_live_site . '/images/stories';
	$images = array();
	if ($folders[0]->value == '*1*') {
		$folders = array();
		$folders[] = mosHTML::makeOption('/');
		mosAdminMenus::ReadImages($pathA, '/', $folders, $images);
	} else {
		mosAdminMenus::ReadImagesX($folders, $images);
	}
// list of folders in images/stories/
	$lists['folders'] = mosAdminMenus::GetImageFolders($folders, $pathL);
// list of images in specfic folder in images/stories/
	$lists['imagefiles'] = mosAdminMenus::GetImages($images, $pathL, $folders);
// list of saved images
	$lists['imagelist'] = mosAdminMenus::GetSavedImages($row, $pathL);
// make the select list for the states
	$states[] = mosHTML::makeOption(0, _CMN_UNPUBLISHED);
	$states[] = mosHTML::makeOption(1, _CMN_PUBLISHED);
	$lists['state'] = mosHTML::selectList($states, 'state', 'class="inputbox" size="1"', 'value', 'text', intval($row->state));
// build the html select list for ordering
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN title AS text, ordering AS value"
	. "\n FROM #__content"
	. "\n WHERE catid = " . (int) $row->catid . ""
	. "\n ORDER BY ordering";
	$lists['ordering'] = mosAdminMenus::SpecificOrdering($row, $uid, $query, 1);
	/* add STRAIGHT_JOIN */
	$database->setQuery("SELECT STRAIGHT_JOIN c.id AS cid , c.name AS c_name, c.section"
	. "\n FROM #__categories AS c"
	. "\n WHERE c.published=1 $where_c"
	. "\n AND section NOT LIKE '%com_%'"
	. "\n ORDER BY title ASC ");
	$cids = $database->loadObjectList();
	/* add STRAIGHT_JOIN */
	$database->setQuery(" SELECT STRAIGHT_JOIN s.id, s.name FROM #__sections AS s WHERE s.published=1 $where_s ORDER BY title ASC");
	$sids = $database->loadObjectList();
	$return = '<select name="catid" id="new_content_catid" class="inputbox" size="1">';
	$cids_arr = array();
	$i2 = 0;
	foreach ($cids as $row2) {
		$cids_arr[$i2]['cat_name'] = $row2->c_name;
		$cids_arr[$i2]['parent'] = $row2->section;
		$cids_arr[$i2]['cid'] = $row2->cid;
		$i2++;
	}
	foreach ($sids as $row3) {
		if (isset($sids->name))
		echo $sids->name;
		foreach ($cids_arr as $v) {
			if ($v['parent'] == $row3->id) {
				$s_name = '_' . $row3->name . '_';
				if ($s_name != 1) {
					$s_name = 1;
					$return .= '<option value="" disabled="disabled">' . $row3->name . '</option>';
				}
				if ($v['cid'] == $row->catid) {
					$extra = ' selected="selected"';
				} else {
					$extra = '';
				}
				$return .= '<option value="' . $row3->id . '*' . $v['cid'] . '" ' . $extra . '> &ndash; ' . $v['cat_name'] . '</option>';
			}
		}
	}
	$return .='</select>';
	$lists['catid'] = $return;
// build the select list for the image positions
	$lists['_align'] = mosAdminMenus::Positions('_align');
// build the html select list for the group access
	$lists['access'] = mosAdminMenus::Access($row);
// build the select list for the image caption alignment
	$lists['_caption_align'] = mosAdminMenus::Positions('_caption_align');
// build the html select list for the group access
// build the select list for the image caption position
	$pos[] = mosHTML::makeOption('bottom', _CMN_BOTTOM);
	$pos[] = mosHTML::makeOption('top', _CMN_TOP);
	$lists['_caption_position'] = mosHTML::selectList($pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text');
	HTML_content::editContent($row, $section, $lists, $images, $access, $my->id, $sectionid, $task, $Itemid, $params);
}

/** Saves the content item an edit form submit */
function saveContent(&$access, $task) {
	global $database, $mainframe, $my;
	global $mosConfig_absolute_path, $mosConfig_offset, $Itemid;
// simple spoof check security
	josSpoofCheck();
	$nullDate = $database->getNullDate();
	$row = new mosContent($database);
	if (!$row->bind($_POST)) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
// sanitise id field
	$row->id = (int) $row->id;
	$isNew = $row->id < 1;
	if ($isNew) {
// new record
		if (!($access->canEdit || $access->canEditOwn)) {
			mosNotAuth();
			return;
		}
		$row->created = date('Y-m-d H:i:s');
		$row->created_by = $my->id;
	} else {
// existing record
		if (!($access->canEdit || ($access->canEditOwn && $row->created_by == $my->id))) {
			mosNotAuth();
			return;
		}
		$row->modified = date('Y-m-d H:i:s');
		$row->modified_by = $my->id;
	}
	if (strlen(trim($row->publish_up)) <= 10) {
		$row->publish_up .= ' 00:00:00';
	}
	$row->publish_up = mosFormatDate($row->publish_up, _CURRENT_SERVER_TIME_FORMAT, -
					$mosConfig_offset);

	if (trim($row->publish_down) == '�������' || trim($row->publish_down) == '') {
		$row->publish_down = $nullDate;
	} else {
		if (strlen(trim($row->publish_down)) <= 10) {
			$row->publish_down .= ' 00:00:00';
		}
		$row->publish_down = mosFormatDate($row->publish_down,
						_CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset);
	}
// code cleaner for xhtml transitional compliance
	$row->introtext = str_replace('<br>', '<br />', $row->introtext);
	$row->fulltext = str_replace('<br>', '<br />', $row->fulltext);
	$row->notetext = str_replace('<br>', '<br />', $row->notetext);
//test end
	$length = strlen($row->introtext) < 9;
	$search = strstr($row->introtext, '<br />');
// remove <br /> take being automatically added to empty fulltext
	$length = strlen($row->fulltext) < 9;
	$search = strstr($row->fulltext, '<br />');
	$length = strlen($row->notetext) < 9;
	$search = strstr($row->notetext, '<br />');
//test end
	if ($length && $search) {
		$row->fulltext = null;
		$row->notetext = null;
	}
	$row->title = ampReplace($row->title);
	if (isset($_POST['catid'])) {
		$catid0 = explode('*', $_POST['catid']);
		$row->catid = $catid0[1];
		$row->sectionid = $catid0[0];
	}
	if (!$row->check()) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
	$row->version++;
	if (!$row->store()) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
// manage frontpage items
	require_once ($mainframe->getPath('class', 'com_frontpage'));
	$fp = new mosFrontPage($database);
	if (intval(mosGetParam($_REQUEST, 'frontpage', 0))) {
// toggles go to first place
		if (!$fp->load((int) $row->id)) {
// new entry
			$query = "INSERT INTO #__content_frontpage VALUES (" . (int) $row->id . ", 1)";
			$database->setQuery($query);
			if (!$database->query()) {
				echo "<script>alert('" . $database->stderr() . "');</script>\n";
				exit();
			}
			$fp->ordering = 1;
		}
	} else {
// no frontpage mask
		if (!$fp->delete((int) $row->id)) {
			$msg .= $fp->stderr();
		}
		$fp->ordering = 0;
	}
	$fp->updateOrder();
	$row->checkin();
	$row->updateOrder("catid = " . (int) $row->catid);
// gets section name of item
	$query = "SELECT s.title FROM #__sections AS s WHERE s.scope = 'content' AND s.id = " . (int) $row->sectionid;
	$database->setQuery($query);
// gets category name of item
	$section = $database->loadResult();
	$query = "SELECT c.title FROM #__categories AS c WHERE c.id = " . (int) $row->catid;
	$database->setQuery($query);
	$category = $database->loadResult();
	$category = stripslashes($category);
	if ($isNew) {
// messaging for new items
		require_once ($mosConfig_absolute_path . '/components/com_messages/messages.class.php');
		$query = "SELECT id"
		. "\n FROM #__users"
		. "\n WHERE sendEmail = 1";
		$database->setQuery($query);
		$users = $database->loadResultArray();
		foreach ($users as $user_id) {
			$msg = new mosMessage($database);
			// $msg->send($my->id, $user_id, "����� ������", sprintf(_ON_NEW_CONTENT, $my->username, $row->title, $section, $category));
			$msg->send( $my->id, $user_id, "����� ������", sprintf( _ON_NEW_CONTENT, $my->username, $row->title, $section, $category ) . '<a href="' . $GLOBALS['mosConfig_live_site'] . '/administrator/index2.php?option=com_content&sectionid=0&task=edit&hidemainmenu=1&id=' . $row->id . '">' . $row->title . '</a>');
		}
	}
	$msg = $isNew ? _THANK_SUB : _E_ITEM_SAVED;
	if ($my->usertype == 'Publisher' || $row->state == 1) {
		$msg = _THANK_SUB_PUB;
	}
	switch ($task) {
		case 'apply':
			$Itemid = intval(mosGetParam($_POST, 'Returnid', $Itemid));
			$link = 'index.php?option=com_content&amp;task=edit&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
			break;
		case 'apply_new':
			$link = $_SERVER['HTTP_REFERER'];
			break;
		case 'save':
		default:
			$Itemid = mosGetParam($_POST, 'Returnid', '');
			if ($Itemid) {
				if ($access->canEdit) {
					$link = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
				} else {
					$link = 'index.php';
				}
			} else {
				$link = strval(mosGetParam($_POST, 'referer', ''));
			}
			break;
	}
	mosRedirect($link, $msg);
}

/**
 * Cancels an edit operation
 * @param database A database connector object
 */
function cancelContent(&$access) {
	global $database, $my, $task;
	$row = new mosContent($database);
	$row->bind($_POST);
	if ($access->canEdit || ($access->canEditOwn && $row->created_by == $my->id)) {
		$row->checkin();
	}
	$Itemid = intval(mosGetParam($_POST, 'Returnid', '0'));
	$referer = strval(mosGetParam($_POST, 'referer', ''));
	$parts = parse_url($referer);
	parse_str($parts['query'], $query);
	if ($task == 'edit' || $task == 'cancel') {
		$Itemid = mosGetParam($_POST, 'Returnid', '');
		$referer = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
	}
	if ($referer && $row->id) {
		mosRedirect($referer);
	} else {
		mosRedirect('index.php');
	}
}

/**
 * Shows the email form for a given content item.
 * @param int The content item id
 */
function emailContentForm($uid, $gid) {
	global $database, $mosConfig_hideEmail;
	$id = intval(mosGetParam($_REQUEST, 'id', 0));
	if ($id) {
		$query = 'SELECT attribs FROM #__content WHERE `id`=' . $id;
		$database->setQuery($query);
		$params = new mosParameters($database->loadResult());
	} else {
		$params = new mosParameters('');
	}
	$email = intval($params->get('email', 0));
	if ($mosConfig_hideEmail && !$email) {
		echo _NOT_AUTH;
		return;
	}
	$itemid = intval(mosGetParam($_GET, 'itemid', 0));
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
// query to check for state and access levels
	$query = "SELECT a.*, cc.name AS category, s.name AS section, s.published AS sec_pub, cc.published AS cat_pub," .
	"\ns.access AS sec_access, cc.access AS cat_access, s.id AS sec_id, cc.id as cat_id"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = cc.section"
	. "\n AND s.scope = 'content'"
	. "\n WHERE a.id = " . (int) $uid
	. "\n AND a.state = 1"
	. "\n AND a.access <= " . (int) $gid
	. "\n AND (a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")"
	. "\n AND (a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")";
	$database->setQuery($query);
	$row = null;
	if ($database->loadObject($row)) {
		/** check whether category is published */
		if (!$row->cat_pub && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section is published */
		if (!$row->sec_pub && $row->sectionid) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if (($row->cat_access > $gid) && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section access level allows access */
		if (($row->sec_access > $gid) && $row->sectionid) {
			mosNotAuth();
			return;
		}
		$query = "SELECT template" . "\n FROM #__templates_menu" . "\n WHERE client_id = 0 AND menuid = 0";
		$database->setQuery($query);
		$template = $database->loadResult();
		HTML_content::emailForm($row->id, $row->title, $template, $itemid);
	} else {
		mosNotAuth();
		return;
	}
}

/**
 * Shows the email form for a given content item.
 * @param int The content item id
 */
function emailContentSend($uid, $gid) {
	global $database, $mainframe;
	global $mosConfig_sitename, $mosConfig_hideEmail;
	$id = intval(mosGetParam($_REQUEST, 'id', 0));
	if ($id) {
		$query = 'SELECT attribs FROM #__content WHERE `id`=' . $id;
		$database->setQuery($query);
		$params = new mosParameters($database->loadResult());
	} else {
		$params = new mosParameters('');
	}
	$paramEmail = intval($params->get('email', 0));
	if ($mosConfig_hideEmail && !$paramEmail) {
		echo _NOT_AUTH;
		return;
	}
// simple spoof check security
	josSpoofCheck(1);
// check for session cookie
// Session Cookie `name`
	$sessionCookieName = mosMainFrame::sessionCookieName();
// Get Session Cookie `value`
	$sessioncookie = mosGetParam($_COOKIE, $sessionCookieName, null);

	if (!(strlen($sessioncookie) == 32 || $sessioncookie == '-')) {
		mosErrorAlert(_NOT_AUTH);
	}
	$itemid = intval(mosGetParam($_POST, 'itemid', 0));
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
// query to check for state and access levels
	$query = "SELECT a.*, cc.name AS category, s.name AS section, s.published AS sec_pub, cc.published AS cat_pub, s.access AS sec_access, cc.access AS cat_access, s.id AS sec_id, cc.id as cat_id"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = cc.section"
	. "\n AND s.scope = 'content'"
	. "\n WHERE a.id = " . (int) $uid
	. "\n AND a.state = 1"
	. "\n AND a.access <= " . (int) $gid
	. "\n AND (a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")"
	. "\n AND (a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")";
	$database->setQuery($query);
	$row = null;
	if ($database->loadObject($row)) {
		/** check whether category is published */
		if (!$row->cat_pub && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section is published */
		if (!$row->sec_pub && $row->sectionid) {
			mosNotAuth();
			return;
		}
		/** check whether category access level allows access */
		if (($row->cat_access > $gid) && $row->catid) {
			mosNotAuth();
			return;
		}
		/** check whether section access level allows access */
		if (($row->sec_access > $gid) && $row->sectionid) {
			mosNotAuth();
			return;
		}
		$email = strval(mosGetParam($_POST, 'email', ''));
		$yourname = strval(mosGetParam($_POST, 'yourname', ''));
		$youremail = strval(mosGetParam($_POST, 'youremail', ''));
		$subject = strval(mosGetParam($_POST, 'subject', ''));
		if (empty($subject)) {
			$subject = _EMAIL_INFO . ' ' . $yourname;
		}
		if ($uid < 1 || !$email || !$youremail || (JosIsValidEmail($email) == false) || (JosIsValidEmail ($youremail) == false)) {
			mosErrorAlert(_EMAIL_ERR_NOINFO);
		}
		$query = "SELECT template FROM #__templates_menu WHERE client_id = 0 AND menuid = 0";
		$database->setQuery($query);
		$template = $database->loadResult();
// determine Itemid for Item
		if ($itemid) {
			$_itemid = '&Itemid=' . $itemid;
		} else {
			$itemid = $mainframe->getItemid($uid, 0, 0);
			$_itemid = '&Itemid=' . $itemid;
		}
// link sent in email
		$link = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id=' . $uid . $_itemid);
// message text
		$msg = sprintf(_EMAIL_MSG, html_entity_decode($mosConfig_sitename, ENT_QUOTES), $yourname, $youremail, $link);
// mail function
		$success = mosMail($youremail, $yourname, $email, $subject, $msg);
		if (!$success) {
			mosErrorAlert(_EMAIL_ERR_NOINFO);
		}
		HTML_content::emailSent($email, $template);
	} else {
		mosNotAuth();
		return;
	}
}

function recordVote() {
	global $database;
	$user_rating = intval(mosGetParam($_REQUEST, 'user_rating', 0));
	$url = mosGetParam($_REQUEST, 'url', '');
	$cid = intval(mosGetParam($_REQUEST, 'cid', 0));
	if (($user_rating >= 1) and ($user_rating <= 5)) {
		$currip = (phpversion() <= '4.2.1' ? @getenv('REMOTE_ADDR') : $_SERVER['REMOTE_ADDR']);
		$query = "SELECT * FROM #__content_rating WHERE content_id = " . (int) $cid;
		$database->setQuery($query);
		$votesdb = null;
		if (!($database->loadObject($votesdb))) {
			$query = "INSERT INTO #__content_rating (content_id, lastip, rating_sum, rating_count) VALUES (" . (int) $cid . ", " . $database->Quote($currip) . ", " . (int) $user_rating . ", 1)";
			$database->setQuery($query);
			$database->query() or die($database->stderr());
			;
		} else {
			if ($currip != ($votesdb->lastip)) {
				$query = "UPDATE #__content_rating SET rating_count = rating_count + 1, rating_sum = rating_sum + " . (int) $user_rating . ", lastip = " . $database->Quote($currip) . " WHERE content_id = " . (int) $cid;
				$database->setQuery($query);
				$database->query() or die($database->stderr());
			} else {
				mosRedirect($url, _ALREADY_VOTE);
			}
		}
		mosRedirect($url, _THANKS);
	}
}

function _orderby_pri($orderby) {
	switch ($orderby) {
		case 'alpha':
			$orderby = 'cc.title, ';
			break;
		case 'ralpha':
			$orderby = 'cc.title DESC, ';
			break;
		case 'order':
			$orderby = 'cc.ordering, ';
			break;
		default:
			$orderby = '';
			break;
	}
	return $orderby;
}

function _orderby_sec($orderby) {
	switch ($orderby) {
		case 'date':
			$orderby = 'a.created';
			break;
		case 'rdate':
			$orderby = 'a.created DESC';
			break;
		case 'alpha':
			$orderby = 'a.title';
			break;
		case 'ralpha':
			$orderby = 'a.title DESC';
			break;
		case 'hits':
			$orderby = 'a.hits';
			break;
		case 'rhits':
			$orderby = 'a.hits DESC';
			break;
		case 'order':
			$orderby = 'a.ordering';
			break;
		case 'author':
			$orderby = 'a.created_by_alias, u.name';
			break;
		case 'rauthor':
			$orderby = 'a.created_by_alias DESC, u.name DESC';
			break;
		case 'section':
			$orderby = 's.name, c.name, a.created DESC';
			break;
		case 'rsection':
			$orderby = 's.name DESC, c.name DESC, a.created DESC';
			break;
		case 'front':
			$orderby = 'f.ordering';
			break;
		default:
			$orderby = 'a.ordering';
			break;
	}
	return $orderby;
}

/** @param int 0 = Archives, 1 = Section, 2 = Category */
function _where($type = 1, &$access, &$noauth, $gid, $id, $now = null, $year = null, $month = null, $params = null) {
	global $database, $mainframe, $mosConfig_disable_date_state, $mosConfig_disable_access_control;
	$noauth = !$mainframe->getCfg('shownoauth');
	$nullDate = $database->getNullDate();
	$now = _CURRENT_SERVER_TIME;
	$where = array();
	$unpublished = 0;
	if (isset($params)) {
// param controls whether unpublished items visible to publishers and above
		$unpublished = $params->def('unpublished', 0);
	}
// normal
	if ($type > 0) {
		if (isset($params) && $unpublished) {
// shows unpublished items for publishers and above
			if ($access->canEdit) {
				$where[] = "a.state >= 0";
			} else {
				$where[] = "a.state = 1";
				if (!$mosConfig_disable_date_state) {
					$where[] = "(a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")";
					$where[] = "(a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")";
				}
			}
		} else {
// unpublished items NOT shown for publishers and above
			$where[] = "a.state = 1";
			if (!$mosConfig_disable_date_state) {
				$where[] = "(a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")";
				$where[] = "(a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")";
			}
		}
// add query checks for category or section ids
		if ($id > 0) {
			$ids = explode(',', $id);
			mosArrayToInts($ids);
			if ($type == 1) {
				$where[] = '(a.sectionid=' . implode(' OR a.sectionid=', $ids) . ')';
			} else
			if ($type == 2) {
				$where[] = '(a.catid=' . implode(' OR a.catid=', $ids) . ')';
			}
		}
	}
// archive
	if ($type < 0) {
		$where[] = "a.state = -1";
		if ($year) {
			$where[] = "YEAR(a.created) = " . $database->Quote($year);
		}
		if ($month) {
			$where[] = "MONTH(a.created) = " . $database->Quote($month);
		}
		if ($id > 0) {
			if ($type == -1) {
				$where[] = "a.sectionid = " . (int) $id;
			} else
			if ($type == -2) {
				$where[] = "a.catid = " . (int) $id;
			}
		}
	}
	$where[] = "s.published = 1";
	$where[] = "cc.published = 1";
	/* ���� ������ �� ������ ��������� - �� ������ ����������� �� ��������, � ��������� ������ �� ����������� ���������� */
	if ($noauth and !$mosConfig_disable_access_control) {
		$where[] = "a.access <= " . (int) $gid;
		$where[] = "s.access <= " . (int) $gid;
		$where[] = "cc.access <= " . (int) $gid;
	}
	return $where;
}

function votingQuery($active = null) {
	global $mainframe;
	$voting = ($active ? $active : $mainframe->getCfg('vote'));
	if ($voting) {
// calculate voting count
		$select = "\n , ROUND(v.rating_sum / v.rating_count) AS rating, v.rating_count";
		$join = "\n LEFT JOIN #__content_rating AS v ON a.id = v.content_id";
	} else {
		$select = '';
		$join = '';
	}
	$results = array('select' => $select, 'join' => $join);
	return $results;
}
?>