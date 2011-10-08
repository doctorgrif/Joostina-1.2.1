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
$_MAMBOTS->registerFunction('onInitEditor', 'botNoEditorInit');
$_MAMBOTS->registerFunction('onGetEditorContents', 'botNoEditorGetContents');
$_MAMBOTS->registerFunction('onEditorArea', 'botNoEditorEditorArea');
/* �� ���������� �������� - ������������� javascript */
function botNoEditorInit() {
	return <<< EOD
<script type="text/javascript">
	function insertAtCursor(myField, myValue) {
		if (document.selection) {
			// IE
			myField.focus();
			sel = document.selection.createRange();
			sel.text = myValue;
		} else if (myField.selectionStart || myField.selectionStart == '0') {
			// MOZILLA/NETSCAPE
			var startPos = myField.selectionStart;
			var endPos = myField.selectionEnd;
			myField.value = myField.value.substring(0, startPos)+ myValue+ myField.value.substring(endPos, myField.value.length);
		} else {
			myField.value += myValue;
		}
	}
</script>
EOD;
}
/**
* �� ���������� �������� - ����������� ����������� ��������� � ���� �����
* @param string - �������� ������� ���������
* @param string - �������� ���� �����
*/
function botNoEditorGetContents() {
	return <<< EOD
EOD;
}
/**
* �� ���������� �������� - ����������� ���������
* @param string - �������� ������� ���������
* @param string - ���� �����������
* @param string - �������� ���� �����
* @param string - ������ ������� ���������
* @param string - ������ ������� ���������
* @param int - ����� �������� ������� ���������
* @param int - ����� ����� ������� ���������
*/
function botNoEditorEditorArea($name, $content, $hiddenField, $width, $height, $col, $row) {
	global $mosConfig_live_site, $_MAMBOTS;
	$results = $_MAMBOTS->trigger('onCustomEditorButton');
	$buttons = array();
	foreach ($results as $result) {
		if ($result[0]) {
			$buttons[] = '<img src="' . $mosConfig_live_site . '/mambots/editors-xtd/' . $result[0] . '" onclick="insertAtCursor( document.adminForm.' . $hiddenField . ', \'' . $result[1] . '\' )" alt="' . $result[1] . '" />';
		}
	}
	$buttons = implode("", $buttons);
	$width = $width . 'px';
	$height = $height . 'px';
	return <<< EOD
<textarea name="$hiddenField" id="$hiddenField" cols="$col" rows="$row" style="width:$width;height:$height;">$content</textarea>
<br />$buttons
EOD;
}
?>