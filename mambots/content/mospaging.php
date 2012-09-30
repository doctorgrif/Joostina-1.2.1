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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosPaging');
/**
* Мамбот разрыва страницы. Использование:
* {mospagebreak}
* или {mospagebreak title=Заголовок страницы}
* или {mospagebreak heading=Первая страница}
* или {mospagebreak title=Заголовок страницы&heading=Первая страница}
* или {mospagebreak heading=Первая страница&title=Заголовок страницы}
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
// найти все образцы мамбота и вставить в $matches
	$matches = array();
	preg_match_all($regex, $row->text, $matches, PREG_SET_ORDER);
// мамбот разрыва текста
	$text = preg_split($regex, $row->text);
// подсчет числа страниц
	$n = count($text);
// если найден хоть еще один мамбот, то как минимум 2 страницы
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
// добавление заголовка или названия в  название <site>
		if ($title) {
			$page_text = $page + 1;
			$row->page_title = _PN_PAGE . ' ' . $page_text;
			if (!$page) {
// обработка первой страницы
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
// сброс текста, удержание его в массиве $text
		$row->text = '';
		$hasToc = $mainframe->getCfg('multipage_toc');
		if ($hasToc) {
// отображение содержания
			createTOC($row, $matches, $page);
		} else {
			$row->toc = '';
		}
// обычная навигация Joostina по страницам
		require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/pageNavigation.php');
		$pageNav = new mosPageNav($n, $page, 1);
// счетчик страниц
		$row->text .= '<div class="pagenavcounter">';
		$row->text .= $pageNav->writeLeafsCounter();
		$row->text .= '</div>';
// текст страницы
		$row->text .= $text[$page];
		$row->text .= '<div class="pagenavbar">';
// добавление навигации между страницами в конце текста
		if ($hasToc) {
			createNavigation($row, $page, $n);
		}
// отображение ссылок на страницы, если запрещено содержание
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
// позволяет настройку названия первой страницы, проверяя атрибут `heading` в первом боте
	if (@$matches[0][2]) {
		parse_str(html_entity_decode($matches[0][2]), $args);
		if (@$args['heading']) {
			$heading = $args['heading'];
// сделано по совету Hammer  http://joomlaforum.ru/index.php/topic,32255.msg187840.html#msg187840
// $row->title .= ' - '.$heading;
		}
	}
// Заголовок содержания
	$row->toc = '<div class="innercontents">
	<p class="strong">' . _TOC_JUMPTO . '</p>';
// Содержание связи первой страницы
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
				$row->toc .= '<li><a href="' . $link . '" title="' . stripslashes($args2['title']) . '">' . stripslashes($args2['title']) . '</a></li>';
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
		$next = '<li class="pagenav_next"><a href="' . $link_next . '" title="' . _CMN_NEXT_1 . '">' . _CMN_NEXT . '</a></li>';
	} else {
		$next = '<li class="pagenav_next">' . _CMN_NEXT . '</li>';
	}
	if ($page > 0) {
		$link_prev = $link . '&amp;limit=1&amp;limitstart=' . ($page - 1);
		$link_prev = sefRelToAbs($link_prev);
		$prev = '<li class="pagenav_prev"><a href="' . $link_prev . '" title="' . _CMN_PREV_1 . '">' . _CMN_PREV . '</a></li>';
	} else {
		$prev = '<li class="pagenav_prev">' . _CMN_PREV . '</li>';
	}
	$row->text .= '<div class="pagenav_line"><ul>' . $prev . $next . '</ul></div>';
}
?>