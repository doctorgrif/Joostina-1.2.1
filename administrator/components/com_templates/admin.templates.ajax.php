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

if(!$acl->acl_check('administration','manage','users',$GLOBALS['my']->usertype,'components','com_templates')) {
	die('error-acl');
}

$task = mosGetParam($_GET,'task','publish');

switch($task){
	case 'source':{
		saveTemplateSource();
		return;
	}
	case 'css':{
		saveTemplateCSS();
		return;
	}
	default:{
		echo 'error-task';
		return;
	}
}

function saveTemplateSource(){
	global $mosConfig_absolute_path;
	josSpoofCheck();

	$template		= strval(mosGetParam($_POST,'template',''));
	$client			= strval(mosGetParam($_REQUEST,'client',''));
	$filecontent	= joostina_api::convert(mosGetParam($_POST,'filecontent','',_MOS_ALLOWHTML));

	if(!$template){
		echo _UNSUCCESS_OPERATION_NO_TEMPLATE;
		return;
	}
	if(!$filecontent){
		echo _UNSUCCESS_OPERATION_EMPTY_FILE;
		return;
	}

	if($client == 'admin'){
		$file = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/templates/'.$template.'/index.php';
	}
	else{
		$file = $mosConfig_absolute_path.'/templates/'.$template.'/index.php';
	}

	$enable_write = mosGetParam($_POST,'enable_write',0);
	$oldperms = fileperms($file);

	if($enable_write){
		@chmod($file,$oldperms | 0222);
	}

	clearstatcache();

	if(is_writable($file) == false){
		echo _UNSUCCES_OPERAION.' '.$file.' '._UNWRITEABLE;
		return;
	}
	if($fp = fopen($file,'w')){
		fputs($fp,stripslashes($filecontent),strlen($filecontent));
		fclose($fp);
		if($enable_write){
			@chmod($file,$oldperms);
		}else{
			if(mosGetParam($_POST,'disable_write',0)) @chmod($file,$oldperms & 0777555);
		}
	}else{
		if($enable_write) @chmod($file,$oldperms);
		echo _UNSUCCES_OPERAION.': '._CANNOT_OPEN_FILE_DOR_WRITE;
		return;
	}
	echo 'Изменения сохранены.';
	return;
}

function saveTemplateCSS(){
	global $mosConfig_absolute_path;
	josSpoofCheck();
	$template = strval(mosGetParam($_POST,'template',''));
	$client = strval(mosGetParam($_REQUEST,'client',''));
	$filecontent = joostina_api::convert(mosGetParam($_POST,'filecontent','',_MOS_ALLOWHTML));
	if(!$template){
		echo _UNSUCCESS_OPERATION_NO_TEMPLATE;
		return;
	}

	if(!$filecontent){
		echo _UNSUCCESS_OPERATION_EMPTY_FILE;
		return;
	}

	if($client == 'admin'){
		$file = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/templates/'.$template.'/css/template_css.css';
	}else{
		$file = $mosConfig_absolute_path.'/templates/'.$template.'/css/style.css';
	}

	$enable_write = mosGetParam($_POST,'enable_write',0);
	$oldperms = fileperms($file);

	if($enable_write){
		@chmod($file,$oldperms | 0222);
	}

	clearstatcache();
	if(is_writable($file) == false){
		echo _CANNOT_OPEN_FILE_DOR_WRITE;
		return;
	}

	if($fp = fopen($file,'w')){
		fputs($fp,stripslashes($filecontent));
		fclose($fp);
		if($enable_write){
			@chmod($file,$oldperms);
		}else{
			if(mosGetParam($_POST,'disable_write',0)) @chmod($file,$oldperms & 0777555);
		}
	} else{
		if($enable_write) @chmod($file,$oldperms);
		echo _CANNOT_OPEN_FILE_DOR_WRITE;
		return;
	}
	echo _E_ITEM_SAVED;
	return;
}

?>