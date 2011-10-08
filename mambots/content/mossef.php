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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosSef');
/** ��������������� ���������� ������������� ������ � URL-������ SEF. */
function botMosSef($published, &$row, &$params, $page = 0) {
	global $mosConfig_sef;
// check whether mambot has been unpublished
	if (!$published) {
		return true;
	}
// check whether SEF is off
	if (!$mosConfig_sef) {
		return true;
	}
// simple performance check to determine whether bot should process further
	if (strpos($row->text, 'href="') === false) {
		return true;
	}
// define the regular expression for the bot
	$regex = "#href=\"(.*?)\"#s";
// ���������� ������
	$row->text = preg_replace_callback($regex, 'botMosSef_replacer', $row->text);
	return true;
}
/**
* ������ ����������� �����
* @param array - ������ ������������ (��. - preg_match_all)
* @return string
*/
function botMosSef_replacer(&$matches) {
// original text that might be replaced
	$original = 'href="' . $matches[1] . '"';
// array list of non http/httpsURL schemes
	$url_schemes = explode(', ', _URL_SCHEMES);
	foreach ($url_schemes as $url) {
// disable bot from being applied to specific URL Scheme tag
		if (strpos($matches[1], $url) !== false) {
			return $original;
		}
	}
	if (strpos($matches[1], 'index.php?option') !== false) {
// links containing 'index.php?option
// convert url to SEF link
		$link = sefRelToAbs($matches[1]);
// reconstruct html output
		$replace = 'href="' . $link . '"';
		return $replace;
	} else
	if (strpos($matches[1], '#') === 0) {
// special handling for anchor only links
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('?option', $url);
		if (is_array($url) && isset($url[1])) {
			$link = 'index.php?option' . $url[1];
// convert url to SEF link
			$link = sefRelToAbs($link) . $matches[1];
		} else {
			$link = $matches[1];
// convert url to SEF link
			$link = sefRelToAbs($link);
		}
// reconstruct html output
		$replace = 'href="' . $link . '"';
		return $replace;
	} else {
		return $original;
	}
}
?>