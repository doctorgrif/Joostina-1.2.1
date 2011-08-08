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
* @subpackage Config
*/
class TOOLBAR_config {

	/**
	* ���� ��� ���������� ���������� ��������� �����������
	*/
	function _SAVE_EXT_CONFIG() {
		mosMenuBar::startTable();
		mosMenuBar::save('save_component_config');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}
	
	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::ext(_CMN_APPLY,'#','-apply','id="tb-apply" onclick="ch_apply();return;"');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.config');
		mosMenuBar::endTable();
	}
}
?>