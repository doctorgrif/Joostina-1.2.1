<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
* @package Cache_Lite
* @category Caching
* @version $Id: Lite.php 3313 2006-04-26 19:43:05Z stingrey $
* @author Fabien MARTY <fab@php.net>
**/

defined('_VALID_MOS') or die();
require_once ('Cache/Lite.php');
class Cache_Lite_Output extends Cache_Lite {
	function Cache_Lite_Output($options) {
		$this->Cache_Lite($options);
	}
	function start($id,$group = 'default') {
		$data = $this->get($id,$group);
		if($data !== false) {
			echo ($data);
			return true;
		} else {
			ob_start();
			ob_implicit_flush(false);
			return false;
		}
	}
	function end() {
		$data = ob_get_contents();
		ob_end_clean();
		$this->save($data,$this->_id,$this->_group);
		echo ($data);
	}
}


?>
