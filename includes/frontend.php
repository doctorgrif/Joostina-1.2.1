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

/** Displays the capture output of the main element */
function mosMainBody() {
	global $mosConfig_live_site;
// message passed via the url
	$mosmsg = stripslashes(strval(mosGetParam($_REQUEST, 'mosmsg', '')));
	$popMessages = false;
// Browser Check
	$browserCheck = 0;
	if (isset($_SERVER['HTTP_USER_AGENT']) && isset($_SERVER['HTTP_REFERER']) &&
			strpos($_SERVER['HTTP_REFERER'], $mosConfig_live_site) !== false) {
		$browserCheck = 1;
	}
// Session Check
	$sessionCheck = 0;
// Session Cookie `name`
	$sessionCookieName = mosMainFrame::sessionCookieName();
// Get Session Cookie `value`
	$sessioncookie = mosGetParam($_COOKIE, $sessionCookieName, null);
	if ((strlen($sessioncookie) == 32 || $sessioncookie == '-')) {
		$sessionCheck = 1;
	}
// limit mosmsg to 150 characters
	if (strlen($mosmsg) > 150) {
		$mosmsg = substr($mosmsg, 0, 150);
	}
// mosmsg outputed within html
	if ($mosmsg && !$popMessages && $browserCheck && $sessionCheck) {
		echo '<div class="message">' . $mosmsg . '</div>';
	}
	echo $GLOBALS['_MOS_OPTION']['buffer'];
// mosmsg outputed in JS Popup
	if ($mosmsg && $popMessages && $browserCheck && $sessionCheck) {
		echo "\n<script language=\"javascript\">alert('" . addslashes($mosmsg) . "');</script>";
	}
}

/** Utility functions and classes */
function mosLoadComponent($name) {
// set up some global variables for use by frontend components
	global $mainframe, $database, $my, $acl;
	global $task, $Itemid, $id, $option, $gid;
	include ($mainframe->getCfg('absolute_path') . "/components/com_$name/$name.php");
}

/**
* Cache some modules information
* @return array
*/
function &initModules() {
	global $database, $my, $Itemid, $mosConfig_disable_access_control;
	if (!isset($GLOBALS['_MOS_MODULES'])) {
		$Itemid = intval($Itemid);
		$check_Itemid = '';
		if ($Itemid) {
			$check_Itemid = "OR mm.menuid = " . (int) $Itemid;
		}
		if (!$mosConfig_disable_access_control)
			$where_ac = "\n AND access <= " . (int) $my->gid;
		else
			$where_ac = '';
#$query = "SELECT id, title, module, position, content, showtitle, params, assign_to_url FROM #__modules AS m"
		$query = "SELECT id, title, module, position, content, showtitle, params FROM #__modules AS m"
				. "\n INNER JOIN #__modules_menu AS mm ON mm.moduleid = m.id"
				. "\n WHERE m.published = 1"
				. $where_ac
				. "\n AND m.client_id != 1 AND (mm.menuid = 0 $check_Itemid)"
				. "\n ORDER BY ordering";
		$database->setQuery($query);
		$modules = $database->loadObjectList();
		foreach ($modules as $module) {
			$GLOBALS['_MOS_MODULES'][$module->position][] = $module;
		}
	}
	return $GLOBALS['_MOS_MODULES'];
}

/** @param string THe template position */
function mosCountModules($position = 'left') {
	global $database, $my, $Itemid;
	$tp = intval(mosGetParam($_GET, 'tp', 0));
	if ($tp) {
		return 1;
	}
	$modules = &initModules();
	if (isset($GLOBALS['_MOS_MODULES'][$position])) {
		return count($GLOBALS['_MOS_MODULES'][$position]);
	} else {
		return 0;
	}
}

/**
* @param string The position
* @param int The style.  0=normal, 1=horiz, -1=no wrapper
*/
function mosLoadModules($position = 'left', $style = 0, $noindex = 0) {
	global $mosConfig_gzip, $mosConfig_absolute_path, $database, $my, $Itemid, $mosConfig_caching, $mainframe;
	$tp = intval(mosGetParam($_GET, 'tp', 0));
	if ($tp) {
echo '<div style="height:50px;background-color:#eee;margin:2px;padding:10px;border:1px solid #f00;color:#700;">';
		echo $position;
echo '</div>';
		return;
	}
	$style = intval($style);
	$cache = &mosCache::getCache('com_content');
	require_once ($mosConfig_absolute_path . '/includes/frontend.html.php');
	$allModules = &initModules();
	if (isset($GLOBALS['_MOS_MODULES'][$position])) {
		$modules = $GLOBALS['_MOS_MODULES'][$position];
	} else {
		$modules = array();
	}
	if ($noindex == 1)
echo '<noindex>';
	if (count($modules) < 1) {
		$style = 0;
	}
	if ($style == 1) {
echo '<table><tr>';
	}
$prepend = ($style == 1) ? "<td valign=\"top\">\n" : '';
$postpend = ($style == 1) ? "</td>\n" : '';
	$count = 1;
	foreach ($modules as $module) {
//привязка модулей к URL - проверяем включенность этой гадости [Dead Krolik]
		/* if ($module->assign_to_url) {
		//смотрим урлы для данного модуля
		$param_urls = explode("\n",$module->assign_to_url);$out_bools = array();
		foreach($param_urls as $param_url) {
		$param_url = trim($param_url);
		//проверяем флаг - надо ли показывать на данном урле или нет
		$show_on_this_url = substr($param_url,0,1)=='!' ? false : true;
		$param_url = $show_on_this_url ? $param_url : substr($param_url,1);
		//парсим урл
		//option=com_content&task=view&id>6
		$url_parts = explode("&",$param_url);
		foreach($url_parts as $index => $url_part) {
		$pos = strpos($url_part,"!=");
		if ($pos!==false) $c_operation = '!=';
		$pos = strpos($url_part,"=");
		if ($pos!==false) $c_operation = '=';
		$pos = strpos($url_part,">");
		if ($pos!==false) $c_operation = '>';
		$pos = strpos($url_part,"<");
		if ($pos!==false) $c_operation = '<';
		list($u_var,$u_val) = explode($c_operation,$url_part);
		$u_var = trim($u_var);$u_val=trim($u_val);
		$u_real_var = mosGetParam($_REQUEST,$u_var,'');
		switch($c_operation) {
		case '!=':
		//$index>0 - не первый элемент, делаем так - потому что для первого сравнения предыдущее значение не определено
		$out_bool = $index>0 ? ($out_bool && $u_real_var!=$u_val) : $u_real_var!=$u_val;
		break;
		case '=':
		$out_bool = $index>0 ? ($out_bool && $u_real_var==$u_val) : $u_real_var==$u_val;
		break;
		case '>':
		$out_bool = $index>0 ? ($out_bool && $u_real_var>$u_val) : $u_real_var>$u_val;
		break;
		case '<':
		$out_bool = $index>0 ? ($out_bool && $u_real_var<$u_val) : $u_real_var<$u_val;
		break;
		}
		}
		//показывать или нет на текущем адресе
		$out_bool = $show_on_this_url ? $out_bool : !$out_bool ;
		//складываем все результаты условий в массив
		$out_bools[] = $out_bool;
		}
		//комбинируем все условия при помощи ИЛИ, если хотя бы одно условие выстрелит, модуль показывать надо
		$show_module_on_url = false;
		foreach($out_bools as $tmp_bool) {
		$show_module_on_url = $show_module_on_url || $tmp_bool;
		}
		//исключаем модуль из показа на позиции
		if (!$show_module_on_url) continue;
		}
		//---- привязка модулей к URL [Dead Krolik]
		*/
		$params = new mosParameters($module->params);
// кэширование модулей по умолчанию
		$params->set('cache',1);
		echo $prepend;
		if ((substr($module->module, 0, 4)) == 'mod_') {
// normal modules
			if ($params->get('cache') == 1 && $mosConfig_caching == 1) {
// module caching
				$cache->call('modules_html::module2', $module, $params, $Itemid, $style, $my->gid);
			} else {
				modules_html::module2($module, $params, $Itemid, $style, $count);
			}
		} else {
// custom or new modules
			if ($params->get('cache') == 1 && $mosConfig_caching == 1) {
// module caching
				$cache->call('modules_html::module', $module, $params, $Itemid, $style, 0, $my->gid);
			} else {
				modules_html::module($module, $params, $Itemid, $style);
			}
		}
		echo $postpend;
		$count++;
	}
	if ($style == 1) {
echo '</tr>\n</table>';
	}
	if ($noindex == 1)
echo '</noindex>';
	return;
}

/** Шапка страницы */
function mosShowHead() {
	global $database, $option, $my, $mainframe, $_VERSION, $task, $id, $mosConfig_disable_favicon;
	global $mosConfig_MetaDesc, $mosConfig_MetaKeys, $mosConfig_live_site, $mosConfig_sef,
	$mosConfig_absolute_path, $mosConfig_sitename, $mosConfig_favicon;
	$description = '';
	$keywords = '';
	$_meta_keys_index = -1;
	$_meta_desc_index = -1;
	$n = count($mainframe->_head['meta']);
	for ($i = 0; $i < $n; ++$i) {
		if ($mainframe->_head['meta'][$i][0] == 'keywords') {
			$_meta_keys_index = $i;
			$keywords = $mainframe->_head['meta'][$i][1];
		} else
		if ($mainframe->_head['meta'][$i][0] == 'description') {
			$_meta_desc_index = $i;
			$description = $mainframe->_head['meta'][$i][1];
		}
	}
	if (!$description) {
$mainframe->appendMetaTag('description', $mosConfig_MetaDesc);
	}
	if (!$keywords) {
$mainframe->appendMetaTag('keywords', $mosConfig_MetaKeys);
	}
	if ($_meta_keys_index != -1) {
		$keys = $mainframe->_head['meta'][$_meta_keys_index][1];
		$keys = preg_replace("/\,+/is", ", ", $keys);
		$keys = preg_replace("/\s+/is", " ", $keys);
		$keys = strtolower($keys);
		$keys = implode(', ', array_unique(split(', ', $keys)));
		$mainframe->_head['meta'][$_meta_keys_index][1] = $keys;
	}
$iso = _ISO;
$mainframe->addMetaTag('Content-Type', 'text/html; charset=' . $iso . '');
$mainframe->addMetaTag('Content-Language', 'ru');
if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
$mainframe->addCustomHeadTag('<meta http-equiv="imagetoolbar" content="no" />');
$device_width = 'width=device-width, initial-scale=1.0';
$mainframe->addMetaTag('viewport', $device_width);
// boston, отключение тега Generator
	global $mosConfig_generator_off, $mosConfig_lang;
	if ($mosConfig_generator_off == 0)
//$mainframe->addMetaTag('Generator', $_VERSION->CMS . ' - ' . $_VERSION->COPYRIGHT);
$mainframe->addMetaTag('Generator', $mosConfig_sitename);
//boston, дополнительные теги индексации
	global $mosConfig_index_tag, $mosConfig_mtage_base, $mosConfig_mtage_revisit;
	if ($mosConfig_index_tag == 1) {
$mainframe->addMetaTag('distribution', 'global');
$mainframe->addMetaTag('rating', 'General');
$mainframe->addMetaTag('document-state', 'Dynamic');
$mainframe->addMetaTag('documentType', 'WebDocument');
$mainframe->addMetaTag('audience', 'all');
$mainframe->addMetaTag('revisit', $mosConfig_mtage_revisit . ' days');
$mainframe->addMetaTag('revisit-after', $mosConfig_mtage_revisit . ' days');
$mainframe->addMetaTag('allow-search', 'yes');
$mainframe->addMetaTag('language', $mosConfig_lang);
	}
// Dublin Core
	global $mosConfig_dcore, $mosConfig_dcore_title, $mosConfig_dcore_creator, $mosConfig_dcore_subject, $mosConfig_dcore_description, $mosConfig_dcore_publisher, $mosConfig_dcore_contributor, $mosConfig_dcore_date, $mosConfig_dcore_type, $mosConfig_dcore_format, $mosConfig_dcore_identifier, $mosConfig_dcore_source, $mosConfig_dcore_language, $mosConfig_dcore_relation, $mosConfig_dcore_coverage, $mosConfig_dcore_rights;
	$pagetitle = $mainframe->getPageTitle();
	$mosConfig_dcore_title = $pagetitle;
	$mosConfig_dcore_creator = '';
	$mosConfig_dcore_subject = '';
	$mosConfig_dcore_description = $mosConfig_MetaDesc;
	$mosConfig_dcore_publisher = '';
	$mosConfig_dcore_contributor = '';
	$mosConfig_dcore_date = strftime('%Y-%m-%d');
	$mosConfig_dcore_type = 'Text';
	$mosConfig_dcore_format = '';
	$mosConfig_dcore_identifier = '';
	$mosConfig_dcore_source = '';
	$mosConfig_dcore_relation = '';
	$mosConfig_dcore_coverage = '';
	$mosConfig_dcore_rights = '© ' . $mosConfig_sitename . ', ' . date('Y') . '. Все права защищены.';
	if ($mosConfig_dcore == 1) {
$mainframe->addCustomHeadTag('<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />');
$mainframe->addMetaTag('DC.Title', $mosConfig_dcore_title);
$mainframe->addMetaTag('DC.Creator', $mosConfig_dcore_creator);
$mainframe->addMetaTag('DC.Subject', $mosConfig_dcore_subjec);
$mainframe->addMetaTag('DC.Description', $mosConfig_dcore_description);
$mainframe->addMetaTag('DC.Publisher', $mosConfig_dcore_publisher);
$mainframe->addMetaTag('DC.Contributor', $mosConfig_dcore_contributor);
$mainframe->addMetaTag('DC.Date', $mosConfig_dcore_date);
$mainframe->addMetaTag('DC.Type', $mosConfig_dcore_type);
$mainframe->addMetaTag('DC.Format', $mosConfig_dcore_format);
$mainframe->addMetaTag('DC.Identifier', $mosConfig_dcore_identifier);
$mainframe->addMetaTag('DC.Source', $mosConfig_dcore_source);
$mainframe->addMetaTag('DC.Language', $mosConfig_dcore_language);
$mainframe->addMetaTag('DC.Relation', $mosConfig_dcore_relation);
$mainframe->addMetaTag('DC.Coverage', $mosConfig_dcore_coverage);
$mainframe->addMetaTag('DC.Rights', $mosConfig_dcore_rights);
	}
// Geotagging
	global $mosConfig_gtag, $mosConfig_gtag_lat, $mosConfig_gtag_long, $mosConfig_gtag_place, $mosConfig_gtag_reg;
	if ($mosConfig_gtag == 1) {
$mainframe->addMetaTag('ICBM', '' . $mosConfig_gtag_lat . ',' . $mosConfig_gtag_long . '');
$mainframe->addMetaTag('geo.position', '' . $mosConfig_gtag_lat . ';' . $mosConfig_gtag_long . '');
$mainframe->addMetaTag('geo.placename', $mosConfig_gtag_place);
$mainframe->addMetaTag('geo.region', $mosConfig_gtag_reg);
}
// активируем кэширование
	if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
		$cache = &mosCache::getCache('com_content');
echo $cache->call('mainframe->getHead', @$_SERVER['QUERY_STRING'], $id);
	} else {
echo $mainframe->getHead();
	}
// очистка ссылки на главную страницу даже при отключенном sef
	if ($mosConfig_mtage_base == 1) {
echo '<base href="' . $mosConfig_live_site . '" />
';
	}
	if ($my->id || $mainframe->get('joomlaJavascript')) {
		?>
<script src="<?php echo $mosConfig_live_site; ?>/includes/js/joomla.javascript.full.js" type="text/javascript"></script>
		<?php
	}
// boston, отключение RSS
	global $mosConfig_syndicate_off;
	if ($mosConfig_syndicate_off == 0) {
		$row = new mosComponent($database);
		$query = "SELECT a.* FROM #__components AS a"
				. " WHERE (a.admin_menu_link = 'option=com_syndicate' OR a.admin_menu_link = 'option=com_syndicate&hidemainmenu=1')"
				. "\n AND a.option = 'com_syndicate'";
		$database->setQuery($query);
		$database->loadObject($row);
// get params definitions
		$syndicateParams = new mosParameters($row->params, $mainframe->getPath('com_xml', $row->option), 'component');
// needed to reduce query
		$GLOBALS['syndicateParams'] = $syndicateParams;
		$live_bookmark = $syndicateParams->get('live_bookmark', 0);
// and to allow disabling/enabling of selected feed types
		switch ($live_bookmark) {
			case 'RSS0.91':
				if (!$syndicateParams->get('rss091', 1)) {
					$live_bookmark = 0;
				}
				break;
			case 'RSS1.0':
				if (!$syndicateParams->get('rss10', 1)) {
					$live_bookmark = 0;
				}
				break;
			case 'RSS2.0':
				if (!$syndicateParams->get('rss20', 1)) {
					$live_bookmark = 0;
				}
				break;
			case 'ATOM0.3':
				if (!$syndicateParams->get('atom03', 1)) {
					$live_bookmark = 0;
				}
				break;
		}
// support for Live Bookmarks ability for site syndication
		if ($live_bookmark) {
			$show = 1;
			$link_file = $mosConfig_live_site . '/index2.php?option=com_rss&amp;feed=' . $live_bookmark . '&amp;no_html=1';
// xhtml check
			$link_file = ampReplace($link_file);
// security chcek
			$check = $syndicateParams->def('check', 1);
			if ($check) {
// test if rssfeed module is published
// if not disable access
				$query = "SELECT m.id"
						. "\n FROM #__modules AS m"
						. "\n WHERE m.module = 'mod_rssfeed'"
						. "\n AND m.published = 1";
				$database->setQuery($query);
				$check = $database->loadResultArray();
				if (empty($check)) {
					$show = 0;
				}
			}
// outputs link tag for page
			if ($show) {
// test if security check is enbled
				?>
<link rel="alternate" type="application/rss+xml" title="RSS <?php echo $mosConfig_sitename; ?>" href="<?php echo $link_file; ?>" />
				<?php
			}
		}
	} // boston, окончание хака отключения RSS
// favourites icon
	if (!$mosConfig_disable_favicon) {
		if (!$mosConfig_favicon) {
			$mosConfig_favicon = 'favicon.png';
		}
		$icon = $mosConfig_absolute_path . '/' . $mosConfig_favicon;
		if (!file_exists($icon)) {
			$icon = $mosConfig_live_site . '/favicon.png';
		} else {
			$icon = $mosConfig_live_site . '/' . $mosConfig_favicon;
		}
echo '<link rel="icon" href="' . $icon . '" />
';
	}
	if (!$mosConfig_disable_favicon_ie) {
		if (!$mosConfig_favicon_ie) {
			$mosConfig_favicon_ie = 'favicon.ico';
		}
		$icon_ie = $mosConfig_absolute_path . '/' . $mosConfig_favicon_ie;
		if (!file_exists($icon_ie)) {
			$icon_ie = $mosConfig_live_site . '/favicon.ico';
		} else {
			$icon_ie = $mosConfig_live_site . '/' . $mosConfig_favicon_ie;
		}
		if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
echo '<link rel="shortcut icon" href="' . $icon_ie . '" />
';
}
	}
	if (!$mosConfig_disable_favicon_ipad) {
		if (!$mosConfig_favicon_ipad) {
			$mosConfig_favicon_ipad = 'apple-touch-icon.png';
		}
		$icon_ipad = $mosConfig_absolute_path . '/' . $mosConfig_favicon_ipad;
		if (!file_exists($icon_ipad)) {
			$icon_ipad = $mosConfig_live_site . '/apple-touch-icon.png';
		} else {
			$icon_ipad = $mosConfig_live_site . '/' . $mosConfig_favicon_ipad;
		}
echo '<link rel="apple-touch-icon" href="' . $mosConfig_live_site . '/apple-touch-icon.png" />
';
	}
}

function set_robot_metatag($robots) {
	global $mainframe;
	if ($robots == 0) {
		$mainframe->addMetaTag('robots', 'index, follow');
	}
	if ($robots == 1) {
		$mainframe->addMetaTag('robots', 'index, nofollow');
	}
	if ($robots == 2) {
		$mainframe->addMetaTag('robots', 'noindex, follow');
	}
	if ($robots == 3) {
		$mainframe->addMetaTag('robots', 'noindex, nofollow');
	}
}
?>