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

	case 'view':
		TOOLBAR_messages::_VIEW();
		break;

	case 'new':
	case 'edit':
	case 'reply':
		TOOLBAR_messages::_EDIT();
		break;

	case 'config':
		TOOLBAR_messages::_CONFIG();
		break;

	default:
		TOOLBAR_messages::_DEFAULT();
		break;
}
?>