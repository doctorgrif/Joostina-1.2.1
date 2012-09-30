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
<div class="componentheading"><?php echo $params->get('header'); ?></div>
		<?php
	}
}
function searchbox($searchword, &$lists, $params) {
	global $Itemid;
?>
<div id="search" class="contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
<form action="<?php echo sefRelToAbs('index.php'); ?>" method="get" class="form-search">
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
	<div class="col_100" id="search_searchword">
		<label for="search"><?php echo _PROMPT_KEYWORD; ?></label>
		<input type="text" name="searchword" id="search" maxlength="100" value="<?php echo stripslashes($searchword); ?>" placeholder="<?php echo _PROMPT_KEYWORD; ?>" /> 
		<input type="submit" name="submit" value="<?php echo _SEARCH_TITLE; ?>" id="submit" class="button" />
	</div>
	<div class="col_50" id="search-searchphrase">
		<label for="search-searchphrase"><?php echo _CMN_SEARCHPHRASE; ?></label><br />
		<?php echo $lists['searchphrase']; ?>
	</div>
	<div class="col_50" id="search-ordering">
		<label for="search-ordering"><?php echo _SEARCH_ORDERING; ?></label><br />
		<?php echo $lists['ordering']; ?>
		<?php } function searchintro($searchword, $params) { ?>
		<div class="searchintro">
		<?php }
		function message($message) {
			echo $message;
		}
		function displaynoresult() {
		}
		function display(&$rows, $params, $pageNav, $limitstart, $limit, $total, $totalRows, $searchword) {
		global $mosConfig_hideCreateDate;
		global $mosConfig_live_site, $option, $Itemid, $mainframe;
		$cur_template = $mainframe->getTemplate();
		$image = mosAdminMenus::ImageCheck('aport.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Aport','Aport',1);
		$image1 = mosAdminMenus::ImageCheck('bing.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Bing','Bing',1);
		$image2 = mosAdminMenus::ImageCheck('gogo.png','/templates/'.$cur_template.'/i/c/search/',null,null,'GoGo','GoGo',1);
		$image3 = mosAdminMenus::ImageCheck('google.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Google','Google',1);
		$image4 = mosAdminMenus::ImageCheck('mail.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Mail','Mail',1);
		$image5 = mosAdminMenus::ImageCheck('nigma.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Nigma','Nigma',1);
		$image6 = mosAdminMenus::ImageCheck('rambler.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Rambler','Rambler',1);
		$image7 = mosAdminMenus::ImageCheck('yahoo.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Yahoo','Yahoo',1);
		$image8 = mosAdminMenus::ImageCheck('yandex.png','/templates/'.$cur_template.'/i/c/search/',null,null,'Yandex','Yandex',1);
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
			//echo '<div>';
			echo '<label>' . _SEARCH_LIMITSTART . '</label>';
			echo $pageNav->getLimitBox($link);
			//echo '</div>';
		//}
		?>
	</div>
	<div class="clearfix"></div>
</form>
</div>
<div class="col_100 contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
	<div class="searchresult<?php echo $params->get('pageclass_sfx'); ?>">
		<p><span class="strong"><?php echo _SEARCH_RESULT; ?>:</span></p>
		<p><?php echo _PROMPT_KEYWORD, ' <span class="highlight">', stripslashes($searchword), '</span>'; ?>. <?php eval('echo "' . _CONCLUSION . '";'); ?></p>
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
			<p class="section">[<?php echo $row->section; ?>]</p>
			<?php } ?>
			</dt>
			<dd>
			<p>
				<span class="number"><?php echo $i . '.'; ?></span>
				<?php echo ampReplace($row->text); ?>
			</p>
			<?php if (!$mosConfig_hideCreateDate) { ?>
			<p class="created"><?php echo $created; ?></p>
			<?php } ?>
			</dd>
			</dl>
		</fieldset>
		<?php } ?>
	</div>
</div>
<div class="searchsystems">
	<p>Если не нашли - поищем глобально...</p>
	<ul class="ps">
		<li><a href="http://sm.aport.ru/search?That=std&r=<?php echo $searchword; ?>" target="_blank" title="aport.ru" rel="nofollow"><?php echo $image; ?></a></li>
		<li><a href="http://bing.com/search?q=<?php echo $searchword; ?>" target="_blank" title="bing.com" rel="nofollow"><?php echo $image1; ?></a></li>
		<li><a href="http://gogo.ru/go?q==<?php echo $searchword; ?>" target="_blank" title="gogo.ru" rel="nofollow"><?php echo $image2; ?></a></li>
		<li><a href="http://google.ru/webhp#hl=ru&q=<?php echo $searchword; ?>" target="_blank" title="google.ru" rel="nofollow"><?php echo $image3; ?></a></li>
		<li><a href="http://go.mail.ru/search?q=<?php echo $searchword; ?>" target="_blank" title="mail.ru" rel="nofollow"><?php echo $image4; ?></a></li>
		<li><a href="http://nigma.ru/index.php?s=<?php echo $searchword; ?>" target="_blank" title="nigma.ru" rel="nofollow"><?php echo $image5; ?></a></li>
		<li><a href="http://nova.rambler.ru/srch?words=<?php echo $searchword; ?>" target="_blank" title="rambler.ru" rel="nofollow"><?php echo $image6; ?></a></li>
		<li><a href="http://ru.search.yahoo.com/search?p=<?php echo $searchword; ?>" target="_blank" title="yahoo.com" rel="nofollow"><?php echo $image7; ?></a></li>
		<li><a href="http://yandex.ru/yandsearch?text=<?php echo $searchword; ?>" target="_blank" title="yandex.ru" rel="nofollow"><?php echo $image8; ?></a></li>
	</ul>
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