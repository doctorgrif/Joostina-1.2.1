<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
* @package joomlaXplorer
* @copyright soeren 2007
* @author The joomlaXplorer project (http://joomlacode.org/gf/project/joomlaxplorer/)
* @author The  The QuiX project (http://quixplorer.sourceforge.net)
**/
defined('_VALID_MOS') or die();
function jx_show_file($dir, $item) {
	show_header($GLOBALS["messages"]["actview"].": ".$item);
	$index2_edit_link = str_replace('/index3.php', '/index2.php', make_link('edit',
		$dir, $item));
	echo '<a name="top" class="componentheading" href="javascript:window.close();">[ '._PROMPT_CLOSE.' ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	$abs_item = get_abs_item($dir, $item);
	if(get_is_editable($abs_item) && $GLOBALS['jx_File']->is_writable($abs_item)) {
		echo '<a class="componentheading" href="'.make_link('edit', $dir, $item).'&amp;return_to='.urlencode($_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']).'">[ '.$GLOBALS["messages"]["editlink"].' ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '<a class="componentheading" href="#bottom">[ '._CMN_BOTTOM.' ]</a>';
	echo '<br /><br />';
	if(@eregi($GLOBALS["images_ext"], $item)) {
		echo '<img src="'.$GLOBALS['home_url'].'/'.$dir.'/'.$item.'" alt="'.$GLOBALS["messages"]["actview"].": ".$item.'" /><br /><br />';
	} else {
		if(file_exists($GLOBALS['mosConfig_absolute_path'].'/includes/domit/xml_saxy_shared.php')) {
			require_once ($GLOBALS['mosConfig_absolute_path'].'/includes/domit/xml_saxy_shared.php');
		} elseif(file_exists($GLOBALS['mosConfig_absolute_path'].'/libraries/domit/xml_saxy_shared.php')) {
			require_once ($GLOBALS['mosConfig_absolute_path'].'/libraries/domit/xml_saxy_shared.php');
		} else {
			return;
		}
		echo '<div class="quote" style="text-align:left;">'.nl2br(htmlentities($GLOBALS['jx_File']->file_get_contents(get_abs_item($dir, $item)),ENT_QUOTES,_ISO2)).'</div>';
	}
	echo '<a href="#top" name="bottom" class="componentheading">[ '._CMN_TOP.' ]</a><br /><br />';
}





?>
