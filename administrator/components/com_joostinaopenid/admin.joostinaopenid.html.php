<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
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