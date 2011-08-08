<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
defined('_VALID_MOS') or die();

global $mosConfig_db,$mosConfig_cachepath,$mosConfig_db_cache_handler,$mosConfig_db_cache_time;

// идентификатор кэширования
define('QCACHE_SITE_ID',$mosConfig_db);

// время жизни кэша
define('QCACHE_TTL',$mosConfig_db_cache_time);


switch($mosConfig_db_cache_handler) {
	// использование кэша eaccelerator
	case 'eaccelerator':
		require_once('storage/eaccelerator.php');
		require_once('database/database.cache.php');
		break;
	// использование кэша apc
	case 'apc':
		require_once('storage/apc.php');
		require_once('database/database.cache.php');
		break;
	// использование кэша memcache
	case 'memcache':
		require_once('storage/memcache.php');
		require_once('database/database.cache.php');
		break;
	// использование xcache
	case 'xcache':
		require_once('storage/xcache.php');
		require_once('database/database.cache.php');
		break;
	// использование кэша на файлах
	case 'file':
		require_once('storage/file.php');
		require_once('database/database.cache.php');
		break;
	// по умолчанию кэширование не используется
	default:
	case 'none':
		require_once('database/database.php');
		break;
};

// не до конца понятная функция - вызывается случайным образом
$test = rand(1,50);
if($test == 2) {
	register_shutdown_function(array("dbcache","gc_check"));
}


// класс акселератора не загружен или произошла ошибка в загрузке - создаём заглушку
if(!class_exists('dbcache_backend') ){
	class dbcache_backend {
		function check_clear(){
			return false;
		}
		function get_num_rows(){
			return false;
		}
		function get(){
			return false;
		}
		function set(){
			return false;
		}
		function test(){
			return false;
		}
	}
}

// основной класс кэширования
class dbcache {
	/**
	* @var int доступность выбранного обработчика кэша
	*/
	var $test = false;

	function dbcache(){
		$this->test = dbcache_backend::test();
	}

	// получение данных из кэша
	function get($query, $method, $data='') {
		if(!$this->test) return false;
		if(!dbcache_backend::check($query)) // данных в кэше не обнаружено
			return false;
		$id	= dbcache_backend::get_id($query, $method, $data); // получение идентификатора для запрашиваемых данных
		$d	= dbcache_backend::fetch($id); // получение данных из кэша
		if($d === false || !is_string($d)) // проверка полученных данных из кэша
			return false;
		$d	= unserialize($d); // распаковка полученного кэша
		if($d!== false)
			return $d; // все проверки пройдены и кэш имеется - возвращаем его
		return false;
	}
	// получение числа столбцов из кэша
	function get_num_rows($query) {
		if(!$this->test) return false;
		$id	= dbcache_backend::get_id($query,'_numRows','');
		$d	= dbcache_backend::fetch($id);
		if($d!==false)
			return $d;
		return false;
	}
	// установка кэша
	function set($query, $method, $data, $array, $pattern, $num_rows) {
		if(!$this->test) return false;
		if(!dbcache_backend::check($query)) return false;
		$tables = dbcache_backend::get_tables($query, $pattern);
		$id = dbcache_backend::get_id($query, $method, $data);
		dbcache_backend::store(dbcache_backend::get_id($query,'_numRows',''),$num_rows);
		foreach($tables AS $val) {
			dbcache_backend::set_tables($val[0], $id);
		}
		return dbcache_backend::store($id, serialize($array));
	}
	// очистка кэша кэширования таблиц
	function check_clear($query, $prefix) {
		if(!$this->test) return false;
		if((strstr(strtoupper($query),'SELECT')|| strstr(strtoupper($query),'SET')) && !strstr(strtoupper($query),'INSERT') && !strstr(strtoupper($query),'UPDATE') && !strstr(strtoupper($query),'REPLACE') && !strstr(strtoupper($query),'ALTER') && ! strstr(strtoupper($query),'DELETE')) {
			return false;
		}
		$tables = dbcache_backend::get_tables($query, $prefix);
		$ids = dbcache_backend::get_ids($tables);
		foreach($ids AS $val) {
			dbcache_backend::_delete($val);
		}
		foreach($tables AS $table) {
			dbcache_backend::_delete(QCACHE_SITE_ID.'_qcache_tables_'.$table);
		}
	}
	// получение уникального идентификатора кэша
	function get_id($query, $method, $data='') {
		global $mosConfig_lang;
		return QCACHE_SITE_ID.'_'.md5(strtoupper($query.$data)).'_'.strtolower($method).'_'.$mosConfig_lang;
	}
	// тут еще отключить проверки при деактивации сессий на фронте и контроля доступа к содержимому
	// проверка на наличие в запросе определённых коман. Кэширование будет осуществляться только для запросов SELECT
	function check($query) {
		global $mosConfig_disable_date_state;
		if(!$this->test) return false;
		if(!strstr(strtoupper($query),'SELECT') || strstr(strtoupper($query),'INSERT') || strstr(strtoupper($query),'UPDATE') || strstr(strtoupper($query),'REPLACE') || strstr(strtoupper($query),'ALTER') || strstr(strtoupper($query),'DELETE')) {
			return false;
		}
		// список ключевых моментов при которых кэширование не будет активировано
		$nocache = array("#__session", "session_id");

		if(!$mosConfig_disable_date_state) $nocache = array_merge(array("publish_up <=", "publish_down >="),$nocache);

		foreach($nocache AS $val){
			if(strstr(strtoupper($query), strtoupper($val)))
				return false;
		}
		return true;
	}

	function get_tables($sql, $pattern) {
		$pattern = "/".preg_quote($pattern)."[\w]*/";
		preg_match_all($pattern, $sql, $tables);
		if(!is_array($tables)) return array();
		return $tables;
	}

	function get_ids($tables) {
		if(!$this->test) return false;
		$ids = array();
		if(is_array($tables)) foreach($tables AS $val) {
			if(empty($val)) continue;
			$items = dbcache_backend::fetch(QCACHE_SITE_ID.'_qcache_tables_'.$val[0]);
			if($items === false || !is_string($items)) continue;
			$cached_items = unserialize($items);
			if(!is_array($cached_items)) continue;
			$ids = array_merge($ids, $cached_items);
		}
		return $ids;
	}

	function set_tables($table, $id) {
		if(!$this->test) return false;
		$tables = dbcache_backend::fetch(QCACHE_SITE_ID.'_qcache_tables');
		if($tables !== false && is_string($tables)) $tables = unserialize($tables);
		if(!is_array($tables)) $tables = array();
		if(!array_key_exists($table, $tables)) {
			$tables[$table] = true;
			dbcache_backend::store(QCACHE_SITE_ID.'_qcache_tables', serialize($tables));
		}
		$cached_items = array();
		$items = dbcache_backend::fetch(QCACHE_SITE_ID.'_qcache_tables_'.$table);
		if($items !== false&&is_string($items)) $cached_items = unserialize($items);
		if(!is_array($cached_items)) $cached_items = array();
		$cached_items[] = $id;
		return dbcache_backend::store(QCACHE_SITE_ID.'_qcache_tables_'.$table, serialize($cached_items));
	}

	function gc_check() {
		if(!$this->test) return false;
		$tables = dbcache_backend::fetch(QCACHE_SITE_ID.'_qcache_tables');
		if($tables !== false && is_string($tables)) $tables = unserialize($tables);
		if(!is_array($tables)) return false;
		foreach($tables AS $key => $val) {
			$items = dbcache_backend::fetch(QCACHE_SITE_ID.'_qcache_tables_'.$key);
			if($items=== false || !is_string($items)) continue;
			$cached_items = unserialize($items);
			if(is_array($cached_items)) {
				foreach($cached_items AS $kid => $id) {
					if(!dbcache_backend::_isset($id)) {
						unset($cached_items[$kid]);
					}
				}
				dbcache_backend::store(QCACHE_SITE_ID.'_qcache_tables_'.$key,serialize($cached_items));
			}
		}
	}

}

