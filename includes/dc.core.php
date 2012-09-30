<?php
/**
* @package Joostina
* @copyright јвторские права (C) 2008 Joostina team. ¬се права защищены.
* @license Ћицензи€ http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или LICENSE.php
* Joostina! - свободное программное обеспечение распростран€емое по услови€м лицензии GNU/GPL
* ƒл€ получени€ информации о используемых расширени€х и замечаний об авторском праве, смотрите файл COPYRIGHT.php.
*/
// запрет пр€мого доступа
defined('_VALID_MOS') or die();
global $mainframe, $mosConfig_mailfrom, $mosConfig_MetaDesc, $mosConfig_sitename, $mosConfig_dcore_language;
echo '<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />' . "\n";
echo '<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />' . "\n";
echo '<meta name="DC.Identifier" schema="DCterms:URI" content="' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '" />' . "\n";
echo '<meta name="DC.Format" schema="DCterms:IMT" content="text/html" />' . "\n";
echo '<meta name="DC.Title" xml:lang="' . $mosConfig_dcore_language . '" content="' . $mainframe->getPageTitle() . '" />' . "\n";
// FIXME: выводить автора - скорее всего надо выставл€ть владельца сайта, чтоб "накрыть" все страницы либо именно этот метатег выводить только при $option == 'com_content'
//echo '<meta name="DC.Creator" content="" />' . "\n";
// FIXME: чем это от title отличаетс€? может продублировать переменной? либо именно этот метатег выводить только при $option == 'com_content' 
echo '<meta name="DC.Subject" xml:lang="' . $mosConfig_dcore_language . '" content="' . $mainframe->getPageTitle() . '" />' . "\n";
// FIXME: выводить автора - скорее всего надо выставл€ть владельца сайта, чтоб "накрыть" все страницы
//echo '<meta name="DC.Publisher" content="" />' . "\n";
echo '<meta name="DC.Publisher.Address" content="' . $mosConfig_mailfrom . '" />' . "\n";
// FIXME: выводить автора - скорее всего надо выставл€ть владельца сайта, чтоб "накрыть" все страницы
//echo '<meta name="DC.Contributor" content="" />' . "\n";
// FIXME: хз что такое ISO8601
echo '<meta name="DC.Date" scheme="ISO8601" content="' . strftime('%Y-%m-%d') . '" />' . "\n";
echo '<meta name="DC.Type" content="text/html" />' . "\n";
echo '<meta name="DC.Description" xml:lang="' . $mosConfig_dcore_language . '" content="' . $mosConfig_MetaDesc . '" />' . "\n";
echo '<meta name="DC.Identifier" content="' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '" />' . "\n";
echo '<meta name="DC.Relation" content="' . $_SERVER['HTTP_HOST'] . '" scheme="IsPartOf" />' . "\n";
// FIXME: либо организаци€ либо дублировать содержимое тега Generator
//echo '<meta name="DC.Coverage" content="Hennepin Technical College" />' . "\n";
echo '<meta name="DC.Rights" content="Copyright ' . $mosConfig_sitename . ', ' . date('Y') . '. ¬се права защищены." />' . "\n";
// FIXME: выводить дату модификации страницы, хз что такое ISO8601
echo '<meta name="DC.Date.X-MetadataLastModified" scheme="ISO8601" content="' . gmdate("Y-m-d H:i:s", $_SERVER["REQUEST_TIME"]) . '" />' . "\n";
// FIXME: хз что такое RFC1766
echo '<meta name="DC.Language" scheme="dcterms:RFC1766" content="' . $mosConfig_dcore_language . '" />' . "\n";
?>