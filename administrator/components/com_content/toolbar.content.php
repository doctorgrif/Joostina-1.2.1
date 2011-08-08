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
	case 'new_content_typed':
	case 'new_content_section':
	case 'edit':
	case 'editA':
	case 'edit_content_typed':
		TOOLBAR_content::_EDIT();
		break;

	case 'showarchive':
		TOOLBAR_content::_ARCHIVE();
		break;

	case 'movesect':
		TOOLBAR_content::_MOVE();
		break;

	case 'copy':
		TOOLBAR_content::_COPY();
		break;

	default:
		TOOLBAR_content::_DEFAULT();
		break;
}
?>
