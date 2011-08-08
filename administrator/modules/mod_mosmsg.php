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
$mosmsg = strval((stripslashes(htmlspecialchars(mosGetParam($_REQUEST, 'mosmsg', '')))));
if ($mosmsg) {
	//200 chars max
	if (strlen($mosmsg) > 200) {
		$mosmsg = substr($mosmsg, 0, 200);
	}
	echo "<div id=\"message\" class=\"message\">{$mosmsg}</div>";
}
?>