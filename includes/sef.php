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
global $mosConfig_sef, $mosConfig_absolute_path, $mosConfig_live_site;
if ($mosConfig_sef) {
	/* Обработка GET-параметра - start */
// $url_array = explode('/',$_SERVER['REQUEST_URI']);
	$url4parse = $_SERVER['REQUEST_URI'];
	if (strpos($url4parse, '?'))
		$url4parse = substr($url4parse, 0, strpos($url4parse, '?'));
	$url_array = explode('/', $url4parse);
	/* Обработка GET-параметра - end */
	if (in_array('content', $url_array)) {
		/* Content http://www.domain.com/$option/$task/$sectionid/$id/$Itemid/$limit/$limitstart */
		$uri = explode('content/', $_SERVER['REQUEST_URI']);
		$option = 'com_content';
		$_GET['option'] = $option;
		$_REQUEST['option'] = $option;
		$pos = array_search('content', $url_array);
// language hook for content
		$lang = '';
		foreach ($url_array as $key => $value) {
			if (!strcasecmp(substr($value, 0, 5), 'lang,')) {
				$temp = explode(',', $value);
				if (isset($temp[0]) && $temp[0] != '' && isset($temp[1]) && $temp[1] != '') {
					$_GET['lang'] = $temp[1];
					$_REQUEST['lang'] = $temp[1];
					$lang = $temp[1];
				}
				unset($url_array[$key]);
			}
		}
		if (isset($url_array[$pos + 8]) && $url_array[$pos + 8] != '' && in_array('category', $url_array) && (strpos($url_array[$pos + 5], 'order,') !== false) && (strpos($url_array[$pos +
						6], 'filter,') !== false)) {
// $option/$task/$sectionid/$id/$Itemid/$order/$filter/$limit/$limitstart
			$task = $url_array[$pos + 1];
			$sectionid = $url_array[$pos + 2];
			$id = $url_array[$pos + 3];
			$Itemid = $url_array[$pos + 4];
			$order = str_replace('order,', '', $url_array[$pos + 5]);
			$filter = str_replace('filter,', '', $url_array[$pos + 6]);
			$limit = $url_array[$pos + 7];
			$limitstart = $url_array[$pos + 8];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['order'] = $order;
			$_REQUEST['order'] = $order;
			$_GET['filter'] = $filter;
			$_REQUEST['filter'] = $filter;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;sectionid=$sectionid&amp;id=$id&amp;Itemid=$Itemid&amp;order=$order&amp;filter=$filter&amp;limit=$limit&amp;limitstart=$limitstart";
		} else
		if (isset($url_array[$pos + 7]) && $url_array[$pos + 7] != '' && $url_array[$pos +
				5] > 1000 && (in_array('archivecategory', $url_array) || in_array('archivesection', $url_array))) {
// $option/$task/$id/$limit/$limitstart/$year/$month/$module
			$task = $url_array[$pos + 1];
			$id = $url_array[$pos + 2];
			$limit = $url_array[$pos + 3];
			$limitstart = $url_array[$pos + 4];
			$year = $url_array[$pos + 5];
			$month = $url_array[$pos + 6];
			$module = $url_array[$pos + 7];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$_GET['year'] = $year;
			$_REQUEST['year'] = $year;
			$_GET['month'] = $month;
			$_REQUEST['month'] = $month;
			$_GET['module'] = $module;
			$_REQUEST['module'] = $module;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;id=$id&amp;limit=$limit&amp;limitstart=$limitstart&amp;year=$year&amp;month=$month&amp;module=$module";
		} else
		if (isset($url_array[$pos + 7]) && $url_array[$pos + 7] != '' && $url_array[$pos +
				6] > 1000 && (in_array('archivecategory', $url_array) || in_array('archivesection', $url_array))) {
// $option/$task/$id/$Itemid/$limit/$limitstart/$year/$month
			$task = $url_array[$pos + 1];
			$id = $url_array[$pos + 2];
			$Itemid = $url_array[$pos + 3];
			$limit = $url_array[$pos + 4];
			$limitstart = $url_array[$pos + 5];
			$year = $url_array[$pos + 6];
			$month = $url_array[$pos + 7];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$_GET['year'] = $year;
			$_REQUEST['year'] = $year;
			$_GET['month'] = $month;
			$_REQUEST['month'] = $month;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;id=$id&amp;Itemid=$Itemid&amp;limit=$limit&amp;limitstart=$limitstart&amp;year=$year&amp;month=$month";
		} else
		if (isset($url_array[$pos + 7]) && $url_array[$pos + 7] != '' && in_array('category', $url_array) && (strpos($url_array[$pos + 5], 'order,') !== false)) {
// $option/$task/$sectionid/$id/$Itemid/$order/$limit/$limitstart
			$task = $url_array[$pos + 1];
			$sectionid = $url_array[$pos + 2];
			$id = $url_array[$pos + 3];
			$Itemid = $url_array[$pos + 4];
			$order = str_replace('order,', '', $url_array[$pos + 5]);
			$limit = $url_array[$pos + 6];
			$limitstart = $url_array[$pos + 7];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['order'] = $order;
			$_REQUEST['order'] = $order;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;sectionid=$sectionid&amp;id=$id&amp;Itemid=$Itemid&amp;order=$order&amp;limit=$limit&amp;limitstart=$limitstart";
		} else
		if (isset($url_array[$pos + 6]) && $url_array[$pos + 6] != '') {
// $option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
			$task = $url_array[$pos + 1];
			$sectionid = $url_array[$pos + 2];
			$id = $url_array[$pos + 3];
			$Itemid = $url_array[$pos + 4];
			$limit = $url_array[$pos + 5];
			$limitstart = $url_array[$pos + 6];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;sectionid=$sectionid&amp;id=$id&amp;Itemid=$Itemid&amp;limit=$limit&amp;limitstart=$limitstart";
		} else
		if (isset($url_array[$pos + 5]) && $url_array[$pos + 5] != '') {
// $option/$task/$id/$Itemid/$limit/$limitstart
			$task = $url_array[$pos + 1];
			$id = $url_array[$pos + 2];
			$Itemid = $url_array[$pos + 3];
			$limit = $url_array[$pos + 4];
			$limitstart = $url_array[$pos + 5];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;id=$id&amp;Itemid=$Itemid&amp;limit=$limit&amp;limitstart=$limitstart";
		} else
		if (isset($url_array[$pos + 4]) && $url_array[$pos + 4] != '' && (in_array('archivecategory', $url_array) || in_array('archivesection', $url_array))) {
// $option/$task/$year/$month/$module
			$task = $url_array[$pos + 1];
			$year = $url_array[$pos + 2];
			$month = $url_array[$pos + 3];
			$module = $url_array[$pos + 4];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['year'] = $year;
			$_REQUEST['year'] = $year;
			$_GET['month'] = $month;
			$_REQUEST['month'] = $month;
			$_GET['module'] = $module;
			$_REQUEST['module'] = $module;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;year=$year&amp;month=$month&amp;module=$module";
		} else
		if (!(isset($url_array[$pos + 5]) && $url_array[$pos + 5] != '') && isset($url_array[$pos +
						4]) && $url_array[$pos + 4] != '') {
// $option/$task/$sectionid/$id/$Itemid
			$task = $url_array[$pos + 1];
			$sectionid = $url_array[$pos + 2];
			$id = $url_array[$pos + 3];
			$Itemid = $url_array[$pos + 4];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;sectionid=$sectionid&amp;id=$id&amp;Itemid=$Itemid";
		} else
		if (!(isset($url_array[$pos + 4]) && $url_array[$pos + 4] != '') && (isset($url_array[$pos +
						3]) && $url_array[$pos + 3] != '')) {
// $option/$task/$id/$Itemid
			$task = $url_array[$pos + 1];
			$id = $url_array[$pos + 2];
			$Itemid = $url_array[$pos + 3];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;id=$id&amp;Itemid=$Itemid";
		} else
		if (!(isset($url_array[$pos + 3]) && $url_array[$pos + 3] != '') && (isset($url_array[$pos +
						2]) && $url_array[$pos + 2] != '')) {
// $option/$task/$id
			$task = $url_array[$pos + 1];
			$id = $url_array[$pos + 2];
// pass data onto global variables
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$QUERY_STRING = "option=com_content&amp;task=$task&amp;id=$id";
		} else
		if (!(isset($url_array[$pos + 2]) && $url_array[$pos + 2] != '') && (isset($url_array[$pos +
						1]) && $url_array[$pos + 1] != '')) {
// $option/$task
			$task = $url_array[$pos + 1];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$QUERY_STRING = 'option=com_content&amp;task=' . $task;
		}
		if ($lang != '') {
			$QUERY_STRING .= '&amp;lang=' . $lang;
		}
		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0] . 'index.php?' . $QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	} else
	if (in_array('component', $url_array)) {
		/* Components http://www.domain.com/component/$name,$value */
		$uri = explode('component/', $_SERVER['REQUEST_URI']);
		$uri_array = explode('/', $uri[1]);
		$QUERY_STRING = '';
		foreach ($uri_array as $value) {
			$temp = explode(',', $value);
			if (isset($temp[0]) && $temp[0] != '' && isset($temp[1]) && $temp[1] != '') {
				$_GET[$temp[0]] = $temp[1];
				$_REQUEST[$temp[0]] = $temp[1];
// проверка на существование каталога запрашиваемого компонента
				if ($temp[0] == 'option') {
					if (!is_dir($mosConfig_absolute_path . '/components/' . $temp[1])) {
						header('HTTP/1.0 404 Not Found');
						header('HTTP/1.1 404 Not Found');
						header('Status: 404 Not Found');
						require_once ($mosConfig_absolute_path . '/templates/404.php');
						exit(404);
					}
				}
				if ($QUERY_STRING == '') {
					$QUERY_STRING .= "$temp[0]=$temp[1]";
				} else {
					$QUERY_STRING .= "&$temp[0]=$temp[1]";
				}
			}
		}
		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0] . 'index.php?' . $QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
		if (defined('RG_EMULATION') && RG_EMULATION == 1) {
// Extract to globals
			while (list($key, $value) = each($_GET)) {
				if ($key != "GLOBALS") {
					$GLOBALS[$key] = $value;
				}
			}
// Don't allow config vars to be passed as global
			include ('configuration.php');
// SSL check - $http_host returns <live site url>:<port number if it is 443>
			$http_host = explode(':', $_SERVER['HTTP_HOST']);
			if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
				$mosConfig_live_site = 'https://' . substr($mosConfig_live_site, 7);
			}
		}
	} else {
		/* Unknown content http://www.domain.com/unknown */
		$jdir = str_replace('index.php', '', $_SERVER['PHP_SELF']);
		$juri = str_replace($jdir, '', $_SERVER['REQUEST_URI']);
		if ($juri != '' && $juri != '/' && !eregi("index\.php", $_SERVER['REQUEST_URI']) && !eregi("index2\.php", $_SERVER['REQUEST_URI']) && !eregi("/\?", $_SERVER['REQUEST_URI']) && $_SERVER['QUERY_STRING'] == '') {
				header('HTTP/1.0 404 Not Found');
				header('HTTP/1.1 404 Not Found');
				header('Status: 404 Not Found');
			require_once ($mosConfig_absolute_path . '/templates/404.php');
			exit(404);
		}
	}
}

/*
 * Converts an absolute URL to SEF format
 * @param string The URL
 * @return string
 */
function sefRelToAbs($string) {
	global $mosConfig_live_site, $mosConfig_sef, $mosConfig_multilingual_support;
	global $iso_client_lang, $mosConfig_com_frontpage_clear;
//multilingual code url support
	if ($mosConfig_sef && $mosConfig_multilingual_support && $string != 'index.php' &&
			!eregi("^(([^:/?#]+):)", $string) && !strcasecmp(substr($string, 0, 9), 'index.php') &&
			!eregi('lang=', $string)) {
		$string .= '&amp;lang=' . $iso_client_lang;
	}
	if (eregi("option=com_frontpage", $string) & $mosConfig_com_frontpage_clear & !
			eregi("limit", $string))
		$string = ''; // если ссылка идёт на компонент главной страницы - очистим её
// SEF URL Handling
	if ($mosConfig_sef && !eregi("^(([^:/?#]+):)", $string) && !strcasecmp(substr($string, 0, 9), 'index.php')) {
// Replace all &amp; with &
		$string = str_replace('&amp;', '&', $string);
// Home index.php
		if ($string == 'index.php') {
			$string = '';
		}
// break link into url component parts
		$url = parse_url($string);
// check if link contained fragment identifiers (ex. #foo)
		$fragment = '';
		if (isset($url['fragment'])) {
// ensure fragment identifiers are compatible with HTML4
			if (preg_match('@^[A-Za-z][A-Za-z0-9:_.-]*$@', $url['fragment'])) {
				$fragment = '#' . $url['fragment'];
			}
		}
// check if link contained a query component
		if (isset($url['query'])) {
// special handling for javascript
			$url['query'] = stripslashes(str_replace('+', '%2b', $url['query']));
// clean possible xss attacks */
			$url['query'] = preg_replace("'%3Cscript[^%3E]*%3E.*?%3C/script%3E'si", '', $url['query']);
// break url into component parts */
			parse_str($url['query'], $parts);
// special handling for javascript */
			foreach ($parts as $key => $value) {
				if (strpos($value, '+') !== false) {
					$parts[$key] = stripslashes(str_replace('%2b', '+', $value));
				}
			}
//var_dump($parts);
			$sefstring = '';
/* Component com_content urls */
			if (((isset($parts['option']) && ($parts['option'] == 'com_content' || $parts['option'] == 'content'))) && ($parts['task'] != 'new') && ($parts['task'] != 'edit') && ($parts['task'] != 'mycontent')) {
/* index.php?option=com_content [&task=$task] [&sectionid=$sectionid] [&id=$id] [&Itemid=$Itemid] [&limit=$limit] [&limitstart=$limitstart] [&year=$year] [&month=$month] [&module=$module] */
				$sefstring .= 'content/';
/* task */
				if (isset($parts['task'])) {
					$sefstring .= $parts['task'] . '/';
				}
/* sectionid */
				if (isset($parts['sectionid'])) {
					$sefstring .= $parts['sectionid'] . '/';
				}
/* id */
				if (isset($parts['id'])) {
					$sefstring .= $parts['id'] . '/';
				}
/* Itemid */
				if (isset($parts['Itemid'])) {
/* only add Itemid value if it does not correspond with the 'unassigned' Itemid value */
					if ($parts['Itemid'] != 99999999 && $parts['Itemid'] != 0) {
						$sefstring .= $parts['Itemid'] . '/';
					}
				}
/* order */
				if (isset($parts['order'])) {
					$sefstring .= 'order,' . $parts['order'] . '/';
				}
/* filter */
				if (isset($parts['filter'])) {
					$sefstring .= 'filter,' . $parts['filter'] . '/';
				}
/* limit */
				if (isset($parts['limit'])) {
					$sefstring .= $parts['limit'] . '/';
				}
/* limitstart */
				if (isset($parts['limitstart'])) {
					$sefstring .= $parts['limitstart'] . '/';
				}
/* year */
				if (isset($parts['year'])) {
					$sefstring .= $parts['year'] . '/';
				}
/* month */
				if (isset($parts['month'])) {
					$sefstring .= $parts['month'] . '/';
				}
/* module */
				if (isset($parts['module'])) {
					$sefstring .= $parts['module'] . '/';
				}
/* lang */
				if (isset($parts['lang'])) {
					$sefstring .= 'lang,' . $parts['lang'] . '/';
				}
				$string = $sefstring;
/* all other components index.php?option=com_xxxx &... */
			} else
			if (isset($parts['option']) && (strpos($parts['option'], 'com_') !== false)) {
/* do not SEF where com_content - 'edit' or 'new' task link */
				if (!(($parts['option'] == 'com_content') && ((isset($parts['task']) == 'new') ||
						(isset($parts['task']) == 'edit')))) {
					$sefstring = 'component/';
					foreach ($parts as $key => $value) {
/* remove slashes automatically added by parse_str */
						$value = stripslashes($value);
						$sefstring .= $key . ',' . $value . '/';
					}
					$string = str_replace('=', ',', $sefstring);
				}
			}
/* no query given. Empty $string to get only the fragment index.php#anchor or index.php?#anchor */
		} else {
			$string = '';
		}
/* allows SEF without mod_rewrite comment line below if you dont have mod_rewrite */
		return $mosConfig_live_site . '/' . $string . $fragment;
/* allows SEF without mod_rewrite - comment Line 456 and uncomment out Line 460 */
/* uncomment line below if you dont have mod_rewrite */
// return $mosConfig_live_site .'/index.php/'. $string . $fragment; */
/* If the above doesnt work - try uncommenting this line instead */
// return $mosConfig_live_site .'/index.php?/'. $string . $fragment; */
	} else {
/* Handling for when SEF is not activated */
/* Relative link handling */
		if ((strpos($string, $mosConfig_live_site) !== 0)) {
/* if URI starts with a "/", means URL is at the root of the host... */
			if (strncmp($string, '/', 1) == 0) {
/* splits http(s)://xx.xx/yy/zz..." into [1]="http(s)://xx.xx" and [2]="/yy/zz...": */
				$live_site_parts = array();
				eregi("^(https?:[\/]+[^\/]+)(.*$)", $mosConfig_live_site, $live_site_parts);
				$string = $live_site_parts[1] . $string;
			} else {
				$check = 1;
/* array list of non http/httpsURL schemes */
				$url_schemes = explode(', ', _URL_SCHEMES);
				$url_schemes[] = 'http:';
				$url_schemes[] = 'https:';
				foreach ($url_schemes as $url) {
					if (strpos($string, $url) === 0) {
						$check = 0;
					}
				}
				if ($check) {
					$string = $mosConfig_live_site . '/' . $string;
				}
			}
		}
		return $string;
	}
}
?>