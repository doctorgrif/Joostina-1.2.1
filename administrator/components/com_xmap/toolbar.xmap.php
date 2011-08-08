<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

defined('_VALID_MOS') or die();

// load language file
if( file_exists($GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/language/'.$GLOBALS['mosConfig_lang'].'.php') ) {
	require_once( $GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/language/'.$GLOBALS['mosConfig_lang'].'.php' );
} else {
	require_once( $GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/language/english.php' );
}
// load html output class
require_once( $mainframe->getPath( 'toolbar_html' ) );

$act = mosGetParam( $_REQUEST, 'act', '' );
if ($act) {
	$task = $act;
}

switch ($task) {
	default:
		TOOLBAR_xmap::_DEFAULT();
		break;
}
?>