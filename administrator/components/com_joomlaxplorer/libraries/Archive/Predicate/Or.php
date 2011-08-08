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
class File_Archive_Predicate_Or extends File_Archive_Predicate {
	var $preds;
	function File_Archive_Predicate_And() {
		$this->preds = func_get_args();
	}
	function addPredicate($pred) {
		$this->preds[] = $pred;
	}
	function isTrue(&$source) {
		foreach($this->preds as $p) {
			if($p->isTrue($source)) {
				return true;
			}
		}
		return false;
	}
}

?>
