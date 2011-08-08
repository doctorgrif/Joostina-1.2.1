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

/**
* Configuration settings for frontend file browsing
*/

// ALLOW FRONTEND BROWSING ? Change to
//$frontend_enabled = true; // If needed!
$frontend_enabled = false;

// THE SUBDIRECTORY USERS CAN BROWSE INCLUDING ALL SUBDIRECTORIES
// relative to your physical Joostina root path ($mosConfig_absolute_path)!
// Please note: You currently can't exclude directories or files within
// the specified directory. All files and directories will be visible and downloadable
$subdir = '/dmdocuments';

?>
