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
require_once dirname(__file__)."/../../MIME/Type.php";
class File_Archive_Predicate_MIME extends File_Archive_Predicate {
	var $mimes;
	function File_Archive_Predicate_MIME($mimes) {
		if(is_string($mimes)) {
			$this->mimes = explode(",",$mimes);
		} else {
			$this->mimes = $mimes;
		}
	}
	function isTrue(&$source) {
		$sourceMIME = $source->getMIME();
		foreach($this->mimes as $mime) {
			if(MIME_Type::isWildcard($mime)) {
				$result = MIME_Type::wildcardMatch($mime,$sourceMIME);
			} else {
				$result = ($mime == $sourceMIME);
			}
			if($result !== false) {
				return $result;
			}
		}
		return false;
	}
}

?>
