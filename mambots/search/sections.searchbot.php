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
$_MAMBOTS->registerFunction('onSearch', 'botSearchSections');
/**
* ����� ������ ������
* ������ sql ������ ���������� ����, ������������ � ������� �������� 
* �����������: href, title, section, created, text, browsernav
* @param ���������� ���� ������
* @param ������������ ���������: exact|any|all
* @param ���������� �������� ����������: newest|oldest|popular|alpha|category
*/
function botSearchSections($text, $phrase = '', $ordering = '') {
	global $database, $my, $_MAMBOTS;
// check if param query has previously been processed
	if (!isset($_MAMBOTS->_search_mambot_params['sections'])) {
// load mambot params info
		$query = "SELECT params" . "\n FROM #__mambots" . "\n WHERE element = 'sections.searchbot'" .
				"\n AND folder = 'search'";
		$database->setQuery($query);
		$database->loadObject($mambot);
// save query to class variable
		$_MAMBOTS->_search_mambot_params['sections'] = $mambot;
	}
// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['sections'];
	$botParams = new mosParameters($mambot->params);
	$limit = $botParams->def('search_limit', 50);
	$text = trim($text);
	if ($text == '') {
		return array();
	}
	switch ($ordering) {
		case 'alpha':
			$order = 'a.name ASC';
			break;
		case 'category':
		case 'popular':
		case 'newest':
		case 'oldest':
		default:
			$order = 'a.name DESC';
	}
	$query = "SELECT a.name AS title," . "\n a.description AS text," . "\n '' AS created," .
			"\n '2' AS browsernav," . "\n a.id AS secid, m.id AS menuid, m.type AS menutype" .
			"\n FROM #__sections AS a" . "\n LEFT JOIN #__menu AS m ON m.componentid = a.id" .
			"\n WHERE ( a.name LIKE '%$text%'" . "\n OR a.title LIKE '%$text%'" . "\n OR a.description LIKE '%$text%' )" .
			"\n AND a.published = 1" . "\n AND a.access <= " . (int) $my->gid . "\n AND ( m.type = 'content_section' OR m.type = 'content_blog_section' )" .
			"\n GROUP BY a.id" . "\n ORDER BY $order";
	$database->setQuery($query, 0, $limit);
	$rows = $database->loadObjectList();
	$count = count($rows);
	for ($i = 0; $i < $count; ++$i) {
		if ($rows[$i]->menutype == 'content_section') {
			$rows[$i]->href = 'index.php?option=com_content&amp;task=section&amp;id=' . $rows[$i]->secid . '&amp;Itemid=' . $rows[$i]->menuid;
			$rows[$i]->href = sefRelToAbs($rows[$i]->href);
			$rows[$i]->section = _SEARCH_SECLIST;
		}
		if ($rows[$i]->menutype == 'content_blog_section') {
			$rows[$i]->href = 'index.php?option=com_content&amp;task=blogsection&amp;id=' . $rows[$i]->secid . '&amp;Itemid=' . $rows[$i]->menuid;
			$rows[$i]->href = sefRelToAbs($rows[$i]->href);
			$rows[$i]->section = _SEARCH_SECBLOG;
		}
	}
	return $rows;
}
?>