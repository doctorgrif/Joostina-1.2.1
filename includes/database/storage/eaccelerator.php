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
		return eaccelerator_get($id);
	}

	function test() {
		return (function_exists('eaccelerator_get'));
	}
	
	function store($id, $data) {
		return eaccelerator_put($id, $data,QCACHE_TTL);
	}

	function _delete($id) {
		return eaccelerator_rm($id);
	}

	function _isset($id) {
		return (eaccelerator_get($id)===null?false:true);
	}

}

