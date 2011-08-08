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

$scid = mosGetParam($_POST,'scid','');

switch($task) {
	case 'content_typed':
		// this is the new item, ie, the same name as the menu `type`
		content_typed_menu::edit(0,$menutype,$option);
		break;

	case 'edit':
		content_typed_menu::edit($cid[0],$menutype,$option);
		break;

	case 'save':
	case 'apply':
		saveMenu($option,$task);
		break;

	case 'redirect':
		content_typed_menu::redirect($scid);
		break;
}
?>