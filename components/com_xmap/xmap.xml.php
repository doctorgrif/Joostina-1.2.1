<?php 
/**
* $Id: xmap.xml.php 85 2008-02-04 04:14:32Z root $
* $LastChangedDate: 2008-02-03 22:14:32 -0600 (dom, 03 feb 2008) $
* $LastChangedBy: root $
* Xmap by Guillermo Vargas
* A Sitemap component for Joomla! CMS (http://www.joomla.org)
* Author Website: http://joomla.vargas.co.cr
* Project License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined('_VALID_MOS') or die(''); 

/** Wraps XML Sitemaps output */
class XmapXML extends Xmap {
	var $_uids;

	function XmapXML (&$config, &$sitemap) {
		$this->view = 'xml';
		$this->uids = array();
		Xmap::Xmap($config, $sitemap);
	}

	/** Convert sitemap tree to a XML Sitemap list */
	function printNode( &$node ) {
		global $Itemid, $mosConfig_live_site;
		$out = '';

		$len_live_site = strlen( $mosConfig_live_site );
		$link = Xmap::getItemLink($node);

		$is_extern = ( 0 != strcasecmp( mb_substr($link, 0, $len_live_site), $mosConfig_live_site ) );

		if( !isset($node->browserNav) )
			$node->browserNav = 0;

		if( !isset($node->priority) )
			$node->priority = '0.5';

		if( !isset($node->changefreq) )
			$node->changefreq = 'daily';

		if ( $node->browserNav != 3	// ignore "no link"
		 && !$is_extern	// ignore external links
		 && empty($this->_uids[$node->uid]) ) {	// ignore links that have been added already

			$this->count++;
		 	$this->_uids[$node->uid] = 1;

			echo '<url>';
			echo '<loc>', $this->escapeURL($link) ,'</loc>';
			$timestamp = (isset($node->modified) && $node->modified != FALSE && $node->modified != -1) ? $node->modified : time();
			$modified = gmdate('Y-m-d\TH:i:s\Z' . $timestamp);
			echo '<lastmod>' . $modified . '</lastmod>';
   			echo '<changefreq>' . $node->changefreq . '</changefreq>';
			echo '<priority>' . $node->priority . '</priority>';
 			echo '</url>',"\n";
		}
		return true;
	}

		function escapeURL($str) {
			static $xTrans;
			if (!isset($xTrans)) {
				$xTrans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
				foreach ($xTrans as $key => $value)
					$xTrans[$key] = '&#'.ord($key).';';
				// dont translate the '&' in case it is part of &xxx;
				$xTrans[chr(38)] = '&';
			}
			return preg_replace('/&(?![A-Za-z]{0,4}\w{2,3};|#[0-9]{2,4};)/','&amp;' , strtr($str, $xTrans));
		}

		function changeLevel($level) {
				return true;
		}
	
	function startOutput( &$menus, &$config ) {
		global  $mosConfig_live_site;
		@ob_end_clean();
		header('Content-type: text/xml; charset=utf-8');
		echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		if (!$config->exclude_xsl) {
			echo '<?xml-stylesheet type="text/xsl" href="'. $mosConfig_live_site.'/index2.php?option=com_xmap&amp;view=xslfile"?>'."\n";
		}
		echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
	}

	function endOutput( &$menus ) {
		echo "</urlset>\n";
	}

	function startMenu(&$menu) {
		return true;
	}

	function endMenu(&$menu) {
		return true;
	}

}
