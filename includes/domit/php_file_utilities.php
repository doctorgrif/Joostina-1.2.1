<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*
* dom_xmlrpc_array_document wraps a PHP array with the DOM XML-RPC API
* @package dom-xmlrpc
* @copyright (C) 2004 John Heinstein. All rights reserved
* @license http://www.gnu.org/copyleft/lesser.html LGPL License
* @author John Heinstein <johnkarl@nbnet.nb.ca>
* @link http://www.engageinteractive.com/dom_xmlrpc/ DOM XML-RPC Home Page
* DOM XML-RPC is Free Software
**/

defined('_VALID_MOS') or die();
if(!defined('PHP_TEXT_CACHE_INCLUDE_PATH')) {
	define('PHP_TEXT_CACHE_INCLUDE_PATH',(dirname(__file__)."/"));
}
class php_file_utilities {
	function &getDataFromFile($filename,$readAttributes,$readSize = 8192) {
		$fileContents = null;
		$fileHandle = @fopen($filename,$readAttributes);
		if($fileHandle) {
			do {
				$data = fread($fileHandle,$readSize);
				if(strlen($data) == 0) {
					break;
				}
				$fileContents .= $data;
			} while(true);
			fclose($fileHandle);
		}
		return $fileContents;
	}

	function putDataToFile($fileName,&$data,$writeAttributes) {
		$fileHandle = @fopen($fileName,$writeAttributes);
		if($fileHandle) {
			fwrite($fileHandle,$data);
			fclose($fileHandle);
		}
	}

}



?>
