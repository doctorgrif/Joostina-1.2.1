<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// забарона прамога доступу
defined( '_VALID_MOS' ) or die( 'Доступ забаронены' );
$search_ignore[] = "у";
$search_ignore[] = "на";
$search_ignore[] = "і";
$search_ignore[] = "ці";
$search_ignore[] = "o";
$search_ignore[] = "аб";
$search_ignore[] = "пад";
$search_ignore[] = "па";
?>