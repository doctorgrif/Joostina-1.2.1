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
global $mosConfig_offset, $my;
$count = intval($params->get('count', 20));
$access = !$mainframe->getCfg('shownoauth');
$now = _CURRENT_SERVER_TIME;
$nullDate = $database->getNullDate();
$query = "SELECT STRAIGHT_JOIN a.id AS id, a.title AS title, COUNT(b.id) as cnt"
	. "\n FROM #__sections as a"
	. "\n LEFT JOIN #__content as b ON a.id = b.sectionid"
	. ($access ? "\n AND b.access <= " . (int) $my->gid : '')
	. "\n AND (b.publish_up = " . $database->Quote($nullDate) . " OR b.publish_up <= " . $database->Quote($now) . ")"
	. "\n AND (b.publish_down = " . $database->Quote($nullDate) . " OR b.publish_down >= " . $database->Quote($now) . ")"
	. "\n WHERE a.scope = 'content'"
	. "\n AND a.published = 1"
	. ($access ? "\n AND a.access <= " . (int) $my->gid : '')
	. "\n GROUP BY a.id"
	. "\n HAVING COUNT(b.id) > 0"
	. "\n ORDER BY a.ordering";
$database->setQuery($query, 0, $count);
$rows = $database->loadObjectList();
if ($rows) {
// list of sectionids, used to find corresponding Itemids
	for ($i = 0, $n = count($rows); $i < $n; ++$i) {
		$sids[] = (int) $rows[$i]->id;
	}
// add 0 to the list, to get the Itemid of a global blog section item as a fallback
	$sids[] = 0;
// �������� Itemids ��������
	$query = "SELECT STRAIGHT_JOIN m.id AS Itemid, m.componentid AS sectionid"
		. "\n FROM #__menu AS m"
		. "\n WHERE ( m.type = 'content_section' OR m.type = 'content_blog_section' )"
		. "\n AND m.published = 1"
		. ( $access ? "\n AND m.access <= " . (int) $my->gid : '' )
		. "\n AND ( m.componentid=" . implode(" OR m.componentid=", $sids) . " )"
		. "\n ORDER BY m.type DESC, m.id DESC";
	$database->setQuery($query);
	$itemids = $database->loadObjectList('sectionid');
	?>
<ul class="section">
<?php
	foreach ($rows as $row) {
	if (isset($itemids[$row->id])) {
		$link = sefRelToAbs('index.php?option=com_content&amp;task=blogsection&amp;id='.$row->id.'&amp;Itemid='.$itemids[$row->id]->Itemid);
	} else if (isset($itemids[0])) {
		$link = sefRelToAbs('index.php?option=com_content&amp;task=blogsection&amp;id='.$row->id.'&amp;Itemid='.$itemids[0]->Itemid);
	} else {
		$link = sefRelToAbs('index.php?option=com_content&amp;task=blogsection&amp;id='.$row->id);
	}
?>
	<li>
		<a href="<?php echo $link; ?>" title="<?php echo $row->title; ?>"><?php echo $row->title; ?></a>
	</li>
<?php } ?>
</ul>
<?php } ?>