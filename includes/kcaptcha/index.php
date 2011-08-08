<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или LICENSE.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для просмотра подробностей и замечаний об авторском праве, смотрите файл COPYRIGHT.php.
*/
error_reporting(E_ALL);
include ('kcaptcha.php');
if(isset($_REQUEST[session_name()])) {
session_start();
}
$captcha = new KCAPTCHA();
if($_REQUEST[session_name()]) {
$_SESSION['captcha_keystring'] = $captcha->getKeyString();
}
?>