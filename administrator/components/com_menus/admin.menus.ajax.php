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
global $mosConfig_absolute_path,$mosConfig_live_site,$my;


$task = mosGetParam($_GET,'task','publish');
$id = intval(mosGetParam($_GET,'id','0'));

switch($task) {
	case "publish":
		echo x_publish($id);
		return;
	case "access":
		echo x_access($id);
		return;
	default:
		echo 'error-task';
		return;
}


function x_access($id){
	global $database;
	$access = mosGetParam($_GET,'chaccess','accessregistered');
	$option = strval(mosGetParam($_REQUEST,'option',''));
	switch($access) {
		case 'accesspublic':
			$access = 0;
			break;
		case 'accessregistered':
			$access = 1;
			break;
		case 'accessspecial':
			$access = 2;
			break;
		default:
			$access = 0;
			break;
	}
	$row = new mosMenu($database);
	$row->load((int)$id);
	$row->access = $access;

	if(!$row->check()) return 'error-check';
	if(!$row->store()) return 'error-store';

	if(!$row->access) {
		$color_access = 'style="color: green;"';
		$task_access = 'accessregistered';
		$text_href = '�����';
	} elseif($row->access == 1) {
		$color_access = 'style="color: red;"';
		$task_access = 'accessspecial';
		$text_href = '���������';
	} else {
		$color_access = 'style="color: black;"';
		$task_access = 'accesspublic';
		$text_href = '�����������';
	}
	// ������ ���
	mosCache::cleanCache('com_content');
	return '<a href="#" onclick="ch_access('.$row->id.',\''.$task_access.'\',\''.$option.'\')" '.$color_access.'>'.$text_href.'</a>';
}

function x_publish($id = null) {
	global $database,$my;

	if(!$id) return 'error-id';

	$query = "SELECT published FROM #__menu WHERE id = ".(int)$id;
	$database->setQuery($query);
	$state = $database->loadResult();

	if($state == '1') {
		$ret_img = 'publish_x.png';
		$state = '0';
	} else {
		$ret_img = 'publish_g.png';
		$state = '1';
	}
	$query = "UPDATE #__menu SET published = ".(int)$state
			."\n WHERE id = ".$id." AND ( checked_out = 0 OR ( checked_out = ".(int)$my->id." ) )";
	$database->setQuery($query);
	if(!$database->query()) {
		return 'error-db';
	} else {
		mosCache::cleanCache('com_content');
		return $ret_img;
	}
}
?>