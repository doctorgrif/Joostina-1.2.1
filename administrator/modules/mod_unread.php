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

global $my;

$query = "SELECT COUNT(*)"
	. "\n FROM #__messages"
	. "\n WHERE state = 0"
	. "\n AND user_id_to = " . (int) $my->id;
$database->setQuery($query);
$unread = $database->loadResult();

if ($unread) {
	echo '<a href="index2.php?option=com_messages" style="color:red;text-decoration:none;font-weight:bold">' . $unread . '<img src="images/mail.png" align="middle" alt="' . _MAIL . '" /></a>';
} else {
	echo '<a href="index2.php?option=com_messages" style="color:black;text-decoration:none;">' . $unread . '<img src="images/nomail.png" align="middle" alt="' . _MAIL . '" /></a>';
}
?>