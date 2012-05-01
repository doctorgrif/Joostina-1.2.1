<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
// load the html drawing class
require_once ($mainframe->getPath('front_html'));
global $database, $my, $mainframe;
global $mosConfig_live_site, $mosConfig_frontend_login, $mosConfig_db, $mosConfig_session_front;
if ($mosConfig_frontend_login != null && ($mosConfig_frontend_login === 0 || $mosConfig_frontend_login
		=== '0' || $mosConfig_session_front != 0)) {
	header('HTTP/1.0 403 Forbidden');
	echo _NOT_AUTH;
	return;
}
$menu = $mainframe->get('menu');
$params = new mosParameters($menu->params);
$params->def('page_title', 1);
$params->def('header_login', $menu->name);
$params->def('header_logout', $menu->name);
$params->def('pageclass_sfx', '');
$params->def('back_button', $mainframe->getCfg('back_button'));
$params->def('login', $mosConfig_live_site);
$params->def('logout', $mosConfig_live_site);
$params->def('login_message', 0);
$params->def('logout_message', 0);
$params->def('description_login', 1);
$params->def('description_logout', 1);
$params->def('description_login_text', _LOGIN_DESCRIPTION);
$params->def('description_logout_text', _LOGOUT_DESCRIPTION);
$params->def('image_login', 'key.jpg');
$params->def('image_logout', 'key.jpg');
$params->def('image_login_align', 'right');
$params->def('image_logout_align', 'right');
$params->def('registration', $mainframe->getCfg('allowUserRegistration'));
$image_login = '';
$image_logout = '';
if ($params->get('image_login') != -1) {
	$image = $mosConfig_live_site . '/images/stories/' . $params->get('image_login');
	$image_login = '<figure><img src="' . $image . '" align="' . $params->get('image_login_align') . '" hspace="10" alt="Login" /></figure>';
}
if ($params->get('image_logout') != -1) {
	$image = $mosConfig_live_site . '/images/stories/' . $params->get('image_logout');
	$image_logout = '<figure><img src="' . $image . '" align="' . $params->get('image_logout_align') . '" hspace="10" alt="Logout" /></figure>';
}
if ($my->id) {
	loginHTML::logoutpage($params, $image_logout);
} else {
	loginHTML::loginpage($params, $image_login);
}
?>