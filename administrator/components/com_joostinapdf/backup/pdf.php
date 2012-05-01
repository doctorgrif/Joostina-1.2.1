<?php
/**
* @version $Id: pdf.php 5073 2006-09-15 23:49:17Z friesengeist $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
* Created by Phil Taylor me@phil-taylor.com
* Support file to display PDF Text Only using class from - http://www.ros.co.nz/pdf/readme.pdf
* HTMLDoc is available from: http://www.easysw.com/htmldoc and needs installing on the server for better HTML to PDF conversion
**/

// ������ ������� �������
defined( '_VALID_MOS' ) or die( '������ ���������' );

function dofreePDF() {
	global $mosConfig_live_site, $mosConfig_sitename, $mosConfig_offset;
	global $mainframe, $database, $my;
	
	$id 		= intval( mosGetParam( $_REQUEST, 'id', 1 ) );
	$gid 		= $my->gid;
	$now 		= _CURRENT_SERVER_TIME;
	$nullDate 	= $database->getNullDate();
	
	// query to check for state and access levels
	$query = "SELECT a.*, cc.name AS category, s.name AS section, s.published AS sec_pub, cc.published AS cat_pub,"
	. "\n  s.access AS sec_access, cc.access AS cat_access, s.id AS sec_id, cc.id as cat_id"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = a.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = cc.section AND s.scope = 'content'"
	. "\n WHERE a.id = " . (int) $id
	. "\n AND a.state = 1"
	. "\n AND a.access <= " . (int) $gid
	. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"	
	;	
	$database->setQuery( $query );
	$row = NULL;
	
	if ( $database->loadObject( $row ) ) {
		/*
		* check whether category is published
		*/
		if ( !$row->cat_pub && $row->catid ) {
			mosNotAuth();  
			return;
		}
		/*
		* check whether section is published
		*/
		if ( !$row->sec_pub && $row->sectionid ) {
			mosNotAuth(); 
			return;
		}
		/*
		* check whether category access level allows access
		*/
		if ( ($row->cat_access > $gid) && $row->catid ) {
			mosNotAuth();  
			return;
		}
		/*
		* check whether section access level allows access
		*/
		if ( ($row->sec_access > $gid) && $row->sectionid ) {
			mosNotAuth();  
			return;
		}
	
	include( 'includes/ezpdf.class.php' );

	$params = new mosParameters( $row->attribs );	
	$params->def( 'author', !$mainframe->getCfg( 'hideAuthor' ) );
	$params->def( 'createdate', !$mainframe->getCfg( 'hideCreateDate' ) );
	$params->def( 'modifydate', !$mainframe->getCfg( 'hideModifyDate' ) );
	
	$row->fulltext 	= pdfCleaner( $row->fulltext );
	$row->introtext = pdfCleaner( $row->introtext );

	$pdf = new Cezpdf( 'utf-8', 'a4', 'P' );  //A4 Portrait
	$pdf -> ezSetCmMargins( 2, 1.5, 1, 1);
	$pdf->selectFont('./fonts/Helvetica.amf' ); //choose font
	//$pdf->charset_in = 'windows-1251'; /*�� �������� ��� �������*/
	$all = $pdf->openObject();
	$pdf->saveState();
	$pdf->setStrokeColor( 0, 0, 0, 1 );

	// footer
	$pdf->addText( 250, 822, 6, $mosConfig_sitename );
	$pdf->line( 10, 40, 578, 40 );
	$pdf->line( 10, 818, 578, 818 );
	$pdf->addText( 30, 34, 6, $mosConfig_live_site );
	$pdf->addText( 250, 34, 6, _PDF_POWERED );
	$pdf->addText( 450, 34, 6, _PDF_GENERATED .' '. date( 'j F, Y, H:i', time() + $mosConfig_offset * 60 * 60 ) );

	$pdf->restoreState();
	$pdf->closeObject();
	$pdf->addObject( $all, 'all' );
	$pdf->ezSetDy( 30 );

	$txt1 = $row->title;
	$pdf->ezText( $txt1, 14 );

	$txt2 = AuthorDateLine( $row, $params );
	$pdf->ezText( $txt2, 8 );
	
	$txt3 = $row->introtext ."\n". $row->fulltext;
	$pdf->ezText( $txt3, 10 );
	
	$pdf->ezStream();
	} else {
		mosNotAuth();
		return;
	}
}

function decodeHTML( $string ) {
	$string = strtr( $string, array_flip(get_html_translation_table( HTML_ENTITIES ) ) );
	$string = preg_replace( "/&#([0-9]+);/me", "chr('\\1')", $string );
	return $string;
}

function get_php_setting ($val ) {
	$r = ( ini_get( $val ) == '1' ? 1 : 0 );
	return $r ? 'ON' : 'OFF';
}

function pdfCleaner( $text ) {	
	// Ugly but needed to get rid of all the stuff the PDF class cant handle
	
	$text = str_replace( '<p>', 			"\n\n", 	$text );
	$text = str_replace( '<P>', 			"\n\n", 	$text );
	$text = str_replace( '<br />', 			"\n", 		$text );
	$text = str_replace( '<br>', 			"\n", 		$text );
	$text = str_replace( '<BR />', 			"\n", 		$text );
	$text = str_replace( '<BR>', 			"\n", 		$text );
	$text = str_replace( '<li>', 			"\n - ", 	$text );
	$text = str_replace( '<LI>', 			"\n - ", 	$text );
	$text = str_replace( '{mosimage}', 		'', 		$text );
	$text = str_replace( '{mospagebreak}', 	'',			$text );
	
	$text = strip_tags( $text );
	$text = decodeHTML( $text );

	return $text;
}

function AuthorDateLine( &$row, &$params ) {
	global $database;
	
	$text = '';
	
	if ( $params->get( 'author' ) ) {
		// Display Author name
		
		//Find Author Name
		$users_rows = new mosUser( $database );
		$users_rows->load( $row->created_by );
		$row->author 	= $users_rows->name;
		$row->usertype 	= $users_rows->usertype;		
		
		if ($row->usertype == 'administrator' || $row->usertype == 'superadministrator') {
			$text .= "\n";
			$text .=  _WRITTEN_BY .' '. ( $row->created_by_alias ? $row->created_by_alias : $row->author );
		} else {
			$text .= "\n";
			$text .=  _AUTHOR_BY .' '. ( $row->created_by_alias ? $row->created_by_alias : $row->author );
		}
	}
	
	if ( $params->get( 'createdate' ) && $params->get( 'author' ) ) {
		// Display Separator
		$text .= "\n";
	}
	
	if ( $params->get( 'createdate' ) ) {
		// Display Created Date
		if ( intval( $row->created ) ) {
			$create_date 	= mosFormatDate( $row->created );
			$text 			.= $create_date;
		}				
	}	
	
	if ( $params->get( 'modifydate' ) && ( $params->get( 'author' ) || $params->get( 'createdate' ) ) ) {
		// Display Separator
		$text .= "\n";
	}
	
	if ( $params->get( 'modifydate' ) ) {
		// Display Modified Date
		if ( intval( $row->modified ) ) {
			$mod_date 	= mosFormatDate( $row->modified );
			$text 		.= _LAST_UPDATED .' '. $mod_date;
			
		}
	}	
	
	$text .= "\n\n";

	return $text;
}

dofreePDF();
?>