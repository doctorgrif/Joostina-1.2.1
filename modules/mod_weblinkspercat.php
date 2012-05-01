<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
//session_start();
defined('_VALID_MOS') or die();
global $mainframe, $params, $database, $Itemid, $target, $new, $moduleclass_sfx, $content;
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
	$moduleclass_sfx = $params->get('moduleclass_sfx', '');
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
$content .= '<ul class="weblinkspercat'.$moduleclass_sfx.'">';
foreach ($rows as $row) {
	if (strlen($row->title) > $wllengthoftitle) {
		$row->title = mb_substr($row->title, 0, $wldotaddlenght);
		$row->title .= '�';
	}
	$rdate = $row->cdate;
	$tstNew = $rdate > $newitem;
	if ($tstNew) {
		// �������� ����� ������ ��� "�����"
		$new = '<span class="new">*</span>';
	} else {
		$new = '';
	}
	$content .= '<li>';
	$content .= '<a href="'.sefRelToAbs('index.php?option=com_weblinks&amp;task=view&amp;Itemid='.$Itemid.'&amp;catid='.$row->catid.'&amp;id='.$row->id).'" title="'.$row->title.'" '.$target.' >'.$row->title.'</a>';
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
	$content .= '<a href="index.php?option=com_weblinks'.$catid.'" class="readon">'._MORE.'</a>';
}
?>