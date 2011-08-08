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
* Module installer
* @package Joostina
*/
class mosInstallerModule extends mosInstaller {
	/**
	* Custom install method
	* @param boolean True if installing from directory
	*/
	function install($p_fromdir = null) {
		global $mosConfig_absolute_path,$database;
		josSpoofCheck();
		if(!$this->preInstallCheck($p_fromdir,'module')) {
			return false;
		}

		$xmlDoc = $this->xmlDoc();
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
		$this->elementDir(mosPathName($mosConfig_absolute_path.($client == 'admin'?'/'.ADMINISTRATOR_DIRECTORY:'').'/modules/'));

		$e = &$mosinstall->getElementsByPath('position',1);
		if(!is_null($e)) {
			$position = $e->getText();

			if($e->getAttribute('published') == '1') {
				$published = 1;
			} else {
				$published = 0;
			}
		} else {
			$position = 'left';
			$published = 0;
		}

		if($this->parseFiles('files','module',_NO_FILES_MODULES) === false) {
			return false;
		}
		$this->parseFiles('images');

		$client_id = intval($client == 'admin');
		// Insert in module in DB
		$query = "SELECT id FROM #__modules WHERE module = ".$database->Quote($this->elementSpecial())."\n AND client_id = ".(int)$client_id;
		$database->setQuery($query);
		if(!$database->query()) {
			$this->setError(1,_SQL_ERROR.': '.$database->stderr(true));
			return false;
		}

		$id = $database->loadResult();

		if(!$id) {
			$row = new mosModule($database);
			$row->title = $this->elementName();
			$row->ordering = 99;
			$row->published = $published;
			$row->position = $position;
			$row->showtitle = 1;
			$row->iscore = 0;
			$row->access = $client == 'admin'?99:0;
			$row->client_id = $client_id;
			$row->module = $this->elementSpecial();

			$row->store();

			$query = "INSERT INTO #__modules_menu VALUES ( ".(int)$row->id.", 0 )";
			$database->setQuery($query);
			if(!$database->query()) {
				$this->setError(1,_SQL_ERROR.': '.$database->stderr(true));
				return false;
			}
		} else {
			$this->setError(1,_MAMBOT.' "'.$this->elementName().'" '._ALREADY_EXISTS);
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
		josSpoofCheck();
		$id = intval($id);

		$query = "SELECT module, iscore, client_id FROM #__modules WHERE id = ".(int)
			$id;
		$database->setQuery($query);
		$row = null;
		$database->loadObject($row);

		if($row->iscore) {
			HTML_installer::showInstallMessage($row->title.' - '._IS_PART_OF_CMS,_UNINSTALL_ERROR,$this->returnTo($option,'module',$row->client_id?'':'admin'));
			exit();
		}

		$query = "SELECT id FROM #__modules WHERE module = ".$database->Quote($row->module)." AND client_id = ".(int)$row->client_id;
		$database->setQuery($query);
		$modules = $database->loadResultArray();

		if(count($modules)) {
			mosArrayToInts($modules);
			$modID = 'moduleid='.implode(' OR moduleid=',$modules);

			$query = "DELETE FROM #__modules_menu WHERE ( $modID )";
			$database->setQuery($query);
			if(!$database->query()) {
				$msg = $database->stderr;
				die($msg);
			}

			$query = "DELETE FROM #__modules WHERE module = ".$database->Quote($row->module)." AND client_id = ".(int)$row->client_id;
			$database->setQuery($query);
			if(!$database->query()) {
				$msg = $database->stderr;
				die($msg);
			}

			if(!$row->client_id) {
				$basepath = $mosConfig_absolute_path.'/modules/';
			} else {
				$basepath = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/modules/';
			}

			$xmlfile = $basepath.$row->module.'.xml';

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
							if(file_exists($basepath.$filename)) {
								$parts = pathinfo($filename);
								$subpath = $parts['dirname'];
								if($subpath != '' && $subpath != '.' && $subpath != '..') {
									echo '<br />'._DELETING.': '.$basepath.$subpath;
									$result = deldir(mosPathName($basepath.$subpath.'/'));
								} else {
									echo '<br />'._DELETING.': '.$basepath.$filename;
									$result = unlink(mosPathName($basepath.$filename,false));
								}
								echo intval($result);
							}
						}

						// remove XML file from front
						echo _DELETING_XML_FILE.": $xmlfile";
						@unlink(mosPathName($xmlfile,false));
						return true;
					}
				}
			}
		}

	}
}
?>