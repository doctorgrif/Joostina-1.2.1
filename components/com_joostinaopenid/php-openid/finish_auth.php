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
require_once($mosConfig_absolute_path . '/components/com_joostinaopenid/php-openid/common.php' );
session_start();
// Complete the authentication process using the server's response.
$response = $consumer->complete($_GET);
if ($response->status == Auth_OpenID_CANCEL) {
// This means the authentication was cancelled.
	$msg = 'Подтверждение отменено.';
} else if ($response->status == Auth_OpenID_FAILURE) {
	$msg = 'OpenID авторизация прервана: ' . $response->message;
} else if ($response->status == Auth_OpenID_SUCCESS) {
// This means the authentication succeeded.
	$openid = $response->identity_url;
	$esc_identity = htmlspecialchars($openid, ENT_QUOTES);
	$success = sprintf('Идентификация ' . '<a href="%s">%s</a> успешно произведена.', $esc_identity, $esc_identity);
	if ($response->endpoint->canonicalID) {
		$success .= '(XRI CanonicalID: ' . $response->endpoint->canonicalID . ') ';
	}
	$sreg = $response->extensionResponse('sreg');
// MODIFICATION YJX - comment $sreg use
	/*
	if (@$sreg['email']) {
		$success .= 'You also returned ' . $sreg['email'] . ' as your email.';
	}
	if (@$sreg['nickname']) {
		$success .= 'Your nickname is ' . $sreg['nickname'] . '.';
	}
	 */
}
// MODIFICATION YJX - comment the following include code
//include 'index.php';
//exit();
?>