<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// ������ ������� �������
defined('_VALID_MOS') or die();
function com_install() {
global $mosConfig_absolute_path;
$config	 = $mosConfig_absolute_path.'/administrator/components/com_jmn/jmn_config.php';
$words	 = $mosConfig_absolute_path.'/components/com_jmn/words.txt';
@chmod($config,0777);
@chmod($words,0777);
echo _MG_INSTALL;
}
?>