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

// ensure user has access to this function
if(!$acl->acl_check('administration','manage','users',$GLOBALS['my']->usertype,'components','com_templates')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

/**
* Template installer
* @package Joostina
* @subpackage Installer
*/
class mosInstallerTemplate extends mosInstaller {
	/**
	* Custom install method
	* @param boolean True if installing from directory
	*/
	function install($p_fromdir = null) {
		global $mosConfig_absolute_path,$database;
		josSpoofCheck();
		if(!$this->preInstallCheck($p_fromdir,'template')) {
			return false;
		}

		$xmlDoc = &$this->xmlDoc();
		$mosinstall = &$xmlDoc->documentElement;

		$client = '';
		if($mosinstall->getAttribute('client')) {
			$validClients = array('administrator');
			if(!in_array($mosinstall->getAttribute('client'),$validClients)) {
				$this->setError(1,_UNKNOWN_CLIENT.' ['.$mosinstall->getAttribute('client').']');
				return false;
			}
			$client = 'admin';
		}

		// Set some vars
		$e = &$mosinstall->getElementsByPath('name',1);
		$this->elementName($e->getText());
		$this->elementDir(mosPathName($mosConfig_absolute_path.($client == 'admin'?'/'.ADMINISTRATOR_DIRECTORY:'').'/templates/'.strtolower(str_replace(" ","_",$this->elementName()))));

		if(!file_exists($this->elementDir()) && !mosMakePath($this->elementDir())) {
			$this->setError(1,_CANNOT_CREATE_DIR.' "'.$this->elementDir().'"');
			return false;
		}

		if($this->parseFiles('files') === false) {
			return false;
		}
		if($this->parseFiles('images') === false) {
			return false;
		}
		if($this->parseFiles('css') === false) {
			return false;
		}
		if($this->parseFiles('media') === false) {
			return false;
		}
		if($e = &$mosinstall->getElementsByPath('description',1)) {
			$this->setError(0,$this->elementName().'<p>'.$e->getText().'</p>');
		}

		return $this->copySetupFile('front');
	}
	/**
	* Custom install method
	* @param int The id of the module
	* @param string The URL option
	* @param int The client id
	*/
	function uninstall($id,$option,$client = 0) {
		global $database,$mosConfig_absolute_path;
		josSpoofCheck(null, null, 'request');
		// Delete directories
		$path = $mosConfig_absolute_path.($client == 'admin' ? '/'.ADMINISTRATOR_DIRECTORY:'').'/templates/'.$id;

		$id = str_replace('..','',$id);
		if(trim($id)) {
			if(is_dir($path)) {
				return deldir(mosPathName($path));
			} else {
				HTML_installer::showInstallMessage(_CANNOT_DEL_FILE_NO_DIR,_UNINSTALL_ERROR,$this->returnTo($option,'template',$client));
			}
		} else {
			HTML_installer::showInstallMessage(_WRONG_ID,_UNINSTALL_ERROR,$this->returnTo($option,'template',$client));
			exit();
		}
	}
	/**
	* return to method
	*/
	function returnTo($option,$element,$client) {
		return "index2.php?option=com_templates&client=$client";
	}
}
?>