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
if(!$acl->acl_check('administration','install','users',$my->usertype,$element.'s','all')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

require_once ($mainframe->getPath('installer_html','component'));

HTML_installer::showInstallForm(_COMPONENT_INSTALL,$option,'component','',dirname(__file__));
?>
<table class="adminlist">
<?php
writableCell('media');
writableCell(ADMINISTRATOR_DIRECTORY.'/components');
writableCell('components');
writableCell('images/stories');
?>
</table>
<?php
showInstalledComponents($option);

/**
* @param string The URL option
*/
function showInstalledComponents($option) {
	global $database,$mosConfig_absolute_path;

	$query = "SELECT*"
			."\n FROM #__components"
			."\n WHERE parent = 0"
			."\n AND iscore = 0"
			."\n ORDER BY name";
	$database->setQuery($query);
	$rows = $database->loadObjectList();

	// Read the component dir to find components
	$componentBaseDir = mosPathName($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components');
	$componentDirs = mosReadDirectory($componentBaseDir);

	$n = count($rows);
	for($i = 0; $i < $n; $i++) {
		$row = &$rows[$i];

		$dirName = $componentBaseDir.$row->option;
		$xmlFilesInDir = mosReadDirectory($dirName,'.xml$');

		foreach($xmlFilesInDir as $xmlfile) {
			// Read the file to see if it's a valid component XML file
			$xmlDoc = new DOMIT_Lite_Document();
			$xmlDoc->resolveErrors(true);

			if(!$xmlDoc->loadXML($dirName.'/'.$xmlfile,false,true)) {
				continue;
			}

			$root = &$xmlDoc->documentElement;

			if($root->getTagName() != 'mosinstall') {
				continue;
			}
			if($root->getAttribute("type") != "component") {
				continue;
			}

			$element = &$root->getElementsByPath('creationDate',1);
			$row->creationdate = $element?$element->getText():'Неизвестно';

			$element = &$root->getElementsByPath('author',1);
			$row->author = $element?$element->getText():'Неизвестно';

			$element = &$root->getElementsByPath('copyright',1);
			$row->copyright = $element?$element->getText():'';

			$element = &$root->getElementsByPath('authorEmail',1);
			$row->authorEmail = $element?$element->getText():'';

			$element = &$root->getElementsByPath('authorUrl',1);
			$row->authorUrl = $element?$element->getText():'';

			$element = &$root->getElementsByPath('version',1);
			$row->version = $element?$element->getText():'';

			$row->mosname = strtolower(str_replace(" ","_",$row->name));
		}
	}

	HTML_component::showInstalledComponents($rows,$option);
}
?>
