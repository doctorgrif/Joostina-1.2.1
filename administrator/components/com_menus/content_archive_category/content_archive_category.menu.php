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

mosAdminMenus::menuItem($type);

switch($task) {
	case 'content_archive_category':
		// this is the new item, ie, the same name as the menu `type`
		content_archive_category_menu::editCategory(0,$menutype,$option);
		break;

	case 'edit':
		content_archive_category_menu::editCategory($cid[0],$menutype,$option);
		break;

	case 'save':
	case 'apply':
		saveMenu($option,$task);
		break;
}
?>