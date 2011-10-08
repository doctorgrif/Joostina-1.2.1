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
if (!defined('_MOS_MAINMENU_MODULE')) {
// ������������ ������ ������� ������ ���� ���
	define('_MOS_MAINMENU_MODULE', 1);

// ��������� ������� ������ ������ �� ����
	function mosGetMenuLink($mitem, $level=0, &$params, $open=null) {
		global $Itemid, $mosConfig_live_site, $mainframe;
		$txt = '';
		switch ($mitem->type) {
			case 'separator':
			case 'component_item_link':
				break;
			case 'url':
				if (eregi('index.php\?', $mitem->link) && !eregi('http', $mitem->link) && !eregi('https', $mitem->link)) {
					if (!eregi('Itemid=', $mitem->link)) {
						$mitem->link .= '&amp;Itemid=' . $mitem->id;
// ��������� �������/������
						if (ereg("((#[^&|\/]+))", $result2->link, $urlarr))
							$result2->link = str_replace($urlarr[1], '', $result2->link);
// ��������� �������� �� ��� URL �������� Itemid
						if (!strstr($result2->link, 'Itemid')) {
// ��������� ������� �� ����� SEF. ���� ������� ����������� URL
							if (isset($GLOBALS['mosConfig_sef']) && $GLOBALS['mosConfig_sef']) {
								$result2->link .= 'Itemid,' . $result2->id . '/';
							} else {
								$result2->link .= '&amp;Itemid=$result2->id';
							}
						}
						if (isset($urlarr[1]) && $urlarr[1])
							$result2->link .= $urlarr[1];
// ���������  �������/������
					}
				}
				break;
			case 'content_item_link':
			case 'content_typed':
// load menu params
				$menuparams = new mosParameters($mitem->params, $mainframe->getPath('menu_xml', $mitem->type), 'menu');
				$unique_itemid = $menuparams->get('unique_itemid', 1);
				if ($unique_itemid) {
					$mitem->link .= '&amp;Itemid=' . $mitem->id;
				} else {
					$temp = split('&amp;task=view&amp;id=', $mitem->link);
					if ($mitem->type == 'content_typed') {
						$mitem->link .= '&amp;Itemid=' . $mainframe->getItemid($temp[1], 1, 0);
					} else {
						$mitem->link .= '&amp;Itemid=' . $mainframe->getItemid($temp[1], 0, 1);
					}
				}
				break;
			/*
			  default:
			  $mitem->link .= '&amp;Itemid='.$mitem->id;
			  break;
			 */
			default:
				if (preg_match('/index.php\?/', $mitem->link)) {
					if (!preg_match('/Itemid=/', $mitem->link)) {
						$mitem->link .= '&amp;Itemid=' . $mitem->id;
					}
				}
				break;
		}
// ��������� ��������� ����
		$current_itemid = $Itemid;
		if (!$current_itemid) {
			$id = '';
		} else if ($current_itemid == $mitem->id) {
			$id = 'id="active_menu' . $params->get('class_sfx') . '"';
		} else if ($params->get('activate_parent') && isset($open) && in_array($mitem->id, $open)) {
			$id = 'id="active_menu' . $params->get('class_sfx') . '"';
		} else {
			$id = '';
		}
		if ($params->get('full_active_id')) {
// support for `active_menu` of 'Link - Component Item'
			if ($id == '' && $mitem->type == 'component_item_link') {
				parse_str($mitem->link, $url);
				if ($url['Itemid'] == $current_itemid) {
					$id = 'id="active_menu' . $params->get('class_sfx') . '"';
				}
			}
// support for `active_menu` of 'Link - Url' if link is relative
			if ($id == '' && $mitem->type == 'url' && strpos('http', $mitem->link) === false) {
				parse_str($mitem->link, $url);
				if (isset($url['Itemid'])) {
					if ($url['Itemid'] == $current_itemid) {
						$id = 'id="active_menu' . $params->get('class_sfx') . '"';
					}
				}
			}
		}
// replace & with amp; for xhtml compliance
		$mitem->link = ampReplace($mitem->link);
// run through SEF convertor
		$mitem->link = sefRelToAbs($mitem->link);
		$menuclass = 'mainlevel' . $params->get('class_sfx');
		if ($level > 0) {
			$menuclass = 'sublevel' . $params->get('class_sfx');
		}
// replace & with amp; for xhtml compliance, remove slashes from excaped characters
		$mitem->name = stripslashes(ampReplace($mitem->name));
		switch ($mitem->browserNav) {
// ��������� �������
			case 1:
// ������� � ����� ����
				$txt = '<a href="' . $mitem->link . '"title="' . $mitem->name . '" target="_blank" class="' . $menuclass . '" ' . $id . '>' . $mitem->name . '</a>';
				break;
			case 2:
// �������� �� ����������� ����
				$txt = '<a href="#" onclick="javascript: window.open(' . $mitem->link . ', , toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550); return false" class="' . $menuclass . ' ' . $id . '>' . $mitem->name . '</a>';
				break;
			case 3:
// ��� �� ������
				$txt = '<span class="' . $menuclass . '" ' . $id . '>' . $mitem->name . '</span>';
				break;
			default:
// �������� � ������� ����
				$txt = '<a href="' . $mitem->link . '" class="' . $menuclass . '" ' . $id . 'title="' . $mitem->name . '">' . $mitem->name . '</a>';
				break;
		}
		if ($params->get('menu_images')) {
			$menu_params = new stdClass();
			$menu_params = new mosParameters($mitem->params);
			$menu_image = $menu_params->def('menu_image', -1);
			if (($menu_image != '-1') && $menu_image) {
				$image = '<img src="' . $mosConfig_live_site . '/images/stories/' . $menu_image . '" alt="' . $mitem->name . '" />';
				if ($params->get('menu_images_align')) {
					$txt = $txt . ' ' . $image;
				} else {
					$txt = $image . ' ' . $txt;
				}
			}
		}
		return $txt;
	}

// ������������ ������ ����
	function mosShowVIMenu(&$params) {
		global $database, $my, $cur_template, $Itemid;
		global $mosConfig_live_site, $mosConfig_shownoauth;
		$and = '';
		if (!$mosConfig_shownoauth) {
			$and = "\n AND access <= " . (int) $my->gid;
		}
		$sql = "SELECT m.*"
				. "\n FROM #__menu AS m"
				. "\n WHERE menutype = " . $database->Quote($params->get('menutype'))
				. "\n AND published = 1"
				. $and
				. "\n ORDER BY parent, ordering";
		$database->setQuery($sql);
		$rows = $database->loadObjectList('id');
// ������ �������
		switch ($params->get('indent_image')) {
			case '1':
// ����������� �� ���������
				$imgpath = $mosConfig_live_site . '/images/M_images';
				for ($i = 1; $i < 7; ++$i) {
					$img[$i] = '<img src="' . $imgpath . '/indent' . $i . '.png" alt="" />';
				}
				break;
			case '2':
// ������������� ����������
				$imgpath = $mosConfig_live_site . '/images/M_images';
				for ($i = 1; $i < 7; ++$i) {
					if ($params->get('indent_image' . $i) == '-1') {
						$img[$i] = NULL;
					} else {
						$img[$i] = '<img src="' . $imgpath . '/' . $params->get('indent_image' . $i) . '" alt="" />';
					}
				}
				break;
			case '3':
// ��� ����������
				for ($i = 1; $i < 7; ++$i) {
					$img[$i] = NULL;
				}
				break;
			default:
// ������
				$imgpath = $mosConfig_live_site . '/templates/' . $cur_template . '/images';
				for ($i = 1; $i < 7; ++$i) {
					$img[$i] = '<img src="' . $imgpath . '/indent' . $i . '.png" alt="" />';
				}
				break;
		}
		$indents = array(
// ������� ����� / ������� ������� / ������� ������� / ������� �����
		array('<table width="100%">', '<tr align="left"><td>', '</td></tr>', '</table>'),
		array('', '<div style="padding-left:.33em;">' . $img[1], '</div>', ''),
		array('', '<div style="padding-left:.66em;">' . $img[2], '</div>', ''),
		array('', '<div style="padding-left:1em;">' . $img[3], '</div>', ''),
		array('', '<div style="padding-left:1.33em;">' . $img[4], '</div>', ''),
		array('', '<div style="padding-left:1.66em;">' . $img[5], '</div>', ''),
		array('', '<div style="padding-left:2em;">' . $img[6], '</div>', ''),
		);
// �������� �������� ����
		$children = array();
// first pass - collect children
		foreach ($rows as $v) {
			$pt = $v->parent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push($list, $v);
			$children[$pt] = $list;
		}
// ������ ������ - ���� �������� ����
		$open = array($Itemid);
		$count = 20; // �������� ������� - ������������� ������������
		$id = $Itemid;
		while (--$count) {
			if (isset($rows[$id]) && $rows[$id]->parent > 0) {
				$id = $rows[$id]->parent;
				$open[] = $id;
			} else {
				break;
			}
		}
		mosRecurseVIMenu(0, 0, $children, $open, $indents, $params);
	}

// ��������� ����������� ������� ��� ������������� ������� �������������� ����
	function mosRecurseVIMenu($id, $level, &$children, &$open, &$indents, &$params) {
		if (@$children[$id]) {
			$n = min($level, count($indents) - 1);
			echo '\n' . $indents[$n][0];
			foreach ($children[$id] as $row) {
				echo '\n' . $indents[$n][1];
				echo mosGetMenuLink($row, $level, $params, $open);
// ������������ ����������� ���� � ������� �������
				if (!$params->get('expand_menu')) {
					if (in_array($row->id, $open)) {
						mosRecurseVIMenu($row->id, $level + 1, $children, $open, $indents, $params);
					}
				} else {
					mosRecurseVIMenu($row->id, $level + 1, $children, $open, $indents, $params);
				}
				echo $indents[$n][2];
			}
			echo '\n' . $indents[$n][3];
		}
	}

// ���������� ��������������� '��������' ����� ���� (����������� ����� ������)
	function mosShowHFMenu(&$params, $style=0) {
		global $database, $my, $mosConfig_shownoauth;
		$and = '';
		if (!$mosConfig_shownoauth) {
			$and = "\n AND access <= " . (int) $my->gid;
		}
		$sql = "SELECT m.*"
				. "\n FROM #__menu AS m"
				. "\n WHERE menutype = " . $database->Quote($params->get('menutype'))
				. "\n AND published = 1"
				. $and
				. "\n AND parent = 0"
				. "\n ORDER BY ordering"
		;
		$database->setQuery($sql);
		$rows = $database->loadObjectList('id');
		$links = array();
		foreach ($rows as $row) {
			$links[] = mosGetMenuLink($row, 0, $params);
		}
		$menuclass = 'mainlevel' . $params->get('class_sfx');
		if (count($links)) {
			switch ($style) {
				/*
				case 1:
				echo '<ul id="' . $menuclass . '">';
				foreach ($links as $link) {
				echo '<li id="' . $menuclass . '">' . $link . '</li>';
				}
				echo '</ul>';
				break;
				*/
				case 1:
					echo '<ul id="' . $menuclass . '">';
					$spacer_start = $params->get('spacer');
					$spacer_end = $params->get('end_spacer');
					$n = count($links);
					$i = '1';
					foreach ($links as $link) {
						if ($i != $n) {
							$sep = ' class="linksep"';
						} else {
							$sep = '';
						}
						echo '<li' . $sep . '>' . $link . '</li>';
						++$i;
					}
					echo '</ul>';
					break;
				default:
					$spacer_start = $params->get('spacer');
					$spacer_end = $params->get('end_spacer');
					echo '<table width="100%">';
					echo '<tr>';
					echo '<td class="jtd_nowrap">';
					if ($spacer_end) {
						echo '<span class="' . $menuclass . '">' . $spacer_end . '</span>';
					}
					if ($spacer_start) {
						$html = '<span class="' . $menuclass . '">' . $spacer_start . '</span>';
						echo implode($html, $links);
					} else {
						echo implode('', $links);
					}
					if ($spacer_end) {
						echo '<span class="' . $menuclass . '">' . $spacer_end . '</span>';
					}
					echo '</td>';
					echo '</tr>';
					echo '</table>';
					break;
			}
		}
	}

}
$params->def('menutype', 'mainmenu');
$params->def('class_sfx', '');
$params->def('menu_images', 0);
$params->def('menu_images_align', 0);
$params->def('expand_menu', 0);
$params->def('activate_parent', 0);
$params->def('indent_image', 0);
$params->def('indent_image1', 'indent1.png');
$params->def('indent_image2', 'indent2.png');
$params->def('indent_image3', 'indent3.png');
$params->def('indent_image4', 'indent4.png');
$params->def('indent_image5', 'indent5.png');
$params->def('indent_image6', 'indent.png');
$params->def('spacer', '');
$params->def('end_spacer', '');
$params->def('full_active_id', 0);
switch ($params->get('menu_style', 'vert_indent')) {
	case 'list_flat':
		mosShowHFMenu($params, 1);
		break;
	case 'horiz_flat':
		mosShowHFMenu($params, 0);
		break;
	default:
		mosShowVIMenu($params);
		break;
}
?>