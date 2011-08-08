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
$_MAMBOTS->registerFunction('onPrepareContent', 'botLegacyBots');
/**
* Обработка любых унаследованных ботов в каталоге /mambots
* Этот файл может быть "безопасно удален" если нет наследования мамботов
* @param object - объект содержимого
* @param int - Побитовая маска параметров
* @param int - Номер страницы
*/
function botLegacyBots($published) {
	global $mosConfig_absolute_path;
// проверка, опубликован ли мамбот
	if (!$published) {
		return true;
	}
// Процесс наследования ботов
	$bots = mosReadDirectory("$mosConfig_absolute_path/mambots", "\.php$");
	sort($bots);
	foreach ($bots as $bot) {
		require $mosConfig_absolute_path . '/mambots/' . $bot;
	}
	return true;
}
?>