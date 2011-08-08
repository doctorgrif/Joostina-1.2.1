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

// ensure user has access to this function
if(!$acl->acl_check('administration','install','users',$my->usertype,$element.'s','all')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

$backlink = '<a href="index2.php?option=com_languages">'._GOTO_LANG_MANAGEMENT.'</a>';
HTML_installer::showInstallForm(_INTALL_LANG,$option,'language','',dirname(__file__),$backlink);
?>
<table class="adminlist">
<?php
writableCell('media');
writableCell('language');
?>
</table>