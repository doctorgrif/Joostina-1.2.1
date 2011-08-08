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
	case 'editA':
		TOOLBAR_sections::_EDIT();
		break;

	case 'masadd':
		TOOLBAR_sections::_MASADD();
		break;

	case 'massave':
		TOOLBAR_sections::_MASNEW();
		break;


	case 'copyselect':
		TOOLBAR_sections::_COPY();
		break;

	default:
		TOOLBAR_sections::_DEFAULT();
		break;
}
?>