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

global $cur_template, $mosConfig_absolute_path;

$use_ext = $params->get('use_ext', 0);

if (!defined('_QUICKICON_MODULE')) {
	define('_QUICKICON_MODULE', 1);
	if ($use_ext) {
		// ������������� ������� ����������� �������
		if (file_exists($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/quickicons.php')) {
			require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/quickicons.php');
		} else {
			// ������������� ����������� ������� �����������
			require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/com_quickicons/quickicons.php');
		}
	} else {
		// ������������� ����������� ������� �����������
		require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/com_quickicons/quickicons.php');
	}
}
?>