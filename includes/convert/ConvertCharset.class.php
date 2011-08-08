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
/*
 Joostina UTF-8 Convert
 Based on JComments UTF-8 Convert
 Based on utf8 1.0 by Alexander Minkovsky (a_minkovsky@hotmail.com)

---------------------------------------------------------------------------------
Version:        1.0
Date:           23 November 2004
---------------------------------------------------------------------------------
Author:         Alexander Minkovsky (a_minkovsky@hotmail.com)
---------------------------------------------------------------------------------
License:        Choose the more appropriated for You - I don't care.
---------------------------------------------------------------------------------
Description:
    Class provides functionality to convert single byte strings, such as CP1251
    ti UTF-8 multibyte format and vice versa.
    Class loads a concrete charset map, for example CP1251.
    (Refer to ftp://ftp.unicode.org/Public/MAPPINGS/ for map files)
    Directory containing MAP files is predefined as constant.
    Each charset is also predefined as constant pointing to the MAP file.
*/

define('CONVERT_TABLES_DIR', dirname( __FILE__ ) . '/ConvertTables/' );
define('ERR_OPEN_MAP_FILE', 'ERR_OPEN_MAP_FILE');

class convertUtf8{

	var $charset = null;
	var $ascMap = array();
	var $utfMap = array();
	var $handler = 3; // использование конвертора

	function convertUtf8($charset){
		$this->loadCharset($charset);
		//$this->handler = $this->_detect_handler(); // получаем обработчик кодирования
	}

	function loadCharset($charset){

		$charsetFilename = CONVERT_TABLES_DIR . $charset;

		if (!is_file( $charsetFilename ) ) {
			$this->onError(ERR_OPEN_MAP_FILE, 'Failed to open map file for ' . $charset);
			return;
		}

		if (empty($this->ascMap[$charset])) {
			$lines = file_get_contents( $charsetFilename );
			$lines = preg_replace('/#.*$/m', '',$lines);
			$lines = preg_replace("/\n\n/", '',$lines);
			$lines = explode("\n",$lines);
			foreach($lines as $line){
				$parts = explode('0x',$line);
				if(count($parts)==3){
					$asc=hexdec(substr($parts[1],0,2));
					$utf=hexdec(substr($parts[2],0,4));
					$this->ascMap[$charset][$asc]=$utf;
				}
			}
		}

		$this->charset = $charset;
		$this->utfMap = array_flip($this->ascMap[$charset]);
	}

	function onError($err_code,$err_text){
		print($err_code . ' : ' . $err_text . "<hr>\n");
	}
	// конвертирование в UTF-8
	function strToUtf8($str){
		// в зависимости от установленного обработчика используем специфичные функции
		if($this->handler == 1)
			return iconv($this->charset, 'UTF-8//TRANSLIT', $str);
		elseif($this->handler == 2)
			return mb_convert_encoding($str,'UTF-8',$this->charset);
		// обработчики не найдены - используем свой конвертер
		if ( count($this->ascMap) > 0 ) {
			$chars = unpack('C*', $str);
			$cnt = count($chars);
			for($i=1;$i<=$cnt;++$i) $this->_charToUtf8($chars[$i]);
			return implode('',$chars);
		} else {
			return $str;
		}
	}
	// конвертирование из UTF-8
	function utf8ToStr($utf){
		// в зависимости от установленного обработчика используем специфичные функции
		if($this->handler == 1)
			return iconv('UTF-8',$this->charset.'//TRANSLIT', $utf);
		elseif($this->handler == 2)
			return mb_convert_encoding($utf,$this->charset,'UTF-8');
		// обработчики не найдены - используем свой конвертер
		if ( count($this->utfMap) > 0 ) {
			$chars = unpack('C*', $utf);
			$cnt = count($chars);
			$res = ''; //No simple way to do it in place... concatenate char by char
			for ($i=1;$i<=$cnt;++$i){
				$res .= $this->_utf8ToChar($chars, $i);
			}
			return $res;
		} else {
			return $utf;
		}
	}
	// определение обработчика конвертирования
	function _detect_handler(){
		$use = null;
		if (function_exists('iconv')){
			$use = 1; // используем iconv
		}elseif (function_exists('mb_convert_encoding')){
			$use = 2; // используем mb_convert
		}else{
			$use = 3; // используем внутренний конвертер
		}
		return $use;
	}

	function _charToUtf8(&$char){
		$c = (int)$this->ascMap[$this->charset][$char];
		if ($c < 0x80){
			$char = chr($c);
		}
		else if($c<0x800) // 2 bytes
			$char = (chr(0xC0 | $c>>6) . chr(0x80 | $c & 0x3F));
		else if($c<0x10000) // 3 bytes
			$char = (chr(0xE0 | $c>>12) . chr(0x80 | $c>>6 & 0x3F) . chr(0x80 | $c & 0x3F));
		else if($c<0x200000) // 4 bytes
			$char = (chr(0xF0 | $c>>18) . chr(0x80 | $c>>12 & 0x3F) . chr(0x80 | $c>>6 & 0x3F) . chr(0x80 | $c & 0x3F));
	}

	function _utf8ToChar(&$chars, &$idx){
		if(($chars[$idx] >= 240) && ($chars[$idx] <= 255)){ // 4 bytes
			$utf =  (intval($chars[$idx]-240)   << 18) +
				(intval($chars[++$idx]-128) << 12) +
				(intval($chars[++$idx]-128) << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else if (($chars[$idx] >= 224) && ($chars[$idx] <= 239)){ // 3 bytes
			$utf = (intval($chars[$idx]-224)   << 12) +
				(intval($chars[++$idx]-128) << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else if (($chars[$idx] >= 192) && ($chars[$idx] <= 223)){ // 2 bytes
			$utf =  (intval($chars[$idx]-192)   << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else{ // 1 byte
			$utf = $chars[$idx];
		}

		if(array_key_exists($utf,$this->utfMap))
			return chr($this->utfMap[$utf]);
		else
			return '?';
	}
}
?>
