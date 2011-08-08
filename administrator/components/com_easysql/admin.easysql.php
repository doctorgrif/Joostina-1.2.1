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

// �������� ������ ������ ������������� � ������� �����-��������������
if(!$acl->acl_check('administration','config','users',$my->usertype)) {
	mosRedirect('index2.php',_NOT_AUTH);
}

// include html body
require_once ($mainframe->getPath('admin_html'));

// read params
$task	= mosGetParam($_REQUEST,'task','execsql');
$id		= mosGetParam($_GET,'id',null);
$table	= base64_decode(mosGetParam($_GET,'prm1',null));
$sql	= mosGetParam($_POST,'easysql_query',null);

if(empty($table)) $table = mosGetParam($_POST,'easysql_table',null);

switch($task) {
	case 'new':
	case 'edit':
		EditRecord($task,$table,$id);
		break;

	case 'delete':
		if(!is_null($id) && !is_null($table))
			if(DeleteRecord($table,$id)) ExecSQL($task);
		break;

	case 'save':
		if(SaveRecord()) ExecSQL($task);
		break;

	default:
		ExecSQL($task);
		break;
}

?>
