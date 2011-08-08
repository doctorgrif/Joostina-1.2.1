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
 * Page navigation support class
 * @package Joostina
 */
class mosPageNav {

	/**
	  @var int The record number to start dislpaying from */
	var $limitstart = null;
	/**
	  @var int Number of rows to display per page */
	var $limit = null;
	/**
	  @var int Total number of rows */
	var $total = null;

	function mosPageNav($total, $limitstart, $limit) {
		$this->total = (int) $total;
		$this->limitstart = (int) max($limitstart, 0);
		$this->limit = (int) max($limit, 1);
		if ($this->limit > $this->total) {
			$this->limitstart = 0;
		}
		if (($this->limit - 1) * $this->limitstart > $this->total) {
			$this->limitstart -= $this->limitstart % $this->limit;
		}
	}

	/**
	 * @return string The html for the limit # input box
	 */
	function getLimitBox() {
		$limits = array();
		for ($i = 5; $i <= 30; $i += 5) {
			$limits[] = mosHTML::makeOption("$i");
		}
		$limits[] = mosHTML::makeOption('50');
		$limits[] = mosHTML::makeOption('100');
		$limits[] = mosHTML::makeOption('150');
		$limits[] = mosHTML::makeOption('5000', '-���-');
		// build the html select list
		$html = mosHTML::selectList($limits, 'limit', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->limit);
		$html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"$this->limitstart\" />";
		return $html;
	}

	/**
	 * Writes the html limit # input box
	 */
	function writeLimitBox() {
		echo mosPageNav::getLimitBox();
	}

	function writePagesCounter() {
		echo $this->getPagesCounter();
	}

	/**
	 * @return string The html for the pages counter, eg, Results 1-10 of x
	 */
	function getPagesCounter() {
		$html = '';
		$from_result = $this->limitstart + 1;
		if ($this->limitstart + $this->limit < $this->total) {
			$to_result = $this->limitstart + $this->limit;
		} else {
			$to_result = $this->total;
		}
		if ($this->total > 0) {
			$html .= "\n" . _NAV_SHOW . " " . $from_result . " - " . $to_result . " " . _NAV_SHOW_FROM . " " . $this->total;
		} else {
			$html .= "\n" . _NAV_NO_RECORDS;
		}
		return $html;
	}

	/**
	 * Writes the html for the pages counter, eg, Results 1-10 of x
	 */
	function writePagesLinks() {
		echo $this->getPagesLinks();
	}

	/**
	 * @return string The html links for pages, eg, previous, next, 1 2 3 ... x
	 */
	function getPagesLinks() {
		$html = '';
		$displayed_pages = 10;
		$total_pages = ceil($this->total / $this->limit);
		// �������� ��������� �� ��������� ���� �� ������ 2�.
		if ($total_pages < 2)
			return;
		$this_page = ceil(($this->limitstart + 1) / $this->limit);
		$start_loop = (floor(($this_page - 1) / $displayed_pages)) * $displayed_pages + 1;
		if ($start_loop + $displayed_pages - 1 < $total_pages) {
			$stop_loop = $start_loop + $displayed_pages - 1;
		} else {
			$stop_loop = $total_pages;
		}

		if ($this_page > 1) {
			$page = ($this_page - 2) * $this->limit;
			$html .= "\n<a href=\"#beg\" class=\"pagenav\" onclick=\"javascript: document.adminForm.limitstart.value=0; document.adminForm.submit();return false;\">&lt;&lt;&nbsp;" . _PN_START . "</a>";
			$html .= "\n<a href=\"#prev\" class=\"pagenav\" onclick=\"javascript: document.adminForm.limitstart.value=$page; document.adminForm.submit();return false;\">&lt;&nbsp;" . _PN_PREVIOUS . "</a>";
		} else {
			$html .= "\n<span class=\"pagenav\">&lt;&lt;&nbsp;" . _PN_START . "</span>";
			$html .= "\n<span class=\"pagenav\">&lt;&nbsp;" . _PN_PREVIOUS . "</span>";
		}

		for ($i = $start_loop; $i <= $stop_loop; ++$i) {
			$page = ($i - 1) * $this->limit;
			if ($i == $this_page) {
				$html .= "\n<span class=\"pagenav\"> $i </span>";
			} else {
				$html .= "\n<a href=\"#$i\" class=\"pagenav\" onclick=\"javascript: document.adminForm.limitstart.value=$page; document.adminForm.submit();return false;\"><strong>$i</strong></a>";
			}
		}

		if ($this_page < $total_pages) {
			$page = $this_page * $this->limit;
			$end_page = ($total_pages - 1) * $this->limit;
			$html .= "\n<a href=\"#next\" class=\"pagenav\" onclick=\"javascript: document.adminForm.limitstart.value=$page; document.adminForm.submit();return false;\"> " . _PN_NEXT . "&nbsp;&gt;</a>";
			$html .= "\n<a href=\"#end\" class=\"pagenav\" onclick=\"javascript: document.adminForm.limitstart.value=$end_page; document.adminForm.submit();return false;\"> " . _PN_END . "&nbsp;&gt;&gt;</a>";
		} else {
			$html .= "\n<span class=\"pagenav\">" . _PN_NEXT . "&nbsp;&gt;</span>";
			$html .= "\n<span class=\"pagenav\">" . _PN_END . "&nbsp;&gt;&gt;</span>";
		}
		return $html;
	}

	function getListFooter() {
		$html = '<table class="adminlist"><tr><td align="center">';
		$html .= $this->getPagesCounter() . $this->getPagesLinks() . ' ' . _PN_DISPLAY_NR . ' # ' . $this->getLimitBox() . '</td>';
		$html .= '</tr></table>';
		return $html;
	}

	/**
	 * @param int The row index
	 * @return int
	 */
	function rowNumber($i) {
		return $i + 1 + $this->limitstart;
	}

	/**
	 * @param int The row index
	 * @param string The task to fire
	 * @param string The alt text for the icon
	 * @return string
	 */
	function orderUpIcon($i, $condition = true, $task = 'orderup', $alt =
	'����������� ����') {
		if (($i > 0 || ($i + $this->limitstart > 0)) && $condition) {
			return '<a href="#reorder" onClick="return listItemTask(\'cb' . $i . '\',\'' . $task . '\')" title="' . $alt . '">
				<img src="images/uparrow.png" width="12" height="12" alt="' . $alt . '" />
			</a>';
		} else {
			return '&nbsp;';
		}
	}

	/**
	 * @param int The row index
	 * @param int The number of items in the list
	 * @param string The task to fire
	 * @param string The alt text for the icon
	 * @return string
	 */
	function orderDownIcon($i, $n, $condition = true, $task = 'orderdown', $alt =
	'����������� ����') {
		if (($i < $n - 1 || $i + $this->limitstart < $this->total - 1) && $condition) {
			return '<a href="#reorder" onClick="return listItemTask(\'cb' . $i . '\',\'' . $task . '\')" title="' . $alt . '">
				<img src="images/downarrow.png" width="12" height="12" alt="' . $alt . '" />
			</a>';
		} else {
			return '&nbsp;';
		}
	}

	/**
	 * @param int The row index
	 * @param string The task to fire
	 * @param string The alt text for the icon
	 * @return string
	 */
	function orderUpIcon2($id, $order) {
		if ($order == 0) {
			$img = 'uparrow.png';
			$show = true;
		} else
		if ($order < 0) {
			$img = 'uparrow.png';
			$show = true;
		} else {
			$img = 'uparrow.png';
			$show = true;
		}
		;
		if ($show) {
			$output = '<a href="#ordering" onClick="listItemTask(\'cb' . $id . '\',\'orderup\')" title="' . _NAV_ORDER_UP . '">';
			$output .= '<img src="images/' . $img . '" width="12" height="12" alt="' . _NAV_ORDER_UP . '" title="' . _NAV_ORDER_UP . '" /></a>';

			return $output;
		} else {
			return '&nbsp;';
		}
	}

	/**
	 * @param int The row index
	 * @param int The number of items in the list
	 * @param string The task to fire
	 * @param string The alt text for the icon
	 * @return string
	 */
	function orderDownIcon2($id, $order) {

		if ($order == 0) {
			$img = 'downarrow.png';
			$show = true;
		} else
		if ($order < 0) {
			$img = 'downarrow.png';
			$show = true;
		} else {
			$img = 'downarrow.png';
			$show = true;
		}
		;
		if ($show) {
			$output = '<a href="#ordering" onClick="listItemTask(\'cb' . $id . '\',\'orderdown\')" title="' . _NAV_ORDER_DOWN . '">';
			$output .= '<img src="images/' . $img . '" width="12" height="12" alt="' . _NAV_ORDER_DOWN . '" title="' . _NAV_ORDER_DOWN . '" /></a>';

			return $output;
		} else {
			return '&nbsp;';
		}
	}

	/**
	 * Sets the vars for the page navigation template
	 */
	function setTemplateVars(&$tmpl, $name = 'admin-list-footer') {
		$tmpl->addVar($name, 'PAGE_LINKS', $this->getPagesLinks());
		$tmpl->addVar($name, 'PAGE_LIST_OPTIONS', $this->getLimitBox());
		$tmpl->addVar($name, 'PAGE_COUNTER', $this->getPagesCounter());
	}

}

?>