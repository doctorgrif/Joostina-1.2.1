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
* @subpackage Templates
*/
class TOOLBAR_templates {
	function _DEFAULT($client) {
		mosMenuBar::startTable();
		if($client == "admin") {
			mosMenuBar::makeDefault();
			mosMenuBar::spacer();
		} else {
			mosMenuBar::makeDefault();
			mosMenuBar::spacer();
			mosMenuBar::assign();
			mosMenuBar::spacer();
		}
		mosMenuBar::deleteList();
		mosMenuBar::spacer();
		mosMenuBar::editHtmlX('edit_source');
		mosMenuBar::spacer();
		mosMenuBar::editCssX('edit_css');
		mosMenuBar::spacer();
		mosMenuBar::addNew();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.templates');
		mosMenuBar::endTable();
	}
	function _VIEW() {
		mosMenuBar::startTable();
		mosMenuBar::back();
		mosMenuBar::endTable();
	}

	function _EDIT_SOURCE() {
		mosMenuBar::startTable();
		mosMenuBar::save('save_source');
		mosMenuBar::ext(_CMN_APPLY,'#','-apply','id="tb-apply" onclick="ch_apply();return;"');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}

	function _EDIT_CSS() {
		mosMenuBar::startTable();
		mosMenuBar::save('save_css');
		mosMenuBar::ext(_CMN_APPLY,'#','-apply','id="tb-apply" onclick="ch_apply();return;"');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}

	function _ASSIGN() {
		mosMenuBar::startTable();
		mosMenuBar::save('save_assign',_CMN_SAVE);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.templates.assign');
		mosMenuBar::endTable();
	}

	function _POSITIONS() {
		mosMenuBar::startTable();
		mosMenuBar::save('save_positions');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.templates.modules');
		mosMenuBar::endTable();
	}
}
?>