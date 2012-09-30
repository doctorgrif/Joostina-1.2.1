<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* Установка флага, что это - родительский файл */
define('_VALID_MOS', 1);
require ('globals.php');
require_once ('configuration.php');
require_once ('includes/definitions.php');
/* Проверка SSL - $http_host возвращает <url_сайта>:<номер_порта> (если он 443) */
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://'.substr($mosConfig_live_site, 7);
}
require_once ('includes/joomla.php');
/* ошибка 503 */
if ($mosConfig_offline == 1) {
	header('HTTP/1.1 503 Service Temporarily Unavailable');
	header('Status: 503 Service Temporarily Unavailable');
	header('Retry-After: 3600');
	require ($mosConfig_absolute_path.'/offline.php');
}
/* загрузка группы системного бота */
$_MAMBOTS->loadBotGroup('system');
/* переключение событий onStart */
$_MAMBOTS->trigger('onStart');
if (file_exists($mosConfig_absolute_path.'/components/com_sef/sef.php')) {
	require_once ($mosConfig_absolute_path.'/components/com_sef/sef.php');
} else {
	require_once ($mosConfig_absolute_path.'/includes/sef.php');
}
require_once ($mosConfig_absolute_path.'/includes/frontend.php');
/* запрос ожидаемых аргументов url (или формы) */
$option = strtolower(strval(mosGetParam($_REQUEST, 'option')));
$Itemid = intval(mosGetParam($_REQUEST, 'Itemid', 0));
$no_html = intval(mosGetParam($_REQUEST, 'no_html', 0));
$act = strval(mosGetParam($_REQUEST, 'act', ''));
$do_pdf = intval( mosGetParam($_REQUEST, 'do_pdf', 0));
$pop = intval(mosGetParam($_GET, 'pop'));
$page = intval(mosGetParam($_GET, 'page'));
$print = false;
if ($pop == '1' && $page == 0)
	$print = true;
/* главное окно рабочего компонента API, для взаимодействия многих 'ядер' */
$mainframe = new mosMainFrame($database, $option, '.');
$mainframe->initSession();
/* trigger the onAfterStart events */
$_MAMBOTS->trigger('onAfterStart');
/* получение информацию о пользователе из таблицы сессий */
$my = $mainframe->getUser();
/* patch to lessen the impact on templates */
if ($option == 'search') {
	$option = 'com_search';
}
/* загрузка файла русского языка по умолчанию */
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ($mosConfig_absolute_path.'/language/'.$mosConfig_lang.'.php');
if ($option == 'login') {
	$mainframe->login();
	mosRedirect('index.php');
} else
if ($option == 'logout') {
	$mainframe->logout();
	mosRedirect('index.php');
}
/* Если включено создание - подключим файл */
if ($do_pdf == 1){
	include $mosConfig_absolute_path .'/includes/pdf.php';
	exit();
}
/* обнаружение первого посещения */
$mainframe->detect();
$gid = intval($my->gid);
$cur_template = $mainframe->getTemplate();
/* предварительный захват вывода компонента */
require_once ($mosConfig_absolute_path.'/editor/editor.php');
ob_start();
if ($path = $mainframe->getPath('front')) {
	$task = strval(mosGetParam($_REQUEST, 'task', ''));
	$ret = mosMenuCheck($Itemid, $option, $task, $gid);
	if ($ret) {
		require_once ($path);
	} else {
		mosNotAuth();
	}
} else {
	/* если не получилось - отдаем заголовок 404 */
	header("HTTP/1.0 404 Not Found");
	echo _NOT_EXIST;
}
$_MOS_OPTION['buffer'] = ob_get_contents();
ob_end_clean();
global $mosConfig_custom_print;
/* печать страницы */
if ($print) {
	$cpex = 0;
	if ($mosConfig_custom_print) {
		$cust_print_file = $mosConfig_absolute_path.'/templates/'.$cur_template.'/html/print.php';
		if (file_exists($cust_print_file)) {
			ob_start();
			include($cust_print_file);
			$_MOS_OPTION['buffer'] = ob_get_contents();
			ob_end_clean();
			$cpex = 1;
		}
	}
	if (!$cpex) {
		$mainframe->addCSS($mosConfig_live_site.'/templates/css/print.css');
		$mainframe->addJS($mosConfig_live_site.'/includes/js/print/print.js');
		$pg_link = str_replace(array('&pop=1', '&page=0'), '', $_SERVER['REQUEST_URI']);
		$pg_link = str_replace('index2.php', 'index.php', $pg_link);
		$_MOS_OPTION['buffer'] = '<div class="logo">'.$mosConfig_sitename.'</div><div id="main">'.$_MOS_OPTION['buffer'].'</div><div id="ju_foo">'._PRINT_PAGE_LINK.':<p class="nodisplay"><em>'.sefRelToAbs($pg_link).'</em></p><p>&copy;'.$mosConfig_sitename.',&nbsp;'.date('Y').'</p></div>';
	}
} else {
	$mainframe->addCSS($mosConfig_live_site.'/templates/'.$cur_template.'/css/style.css');
}
/* подключение js библиотеки системы */
if ($my->id || $mainframe->get('joomlaJavascript')) {
	$mainframe->addJS($mosConfig_live_site.'/includes/js/joomla.javascript.full.js');
}
initGzip();
/* при активном кэшировании отправим браузеру более "правильные" заголовки */
if (!$mosConfig_caching) { // не кэшируется
	$etagFile = md5($_SERVER['REQUEST_URI']);
	header('Etag: ' . $etagFile);
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	if ($option == 'logout' or $option == 'login') {
		header('Cache-control: private');
	} else { 
		header('Cache-control: public');
	}
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Pragma: no-cache');
} elseif ($option != 'logout' or $option != 'login') { // кэшируется
	$etagFile = md5($_SERVER['REQUEST_URI']);
	$lastModified = filemtime($_SERVER['REQUEST_URI']);
	$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
	$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);
if(ereg('Firefox', $_SERVER['HTTP_USER_AGENT'])) { // если Firefox
	header('Etag: ' . $etagFile);
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache');
} else { // когда другой броузер
	header('Etag: ' . $etagFile);
	header('Cache-Control: max-age=3600');
	header('Cache-Control: public');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	// 60*60=3600 - использования кэширования на 1 час
	header('Expires: '.gmdate('D, d M Y H:i:s',time() + 3600).' GMT');
	header('Pragma: ');
	if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified || $etagHeader == $etagFile)
	{
	header('HTTP/1.1 304 Not Modified');
	exit(304);
}
}
}
// буферизация итогового содержимого, необходимо для шаблонов группы templates
ob_start();
/* старт основного HTML */
if ($no_html == 0) {
	$customIndex2 = 'templates/'.$mainframe->getTemplate().'/index2.php';
	if (file_exists($customIndex2)) {
		require ($customIndex2);
	} else {
/* требуется для отделения номера ISO от константы _ISO языкового файла языка */
	$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head profile="http://gmpg.org/xfn/11">
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
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO;?>" />
<?php echo $mainframe->getHead();?>
</head>
<body>
	<?php mosMainBody();?>
</body>
</html>
<?php
	}
} else {
	mosMainBody();
}
ob_end_clean();
flush();
doGzip();
?>