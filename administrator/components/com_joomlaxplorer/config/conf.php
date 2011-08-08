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

//------------------------------------------------------------------------------
// Configuration Variables
global $mosConfig_absolute_path,$mosConfig_live_site,$mosConfig_joomlaxplorer_dir;
// login to use joomlaXplorer: (true/false)
$GLOBALS["require_login"] = false;

$GLOBALS["language"] = $mosConfig_lang;

// the filename of the QuiXplorer script: (you rarely need to change this)
if($_SERVER['SERVER_PORT'] == 443) {
	$GLOBALS["script_name"] = "https://".$GLOBALS['__SERVER']['HTTP_HOST'].$GLOBALS['__SERVER']["PHP_SELF"];
} else {
	$GLOBALS["script_name"] = "http://".$GLOBALS['__SERVER']['HTTP_HOST'].$GLOBALS['__SERVER']["PHP_SELF"];
}

// allow Zip, Tar, TGz -> Only (experimental) Zip-support
if(function_exists("gzcompress")) {
	$GLOBALS["zip"] = $GLOBALS["tgz"] = true;
} else {
	$GLOBALS["zip"] = $GLOBALS["tgz"] = false;
}

if(strstr($mosConfig_absolute_path,"/")) {
	$GLOBALS["separator"] = "/";
} else {
	$GLOBALS["separator"] = "\\";
}

// ���� � ���������� ������������ �� �������� ���������� ���� � ����� ��������� ��������� - �� ����� ������� �� ������ �����
if(($mosConfig_joomlaxplorer_dir=='') OR ($mosConfig_joomlaxplorer_dir=='0') ) $mosConfig_joomlaxplorer_dir = $mosConfig_absolute_path;
// the home directory for the filemanager: (use '/', not '\' or '\\', no trailing '/')

$dir_above = substr($mosConfig_absolute_path,0,strrpos($mosConfig_absolute_path,$GLOBALS["separator"]));

if(!@is_readable($dir_above)) {
	$GLOBALS["home_dir"] = $mosConfig_absolute_path;
	// the url corresponding with the home directory: (no trailing '/')
	$GLOBALS["home_url"] = $mosConfig_live_site;
} else {
	$GLOBALS["home_dir"] = $mosConfig_joomlaxplorer_dir;
	// the url corresponding with the home directory: (no trailing '/')
	$GLOBALS["home_url"] = substr($mosConfig_live_site,0,strrpos($mosConfig_live_site,'/'));
}

// show hidden files in QuiXplorer: (hide files starting with '.', as in Linux/UNIX)
$GLOBALS["show_hidden"] = true;

// filenames not allowed to access: (uses PCRE regex syntax)
$GLOBALS["no_access"] = "^\.ht";

// user permissions bitfield: (1=modify, 2=password, 4=admin, add the numbers)
$GLOBALS["permissions"] = 7;

?>
