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


switch($task) {
	case "edit":
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancel');
		mosMenuBar::endTable();
		break;
	case "execsql":
	default:
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::apply('execsql',_EXEC_SQL);
		mosMenuBar::endTable();
		break;
}

?>
