<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die();

/**
* @package Joostina
* @subpackage Menus
*/
class TOOLBAR_menus {
	/**
	* Draws the menu for a New top menu item
	*/
	function _NEW() {
		mosMenuBar::startTable();
		mosMenuBar::customX('edit','-next','',_MENU_NEXT,true);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.menus.new');
		mosMenuBar::endTable();
	}

	/**
	* Draws the menu to Move Menut Items
	*/
	function _MOVEMENU() {
		mosMenuBar::startTable();
		mosMenuBar::custom('movemenusave','-x-move','',_MOVE,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancelmovemenu');
		mosMenuBar::spacer();
		mosMenuBar::help('screen.menus.move');
		mosMenuBar::endTable();
	}

	/**
	* Draws the menu to Move Menut Items
	*/
	function _COPYMENU() {
		mosMenuBar::startTable();
		mosMenuBar::custom('copymenusave','-copy','',_COPY,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancelcopymenu');
		mosMenuBar::spacer();
		mosMenuBar::help('screen.menus.copy');
		mosMenuBar::endTable();
	}

	/**
	* Draws the menu to edit a menu item
	*/
	function _EDIT() {
		global $id;

		if(!$id) {
			$cid = josGetArrayInts('cid');
			$id = $cid[0];
		}
		$menutype = strval(mosGetParam($_REQUEST,'menutype','mainmenu'));

		mosMenuBar::startTable();
		if(!$id) {
			$link = 'index2.php?option=com_menus&menutype='.$menutype.
				'&task=new&hidemainmenu=1';
			mosMenuBar::back(_MENU_BACK,$link);
			mosMenuBar::spacer();
		}
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::apply();
		mosMenuBar::spacer();
		if($id) {
			// for existing content items the button is renamed `close`
			mosMenuBar::cancel('cancel',_CLOSE);
		} else {
			mosMenuBar::cancel();
		}
		mosMenuBar::spacer();
		mosMenuBar::help('screen.menus.edit');
		mosMenuBar::endTable();
	}

	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::publishList();
		mosMenuBar::spacer();
		mosMenuBar::unpublishList();
		mosMenuBar::spacer();
		mosMenuBar::customX('movemenu','-move','',_MOVE,true);
		mosMenuBar::spacer();
		mosMenuBar::customX('copymenu','-copy','',_COPY,true);
		mosMenuBar::spacer();
		mosMenuBar::trash();
		mosMenuBar::spacer();
		mosMenuBar::editListX();
		mosMenuBar::spacer();
		mosMenuBar::addNewX();
		mosMenuBar::spacer();
		mosMenuBar::help('screen.menus');
		mosMenuBar::endTable();
	}
}
?>