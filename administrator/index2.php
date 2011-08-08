<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// Установка флага, что этот файл - родительский
define('_VALID_MOS', 1);
if (!file_exists('../configuration.php')) {
	header('Location: ../installation/index.php');
	exit();
}
require ('../globals.php');
require_once ('../configuration.php');
require_once ('../includes/definitions.php');
// отключаем кэширование запросов базы данных для панели управления
$mosConfig_db_cache_handler_orig = $mosConfig_db_cache_handler;
$mosConfig_db_cache_handler = 'none';
// SSL проверка  - $http_host returns <live site url>:<port number if it is 443>
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://' . substr($mosConfig_live_site, 7);
}
require_once ($mosConfig_absolute_path . '/includes/joomla.php');
include_once ($mosConfig_absolute_path . '/language/' . $mosConfig_lang . '.php');
require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/includes/admin.php');
// (c) boston считаем время за которое сгенерирована страница
global $database;
// работа с сессиями начинается до создания главного объекта взаимодействия с ядром
session_name(md5($mosConfig_live_site));
session_start();
$option = strval(strtolower(mosGetParam($_REQUEST, 'option', '')));
$task = strval(mosGetParam($_REQUEST, 'task', ''));
// создание объекта взаимодействия с ядром системы
$mainframe = new mosMainFrame($database, $option, '..', true);
// запуск сессий панели управления
$my = $mainframe->initSessionAdmin($option, $task);
// получение основных параметров
$act = strtolower(mosGetParam($_REQUEST, 'act', ''));
$section = mosGetParam($_REQUEST, 'section', '');
$no_html = intval(mosGetParam($_REQUEST, 'no_html', 0));
$id = intval(mosGetParam($_REQUEST, 'id', 0));
$cur_template = $mainframe->getTemplate();
// страница панели управления по умолчанию
if ($option == '') {
	$option = 'com_admin';
}
// установка параметра overlib
$mainframe->set('loadOverlib', false);
// инициализация редактора
require_once ($mosConfig_absolute_path . '/editor/editor.php');
ob_start();
if ($path = $mainframe->getPath('admin')) {
	require_once ($path);
} else {
	?>
	<img src="images/error.png" alt="Joostina!" />
	<?php

}
$_MOS_OPTION['buffer'] = ob_get_contents();
ob_end_clean();
initGzip();
// начало вывода html
if ($mosConfig_time_gen) {
	list($usec, $sec) = explode(" ", microtime());
	$sysstart = ((float) $usec + (float) $sec);
}
if ($no_html == 0) {
// загрузка файла шаблона
	if (!file_exists($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/index.php')) {
		echo _TEMPLATE_NOT_FOUND . ': ', $cur_template;
	} else {
		require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/index.php');
	}
} else {
	mosMainBody_Admin();
}
// информация отладки, число запросов в БД
if ($mosConfig_debug) {
	$mem_usage = (memory_get_usage() - _MEM_USAGE_START);
	echo '<noindex><div id="jdebug">';
	echo '<p><strong>' . _SCRIPT_MEMORY_USING . ':</strong> ' . sprintf('%0.2f', $mem_usage / 1048576) . ' MB</p>';
	echo '<p><strong>'. _SQL_QUERIES_COUNT . ':</strong> ' . $database->_ticker.'</p>';
	echo '<pre>';
	foreach ($database->_log as $k => $sql) {
		echo $k + 1 . ":&nbsp;" . $sql . '<hr />';
	}
	echo '</pre></div>';
	echo '</div></noindex>';
}
// восстановление сессий
if ($task == 'save' || $task == 'apply') {
	$mainframe->initSessionAdmin($option, '');
}
doGzip();
?>