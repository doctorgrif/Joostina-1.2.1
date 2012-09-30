<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
//session_start();
defined('_VALID_MOS') or die();
global $mainframe, $params, $database, $Itemid, $target, $new, $content;
	$wlcategory = $params->get('wlcategory', 0);
	$wlshownew = $params->get('wlshownew', 0);
	$wldaysnew = $params->get('wldaysnew', 3);
	$wlorderby = $params->get('wlorderby', 'date DESC');
	$wlshowhits = $params->get('wlshowhits', 0);
	$wlnumberofrows = $params->get('wlnumberofrows', 10);
	$wlpopuplinks = $params->get('wlpopuplinks', 1);
	$wllengthoftitle = $params->get('wllengthoftitle', 23);
	$wldotaddlenght = $params->get('wldotaddlenght', 20);
	$wlreadmore = $params->get('wlreadmore', 0);
	$and = "";
if ($wlcategory > 0) {
	$and = 'AND a.catid = '.$wlcategory;
}
	$query = "SELECT STRAIGHT_JOIN a.id, a.catid, a.title, a.description, DATE_FORMAT(a.date,'%Y-%m-%d') as cdate, hits
	FROM #__weblinks as a
	WHERE a.published ='1' $and 
	ORDER BY $wlorderby LIMIT $wlnumberofrows";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
if ($wlpopuplinks == 1) {
	$target = 'target="_blank"';
} else {
	$target = '';
};
$today = getdate();
$newitem1 = mktime(0, 0, 0, date('m'), date('d') - $wldaysnew, date('Y'));
$newitem = date('Y-m-d', $newitem1);
$content .= '<ul class="weblinkspercat">';
foreach ($rows as $row) {
	if (strlen($row->title) > $wllengthoftitle) {
		$row->title = mb_substr($row->title, 0, $wldotaddlenght);
		$row->title .= '…';
	}
	$rdate = $row->cdate;
	$tstNew = $rdate > $newitem;
	if ($tstNew) {
		// Помечаем новую ссылку как "Новая"
		$new = '<span class="new">*</span>';
	} else {
		$new = '';
	}
	$content .= '<li>';
	$link = 'index.php?option=com_weblinks&amp;task=view&amp;Itemid='.$Itemid.'&amp;catid='.$row->catid.'&amp;id='.$row->id;
	$link = sefRelToAbs($link);
	$content .= '<a href="'.$link.'" title="'.$row->title.'" '.$target.' >'.$row->title.'</a>';
	if ($wlshowhits)
		$content .= ' ('.$row->hits.' '._HEADER_HITS.' )';
	if ($wlshownew)
		$content .= $new;
	$content .= '</li>';
}
$content .= '</ul>';
if ($wlreadmore) {
	$catid = '';
	if ($wlcategory > 0) {
		$catid = '&amp;catid='.$wlcategory;
	}
	$link = 'index.php?option=com_weblinks'.$catid;
	$link = sefRelToAbs($link);
	$content .= '<a href="'.$link.'" class="readon">'._MORE.'</a>';
}
?>