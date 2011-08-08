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

if(!$acl->acl_check('administration','config','users',$my->usertype)) {
	die('error-acl');
}
// отключаем кэширование базы данных
$mosConfig_db_cache_handler = 'none';
// подключение класса конфигурации
require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/configuration.php");

require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/sajax.php");

require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/ajaxtool.php");
?>