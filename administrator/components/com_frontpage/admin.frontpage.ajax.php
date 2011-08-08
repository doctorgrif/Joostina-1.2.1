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

$task = mosGetParam($_GET,'task','rem_front');
$id = intval(mosGetParam($_GET,'id','0'));

// ������������ ���������� �������� task
switch($task) {
	case "publish":
		echo x_publish($id);
		return;
	case "rem_front":
		x_remfront($id);
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
	$row = new mosContent($database);
	$row->load((int)$id);
	$row->access = $access;

	if(!$row->check()) return 'error-check';
	if(!$row->store()) return 'error-store';

	if(!$row->access) {
		$color_access	= 'style="color: green;"';
		$task_access	= 'accessregistered';
		$text_href		= _USER_GROUP_ALL;
	} elseif($row->access == 1) {
		$color_access	= 'style="color: red;"';
		$task_access	= 'accessspecial';
		$text_href		= _USER_GROUP_REGISTERED;
	} else {
		$color_access	= 'style="color: black;"';
		$task_access	= 'accesspublic';
		$text_href		= _USER_GROUP_SPECIAL;
	}
	// ������ ���
	mosCache::cleanCache('com_content');
	return '<a href="#" onclick="ch_access('.$row->id.',\''.$task_access.'\',\''.$option.'\')" '.$color_access.'>'.$text_href.'</a>';
}

/* ���������� �������
* $id - ������������� �������
*/
function x_publish($id = null) {
	global $database,$my;
	// id ����������� ��� ��������� �� ������� - ����� ������
	if(!$id) return _UNKNOWN_ID;

	$state = new stdClass();
	$query = "SELECT state, publish_up, publish_down"
			."\n FROM #__content "
			."\n WHERE id = ".(int)$id;
	$database->setQuery($query);
	$row = $database->loadobjectList();
	$row = $row['0']; // ��������� ������� � ���������� ��������� ��������

	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
	$ret_img = ''; // ���� ���� ����������� ������ ���������� ���� ������� ���������
	if($now <= $row->publish_up && $row->state == 1) {
		// ������� � ����������, ������������, �� ��� �� ��������  - ���������� ������ "��������������"
		$ret_img = 'publish_x.png';
		$state = '0'; // ���� ������������ - ������� � ����������
	} elseif($now <= $row->publish_up && $row->state == 0) {
		// ������� � ����������, �� ������������, � ��� �� ��������  - ���������� ������ "�� �������"
		$ret_img = 'publish_y.png';
		$state = '1';
		/* �� ���� ������������ - ���������*/
	} else
		if(($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state == 1) {
			// �������� � ������������, ������� � ���������� � ���������� ������ "�� ������������"
			$ret_img = 'publish_x.png';
			$state = '0'; // ���� ������������ - ������� � ����������
		} else
			if(($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state == 0) {
				// �������� � ������������, ������� � ���������� � ���������� ������ "�� ������������"
				$ret_img = 'publish_g.png';
				$state = '1';
				/* �� ���� ������������ - ���������*/
			} else
				if($now > $row->publish_down && $row->state == 1) {
					// ������������, �� ���� ���������� ����, ������� � ���������� � ���������� ������ "�� ������������"
					$ret_img = 'publish_x.png';
					$state = '0';
					/* �� ���� ������������ - ���������*/
				} else
					if($now > $row->publish_down && $row->state == 0) {
						// ������������, �� ���� ���������� ����, ������� � ���������� � ���������� ������ "�� ������������"
						$ret_img = 'publish_r.png';
						$state = '1';
						/* �� ���� ������������ - ���������*/
					}

	$query = "UPDATE #__content"
			."\n SET state = ".(int)$state.", modified = ".$database->Quote(date('Y-m-d H:i:s'))
			."\n WHERE id = ".$id." AND ( checked_out = 0 OR (checked_out = ".(int)$my->id.") )";
	$database->setQuery($query);
	if(!$database->query()) {
		return 'error-db';
	} else {
		return $ret_img;
	}
}
/* ���������� ������� �� �������(������) ��������
* $id - ������������� �����������
*/
function x_remfront($id) {
	global $mainframe,$database;
	require_once ($mainframe->getPath('class','com_frontpage'));

	$fp = new mosFrontPage($database);
	if($fp->load($id)) {
		if($fp->delete($id)) {
			echo 1;
			$fp->ordering = 0;
			$fp->updateOrder();
			mosCache::cleanCache('com_content'); // �������� ��� �������
		}else{
			echo 'error-delete';
		}
	}else{
		echo 'error-load';
	}
}

?>
