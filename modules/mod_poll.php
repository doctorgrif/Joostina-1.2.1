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
global $Itemid;
if (!defined('_JOS_POLL_MODULE')) {
// обеспечивает запуск функции только один раз
	define('_JOS_POLL_MODULE', 1);
	/**
	* @param int The current menu item
	* @param string CSS suffix
	*/
	function show_poll_vote_form($Itemid, &$params) {
		global $database;
		$query = "SELECT p.id, p.title FROM #__polls AS p INNER JOIN #__poll_menu AS pm ON  pm.pollid = p.id WHERE ( pm.menuid = " . (int) $Itemid . " OR pm.menuid = 0 ) AND p.published = 1";
		$database->setQuery($query);
		$polls = $database->loadObjectList();
		if ($database->getErrorNum()) {
			echo 'MB ' . $database->stderr(true);
			return;
		}
// try to find poll component's Itemid
		$query = "SELECT id FROM #__menu WHERE type = 'components' AND published = 1 AND link = 'index.php?option=com_poll'";
		$database->setQuery($query);
		$_Itemid = $database->loadResult();
		if ($_Itemid) {
			$_Itemid = '&amp;Itemid=' . $_Itemid;
		}
		$z = 1;
		foreach ($polls as $poll) {
			if ($poll->id && $poll->title) {
				$query = "SELECT id, text FROM #__poll_data WHERE pollid = " . (int) $poll->id . "\n AND text != '' ORDER BY id";
				$database->setQuery($query);
				if (!($options = $database->loadObjectList())) {
					echo $database->stderr(true);
					return;
				}
				poll_vote_form_html($poll, $options, $_Itemid, $params, $z);
				$z++;
			}
		}
	}
	/**
	* @param object Poll object
	* @param array
	* @param int The current menu item
	* @param string CSS suffix
	*/
	function poll_vote_form_html(&$poll, &$options, $_Itemid, &$params, $z) {
		$tabclass_arr = array('sectiontableentry2', 'sectiontableentry1');
		$tabcnt = 0;
		$moduleclass_sfx = $params->get('moduleclass_sfx');
		$cookiename = "voted$poll->id";
		$voted = mosGetParam($_COOKIE, $cookiename, 'z');
// used for spoof hardening
		$validate = josSpoofValue('poll');
		?>
<script type="text/javascript">
	function submitbutton_Poll<?php echo $z; ?>() {
		var form= document.pollxtd<?php echo $z; ?>;
		var radio= form.voteid;
		var radioLength = radio.length;
		var check= 0;
		if ( '<?php echo $voted; ?>' != 'z' ) {
			alert('<?php echo addslashes(_ALREADY_VOTE); ?>');
			return;
		}
		for(var i = 0; i < radioLength; ++i) {
			if(radio[i].checked) {
				form.submit();
				check = 1;
			}
		}
		if (check == 0) {
			alert('<?php echo addslashes(_NO_SELECTION); ?>');
		}
	}
</script>
<form name="pollxtd<?php echo $z; ?>" method="post" action="<?php echo sefRelToAbs("index.php?option=com_poll$_Itemid"); ?>">
	<div class="mpoll<?php echo $moduleclass_sfx; ?>">
	<legend><?php echo $poll->title; ?></legend>
		<div class="stableborder<?php echo $moduleclass_sfx; ?>">
			<?php for ($i = 0, $n = count($options); $i < $n; ++$i) { ?>
			<div class="poll-question<?php echo $moduleclass_sfx; ?>">
				<input type="radio" name="voteid" id="voteid<?php echo $options[$i]->id; ?>" value="<?php echo $options[$i]->id; ?>" alt="<?php echo $options[$i]->id; ?>" />
				<label for="voteid<?php echo $options[$i]->id; ?>"><?php echo stripslashes($options[$i]->text); ?></label>
			</div>
			<?php
				if ($tabcnt == 1) {
					$tabcnt = 0;
				} else {
					$tabcnt++;
				}
			}
			?>
		</div>
		<div class="pollbuttons">
			<input type="button" onclick="submitbutton_Poll<?php echo $z; ?>();" name="task_button" class="button" value="<?php echo _BUTTON_VOTE; ?>" />
			<input type="button" onclick="document.location.href='<?php echo sefRelToAbs("index.php?option=com_poll&amp;task=results&amp;id=$poll->id$_Itemid"); ?>';" name="option" class="button" value="<?php echo _BUTTON_RESULTS; ?>" />
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo $poll->id; ?>" />
	<input type="hidden" name="task" value="vote" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
		<?php
	}
}
show_poll_vote_form($Itemid, $params);
?>