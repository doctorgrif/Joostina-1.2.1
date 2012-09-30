<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* запрет прямого доступа */
defined('_VALID_MOS') or die();
//global $option, $database;
global $mosConfig_live_site, $mainframe, $mosConfig_lang, $mosConfig_sitename, $mosConfig_offline, $mosConfig_offline_message, $mosConfig_error_message, $mosConfig_favicon, $mosConfig_favicon_ie, $mosConfig_favicon_ipad, $mosSystemError;
require_once ('includes/joomla.php');
include_once ('language/'.$mosConfig_lang.'.php');
/* получение шаблона страницы */
//$cur_template = @$mainframe->getTemplate();
$cur_template = $mainframe->getTemplate();
if (!$cur_template) {
	$cur_template = 'newline';
}
/* Вывод HTML */
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
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link title="RSS кафедра госпитальной хирургии" type="application/rss+xml" rel="alternate" href="http://feeds.feedburner.com/hospsurg/DTON/" />
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO;?>" />
<title><?php echo $mosConfig_sitename;?> - <?php echo _SITE_OFFLINE;?></title>
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
<body id="warning">
	<div class="moswarning">
	<?php if ($mosConfig_offline == 1) { ?>
		<h2><?php echo $mosConfig_sitename.' - '.$mosConfig_offline_message;?></h2>
	<?php } else if (@$mosSystemError) { ?>
		<h2><?php echo $mosConfig_error_message;?></h2>
		<p><?php echo $mosSystemError;?></p>
	<?php } else { ?>
		<h2><?php echo _INSTALL_WARN;?></h2>
	<?php } ?>
	</div>
</body>
</html>