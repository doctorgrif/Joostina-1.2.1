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
$path_extra = dirname(dirname(dirname(__FILE__)));
$path = ini_get('include_path');
$path = $path_extra . ':' . $path;
ini_set('include_path', $path);
/** Require the OpenID consumer code. */
require_once($mosConfig_absolute_path . '/includes/openid/Auth/OpenID/Consumer.php' );
/** Require the "file store" module, which we'll need to store OpenID information. */
require_once($mosConfig_absolute_path . '/includes/openid/Auth/OpenID/FileStore.php' );
/**
* This is where the example will store its OpenID information. You should change this path if you want
* the example store to be created elsewhere. After you're done playing with the example script, you'll
* have to remove this directory manually.
*/
$store_path = '/tmp/_php_consumer_joostinaopenid';
if (!file_exists($store_path) &&
		!mkdir($store_path)) {
	print 'Невозможно создать дирректорию FileStore по пути ' . $store_path . '. Проверьте соответствие прав доступа.';
	exit(0);
}
$store = new Auth_OpenID_FileStore($store_path);
/** Create a consumer object using the store object created earlier. */
$consumer = new Auth_OpenID_Consumer($store);
?>