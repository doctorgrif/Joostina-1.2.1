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
$moduleclass_sfx = $params->get('moduleclass_sfx');
$button_vis = $params->get('button', 1);
$button_pos = $params->get('button_pos', 'left');
$button_text = $params->get('button_text', _SEARCH_TITLE);
$width = intval($params->get('width', 20));
$text = $params->get('text', _SEARCH_BOX);
$text_pos = $params->get('text_pos', 'inside');
$set_Itemid = intval($params->get('set_itemid', 0));
switch ($text_pos) {
	case 'inside':
	default:
	$output = '<input name="searchword" maxlength="100" alt="search" class="search-text' . $moduleclass_sfx . '" type="text" size="' . $width . '" value="' . $text . '" onblur="if(this.value==\'\') this.value=\'' . $text . '\';" onfocus="if(this.value==\'' . $text . '\') this.value=\'\';" />';
	break;
	case 'left':
	$output = '<strong>' . $text . '</strong>&nbsp;<input name="searchword" maxlength="100" alt="search" class="search-text' . $moduleclass_sfx . '" type="text" size="' . $width . '" value="" />';
	break;
	case 'top':
	$output = '<strong>' . $text . '</strong><br /><input name="searchword" maxlength="100" alt="search" class="search-text' . $moduleclass_sfx . '" type="text" size="' . $width . '" value="" />';
	break;
	case 'hidden':
	$output = '<input name="searchword" maxlength="100" alt="search" class="search-text' . $moduleclass_sfx . '" type="text" size="' . $width . '" value="" />';
	break;
}
if ($button_vis) {
	$button = '<input type="submit" value="' . $button_text . '" class="search-button' . $moduleclass_sfx . ' button" />';
} else {
	$button = '';
}
switch ($button_pos) {
	case 'top':
		$button = $button . '<br />';
		$output = $button . $output;
		break;
	case 'bottom':
		$button = '<br />' . $button;
		$output = $output . $button;
		break;
	case 'right':
		$output = $output . $button;
		break;
	case 'left':
	default:
		$output = $button . $output;
		break;
}
// set Itemid id for links
if ($set_Itemid) {
// use param setting
	$_Itemid = $set_Itemid;
	$link = 'index.php?option=com_search&amp;Itemid=' . $set_Itemid;
	$link = sefRelToAbs($link);
} else {
	$query = "SELECT id FROM #__menu WHERE link = 'index.php?option=com_search' AND published = 1";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
// try to auto detect search component Itemid
	if (count($rows)) {
		$_Itemid = $rows[0]->id;
		$link = 'index.php?option=com_search&amp;Itemid=' . $_Itemid;
		$link = sefRelToAbs($link);
	} else {
// Assign no Itemid
		$_Itemid = '';
		$link = 'index.php?option=com_search';
		$link = sefRelToAbs($link);
	}
}
?>
<form action="<?php echo $link; ?>" method="get" class="form">
	<div class="mod_search<?php echo $moduleclass_sfx; ?>"><?php echo $output; ?></div>
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $_Itemid; ?>" />
</form>