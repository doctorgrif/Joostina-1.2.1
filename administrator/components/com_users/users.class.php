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

/**
* @package Joostina
*/
class mosUserParameters extends mosParameters {
	/**
	* @param string The name of the form element
	* @param string The value of the element
	* @param object The xml element for the parameter
	* @param string The control name
	* @return string The html for the element
	*/
	function _form_editor_list($name,$value,&$node,$control_name) {
		global $database;
		// compile list of the editors
		$query = "SELECT element AS value, name AS text"
				."\n FROM #__mambots"
				."\n WHERE folder = 'editors'"
				."\n AND published = 1"
				."\n ORDER BY ordering, name";
		$database->setQuery($query);
		$editors = $database->loadObjectList();
		array_unshift($editors,mosHTML::makeOption('', '-�������� ��������-'));
		return mosHTML::selectList($editors, ''.$control_name.'['.$name.']', 'class="inputbox"', 'value', 'text', $value);
	}
}
?>