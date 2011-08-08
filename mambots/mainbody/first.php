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
$_MAMBOTS->registerFunction('onMainbody', 'body_clear');
$_MAMBOTS->registerFunction('onTemplate', 'template_clear');

/* ������� ���������� ������� ����������� �������� ����� ���������� �� ������������ */
function body_clear() {
	global $_MOS_OPTION;
	$text = $_MOS_OPTION['buffer'];
	$text = str_replace('\n', '', $text);
	$text = str_replace('\r', '', $text);
	$text = str_replace('\t', '', $text);
	$_MOS_OPTION['buffer'] = $text;
	return;
}

/* ������� ����� ���� �������� �� ��������� */
function template_clear() {
	global $_MOS_OPTION;
	$text = &$_MOS_OPTION['mainbody'];
	$oldcode = array('/\r\n|\r|\n|\t/', '/\r\r\r/', '/\r\r/', '/\s\s+/');
	$newcode = array('\r', '\r', '\r', '\r');
	$text = preg_replace($oldcode, $newcode, $text);
	$text = str_replace('  ', ' ', $text);
	$text = str_replace(' >', '>', $text);
	$text = str_replace('< ', '<', $text);
	$text = str_replace('>\r<', '><', $text);
	$text = str_replace('>\r', '>', $text);
	$text = str_replace('\r</', '</', $text);
	$_MOS_OPTION['mainbody'] = $text;
	return;
}
?>