<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
/**
* �������� ����������� ���������� ���������� (Register Globals Emulation) ������ �� �������������
* � ���� �����. ������ ���� �������� ������������� � ���������� ������������ �����, � �����������.
*/
if (defined('RG_EMULATION') === false) {
	if (file_exists(dirname(__file__).'/configuration.php')) {
		require (dirname(__file__).'/configuration.php');
	}
	if (defined('RG_EMULATION') === false) {
// The configuration file is old so default to on
		define('RG_EMULATION', 0);
	}
}
/**
* Adds an array to the GLOBALS array and checks that the GLOBALS variable is not being attacked
* @param array
* @param boolean True if the array is to be added to the GLOBALS
*/
function checkInputArray(&$array, $globalise = false) {
	static $banned = array('_files', '_env', '_get', '_post', '_cookie', '_server', '_session', 'globals');
	foreach ($array as $key => $value) {
// PHP GLOBALS injection bug
		$failed = in_array(strtolower($key), $banned);
// PHP Zend_Hash_Del_Key_Or_Index bug
		$failed |= is_numeric($key);
		if ($failed) {
			die(_FAILED_ITEM.' <strong>'.implode('</strong> '._OR.' <strong>', $banned).'</strong> '._IN_SCRIPT);
		}
		if ($globalise) {
			$GLOBALS[$key] = $value;
		}
	}
}
// �������� register globals = off
function unregisterGlobals() {
	checkInputArray($_FILES);
	checkInputArray($_ENV);
	checkInputArray($_GET);
	checkInputArray($_POST);
	checkInputArray($_COOKIE);
	checkInputArray($_SERVER);
	if (isset($_SESSION)) {
		checkInputArray($_SESSION);
	}
	$REQUEST = $_REQUEST;
	$GET = $_GET;
	$POST = $_POST;
	$COOKIE = $_COOKIE;
	if (isset($_SESSION)) {
		$SESSION = $_SESSION;
	}
	$FILES = $_FILES;
	$ENV = $_ENV;
	$SERVER = $_SERVER;
	foreach ($GLOBALS as $key => $value) {
		if ($key != 'GLOBALS') {
			unset($GLOBALS[$key]);
		}
	}
	$_REQUEST = $REQUEST;
	$_GET = $GET;
	$_POST = $POST;
	$_COOKIE = $COOKIE;
	if (isset($SESSION)) {
		$_SESSION = $SESSION;
	}
	$_FILES = $FILES;
	$_ENV = $ENV;
	$_SERVER = $SERVER;
}
// �������� register globals = on
function registerGlobals() {
	checkInputArray($_FILES, true);
	checkInputArray($_ENV, true);
	checkInputArray($_GET, true);
	checkInputArray($_POST, true);
	checkInputArray($_COOKIE, true);
	checkInputArray($_SERVER, true);
	if (isset($_SESSION)) {
		checkInputArray($_SESSION, true);
	}
	foreach ($_FILES as $key => $value) {
		$GLOBALS[$key] = $_FILES[$key]['tmp_name'];
		foreach ($value as $ext => $value2) {
			$key2 = $key.'_'.$ext;
			$GLOBALS[$key2] = $value2;
		}
	}
}
if (RG_EMULATION == 0) {
// force register_globals = off
	unregisterGlobals();
	if (file_exists(dirname(__file__).'/configuration.php')) {
		require (dirname(__file__).'/configuration.php');
	}
} else
if (ini_get('register_globals') == 0) {
// php.ini has register_globals = off and emulate = on
	registerGlobals();
} else {
// php.ini has register_globals = on and emulate = on
// just check for spoofing
	checkInputArray($_FILES);
	checkInputArray($_ENV);
	checkInputArray($_GET);
	checkInputArray($_POST);
	checkInputArray($_COOKIE);
	checkInputArray($_SERVER);
	if (isset($_SESSION)) {
		checkInputArray($_SESSION);
	}
}
?>