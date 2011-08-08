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
class TOOLBAR_content {
	function _EDIT() {
		global $id;
		mosMenuBar::startTable();
		mosMenuBar::preview('contentwindow',true);
		mosMenuBar::spacer();
		mosMenuBar::media_manager();
		mosMenuBar::spacer();
		mosMenuBar::custom('save_and_new','-save-and-new','',_SAVE_AND_ADD,false);
		mosMenuBar::spacer();
		mosMenuBar::save();
		mosMenuBar::spacer();
		if($id)
			mosMenuBar::ext(_CMN_APPLY,'#','-apply','id="tb-apply" onclick="return ch_apply();"');
		else
			mosMenuBar::apply();
		mosMenuBar::spacer();
		if($id)
			// for existing content items the button is renamed `close`
			mosMenuBar::cancel('cancel',_CLOSE);
		else
			mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.content.edit');
		mosMenuBar::endTable();
	}

	function _ARCHIVE() {
		mosMenuBar::startTable();
		mosMenuBar::unarchiveList();
		mosMenuBar::spacer();
		mosMenuBar::custom('remove','-delete','',_TO_TRASH,false);
		mosMenuBar::spacer();
		mosMenuBar::help('screen.content.archive');
		mosMenuBar::endTable();
	}

	function _MOVE() {
		mosMenuBar::startTable();
		mosMenuBar::custom('movesectsave','-save','',_CMN_SAVE,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}

	function _COPY() {
		mosMenuBar::startTable();
		mosMenuBar::custom('copysave','-save','',_CMN_SAVE,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}

	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::archiveList();
		mosMenuBar::spacer();
		mosMenuBar::publishList();
		mosMenuBar::spacer();
		mosMenuBar::unpublishList();
		mosMenuBar::spacer();
		mosMenuBar::customX('movesect','-move',null,_MOVE);
		mosMenuBar::spacer();
		mosMenuBar::customX('copy','-copy',null,_COPY);
		mosMenuBar::spacer();
		mosMenuBar::trash();
		mosMenuBar::spacer();
		mosMenuBar::editListX('editA');
		mosMenuBar::spacer();
		mosMenuBar::addNewX();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.content');
		mosMenuBar::endTable();
	}
}
?>
