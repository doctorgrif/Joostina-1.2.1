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

function com_install() {
	global $mosConfig_absolute_path, $mosConfig_live_site, $database;

	$v0 = null;
	$query = "UPDATE #__components SET admin_menu_img='../administrator/components/com_joostinapdf/images/logo.png' WHERE admin_menu_link='option=com_joostinapdf'";
	$database->setQuery($query);
	if(!$database->query()){
		$v0 = $database->getErrorMsg();
	}
	
	
	$v1 = $mosConfig_absolute_path. '/includes/pdf.php';
	$v2 = array ();
	$v2[] = $v1;
	$v2[] = $mosConfig_absolute_path. '/administrator/components/com_joostinapdf/backup';
	$v3 = checkInstall($v2);

	if ($v3 == null) {
		$v4 = $mosConfig_absolute_path. '/administrator/components/com_joostinapdf/backup';
		if (!file_exists($v4. '/pdf.php')) {
			if (!@ copy($v1, $v4 . '/pdf.php')) {
				$v3 = _JOOPDF_PP_INST_FAILED_COPY_1 . '(' . $v1 . ') ' . _JOOPDF_PP_TO . $v4 . '/pdf.php';
			}
		} else {
			echo _JOOPDF_PP_INST_BACKUP_AL_EXISTS . $v4 . '/pdf.php';
		}
	}
	if ($v3 == null) {
		$v5 = _JOOPDF_PP_INST_SUCCS_1 . _JOOPDF_PP_INST_SUCCS_2;
		$v6 = $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/pdf.php';
		$v7 = $mosConfig_absolute_path . '/includes/pdf.php';
		if (!@ copy($v6, $v7)) {
			$v3 = _JOOPDF_PP_INST_FAT_ERROR_1 . $v6 . _JOOPDF_PP_TO . $v7 . _JOOPDF_PP_INST_FAT_ERROR_2 . $v7;
		}
	} else {

		$v5 = '<table align="left"><tr><td align="left" valign="top">';
		$v5 = $v5 . _JOOPDF_PP_INST_1;
		$v5 = $v5 . _JOOPDF_PP_INST_2 . $v3;
		$v5 = $v5 . '</hr>';
		$v5 = $v5 . _JOOPDF_PP_INST_3;
		$v5 = $v5 . _JOOPDF_PP_INST_4 . _JOOPDF_PP_INST_5;
		$v5 = $v5 . '<br />';

	}

	return $v5;
}

function checkInstall(& $v2) {

	$v3 = '';
	foreach ($v2 as $v8) {
		if (file_exists($v8)) {
			if (!is_writable($v8)) {

				if (is_file($v8)) {
					@ chmod($v8, 0666);
					clearstatcache();
					if (!is_writable($v8)) {
						$v3 = $v3 . '- ' . $v8 . '<br/>';
					}
				}
				elseif (is_dir($v8)) {
					@ chmod($v8, 0777);
					clearstatcache();
					if (!is_writable($v8)) {
						$v3 = $v3 . '- ' . $v8 . '<br />';
					}
				} else {
					$v3 = $v3 . _JOOPDF_PP_INST_REQ_NOT_TYPE . $v8 . '<br />';
				}

			}
		} else {
			$v3 = $v3 . _JOOPDF_PP_INST_FILE_NOT_EXISTS . $v8 . '<br />';
		}
	}
	if (strlen($v3) == 0) {
		$v3 = null;
	}
	return $v3;
}
?>
