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
  new SpawTbButton("core", "table_create", "isInDesignMode", "", "tableCreateClick"),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "table_prop", "isTablePropertiesEnabled", "", "tablePropClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_cell_prop", "isTableCellPropertiesEnabled", "", "tableCellPropClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "table_row_insert", "isTableCellPropertiesEnabled", "", "insertTableRowClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_column_insert", "isTableCellPropertiesEnabled", "", "insertTableColumnClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_row_delete", "isTableCellPropertiesEnabled", "", "deleteTableRowClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_column_delete", "isTableCellPropertiesEnabled", "", "deleteTableColumnClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "table_cell_merge_right", "isTableCellPropertiesEnabled", "", "mergeTableCellRightClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_cell_merge_down", "isTableCellPropertiesEnabled", "", "mergeTableCellDownClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_cell_split_horizontal", "isTableCellPropertiesEnabled", "", "splitTableCellHorizontallyClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "table_cell_split_vertical", "isTableCellPropertiesEnabled", "", "splitTableCellVerticallyClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
);
?>
