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
class content_blog_section {

	/**
	* @param database A database connector object
	* @param integer The unique id of the section to edit (0 if new)
	*/
	function edit($uid,$menutype,$option) {
		global $database,$my,$mainframe;

		$menu = new mosMenu($database);
		$menu->load((int)$uid);

		// fail if checked out not by 'me'
		if($menu->checked_out && $menu->checked_out != $my->id) {
			mosErrorAlert($menu->title." "._MODULE_IS_EDITING_MY_ADMIN);
		}

		if($uid) {
			$menu->checkout($my->id);
			// get previously selected Categories
			$params = new mosParameters($menu->params);
			$secids = $params->def('sectionid','');
			if($secids) {
				$secidsArray = explode(',',$secids);
				mosArrayToInts($secidsArray);
				$secids = 's.id='.implode(' OR s.id=',$secidsArray);
				$query = "SELECT s.id AS `value`, s.id AS `id`, s.title AS `text`"."\n FROM #__sections AS s".
					"\n WHERE s.scope = 'content'"."\n AND ( $secids )"."\n ORDER BY s.name";
				$database->setQuery($query);
				$lookup = $database->loadObjectList();
			} else {
				$lookup = '';
			}
		} else {
			$menu->type = 'content_blog_section';
			$menu->menutype = $menutype;
			$menu->ordering = 9999;
			$menu->parent = intval(mosGetParam($_POST,'parent',0));
			$menu->published = 1;
			$lookup = '';
		}

		// build the html select list for section
		$rows[] = mosHTML::makeOption('','��� �������');
		$query = "SELECT s.id AS `value`, s.id AS `id`, s.title AS `text`"."\n FROM #__sections AS s".
			"\n WHERE s.scope = 'content'"."\n ORDER BY s.name";
		$database->setQuery($query);
		$rows = array_merge($rows,$database->loadObjectList());
		$section = mosHTML::selectList($rows,'secid[]','class="inputbox" ondblclick="jadd(\'name\',this.options[this.selectedIndex].text);" size="10" multiple="multiple"','value','text',$lookup);
		$lists['sectionid'] = $section;

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
		$params = new mosParameters($menu->params,$mainframe->getPath('menu_xml',$menu->type),
			'menu');

		content_blog_section_html::edit($menu,$lists,$params,$option);
	}

	function saveMenu($option,$task) {
		global $database;

		$params = mosGetParam($_POST,'params','');

		$secids = josGetArrayInts('secid');
		$secid = implode(',',$secids);

		$params['sectionid'] = $secid;
		if(is_array($params)) {
			$txt = array();
			foreach($params as $k => $v) {
				$txt[] = "$k=$v";
			}
			$_POST['params'] = mosParameters::textareaHandling($txt);
		}

		$row = new mosMenu($database);

		if(!$row->bind($_POST)) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if(count($secids) == 1 && $secids[0] != '') {
			$row->link = str_replace('id=0','id='.$secids[0],$row->link);
			$row->componentid = $secids[0];
		}

		if(!$row->check()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if(!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$row->checkin();
		$row->updateOrder("menutype = ".$database->Quote($row->menutype).
			" AND parent = ".(int)$row->parent);

		$msg = _MENU_ITEM_SAVED;
		switch($task) {
			case 'apply':
				mosRedirect('index2.php?option='.$option.'&menutype='.$row->menutype.
					'&task=edit&id='.$row->id,$msg);
				break;

			case 'save':
			default:
				mosRedirect('index2.php?option='.$option.'&menutype='.$row->menutype,$msg);
				break;
		}
	}

}
?>