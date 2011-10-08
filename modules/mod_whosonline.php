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
$params_aray = array(// Основные настройки
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
echo '<div class="mod_who_online' . $moduleclass_sfx . '">';
	if ($params_aray['all_user']) {
	$all_user = '<span>' . _REGISTERED_ONLINE . '</span> <span class="counter">' . all_user() . '</span>';
	} else {
	$all_user = '';
	}
	if ($params_aray['online_user_count'] !== '2') {
	$count_online = '<span>' . _NOW_ONLINE . '</span> <span class="counter">' . online_users($params_aray) . '</span>';
	} else {
	$count_online = '';
	}
	if ($params_aray['online_users']) {
	$online_users = who_online($params_aray);
	} else {
	$online_users = '';
	}
	if ($params_aray['module_orientation'] == '0') { // горизонтально
	echo '<div class="mod_who_online_info' . $moduleclass_sfx . '">';
	echo $all_user;
	echo '&nbsp;';
	echo $count_online;
	echo '</div>';
	echo $online_users;
	} else { // вертикально
	echo $all_user;
	echo '<br />';
	echo $count_online;
	echo '<br />';
	echo $online_users;
	}
echo '</div>';
}

function online_users($params_aray) {
	global $database;
	$output = '';
	$query = "SELECT guest, usertype FROM #__session";
	$database->setQuery($query);
	$sessions = $database->loadObjectList();
// подсчет числа гостей и зарегистрированных пользователей
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
	if ($params_aray['online_user_count'] == '0') {
		$itogo = $guest_array + $user_array;
		return $itogo;
	}
// проверка наличия гостей и зарегистрированных пользователей на сайте
	if ($guest_array != 0 || $user_array != 0) {
// подсчет гостей
		if ($guest_array == 1) {
// только 1 гость
			$output .= sprintf(_GUEST_COUNT, $guest_array);
		} else
		if ($guest_array > 1) {
// более 1 гостя
			$output .= sprintf(_GUESTS_COUNT, $guest_array);
		}
// гости и зарегистрированные пользователи online
		if ($guest_array != 0 && $user_array != 0) {
			$output .= _AND;
		}
// подсчет зарегистрированных пользователей
		if ($user_array == 1) {
// только 1 зарегистрированный пользователь
			$output .= sprintf(_MEMBER_COUNT, $user_array);
		} else
		if ($user_array > 1) {
// более 1 зарегистрированных пользователей
			$output .= sprintf(_MEMBERS_COUNT, $user_array);
		}
		$output .= _ONLINE;
	}
	return $output;
}

function who_online($params_aray) {
	global $database, $mosConfig_live_site;
	$output = '';
	$query = "SELECT a.username, a.userid, b.name, b.id FROM #__session AS a, #__users AS b WHERE a.guest = 0 AND a.userid=b.id";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	if (count($rows)) {
		if ($params_aray['module_orientation'] == '1') {
			$dop_class = "gorizontal";
		} else {
			$dop_class = "vertical";
		}
// вывод
$output .= '<ul class="users_online' . $moduleclass_sfx . $dop_class . '">';
	foreach ($rows as $row) {
		if ($params_aray['online_users'] == '1') {
			$user_name = $row->username;
		} else {
			$user_name = $row->name;
		}
		$user_link = 'index.php?option=com_user&amp;task=profile&amp;user=' . $row->userid;
		$user_seflink = '<a href="' . sefRelToAbs($user_link) . '" title="' . $user_name . '">' . $user_name . '</a>';
		$avatar = '<img id="user_avatar_img" src="' . $mosConfig_live_site . mosUser::avatar($row->userid, 'mini') . '" alt="' . $user_name . '" />';
		$avatar_link = '<a href="' . sefRelToAbs($user_link) . '" title="' . $user_name . '">' . $avatar . '</a>';
		if ($params_aray['user_avatar'] == '1') {
			$user_item = $avatar_link . $user_seflink;
		} else
		if ($params_aray['user_avatar'] == '2') {
			$user_item = $avatar_link;
		} else {
			$user_item = $user_seflink;
		}
	$output .= '<li>';
	$output .= $user_item;
	$output .= '</li>';
		}
$output .= '</ul>';
	}
	return $output;
}

function all_user() {
	global $database;
	$q = "SELECT COUNT(id) FROM #__users WHERE block = '0' ";
	$database->setQuery($q);
	$row = $database->loadResult();
	return $row;
}
?>