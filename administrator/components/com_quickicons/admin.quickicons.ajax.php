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
/* ���� �� �������������� ����������*/
if(!$my->id) exit;

$task = mosGetParam($_GET,'task','publish');
$id = intval(mosGetParam($_GET,'id','0'));

// ������������ ���������� �������� task
switch($task) {
	case "publish":
		echo x_publish($id);
		return;
	default:
		echo "task not found";
		return;
}


/* ���������� �������
* $id - ������������� �������
*/
function x_publish($id = null) {
	global $database;
	// id ����������� ��� ��������� �� ������� - ����� ������
	if(!$id) return _UNKNOWN_ID;

	$state = new stdClass();
	$query = "SELECT published FROM #__quickicons WHERE id = ".(int)$id;
	$database->setQuery($query);
	$state = $database->loadResult();
	if($state == '1') {
		$ret_img = 'publish_x.png';
		$state = '0';
	} else {
		$ret_img = 'publish_g.png';
		$state = '1';
	}
	$query = 'UPDATE #__quickicons SET published = '.$state.' WHERE id = '.(int)$id;
	$database->setQuery($query);
	if(!$database->query()) {
		return 'error!';
	} else {
		return $ret_img;
	}
}

?>