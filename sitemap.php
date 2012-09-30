<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* запрет прямого доступа */
defined('_VALID_MOS') or die();
/* Здесь ввести путь из "Компонеты - Xmap - Настройки - URL карты: - XML карта:*/
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