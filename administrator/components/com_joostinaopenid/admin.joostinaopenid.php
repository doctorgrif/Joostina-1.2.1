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
// on include 'admin.hello.html.php':
require_once( $mainframe->getPath( 'admin_html' ) );
// get the task:
$task = mosGetParam( $_REQUEST, 'task', '' );
//switch:
switch ($task) {
default:
JoostinaOpenID::Bienvenue();
break;
}
?>