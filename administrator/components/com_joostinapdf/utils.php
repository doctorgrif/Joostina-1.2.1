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

function hex2dec($v179 = "#000000") {
	$v180 = substr($v179, 1, 2);
	$v181 = hexdec($v180);
	$v182 = substr($v179, 3, 2);
	$v183 = hexdec($v182);
	$v184 = substr($v179, 5, 2);
	$v185 = hexdec($v184);
	$v186 = array ();
	$v186['R'] = $v181;
	$v186['G'] = $v183;
	$v186['B'] = $v185;
	return $v186;
}
function px2mm($v187) {
	return $v187/ 4;
}
function mm2px($v188) {
	return $v188* 4;
}

function searchdir($v189, $v190, $v191 = -1, $v192 = "FULL", $v193 = 0) {

	$v194= '/';

	if (substr($v189, strlen($v189) - 1) != $v194) {
		$v189 .= $v194;
	}
	$v195 = array ();
	if ($v192 != "FILES") {
		if (false !== strpos($v189, $v190)) {
			$v195[] = $v189;
		}
	}
	if ($v196 = opendir($v189)) {
		while (false !== ($v8 = readdir($v196))) {
			if ($v8 != '.' && $v8 != '..') {
				$v8 = $v189 . $v8;
				if (!is_dir($v8)) {
					if ($v192 != "DIRS") {
						if (false !== strpos($v8, $v190)) {
							$v195[] = $v8;
						}
					}
				} else {
					if (false !== strpos($v8, $v190)) {
						$v195[] = $v8;
					}
					if ($v193 >= 0 && ($v193 < $v191 || $v191 < 0)) {
						$v197 = searchdir($v8 . $v194, $v190, $v191, $v192, $v193 +1);
						$v195 = array_merge($v195, $v197);
					}
				}
			}
		}
		closedir($v196);
	}
	if ($v193 == 0) {
		natcasesort($v195);
	}
	return ($v195);
}

function color2hex($name = 'Black') {
	$v198 = null;
	if (strcasecmp($name, 'Aqua') == 0) {
		$v198 = '#00FFFF';
	}
	elseif (strcasecmp($name, 'Black') == 0) {
		$v198 = '#000000';
	}
	elseif (strcasecmp($name, 'Blue') == 0) {
		$v198 = '#0000FF';
	}
	elseif (strcasecmp($name, 'Fuchsia') == 0) {
		$v198 = '#FF00FF';
	}
	elseif (strcasecmp($name, 'Gray') == 0) {
		$v198 = '#808080';
	}
	elseif (strcasecmp($name, 'Green') == 0) {
		$v198 = '#008000';
	}
	elseif (strcasecmp($name, 'Lime') == 0) {
		$v198 = '#00FF00';
	}
	elseif (strcasecmp($name, 'Maroon') == 0) {
		$v198 = '#800000';
	}
	elseif (strcasecmp($name, 'Navy') == 0) {
		$v198 = '#000080';
	}
	elseif (strcasecmp($name, 'Olive') == 0) {
		$v198 = '#808000';
	}
	elseif (strcasecmp($name, 'Purple') == 0) {
		$v198 = '#800080';
	}
	elseif (strcasecmp($name, 'Red') == 0) {
		$v198 = '#FF0000';
	}
	elseif (strcasecmp($name, 'Silver') == 0) {
		$v198 = '#C0C0C0';
	}
	elseif (strcasecmp($name, 'Teal') == 0) {
		$v198 = '#008080';
	}
	elseif (strcasecmp($name, 'White') == 0) {
		$v198 = '#FFFFFF';
	}
	elseif (strcasecmp($name, 'Yellow') == 0) {
		$v198 = '#FFFF00';
	} else {
		$v198 = $name;
	}
	return $v198;
}

function str2time($v199, $v200 = null) {
	$v201= array (
			'd','m','y','Y','H','i','s');
	$v202 = implode('', $v201);
	$v203 = preg_split('~[' . $v202 . ']~', $v200);
	$v204 = quotemeta(implode('', array_unique($v203)));
	$v205 = preg_split('~[' . $v204 . ']~', $v199);
	$v206 = preg_split('~[' . $v204 . ']~', $v200);
	if (count($v205) !== count($v206)) {
		return false;
	}
	$v207 = array ();
	for ($v59 = 0; $v59 < count($v205); $v59++) {
		$v207[$v206[$v59]] = $v205[$v59];
	}
	if (isset ($v207['y']) && !isset ($v207['Y'])) {
		$v207['Y'] = substr(date('Y'), 0, 2) . $v207['y'];
	}
	foreach ($v201 as $v208) {
		if (empty ($v207[$v208])) {
			$v207[$v208] = date($v208);
		}
	}
	if (!checkdate($v207['m'], $v207['d'], $v207['Y'])) {
		return false;
	}
	$v209 = mktime($v207['H'], $v207['i'], $v207['s'], $v207['m'], $v207['d'], $v207['Y']);
	return $v209;
}

if (!function_exists("stripos")) {
	function stripos($v210, $v211, $v212 = 0) {
		return strpos(strtolower($v210), strtolower($v211), $v212);
	}
}

if (!function_exists('str_ireplace')) {
	function str_ireplace($v213, $v214, $subject) {
		if (is_array($v213)) {
			array_walk($v213, 'make_pattern');
		} else {
			$v213 = '/' . preg_quote($v213, '/') . '/i';
		}
		return preg_replace($v213, $v214, $subject);
	}
}
?>