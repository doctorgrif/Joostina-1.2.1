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
class File_Archive_Predicate_Extension extends File_Archive_Predicate {
	var $extensions;
	function File_Archive_Predicate_Extension($extensions) {
		if(is_string($extensions)) {
			$this->extensions = explode(",",$extensions);
		} else {
			$this->extensions = $extensions;
		}
	}
	function isTrue(&$source) {
		$filename = $source->getFilename();
		$pos = strrpos($filename,'.');
		$extension = "";
		if($pos !== false) {
			$extension = strtolower(substr($filename,$pos + 1));
		}
		$result = in_array($extension,$this->extensions);
		return $result;
	}
}

?>
