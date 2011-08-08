<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined( '_VALID_MOS' ) or die();
// on include 'admin.hello.html.php':
require_once( $mainframe->getPath( 'admin_html' ) );
// get the task:
$task = mosGetParam( $_REQUEST, 'task', '' );
//switch:
switch ($task) {
default:
JoostinaOpenID::Bienvenue();
break;
}
?>