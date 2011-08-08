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
* @subpackage Massmail
*/
class TOOLBAR_massmail {
	/**
	* Draws the menu for a New Contact
	*/
	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::custom('send','-publish','',_SEND_BUTTON,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.users.massmail');
		mosMenuBar::endTable();
	}
}
?>