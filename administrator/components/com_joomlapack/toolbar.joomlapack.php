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

require_once ($mainframe->getPath('toolbar_html'));

// handle the task
$act = mosGetParam($_REQUEST,'act','');
$task = mosGetParam($_REQUEST,'task','');

switch($act) {
	case 'config':
		switch($task) {
			case 'save':
				break;
			case 'apply':
				TOOLBAR_jpack::_CONFIG();
				break;
			case '':
				TOOLBAR_jpack::_CONFIG();
				break;
			default:
				break;
		}
		break;

	case 'db':
		switch($task) {
			case 'doBackup':
				TOOLBAR_jpack::_DB_MENU($option);
				break;
			case 'doCheck':
				TOOLBAR_jpack::_DB_MENU($option);
				break;
			case 'doAnalyze':
				TOOLBAR_jpack::_DB_MENU($option);
				break;
			case 'doOptimize':
				TOOLBAR_jpack::_DB_MENU($option);
				break;
			case 'doRepair':
				TOOLBAR_jpack::_DB_MENU($option);
				break;
			default:
				TOOLBAR_jpack::_DB_DEFAULT();
				break;
		}
		break;

	case 'pack':
		TOOLBAR_jpack::_PACK();
		break;

	case 'log':
	case 'def':
		TOOLBAR_jpack::_DEF();
		break;
}

?>
