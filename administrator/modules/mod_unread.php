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