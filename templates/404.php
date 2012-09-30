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
			$icon_ipad_57 = 'apple-touch-icon-57x57.png';
			$icon_ipad_72 = 'apple-touch-icon-72x72.png';
			$icon_ipad_114 = 'apple-touch-icon-114x114.png';
			$icon_ipad_144 = 'apple-touch-icon-144x144.png';
		}
echo '<link rel="apple-touch-icon" href="'.$icon_ipad.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="57x57" href="'.$icon_ipad_57.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="72x72" href="'.$icon_ipad_72.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="114x114" href="'.$icon_ipad_114.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="144x144" href="'.$icon_ipad_144.'" />' . "\n";
	}
?>
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