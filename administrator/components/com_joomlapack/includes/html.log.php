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

global $JPConfiguration;
?>
<table class="adminheading">
	<tr>
		<th class="cpanel" nowrap rowspan="2"><?php echo _JP_ACTIONS_LOG?></th>
	</tr>
</table>
<div style="text-align: left; padding: 0.5em; background-color: #EEEEFE; border: thin solid black; margin: 0.5em;"
<?php
	CJPLogger::VisualizeLogDirect();
?>
</div>
