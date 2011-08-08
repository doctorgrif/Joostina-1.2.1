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
require_once ($mainframe->getPath('toolbar_default'));

$cid = josGetArrayInts('cid');

switch($task) {
		// Category
	case 'newcategory':
		menubannerCategory::NEW_MENU();
		break;

	case 'editcategory':
		menubannerCategory::EDIT_MENU();
		break;

	case 'categories':
		menubannerCategory::DEFAULT_MENU();
		break;

		// Client
	case 'newclient':
		menubannerClient::NEW_MENU();
		break;

	case 'editclient':
		menubannerClient::EDIT_MENU();
		break;

	case 'clients':
		menubannerClient::DEFAULT_MENU();
		break;

		// Banner
	case 'newbanner':
	case 'editbanner':
		menubanners::NEW_EDIT_MENU();
		break;

	case 'banners':
		menubanners::DEFAULT_MENU();
		break;

	case 'restore':
		menubanners::MAIN_MENU();
		break;

	case 'backup':
	case 'restore':
	case 'dorestore':
		break;
}
?>
