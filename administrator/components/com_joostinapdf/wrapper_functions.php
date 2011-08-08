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

if (!defined("PHP_VER_LOWER43")) 
	define("PHP_VER_LOWER43", version_compare(PHP_VERSION, "4.3", "<"));

/*** ensure that strspn works correct if php-version < 4.3 */
function _strspn($str1, $str2, $start=null, $length=null) {
	$numargs = func_num_args();
	if (PHP_VER_LOWER43 == 1) {
		if (isset($length)) {
			$str1 = substr($str1, $start, $length);
		} else {
			$str1 = substr($str1, $start);
		}
	}
	if ($numargs == 2 || PHP_VER_LOWER43 == 1) {
		return strspn($str1, $str2);
	} else if ($numargs == 3) {
		return strspn($str1, $str2, $start);
	} else {
		return strspn($str1, $str2, $start, $length);
	}
}

/** ensure that strcspn works correct if php-version < 4.3 */
function _strcspn($str1, $str2, $start=null, $length=null) {
	$numargs = func_num_args();
	if (PHP_VER_LOWER43 == 1) {
		if (isset($length)) {
			$str1 = substr($str1, $start, $length);
		} else {
			$str1 = substr($str1, $start);
		}
	}
	if ($numargs == 2 || PHP_VER_LOWER43 == 1) {
		return strcspn($str1, $str2);
	} else if ($numargs == 3) {
		return strcspn($str1, $str2, $start);
	} else {
		return strcspn($str1, $str2, $start, $length);
	}
}

/** ensure that fgets works correct if php-version < 4.3 */
function _fgets (&$h, $force=false) {
	$startpos = ftell($h);
	$s = fgets($h, 1024);
	if ((PHP_VER_LOWER43 == 1 || $force) && preg_match("/^([^\r\n]*[\r\n]{1,2})(.)/",trim($s), $ns)) {
		$s = $ns[1];
		fseek($h,$startpos+strlen($s));
	}
	return $s;
}
?>