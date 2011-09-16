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
$search_ignore[] = 'href';
$search_ignore[] = 'lol';
$search_ignore[] = 'www';
$search_ignore[] = 'а';
$search_ignore[] = 'без'; 
$search_ignore[] = 'в';
$search_ignore[] = 'во';
$search_ignore[] = 'вот';
$search_ignore[] = 'для';
$search_ignore[] = 'до';
$search_ignore[] = 'же';
$search_ignore[] = 'за';
$search_ignore[] = 'и';
$search_ignore[] = 'и т.д';
$search_ignore[] = 'и т.п';
$search_ignore[] = 'ибо';
$search_ignore[] = 'из';
$search_ignore[] = 'из-под';
$search_ignore[] = 'или';
$search_ignore[] = 'к';
$search_ignore[] = 'куда';
$search_ignore[] = 'ли';
$search_ignore[] = 'либо';
$search_ignore[] = 'на';
$search_ignore[] = 'над';
$search_ignore[] = 'не';
$search_ignore[] = 'ни';
$search_ignore[] = 'но';
$search_ignore[] = 'ну';
$search_ignore[] = 'о';
$search_ignore[] = 'об';
$search_ignore[] = 'от';
$search_ignore[] = 'по';
$search_ignore[] = 'под';
$search_ignore[] = 'про';
$search_ignore[] = 'с';
$search_ignore[] = 'со';
$search_ignore[] = 'у';
?>