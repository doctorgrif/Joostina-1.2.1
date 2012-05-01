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

$query = "SELECT menutype, COUNT(id) AS numitems FROM #__menu WHERE published = 1 GROUP BY menutype";
$database->setQuery($query);
$rows = $database->loadObjectList();
?>
<table class="adminlist">
	<tr>
		<th class="title" width="80%">
			<p><?php echo _MENU; ?></p>
		</th>
		<th class="title" width="20%">
			<p><?php echo _MENU_ITEMS_COUNT; ?></p>
		</th>
	</tr>
	<?php
	foreach ($rows as $row) {
		?>
	<tr>
		<td>
			<p><a href="<?php echo 'index2.php?option=com_menus&amp;menutype=' . $row->menutype;?>"><?php echo $row->menutype; ?></a></p>
		</td>
		<td>
			<p style="text-align:center;"><?php echo $row->numitems; ?></p>
		</td>
	</tr>
		<?php
	}
	?>
	<tr>
		<th colspan="2"></th>
	</tr>
</table>