<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();
require_once dirname(__file__)."/../Predicate.php";
class File_Archive_Predicate_Index extends File_Archive_Predicate {
	var $indexes;
	var $pos = 0;
	function File_Archive_Predicate_Index($indexes) {
		$this->indexes = $indexes;
	}
	function isTrue(&$source) {
		return isset($this->indexes[$this->pos++]);
	}
}

?>
