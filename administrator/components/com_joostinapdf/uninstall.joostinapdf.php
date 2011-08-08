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

function com_uninstall() {
	global $mosConfig_absolute_path;
	$v5 = '';
	
	$v2[] = $mosConfig_absolute_path . '/includes/pdf.php';
	$v5= "Restoring files ...";
	$v3 = checkInstall ( $v2 );
	if ( $v3 != null) {
		$v5 = $v5 .  '<table align="left"><tr><td align="left">';
		$v5 = $v5 . _JOOPDF_PP_UNINST_1;
		$v5 = $v5 . _JOOPDF_PP_UNINST_2 . $v3;
		$v5 = $v5 . '<hr />';
		$v5 = $v5 . _JOOPDF_PP_UNINST_3;
		$v5 = $v5 . '</td></tr></table>';  
		$v5 = $v5 . '<br />';
	} else {
		if (@copy (  $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/backup/pdf.php', $mosConfig_absolute_path . '/includes/pdf.php' )) {
			$v5 = $v5 . _JOOPDF_PP_UNINST_REST_ORIG_PDF;
		} else {
			$v5 = $v5 . _JOOPDF_PP_UNINST_FAILED_REST_ORIG_PDF;
		}
	}
	return $v5;
}

function checkInstall(& $v2) {
	global $mosConfig_absolute_path, $v176, $database, $v177, $v178;

	$v3 = null;
	foreach ($v2 as $v8) {
		if (!is_writable($v8)) {
			if (is_file($v8)) {
				@ chmod($v8, 0666);
				clearstatcache();
				if (!is_writable($v8)) {
					$v3 += $v8 . '<br />';
				}
			}
			elseif (is_dir($v8)) {
				@ chmod($v8, 0777);
				clearstatcache();
				if (!is_writable($v8)) {
					$v3 += $v8 . '<br />';
				}
			} else {
				$v3 = 'Required file/dir is not of this type! ' . $v8 . '<br />';
			}
		}
	}
	return $v3;
}
?>