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

global $mosConfig_list_limit, $my, $mosConfig_absolute_path, $option;

require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/includes/pageNavigation.php');

$limit = $mainframe->getUserStateFromRequest("viewlistlimit", 'limit', $mosConfig_list_limit);
$limitstart = $mainframe->getUserStateFromRequest("view{$option}", 'limitstart', 0);

// hides Administrator or Super Administrator from list depending on usertype
$and = '';
// ��������������
if ($my->gid == 24) {
	$and = "\n AND userid != '25'";
}
// ���������
if ($my->gid == 23) {
	$and = "\n AND userid != '25' AND userid != '24'";
}

// ������ ����� �������������� �������������
$query = "SELECT COUNT(*) FROM #__session WHERE userid != 0" . $and;
$database->setQuery($query);
$total = $database->loadResult();

// page navigation
$pageNav = new mosPageNav($total, $limitstart, $limit);

$query = "SELECT* FROM #__session WHERE userid != 0"
		. $and
		. "\n ORDER BY usertype, username";
$database->setQuery($query, $pageNav->limitstart, $pageNav->limit);
$rows = $database->loadObjectList();
?>
<table class="adminlist">
	<tr>
		<th colspan="4" class="title"><?php echo _NOW_ON_SITE_REGISTERED; ?></th>
	</tr>
	<?php
	$i = 0;
	$k = 0;
	foreach ($rows as $row) {
		if ($acl->acl_check('administration', 'manage', 'users', $my->usertype, 'components', 'com_users')) {
			$link = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id=' . $row->userid;
			$name = '<a href="' . $link . '" title="' . _CHANGE_USER_DATA . '">' . $row->username . '</a>';
		} else {
			$name = $row->username;
		}
		?>
	<tr class="row<?php echo $k; ?>">
		<td width="5%"><?php echo $pageNav->rowNumber($i); ?></td>
		<td width="60%"><?php echo $name; ?></td>
		<td><?php echo $row->usertype; ?></td>
			<?php
			if ($acl->acl_check('administration', 'manage', 'users', $my->usertype, 'components', 'com_users')) {
				?>
		<td>
			<a href="index2.php?option=com_users&task=flogout&id=<?php echo $row->userid; ?>&<?php echo josSpoofValue(); ?>=1">
				<img src="images/publish_x.png" width="12" height="12" alt="<?php echo _DISABLE; ?>" title="<?php echo _DISABLE ?>" />
			</a>
		</td>
				<?php
			}
			?>
	</tr>
		<?php
		++$i;
	}
	?>
</table>
<?php echo $pageNav->getListFooter(); ?>
<input type="hidden" name="option" value="" />