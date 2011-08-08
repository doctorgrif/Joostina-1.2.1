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


class menubanners {
	/**
	 * Draws the menu for a New banner
	 */
	function NEW_EDIT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save('savebanner');
		mosMenuBar::apply('applybanner');
		mosMenuBar::cancel('cancelbanner');
		mosMenuBar::endTable();
	}

	function DEFAULT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::ext(_TASK_UPLOAD,'#','-media-manager','id="tb-media-manager" onclick="popupWindow(\'components/com_banners/uploadbanners.php\',\'win1\',250,100,\'no\');"');
		mosMenuBar::publishList('publishbanner');
		mosMenuBar::unpublishList('unpublishbanner');
		mosMenuBar::addNew('newbanner');
		mosMenuBar::editList('editbanner');
		mosMenuBar::deleteList('', 'removebanners');
		mosMenuBar::back(_BANNERS_PANEL,'index2.php?option=com_banners');
		mosMenuBar::endTable();
	}
	
	function MAIN_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::back(_BANNERS_PANEL,'index2.php?option=com_banners');
		mosMenuBar::endTable();
	}
}

class menubannerClient {

	/**
	 * Draws the menu for a New client
	 */
	function NEW_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save('saveclient');
		mosMenuBar::cancel('cancelclient');
		mosMenuBar::endTable();
	}

	/**
	 * Draws the menu for a client
	 */
	function EDIT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save('saveclient');
		mosMenuBar::cancel('cancelclient');
		mosMenuBar::endTable();
	}
	/**
	 * Draws the default menu
	 */
	function DEFAULT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::publishList('publishclient');
		mosMenuBar::unpublishList('unpublishclient');
		mosMenuBar::addNew('newclient');
		mosMenuBar::editList('editclient');
		mosMenuBar::deleteList('', 'removeclients');
		mosMenuBar::back(_BANNERS_PANEL,'index2.php?option=com_banners');
		mosMenuBar::endTable();
	}
}

class menubannerCategory {
	/**
	 * Draws the menu for a New category
	 */
	function NEW_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save('savecategory');
		mosMenuBar::cancel('cancelcategory');
		mosMenuBar::endTable();
	}
	/**
	 * Draws the menu for Editting an existing category
	 * @param int The published state (to display the inverse button)
	 */
	function EDIT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save('savecategory');
		mosMenuBar::cancel('cancelcategory');
		mosMenuBar::endTable();
	}

	/**
	 * Draws the menu for Editting an existing category
	 */
	function DEFAULT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::publishList('publishcategory');
		mosMenuBar::unpublishList('unpublishcategory');
		mosMenuBar::addNew('newcategory');
		mosMenuBar::editList('editcategory');
		mosMenuBar::deleteList('', 'removecategory');
		mosMenuBar::back(_BANNERS_PANEL,'index2.php?option=com_banners');
		mosMenuBar::endTable();
	}
}
?>
