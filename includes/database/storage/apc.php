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
// получить
	function fetch($id) {
		return apc_fetch($id);
	}
// проверка
	function test() {
		return (function_exists('apc_fetch'));
	}
// задать
	function store($id, $data) {
		return apc_store($id, $data,QCACHE_TTL);
	}
// очистить
	function _delete($id) {
		return apc_delete($id);
	}
// проверить есть ли в кэше
	function _isset($id) {
		return (apc_fetch($id)===false?false:true);
	}
}

