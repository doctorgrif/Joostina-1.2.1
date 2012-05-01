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
global $mosConfig_lang, $mosConfig_sitename, $mosConfig_live_site, $mosConfig_favicon, $mosConfig_favicon_ie, $mosConfig_favicon_ipad;
// загрузка файла русского языка по умолчанию
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ('language/'.$mosConfig_lang.'.php');
// обратная совместимость
if (!defined('_404')) {
	define('_404', 'Извините, запрошенная страница не найдена.');
}
if (!defined('_404_RTS')) {
	define('_404_RTS', 'Вернуться на сайт');
}
?>
<?php
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
<title>Error 404: Страница не найдена | <?php echo $mosConfig_sitename;?></title>
<meta http-equiv="Content-Type" content="text/html;<?php echo _ISO;?>" />
</head>
<body class="page_404">
	<h2><?php echo $mosConfig_sitename;?></h2>
	<h2><?php echo _404;?></h2>
	<h3><a href="<?php echo $mosConfig_live_site;?>"><?php echo _404_RTS;?></a></h3>
	<p>Ошибка 404 | Error 404</p>
	<p><?php echo _404_TEXT;?></p>
	<p><?php echo _404_FULLTEXT;?></p>
	<?php mosLoadModules('bottom',-1); ?>
</body>
</html>