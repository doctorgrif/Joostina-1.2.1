<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();
require_once dirname(__file__)."/../Reader.php";
class File_Archive_Reader_Archive extends File_Archive_Reader {
	var $source = null;
	var $sourceOpened = false;
	var $sourceInitiallyOpened;
	function next() {
		if(!$this->sourceOpened && ($error = $this->source->next()) !== true) {
			return $error;
		}
		$this->sourceOpened = true;
		return true;
	}
	function File_Archive_Reader_Archive(&$source,$sourceOpened = false) {
		$this->source = &$source;
		$this->sourceOpened = $this->sourceInitiallyOpened = $sourceOpened;
	}
	function close() {
		if(!$this->sourceInitiallyOpened && $this->sourceOpened) {
			$this->sourceOpened = false;
			if($this->source !== null) {
				return $this->source->close();
			}
		}
	}
}

?>
