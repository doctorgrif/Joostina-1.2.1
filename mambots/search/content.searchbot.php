<?php
/**
* @package Joostina
* @copyright јвторские права (C) 2008 Joostina team. ¬се права защищены.
* @license Ћицензи€ http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распростран€емое по услови€м лицензии GNU/GPL
* ƒл€ получени€ информации о используемых расширени€х и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет пр€мого доступа
defined('_VALID_MOS') or die();
$_MAMBOTS->registerFunction('onSearch', 'botSearchContent');
/**
* Content Search method
* запрос sql должен возвратить пол€, используютс€ в обычной операции 
* отображени€: href, title, section, created, text, browsernav
* @param определ€ет цель поиска
* @param сопоставл€ет параметры: exact|any|all
* @param определ€ет параметр сортировки: newest|oldest|popular|alpha|category
*/
function botSearchContent($text, $phrase = '', $ordering = '', $category = '') {
	global $database, $my, $_MAMBOTS;
// check if param query has previously been processed
	if (!isset($_MAMBOTS->_search_mambot_params['content'])) {
// load mambot params info
		$query = "SELECT params" . "\n FROM #__mambots" . "\n WHERE element = 'content.searchbot'" .
				"\n AND folder = 'search'";
		$database->setQuery($query);
		$database->loadObject($mambot);
// save query to class variable
		$_MAMBOTS->_search_mambot_params['content'] = $mambot;
	}
// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['content'];
	$botParams = new mosParameters($mambot->params);
	$limit = $botParams->def('search_limit', 50);
	$nonmenu = $botParams->def('nonmenu', 1);
	$nullDate = $database->getNullDate();
	$now = _CURRENT_SERVER_TIME;
	$text = trim($text);
	if ($text == '') {
		return array();
	}
	$wheres = array();
	switch ($phrase) {
		case 'exact':
			$wheres2 = array();
			$wheres2[] = "LOWER(a.title) LIKE LOWER('%$text%')";
			$wheres2[] = "LOWER(a.introtext) LIKE LOWER('%$text%')";
			$wheres2[] = "LOWER(a.fulltext) LIKE LOWER('%$text%')";
			$wheres2[] = "LOWER(a.metakey) LIKE LOWER('%$text%')";
			$wheres2[] = "LOWER(a.metadesc) LIKE LOWER('%$text%')";
			$where = '(' . implode(') OR (', $wheres2) . ')';
			break;
		case 'all':
		case 'any':
		default:
			$words = explode(' ', $text);
			$wheres = array();
			foreach ($words as $word) {
				$wheres2 = array();
				$wheres2[] = "LOWER(a.title) LIKE LOWER('%$word%')";
				$wheres2[] = "LOWER(a.introtext) LIKE LOWER('%$word%')";
				$wheres2[] = "LOWER(a.fulltext) LIKE LOWER('%$word%')";
				$wheres2[] = "LOWER(a.metakey) LIKE LOWER('%$word%')";
				$wheres2[] = "LOWER(a.metadesc) LIKE LOWER('%$word%')";
				$wheres[] = implode(' OR ', $wheres2);
			}
			$where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
			break;
	}
	$morder = '';
	switch ($ordering) {
		case 'oldest':
			$order = 'a.created ASC';
			break;
		case 'popular':
			$order = 'a.hits DESC';
			break;
		case 'alpha':
			$order = 'a.title ASC';
			break;
		case 'category':
			$order = 'b.title ASC, a.title ASC';
			$morder = 'a.title ASC';
			break;
		case 'newest':
		default:
			$order = 'a.created DESC';
			break;
	}
// search content items
	$query = "SELECT STRAIGHT_JOIN a.title AS title," . "\n a.created AS created," . "\n CONCAT(a.introtext, a.fulltext) AS text," .
//"\n AND a.catid = ".$category."".
			"\n CONCAT_WS( '/', u.title, b.title ) AS section," . "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id ) AS href," .
			"\n '2' AS browsernav," . "\n 'content' AS type" . "\n, u.id AS sec_id, b.id as cat_id" .
			"\n FROM #__content AS a" . "\n INNER JOIN #__categories AS b ON b.id=a.catid" . "\n INNER JOIN #__sections AS u ON u.id = a.sectionid" .
			"\n WHERE ( $where )" . "\n AND a.state = 1" . "\n AND u.published = 1" . "\n AND b.published = 1" .
			"\n AND a.access <= " . (int) $my->gid . "\n AND b.access <= " . (int) $my->gid . "\n AND u.access <= " . (int)
			$my->gid . "\n AND ( a.publish_up = " . $database->Quote($nullDate) .
			" OR a.publish_up <= " . $database->Quote($now) . " )" . "\n AND ( a.publish_down = " .
			$database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) .
			" )" . "\n GROUP BY a.id" . "\n ORDER BY $order";
	$database->setQuery($query, 0, $limit);
	$list = $database->loadObjectList();
// search static content
	$query = "SELECT STRAIGHT_JOIN a.title AS title," . "\n a.created AS created," . "\n a.introtext AS text," .
			"\n " . $database->Quote(_STATIC_CONTENT) . " AS section," . "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id, '&Itemid=', m.id ) AS href," .
			"\n '2' AS browsernav," . "\n a.id" . "\n FROM #__content AS a" . "\n LEFT JOIN #__menu AS m ON m.componentid = a.id" .
			"\n WHERE ($where)" . "\n AND a.state = 1" . "\n AND a.access <= " . (int) $my->gid . "\n AND m.type = 'content_typed'" .
			"\n AND ( a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) .
			" )" . "\n AND ( a.publish_down = " . $database->Quote($nullDate) .
			" OR a.publish_down >= " . $database->Quote($now) . " )" . "\n GROUP BY a.id" . "\n ORDER BY " . ($morder ?
					$morder : $order);
	$database->setQuery($query, 0, $limit);
	$list2 = $database->loadObjectList();
// поиск архивного содержимого
	$query = "SELECT STRAIGHT_JOIN a.title AS title," . "\n a.created AS created," . "\n a.introtext AS text," .
			"\n CONCAT_WS( '/', " . $database->Quote(_SEARCH_ARCHIVED) .
			", u.title, b.title ) AS section," . "\n CONCAT('index.php?option=com_content&task=view&id=',a.id) AS href," .
			"\n '2' AS browsernav," . "\n 'content' AS type" . "\n FROM #__content AS a" . "\n INNER JOIN #__categories AS b ON b.id=a.catid" .
			"\n INNER JOIN #__sections AS u ON u.id = a.sectionid" . "\n WHERE ( $where )" . "\n AND a.state = -1" .
			"\n AND u.published = 1" . "\n AND b.published = 1" . "\n AND a.access <= " . (int) $my->gid .
			"\n AND b.access <= " . (int) $my->gid . "\n AND u.access <= " . (int) $my->gid . "\n AND ( a.publish_up = " .
			$database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . " )" .
			"\n AND ( a.publish_down = " . $database->Quote($nullDate) .
			" OR a.publish_down >= " . $database->Quote($now) . " )" . "\n ORDER BY $order";
	$database->setQuery($query, 0, $limit);
	$list3 = $database->loadObjectList();
// check if search of nonmenu linked static content is allowed
	if ($nonmenu) {
// collect ids of static content items linked to menu items
// so they can be removed from query that follows
		$ids = null;
		if (count($list2)) {
			foreach ($list2 as $static) {
				$ids[] = (int) $static->id;
			}
			$ids = "a.id != " . implode(" OR a.id != ", $ids);
		}
// search static content not connected to a menu
		$query = "SELECT STRAIGHT_JOIN a.title AS title," . "\n a.created AS created," . "\n a.introtext AS text," .
				"\n '2' as browsernav, " . $database->Quote(_STATIC_CONTENT) . " AS section," . "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id ) AS href," .
				"\n a.id" . "\n FROM #__content AS a" . "\n WHERE ($where)" . (($ids) ? "\n AND ( $ids )" :
						'') . "\n AND a.state = 1" . "\n AND a.access <= " . (int) $my->gid . "\n AND a.sectionid = 0" .
				"\n AND ( a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) .
				" )" . "\n AND ( a.publish_down = " . $database->Quote($nullDate) .
				" OR a.publish_down >= " . $database->Quote($now) . " )" . "\n ORDER BY " . ($morder ? $morder :
						$order);
		$database->setQuery($query, 0, $limit);
		$list4 = $database->loadObjectList();
	} else {
		$list4 = array();
	}
	return array_merge($list, $list2, $list3, (array) $list4);
}
?>