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
if (!$my->id) {
	die('error-acl');
}
$task = mosGetParam($_REQUEST, 'task', '');
$id = $my->id;
switch ($task) {
	case 'uploadavatar':
		echo x_uploadavatar($id);
		return;
	case 'delavatar':
		echo x_delavatar();
		return;
	default:
		echo 'error-task';
		return;
}

function x_uploadavatar($id) {
	global $mosConfig_absolute_path, $mosConfig_live_site;
	$file = $_FILES['avatar']['tmp_name'];
	$res = img_resize($file, $mosConfig_absolute_path . '/images/avatars/' . $id . '.jpg', 200, 200);
	$res_normal = img_resize($file, $mosConfig_absolute_path . '/images/avatars/normal/' . $id . '.jpg', 100, 100);
	$res_mini = img_resize($file, $mosConfig_absolute_path . '/images/avatars/mini/' . $id . '.jpg', 50, 50);
	$res_micro = img_resize($file, $mosConfig_absolute_path . '/images/avatars/micro/' . $id . '.jpg', 25, 25);
	if ($res && $res_mini && $res_micro && $res_normal)
		return $mosConfig_live_site . mosUser::avatar($id, 'big') . '?' . time();
	return 0;
}

function x_delavatar() {
	global $mosConfig_absolute_path, $mosConfig_live_site, $my;
	$id = $my->id;
	$res = unlink($mosConfig_absolute_path . '/images/avatars/' . $id . '.jpg');
	$res_normal = unlink($mosConfig_absolute_path . '/images/avatars/normal/' . $id . '.jpg');
	$res_mini = unlink($mosConfig_absolute_path . '/images/avatars/mini/' . $id . '.jpg');
	$res_micro = unlink($mosConfig_absolute_path . '/images/avatars/micro/' . $id . '.jpg');
	if ($res && $res_mini && $res_micro && $res_normal)
		return $mosConfig_live_site . mosUser::avatar($id, 'big') . '?' . time();
	return 0;
}

function img_resize($src, $dest, $width=250, $height=250, $quality = 100) {
	if (!file_exists($src))
		return false;
	$size = getimagesize($src);
	list($width_orig, $height_orig) = $size;
	if ($size === false)
		return false;
	$format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
	$icfunc = 'imagecreatefrom' . $format;
	if (!function_exists($icfunc))
		return false;
	$ratio_orig = $width_orig / $height_orig;
	if ($width / $height > $ratio_orig) {
		$width = $height * $ratio_orig;
	} else {
		$height = $width / $ratio_orig;
	}
	$isrc = $icfunc($src);
	$idest = imagecreatetruecolor($width, $height);
	@imagealphablending($idest, false);
	@imagesavealpha($idest, true);
	imagecopyresampled($idest, $isrc, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
	imagejpeg($idest, $dest, $quality);
	imagedestroy($isrc);
	imagedestroy($idest);
	return true;
}
?>