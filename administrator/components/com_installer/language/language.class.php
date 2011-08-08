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
* Language installer
* @package Joostina
* @subpackage Installer
*/
class mosInstallerLanguage extends mosInstaller {
	/**
	* Custom install method
	* @param boolean True if installing from directory
	*/
	function install($p_fromdir = null) {
		global $mosConfig_absolute_path,$database;
		josSpoofCheck();
		if(!$this->preInstallCheck($p_fromdir,'language')) {
			return false;
		}

		$xmlDoc = $this->xmlDoc();
		$root = &$xmlDoc->documentElement;

		// Set some vars
		$e = &$root->getElementsByPath('name',1);
		$this->elementName($e->getText());
		$this->elementDir(mosPathName($mosConfig_absolute_path."/language/"));

		// Find files to copy
		if($this->parseFiles('files','language') === false) {
			return false;
		}
		if($e = &$root->getElementsByPath('description',1)) {
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
		global $mosConfig_absolute_path;
		josSpoofCheck(null, null, 'request');
		$id = str_replace(array('\\','/'),'',$id);
		$basepath = $mosConfig_absolute_path.'/language/';
		$xmlfile = $basepath.$id.'.xml';

		// see if there is an xml install file, must be same name as element
		if(file_exists($xmlfile)) {
			$this->i_xmldoc = new DOMIT_Lite_Document();
			$this->i_xmldoc->resolveErrors(true);

			if($this->i_xmldoc->loadXML($xmlfile,false,true)) {
				$mosinstall = &$this->i_xmldoc->documentElement;
				// get the files element
				$files_element = &$mosinstall->getElementsByPath('files',1);

				if(!is_null($files_element)) {
					$files = $files_element->childNodes;
					foreach($files as $file) {
						// delete the files
						$filename = $file->getText();
						echo $filename;
						if(file_exists($basepath.$filename)) {
							echo '<br />'._DELETING.': '.$basepath.$filename;
							$result = unlink($basepath.$filename);
						}
						echo intval($result);
					}
				}
			}
		} else {
			HTML_installer::showInstallMessage(_CANNOT_DEL_LANG_ID,_UNINSTALL_ERROR,$this->returnTo($option,'language',$client));
			exit();
		}

		// remove XML file from front
		@unlink($xmlfile);

		return true;
	}
	/**
	* return to method
	*/
	function returnTo($option,$element,$client) {
		return "index2.php?option=com_languages";
	}

}
?>