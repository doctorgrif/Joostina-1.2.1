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

$session_id = stripslashes(mosGetParam($_SESSION, 'session_id', ''));

// Get no. of users online not including current session
$query = "SELECT COUNT( session_id ) FROM #__session WHERE session_id != " . $database->Quote($session_id);
$database->setQuery($query);
$online_num = intval($database->loadResult());
echo $online_num . ' <img src="images/users.png" align="middle" alt="' . _ONLINE_USERS . '" />';
?>