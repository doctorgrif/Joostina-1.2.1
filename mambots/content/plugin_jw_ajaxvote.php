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
// ����� �������� ��� �������
$_MAMBOTS->registerFunction('onAfterDisplayContent', 'pluginJWAjaxVote');
function pluginJWAjaxVote(&$row, &$params) {
	global $mainframe, $addScriptJWAjaxVote, $mosConfig_caching;
	$id = $row->id;
	$result = 0;
	if ($params->get('rating') && !$params->get('popup')) {
		$vote = new stdClass;
		$vote->rating_count = $row->rating_count;
		$vote->rating_sum = $row->rating;
		if ($vote->rating_count != 0)
			$result = number_format(intval($vote->rating_sum), 2) * 20;
		$rating_sum = intval($vote->rating_sum);
		$rating_count = intval($vote->rating_count);
		$thmess = $mosConfig_caching ? '' . _PJA_THANKS_FULL . '' : '' . _PJA_THANKS_FULL . '';
$script = '<script type="text/javascript" src="' . $mainframe->getCfg('live_site') . '/mambots/content/plugin_jw_ajaxvote/js/ajaxvote.js"></script>
<script type="text/javascript">
var live_site = \'' . $mainframe->getCfg('live_site') . '\';
var jwajaxvote_lang = new Array();
jwajaxvote_lang[\'UPDATING\'] = \'' . _PJA_SAVE . '\';
jwajaxvote_lang[\'THANKS\'] = \'' . $thmess . '\';
jwajaxvote_lang[\'ALREADY_VOTE\'] = \'' . _PJA_YOU_VOTE_ADD . '\';
jwajaxvote_lang[\'VOTES\'] = \'' . _PJA_VOTES . '\';
jwajaxvote_lang[\'VOTE\'] = \'' . _PJA_VOTE . '\';
</script>';
if (!$addScriptJWAjaxVote) {
	$addScriptJWAjaxVote = 1;
// ��� ���������� ����������� ������� ����������� js ���� ������ � ������ ������� ������ �����������
if ($mosConfig_caching)
echo $mainframe->addCustomHeadTag($script);
else
// ���� ����������� �� ������� - ������� js ��� � ��������� ��������
$mainframe->addCustomHeadTag($script);
	}
?>
<div class="jwajaxvote-inline-rating">
<ul class="jwajaxvote-star-rating">
	<li id="rating<?php echo $id ?>" class="current-rating" style="width:<?php echo $result ?>%;"></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id ?>,1,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="<?php echo _PJA_1_5;?>" class="one-star">1</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id ?>,2,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="<?php echo _PJA_2_5;?>" class="two-stars">2</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id ?>,3,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="<?php echo _PJA_3_5;?>" class="three-stars">3</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id ?>,4,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="<?php echo _PJA_4_5;?>" class="four-stars">4</a></li>
	<li><a href="javascript:void(null)" onclick="javascript:jwAjaxVote(<?php echo $id ?>,5,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="<?php echo _PJA_4_5;?>" class="five-stars">5</a></li>
</ul>
<div id="jwajaxvote<?php echo $id ?>" class="jwajaxvote-box">
<?php
	if ($rating_count != 1) {
		echo $rating_count.' '._PJA_VOTES;
	} else {
		echo $rating_count.' '._PJA_VOTE;
	}
?>
</div>
</div>
<div class="clearfix"></div>
	<?php
}
}
?>