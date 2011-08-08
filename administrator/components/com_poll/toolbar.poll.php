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

require_once ($mainframe->getPath('toolbar_html'));

switch($task) {
	case 'new':
		TOOLBAR_poll::_NEW();
		break;

	case 'edit':
		$cid = josGetArrayInts('cid');

		$query = "SELECT published"."\n FROM #__polls"."\n WHERE id = ".(int)$cid[0];
		$database->setQuery($query);
		$published = $database->loadResult();

		$cur_template = $mainframe->getTemplate();

		TOOLBAR_poll::_EDIT($cid[0],$cur_template);
		break;

	case 'editA':
		$id = intval(mosGetParam($_REQUEST,'id',0));

		$query = "SELECT published"."\n FROM #__polls"."\n WHERE id = ".(int)$id;
		$database->setQuery($query);
		$published = $database->loadResult();

		$cur_template = $mainframe->getTemplate();

		TOOLBAR_poll::_EDIT($id,$cur_template);
		break;

	default:
		TOOLBAR_poll::_DEFAULT();
		break;
}
?>