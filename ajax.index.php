<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// Установка флага, что это - родительский файл
define('_VALID_MOS', 1);
require ('globals.php');
require_once ('configuration.php');
require_once ('includes/definitions.php');
// обработка безопасного режима
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://' . substr($mosConfig_live_site, 7);
}
require_once ('includes/joomla.php');
// ошибка 503
if ($mosConfig_offline == 1) {
	header('HTTP/1.1 503 Service Temporarily Unavailable');
	header('Status: 503 Service Temporarily Unavailable');
	header('Retry-After: 3600');
	require ($mosConfig_absolute_path . '/offline.php');
}
// автоматическая перекодировка в юникод, по умолчанию актвино
$utf_conv = intval(mosGetParam($_REQUEST, 'utf', 1));
$option = strval(strtolower(mosGetParam($_REQUEST, 'option', '')));
$task = strval(mosGetParam($_REQUEST, 'task', ''));
$commponent = str_replace('com_', '', $option);
// главное окно рабочего компонента API, для взаимодействия многих 'ядер'
$mainframe = new mosMainFrame($database, $option, '.');
$mainframe->initSession();
// загрузка файла русского языка по умолчанию
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ($mosConfig_absolute_path . '/language/' . $mosConfig_lang . '.php');
// получение информацию о пользователе из таблицы сессий
$my = $mainframe->getUser();
// обнаружение первого посещения
// $mainframe->detect();
$gid = intval($my->gid);
// в зависимости от использования автоперекодировки в UTF-8
if ($utf_conv) {
	header('Content-type: text/html; charset=utf-8');
	ob_start();
} else {
	header('Content-type: text/html; ' . _ISO . '');
}
// проверяем, какой файл необходимо подключить, данные берутся из пришедшего GET запроса
if (file_exists($mosConfig_absolute_path . '/components/' . $option . '/' . $commponent . '.ajax.php')) {
	include_once ($mosConfig_absolute_path . '/components/' . $option . '/' . $commponent . '.ajax.php');
} else {
	die('error-1');
}
if ($utf_conv) {
	$_ajax_body = ob_get_contents();
	ob_end_clean();
// если активированна автоматическая перекодировка в юникод - выводим перекодированный текст
	echo joostina_api::convert($_ajax_body, 1);
}
?>