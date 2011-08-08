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
class TOOLBAR_jx {

	function _DEFAULT() {
		$dir = mosGetParam($_SESSION, 'jx_'.$GLOBALS['file_mode'].'dir', '');
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::ext(_COPY,'#','-copy','id="tb-copy" onclick="javascript:Copy();"');
		mosMenuBar::ext(_MENU_MOVE,'#','-move','id="tb-move" onclick="javascript:Move();"');
		mosMenuBar::ext(_CMN_DELETE,'#','-delete','id="tb-delete" onclick="javascript:Delete();"');
		mosMenuBar::ext(_MENU_CHMOD,'#','-chmod','id="tb-chmod" onclick="javascript:Chmod();"');
		if(ini_get("file_uploads")) {
			mosMenuBar::ext(_TASK_UPLOAD,make_link("upload", $dir, null),'-upload','id="tb-upload"');
		}
		if(($GLOBALS["zip"] || $GLOBALS["tar"] || $GLOBALS["tgz"]) && !jx_isFTPMode()) {
			mosMenuBar::ext(_MENU_GZIP,'#','-zip','id="tb-upload" onclick="javascript:Archive();"');
		}
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _NULL(){
		return true;
	}
}

?>