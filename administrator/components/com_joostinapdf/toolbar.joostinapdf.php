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

switch ($task) {
	case "styleconfig" :
	case "templateconfig" :
	case "headerfooterconfig" :
	case "promotionconfig" :
	case "replacementconfig" :
		TOOLBAR_joostinapdf :: _EDIT_CONFIG();
		break;
	case "cache" :
	case "cacheremovefiles" :
		TOOLBAR_joostinapdf :: _CACHE_CONFIG();
		break;
	case "install" :
	case "do_install" :
	case "restore" :
	case "do_restore" :
		TOOLBAR_joostinapdf :: _CANCEL_CONFIG();
		break;
	//default :
		//TOOLBAR_joostinapdf :: BACKONLY_MENU();
		//break;
}
?>