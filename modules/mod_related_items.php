<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* запрет прямого доступа */
defined('_VALID_MOS') or die();
global $database, $mosConfig_offset, $mosConfig_live_site, $option, $task, $mainframe;
$count = intval($params->get('count', 5));
$secid = trim($params->get('secid'));
$catid = trim($params->get('catid'));
$id = intval(mosGetParam($_REQUEST, 'id', null));
$now = _CURRENT_SERVER_TIME;
$nullDate = $database->getNullDate();
if ($option == 'com_content' && $task == 'view' && $id) {
/* выборка ключевых слов из объекта */
	$query = "SELECT metakey FROM #__content WHERE id = " . (int) $id;
	$database->setQuery($query);
	if ($metakey = trim($database->loadResult())) {
/* разделить ключевые слова запятыми */
		$keys = explode(', ', $metakey);
/* разделить ключевые слова пробелами */
		//$keys = explode(' ', $metakey);
		$likes = array();
/* собирание любых непустых слов */
		foreach ($keys as $key) {
			$key = trim($key);
			if ($key) {
				$likes[] = $database->getEscaped($key, true);
			}
		}
		if (count($likes)) {
/* select other items based on the metakey field 'like' the keys found */
/* add STRAIGHT_JOIN */
			$query = "SELECT STRAIGHT_JOIN a.id, a.sectionid, a.catid, a.title, a.created, cc.access AS cat_access, s.access AS sec_access, cc.published AS cat_state, s.published AS sec_state"
			. "\n FROM #__content AS a"
			. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id"
			. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
			. "\n LEFT JOIN #__sections AS s ON s.id = a.sectionid"
			. "\n WHERE a.id != " . (int) $id
			. "\n AND a.state != -2"
			. "\n AND a.access <= " . (int) $my->gid
			. ( $catid ? "\n AND ( a.catid IN ( $catid ) )" : '' )
			. ( $secid ? "\n AND ( a.sectionid IN ( $secid ) )" : '' )
			. "\n AND ( a.metakey LIKE '%" . implode( "%' OR a.metakey LIKE '%", $likes ) ."%' )"
			. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
			. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
			. "\n ORDER by title"
			. "\n LIMIT $count";
			$database->setQuery($query);
			$rows = $database->loadObjectList();
			$bs = $mainframe->getBlogSectionCount();
			$bc = $mainframe->getBlogCategoryCount();
			$gbs = $mainframe->getGlobalBlogSectionCount();
			$related = array();
			if (count($rows)) {
				foreach ($rows as $row) {
					if (($row->cat_state == 1 || $row->cat_state == '') && ($row->sec_state == 1 || $row->sec_state == '') && ($row->cat_access <= $my->gid || $row->cat_access == '') && ($row->sec_access <= $my->gid || $row->sec_access == '')) {
						$related[] = $row;
					}
				}
			}
			unset($rows);
			if (count($related)) {
				?>
<ul class="related_items">
<?php
foreach ($related as $item) {
	if ($option == 'com_content' && $task == 'view' && $id && $Itemid) {
		$Itemid = $mainframe->getItemid($row->id, 0, 0, $bs, $bc, $gbs);
	}
	$link = 'index.php?option=com_content&amp;task=view&amp;id='.$item->id.'&amp;Itemid='.$Itemid;
	$link = sefRelToAbs($link);
?>
	<li>
		<h5><a href="<?php echo $link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h5>
	</li>
	<?php } ?>
</ul>
<?php
			}
		}
	}
}
?>