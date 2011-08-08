<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или LICENSE.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для просмотра подробностей и замечаний об авторском праве, смотрите файл COPYRIGHT.php.
*/
/** Imports */
require_once($mosConfig_absolute_path.'/includes/openid/Auth/OpenID.php' );
/**
 * Object that holds the state of a request to the OpenID server
 * With accessor functions to get at the internal request data.
 * @see Auth_OpenID_Server
 * @package OpenID
 */
class Auth_OpenID_ServerRequest {
function Auth_OpenID_ServerRequest()
{
$this->mode = null;
}
}
?>