<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
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