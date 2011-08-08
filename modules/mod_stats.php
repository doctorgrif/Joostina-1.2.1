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
global $mosConfig_offset, $mosConfig_caching, $mosConfig_enable_stats, $moduleclass_sfx, $database;
global $mosConfig_gzip;
$serverinfo = $params->get('serverinfo');
$siteinfo = $params->get('siteinfo');
$content = '';
if ($serverinfo) {
echo '<div class="stats' . $moduleclass_sfx . '">';
	echo '<ul>';
		// Информация о системе
		echo '<li><span class="stats-type">' . _STAT_OS . '</span> <span class="stats-item">' . substr(php_uname(), 0, 7) . '</span></li>';
		echo '<li><span class="stats-type">' . _STAT_PHP_VERSION . '</span> <span class="stats-item">' . phpversion() . '</span></li>';
		echo '<li><span class="stats-type">' . _STAT_MYSQL_VERSION . '</span> <span class="stats-item">' . $database->getVersion() . '</span></li>';
		echo '<li><span class="stats-type">' . _STAT_DATETIME . '</span> <span class="stats-item">' . date("d.m.Y H:i", $_SERVER['REQUEST_TIME'] + ($mosConfig_offset * 60 * 60)) . '</span></li>';
	$c = $mosConfig_caching ? '' . _STAT_CACHE_ENABLE . '' : '' . _STAT_CACHE_DISABLE . '';
		echo '<li><span class="stats-type">' . _STAT_CACHE . '</span> <span class="stats-item">' . $c . '</span></li>';
	$z = $mosConfig_gzip ? '' . _STAT_CACHE_ENABLE . '' : '' . _STAT_CACHE_DISABLE . '';
		echo '<li><span class="stats-type">' . _STAT_GZIP . '</span> <span class="stats-item">' . $z . '</span></li>';
}
if ($siteinfo) {
	$query = "SELECT COUNT( id ) AS count_users FROM #__users";
	$database->setQuery($query);
		// Информация о пользователях
		echo '<li><span class="stats-type">' . _STAT_MEMBERS . '</span> <span class="stats-item">' . $database->loadResult() . '</span></li>';
	$query = "SELECT COUNT( id ) AS count_items FROM #__content";
	$database->setQuery($query);
		// Информация о статьях
		echo '<li><span class="stats-type">' . _STAT_NEWS . '</span> <span class="stats-item">' . $database->loadResult() . '</span></li>';
	$query = 'SELECT COUNT( id ) AS count_links FROM #__weblinks WHERE published = 1';
	$database->setQuery($query);
		// Информация о ссылках
		echo '<li><span class="stats-type">' . _STAT_LINKS . '</span> <span class="stats-item">' . $database->loadResult() . '</span></li>';
	echo '</ul>';
echo '</div>';
}
if ($mosConfig_enable_stats) {
	$counter = $params->get('counter');
	$increase = $params->get('increase');
	if ($counter) {
		$query = "SELECT SUM( hits ) AS count FROM #__stats_agents WHERE type = 1";
		$database->setQuery($query);
		$hits = $database->loadResult();
		$hits = $hits + $increase;
		if ($hits == NULL) {
		// Информация о пользователях, находящихся на сайте
			$content .= '<span class="strong">' . _STAT_VISITORS . '</span> 0';
		} else {
			$content .= '<span class="strong">' . _STAT_VISITORS . '</span>' . $hits;
		}
	}
}
?>