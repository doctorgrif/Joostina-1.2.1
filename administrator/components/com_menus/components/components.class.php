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
* @subpackage Menus
*/
class components_menu {
	/**
	* @param database A database connector object
	* @param integer The unique id of the category to edit (0 if new)
	*/
	function edit($uid,$menutype,$option) {
		global $database,$my,$mainframe;

		$menu = new mosMenu($database);
		$menu->load((int)$uid);

		$row = new mosComponent($database);
		// load the row from the db table
		$row->load((int)$menu->componentid);

		// fail if checked out not by 'me'
		if($menu->checked_out && $menu->checked_out != $my->id) {
			mosErrorAlert($menu->title." "._MODULE_IS_EDITING_MY_ADMIN);
		}

		if($uid) {
			// do stuff for existing item
			$menu->checkout($my->id);
		} else {
			// do stuff for new item
			$menu->type = 'components';
			$menu->menutype = $menutype;
			$menu->browserNav = 0;
			$menu->ordering = 9999;
			$menu->parent = intval(mosGetParam($_POST,'parent',0));
			$menu->published = 1;
		}

		$query = "SELECT c.id AS value, c.name AS text, c.link FROM #__components AS c WHERE c.link != '' ORDER BY c.name";
		$database->setQuery($query);
		$components = $database->loadObjectList();

		// build the html select list for section
		$lists['componentid'] = mosAdminMenus::Component($menu,$uid);

		// componentname
		$lists['componentname'] = mosAdminMenus::ComponentName($menu,$uid);
		// build the html select list for ordering
		$lists['ordering'] = mosAdminMenus::Ordering($menu,$uid);
		// build the html select list for the group access
		$lists['access'] = mosAdminMenus::Access($menu);
		// build the html select list for paraent item
		$lists['parent'] = mosAdminMenus::Parent($menu);
		// build published button option
		$lists['published'] = mosAdminMenus::Published($menu);
		// build the url link output
		$lists['link'] = mosAdminMenus::Link($menu,$uid);

		// get params definitions
		$params = new mosParameters($menu->params,$mainframe->getPath('com_xml',$row->option),'component');

		components_menu_html::edit($menu,$components,$lists,$params,$option);
	}
}
?>