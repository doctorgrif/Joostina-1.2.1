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
global $mosConfig_offset, $mosConfig_live_site, $mainframe, $my;
$type = intval($params->get('type', 1));
$count = intval($params->get('count', 5));
$catid = trim($params->get('catid'));
$secid = trim($params->get('secid'));
$noncss = intval($params->get('noncss', 1));
$show_front = $params->get('show_front', 1);
$def_itemid = $params->get('def_itemid', false);
$now = _CURRENT_SERVER_TIME;
$access = !$mainframe->getCfg('shownoauth');
$nullDate = $database->getNullDate();
// Выбор между выводом содержимого объектов, статического содержимого или сразу обоих
switch ($type) {
	case 2:
// Только статическое содержимое
	$query = "SELECT STRAIGHT_JOIN a.id, a.title"
	. "\n FROM #__content AS a"
	. "\n WHERE (a.state = 1 AND a.sectionid = 0)"
	. "\n AND (a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . ")"
	. "\n AND (a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . ")"
	. ($access ? "\n AND a.access <= " . (int) $my->gid : '')
	. "\n ORDER BY a.created DESC";
	$database->setQuery($query, 0, $count);
	$rows = $database->loadObjectList();
	break;
	case 3:
// Оба типа
		$whereCatid = '';
		if ($catid) {
			$catids = explode(',', $catid);
			mosArrayToInts($catids);
			$whereCatid = "\n AND (a.catid=" . implode(" OR a.catid=", $catids) . ")";
		}
		$whereSecid = '';
		if ($secid) {
			$secids = explode(',', $secid);
			mosArrayToInts($secids);
			$whereSecid = "\n AND (a.sectionid=" . implode(" OR a.sectionid=", $secids) . ")";
		}
	$query = "SELECT STRAIGHT_JOIN a.id, a.title, a.sectionid, a.catid, cc.access AS cat_access, s.access AS sec_access, cc.published AS cat_state, s.published AS sec_state"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = a.sectionid"
	. "\n WHERE a.state = 1"
	. "\n AND ( a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . " )"
	. ( $access ? "\n AND a.access <= " . (int) $my->gid : '' )
	. $whereCatid
	. $whereSecid
	. ( $show_front == '0' ? "\n AND f.content_id IS NULL" : '' )
	. "\n ORDER BY a.created DESC";
	$database->setQuery($query, 0, $count);
	$temp = $database->loadObjectList();
	$rows = array();
		if (count($temp)) {
			foreach ($temp as $row) {
				if (($row->cat_state == 1 || $row->cat_state == '') && ($row->sec_state == 1 || $row->sec_state == '') && ($row->cat_access <= $my->gid || $row->cat_access == '' || !$access) && ($row->sec_access <= $my->gid || $row->sec_access == '' || !$access)) {
					$rows[] = $row;
				}
			}
		}
		unset($temp);
		break;
	case 1:
	default:
// Только содержимое объектов
		$whereCatid = '';
		if ($catid) {
			$catids = explode(',', $catid);
			mosArrayToInts($catids);
			$whereCatid = "\n AND (a.catid=" . implode(" OR a.catid=", $catids) . ")";
		}
		$whereSecid = '';
		if ($secid) {
			$secids = explode(',', $secid);
			mosArrayToInts($secids);
			$whereSecid = "\n AND ( a.sectionid=" . implode(" OR a.sectionid=", $secids) . " )";
		}
	$query = "SELECT STRAIGHT_JOIN a.id, a.title, a.sectionid, a.catid"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id"
	. "\n INNER JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n INNER JOIN #__sections AS s ON s.id = a.sectionid"
	. "\n WHERE ( a.state = 1 AND a.sectionid > 0 )"
	. "\n AND ( a.publish_up = " . $database->Quote($nullDate) . " OR a.publish_up <= " . $database->Quote($now) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote($nullDate) . " OR a.publish_down >= " . $database->Quote($now) . " )"
	. ( $access ? "\n AND a.access <= " . (int) $my->gid . " AND cc.access <= " . (int) $my->gid . " AND s.access <= " . (int) $my->gid : '' )
	. $whereCatid
	. $whereSecid
	. ( $show_front == '0' ? "\n AND f.content_id IS NULL" : '' )
	. "\n AND s.published = 1"
	. "\n AND cc.published = 1"
	. "\n ORDER BY a.created DESC";
	$database->setQuery($query, 0, $count);
	$rows = $database->loadObjectList();
	break;
}
if (!$def_itemid > 0) {
// требование уменьшить запросы, используемые getItemid для объектов содержимого
	if (($type == 1) || ($type == 3)) {
		$bs = $mainframe->getBlogSectionCount();
		$bc = $mainframe->getBlogCategoryCount();
		$gbs = $mainframe->getGlobalBlogSectionCount();
	}
}
// Вывод
?>
<ul class="latestnews">
<?php
foreach ($rows as $row) {
	if(isset($row->created))
		$row->created = mosFormatDate($row->created, $params->get('date_format'));
// получаем Itemid
		if (!$def_itemid > 0) {
			switch ($type) {
				case 2:
					$query = "SELECT id"
					. "\n FROM #__menu"
					. "\n WHERE type = 'content_typed'"
					. "\n AND componentid = " . (int) $row->id;
					$database->setQuery($query);
					$Itemid = $database->loadResult();
					break;
				case 3:
					if ($row->sectionid) {
						$Itemid = $mainframe->getItemid($row->id, 0, 0, $bs, $bc, $gbs);
					} else {
						$query = "SELECT id"
						. "\n FROM #__menu"
						. "\n WHERE type = 'content_typed'"
						. "\n AND componentid = " . (int) $row->id;
						$database->setQuery($query);
						$Itemid = $database->loadResult();
					}
					break;
				case 1:
				default:
					$Itemid = $mainframe->getItemid($row->id, 0, 0, $bs, $bc, $gbs);
					break;
			}
		} else {
			$Itemid = $def_itemid;
		}
// Очистка счетчика itemid для SEF
		if ($Itemid == NULL) {
			$Itemid = '';
		} else {
			$Itemid = '&amp;Itemid='.$Itemid;
		}
		$link = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id='.$row->id . $Itemid);
		?>
	<li>
		<a href="<?php echo $link; ?>" title="<?php echo $row->title; ?>">
			<?php echo $row->title; ?>
		</a>
	</li>
	<?php } ?>
</ul>