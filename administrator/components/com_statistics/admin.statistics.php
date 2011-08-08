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

require_once ($mainframe->getPath('admin_html'));

switch($task) {
	case 'searches':
		showSearches($option,$task);
		break;

	case 'searchesresults':
		showSearches($option,$task,1);
		break;

	case 'pageimp':
		showPageImpressions($option,$task);
		break;

	default:
		showSummary($option,$task);
		break;
}

function showSummary($option,$task) {
	global $database,$mainframe;

	// get sort field and check against allowable field names
	$field = strtolower(mosGetParam($_REQUEST,'field',''));
	if(!in_array($field,array('agent','hits'))) {
		$field = '';
	}

	// get field ordering or set the default field to order
	$order = strtolower(mosGetParam($_REQUEST,'order','asc'));
	if($order != 'asc' && $order != 'desc' && $order != 'none') {
		$order = 'asc';
	} else
		if($order == 'none') {
			$field = 'agent';
			$order = 'asc';
		}

	// browser stats
	$order_by = '';
	$sorts = array();
	$tab = mosGetParam($_REQUEST,'tab','tab1');
	$sort_base = "index2.php?option=$option&task=$task";

	switch($field) {
		case 'hits':
			$order_by = "hits $order";
			$sorts['b_agent'] = mosHTML::sortIcon("$sort_base&tab=tab1","agent");
			$sorts['b_hits'] = mosHTML::sortIcon("$sort_base&tab=tab1","hits",$order);
			$sorts['o_agent'] = mosHTML::sortIcon("$sort_base&tab=tab2","agent");
			$sorts['o_hits'] = mosHTML::sortIcon("$sort_base&tab=tab2","hits",$order);
			$sorts['d_agent'] = mosHTML::sortIcon("$sort_base&tab=tab3","agent");
			$sorts['d_hits'] = mosHTML::sortIcon("$sort_base&tab=tab3","hits",$order);
			break;

		case 'agent':
		default:
			$order_by = "agent $order";
			$sorts['b_agent'] = mosHTML::sortIcon("$sort_base&tab=tab1","agent",$order);
			$sorts['b_hits'] = mosHTML::sortIcon("$sort_base&tab=tab1","hits");
			$sorts['o_agent'] = mosHTML::sortIcon("$sort_base&tab=tab2","agent",$order);
			$sorts['o_hits'] = mosHTML::sortIcon("$sort_base&tab=tab2","hits");
			$sorts['d_agent'] = mosHTML::sortIcon("$sort_base&tab=tab3","agent",$order);
			$sorts['d_hits'] = mosHTML::sortIcon("$sort_base&tab=tab3","hits");
			break;
	}

	$query = "SELECT*"."\n FROM #__stats_agents"."\n WHERE type = 0"."\n ORDER BY $order_by";
	$database->setQuery($query);
	$browsers = $database->loadObjectList();

	$query = "SELECT SUM( hits ) AS totalhits, MAX( hits ) AS maxhits"."\n FROM #__stats_agents".
		"\n WHERE type = 0";
	$database->setQuery($query);
	$bstats = null;
	$database->loadObject($bstats);

	// platform statistics
	$query = "SELECT*"."\n FROM #__stats_agents"."\n WHERE type = 1"."\n ORDER BY hits DESC";
	$database->setQuery($query);
	$platforms = $database->loadObjectList();

	$query = "SELECT SUM( hits ) AS totalhits, MAX( hits ) AS maxhits"."\n FROM #__stats_agents".
		"\n WHERE type = 1";
	$database->setQuery($query);
	$pstats = null;
	$database->loadObject($pstats);

	// domain statistics
	$query = "SELECT*"."\n FROM #__stats_agents"."\n WHERE type = 2"."\n ORDER BY hits DESC";
	$database->setQuery($query);
	$tldomains = $database->loadObjectList();

	$query = "SELECT SUM( hits ) AS totalhits, MAX( hits ) AS maxhits"."\n FROM #__stats_agents".
		"\n WHERE type = 2";
	$database->setQuery($query);
	$dstats = null;
	$database->loadObject($dstats);

	HTML_statistics::show($browsers,$platforms,$tldomains,$bstats,$pstats,$dstats,$sorts,
		$option);
}

function showPageImpressions($option,$task) {
	global $database,$mainframe,$mosConfig_list_limit;

	$query = "SELECT COUNT( id )"."\n FROM #__content";
	$database->setQuery($query);
	$total = $database->loadResult();

	$limit = $mainframe->getUserStateFromRequest("viewlistlimit",'limit',$mosConfig_list_limit);
	$limitstart = $mainframe->getUserStateFromRequest("view{$option}{$task}limitstart",
		'limitstart',0);

	require_once ($GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total,$limitstart,$limit);

	$query = "SELECT id, title, created, hits"."\n FROM #__content"."\n ORDER BY hits DESC";
	$database->setQuery($query,$pageNav->limitstart,$pageNav->limit);

	$rows = $database->loadObjectList();

	HTML_statistics::pageImpressions($rows,$pageNav,$option,$task);
}

function showSearches($option,$task,$showResults = null) {
	global $database,$mainframe,$mosConfig_list_limit;
	global $_MAMBOTS;

	$limit = $mainframe->getUserStateFromRequest("viewlistlimit",'limit',$mosConfig_list_limit);
	$limitstart = $mainframe->getUserStateFromRequest("view{$option}{$task}limitstart",
		'limitstart',0);

	// get the total number of records
	$query = "SELECT COUNT(*)"."\n FROM #__core_log_searches";
	$database->setQuery($query);
	$total = $database->loadResult();

	require_once ($GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total,$limitstart,$limit);

	$query = "SELECT*"."\n FROM #__core_log_searches"."\n ORDER BY hits DESC";
	$database->setQuery($query,$pageNav->limitstart,$pageNav->limit);

	$rows = $database->loadObjectList();
	if($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	$_MAMBOTS->loadBotGroup('search');

	$total = count($rows);
	for($i = 0,$n = $total; $i < $n; $i++) {
		// determine if number of results for search item should be calculated
		// by default it is `off` as it is highly query intensive
		if($showResults) {
			$results = $_MAMBOTS->trigger('onSearch',array($rows[$i]->search_term));

			$count = 0;
			$total = count($results);
			for($j = 0,$n2 = $total; $j < $n2; $j++) {
				$count += count($results[$j]);
			}

			$rows[$i]->returns = $count;
		} else {
			$rows[$i]->returns = null;
		}
	}

	HTML_statistics::showSearches($rows,$pageNav,$option,$task,$showResults);
}
?>