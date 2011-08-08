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
if (file_exists($mosConfig_absolute_path . '/components/' . $option . '/lang/lang_' . $mosConfig_lang . '.php'))
	include_once($mosConfig_absolute_path . '/components/' . $option . '/lang/lang_' . $mosConfig_lang . '.php' );
else
	include_once($mosConfig_absolute_path . '/components/' . $option . '/lang/lang_english.php' );
require_once($mosConfig_absolute_path . '/components/com_joostinaopenid/php-openid/common.php' );
session_start();
// Render a default page if we got a submission without an openid value.
if (empty($_GET['openid_url'])) {
	$error = 'Expected an OpenID URL.';
	require_once('index.php');
	exit(0);
}
$scheme = 'http';
if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') {
	$scheme .= 's';
}
$openid = $_GET['openid_url'];
// MODIFICATION YJX - define and add $finish_task to $process_url
$finish_task = .sefRelToAbs('index.php?option=com_joostinaopenid&amp;task=finish_auth');
$process_url = sprintf("$scheme://%s:%s%s/$finish_task", $_SERVER['SERVER_NAME'], $_SERVER['SERVER_PORT'], dirname($_SERVER['PHP_SELF']));
$trust_root = sprintf("$scheme://%s:%s%s", $_SERVER['SERVER_NAME'], $_SERVER['SERVER_PORT'], dirname($_SERVER['PHP_SELF']));
//echo $process_url;
// Begin the OpenID authentication process.
$auth_request = $consumer->begin($openid);
// Handle failure status return values.
if (!$auth_request) {
	$error = 'Ошибка аутентификации.';
// MODIFICATION YJX - comment following include + exit code
//include 'index.php';
//exit(0);
// MODIFICATION YJX - call the function
	JoostinaOpenID_HTML::show_finish_error($option, $error);
} else { //MODIFICATION YJX - add else function to catch the error
//required
	if (REQUIRED_PARAM != 'REQUIRED_PARAM') {
		$auth_request->addExtensionArg('sreg', 'required', REQUIRED_PARAM);
	}
//optional
	if (OPIONAL_PARAM != 'OPIONAL_PARAM') {
		$auth_request->addExtensionArg('sreg', 'optional', OPIONAL_PARAM);
	}
// Redirect the user to the OpenID server for authentication. Store the token for this authentication so we can verify the response.
	$redirect_url = $auth_request->redirectURL($trust_root, $process_url);
//echo $redirect_url;
//exit();
	header('Location: ' . $redirect_url);
}
?>