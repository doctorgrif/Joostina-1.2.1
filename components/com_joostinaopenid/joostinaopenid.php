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
// load the html drawing class
require_once( $mainframe->getPath('front_html', 'com_joostinaopenid') );
global $database, $my, $mainframe;
global $mosConfig_live_site, $mosConfig_frontend_login, $mosConfig_db;
if ($mosConfig_frontend_login != NULL && ($mosConfig_frontend_login === 0 || $mosConfig_frontend_login === '0')) {
	echo _NOT_AUTH;
	return;
}
switch ($task) {
	case 'try_auth':
		if (empty($_GET['openid_url'])) {
			$error = 'Expected an OpenID URL.';
			JoostinaOpenID_HTML::show_finish_error($option, $error);
			break;
		}
		isRemember($_GET['remember'], $_GET['openid_url']);
		require_once($mosConfig_absolute_path . '/components/com_joostinaopenid/php-openid/try_auth.php' );
		break;
	case 'finish_auth':
		require_once($mosConfig_absolute_path . '/components/com_joostinaopenid/php-openid/finish_auth.php' );
		openid_registration($esc_identity, $sreg);
		JoostinaOpenID_HTML::show_finish_success($option, $success);
		break;
	default:
		JoostinaOpenID_HTML::show_login($option);
		break;
}

function isRemember($remember, $openidUrl) {
	if (isset($remember)) {
		$rememberCookie = $_COOKIE['joostinaopenidremember'];
//if cookie does not exist or if openid url is different from cookie : set the cookie
		if (!$rememberCookie || $rememberCookie != $openidUrl) {
			$duree = 365 * 24 * 60 * 60; // 1 year
			setcookie('joostinaopenidremember', $openidUrl, $_SERVER['REQUEST_TIME'] + $duree, '/');
		}
	}
	if (!isset($remember)) {
		setcookie('joostinaopenidremember', '', $_SERVER['REQUEST_TIME'] - 3600, '/');
	}
}

function openid_registration($esc_identity, $sreg) {
	global $database, $mainframe;
	global $mosConfig_live_site;
	$password = md5(session_id());
//check if the user has already been created
	$is_slash = substr($esc_identity, strlen($esc_identity) - 1, strlen($esc_identity));
	if ($is_slash == '/') {
		$esc_identity = substr($esc_identity, 0, strlen($esc_identity) - 1);
	}
	$query = "SELECT id, name, username, password, usertype, block, gid FROM #__users WHERE username='$esc_identity'";
	$database->setQuery($query);
	$result_isUserCreated = $database->loadResult();
// if user not exist : we create him
// if user exist : juste go auto-login
	if (!$result_isUserCreated) {
		$name = $sreg['nickname'];
		$email = $sreg['email'];
		$currDate = date('Y-m-d H:i:s');
		$query = "INSERT INTO #__users ( id , name , username , email , password , usertype , block , sendEmail , gid , registerDate , lastvisitDate , activation , params ) " .
				"VALUES ('$row->id', '$name', '$esc_identity', '$email', '$password', 'Registered', '0', '0', '18', '$currDate', '$currDate', '', 'editor=')";
		$database->setQuery($query);
		if (!$database->query()) {
			die($database->stderr(true));
		}
		$query = "SELECT id, name, username, password, usertype, block, gid FROM #__users WHERE username='$esc_identity'";
		$database->setQuery($query);
		if (!$database->query()) {
			die($database->stderr(true));
		}
		$database->loadObject($user);
// ACL update
		$query = "INSERT INTO #__core_acl_aro ( aro_id , section_value , value , order_value , name , hidden ) " .
				"VALUES ('', 'users', '$user->id', '0', '$user->username', '0')";
		$database->setQuery($query);
		if (!$database->query()) {
			die($database->stderr(true));
		}
		$query = "SELECT aro_id FROM #__core_acl_aro WHERE value='$user->id'";
		$database->setQuery($query);
		$aro_id = $database->loadResult();
		$database->loadObject($result);
// ACL update
		$query = "INSERT INTO #__core_acl_groups_aro_map ( group_id , aro_id ) " .
				"VALUES ('18', '$aro_id')";
		$database->setQuery($query);
		if (!$database->query()) {
			die($database->stderr(true));
		}
	} else {
		$database->loadObject($user);
// MAJ pour Joomla 1.0.15
		if ((strpos($password, ':') === false)) {
// Conversion to new type
			$query = "UPDATE #__users SET password = '" . md5($password) . "' WHERE id ='" . $user->id . "'";
		} else {
// old type
			$query = "UPDATE #__users SET password = '" . $password . "' WHERE id ='" . $user->id . "'";
		}
		$database->setQuery($query);
		if (!$database->query()) {
			die($database->stderr(true));
		}
	}
// AUTO-LOGIN
	$mainframe->login($user->username, $password, 0, NULL);
	header('Location: ' . sefRelToAbs('index.php?option=com_frontpage&amp;Itemid=1'));
}

?>