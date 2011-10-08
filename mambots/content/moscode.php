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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosCode');
/**
* ������ ��������� ����. �������������:
* {moscode}...�����-������ ���...{/moscode}
*/
function botMosCode($published, &$row) {
// ����������� ����������� ��������� ��� ����
	if (strpos($row->text, 'moscode') === false) {
		return true;
	}
// define the regular expression for the bot
	$regex = "#{moscode}(.*?){/moscode}#s";
// check whether mambot has been unpublished
	if (!$published) {
		$row->text = preg_replace($regex, '', $row->text);
		return true;
	}
// ���������� ������
	$row->text = preg_replace_callback($regex, 'botMosCode_replacer', $row->text);
	return true;
}
/**
* ������ ����������� ����� an image
* @param array - ������ ������������ (��. - preg_match_all)
* @return string
*/
function botMosCode_replacer(&$matches) {
	$html_entities_match = array('#<#', '#>#');
	$html_entities_replace = array('&lt;', '&gt;');
	$text = $matches[1];
	$text = preg_replace($html_entities_match, $html_entities_replace, $text);
// ������ 2 �������� "&nbsp; " ���,  ����� ������������ ���������������� ���, ��� ���� �� �������� �������� ������� �����.
	$text = str_replace('  ', '&nbsp; ', $text);
// ����������� ������ 2 ��������� "&nbsp;" ���������� �������� ����������� ��������.
	$text = str_replace('  ', ' &nbsp;', $text);
// ������ ��������� "&nbsp;&nbsp;" ���, ����� ��� � ��������� ��������� ������������� �� ������� ����, �� �������� ������� ������� �����.
	$text = str_replace('\t', '&nbsp; &nbsp;', $text);
	$text = str_replace('&lt;', '<', $text);
	$text = str_replace('&gt;', '>', $text);
	$text = highlight_string($text, 1);
	$text = str_replace('&amp;nbsp;', '&nbsp;', $text);
	$text = str_replace('&lt;br/&gt;', '<br />', $text);
	$text = str_replace('<font color="#070">&lt;</font><font color="#00b">br</font><font color="#070">/&gt;', '<br />', $text);
	$text = str_replace('&amp;</font><font color="#00c">nbsp</font><font color="#060">;', '&nbsp;', $text);
	$text = str_replace('&amp;</font><font color="#00b">nbsp</font><font color="#070">;', '&nbsp;', $text);
	$text = str_replace('<font color="#070">;&lt;</font><font color="#00b">br</font><font color="#070">/&gt;', '<br />', $text);
	return $text;
}
?>