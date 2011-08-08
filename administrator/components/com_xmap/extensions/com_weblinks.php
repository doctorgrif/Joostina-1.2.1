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

class xmap_com_weblinks{
	function &getTree( &$xmap, &$parent ){
		global $database, $mosConfig_absolute_path, $my, $Itemid;
		$list = array();

		// include popular bloggers by default
		$sql = 'SELECT id, title FROM #__categories WHERE section=\'com_weblinks\' and published=1';
		$objResults = $database->setQuery($sql);
		$rows = $database->loadObjectList();
		$modified = time();

		$xmap->changeLevel(1);
		foreach($rows as $row){
			$node = new stdclass;

			$node->id = $parent->id;
			$node->browserNav = $parent->browserNav;
			$node->name = $row->title;
			$node->modified = $modified;
			$node->link = "index.php?option=com_weblinks&amp;catid=".$row->id; //."&Itemid".$row->id;
			$node->pid = $parent->id;// parent id

			$xmap->printNode($node);

			// get links
			$sql = 'SELECT id, title FROM #__weblinks WHERE catid='. $row->id . ' and published=1';
			$linksResults = $database->setQuery($sql);
			$links = $database->loadObjectList();

			//http://archive/component/option,com_weblinks/task,view/catid,19/id,1/
			$xmap->changeLevel(1);
			foreach($links as $curlink){
				$child = new stdclass;
				$child->id = $node->id;
				$child->browserNav = $node->browserNav;
				$child->modified = $modified;
				$child->name = $curlink->title;
				$child->link = "index.php?option=com_weblinks&amp;task=view&amp;catid=".$row->id."&amp;id=".$curlink->id."&amp;Itemid=".$Itemid;
				$child->pid = $node->pid;

				$xmap->printNode($child);

			}
			$xmap->changeLevel(-1);
		}
		$xmap->changeLevel(-1);
		return $list;
	}
};
