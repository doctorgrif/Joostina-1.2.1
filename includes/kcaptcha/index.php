<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� LICENSE.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ������������ � ��������� �� ��������� �����, �������� ���� COPYRIGHT.php.
*/
error_reporting(E_ALL);
include ('kcaptcha.php');
if(isset($_REQUEST[session_name()])) {
session_start();
}
$captcha = new KCAPTCHA();
if($_REQUEST[session_name()]) {
$_SESSION['captcha_keystring'] = $captcha->getKeyString();
}
?>