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

class dbcache_backend extends dbcache {
// ��������
	function fetch($id) {
		return apc_fetch($id);
	}
// ��������
	function test() {
		return (function_exists('apc_fetch'));
	}
// ������
	function store($id, $data) {
		return apc_store($id, $data,QCACHE_TTL);
	}
// ��������
	function _delete($id) {
		return apc_delete($id);
	}
// ��������� ���� �� � ����
	function _isset($id) {
		return (apc_fetch($id)===false?false:true);
	}
}

