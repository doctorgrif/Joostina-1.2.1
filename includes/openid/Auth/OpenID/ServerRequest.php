<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� LICENSE.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ������������ � ��������� �� ��������� �����, �������� ���� COPYRIGHT.php.
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