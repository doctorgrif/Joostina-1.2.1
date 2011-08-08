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
* @subpackage Content
*/
class mosFrontPage extends mosDBTable {
	/** @var int Primary key */

	var $content_id = null;
	/** @var int */
	var $ordering = null;

	/** @param database A database connector object */
	function mosFrontPage(&$db) {
		$this->mosDBTable('#__content_frontpage', 'content_id', $db);
	}
}
?>