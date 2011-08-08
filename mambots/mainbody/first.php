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
$_MAMBOTS->registerFunction('onMainbody', 'body_clear');
$_MAMBOTS->registerFunction('onTemplate', 'template_clear');

/* функция производит очистку содержимого главного стека компонента от спецсимволов */
function body_clear() {
	global $_MOS_OPTION;
	$text = $_MOS_OPTION['buffer'];
	$text = str_replace('\n', '', $text);
	$text = str_replace('\r', '', $text);
	$text = str_replace('\t', '', $text);
	$_MOS_OPTION['buffer'] = $text;
	return;
}

/* очистка всего тела страницы от спецтегов */
function template_clear() {
	global $_MOS_OPTION;
	$text = &$_MOS_OPTION['mainbody'];
	$oldcode = array('/\r\n|\r|\n|\t/', '/\r\r\r/', '/\r\r/', '/\s\s+/');
	$newcode = array('\r', '\r', '\r', '\r');
	$text = preg_replace($oldcode, $newcode, $text);
	$text = str_replace('  ', ' ', $text);
	$text = str_replace(' >', '>', $text);
	$text = str_replace('< ', '<', $text);
	$text = str_replace('>\r<', '><', $text);
	$text = str_replace('>\r', '>', $text);
	$text = str_replace('\r</', '</', $text);
	$_MOS_OPTION['mainbody'] = $text;
	return;
}
?>