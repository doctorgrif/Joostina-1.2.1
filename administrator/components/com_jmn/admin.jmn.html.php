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
// @package Joostina @subpackage Content
class HTML_content {
// Writes a list of the content items @param array An array of content objects
function showContent( &$rows, $section, &$lists, $search, $pageNav, $all=NULL, $redirect ) {
global $my, $acl, $database,$mosConfig_live_site;
mosCommonHTML::loadOverlib(); 
?>
<script type="text/javascript">
function submitbutton(pressbutton) {
if (pressbutton == 'gen_metakey') {
if ( confirm('<?php echo _MG_WARNKWORDS;?>')) { submitform('gen_metakey'); }
} else
if (pressbutton == 'gen_metadesc') {
if ( confirm('<?php echo _MG_WARNDESC;?>')) { submitform('gen_metadesc'); }
} else {
submitform(pressbutton);
}
}
</script>
<form action="index2.php" method="post" name="adminForm">
<table class="adminheading">
<tr>
<th class="edit" colspan="4">
<?php if ( $all ) { ?>
<p><?php echo _MG_MGRMETA;?> [<?php echo _MG_SECT;?>: <?php echo _MG_ALL;?>]</p>
<?php } else { ?>
<p><?php echo _MG_MGRMETA;?> [<?php echo _MG_SECT;?>: <?php echo $section->title; ?>]</p>
<?php } ?>
</th>
</tr>
<tr>
<?php if ( $all ) { ?>
<td><p><?php echo $lists['sectionid'];?></p></td>
<?php } ?>
<td><p><?php echo $lists['catid'];?></p></td>
<td><p><?php echo $lists['authorid'];?></p></td>
<td><p>
<label for="filtr"><?php echo _MG_FILTR;?>:</label><input type="text" name="search" id="filtr" value="<?php echo $search;?>" class="textarea" onChange="document.adminForm.submit();" /></p>
</td>
</tr>
<tr>
<td colspan="4"><p><?php echo _MG_DESCCOMMON;?></p></td>
</tr>
</table>
<table class="adminlist" width="100%">
<tr>
<th width="2%"><p>#</p></th>
<th width="2%">
	<p><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" /></p>
</th>
<th width="11%"><p><?php echo _MG_PREV;?></p></th>
<th width="20%" class="title"><p><?php echo _MG_TITLE;?></p></th>
<th width="5%"><p><?php echo _MG_ID;?></p></th>
<?php if ( $all ) { ?>
<th width="10%"><p><?php echo _MG_SECT;?></p></th>
<?php } ?>
<th width="10%"><p><?php echo _MG_CAT;?></p></th>
<th width="20%"><p><?php echo _MG_KWORDS;?></p></th>
<th width="20%"><p><?php echo _MG_DESC;?></p></th>
</tr>
<?php
$k = 0;
$nullDate = $database->getNullDate();
for ($i=0, $n=count( $rows ); $i < $n; $i++) {
$row = &$rows[$i];
$link = 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $row->id;
$row->sect_link = 'index2.php?option=com_sections&task=editA&hidemainmenu=1&id='. $row->sectionid;
$row->cat_link = 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='. $row->catid;
$now = date( 'Y-m-d H:i:s' );
if ( $now <= $row->publish_up && $row->state == "1" ) {
$img = 'publish_y.png';
$alt = _MG_PUBLISH;
} else if ( ( $now <= $row->publish_down || $row->publish_down == $nullDate ) && $row->state == "1" ) {
$img = 'publish_g.png';
$alt = _MG_PUBLISH;
} else if ( $now > $row->publish_down && $row->state == "1" ) {
$img = 'publish_r.png';
$alt = _MG_EXPIRED;
} else if ( $row->state == "0" ) {
$img = 'publish_x.png';
$alt = _MG_UNPUBLISH;
}
$times = '';
if (isset($row->publish_up)) {
if ($row->publish_up == $nullDate) {
$times .= '<tr><td>'._MG_VIEWPAGE.': '.MG_ALLWAYS.'</td></tr>';
} else {
$times .= '<tr><td>'._MG_VIEWPAGE.': '.$row->publish_up.'</td></tr>';
}
}
if (isset($row->publish_down)) {
if ($row->publish_down == $nullDate) {
$times .= '<tr><td>'._MG_FINISH.': '._MG_NOEXPIRY.'</td></tr>';
} else {
$times .= '<tr><td>'._MG_FINISH.': '.$row->publish_down.'</td></tr>';
}
}
if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
if ( $row->created_by_alias ) {
$author = $row->created_by_alias;
} else {
$linkA = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
$author = '<a href="'. $linkA .'" title="'._MG_USEREDITE.'">'. $row->author .'</a>';
}
} else {
if ( $row->created_by_alias ) {
$author = $row->created_by_alias;
} else {
$author = $row->author;
}
}
$date = mosFormatDate( $row->created, '%x' );
$access = mosCommonHTML::AccessProcessing( $row, $i );
$checked = mosCommonHTML::CheckedOutProcessing( $row, $i );
?>
<tr class="<?php echo $row->k; ?>">
<td width="2%">
	<p><?php echo $pageNav->rowNumber($i); ?></p>
</td>
<td width="2%">
	<p><input type="hidden" name="c_id[]" value="<?php echo $row->id;?>" /><?php echo $checked;?></p>
</td>
<td width="11%">
	<p>
		<a href="#" onclick="window.open('<?php echo $mosConfig_live_site;?>/index2.php?option=com_content&amp;task=view&amp;id=<?php echo $row->id;?>&amp;Itemid=99999&amp;pop=1&amp;page=0','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');" alt='<?php echo _MG_VIEWPAGE;?>'><?php echo _MG_VIEWPAGE;?></a>
	</p>
</td>
<td width="20%">
	<p><?php if ( $row->checked_out && ( $row->checked_out != $my->id ) ) { echo $row->title; } else { ?>
		<a target='' href="<?php echo $link; ?>" title="<?php echo _MG_CONTEDITE;?>"><?php echo htmlspecialchars($row->title, ENT_QUOTES); ?></a>
	</p>
<?php } ?>
</td>
<td width="5%">
	<p><?php echo $row->id; ?></p>
</td>
<?php if ( $all ) { ?>
<td width="10%">
	<p><a href="<?php echo $row->sect_link; ?>" title="<?php echo _MG_SECTEDITE;?>"><?php echo $row->section_name; ?></a></p>
</td>
<?php } ?>
<td width="10%">
	<p><a href="<?php echo $row->cat_link; ?>" title="<?php echo _MG_CATEDITE;?>"><?php echo $row->name; ?></a></p>
</td>
<td width="20%">
	<p><textarea name="metakey[<?php echo $row->id;?>]" cols="25" rows="5"><?php echo $row->metakey; ?></textarea></p>
</td>
<td width="20%">
	<p><textarea name="metadesc[<?php echo $row->id; ?>]" cols="25" rows="5"><?php echo $row->metadesc; ?></textarea></p>
</td>
</tr>
<?php $k = 1 - $k; } ?>
</table>
<?php echo $pageNav->getListFooter(); ?>
<?php mosCommonHTML::ContentLegend(); ?>
<input type="hidden" name="option" value="com_jmn" />
<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="hidemainmenu" value="0" />
<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
</form>
<?php
}
// Writes a list of the content items @param array An array of content objects
function showArchive( &$rows, $section, &$lists, $search, $pageNav, $option, $all=NULL, $redirect ) {
global $my, $acl;
?>
<script type="text/javascript">
function submitbutton(pressbutton) {
if (pressbutton == 'remove') {
if (document.adminForm.boxchecked.value == 0) {
alert('<?php echo _MG_SELTRASH;?>');
} else if ( confirm('<?php echo _MG_WARNTRASH;?>')) {
submitform('remove');
}
} else {
submitform(pressbutton);
}
}
</script>
<form action="index2.php" method="post" name="adminForm">
<table class="adminheading">
<tr>
<th class="edit" rowspan="2">
<?php if ( $all ) { ?>
<p><?php echo _MG_MGRARH;?> <small>[ <?php echo _MG_SECT;?>: <?php echo _MG_ALL;?> ]</small></p>
<?php } else { ?>
<p><?php echo _MG_MGRARH;?> <small>[ <?php echo _MG_SECT;?>: <?php echo $section->title; ?> ]</small></p>
<?php } ?>
</th>
<?php if ( $all ) { ?>
<td rowspan="2" valign="top"><p><?php echo $lists['sectionid'];?></p></td>
<?php } ?>
<td><p><?php echo $lists['catid'];?></p></td>
<td><p><?php echo $lists['authorid'];?></p></td>
</tr>
<tr>
<td><p><?php echo _MG_FILTR;?>:</p></td>
<td><p><input type="text" name="search" value="<?php echo $search;?>" class="textarea" onChange="document.adminForm.submit();" /></p></td>
</tr>
</table>
<table class="adminlist">
<tr>
<th width="5%"><p>#</p></th>
<th width="5%"><p><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" /></p></th>
<th width="30%" class="title"><p><?php echo _MG_TITLE;?></p></th>
<th width="5%"><p><?php echo _MG_ORDER;?></p></th>
<th width="5%"><p><a href="javascript: saveorder( <?php echo count( $rows )-1; ?> )"><img src="images/filesave.png" width="16" height="16" alt="Сохранить порядок" /></a></p></th>
<th width="20%" align="left"><p><?php echo _MG_CAT;?></p></th>
<th width="20%" align="left"><p><?php echo _MG_AUTH;?></p></th>
<th width="10%"><p><?php echo _MG_DATE;?></p></th>
</tr>
<?php
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++) {
$row = &$rows[$i];
$row->cat_link = 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='. $row->catid;
if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
if ( $row->created_by_alias ) {
$author = $row->created_by_alias;
} else {
$linkA = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
$author = '<a href="'. $linkA .'" title="<?php echo _MG_USEREDITE;?>">'. $row->author .'</a>';
}
} else {
if ( $row->created_by_alias ) {
$author = $row->created_by_alias;
} else {
$author = $row->author;
}
}
$date = mosFormatDate( $row->created, '%x' );
?>
<tr class="<?php echo $row->k; ?>">
<td width="5%"><p><?php echo $pageNav->rowNumber( $i ); ?></p></td>
<td width="5%"><p><?php echo mosHTML::idBox( $i, $row->id ); ?></p></td>
<td width="30%"><p><?php echo $row->title; ?></p></td>
<td width="10%" colspan="2"><p><input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="textarea" /></p></td>
<td width="20%"><p><a href="<?php echo $row->cat_link; ?>" title="<?php echo _MG_CATEDITE;?>"><?php echo $row->name; ?></a></p></td>
<td width="20%"><p><?php echo $author; ?></p></td>
<td width="10%"><p><?php echo $date; ?></p></td>
</tr>
<?php $k = 1 - $k; } ?>
</table>
<?php echo $pageNav->getListFooter(); ?>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
<input type="hidden" name="task" value="showarchive" />
<input type="hidden" name="returntask" value="showarchive" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="hidemainmenu" value="0" />
<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
</form>
<?php
}
// Writes the edit form for new and existing content item A new record is defined when <var>$row</var> is passed with the <var>id</var> property set to 0. @param mosContent The category object @param string The html for the groups select list
function editContent( &$row, $section, &$lists, &$sectioncategories, &$images, &$params, $option, $redirect, &$menus ) {
global $mosConfig_live_site;
mosMakeHtmlSafe( $row );
$create_date = null;
if (intval( $row->created ) <> 0) {
$create_date = mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
}
$mod_date = null;
if (intval( $row->modified ) <> 0) {
$mod_date = mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
}
$tabs = new mosTabs(1);
// used to hide "Reset Hits" when hits = 0
if ( !$row->hits ) {
$visibility = "style='display:none; visbility:hidden;'";
} else {
$visibility = "";
}
mosCommonHTML::loadOverlib();
mosCommonHTML::loadCalendar();
?>
<script type="text/javascript">
<!--
var sectioncategories = new Array;
<?php
$i = 0;
foreach ($sectioncategories as $k=>$items) {
foreach ($items as $v) {
echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->name )."' );\n\t\t";
}
}
?>
var folderimages = new Array;
<?php
$i = 0;
foreach ($images as $k=>$items) {
foreach ($items as $v) {
echo "folderimages[".$i++."] = new Array( '$k','".addslashes( $v->value )."','".addslashes( $v->text )."' );\n\t\t";
}
}
?>
function submitbutton(pressbutton) {
var form = document.adminForm;
if ( pressbutton == 'menulink' ) {
if ( form.menuselect.value == "" ) {
alert( "<?php echo _MG_SELMENU;?>" );
return;
} else if ( form.link_name.value == "" ) {
alert( "<?php echo _MG_ENTRMENUNAME;?>" );
return;
}
}
if (pressbutton == 'cancel') {
submitform( pressbutton );
return;
}
// assemble the images back into one field
var temp = new Array;
for (var i=0, n=form.imagelist.options.length; i < n; i++) {
temp[i] = form.imagelist.options[i].value;
}
form.images.value = temp.join( '\n' );
// do field validation
if (form.title.value == ""){
alert( "<?php echo _MG_ITEMMUSTHATETITLE;?>" );
} else if (form.sectionid.value == "-1"){
alert( "<?php echo _MG_MUSTSELSECT;?>" );
} else if (form.catid.value == "-1"){
alert( "<?php echo _MG_MUSTSELCAT;?>" );
} else if (form.catid.value == ""){
alert( "<?php echo _MG_MUSTSELCAT;?>" );
} else {
<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
<?php getEditorContents( 'editor2', 'fulltext' ) ; ?>
submitform( pressbutton );
}
}
//-->
</script>
<form action="index2.php" method="post" name="adminForm">
<table class="adminheading">
<tr>
<th class="edit"><p><?php echo _MG_CONTITEM;?>: <small><?php echo $row->id ? '<?php echo _MG_EDITE;?>': '<?php echo _MG_NEW;?>';?></small></p>
<?php if ( $row->id ) { ?>
<p><small>[ <?php echo _MG_SECT;?>: <?php echo $section?> ]</small></p>
<?php } ?>
</th>
</tr>
</table>
<table width="100%">
<tr>
<td width="60%" valign="top">
<table width="100%" class="adminform">
<tr>
<td width="100%">
<table width="100%">
<tr>
<th colspan="4"><p><?php echo _MG_ITEMDETLS;?></p></th>
<tr>
<tr>
<td><p><?php echo _MG_TITLE;?>:</p></td>
<td><p><input class="textarea" type="text" name="title" size="30" maxlength="100" value="<?php echo $row->title; ?>" /></p></td>
<td><p><?php echo _MG_SECT;?>:</p></td>
<td><p><?php echo $lists['sectionid']; ?></p></td>
</tr>
<tr>
<td><p><?php echo _MG_TITLEALIAS;?>:</p></td>
<td><p><input name="title_alias" type="text" class="textarea" id="title_alias" value="<?php echo $row->title_alias; ?>" size="30" maxlength="100" /></p></td>
<td><p><?php echo _MG_CAT;?>:</p></td>
<td><p><?php echo $lists['catid']; ?></p></td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="100%"><p><?php echo _MG_INTROTXT;?></p>
<p><?php
// parameters: areaname, content, hidden field, width, height, rows, cols
editorArea( 'editor1',$row->introtext , 'introtext', '100%;', '350', '75', '20' ) ; ?></p>
</td>
</tr>
<tr>
<td width="100%"><p><?php echo _MG_MAINTXT;?></p>
<p><?php
// parameters: areaname, content, hidden field, width, height, rows, cols
editorArea( 'editor2',$row->fulltext , 'fulltext', '100%;', '400', '75', '30' ) ; ?></p>
</td>
</tr>
</table>
</td>
<td valign="top" width="40%">
<table>
<tr>
<td>
<p><?php
$tabs->startPane("content-pane");
$tabs->startTab("Publishing","publish-page");
?></p>
<table class="adminform">
<tr>
<th colspan="2"><p><?php echo _MG_PUBLINFO;?></p></th>
<tr>
<tr>
<td valign="top"><p><?php echo _MG_FRONTSHOW;?>:</p></td>
<td><p><input type="checkbox" name="frontpage" value="1" <?php echo $row->frontpage ? 'checked="checked"' : ''; ?> /></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_PUBLISH;?>:</p></td>
<td><p><input type="checkbox" name="published" value="1" <?php echo $row->state ? 'checked="checked"' : ''; ?> /></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_ACCLAYER;?>:</p></td>
<td><p><?php echo $lists['access']; ?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_AUTHALIAS;?>:</p></td>
<td><p><input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="textarea" /></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_CREATBY;?>:</p></td>
<td><p><?php echo $lists['created_by']; ?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_ORDERING;?>:</p></td>
<td><p><?php echo $lists['ordering']; ?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_RECREATBY;?></p></td>
<td>
<p><input class="textarea" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
<input name="reset" type="reset" class="button" onClick="return showCalendar('created', 'y-mm-dd');" value="..."></p>
</td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_PUBLSTART;?>:</p></td>
<td>
<p><input class="textarea" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
<input type="reset" class="button" value="..." onClick="return showCalendar('publish_up', 'y-mm-dd');"></p>
</td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_PUBLFINISH;?>:</p></td>
<td>
<p><input class="textarea" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
<input type="reset" class="button" value="..." onClick="return showCalendar('publish_down', 'y-mm-dd');"></p>
</td>
</tr>
</table>
<table class="adminform">
<?php if ( $row->id ) { ?>
<tr>
<td><p><?php echo _MG_IDITEM;?>:</p></td>
<td><p><?php echo $row->id; ?></p></td>
</tr>
<?php } ?>
<tr>
<td width="90px" valign="top"><p><?php echo _MG_STATE;?>:</p></td>
<td><p><?php echo $row->state > 0 ? '<?php echo _MG_PUBLISH;?>' : ($row->state < 0 ? '<?php echo _MG_ARH;?>' : '<?php echo _MG_DRAFT;?>');?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_HITS;?>:</p></td>
<td>
<p><?php echo $row->hits;?></p>
<div <?php echo $visibility; ?>>
<p><input name="reset_hits" type="button" class="button" value="<?php echo _MG_RESETHITS;?>" onClick="submitbutton('resethits');"></p>
</div>
</td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_REVISED;?>:</p></td>
<td><p><?php echo $row->version;?> <?php echo _MG_TIMES;?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_CREATED;?></p></td>
<td><p><?php echo $row->created ? "$create_date</td></tr><tr><td>$row->creator" : "<?php echo _MG_NEWDOC;?>"; ?></p></td>
</tr>
<tr>
<td valign="top"><p><?php echo _MG_LASTMOD;?></p></td>
<td><p><?php echo $row->modified ? "$mod_date</td></tr><tr><td valign='top' align='right'></td><td>$row->modifier" : "<?php echo _MG_UNMOD;?>";?></p></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Images","images-page");
?>
<table class="adminform" width="100%">
<tr>
<th colspan="2"></th>
</tr>
<tr>
<td colspan="2">
<table width="100%">
<tr>
<td width="48%">
<div>
<p><?php echo _MG_IMGGAL;?>:</p>
<p><?php echo $lists['imagefiles'];?></p>
<p><?php echo _MG_SUBFLDRS;?>: <?php echo $lists['folders'];?></p>
</div>
</td>
<td width="2%">
<p><input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="Add"/><br/>
<input class="button" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="Remove"/></p>
</td>
<td width="48%">
<div><p><?php echo _MG_CONTIMG;?>:</p>
<p><?php echo $lists['imagelist'];?></p>
</p><input class="button" type="button" value="Up" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
<input class="button" type="button" value="Down" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" /></p>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr valign="top">
<td>
<div><p><?php echo _MG_SAMPLEIMG;?>:</p><p><img name="view_imagefiles" src="../images/M_images/blank.png" width="100" /></p></div>
</td>
<td valign="top">
<div><p><?php echo _MG_ACTIVEIMG;?>:</p><p><img name="view_imagelist" src="../images/M_images/blank.png" width="100" /></p></div>
</td>
</tr>
<tr>
<td colspan="2"></p><?php echo _MG_SELIMGEDITE;?>:</p><table>
<tr>
<td><p><?php echo _MG_CODE;?>:</p></td>
<td><p><input class="textarea" type="text" name= "_source" value="" /></p></td>
</tr>
<tr>
<td><p><?php echo _MG_IMGALIGN;?>:</p></td>
<td><p><?php echo $lists['_align']; ?></p></td>
</tr>
<tr>
<td><p><?php echo _MG_ALTTXT;?>:</p></td>
<td><p><input class="textarea" type="text" name="_alt" value="" /></p></td>
</tr>
<tr>
<td><p><?php echo _MG_BORD;?>:</p></td>
<td><p><input class="textarea" type="text" name="_border" value="" size="3" maxlength="1" /></p></td>
</tr>
<tr>
<td><p><?php echo _MG_CAPTION;?>:</p></td>
<td><p><input class="textarea" type="text" name="_caption" value="" size="30" /></p></td>
</tr>
<tr>
<td><p><?php echo _MG_CAPTIONPOS;?>:</p></td>
<td><p><?php echo $lists['_caption_position']; ?></p></td>
</tr>
<tr>
<td><p><?php echo _MG_CAPTIONALIGN;?>:</p></td>
<td><p><?php echo $lists['_caption_align']; ?></p></td>
</tr>
<tr>
<td><p><?php echo _MG_CAPTIONWIDTH;?>:</p></td>
<td><p><input class="textarea" type="text" name="_width" value="" size="5" maxlength="5" /></p></td>
</tr>
<tr>
<td colspan="2"><p><input class="button" type="button" value="РџСЂРёРјРµРЅРёС‚СЊ" onClick="applyImageProps()" /></p></td>
</tr>
</table>
</td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Parameters","params-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><p><?php echo _MG_PARAMCTRL;?></p></th>
<tr>
<tr>
<td><p><?php echo _MG_PARAMDESC;?></p></td>
</tr>
<tr>
<td><p><?php echo $params->render();?></p></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Meta Info","metadata-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><p><?php echo _MG_METEDATE;?></p></th>
<tr>
<tr>
<td><p><?php echo _MG_DESC;?>:</p>
<p><textarea class="textarea" cols="30" rows="3" style="width:300px; height:50px;" name="metadesc" width="500"><?php echo str_replace('&','&amp;',$row->metadesc); ?></textarea></p>
</td>
</tr>
<tr>
<td><p><?php echo _MG_KWORDS;?>:</p>
<p><textarea class="textarea" cols="30" rows="3" style="width:300px; height:50px;" name="metakey" width="500"><?php echo str_replace('&','&amp;',$row->metakey); ?></textarea></p>
</td>
</tr>
<tr>
<td><p><input type="button" class="button" value="Р”РѕР±Р°РІРёС‚СЊ Р Р°Р·РґРµР»/РљР°С‚РµРіРѕСЂРёСЋ/Р—Р°РіРѕР»РѕРІРѕРє" onClick="f=document.adminForm;f.metakey.value=document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].text+', '+getSelectedText('adminForm','catid')+', '+f.title.value+f.metakey.value;" /></p></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Link to Menu","link-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><p><?php echo _MG_LINKTOMENU;?></p></th>
<tr>
<tr>
<td colspan="2"><p><?php echo _MG_MENUINFO;?></p></td>
<tr>
<tr>
<td valign="top" width="90px"><p><?php echo _MG_MENUSEL;?></p></td>
<td><p><?php echo $lists['menuselect']; ?></p></td>
<tr>
<tr>
<td valign="top" width="90px"><p><?php echo _MG_ITEMMENUNAME;?></p></td>
<td><p><input type="text" name="link_name" class="inputbox" value="" size="30" /></p></td>
<tr>
<tr>
<td>
</td>
<td><p><input name="menu_link" type="button" class="button" value="Link to Menu" onClick="submitbutton('menulink');" /></p></td>
<tr>
<tr>
<th colspan="2"><p><?php echo _MG_EXISTLINKMENU;?></p></th>
</tr>
<?php if ( $menus == NULL ) { ?>
<tr>
<td colspan="2"><p><?php echo _MG_NO;?></p></td>
</tr>
<?php } else { mosCommonHTML::menuLinksContent( $menus ); } ?>
<tr>
<td colspan="2"></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->endPane();
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
<input type="hidden" name="mask" value="0" />
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="images" value="" />
<input type="hidden" name="hidemainmenu" value="0" />
</form>
<?php
}
// Form to select Section/Category to move item(s) to @param array An array of selected objects @param int The current section we are looking at @param array The list of sections and categories to move to
function moveSection( $cid, $sectCatList, $option, $sectionid, $items ) {
?>
<script type="text/javascript">
function submitbutton(pressbutton) {
var form = document.adminForm;
if (pressbutton == 'cancel') {
submitform( pressbutton );
return;
}
// do field validation
if (!getSelectedValue( 'adminForm', 'sectcat' )) {
alert( "<?php echo _MG_SELSMSNG;?>" );
} else {
submitform( pressbutton );
}
}
</script>
<form action="index2.php" method="post" name="adminForm">
<table class="adminheading">
<tr>
<th class="edit"><p><?php echo _MG_NO;?> <?php echo _MG_MOVEITEM;?></p></th>
</tr>
</table>
<table class="adminform">
<tr>
<td valign="top" width="40%"><p><?php echo _MG_MOVESECTCAT;?>:</p>
<p><?php echo $sectCatList; ?></p></td>
<td valign="top"><p><?php echo _MG_ITEMMOVED;?>:</p>
<?php
echo '<ol>';
foreach ( $items as $item ) {
echo '<li>'. $item->title .'</li>';
}
echo '</ol>';
?>
</td>
</tr>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
<input type="hidden" name="task" value="" />
<?php
foreach ($cid as $id) {
echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
}
?>
</form>
<?php
}
// Form to select Section/Category to copys item(s) to
function copySection( $option, $cid, $sectCatList, $sectionid, $items) {
?>
<script type="text/javascript">
function submitbutton(pressbutton) {
var form = document.adminForm;
if (pressbutton == 'cancel') {
submitform( pressbutton );
return;
}
// do field validation
if (!getSelectedValue( 'adminForm', 'sectcat' )) {
alert( "<?php echo _MG_SELSECTCATTOCOPY;?>" );
} else {
submitform( pressbutton );
}
}
</script>
<form action="index2.php" method="post" name="adminForm">
<table class="adminheading">
<tr><th class="edit"><p><?php echo _MG_COPYITEM;?></p></th></tr>
</table>
<table class="adminform">
<tr>
<td valign="top" width="40%"><p><?php echo _MG_COPYSECTCAT;?>:</p>
<p><?php echo $sectCatList; ?></p></td>
<td valign="top"><p><?php echo _MG_ITEMMCOPY;?>:</p>
<?php
echo '<ol>';
foreach ( $items as $item ) {
echo '<li>'. $item->title .'</li>';
}
echo '</ol>';
?>
</td>
</tr>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
<input type="hidden" name="task" value="" />
<?php
foreach ($cid as $id) {
echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
}
?>
</form>
<?php
}
}
?>