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
$mosmsg = strval((stripslashes(htmlspecialchars(mosGetParam($_REQUEST, 'mosmsg', '')))));
if ($mosmsg) {
	//200 chars max
	if (strlen($mosmsg) > 200) {
		$mosmsg = substr($mosmsg, 0, 200);
	}
	echo "<div id=\"message\" class=\"message\">{$mosmsg}</div>";
}
?>