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
global $Itemid;

function pathwayMakeLink($id, $name, $link, $parent) {
	$mitem			 = new stdClass();
	$mitem->id		 = $id;
	$mitem->name	 = html_entity_decode($name);
	$mitem->link	 = $link;
	$mitem->parent	 = $parent;
	$mitem->type	 = '';
	return $mitem;
}
/**
* Outputs the pathway breadcrumbs
* @param database A database connector object
* @param int The db id field value of the current menu item
*/
function showPathway($Itemid) {
	global $database, $option, $task, $mainframe, $mosConfig_absolute_path, $mosConfig_live_site, $my, $mosConfig_pathway_clean, $mosConfig_disable_access_control;
	if ($_SERVER['QUERY_STRING'] == '' & $mosConfig_pathway_clean) {
		echo '';
		return;
	}
	if (!$mosConfig_disable_access_control)
		$where_ac = "\n AND access <= " . (int) $my->gid;
	else
		$where_ac = '';
// the the whole menu array and index the array by the id
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN id, name, link, parent, type, menutype, access"
			. "\n FROM #__menu"
			. "\n WHERE published = 1" . $where_ac
			. "\n ORDER BY menutype, parent, ordering";
	$database->setQuery($query);
	$mitems = $database->loadObjectList('id');
// get the home page
	$home_menu = new mosMenu($database);
	foreach ($mitems as $mitem) {
		if ($mitem->menutype == 'mainmenu') {
			$home_menu = $mitem;
			break;
		}
	}
	$optionstring = '';
	if (isset($_SERVER['REQUEST_URI'])) {
		$optionstring = $_SERVER['REQUEST_URI'];
	} else
	if (isset($_SERVER['QUERY_STRING'])) {
		$optionstring = $_SERVER['QUERY_STRING'];
	}
// are we at the home page or not
/* ToDo: ������ ������ � �������������� ������ - ����� ��� ���? */
	$home = @$mitems[$home_menu->id]->name;
	$path = '';
// this is a patch job for the frontpage items! aje
	if ($Itemid == $home_menu->id) {
		switch ($option) {
			case 'content':
				$id = intval(mosGetParam($_REQUEST, 'id', 0));
				if ($task == 'blogsection') {
					$query = "SELECT title, id"
							. "\n FROM #__sections"
							. "\n WHERE id = " . (int) $id;
				} else
				if ($task == 'blogcategory') {
					$query = "SELECT title, id"
							. "\n FROM #__categories"
							. "\n WHERE id = " . (int) $id;
				} else {
					$query = "SELECT title, catid, id"
							. "\n FROM #__content"
							. "\n WHERE id = " . (int) $id;
				}
				$database->setQuery($query);
				$row = null;
				$database->loadObject($row);
				$id = max(array_keys($mitems)) + 1;
// add the content item
				$mitem2 = pathwayMakeLink($Itemid, $row->title, '', 1);
				$mitems[$id] = $mitem2;
				$Itemid = $id;
				$home = '<a href="' . sefRelToAbs($mosConfig_live_site) . '" class="pathway" title="' . $home . '">' . $home . '</a>';
				break;
		}
	}
// breadcrumbs for content items
/* ToDo: ������ ������ � �������������� ������ - ����� ��� ���? */
	switch (@$mitems[$Itemid]->type) {
// menu item = List - Content Section
		case 'content_section':
			$id = intval(mosGetParam($_REQUEST, 'id', 0));
			switch ($task) {
				case 'category':
					if ($id) {
						$query = "SELECT title, id"
								. "\n FROM #__categories"
								. "\n WHERE id = " . (int) $id
								. "\n AND access <= " . (int)
								$my->id;
						$database->setQuery($query);
						$title = $database->loadResult();
						$id = max(array_keys($mitems)) + 1;
						$mitem = pathwayMakeLink($id, $title, 'index.php?option=' . $option . '&amp;task=' . $task . '&amp;id=' . $id . '&amp;Itemid=' . $Itemid, $Itemid);
						$mitems[$id] = $mitem;
						$Itemid = $id;
					}
					break;
				case 'view':
					if ($id) {
// load the content item name and category
						$query = "SELECT title, catid, id, access"
								. "\n FROM #__content"
								. "\n WHERE id = " . (int) $id;
						$database->setQuery($query);
						$row = null;
						$database->loadObject($row);
						if ($row->catid > 0) {
// load and add the category
							$query = "SELECT c.title AS title, s.id AS sectionid, c.id AS id, c.access AS cat_access"
									. "\n FROM #__categories AS c"
									. "\n LEFT JOIN #__sections AS s"
									. "\n ON c.section = s.id"
									. "\n WHERE c.id = " . (int) $row->catid
									. "\n AND c.access <= " . (int) $my->id;
							$database->setQuery($query);
							$result = $database->loadObjectList();
							$title = $result[0]->title;
							$sectionid = $result[0]->sectionid;
							$id = max(array_keys($mitems)) + 1;
							$mitem1 = pathwayMakeLink($Itemid, $title, 'index.php?option=' . $option . '&amp;task=category&amp;sectionid=' . $sectionid . '&amp;id=' . $row->catid, $Itemid);
							$mitems[$id] = $mitem1;
						}
						if ($row->access <= $my->gid) {
// add the final content item
							$id++;
							$mitem2 = pathwayMakeLink($Itemid, $row->title, '', $id - 1);
							$mitems[$id] = $mitem2;
						}
						$Itemid = $id;
					}
					break;
			}
			break;
// menu item = Table - Content Category
		case 'content_category':
			$id = intval(mosGetParam($_REQUEST, 'id', 0));
			switch ($task) {
				case 'view':
					if ($id) {
// load the content item name and category
						$query = "SELECT title, catid, id"
								. "\n FROM #__content"
								. "\n WHERE id = " . (int) $id
								. "\n AND access <= " . (int) $my->id;
						$database->setQuery($query);
						$row = null;
						$database->loadObject($row);
						$id = max(array_keys($mitems)) + 1;
// add the final content item
						$mitem2 = pathwayMakeLink($Itemid, $row->title, '', $Itemid);
						$mitems[$id] = $mitem2;
						$Itemid = $id;
					}
					break;
			}
			break;
// menu item = Blog - Content Category
// menu item = Blog - Content Section
		case 'content_blog_category':
		case 'content_blog_section':
			switch ($task) {
				case 'view':
					$id = intval(mosGetParam($_REQUEST, 'id', 0));
					if ($id) {
// load the content item name and category
						$query = "SELECT title, catid, id"
								. "\n FROM #__content"
								. "\n WHERE id = " . (int) $id
								. "\n AND access <= " . (int) $my->id;
						$database->setQuery($query);
						$row = null;
						$database->loadObject($row);
						$id = max(array_keys($mitems)) + 1;
						$mitem2 = pathwayMakeLink($Itemid, $row->title, '', $Itemid);
						$mitems[$id] = $mitem2;
						$Itemid = $id;
					}
					break;
			}
			break;
	}
	$i = count($mitems);
	$mid = $Itemid;
	$imgPath = 'templates/' . $mainframe->getTemplate() . '/i/pagenav/arrow.png';
	if (file_exists("$mosConfig_absolute_path/$imgPath")) {
		$img = '<img src="' . $mosConfig_live_site . '/' . $imgPath . '" alt=">>" />';
	} else {
		$imgPath = '/images/M_images/arrow.png';
		if (file_exists($mosConfig_absolute_path . $imgPath)) {
			$img = '<img src="' . $mosConfig_live_site . '/images/M_images/arrow.png" alt=">>" />';
		} else {
			$img = '&rarr;';
		}
	}
	while (--$i) {
		if (!$mid || empty($mitems[$mid]) || $Itemid == $home_menu->id || !eregi("option", $optionstring)) {
			break;
		}
		$item = &$mitems[$mid];
		$itemname = stripslashes($item->name);
// if it is the current page, then display a non hyperlink
		if (($item->id == $Itemid && !$mainframe->getCustomPathWay()) || empty($mid) ||
				empty($item->link)) {
			$newlink = $itemname;
		} else
		if (isset($item->type) && $item->type == 'url') {
			$correctLink = eregi('http://', $item->link);
			if ($correctLink == 1) {
				$newlink = '<a href="' . $item->link . '" target="_window" class="pathway" title="' . $itemname . '">' . $itemname . '</a>';
			} else {
				$newlink = $itemname;
			}
		} else {
			$newlink = '<a href="' . sefRelToAbs($item->link . '&amp;Itemid=' . $item->id) . '" class="pathway" title="' . $itemname . '">' . $itemname . '</a>';
		}
// converts & to &amp; for xtml compliance
		$newlink = ampReplace($newlink);
		if (trim($newlink) != "") {
			$path = ' &rarr; ' . $newlink . ' ' . $path;
		} else {
			$path = '';
		}
		$mid = $item->parent;
	}
	if (eregi('option', $optionstring) && trim($path)) {
		$home = '<a href="' . sefRelToAbs($mosConfig_live_site) . '" class="pathway" title="' . $home . '">' . $home . '</a>';
	}
	if ($mainframe->getCustomPathWay()) {
		$path .= $img . '';
		$path .= implode("$img ", $mainframe->getCustomPathWay());
	}
	if ($Itemid && $Itemid != 99999999 && $path != '') {
		echo '<span class="pathway">' . $home . ' ' . $path . '</span>';
	} else
		echo '&nbsp;';
}
// code placed in a function to prevent messing up global variables
if (!defined('_JOS_PATHWAY')) {
// ensure that functions are declared only once
	define('_JOS_PATHWAY', 1);
	showPathway($Itemid);
}
?>