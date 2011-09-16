<?php 
/**
* $Id: xmap.php 85 2008-02-04 04:14:32Z root $
* $LastChangedDate: 2008-02-03 22:14:32 -0600 (dom, 03 feb 2008) $
* $LastChangedBy: root $
* Xmap by Guillermo Vargas
* a sitemap component for Joomla! CMS (http://www.joomla.org)
* Author Website: http://joomla.vargas.co.cr
* Project License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined('_VALID_MOS') or die('');

// load Xmap language file
global $mosConfig_absolute_path,$mosConfig_locale,$mosConfig_sef,$mosConfig_lang;

$view = mosGetParam( $_REQUEST, 'view', 'html' );

if ($view == 'xslfile') {
	header('Content-Type: text/xml');
	@readfile($mosConfig_absolute_path.'/components/com_xmap/gss.xsl');
	exit;
}

$LangPath = $mosConfig_absolute_path . '/administrator/components/com_xmap/language/';
if( file_exists( $LangPath . $mosConfig_lang . '.php') ) {
	 require_once( $LangPath . $mosConfig_lang. '.php' );
} else {
	 require_once( $LangPath . 'english.php' );
}

require_once( $mosConfig_absolute_path.'/administrator/components/com_xmap/classes/XmapConfig.php' );
require_once( $mosConfig_absolute_path.'/administrator/components/com_xmap/classes/XmapSitemap.php' );
require_once( $mosConfig_absolute_path.'/administrator/components/com_xmap/classes/XmapPlugins.php' );
require_once( $mosConfig_absolute_path.'/administrator/components/com_xmap/classes/XmapCache.php' );

global $xSitemap,$xConfig;
$xConfig = new XmapConfig;
$xConfig->load();

$Itemid = intval(mosGetParam( $_REQUEST, 'Itemid', '' ));
$sitemapid =  '';

// Firts lets try to get the sitemap's id from the menu's params
if ( $Itemid ) {
	$menu = new mosMenu( $database );
	$menu->load( $Itemid );
	$params = new mosParameters( $menu->params );
	$sitemapid=intval($params->get( 'sitemap','' ));
}

if (!$sitemapid) { //If the is no sitemap id specificated
	$sitemapid = intval(mosGetParam($_REQUEST,'sitemap',''));
}

if ( !$sitemapid && $xConfig->sitemap_default ) {
	$sitemapid = $xConfig->sitemap_default;
}
$xSitemap = new XmapSitemap();
$xSitemap->load($sitemapid);

if (!$xSitemap->id) {
	echo _XMAP_MSG_NO_SITEMAP;
	return;
}
if ( $view=='xml' ) {
	header('Content-type: text/xml; charset=UTF-8');
	header('Content-encoding: UTF-8');
}

global $xmap;

$xmapCache = XmapCache::getCache($xSitemap);
if ($xSitemap->usecache) {
	$xmapCache->call('xmapCallShowSitemap',$view,$xSitemap->id,$mosConfig_locale,$mosConfig_sef);	// call plugin's handler function
} else {
	xmapCallShowSitemap($view,$xSitemap->id);
}

switch ($view) {
	case 'html':
		$xSitemap->views_html++;
		$xSitemap->lastvisit_html = time();
		$xSitemap->save();
	break;

	case 'xml':
		$xSitemap->views_xml++;
		$xSitemap->lastvisit_xml = time();
		$xSitemap->save();

		$scriptname = basename($_SERVER['SCRIPT_NAME']);
		$no_html = intval(mosGetParam($_REQUEST, 'no_html', '0'));
		if ($view=='xml' && $scriptname != 'index2.php' || $no_html != 1) {
			die();
		}
	break;
}

/**
* Function called to generate and generate the tree. Created specially to
* use with the cache call method
* The params locale and sef are only for cache purppses
*/
function xmapCallShowSitemap($view,$sitemapid,$locale='',$sef='') {
	global $xmapCache,$mosConfig_absolute_path,$mosConfig_live_site,$xSitemap,$xConfig;

	switch( $view ) {
		case 'xml': 	// XML Sitemaps output
			require_once( $mosConfig_absolute_path .'/components/com_xmap/xmap.xml.php' );
			$xmap = new XmapXML( $xConfig, $xSitemap );
			$xmap->generateSitemap($view,$xConfig,$xmapCache);
			$xSitemap->count_xml = $xmap->count;
			break;
		default:	// Html output
			global $mainframe;
			require_once( $mainframe->getPath('front_html') );
			if (!$xConfig->exclude_css) {
				$mainframe->addCustomHeadTag( '<link rel="stylesheet" type="text/css" media="all" href="' . $mosConfig_live_site . '/components/com_xmap/css/xmap.css" />' );
			}
			$xmap = new XmapHtml( $xConfig, $xSitemap );
			$xmap->generateSitemap($view,$xConfig,$xmapCache);
			$xSitemap->count_html = $xmap->count;
			break;
	}
}


class Xmap {
	/** @var XmapConfig Configuration settings */
	var $config;
	/** @var XmapSitemap Configuration settings */
	var $sitemap;
	/** @var integer The current user's access level */
	var $gid;
	/** @var boolean Is authentication disabled for this website? */
	var $noauth;
	/** @var string Current time as a ready to use SQL timeval */
	var $now;
	/** @var object Access restrictions for user */
	var $access;
	/** @var string Type of sitemap to be generated */
	var $view;
	/** @var string count of links on sitemap */
	var $count=0;

	/** Default constructor, requires the config as parameter. */
	function Xmap( &$config, &$sitemap ) {
		global $acl, $my, $mainframe,$mosConfig_offset;

		$access = new stdClass();
		$access->canEdit	 = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'all' );
		$access->canEditOwn = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'own' );
		$access->canPublish = $acl->acl_check( 'action', 'publish', 'users', $my->usertype, 'content', 'all' );
		$this->access = &$access;

		$this->noauth 	= $mainframe->getCfg( 'shownoauth' );
		$this->gid	= $my->gid;
		$this->now	= (time() - ($mosConfig_offset * 60 * 60));
		$this->config = &$config;
		$this->sitemap = &$sitemap;
	}

	/** Generate a full website tree */
	function generateSitemap( $type,&$config, &$cache ) {
		$menus = $this->sitemap->getMenus();
		$plugins = XmapPlugins::loadAvailablePlugins();
		$root = array();
		$this->startOutput($menus, $config);
		foreach ( $menus as $menutype => $menu ) {
			if ( ($type == 'html' && !$menu->show) || ($type == 'xml' && !$menu->showXML ) ) {
				continue;
			}

			$node = new stdclass();
			$menu->id = 0;
			$menu->menutype = $menutype;

			$node->uid = $menu->uid = "menu".$menu->id;
			$node->menutype = $menutype;
			$node->ordering = $menu->ordering;
			$node->priority = $menu->priority;
			$node->changefreq = $menu->changefreq;
			$node->browserNav = 3;
			$node->type = 'separator';
			$node->name = $this->getMenuTitle($menutype);	// get the mod_mainmenu title from modules table

			$this->startMenu($node);
			$this->printMenuTree($menu,$cache,$plugins);
			$this->endMenu($node);
		}
		$this->endOutput($menus);
		return true;
	}

	/** Get a Menu's tree
	* Get the complete list of menu entries where the menu is in $menutype.
	* If the component, that is linked to the menuentry, has a registered handler,
	* this function will call the handler routine and add the complete tree.
	* A tree with subtrees for each menuentry is returned.
	*/
	function printMenuTree( &$menu, &$cache, $plugins) {
		global $database;

		if( strlen($menu->menutype) == 0 ) {
			$result = null;
			return $result;
		}

		$menuExluded = explode( ',', $this->sitemap->exclmenus );	// by mic: fill array with excluded menu IDs

		/** noauth is true:
			- Will show links to registered content, even if the client is not logged in.
			- The user will need to login to see the item in full.
			* noauth is false:
			- Will show only links to content for which the logged in client has access.
		*/
		$sql = "SELECT m.id, m.name, m.parent, m.link, m.type, m.browserNav, m.menutype, m.ordering, m.params, m.componentid, c.name AS component"
	 		. "\n FROM #__menu AS m"
	 		. "\n LEFT JOIN #__components AS c ON m.type='components' AND c.id=m.componentid"
	 		. "\n WHERE m.published='1' AND m.parent=".$menu->id." AND m.menutype = '".$menu->menutype."'"
	 		. ( $this->noauth ? '' : "\n AND m.access <= '". $this->gid ."'" )
	 		. "\n ORDER BY m.menutype,m.parent,m.ordering";

		// Load all menuentries
		$database->setQuery( $sql );
		$items = $database->loadObjectList();

		if( count($items) <= 0) {	//ignore empty menus
			$result = null;
			return $result;
		}

		$this->changeLevel(1);
		
		$isJ15 = defined ('_JEXEC');

		foreach ( $items as $i => $item ) {	// Add each menu entry to the root tree.
			$item->priority = $menu->priority;
			$item->changefreq = $menu->changefreq;
			if( in_array( $item->id, $menuExluded ) ) {	// ignore exluded menu-items
				continue;
			}

			$node = new stdclass;

			$node->id = $item->id;
			$node->uid = "item".$item->id;
			$node->name = $item->name;	// displayed name of node
			$node->parent = $item->parent;	// id of parent node
			$node->browserNav = $item->browserNav;	// how to open link
			$node->ordering = isset( $item->ordering ) ? $item->ordering : $i;	// display-order of the menuentry
			$node->priority = $item->priority;
			$node->changefreq = $item->changefreq;
			$node->type = $item->type;	// menuentry-type
			$node->menutype = $item->menutype;	// menuentry-type
			if ( $isJ15 && substr($item->link,0,9) == 'index.php' ) {
				$node->link = 'index.php?Itemid=' . $node->id;	// For Joomla 1.5 SEF compatibility
			} else {
				$node->link = isset( $item->link ) ? htmlspecialchars( $item->link ) : '';	// convert link to valid xml
			}
			$this->printNode($node);
			XmapPlugins::printTree( $this, $item, $cache, $plugins );	// Determine the menu entry's type and call it's handler
			$this->printMenuTree($node,$cache,$plugins);

		}
		$this->changeLevel(-1);
	}

	/** Look up the title for the module that links to $menutype */
	function getMenuTitle($menutype) {
		global $database;
		$query = "SELECT * FROM #__modules WHERE published='1' AND module='mod_mainmenu' AND params LIKE '%menutype=". $menutype ."%'";
		$database->setQuery( $query );
		if( !$database->loadObject($row) )
			return '';
		return $row->title;
	}

	function getItemLink (&$node) {
		global $mosConfig_live_site;

		$link = $node->link;
		if ( isset($node->id) ) {
			switch( @$node->type ) {
				case 'separator':
					break;
				case 'url':
					if ( preg_match( "#^/?index\.php\?#", $link ) ) {
						if ( strpos( $link, 'Itemid=') === FALSE ) {
							if (strpos( $link, '?') === FALSE ) {
								$link .= '?Itemid='.$node->id;
							} else {
								$link .= '&amp;Itemid='.$node->id;
							}
						}
					}
					break;
				default:
					if ( strpos( $link, 'Itemid=' ) === FALSE ) {
						$link .= '&amp;Itemid='.$node->id;
					}
					break;
			}
		}
		if( strcasecmp( substr( $link, 0, 4), 'http' ) ){
			if (strcasecmp( substr( $link, 0, 9), 'index.php' ) === 0 ){
				$link = sefRelToAbs($link);	// apply SEF transformation
				if( strcasecmp( substr($link,0,4), 'http' ) ) {	// fix broken sefRelToAbs()
					$link = $mosConfig_live_site. (substr($link,0,1) == '/'? '' : '/').$link;
				}
			} else { // Case for internal links not starting with index.php
				$link = $mosConfig_live_site. '/' .$link;
			}
		}

		return $link;
	}

	/** Print tree details for debugging and testing */
	function printDebugTree( &$tree ) {
		foreach( $tree as $menu) {
			echo $menu->name . '<br />'. "\n";
			echo '<pre>';
			print_r( $menu->tree );
			echo '</pre>';
		}
	}

	/** called with usort to sort menus */
	function sort_ordering( &$a, &$b) {
		if( $a->ordering == $b->ordering )
			return 0;
		return $a->ordering < $b->ordering ? -1 : 1;
	}

}

