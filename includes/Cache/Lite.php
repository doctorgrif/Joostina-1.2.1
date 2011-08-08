<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
* @package Cache_Lite
* @category Caching
* @version $Id: Lite.php 3313 2006-04-26 19:43:05Z stingrey $
* @author Fabien MARTY <fab@php.net>
**/
defined('_VALID_MOS') or die();
define('CACHE_LITE_ERROR_RETURN',1);
define('CACHE_LITE_ERROR_DIE',8);
class Cache_Lite {
	var $_cacheDir = '/tmp/';
	var $_caching = true;
	var $_lifeTime = 3600;
	var $_fileLocking = true;
	var $_refreshTime;
	var $_file;
	var $_writeControl = true;
	var $_readControl = true;
	var $_readControlType = 'crc32';
	var $_pearErrorMode = CACHE_LITE_ERROR_RETURN;
	var $_id;
	var $_group;
	var $_memoryCaching = false;
	var $_onlyMemoryCaching = false;
	var $_memoryCachingArray = array();
	var $_memoryCachingCounter = 0;
	var $_memoryCachingLimit = 1000;
	var $_fileNameProtection = true;
	var $_automaticSerialization = false;
	function Cache_Lite($options = array(null)) {
		$availableOptions = array('automaticSerialization','fileNameProtection','memoryCaching','onlyMemoryCaching','memoryCachingLimit','cacheDir','caching','lifeTime','fileLocking','writeControl','readControl','readControlType','pearErrorMode');
		foreach($options as $key => $value) {
			if(in_array($key,$availableOptions)) {
				$property = '_'.$key;
				$this->$property = $value;
			}
		}
		$this->_refreshTime = time() - $this->_lifeTime;
	}
	function get($id,$group = 'default',$doNotTestCacheValidity = false) {
		$this->_id = $id;
		$this->_group = $group;
		$data = false;
		if($this->_caching) {
			$this->_setFileName($id,$group);
			if($this->_memoryCaching) {
				if(isset($this->_memoryCachingArray[$this->_file])) {
					if($this->_automaticSerialization) {
						return unserialize($this->_memoryCachingArray[$this->_file]);
					} else {
						return $this->_memoryCachingArray[$this->_file];
					}
				} else {
					if($this->_onlyMemoryCaching) {
						return false;
					}
				}
			}
			if($doNotTestCacheValidity) {
				if(file_exists($this->_file)) {
					$data = $this->_read();
				}
			} else {
				if(@filemtime($this->_file) > $this->_refreshTime) {
					$data = $this->_read();
				}
			}
			if(($data) and ($this->_memoryCaching)) {
				$this->_memoryCacheAdd($this->_file,$data);
			}
			if(($this->_automaticSerialization) and (is_string($data))) {
				$data = unserialize($data);
			}
			return $data;
		}
		return false;
	}
	function save($data,$id = null,$group = 'default') {
		if($this->_caching) {
			if($this->_automaticSerialization) {
				$data = serialize($data);
			}
			if(isset($id)) {
				$this->_setFileName($id,$group);
			}
			if($this->_memoryCaching) {
				$this->_memoryCacheAdd($this->_file,$data);
				if($this->_onlyMemoryCaching) {
					return true;
				}
			}
			if($this->_writeControl) {
				if(!$this->_writeAndControl($data)) {
					@touch($this->_file,time() - 2* abs($this->_lifeTime));
					return false;
				} else {
					return true;
				}
			} else {
				return $this->_write($data);
			}
		}
		return false;
	}
	function remove($id,$group = 'default') {
		$this->_setFileName($id,$group);
		if(!@unlink($this->_file)) {
			$this->raiseError('Cache_Lite : '._ERROR_DELETING_CACHE.' !',-3);
			return false;
		}
		return true;
	}
	function clean($group = false) {
		if($this->_fileNameProtection) {
			$motif = ($group)?'cache_'.$group.'_'.md5($group).'_':'cache_';
		} else {
			$motif = ($group)?'cache_'.$group.'_':'cache_';
		}
		if($this->_memoryCaching) {
			while(list($key,$value) = each($this->_memoryCaching)) {
				if(strpos($key,$motif,0)) {
					unset($this->_memoryCaching[$key]);
					$this->_memoryCachingCounter = $this->_memoryCachingCounter - 1;
				}
			}
			if($this->_onlyMemoryCaching) {
				return true;
			}
		}
		if(!($dh = opendir($this->_cacheDir))) {
			$this->raiseError('Cache_Lite : '._ERROR_READING_CACHE_DIR.' !',-4);
			return false;
		}
		while($file = readdir($dh)) {
			if(($file != '.') && ($file != '..')) {
				$file = $this->_cacheDir.$file;
				if(is_file($file)) {
					if(strpos($file,$motif,0)) {
						if(!@unlink($file)) {
							$this->raiseError('Cache_Lite : '._ERROR_DELETING_CACHE.' !',-3);
							return false;
						}
					}
				}
			}
		}
		return true;
	}
	function setToDebug() {
		$this->_pearErrorMode = CACHE_LITE_ERROR_DIE;
	}
	function setLifeTime($newLifeTime) {
		$this->_lifeTime = $newLifeTime;
		$this->_refreshTime = time() - $newLifeTime;
	}
	function saveMemoryCachingState($id,$group = 'default') {
		if($this->_caching) {
			$array = array('counter' => $this->_memoryCachingCounter,'array' => $this->_memoryCachingState);
			$data = serialize($array);
			$this->save($data,$id,$group);
		}
	}
	function getMemoryCachingState($id,$group = 'default',$doNotTestCacheValidity = false) {
		if($this->_caching) {
			if($data = $this->get($id,$group,$doNotTestCacheValidity)) {
				$array = unserialize($data);
				$this->_memoryCachingCounter = $array['counter'];
				$this->_memoryCachingArray = $array['array'];
			}
		}
	}
	function lastModified() {
		return filemtime($this->_file);
	}
	function raiseError($msg,$code) {
		$path = dirname(__file__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'PEAR'.DIRECTORY_SEPARATOR.'PEAR.php';
		if(file_exists($path)) {
			include_once ($path);
			PEAR::raiseError($msg,$code,$this->_pearErrorMode);
		}
	}
	function _memoryCacheAdd($id,$data) {
		$this->_memoryCachingArray[$this->_file] = $data;
		if($this->_memoryCachingCounter >= $this->_memoryCachingLimit) {
			list($key,$value) = each($this->_memoryCachingArray);
			unset($this->_memoryCachingArray[$key]);
		} else {
			$this->_memoryCachingCounter = $this->_memoryCachingCounter + 1;
		}
	}
	function _setFileName($id,$group) {
		if($this->_fileNameProtection) {
			$this->_file = ($this->_cacheDir.'cache_'.$group.'_'.md5($group).'_'.md5($id));
		} else {
			$this->_file = $this->_cacheDir.'cache_'.$group.'_'.$id;
		}
	}
	function _read() {
		$fp = @fopen($this->_file,"rb");
		if($this->_fileLocking)
			@flock($fp,LOCK_SH);
		if($fp) {
			clearstatcache();
			$length = @filesize($this->_file);
			$mqr = get_magic_quotes_runtime();
			set_magic_quotes_runtime(0);
			if($this->_readControl) {
				$hashControl = @fread($fp,32);
				$length = $length - 32;
			}
			$data = @fread($fp,$length);
			set_magic_quotes_runtime($mqr);
			if($this->_fileLocking)
				@flock($fp,LOCK_UN);
			@fclose($fp);
			if($this->_readControl) {
				$hashData = $this->_hash($data,$this->_readControlType);
				if($hashData != $hashControl) {
					@touch($this->_file,time() - 2* abs($this->_lifeTime));
					return false;
				}
			}
			return $data;
		}
		$this->raiseError('Cache_Lite : '._ERROR_READING_CACHE_FILE.' !',-2);
		return false;
	}
	function _write($data) {
		$fp = @fopen($this->_file,"wb");
		if($fp) {
			if($this->_fileLocking)
				@flock($fp,LOCK_EX);
			if($this->_readControl) {
				@fwrite($fp,$this->_hash($data,$this->_readControlType),32);
			}
			$len = strlen($data);
			@fwrite($fp,$data,$len);
			if($this->_fileLocking)
				@flock($fp,LOCK_UN);
			@fclose($fp);
			return true;
		}
		$this->raiseError('Cache_Lite : '._ERROR_WRITING_CACHE_FILE.' !',-1);
		return false;
	}
	function _writeAndControl($data) {
		$this->_write($data);
		$dataRead = $this->_read($data);
		return ($dataRead == $data);
	}
	function _hash($data,$controlType) {
		switch($controlType) {
			case 'md5':
				return md5($data);
			case 'crc32':
				return sprintf('% 32d',crc32($data));
			case 'strlen':
				return sprintf('% 32d',strlen($data));
			default:
				$this->raiseError('Unknown controlType ! (available values are only \'md5\', \'crc32\', \'strlen\')',-5);
		}
	}
}

?>