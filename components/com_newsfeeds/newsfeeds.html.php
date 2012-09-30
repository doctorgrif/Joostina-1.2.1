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
* @subpackage Newsfeeds
*/
class HTML_newsfeed {

function displaylist(&$categories, &$rows, $catid, $currentcat = null, &$params, $tabclass) {
	global $Itemid, $mosConfig_live_site, $hide_js;
		if ($params->get('page_title')) {
?>
<div class="componentheading"><?php echo $currentcat->header; ?></div>
	<?php
	}
	?>
<form action="index.php" method="post" name="adminForm">
	<div class="contentpane<?php echo $params->get('pageclass_sfx'); ?>">
		<?php if ($currentcat->descrip) { ?>
		<div>
			<div class="contentdescription">
		<?php
// show image
		if ($currentcat->img) {
		?>
		<figure>
			<img src="<?php echo $currentcat->img; ?>" style="float:<?php echo $currentcat->align; ?>;" hspace="6" alt="<?php echo _WEBLINKS_TITLE; ?>" />
		</figure>
		<?php
		}
		echo $currentcat->descrip;
		?>
			</div>
		</div>
		<?php } ?>
		<div>
			<div>
		<?php
		if (count($rows)) {
		HTML_newsfeed::showTable($params, $rows, $catid, $tabclass);
		}
		?>
			</div>
			<div>
		<?php
// Displays listing of Categories
		if (($params->get('type') == 'category') && $params->get('other_cat')) {
		HTML_newsfeed::showCategories($params, $categories, $catid);
		} else
		if (($params->get('type') == 'section') && $params->get('other_cat_section')) {
		HTML_newsfeed::showCategories($params, $categories, $catid);
		}
		?>
			</div>
		</div>
	</div>
</form><br />
		<?php
// displays back button
		mosHTML::BackButton($params, $hide_js);
	}

	/* Display Table of items */
	function showTable(&$params, &$rows, $catid, $tabclass) {
		global $mosConfig_live_site, $Itemid;
// icon in table display
		$img = mosAdminMenus::ImageCheck('con_info.png', '/images/M_images/', $params->get('icon'));
		?>
<table width="100%" align="center">
	<?php if ($params->get('headings')) { ?>
	<tr>
	<?php if ($params->get('name')) { ?>
		<td height="20" class="sectiontableheader"><?php echo _FEED_NAME; ?></td>
	<?php } ?>
	<?php if ($params->get('articles')) { ?>
		<td height="20" class="sectiontableheader"><?php echo _FEED_ARTICLES; ?></td>
	<?php } ?>
	<?php if ($params->get('link')) { ?>
		<td height="20" class="sectiontableheader"><?php echo _FEED_LINK; ?></td>
	<?php } ?>
	</tr>
		<?php
			}
			$k = 0;
			foreach ($rows as $row) {
		$link = 'index.php?option=com_newsfeeds&amp;task=view&amp;feedid=' . $row->id . '&amp;Itemid=' . $Itemid;
		?>
	<tr>
			<?php if ($params->get('name')) { ?>
		<td class="<?php echo $tabclass[$k]; ?>">
			<p>
		<a href="<?php echo sefRelToAbs($link); ?>" class="category" title="<?php echo $row->name; ?>">
			<?php echo $row->name; ?>
		</a>
			</p>
		</td>
				<?php } ?>
			<?php if ($params->get('articles')) { ?>
		<td width="20%" class="<?php echo $tabclass[$k]; ?> td-articles" align="center"><?php echo $row->numarticles; ?></td>
				<?php } ?>
			<?php if ($params->get('link')) { ?>
		<td width="50%" class="<?php echo $tabclass[$k]; ?>"><a href="<?php echo ampReplace($row->link); ?>" rel="nofollow"><?php echo ampReplace($row->link); ?></a></td>
			<?php } ?>
	</tr>
			<?php
			$k = 1 - $k;
		}
		?>
</table>
		<?php
	}

	/** Display links to categories */
	function showCategories(&$params, &$categories, $catid) {
		global $mosConfig_live_site, $Itemid;
		?>
<ul class="newsfeeds">
		<?php
		foreach ($categories as $cat) {
			if ($catid == $cat->catid) {
		?>
	<li>
		<?php echo $cat->title; ?> <span>(<?php echo $cat->numlinks; ?>)</span>
	</li>
				<?php
			} else {
				$link = 'index.php?option=com_newsfeeds&amp;catid=' . $cat->catid . '&amp;Itemid=' . $Itemid;
				?>
	<li>
		<a href="<?php echo sefRelToAbs($link); ?>" class="category" title="<?php echo $cat->title; ?>"><?php echo $cat->title; ?></a>
				<?php if ($params->get('cat_items')) { ?>
		<span>(<?php echo $cat->numlinks; ?>)</span>
					<?php } ?>
				<?php
// Writes Category Description
				if ($params->get('cat_description')) {
					echo '<div>';
					echo $cat->description;
					echo '</div>';
				}
				?>
	</li>
		<?php
			}
		}
		?>
</ul>
			<?php
		}

		function showNewsfeeds(&$newsfeed, $LitePath, $cacheDir, &$params) {
			?>
<table width="100%" class="contentpane">
			<?php if ($params->get('header')) { ?>
	<tr>
		<td class="componentheading" colspan="2"><?php echo $params->get('header'); ?></td>
	</tr>
		<?php
			}
// full RSS parser used to access image information
			$rssDoc = new xml_domit_rss_document();
			$rssDoc->setRSSTimeout(5);
			$rssDoc->useCacheLite(true, $LitePath, $cacheDir, $newsfeed->cache_time);
			$success = $rssDoc->loadRSS($newsfeed->link);
			$utf8enc = $newsfeed->code;
			if ($success) {
		$totalChannels = $rssDoc->getChannelCount();
		for ($i = 0; $i < $totalChannels; ++$i) {
			$currChannel = &$rssDoc->getChannel($i);
			$elements = $currChannel->getElementList();
			$descrip = 0;
			$iUrl = 0;
			foreach ($elements as $element) {
//image handling
				if ($element == 'image') {
					$image = &$currChannel->getElement(DOMIT_RSS_ELEMENT_IMAGE);
					$iUrl = $image->getUrl();
					$iTitle = $image->getTitle();
				}
				if ($element == 'description') {
					$descrip = 1;
// hide com_rss descrip in 4.5.0 feeds
					if ($currChannel->getDescription() == 'com_rss') {
				$descrip = 0;
					}
				}
			}
			$feed_title = $currChannel->getTitle();
			$feed_title = mosCommonHTML::newsfeedEncoding($rssDoc, $feed_title, $utf8enc);
			?>
	<tr>
		<td class="contentheading<?php echo $params->get('pageclass_sfx'); ?>">
			<a href="<?php echo ampReplace($currChannel->getLink()); ?>" target="_blank" title="<?php echo $feed_title; ?>"><?php echo $feed_title; ?></a>
		</td>
	</tr>
		<?php
// feed description
		if ($descrip && $params->get('feed_descr')) {
			$feed_descrip = $currChannel->getDescription();
			$feed_descrip = mosCommonHTML::newsfeedEncoding($rssDoc, $feed_descrip, $utf8enc);
			?>
	<tr>
		<td><?php echo $feed_descrip; ?><br /><br /></td>
	</tr>
			<?php
		}
// feed image
		if ($iUrl && $params->get('feed_image')) {
			?>
	<tr>
		<td><img src="<?php echo $iUrl; ?>" alt="<?php echo $iTitle; ?>" /></td>
	</tr>
				<?php
			}
			$actualItems = $currChannel->getItemCount();
			$setItems = $newsfeed->numarticles;
			if ($setItems > $actualItems) {
				$totalItems = $actualItems;
			} else {
				$totalItems = $setItems;
			}
			?>
	<tr>
		<td>
			<ul>
					<?php
					for ($j = 0; $j < $totalItems; $j++) {
						$currItem = &$currChannel->getItem($j);
						$item_title = $currItem->getTitle();
						$item_title = mosCommonHTML::newsfeedEncoding($rssDoc, $item_title, $utf8enc);
						?>
		<li>
						<?php
// START fix for RSS enclosure tag url not showing
						if ($currItem->getLink()) {
							?>
			<a href="<?php echo ampReplace($currItem->getLink()); ?>" target="_blank" title="<?php echo $item_title; ?>"><?php echo $item_title; ?></a>
							<?php
						} else
						if ($currItem->getEnclosure()) {
							$enclosure = $currItem->getEnclosure();
							$eUrl = $enclosure->getUrl();
							?>
			<a href="<?php echo ampReplace($eUrl); ?>" target="_blank" title="<?php echo $item_title; ?>"><?php echo $item_title; ?></a>
							<?php
						} else
						if (($currItem->getEnclosure()) && ($currItem->getLink())) {
							$enclosure = $currItem->getEnclosure();
							$eUrl = $enclosure->getUrl();
							?>
			<a href="<?php echo ampReplace($currItem->getLink()); ?>" target="_blank" title="<?php echo $item_title; ?>"><?php echo $item_title; ?></a><br />
			<?php echo _NEWSFEED_LINK; ?>: 
			<a href="<?php echo $eUrl; ?>" target="_blank" title="<?php echo ampReplace($eUrl); ?>"><?php echo ampReplace($eUrl); ?></a>
							<?php
						}
// END fix for RSS enclosure tag url not showing
// item description
						if ($params->get('item_descr')) {
							$text = $currItem->getDescription();
							$text = mosCommonHTML::newsfeedEncoding($rssDoc, $text, $utf8enc);
							$num = $params->get('word_count');
// word limit check
							if ($num) {
						$texts = explode(' ', $text);
						$count = count($texts);
						if ($count > $num) {
							$text = '';
							for ($i = 0; $i < $num; ++$i) {
								$text .= ' ' . $texts[$i];
							}
							$text .= '…';
						}
							}
							?>
			<p><?php echo $text; ?></p>
						<?php } ?>
		</li>
			<?php
		}
		?>
			</ul>
		</td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<?php
			}
		}
		?>
</table>
		<?php
// displays back button
		mosHTML::BackButton($params);
	}
}
?>