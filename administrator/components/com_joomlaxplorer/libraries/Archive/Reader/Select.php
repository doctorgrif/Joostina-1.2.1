<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();
require_once dirname(__file__)."/Relay.php";
class File_Archive_Reader_Select extends File_Archive_Reader_Relay {
	var $filename;
	function File_Archive_Reader_Select($filename,&$source) {
		parent::File_Archive_Reader_Relay($source);
		$this->filename = $filename;
	}
	function next() {
		return $this->source->select($this->filename,false);
	}
}

?>
