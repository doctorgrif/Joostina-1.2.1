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
* Category database table class
* @package Joostina
* @subpackage Weblinks
*/
class mosWeblink extends mosDBTable {
	/** @var int Primary key */

	var $id = null;
	/** @var int */
	var $catid = null;
	/** @var int */
	var $sid = null;
	/** @var string */
	var $title = null;
	/** @var string */
	var $url = null;
	/** @var string */
	var $description = null;
	/** @var datetime */
	var $date = null;
	/** @var int */
	var $hits = null;
	/** @var int */
	var $published = null;
	/** @var boolean */
	var $checked_out = null;
	/** @var time */
	var $checked_out_time = null;
	/** @var int */
	var $ordering = null;
	/** @var int */
	var $archived = null;
	/** @var int */
	var $approved = null;
	/** @var string */
	var $params = null;
	/** @param database A database connector object */

	function mosWeblink(&$db) {
		$this->mosDBTable('#__weblinks', 'id', $db);
	}

	/** overloaded check function */
	function check() {
// filter malicious code
		$ignoreList = array('params');
		$this->filter($ignoreList);
// specific filters
		$iFilter = new InputFilter();
		if ($iFilter->badAttributeValue(array('href', $this->url))) {
			$this->_error = _ENTER_CORRECT_URL;
			return false;
		}
		/* check for valid name */
		if (trim($this->title) == '') {
			$this->_error = _WEBLINK_TITLE;
			return false;
		}
		if (!(eregi('http://', $this->url) || (eregi('https://', $this->url)) || (eregi('ftp://', $this->url)))) {
			$this->url = 'http://' . $this->url;
		}
		/* check for existing name */
		$query = "SELECT id" . "\n FROM #__weblinks " . "\n WHERE title = " . $this->_db->Quote($this->title) .
				"\n AND catid = " . (int) $this->catid;
		$this->_db->setQuery($query);
		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id)) {
			$this->_error = _WEBLINK_EXIST;
			return false;
		}
		return true;
	}
}
?>