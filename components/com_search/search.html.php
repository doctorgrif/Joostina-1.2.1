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
* @subpackage Search
*/
class search_html {

function openhtml($params) {
	if ($params->get('page_title')) {
?>
<div class="componentheading<?php echo $params->get('pageclass_sfx'); ?>">
	<?php echo $params->get('header'); ?>
</div>
		<?php
	}
}
function searchbox($searchword, &$lists, $params) {
	global $Itemid;
?>
<form action="<?php echo sefRelToAbs('index.php'); ?>" method="get">
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
	<div id="search" class="contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
		<div id="search_searchword">
			<div>
				<label for="search_searchword"><?php echo _PROMPT_KEYWORD; ?>:</label>
			</div>
			<input type="text" name="searchword" id="search_searchword" size="46" maxlength="30" value="<?php echo stripslashes($searchword); ?>" placeholder="<?php echo _PROMPT_KEYWORD; ?>" /> 
			<input type="submit" name="submit" value="<?php echo _SEARCH_TITLE; ?>" class="searchbutton" />
		</div>
		<?php echo $lists['searchphrase']; ?>
		<div id="search_ordering"><br />
			<div>
				<label for="search_ordering"><?php echo _CMN_ORDERING; ?>:</label> <?php echo $lists['ordering']; ?>
			</div>
		</div>
	</div>
</form>
<?php
}
	function searchintro($searchword, $params) {
		?>
<div class="searchintro<?php echo $params->get('pageclass_sfx'); ?>">
	<?php
}
	function message($message) {
		echo $message;
	}
	function displaynoresult() {
	}
	function display(&$rows, $params, $pageNav, $limitstart, $limit, $total, $totalRows, $searchword) {
		global $mosConfig_hideCreateDate;
		global $mosConfig_live_site, $option, $Itemid;
		$image = mosAdminMenus::ImageCheck('aport.png', '/components/com_search/images/', null, null, 'Aport', 'Aport', 1);
		$image1 = mosAdminMenus::ImageCheck('bing.png', '/components/com_search/images/', null, null, 'Bing', 'Bing', 1);
		$image2 = mosAdminMenus::ImageCheck('gogo.png', '/components/com_search/images/', null, null, 'GoGo', 'GoGo', 1);
		$image3 = mosAdminMenus::ImageCheck('google.png', '/components/com_search/images/', null, null, 'Google', 'Google', 1);
		$image4 = mosAdminMenus::ImageCheck('mail.png', '/components/com_search/images/', null, null, 'Mail', 'Mail', 1);
		$image5 = mosAdminMenus::ImageCheck('nigma.png', '/components/com_search/images/', null, null, 'Nigma', 'Nigma', 1);
		$image6 = mosAdminMenus::ImageCheck('rambler.png', '/components/com_search/images/', null, null, 'Rambler', 'Rambler', 1);
		$image7 = mosAdminMenus::ImageCheck('yahoo.png', '/components/com_search/images/', null, null, 'Yahoo', 'Yahoo', 1);
		$image8 = mosAdminMenus::ImageCheck('yandex.png', '/components/com_search/images/', null, null, 'Yandex', 'Yandex', 1);
		$searchword = urldecode($searchword);
		$searchword = htmlspecialchars($searchword, ENT_QUOTES);
	?>
</div>
	<?php
		$ordering = strtolower(strval(mosGetParam($_REQUEST, 'ordering', 'newest')));
		$searchphrase = strtolower(strval(mosGetParam($_REQUEST, 'searchphrase', 'any')));
		$searchphrase = htmlspecialchars($searchphrase);
		$cleanWord = htmlspecialchars($searchword);
		$link = $mosConfig_live_site . '/index.php?option=' . $option . '&amp;Itemid=' . $Itemid . '&amp;searchword=' . $cleanWord . '&amp;searchphrase=' . $searchphrase . '&amp;ordering=' . $ordering;
		$link = sefRelToAbs($link);
// if($total>0){
		echo '<br /><div><label class="limitstar">' . _SEARCH_LIMITSTART . ':</label> ' . $pageNav->getLimitBox($link) . '</div><br />';
//}
	?>
<div class="contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
	<div class="searchresult<?php echo $params->get('pageclass_sfx'); ?>">
		<p>
			<span class="strong"><?php echo _SEARCH_RESULT; ?></span> <?php echo _PROMPT_KEYWORD, ' <span class="highlight">', stripslashes($searchword), '</span>'; ?>. <?php eval('echo "' . _CONCLUSION . '";'); ?>
		</p>
		<?php
			$z = $limitstart + 1;
			$end = $limit + $z;
			if ($end > $total) {
				$end = $total + 1;
			}
			for ($i = $z; $i < $end; ++$i) {
				$row = $rows[$i - 1];
			if ($row->created) {
				$created = mosFormatDate($row->created, _DATE_FORMAT_LC);
			} else {
				$created = '';
			}
		?>
		<fieldset>
			<dl>
				<dt>
					<h6>
						<?php
						if ($row->href) {
						$row->href = ampReplace($row->href);
						if ($row->browsernav == 1) {
						?>
						<a href="<?php echo sefRelToAbs($row->href); ?>" target="_blank">
						<?php } else { ?>
						<a href="<?php echo sefRelToAbs($row->href); ?>">
						<?php }
						} echo $row->title;
						if ($row->href) { ?>
						</a>
					</h6>
					<?php } if ($row->section) { ?> 
					<p class="section<?php echo $params->get('pageclass_sfx'); ?>">[<?php echo $row->section; ?>]</p>
					<?php } ?>
				</dt>
				<dd>
					<p>
						<span class="number<?php echo $params->get('pageclass_sfx'); ?>"><?php echo $i . '.'; ?></span>
						<?php echo ampReplace($row->text); ?>
					</p>
					<?php if (!$mosConfig_hideCreateDate) { ?>
					<p class="created<?php echo $params->get('pageclass_sfx'); ?>"><?php echo $created; ?></p>
					<?php } ?>
				</dd>
			</dl>
		</fieldset>
		<?php } ?>
	</div>
</div>
<?php
}
	function conclusion($searchword, $pageNav) {
		global $mosConfig_live_site, $option, $Itemid;
		$ordering = strtolower(strval(mosGetParam($_REQUEST, 'ordering', 'newest')));
		$searchphrase = strtolower(strval(mosGetParam($_REQUEST, 'searchphrase', 'any')));
		$searchphrase = htmlspecialchars($searchphrase);
		$link = $mosConfig_live_site . '/index.php?option=' . $option . '&amp;Itemid=' . $Itemid . '&amp;searchword=' . $searchword . '&amp;searchphrase=' . $searchphrase . '&amp;ordering=' . $ordering;
		$link = sefRelToAbs($link);
		echo $pageNav->writePagesLinks($link);
		echo $pageNav->writePagesCounter();
	}
}
?>