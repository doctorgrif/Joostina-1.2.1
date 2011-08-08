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
$search_ignore[] = "в";
$search_ignore[] = "на";
$search_ignore[] = "и";
$search_ignore[] = "или";
$search_ignore[] = "o";
$search_ignore[] = "об";
$search_ignore[] = "под";
$search_ignore[] = "по";
?>