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

require_once ($mainframe->getPath('admin_html'));
require_once ($mainframe->getPath('class'));

$cid = josGetArrayInts('cid');

switch($task) {
	case 'view':
		viewMessage($cid[0],$option);
		break;

	case 'new':
		newMessage($option,null,null);
		break;

	case 'reply':
		newMessage($option);
		break;

	case 'save':
		saveMessage($option);
		break;

	case 'remove':
		removeMessage($cid,$option);
		break;

	case 'config':
		editConfig($option);
		break;

	case 'saveconfig':
		saveConfig($option);
		break;

	default:
		showMessages($option);
		break;
}

function editConfig($option) {
	global $database,$my;

	$query = "SELECT cfg_name, cfg_value"."\n FROM #__messages_cfg"."\n WHERE user_id = ".(int)$my->id;
	$database->setQuery($query);
	$data = $database->loadObjectList('cfg_name');

	// initialize values if they do not exist
	if(!isset($data['lock']->cfg_value)) {
		$data['lock']->cfg_value = 0;
	}
	if(!isset($data['mail_on_new']->cfg_value)) {
		$data['mail_on_new']->cfg_value = 0;
	}
	if(!isset($data['auto_purge']->cfg_value)) {
		$data['auto_purge']->cfg_value = 7;
	}

	$vars = array();
	$vars['lock'] = mosHTML::yesnoSelectList("vars[lock]",'class="inputbox" size="1"',$data['lock']->cfg_value);
	$vars['mail_on_new'] = mosHTML::yesnoSelectList("vars[mail_on_new]",'class="inputbox" size="1"',$data['mail_on_new']->cfg_value);
	$vars['auto_purge'] = (int)$data['auto_purge']->cfg_value;

	HTML_messages::editConfig($vars,$option);

}

function saveConfig($option) {
	global $database,$my;
	josSpoofCheck();
	$query = "DELETE FROM #__messages_cfg"."\n WHERE user_id = ".(int)$my->id;
	$database->setQuery($query);
	$database->query();

	$vars = mosGetParam($_POST,'vars',array());
	foreach($vars as $k => $v) {
		if(get_magic_quotes_gpc()) {
			$k = stripslashes($k);
			$v = stripslashes($v);
		}
		$query = "INSERT INTO #__messages_cfg"."\n ( user_id, cfg_name, cfg_value )"."\n VALUES ( ".(int)
			$my->id.", ".$database->Quote($k).", ".$database->Quote($v)." )";
		$database->setQuery($query);
		$database->query();
	}
	mosRedirect("index2.php?option=$option");
}

function newMessage($option) {
	global $database,$acl;

	$user = intval(mosGetParam($_REQUEST,'userid',0));
	$subject = stripslashes(strval(mosGetParam($_REQUEST,'subject','')));

	// get available backend user groups
	$gid = $acl->get_group_id('Public Backend','ARO');
	$gids = $acl->get_group_children($gid,'ARO','RECURSE');

	// get list of usernames
	$recipients = array(mosHTML::makeOption('0','- �������� ������������ -'));

	mosArrayToInts($gids);
	$gids = 'gid='.implode(' OR gid=',$gids);

	$query = "SELECT id AS value, name AS text FROM #__users"."\n WHERE ( $gids )".
		"\n ORDER BY name";
	$database->setQuery($query);
	$recipients = array_merge($recipients,$database->loadObjectList());

	$recipientslist = mosHTML::selectList($recipients,'user_id_to',
		'class="inputbox" size="1"','value','text',$user);

	HTML_messages::newMessage($option,$recipientslist,$subject);
}

function saveMessage($option) {
	global $database,$mainframe,$my;
	josSpoofCheck();
	$row = new mosMessage($database);
	if(!$row->bind($_POST)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if(!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if(!$row->send()) {
		mosRedirect('index2.php?option=com_messages&mosmsg='.$row->getError());
	}
	mosRedirect('index2.php?option=com_messages');
}

function showMessages($option) {
	global $database,$mainframe,$my,$mosConfig_list_limit;

	$limit = $mainframe->getUserStateFromRequest("viewlistlimit",'limit',$mosConfig_list_limit);
	$limitstart = $mainframe->getUserStateFromRequest("view{$option}limitstart",
		'limitstart',0);
	$search = $mainframe->getUserStateFromRequest("search{$option}",'search','');
	if(get_magic_quotes_gpc()) {
		$search = stripslashes($search);
	}

	$wheres = array();
	$wheres[] = " a.user_id_to = ".(int)$my->id;

	if(isset($search) && $search != "") {
		$searchEscaped = $database->getEscaped(trim(strtolower($search)));
		$wheres[] = "( u.username LIKE '%$searchEscaped%' OR email LIKE '%$searchEscaped%' OR u.name LIKE '%$searchEscaped%' )";
	}

	$query = "SELECT COUNT(*)"."\n FROM #__messages AS a"."\n INNER JOIN #__users AS u ON u.id = a.user_id_from".($wheres?
		" WHERE ".implode(" AND ",$wheres):'');
	$database->setQuery($query);
	$total = $database->loadResult();

	require_once ($GLOBALS['mosConfig_absolute_path'].
		'/'.ADMINISTRATOR_DIRECTORY.'/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total,$limitstart,$limit);

	$query = "SELECT a.*, u.name AS user_from"."\n FROM #__messages AS a"."\n INNER JOIN #__users AS u ON u.id = a.user_id_from".($wheres?
		"\n WHERE ".implode(" AND ",$wheres):"")."\n ORDER BY date_time DESC";
	$database->setQuery($query,$pageNav->limitstart,$pageNav->limit);

	$rows = $database->loadObjectList();
	if($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	HTML_messages::showMessages($rows,$pageNav,$search,$option);
}

function viewMessage($uid = '0',$option) {
	global $database,$my,$acl;

	$row = null;
	$query = "SELECT a.*, u.name AS user_from"."\n FROM #__messages AS a"."\n INNER JOIN #__users AS u ON u.id = a.user_id_from".
		"\n WHERE a.message_id = ".(int)$uid."\n ORDER BY date_time DESC";
	$database->setQuery($query);
	$database->loadObject($row);

	$query = "UPDATE #__messages"."\n SET state = 1"."\n WHERE message_id = ".(int)
		$uid;
	$database->setQuery($query);
	$database->query();

	HTML_messages::viewMessage($row,$option);
}

function removeMessage($cid,$option) {
	global $database;
	josSpoofCheck();
	if(!is_array($cid) || count($cid) < 1) {
		echo "<script> alert('�������� ������ ��� ��������'); window.history.go(-1);</script>\n";
		exit;
	}
	if(count($cid)) {
		mosArrayToInts($cid);
		$cids = 'message_id='.implode(' OR message_id=',$cid);
		$query = "DELETE FROM #__messages"."\n WHERE ( $cids )";
		$database->setQuery($query);
		if(!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}

	$limit = intval(mosGetParam($_REQUEST,'limit',10));
	$limitstart = intval(mosGetParam($_REQUEST,'limitstart',0));

	mosRedirect("index2.php?option=$option&limit=$limit&limitstart=$limitstart");
}
?>