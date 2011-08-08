<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
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