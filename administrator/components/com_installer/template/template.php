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

$client		= mosGetParam($_REQUEST,'client','');
$userfile	= mosGetParam($_REQUEST,'userfile',dirname(__file__));
$userfile	= mosPathName($userfile);

HTML_installer::showInstallForm('Установка шаблона <small><small>[ '.($client =='admin'?'Админцентр':'Сайта').' ]</small></small>',$option,'template',$client,$userfile,'<a href="index2.php?option=com_templates&client='.$client.'">Перейти в Управление шаблонами</a>');
?>
<table class="adminlist">
<?php
writableCell('media');
writableCell(ADMINISTRATOR_DIRECTORY.'/templates');
writableCell('templates');
writableCell('images/stories');
?>
</table>