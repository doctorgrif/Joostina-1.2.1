<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

define("_VALID_MOS",1);

// Include common.php
require_once ('common.php');
// ���������� ������������ ����� ������ � ����� ������ - ��� �����������
require_once ('../includes/database/database/database.php');

$DBhostname		= mosGetParam($_POST,'DBhostname','');
$DBuserName		= mosGetParam($_POST,'DBuserName','');
$DBpassword		= mosGetParam($_POST,'DBpassword','');
$DBname			= mosGetParam($_POST,'DBname','');
$DBPrefix		= mosGetParam($_POST,'DBPrefix','');
$DBold			= intval(mosGetParam($_POST,'DBold',0));
$sitename		= mosGetParam($_POST,'sitename','');
$adminEmail		= mosGetParam($_POST,'adminEmail','');
$siteUrl		= mosGetParam($_POST,'siteUrl','');
$absolutePath	= mosGetParam($_POST,'absolutePath','');
$adminPassword	= mosGetParam($_POST,'adminPassword','');
$adminLogin		= mosGetParam($_POST,'adminLogin','');
$filePerms		= '';

if(mosGetParam($_POST,'filePermsMode',0))
		$filePerms = '0'.(
		mosGetParam($_POST,'filePermsUserRead',0)* 4
		+ mosGetParam($_POST,'filePermsUserWrite',0)* 2
		+ mosGetParam($_POST,'filePermsUserExecute',0)).
		(mosGetParam($_POST,'filePermsGroupRead',0)* 4
		+ mosGetParam($_POST,'filePermsGroupWrite',0)* 2
		+ mosGetParam($_POST,'filePermsGroupExecute',0)).
		(mosGetParam($_POST,'filePermsWorldRead',0)* 4
		+ mosGetParam($_POST,'filePermsWorldWrite',0)* 2
		+ mosGetParam($_POST,'filePermsWorldExecute',0));

$dirPerms = '';
if(mosGetParam($_POST,'dirPermsMode',0))
		$dirPerms = '0'.(
		mosGetParam($_POST,'dirPermsUserRead',0)* 4
		+ mosGetParam($_POST,'dirPermsUserWrite',0)* 2
		+ mosGetParam($_POST,'dirPermsUserSearch',0)).
		(mosGetParam($_POST,'dirPermsGroupRead',0)* 4
		+ mosGetParam($_POST,'dirPermsGroupWrite',0)* 2
		+ mosGetParam($_POST,'dirPermsGroupSearch',0)).
		(mosGetParam($_POST,'dirPermsWorldRead',0)* 4
		+ mosGetParam($_POST,'dirPermsWorldWrite',0)* 2
		+ mosGetParam($_POST,'dirPermsWorldSearch',0));

if((trim($adminEmail == "")) || (preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/",$adminEmail) == false)) {
	echo "<head></head><body><form name=\"stepBack\" method=\"post\" action=\"install3.php\" id=\"stepBack\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBold\" value=\"$DBold\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		<input type=\"hidden\" name=\"filePerms\" value=\"$filePerms\" />
		<input type=\"hidden\" name=\"dirPerms\" value=\"$dirPerms\" />
		<input type=\"hidden\" name=\"adminPassword\" value=\"$adminPassword\" />
		<input type=\"hidden\" name=\"adminLogin\" value=\"$adminLogin\" />
	</form>";
	echo "<script>alert('�� ������ ������� ���������� ����� e-mail ��������������!.'); document.stepBack.submit(); </script></body>";
	exit();
	return;
}

if($DBhostname && $DBuserName && $DBname) {
	$configArray['DBhostname'] = $DBhostname;
	$configArray['DBuserName'] = $DBuserName;
	$configArray['DBpassword'] = $DBpassword;
	$configArray['DBname'] = $DBname;
	$configArray['DBPrefix'] = $DBPrefix;
	$configArray['DBold'] = $DBold;
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBold\" value=\"$DBold\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		<input type=\"hidden\" name=\"filePerms\" value=\"$filePerms\" />
		<input type=\"hidden\" name=\"dirPerms\" value=\"$dirPerms\" />
		<input type=\"hidden\" name=\"adminPassword\" value=\"$adminPassword\" />
		<input type=\"hidden\" name=\"adminLogin\" value=\"$adminLogin\" />
	</form>";

	echo "<script>alert('��������� �������� ��� �� ������� �/��� �����'); document.stepBack.submit(); </script>";
	return;
}

if($sitename) {
	if(!get_magic_quotes_gpc()) {
		$configArray['sitename'] = addslashes($sitename);
	} else {
		$configArray['sitename'] = $sitename;
	}
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBold\" value=\"$DBold\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		<input type=\"hidden\" name=\"filePerms\" value=\"$filePerms\" />
		<input type=\"hidden\" name=\"dirPerms\" value=\"$dirPerms\" />
		<input type=\"hidden\" name=\"adminPassword\" value=\"$adminPassword\" />
		<input type=\"hidden\" name=\"adminLogin\" value=\"$adminLogin\" />
	</form>";

	echo "<script>alert('���� �� ������� �������� �����! '); document.stepBack2.submit();</script>";
	return;
}

if(file_exists('../configuration.php')) {
	$canWrite = is_writable('../configuration.php');
} else {
	$canWrite = is_writable('..');
}

if($siteUrl) {
	$configArray['siteUrl'] = $siteUrl;
	// Fix for Windows
	$absolutePath = str_replace("\\\\","/",$absolutePath);
	$configArray['absolutePath'] = $absolutePath;
	$configArray['filePerms'] = $filePerms;
	$configArray['dirPerms'] = $dirPerms;

	$config = "<?php\n";
	$config .= "\$mosConfig_offline = '0';\n";
	$config .= "\$mosConfig_host = '{$configArray['DBhostname']}';\n";
	$config .= "\$mosConfig_user = '{$configArray['DBuserName']}';\n";
	$config .= "\$mosConfig_password = '{$configArray['DBpassword']}';\n";
	$config .= "\$mosConfig_db = '{$configArray['DBname']}';\n";
	$config .= "\$mosConfig_dbprefix = '{$configArray['DBPrefix']}';\n";
	$config .= "\$mosConfig_dbold = '{$configArray['DBold']}';\n";
	$config .= "\$mosConfig_lang = 'russian';\n";
	$config .= "\$mosConfig_absolute_path = '{$configArray['absolutePath']}';\n";
	$config .= "\$mosConfig_live_site = '{$configArray['siteUrl']}';\n";
	$config .= "\$mosConfig_sitename = '{$configArray['sitename']}';\n";
	$config .= "\$mosConfig_shownoauth = '0';\n";
	$config .= "\$mosConfig_useractivation = '1';\n";
	$config .= "\$mosConfig_uniquemail = '1';\n";
	$config .= "\$mosConfig_offline_message = '<p>���� �������� ������.</p><p>�������� ���� ���������! ����������, ������� �����.</p>';\n";
	$config .= "\$mosConfig_error_message = '<p>���� ����������.</p><p>����������, �������� �� ���� ��������������!</p>';\n";
	$config .= "\$mosConfig_debug = '0';\n";
	$config .= "\$mosConfig_lifetime = '900';\n";
	$config .= "\$mosConfig_session_life_admin = '1800';\n";
	$config .= "\$mosConfig_session_type = '0';\n";
	$config .= "\$mosConfig_MetaDesc = 'Joostina - ����������� ������� ���������� ���������� ���������� ������ � ������ ������� ���������� ���������';\n";
	$config .= "\$mosConfig_MetaKeys = 'Joostina, joostina';\n";
	$config .= "\$mosConfig_MetaTitle = '1';\n";
	$config .= "\$mosConfig_MetaAuthor = '1';\n";
	$config .= "\$mosConfig_locale = 'ru_RU.CP1251';\n";
	$config .= "\$mosConfig_offset = '0';\n";
	$config .= "\$mosConfig_offset_user = '0';\n";
	$config .= "\$mosConfig_hideAuthor = '0';\n";
	$config .= "\$mosConfig_hideCreateDate = '0';\n";
	$config .= "\$mosConfig_hideModifyDate = '1';\n";
	$config .= "\$mosConfig_hidePrint = '0';\n";
	$config .= "\$mosConfig_hidePdf = '0';\n";
	$config .= "\$mosConfig_hideEmail = '1';\n";
	$config .= "\$mosConfig_enable_log_items = '0';\n";
	$config .= "\$mosConfig_enable_log_searches = '0';\n";
	$config .= "\$mosConfig_enable_stats = '0';\n";
	$config .= "\$mosConfig_sef = '0';\n";
	$config .= "\$mosConfig_vote = '1';\n";
	$config .= "\$mosConfig_gzip = '0';\n";
	$config .= "\$mosConfig_multipage_toc = '1';\n";
	$config .= "\$mosConfig_allowUserRegistration = '1';\n";
	$config .= "\$mosConfig_link_titles = '0';\n";
	$config .= "\$mosConfig_error_reporting = '-1';\n";
	$config .= "\$mosConfig_list_limit = '30';\n";
	$config .= "\$mosConfig_caching = '0';\n";
	$config .= "\$mosConfig_cachepath = '{$configArray['absolutePath']}/cache';\n";
	$config .= "\$mosConfig_cachetime = '900';\n";
	$config .= "\$mosConfig_mailer = 'mail';\n";
	$config .= "\$mosConfig_mailfrom = '$adminEmail';\n";
	$config .= "\$mosConfig_fromname = '{$configArray['sitename']}';\n";
	$config .= "\$mosConfig_sendmail = '/usr/sbin/sendmail';\n";
	$config .= "\$mosConfig_smtpauth = '0';\n";
	$config .= "\$mosConfig_smtpuser = '';\n";
	// boston, ���������� ������� ������ �� ������
	$config .= "\$mosConfig_session_front = '0';\n";
	// boston, ���������� RSS
	$config .= "\$mosConfig_syndicate_off = '0';\n";
	// boston, ���������� ���� Generetor
	$config .= "\$mosConfig_generator_off = '0';\n";
	// boston, ���������� �������� ������ system
	$config .= "\$mosConfig_mmb_system_off = '0';\n";
	// boston, ������������� ������ ������� �� ���� ����
	$config .= "\$mosConfig_one_template = '...';\n";
	// boston, ����������� ������� ��������� ��������
	$config .= "\$mosConfig_time_gen = '0';\n";
	// boston, ���������� �������� ������
	$config .= "\$mosConfig_index_print = '0';\n";
	//boston, ����������� ���� ����������
	$config .= "\$mosConfig_index_tag = '0';\n";
	//doctorgrif: Geotagging
	$config .= "\$mosConfig_gtag = '0';\n";
	$config .= "\$mosConfig_gtag_lat = '';\n";
	$config .= "\$mosConfig_gtag_long = '';\n";
	$config .= "\$mosConfig_gtag_place = '';\n";
	$config .= "\$mosConfig_gtag_reg = '';\n";
	//doctorgrif: Dublin Core
	$config .= "\$mosConfig_dcore = '0';\n";
	/*$config .= "\$mosConfig_dcore_title = '';\n";
	$config .= "\$mosConfig_dcore_creator = '';\n";
	$config .= "\$mosConfig_dcore_subject = '';\n";
	$config .= "\$mosConfig_dcore_description = '';\n";
	$config .= "\$mosConfig_dcore_publisher = '';\n";
	$config .= "\$mosConfig_dcore_contributor = '';\n";
	$config .= "\$mosConfig_dcore_date = '';\n";
	$config .= "\$mosConfig_dcore_type = '';\n";
	$config .= "\$mosConfig_dcore_format = '';\n";
	$config .= "\$mosConfig_dcore_identifier = '';\n";
	$config .= "\$mosConfig_dcore_source = '';\n";
	$config .= "\$mosConfig_dcore_language = '';\n";
	$config .= "\$mosConfig_dcore_relation = '';\n";
	$config .= "\$mosConfig_dcore_coverage = '';\n";
	$config .= "\$mosConfig_dcore_rights = '';\n";*/
	//doctorgrif: GA
	$config .= "\$mosConfig_ga = '0';\n";
	$config .= "\$mosConfig_ga_id = '';\n";
	//doctorgrif: ������.�������
	$config .= "\$mosConfig_ym = '0';\n";
	$config .= "\$mosConfig_ym_id = '';\n";
	//boston, ���������� ������� ��� �������������� ����������� �� ������
	$config .= "\$mosConfig_module_on_edit_off = '0';\n";
	// boston, ����������� ������ ��
	$config .= "\$mosConfig_optimizetables = '0';\n";
	// boston, ���������� �������� ������ content
	$config .= "\$mosConfig_mmb_content_off = '0';\n";
	// boston, ������������� captcha ��� ����������� � ������ ����������
	$config .= "\$mosConfig_captcha = '0';\n";
	// boston, ����������� ���� ������ ����������
	$config .= "\$mosConfig_adm_menu_cache = '0';\n";
	// boston, ������������ ��������� title ( ��������� �������� - �������� ����� )
	$config .= "\$mosConfig_pagetitles_first = '1';\n";
	// boston, ������� ������ �� ��������� ������� ��������
	$config .= "\$mosConfig_com_frontpage_clear = '1';\n";
	// boston, ������ ����� ���������
	$config .= "\$mosConfig_media_dir = 'images/stories';\n";
	// boston, ������ ��������� ���������
	$config .= "\$mosConfig_joomlaplorer_dir = null;\n";
	// boston, �������������� ���������� �������� �� �������
	$config .= "\$mosConfig_auto_frontpage = '0';\n";
	// boston, ���������� �������������� ��������
	$config .= "\$mosConfig_uid_news = '0';\n";
	// boston, ������� ���������� �����������
	$config .= "\$mosConfig_content_hits = '1';\n";
	// ������ ����
	$config .= "\$mosConfig_form_date = '%d:%m:%Y �.';\n";
	// ������ ���� � �������
	$config .= "\$mosConfig_form_date_full = '%d.%m.%Y �. %H:%M';\n";
	// ����������� ��� ��������� ��������
	$config .= "\$mosConfig_tseparator = ' - ';\n";
	// �� ������� ������ ����� ��������� ����� �������������
	$config .= "\$mosConfig_adm_session_del = '0';\n";
	// ��������� favicon ��� ������ ����� � ��������
	$config .= "\$mosConfig_disable_favicon = '0';\n";
	$config .= "\$mosConfig_disable_favicon_ie = '0';\n";
	$config .= "\$mosConfig_disable_favicon_ipad = '0';\n";
	// ������� ���� ��� rss
	$config .= "\$mosConfig_feed_timeoffset = '00:00';\n";
	// ������������� ������������ ��������� �� ������ �����
	$config .= "\$mosConfig_front_debug = '0';\n";
	// ���������� �������� ������ mainbody
	$config .= "\$mosConfig_mmb_mainbody_off = '1';\n";
	// ���������� ���������� �������
	$config .= "\$mosConfig_disable_checked_out = '0';\n";
	// ���������� ������ ������
	$config .= "\$mosConfig_disable_button_help = '1';\n";
	// ������������ ������������ ����� ������������� �����������
	$config .= "\$mosConfig_auto_activ_login = '1';\n";
	// ���������� SET sql_mode
	$config .= "\$mosConfig_sql_mode_off = '0';\n";
	// ��������� ��������� ����� h1
	$config .= "\$mosConfig_title_h1 = '0';\n";
	// ��������� ��������� ����� h1 ������ � ������ ������� ��������� �����������
	$config .= "\$mosConfig_title_h1_only_view = '0';\n";
	// ���������� ������� ���������� � ������ ���
	$config .= "\$mosConfig_disable_date_state = '0';\n";
	// ���������� �������� ������ ������� � �����������
	$config .= "\$mosConfig_disable_access_control = '0';\n";
	// ������ css � js ������
	$config .= "\$mosConfig_gz_js_css = '0';\n";
	// ���������� �������� ��� css � html
	$config .= "\$mosConfig_codepress = '0';\n";
	// �������������� ������� �������� ����
	$config .= "\$mosConfig_clearCache = '0';\n";
	// ������������� �������� ������ �� �������� �������� �������
	$config .= "\$mosConfig_custom_print = '0';\n";
	// ��������� �������������� �������
	$config .= "\$mosConfig_module_multilang = '0';\n";
	// ��������� ��� �������� ��
	$config .= "\$mosConfig_db_cache_handler = 'none';\n";




	$config .= "\$mosConfig_smtppass = '';\n";
	$config .= "\$mosConfig_smtphost = 'localhost';\n";
	$config .= "\$mosConfig_back_button = '1';\n";
	$config .= "\$mosConfig_item_navigation = '1';\n";
	$config .= "\$mosConfig_secret = '".mosMakePassword(16)."';\n";
	$config .= "\$mosConfig_pagetitles = '1';\n";
	$config .= "\$mosConfig_readmore = '1';\n";
	$config .= "\$mosConfig_hits = '1';\n";
	$config .= "\$mosConfig_icons = '1';\n";
	$config .= "\$mosConfig_favicon = 'favicon.png';\n";
	$config .= "\$mosConfig_favicon_ie = 'favicon.ico';\n";
	$config .= "\$mosConfig_favicon_ipad = 'apple-touch-icon.png';\n";
	$config .= "\$mosConfig_fileperms = '".$configArray['filePerms']."';\n";
	$config .= "\$mosConfig_dirperms = '".$configArray['dirPerms']."';\n";
	$config .= "\$mosConfig_helpurl = 'http://www.joostina.ru';\n";
	$config .= "\$mosConfig_multilingual_support = '0';\n";
	$config .= "\$mosConfig_editor = 'spaw';\n";
	$config .= "\$mosConfig_admin_expired = '1';\n";
	$config .= "\$mosConfig_frontend_login = '1';\n";
	$config .= "\$mosConfig_frontend_userparams = '1';\n";
	$config .= "setlocale (LC_TIME, \$mosConfig_locale);\n";
	$config .= "?>";

	if($canWrite && ($fp = fopen("../configuration.php","w"))) {
		fputs($fp,$config,strlen($config));
		fclose($fp);
	} else {
		$canWrite = false;
	} // if

	$cryptpass = md5($adminPassword);

	$database = new database($DBhostname,$DBuserName,$DBpassword,$DBname,$DBPrefix);
	$nullDate = $database->getNullDate();

	// �������� ��������������
	$installdate = date('Y-m-d H:i:s');
	$adminLogin = $database->getEscaped($adminLogin);
	$query = "INSERT INTO `#__users` VALUES (62, 'Administrator', '$adminLogin', '$adminEmail', '$cryptpass', 'Super Administrator', 0, 1, 25, '$installdate', '$nullDate', '', '')";
	$database->setQuery($query);
	$database->query();
	// �������� ARO (Access Request Object)
	$query = "INSERT INTO `#__core_acl_aro` VALUES (10,'users','62',0,'Administrator',0)";
	$database->setQuery($query);
	$database->query();
	// add the map between the ARO and the Group
	$query = "INSERT INTO `#__core_acl_groups_aro_map` VALUES (25,'',10)";
	$database->setQuery($query);
	$database->query();

	// chmod files and directories if desired
	$chmod_report = "����� ������� � ������ � ��������� �� ��������.";
	if($filePerms != '' || $dirPerms != '') {
		$mosrootfiles = array('administrator','cache','components','images','language','mambots','media','modules','templates','configuration.php');
		$filemode = null;
		if($filePerms != '') $filemode = octdec($filePerms);
		$dirmode = null;
		if($dirPerms != '') $dirmode = octdec($dirPerms);
		$chmodOk = true;
		foreach($mosrootfiles as $file) {
			if(!mosChmodRecursive($absolutePath.'/'.$file,$filemode,$dirmode)) {
				$chmodOk = false;
			}
		}
		if($chmodOk) {
			$chmod_report = '����� ������� � ������ � ��������� ������� ��������.';
		} else {
			$chmod_report = '����� ������� � ������ � ��������� �� ����� ���� ��������.<br />����������, ���������� CHMOD ��������� � ������ Joostina �������.';
		}
	} // if chmod wanted
} else {
?>
		<form action="install3.php" method="post" name="stepBack3" id="stepBack3">
			<input type="hidden" name="DBhostname" value="<?php echo $DBhostname; ?>" />
			<input type="hidden" name="DBusername" value="<?php echo $DBuserName; ?>" />
			<input type="hidden" name="DBpassword" value="<?php echo $DBpassword; ?>" />
			<input type="hidden" name="DBname" value="<?php echo $DBname; ?>" />
			<input type="hidden" name="DBPrefix" value="<?php echo $DBPrefix; ?>" />
			<input type="hidden" name="DBold" value="<?php echo $DBold; ?>" />
			<input type="hidden" name="DBcreated" value="1" />
			<input type="hidden" name="sitename" value="<?php echo $sitename; ?>" />
			<input type="hidden" name="adminEmail" value="$adminEmail" />
			<input type="hidden" name="siteUrl" value="$siteUrl" />
			<input type="hidden" name="absolutePath" value="$absolutePath" />
			<input type="hidden" name="filePerms" value="$filePerms" />
			<input type="hidden" name="dirPerms" value="$dirPerms" />
		</form>
		<script>alert('URL ����� �� ������'); document.stepBack3.submit();</script>
<?php
}
echo '<?xml version="1.0" encoding="windows-1251"?' . '>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Joostina - Web-���������. ��� 4 - ��������� ���������</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<?php echo '<script type="text/javascript" src="'.$siteUrl.'/includes/js/jquery/jquery.js"></script>'; ?>
</head>
<body>
<div id="ctr" align="center">
<form action="dummy" name="form" id="form">
<div class="install">
	<div id="header">
		<p><?php echo $version; ?></p>
		<p class="jst"><a href="http://www.joostina.ru">Joostina</a> - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL.</p>
	</div>
	<div id="navigator">
		<span style="font-size:larger;">��������� Joostina CMS</span>
		<ul>
			<li class="step"><strong>1</strong><span>�������� �������</span></li>
			<li class="arrow">&nbsp;</li>
			<li class="step"><strong>2</strong><span>������������ ����������</span></li>
			<li class="arrow">&nbsp;</li>
			<li class="step"><strong>3</strong><span>������������ ���� ������</span></li>
			<li class="arrow">&nbsp;</li>
			<li class="step"><strong>4</strong><span>�������� �����</span></li>
			<li class="arrow">&nbsp;</li>
			<li class="step"><strong>5</strong><span>������������ �����</span></li>
			<li class="arrow">&nbsp;</li>
			<li class="step  step-on"><strong>6</strong><span>���������� ���������</span></li>
		</ul>
	</div>
<div id="wrap">
	<div class="install-form">
		<div class="form-block">
			<div class="install-text">����������, <strong> ������� ������� 'INSTALLATION'</strong>, ����� ��� ���� �� ����������</div>
				<input class="button small" type="button" name="runSite" value="�������� �����"
				<?php
					if($siteUrl) {
						echo "onClick=\"window.location.href='$siteUrl/' \"";
					} else {
						echo "onClick=\"window.location.href='".$configArray['siteURL']."/index.php' \"";
					}
				?>/>
				&nbsp;<input class="button small" type="button" name="Admin" value="������ ����������"
				<?php
					if($siteUrl) {
						echo "onClick=\"window.location.href='$siteUrl/administrator/index.php' \"";
					} else {
						echo "onClick=\"window.location.href='".$configArray['siteURL']."/administrator/index.php' \"";
					}
				?>/>
				<?php
					$url = $siteUrl.'/installation/install.ajax.php?task=rminstalldir';
					$clk = 'onclick=\'$.ajax({url: "'.$url.'", beforeSend: function(response){$("#status").show("normal")}, success: function(response){$("#delbutton").val(response); $("#delbutton").click(function(){if(response == "www.joostina.ru") window.location.href="http://www.joostina.ru"}); $("#alert_mess").hide("fast")}, dataType: "html"}); return false;\'';
					$delbutton = '&nbsp;<input class="button small" '.$clk.' type="button" id="delbutton" name="delbutton" value="������� installation" />';
					echo $delbutton;
				?>
			<div id="status" style="display:none;"></div>
				<h2>������ ��� ����������� �������� �������������� �����:</h2>
				�����: <strong><?php echo $adminLogin;?></strong> ������: <strong><?php echo $adminPassword; ?></strong>
				<?php if(!$canWrite) { ?>
				<div class="install-text">
					��� ���������������� ���� ��� ������ ������� ���������� ��� ������, ��� ���� �����-�� �������� � ��������� ��������� ����������������� �����. ��� �������� ��������� ���� ��� �������.<br />����������� �������� � ���������� ���� ��������� ���:
				</div>
				<textarea rows="5" cols="60" name="configcode" onclick="javascript:this.form.configcode.focus();this.form.configcode.select();" >
					<?php echo htmlspecialchars($config); ?>
				</textarea>
				<?php } ?>
				<div>
					<?php echo $chmod_report; ?>
				</div>
		</div>
	</div>
	<div id="break"></div>
</div>
<div class="clr"></div>
</div>
</form>
</div>
<div class="clr"></div>
</body>
</html>