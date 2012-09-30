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
* @subpackage Weblinks
*/
class HTML_weblinks {
	function displaylist(&$categories, &$rows, $catid, $currentcat = null, &$params, $tabclass) {
		global $hide_js;
		if ($params->get('page_title')) {
			?>
<div class="componentheading"><?php echo $currentcat->header; ?></div>
<?php } ?>
	<form action="index.php" method="post" name="adminForm">
		<div class="contentpane<?php echo $params->get('pageclass_sfx'); ?>">
			<div>
				<div valign="top" class="contentdescription<?php echo $params->get('pageclass_sfx'); ?>" colspan="2">
				<?php
// show image
					if ($currentcat->img) {
				?>
					<figure>
						<img src="<?php echo $currentcat->img; ?>" align="<?php echo $currentcat->align; ?>" hspace="6" alt="<?php echo _WEBLINKS_TITLE; ?>" />
					</figure>
					<?php } echo $currentcat->descrip; ?>
				</div>
			</div>
			<div class="clearfix"></div>
			<div>
				<div>
					<?php
					if (count($rows)) {
						HTML_weblinks::showTable($params, $rows, $catid, $tabclass);
					}
					?>
				</div>
			</div>
			<div>
				<div>&nbsp;</div>
			</div>
			<div>
				<div>
					<?php
// Displays listing of Categories
					if (($params->get('type') == 'category') && $params->get('other_cat')) {
						HTML_weblinks::showCategories($params, $categories, $catid);
					} else
					if (($params->get('type') == 'section') && $params->get('other_cat_section')) {
						HTML_weblinks::showCategories($params, $categories, $catid);
					}
					?>
				</div>
			</div>
		</div>
	</form>
	<?php
// displays back button
		mosHTML::BackButton($params, $hide_js);
	}
	/** Display Table of items */
	function showTable(&$params, &$rows, $catid, $tabclass) {
		global $cwl_i;
		if (!isset($cwl_i))
			$cwl_i = '';
		?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php if ($params->get('headings')) { ?>
	<tr>
		<?php if ($params->get('weblink_icons') != -1) { ?>
		<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>">&nbsp;</td>
		<?php } ?>
		<td width="90%" class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>"><?php echo _HEADER_TITLE_WEBLINKS; ?></td>
		<?php if ($params->get('hits')) { ?>
		<td class="sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>" align="right"><?php echo _HEADER_HITS; ?></td>
		<?php } ?>
	</tr>
				<?php
			}
			$k = 0;
			foreach ($rows as $row) {
// icon in table display
				if ($params->get('weblink_icons') != -1) {
					$img = mosAdminMenus::ImageCheck('weblink.png', '/images/M_images/', $params->get('weblink_icons'), '/images/M_images/', 'Link', 'Link' . $cwl_i);
					$cwl_i++;
				} else {
					$img = null;
				}
				$iparams = new mosParameters($row->params);
				$link = sefRelToAbs('index.php?option=com_weblinks&amp;task=view&amp;catid=' . $catid . '&amp;id=' . $row->id);
				$link = ampReplace($link);
				$menuclass = 'category' . $params->get('pageclass_sfx');
				switch ($iparams->get('target')) {
// cases are slightly different
					case 1:
// open in a new window
						$txt = '<a href="' . $link . '" target="_blank" class="' . $menuclass . '" title="' . $row->title . '">' . $row->title . '</a>';
						break;
					case 2:
// open in a popup window
						$txt = "<a href=\"#\" onclick=\"javascript: window.open('" . $link . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"$menuclass\">" . $row->title . "</a>\n";
						break;
					default: // formerly case 2
// open in parent window
						$txt = '<a href="' . $link . '" class="' . $menuclass . '" title="' . $row->title . '">' . $row->title . '</a>';
						break;
				}
				?>
	<tr class="<?php echo $tabclass[$k]; ?>">
		<?php if ($img) { ?>
		<td width="100" height="20" align="center"><figure><?php echo $img; ?></figure></td>
		<?php } ?>
		<td height="20"><?php
			echo $txt;
			if ($params->get('item_description')) {
			?>
			<br />
			<span class="deskweblinks"><?php echo $row->description; } ?></span>
		</td>
		<?php if ($params->get('hits')) { ?>
		<td class="td-hits"><?php echo $row->hits; ?></td>
		<?php } ?>
	</tr>
	<?php $k = 1 - $k;
	} ?>
</table>
			<?php
		}

		/** Display links to categories */
		function showCategories(&$params, &$categories, $catid) {
			global $Itemid;
			?>
<ul class="weblinks">
	<?php
	foreach ($categories as $cat) {
	if ($catid == $cat->catid) {
	?>
	<li>
		<p><?php echo stripslashes($cat->name); ?> <span>(<?php echo $cat->numlinks; ?>)</span></p>
	</li>
	<?php
		} else {
			$link = 'index.php?option=com_weblinks&amp;catid=' . $cat->catid . '&amp;Itemid=' . $Itemid;
	?>
	<li>
		<p><a href="<?php echo sefRelToAbs($link); ?>" class="category<?php echo $params->get('pageclass_sfx'); ?>" title="<?php echo stripslashes($cat->name); ?>"><?php echo stripslashes($cat->name); ?></a> <span>(<?php echo $cat->numlinks; ?>)</span></p>
	</li>
	<?php
		}
	}
	?>
</ul>
		<?php
	}

	/**
	* Writes the edit form for new and existing record (FRONTEND)
	* A new record is defined when <var>$row</var> is passed with the <var>id</var>
	* property set to 0.
	* @param mosWeblink The weblink object
	* @param string The html for the categories select list
	*/
	function editWeblink($option, &$row, &$lists) {
		require_once ($GLOBALS['mosConfig_absolute_path'] . '/includes/HTML_toolbar.php');
		$Returnid = intval(mosGetParam($_REQUEST, 'Returnid', 0));
// used for spoof hardening
		$validate = josSpoofValue();
		?>
		<script type="text/javascript">
			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				}
				// do field validation
				if (form.title.value == ""){
					alert("<?php echo _ENTER_CORRECT_TITLE; ?>");
				} else if (getSelectedValue('adminForm','catid') < 1) {
					alert( "<?php echo _ENTER_CORRECT_CAT; ?>" );
				} else if (form.url.value == ""){
					alert( "<?php echo _ENTER_CORRECT_URL1; ?>" );
				} else {
					submitform( pressbutton );
				}
			}
		</script>
<form action="<?php echo sefRelToAbs('index.php'); ?>" method="post" name="adminForm" id="adminForm">
	<div style="float:right;">
				<?php
					mosToolBar::spacer();
					mosToolBar::save();
					mosToolBar::cancel();
				?>
	</div>
	<div class="contentheading"><?php echo _SUBMIT_LINK; ?></div>
	<table>
		<tr>
			<td width="20%" align="right">
				<p><?php echo _NAME; ?></p>
			</td>
			<td width="80%">
				<input class="inputbox" type="text" name="title" size="50" maxlength="250" value="<?php echo htmlspecialchars($row->title, ENT_QUOTES); ?>" />
			</td>
		</tr>
		<tr>
			<td valign="top" align="right">
				<p><?php echo _SECTION; ?></p>
			</td>
			<td>
				<?php echo $lists['catid']; ?>
			</td>
		</tr>
		<tr>
			<td valign="top" align="right">
				<p><?php echo _URL; ?></p>
			</td>
			<td>
				<input class="inputbox" type="text" name="url" value="<?php echo $row->url; ?>" size="50" maxlength="250" />
			</td>
		</tr>
		<tr>
			<td valign="top" align="right">
				<p><?php echo _URL_DESC; ?></p>
			</td>
			<td>
				<textarea class="inputbox" cols="30" rows="6" name="description" style="width:360px;"><?php echo htmlspecialchars($row->description, ENT_QUOTES); ?></textarea>
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ordering" value="<?php echo $row->ordering; ?>" />
	<input type="hidden" name="approved" value="<?php echo $row->approved; ?>" />
	<input type="hidden" name="Returnid" value="<?php echo $Returnid; ?>" />
	<input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
		<?php
	}
}
?>