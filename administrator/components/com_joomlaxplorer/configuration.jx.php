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

/**
* Configuration settings for frontend file browsing
*/

// ALLOW FRONTEND BROWSING ? Change to
//$frontend_enabled = true; // If needed!
$frontend_enabled = false;

// THE SUBDIRECTORY USERS CAN BROWSE INCLUDING ALL SUBDIRECTORIES
// relative to your physical Joostina root path ($mosConfig_absolute_path)!
// Please note: You currently can't exclude directories or files within
// the specified directory. All files and directories will be visible and downloadable
$subdir = '/dmdocuments';

?>
