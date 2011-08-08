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

// ����� �������� ����������� ��� ������
$limit = $params->get('num', 10);
$type = $params->get('type', 0);
$ext = $params->get('ext', 1);

$where = $ext ? "\n LEFT JOIN #__categories AS c ON c.id = a.catid LEFT JOIN #__sections AS s ON s.id = a.sectionid" : '';

switch ($type) {
	case 2:
		$where .= "\n WHERE a.state = 0"; // ������ �� ��������������
		break;
	case 1:
		$where .= "\n WHERE a.state = 1"; // ������ ��������������
		break;
	case 0:
	default:
		$where .= "\n WHERE a.state != -2"; // ��� ��������
		break;
}

$select = $ext ? "\n c.title AS catname, s.name AS secname," : '';
$query = "SELECT a.id, a.sectionid, a.title, a.created, $select u.name, a.created_by_alias, a.created_by, a.publish_up, a.publish_down, a.state"
		. "\n FROM #__content AS a"
		. "\n LEFT JOIN #__users AS u ON u.id = a.created_by"
		. $where
		. "\n ORDER BY created DESC"; // ���������� �� ������� ��������, ����� �������
$database->setQuery($query, 0, $limit);
$rows = $database->loadObjectList();
?>

<table class="adminlist">
	<tr>
		<th colspan="3" class="title"><?php echo _LAST_ADDED_CONTENT ?> <small> (<a href="index2.php?option=com_content&sectionid=0"><?php echo _ADMINLIST_ALL; ?></a>)</small></th>
		<th align="center"><?php echo _USER_WHO_ADD_CONTENT ?></th>
	</tr>
	<?php
	$nullDate = $database->getNullDate();
	$now = _CURRENT_SERVER_TIME;
	$k = 0;
	foreach ($rows as $row) {
		// ��������� ������ ������� �����������
		if ($now <= $row->publish_up && $row->state == 1) {
			// ������������
			$img = 'publish_y.png';
		} else if (($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state == 1) {
			// ��������
			$img = 'publish_g.png';
		} else if ($now > $row->publish_down && $row->state == 1) {
			// �������
			$img = 'publish_r.png';
		} else if ($row->state == 0) {
			// �� ������������
			$img = 'publish_x.png';
		}
		if ($row->sectionid == 0) {
			// ��������� ����������
			$link = 'index2.php?option=com_typedcontent&amp;task=edit&amp;hidemainmenu=1&amp;id=' . $row->id;
		} else {
			// ������� ����������
			$link = 'index2.php?option=com_content&amp;task=edit&amp;hidemainmenu=1&amp;id=' . $row->id;
		}
		if ($acl->acl_check('administration', 'manage', 'users', $my->usertype, 'components', 'com_users')) {
			if ($row->created_by_alias) {
				$author = $row->created_by_alias;
			} else {
				$linkA = 'index2.php?option=com_users&task=editA&amp;hidemainmenu=1&id=' . $row->created_by;
				$author = '<a href="' . $linkA . '" title="' . _CHANGE_USER_DATA . '">' . htmlspecialchars($row->name, ENT_QUOTES) . '</a>';
			}
		} else {
			if ($row->created_by_alias) {
				$author = $row->created_by_alias;
			} else {
				$author = htmlspecialchars($row->name, ENT_QUOTES);
			}
		}
		?>
	<tr class="row<?php echo $k; ?>">
		<td width="10%" align="center"><?php echo $row->created; ?></td>
		<td align="left" width="60%">
			<a href="<?php echo $link; ?>"><?php echo htmlspecialchars($row->title, ENT_QUOTES); ?></a><br />
				<?php
				if ($ext) {
					if ($row->sectionid != 0)
						echo $row->secname . ' / ' . $row->catname; // ������ / ���������
					else
						echo _STATIC_CONTENT; // ��� ������������ ����������� - ��������� ����������
				}
				?>
		</td>
		<td width="5%" class="td-state" align="center" onclick="ch_publ(<?php echo $row->id; ?>,'com_content');">
			<img id="img-pub-<?php echo $row->id; ?>" class="img-mini-state" alt="<?php echo _E_PUBLISHING ?>" src="images/<?php echo $img; ?>" />
		</td>
		<td align="left" width="20%"><?php echo $author; ?></td>
	</tr>
		<?php
		$k = 1 - $k;
	}
	unset($rows, $row);
	?>
</table>