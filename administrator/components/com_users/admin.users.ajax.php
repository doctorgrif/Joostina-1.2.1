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

if(!$acl->acl_check('administration','manage','users',$my->usertype,'components','com_users')) {
	die('error-acl');
}

$task	= mosGetParam($_REQUEST,'task','');
$id		= intval(mosGetParam($_REQUEST,'id','0'));

switch($task) {
	case 'publish':
		echo x_user_block($id);
		return;

	case 'apply':
		echo x_apply();
		return;

	case 'uploadavatar':
		echo x_uploadavatar($id);
		return;

	case 'delavatar':
		echo x_delavatar($id);
		return;


	default:
		echo 'error-task';
		return;
}

function x_uploadavatar($id){
	global $mosConfig_absolute_path, $mosConfig_live_site;
	$file = $_FILES['avatar']['tmp_name'];

	$res = img_resize($file,$mosConfig_absolute_path . '/images/avatars/' . $id . '.jpg',200,200);
	$res_normal = img_resize($file,$mosConfig_absolute_path . '/images/avatars/normal/' . $id . '.jpg',100,100);
	$res_mini = img_resize($file,$mosConfig_absolute_path . '/images/avatars/mini/' . $id . '.jpg',50,50);
	$res_micro = img_resize($file,$mosConfig_absolute_path . '/images/avatars/micro/' . $id . '.jpg',25,25);

	// ?time() ���������� ����� ������� �� ��������� �����������, � ����� ��� ��������
	if($res && $res_micro && $res_mini && $res_normal)
	return $mosConfig_live_site.mosUser::avatar($id,'big').'?'.time();

	return 0;
}

function x_delavatar($id){
	global $mosConfig_absolute_path, $mosConfig_live_site;

	$res = unlink ($mosConfig_absolute_path . '/images/avatars/' . $id . '.jpg');
	$res_normal = unlink ($mosConfig_absolute_path . '/images/avatars/normal/' . $id . '.jpg');
	$res_mini = unlink ($mosConfig_absolute_path . '/images/avatars/mini/' . $id . '.jpg');
	$res_micro = unlink ($mosConfig_absolute_path . '/images/avatars/micro/' . $id . '.jpg');

	if($res && $res_micro && $res_mini&& $res_normal)
	return $mosConfig_live_site.mosUser::avatar($id,'big').'?'.time();

	return 0;
}

// ���������� ������������
function x_user_block($id){
	global $database,$my;

	if($my->id==$id) return 'info.png';

	$query = "SELECT block FROM #__users WHERE id = ".(int)$id;
	$database->setQuery($query);
	$block = $database->loadResult();

	if($block == '0') {
		// ������������ ��� ��������
		$ret_img = 'publish_x.png';
		$block = '1';
	} else {
		// ������������ ��� ������������
		$ret_img = 'tick.png';
		$block = '0';
	}

	$query = "UPDATE #__users"
			."\n SET block = ".(int)$block
			."\n WHERE id = $id";
	$database->setQuery($query);
	if(!$database->query()) {
		return 'error-db';
	}

	$user = new mosUser($database);
	$user->load($id);
	// ������� ��������� ����������� ���� ������������� ����� �������������������
	if($my->gid != 24 && $user->gid != 25){
		// ������� ������ ��������������� ������������
		$query = "DELETE FROM #__session WHERE userid = $id";
		$database->setQuery($query);
		$database->query();
	}
	return $ret_img;
}

function img_resize($src, $dest, $width = 250, $height = 250, $quality = 100) {
	if(!file_exists($src)) return false;
	$size = getimagesize($src);
	list($width_orig, $height_orig) = $size;

	if($size === false) return false;
	$format = strtolower(substr($size['mime'],strpos($size['mime'],'/') + 1));
	$icfunc = "imagecreatefrom".$format;
	if(!function_exists($icfunc)) return false;
	$ratio_orig = $width_orig/$height_orig;

	if ($width/$height > $ratio_orig) {
		$width = $height*$ratio_orig;
	} else {
		$height = $width/$ratio_orig;
	}

	$isrc = $icfunc($src);
	$idest = imagecreatetruecolor($width, $height);
	imagecopyresampled($idest, $isrc, 0, 0, 0, 0, $width, $height, $size[0] ,$size[1]);
	imagejpeg($idest, $dest, $quality);
	imagedestroy($isrc);
	imagedestroy($idest);
	return true;
}
?>