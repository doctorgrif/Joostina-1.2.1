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
/* load the html drawing class */
require_once ($mainframe->getPath('front_html'));
showWrap();

function showWrap() {
	global $mainframe;
	$menu = $mainframe->get('menu');
	$params = new mosParameters($menu->params);
	$params->def('back_button', $mainframe->getCfg('back_button'));
	$params->def('scrolling', 'auto');
	$params->def('page_title', '1');
	$params->def('pageclass_sfx', '');
	$params->def('header', $menu->name);
	$params->def('height', '500');
	$params->def('height_auto', '0');
	$params->def('width', '100%');
	$params->def('add', '1');
	$page_name = $params->def('page_name', $menu->name);
	$url = $params->def('url', '');
	$row = new stdClass();
	if ($params->get('add')) {
// adds 'http://' if none is set
		if (mb_substr($url, 0, 1) == '/') {
// relative url in component. use server http_host.
			$row->url = 'http://' . $_SERVER['HTTP_HOST'] . $url;
		} elseif (!strstr($url, 'http') && !strstr($url, 'https')) {
			$row->url = 'http://' . $url;
		} else {
			$row->url = $url;
		}
	} else {
		$row->url = $url;
	}
// auto height control
	if ($params->def('height_auto')) {
		$row->load = 'onload="iFrameHeight()"';
	} else {
		$row->load = '';
	}
	$mainframe->SetPageTitle($page_name);
	HTML_wrapper::displayWrap($row, $params, $menu);
}
?>