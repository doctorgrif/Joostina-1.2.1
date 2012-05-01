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
$_MAMBOTS->registerFunction('onSearch', 'botSearchWeblinks');
/**
* ����� ������ ��������-������
* ������ sql ������ ���������� ����, ������������ � ������� �������� 
* �����������: href, title, section, created, text, browsernav
* @param ���������� ���� ������
* @param ������������ ���������: exact|any|all
* @param ���������� �������� ����������: newest|oldest|popular|alpha|category
*/
function botSearchWeblinks($text, $phrase = '', $ordering = '') {
	global $database, $my, $_MAMBOTS;
// check if param query has previously been processed
	if (!isset($_MAMBOTS->_search_mambot_params['weblinks'])) {
// load mambot params info
		$query = "SELECT params" . "\n FROM #__mambots" . "\n WHERE element = 'weblinks.searchbot'"
			."\n AND folder = 'search'";
		$database->setQuery($query);
		$database->loadObject($mambot);
// save query to class variable
		$_MAMBOTS->_search_mambot_params['weblinks'] = $mambot;
	}
// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['weblinks'];
	$botParams = new mosParameters($mambot->params);
	$limit = $botParams->def('search_limit', 50);
	$text = trim($text);
	if ($text == '') {
		return array();
	}
	$section = _WEBLINKS_TITLE;
	$wheres = array();
	switch ($phrase) {
		case 'exact':
			$wheres2 = array();
			$wheres2[] = "LOWER(a.url) LIKE '%$text%'";
			$wheres2[] = "LOWER(a.description) LIKE '%$text%'";
			$wheres2[] = "LOWER(a.title) LIKE '%$text%'";
			$where = '(' . implode(') OR (', $wheres2) . ')';
			break;
		case 'all':
		case 'any':
		default:
			$words = explode(' ', $text);
			$wheres = array();
			foreach ($words as $word) {
				$wheres2 = array();
				$wheres2[] = "LOWER(a.url) LIKE '%$word%'";
				$wheres2[] = "LOWER(a.description) LIKE '%$word%'";
				$wheres2[] = "LOWER(a.title) LIKE '%$word%'";
				$wheres[] = implode(' OR ', $wheres2);
			}
			$where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
			break;
	}
	switch ($ordering) {
		case 'oldest':
			$order = 'a.date ASC';
			break;
		case 'popular':
			$order = 'a.hits DESC';
			break;
		case 'alpha':
			$order = 'a.title ASC';
			break;
		case 'category':
			$order = 'b.title ASC, a.title ASC';
			break;
		case 'newest':
		default:
			$order = 'a.date DESC';
	}
	$query = "SELECT STRAIGHT_JOIN a.title AS title," . "\n a.description AS text," . "\n a.date AS created,"
		."\n CONCAT_WS( ' / ', " . $database->Quote($section) . ", b.title ) AS section," . "\n '1' AS browsernav,"
		."\n a.url AS href" . "\n FROM #__weblinks AS a" . "\n INNER JOIN #__categories AS b ON b.id = a.catid"
		."\n WHERE ($where)" . "\n AND a.published = 1" . "\n AND b.published = 1" . "\n AND b.access <= " . (int)
			$my->gid . "\n ORDER BY $order";
	$database->setQuery($query, 0, $limit);
	$rows = $database->loadObjectList();
	return $rows;
}
?>