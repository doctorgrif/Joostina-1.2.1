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

$task = mosGetParam($_REQUEST,'task','');

switch($task) {
	case 'new':
	case 'edit':
	case 'editA':
		QI_Toolbar::_edit();
		break;

	case 'chooseIcon':
		QI_Toolbar::_chooseIcon();
		break;

	default:
		QI_Toolbar::_show();
		break;
}
?>