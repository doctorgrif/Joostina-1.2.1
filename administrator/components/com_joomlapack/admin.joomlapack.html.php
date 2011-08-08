<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2007 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// ������ ������� �������
defined('_VALID_MOS') or die();

class jpackScreens {
	// �������� ������������
	function fConfig() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.config.php');
	}
	// �������� ���������� �������� ������
	function fPack() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.pack.php');
	}
	// ����� ������ ��������
	function fMain() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.main.php');
	}
	// ������ ���������� �������
	function fBUAdmin() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.files.php');
	}
	// �������� �� ������� ��������� ����������� �� ������
	function fDirExclusion() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.dirs.php');
	}
	// �������� � ����� ���������� ������
	function fLog() {
		global $option,$mosConfig_absolute_path;
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/html.log.php');
	}
}


class HTML_joomlapack {
	function showTables($option,$list,&$table_lists,$stats_list) {
		global $mosConfig_live_site;
		// ����������� ������� �������� ������
		mosCommonHTML::loadPrettyTable();
		$content = "<form action=\"index2.php?option=com_joomlapack\" method=\"post\" name=\"adminForm\" id=\"adminForm\">\n"
				."<table class=\"adminheading\">\n"
					."<tr>\n"
						."<th class=\"db\">"._JP_DB_MANAGEMENT."</th>\n"
					."</tr>\n"
				."</table>\n"
				."<table class=\"adminlist\" id=\"adminlist\" >\n"
					."<tr>\n"
						."\t<th width=\"1%\"><!--<input type=\"checkbox\" name=\"toggle\" value=\"\" onclick=\"checkAll(".count($table_lists).");\" />--></th>\n"
						."\t<th align=\"left\">"._JP_TABLES."</th>\n"
						."\t<th width=\"5%\">"._JP_TABLE_ROWS."</th>\n"
						."\t<th width=\"5%\">"._JP_SIZE."</th>\n"
						."\t<th width=\"5%\">"._E_CAPTION."</th>\n"
						."\t<th width=\"5%\">"._JP_INCREMENT."</th>\n"
						."\t<th width=\"5%\">"._JP_CREATION_DATE."</th>\n"
						."\t<th width=\"5%\">"._JP_CHECKING."</th>\n"
					."</tr>\n".
						$list
					."<tr>\n"
						."<th colspan=\"2\">&nbsp;</th>\n"
						."<th align=\"right\">".$stats_list['rows']."</th>\n"
						."<th align=\"right\">".$stats_list['data']."</th>\n"
						."<th align=\"right\">".$stats_list['over']."</th>\n"
						."<th colspan=\"3\">&nbsp;</th>\n"
					."</tr>\n"
				."</table>\n"
				."<input type=\"hidden\" name=\"option\" value=\"$option\" />\n"
				."<input type=\"hidden\" name=\"act\" value=\"db\" />\n"
				."<input type=\"hidden\" name=\"task\" value=\"\" />\n"
				."<input type=\"hidden\" name=\"boxchecked\" value=\"0\" />\n"
				."<input type=\"hidden\" name=\"prettytablenoremclass\" id=\"prettytablenoremclass\" value=\"1\" />\n"
			."</form>\n";
		echo $content;
	}

	function showCheckResults($list,$title) {
		global $mosConfig_live_site;
		$content =
				"<table class=\"adminheading\">\n"
					."<tr>\n"
						."<th>".$title."</th>\n"
					."</tr>\n"
				."</table>\n"
				."<table class=\"adminlist\" id=\"adminlist\" >\n"
					."<tr>\n"
						."\t<th align=\"left\">�������</th>\n"
						."\t<th align=\"left\" width=\"5%\">OP</th>\n"
						."\t<th align=\"left\" width=\"5%\">���</th>\n"
						."\t<th align=\"left\" width=\"5%\">������</th>\n"
					."</tr>\n".
						$list
					."<tr>\n"
						."\t<th colspan=\"4\">&nbsp;</th>\n"
					."</tr>\n"
				."</table>\n";
		echo $content;
	}
}

?>
