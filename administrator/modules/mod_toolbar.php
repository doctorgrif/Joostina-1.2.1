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

global $cur_template, $mosConfig_absolute_path, $mosConfig_old_toolbar;

if (!defined('_TOOLBAR_MODULE')) {
	define('_TOOLBAR_MODULE', 1);
	$file = $mosConfig_old_toolbar ? 'menubar.html.old.php' : 'menubar.html.php';
	if (file_exists($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/' . $file)) {
		require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/' . $file);
	} else {
		require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/includes/' . $file);
	}
}
if ($path = $mainframe->getPath('toolbar')) {
	include_once ($path);
}
?>