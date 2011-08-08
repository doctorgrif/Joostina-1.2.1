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
define('_JOS_CACHE_INCLUDED', 1);
global $mosConfig_absolute_path;
require_once ($mosConfig_absolute_path . '/includes/Cache/Lite/Function.php');
/**
* Joostina Cache Lite wrapper for adding special parameters
* The class uses an aggregation for the reference to the Cache_Lite_Function 
* in order to be able of calling the methods generically.
* @package Joostina
* @access public
*/
class JCache_Lite_Function {
	/** @var object internal aggregation to the Cache */
	var $_cache = null;
	/** Special constructor which is creating all required references
	* @param array $options options
	* @access public
	*/
	function JCache_Lite_Function($options = array(null)) {
		$this->_cache = new Cache_Lite_Function($options);
	}
	/**
	* Calls a cacheable function or method (or not if there is already a cache for it)
	* This overwritten method addes automatically special arguments to the call
	* Those arguments are e.g. the language if multilingual support is activated
	* @return mixed result of the function/method
	* @access public
	*/
	function call() {
		$arguments = func_get_args();
// Add language to all arguments, if not already added and multilingual support is activated
		if (array_key_exists('mosConfig_multilingual_support', $GLOBALS) && $GLOBALS['mosConfig_multilingual_support'] == 1) {
			$arguments[] = $GLOBALS['mosConfig_lang'];
		}
		return call_user_func_array(array($this->_cache, 'call'), $arguments);
	}
	/**
	* Clean the cache
	* if no group is specified all cache files will be destroyed
	* else only cache files of the specified group will be destroyed
	* @param string $group name of the cache group
	* @return boolean true if no problem
	* @access public
	*/
	function clean($group = false) {
		return $this->_cache->clean($group);
	}
}
?>