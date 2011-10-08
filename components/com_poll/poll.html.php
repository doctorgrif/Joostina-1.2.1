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

/**
* @package Joostina
* @subpackage Polls
*/
class poll_html {

	function showResults(&$poll, &$votes, $first_vote, $last_vote, $pollist, $params) {
		global $mosConfig_live_site;
		?>
<div class="componentheading"><?php echo _POLLS; ?></div>
	<form action="index.php" method="post" name="poll" id="poll">
			<?php
			if ($params->get('page_title')) {
				?>
		<div class="componentheading<?php echo $params->get('pageclass_sfx'); ?>">
			<?php echo $params->get('header'); ?>
		</div>
				<?php
			}
			?>
		<div class="contentpane<?php echo $params->get('pageclass_sfx'); ?>">
			<div id="id">
				<label for="id"><?php echo _SEL_POLL; ?></label>
				<div><?php echo $pollist; ?></div>
			</div>
				<?php
				if ($votes) {
					$j = 0;
					$data_arr['text'] = null;
					$data_arr['hits'] = null;
					$data_arr['voters'] = null;
					foreach ($votes as $vote) {
						$data_arr['text'][$j] = trim($vote->text);
						$data_arr['hits'][$j] = $vote->hits;
						$data_arr['voters'][$j] = $vote->voters;
						$j++;
					}
					poll_html::graphit($data_arr, $poll->title, $first_vote, $last_vote);
				}
				?>
		</div>
	</form>
		<?php
		mosHTML::BackButton($params);
	}

	function graphit($data_arr, $graphtitle, $first_vote, $last_vote) {
		global $mosConfig_live_site, $polls_maxcolors, $tabclass, $polls_barheight, $polls_graphwidth, $polls_barcolor;
		$tabclass_arr = explode(',', $tabclass);
		$tabcnt = 1;
		$colorx = 0;
		$maxval = 0;
		array_multisort($data_arr['hits'], SORT_NUMERIC, SORT_DESC, $data_arr['text']);
		foreach ($data_arr['hits'] as $hits) {
			if ($maxval < $hits) {
				$maxval = $hits;
			}
		}
		?>
<div class="quest">
	<h4><?php echo $graphtitle; ?></h4>
</div>
<table class="poll" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<th class="question"><?php echo _POLL_OPTION; ?></th>
		<th class="hits"><?php echo _POLL_HITS; ?></th>
		<th class="percent">%</th>
		<th class="graph"><?php echo _POLL_GRAFIC; ?></th>
	</tr>
			<?php
			for ($i = 0, $n = count($data_arr['text']); $i < $n; ++$i) {
				$text = &$data_arr['text'][$i];
				$hits = &$data_arr['hits'][$i];
				$sumval = &$data_arr['voters'][$i];
				if ($maxval > 0 && $sumval > 0) {
					$width = ceil($hits * $polls_graphwidth / $maxval);
					$percent = round(100 * $hits / $sumval, 1);
				} else {
					$width = 0;
					$percent = 0;
				}
				?>
	<tr class="<?php echo $tabclass_arr[$tabcnt]; ?>">
		<td class="question"><?php echo stripslashes($text); ?></td>
		<td class="hits"><?php echo $hits; ?></td>
		<td class="percent"><?php echo $percent; ?></td>
					<?php
					$tdclass = '';
					if ($polls_barcolor == 0) {
						if ($colorx < $polls_maxcolors) {
							$colorx = ++$colorx;
						} else {
							$colorx = 1;
						}
						$tdclass = 'pollscolor' . $colorx;
					} else {
						$tdclass = 'pollscolor' . $polls_barcolor;
					}
					?>
		<td class="graph">
			<img src="<?php echo $mosConfig_live_site; ?>/components/com_poll/images/blank.png" class="<?php echo $tdclass; ?>" height="<?php echo $polls_barheight; ?>" width="<?php echo $width; ?>" alt="" />
		</td>
	</tr>
				<?php
				$tabcnt = 1 - $tabcnt;
			}
			?>
</table>
<div class="polldopinfo">
	<p><span class="strong"><?php echo _NUM_VOTERS; ?></span> <?php echo $sumval; ?></p>
	<p><span class="strong"><?php echo _FIRST_VOTE; ?></span> <?php echo $first_vote; ?></p>
	<p><span class="strong"><?php echo _LAST_VOTE; ?></span> <?php echo $last_vote; ?></p>
</div>
		<?php
	}
}
?>