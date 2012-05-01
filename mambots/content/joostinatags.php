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
$_MAMBOTS->registerFunction('onPrepareContent', 'jtContent');
function jtContent($published, &$row, &$params, $page=0) {
	global $mainframe, $Itemid, $database, $_MAMBOTS, $mosConfig_live_site;
	if (@$row->content) {
		return;
	}
	if (!$published) {
		return true;
	}
	if (!isset($_MAMBOTS->_content_mambot_params['joostinatags'])) {
		$query = "SELECT params FROM #__mambots WHERE element='joostinatags' AND folder='content'";
		$database->setQuery($query);
		$database->loadObject($mambot);
	}
	$mambot = $_MAMBOTS->_content_mambot_params['joostinatags'];
	$jparams = new mosParameters($mambot->params);
	$jt = $jparams->get('type_search');
	$text = $jparams->get('');
	// Если ключевые слова разделены запятыми, раскомментируйте следующую строку и закомментируйте строку под ней.
	 $tags=explode(', ',$row->metakey);
	//$tags = explode(' ', $row->metakey);
	$text .= '<div class="clearfix"></div>';
	$text .= '<ul class="tag">';
		foreach ($tags as $tag) {
			$text .= '<li><a href="';
		if ($jt) {
			$text .= $mosConfig_live_site;
		} else {
			$text .= '';
		}
		if ($jt == 0) {
			$text .= '/index.php?searchword=' . trim($tag) . '&amp;option=com_search&amp;submit=Search&amp;searchphrase=any&amp;ordering=newest"';
		} else {
		if ($jt == 1) {
			$text .= '/index.php?searchword=' . trim($tag) . '&amp;option=com_search&amp;submit=Search&amp;searchphrase=all&amp;ordering=newest"';
		} else {
			$text .= '/index.php?searchword=' . trim($tag) . '&amp;option=com_search&amp;submit=Search&amp;searchphrase=exact&amp;ordering=newest"';
		}
		}
			$text .= ' title="' . trim($tag) . '" rel="category tag">' . trim($tag) . '</a></li>';
		}
	$text .= '</ul>';
	$text .= '<div class="clearfix"></div>';
	if (count($tags) > 1 || $tags[0] != '')
		$row->text .= $text;
	return true;
}
?>