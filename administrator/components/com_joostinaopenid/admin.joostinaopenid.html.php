<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// ������ ������� �������
defined( '_VALID_MOS' ) or die();

/*** @package JoostinaOpenID */
class JoostinaOpenID {
/**
* Methode
* @return patTemplate
*/
function &createTemplate() {
global $option, $mosConfig_absolute_path;
require_once( $mosConfig_absolute_path . '/includes/patTemplate/patTemplate.php' );
$tmpl =& patFactory::createTemplate( $option, true, false );
$tmpl->setRoot( dirname( __FILE__ ) . '/tmpl' );
return $tmpl;
}
/** Welcome */
function Bienvenue() {
$tmpl =& JoostinaOpenID::createTemplate();
// fill (<body>) with 'tmpl/about.html':
$tmpl->setAttribute( 'body', 'src', 'about.html' );
$tmpl->displayParsedTemplate( 'form' );
}
}
?>