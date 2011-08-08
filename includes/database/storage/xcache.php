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

	function fetch($id) {
		return xcache_get($id);
	}

	function test() {
		return (function_exists('xcache_set'));
	}
	
	function store($id, $data) {
		return xcache_set($id, $data, QCACHE_TTL);
	}


	function _delete($id) {
		return xcache_unset($id);
	}

	function _isset($id) {
		return xcache_isset($id);
	}	
}

