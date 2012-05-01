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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosPaging');
/**
* ������ ������� ��������. �������������:
* {mospagebreak}
* ��� {mospagebreak title=��������� ��������}
* ��� {mospagebreak heading=������ ��������}
* ��� {mospagebreak title=��������� ��������&heading=������ ��������}
* ��� {mospagebreak heading=������ ��������&title=��������� ��������}
*/
function botMosPaging($published, &$row, &$params, $page = 0) {
	global $mainframe, $Itemid, $database, $_MAMBOTS;
// simple performance check to determine whether bot should process further
	if (strpos($row->text, 'mospagebreak') === false) {
		return true;
	}
// expression to search for
	$regex = '/{(mospagebreak)\s*(.*?)}/i';
// check whether mambot has been unpublished
	if (!$published || $params->get('intro_only') || $params->get('popup')) {
		$row->text = preg_replace($regex, '', $row->text);
		return;
	}
// ����� ��� ������� ������� � �������� � $matches
	$matches = array();
	preg_match_all($regex, $row->text, $matches, PREG_SET_ORDER);
// ������ ������� ������
	$text = preg_split($regex, $row->text);
// ������� ����� �������
	$n = count($text);
// ���� ������ ���� ��� ���� ������, �� ��� ������� 2 ��������
	if ($n > 1) {
// check if param query has previously been processed
		if (!isset($_MAMBOTS->_content_mambot_params['mospaging'])) {
// load mambot params info
			$query = "SELECT params FROM #__mambots WHERE element = 'mospaging' AND folder = 'content'";
			$database->setQuery($query);
			$database->loadObject($mambot);
// save query to class variable
			$_MAMBOTS->_content_mambot_params['mospaging'] = $mambot;
		}
// pull query data from class variable
		$mambot = $_MAMBOTS->_content_mambot_params['mospaging'];
		$botParams = new mosParameters($mambot->params);
		$title = $botParams->def('title', 1);
// ���������� ��������� ��� �������� �  �������� <site>
		if ($title) {
			$page_text = $page + 1;
			$row->page_title = _PN_PAGE . ' ' . $page_text;
			if (!$page) {
// ��������� ������ ��������
				parse_str(html_entity_decode($matches[0][2]), $args);
				if (@$args['heading']) {
//$row->page_title = $args['heading'];
					$row->page_title = '';
				} else {
					$row->page_title = '';
				}
			} else
			if ($matches[$page - 1][2]) {
				parse_str(html_entity_decode($matches[$page - 1][2]), $args);
				if (@$args['title']) {
					$row->page_title = ': ' . stripslashes($args['title']);
				}
			}
		}
// ����� ������, ��������� ��� � ������� $text
		$row->text = '';
		$hasToc = $mainframe->getCfg('multipage_toc');
		if ($hasToc) {
// ����������� ����������
			createTOC($row, $matches, $page);
		} else {
			$row->toc = '';
		}
// ������� ��������� Joostina �� ���������
		require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php');
		$pageNav = new mosPageNav($n, $page, 1);
// ������� �������
		$row->text .= '<div class="pagenavcounter" style="display:none;">';
		$row->text .= $pageNav->writeLeafsCounter();
		$row->text .= '</div>';
// ����� ��������
		$row->text .= $text[$page];
		$row->text .= '<div class="pagenavbar">';
// ���������� ��������� ����� ���������� � ����� ������
		if ($hasToc) {
			createNavigation($row, $page, $n);
		}
// ����������� ������ �� ��������, ���� ��������� ����������
		if (!$hasToc) {
			$row->text .= $pageNav->writePagesLinks('index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid);
		}
		$row->text .= '</div>';
	}
	return true;
}
function createTOC(&$row, &$matches) {
	global $Itemid;
	$nonseflink = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
	$link = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
	$link = sefRelToAbs($link);
	$heading = $row->title;
// ��������� ��������� �������� ������ ��������, �������� ������� `heading` � ������ ����
	if (@$matches[0][2]) {
		parse_str(html_entity_decode($matches[0][2]), $args);
		if (@$args['heading']) {
			$heading = $args['heading'];
// ������� �� ������ Hammer  http://joomlaforum.ru/index.php/topic,32255.msg187840.html#msg187840
// $row->title .= ' - '.$heading;
		}
	}
// ��������� ����������
	$row->toc = '<div class="innercontents">
	<p class="strong">' . _TOC_JUMPTO . '</p>';
// ���������� ����� ������ ��������
	$row->toc .= '<ol>';
	$row->toc .= '<li><a href="' . $link . '" title="' . $heading . '">' . $heading . '</a></li>';
	$i = 2;
	$args2 = array();
	foreach ($matches as $bot) {
		$link = $nonseflink . '&amp;limit=1&amp;limitstart=' . ($i - 1);
		$link = sefRelToAbs($link);
		if (@$bot[2]) {
			parse_str(html_entity_decode($bot[2]), $args2);
			if (@$args2['title']) {
				$row->toc .= '<li><a href="' . $link . '" title="' . stripslashes($args2['title']) . '">' . stripslashes($args2['title']) . '</a></li>
';
			} else {
				$row->toc .= '<li><a href="' . $link . '" title="' . _PN_PAGE . '">' . _PN_PAGE . ' ' . $i . '</a></li>';
			}
		} else {
			$row->toc .= '<li><a href="' . $link . '" title="' . _PN_PAGE . '">' . _PN_PAGE . ' ' . $i . '</a></li>';
		}
		++$i;
	}
	$row->toc .= '</ol>';
	$row->toc .= '</div>';
}
function createNavigation(&$row, $page, $n) {
	global $Itemid;
	$link = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid;
	if ($page < $n - 1) {
		$link_next = $link . '&amp;limit=1&amp;limitstart=' . ($page + 1);
		$link_next = sefRelToAbs($link_next);
		$next = '<li class="pagenav_next"><a href="' . $link_next . '" title="' . _CMN_NEXT . '">' . _CMN_NEXT . '</a></li>';
	} else {
		$next = '<li class="pagenav_next">' . _CMN_NEXT . '</li>';
	}
	if ($page > 0) {
		$link_prev = $link . '&amp;limit=1&amp;limitstart=' . ($page - 1);
		$link_prev = sefRelToAbs($link_prev);
		$prev = '<li class="pagenav_prev"><a href="' . $link_prev . '" title="' . _CMN_PREV . '">' . _CMN_PREV . '</a></li>';
	} else {
		$prev = '<li class="pagenav_prev">' . _CMN_PREV . '</li>';
	}
	$row->text .= '<div class="pagenav_line"><ul>' . $prev . $next . '</ul></div>';
}
?>