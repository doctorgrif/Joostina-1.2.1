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
<th class="edit">
<?php if ( $all ) { ?>
<?php echo _MG_MGRMETA;?><br /><small>[<?php echo _MG_SECT;?>: <?php echo _MG_ALL;?>]</small>
<?php } else { ?>
<?php echo _MG_MGRMETA;?><br /><small>[<?php echo _MG_SECT;?>: <?php echo $section->title; ?>]</small>
<?php } ?>
</th>
<?php if ( $all ) { ?>
<td valign="top"><?php echo $lists['sectionid'];?></td>
<?php } ?>
<td valign="top"><?php echo $lists['catid'];?></td>
<td valign="top"><?php echo $lists['authorid'];?></td>
<td valign="top">
<label for="filtr"><?php echo _MG_FILTR;?>:</label><input type="text" name="search" id="filtr" value="<?php echo $search;?>" class="textarea" onChange="document.adminForm.submit();" />
</td>
</tr>
</table>
<table width="100%">
<tr>
<td align="left"><font><?php echo _MG_DESCCOMMON;?></font></td></tr>
</table>
<table class="adminlist" width="100%">
<tr>
<th width="10px">#</th>
<th width="10px">
<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th width="10%"><?php echo _MG_PREV;?></th>
<th width="10%" class="title"><?php echo _MG_TITLE;?></th>
<th width="10px"><?php echo _MG_ID;?></th>
<?php if ( $all ) { ?>
<th width="10%" align="left"><?php echo _MG_SECT;?></th>
<?php } ?>
<th width="10%" align="left"><?php echo _MG_CAT;?></th>
<th width="25%" align="left"><?php echo _MG_KWORDS;?></th>
<th width="25%" align="center"><?php echo _MG_DESC;?></th>
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
$access = mosCommonHTML::AccessProcessing( $row, $i );
$checked = mosCommonHTML::CheckedOutProcessing( $row, $i );
?>
<tr class="<?php echo "row$k"; ?>">
<td><?php echo $pageNav->rowNumber( $i ); ?></td>
<td align="center">
<input type="hidden" name="c_id[]" value='<?=$row->id?>'/><?php echo $checked ?>
</td>
<td >
<a href="#" onclick="window.open('<?php echo $mosConfig_live_site;?>/index2.php?option=com_content&amp;task=view&amp;id=<?php echo $row->id;?>&amp;Itemid=99999&amp;pop=1&amp;page=0','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');" alt='<?php echo _MG_VIEWPAGE;?>'><?php echo _MG_VIEWPAGE;?></a>
</td>
<td>
<?php if ( $row->checked_out && ( $row->checked_out != $my->id ) ) { echo $row->title; } else { ?>
<a target='' href="<?php echo $link; ?>" title="<?php echo _MG_CONTEDITE;?>"><?php echo htmlspecialchars($row->title, ENT_QUOTES); ?></a>
<?php } ?>
</td>
<td align="left"><?php echo $row->id; ?></td>
<?php if ( $all ) { ?>
<td align="left">
<a href="<?php echo $row->sect_link; ?>" title="<?php echo _MG_SECTEDITE;?>"><?php echo $row->section_name; ?></a>
</td>
<?php } ?>
<td align="left">
<a href="<?php echo $row->cat_link; ?>" title="<?php echo _MG_CATEDITE;?>"><?php echo $row->name; ?></a>
</td>
<td align="left">
<textarea name="metakey[<?=$row->id;?>]" cols="40" rows="5"><?php echo $row->metakey; ?></textarea>
</td>
<td align="left">
<textarea name="metadesc[<?=$row->id?>]" cols="40" rows="5"><?php echo $row->metadesc; ?></textarea>
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
<?php echo _MG_MGRARH;?> <small>[ <?php echo _MG_SECT;?>: <?php echo _MG_ALL;?> ]</small>
<?php } else { ?>
<?php echo _MG_MGRARH;?> <small>[ <?php echo _MG_SECT;?>: <?php echo $section->title; ?> ]</small>
<?php } ?>
</th>
<?php if ( $all ) { ?>
<td width="right" rowspan="2" valign="top"><?php echo $lists['sectionid'];?></td>
<?php } ?>
<td width="right"><?php echo $lists['catid'];?></td>
<td width="right"><?php echo $lists['authorid'];?></td>
</tr>
<tr>
<td align="right"><?php echo _MG_FILTR;?>:</td>
<td><input type="text" name="search" value="<?php echo $search;?>" class="textarea" onChange="document.adminForm.submit();" /></td>
</tr>
</table>
<table class="adminlist">
<tr>
<th width="5">#</th>
<th width="20"><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" /></th>
<th class="title"><?php echo _MG_TITLE;?></th>
<th width="2%"><?php echo _MG_ORDER;?></th>
<th width="1%"><a href="javascript: saveorder( <?php echo count( $rows )-1; ?> )"><img src="images/filesave.png" width="16" height="16" alt="Сохранить порядок" /></a></th>
<th width="15%" align="left"><?php echo _MG_CAT;?></th>
<th width="15%" align="left"><?php echo _MG_AUTH;?></th>
<th align="center" width="10"><?php echo _MG_DATE;?></th>
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
<tr class="<?php echo "row$k"; ?>">
<td><?php echo $pageNav->rowNumber( $i ); ?></td>
<td width="20"><?php echo mosHTML::idBox( $i, $row->id ); ?></td>
<td><?php echo $row->title; ?></td>
<td align="center" colspan="2"><input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="textarea" style="text-align: center;" /></td>
<td><a href="<?php echo $row->cat_link; ?>" title="<?php echo _MG_CATEDITE;?>"><?php echo $row->name; ?></a></td>
<td><?php echo $author; ?></td>
<td><?php echo $date; ?></td>
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
<th class="edit"><?php echo _MG_CONTITEM;?> : <small><?php echo $row->id ? '<?php echo _MG_EDITE;?>' : '<?php echo _MG_NEW;?>';?></small>
<?php if ( $row->id ) { ?>
<small>[ <?php echo _MG_SECT;?> : <?php echo $section?> ]</small>
<?php } ?>
</th>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td width="60%" valign="top">
<table width="100%" class="adminform">
<tr>
<td width="100%">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<th colspan="4"><?php echo _MG_ITEMDETLS;?></th>
<tr>
<tr>
<td><?php echo _MG_TITLE;?>:</td>
<td><input class="textarea" type="text" name="title" size="30" maxlength="100" value="<?php echo $row->title; ?>" /></td>
<td><?php echo _MG_SECT;?>:</td>
<td><?php echo $lists['sectionid']; ?></td>
</tr>
<tr>
<td><?php echo _MG_TITLEALIAS;?>:</td>
<td><input name="title_alias" type="text" class="textarea" id="title_alias" value="<?php echo $row->title_alias; ?>" size="30" maxlength="100" /></td>
<td><?php echo _MG_CAT;?>:</td>
<td><?php echo $lists['catid']; ?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="100%"><?php echo _MG_INTROTXT;?><br />
<?php
// parameters: areaname, content, hidden field, width, height, rows, cols
editorArea( 'editor1',$row->introtext , 'introtext', '100%;', '350', '75', '20' ) ; ?>
</td>
</tr>
<tr>
<td width="100%"><?php echo _MG_MAINTXT;?><br />
<?php
// parameters: areaname, content, hidden field, width, height, rows, cols
editorArea( 'editor2',$row->fulltext , 'fulltext', '100%;', '400', '75', '30' ) ; ?>
</td>
</tr>
</table>
</td>
<td valign="top" width="40%">
<table>
<tr>
<td>
<?php
$tabs->startPane("content-pane");
$tabs->startTab("Publishing","publish-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><?php echo _MG_PUBLINFO;?></th>
<tr>
<tr>
<td valign="top" align="right"><?php echo _MG_FRONTSHOW;?>:</td>
<td><input type="checkbox" name="frontpage" value="1" <?php echo $row->frontpage ? 'checked="checked"' : ''; ?> /></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_PUBLISH;?>:</td>
<td><input type="checkbox" name="published" value="1" <?php echo $row->state ? 'checked="checked"' : ''; ?> /></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_ACCLAYER;?>:</td>
<td><?php echo $lists['access']; ?></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_AUTHALIAS;?>:</td>
<td><input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="textarea" /></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_CREATBY;?>:</td>
<td><?php echo $lists['created_by']; ?></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_ORDERING;?>:</td>
<td><?php echo $lists['ordering']; ?></td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_RECREATBY;?></td>
<td>
<input class="textarea" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
<input name="reset" type="reset" class="button" onClick="return showCalendar('created', 'y-mm-dd');" value="...">
</td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_PUBLSTART;?>:</td>
<td>
<input class="textarea" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
<input type="reset" class="button" value="..." onClick="return showCalendar('publish_up', 'y-mm-dd');">
</td>
</tr>
<tr>
<td valign="top" align="right"><?php echo _MG_PUBLFINISH;?>:</td>
<td>
<input class="textarea" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
<input type="reset" class="button" value="..." onClick="return showCalendar('publish_down', 'y-mm-dd');">
</td>
</tr>
</table>
<br />
<table class="adminform">
<?php if ( $row->id ) { ?>
<tr>
<td><strong><?php echo _MG_IDITEM;?>:</strong></td>
<td><?php echo $row->id; ?></td>
</tr>
<?php } ?>
<tr>
<td width="90px" valign="top" align="right"><strong><?php echo _MG_STATE;?>:</strong></td>
<td><?php echo $row->state > 0 ? '<?php echo _MG_PUBLISH;?>' : ($row->state < 0 ? '<?php echo _MG_ARH;?>' : '<?php echo _MG_DRAFT;?>');?></td>
</tr>
<tr>
<td valign="top" align="right"><strong><?php echo _MG_HITS;?></strong>:</td>
<td>
<?php echo $row->hits;?>
<div <?php echo $visibility; ?>><input name="reset_hits" type="button" class="button" value="<?php echo _MG_RESETHITS;?>" onClick="submitbutton('resethits');"></div>
</td>
</tr>
<tr>
<td valign="top" align="right"><strong><?php echo _MG_REVISED;?></strong>:</td>
<td><?php echo $row->version;?> <?php echo _MG_TIMES;?></td>
</tr>
<tr>
<td valign="top" align="right"><strong><?php echo _MG_CREATED;?></strong></td>
<td><?php echo $row->created ? "$create_date</td></tr><tr><td>$row->creator" : "<?php echo _MG_NEWDOC;?>"; ?></td>
</tr>
<tr>
<td valign="top" align="right"><strong><?php echo _MG_LASTMOD;?></strong></td>
<td><?php echo $row->modified ? "$mod_date</td></tr><tr><td valign='top' align='right'></td><td>$row->modifier" : "<?php echo _MG_UNMOD;?>";?></td>
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
<div align="center">
<?php echo _MG_IMGGAL;?>:<br />
<?php echo $lists['imagefiles'];?><br />
<?php echo _MG_SUBFLDRS;?>: <?php echo $lists['folders'];?>
</div>
</td>
<td width="2%">
<input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="Add"/><br/>
<input class="button" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="Remove"/>
</td>
<td width="48%">
<div align="center"><?php echo _MG_CONTIMG;?>:<br />
<?php echo $lists['imagelist'];?><br />
<input class="button" type="button" value="Up" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
<input class="button" type="button" value="Down" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" />
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr valign="top">
<td>
<div align="center"><?php echo _MG_SAMPLEIMG;?>:<br/><img name="view_imagefiles" src="../images/M_images/blank.png" width="100" /></div>
</td>
<td valign="top">
<div align="center"><?php echo _MG_ACTIVEIMG;?>:<br/><img name="view_imagelist" src="../images/M_images/blank.png" width="100" /></div>
</td>
</tr>
<tr>
<td colspan="2"><?php echo _MG_SELIMGEDITE;?>:<table>
<tr>
<td align="right"><?php echo _MG_CODE;?>:</td>
<td><input class="textarea" type="text" name= "_source" value="" /></td>
</tr>
<tr>
<td align="right"><?php echo _MG_IMGALIGN;?>:</td>
<td><?php echo $lists['_align']; ?></td>
</tr>
<tr>
<td align="right"><?php echo _MG_ALTTXT;?>:</td>
<td><input class="textarea" type="text" name="_alt" value="" /></td>
</tr>
<tr>
<td align="right"><?php echo _MG_BORD;?>:</td>
<td><input class="textarea" type="text" name="_border" value="" size="3" maxlength="1" /></td>
</tr>
<tr>
<td align="right"><?php echo _MG_CAPTION;?>:</td>
<td><input class="textarea" type="text" name="_caption" value="" size="30" /></td>
</tr>
<tr>
<td align="right"><?php echo _MG_CAPTIONPOS;?>:</td>
<td><?php echo $lists['_caption_position']; ?></td>
</tr>
<tr>
<td align="right"><?php echo _MG_CAPTIONALIGN;?>:</td>
<td><?php echo $lists['_caption_align']; ?></td>
</tr>
<tr>
<td align="right"><?php echo _MG_CAPTIONWIDTH;?>:</td>
<td><input class="textarea" type="text" name="_width" value="" size="5" maxlength="5" /></td>
</tr>
<tr>
<td colspan="2"><input class="button" type="button" value="РџСЂРёРјРµРЅРёС‚СЊ" onClick="applyImageProps()" /></td>
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
<th colspan="2"><?php echo _MG_PARAMCTRL;?></th>
<tr>
<tr>
<td><?php echo _MG_PARAMDESC;?><br /></td>
</tr>
<tr>
<td><?php echo $params->render();?></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Meta Info","metadata-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><?php echo _MG_METEDATE;?></th>
<tr>
<tr>
<td><?php echo _MG_DESC;?>:<br />
<textarea class="textarea" cols="30" rows="3" style="width:300px; height:50px;" name="metadesc" width="500"><?php echo str_replace('&','&amp;',$row->metadesc); ?></textarea>
</td>
</tr>
<tr>
<td><?php echo _MG_KWORDS;?>:<br />
<textarea class="textarea" cols="30" rows="3" style="width:300px; height:50px;" name="metakey" width="500"><?php echo str_replace('&','&amp;',$row->metakey); ?></textarea>
</td>
</tr>
<tr>
<td><input type="button" class="button" value="Р”РѕР±Р°РІРёС‚СЊ Р Р°Р·РґРµР»/РљР°С‚РµРіРѕСЂРёСЋ/Р—Р°РіРѕР»РѕРІРѕРє" onClick="f=document.adminForm;f.metakey.value=document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].text+', '+getSelectedText('adminForm','catid')+', '+f.title.value+f.metakey.value;" /></td>
</tr>
</table>
<?php
$tabs->endTab();
$tabs->startTab("Link to Menu","link-page");
?>
<table class="adminform">
<tr>
<th colspan="2"><?php echo _MG_LINKTOMENU;?></th>
<tr>
<tr>
<td colspan="2"><?php echo _MG_MENUINFO;?></td>
<tr>
<tr>
<td valign="top" width="90px"><?php echo _MG_MENUSEL;?></td>
<td><?php echo $lists['menuselect']; ?></td>
<tr>
<tr>
<td valign="top" width="90px"><?php echo _MG_ITEMMENUNAME;?></td>
<td><input type="text" name="link_name" class="inputbox" value="" size="30" /></td>
<tr>
<tr>
<td>
</td>
<td><input name="menu_link" type="button" class="button" value="Link to Menu" onClick="submitbutton('menulink');" /></td>
<tr>
<tr>
<th colspan="2"><?php echo _MG_EXISTLINKMENU;?></th>
</tr>
<?php if ( $menus == NULL ) { ?>
<tr>
<td colspan="2"><?php echo _MG_NO;?></td>
</tr>
<?php } else { mosCommonHTML::menuLinksContent( $menus ); } ?>
<tr>
<td colspan="2">
</td>
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
<br />
<table class="adminheading">
<tr>
<th class="edit"><?php echo _MG_NO;?><?php echo _MG_MOVEITEM;?></th>
</tr>
</table>
<br />
<table class="adminform">
<tr>
<td align="left" valign="top" width="40%"><strong><?php echo _MG_MOVESECTCAT;?>:</strong><br />
<?php echo $sectCatList; ?><br /></td>
<td align="left" valign="top"><strong><?php echo _MG_ITEMMOVED;?>:</strong><br />
<?php
echo "<ol>";
foreach ( $items as $item ) {
echo "<li>". $item->title ."</li>";
}
echo "</ol>";
?>
</td>
</tr>
</table>
<br /><br />
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
<form action="index2.php" method="post" name="adminForm"><br />
<table class="adminheading">
<tr><th class="edit"><?php echo _MG_COPYITEM;?></th></tr>
</table><br />
<table class="adminform">
<tr>
<td align="left" valign="top" width="40%"><strong><?php echo _MG_COPYSECTCAT;?>:</strong><br />
<?php echo $sectCatList; ?><br /><br /></td>
<td align="left" valign="top"><strong><?php echo _MG_ITEMMCOPY;?>:</strong><br />
<?php
echo "<ol>";
foreach ( $items as $item ) {
echo "<li>". $item->title ."</li>";
}
echo "</ol>";
?>
</td>
</tr>
</table>
<br /><br />
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