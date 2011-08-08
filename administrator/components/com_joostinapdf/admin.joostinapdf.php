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

global $version, $action, $parentid, $forumname, $catid, $newparent, $msg, $deleteSig, $signature, $newview, $user_id, $thread, $prev_display, $prev_catdisplay, $display, $order, $moderator;
global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;
global $my;

$thisComponent = 'joostinapdf';
require_once ($mainframe->getPath('admin_html'));
require_once (dirname(__FILE__) .'/utils.php');

//Get right Language file
$file = $mosConfig_absolute_path . '/administrator/components/com_' . $thisComponent . '/language/';
if (file_exists($file . $mosConfig_lang . '.php')) {
	include ($file . $mosConfig_lang . '.php');
} else {
	// Fallback to english
	include ($file . 'english.php');
}

// Include configuration file
$configFile = $mosConfig_absolute_path . '/administrator/components/com_' . $thisComponent . '/joostinapdf_config.php';
if (file_exists($configFile)) {
	include ($configFile);
} else {
	die(_JOOPDF_PP_CONFIG_ERROR_FIND . $configFile);
}
// Use config variable
global $joopdf_pp_Config;

$cid = mosGetParam($_POST, 'cid', array (
	0
));

if (!is_array($cid)) {
	// Put single value into array
	$cid = array (
		intval($cid
	));
} else {
	// Loop over all id's and make them int so they are fairly safe! 
	for ($i = 0; $i < count($cid); $i++) {
		$cid[$i] = intval($cid[$i]);
	}
}
// Check if writeable
$permission = is_writable($configFile);
if (!$permission) {
	// Change permission
	@ chmod($configFile, 0766);
	// Check if succeeded
	$permission = is_writable($configFile);
}

if (!$permission) {
	echo _JOOPDF_PP_WARNING;
	echo _JOOPDF_PP_WARNING_CHMOD_1 . $configFile . _JOOPDF_PP_WARNING_CHMOD_2;
	echo _JOOPDF_PP_WARNING_CHMOD;
}

// switch on tasks
switch ($task) {
	case "styleconfig" :
		styleConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "templateconfig" :
		templateConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "headerfooterconfig" :
		headerFooterConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "promotionconfig" :
		promotionConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "replacementconfig" :
		replacementConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "install" :
		install($joopdf_pp_Config, $configFile, $option);
		break;

	case "do_install" :
		do_install($joopdf_pp_Config, $configFile, $option);
		break;

	case "restore" :
		restore($joopdf_pp_Config, $configFile, $option);
		break;

	case "do_restore" :
		do_restore($joopdf_pp_Config, $configFile, $option);
		break;

	case "saveConfig" :
		saveConfig($joopdf_pp_Config, $option);
		break;

	case "cache" :
		cacheConfig($joopdf_pp_Config, $configFile, $option);
		break;

	case "cacheremovefiles" :
		cacheRemoveFiles($joopdf_pp_Config, $configFile, $option);
		break;

	case 'cpanel' :
	default :
		HTML_joostinapdf :: controlPanel($joopdf_pp_Config);
		break;
}

//===============================
// Config Functions
//===============================

function styleConfig($joopdf_Config, $configFile, $option) {
	global $database;
	global $mosConfig_lang, $mosConfig_absolute_path;
	global $mosConfig_admin_template, $mosConfig_live_site;

	$encodingTxts = array (
		'std' => 'Standard build-in',
		'cp1250' => 'cp1250 - Central Europe',
		'cp1251' => 'cp1251 - Cyrillic',
		'cp1252' => 'cp1252 - Western Europe',
		'cp1253' => 'cp1253 - Greek',
		'cp1254' => 'cp1254 - Turkish',
		'cp1255' => 'cp1255 - Hebrew',
		'cp1257' => 'cp1257 - Baltic',
		'cp1258' => 'cp1258 - Vietnamese',
		'cp874' => 'cp874 - Thai',
		'ISO-8859-1' => 'ISO-8859-1 - Western Europe',
		'ISO-8859-2' => 'ISO-8859-2 - Central Europe',
		'ISO-8859-4' => 'ISO-8859-4 - Baltic',
		'ISO-8859-5' => 'ISO-8859-5 - Cyrillic',
		'ISO-8859-7' => 'ISO-8859-7 - Greek',
		'ISO-8859-9' => 'ISO-8859-9 - Turkish',
		'ISO-8859-11' => 'ISO-8859-11 - Thai',
		'ISO-8859-15' => 'ISO-8859-15 - Western Europe',
		'ISO-8859-16' => 'ISO-8859-16 - Central Europe',
		'KOI8-R' => 'KOI8-R - Russian',
		'KOI8-U' => 'KOI8-U - Ukrainian'
	);

	$lists = array ();

	require_once (dirname(__FILE__) . '/fpdf_joostinapdf.php');

	$fpdf = new FPDF_JOOPDF();

	// Create option list of fonts
	$list = array ();
	foreach ($fpdf->CoreFonts as $id => $name) {
		$list[] = mosHTML :: makeOption($id, $name);
	}

	$fontDirs = searchdir($mosConfig_absolute_path . '/administrator/components/com_joostinapdf/', 'font.', 0);
	// Create option list of encodings
	$encodingList = array ();
	foreach ($fontDirs as $name) {
		$idx = strpos($name, 'font.');
		if ($idx > 0) {
			$name = substr($name, $idx +5, strlen($name));
			$encodingList[] = mosHTML :: makeOption($name, $encodingTxts[$name]);

		}
	}

	// build the titlefonts select list
	$lists['cfg_standardTitleFont'] = mosHTML :: selectList($list, 'cfg_standardTitleFont', 'class="inputbox" size="1"', 'value', 'text', $joopdf_Config['standardTitleFont']);
	// build the titlefonts select list
	$lists['cfg_standardFont'] = mosHTML :: selectList($list, 'cfg_standardFont', 'class="inputbox" size="1"', 'value', 'text', $joopdf_Config['standardFont']);
	// Build supported encodings list
	$lists['cfg_standardEncoding'] = mosHTML :: selectList($encodingList, 'cfg_standardEncoding', 'class="inputbox" size="1"', 'value', 'text', $joopdf_Config['standardEncoding']);
	$lists['cfg_showImages'] = mosHTML :: yesnoRadioList('cfg_showImages', 'class="inputbox"', $joopdf_Config['showImages']);
	$arr = array (
		mosHTML :: makeOption('c',
		_JOOPDF_PP_IMAGE_ALIGN_C
	), mosHTML :: makeOption('l', _JOOPDF_PP_IMAGE_ALIGN_L), mosHTML :: makeOption('r', _JOOPDF_PP_IMAGE_ALIGN_R));

	$lists['cfg_imageDefaultAlign'] = mosHTML :: radioList($arr, 'cfg_imageDefaultAlign', 'class="inputbox"', $joopdf_Config['imageDefaultAlign']);
	$lists['cfg_imageForcedAlign'] = mosHTML :: yesnoRadioList('cfg_imageForcedAlign', 'class="inputbox"', $joopdf_Config['imageForcedAlign']);
	$lists['cfg_showLinks'] = mosHTML :: yesnoRadioList('cfg_showLinks', 'class="inputbox"', $joopdf_Config['showLinks']);
	$lists['cfg_showTables'] = mosHTML :: yesnoRadioList('cfg_showTables', 'class="inputbox"', $joopdf_Config['showTables']);
	HTML_joostinapdf :: showStyleConfig($joopdf_Config, $lists, 'styleconfig');
}

function templateConfig($joopdf_Config, $configFile, $option) {
	global $database;
	global $mosConfig_lang, $mosConfig_absolute_path;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$lists = array ();

	$listitems[] = mosHTML :: makeOption('0', '[' . _JOOPDF_PP_TEMPLATE_FILE_NONE . ']');

	if ($dir = @ opendir($mosConfig_absolute_path . '/administrator/components/com_joostinapdf/presets/')) {

		while (($file = readdir($dir)) !== false) {
			if ($file != ".." && $file != ".") {
				if (!($file[0] == '.') && (strpos($file, "pdf") > 0)) {
					$filelist[] = $file;
				}
			}
		}
		closedir($dir);
	}

	if ($filelist != NULL) {
		asort($filelist);
		while (list ($key, $val) = each($filelist)) {
			//echo "<option value=\"$val\"";
			//if ($selected == $val) {
			//	echo "selected";
			//}
			//echo ">$val Gallery</option>\n";
			$listitems[] = mosHTML :: makeOption($val, $val);

		}
	} else {
		// Signal user with warning
		echo mosWarning(_JOOPDF_PP_TEMPLATE_NO_FILES . '/administrator/components/com_joostinapdf/presets/');
		echo ' <strong class="red">' . _JOOPDF_PP_TEMPLATE_NO_FILES . '/administrator/components/com_joostinapdf/presets/' . '</strong>';
	}
	$lists['cfg_templateFile'] = mosHTML :: selectList($listitems, 'cfg_templateFile', 'class="inputbox" size="1"', 'value', 'text', $joopdf_Config['templateFile']);
	HTML_joostinapdf :: showTemplateConfig($joopdf_Config, $lists, 'templateconfig');
}

function headerFooterConfig($joopdf_Config, $configFile, $option) {
	global $database;
	global $mosConfig_lang;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$lists = array ();

	HTML_joostinapdf :: showHeaderFooterConfig($joopdf_Config, $lists, 'headerfooterconfig');
}

function promotionConfig($joopdf_Config, $configFile, $option) {
	global $mosConfig_lang, $mosConfig_absolute_path;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$lists = array ();

	$listitems[] = mosHTML :: makeOption('0', '[' . _JOOPDF_PP_PROMOTION_FILE_NONE . ']');
	if ($dir = @ opendir($mosConfig_absolute_path . "/administrator/components/com_joostinapdf/presets/")) {

		while (($file = readdir($dir)) !== false) {
			if ($file != ".." && $file != ".") {
				if (!($file[0] == '.') && (strpos($file, "pdf") > 0)) {
					$filelist[] = $file;
				}
			}
		}
		closedir($dir);
	}
	if ($filelist != NULL) {
		asort($filelist);
		while (list ($key, $val) = each($filelist)) {
			//echo "<option value=\"$val\"";
			//if ($selected == $val) {
			//	echo "selected";
			//}
			//echo ">$val Gallery</option>\n";
			$listitems[] = mosHTML :: makeOption($val, $val);

		}
	} else {
		// Signal user with warning
		echo mosWarning(_JOOPDF_PP_PROMOTION_NO_FILES . '/administrator/components/com_joostinapdf/presets/');
		echo '<strong class="red">' . _JOOPDF_PP_PROMOTION_NO_FILES . '/administrator/components/com_joostinapdf/presets/' . '</strong>';

	}
	$lists['cfg_promotionFile'] = mosHTML :: selectList($listitems, 'cfg_promotionFile', 'class="inputbox" size="1"', 'value', 'text', $joopdf_Config['promotionFile']);
	HTML_joostinapdf :: showPromotionConfig($joopdf_Config, $lists, 'promotionconfig');
}

function replacementConfig($joopdf_Config, $configFile, $option) {
	global $mosConfig_lang, $mosConfig_absolute_path;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$lists = array ();

	$value = '';
	if (trim($joopdf_Config['customContentReplacements']) != '') {
		// Remove first and last "
		$repls = substr($joopdf_Config['customContentReplacements'], 1, strlen($joopdf_Config['customContentReplacements']) - 2);
		// Split string
		$tagReplacements = explode('","', $repls);
		// Replace all given tags/mambots 
		foreach ($tagReplacements as $tagLine) {
			// Split key=value
			$vals = explode('"="', $tagLine);
			// Remove escaped "
			$vals[1] = str_replace('\"', '"', $vals[1]);
			// build value of replacement definition

			$value .= $vals[0] . '=' . $vals[1] . "\n";

		}
	}
	$lists['definition'] = $value;

	HTML_joostinapdf :: showReplacementConfig($joopdf_Config, $lists, 'replacementconfig');
}
function install($joopdf_Config, $configFile, $option) {
	$lists = array ();
	HTML_joostinapdf :: showInstall($joopdf_Config, $lists, 'install');
}

function restore($joopdf_Config, $configFile, $option) {
	$lists = array ();
	HTML_joostinapdf :: showRestore($joopdf_Config, $lists, 'restore');
}

function do_install($joopdf_Config, $configFile, $option) {
	global $mosConfig_lang;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$filename = $mosConfig_absolute_path . '/includes/pdf.php';

	// Check if pdf.php file is writeable
	if (!is_writable($filename)) {
		mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_FAT_ERROR_1 . $filename . _JOOPDF_PP_CONFIG_FAT_ERROR_2);
	} else {
		$backupfilename = $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/backup/pdf.php';
		if (!file_exists($backupfilename)) {
			if (!copy($filename, $backupfilename)) {
				mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_1 . $filename . _JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_2 . $backupfilename);
			}
		}
		$orgfilename = $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/pdf.php';

		if (!copy($orgfilename, $filename)) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_INST_FAT_ERROR_1 . $orgfilename . _JOOPDF_PP_TO . $filename . _JOOPDF_PP_INST_FAT_ERROR_2 . $filename);
		}
	}
	$lists = array ();
	HTML_joostinapdf :: showInstall($joopdf_Config, $lists, 'install', _JOOPDF_PP_OKINSTALL);

}

function do_restore($joopdf_Config, $configFile, $option) {
	global $mosConfig_lang;
	global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$msg = _JOOPDF_PP_OKRESTORE;
	$filename = $mosConfig_absolute_path . '/includes/pdf.php';

	// Check if pdf.php file is writeable
	if (!is_writable($filename)) {
		$msg = "FATAL ERROR: " . $filename . " not writeable";
	} else {
		$backupfilename = $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/backup/pdf.php';
		if (!file_exists($backupfilename)) {
			$msg = _JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP . $backupfilename;
		}

		if (!copy($backupfilename, $filename)) {
			$msg = _JOOPDF_PP_CONFIG_FAT_ERROR_REST_1 . $backupfilename . _JOOPDF_PP_TO . $filename . _JOOPDF_PP_INST_FAT_ERROR_2 . $filename;
		}
	}
	if ($msg == null) {
		$msg = _JOOPDF_PP_OKRESTORE;
	}
	$lists = array ();
	HTML_joostinapdf :: showRestore($joopdf_Config, $lists, 'install', $msg);
}

function saveConfig($joopdf_Config, $option) {
	global $configFile;

	//Add code to check if config file is writeable.
	if (!is_writable($configFile)) {

		// Try to make the configfile writeable
		@ chmod($configFile, 0766);
	}
	// Check if configfile is writeable
	if (!is_writable($configFile)) {
		mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_FAT_ERROR_WRIT);
	}

	$changedCustomContentReplacements = false;
	// Convert posted data to config parameters
	foreach ($_POST as $k => $v) {
		if (strpos($k, 'cfg_') === 0) {
			// Check what to do with slashes
			if (!get_magic_quotes_gpc()) {
				$v = addslashes($v);
			} else {
				$v = stripslashes($v);
			}
			$joopdf_Config[substr($k, 4)] = $v;
			if ($k == 'cfg_customContentReplacements') {
				$changedCustomContentReplacements = true;
			}
		}
	}
	if ($changedCustomContentReplacements) {
		// TODO replace with correct value
		if (isset ($joopdf_Config['customContentReplacements']) && (trim($joopdf_Config['customContentReplacements']) != '')) {
			$repls = str_replace("\r", '', $repls);
			$repls = split("\n", $joopdf_Config['customContentReplacements']);
			$newRepls = '';
			foreach ($repls as $replLine) {

				$replLine = str_replace("\r", '', $replLine);
				// Escape all "'s
				$replLine = str_replace('"', '\"', $replLine);
				// Skip empty lines
				if (trim($replLine) == '') {
					continue;
				}
				// Look for =
				$i = strpos($replLine, '=');
				if ($i !== false) {
					// Found = in line
					$replLine = substr($replLine, 0, $i) . '"="' . substr($replLine, $i +1);
				} else {
					// No =, add one
					$replLine .= '"="';
				}
				$replLine = '"' . $replLine . '",';
				// Add the replLine to list
				$newRepls .= $replLine;

			}
			if ($newRepls != '') {
				// Remove last ,
				$newRepls = substr($newRepls, 0, strlen($newRepls) - 1);
			}
			$joopdf_Config['customContentReplacements'] = $newRepls;
		}
	}

	if ($joopdf_Config['cacheNameSeparator'] != null) {
		$joopdf_Config['cacheNameSeparator'] = $joopdf_Config['cacheNameSeparator'] { 0 };
	} else {
		$joopdf_Config['cacheNameSeparator'] = '_';
	}

	// Check if caching is enabled
	if ($joopdf_Config['cacheEnable']) {
		if (strlen(trim($joopdf_Config['cacheDir'])) == 0) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_EMPTY_DIR);
		}
		// Check if cache dir exists
		if (!file_exists($joopdf_Config['cacheDir'])) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_DIR);
		}
		// Check if cache dir is a dir
		if (!is_dir($joopdf_Config['cacheDir'])) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_NO_DIR);
		}
		// Check if cache dir is writable
		if (!is_writable($joopdf_Config['cacheDir'])) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR_WRIT);
		}
		// Check if cacheNameSeparator is not contained in the cache dir name
		if (strpos($joopdf_Config['cacheDir'], $joopdf_Config['cacheNameSeparator']) !== false) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR1_SEP_NAME);
		}
		// Check if cacheNameSeparator is not a dot
		if (strpos($joopdf_Config['cacheNameSeparator'], '.') !== false) {
			mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE_ERROR2_SEP_NAME);
		}

	}

	// Build configFile contents
	$txt = "<?php\n";
	foreach ($joopdf_Config as $k => $v) {
		$txt .= "\$joopdf_pp_Config['" . $k . "']='$v';\n";
	}
	$txt .= "?>";

	// Write configFile to disk
	if ($fp = fopen($configFile, "w")) {
		fputs($fp, $txt, strlen($txt));
		fclose($fp);

		mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_SAVE);
	} else {
		mosRedirect("index2.php?option=$option", _JOOPDF_PP_CONFIG_FAT_ERROR_OPEN);
	}
}

function cacheConfig(& $joopdf_pp_Config, $configFile, $option) {
	global $database;
	global $mosConfig_lang, $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	$lists = array ();
	$sepChars = array (
		'_',
		'$',
		'-',
		'~'
	);

	$lists['cfg_cacheEnable'] = mosHTML :: yesnoRadioList('cfg_cacheEnable', 'class="inputbox"', $joopdf_pp_Config['cacheEnable']);

	// Check for cache dir
	if (strlen($joopdf_pp_Config['cacheDir']) == 0) {
		// Check if JRECache is installed
		$cfgFile = $mosConfig_absolute_path . '/administrator/components/com_jrecache/jrecache.config.php';
		if (file_exists($cfgFile)) {
			include ($cfgFile);
			$config = new Cache_Config();
			$joopdf_pp_Config['cacheDir'] = $config->cache_directory;
		} else {
			$joopdf_pp_Config['cacheDir'] = $mosConfig_absolute_path;
		}
		// Find separator which is correct
		$i = 0;
		while (($i < count($sepChars)) && (strpos($joopdf_pp_Config['cacheDir'], $sepChars[$i]) == true)) {
			$i++;
		}
		if ($i == count($sepChars)) {
			$joopdf_pp_Config['cacheNameSeparator'] = '';
		} else {
			$joopdf_pp_Config['cacheNameSeparator'] = $sepChars[$i];
		}
	} else {
		// build cache entry name start
		$cacheNameStart = 'prettypdf' . $joopdf_pp_Config['cacheNameSeparator'];
		// Retrieve all cache files
		$files = searchdir($joopdf_pp_Config['cacheDir'], $cacheNameStart, 1, 'FILES');
		$lists['files'] = & $files;
	}
	HTML_joostinapdf :: showCacheConfig($joopdf_pp_Config, $lists, 'cache');
}

function cacheRemoveFiles(& $joopdf_pp_Config, $configFile, $option) {
	global $database;
	global $mosConfig_lang, $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

	// Check for cache dir
	if (strlen($joopdf_pp_Config['cacheDir']) != 0) {
		// build cache entry name start
		$cacheNameStart = 'joostinapdf' . $joopdf_pp_Config['cacheNameSeparator'];
		// Retrieve all cache files
		$files = searchdir($joopdf_pp_Config['cacheDir'], $cacheNameStart, 1, 'FILES');
		// Remove files
		foreach ($files as $file) {
			if (file_exists($file)) {
				@ unlink($file);
			}
		}
	}
	cacheConfig($joopdf_pp_Config, $configFile, $option);
}
?>