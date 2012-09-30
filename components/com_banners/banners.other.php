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
// function that selecting one or more banner/s
function showBanners(&$params) {
	global $database, $my;
	$random = $params->get('random', 0);
	$count = $params->get('count', 1);
	$banners = $params->get('banners');
	$categories = $params->get('categories');
	$clients = $params->get('clients');
	$orientation = $params->get('orientation', 0);
	$moduleclass_sfx = $params->get('moduleclass_sfx');
	$weekday = mosCurrentDate('%w');
	$date = mosCurrentDate('%Y-%m-%d');
	$time = mosCurrentDate('%H:%M:%S');
	$where = array();
	if ($categories != '') {
		$where[] = "b.tid IN ($categories)";
	}
	if ($banners != '') {
		$where[] = "b.id IN ($banners)";
	}
	if ($clients != '') {
		$where[] = "b.cid IN ($clients)";
	}
	if (count($where) > 0)
		$where = '(' . implode(' OR ', $where) . ') AND';
	else
		$where = '';
	/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN b.* FROM #__banners AS b"
	. "\n INNER JOIN #__banners_categories AS cat ON b.tid = cat.id"
	. "\n INNER JOIN #__banners_clients AS cl ON b.cid = cl.cid"
	. "\n WHERE cat.published = 1 AND cl.published = 1 AND b.access <= '$my->gid' AND b.state = 1"
	. "\n AND $where ("
	. "\n ('$date' <= b.publish_down_date OR b.publish_down_date = '0000-00-00')"
	. "\n AND '$date' >= b.publish_up_date"
	. "\n AND ((b.reccurtype =0) OR (b.reccurtype =1 AND b.reccurweekdays LIKE '%$weekday%'))"
	. "\n AND '$time' >= b.publish_up_time"
	. "\n AND ('$time' <= b.publish_down_time OR b.publish_down_time = '00:00:00')"
	. "\n )"
	. "\n ORDER BY b.last_show ASC, b.msec ASC";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	$numrows = count($rows);
	if (!$numrows) {
		return '&nbsp;';
	}
$result = '<div class="banners' . $moduleclass_sfx . '">';
	if ($random && $count == 1) {
		$bannum = 0;
		if ($numrows > 1) {
			$numrows--;
			mt_srand((double) microtime() * 1000000);
			$bannum = mt_rand(0, $numrows);
		}
		if ($numrows) {
	$result .= '<div>' . showSingleBanner($rows[$bannum]) . '</div></div>';
			return $result;
		}
	}
	$showed = 0;
	$first = false;
	foreach ($rows as $row) {
// '0' -> Vertical
// '1' -> Horizontal
		if ($orientation == '0') {
	$result .= '<div>' . showSingleBanner($row) . '</div>';
		} else {
			if ($first == false) {
	$result .= '<div>';
				$first = true;
			}
		$result .= '<div>' . showSingleBanner($row) . '</div>';
		}
		$showed++;
		if ($showed == $count) {
			break;
		}
	}
	if ($orientation == '1') {
	$result .= '</div>';
	}
$result .= '</div>';
	return $result;
}
// function that showing one banner
function showSingleBanner(&$banner) {
	global $mosConfig_live_site, $database, $mosConfig_absolute_path;
	$result = '';
	$secs = gettimeofday();
	$database->setQuery("UPDATE #__banners SET imp_made=imp_made+1, last_show='" . mosCurrentDate("%Y-%m-%d %H:%M:%S") . "', msec='" . $secs["usec"] . "' WHERE id='$banner->id'");
	$database->query();
	$banner->imp_made++;
	if ($banner->imp_total == $banner->imp_made) {
		$database->setQuery("UPDATE #__banners SET state='0' WHERE id='$banner->id'");
		$database->query();
	}
	if ($banner->custom_banner_code != '') {
		$result .= $banner->custom_banner_code;
	} else
	if (eregi('(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$', $banner->image_url)) {
		$image_url = $mosConfig_live_site . '/images/banners/' . $banner->image_url;
		$imginfo = @getimagesize($mosConfig_absolute_path . '/images/banners/' . $banner->image_url);
		$target = $banner->target;
		$border_value = $banner->border_value;
		$border_style = $banner->border_style;
		$border_color = $banner->border_color;
		$alt = $banner->name;
		if ($banner->alt != '')
			$alt = $banner->alt;
		$title = $banner->title;
$result = '<a href="index.php?option=com_banners&amp;task=clk&amp;id=' . $banner->id . '" target="_' . $target . '"  title="' . $title . '"><img src="' . $image_url . '" style="border:"' . $border_value . ' ' . $border_style . ' ' . $border_color . '" vspace="0" class="banner" alt=' . $alt . '" width="' . $imginfo[0] . '" height="' . $imginfo[1] . '" /></a>';
	} else
	if (eregi('.swf', $banner->image_url)) {
		$image_url = $mosConfig_live_site . '/images/banners/' . $banner->image_url;
		$swfinfo = @getimagesize($mosConfig_absolute_path . '/images/banners/' . $banner->image_url);
		$result = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="' . $swfinfo[0] . '" height="' . $swfinfo[1] . '" align="middle" class="header2">
		<param name="allowScriptAccess" value="sameDomain" />
		<param name="allowFullScreen" value="false" />
		<param name="movie" value="' . $image_url . '" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#fff" />
		<param name="SCALE" value="noborder" />
		<param name="wmode" value="transparent" />
		<embed src="' . $image_url . '"  width="' . $swfinfo[0] . '" height="' . $swfinfo[1] . '" align="middle" quality="high" bgcolor="#fff" wmode="transparent" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" scale="noborder" /> 
		</object>';
	}
	return $result;
}
?>