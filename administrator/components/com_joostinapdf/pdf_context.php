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

class pdf_context {

	var $file;
	var $buffer;
	var $offset;
	var $length;

	var $stack;

	// Constructor
	function pdf_context($f) {
		$this->file = $f;
		$this->reset();
	}

	// Optionally move the file pointer to a new location and reset the buffered data
	function reset($pos = null, $l = 100) {
		if (!is_null ($pos)) {
			fseek ($this->file, $pos);
		}
		$this->buffer = fread($this->file, $l);
		$this->offset = 0;
		$this->length = strlen($this->buffer);
		$this->stack = array();
	}

	// Make sure that there is at least one character beyond the current offset in
	// the buffer to prevent the tokenizer from attempting to access data that does not exist
	function ensure_content() {
		if ($this->offset >= $this->length - 1) {
			return $this->increase_length();
		} else {
			return true;
		}
	}

	// Forcefully read more data into the buffer
	function increase_length($l=100) {
		if (feof($this->file)) {
			return false;
		} else {
			$this->buffer .= fread($this->file, $l);
			$this->length = strlen($this->buffer);
			return true;
		}
	}
}
?>