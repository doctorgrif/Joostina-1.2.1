<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
/* ������ ������� ������� */
defined('_VALID_MOS') or die();
/* ����� ������ ���� �� "��������� - Xmap - ��������� - URL �����: - XML �����:*/
$url = 'http://'.$_SERVER['HTTP_HOST'] . '/index.php?option=com_xmap&sitemap=2&view=xml&no_html=1';
$xml_code = file_get_contents($url);
if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml', $xml_code))
{
	echo '<h1>XML sitemap succefully updated</h1>';
	$xml_code = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml');
	$xml_code = str_replace ('</url>', '</url><br />', $xml_code);
	echo $xml_code;
} else
	echo '<h1>Error!</h1>';
?>