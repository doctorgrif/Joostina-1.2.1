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
global $mosConfig_absolute_path;
$config=$mosConfig_absolute_path."/administrator/components/com_jmn/jmn_config.php";
$words=$mosConfig_absolute_path."/components/com_jmn/words.txt";
@chmod($config,0777);
@chmod($words,0777);
echo _MG_INSTALL;
}
?>