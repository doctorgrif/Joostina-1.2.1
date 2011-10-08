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

class HTML_content {

	function showMyContentList(&$items, &$access, &$params, &$pageNav, &$lists, $order) {
		global $Itemid, $database;
		if ($params->get('page_title')) {
			$title = $params->get('my_page_title');
			if (!$title) {
				$menu = new mosMenu($database);
				$menu->load($Itemid);
				$title = $menu->name;
			}
?>
<div class="componentheading<?php echo $params->get('pageclass_sfx'); ?>">
	<?php echo $title; ?>
</div>
	<?php } ?>
<div align="center" class="contentpane<?php echo $params->get('pageclass_sfx'); ?>">
	<div>
		<div>
			<?php
			if ($items) {
				HTML_content::showMyTable($params, $items, $pageNav, $access, $lists, $order);
			} else {
				echo _YOU_HAVE_NO_CONTENT;
			} ?>
		</div>
	</div>
</div>
<?php
	mosHTML::BackButton($params);
	}

		function showMyTable(&$params, &$items, &$pageNav, &$access, &$lists, $order) {
			global $mosConfig_live_site, $Itemid, $mosConfig_form_date_full;
			$link = 'index.php?option=com_content&amp;task=mycontent&amp;Itemid=' . $Itemid;
			mosCommonHTML::loadFullajax();
?>
<script type="text/javascript">
function ch_publ(elID) { log('<?php echo _CONTENT_CNG_STAT_PUB; ?>'+elID);
	id('img-pub-'+elID).src = ADMINISTRATOR_DIRECTORY.'/images/aload.gif';
	dax({ url: 'ajax.index.php?option=com_content&amp;utf=0&amp;task=publish&amp;id='+elID, id:'publ-'+elID, callback:
		function(resp, idTread, status, ops) {
			log('<?php echo _CONTENT_ANSWER; ?> ' + resp.responseText);
			id('img-pub-'+elID).src = ADMINISTRATOR_DIRECTORY.'/images/'+resp.responseText; }
	});
}
</script>
<form action="<?php echo sefRelToAbs($link); ?>" method="post" name="adminForm" id="adminForm">
	<table>
		<?php if ($params->get('filter') || $params->get('order_select') || $params->get('display')) { ?>
		<tr>
			<td colspan="5">
				<table>
					<tr>
						<?php if ($params->get('filter')) { ?>
						<td align="right" width="80%">
							<label for="filter"><?php echo _FILTER; ?></label>
							<input type="text" name="filter" size="50" value="<?php echo $lists['filter']; ?>" id="filter" class="inputbox" onchange="document.adminForm.submit();" />
						</td>
						<?php } if ($params->get('order_select')) { ?>
						<td align="right" width="20%">
							<label for=""><?php echo _ORDER_DROPDOWN; ?></label>
							<?php echo $lists['order']; ?>
						</td>
						<?php } if ($params->get('display')) { ?>
						<td align="right" width="80%"><?php echo _PN_DISPLAY_NR; ?><br />
							<?php $link = 'index.php?option=com_content&amp;task=mycontent&amp;Itemid=' . $Itemid . '&amp;order=' . $order;
							echo $pageNav->getLimitBox($link); ?>
						</td>
						<?php } ?>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>">&nbsp;</td>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" width="60%"><?php echo _HEADER_TITLE; ?></td>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>"><?php echo _E_PUBLISHING; ?></td>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" width="20%"><?php echo _DATE; ?></td>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>"><?php echo _HEADER_HITS; ?></td>
		</tr>
		<?php
			}
			$k = 0;
				foreach ($items as $row) {
				$row->Itemid_link = '&amp;Itemid=' . $Itemid;
				$row->_Itemid = $Itemid;
				$row->created = mosFormatDate($row->created, $mosConfig_form_date_full, '0');
				$link = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid);
				$img = $row->published ? 'publish_g.png' : 'publish_x.png';
				$img = $mosConfig_live_site . '/' . ADMINISTRATOR_DIRECTORY . '/images/' . $img;
		?>
		<tr class="sectiontableentry<?php echo ($k + 1) . $params->get('pageclass_sfx'); ?>" >
			<td>
				<p><?php HTML_content::EditIcon($row, $params, $access); ?></p>
			</td>
			<td>
				<p>
					<a href="<?php echo $link; ?>" title="<?php echo $row->title; ?>"><?php echo $row->title; ?></a>
				</p>
				<p>
					<span class="small">
						<?php if ($row->sectionid != 0)
							echo $row->section . ' / ' . $row->category;
							else
							echo _STATIC_CONTENT;
						?>
					</span>
				</p>
			</td>
			<td <?php echo ($access->canPublish) ? 'onclick="ch_publ(' . $row->id . ');" class="td-state"' : null; ?>>
				<p>
					<img class="img-mini-state" src="<?php echo $img; ?>" id="img-pub-<?php echo $row->id; ?>" alt="<?php echo _E_PUBLISHING; ?>" />
				</p>
			</td>
			<td class="td-date">
				<p><?php echo $row->created; ?></p>
			</td>
			<td class="td-hits">
				<p><?php echo $row->hits ? $row->hits : 0; ?></p>
			</td>
		</tr>
		<?php $k = 1 - $k;
			} if ($params->get('navigation')) {
		?>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="5" class="sectiontablefooter<?php echo $params->get('pageclass_sfx'); ?>"><?php $link = 'index.php?option=com_content&amp;task=mycontent&amp;Itemid=' . $Itemid . '&amp;order=' . $order;
				echo $pageNav->writePagesLinks($link); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<input type="hidden" name="task" value="mycontent" />
	<input type="hidden" name="option" value="com_content" />
</form>
	<?php
	}
	function showContentList($title, &$items, &$access, $id = 0, $sectionid = null, $gid, &$params, &$pageNav, $other_categories, &$lists, $order, $categories_exist) {
	global $Itemid, $mosConfig_live_site;
	if ($sectionid) {
	$id = $sectionid;
	}
	if (strtolower(get_class($title)) == 'mossection') {
	$catid = 0;
	} else {
	$catid = $title->id;
	}
	if ($params->get('page_title')) {
	?>
<div class="componentheading<?php echo $params->get('pageclass_sfx'); ?>">
	<?php echo htmlspecialchars($title->name, ENT_QUOTES); ?>
</div>
	<?php } ?>
	<div class="contentpane<?php echo $params->get('pageclass_sfx'); ?>">
		<?php if (($params->get('description') && $title->description) || ($params->get('description_image') && $title->image)) { ?>
		<div class="contentdescription<?php echo $params->get('pageclass_sfx'); ?>">
			<?php if ($params->get('description_image') && $title->image) {
			$link = $mosConfig_live_site . '/images/stories/' . $title->image; ?>
				<img src="<?php echo $link; ?>" align="<?php echo $title->image_position; ?>" hspace="6" alt="<?php echo $title->image; ?>" />
			<?php } if ($params->get('description')) {
				echo '<p>' . $title->description . '</p>';
			} ?>
		</div>
		<?php } ?>
		<div>
			<?php
			if ($items) {
				HTML_content::showTable($params, $items, $gid, $catid, $id, $pageNav, $access, $sectionid, $lists, $order);
			} else if ($catid) {
			?>
			<?php echo _EMPTY_CATEGORY; ?>
			<?php
				} if (($access->canEdit || $access->canEditOwn) && $categories_exist) {
				$link = sefRelToAbs('index.php?option=com_content&amp;task=new&amp;sectionid=' . $id . '&amp;Itemid=' . $Itemid); ?>
				<img src="<?php echo $mosConfig_live_site; ?>/images/M_images/new.png" alt="<?php echo _CMN_NEW; ?>" />
				<a href="<?php echo $link; ?>" title="<?php echo _CMN_NEW; ?>">
				<?php echo _CMN_NEW; ?>…
				</a>
			<?php } ?>
		</div>
		<div>
			<?php
				if (((count($other_categories) > 1) || (count($other_categories) < 2 && count($items) < 1))) {
					if (($params->get('type') == 'category') && $params->get('other_cat')) {
						HTML_content::showCategories($params, $items, $gid, $other_categories, $catid, $id, $Itemid);
					}
					if (($params->get('type') == 'section') && $params->get('other_cat_section')) {
						HTML_content::showCategories($params, $items, $gid, $other_categories, $catid, $id, $Itemid);
					}
			} ?>
		</div>
	</div>
	<?php mosHTML::BackButton($params);
	}

	function showCategories(&$params, &$items, $gid, &$other_categories, $catid, $id, $Itemid) {
		if (!count($other_categories))
		return; ?>
	<ul class="category">
		<?php foreach ($other_categories as $row) {
		$row->name = htmlspecialchars(stripslashes(ampReplace($row->name)), ENT_QUOTES);
		if ($catid != $row->id) {
		?>
		<li>
			<?php if ($row->access <= $gid) {
				$link = sefRelToAbs('index.php?option=com_content&amp;task=category&amp;sectionid=' . $id . '&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid); ?>
			<a href="<?php echo $link; ?>" class="category" title="<?php echo $row->name; ?>"><?php echo $row->name; ?></a>
			<?php if ($params->get('cat_items')) { ?>&nbsp;<em>(<?php echo $row->numitems;
				echo _CHECKED_IN_ITEMS; ?>)</em>
			<?php } if ($params->get('cat_description') && $row->description) { ?><br />
				<?php echo $row->description;
					}
					} else {
					echo $row->name; ?>
			(<a href="<?php echo sefRelToAbs('index.php?option=com_registration&amp;task=register'); ?>" title="<?php echo _E_REGISTERED; ?>"><?php echo _E_REGISTERED; ?></a>)
						<?php } ?>
		</li>
		<?php } 
		} ?>
	</ul>
	<?php }

		function showTable(&$params, &$items, &$gid, $catid, $id, &$pageNav, &$access, &$sectionid, &$lists, $order) {
			global $Itemid;
			$link = 'index.php?option=com_content&amp;task=category&amp;sectionid=' . $sectionid . '&amp;id=' . $catid . '&amp;Itemid=' . $Itemid; ?>
<form action="<?php echo sefRelToAbs($link); ?>" method="post" name="adminForm">
	<table>
	<?php if ($params->get('filter') || $params->get('order_select') || $params->get('display')) { ?>
		<tr>
			<td colspan="4">
				<table>
					<tr>
						<?php if ($params->get('filter')) { ?>
						<td align="right" width="100%" class="jtd_nowrap"><?php echo _FILTER . '&nbsp;'; ?><br />
							<input type="text" name="filter" value="<?php echo $lists['filter']; ?>" class="inputbox" onchange="document.adminForm.submit();" />
						</td>
						<?php } if ($params->get('order_select')) { ?>
						<td align="right" width="100%" class="jtd_nowrap"><?php echo '&nbsp;&nbsp;&nbsp;' . _ORDER_DROPDOWN . '&nbsp;';
							echo '<br />';
							echo $lists['order']; ?>
						</td>
						<?php } if ($params->get('display')) { ?>
						<td align="right" width="100%" class="jtd_nowrap"><?php
							$order = '';
							if ($lists['order_value']) {
								$order = '&amp;order=' . $lists['order_value'];
							}
							$filter = '';
							if ($lists['filter']) {
								$filter = '&amp;filter=' . $lists['filter'];
							}
							$link = 'index.php?option=com_content&amp;task=category&amp;sectionid=' . $sectionid . '&amp;id=' . $catid . '&amp;Itemid=' . $Itemid . $order . $filter;
							echo '&nbsp;&nbsp;&nbsp;' . _PN_DISPLAY_NR . '&nbsp;';
							echo '<br />';
							echo $pageNav->getLimitBox($link);
							?>
						</td>
						<?php } ?>
					</tr>
				</table>
			</td>
		</tr>
		<?php } if ($params->get('headings')) { ?>
		<tr>
		<?php if ($params->get('date')) { ?>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" width="15%"><?php echo _DATE; ?></td>
			<?php } if ($params->get('title')) { ?>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>"><?php echo _HEADER_TITLE; ?></td>
			<?php } if ($params->get('author')) { ?>
			<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" align="left"><?php echo _HEADER_AUTHOR; ?></td>
			<?php } if ($params->get('hits')) { ?>
			<td align="center" class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" width="5%"><?php echo _HEADER_HITS; ?></td>
			<?php } ?>
		</tr>
		<?php } $k = 0;
			foreach ($items as $row) {
			$row->created = mosFormatDate($row->created, $params->get('date_format'));
			HTML_content::_Itemid($row); ?>
		<tr class="sectiontableentry<?php echo ($k + 1) . $params->get('pageclass_sfx'); ?>" >
		<?php if ($params->get('date')) { ?>
			<td class="td-date">
				<p><?php echo $row->created; ?></p>
			</td>
				<?php
					}
					if ($params->get('title')) {
					if ($row->access <= $gid) {
					$link = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;Itemid=' . $Itemid); ?>
			<td><?php HTML_content::EditIcon($row, $params, $access); ?>
				<p>
					<a href="<?php echo $link; ?>" title="<?php echo $row->title; ?>"><?php echo $row->title; ?></a>
				</p>
			</td>
			<?php } else { ?>
			<td>
				<p>
					<?php echo $row->title . ' : ';
						$link = sefRelToAbs('index.php?option=com_registration&amp;task=register'); ?>
				</p>
				<p>
					<a href="<?php echo $link; ?>" title="<?php echo _READ_MORE_REGISTER; ?>"><?php echo _READ_MORE_REGISTER; ?></a>
				</p>
			</td>
			<?php }
			} if ($params->get('author')) { ?>
			<td class="td-author">
				<p>
					<?php echo '<img src="' . $mosConfig_absolute_path . '/images/avatars/micro/' . $row->created_by . '.jpg" alt="' . ($row->created_by_alias ? $row->created_by_alias : $row->author) . '" />'; ?>
					<?php echo $row->created_by_alias ? $row->created_by_alias : $row->author; ?>
				</p>
			</td>
			<?php } if ($params->get('hits')) { ?>
			<td class="td-hits">
				<p><?php echo $row->hits ? $row->hits : '-'; ?></p>
			</td>
			<?php } ?>
		</tr>
		<?php $k = 1 - $k;
			} if ($params->get('navigation')) { ?>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="4" class="sectiontablefooter<?php echo $params->get('pageclass_sfx'); ?>">	<?php
				$order = '';
				if ($lists['order_value']) {
				$order = '&amp;order=' . $lists['order_value'];
				}
				$filter = '';
				if ($lists['filter']) {
				$filter = '&amp;filter=' . $lists['filter'];
				}
				$link = 'index.php?option=com_content&amp;task=category&amp;sectionid=' . $sectionid . '&amp;id=' . $catid . '&amp;Itemid=' . $Itemid . $order . $filter;
				echo $pageNav->writePagesLinks($link); ?>
			</td>
		</tr>
		<tr>
			<td colspan="4" align="right"><?php echo $pageNav->writePagesCounter(); ?></td>
		</tr>
		<?php } ?>
	</table>
	<input type="hidden" name="id" value="<?php echo $catid; ?>" />
	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
	<input type="hidden" name="task" value="<?php echo $lists['task']; ?>" />
	<input type="hidden" name="option" value="com_content" />
</form>
		<?php
		}

		function showLinks(&$rows, $links, $total, $i = 0, $show = 1, $ItemidCount = null) {
		global $mainframe, $Itemid;
		$compat = (int) $mainframe->getCfg('itemid_compat');
		if ($show) {
		?>
	<div><?php echo _MORE; ?></div>
		<?php } ?>
		<ul>
		<?php
			for ($z = 0; $z < $links; $z++) {
			if (!isset($rows[$i])) {
			break;
			}
			if ($compat > 0 && $compat <= 11) {
			$_Itemid = $mainframe->getItemid($rows[$i]->id, 0, 0);
			} else {
			$_Itemid = $Itemid;
			}
			if ($_Itemid && $_Itemid != 99999999) {
			$Itemid_link = '&amp;Itemid=' . $_Itemid;
			} else {
			$Itemid_link = '';
			}
			$link = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id=' . $rows[$i]->id . $Itemid_link) ?>
			<li><a class="blogsection" href="<?php echo $link; ?>" title="<?php echo $rows[$i]->title; ?>"><?php echo $rows[$i]->title; ?></a></li>
			<?php ++$i;
			} ?>
		</ul>
		<?php
		}

		function show(&$row, &$params, &$access, $page = 0) {
		global $mainframe, $hide_js, $_MAMBOTS, $mosConfig_mmb_content_off, $mosConfig_live_site, $mosConfig_uid_blanks;
		global $news_uid, $task;
		$news_uid_css_title = '';
		$news_uid_css_body = '';
		if ($mosConfig_uid_blanks) {
		$news_uid++;
		$news_uid_css_title = 'id="title-news-uid-' . $news_uid . '" ';
		$news_uid_css_body = 'id="body-news-uid-' . $news_uid . '" ';
		}
		//if ($task == 'view') $news_uid_css = 'id="pageclass_uid_' . $params->get('pageclass_uids') . '" ';
		$mainframe->appendMetaTag('description', $row->metadesc);
		$mainframe->appendMetaTag('keywords', $row->metakey);
		if (isset($row->page_title) && $row->page_title) {
		$mainframe->setPageTitle($row->title . ' ' . $row->page_title);
		}
		$cur_params = new mosParameters($row->attribs);
		$news_uid_css_page = $cur_params->get('pageclass_uids');
		if ($cur_params->get('pageclass_uids_full') && trim($news_uid_css_page) != '') {
		$news_uid_css_title = 'id="title-news-' . $news_uid_css_page . '" ';
		$news_uid_css_body = 'id="body-news-' . $news_uid_css_page . '" ';
		};
		HTML_content::_Itemid($row);
		HTML_content::_linkInfo($row, $params);
		$print_link = $mosConfig_live_site . '/index2.php?option=com_content&amp;task=view&amp;id=' . $row->id . '&amp;pop=1&amp;page=' . $page . $row->Itemid_link;
		if ($mosConfig_mmb_content_off != 1) {
		$_MAMBOTS->loadBotGroup('content');
		$results = $_MAMBOTS->trigger('onPrepareContent', array(&$row, &$params, $page), true);
		}
		if ($params->get('item_title') || $params->get('email') || $params->get( 'pdf' ) || $params->get('print')) {
		?>
	<table <?php echo $news_uid_css_title; ?> class="contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
		<tr>
		<?php
			echo '<div class="title_line">';
			HTML_content::Title($row, $params, $access);
			echo '<div class="buttonheading">';
			echo '<ul>';
			HTML_content::EmailIcon($row, $params, $hide_js);
			HTML_content::PdfIcon($row, $params, $hide_js);
			mosHTML::PrintIcon($row, $params, $hide_js, $print_link);
			// Функция редактирования только своих статей с фронта
			if ($access->canEdit || $access->canEditOwn)
			HTML_content::EditIcon2($row, $params, $access);
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		?>
		</tr>
	</table>
	<?php
		}
		if (!$params->get('intro_only')) {
		$results = $_MAMBOTS->trigger('onAfterDisplayTitle', array(&$row, &$params, $page));
		echo trim(implode("\n", $results));
		} $results = $_MAMBOTS->trigger('onBeforeDisplayContent', array(&$row, &$params, $page));
		echo trim(implode("\n", $results)); ?>
	<table <?php echo $news_uid_css_body; ?> class="contentpaneopen<?php echo $params->get('pageclass_sfx'); ?>">
		<tr>
			<td colspan="2">
				<?php
					HTML_content::Section_Category($row, $params);
				?>
			</td>
		</tr>
		<tr>
			<td valign="top" colspan="2">
				<a href="#" class="mobilehide"><?php echo _CMN_HIDE;?></a> <a href="#" class="mobileshow"><?php echo _CMN_SHOW;?></a>
				<div class="article">
					<?php
						HTML_content::TOC($row);
						echo ampReplace($row->text);
					?>
					<?php
						HTML_content::Author($row, $params);
						HTML_content::CreateDate($row, $params);
						HTML_content::ModifiedDate($row, $params);
						HTML_content::URL($row, $params);
					?>
				</div>
				<div class="cf"></div>
				<?php
					HTML_content::ReadMore($row, $params);
				?>
			</td>
		</tr>
	</table>
	<span class="articlesep"></span>
	<?php
		$results = $_MAMBOTS->trigger('onAfterDisplayContent', array(&$row, &$params, $page));
		echo trim(implode("\n", $results));
		HTML_content::Navigation($row, $params);
		mosHTML::CloseButton($params, $hide_js);
		mosHTML::BackButton($params, $hide_js);
		}

		function _Itemid(&$row) {
		global $task, $Itemid, $mainframe;
		$compat = (int) $mainframe->getCfg('itemid_compat');
		if (($compat > 0 && $compat <= 11) && $task != 'view' && $task != 'category') {
		$row->_Itemid = $mainframe->getItemid($row->id, 0, 0);
		} else {
		$row->_Itemid = $Itemid;
		}
		if ($row->_Itemid && $row->_Itemid != 99999999) {
		$row->Itemid_link = '&amp;Itemid=' . $row->_Itemid;
		} else {
		$row->Itemid_link = '';
		}
		}

		function _linkInfo(&$row, &$params) {
		global $my;
		$row->link_on = '';
		$row->link_text = '';
		if ($params->get('readmore') || $params->get('link_titles')) {
		if ($params->get('intro_only')) {
		if ($row->access <= $my->gid) {
		$row->link_on = sefRelToAbs('index.php?option=com_content&amp;task=view&amp;id=' .
		$row->id . $row->Itemid_link);
		if (isset($row->readmore) && @$row->readmore) {
		$row->link_text = _READ_MORE;
		}
		} else {
		$row->link_on = sefRelToAbs('index.php?option=com_registration&amp;task=register');
		if (isset($row->readmore) && @$row->readmore) {
		$row->link_text = _READ_MORE_REGISTER;
		}
		}
		}
		}
		}

	function EditIcon(&$row, &$params, &$access) {
		global $my;
		if ($params->get('popup')) {
			return;
		}
		if ($row->state < 0) {
			return;
		}
		if (!$access->canEdit && !($access->canEditOwn && $row->created_by == $my->id)) {
			return;
		}
		mosCommonHTML::loadOverlib();
		$link = 'index.php?option=com_content&amp;task=edit&amp;id=' . $row->id . $row->Itemid_link . '&amp;Returnid=' . $row->_Itemid;
		$image = mosAdminMenus::ImageCheck('edit.png', '/images/M_images/', null, null, _E_EDIT, 'edit');
		if ($row->state == 0) {
			$overlib = _CMN_UNPUBLISHED;
		} else {
			$overlib = _CMN_PUBLISHED;
		}
		$date = mosFormatDate($row->created);
		$author = $row->created_by_alias ? $row->created_by_alias : $row->author;
		$overlib .= ' / ';
		$overlib .= $row->groups;
		$overlib .= '<br />';
		$overlib .= $date;
		$overlib .= '<br />';
		$overlib .= $author;
?>
<li>
	<a href="<?php echo sefRelToAbs($link); ?>" onmouseover="return overlib('<?php echo $overlib; ?>', CAPTION, '<?php echo _E_EDIT; ?>', BELOW, RIGHT);" onmouseout="return nd();">
		<?php echo $image; ?>
	</a>
</li>
<?php
}
	function EditIcon2(&$row, &$params, &$access) {
		global $my;
		if ($params->get('popup')) {
			return;
		}
		if ($row->state < 0) {
			return;
		}
		if (!$access->canEdit && !($access->canEditOwn && $row->created_by == $my->id)) {
			return;
		}
		mosCommonHTML::loadOverlib();
		$link = 'index.php?option=com_content&amp;task=edit&amp;id=' . $row->id . $row->Itemid_link . '&amp;Returnid=' . $row->_Itemid;
		$image = mosAdminMenus::ImageCheck('edit.png', '/images/M_images/', null, null, _E_EDIT, 'edit');
		if ($row->state == 0) {
			$overlib = _CMN_UNPUBLISHED;
		} else {
			$overlib = _CMN_PUBLISHED;
		}
		$date = mosFormatDate($row->created);
		$author = $row->created_by_alias ? $row->created_by_alias : $row->author;
		$overlib .= '<br />';
		$overlib .= $row->groups;
		$overlib .= '<br />';
		$overlib .= $date;
		$overlib .= '<br />';
		$overlib .= $author;
?>
<li>
	<a href="<?php echo sefRelToAbs($link); ?>" onmouseover="return overlib('<?php echo $overlib; ?>', CAPTION, '<?php echo _E_EDIT; ?>', BELOW, RIGHT);" onmouseout="return nd();">
		<?php echo $image; ?>
	</a>
</li>
<?php
	}

	/**
	* Writes PDF icon
	*/
	function PdfIcon( &$row, &$params, $hide_js ) {
		global $mosConfig_live_site, $Itemid, $task;

		if ( $params->get( 'pdf' ) && !$params->get( 'popup' ) && !$hide_js ) {
			$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';
			if ($task == 'view') {
				$_Itemid = '&amp;itemid=' . $Itemid;
			} else {
				$_Itemid = '';
			}
			$link = $mosConfig_live_site. '/index2.php?option=com_content&amp;do_pdf=1&amp;id='. $row->id . $_Itemid;

			if ( $params->get( 'icons' ) ) {
				$image = mosAdminMenus::ImageCheck('pdfButton.png', '/images/M_images/', null, null, _CMN_PDF, 'pdf' );
			} else {
				$image = _CMN_PDF . '&nbsp;';
			}
			?>
<li>
	<a href="<?php echo $link; ?>" target="_blank" onclick="window.open('<?php echo $link; ?>','win2','<?php echo $status; ?>'); return false;" title="<?php echo _CMN_PDF;?>">
		<?php echo $image; ?>
	</a>
</li>
<?php
		}
	}

	function EmailIcon(&$row, &$params, $hide_js) {
		global $mosConfig_live_site, $Itemid, $task, $cne_i;
			if (!isset($cne_i))
				$cne_i = '';
			if ($params->get('email') && !$params->get('popup') && !$hide_js) {
				$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=250,directories=no,location=no';
			if ($task == 'view') {
				$_Itemid = '&amp;itemid=' . $Itemid;
			} else {
				$_Itemid = '';
			}
			$link = $mosConfig_live_site . '/index2.php?option=com_content&amp;task=emailform&amp;id=' . $row->id . $_Itemid;
			if ($params->get('icons')) {
				$image = mosAdminMenus::ImageCheck('emailButton.png', '/images/M_images/', null, null, _CMN_EMAIL, 'email' . $cne_i);
				$cne_i++;
			} else {
				$image = _CMN_EMAIL . '&nbsp;';
			} ?>
<li>
	<a href="<?php echo $link; ?>" target="_blank" onclick="window.open('<?php echo $link; ?>','win2','<?php echo $status; ?>'); return false;" title="<?php echo _CMN_EMAIL; ?>">
		<?php echo $image; ?>
	</a>
</li>
<?php
			}
		}
		function Title(&$row, &$params, &$access) {
		global $mosConfig_title_h1, $mosConfig_title_h1_only_view, $task;
		if ($params->get('item_title')) {
		if ($params->get('link_titles') && $row->link_on != '') {
		?>
<div class="contentheading<?php echo $params->get('pageclass_sfx'); ?>">
	<a href="<?php echo $row->link_on; ?>" title="<?php echo $row->title; ?>" class="contentpagetitle<?php echo $params->get('pageclass_sfx'); ?>">
	<?php
		if ($mosConfig_title_h1 or ($task == 'view') and ($mosConfig_title_h1_only_view))
			echo '<h1>' . $row->title . '</h1>';
		else
			echo '<h2>' . $row->title . '</h2>';
	?>
	</a>
</div>
<?php } else { ?>
<div class="contentheading<?php echo $params->get('pageclass_sfx'); ?>">
	<?php
		if ($mosConfig_title_h1 or ($task == 'view') and ($mosConfig_title_h1_only_view))
			echo '<h1>' . $row->title . '</h1>';
		else
			echo '<h2>' . $row->title . '</h2>'; ?>
</div>
<?php
	}
}
}
		function Section_Category(&$row, &$params) {
		if ($params->get('section') || $params->get('category')) {
		?>
		<?php
			}
		HTML_content::Section($row, $params);
		HTML_content::Category($row, $params);
		if ($params->get('section') || $params->get('category')) {
		?>
		<?php }
			}

		function Section(&$row, &$params) {
		if ($params->get('section')) {
		?>
<div class="post_taxonomy">
	<ul>
		<li><?php echo $row->section;
			if ($params->get('category')) {
			echo '<span>\</span>';
			echo '</li>';
			} ?>
		<?php }
		}
		function Category(&$row, &$params) {
		if ($params->get('category')) { ?>
		<li><?php echo $row->category; ?></li>
	</ul>
</div>
		<?php }
		}
		function Author(&$row, &$params) {
		if (($params->get('author')) && ($row->author != '')) {
		?>
<div class="post_meta">
	<a href="/images/avatars/<?php echo $row->created_by;?>.jpg" class="lightbox_trigger" title="<?php echo($row->created_by_alias ? $row->created_by_alias : $row->author); ?>">
		<?php echo '<img src="/images/avatars/micro/' . $row->created_by . '.jpg" alt="' . ($row->created_by_alias ? $row->created_by_alias : $row->author) . '" />'; ?>
	</a>
	<p><?php echo _AUTHOR_BY; ?>: <?php echo($row->created_by_alias ? $row->created_by_alias : $row->author); ?></p>
	<?php }
			}

		function CreateDate(&$row, &$params) {
		$create_date = null;
		if (intval($row->created) != 0) {
		$create_date = mosFormatDate($row->created);
		} if ($params->get('createdate')) { ?>
		<p><?php echo _CMN_PUBLISHED; ?>: <?php echo $create_date; ?></p>
		<?php }
		}

		function URL(&$row, &$params) {
		if ($params->get('url') && $row->urls) {
		?>
		<p>Источник: <a href="http://<?php echo $row->urls; ?>" target="_blank"><?php echo $row->urls; ?></a></p>
		<?php
			}
		}

		function TOC(&$row) {
		if (isset($row->toc)) {
		echo $row->toc;
		}
		}

		function ModifiedDate(&$row, &$params) {
		$mod_date = null;
		if (intval($row->modified) != 0) {
		$mod_date = mosFormatDate($row->modified);
		}
		if (($mod_date != '') && $params->get('modifydate')) {
		?>
		<p><?php echo _LAST_UPDATED; ?>: <?php echo $mod_date; ?></p>
</div>
</div>
		<?php
			}
		}
		function ReadMore(&$row, &$params) {
		if ($params->get('readmore')) {
		if ($params->get('intro_only') && $row->link_text) {
		?>
		
<div class="readon">
	<a href="<?php echo $row->link_on; ?>" title="<?php echo $row->title; ?>" class="readon<?php echo $params->get('pageclass_sfx'); ?>">
		<input type="button" name="readon" value="<?php echo $row->link_text; ?>" class="button" />
	</a>
</div>
		
		<?php
			}
		}
		}

		function Navigation(&$row, &$params) {
		global $task;
		$link_part = 'index.php?option=com_content&amp;task=view&amp;id=';
		if ($params->get('item_navigation')) {
		if ($row->prev) {
		$row->prev = sefRelToAbs($link_part . $row->prev . $row->Itemid_link);
		} else {
		$row->prev = 0;
		}
		if ($row->next) {
		$row->next = sefRelToAbs($link_part . $row->next . $row->Itemid_link);
		} else {
		$row->next = 0;
		}
		}
		if ($params->get('item_navigation') && ($task == 'view') && !$params->get('popup') &&
		($row->prev || $row->next)) {
		?>
<div class="pagenav_line">
	<ul>
	<?php if ($row->prev) { ?>
		<li class="pagenav_prev">
			<?php echo _ITEM_PREVIOUS; ?>
		</li>
		<li class="pagenav_prev">
			<a href="<?php echo $row->prev; ?>" title="<?php echo $row->prev_title; ?>"><?php echo $row->prev_title; ?></a>
		</li>
		<?php } if ($row->prev && $row->next) { ?>
			<?php } if ($row->next) { ?>
		<li class="pagenav_next">
			<a href="<?php echo $row->next; ?>" title="<?php echo $row->next_title; ?>"><?php echo $row->next_title; ?></a>
		</li>
		<li class="pagenav_next">
			<?php echo _ITEM_NEXT; ?>
		</li>
		<?php } ?>
	</ul>
</div>
		<?php
			}
			}

		function editContent(&$row, $section, &$lists, &$images, &$access, $myid, $sectionid, $task, $Itemid, $params) {
		global $mosConfig_live_site, $mainframe, $my;
		require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/HTML_toolbar.php');
		mosMakeHtmlSafe($row);
		$validate = josSpoofValue();
		$Returnid = intval(mosGetParam($_REQUEST, 'Returnid', $Itemid));
		$tabs = new mosTabs(0, 1);
		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
		$p_wwig = $params->get('wwig', 1);
		$content_type = $params->get('content_type', 1);
		$p_fulltext = $params->get('fulltext', 1);
		$allow_alias = $params->get('allow_alias', 0);
		$allow_img = $params->get('allow_img', 1);
		$allow_params = $params->get('allow_params', 1);
		$allow_desc = $params->get('allow_desc', 1);
		$allow_tags = $params->get('allow_tags', 1);
		$auto_publish = $params->get('auto_publish', 0);
		$allow_frontpage = $params->get('allow_frontpage', 0);
		$front_label = $params->get('front_label', 'На главной');
?>
<div id="overDiv" style="position:absolute;visibility:hidden;z-index:10000;"></div>
<script type="text/javascript">
onunload = WarnUser;
<?php if ($allow_img) { ?>
	var folderimages = new Array;
<?php
	$i = 0;
	foreach ($images as $k => $items) {
	foreach ($items as $v) {
	echo "\n folderimages[" . ++$i . "] = new Array( '$k','" . addslashes($v->value) . "','" . addslashes($v->text) . "' );";
			}
		}
	}
	?>
	function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (pressbutton == 'cancel') { submitform( pressbutton );
	return; } form.goodexit.value=1;
	<?php if ($allow_img) { ?>
		var temp = new Array;
		for (var i=0, n=form.imagelist.options.length;
		i < n; ++i) { temp[i] = form.imagelist.options[i].value; } form.images.value = temp.join( '\n' );
	<?php } ?>
		try { form.onsubmit();
		} catch(e){} if (form.title.value == "") { alert ( "<?php echo addslashes(_E_WARNTITLE); ?>" );
		} else if (parseInt('<?php echo $row->sectionid; ?>')) {
	<?php if ($p_wwig) {
		getEditorContents('editor1', 'introtext');
		getEditorContents('editor2', 'fulltext');
	} ?>
		submitform(pressbutton);
	} else {
	<?php if ($p_wwig) {
		getEditorContents('editor1', 'introtext');
		} ?> submitform(pressbutton);
	} }
	function setgood() { document.adminForm.goodexit.value=1;
	} function WarnUser(){
	if (document.adminForm.goodexit.value==0) { alert('<?php echo addslashes(_E_WARNUSER); ?>');
	window.location="<?php echo sefRelToAbs("index.php?option=com_content&amp;task=" . $task . "&amp;sectionid=" . $sectionid . "&amp;id=" . $row->id . "&amp;Itemid=" . $Itemid); ?>";
	} }
</script>
		<?php
			$docinfo = '' . _E_EXPIRES . '' ;
			$docinfo .= $row->publish_down . '<br />';
			$docinfo .= '' . _E_VERSION . ' ';
			$docinfo .= $row->version . '<br />';
			$docinfo .= '' . _E_CREATED . ' ';
			$docinfo .= $row->created . '<br />';
			$docinfo .= '' . _E_LAST_MOD . ' ';
			$docinfo .= $row->modified . '<br />';
			$docinfo .= '' . _E_HITS . ' ';
			$docinfo .= $row->hits . '<br />';
		?>
<form action="index.php" method="post" name="adminForm" onSubmit="javascript:setgood();" enctype="multipart/form-data" class="form">
	<div class="componentheading">
		<?php echo $row->id ? _E_EDIT : _E_ADD; ?>
	</div>
	<?php if ($row->id) { ?>
	<div class="joo_message">
		[<a href="javascript:void(0);" onMouseOver="return overlib('<table><?php echo $docinfo; ?></table>', CAPTION, '<?php echo _E_ITEM_INFO; ?>', BELOW, RIGHT);" onMouseOut="return nd();"><?php echo _E_ITEM_INFO; ?></a>]
	</div>
	<?php } ?>
	<table class="cedit_misc">
		<tr>
			<?php
			mosToolBar::save();
			mosToolBar::apply();
			mosToolBar::cancel();
			?>
			<?php if ($access->canPublish || $auto_publish == 1 || $my->usertype == "Super Administrator") { ?>
			<td>&nbsp;&nbsp;<span class="strong"><?php echo _CMN_PUBLISHED; ?>:</span>&nbsp;&nbsp;</td>
			<td><?php echo mosHTML::yesnoRadioList('state', '', $row->state); ?></td>
			<?php } ?>
			<?php if (($row->sectionid || !$content_type) && ($allow_frontpage == 1 || $my->usertype == "Super Administrator")) { ?>
			<td align="right">&nbsp;&nbsp;<span class="strong"><?php echo $front_label; ?>:</span>&nbsp;&nbsp;</td>
			<td align="left"><?php echo mosHTML::yesnoRadioList('frontpage', '', $row->frontpage ? 1 : 0); ?></td>
			<?php } ?>
		</tr>
	</table>
	<table class="cedit_main">
		<tr>
			<td>
				<div id="title">
					<div>
						<label for="title"><?php echo _E_TITLE; ?></label>
					</div>
					<input class="textarea" type="text" name="title" id="title" size="30" maxlength="255" style="width:100%;" value="<?php echo $row->title; ?>" />
				</div>
			</td>
		</tr>
		<?php if ($row->sectionid || $allow_alias) { ?>
		<tr>
			<td>
				<div id="title_alias">
					<div>
						<label for="title_alias"><?php echo _ALIAS; ?></label>
					</div>
					<input name="title_alias" type="text" class="textarea" id="title_alias" value="<?php echo $row->title_alias; ?>" size="30" style="width:100%;" maxlength="255" />
				</div>
			</td>
		</tr>
		<?php } ?>
		<?php if ($content_type == 0 || $row->sectionid > 0) { ?>
		<tr>
			<td>
				<div id="category">
					<div>
						<label for="category"><?php echo _E_CATEGORY; ?></label>
					</div>
					<?php echo $lists['catid']; ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		<?php if ($allow_tags) { ?>
		<tr>
			<td align="left" valign="top">
				<div id="metakey">
					<div>
						<label for="metakey"><?php echo _E_M_KEY; ?></label>
					</div>
					<input class="inputbox" id="metakey" style="width:100%;" type="text" name="metakey" value="<?php echo str_replace('&', '&amp;', $row->metakey); ?>">
				</div>
			</td>
		</tr>
		<?php } ?>
		<?php if ($allow_desc) { ?>
		<tr>
			<td align="left" valign="top">
				<div id="metadesc">
					<div>
						<label for="metadesc"><?php echo _E_M_DESC; ?></label>
					</div>
					<textarea cols="" class="inputbox" style="width:100%;"  rows="2" id="metadesc" name="metadesc"><?php echo str_replace('&', '&amp;', $row->metadesc); ?></textarea>
				</div>
			</td>
		</tr>
	<?php } ?>
	</table><br />
	<div class="cedit_introtext">
		<div id="introtext">
			<div>
				<label for="introtext"><?php echo _E_INTRO . ' (' . _CMN_REQUIRED . ')'; ?></label>
			</div>
			<?php
			if ($p_wwig) {
			editorArea('editor1', $row->introtext, 'introtext', '700', '400', '70', '15');
			} else {
			?>
			<textarea style="width:700px;height:400px;" class="inputbox" rows="15" cols="70" id="introtext" name="introtext"><?php echo $row->introtext; ?></textarea>
			<?php } ?>
		</div>
	</div>
	<?php if (($content_type == 0 && $p_fulltext) || ($row->sectionid && $p_fulltext)) { ?><br /><br />
	<div class="cedit_fulltext">
		<div id="fulltext">
			<div>
				<label for="fulltext"><?php echo _E_MAIN . ' (' . _CMN_OPTIONAL . ')'; ?></label>
			</div>
			<?php if ($p_wwig) {
			editorArea('editor2', $row->fulltext, 'fulltext', '600', '400', '70', '15');
			} else {
			?>
			<textarea style="width:700px;height:400px;" class="inputbox" rows="15" cols="70" id="fulltext" name="fulltext"><?php echo $row->fulltext; ?></textarea>
			<?php } ?>
		</div>
	</div>
			<?php
				}
				if ($allow_params || $allow_img) {
				$tabs->startPane('content-pane');
				if ($allow_img) {
				$tabs->startTab(_E_IMAGES, 'images-page');
			?>
<table class="adminform">
	<tr>
		<td colspan="4"><?php echo _CMN_SUBFOLDER; ?>: <?php echo $lists['folders']; ?></td>
	</tr>
	<tr>
		<td align="top"><?php echo _E_GALLERY_IMAGES; ?></td>
		<td width="2%">&nbsp;</td>
		<td align="top"><?php echo _E_CONTENT_IMAGES; ?></td>
		<td align="top"><?php echo _E_EDIT_IMAGE; ?></td>
	</tr>
	<tr>
	<td valign="top"><?php echo $lists['imagefiles']; ?><br />
		<input class="button" type="button" value="<?php echo _E_INSERT; ?>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" />
	</td>
	<td width="2%">
		<input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="<?php echo _E_ADD; ?>" /><br />
		<input class="imagebutton" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="<?php echo _E_REMOVE; ?>" />
	</td>
	<td valign="top"><?php echo $lists['imagelist']; ?><br />
		<input class="button" type="button" value="<?php echo _E_UP; ?>" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
		<input class="imagebutton" type="button" value="<?php echo _E_DOWN; ?>" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" />
	</td>
	<td valign="top">
		<table>
			<tr>
				<td>
					<div id="_source">
						<div>
							<label for="_source"><?php echo _E_SOURCE; ?></label>
						</div>
						<input class="inputbox" type="text" id= "_source" name= "_source" value="" size="15" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_align">
						<div>
							<label for="_align"><?php echo _E_ALIGN; ?></label>
						</div>
						<?php echo $lists['_align']; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_alt">
						<div>
							<label for="_alt"><?php echo _E_ALT; ?></label>
						</div>
						<input class="inputbox" type="text" id="_alt" name="_alt" value="" size="15" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_border">
						<div>
							<label for="_border"><?php echo _E_BORDER; ?></label>
						</div>
						<input class="inputbox" type="text" id="_border" name="_border" value="" size="3" maxlength="1" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_caption">
						<div>
							<label for="_caption"><?php echo _E_CAPTION; ?></label>
						</div>
						<input class="textarea" id="_caption" type="text" name="_caption" value="" size="30" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_caption_position">
						<div>
							<label for="_caption_position"><?php echo _E_CAPTION_POSITION; ?></label>
						</div>
						<?php echo $lists['_caption_position']; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_caption_align">
						<div>
							<label for="_caption_align"><?php echo _E_CAPTION_ALIGN; ?></label>
						</div>
						<?php echo $lists['_caption_align']; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="_caption_width">
						<div>
							<label for="_caption_width"><?php echo _E_CAPTION_WIDTH; ?></label>
						</div>
						<input class="textarea" type="text" name="_width" id="_caption_width" value="" size="5" maxlength="5" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div><input class="button" type="button" value="<?php echo _E_APPLY; ?>" onclick="sapplyImageProps()" /></div>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td><img name="view_imagefiles" src="<?php echo $mosConfig_live_site; ?>/images/M_images/blank.png" width="50" alt="<?php echo _E_NO_IMAGE; ?>" /></td>
	<td><img name="view_imagelist" src="<?php echo $mosConfig_live_site; ?>/images/M_images/blank.png" width="50" alt="<?php echo _E_NO_IMAGE; ?>" /></td>
</tr>
</table>
<?php $tabs->endTab();
	} if ($allow_params) {
		$tabs->startTab(_E_PUBLISHING, 'publish-page'); ?>
<table class="adminform">
	<tr>
		<td>
			<div id="access">
				<div>
					<label for="access"><?php echo _E_ACCESS_LEVEL; ?></label>
				</div>
				<?php echo $lists['access']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div id="created_by_alias">
				<div>
					<label for="created_by_alias"><?php echo _E_AUTHOR_ALIAS; ?></label>
				</div>
				<input type="text" name="created_by_alias" size="50" id="created_by_alias" maxlength="255" value="<?php echo $row->created_by_alias; ?>" class="inputbox" />
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div id="ordering">
				<div>
					<label for="ordering"><?php echo _E_ORDERING; ?></label>
				</div>
				<?php echo $lists['ordering']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div id="publish_up">
				<div>
					<label for="publish_up"><?php echo _E_START_PUB; ?></label>
				</div>
				<div>
					<input class="inputbox" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
				</div>
				<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
			</div>
		</td>
	</tr>
	<tr>
		<td align="left">
			<div id="publish_up">
				<div>
					<label for="publish_down"><?php echo _E_FINISH_PUB; ?></label>
				</div>
				<div>
					<input class="inputbox" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
				</div>
				<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
			</div>
		</td>
	</tr>
</table>
<?php $tabs->endTab();
	} $tabs->endPane();
	} ?>
<div class="cf"></div>
<input type="hidden" name="images" value="" />
<input type="hidden" name="goodexit" value="0" />
<input type="hidden" name="option" value="com_content" />
<input type="hidden" name="Returnid" value="<?php echo $Returnid; ?>" />
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $row->sectionid; ?>" />
<input type="hidden" name="created_by" value="<?php echo $row->created_by; ?>" />
<input type="hidden" name="referer" value="<?php echo ampReplace(@$_SERVER['HTTP_REFERER']); ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
		<?php
			}

		function emailForm($uid, $title, $template = '', $itemid) {
			global $mainframe;
		$validate = josSpoofValue();
		$mainframe->setPageTitle($title);
		$mainframe->addCustomHeadTag('<link rel="stylesheet" href="templates/' . $template . '/css/style.css" type="text/css" />');
		?>
<script type="text/javascript">
	function submitbutton() {
	var form = document.frontendForm;
	if (form.email.value == "" || form.youremail.value == "")
	{ alert( '<?php echo addslashes(_EMAIL_ERR_NOINFO); ?>' );
		return false;
	} return true;
	}
</script>
<form action="index2.php?option=com_content&amp;task=emailsend" name="frontendForm" method="post" onSubmit="return submitbutton();">
	<table>
		<tr>
			<td colspan="2"><?php echo _EMAIL_FRIEND; ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td width="130">
				<div id="email_friend">
					<div>
						<label for="email_friend"><?php echo _EMAIL_FRIEND_ADDR; ?></label>
					</div>
					<input type="text" name="email" class="inputbox" id="email_friend" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<td height="27">
				<div id="yourname_friend">
					<div>
						<label for="yourname_friend"><?php echo _EMAIL_YOUR_NAME; ?></label>
					</div>
					<input type="text" name="yourname" id="yourname_friend" class="inputbox" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="youremail_friend">
					<div>
						<label for="youremail_friend"><?php echo _EMAIL_YOUR_MAIL; ?></label>
					</div>
					<input type="text" id="youremail_friend" name="youremail" class="inputbox" size="25" />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="youremail_friend">
					<div>
						<label for="subject_friend"><?php echo _SUBJECT_PROMPT; ?></label>
					</div>
					<input type="text" name="subject" for="subject_friend" class="inputbox" maxlength="100" size="40" />
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" class="button" value="<?php echo _BUTTON_SUBMIT_MAIL; ?>" />&nbsp;&nbsp;
				<input type="button" name="cancel" value="<?php echo _BUTTON_CANCEL; ?>" class="button" onclick="window.close();" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php echo $uid; ?>" />
	<input type="hidden" name="itemid" value="<?php echo $itemid; ?>" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
<?php
	}

	function emailSent($to, $template = '') {
		global $mosConfig_sitename, $mainframe;
		$mainframe->setPageTitle($mosConfig_sitename);
		$mainframe->addCustomHeadTag('<link rel="stylesheet" href="templates/' . $template . '/css/style.css" type="text/css" />');
?>
<span class="contentheading"><?php echo _EMAIL_SENT . " $to"; ?></span><br /><br /><br />
<a href='javascript:window.close();'>
	<span class="small"><?php echo _PROMPT_CLOSE; ?></span>
</a>
<?php
	}

}
?>