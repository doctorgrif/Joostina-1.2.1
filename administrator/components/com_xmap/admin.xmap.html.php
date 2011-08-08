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

/** HTML class for all Xmap administration output */
class XmapAdminHtml {

	/* Show the configuration options and menu ordering */
	function show ( &$config, &$menus, &$lists, &$pluginList, &$xmlfile ) {
		global $xmapSiteURL,$xmapComponentURL,$xmapAdministratorURL,$xmapAdministratorPath,$mainframe;
		// загрузка скриптов mootols
		mosCommonHTML::loadMootools();

		$mainframe->addCustomHeadTag("<script type=\"text/javascript\" src=\"$xmapComponentURL/js/admin.js\"></script>");
		$mainframe->addCustomHeadTag("<link type=\"text/css\" rel=\"stylesheet\" href=\"$xmapComponentURL/css/admin.css\" />");

		mosCommonHTML::loadOverlib();
?>
		<script type="text/javascript">
			var ajaxURL = '<?php echo preg_replace('#http.?://[^/]+/+#','/',$xmapAdministratorURL) . '/ajax.index.php?utf=1&amp;option=com_xmap&amp;task=ajax_request&amp;no_html=1' ?>';
			var loadingMessage = '<?php echo str_replace("''","\\",_XMAP_MSG_LOADING_SETTINGS); ?>';
			var mosConfigLiveSite = '<?php echo $xmapSiteURL; ?>';
			var sitemapdefault = <?php echo ($config->sitemap_default? $config->sitemap_default: 0);?>;
			var editMenuOptionsMessage = '<?php echo str_replace("'","\\'",_XMAP_EDIT_MENU); ?>';
			var deleteSitemapConfirmMessage = '<?php echo str_replace("'","\\'",_XMAP_CONFIRM_DELETE_SITEMAP); ?>';
			var unistallPluginConfirmMessage = '<?php echo str_replace("'","\\'",_XMAP_CONFIRM_UNINSTALL_PLUGIN); ?>';
			var deleteMenuMessage = '<?php echo str_replace("'","\\'",_XMAP_DELETE_MENU); ?>';
			var moveDMenuMessage = '<?php echo str_replace("'","\\'",_XMAP_MOVEDOWN_MENU); ?>';
			var moveUMenuMessage = '<?php echo str_replace("'","\\'",_XMAP_MOVEUP_MENU); ?>';
			var addMessage='<?php echo str_replace("'","\\'",_XMAP_ADD); ?>';
			var cancelMessage='<?php echo str_replace("'","\\'",_XMAP_CANCEL); ?>';
			var menus = [<?php $coma=''; foreach ($menus as $menutype => $menu) { echo "$coma'$menutype'";$coma=',';} ?>];
			var joomla = '<?php echo (defined('JPATH_ADMINISTRATOR')? '1.5':'1.0'); ?>';
		</script>
		<table class="adminheading">
			<tr>
				<th class="menus">
					<small><?php echo $lists['msg_success']; ?></small>
				</th>
			</tr>
		</table>
		<div id="sitemapsouter">
<?php
		$pane = new mosTabs(1);// uses cookie to save last used tab
		$pane->startPane( 'xmap-pane' );
		$pane->startTab( _XMAP_TAB_SITEMAPS, 'sitemaps-tab' );
?>
		<div id="sitemaps" onclick="handleClick();">
<?php
		$sitemaps = $config->getSitemaps();
		if (count($sitemaps)) {
			foreach ($sitemaps as $sitemap) {
				XmapAdminHtml::showSitemapInfo($sitemap,($config->sitemap_default == $sitemap->id));
			}
		} else {
			echo _XMAP_MSG_NO_SITEMAPS;
		}
?>
		</div>
<?php
		$pane->endTab();
		$pane->startTab( 'CSS', 'css-tab' );
?>
		<form action="index2.php" method="post" name="adminForm" class="adminForm">
		<?php
			/* Style Editor Tab */

			$template_path = $GLOBALS['mosConfig_absolute_path'].'/components/com_xmap/css/xmap.css';

			if ( $fp = @fopen( $template_path, 'r' )) {
				$csscontent = @fread( $fp, @filesize( $template_path ));
				$csscontent = htmlspecialchars( $csscontent );
			}
		?>
		<table cellpadding="1" cellspacing="1" border="0" width="100%">
			<tr>
				<td width="290">
					<table class="adminheading">
						<tr>
							<th class="templates"><?php echo _XMAP_CSS_EDIT; ?></th>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="220">
					<span class="componentheading"><?php echo _XMAP_CSS; ?>:
						<?php
							echo is_writable($template_path) ?
							'<strong class="green">'._XMAP_CFG_WRITEABLE.'</strong>' :
							'<strong class="red">'._XMAP_CFG_UNWRITEABLE.'</strong>';
						?>
					</span>
				</td>
			</tr>
			<tr>
			<td>
				<input type="checkbox" id="exclude_css" name="exclude_css" value="1"<?php echo ($config->exclude_css ? ' checked="checked"':''); ?> />
				<label for="exclude_css"><?php echo _XMAP_MSG_EXCLUDE_CSS_SITEMAP; ?></label>
			</td>
			</tr>
			<tr>
			<td>
				<input type="checkbox" id="exclude_xsl" name="exclude_xsl" value="1"<?php echo ($config->exclude_xsl ? ' checked="checked"':''); ?> />
				<label for="exclude_xsl"><?php echo _XMAP_MSG_EXCLUDE_XSL_SITEMAP; ?></label>
			</td>
			</tr>
			<tr>
				<?php if ( mosIsChmodable($template_path) && is_writable($template_path) ) { ?>
				<td>
					<input type="checkbox" id="disable_write" name="disable_write" value="1" />
					<label for="disable_write"><?php echo _XMAP_MSG_MAKE_UNWRITEABLE; ?></label>
				</td>
				<?php } else { ?>
				<td>
					<input type="checkbox" id="enable_write" name="enable_write" value="1" />
					<label for="enable_write"><?php echo _XMAP_MSG_OVERRIDE_WRITE_PROTECTION; ?></label>
				</td>
				<?php } ?>
			</tr>
		</table>

		<table class="adminform">
			<tr>
				<th><?php echo $template_path; ?></th>
			</tr>
			<tr>
				<td>
					<textarea style="width:100%;height:500px" cols="80" rows="25" name="csscontent" class="inputbox"><?php echo $csscontent; ?></textarea>
				</td>
			</tr>
		</table>

		<input type="hidden" name="option" value="com_xmap" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
<?php
		$pane->endTab();
		$pane->startTab(_XMAP_TAB_EXTENSIONS,'ext-tab');
        /* Plugins section */
?>
		<div id="pluginstoolbar"><?php
			XmapAdminHtml::showInstallForm( _XMAP_INSTALL_NEW_PLUGIN, dirname(__FILE__) );
?>
		<table class="adminheading">
			<tbody>
				<tr>
					<th class="install"><?php echo _XMAP_TAB_INSTALLED_EXTENSIONS; ?></th>
				</tr>
				</tbody>
		</table>
		<div id="plugins">
			<?php XmapAdminHtml::showInstalledPlugins($pluginList, 'com_xmap', $xmlfile, $lists); ?>
		</div>
		</div>
<?php
		$pane->endTab();
		$pane->endPane();
?>
		</div>
		<div id="divoptions"></div>
		<div id="divbg" style="display:none;"></div>
		<div id="optionsmenu" style="display:none;">
			<div onclick="settingsSitemap();"><?php echo _XMAP_SETTINGS_SITEMAP; ?></div>
			<div onclick="setAsDefault();"><?php echo _XMAP_SITEMAP_SET_DEFAULT; ?></div>
			<div onclick="copySitemap();"><?php echo _XMAP_COPY_SITEMAP; ?></div>
			<div onclick="deleteSitemap();"><?php echo _XMAP_DELETE_SITEMAP; ?></div>
			<div onclick="clearCacheSitemap();"><?php echo _XMAP_CLEAR_CACHE; ?></div>
		</div>
<?php
	}

	function showSitemapInfo( &$sitemap,$default=false ) {
		global $xmapComponentURL;
?>
		<form action=""  name="sitemapform<?php echo $sitemap->id; ?>" onsubmit="return false;">
		<div id="sitemap<?php echo $sitemap->id; ?>" class="sitemap">
			<div class="sitemaptop">
				<div class="tl"><div class="tr"><div class="tm"><div class="smname" id="sitemapname<?php echo $sitemap->id; ?>" onClick="editTextField(this,<?php echo $sitemap->id; ?>,'name');"><?php echo $sitemap->name; ?></div><div class="divimgdefault"><?php echo '<img src="',$xmapComponentURL,'/images/',($default? 'default.gif':'no_default.gif'),'" id="imgdefault',$sitemap->id,'" />'; ?></div><div class="optionsbut" id="optionsbut<?php echo $sitemap->id; ?>" onClick="optionsMenu(<?php echo $sitemap->id; ?>);"><span><?php echo _XMAP_EDIT_MENU;?></span></div></div></div></div>
			</div>
			<div class="mr"><div class="mm">
			<div class="menulistouter">
				<div id="menulist<?php echo $sitemap->id; ?>" class="menulist"><?php XmapAdminHtml::printMenusList($sitemap);?></div>
				<div class="add_menu_link" onClick="showMenusList(<?php echo $sitemap->id ?>,this);" /><span class="plussign">+</span><?php echo _XMAP_ADD_MENU; ?></div></div>
				<div class="sitemapinfo">
				<div><?php echo _XMAP_SITEMAP_ID .': '. $sitemap->id; ?></div>
					<div><table cellspacing="2" cellpadding="2" class="sitemapstats">
						<tr>
							<td>&nbsp;</td>
							<td>HTML</td>
							<td>XML</td>
						</tr>
						<tr>
							<td><?php echo _XMAP_INFO_LAST_VISIT; ?></td>
							<td><?php echo $sitemap->lastvisit_html? strftime("%b/%d/%Y",$sitemap->lastvisit_html) : _XMAP_NEVER_VISITED; ?></td>
							<td><?php echo $sitemap->lastvisit_xml? strftime("%b/%d/%Y",$sitemap->lastvisit_xml) : _XMAP_NEVER_VISITED; ?></td>
						</tr>
						<tr>
							<td><?php echo _XMAP_INFO_COUNT_VIEWS; ?></td>
							<td><?php echo $sitemap->lastvisit_html? $sitemap->views_html: "--"; ?></td>
							<td><?php echo $sitemap->lastvisit_xml? $sitemap->views_xml:"--"; ?></td>
						</tr>
						<tr>
							<td><?php echo _XMAP_INFO_TOTAL_LINKS; ?></td>
							<td><?php echo $sitemap->lastvisit_html? $sitemap->count_html: "--"; ?></td>
							<td><?php echo $sitemap->lastvisit_xml? $sitemap->count_xml : "--"; ?></td>
						</tr>
					</table></div>
				</div>
			<div class="spacer"></div>
		</div></div>
		<div class="bm"><div class="bl"><div class="br"></div></div></div>
		</div>
		<div class="spacer"></div>
		</form>
<?php
	}

	function showSitemapSettings(&$sitemap,&$lists) {
		global $xmapSiteURL;
?>
	<table class="adminform"><tr><th><?php echo sprintf (_XMAP_TIT_SETTINGS_OF,$sitemap->name); ?><div class="settingstoptool"></div></th></tr></table>
	<form action=""  name="frmSettings" id="frmSettings<?php echo $sitemap->id; ?>">
	<table width="100%" border="0" cellpadding="2" cellspacing="0" class="adminForm" style="table-layout: auto; white-space: nowrap;">
		<tr>
		<td>
			<fieldset>
			<legend><?php echo _XMAP_CFG_OPTIONS; ?></legend>
			<table>
				<tr>
					<td style="width:1%">
						<label for="classname"><?php echo _XMAP_CFG_CSS_CLASSNAME; ?></label>:
					</td>
					<td style="width:32%">
						<input type="text" name="classname" id="classname" value="<?php echo @$sitemap->classname; ?>"/>
					</td>

					<td style="width:1%">
						<label for="show_menutitle"><?php echo _XMAP_CFG_SHOW_MENU_TITLES; ?></label>:
					</td>
					<td style="width:32%">
						<input type="checkbox" name="show_menutitle" id="show_menutitle" value="1"<?php echo @$sitemap->show_menutitle ? ' checked="checked"' : ''; ?> />
					</td>

				</tr>
			<tr>
				<td style="width:1%">
					<label for="columns"><?php echo _XMAP_CFG_NUMBER_COLUMNS; ?></label>:
				</td>
				<td style="width:32%">
					<?php echo $lists['columns']; ?>
				</td>
				<td>
					<label for="include_link"><?php echo _XMAP_CFG_INCLUDE_LINK; ?></label>:
				</td>
				<td>
					<input type="checkbox" name="includelink" id="include_link" value="1"<?php echo @$sitemap->includelink ? ' checked="checked"' : ''; ?> />
				</td>
			</tr>

				<?php
					// currently selected external link marker image
					if( eregi( 'gif|jpg|jpeg|png', @$sitemap->ext_image )) {
						$ext_imgurl = $xmapSiteURL.'/components/com_xmap/images/'.$sitemap->ext_image;
					} else {
						$ext_imgurl = $xmapSiteURL.'/images/blank.png';
					}
				?>
				<tr>
					<td>
						<label for="exlinks"><?php echo _XMAP_EX_LINK; ?></label>:
					</td>
					<td colspan="4">
						<input type="checkbox" name="exlinks" id="exlinks" value="1"<?php echo @$sitemap->exlinks ? ' checked="checked"' : ''; ?> />
						&nbsp;
						<?php echo $lists['ext_image']; ?>
						&nbsp;
						<img src="<?php echo $ext_imgurl; ?>" name="imagelib" alt="" />
					</td>
				</tr>
			</table>
		</fieldset>
	</td>
	</tr>
	<tr>
	<td>
		<fieldset>
			<legend><?php echo _XMAP_CFG_URLS; ?></legend>
			<table>
				<?php
					$xml_link = $xmapSiteURL . '/index.php?option=com_xmap&amp;sitemap='.$sitemap->id.'&amp;view=xml&amp;no_html=1';
					$html_link = $xmapSiteURL . '/index.php?option=com_xmap&amp;sitemap='.$sitemap->id;
				?>
				<tr>
					<td><?php echo _XMAP_CFG_XML_MAP; ?>:</td>
					<td>
						<span id="xmllink" style="background:#ffc; padding:1px; border:1px inset;">
						<a href="<?php echo $xml_link; ?>" target="_blank" title="XML Sitemap Link"><?php echo $xml_link; ?></a>
						</span>
						&nbsp;
						<?php echo mosToolTip( str_replace("'","\\'",_XMAP_XML_LINK_TIP) );?>
					</td>
				</tr>
				<tr>
					<td><?php echo _XMAP_CFG_HTML_MAP; ?>:</td>
					<td>
						<span id="xmllink" style="background:#ffc; padding:1px; border:1px inset;">
						<a href="<?php echo $html_link; ?>" target="_blank" title="HTML Sitemap Link"><?php echo $html_link; ?></a>
						</span>
						&nbsp;<?php echo mosToolTip( str_replace("'","\\'",_XMAP_HTML_LINK_TIP) );?>
					</td>
				</tr>
			</table>
		</fieldset>
	</td>
	</tr>
	<tr>
	<td>
		<fieldset>
			<legend><?php echo _XMAP_EXCLUDE_MENU; ?></legend>
			<table>
			<tr>
				<td><?php echo _XMAP_EXCLUDE_MENU; ?>:</td>
				<td>
					<input type="text" name="exclmenus" id="exclmenus" size="40" value="<?php echo $sitemap->exclmenus; ?>" />
					&nbsp;
					<input type="button" onclick="addExclude(<?php echo $sitemap->id; ?>); return false;" value="&larr;" />&nbsp;
				</td>
				<td><?php echo $lists['exclmenus']; ?>&nbsp;<?php echo mosToolTip( str_replace("'","\\'",_XMAP_EXCLUDE_MENU_TIP) );?>
				</td>
			</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><?php echo _XMAP_CACHE; ?></legend>
			<table>
			<tr>
				<td><?php echo _XMAP_USE_CACHE; ?>:</td>
				<td>
					<input type="checkbox" name="usecache" id="usecache" value="1" <?php echo ($sitemap->usecache == 1? 'checked="checked" ': ''); ?> />
				</td>
				<td><?php echo _XMAP_CACHE_LIFE_TIME; ?>:</td>
				<td>
					<input type="text" size="10" name="cachelifetime" id="cachelifetime" value="<?php echo $sitemap->cachelifetime; ?>" />
				</td>
			</tr>
			<table>
		</fieldset>
		</td>
	</tr>
		<tr>
			<td align="center">
				<input type="button" name="savesettings" value="<?php echo _XMAP_TOOLBAR_SAVE; ?>"  onclick="saveSettings(<?php echo $sitemap->id; ?>,'save_sitemap_settings','sitemapsettings');" />
				<input type="button" name="cancelsettings" value="<?php echo _XMAP_TOOLBAR_CANCEL; ?>"  onclick="closeSettings('sitemapsettings');" />
				<input type="hidden" name="id" value="<?php echo $sitemap->id; ?>" />
				<input type="hidden" name="name" value="<?php echo $sitemap->name; ?>" />
			</td>
		</tr>
	</table>
	</form>
<?php
	}

	function printMenusList( &$sitemap ) {
		$menus = $sitemap->getMenus();
		$i = 0;
		foreach ($menus as $name => $menu) {
			echo '<div id="'.$name.$sitemap->id.'" onmouseover="showMenuOptions(\''.str_replace("'","\\'",$name).$sitemap->id.'\',\'',str_replace("'","\\'",$name),'\','. $sitemap->id. ');" onmouseout="hideOptions(this.menu);"><span>',$i,'. ', $name,'</span></div>';
			$i++;
		}
	}

	function showMenuOptions (&$sitemap,&$menu,&$lists) {
		if (is_object($menu) ) {?>
	<form name="frmMenuOptions" id="frmMenuOptions">
		<input type="hidden" name="sitemap" value="<?php echo $sitemap->id; ?>" />
		<input type="hidden" name="menutype" value="<?php echo $menu->menutype; ?>" />
		<table class="adminform"><tr><th><?php echo sprintf (_XMAP_TIT_SETTINGS_OF,$menu->menutype); ?><div class="settingstoptool"></div></th></tr></table>
		<table>
			<tr>
				<td><input type="checkbox" name="show" id="show" <?php echo ($menu->show? " checked=\"checked\"":""); ?> /></td>
				<td><label for="show"><?php echo _XMAP_CFG_MENU_SHOW_HTML; ?></label></td>
			</tr>
			<tr>
				<td style="vertical-align:top;"><input type="checkbox" name="showXML" id="showXML" <?php echo ($menu->showXML? " checked=\"checked\"":""); ?> /></td>
				<td><label for="showXML"><?php echo _XMAP_CFG_MENU_SHOW_XML; ?></label>
					<div id="menu_options_xml">
						<table>
						<tr>
							<td><?php echo _XMAP_CFG_MENU_CHANGEFREQ; ?></td>
							<td><?php echo $lists['changefreq']; ?></td>
						</tr>
						<tr>
							<td><?php echo _XMAP_CFG_MENU_PRIORITY; ?></td>
							<td><?php echo $lists['priority']; ?></td>
						</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="button" value="<?php echo _XMAP_TOOLBAR_SAVE; ?>" onclick="saveMenuOptions();" />&nbsp;&nbsp;&nbsp;
					<input type="button" value="<?php echo _XMAP_TOOLBAR_CANCEL; ?>" onclick="closeSettings('menuoptions');" />
				</td>
			</tr>
	</form>
<?php
		}
	}

	function showInstalledPlugins( &$rows, $option, &$xmlfile, &$lists ) {
		if (count($rows)) {?>
			<form action="index2.php" method="post" name="installedPlugins">
			<table class="adminlist" width="100%">
				<th><?php echo _XMAP_PLUGIN_NAME;?></th>
				<th><?php echo _XMAP_PLUGIN_PUBLITION;?></th>
				<th><?php echo _XMAP_PLUGIN_VERSION;?></th>
				<th><?php echo _XMAP_PLUGIN_AUTHOR;?></th>
				<th><?php echo _XMAP_PLUGIN_DELETE;?></th>
				<th><?php echo _XMAP_PLUGIN_DATE;?></th>
<?php
			$rc = 0;
			$k = 0;
			for ($i = 0, $n = count( $rows ); $i < $n; $i++) {
				XmapAdminHtml::printPluginInfo ($rows[$i],$k);
				$k = 1 - $k;
			}
		} else {
?>
		<table class="adminlist" width="100%">
			<th><?php echo _XMAP_NO_PLUGINS_INSTALLED; ?></th>
		</table>
<?php
		}
?>
		</table>
		<input type="hidden" name="task" value="plugins" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		</form>
<?php
	}
	
	function printPluginInfo (&$row,$k) {
		global $mosConfig_live_site;
?>
		<tr id="plugin<?php echo $row->id; ?>" class="row<?php echo $k; ?>">
			<td><a href="javascript:settingsPlugin(<?php echo $row->id; ?>);"><?php echo $row->name; ?></a></td>
			<td align="center"><a href="javascript:changePluginState(<?php echo $row->id; ?>)"><img id="pluginstate<?php echo $row->id; ?>" src="images/<?php echo $row->published?'publish_g.png" title="'._XMAP_EXT_PUBLISHED.'"':'publish_x.png" title="'._XMAP_EXT_UNPUBLISHED.'"'; ?>" alt="" /></a></td>
			<td align="center"><?php echo @$row->version != "" ? $row->version : "&nbsp;"; ?></td>
			<td align="center"><?php echo (@$row->author != "" ? $row->author : _XMAP_UNKNOWN_AUTHOR) . (@$row->authorEmail != "" ? ' &lt;'.$row->authorEmail.'&gt;' : "&nbsp;"); ?>
				<?php echo @$row->authorUrl != "" ? "<a href=\"" .(substr( $row->authorUrl, 0, 7) == 'http://' ? $row->authorUrl : 'http://'.$row->authorUrl) ."\" target=\"_blank\">$row->authorUrl</a>" : "&nbsp;"; ?></div>
			</td>
			<td align="center"><a href="javascript:uninstallPlugin(<?php echo $row->id; ?>);"><?php echo _XMAP_UNINSTALL; ?></a></td>
			<td align="center"><?php echo @$row->creationdate != "" ? $row->creationdate : "&nbsp;"; ?></td>
		</tr>
<?php
	}

	function writableCell( $folder ) {
		global $mosConfig_absolute_path;
		echo '<tr>';
		echo '<td class="item">' . $folder . '/</td>';
		echo '<td align="left">';
		echo is_writable( $mosConfig_absolute_path . '/' . $folder ) ? '<b><font color="green">'._XMAP_WRITEABLE.'</font></b>' : '<b><font color="red">'._XMAP_UNWRITEABLE.'</font></b>' . '</td>';
		echo '</tr>';
	}

	function showInstallForm( $title,$p_startdir ) {  ?>
		<script type="text/javascript">
		function submitbutton3(pressbutton) {
			var form = document.adminForm_dir;
			if (form.install_directory.value == ""){
				alert( "<?php echo str_replace('"','\\"',_XMAP_MSG_SELECT_FOLDER); ?>" );
			} else {
				form.submit();
			}
		}
		</script>
		<form enctype="multipart/form-data" action="index2.php" method="post" name="filename">
		<table class="adminheading">
		<tr>
			<th class="install"><?php echo $title;?></th>
		</tr>
		</table>
		<table width="100%">
			<tr>
				<td valign="top">
					<table class="adminform">
						<tr>
							<th colspan="2"><?php echo _XMAP_UPLOAD_PKG_FILE; ?></th>
						</tr>
						<tr>
							<td align="left" colspan="2">
								<?php echo _XMAP_PKG_FILE; ?>
								<input class="textarea" name="install_package" type="file" size="40"/>
								<input class="button" type="submit" value="<?php echo _XMAP_UPLOAD_AND_INSTALL; ?>" />
							</td>
						</tr>
					</table>
					<input type="hidden" name="task" value="uploadfile" />
					<input type="hidden" name="installtype" value="upload" />
					<input type="hidden" name="option" value="com_xmap" />
					</form>
				</td>
				<td valign="top">
					<form enctype="multipart/form-data" action="index2.php" method="post" name="adminForm_dir">
					<table class="adminform">
						<tr>
							<th><?php echo _XMAP_INSTALL_F_DIRECTORY; ?></th>
						</tr>
						<tr>
							<td align="left">
							<?php echo _XMAP_INSTALL_DIRECTORY; ?>:&nbsp;
							<input type="text" name="install_directory" class="textarea" size="60" value="<?php echo $p_startdir; ?>"/>&nbsp;
							<input type="button" class="button" value="<?php echo _XMAP_INSTALL; ?>" onclick="submitbutton3()" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="adminlist"><?php mosHTML::writableCell( '/'.ADMINISTRATOR_DIRECTORY.'/components/com_xmap/extensions' );?></table>
		<input type="hidden" name="task" value="installfromdir" />
		<input type="hidden" name="installtype" value="folder" />
		<input type="hidden" name="option" value="com_xmap"/>
		</form>
<?php
	}
	/**
	* @param string
	* @param string
	* @param string
	* @param string
	*/
	function showInstallMessage( $message, $title, $url ) {
		global $PHP_SELF;
		?>
		<table class="adminheading">
		<tr>
			<th class="install"><?php echo $title; ?></th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<td align="left">
			<strong><?php echo $message; ?></strong>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				[&nbsp;<a href="<?php echo $url;?>" style="font-size: 16px; font-weight: bold"><?php echo _XMAP_CONTINUE; ?> ...</a>&nbsp;]
			</td>
		</tr>
		</table>
<?php
	}

	function showPluginSettings (&$extension,$itemid='-1') {
		// get params definitions
		$xmlfile = $extension->getXmlPath();
		$params = new mosParameters( $extension->getParams($itemid,true), $xmlfile, 'xmap_ext' );
?>
		<table class="adminform"><tr><th>Настройки расширения: <?php echo $extension->extension;?></th></tr></table>
		<form action="" name="frmSettings" id="frmSettings<?php echo $extension->id; ?>">
			<input type="hidden" name="id" value="<?php echo $extension->id; ?>" />
			<input type="hidden" name="boston" value="boston" />
			<?php echo $params->render(); ?>
			<div style="text-align: center;padding: 5px;">
				<input type="button" name="save" onclick="saveSettings(<?php echo $extension->id; ?>,'save_plugin_settings','pluginsettings');" value="<?php echo _XMAP_TOOLBAR_SAVE; ?>" />
				<input type="button" name="cancel" onclick="closeSettings('pluginsettings');" value="<?php echo _XMAP_TOOLBAR_CANCEL; ?>" />&nbsp;&nbsp;&nbsp;
			</div>
		</form>
<?php
	}
}
