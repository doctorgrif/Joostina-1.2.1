<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

$session_id = stripslashes(mosGetParam($_SESSION, 'session_id', ''));

// Get no. of users online not including current session
$query = "SELECT COUNT( session_id ) FROM #__session WHERE session_id != " . $database->Quote($session_id);
$database->setQuery($query);
$online_num = intval($database->loadResult());
echo $online_num . ' <img src="images/users.png" align="middle" alt="' . _ONLINE_USERS . '" />';
?>