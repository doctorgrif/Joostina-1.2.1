<?
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die();
function save_manager($_POST,$_GET)
{ global $database,$option2,$cid;
$metakey=$_POST[metakey];
$metadesc=$_POST[metadesc];
foreach($cid as $key=>$id)
{
$query = "UPDATE #__content"
. " SET metakey = '".addslashes(stripslashes($metakey[$id]))."', metadesc='".addslashes(stripslashes($metadesc[$id]))."'"
. " WHERE id = ".$id." " ;
}
$database->setQuery( $query );
if (!$database->query()) {
echo $database->getErrorMsg();
exit();
}
}
echo "<h2>"._MG_SELITEMCNG."</h2>";
return true;
function meta_gen($_POST,$_GET,$type)
{ global $mosConfig_absolute_path,$database,$option2,$cid;
$_POST=array_merge($_GET,$_POST);
$config=$mosConfig_absolute_path."/administrator/components/com_jmn/jmn_config.php";
$words=$mosConfig_absolute_path."/components/com_jmn/words.txt";
include $config;
$where=" WHERE 1=1 ";
if(sizeof($cid)==0)
{
echo "<h2>"._MG_NOTSELITEMFORMETA."</h2>";
return;
}
$compare="";
$fp=fopen($words,'r');
while(!feof($fp))
$compare.=fread($fp,1024);
fclose($fp);
$compare=str_replace("\t"," ",strtolower($compare));
$compare=explode("\r\n",$compare);
// get the subset (based on limits) of required records
{
if($type=="metakey")
if($_POST[kreplace]!=1)
$where.=" AND C.metakey=''";
if($type=="metadesc")
if($_POST[dreplace]!=1)
$where.=" AND C.metadesc=''";
$where.=" AND ( ";
foreach($cid as $key=>$value)
$where.="C.id='$value' OR ";
$where.=" C.id=-1) ";
$query = "SELECT C.id,C.title,C.introtext,C.fulltext"
. "\n FROM #__content as C"
. $where ;
$database->setQuery( $query );
$rows = $database->loadObjectList();
}
for($i=0;$i<sizeof($rows);$i++)
{
if(empty($rows[$i]->fulltext))
$content=$rows[$i]->introtext;
else
$content=$rows[$i]->fulltext;
$keywords=gen_keyword($content,$_POST,$chars,$compare);
if($_POST['gdesc']=='full')
{
if(!empty($rows[$i]->fulltext))
$desc_content=substr($rows[$i]->fulltext,0,$_POST['gdesc_len']);
elseif($_POST['gdesc_opt'])
$desc_content=substr($rows[$i]->introtext,0,$_POST['gdesc_len']);
} else {
if(!empty($rows[$i]->introtext))
$desc_content=substr($rows[$i]->introtext,0,$_POST['gdesc_len']);
elseif($_POST['gdesc_opt'])
$desc_content=substr($rows[$i]->fulltext,0,$_POST['gdesc_len']);
}
if($type=="metakey")
{
$update="metakey = \"" . $keywords."\"";
$msg="<br /><?php echo _MG_KWCHNGTITLE;?> <b>".$rows[$i]->title."</b >";;
}
if($type=="metadesc")
{
for($s=0;$s<sizeof($exclude_key);$s++)
{
$desc_content=str_replace($exclude_key[$s]," ",$desc_content);
}
$desc_content=str_replace("\r\n"," ",$desc_content);
$desc_content=str_replace("\n"," ",$desc_content);
$desc_content=str_replace(""," ",$desc_content);
$update="metadesc=\"".addslashes(stripslashes(strip_tags($desc_content)))."\"";
$msg="<br /><?php echo _MG_DESCCHNGTITLE;?> <b>".$rows[$i]->title."</b >";
}
{
$query = "UPDATE #__content"
. "\n SET ".$update
. "\n WHERE id ='".$rows[$i]->id."'";
}
$database->setQuery( $query );
if (!$database->query()) {
echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
exit();
}
}
if($type=="metakey")
$msg = "<?php echo _MG_KWITEMGEN;?>";
elseif($type=="metadesc")
$msg = "<?php echo _MG_DESCITEMGEN;?>";
echo "<h2>".$msg."</h2>";
return true;
}
function gen_keyword($content,$_POST,$chars,$compare)
{ global $mosConfig_absolute_path;
if($_POST['nsep']=='br')
$nsep="\n";
else
$nsep=$_POST['nsep'];
$content.="\r\n";
$content=strip_tags(stripslashes(strtolower($content)));
$content=str_replace(array("&nbsp;"),array(" "),$content);
$content=str_replace(array("\n","-"),array(" "," "),$content);
for($s=0;$s<sizeof($chars);$s++)
{
$content=str_replace($chars[$s]," ",$content);
}
$content=html_entity_decode($content);
$contents=explode(" " ,$content);
$results=array('','');
$i=0;
foreach($contents as $key=>$value)
{
$value=trim($value,"\x00..\x1F");
$value=str_replace(array("\r"),array(""),$value);
$value=str_replace(array("\n"),array(""),$value);
if(!in_array($value,$compare))
if(strlen($value)>1)
if(!in_array(array(trim($value),strlen(trim($value))),$results))
{
$results[$i][0]=$value;
$results[$i][1]=strlen($value);
$i++;
}
}
foreach($results as $res)
$sortAux[] = $res['1'];
if($_POST[nsort]=='SORT_DESC')
$tp=SORT_DESC;
elseif($_POST[nsort]=='SORT_ASC')
$tp=SORT_ASC;
array_multisort($sortAux, $tp, $results);
$result="";
for($j=0;$j<=$i;$j++)
{
if($j>($_POST[nlist]-1))
break;
if($results[$j][0]!="")
$result.=$results[$j][0].$nsep." ";
}
return $result;
}
function config($_POST,$_GET)
{
global $mosConfig_absolute_path;
$config=$mosConfig_absolute_path."/administrator/components/com_jmn/jmn_config.php";
@chmod($config,0777);
if($_POST['action']=='save_config')
{
$fp=@fopen($config,"w");
if($fp)
{
$_POST[chars]=str_replace(array("'"),array(""),stripslashes($_POST[chars]));
$_POST[chars]=str_replace(array("\r\n"),array("','"),"'".$_POST[chars]."'");
$POST[exclude_key]=str_replace(array("'"),array(""),stripslashes($_POST[exclude_key]));
$_POST[exclude_key]=str_replace(array("\r\n"),array("','"),"'".$_POST[exclude_key]."'");
fwrite($fp,'<?'."\n");
fwrite($fp,'$_POST[nlist]="'.$_POST[nlist].'";'."\n");
fwrite($fp,'$_POST[nsep]="'.$_POST[nsep].'";'."\n");
fwrite($fp,'$_POST[nsort]="'.$_POST[nsort].'";'."\n");
fwrite($fp,'$_POST[kreplace]="'.$_POST[kreplace].'";'."\n");
fwrite($fp,'$_POST[dreplace]="'.$_POST[dreplace].'";'."\n");
fwrite($fp,'$chars=array('.$_POST[chars].');'."\n");
fwrite($fp,'$exclude_key=array('.$_POST[exclude_key].');'."\n");
fwrite($fp,'$_POST[gdesc]="'.$_POST[gdesc].'";'."\n");
fwrite($fp,'$_POST[gdesc_opt]="'.$_POST[gdesc_opt].'";'."\n");
fwrite($fp,'$_POST[gdesc_len]="'.$_POST[gdesc_len].'";'."\n");
fwrite($fp,'?'.'>'."\n");
fclose($fp);
echo "<h3>"._MG_SETMTGSAVE."</h3>";
} else {
echo "<h3 style='color:red;'>"._MG_ACSINFOCONF."</h3>";
}
}
include $config;
?>
<form name="adminForm" method="POST" action="">
<table width="100%"><tr><td>
<table align="center" bgcolor="#eee" width="100%" cellspacing="10">
<tr>
<td><b style="color:#eee;"><font size="2" color="red"><?php echo _MG_KWGEN;?></font></strong></td>
</tr>
<tr><td><strong style="color:#000;"><?php echo _MG_TOGEN;?>:</strong></td>
<td><select name="nlist">
<?
if($_POST['nlist'])
echo "<option value='$_POST[nlist]'>".$_POST[nlist] ._MG_W."</option>";
?>
<option value="5"><?php echo _MG_5W;?></option>
<option value="10"><?php echo _MG_10W;?></option>
<option value="25"><?php echo _MG_25W;?></option>
<option value="50"><?php echo _MG_50W;?></option>
<option value="100"><?php echo _MG_100W;?></option>
<option value="200"><?php echo _MG_200W;?></option>
<option value="500"><?php echo _MG_500W;?></option>
<option value="1000000"><?php echo _MG_UNLIM;?></option>
</select></td>
<td><?php echo _MG_COUNTKWVIEW;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_SEP;?>:</strong></td>
<td><select name="nsep">
<option value="," <? if($_POST['nsep']==',') echo "selected";?> ><?php echo _MG_COMMA;?></option>
<option value=" " <? if($_POST['nsep']==' ') echo "selected";?> ><?php echo _MG_SPACE;?></option>
</select></td>
<td><?php echo _MG_SEPKW;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_ORDER;?>:</strong></td>
<td><select name="nsort">
<option value="SORT_DESC" <? if($_POST['nsort']=='SORT_DESC') echo "selected";?> ><?php echo _MG_SORTDESC;?></option>
<option value="SORT_ASC" <? if($_POST['nsort']=='SORT_ASC') echo "selected";?> ><?php echo _MG_SORTASC;?></option>
</select></td>
<td><?php echo _MG_CHGSORTKW;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_REWRKW;?>:</strong></td>
<td><input type="checkbox" name="kreplace" value="1" <? if($_POST['kreplace']) echo "checked";?>></td>
<td><?php echo _MG_CHEKREWRKW;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_REWRDESC;?>:</strong></td>
<td><input type="checkbox" name="dreplace" value="1" <? if($_POST['dreplace']) echo "checked";?>></td>
<td><?php echo _MG_CHEKREWRDESC;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_IGNORESIMB;?>:</strong></td>
<td><textarea cols="40" rows="10" name="chars" ><?foreach($chars as $value) echo $value."\r\n";?></textarea></td>
<td><?php echo _MG_ENTERIGNORESIMB;?></td>
</tr>
<tr>
<td><strong style="color:#eee;"><font size="2" color="red"><?php echo _MG_DESCGEN;?></font></strong>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_GETDESCFROM;?>:</strong></td>
<td><select name='gdesc'>
<option value="intro" <? if($_POST['gdesc']=='intro') echo "selected";?> ><?php echo _MG_INTROTXT;?></option>
<option value="full" <? if($_POST['gdesc']=='full') echo "selected";?> ><?php echo _MG_MAINTXT;?></option>
</select></td>
<td><?php echo _MG_CHEKREWRDESCINFO;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_GETFITXT;?>:</strong></td>
<td><input type="checkbox" name="gdesc_opt" value="1" <? if($_POST['gdesc_opt']) echo "checked";?> ></td>
<td><?php echo _MG_GETFITXTINFO;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_DESCLEN;?>:</strong></td>
<td><input type="text" name="gdesc_len" value="<?=$_POST['gdesc_len']?>"></td>
<td><?php echo _MG_DESCLENINFO;?></td>
</tr>
<tr>
<td><strong style="color:#000;"><?php echo _MG_EXKWDESC;?>:</strong></td>
<td><textarea cols="40" rows="10" name="exclude_key" ><?foreach($exclude_key as $value) echo $value."\r\n";?></textarea></td>
<td><?php echo _MG_EXKWDESCINFO;?></td>
</tr>
</table>
</td>
</tr>
</table>
<input type="hidden" name="action" value="save_config">
<input type="hidden" name="task" value="save_config">
<input type="hidden" name="option" value="com_jmn">
</form>
<?
return true;
}
function settings($_POST,$_GET)
{
global $mosConfig_absolute_path;
$conf=$mosConfig_absolute_path."/components/com_jmn/words.txt";
$config="";
if($_POST[action]=='save_settings')
{
$fp=@fopen($conf,"w");
if($fp)
{
fwrite($fp,stripslashes($_POST['config_text']));
fclose($fp);
echo "<h3>"._MG_WEXSAVE."</h3>";
} else {
echo "<h3 style='color:red;'>"._MG_ACSINFOCONF."</h3>";
}
}
$fp=@fopen($conf,"r");
if($fp)
{
while(!feof($fp))
$config.=fread($fp,1024);
fclose($fp);
} else {
echo "<h2>"._MG_READINFOCONF."</h2>";
} ?>
<form action="" method="POST" name="adminForm">
<table bgcolor="#eee" align="center">
<tr><td><center><h3><?php echo _MG_WEXLISTINFO;?></strong><h3></td></tr>
<tr bgcolor="#bbbbbb"><td><b><?php echo _MG_FILEEDITE;?>: <?=$conf?></strong><br /></td></tr>
<tr>
<td align="center">
<table>
<tr><td><textarea name="config_text" cols="50" rows="15"><?=$config?></textarea></td></tr>
</table>
</td>
</tr>
<tr><td align="center"><input type="hidden" name="action" value="save_settings"></td></tr>
</table>
<input type="hidden" name="task" value="settings">
<input type="hidden" name="option" value="com_jmn">
</form>
<?
return true;
}
// Compiles a list of installed or defined modules @param database A database connector object
function viewContent( $sectionid, $option ) {
global $database, $mainframe, $mosConfig_list_limit;
$catid = $mainframe->getUserStateFromRequest( "catid{$option}{$sectionid}", 'catid', 0 );
$filter_authorid = $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 );
$filter_sectionid = $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 );
$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
$limitstart = $mainframe->getUserStateFromRequest( "view{$option}{$sectionid}limitstart", 'limitstart', 0 );
$search = $mainframe->getUserStateFromRequest( "search{$option}{$sectionid}", 'search', '' );
$search = $database->getEscaped( trim( strtolower( $search ) ) );
$redirect = $sectionid;
$filter = ''; //getting a undefined variable error
if ( $sectionid == 0 ) {
// used to show All content items
$where = array(
"c.state >= 0",
"c.catid = cc.id",
"cc.section = s.id",
"s.scope= 'content'", );
$order = "\n ORDER BY s.title, c.catid, cc.ordering, cc.title, c.ordering";
$all = 1;
if ($filter_sectionid > 0) {
$filter = "\n WHERE cc.section = $filter_sectionid";
}
$section->title = '<?php echo _MG_ALLCONTITEM;?>';
$section->id = 0;
} else {
$where = array(
"c.state >= 0",
"c.catid = cc.id",
"cc.section = s.id",
"s.scope = 'content'",
"c.sectionid = '$sectionid'" );
$order = "\n ORDER BY cc.ordering, cc.title, c.ordering";
$all = NULL;
$filter = "\n WHERE cc.section = '$sectionid'";
$section = new mosSection( $database );
$section->load( $sectionid );
}
// used by filter
if ( $filter_sectionid > 0 ) {
$where[] = "c.sectionid = $filter_sectionid";
}
if ( $catid > 0 ) {
$where[] = "c.catid = $catid";
}
if ( $filter_authorid > 0 ) {
$where[] = "c.created_by = $filter_authorid";
}
if ( $search ) {
$where[] = "LOWER( c.title ) LIKE '%$search%'";
}
// get the total number of records
$query = "SELECT COUNT(*)"
. "\n FROM #__content AS c, #__categories AS cc, #__sections AS s"
. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" ) ;
$database->setQuery( $query );
$total = $database->loadResult();
require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
$pageNav = new mosPageNav( $total, $limitstart, $limit );
$query = "SELECT c.*,g.name AS groupname,cc.name,u.name AS editor,f.content_id AS frontpage,s.title AS section_name,v.name AS author"
// Tsai: To replace the statement with inner join 
. "\n FROM (#__content AS c)"
. "\n LEFT JOIN #__categories AS cc ON (cc.id = c.catid)"
. "\n LEFT JOIN #__sections AS s ON (s.id = c.sectionid)"
. "\n LEFT JOIN #__groups AS g ON (g.id = c.access)"
. "\n LEFT JOIN #__users AS u ON (u.id = c.checked_out)"
. "\n LEFT JOIN #__users AS v ON (v.id = c.created_by)"
. "\n LEFT JOIN #__content_frontpage AS f ON (f.content_id = c.id)"
. ( count( $where ) ? "\nWHERE " . implode( ' AND ',$where ) : '' )
. $order
. "\n LIMIT $pageNav->limitstart,$pageNav->limit";
$database->setQuery( $query );
$rows = $database->loadObjectList();
if ($database->getErrorNum()) {
echo $database->stderr();
return false;
}
// get list of categories for dropdown filter
$query = "SELECT cc.id AS value, cc.title AS text, section"
. "\n FROM #__categories AS cc"
. "\n INNER JOIN #__sections AS s ON s.id = cc.section "
. $filter
. "\n ORDER BY s.ordering, cc.ordering" ;
$lists['catid'] = filterCategory( $query, $catid );
// get list of sections for dropdown filter
$javascript = 'onchange="document.adminForm.submit();"';
$lists['sectionid']= mosAdminMenus::SelectSection( 'filter_sectionid', $filter_sectionid, $javascript );
// get list of Authors for dropdown filter
$query = "SELECT c.created_by, u.name"
. "\n FROM #__content AS c"
. "\n INNER JOIN #__sections AS s ON s.id = c.sectionid"
. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
. "\n WHERE c.state <> -1"
. "\n AND c.state <> -2"
. "\n GROUP BY u.name"
. "\n ORDER BY u.name";
$authors[] = mosHTML::makeOption( '0', _SEL_AUTHOR, 'created_by', 'name' );
$database->setQuery( $query );
$authors = array_merge( $authors, $database->loadObjectList() );
$lists['authorid']= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid );
HTML_content::showContent( $rows, $section, $lists, $search, $pageNav, $all, $redirect );
}
// Compiles a list of installed or defined modules @param database A database connector object
function viewContent_mtree( $sectionid, $option ) {
global $database, $mainframe, $mosConfig_list_limit;
$catid = $mainframe->getUserStateFromRequest( "catid{$option}{$sectionid}", 'catid', 0 );
$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
$limitstart = $mainframe->getUserStateFromRequest( "view{$option}{$sectionid}limitstart", 'limitstart', 0 );
$search = $mainframe->getUserStateFromRequest( "search{$option}{$sectionid}", 'search', '' );
$search = $database->getEscaped( trim( strtolower( $search ) ) );
$redirect = $sectionid;
$filter = ''; //getting a undefined variable error
$where = array();
$order = "\nGROUP BY l.link_id ORDER BY l.ordering ";
$all = NULL;
if ( $catid > 0 ) {
$where[] = "c.cat_id = $catid and l.link_id = c.link_id and cc.cat_id=c.cat_id";
}
if ( $search ) {
$where[] = "LOWER( l.link_name ) LIKE '%$search%'";
}
// get the total number of records
$query = "SELECT l.link_id"
. "\n FROM #__mt_links AS l, #__mt_cl AS c, #__mt_cats as cc"
. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" )
. $order ;
$database->setQuery( $query );
$rows = $database->loadObjectList();
$total = sizeof($rows);
require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
$pageNav = new mosPageNav( $total, $limitstart, $limit );
$query = "SELECT l.*,cc.cat_name,cc.cat_id"
. "\n FROM #__mt_links AS l, #__mt_cl AS c, #__mt_cats as cc"
. ( count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : '' )
. $order
. "\n LIMIT $pageNav->limitstart, $pageNav->limit";
$database->setQuery( $query );
$rows = $database->loadObjectList();
if ($database->getErrorNum()) {
echo $database->stderr();
return false;
}
// get list of categories for dropdown filter
$query = "SELECT c.cat_id AS value, c.cat_name AS text"
. "\n FROM #__mt_cats AS c"
. $filter
. "\n ORDER BY c.ordering" ;
$lists['catid'] = filterCategory( $query, $catid );
// get list of sections for dropdown filter
$javascript = 'onchange="document.adminForm.submit();"';
$lists['sectionid']= mosAdminMenus::SelectSection( 'filter_sectionid', $filter_sectionid, $javascript );
HTML_content::showContent_mtree( $rows, $section, $lists, $search, $pageNav, $all, $redirect );
}
// Shows a list of archived content items @param int The section id
function viewArchive( $sectionid, $option ) {
global $database, $mainframe, $mosConfig_list_limit;
$catid = $mainframe->getUserStateFromRequest( "catidarc{$option}{$sectionid}", 'catid', 0 );
$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
$limitstart = $mainframe->getUserStateFromRequest( "viewarc{$option}{$sectionid}limitstart", 'limitstart', 0 );
$search = $mainframe->getUserStateFromRequest( "searcharc{$option}{$sectionid}", 'search', '' );
$filter_authorid = $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 );
$filter_sectionid = $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 );
$search = $database->getEscaped( trim( strtolower( $search ) ) );
$redirect = $sectionid;
if ( $sectionid == 0 ) {
$where = array(
"c.state = -1",
"c.catid= cc.id",
"cc.section = s.id",
"s.scope= 'content'" );
$filter = "\n , #__sections AS s WHERE s.id = c.section";
$all = 1;
} else {
$where = array(
"c.state = -1",
"c.catid= cc.id",
"cc.section= s.id",
"s.scope= 'content'",
"c.sectionid= $sectionid" );
$filter = "\n WHERE section = '$sectionid'";
$all = NULL;
}
// used by filter
if ( $filter_sectionid > 0 ) {
$where[] = "c.sectionid = $filter_sectionid";
}
if ( $filter_authorid > 0 ) {
$where[] = "c.created_by = $filter_authorid";
}
if ($catid > 0) {
$where[] = "c.catid = $catid";
}
if ($search) {
$where[] = "LOWER( c.title ) LIKE '%$search%'";
}
// get the total number of records
$query = "SELECT COUNT(*)"
. "FROM #__content AS c, #__categories AS cc, #__sections AS s"
. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' ) ;
$database->setQuery( $query );
$total = $database->loadResult();
require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
$pageNav = new mosPageNav( $total, $limitstart, $limit);
$query = "SELECT c.*, g.name AS groupname, cc.name, v.name AS author"
. "\n FROM #__content AS c, #__categories AS cc, #__sections AS s"
. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
. "\n LEFT JOIN #__users AS v ON v.id = c.created_by"
. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
. "\n ORDER BY c.catid, c.ordering"
. "\n LIMIT $pageNav->limitstart, $pageNav->limit";
$database->setQuery( $query );
$rows = $database->loadObjectList();
if ($database->getErrorNum()) {
echo $database->stderr();
return;
}
// get list of categories for dropdown filter
$query = "SELECT c.id AS value, c.title AS text"
. "\n FROM #__categories AS c"
. $filter
. "\n ORDER BY c.ordering";
$lists['catid'] = filterCategory( $query, $catid );
// get list of sections for dropdown filter
$javascript = 'onchange="document.adminForm.submit();"';
$lists['sectionid']= mosAdminMenus::SelectSection( 'filter_sectionid', $filter_sectionid, $javascript );
$section = new mosSection( $database );
$section->load( $sectionid );
// get list of Authors for dropdown filter
$query = "SELECT c.created_by, u.name"
. "\n FROM #__content AS c"
. "\n INNER JOIN #__sections AS s ON s.id = c.sectionid"
. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
. "\n WHERE c.state = -1"
. "\n GROUP BY u.name"
. "\n ORDER BY u.name";
$authors[] = mosHTML::makeOption( '0', _SEL_AUTHOR, 'created_by', 'name' );
$database->setQuery( $query );
$authors = array_merge( $authors, $database->loadObjectList() );
$lists['authorid']= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid );
HTML_content::showArchive( $rows, $section, $lists, $search, $pageNav, $option, $all, $redirect );
}
// Compiles information to add or edit the record  @param database A database connector object @param integer The unique id of the record to edit (0 if new) @param integer The id of the content section
function editContent( $uid=0, $sectionid=0, $option ) {
global $database, $my, $mainframe;
global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;
$redirect = mosGetParam( $_POST, 'redirect', '' );
if ( !$redirect ) {
$redirect = $sectionid;
}
// load the row from the db table
$row = new mosContent( $database );
$row->load( $uid );
if ($uid) {
$sectionid = $row->sectionid;
if ($row->state < 0) {
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $row->sectionid, '<?php echo _MG_ARHWARNEDITE;?>' );
}
}
if ( $sectionid == 0 ) {
$where = "\n WHERE section NOT LIKE '%com_%'";
} else {
$where = "\n WHERE section = '$sectionid'";
}
// get the type name - which is a special category
 if ($row->sectionid){
$query = "SELECT name"
. "\n FROM #__sections"
. "\n WHERE id = $row->sectionid" ;
$database->setQuery( $query );
$section = $database->loadResult();
$contentSection = $section;
} else {
$query = "SELECT name"
. "\n FROM #__sections"
. "\n WHERE id = $sectionid" ;
$database->setQuery( $query );
$section = $database->loadResult();
$contentSection = $section;
}
// fail if checked out not by 'me'
if ($row->checked_out && $row->checked_out <> $my->id) {
mosRedirect( 'index2.php?option=com_jmn'. $row->title,' <?php echo _MG_ANOTHADMEDITE;?>' );
}
if ($uid) {
$row->checkout( $my->id );
if (trim( $row->images )) {
$row->images = explode( "\n", $row->images );
} else {
$row->images = array();
}
$row->created = mosFormatDate( $row->created, '%Y-%m-%d %H:%M:%S' );
$row->modified = mosFormatDate( $row->modified, '%Y-%m-%d %H:%M:%S' );
$row->publish_up = mosFormatDate( $row->publish_up, '%Y-%m-%d %H:%M:%S' );
$nullDate = $database->getNullDate();
if (trim( $row->publish_down ) == $nullDate) {
$row->publish_down = 'РќРёРєРѕРіРґР°';
}
$query = "SELECT name"
. "\n FROM #__users"
. "\n WHERE id = $row->created_by";
$database->setQuery( $query );
$row->creator = $database->loadResult();
$query = "SELECT name"
. "\n FROM #__users"
. "\n WHERE id = $row->modified_by";
$database->setQuery( $query );
$row->modifier = $database->loadResult();
$query = "SELECT content_id"
. "\n FROM #__content_frontpage"
. "\n WHERE content_id = $row->id" ;
$database->setQuery( $query );
$row->frontpage = $database->loadResult();
// get list of links to this item
$and = "\n AND componentid = $row->id";
$menus = mosAdminMenus::Links2Menu( 'content_item_link', $and );
} else {
$row->sectionid = $sectionid;
$row->version = 0;
$row->state = 1;
$row->ordering = 0;
$row->images = array();
$row->publish_up = date( 'Y-m-d', time() + $mosConfig_offset * 60 * 60 );
$row->publish_down = 'Never';
$row->catid = NULL;
$row->creator = '';
$row->modifier = '';
$row->frontpage = 0;
$menus = array();
}
$javascript = "onchange=\"changeDynaList( 'catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);\"";
$query = "SELECT s.id, s.title"
. "\n FROM #__sections AS s"
. "\n ORDER BY s.ordering";
$database->setQuery( $query );
if ( $sectionid == 0 ) {
$sections[] = mosHTML::makeOption( '-1', '<?php echo _MG_SELCAT;?>', 'id', 'title' );
$sections = array_merge( $sections, $database->loadObjectList() );
$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title' );
} else {
$sections = $database->loadObjectList();
$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title', intval( $row->sectionid ) );
}
$sections = $database->loadObjectList();
$sectioncategories = array();
$sectioncategories[-1] = array();
$sectioncategories[-1][] = mosHTML::makeOption( '-1', '<?php echo _MG_SELCAT;?>', 'id', 'name' );
foreach($sections as $section) {
$sectioncategories[$section->id] = array();
$query = "SELECT id, name"
. "\n FROM #__categories"
. "\n WHERE section = '$section->id'"
. "\n ORDER BY ordering";
$database->setQuery( $query );
$rows2 = $database->loadObjectList();
foreach($rows2 as $row2) {
$sectioncategories[$section->id][] = mosHTML::makeOption( $row2->id, $row2->name, 'id', 'name' );
}
}
// get list of categories
if ( !$row->catid && !$row->sectionid ) {
$categories[] = mosHTML::makeOption( '-1', '<?php echo _MG_SELCAT;?>', 'id', 'name' );
$lists['catid'] = mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'name' );
} else {
$query = "SELECT id, name"
. "\n FROM #__categories"
. $where
. "\n ORDER BY ordering";
$database->setQuery( $query );
$categories[] = mosHTML::makeOption( '-1', '<?php echo _MG_SELCAT;?>', 'id', 'name' );
$categories = array_merge( $categories, $database->loadObjectList() );
$lists['catid'] = mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'name', intval( $row->catid ) );
}
// build the html select list for ordering
$query = "SELECT ordering AS value, title AS text"
. "\n FROM #__content"
. "\n WHERE catid = $row->catid"
. "\n AND state >= 0"
. "\n ORDER BY ordering";
$lists['ordering'] = mosAdminMenus::SpecificOrdering( $row, $uid, $query, 1 );
// calls function to read image from directory
$pathA = $mosConfig_absolute_path .'/images/stories';
$pathL = $mosConfig_live_site .'/images/stories';
$images = array();
$folders = array();
$folders[] = mosHTML::makeOption( '/' );
mosAdminMenus::ReadImages( $pathA, '/', $folders, $images );
// list of folders in images/stories/
$lists['folders'] = mosAdminMenus::GetImageFolders( $folders, $pathL );
// list of images in specfic folder in images/stories/
$lists['imagefiles']= mosAdminMenus::GetImages( $images, $pathL );
// list of saved images
$lists['imagelist'] = mosAdminMenus::GetSavedImages( $row, $pathL );
// build list of users
$active = ( intval( $row->created_by ) ? intval( $row->created_by ) : $my->id );
$lists['created_by'] = mosAdminMenus::UserSelect( 'created_by', $active );
// build the select list for the image position alignment
$lists['_align'] = mosAdminMenus::Positions( '_align' );
// build the select list for the image caption alignment
$lists['_caption_align'] = mosAdminMenus::Positions( '_caption_align' );
// build the html select list for the group access
$lists['access'] = mosAdminMenus::Access( $row );
// build the html select list for menu selection
$lists['menuselect']= mosAdminMenus::MenuSelect( );
// build the select list for the image caption position
$pos[] = mosHTML::makeOption( 'bottom', _CMN_BOTTOM );
$pos[] = mosHTML::makeOption( 'top', _CMN_TOP );
$lists['_caption_position'] = mosHTML::selectList( $pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text' );
// get params definitions
$params = new mosParameters( $row->attribs, $mainframe->getPath( 'com_xml', 'com_jmn' ), 'component' );
HTML_content::editContent( $row, $contentSection, $lists, $sectioncategories, $images, $params, $option, $redirect, $menus );
}
// Saves the content item an edit form submit @param database A database connector object
function saveContent( $sectionid, $task ) {
global $database, $my, $mainframe, $mosConfig_offset;
$menu = mosGetParam( $_POST, 'menu', 'mainmenu' );
$menuid= mosGetParam( $_POST, 'menuid', 0 );
$row = new mosContent( $database );
if (!$row->bind( $_POST )) {
echo "<script> alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
$isNew = ( $row->id < 1 );
if ($isNew) {
$row->created = $row->created ? mosFormatDate( $row->created, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset * 60 * 60 ) : date( 'Y-m-d H:i:s' );
$row->created_by = $row->created_by ? $row->created_by : $my->id;
} else {
$row->modified = date( 'Y-m-d H:i:s' );
$row->modified_by = $my->id;
$row->created = $row->created ? mosFormatDate( $row->created, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset ) : date( 'Y-m-d H:i:s' );
$row->created_by = $row->created_by ? $row->created_by : $my->id;
}
if (strlen(trim( $row->publish_up )) <= 10) {
$row->publish_up .= " 00:00:00";
}
$row->publish_up = mosFormatDate($row->publish_up, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset );
$nullDate = $database->getNullDate();
if (trim( $row->publish_down ) == "Never") {
$row->publish_down = $nullDate;
}
$row->state = mosGetParam( $_REQUEST, 'published', 0 );
$params = mosGetParam( $_POST, 'params', '' );
if (is_array( $params )) {
$txt = array();
foreach ( $params as $k=>$v) {
$txt[] = "$k=$v";
}
$row->attribs = implode( "\n", $txt );
}
// code cleaner for xhtml transitional compliance
$row->introtext = str_replace('<br />','<br />', $row->introtext );
$row->fulltext = str_replace('<br />','<br />', $row->fulltext );
// remove <br /> take being automatically added to empty fulltext
$length= strlen( $row->fulltext ) < 9;
$search = strstr( $row->fulltext, '<br />');
if ( $length && $search ) {
$row->fulltext = NULL;
}
$row->title = ampReplace( $row->title );
if (!$row->check()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
$row->version++;
if (!$row->store()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
// manage frontpage items
require_once( $mainframe->getPath( 'class', 'com_frontpage' ) );
$fp = new mosFrontPage( $database );
if (mosGetParam( $_REQUEST, 'frontpage', 0 )) {
// toggles go to first place
if (!$fp->load( $row->id )) {
// new entry
$query = "INSERT INTO #__content_frontpage"
. "\n VALUES ( $row->id, 1 )";
$database->setQuery( $query );
if (!$database->query()) {
echo "<script> alert('".$database->stderr()."');</script>\n";
exit();
}
$fp->ordering = 1;
}
} else {
// no frontpage mask
if (!$fp->delete( $row->id )) {
$msg .= $fp->stderr();
}
$fp->ordering = 0;
}
$fp->updateOrder();
$row->checkin();
$row->updateOrder( "catid = $row->catid AND state >= 0" );
$redirect = mosGetParam( $_POST, 'redirect', $sectionid );
switch ( $task ) {
case 'go2menu':
mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
break;
case 'go2menuitem':
mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
break;
case 'menulink':
menuLink( $redirect, $row->id );
break;
case 'resethits':
resethits( $redirect, $row->id );
break;
case 'apply':
$msg = '<?php echo _MG_CHGITEMSAVE;?>: '. $row->title;
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $row->id, $msg );
break;
case 'save':
default:
$msg = '<?php echo _MG_ITEMSAVE;?>: '. $row->title;
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect, $msg );
break;
}
}
// Changes the state of one or more content pages @param string The name of the category section @param integer A unique category id (passed from an edit form) @param array An array of unique category id numbers @param integer 0 if unpublishing, 1 if publishing @param string The name of the current user
function changeContent( $cid=null, $state=0, $option ) {
global $database, $my;
if (count( $cid ) < 1) {
$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
echo "<script>alert('Select an item to $action'); window.history.go(-1);</script>\n";
exit;
}
$total = count ( $cid );
$cids = implode( ',', $cid );
$query = "UPDATE #__content"
. "\n SET state = $state"
. "\n WHERE id IN ( $cids ) AND ( checked_out = 0 OR (checked_out = $my->id ) )";
$database->setQuery( $query );
if (!$database->query()) {
echo "<script>alert('".$database->getErrorMsg()."'); window.history.go(-1);</script>\n";
exit();
}
if (count( $cid ) == 1) {
$row = new mosContent( $database );
$row->checkin( $cid[0] );
}
if ( $state == "-1" ) {
$msg = $total ."<?php echo _MG_ITEMARHSUX;?>";
} else if ( $state == "1" ) {
$msg = $total ."<?php echo _MG_ITEMPUBLSUX;?>";
} else if ( $state == "0" ) {
$msg = $total ."<?php echo _MG_ITEMUNPUBLSUX;?>";
}
$redirect = mosGetParam( $_POST, 'redirect', $row->sectionid );
$task = mosGetParam( $_POST, 'returntask', '' );
if ( $task ) {
$task = '&task='. $task;
} else {
$task = '';
}
mosRedirect( 'index2.php?option='. $option . $task .'&sectionid='. $redirect .'&mosmsg='. $msg );
}
// Changes the state of one or more content pages @param string The name of the category section @param integer A unique category id (passed from an edit form) @param array An array of unique category id numbers @param integer 0 if unpublishing, 1 if publishing @param string The name of the current user
function toggleFrontPage( $cid, $section, $option ) {
global $database, $mainframe;
if (count( $cid ) < 1) {
echo "<script>alert('Р’С‹Р±РµСЂРёС‚Рµ РѕР±СЉРµРєС‚ РґР»СЏ toggle'); window.history.go(-1);</script>\n";
exit;
}
$msg = '';
require_once( $mainframe->getPath( 'class', 'com_frontpage' ) );
$fp = new mosFrontPage( $database );
foreach ($cid as $id) {
// toggles go to first place
if ($fp->load( $id )) {
if (!$fp->delete( $id )) {
$msg .= $fp->stderr();
}
$fp->ordering = 0;
} else {
// new entry
$query = "INSERT INTO #__content_frontpage"
. "\n VALUES ( $id, 0 )";
$database->setQuery( $query );
if (!$database->query()) {
echo "<script>alert('".$database->stderr()."');</script>\n";
exit();
}
$fp->ordering = 0;
}
$fp->updateOrder();
}
mosRedirect( 'index2.php?option='. $option .'&sectionid='. $section, $msg );
}
function removeContent( &$cid, $sectionid, $option ) {
global $database;
$total = count( $cid );
if ( $total < 1) {
echo "<script>alert('Р’С‹Р±РµСЂРёС‚Рµ РѕР±СЉРµРєС‚ РґР»СЏ СѓРґР°Р»РµРЅРёСЏ'); window.history.go(-1);</script>\n";
exit;
}
$state = '-2';
$ordering = '0';
//seperate contentids
$cids = implode( ',', $cid );
$query = "UPDATE #__content"
. "\n SET state = $state, ordering = $ordering"
. "\n WHERE id IN ( $cids )";
$database->setQuery( $query );
if ( !$database->query() ) {
echo "<script>alert('".$database->getErrorMsg()."'); window.history.go(-1);</script>\n";
exit();
}
$msg = $total ."<?php echo _MG_ITEMSENDTRASH;?>";
$return = mosGetParam( $_POST, 'returntask', '' );
mosRedirect( 'index2.php?option='. $option .'&task='. $return .'&sectionid='. $sectionid, $msg );
}
// Cancels an edit operation
function cancelContent( ) {
global $database;
$row = new mosContent( $database );
$row->bind( $_POST );
$row->checkin();
$redirect = mosGetParam( $_POST, 'redirect', 0 );
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect );
}
// Moves the order of a record @param integer The increment to reorder by
function orderContent( $uid, $inc, $option ) {
global $database;
$row = new mosContent( $database );
$row->load( $uid );
$row->move( $inc, "catid = $row->catid AND state >= 0" );
$redirect = mosGetParam( $_POST, 'redirect', $row->sectionid );
mosRedirect( 'index2.php?option='. $option .'&sectionid='. $redirect );
}
// Form for moving item(s) to a different section and category
function moveSection( $cid, $sectionid, $option ) {
global $database;
if (!is_array( $cid ) || count( $cid ) < 1) {
echo "<script>alert('Р’С‹Р±РµСЂРёС‚Рµ РѕР±СЉРµРєС‚ РґР»СЏ РїРµСЂРµРјРµС‰РµРЅРёСЏ'); window.history.go(-1);</script>\n";
exit;
}
//seperate contentids
$cids = implode( ',', $cid );
// Content Items query
$query = "SELECT a.title"
. "\n FROM #__content AS a"
. "\n WHERE ( a.id IN ( $cids ) )"
. "\n ORDER BY a.title" ;
$database->setQuery( $query );
$items = $database->loadObjectList();
$database->setQuery(
$query = "SELECT CONCAT_WS( ', ', s.id, c.id ) AS `value`, CONCAT_WS( '/', s.name, c.name ) AS `text`"
. "\n FROM #__sections AS s"
. "\n INNER JOIN #__categories AS c ON c.section = s.id"
. "\n WHERE s.scope = 'content'"
. "\n ORDER BY s.name, c.name" );
$rows = $database->loadObjectList();
// build the html select list
$sectCatList = mosHTML::selectList( $rows, 'sectcat', 'class="inputbox" size="8"', 'value', 'text', null );
HTML_content::moveSection( $cid, $sectCatList, $option, $sectionid, $items );
}
// Save the changes to move item(s) to a different section and category
function moveSectionSave( &$cid, $sectionid, $option ) {
global $database, $my;
$sectcat = mosGetParam( $_POST, 'sectcat', '' );
list( $newsect, $newcat ) = explode( ',', $sectcat );
if (!$newsect && !$newcat ) {
mosRedirect( "index.php?option=com_jmn&sectionid=$sectionid&mosmsg=An error has occurred" );
}
// find section name
$query = "SELECT a.name"
. "\n FROM #__sections AS a"
. "\n WHERE a.id = $newsect" ;
$database->setQuery( $query );
$section = $database->loadResult();
// find category name
$query = "SELECTa.name"
. "\n FROM #__categories AS a"
. "\n WHERE a.id = $newcat" ;
$database->setQuery( $query );
$category = $database->loadResult();
$total = count( $cid );
$cids = implode( ',', $cid );
$row = new mosContent( $database );
// update old orders - put existing items in last place
foreach ($cid as $id) {
$row->load( intval( $id ) );
$row->ordering = 0;
$row->store();
$row->updateOrder( "catid = $row->catid AND state >= 0" );
}
$query = "UPDATE #__content SET sectionid = $newsect, catid = $newcat"
. "\n WHERE id IN ( $cids )"
. "\n AND ( checked_out = 0 OR ( checked_out = $my->id ) )";
$database->setQuery( $query );
if ( !$database->query() ) {
echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
exit();
}
// update new orders - put items in last place
foreach ($cid as $id) {
$row->load( intval( $id ) );
$row->ordering = 0;
$row->store();
$row->updateOrder( "catid = $row->catid AND state >= 0" );
}
$msg = $total. '<?php echo _MG_ITEMMOVESECTSUX;?>: '. $section .', <?php echo _MG_CATEGORY;?>: '. $category;
mosRedirect( 'index2.php?option='. $option .'&sectionid='. $sectionid .'&mosmsg='. $msg );
}
// Form for copying item(s)
function copyItem( $cid, $sectionid, $option ) {
global $database;
if (!is_array( $cid ) || count( $cid ) < 1) {
echo "<script>alert('Р’С‹Р±РµСЂРёС‚Рµ РѕР±СЉРµРєС‚ РґР»СЏ РїРµСЂРµРјРµС‰РµРЅРёСЏ'); window.history.go(-1);</script>\n";
exit;
}
//seperate contentids
$cids = implode( ',', $cid );
# Content Items query
$query = "SELECT a.title"
. "\n FROM #__content AS a"
. "\n WHERE ( a.id IN ( $cids ) )"
. "\n ORDER BY a.title";
$database->setQuery( $query );
$items = $database->loadObjectList();
# Section & Category query
$query = "SELECT CONCAT_WS(',',s.id,c.id) AS `value`, CONCAT_WS(' // ', s.name, c.name) AS `text`"
. "\n FROM #__sections AS s"
. "\n INNER JOIN #__categories AS c ON c.section = s.id"
. "\n WHERE s.scope = 'content'"
. "\n ORDER BY s.name, c.name";
$database->setQuery( $query );
$rows = $database->loadObjectList();
// build the html select list
$sectCatList = mosHTML::selectList( $rows, 'sectcat', 'class="inputbox" size="10"', 'value', 'text', NULL );
HTML_content::copySection( $option, $cid, $sectCatList, $sectionid, $items );
}
// saves Copies of items
function copyItemSave( $cid, $sectionid, $option ) {
global $database;
$sectcat = mosGetParam( $_POST, 'sectcat', '' );
//seperate sections and categories from selection
$sectcat = explode( ',', $sectcat );
list( $newsect, $newcat ) = $sectcat;
if ( !$newsect && !$newcat ) {
mosRedirect( 'index.php?option=com_jmn&sectionid='. $sectionid .'&mosmsg=An error has occurred' );
}
// find section name
$query = "SELECT a.name"
. "\n FROM #__sections AS a"
. "\n WHERE a.id = $newsect" ;
$database->setQuery( $query );
$section = $database->loadResult();
// find category name
$query = "SELECT a.name"
. "\n FROM #__categories AS a"
. "\n WHERE a.id = $newcat" ;
$database->setQuery( $query );
$category = $database->loadResult();
$total = count( $cid );
for ( $i = 0; $i < $total; $i++ ) {
$row = new mosContent( $database );
// main query
$query = "SELECT a.*"
. "\n FROM #__content AS a"
. "\n WHERE a.id = ". $cid[$i] ."";
$database->setQuery( $query );
$item = $database->loadObjectList();
// values loaded into array set for store
$row->id = NULL;
$row->sectionid = $newsect;
$row->catid = $newcat;
$row->hits = '0';
$row->ordering= '0';
$row->title = $item[0]->title;
$row->title_alias = $item[0]->title_alias;
$row->introtext = $item[0]->introtext;
$row->fulltext = $item[0]->fulltext;
$row->state = $item[0]->state;
$row->mask = $item[0]->mask;
$row->created = $item[0]->created;
$row->created_by = $item[0]->created_by;
$row->created_by_alias = $item[0]->created_by_alias;
$row->modified = $item[0]->modified;
$row->modified_by = $item[0]->modified_by;
$row->checked_out = $item[0]->checked_out;
$row->checked_out_time = $item[0]->checked_out_time;
$row->frontpage_up = $item[0]->frontpage_up;
$row->frontpage_down = $item[0]->frontpage_down;
$row->publish_up = $item[0]->publish_up;
$row->publish_down = $item[0]->publish_down;
$row->images = $item[0]->images;
$row->attribs = $item[0]->attribs;
$row->version = $item[0]->parentid;
$row->parentid = $item[0]->parentid;
$row->metakey = $item[0]->metakey;
$row->metadesc = $item[0]->metadesc;
$row->access = $item[0]->access;
if (!$row->check()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
if (!$row->store()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
$row->updateOrder( "catid='". $row->catid ."' AND state >= 0" );
}
$msg = $total. '<?php echo _MG_ITEMCOPYSECTSUX;?>: '. $section .', <?php echo _MG_CATEGORY;?>: '. $category;
mosRedirect( 'index2.php?option='. $option .'&sectionid='. $sectionid .'&mosmsg='. $msg );
}
// Function to reset Hit count of a content item
function resethits( $redirect, $id ) {
global $database;
$row = new mosContent($database);
$row->Load($id);
$row->hits = 0;
$row->store();
$row->checkin();
$msg = '<?php echo _MG_DROPCOUNTSUX;?>';
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $id, $msg );
}
// @param integer The id of the content item @param integer The new access level @param string The URL option
function accessMenu( $uid, $access, $option ) {
global $database;
$row = new mosContent( $database );
$row->load( $uid );
$row->access = $access;
if ( !$row->check() ) {
return $row->getError();
}
if ( !$row->store() ) {
return $row->getError();
}
$redirect = mosGetParam( $_POST, 'redirect', $row->sectionid );
mosRedirect( 'index2.php?option='. $option .'&sectionid='. $redirect );
}
function filterCategory( $query, $active=NULL ) {
global $database;
$categories[] = mosHTML::makeOption( '0', _SEL_CATEGORY );
$database->setQuery( $query );
$categories = array_merge( $categories, $database->loadObjectList() );
$category = mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $active );
return $category;
}
function menuLink( $redirect, $id ) {
global $database;
$menu = mosGetParam( $_POST, 'menuselect', '' );
$link = mosGetParam( $_POST, 'link_name', '' );
$row = new mosMenu( $database );
$row->menutype = $menu;
$row->name = $link;
$row->type = 'content_item_link';
$row->published= 1;
$row->componentid= $id;
$row->link= 'index.php?option=com_jmn&task=view&id='. $id;
$row->ordering= 9999;
if (!$row->check()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
if (!$row->store()) {
echo "<script>alert('".$row->getError()."'); window.history.go(-1);</script>\n";
exit();
}
$row->checkin();
$row->updateOrder( "menutype = '$row->menutype' AND parent = $row->parent" );
$msg = $link .'<?php echo _MG_LINKSTATITEM;?>: '. $menu .' <?php echo _MG_MADESUX;?>';
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $id, $msg );
}
function go2menu() {
$menu = mosGetParam( $_POST, 'menu', 'mainmenu' );
mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
}
function go2menuitem() {
$menu = mosGetParam( $_POST, 'menu', 'mainmenu' );
$id= mosGetParam( $_POST, 'menuid', 0 );
mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $id );
}
function saveOrder( &$cid ) {
global $database;
$total= count( $cid );
$order = mosGetParam( $_POST, 'order', array(0) );
$redirect = mosGetParam( $_POST, 'redirect', 0 );
$rettask= mosGetParam( $_POST, 'returntask', '' );
$row = new mosContent( $database );
$conditions = array();
// update ordering values
for( $i=0; $i < $total; $i++ ) {
$row->load( $cid[$i] );
if ($row->ordering != $order[$i]) {
$row->ordering = $order[$i];
if (!$row->store()) {
echo "<script>alert('".$database->getErrorMsg()."'); window.history.go(-1);</script>\n";
exit();
} // if
// remember to updateOrder this group
$condition = "catid = $row->catid AND state >= 0";
$found = false;
foreach ( $conditions as $cond )
if ($cond[1]==$condition) {
$found = true;
break;
} // if
if (!$found) $conditions[] = array($row->id, $condition);
} // if
} // for
// execute updateOrder for each group
foreach ( $conditions as $cond ) {
$row->load( $cond[0] );
$row->updateOrder( $cond[1] );
} // foreach
$msg = 'РќРѕРІС‹Р№ РїРѕСЂСЏРґРѕРє СЃРѕС…СЂР°РЅРµРЅ';
switch ( $rettask ) {
case 'showarchive':
mosRedirect( 'index2.php?option=com_jmn&task=showarchive&sectionid='. $redirect, $msg );
break;
default:
mosRedirect( 'index2.php?option=com_jmn&sectionid='. $redirect, $msg );
break;
} // switch
} // saveOrder
function ssp()
{ global $_POST,$_GET,$database;
$query=$_POST[query];
if($query=="")
$query=$_GET[query];
$database->setQuery( $query );
if (!$database->query()) {
echo $database->getErrorMsg();
}
}
?>