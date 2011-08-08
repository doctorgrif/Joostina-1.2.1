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
$_MAMBOTS->registerFunction('onInitEditor', 'botSpawEditorInit');
$_MAMBOTS->registerFunction('onGetEditorContents', 'botSpawEditorGetContents');
$_MAMBOTS->registerFunction('onEditorArea', 'botSpawEditorArea');
/* Spaw WYSIWYG Editor - javascript initialisation */
function botSpawEditorInit() {
}
/**
* Spaw WYSIWYG Editor - copy editor contents to form field
* @param string The name of the editor area
* @param string The name of the form field
*/
function botSpawEditorGetContents($editorArea, $hiddenField) {
}
/**
* Spaw WYSIWYG Editor - display the editor
* @param string The name of the editor area
* @param string The content of the field
* @param string The name of the form field
* @param string The width of the editor area
* @param string The height of the editor area
* @param int The number of columns for the editor area
* @param int The number of rows for the editor area
*/
function botSpawEditorArea($name, $content, $hiddenField, $width, $height, $col, $row) {
	require_once(dirname(__FILE__) . "/spaw/spaw.inc.php");
	$sw = new SpawEditor($hiddenField, html_entity_decode($content, ENT_QUOTES));
	$sw->show();
}
?>