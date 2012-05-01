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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
/* iДевайс */
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
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO;?>" />
<title><?php echo $mosConfig_sitename;?> - <?php echo _SITE_OFFLINE;?></title>
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template;?>/css/style.css" />
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