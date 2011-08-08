<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die();


// параметры кэширования для MEMCACHE
define("QCACHE_MEMCACHE_SERVER","127.0.0.1");
define("QCACHE_MEMCACHE_PORT","11211");


class dbcache_backend extends dbcache {

	function fetch($id) {
		$obj = qcache_backend::get_instance();
		return $obj->get($id);
	}

	function test() {
		return (class_exists('Memcache'));
	}
	
	function store($id, $data) {
		$obj = qcache_backend::get_instance();
		return $obj->set($id, $data, false, QCACHE_TTL);
	}

	function _delete($id) {
		$obj = qcache_backend::get_instance();
		return $obj->delete($id);
	}

	function get_instance() {
		static $res = null;
		if($res == null) {
			$res = new Memcache;
			$res->connect(QCACHE_MEMCACHE_SERVER,QCACHE_MEMCACHE_PORT);
		}
		return $res;
	}

	function _isset($id) {
		$obj = qcache_backend::get_instance();
		return($obj->get($id)===false?false:true);
	}
}

