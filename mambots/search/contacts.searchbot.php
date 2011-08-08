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
$_MAMBOTS->registerFunction('onSearch', 'botSearchContacts');

/**
* ����� ������ ���������
* ������ sql ������ ���������� ����, ������������ � ������� �������� 
* �����������: href, title, section, created, text, browsernav
* @param ���������� ���� ������
* @param ������������ ���������: exact|any|all
* @param ���������� ������� ����������: newest|oldest|popular|alpha|category
*/
function botSearchContacts($text, $phrase = '', $ordering = '') {
	global $database, $my, $_MAMBOTS;
// check if param query has previously been processed
	if (!isset($_MAMBOTS->_search_mambot_params['contacts'])) {
// load mambot params info
		$query = "SELECT params" . "\n FROM #__mambots" . "\n WHERE element = 'contacts.searchbot'" .
				"\n AND folder = 'search'";
		$database->setQuery($query);
		$database->loadObject($mambot);
// save query to class variable
		$_MAMBOTS->_search_mambot_params['contacts'] = $mambot;
	}
// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['contacts'];
	$botParams = new mosParameters($mambot->params);
	$limit = $botParams->def('search_limit', 50);
	$text = trim($text);
	if ($text == '') {
		return array();
	}
	$section = _CONTACT_TITLE;
	switch ($ordering) {
		case 'alpha':
			$order = 'a.name ASC';
			break;
		case 'category':
			$order = 'b.title ASC, a.name ASC';
			break;
		case 'popular':
		case 'newest':
		case 'oldest':
		default:
			$order = 'a.name DESC';
			break;
	}
	$query = "SELECT a.name AS title," . "\n CONCAT_WS( ', ', a.name, a.con_position, a.misc ) AS text," .
			"\n '' AS created," . "\n CONCAT_WS( ' / ', " . $database->Quote($section) .
			", b.title ) AS section," . "\n '2' AS browsernav," . "\n CONCAT( 'index.php?option=com_contact&task=view&contact_id=', a.id ) AS href" .
			"\n FROM #__contact_details AS a" . "\n INNER JOIN #__categories AS b ON b.id = a.catid" .
			"\n WHERE ( a.name LIKE '%$text%'" . "\n OR a.misc LIKE '%$text%'" . "\n OR a.con_position LIKE '%$text%'" .
			"\n OR a.address LIKE '%$text%'" . "\n OR a.suburb LIKE '%$text%'" . "\n OR a.state LIKE '%$text%'" .
			"\n OR a.country LIKE '%$text%'" . "\n OR a.postcode LIKE '%$text%'" . "\n OR a.telephone LIKE '%$text%'" .
			"\n OR a.fax LIKE '%$text%' )" . "\n AND a.published = 1" . "\n AND b.published = 1" .
			"\n AND a.access <= " . (int) $my->gid . "\n AND b.access <= " . (int) $my->gid . "\n GROUP BY a.id" .
			"\n ORDER BY $order";
	$database->setQuery($query, 0, $limit);
	$rows = $database->loadObjectList();
	return $rows;
}
?>