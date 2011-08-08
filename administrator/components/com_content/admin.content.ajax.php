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

$task	= mosGetParam($_GET,'task','publish');
$id		= intval(mosGetParam($_REQUEST,'id','0'));

// ������������ ���������� �������� task
switch($task) {
	case 'publish':
		echo x_publish($id);
		return;
	case 'frontpage':
		echo x_frontpage($id);
		return;
	case 'to_trash':
		echo x_to_trash($id);
		return;
	case 'apply':
		echo x_save($id);
		return;
	case 'access':
		echo x_access($id);
		return;
	case 'metakey':
		echo x_metakey();
		return;
	case 'resethits':
		echo x_resethits($id);
		return;

	default:
		echo 'error-task';
		return;
}

function x_resethits($id) {
	global $database;
	$row = new mosContent($database);
	$row->Load((int)$id);
	$row->hits = 0;
	$row->store();
	$row->checkin();

	echo '������� ���������� �������';
}

function x_metakey($count = 25,$minlench = 4){
	global $bad_text;
	$introtext	= joostina_api::convert(mosGetParam($_POST,'introtext','',_MOS_ALLOWRAW));
	$fulltext	= joostina_api::convert(mosGetParam($_POST,'fulltext','',_MOS_ALLOWRAW));
	$notetext	= joostina_api::convert(mosGetParam($_POST,'notetext','',_MOS_ALLOWRAW));
	$text	= $introtext .' '. $fulltext .' '. $notetext;
	$text	= trim(strip_tags ($text)); // ������ �� �����
	$remove	= array("rdquo","laquo","raquo","quota","quot","ndash","mdash","�","�", "\t",'\n','\r', "\n","\r", '\\', "'",",",".","/","�","#",";",":","@","~","[","]","{","}","=","-","+",")","(","*","&","^","%","$","<",">","?","!", '"' );
	$text	= str_replace($remove, '', $text ); // ������ �� ������������
	$arr	= explode(' ', $text); // ����� ����� �� ������ �� ����
	$arr	= str_replace($bad_text, '', $arr ); // ������ �� ����-����
	$ret	= array();
	foreach ($arr as $sl) {
		if (strlen($sl) > $minlench) $ret[]= strtolower($sl); // �������� � ������ ���� ����� �� ������ ��������� �����
	}
	$ret = array_count_values ($ret); // �������� ����� � �����������
	arsort ($ret); // ��������� ������, ��� ���� ����������� ����� - ��� ���� ��� ������
	$ret = array_keys($ret);
	$ret = array_slice ($ret, 0, $count); // ���� ������ �������� �������
	$headers = implode (', ', $ret); // �������� ����
	return $headers;
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
	return '<a href="#" onclick="return ch_access('.$row->id.',\''.$task_access.'\',\''.$option.'\')" '.$color_access.'>'.$text_href.'</a>';
}


function x_to_trash($id){
	global $database;

	$state = '-2';
	$ordering = '0';

	$query = "UPDATE #__content SET state = ".(int)$state.", ordering = ".(int)$ordering." WHERE id=".$id;
	$database->setQuery($query);
	if(!$database->query()) {
		return 2; // ������ ����������� � �������
	}else{
		mosCache::cleanCache('com_content');
		return 1; // ����������� � ������� �������
	}
	// ������ ���
}


/* ������� ���������� ����������� ����������
* $id - ������������� �����������
* ����������� ������ ����� ����������
*/
function x_save_old($id) {
	global $database,$my,$mosConfig_one_editor;

	$introtext	= mosGetParam($_POST,'introtext','',_MOS_ALLOWRAW);
	$fulltext	= mosGetParam($_POST,'fulltext','',_MOS_ALLOWRAW);
	$notetext	= mosGetParam($_POST,'notetext','',_MOS_ALLOWRAW);

	// ������������� ������������� ������ ���������
	if($mosConfig_one_editor){
		$alltext	= mosGetParam($_POST,'introtext','',_MOS_ALLOWHTML);
		$tagPos		= strpos( $alltext, '<!-- pagebreak -->' );
		if ( $tagPos === false ){
			$_POST['introtext']	= $alltext;
		} else {
			$_POST['introtext']	= substr($alltext, 0, $tagPos);
			$_POST['fulltext']	= substr($alltext, $tagPos + 18 );
		}
	}

	// ������������ �� ������� � cp1251
	$introtext	= joostina_api::convert($introtext);
	$fulltext	= joostina_api::convert($fulltext);
	$notetext	= joostina_api::convert($notetext);
	$query = "UPDATE #__content"
			." SET `introtext` = '$introtext',"
			." `fulltext` = '$fulltext',"
			." `notetext` = '$notetext'"
			." WHERE id = ".(int)$id." AND ( checked_out = 0 OR (checked_out = ".(int)$my->id.") )";
	$database->setQuery($query);

	$text = '������� ����������: '.gmdate('H:i:s ( d.m.y )');
	if(!$database->query()) {
		$text = 'error-'.$database->getErrorMsg();
		mosCache::cleanCache('com_content');
	}
	return $text;
}


/**
* Saves the content item an edit form submit
* @param database A database connector object
* boston, ������� �������� -  ������� � �������������� ����������� ����� ���������� ��� ���������� ������
*/
function x_save() {
	global $database,$my,$mainframe,$mosConfig_offset,$mosConfig_one_editor;

	$menu		= strval(mosGetParam($_POST,'menu','mainmenu'));
	$menuid		= intval(mosGetParam($_POST,'menuid',0));
	$nullDate	= $database->getNullDate();
	$sectionid	=intval(mosGetParam($_POST,'sectionid',0));
	
	foreach($_POST as $key => $val) {
		$_POST[$key] = joostina_api::convert($val);
	}
	
	// ������������� ������������� ������ ���������
	if($mosConfig_one_editor){
		$alltext	= mosGetParam($_POST,'introtext','',_MOS_ALLOWHTML);
		$tagPos		= strpos( $alltext, '<!-- pagebreak -->' );
		if ( $tagPos === false ){
			$_POST['introtext']	= $alltext;
		} else {
			$_POST['introtext']	= substr($alltext, 0, $tagPos);
			$_POST['fulltext']	= substr($alltext, $tagPos + 18 );
		}
	}
	$row = new mosContent($database);
	if(!$row->bind($_POST)) {
		echo $row->getError();
		exit();
	}

	// sanitise id field
	$row->id = (int)$row->id;

	if($row->id) {
		$row->modified = date('Y-m-d H:i:s');
		$row->modified_by = $my->id;
	}

	$row->created_by = $row->created_by?$row->created_by:$my->id;

	if($row->created && strlen(trim($row->created)) <= 10) {
		$row->created .= ' 00:00:00';
	}
	$row->created = $row->created?mosFormatDate($row->created,'%Y-%m-%d %H:%M:%S',-$mosConfig_offset):date('Y-m-d H:i:s');

	if(strlen(trim($row->publish_up)) <= 10) {
		$row->publish_up .= ' 00:00:00';
	}
	$row->publish_up = mosFormatDate($row->publish_up,_CURRENT_SERVER_TIME_FORMAT,- $mosConfig_offset);

	if(trim($row->publish_down) == '�������' || trim($row->publish_down) == '') {
		$row->publish_down = $nullDate;
	} else {
		if(strlen(trim($row->publish_down)) <= 10) {
			$row->publish_down .= ' 00:00:00';
		}
		$row->publish_down = mosFormatDate($row->publish_down,_CURRENT_SERVER_TIME_FORMAT,-$mosConfig_offset);
	}

	$row->state = intval(mosGetParam($_REQUEST,'published',0));

	$params = mosGetParam($_POST,'params','');
	if(is_array($params)) {
		$txt = array();
		foreach($params as $k => $v) {
			if(get_magic_quotes_gpc()) {
				$v = stripslashes($v);
			}
			$txt[] = "$k=$v";
		}
		$row->attribs = implode("\n",$txt);
	}

	// code cleaner for xhtml transitional compliance
	$row->introtext = str_replace('<br>','<br />',$row->introtext);
	$row->fulltext = str_replace('<br>','<br />',$row->fulltext);

	// remove <br /> take being automatically added to empty fulltext
	$length = strlen($row->fulltext) < 9;
	$search = strstr($row->fulltext,'<br />');
	if($length && $search) {
		$row->fulltext = null;
	}

	$row->title = ampReplace($row->title);

	if(!$row->check()) {
		echo $row->getError();
		exit();
	}

	$row->version++;
	if(!$row->store()) {
		echo $row->getError();
		exit();
	}

	// manage frontpage items
	require_once ($mainframe->getPath('class','com_frontpage'));
	$fp = new mosFrontPage($database);

	if(intval(mosGetParam($_REQUEST,'frontpage',0))) {
		// toggles go to first place
		if(!$fp->load((int)$row->id)) {
			// new entry
			$query = "INSERT INTO #__content_frontpage VALUES ( ".(int)$row->id.", 1 )";
			$database->setQuery($query);
			if(!$database->query()) {
				echo $database->stderr();
				exit();
			}
			$fp->ordering = 1;
		}
	} else {
		// no frontpage mask
		if(!$fp->delete((int)$row->id)) {
			$msg .= $fp->stderr();
		}
		$fp->ordering = 0;
	}
	$fp->updateOrder();

	$row->checkin();
	$row->updateOrder("catid = ".(int)$row->catid." AND state >= 0");

	mosCache::cleanCache('com_content');

	echo '������� ����������: '.gmdate('H:i:s ( d.m.y )');

}


/* ���������� �������
* $id - ������������� �������
*/
function x_publish($id = null) {
	global $database,$my;
	// id ����������� ��� ��������� �� ������� - ����� ������
	if(!$id) return 'error-id';

	$state = new stdClass();
	$query = "SELECT state, publish_up, publish_down FROM #__content WHERE id = ".(int)$id;
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
		if(($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state ==
			1) {
			// �������� � ������������, ������� � ���������� � ���������� ������ "�� ������������"
			$ret_img = 'publish_x.png';
			$state = '0'; // ���� ������������ - ������� � ����������
		} else
			if(($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state ==
				0) {
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
		mosCache::cleanCache('com_content');
		return $ret_img;
	}
}
/* ���������� ������� �� �������(������) ��������
* $id - ������������� �����������
*/
function x_frontpage($id) {
	global $mainframe,$database;
	require_once ($mainframe->getPath('class','com_frontpage'));

	$fp = new mosFrontPage($database);
	if($fp->load($id)) {
		if(!$fp->delete($id)) {
			$ret_img = 'error!';
		}
		$fp->ordering = 0;
		$ret_img = 'publish_x.png';
	} else {
		$query = "INSERT INTO #__content_frontpage"."\n VALUES ( ".(int)$id.", 0 )";
		$database->setQuery($query);
		if(!$database->query()) {
			$ret_img = 'error!';
		}
		$fp->ordering = 0;
		$ret_img = 'tick.png';
	}
	$fp->updateOrder();
	mosCache::cleanCache('com_content'); // �������� ��� �������
	return $ret_img;
}

?>
