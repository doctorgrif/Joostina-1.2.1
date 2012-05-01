<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
$items = array
(
  new SpawTbButton("core", "cut", "isStandardFunctionEnabled", "", "standardFunctionClick", SPAW_AGENT_IE, true),
  new SpawTbButton("core", "copy", "isStandardFunctionEnabled", "", "standardFunctionClick", SPAW_AGENT_IE, true),
  new SpawTbButton("core", "paste", "isStandardFunctionEnabled", "", "standardFunctionClick", SPAW_AGENT_IE, true),
  new SpawTbImage("core", "separator", SPAW_AGENT_IE),
  new SpawTbButton("core", "undo", "isStandardFunctionEnabled", "", "standardFunctionClick"),
  new SpawTbButton("core", "redo", "isStandardFunctionEnabled", "", "standardFunctionClick"),
  new SpawTbImage("core", "separator"),
);
?>
