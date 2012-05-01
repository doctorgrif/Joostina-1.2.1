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
global $my, $task, $option;
// Editor usertype check
$access = new stdClass();
$access->canEdit = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'all');
$access->canEditOwn = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'own');
require_once ($mainframe->getPath('front_html'));
switch ($task) {
	case 'Profile':
	case 'UserDetails':
		userEdit($option, $my->id, _UPDATE);
		break;
	case 'saveUserEdit':
// check to see if functionality restricted for use as demo site
		if ($_VERSION->RESTRICT == 1) {
			mosRedirect('index.php?mosmsg=' . _RESTRICT_FUNCTION);
		} else {
			userSave($option, $my->id);
		}
		break;
	case 'CheckIn':
		CheckIn($my->id, $access, $option);
		break;
	case 'cancel':
		mosRedirect('index.php');
		break;
	default:
		HTML_user::frontpage();
		break;
}

function userEdit($option, $uid, $submitvalue) {
	global $database, $mainframe;
	global $mosConfig_absolute_path;
// security check to see if link exists in a menu
	$link = 'index.php?option=com_user&task=UserDetails';
	$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE link LIKE '%$link%'"
			. "\n AND published = 1";
	$database->setQuery($query);
	$exists = $database->loadResult();
	if (!$exists) {
		mosNotAuth();
		return;
	}
	require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/com_users/users.class.php');
	if ($uid == 0) {
		mosNotAuth();
		return;
	}
	$row = new mosUser($database);
	$row->load((int) $uid);
	$row->orig_password = $row->password;
	$row->name = trim($row->name);
	$row->email = trim($row->email);
	$row->username = trim($row->username);
	$file = $mainframe->getPath('com_xml', 'com_users');
	$params = &new mosUserParameters($row->params, $file, 'component');
	HTML_user::userEdit($row, $option, $submitvalue, $params);
}

function userSave($option, $uid) {
	global $database, $my, $mosConfig_frontend_userparams;
	$user_id = intval(mosGetParam($_POST, 'id', 0));
// do some security checks
	if ($uid == 0 || $user_id == 0 || $user_id != $uid) {
		mosNotAuth();
		return;
	}
// simple spoof check security
	josSpoofCheck();
	$row = new mosUser($database);
	$row->load((int) $user_id);
	$orig_password = $row->password;
	$orig_username = $row->username;
	if (!$row->bind($_POST, 'gid usertype')) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
	$row->name = trim($row->name);
	$row->email = trim($row->email);
	$row->username = trim($row->username);
	mosMakeHtmlSafe($row);
	if (isset($_POST['password']) && $_POST['password'] != '') {
		if (isset($_POST['verifyPass']) && ($_POST['verifyPass'] == $_POST['password'])) {
			$row->password = trim($row->password);
			$salt = mosMakePassword(16);
			$crypt = md5($row->password . $salt);
			$row->password = $crypt . ':' . $salt;
		} else {
			echo "<script>alert('" . addslashes(_PASS_MATCH) . "'); window.history.go(-1);</script>\n";
			exit();
		}
	} else {
// Restore 'original password'
		$row->password = $orig_password;
	}
	if ($mosConfig_frontend_userparams == '1' || $mosConfig_frontend_userparams == 1 ||
			$mosConfig_frontend_userparams == null) {
// save params
		$params = mosGetParam($_POST, 'params', '');
		if (is_array($params)) {
			$txt = array();
			foreach ($params as $k => $v) {
				$txt[] = "$k=$v";
			}
			$row->params = implode("\n", $txt);
		}
	}
	if (!$row->check()) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script>alert('" . $row->getError() . "'); window.history.go(-1);</script>\n";
		exit();
	}
// check if username has been changed
	if ($orig_username != $row->username) {
// change username value in session table
		$query = "UPDATE #__session"
				. "\n SET username = " . $database->Quote($row->username)
				. "\n WHERE username = " . $database->Quote($orig_username)
				. "\n AND userid = " . (int) $my->id
				. "\n AND gid = " . (int) $my->gid
				. "\n AND guest = 0";
		$database->setQuery($query);
		$database->query();
	}
	userEdit($option, $my->id, _UPDATE);
}

function CheckIn($userid, $access) {
	global $database;
	global $mosConfig_db;
	$nullDate = $database->getNullDate();
	if (!($access->canEdit || $access->canEditOwn || $userid > 0)) {
		mosNotAuth();
		return;
	}
// security check to see if link exists in a menu
	$link = 'index.php?option=com_user&task=CheckIn';
	$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE link LIKE '%$link%'"
			. "\n AND published = 1";
	$database->setQuery($query);
	$exists = $database->loadResult();
	if (!$exists) {
		mosNotAuth();
		return;
	}
	$lt = mysql_list_tables($mosConfig_db);
	$k = 0;
	echo '<table>';
	while (list($tn) = mysql_fetch_array($lt)) {
// only check in the jos_* tables
		if (strpos($tn, $database->_table_prefix) !== 0) {
			continue;
		}
		$lf = mysql_list_fields($mosConfig_db, "$tn");
		$nf = mysql_num_fields($lf);
		$checked_out = false;
		$editor = false;
		for ($i = 0; $i < $nf; ++$i) {
			$fname = mysql_field_name($lf, $i);
			if ($fname == 'checked_out') {
				$checked_out = true;
			} else
			if ($fname == 'editor') {
				$editor = true;
			}
		}
		if ($checked_out) {
			if ($editor) {
				$query = "SELECT checked_out, editor"
						. "\n FROM `$tn`"
						. "\n WHERE checked_out > 0"
						. "\n AND checked_out = " . (int) $userid;
				$database->setQuery($query);
			} else {
				$query = "SELECT checked_out"
						. "\n FROM `$tn`"
						. "\n WHERE checked_out > 0"
						. "\n AND checked_out = " . (int) $userid;
				$database->setQuery($query);
			}
			$res = $database->query();
			$num = $database->getNumRows($res);
			if ($editor) {
				$query = "UPDATE `$tn`"
						. "\n SET checked_out = 0, checked_out_time = " . $database->Quote($nullDate) . ", editor = NULL"
						. "\n WHERE checked_out > 0"
						. "\n AND checked_out = " . (int) $userid;
				$database->setQuery($query);
			} else {
				$query = "UPDATE `$tn`"
						. "\n SET checked_out = 0, checked_out_time = " . $database->Quote($nullDate)
						. "\n WHERE checked_out > 0"
						. "\n AND checked_out = " . (int) $userid;
				$database->setQuery($query);
			}
			$res = $database->query();
			if ($res == 1) {
				if ($num > 0) {
					echo '<tr class="row' . $k . '">';
					echo '<td width="250px;">';
					echo _CHECK_TABLE;
					echo ' - ' . $tn . '</td>';
					echo '<td>';
					echo _CHECKED_IN;
					echo '<span class="strong">' . $num . '</span>';
					echo _CHECKED_IN_ITEMS;
					echo '</td>';
					echo '</tr>';
				}
				$k = 1 - $k;
			}
		}
	}
	?>
	<tr>
		<td colspan="2">
			<p class="strong"><?php echo _CONF_CHECKED_IN; ?></p>
		</td>
	</tr>
	</table>
<?php } ?>