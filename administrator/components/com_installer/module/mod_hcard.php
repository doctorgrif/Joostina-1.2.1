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
global $task, $mosConfig_absolute_path;
	require_once ($mosConfig_absolute_path . '/includes/hkit.class.php');
	$h	= new hKit;
	
	// Config options (see top of class file)
	$h->tidy_mode = 'proxy'; // 'proxy', 'exec', 'php' or 'none'
	
	// Get by URL
	$result = $h->getByURL('hcard', 'http://microformats.org');

	// Get by String
	//$result	= $h->getByString('hcard', '<div class="vcard"><p class="fn">Drew McLellan</p></div>');
	include ($mosConfig_absolute_path . '/modules/mod_hcard/hcard.profil.php');
	print '<pre>'.print_r($result, 1).'</pre>';
?>