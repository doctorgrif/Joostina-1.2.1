<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// Установка флага, что это - родительский файл
define('_VALID_MOS', 1);
require ('globals.php');
require_once ('configuration.php');
require_once ('includes/definitions.php');
// Проверка SSL - $http_host возвращает <url_сайта>:<номер_порта, если он 443>
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://' . substr($mosConfig_live_site, 7);
}
require_once ('includes/joomla.php');
// отображение состояния выключенного сайта - ошибка 503
if ($mosConfig_offline == 1) {
	header('HTTP/1.1 503 Service Temporarily Unavailable');
	header('Status: 503 Service Temporarily Unavailable');
	header('Retry-After: 3600');
	header('X-Powered-By:');
	require ($mosConfig_absolute_path . '/offline.php');
}
// загрузка группы системного бота
$_MAMBOTS->loadBotGroup('system');
// переключение событий onStart
$_MAMBOTS->trigger('onStart');
if (file_exists($mosConfig_absolute_path . '/components/com_sef/sef.php')) {
	require_once ($mosConfig_absolute_path . '/components/com_sef/sef.php');
} else {
	require_once ($mosConfig_absolute_path . '/includes/sef.php');
}
require_once ($mosConfig_absolute_path . '/includes/frontend.php');
// запрос ожидаемых аргументов url (или формы)
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
// главное окно рабочего компонента API, для взаимодействия многих 'ядер'
$mainframe = new mosMainFrame($database, $option, '.');
$mainframe->initSession();
// trigger the onAfterStart events
$_MAMBOTS->trigger('onAfterStart');
// получение информацию о пользователе из таблицы сессий
$my = $mainframe->getUser();
// patch to lessen the impact on templates
if ($option == 'search') {
	$option = 'com_search';
}
// загрузка файла русского языка по умолчанию
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ($mosConfig_absolute_path . '/language/' . $mosConfig_lang . '.php');
if ($option == 'login') {
	$mainframe->login();
	mosRedirect('index.php');
} else
if ($option == 'logout') {
	$mainframe->logout();
	mosRedirect('index.php');
}
// Если включено создание  - подключим файл
if ($do_pdf == 1){
	include $mosConfig_absolute_path .'/includes/pdf.php';
	exit();
}
// обнаружение первого посещения
$mainframe->detect();
$gid = intval($my->gid);
$cur_template = $mainframe->getTemplate();
// предварительный захват вывода компонента
require_once ($mosConfig_absolute_path . '/editor/editor.php');
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
	// если не получилось - отдаем заголовок 404
	header("HTTP/1.0 404 Not Found");
	echo _NOT_EXIST;
}
$_MOS_OPTION['buffer'] = ob_get_contents();
ob_end_clean();
global $mosConfig_custom_print;
// печать страницы
if ($print) {
	$cpex = 0;
	if ($mosConfig_custom_print) {
		$cust_print_file = $mosConfig_absolute_path . '/templates/' . $cur_template . '/html/print.php';
		if (file_exists($cust_print_file)) {
			ob_start();
			include($cust_print_file);
			$_MOS_OPTION['buffer'] = ob_get_contents();
			ob_end_clean();
			$cpex = 1;
		}
	}
	if (!$cpex) {
		$mainframe->addCSS($mosConfig_live_site . '/templates/css/print.css');
		$mainframe->addJS($mosConfig_live_site . '/includes/js/print/print.js');
		$pg_link = str_replace(array('&amp;pop=1', '&amp;page=0'), '', $_SERVER['REQUEST_URI']);
		$pg_link = str_replace('index2.php', 'index.php', $pg_link);
		$_MOS_OPTION['buffer'] = '<div class="logo">' . $mosConfig_sitename . '</div><div id="main">'
				. $_MOS_OPTION['buffer']
				. "\n</div>\n<div id=\"ju_foo\">"
				. _PRINT_PAGE_LINK . ":<p style=\"display:none;\"><em>" . sefRelToAbs($pg_link) . "</em></p><p>&copy;"
				. $mosConfig_sitename . ",&nbsp;" . date('Y') . '</p></div>';
	}
} else {
	$mainframe->addCSS($mosConfig_live_site . '/templates/' . $cur_template . '/css/style.css');
}
// подключение js библиотеки системы
if ($my->id || $mainframe->get('joomlaJavascript')) {
	$mainframe->addJS($mosConfig_live_site . '/includes/js/joomla.javascript.js');
}
initGzip();
// при активном кэшировании отправим браузеру более "правильные" заголовки
if (!$mosConfig_caching) {
// не кэшируется
	header('Expires: ' . gmdate('r', $_SERVER['REQUEST_TIME']) . ' GMT');
	header('Last-Modified: ' . gmdate('r') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
} else if ($option != 'logout' or $option != 'login') {
// кэшируется
	//header('HTTP/1.0 304 Not modified');
// 60*60=3600 - использования кэширования на 1 час
	header('Expires: ' . gmdate('r', $_SERVER['REQUEST_TIME'] + 3600) . ' GMT');
	header('Last-Modified: ' . gmdate('r') . ' GMT');
	$expr = 60 * 60 * 24 * 7;
	header('Cache-Control: max-age=(' . $expr . '), must-revalidate');
}
// отображение состояния выключенного сайта при входе админа
if (defined('_ADMIN_OFFLINE')) {
	include ($mosConfig_absolute_path . '/offlinebar.php');
}
// старт основного HTML
if ($no_html == 0) {
	$customIndex2 = 'templates/' . $mainframe->getTemplate() . '/index2.php';
	if (file_exists($customIndex2)) {
		require ($customIndex2);
	} else {
// требуется для отделения номера ISO от константы _ISO языкового файла языка
		$iso = split('=', _ISO);
// пролог xml
echo '<?xml version="1.0" encoding="' . $iso[1] . '"?' . '>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="<?php echo $mosConfig_live_site; ?>/favicon.png" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="<?php echo $mosConfig_live_site; ?>/favicon.ico" /><![endif]-->
<link rel="apple-touch-icon" href="<?php echo $mosConfig_live_site; ?>/apple-touch-icon.png" />
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<?php echo $mainframe->getHead(); ?>
</head>
<body class="contentpane">
	<?php mosMainBody(); ?>
</body>
</html>
<?php
	}
} else {
	mosMainBody();
}
doGzip();
?>