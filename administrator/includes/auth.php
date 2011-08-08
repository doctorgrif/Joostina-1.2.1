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

$basePath = dirname(__file__);
require ($basePath . '/../../globals.php');

// $basepath reintialization required as globals.php will kill initial when RGs Emulation `Off`
$basePath = dirname(__file__);
require ($basePath . '/../../configuration.php');

// SSL check - $http_host returns <live site url>:<port number if it is 443>
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset
				($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://' . substr($mosConfig_live_site, 7);
}

if (!defined('_MOS_MAMBO_INCLUDED')) {
	$path = $basePath . '/../../includes/joomla.php';
	require ($path);
}

global $database, $my;

session_name(md5($mosConfig_live_site));
session_start();
// restore some session variables
if (!isset($my)) {
	$my = new mosUser($database);
}

$my->id = intval(mosGetParam($_SESSION, 'session_user_id', ''));
$my->username = strval(mosGetParam($_SESSION, 'session_username', ''));
$my->usertype = strval(mosGetParam($_SESSION, 'session_usertype', ''));
$my->gid = intval(mosGetParam($_SESSION, 'session_gid', ''));
$session_id = strval(mosGetParam($_SESSION, 'session_id', ''));
$logintime = strval(mosGetParam($_SESSION, 'session_logintime', ''));

if ($session_id != md5($my->id . $my->username . $my->usertype . $logintime)) {
	mosRedirect('index.php');
	die;
}
?>
