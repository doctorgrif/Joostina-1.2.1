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

$query = "SELECT STRAIGHT_JOIN a.hits, a.id, a.sectionid, a.title, a.created, u.name" . "\n FROM #__content AS a" .
		"\n LEFT JOIN #__users AS u ON u.id=a.created_by" . "\n WHERE a.state != -2" . "\n ORDER BY hits DESC";
$database->setQuery($query, 0, 10);
$rows = $database->loadObjectList();
?>

<table class="adminlist">
	<tr>
		<th class="title"><p><?php echo _POPULAR_CONTENT; ?></p></th>
		<th class="title"><p><?php echo _CREATED_CONTENT; ?></p></th>
		<th class="title"><p><?php echo _CONTENT_HITS; ?></p></th>
	</tr>
	<?php
	foreach ($rows as $row) {
		if ($row->sectionid == 0) {
			$link = 'index2.php?option=com_typedcontent&amp;task=edit&amp;hidemainmenu=1&amp;id=' .
					$row->id;
		} else {
			$link = 'index2.php?option=com_content&amp;task=edit&amp;hidemainmenu=1&amp;id=' .
					$row->id;
		}
		?>
	<tr>
		<td><p><a href="<?php echo $link; ?>" title="<?php echo htmlspecialchars($row->title, ENT_QUOTES); ?>"><?php echo htmlspecialchars($row->title, ENT_QUOTES); ?></a></p></td>
		<td><p><?php echo $row->created; ?></p></td>
		<td><p><?php echo $row->hits; ?></p></td>
	</tr>
		<?php
	}
	?>
	<tr>
		<th colspan="3"></th>
	</tr>
</table>