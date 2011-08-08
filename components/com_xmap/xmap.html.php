<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die('');

/** Wraps HTML output */
class XmapHtml extends Xmap {
	var $level = -1;
	var $_openList = '';
	var $_closeList = '';
	var $_closeItem = '';
	var $_childs;
	var $_width;

		function XmapHtml (&$config, &$sitemap) {
				$this->view = 'html';
				Xmap::Xmap($config, $sitemap);
		}

	/** Convert sitemap tree to an 'unordered' html list.
	* This function uses recursion, keep unnecessary code out of this!
	*/
	function printNode( &$node ) {
		global $Itemid,$mosConfig_live_site;

		$out = '';
	
		$out .= $this->_closeItem;
		$out .= $this->_openList;
		$this->_openList = '';

		if ( $Itemid == $node->id )
			$out .= '<li class="xmap active">';
		else
			$out .= '<li class="xmap">';

		$link = Xmap::getItemLink($node);;

		if( !isset($node->browserNav) )
			$node->browserNav = 0;

		$node->name = htmlspecialchars($node->name);
		switch( $node->browserNav ) {
			case 1:	// open url in new window
				$ext_image = '';
				if ( $this->sitemap->exlinks ) {
					$ext_image = '<img src="'. $mosConfig_live_site .'/components/com_xmap/images/'. $this->sitemap->ext_image .'" alt="' . _XMAP_SHOW_AS_EXTERN_ALT . '" title="' . _XMAP_SHOW_AS_EXTERN_ALT . '" class="xmap" />';
				}
				$out .= '<a href="'. $link .'" title="'. $node->name .'" target="_blank" class="xmap">'. $node->name . $ext_image .'</a>';
				break;

			case 2:	// open url in javascript popup window
				$ext_image = '';
				if( $this->sitemap->exlinks ) {
					$ext_image = '&nbsp;<img src="'. $mosConfig_live_site .'/components/com_xmap/images/'. $this->sitemap->ext_image .'" alt="' . _XMAP_SHOW_AS_EXTERN_ALT . '" title="' . _XMAP_SHOW_AS_EXTERN_ALT . '" class="xmap" />';
				}
				$out .= '<a href="'. $link .'" title="'. $node->name .'" target="_blank" class="xmap" '. "onClick=\"javascript: window.open('" . $link ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false;\">" . $node->name . $ext_image . "</a>";
				break;

			case 3:	// no link
				$out .= '<span class="xmap">'. $node->name .'</span>';
				break;

			default:	// open url in parent window
				$out .= '<a href="'. $link .'" title="'. $node->name .'" class="xmap">'. $node->name .'</a>';
				break;
		}

		$this->_closeItem = '</li>' . "\n";
		$this->_childs[$this->level]++;
		echo $out;
		$this->count++;
	}

	/**
	* Moves sitemap level up or down
	*/
	function changeLevel( $level ) {
		if ( $level > 0 ) {
			# We do not print start ul here to avoid empty list, it's printed at the first child
			$this->level += $level;
			$this->_childs[$this->level]=0;
			$this->_openList = '<ul class="xmap level' . $this->level. '">' . "\n";
			$this->_closeItem = '';
		} else {
			if ($this->_childs[$this->level]){
				echo $this->_closeItem . '</ul>' . "\n";
			}
			$this->_closeItem ='</li>';
			$this->_openList = '';
			$this->level += $level;
		}
	}

	/** Print component heading, etc. Then call getHtmlList() to print list */
	function startOutput(&$menus,&$config) {
		global $database, $Itemid;
		$sitemap = &$this->sitemap;

		$menu = new mosMenu( $database );
		$menu->load( $Itemid );	// Load params for the Xmap menu-item
		$title = $menu->name;
		
		$exlink[0] = $sitemap->exlinks;	// image to mark popup links
		$exlink[1] = $sitemap->ext_image;

		if( $sitemap->columns > 1 ) {	// calculate column widths
			$total = count($menus);
			$columns = $total < $sitemap->columns ? $total : $sitemap->columns;
			$this->_width = (100 / $columns) - 1;
		}
	echo '<div class="' . $sitemap->classname . '">';
	echo '<div class="componentheading">' . $title . '</div>';
	echo '<div class="contentpaneopen"' . ($sitemap->columns > 1 ? '' : '') . '>';
	}

	/** Print component heading, etc. Then call getHtmlList() to print list */
	function endOutput(&$menus) {
		global $database, $Itemid;
		$sitemap = &$this->sitemap;

		echo '<div style="clear:left;"></div>';
		echo '</div>';
		echo '</div>' . "\n";
	}

	function startMenu(&$menu) {
		$sitemap = &$this->sitemap;
		if( $sitemap->columns > 1 )	// use columns
			echo '<div style="float:left;width:' . $this->_width . '%;">';
		if( $sitemap->show_menutitle )	// show menu titles
			echo '<h2 class="xmap menutitle">' . $menu->name . '</h2>';
	}

	function endMenu(&$menu) {
		$sitemap = &$this->sitemap;
		$this->_closeItem='';
		if( $sitemap->show_menutitle || $sitemap->columns > 1 ) {	// each menu gets a separate list
			if( $sitemap->columns > 1 ) {
				echo '</div>' . "\n";
			}

		}
	}
}
