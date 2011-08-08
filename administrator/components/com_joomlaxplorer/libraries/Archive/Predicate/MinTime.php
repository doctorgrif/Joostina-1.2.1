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
class File_Archive_Predicate_MinTime extends File_Archive_Predicate {
	var $minTime = 0;
	function File_Archive_Predicate_MinTime($minTime) {
		$this->minTime = $minTime;
	}
	function isTrue(&$source) {
		$stat = $source->getStat();
		return !isset($stat[9]) || $stat[9] >= $this->minTime;
	}
}
?>
