<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или LICENSE.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл COPYRIGHT.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

/**
* Page navigation support class
* @package Joostina
*/
class mosPageNav {
	/** @var int The record number to start dislpaying from */
	var $limitstart	 = null;
	/** @var int Number of rows to display per page */
	var $limit		 = null;
	/** @var int Total number of rows */
	var $total		 = null;
	var $prev_exist	 = 0;
	var $next_exist	 = 0;

	function mosPageNav($total, $limitstart, $limit) {
		$this->total		 = (int) $total;
		$this->limitstart	 = (int) max($limitstart, 0);
		$this->limit		 = (int) max($limit, 0);
	}
	/**
	* Returns the html limit # input box
	* @param string The basic link to include in the href
	* @return string
	*/
	function getLimitBox($link) {
		$limits = array();
		for ($i = 5; $i <= 30; $i += 5) {
			$limits[] = mosHTML::makeOption("$i");
		}
		$limits[] = mosHTML::makeOption('50');
		$limits[] = mosHTML::makeOption('100');
		$limits[] = mosHTML::makeOption('150');
		$limits[] = mosHTML::makeOption('5000', '-Все-');
// build the html select list
		$link = $link . "&amp;limit='+this.options[selectedIndex].value+'&amp;limitstart=" . $this->limitstart;
		$link = sefRelToAbs($link);
		return mosHTML::selectList($limits, 'limit', 'class="inputbox" size="1" onchange="document.location.href=\'' . $link . '\';"', 'value', 'text', $this->limit);
	}
	/**
	* Writes the html limit # input box
	* @param string The basic link to include in the href
	*/
	function writeLimitBox($link) {
		echo mosPageNav::getLimitBox($link);
	}
	/** Writes the html for the pages counter, eg, Results 1-10 of x */
	function writePagesCounter() {
		$txt = '';
		$from_result = $this->limitstart + 1;
		if ($this->limitstart + $this->limit < $this->total) {
			$to_result = $this->limitstart + $this->limit;
		} else {
			$to_result = $this->total;
		}
		if ($this->total > 0) {
			$txt .= '<p class="pagetotal">' . _PN_RESULTS . ' <span class="strong">' . $from_result . '</span> - <span class="strong">' . $to_result . '</span> ' . _PN_OF . ' <span class="strong">' . $this->total . '</span></p>';
		}
		return $to_result ? $txt : ' ';
	}
	/** Writes the html for the leafs counter, eg, Page 1 of x */
	function writeLeafsCounter() {
		$txt = '';
		$page = ceil(($this->limitstart + 1) / $this->limit);
		if ($this->total > 0) {
			$total_pages = ceil($this->total / $this->limit);
			$txt .= '<p class="pagetotal">' . _PN_PAGE . ' <span class="strong">' . $page . '</span> ' . _PN_OF . ' <span class="strong">' . $total_pages . '</span></p>';
		}
		return $txt;
	}
	/**
	* Writes the html links for pages, eg, previous, next, 1 2 3 ... x
	* @param string The basic link to include in the href
	*/
	function writePagesLinks($link) {
		global $mainframe;
		$txt = '';
		$displayed_pages = 10;
		$total_pages = $this->limit ? ceil($this->total / $this->limit) : 0;
// скрываем навигатор по страницам если их меньше 2х.
		if ($total_pages < 2)
			return;
		$this_page = $this->limit ? ceil(($this->limitstart + 1) / $this->limit) : 1;
		$start_loop = (floor(($this_page - 1) / $displayed_pages)) * $displayed_pages + 1;
		if ($start_loop + $displayed_pages - 1 < $total_pages) {
			$stop_loop = $start_loop + $displayed_pages - 1;
		} else {
			$stop_loop = $total_pages;
		}
		$link .= '&amp;limit=' . $this->limit;
		if (!defined('_PN_LT') || !defined('_PN_RT')) {
			DEFINE('_PN_LT', '&lt;');
			DEFINE('_PN_RT', '&gt;');
		}
		$pnSpace = '&nbsp;';
		if (_PN_LT || _PN_RT)
			$pnSpace = "&nbsp;";
		if ($this_page > 1) {
			$page = ($this_page - 2) * $this->limit;
			$page_p10 = ($start_loop * $this->limit) - 2;
			if (!$this->prev_exist) {
				$mainframe->addCustomHeadTag('<link rel="prev" href="' . sefRelToAbs($link . '&amp;limitstart=' . $page) . '" />');
				$mainframe->addCustomHeadTag('<link rel="prev" href="' . sefRelToAbs($link) . '" />');
				$this->prev_exist = 1;
			}
			$txt .= '<li class="pagenav_prev"><a href="' . sefRelToAbs($link) . '&amp;limitstart=0" title="' . _PN_L_LLAST . '">' . _PN_LLAST . '</a></li>';
			if ($this_page > 10) {
			$txt .= '<li class="pagenav_prev">&larr; <a href="' . sefRelToAbs($link . '&amp;limitstart=' . $page_p10) . '" title="' . _PN_L_PREV10 . '">' . _PN_PREV10 . '</a></li>';
			}
			$txt .= '<li class="pagenav_prev">&larr; <a href="' . sefRelToAbs($link . '&amp;limitstart=' . $page) . '" title="' . _PN_L_PREV1 . '">' . _PN_PREV1 . '</a></li>';
		}
		for ($i = $start_loop; $i <= $stop_loop; ++$i) {
			$page = ($i - 1) * $this->limit;
			if ($i == $this_page) {
				$txt .= '<li class="pagenav_current">' . $i . '</li>';
			} else {
				$txt .= '<li class="pagenav_no_current"><a href="' . sefRelToAbs($link . '&amp;limitstart=' . $page) . '" title="' . _PN_PAGE_NUMBER . ' ' . $i . '">' . $i . '</a></li>';
			}
		}
		if ($this_page < $total_pages) {
			$page = $this_page * $this->limit;
			$page_p10 = $start_loop + ($displayed_pages - 1);
			$end_page = ($total_pages - 1) * $this->limit;
			if (!$this->next_exist) {
				$mainframe->addCustomHeadTag('<link rel="next" href="' . sefRelToAbs($link . '&amp;limitstart=' . $page) . '" />');
				$this->next_exist = 1;
			}
			$txt .= '<li class="pagenav_next"><a href="' . sefRelToAbs($link . '&amp;limitstart=' . $page) . '" title="' . _PN_L_NEXT1 . '">' . _PN_NEXT1 . '</a> &rarr;</li>';
			if ($this_page > 10) {
			$txt .= '<li class="pagenav_next"><a href="' . sefRelToAbs($link . '&amp;limitstart=' . $page_p10) . '" title="' . _PN_L_NEXT10 . '">' . _PN_NEXT10 . '</a> &rarr;</li>';
			}
			$txt .= '<li class="pagenav_next"><a href="' . sefRelToAbs($link . '&amp;limitstart=' . $end_page) . '" title="' . _PN_L_RLAST . '">' . _PN_RLAST . '</a></li>';
		}
		$txt = '<div class="pagenav_line"><ul>' . $txt . '</ul></div>';
		return $txt;
	}
/**
* Sets the vars {PAGE_LINKS}, {PAGE_LIST_OPTIONS} and {PAGE_COUNTER} for the page navigation template
* @param object The patTemplate object
* @param string The full link to be used in the nav link, eg index.php?option=com_content
* @param string The name of the template to add the variables
*/
	function setTemplateVars(&$tmpl, $link = '', $name = 'admin-list-footer') {
		$tmpl->addVar($name, 'PAGE_LINKS', $this->writePagesLinks($link));
		$tmpl->addVar($name, 'PAGE_LIST_OPTIONS', $this->getLimitBox($link));
		$tmpl->addVar($name, 'PAGE_COUNTER', $this->writePagesCounter());
	}
}
?>