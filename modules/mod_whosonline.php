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
$params_aray = array(
// �������� ���������
'moduleclass_sfx' => $params->get('moduleclass_sfx'),
'all_user' => $params->get('all_user'),
'online_user_count' => $params->get('online_user_count'),
'online_users' => $params->get('online_users'),
'user_avatar' => $params->get('user_avatar'),
'module_orientation' => $params->get('module_orientation'),
);
$output = '';
display_module($params_aray);
unset($params_aray);
function display_module($params_aray) {
echo '<div class="whosonline">';
	if ($params_aray['all_user']) {
	$all_user = '<span>'._REGISTERED_ONLINE.'</span> <span class="counter">'.all_user().'</span><br />';
	} else {
	$all_user = '';
	}
	if ($params_aray['online_user_count'] !== 2) {
	$count_online = '<span>'._NOW_ONLINE.'</span> <span class="counter">'.online_users($params_aray).'</span>';
	} else {
	$count_online = '';
	}
	if ($params_aray['online_users']) {
	$online_users = who_online($params_aray);
	} else {
	$online_users = '';
	}
	if ($params_aray['module_orientation'] == 0) { // �������������
	echo '<div class="gorizontal"><p>'.$all_user.' '.$count_online.' '.$online_users.'</p></div>';
	} else { // �����������
	echo '<div class="vertical"><p>'.$all_user.'</p><p>'.$count_online.'</p><p>'.$online_users.'</p></div>';
	}
echo '</div>';
}
function online_users($params_aray) {
	global $database;
	$output = '';
	$query = 'SELECT guest, usertype FROM #__session';
	$database->setQuery($query);
	$sessions = $database->loadObjectList();
// ������� ����� ������ � ������������������ �������������
	$user_array = 0;
	$guest_array = 0;
	foreach ($sessions as $session) {
// if guest increase guest count by 1
	if ($session->guest == 1 && !$session->usertype) {
		$guest_array++;
	}
// if member increase member count by 1
	if ($session->guest == 0) {
		$user_array++;
	}
	}
	if ($params_aray['online_user_count'] == 0) {
		$itogo = $guest_array + $user_array;
		return $itogo;
	}
// �������� ������� ������ � ������������������ ������������� �� �����
	if ($guest_array != 0 || $user_array != 0) {
// ������� ������
		if ($guest_array == 1) {
// ������ 1 �����
			$output .= sprintf(_GUEST_COUNT, $guest_array).' ';
		/*} else
		if ($guest_array > 1) {*/
		} else {
// ����� 1 �����
			$output .= sprintf(_GUESTS_COUNT, $guest_array).' ';
		}
// ����� � ������������������ ������������ online
		if ($guest_array != 0 && $user_array != 0) {
			$output .= _AND;
		}
// ������� ������������������ �������������
		if ($user_array == 1) {
// ������ 1 ������������������ ������������
			$output .= sprintf(_MEMBER_COUNT, $user_array);
		/*} else
		if ($user_array > 1) {*/
		} else {
// ����� 1 ������������������ �������������
			$output .= sprintf(_MEMBERS_COUNT, $user_array);
		}
		$output .= _ONLINE;
	}
	return $output;
}
function who_online($params_aray) {
	global $database, $mosConfig_live_site;
	$output = '';
	$query = 'SELECT a.username, a.userid, b.name, b.id FROM #__session AS a, #__users AS b WHERE a.guest = 0 AND a.userid=b.id';
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	if (count($rows)) {
		if ($params_aray['module_orientation'] == 0) {
			$orientation = 'gorizontal';
		} else {
			$orientation = 'vertical';
		}
// �����
$output .= '<ul class="usersonline ' . $orientation . '">';
	foreach ($rows as $row) {
		if ($params_aray['online_users'] == 1) {
			$user_name = $row->username;
		} else {
			$user_name = $row->name;
		}
		$user_link = 'index.php?option=com_user&amp;task=profile&amp;user='.$row->userid;
		$user_seflink = '<a href="'.sefRelToAbs($user_link).'" title="'.$user_name.'" class="user_name">'.$user_name.'</a>';
		$avatar = '<figure><img class="user_avatar_img" src="'.$mosConfig_live_site . mosUser::avatar($row->userid, 'mini').'" alt="'.$user_name.'" /></figure>';
		$avatar_link = '<a href="'.sefRelToAbs($user_link).'" title="'.$user_name.'">'.$avatar.'</a>';
		if ($params_aray['user_avatar'] == 1) {
			$user_item = $avatar_link . $user_seflink;
		} else
		if ($params_aray['user_avatar'] == 2) {
			$user_item = $avatar_link;
		} else {
			$user_item = $user_seflink;
		}
	$output .= '<li>';
	$output .= '<p>' . $user_item . '</p>';
	$output .= '</li>';
	}
$output .= '</ul>';
	}
	return $output;
}
function all_user() {
	global $database;
	$q = 'SELECT COUNT(id) FROM #__users WHERE block=0';
	$database->setQuery($q);
	$row = $database->loadResult();
	return $row;
}
?>