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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosCode');

/**
 * Мамбот подсветки кода. Использование:
 * {moscode}...какой-нибудь код...{/moscode}
 */
function botMosCode($published, &$row) {
// определение правильного выражения для бота
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
// выполнение замены
	$row->text = preg_replace_callback($regex, 'botMosCode_replacer', $row->text);
	return true;
}

/**
 * Замена совпадающих тэгов an image
 * @param array - Массив соответствий (см. - preg_match_all)
 * @return string
 */
function botMosCode_replacer(&$matches) {
	$html_entities_match = array('#<#', '#>#');
	$html_entities_replace = array('&lt;', '&gt;');
	$text = $matches[1];
	$text = preg_replace($html_entities_match, $html_entities_replace, $text);
// Замена 2 пробелов "&nbsp; " так,  чтобы выравнивался нетабулированный код, при этом не создавая огромных длинных строк.
	$text = str_replace('  ', '&nbsp; ', $text);
// немедленная замена 2 пробелами "&nbsp;" выявленным нечетным количеством пробелов.
	$text = str_replace('  ', ' &nbsp;', $text);
// Замена табуляций "&nbsp;&nbsp;" так, чтобы код с символами табуляции выравнивается по правому краю, не создавая слишком длинных строк.
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