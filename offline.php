<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия  http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* запрет прямого доступа */
defined('_VALID_MOS') or die();
global $database;
global $mosConfig_absolute_path, $mosConfig_live_site, $cur_template, $mosConfig_sitename, $mosConfig_lang, $admin, $mosConfig_favicon, $mosConfig_favicon_ie, $mosConfig_favicon_ipad, $mosConfig_offline, $adminOffline, $_VERSION, $mosConfig_error_message, $mosConfig_offline_message, $mosSystemError;
$adminOffline = false;
if (!defined('_INSTALL_CHECK')) {
	session_name(md5($mosConfig_live_site));
	session_start();
	if (class_exists('mosUser')) {
/* восстановление некоторых переменных сессии */
		$admin = new mosUser($database);
		$admin->id = intval(mosGetParam($_SESSION, 'session_user_id', ''));
		$admin->username = strval(mosGetParam($_SESSION, 'session_username', ''));
		$admin->usertype = strval(mosGetParam($_SESSION, 'session_usertype', ''));
		$session_id = mosGetParam($_SESSION, 'session_id', '');
		$logintime = mosGetParam($_SESSION, 'session_logintime', '');
/* проверка наличия строки сессии в базе данных */
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
/* получение названия шаблона сайта по умолчанию */
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
/* требуется для разделения номера ISO из константы языкового файла _ISO */
	$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<!--[if lt IE 7 ]><html dir="ltr" class="no-js ie6" lang="ru-RU"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" class="no-js ie7" lang="ru-RU"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" class="no-js ie8" lang="ru-RU"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html dir="ltr" class="no-js" lang="ru-RU"><!--<![endif]-->
<head>
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template;?>/css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/templates/css/offline.css" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link title="RSS кафедра госпитальной хирургии" type="application/rss+xml" rel="alternate" href="http://feeds.feedburner.com/hospsurg/DTON/" />
<meta http-equiv="Content-Type" content="text/html;<?php echo _ISO;?>" />
<title><?php echo $mosConfig_sitename;?> - <?php echo $mosConfig_offline_message;?></title>
<?php
// favourites icon
	if (!$mosConfig_disable_favicon) {
			global $mosConfig_favicon_ie, $mosConfig_disable_favicon_ie, $mosConfig_favicon_ipad, $mosConfig_disable_favicon_ipad;
		if ($mosConfig_favicon) {
			$icon = 'favicon.png';
		}
echo '<link rel="icon" href="' . $icon . '" />' . "\n";
	}
	if (!$mosConfig_disable_favicon_ie) {
		if ($mosConfig_favicon_ie) {
			$icon_ie = 'favicon.ico';
		}
echo '<link rel="shortcut icon" href="' . $icon_ie . '" />' . "\n";
	}
	if (!$mosConfig_disable_favicon_ipad) {
		if ($mosConfig_favicon_ipad) {
			$mosConfig_favicon_ipad = 'apple-touch-icon.png';
			$icon_ipad = 'apple-touch-icon.png';
			$icon_ipad_72 = 'apple-touch-icon-72x72.png';
			$icon_ipad_114 = 'apple-touch-icon-114x114.png';
		}
echo '<link rel="apple-touch-icon" href="'.$icon_ipad.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="72x72" href="'.$icon_ipad_72.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="114x114" href="'.$icon_ipad_114.'" />' . "\n";
	}
?>
<?php
if ($_SERVER['HTTP_USER_AGENT']=='MSIE') {
echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/js/modernizr.js"></script>';
}
?>
</head>
<body id="joooffline">
	<div id="joo"></div>
	<div id="ctr1">
	<div class="outline">
		<div class="image"><img src="<?php echo $mosConfig_live_site;?>/images/site_off.png" alt="Сайт выключен!" /></div>
		<div><h1><?php echo $mosConfig_sitename;?></h1></div>
		<?php if ($mosConfig_offline == 1) { ?>
		<div class="offlinemessage">
			<p class="strong"><?php echo $mosConfig_offline_message;?></p>
		</div>
		<div class="description">
			<p><em>Кафедра госпитальной хирургии &ndash; послевузовское и дополнительное профессиональное образование (первичная специализация, тематическое усовершенствование) врачей по общей хирургии, ангиохирургии, кардиохирургии, эндоскопии, токсикологии.</em></p>
		</div>
		<?php } else if (@$mosSystemError) { ?>
		<div class="errormessage">
			<p class="strong"><?php echo $mosConfig_error_message;?></p>
			<p class="err"><?php echo defined('_SYSERR'.$mosSystemError) ? constant('_SYSERR'.$mosSystemError) : $mosSystemError;?></p>
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
<?php
global $mosConfig_ga, $mosConfig_ym;
$ga_script = '<script type="text/javascript">var _gaq = _gaq || [];_gaq.push([\'_setAccount\', \'UA-2628330-3\']);_gaq.push([\'_trackPageview\']);_gaq.push([\'_trackPageLoadTime\']);(function() {var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);})();</script>';
if ($mosConfig_ga == 1) { echo $ga_script; }
echo "\n";
$ym_script = '<script src="//mc.yandex.ru/metrika/watch.js"></script>
<div class="nodisplay"><script type="text/javascript">try{var yaCounter'.$mosConfig_ym_id.'=new Ya.Metrika('.$mosConfig_ym_id.');}catch(e){}</script></div>
<noscript><div style="position:absolute;"><img src="//mc.yandex.ru/watch/'.$mosConfig_ym_id.'" alt="Яндекс.Метрика - Кафедра госпитальной хирургии" /></div></noscript>';
if ($mosConfig_ym == 1) { echo $ym_script; }
?>
<!--<script type="text/javascript">var _qevents = _qevents || [];(function() {var elem = document.createElement('script');elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";elem.async = true;elem.type = "text/javascript";var scpt = document.getElementsByTagName('script')[0];scpt.parentNode.insertBefore(elem, scpt);})();_qevents.push({qacct:"p-4fELX42iPoD1U"});</script>
<noscript><div class="nodisplay"><img src="//pixel.quantserve.com/pixel/p-4fELX42iPoD1U.gif" height="1" width="1" alt="Quantcast - Кафедра госпитальной хирургии"/></div></noscript>-->
</body>
</html>
<?php exit(0); } ?>