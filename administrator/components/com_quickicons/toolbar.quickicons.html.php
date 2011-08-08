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
* @package Custom QuickIcons
*/
class QI_Toolbar {

	function _edit() {
		mosMenuBar::startTable();
		mosMenuBar::save('save');
		mosMenuBar::spacer();
		mosMenuBar::apply('apply');
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancel');
		mosMenuBar::endTable();
	}

	function _show() {
		mosMenuBar::startTable();
		mosMenuBar::publishList('publish');
		mosMenuBar::spacer();
		mosMenuBar::unpublishList('unpublish');
		mosMenuBar::spacer();
		mosMenuBar::addNew('new');
		mosMenuBar::spacer();
		mosMenuBar::editListX('editA');
		mosMenuBar::spacer();
		mosMenuBar::deleteList('','delete');
		mosMenuBar::endTable();
	}

	function _chooseIcon() {
		mosMenuBar::startTable();
		mosMenuBar::endTable();
	}
}
?>