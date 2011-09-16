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
class jdebug {
	/* стек сообщений лога*/
	var $_log = array();
	/* буфер сообщений лога*/
	var $text = null;
	/* добавление сообщения в лог*/
	function add($text) {
		$this->_log[] = $text;
	}
	/* вывод сообщений из лога*/
	function get($db = 1) {
		global $database;
		if($db){
			$this->_db();
		}else{
			$this->add(_SQL_QUERIES_COUNT . ': ' . count($database->_log));
		}
		foreach($this->_log as $key => $value) {
			$this->text .= '<p>' . $value . '</p>';
		}
		echo '<div id="jdebug">' . $this->text . '</div>';
	}
	/* отладка sql запросов базы данных*/
	function _db() {
		global $database;
		count($database->_log);
		$this->add('<pre>');
		$this->add('SQL запросов: ' . count($database->_log));
		foreach($database->_log as $k => $sql) {
			$this->add($k + 1 . ': ' . $sql . '<hr />');
		}
		$this->add('</pre>');
		return;
	}
}
/* упрощенная процедура добавления сообщения в лог*/
function jlog($text) {
	global $debug;
	if(!isset($debug)) $debug = new jdebug();
	$debug->add($text);
}
?>