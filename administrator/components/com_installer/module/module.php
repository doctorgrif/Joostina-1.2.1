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

// ensure user has access to this function
if(!$acl->acl_check('administration','install','users',$my->usertype,$element.'s','all')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

require_once ($mainframe->getPath('installer_html','module'));

HTML_installer::showInstallForm(_MODULE_INSTALL,$option,'module','',dirname(__file__));
?>
<table class="adminlist">
<?php
writableCell('media');
writableCell(ADMINISTRATOR_DIRECTORY.'/modules');
writableCell('modules');
?>
</table>
<?php
showInstalledModules($option);

/**
* @param string The URL option
*/
function showInstalledModules($_option) {
	global $database,$mosConfig_absolute_path;

	$filter = mosGetParam($_POST,'filter','');
	$select[] = mosHTML::makeOption('',_CMN_ALL);
	$select[] = mosHTML::makeOption('0',_SITE_MODULES);
	$select[] = mosHTML::makeOption('1',_ADMIN_MODULES);
	$lists['filter'] = mosHTML::selectList($select,'filter','class="inputbox" size="1" onchange="document.adminForm.submit();"','value','text',$filter);
	if($filter == null) {
		$and = '';
	} else
		if(!$filter) {
			$and = "\n AND client_id = 0";
		} else
			if($filter) {
				$and = "\n AND client_id = 1";
			}

	$query = "SELECT id, module, client_id FROM #__modules WHERE module LIKE 'mod_%' AND iscore='0'".$and."\n GROUP BY module, client_id ORDER BY client_id, module";
	$database->setQuery($query);
	$rows = $database->loadObjectList();

	$n = count($rows);
	for($i = 0; $i < $n; $i++) {
		$row = &$rows[$i];

		// path to module directory
		if($row->client_id == "1") {
			$moduleBaseDir = mosPathName(mosPathName($mosConfig_absolute_path).ADMINISTRATOR_DIRECTORY."/modules");
		} else {
			$moduleBaseDir = mosPathName(mosPathName($mosConfig_absolute_path)."modules");
		}

		// xml file for module
		$xmlfile = $moduleBaseDir."/".$row->module.".xml";

		if(file_exists($xmlfile)) {
			$xmlDoc = new DOMIT_Lite_Document();
			$xmlDoc->resolveErrors(true);
			if(!$xmlDoc->loadXML($xmlfile,false,true)) {
				continue;
			}

			$root = &$xmlDoc->documentElement;

			if($root->getTagName() != 'mosinstall') {
				continue;
			}
			if($root->getAttribute("type") != "module") {
				continue;
			}

			$element = &$root->getElementsByPath('creationDate',1);
			$row->creationdate = $element?$element->getText():'';

			$element = &$root->getElementsByPath('author',1);
			$row->author = $element?$element->getText():'';

			$element = &$root->getElementsByPath('copyright',1);
			$row->copyright = $element?$element->getText():'';

			$element = &$root->getElementsByPath('authorEmail',1);
			$row->authorEmail = $element?$element->getText():'';

			$element = &$root->getElementsByPath('authorUrl',1);
			$row->authorUrl = $element?$element->getText():'';

			$element = &$root->getElementsByPath('version',1);
			$row->version = $element?$element->getText():'';
		}
	}

	HTML_module::showInstalledModules($rows,$_option,$xmlfile,$lists);
}
?>