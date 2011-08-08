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
class File_Archive_Predicate_MinSize extends File_Archive_Predicate {
	var $minSize = 0;
	function File_Archive_Predicate_MinSize($minSize) {
		$this->minSize = $minSize;
	}
	function isTrue(&$source) {
		$stat = $source->getStat();
		return !isset($stat[7]) || $stat[7] >= $this->minSize;
	}
}
?>
