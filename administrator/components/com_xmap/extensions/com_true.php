<?php
/**
* @author PaLyCH, http://palpalych.ru
* @email ya@palpalych.ru
* @version $Id: com_true.php 120 2008-03-01 02:44:00Z root $
* @package Xmap
* @license GNU/GPL
* @description Xmap plugin for True Gallery component
*/
defined( '_VALID_MOS' ) or die();
/** Adds support for True Gallery categories to Xmap */
class xmap_com_true {
/** Get the content tree for this kind of content */
 function getTree( &$xmap, &$parent, &$params ) {
global $mosConfig_absolute_path,$mosConfig_lang;
if (!file_exists($mosConfig_absolute_path.'/administrator/components/com_true/config.true.php')) {
return $list;
}
$link_query = parse_url( $parent->link );
parse_str( html_entity_decode($link_query['query']), $link_vars);
$catid = mosGetParam($link_vars,'catid',0);
$id = mosGetParam($link_vars,'id',0);
if ( $id )
return $tree;
$include_images = mosGetParam($params,'include_images',1);
$include_images = ( $include_images == 1
|| ( $include_images == 2 && $xmap->view == 'xml')
|| ( $include_images == 3 && $xmap->view == 'html'));
$params['include_images'] = $include_images;
$priority = mosGetParam($params,'cat_priority',$parent->priority);
$changefreq = mosGetParam($params,'cat_changefreq',$parent->changefreq);
if ($priority== '-1')
$priority = $parent->priority;
if ($changefreq== '-1')
$changefreq = $parent->changefreq;
$params['cat_priority'] = $priority;
$params['cat_changefreq'] = $changefreq;
$priority = mosGetParam($params,'image_priority',$parent->priority);
$changefreq = mosGetParam($params,'image_changefreq',$parent->changefreq);
if ($priority== '-1')
$priority = $parent->priority;
if ($changefreq== '-1')
$changefreq = $parent->changefreq;
$params['image_priority'] = $priority;
$params['image_changefreq'] = $changefreq;
if ( $include_images ) {
$ordering = mosGetParam($params,'images_order','ordering');
$orderModes = array('ordering'=>'ASC','date'=>'DESC','title'=>'ASC','hits'=>'DESC');
if ( empty($orderModes[$ordering]) )
$ordering = 'ordering';
$params['images_order'] = $ordering . ' '. $orderModes[$ordering];
$params['limit'] = '';
$params['days'] = '';
$limit = mosGetParam($params,'max_images','');
if ( intval($limit) )
$params['limit'] = ' LIMIT '.$limit;
$days = mosGetParam($params,'max_age','');
if ( intval($days) )
$params['days'] = ' AND `imgdate` >=\''.date('Y-m-d H:i:s',$xmap->now - ($days*86400)) ."' ";
}
xmap_com_true::getGalleries($xmap,$parent,$catid,$params);
}
/** RSGallery support */
function getGalleries ( &$xmap, &$parent,$catid,&$params ) {
global $database; // , $rsgConfig, $rsgAccess, $rsgVersion, $rsgOption;
$gid=0;
$query = "SELECT cid, name, parent, access FROM #__true_catg".
 " WHERE published='1'".
 " AND parent=$catid".
 " AND access=0".
 " ORDER BY ordering ASC";
$database->setQuery($query);
$rows = $database->loadAssocList();
$xmap->changeLevel(1);
foreach($rows as $row) {
$node = new stdclass;
$node->id = $parent->id;
$node->uid = $parent->uid.'c'.$row['cid'];
$node->browserNav = $parent->browserNav;
$node->name = $row['name'];
$node->modified = $xmap->now;
$node->link = 'index.php?option=com_true&amp;func=viewcategory&amp;catid='.$row['cid'];
$node->priority = $params['cat_priority'];
$node->changefreq = $params['cat_changefreq'];
$node->tree = array();
$xmap->printNode($node);
xmap_com_true::getGalleries($xmap,$parent,$row['cid'],$params);
}
if ( $params['include_images'] ) {
$query= 
 "SELECT id, imgfilename, imgtitle, imgdate "
."\n FROM #__true"
."\n WHERE catid = $catid" 
."\n AND published=1 "
."\n AND approved=1 "
.$params['days']
."\n ORDER BY ".$params['images_order'] . ' '
.$params['limit'];
$database->setQuery( $query );
$database->getQuery( );
$rows = $database->loadAssocList();
foreach($rows as $row) {
$node = new stdclass;
$node->id = $parent->id;
$node->uid = $parent->uid.'i'.$row['id'];
$node->browserNav = $parent->browserNav;
$node->name = $row['imgtitle'];
$node->modified = intval($row['imgdate']);
$node->priority = $params['image_priority'];
$node->changefreq = $params['image_changefreq'];
$node->link = 'index.php?option=com_true&amp;func=detail&amp;catid='.$catid.'&amp;id='.$row['id'];// parent id
$xmap->printNode($node);
}
}
$xmap->changeLevel(-1);
}
}