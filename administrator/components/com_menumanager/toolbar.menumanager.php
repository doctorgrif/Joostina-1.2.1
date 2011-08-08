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
	case 'edit':
		TOOLBAR_menumanager::_NEWMENU();
		break;

	case 'copyconfirm':
		TOOLBAR_menumanager::_COPYMENU();
		break;

	case 'deleteconfirm':
		TOOLBAR_menumanager::_DELETE();
		break;

	default:
		TOOLBAR_menumanager::_DEFAULT();
		break;
}
?>