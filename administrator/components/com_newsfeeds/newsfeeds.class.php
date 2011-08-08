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

/**
* @package Joostina
* @subpackage Newsfeeds
*/
class mosNewsFeed extends mosDBTable {
	/**
	@var int Primary key*/
	var $id = null;
	/**
	@var int*/
	var $catid = null;
	/**
	@var string*/
	var $name = null;
	/**
	@var string*/
	var $link = null;
	/**
	@var string*/
	var $filename = null;
	/**
	@var int*/
	var $published = null;
	/**
	@var int*/
	var $numarticles = null;
	/**
	@var int*/
	var $cache_time = null;
	/**
	@var int*/
	var $checked_out = null;
	/**
	@var time*/
	var $checked_out_time = null;
	/**
	@var int*/
	var $ordering = null;
	/**
	@var int ��������� �����*/
	var $code = null;
	/**
	* @param database A database connector object
	*/
	function mosNewsFeed(&$db) {
		$this->mosDBTable('#__newsfeeds','id',$db);
	}
}
?>