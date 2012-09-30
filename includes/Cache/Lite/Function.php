<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
* @package Cache_Lite
* @category Caching
* @version $Id: Lite.php 3313 2006-04-26 19:43:05Z stingrey $
* @author Fabien MARTY <fab@php.net>
**/

defined('_VALID_MOS') or die();
require_once ($mosConfig_absolute_path.'/includes/Cache/Lite.php');
class Cache_Lite_Function extends Cache_Lite {
	var $_defaultGroup = 'Cache_Lite_Function';
	function Cache_Lite_Function($options = array(null)) {
		if(isset($options['defaultGroup'])) {
			$this->_defaultGroup = $options['defaultGroup'];
		}
		$this->Cache_Lite($options);
	}
	function call() {
		//$arguments = func_get_args(); //php 5.2
		$arguments = func_get_args(); //php 5.3
		$numargs = func_num_args();
		for($i=1; $i < $numargs; $i++){
		$arguments[$i] = &$arguments[$i];
		}
		$id = serialize($arguments);
		if(!$this->_fileNameProtection) {
			$id = md5($id);
		}
		$data = $this->get($id,$this->_defaultGroup);
		if($data !== false) {
			$array = unserialize($data);
			$output = $array['output'];
			$result = $array['result'];
		} else {
			ob_start();
			ob_implicit_flush(false);
			$target = array_shift($arguments);
			if(strstr($target,'::')) {
				list($class,$method) = explode('::',$target);
				// ������������� � php 5.3.x
				$result = call_user_func_array(array($class,$method),$arguments);
				//$result = call_user_func_array(array($class, $method), &$arguments);
			} else
				if(strstr($target,'->')) {
					list($object_123456789,$method) = explode('->',$target);
					global $$object_123456789;
					$result = call_user_func_array(array($$object_123456789,$method),$arguments);
				} else {
					// ������������� � php 5.3.x
					$result = call_user_func_array($target,$arguments);
					//$result = call_user_func_array($target, &$arguments);
				}
				$output = ob_get_contents();
			ob_end_clean();
			// ����������� �����������
			global $mosConfig_cache_opt;
			$data = $output;
			if($mosConfig_cache_opt) {
				$oldcode = array("/\r\n|\r|\n|\t/","/\r\r\r/","/\r\r/","/\s\s+/");
				$newcode = array("\r","\r","\r","\r");
				$data = preg_replace($oldcode, $newcode, $data);
				$data = str_replace('  ',' ',$data);
				$data = str_replace(' >','>',$data);
				$data = str_replace('< ','<',$data);
				$data = str_replace(">\r<",'><',$data);
				$data = str_replace(">\r",'>',$data);
				$data = str_replace("\r</",'</',$data);
			}
			$output = $data;
			$array['output'] = $output;
			$array['result'] = $result;
			$this->save(serialize($array),$id,$this->_defaultGroup);
		}
		echo ($output);
		return $result;
	}
}

?>
