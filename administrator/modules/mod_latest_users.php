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

// ����� ������������� ��� ������
$limit = $params->get('num', 10);
// ����������������� �������
$show_today = $params->get('show_today', 1);
// ����������������� �� ������
$show_week = $params->get('show_week', 1);
// ����������������� �� �����
$show_month = $params->get('show_month', 1);
// ������������������ �����
$show_total = $params->get('show_total', 1);
// ������ ��������������
$show_logged = $params->get('show_logged', 1);

// ������ �� ���� ���������� �������������
$query = "SELECT STRAIGHT_JOIN id, name, username, registerDate, usertype, block"
. "\n FROM #__users"
. "\n ORDER BY registerDate DESC";
$database->setQuery($query, 0, $limit);
$rows = $database->loadObjectList();

if ($show_today == 1) {
	$query = "SELECT count(id) FROM #__users WHERE to_days(registerDate) = to_days(curdate()) AND usertype <> 'administrator' AND usertype <> 'superadministrator'";
	$database->setQuery($query);
	$show_today = $database->loadResult();
};
if ($show_week == 1) {
	$query = "SELECT count(id) FROM #__users WHERE yearweek(registerDate) = yearweek(curdate()) AND usertype <> 'administrator' AND usertype <> 'superadministrator'";
	$database->setQuery($query);
	$show_week = $database->loadResult();
};
if ($show_month == 1) {
	$query = "SELECT count(id) FROM #__users WHERE month(registerDate) = month(curdate()) AND year(registerDate) = year(curdate()) AND usertype <> 'administrator' AND usertype <> 'superadministrator'";
	$database->setQuery($query);
	$show_month = $database->loadResult();
};
if ($show_total == 1) {
	$query = "SELECT count(id) as registered FROM #__users WHERE usertype <> 'administrator' AND usertype <> 'superadministrator'";
	$database->setQuery($query);
	$show_total = $database->loadResult();
}
if ($show_logged == 1) {
	$query = "SELECT COUNT(*) FROM #__session WHERE userid != 0";
	$database->setQuery($query);
	$show_logged = $database->loadResult();
}
?>
<table class="adminlist">
	<tr>
		<th><p><?php echo _ADMINLIST_NEW; ?></p></th>
		<th><p><?php echo _ADMINLIST_ENABLE; ?></p></th>
		<th><p><?php echo _ADMINLIST_GROUP; ?></p></th>
		<th><p><?php echo _ADMINLIST_REGISTERED; ?></p></th>
	</tr>
	<?php
	$i = 0;
	$k = 0;
	foreach ($rows as $row) {
		++$i;
		$check = '';
		if ($acl->acl_check('administration', 'manage', 'users', $my->usertype, 'components', 'com_users')) {
			$link = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id=' . $row->id;
			$username = '<a href="' . $link . '" title="' . _CHANGE_USER_DATA . '">' . $row->name . ' (' . $row->username . ')</a>';
			if ($row->id != $my->id)
				$check = 'class="td-state" onclick="ch_publ(' . $row->id . ',\'com_users\');"';
		} else {
			$username = $row->name.' ('.$row->username.')';
		}
		$img = ($row->block == 0) ? 'tick.png' : 'publish_x.png';
		?>
	<tr class="row<?php echo $k; ?>">
		<td><p><?php echo $username; ?></p></td>
		<td width="5%" <?php echo $check; ?>>
			<p><img id="img-pub-<?php echo $row->id; ?>" class="img-mini-state" alt="<?php echo _USER_BLOCK; ?>" src="images/<?php echo $img; ?>" /></p>
		</td>
		<td><p><?php echo $row->usertype; ?></p></td>
		<td><p><?php echo mosFormatDate($row->registerDate); ?></p></td>
	</tr>
		<?php
		$k = 1 - $k;
	}
	unset($rows, $row);

	$text = '';
	$text .= $show_logged ? '<li>' . _NOW_ON_SITE . ': <strong>' . $show_logged . '</strong></li>' : null;
	if ($show_total or $show_today or $show_week or $show_month) {
		$text .= '<li>' . _REGISTERED_USERS_COUNT . ':</li>';
	};
	$text .= $show_total ? '<li>' . _ALL_REGISTERED_USERS_COUNT . ': <strong>' . $show_total . '</strong></li>' : null;
	$text .= $show_today ? '<li>' . _TODAY_REGISTERED_USERS_COUNT . ': <strong>' . $show_today . '</strong></li>' : null;
	$text .= $show_week ? '<li>' . _WEEK_REGISTERED_USERS_COUNT . ': <strong>' . $show_week . '</strong></li>' : null;
	$text .= $show_month ? '<li>' . _MONTH_REGISTERED_USERS_COUNT . ': <strong>' . $show_month . '</strong></li>' : null;
	?>
	<tr class="row<?php echo $k; ?>">
		<td colspan="4"><ul><?php echo $text; ?></ul></td>
	</tr>
</table>
<input type="hidden" name="option" value="" />