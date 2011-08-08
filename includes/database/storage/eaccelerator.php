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

