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


// check access permissions (only superadmins & admins)
if ( !( $acl->acl_check('administration', 'config', 'users', $my->usertype) ) ||  $acl->acl_check('administration', 'edit', 'users', $my->usertype, 'components', 'com_xmap') ) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}

$cid	= mosGetParam( $_POST, 'cid', array(0) );
$task	= mosGetParam( $_REQUEST, 'task', '' );

global $mosConfig_live_site, $mosConfig_lang,$mosConfig_absolute_path,$xmapComponentURL,$xmapSiteURL,$xmapComponentPath,$xmapAdministratorURL,$xmapLang,$xmapAdministratorPath;

define ('_XMAP_JOOMLA15',0);
define('_XMAP_MAMBO',0);

$xmapLang = strtolower($mosConfig_lang);
$xmapComponentPath = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap';
$xmapAdministratorPath = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY;
$xmapComponentURL = $mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap';
$xmapAdministratorURL = $mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY;
$xmapSiteURL = $mosConfig_live_site;

// load language file
if( file_exists( $xmapComponentPath .'/language/' . $xmapLang . '.php') ) {
	require_once( $xmapComponentPath .'/language/' . $xmapLang . '.php' );
} else {
	$xmapLang = 'english';
	require_once( $xmapComponentPath .'/language/english.php' );
}

require_once( $xmapComponentPath.'/classes/XmapAdmin.php' );

// load settings from database
require_once( $xmapComponentPath.'/classes/XmapConfig.php' );
require_once( $xmapComponentPath.'/admin.xmap.html.php' );
$config = new XmapConfig;
if( !$config->load() ) {
	$text = _XMAP_ERR_NO_SETTINGS."<br />\n";
	$link = 'index2.php?option=com_xmap&task=create';
	echo sprintf( $text, $link );
}

$admin = new XmapAdmin();
$admin->show( $config, $task, $cid );

