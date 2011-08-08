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
if (!defined('_JOS_EDITOR_INCLUDED')) {
	global $mosConfig_editor, $my;
	if ($mosConfig_editor == '') {
		$mosConfig_editor = 'none';
	}
// �������� ������ �� �������� ���������� ���������, ���� ����� ������� - �� ������ ���������� ��� ������������ �� ��������� ��������� ������������ �������� 'none' - ������������� ���������� ��������
	if (intval(mosGetParam($_SESSION, 'user_editor_off', 0))) {
		$editor = 'none';
	} else { // ��������� ���������� ��������� �� ������� ������������
		$params = new mosParameters($my->params);
		$editor = $params->get('editor', '');
		if (!$editor) {
			$editor = $mosConfig_editor;
		}
	}
	$_MAMBOTS->loadBot('editors', $editor, 1);
	/**
	* ������������� ���������
	* ��� ������ ������� ���������� �������� �������� ������ ���������� � ��������� ������ �� ���������
	*/
	function initEditor() {
		global $mainframe, $_MAMBOTS;
		if ($mainframe->get('loadEditor')) {
			$results = $_MAMBOTS->trigger('onInitEditor');
			foreach ($results as $result) {
				if (trim($result)) {
					echo $result;
				}
			}
		}
	}
	/**
	* ��������� ����������� ���������
	* ����������� ������� ��������������� �������� onGetEditorContents
	*/
	function getEditorContents($editorArea, $hiddenField) {
		global $mainframe, $_MAMBOTS;
		$mainframe->set('loadEditor', true);
		$results = $_MAMBOTS->trigger('onGetEditorContents', array($editorArea, $hiddenField));
		foreach ($results as $result) {
			if (trim($result)) {
				echo $result;
			}
		}
	}
// just present a textarea
	function editorArea($name, $content, $hiddenField, $width, $height, $col, $row) {
		global $mainframe, $_MAMBOTS, $my;
// �������� ����� ������� editor-xtd, ��������� _JOS_EDITORXTD_INCLUDED ������������� ��� ������� ���������
		if (!defined('_JOS_EDITORXTD_INCLUDED')) {
			define('_JOS_EDITORXTD_INCLUDED', 1);
			$_MAMBOTS->loadBotGroup('editors-xtd');
		}
		$mainframe->set('loadEditor', true);
		$results = $_MAMBOTS->trigger('onEditorArea', array($name, $content, $hiddenField, $width, $height, $col, $row));
		foreach ($results as $result) {
			if (trim($result)) {
				echo $result;
			}
		}
	}
	function editorBox($name, $content, $hiddenField, $width, $height, $col, $row) {
		global $mainframe, $_MAMBOTS, $my;
// �������� ����� ������� editor-xtd, ��������� _JOS_EDITORXTD_INCLUDED ������������� ��� ������� ���������
		if (!defined('_JOS_EDITORXTD_INCLUDED')) {
			define('_JOS_EDITORXTD_INCLUDED', 1);
			$_MAMBOTS->loadBotGroup('editors-xtd');
		}
		$mainframe->set('loadEditor', true);
		$results = $_MAMBOTS->trigger('onEditorArea', array($name, $content, $hiddenField, $width, $height, $col, $row));
		foreach ($results as $result) {
			if (trim($result)) {
				echo $result;
			}
		}
	}
// ��������� ��������� - �����, ��� �������� ���������
	define('_JOS_EDITOR_INCLUDED', 1);
}
?>