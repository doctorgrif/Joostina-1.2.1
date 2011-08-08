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

// каталог сохранения файлового кэша запросов базы данных
global $mosConfig_cachepath;
define('QCACHE_SAVE_PATH',$mosConfig_cachepath.'/');


class dbcache_backend extends dbcache {
	function fetch($id) {
		if(!file_exists(QCACHE_SAVE_PATH.$id)) return false;
		$time = file_get_contents(QCACHE_SAVE_PATH.$id."_time");
		if($time + QCACHE_TTL < time()) return false;
		return file_get_contents(QCACHE_SAVE_PATH.$id);
	}

	function test() {
		global $mosConfig_cachepath;
		return is_writeable($mosConfig_cachepath);
	}
	
	function store($id, $data) {
		$f = fopen(QCACHE_SAVE_PATH.$id, 'w');
		fwrite($f,$data);
		fclose($f);
		$f = fopen(QCACHE_SAVE_PATH.$id.'_time', 'w');
		fwrite($f,time());
		fclose($f);
	}

	function _delete($id) {
		if(!file_exists(QCACHE_SAVE_PATH.$id)) return false;
		unlink(QCACHE_SAVE_PATH.$id);
		unlink(QCACHE_SAVE_PATH.$id.'_time');
	}

	function checkExpire() {
		$dir = opendir(QCACHE_SAVE_PATH);
		$ctime = time();
		$dtime = $ctime - QCACHE_TTL;
		while($file = readdir($dir)) {
			if(!is_file(QCACHE_SAVE_PATH.$file)) continue;
			if(substr($file,-4, 4)=='time') {
				$time = file_get_contents(QCACHE_SAVE_PATH.$file);
				if($time > $dtime) {
					$id = substr($file,0,-5);
					unlink(QCACHE_SAVE_PATH.$file);
					unlink(QCACHE_SAVE_PATH.$id);
				}
			}
		}
	}

	function _isset($id) {
		return file_exists(QCACHE_SAVE_PATH.$id);
	}
}
// рандомная очистка кэша
$ra = rand(1,10);
if($ra == 9) {
	dbcache_backend::checkExpire();
}

?>
