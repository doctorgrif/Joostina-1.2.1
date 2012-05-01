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
// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_jmn' ))) {
mosRedirect('index2.php',_NOT_AUTH);
}
$thisComponent = 'jmn';
//Get right Language file
/*$file = $mosConfig_absolute_path . '/administrator/components/com_' . $thisComponent . '/language/';
if (file_exists($file . $mosConfig_lang . '.php')) {
	include ($file . $mosConfig_lang . '.php');
} else {
	// Fallback to english
	include ($file . 'english.php');
}*/
// load language file
$file = $mosConfig_absolute_path .'/language/';
if( file_exists( $file . $mosConfig_lang . '.php') ) {
	require_once( $file . $mosConfig_lang . '.php' );
} else {
	$mosConfig_lang = 'english';
	require_once( $file . 'english.php' );
}

require_once( $mosConfig_absolute_path.'/administrator/components/com_jmn/functions_jmn.php');
require_once( $mainframe->getPath( 'admin_html' ) );
$sectionid = mosGetParam( $_REQUEST, 'sectionid', 0 );
$id = mosGetParam( $_REQUEST, 'id', '' );
$cid = mosGetParam( $_POST, 'cid', array(0) );
if (!is_array( $cid )) {
$cid = array(0);
}
else{
switch ($task) {
case 'save_manager':
save_manager($_POST,$_GET);
viewContent( $sectionid, $option );
break;
case 'settings':
echo '<h2>'._MG_NAME.': '._MG_EXWORDEDIT.'</h2>';
settings($_POST,$_GET);
break;
case 'config':
echo '<h2>'._MG_NAME.': '._MG_SETTINGS.'</h2>';
config($_POST,$_GET);
break;
case 'save_config':
echo '<h2>'._MG_NAME.': '._MG_SETTINGS.'</h2>';
config($_POST,$_GET);
break;
case 'gen_metakey':
echo '<h2>'._MG_NAME.': '._MG_KWORDS.'</h2>';
meta_gen($_POST,$_GET,'metakey');
viewContent( $sectionid, $option );
break;
case 'gen_metadesc':
echo '<h2>'._MG_NAME.': '._MG_DESC.'</h2>';
meta_gen($_POST,$_GET,'metadesc');
viewContent( $sectionid, $option );
break;
case 'about':
about( );
break;
case 'new':
editContent( 0, $sectionid, $option );
break;
case 'edit':
editContent( $id, $sectionid, $option );
break;
case 'editA':
editContent( $cid[0], '', $option );
break;
case 'go2menu':
case 'go2menuitem':
case 'resethits':
case 'menulink':
case 'apply':
case 'save':
mosCache::cleanCache('com_content');
saveContent( $sectionid, $task );
break;
case 'remove':
removeContent( $cid, $sectionid, $option );
break;
case 'publish':
changeContent( $cid, 1, $option );
break;
case 'unpublish':
changeContent( $cid, 0, $option );
break;
case 'toggle_frontpage':
toggleFrontPage( $cid, $sectionid, $option );
break;
case 'archive':
changeContent( $cid, -1, $option );
break;
case 'unarchive':
changeContent( $cid, 0, $option );
break;
case 'cancel':
cancelContent();
break;
case 'orderup':
orderContent( $cid[0], -1, $option );
break;
case 'orderdown':
orderContent( $cid[0], 1, $option );
break;
case 'showarchive':
viewArchive( $sectionid, $option );
break;
case 'movesect':
moveSection( $cid, $sectionid, $option );
break;
case 'movesectsave':
moveSectionSave( $cid, $sectionid, $option );
break;
case 'copy':
copyItem( $cid, $sectionid, $option );
break;
case 'copysave':
copyItemSave( $cid, $sectionid, $option );
break;
case 'accesspublic':
accessMenu( $cid[0], 0, $option );
break;
case 'accessregistered':
accessMenu( $cid[0], 1, $option );
break;
case 'accessspecial':
accessMenu( $cid[0], 2, $option );
break;
case 'ssp':
ssp();
break;
case 'saveorder':
saveOrder( $cid );
break;
default:
viewContent( $sectionid, $option );
break;
}
}
?>