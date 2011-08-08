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
$_MAMBOTS->registerFunction('onPrepareContent', 'botLegacyBots');
/**
* ��������� ����� �������������� ����� � �������� /mambots
* ���� ���� ����� ���� "��������� ������" ���� ��� ������������ ��������
* @param object - ������ �����������
* @param int - ��������� ����� ����������
* @param int - ����� ��������
*/
function botLegacyBots($published) {
	global $mosConfig_absolute_path;
// ��������, ����������� �� ������
	if (!$published) {
		return true;
	}
// ������� ������������ �����
	$bots = mosReadDirectory("$mosConfig_absolute_path/mambots", "\.php$");
	sort($bots);
	foreach ($bots as $bot) {
		require $mosConfig_absolute_path . '/mambots/' . $bot;
	}
	return true;
}
?>