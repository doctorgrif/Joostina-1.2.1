<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die();

// XML library
require_once ($mosConfig_absolute_path.'/includes/domit/xml_domit_lite_include.php');
require_once ($mainframe->getPath('admin_html'));
require_once ($mainframe->getPath('class'));

$element	= mosGetParam($_REQUEST,'element','');
$client		= mosGetParam($_REQUEST,'client','');
$path		= $mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_installer/$element/$element.php";

// ensure user has access to this function
if(!$acl->acl_check('administration','install','users',$my->usertype,$element.'s','all')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

// map the element to the required derived class
$classMap = array(
	'component' => 'mosInstallerComponent'
	,'language' => 'mosInstallerLanguage'
	,'mambot' =>   'mosInstallerMambot'
	,'module' =>   'mosInstallerModule'
	,'template' => 'mosInstallerTemplate');

if(array_key_exists($element,$classMap)) {
	require_once ($mainframe->getPath('installer_class',$element));

	switch($task) {

		case 'uploadfile':
			uploadPackage($classMap[$element],$option,$element,$client);
			js_menu_cache_clear();
			break;

		case 'installfromdir':
			installFromDirectory($classMap[$element],$option,$element,$client);
			js_menu_cache_clear();
			break;

		case 'remove':
			removeElement($classMap[$element],$option,$element,$client);
			js_menu_cache_clear();
			break;

		default:
			$path = $mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_installer/$element/$element.php";

			if(file_exists($path)) {
				require $path;
			} else {
				echo "[$element] - "._NO_INSTALLER;
			}
			break;
	}
} else {
	echo _CANNOT_INSTALL."[$element]";
}

/**
* @param string The class name for the installer
* @param string The URL option
* @param string The element name
*/
function uploadPackage($installerClass,$option,$element,$client) {
	$installer = new $installerClass();
	josSpoofCheck();
	// Check if file uploads are enabled
	if(!(bool)ini_get('file_uploads')) {
		HTML_installer::showInstallMessage(_CANNOT_INSTALL_DISABLED_UPLOAD,_INSTALL_ERROR,$installer->returnTo($option,$element,$client));
		exit();
	}

	// Check that the zlib is available
	if(!extension_loaded('zlib')) {
		HTML_installer::showInstallMessage(_CANNOT_INSTALL_NO_ZLIB,_INSTALL_ERROR,$installer->returnTo($option,$element,$client));
		exit();
	}

	$userfile = mosGetParam($_FILES,'userfile',null);

	if(!$userfile) {
		HTML_installer::showInstallMessage(_NO_FILE_CHOOSED,_ERORR_UPLOADING_EXT,$installer->returnTo($option,$element,$client));
		exit();
	}

	$userfile_name = $userfile['name'];

	$msg = '';
	$resultdir = uploadFile($userfile['tmp_name'],$userfile['name'],$msg);

	if($resultdir !== false) {
		if(!$installer->upload($userfile['name'])) {
			HTML_installer::showInstallMessage($installer->getError(),_UPLOADING_ERROR.' '.$element,$installer->returnTo($option,$element,$client));
		}
		$ret = $installer->install();

		HTML_installer::showInstallMessage($installer->getError(),$element.' - '.($ret? _SUCCESS :_UNSUCCESS),$installer->returnTo($option,$element,$client));
		cleanupInstall($userfile['name'],$installer->unpackDir());
	} else {
		HTML_installer::showInstallMessage($msg,$element.' - '._UPLOADING_ERROR,$installer->returnTo($option,$element,$client));
	}
}

/**
* Install a template from a directory
* @param string The URL option
*/
function installFromDirectory($installerClass,$option,$element,$client) {
	$userfile = mosGetParam($_REQUEST,'userfile','');
	josSpoofCheck();
	if(!$userfile) {
		mosRedirect("index2.php?option=$option&element=module",_CHOOSE_DIRECTORY_PLEASE);
	}

	$installer = new $installerClass();

	$path = mosPathName($userfile);
	if(!is_dir($path)) {
		$path = dirname($path);
	}

	$ret = $installer->install($path);
	HTML_installer::showInstallMessage($installer->getError(),_UPLOAD_OF_EXT.': '.$element.' - '.($ret?_SUCCESS:_UNSUCCESS),$installer->returnTo($option,$element,$client));
}
/**
*
* @param
*/
function removeElement($installerClass,$option,$element,$client) {
	josSpoofCheck(null, null, 'request');
	$cid = mosGetParam($_REQUEST,'cid',array(0));
	if(!is_array($cid)) {
		$cid = array(0);
	}

	$installer = new $installerClass();
	$result = false;
	if($cid[0]) {
		$result = $installer->uninstall($cid[0],$option,$client);
	}

	$msg = $installer->getError();

	mosRedirect($installer->returnTo($option,$element,$client),$result?_DELETE_SUCCESS.' '.$msg : _UNSUCCESS.' '.$msg);
}
/**
* @param string The name of the php (temporary) uploaded file
* @param string The name of the file to put in the temp directory
* @param string The message to return
*/
function uploadFile($filename,$userfile_name,&$msg) {
	josSpoofCheck();
	global $mosConfig_absolute_path;
	$baseDir = mosPathName($mosConfig_absolute_path.'/media');

	if(file_exists($baseDir)) {
		if(is_writable($baseDir)) {
			if(move_uploaded_file($filename,$baseDir.$userfile_name)) {
				if(mosChmod($baseDir.$userfile_name)) {
					return true;
				} else {
					$msg = _CANNOT_CHMOD;
				}
			} else {
				$msg = _CANNOT_MOVE_TO_MEDIA;
			}
		} else {
			$msg = _CANNOT_WRITE_TO_MEDIA;
		}
	} else {
		$msg = _CANNOT_INSTALL_NO_MEDIA;
	}
	return false;
}
?>
