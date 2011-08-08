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
class File_Archive_Predicate_MaxDepth extends File_Archive_Predicate {
	var $maxDepth;
	function File_Archive_Predicate_MaxDepth($maxDepth) {
		$this->maxDepth = $maxDepth;
	}
	function isTrue(&$source) {
		$url = parse_url($source->getFilename());
		return substr_count($url['path'],'/') <= $this->maxDepth;
	}
}

?>
