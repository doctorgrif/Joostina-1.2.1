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
class jdebug {
	/* ���� ��������� ����*/
	var $_log = array();
	/* ����� ��������� ����*/
	var $text = null;
	/* ���������� ��������� � ���*/
	function add($text) {
		$this->_log[] = $text;
	}
	/* ����� ��������� �� ����*/
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
	/* ������� sql �������� ���� ������*/
	function _db() {
		global $database;
		count($database->_log);
		$this->add('<pre>');
		$this->add('SQL ��������: ' . count($database->_log));
		foreach($database->_log as $k => $sql) {
			$this->add($k + 1 . ': ' . $sql . '<hr />');
		}
		$this->add('</pre>');
		return;
	}
}
/* ���������� ��������� ���������� ��������� � ���*/
function jlog($text) {
	global $debug;
	if(!isset($debug)) $debug = new jdebug();
	$debug->add($text);
}
?>