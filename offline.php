<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license ��������  http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
/* ������ ������� ������� */
defined('_VALID_MOS') or die();
global $database;
global $mosConfig_absolute_path, $mosConfig_live_site, $cur_template, $mosConfig_sitename, $mosConfig_lang, $admin, $mosConfig_favicon, $mosConfig_favicon_ie, $mosConfig_favicon_ipad, $mosConfig_offline, $adminOffline, $_VERSION, $mosConfig_error_message, $mosConfig_offline_message, $mosSystemError;
$adminOffline = false;
if (!defined('_INSTALL_CHECK')) {
	session_name(md5($mosConfig_live_site));
	session_start();
	if (class_exists('mosUser')) {
/* �������������� ��������� ���������� ������ */
		$admin = new mosUser($database);
		$admin->id = intval(mosGetParam($_SESSION, 'session_user_id', ''));
		$admin->username = strval(mosGetParam($_SESSION, 'session_username', ''));
		$admin->usertype = strval(mosGetParam($_SESSION, 'session_usertype', ''));
		$session_id = mosGetParam($_SESSION, 'session_id', '');
		$logintime = mosGetParam($_SESSION, 'session_logintime', '');
/* �������� ������� ������ ������ � ���� ������ */
		if ($session_id == md5($admin->id . $admin->username . $admin->usertype . $logintime)) {
			$query = "SELECT* FROM #__session WHERE session_id = " . $database->Quote($session_id) . "\n AND username = " . $database->Quote($admin->username) . "\n AND userid = " .
					intval($admin->id);
			$database->setQuery($query);
			if (!$result = $database->query()) {
				echo $database->stderr();
			}
			if ($database->getNumRows($result) == 1) {
				define('_ADMIN_OFFLINE', 1);
			}
		}
	}
}
if (!defined('_ADMIN_OFFLINE') || defined('_INSTALL_CHECK')) {
	//@include_once ('language/'.$mosConfig_lang.'.php');
	include_once ('language/'.$mosConfig_lang.'.php');
	if ($database != null) {
/* ��������� �������� ������� ����� �� ��������� */
		$query = "SELECT template FROM #__templates_menu WHERE client_id = 0 AND menuid = 0";
		$database->setQuery($query);
		$cur_template = $database->loadResult();
		$path = $mosConfig_absolute_path.'/templates/' .$cur_template.'/index.php';
		if (!file_exists($path)) {
			$cur_template = 'newline';
		}
	} else {
		$cur_template = 'newline';
	}
/* ��������� ��� ���������� ������ ISO �� ��������� ��������� ����� _ISO */
	$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $mosConfig_sitename;?> - <?php echo _SITE_OFFLINE;?></title>
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/administrator/templates/joostfree/css/admin_login.css" media="screen, projection" />
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/templates/css/offline.css" />
<?php
/* favicon */
	if (!$mosConfig_favicon) {
		$mosConfig_favicon = 'favicon.png';
	}
		$icon = $mosConfig_absolute_path.'/'.$mosConfig_favicon;
	if (!file_exists($icon)) {
		$icon = $mosConfig_live_site.'/favicon.png';
	} else {
		$icon = $mosConfig_live_site.'/'.$mosConfig_favicon;
	}
/* IE */
	if (!$mosConfig_favicon_ie) {
		$mosConfig_favicon_ie = 'favicon.ico';
	}
		$icon_ie = $mosConfig_absolute_path.'/'.$mosConfig_favicon_ie;
	if (!file_exists($icon_ie)) {
		$icon_ie = $mosConfig_live_site.'/favicon.ico';
	} else {
		$icon_ie = $mosConfig_live_site.'/'.$mosConfig_favicon_ie;
	}
/* i������ */
	if (!$mosConfig_favicon_ipad) {
		$mosConfig_favicon_ipad = 'apple-touch-icon.png';
	}
		$icon_ipad = $mosConfig_absolute_path.'/'.$mosConfig_favicon_ipad;
	if (!file_exists($icon_ipad)) {
		$icon_ipad = $mosConfig_live_site.'/apple-touch-icon.png';
	} else {
		$icon_ipad = $mosConfig_live_site.'/'.$mosConfig_favicon_ipad;
	}
?>
<link rel="icon" type="image/png" href="<?php echo $icon;?>" />
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
echo '<link rel="shortcut icon" type="image/x-icon" href="'.$icon_ie.'" />';
}
?>
<link rel="apple-touch-icon" href="<?php echo $icon_ipad;?>" />
<meta http-equiv="Content-Type" content="text/html;<?php echo _ISO;?>" />
<title><?php echo $mosConfig_sitename;?> - <?php echo $mosConfig_offline_message;?></title>
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template;?>/css/style.css" />
</head>
<body id="joooffline">
	<div id="joo"></div>
	<div id="ctr1">
		<div class="outline">
			<div class="image"><img src="<?php echo $mosConfig_live_site;?>/images/syte_off.png" alt="���� ��������!" /></div>
			<div><h1><?php echo $mosConfig_sitename;?></h1></div>
			<?php if ($mosConfig_offline == 1) { ?>
			<div class="offlinemessage">
				<p class="strong"><?php echo $mosConfig_offline_message;?></p>
			</div>
			<?php } else if (@$mosSystemError) { ?>
			<div class="errormessage">
				<p class="strong"><?php echo $mosConfig_error_message;?></p>
				<p class="err"><?php echo defined('_SYSERR'.$mosSystemError) ? constant('_SYSERR'.$mosSystemError) : $mosSystemError;?></span></p>
			</div>
			<?php } else { ?>
			<div class="installwarning"><p class="strong"><?php echo _INSTALL_WARN;?></p></div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
<div id="footeroff">
	<div><?php echo $_VERSION->URL;?></div>
</div>
</body>
</html>
<?php exit(0); } ?>