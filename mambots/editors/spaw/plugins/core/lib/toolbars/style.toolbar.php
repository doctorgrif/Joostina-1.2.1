<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
$items = array
(
  new SpawTbDropdown("core", "style", "isStyleEnabled", "styleStatusCheck", "styleChange"),
  new SpawTbDropdown("core", "formatBlock", "isStandardFunctionEnabled", "standardFunctionStatusCheck", "standardFunctionChange"),
  new SpawTbImage("core", "separator"),
);
?>
