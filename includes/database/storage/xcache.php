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

