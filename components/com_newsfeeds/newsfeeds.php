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
// load the html drawing class
require_once ($mainframe->getPath('front_html'));
$feedid = intval(mosGetParam($_REQUEST, 'feedid', 0));
$catid = intval(mosGetParam($_REQUEST, 'catid', 0));
switch ($task) {
	case 'view':
		showFeed($feedid);
		break;
	default:
		listFeeds($catid);
		break;
}

function listFeeds($catid) {
	global $mainframe, $database, $my;
	global $mosConfig_live_site;
	global $Itemid;
	/* Query to retrieve all categories that belong under the contacts section and that are published. */
	$query = "SELECT STRAIGHT_JOIN cc.*, a.catid, COUNT(a.id) AS numlinks FROM #__categories AS cc"
	. "\n LEFT JOIN #__newsfeeds AS a ON a.catid = cc.id"
	. "\n WHERE a.published = 1"
	. "\n AND cc.section = 'com_newsfeeds'"
	. "\n AND cc.published = 1"
	. "\n AND cc.access <= " . (int) $my->gid
	. "\n GROUP BY cc.id"
	. "\n ORDER BY cc.ordering";
	$database->setQuery($query);
	$categories = $database->loadObjectList();
	$rows = array();
	$currentcat = null;
	if ($catid) {
// url links info for category
		$query = "SELECT * FROM #__newsfeeds WHERE catid = " . (int) $catid . " AND published = 1 ORDER BY ordering";
		$database->setQuery($query);
		$rows = $database->loadObjectList();
// current category info
		$query = "SELECT id, name, description, image, image_position"
		. "\n FROM #__categories"
		. "\n WHERE id = " . (int) $catid
		. "\n AND published = 1"
		. "\n AND access <= " . (int) $my->gid;
		$database->setQuery($query);
		$database->loadObject($currentcat);
		/** Check if the category is published or if access level allows access */
		if (!$currentcat->name) {
			mosNotAuth();
			return;
		}
	}
// Parameters
	$menu = $mainframe->get('menu');
	$params = new mosParameters($menu->params);
	$params->def('page_title', 1);
	$params->def('header', $menu->name);
	$params->def('pageclass_sfx', '');
	$params->def('headings', 1);
	$params->def('back_button', $mainframe->getCfg('back_button'));
	$params->def('description_text', '');
	$params->def('image', -1);
	$params->def('image_align', 'right');
	$params->def('other_cat_section', 1);
// Category List Display control
	$params->def('other_cat', 1);
	$params->def('cat_description', 1);
	$params->def('cat_items', 1);
// Table Display control
	$params->def('headings', 1);
	$params->def('name', 1);
	$params->def('articles', 1);
	$params->def('link', 0);
	if ($catid) {
		$params->set('type', 'category');
	} else {
		$params->set('type', 'section');
	}
// page description
	$currentcat->descrip = '';
	if ((@$currentcat->description) != '') {
		$currentcat->descrip = $currentcat->description;
	} else
	if (!$catid) {
// show description
		if ($params->get('description')) {
			$currentcat->descrip = $params->get('description_text');
		}
	}
// page image
	$currentcat->img = '';
	$path = $mosConfig_live_site . '/images/stories/';
	if ((@$currentcat->image) != '') {
		$currentcat->img = $path . $currentcat->image;
		$currentcat->align = $currentcat->image_position;
	} else
	if (!$catid) {
		if ($params->get('image') != -1) {
			$currentcat->img = $path . $params->get('image');
			$currentcat->align = $params->get('image_align');
		}
	}
// page header
	$currentcat->header = '';
	if (@$currentcat->name != '') {
		$currentcat->header = $currentcat->name;
	} else {
		$currentcat->header = $params->get('header');
	}
// used to show table rows in alternating colours
	$tabclass = array('sectiontableentry1', 'sectiontableentry2');
	$mainframe->SetPageTitle($menu->name);
	HTML_newsfeed::displaylist($categories, $rows, $catid, $currentcat, $params, $tabclass);
}

function showFeed($feedid) {
	global $database, $mainframe, $mosConfig_absolute_path, $mosConfig_cachepath, $Itemid,
	$my;
// check if cache directory is writeable
	$cacheDir = $mosConfig_cachepath . '/';
	if (!is_writable($cacheDir)) {
		echo '������� ���� ���������� ��� ������';
		return;
	}
	require_once ($mainframe->getPath('class'));
	$newsfeed = new mosNewsFeed($database);
	$newsfeed->load((int) $feedid);
	/** Check if newsfeed is published */
	if (!$newsfeed->published) {
		mosNotAuth();
		return;
	}
	$category = new mosCategory($database);
	$category->load((int) $newsfeed->catid);
	/** Check if newsfeed category is published */
	if (!$category->published) {
		mosNotAuth();
		return;
	}
	/** check whether category access level allows access */
	if ($category->access > $my->gid) {
		mosNotAuth();
		return;
	}
// full RSS parser used to access image information
	require_once ($mosConfig_absolute_path . '/includes/domit/xml_domit_rss.php');
	$LitePath = $mosConfig_absolute_path . '/includes/Cache/Lite.php';
// Adds parameter handling
	$menu = $mainframe->get('menu');
	$params = new mosParameters($menu->params);
	$params->def('page_title', 1);
	$params->def('header', $menu->name);
	$params->def('pageclass_sfx', '');
	$params->def('back_button', $mainframe->getCfg('back_button'));
// Feed Display control
	$params->def('feed_image', 1);
	$params->def('feed_descr', 1);
	$params->def('item_descr', 1);
	$params->def('word_count', 0);
// Encoding
	$params->def('utf8', 1);
	if (!$params->get('page_title')) {
		$params->set('header', '');
	}
	$and = '';
	if ($feedid) {
		$and = "\n AND id = $feedid";
	}
	$mainframe->SetPageTitle($menu->name);
	HTML_newsfeed::showNewsfeeds($newsfeed, $LitePath, $cacheDir, $params);
}
?>