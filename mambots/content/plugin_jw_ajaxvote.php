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
// вывод рейтинга ПОД статьей
$_MAMBOTS->registerFunction('onAfterDisplayContent', 'pluginJWAjaxVote');

function pluginJWAjaxVote(&$row, &$params) {
	global $mainframe, $addScriptJWAjaxVote, $mosConfig_caching;
	$id = $row->id;
	$result = 0;
	$plugin_path = '/mambots/content/plugin_jw_ajaxvote/';
	if ($params->get('rating') && !$params->get('popup')) {
		$vote = new stdClass;
		$vote->rating_count = $row->rating_count;
		$vote->rating_sum = $row->rating;
		if ($vote->rating_count != 0)
			$result = number_format(intval($vote->rating_sum), 2) * 20;
		$rating_sum = intval($vote->rating_sum);
		$rating_count = intval($vote->rating_count);
		$thmess = $mosConfig_caching ? '' . _PJA_THANKS_FULL . '' : '' . _PJA_THANKS_FULL . '';
		$script = '<script type="text/javascript">var live_site = \'' . $mainframe->getCfg('live_site') . '\';var jwajaxvote_lang = new Array();jwajaxvote_lang[\'UPDATING\'] = \'' . _PJA_SAVE . '\';jwajaxvote_lang[\'THANKS\'] = \'' . $thmess . '\';jwajaxvote_lang[\'ALREADY_VOTE\'] = \'' . _PJA_YOU_VOTE_ADD . '\';jwajaxvote_lang[\'VOTES\'] = \'' . _PJA_VOTES . '\';jwajaxvote_lang[\'VOTE\'] = \'' . _PJA_VOTE . '\';</script>';
		$script = '<script type="text/javascript" src="' . $mainframe->getCfg('live_site') . '/mambots/content/plugin_jw_ajaxvote/js/ajaxvote.js"></script>';
if (!$addScriptJWAjaxVote) {
	$addScriptJWAjaxVote = 1;
// при включенном кэшировании подключить js код вместе с первым выводом кнопок голосования
if (!$mosConfig_caching == 1) {
echo $script;
} else {
// при отключенном кэшировании подключит js код в head
$mainframe->addCustomHeadTag($script);
	}
}
?>
<div class="jwajaxvote-inline-rating">
<ul class="jwajaxvote-star-rating">
	<li id="rating<?php echo $id; ?>" class="current-rating" style="width:<?php echo $result; ?>%;"></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id; ?>,1,<?php echo $rating_sum; ?>,<?php echo $rating_count; ?>);" title="<?php echo _PJA_1_5;?>" class="one-star">1</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id; ?>,2,<?php echo $rating_sum; ?>,<?php echo $rating_count; ?>);" title="<?php echo _PJA_2_5;?>" class="two-stars">2</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id; ?>,3,<?php echo $rating_sum; ?>,<?php echo $rating_count; ?>);" title="<?php echo _PJA_3_5;?>" class="three-stars">3</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id; ?>,4,<?php echo $rating_sum; ?>,<?php echo $rating_count; ?>);" title="<?php echo _PJA_4_5;?>" class="four-stars">4</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id; ?>,5,<?php echo $rating_sum; ?>,<?php echo $rating_count; ?>);" title="<?php echo _PJA_4_5;?>" class="five-stars">5</a></li>
</ul>
<div id="jwajaxvote<?php echo $id; ?>" class="jwajaxvote-box">
<?php
	if ($rating_count != 1) {
		echo '(' . $rating_count . ' ' . _PJA_VOTES . ')';
	} else {
		echo '(' . $rating_count . ' ' . _PJA_VOTE . ')';
	}
?>
</div>
</div>
<div class="jwajaxvote-clr"></div>
	<?php
}
}
?>