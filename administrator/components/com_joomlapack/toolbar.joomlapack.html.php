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

class TOOLBAR_jpack {
	function _CONFIG() {
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::apply();
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}
	function _PACK() {
		mosMenuBar::startTable();
		mosMenuBar::ext(_JP_FULL_BACKUP,'#','-apply','id="tb-apply" onclick="do_Start(0);return;"');
		mosMenuBar::ext(_JP_BACKUP_BASE,'#','-apply','id="tb-apply" onclick="do_Start(1);return;"');
		mosMenuBar::spacer();
		mosMenuBar::back(_JP_BACKUP_PANEL,'index2.php?option=com_joomlapack');
		mosMenuBar::endTable();
	}
	function _DEF() {
		mosMenuBar::startTable();
		mosMenuBar::back(_JP_BACKUP_PANEL,'index2.php?option=com_joomlapack');
		mosMenuBar::endTable();
	}
	function _DB_MENU(){
		mosMenuBar::startTable();
		mosMenuBar::back(_JP_DB_MANAGEMENT,'index2.php?option=com_joomlapack&act=db');
		mosMenuBar::spacer();
		mosMenuBar::back(_JP_BACKUP_PANEL,'index2.php?option=com_joomlapack');
		mosMenuBar::endTable();
	}
	function _DB_DEFAULT() {
		global $act;
		mosMenuBar::startTable();
		mosMenuBar::custom('doCheck','-check','','Проверить');
		mosMenuBar::spacer();
		mosMenuBar::custom('doAnalyze','-info','','Анализировать');
		mosMenuBar::spacer();
		mosMenuBar::custom('doOptimize','-optimize','','Оптимизировать');
		mosMenuBar::spacer();
		mosMenuBar::custom('doRepair','-help','','Исправить');
		if($act!='db'){
			mosMenuBar::spacer();
			mosMenuBar::back(_JP_DB_MANAGEMENT,'index2.php?option=com_joomlapack&ack=db');
		}
		mosMenuBar::spacer();
		mosMenuBar::back(_JP_BACKUP_PANEL,'index2.php?option=com_joomlapack');
		mosMenuBar::endTable();
	}
}
?>
