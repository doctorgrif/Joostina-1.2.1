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
global $database, $_VERSION;
// check to see if site is a production site
// allows multiple logins with same user for a demo site
if ($_VERSION->SITE == 1) {
// ���������� ������ ���������� ��������� ������ ���������� � ���� ������
	if (isset($_SESSION['session_user_id']) && $_SESSION['session_user_id'] != '') {
		$currentDate = date("Y-m-d\TH:i:s");
		$query = "UPDATE #__users"
		. "\n SET lastvisitDate = " . $database->Quote($currentDate)
		. "\n WHERE id = " . (int) $_SESSION['session_user_id'];
		$database->setQuery($query);
		if (!$database->query()) {
			echo $database->stderr();
		}
	}
// delete db session record corresponding to currently logged in user
	if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != '') {
		$query = "DELETE FROM #__session"
		. "\n WHERE session_id = " . $database->Quote($_SESSION['session_id']);
		$database->setQuery($query);
		if (!$database->query()) {
			echo $database->stderr();
		}
	}
}
$name = '';
$fullname = '';
$id = '';
$session_id = '';
// destroy PHP session
session_destroy();
// return to site homepage
mosRedirect('index.php');
?>