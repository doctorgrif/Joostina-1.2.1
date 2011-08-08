<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();
class File_Archive_Writer {
	function newFile($filename,$stat = array(),$mime = "application/octet-stream") {
	}
	function newFromTempFile($tmpfile,$filename,$stat = array(),$mime =
		"application/octet-stream") {
		$this->newFile($filename,$stat,$mime);
		$this->writeFile($tmpfile);
		unlink($tmpfile);
	}
	function newFileNeedsMIME() {
		return false;
	}
	function writeData($data) {
	}
	function writeFile($filename) {
		$handle = fopen($filename,"r");
		if(!is_resource($handle)) {
			return PEAR::raiseError("Unable to write to $filename");
		}
		while(!feof($handle)) {
			$error = $this->writeData(fread($handle,102400));
			if(PEAR::isError($error)) {
				return $error;
			}
		}
		fclose($handle);
	}
	function close() {
	}
}

?>
