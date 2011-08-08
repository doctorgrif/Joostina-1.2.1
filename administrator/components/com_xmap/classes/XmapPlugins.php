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

global $mosConfig_absolute_path;
require_once($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/classes/XmapPlugin.php');

/** Wraps all extension functions for Xmap */
class XmapPlugins {

	/** list all extension files found in the extensions directory */
	function &loadAvailablePlugins( ) {
		global $database,$mosConfig_absolute_path;
		$list = array();

		$query="select * from `#__xmap_ext` where `published`=1 and extension not like '%.bak'";
		$database->setQuery($query);
		$rows = $database->loadAssocList();
		foreach ($rows as $row) {
			$extension = new XmapPlugin($database);
			$extension->bind($row);
			require_once($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/extensions/'. $extension->extension.'.php');
			$list[$extension->extension] = $extension;
		}
		return $list;
	}

	/** Determine which extension-object handles this content and let it generate a tree */
	function &printTree( &$xmap, &$parent, &$cache, &$extensions ) {
		$result = null;

		$matches=array();
		if ( preg_match('#^/?index.php.*option=(com_[^&]+)#',$parent->link,$matches) ) {
			$option = $matches[1];
			if ( !empty($extensions[$option]) ) {
				$parent->uid = "plug".$extensions[$option]->id;
				$className = 'xmap_'.$option;
				$result = call_user_func_array(array($className, 'getTree'),array(&$xmap,&$parent,$extensions[$option]->getParams()));
			}
		}
		return $result;
	}
}
