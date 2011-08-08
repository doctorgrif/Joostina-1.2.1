<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();
require_once dirname(__file__)."/../Writer.php";
class File_Archive_Writer_Archive extends File_Archive_Writer {
	var $innerWriter;
	var $autoClose;
	function File_Archive_Writer_Archive($filename,&$innerWriter,$stat = array(),$autoClose = true) {
		$this->innerWriter = &$innerWriter;
		$this->autoClose = $autoClose;
		if($filename !== null) {
			$this->innerWriter->newFile($filename,$stat,$this->getMime());
		}
	}
	function getMime() {
		return "application/octet-stream";
	}
	function close() {
		if($this->autoClose) {
			return $this->innerWriter->close();
		}
	}
}

?>
