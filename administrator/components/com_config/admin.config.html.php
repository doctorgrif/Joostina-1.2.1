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
 * @subpackage Config
 */
class HTML_config {
	function showconfig(&$row, &$lists, $option) {
		global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_session_type, $mainframe;
		$tabs = new mosTabs(1, 1);
		mosCommonHTML::loadOverlib();
?>
<script type="text/javascript">
	<!--
	function saveFilePerms() {
	var f = document.adminForm;
	if (f.filePermsMode0.checked){
		f.config_fileperms.value = '';
	}else {
		var perms = 0;
		if (f.filePermsUserRead.checked) perms += 400;
		if (f.filePermsUserWrite.checked) perms += 200;
		if (f.filePermsUserExecute.checked) perms += 100;
		if (f.filePermsGroupRead.checked) perms += 40;
		if (f.filePermsGroupWrite.checked) perms += 20;
		if (f.filePermsGroupExecute.checked) perms += 10;
		if (f.filePermsWorldRead.checked) perms += 4;
		if (f.filePermsWorldWrite.checked) perms += 2;
		if (f.filePermsWorldExecute.checked) perms += 1;
		f.config_fileperms.value = '0'+''+perms;
	}
	}
	function changeFilePermsMode(mode) {
	if(document.getElementById) {
		switch (mode) {
		case 0:
		SRAX.get('filePermsValue').style.display = 'none';
		SRAX.get('filePermsTooltip').style.display = '';
		SRAX.get('filePermsFlags').style.display = 'none';
		break;
		default:
		SRAX.get('filePermsValue').style.display = '';
		SRAX.get('filePermsTooltip').style.display = 'none';
		SRAX.get('filePermsFlags').style.display = '';
		} // switch
	} // if
	saveFilePerms();
	}
	function saveDirPerms()  {
	var f = document.adminForm;
	if (f.dirPermsMode0.checked)
		f.config_dirperms.value = '';
	else {
		var perms = 0;
		if (f.dirPermsUserRead.checked) perms += 400;
		if (f.dirPermsUserWrite.checked) perms += 200;
		if (f.dirPermsUserSearch.checked) perms += 100;
		if (f.dirPermsGroupRead.checked) perms += 40;
		if (f.dirPermsGroupWrite.checked) perms += 20;
		if (f.dirPermsGroupSearch.checked) perms += 10;
		if (f.dirPermsWorldRead.checked) perms += 4;
		if (f.dirPermsWorldWrite.checked) perms += 2;
		if (f.dirPermsWorldSearch.checked) perms += 1;
		f.config_dirperms.value = '0'+''+perms;
	}
	}
	function changeDirPermsMode(mode)   {
	if(document.getElementById) {
		switch (mode) {
		case 0:
		SRAX.get('dirPermsValue').style.display = 'none';
		SRAX.get('dirPermsTooltip').style.display = '';
		SRAX.get('dirPermsFlags').style.display = 'none';
		break;
		default:
		SRAX.get('dirPermsValue').style.display = '';
		SRAX.get('dirPermsTooltip').style.display = 'none';
		SRAX.get('dirPermsFlags').style.display = '';
		} // switch
	} // if
	saveDirPerms();
	}
	function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (form.config_session_type.value != <?php echo $row->config_session_type; ?> ){
		if ( confirm('<?php echo _DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD ?>') ) {
		submitform( pressbutton );
		} else {
		return;
		}
	} else {
		submitform( pressbutton );
	}
	}
	function ch_apply(){
	SRAX.get('tb-apply').className='tb-load';
	saveFilePerms();
	saveDirPerms();
	dax({
		url: 'ajax.index.php?option=com_config&task=apply',
		id:'publ-1',
		method:'post',
		form: 'adminForm',
		callback:
		function(resp){
		log('<?php echo _CONTENT_ANSWER; ?> ' + resp.responseText);
		mess_cool(resp.responseText);
		SRAX.get('tb-apply').className='tb-apply';
		}});
	}
	//-->
</script>
		<?php
//выпадающий список компонентов, которые можно конфигурировать
		$adm_components = glob($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/*', GLOB_ONLYDIR);
		$usr_components = glob($mosConfig_absolute_path . '/components/*', GLOB_ONLYDIR);
		$components_arr = array();
		foreach ($adm_components as $compo) {
			$cname = basename($compo);
			if (!in_array($compo, $components_arr))
				$components_arr[] = basename($compo);
		}
		foreach ($usr_components as $compo) {
			$cname = basename($compo);
			if (!in_array($compo, $components_arr))
				$components_arr[] = basename($compo);
		}
		$out_components_arr = array();
		foreach ($components_arr as $compo) {
			if (getComponentConfigXMLPath($compo)) {
				$e = new stdClass();
				$e->name = $compo;
				$out_components_arr[] = $e;
			}
		}
		$comp_list = mosHTML::selectList($out_components_arr, 'component', '', 'name', 'name', '');
		?>
<p><form action="index2.php?option=com_config&task=component_config" method="POST"><?php echo _COMPONENT ?>: <?php echo $comp_list ?> <input type="submit" value="<?php echo _SUBMIT_BUTTON ?>"></form></p>
<div style="text-align:left;">
	<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<div id="overDiv" style="position:absolute;visibility:hidden;z-index:10000;"></div>
			<table cellpadding="1" cellspacing="1" border="0" width="100%">
				<tr>
					<td width="70%">
						<table class="adminheading">
							<tr>
								<th class="config"><?php echo _GLOBAL_CONFIG ?></th>
							</tr>
						</table>
					</td>
					<?php
					if (mosIsChmodable('../configuration.php')) {
						if (is_writable('../configuration.php')) {
					?>
					<td class="jtd_nowrap">
						<input type="checkbox" id="disable_write" name="disable_write" value="1" />
						<label for="disable_write"><?php echo _PROTECT_AFTER_SAVE ?></label>
					</td>
					<?php
					} else {
					?>
					<td class="jtd_nowrap">
						<input type="checkbox" id="enable_write" name="enable_write" value="1" />
						<label for="enable_write"><?php echo _IGNORE_PROTECTION_WHEN_SAVE ?></label>
					</td>
					<?php
					} // if
					} // if
					?>
				</tr>
			</table>
			<div class="message">
				<?php echo _CONFIG_SAVING ?>
				<?php echo is_writable('../configuration.php') ? '<strong class="green">' . _AVAILABLE_CHECK_RIGHTS . '</strong>' : '<strong class="red">' . _NOT_AVAILABLE_CHECK_RIGHTS . '</strong>'; ?>
			</div><br />
			<?php
			$tabs->startPane("configPane");
			$tabs->startTab(_SITE, "site-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="45%"><?php echo _SITE_NAME ?></td>
								<td width="55%"><input class="textarea" type="text" name="config_sitename" size="30" value="<?php echo $row->config_sitename; ?>" /></td>
							</tr>
							<tr>
								<td width="45%"><?php echo _SITE_OFFLINE ?></td>
								<td width="55%"><?php echo $lists['offline']; ?></td>
							</tr>
							<tr>
								<td width="45%"><?php echo _SITE_OFFLINE_MESSAGE ?></td>
								<td width="55%"><textarea class="textarea" cols="30" rows="4" name="config_offline_message"><?php echo $row->config_offline_message; ?></textarea>
									<?php $tip = _SITE_OFFLINE_MESSAGE2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="45%"><?php echo _SYSTEM_ERROR_MESSAGE ?></td>
								<td width="55%"><textarea class="textarea" cols="30" rows="4" name="config_error_message"><?php echo $row->config_error_message; ?></textarea>
								<?php $tip = _SYSTEM_ERROR_MESSAGE2;
								echo mosToolTip($tip);
								?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _SHOW_READMORE_TO_AUTH ?></td>
								<td width="60%"><?php echo $lists['shownoauth']; ?>
									<?php $tip = _SHOW_READMORE_TO_AUTH2;
									echo mosToolTip($tip);
									?>
								</td>
								</tr>
								<tr>
									<td width="40%"><?php echo _ENABLE_USER_REGISTRATION ?></td>
									<td width="60%"><?php echo $lists['allowUserRegistration']; ?>
										<?php $tip = _ENABLE_USER_REGISTRATION2;
										echo mosToolTip($tip);
										?>
									</td>
								</tr>
								<tr>
									<td width="40%"><?php echo _ACCOUNT_ACTIVATION ?></td>
									<td width="60%"><?php echo $lists['useractivation']; ?>
										<?php $tip = _ACCOUNT_ACTIVATION2;
										echo mosToolTip($tip);
										?>
									</td>
								</tr>
								<tr>
									<td width="40%"><?php echo _UNIQUE_EMAIL ?></td>
									<td width="60%"><?php echo $lists['uniquemail']; ?>
										<?php $tip = _UNIQUE_EMAIL2;
										echo mosToolTip($tip);
										?>
									</td>
								</tr>
								<tr>
									<td width="40%"><?php echo _USER_PARAMS ?></td>
									<td width="60%"><?php echo $lists['frontend_userparams']; ?>
										<?php $tip = _USER_PARAMS2;
										echo mosToolTip($tip);
										?>
									</td>
								</tr>
								<tr>
									<td width="40%"><?php echo _DEFAULT_EDITOR ?></td>
									<td width="60%"><?php echo $lists['editor']; ?></td>
								</tr>
								<tr>
									<td width="40%"><?php echo _LIST_LIMIT ?></td>
									<td width="60%"><?php echo $lists['list_limit'];
										$tip = _LIST_LIMIT2;
										echo mosToolTip($tip);
										?>
									</td>
								</tr>
						</table>
					</td>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_FRONTPAGE, "front-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _SITE_LANGUAGE; ?></td>
								<td width="60%"><?php echo $lists['lang']; ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _CUSTOM_PRINT ?></td>
								<td width="60%"><?php echo $lists['config_custom_print'];
									$tip = _CUSTOM_PRINT2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _MODULES_MULTI_LANG ?></td>
								<td width="60%"><?php echo $lists['config_module_multilang'];
									$tip = _MODULES_MULTI_LANG2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DATE_FORMAT_TXT ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_form_date" size="30" value="<?php echo $row->config_form_date; ?>" />
									<?php echo $lists['form_date_help'];
									$tip = _DATE_FORMAT2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DATE_FORMAT_FULL ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_form_date_full" size="30" value="<?php echo $row->config_form_date_full; ?>" />
									<?php echo $lists['form_date_full_help'];
									$tip = _DATE_FORMAT_FULL2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _USE_H1_FOR_HEADERS ?></td>
								<td width="60%"><?php echo $lists['config_title_h1_only_view'];
									$tip = _USE_H1_FOR_HEADERS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _USE_H1_HEADERS_ALWAYS ?></td>
								<td width="60%"><?php echo $lists['config_title_h1'];
									$tip = _USE_H1_HEADERS_ALWAYS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_RSS ?></td>
								<td width="60%"><?php echo $lists['syndicate_off'];
									$tip = _DISABLE_RSS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _USE_TEMPLATE ?></td>
								<td width="60%"><?php echo $lists['one_template'];
									$tip = _USE_TEMPLATE2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _FAVICON_IMAGE ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_favicon" size="30" value="<?php echo $row->config_favicon; ?>" />
									<?php $tip = _FAVICON_IMAGE2;
									echo mosToolTip($tip, _FAVICON_IMAGE3);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_FAVICON ?></td>
								<td width="60%"><?php echo $lists['config_disable_favicon'];
									$tip = _DISABLE_FAVICON2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _FAVICON_IMAGE_IE ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_favicon_ie" size="30" value="<?php echo $row->config_favicon_ie; ?>" />
									<?php $tip = _FAVICON_IMAGE2_IE;
									echo mosToolTip($tip, _FAVICON_IMAGE3_IE);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_FAVICON_IE ?></td>
								<td width="60%"><?php echo $lists['config_disable_favicon_ie'];
									$tip = _DISABLE_FAVICON2_IE;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _FAVICON_IMAGE_IPAD ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_favicon_ipad" size="30" value="<?php echo $row->config_favicon_ipad; ?>" />
									<?php $tip = _FAVICON_IMAGE2_IPAD;
									echo mosToolTip($tip, _FAVICON_IMAGE3_IPAD);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_FAVICON_IPAD ?></td>
								<td width="60%"><?php echo $lists['config_disable_favicon_ipad'];
									$tip = _DISABLE_FAVICON2_IPAD;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_SYSTEM_MAMBOTS ?></td>
								<td width="60%"><?php echo $lists['mmb_system_off'];
									$tip = _DISABLE_SYSTEM_MAMBOTS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_CONTENT_MAMBOTS ?></td>
								<td width="60%"><?php echo $lists['mmb_content_off'];
									$tip = _DISABLE_CONTENT_MAMBOTS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_MAINBODY_MAMBOTS ?></td>
								<td width="60%"><?php echo $lists['config_mmb_mainbody_off'];
									$tip = _DISABLE_MAINBODY_MAMBOTS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _SITE_AUTH ?></td>
								<td width="60%"><?php echo $lists['frontend_login'];
									$tip = _SITE_AUTH2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _FRONT_SESSION_TIME ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_lifetime" size="30" value="<?php echo $row->config_lifetime; ?>" />&nbsp;секунд&nbsp;<?php echo mosWarning(_FRONT_SESSION_TIME2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_FRONT_SESSIONS ?></td>
								<td width="60%"><?php echo $lists['session_front'];
									$tip = _DISABLE_FRONT_SESSIONS2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_ACCESS_CHECK_TO_CONTENT ?></td>
								<td width="60%"><?php echo $lists['config_disable_access_control'];
									$tip = _DISABLE_ACCESS_CHECK_TO_CONTENT2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _COUNT_CONTENT_HITS ?></td>
								<td width="60%"><?php echo $lists['config_content_hits'];
									echo mosToolTip(_COUNT_CONTENT_HITS2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_CHECK_CONTENT_DATE ?></td>
								<td width="60%"><?php echo $lists['config_disable_date_state'];
									echo mosToolTip(_DISABLE_CHECK_CONTENT_DATE2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_MODULES_WHEN_EDIT ?></td>
								<td width="60%"><?php echo $lists['module_on_edit_off'];
									$tip = _DISABLE_MODULES_WHEN_EDIT2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _COUNT_GENERATION_TIME ?></td>
								<td width="60%"><?php echo $lists['time_gen'];
									$tip = _COUNT_GENERATION_TIME2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ENABLE_GZIP ?></td>
								<td width="60%"><?php echo $lists['gzip'];
									echo mosToolTip(_ENABLE_GZIP2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _IS_SITE_DEBUG ?></td>
								<td width="60%"><?php echo $lists['debug'];
									$tip = _IS_SITE_DEBUG2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _EXTENDED_DEBUG ?></td>
								<td width="60%"><?php echo $lists['config_front_debug'];
									echo mosToolTip(_EXTENDED_DEBUG2); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_CONTROL_PANEL, "back-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _DISABLE_ADMIN_SESS_DEL ?></td>
								<td width="60%"><?php echo $lists['config_adm_session_del'];
									echo mosToolTip(_DISABLE_ADMIN_SESS_DEL2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_HELP_BUTTON ?></td>
								<td width="60%"><?php echo $lists['config_disable_button_help'];
									echo mosToolTip(_DISABLE_HELP_BUTTON2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _USE_OLD_TOOLBAR ?></td>
								<td width="60%"><?php echo $lists['config_old_toolbar'];
									echo mosToolTip(_USE_OLD_TOOLBAR2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_IMAGES_TAB ?></td>
								<td width="60%"><?php echo $lists['config_disable_image_tab'];
									echo mosToolTip(_DISABLE_IMAGES_TAB2); ?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _ADMIN_SESS_TIME ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_session_life_admin" size="10" value="<?php echo $row->config_session_life_admin; ?>" />&nbsp;<?php echo _SECONDS ?>&nbsp;<?php echo mosWarning(_ADMIN_SESS_TIME2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SAVE_LAST_PAGE ?></td>
								<td width="60%"><?php echo $lists['admin_expired'];
									echo mosToolTip(_SAVE_LAST_PAGE2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _HTML_CSS_EDITOR ?></td>
								<td width="60%"><?php echo $lists['config_codepress'];
									echo mosToolTip(_HTML_CSS_EDITOR2); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_E_CONTENT, "content-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td colspan="3"><?php echo _THIS_PARAMS_CONTROL_CONTENT ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _LINK_TITLES ?></td>
								<td width="50%"><?php echo $lists['link_titles']; ?></td>
								<td width="5%"><?php $tip = _LINK_TITLES2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _READMORE_LINK ?></td>
								<td width="55%"><?php echo $lists['readmore']; ?></td>
								<td width="5%"><?php $tip = _READMORE_LINK2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _VOTING_ENABLE ?></td>
								<td width="55%"><?php echo $lists['vote']; ?></td>
								<td width="5%"><?php $tip = _VOTING_ENABLE2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _AUTHOR_NAMES ?></td>
								<td width="55%"><?php echo $lists['hideAuthor']; ?></td>
								<td width="5%"><?php $tip = _AUTHOR_NAMES2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DATE_TIME_CREATION ?></td>
								<td width="55%"><?php echo $lists['hideCreateDate']; ?></td>
								<td width="5%"><?php $tip = _DATE_TIME_CREATION2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DATE_TIME_MODIFICATION ?></td>
								<td width="55%"><?php echo $lists['hideModifyDate']; ?></td>
								<td width="5%"><?php $tip = _DATE_TIME_MODIFICATION2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _VIEW_COUNT ?></td>
								<td width="55%"><?php echo $lists['hits']; ?></td>
								<td width="5%"><?php $tip = _VIEW_COUNT2;
									echo mosToolTip($tip);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _LINK_PDF ?></td>
								<td width="55%"><?php echo $lists['hidePdf']; ?></td>
									<?php if (!is_writable("$mosConfig_absolute_path/media/")) {
										echo '<td align="left">';
										echo mosToolTip(_PRINT_PDF_ICON);
										echo '</td>';
									} else {
									?>
								<td width="5%">&nbsp;</td>
								<?php } ?>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _LINK_PRINT ?></td>
								<td width="55%"><?php echo $lists['hidePrint']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _LINK_EMAIL ?></td>
								<td width="55%"><?php echo $lists['hideEmail']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _PRINT_EMAIL_ICONS ?></td>
								<td width="55%"><?php echo $lists['icons']; ?></td>
								<td width="5%"><?php echo mosToolTip(_PRINT_EMAIL_ICONS2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ENABLE_TOC ?></td>
								<td width="55%"><?php echo $lists['multipage_toc']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _BACK_BUTTON ?></td>
								<td width="55%"><?php echo $lists['back_button']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _CONTENT_NAV ?></td>
								<td width="55%"><?php echo $lists['item_navigation']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _UNIQ_ITEMS_IDS ?></td>
								<td width="55%"><?php echo $lists['config_uid_news']; ?></td>
								<td width="5%"><?php echo mosToolTip(_UNIQ_ITEMS_IDS2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _AUTO_PUBLICATION_FRONT ?></td>
								<td width="55%"><?php echo $lists['auto_frontpage']; ?></td>
								<td width="5%"><?php echo mosToolTip(_AUTO_PUBLICATION_FRONT2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_BLOCK ?></td>
								<td width="55%"><?php echo $lists['config_disable_checked_out']; ?></td>
								<td width="5%"><?php echo mosToolTip(_DISABLE_BLOCK2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ITEMID_COMPAT ?></td>
								<td width="55%"><?php echo $lists['itemid_compat']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ONE_EDITOR ?></td>
								<td width="55%"><?php echo $lists['one_editor']; ?></td>
								<td width="5%"><?php echo mosToolTip(_ONE_EDITOR2); ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="hidden" name="config_multilingual_support" value="<?php echo $row->config_multilingual_support ?>" />
			<?php
			$tabs->endTab();
			$tabs->startTab(_LOCALE, "Locale-page");
			?>
			<table class="adminform">
				<tr>
					<td width="40%"><?php echo _TIME_OFFSET ?></td>
					<td width="55%"><?php echo $lists['offset'];
						$tip = _TIME_OFFSET2 . ' ' . mosCurrentDate(_DATE_FORMAT_LC2);
						echo mosToolTip($tip);
						?>
					</td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _TIME_DIFF ?></td>
					<td width="55%"><input class="textarea" type="text" name="config_offset" size="20" value="<?php echo $row->config_offset; ?>" disabled="disabled" /></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _TIME_DIFF2 ?></td>
					<td width="55%"><?php echo $lists['feed_timeoffset']; ?>
						<?php $tip = _CURR_DATE_TIME_RSS . ': ' . mosCurrentDate(_DATE_FORMAT_LC2);
						echo mosToolTip($tip);
						?>
					</td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr valign="top">
					<td width="40%"><?php echo _COUNTRY_LOCALE ?></td>
					<td width="55%"><input class="textarea" type="text" name="config_locale" size="20" value="<?php echo $row->config_locale; ?>" />
						<?php $tip = _COUNTRY_LOCALE2;
						echo mosToolTip($tip);
						?>
					</td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr valign="top">
					<td width="40%">&nbsp;</td>
					<td width="55%"><?php echo _LOCALE_WINDOWS ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_DATABASE, "db-page");
			?>
			<table class="adminform">
				<tr>
					<td width="40%"><?php echo _DB_HOST ?></td>
					<td width="60%"><input class="textarea" type="text" name="config_host" size="30" value="<?php echo $row->config_host; ?>" /></td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DB_USER ?></td>
					<td width="60%"><input class="textarea" type="text" name="config_user" size="30" value="<?php echo $row->config_user; ?>" /></td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DB_NAME ?></td>
					<td width="60%"><input class="textarea" type="text" name="config_db" size="30" value="<?php echo $row->config_db; ?>" /></td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DB_PREFIX ?></td>
					<td width="60%"><input class="textarea" type="text" name="config_dbprefix" size="30" value="<?php echo $row->config_dbprefix; ?>" />
						&nbsp;<?php echo mosWarning(_DB_PREFIX2); ?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _EVERYDAY_OPTIMIZATION ?></td>
					<td width="60%"><?php echo $lists['optimizetables'];
						$tip = _EVERYDAY_OPTIMIZATION2;
						echo mosToolTip($tip);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _OLD_MYSQL_SUPPORT ?></td>
					<td width="60%"><?php echo $lists['config_dbold'];
						$tip = _OLD_MYSQL_SUPPORT2;
						echo mosToolTip($tip);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DISABLE_SET_SQL ?></td>
					<td width="60%"><?php echo $lists['config_sql_mode_off'];
						$tip = _DISABLE_SET_SQL2;
						echo mosToolTip($tip);
						?>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_SERVER, "server-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="45%">URL сайта</td>
								<td width="55%"><?php echo $row->config_live_site; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ABS_PATH ?></td>
								<td width="55%"><?php echo $row->config_absolute_path; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="5%"><?php echo _MEDIA_ROOT ?></td>
								<td width="5%"><input class="textarea" type="text" name="config_media_dir" size="30" value="<?php echo $row->config_media_dir; ?>" />
									<?php echo mosToolTip(_MEDIA_ROOT2); ?>
								</td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _FILE_ROOT ?></td>
								<td width="55%"><input class="textarea" type="text" name="config_joomlaxplorer_dir" size="30" value="<?php echo $row->config_joomlaxplorer_dir; ?>"/>
									<?php echo mosToolTip(_FILE_ROOT2); ?>
								</td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SECRET_WORD ?></td>
								<td width="55%"><?php echo $row->config_secret; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _GZ_CSS_JS ?></td>
								<td width="55%"><?php echo $lists['config_gz_js_css']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SESSION_TYPE ?></td>
								<td width="55%"><?php echo $lists['session_type']; ?>&nbsp;<?php echo mosWarning(_SESSION_TYPE2); ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _ERROR_REPORTING ?></td>
								<td width="55%"><?php echo $lists['error_reporting']; ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td width="40%"><?php echo _HELP_SERVER ?></td>
								<td width="55%"><input class="textarea" type="text" name="config_helpurl" size="30" value="<?php echo $row->config_helpurl; ?>" />
									<?php echo mosToolTip(_HELP_SERVER2); ?></td>
								<td width="5%">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
							<?php
							$mode = 0;
							$flags = 0644;
								if ($row->config_fileperms != '') {
								$mode = 1;
								$flags = octdec($row->config_fileperms);
								} // if
							?>
								<td valign="top"><?php echo _FILE_MODE ?></td>
								<td>
									<fieldset>
										<legend><?php echo _FILE_MODE2 ?></legend>
											<table border="0">
												<tr>
													<td><input type="radio" id="filePermsMode0" name="filePermsMode" value="0" onclick="changeFilePermsMode(0)" <?php if (!$mode) echo ' checked="checked"'; ?> /></td>
													<td><label for="filePermsMode0"><?php echo _FILE_MODE3 ?></label></td>
												</tr>
												<tr>
													<td><input type="radio" id="filePermsMode1" name="filePermsMode" value="1" onclick="changeFilePermsMode(1)" <?php if ($mode) echo ' checked="checked"'; ?> /></td>
													<td>
														<label for="filePermsMode1"><?php echo _FILE_MODE4 ?></label>
														<span id="filePermsValue"<?php if (!$mode) echo ' style="display:none;"'; ?>>как:
															<input class="textarea" type="text" readonly="readonly" name="config_fileperms" size="4" value="<?php echo $row->config_fileperms; ?>" />
														</span>
														<span id="filePermsTooltip"<?php if ($mode) echo ' style="display:none;"'; ?>>&nbsp;<?php echo mosToolTip(_FILE_MODE5); ?></span>
													</td>
												</tr>
												<tr id="filePermsFlags"<?php if (!$mode) echo ' style="display:none;"'; ?>>
													<td>&nbsp;</td>
													<td>
														<table border="0">
															<tr>
																<td><?php echo _OWNER ?></td>
																<td><input type="checkbox" id="filePermsUserRead" name="filePermsUserRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 0400) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsUserRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="filePermsUserWrite" name="filePermsUserWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 0200) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsUserWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="filePermsUserExecute" name="filePermsUserExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 0100) echo ' checked="checked"'; ?> /></td>
																<td colspan="3"><label for="filePermsUserExecute"><?php echo _O_EXEC ?></label></td>
															</tr>
															<tr>
																<td><?php echo _O_GROUP ?></td>
																<td><input type="checkbox" id="filePermsGroupRead" name="filePermsGroupRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 040) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsGroupRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="filePermsGroupWrite" name="filePermsGroupWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 020) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsGroupWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="filePermsGroupExecute" name="filePermsGroupExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 010) echo ' checked="checked"'; ?> /></td>
																<td width="70"><label for="filePermsGroupExecute"><?php echo _O_EXEC ?></label></td>
																<td><input type="checkbox" id="applyFilePerms" name="applyFilePerms" value="1" /></td>
																<td class="jtd_nowrap">
																	<label for="applyFilePerms"><?php echo _APPLY_TO_FILES ?>&nbsp;<?php echo mosWarning(_APPLY_TO_FILES2); ?></label>
																</td>
															</tr>
															<tr>
																<td><?php echo _CMN_ALL ?></td>
																<td><input type="checkbox" id="filePermsWorldRead" name="filePermsWorldRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 04) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsWorldRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="filePermsWorldWrite" name="filePermsWorldWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 02) echo ' checked="checked"'; ?> /></td>
																<td><label for="filePermsWorldWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="filePermsWorldExecute" name="filePermsWorldExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 01) echo ' checked="checked"'; ?> /></td>
																<td colspan="4"><label for="filePermsWorldExecute"><?php echo _O_EXEC ?></label></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
									</fieldset>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<?php
								$mode = 0;
								$flags = 0755;
									if ($row->config_dirperms != '') {
									$mode = 1;
									$flags = octdec($row->config_dirperms);
									} // if
								?>
								<td valign="top"><?php echo _DIR_CREATION ?></td>
								<td>
									<fieldset>
										<legend><?php echo _DIR_CREATION2 ?></legend>
											<table border="0">
												<tr>
													<td width="10%"><input type="radio" id="dirPermsMode0" name="dirPermsMode" value="0" onclick="changeDirPermsMode(0)"<?php if (!$mode) echo ' checked="checked"'; ?> /></td>
													<td width="90%"><label for="dirPermsMode0"><?php echo _DIR_CREATION3 ?></label></td>
												</tr>
												<tr>
													<td width="10%"><input type="radio" id="dirPermsMode1" name="dirPermsMode" value="1" onclick="changeDirPermsMode(1)"<?php if ($mode) echo ' checked="checked"'; ?> /></td>
													<td width="90%">
														<label for="dirPermsMode1"><?php echo _DIR_CREATION4 ?></label>
														<span id="dirPermsValue"<?php if (!$mode) echo ' style="display:none;"'; ?>>
															<?php echo _O_AS ?>: <input class="textarea" type="text" readonly="readonly" name="config_dirperms" size="4" value="<?php echo $row->config_dirperms; ?>" />
														</span>
														<span id="dirPermsTooltip"<?php if ($mode) echo ' style="display:none;"'; ?>>&nbsp;<?php echo mosToolTip(_DIR_CREATION5); ?></span>
													</td>
												</tr>
												<tr id="dirPermsFlags"<?php if (!$mode) echo ' style="display:none;"'; ?>>
													<td>&nbsp;</td>
													<td>
														<table border="0">
															<tr>
																<td><?php echo _OWNER ?></td>
																<td><input type="checkbox" id="dirPermsUserRead" name="dirPermsUserRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 0400) echo ' checked="checked"'; ?> /></td>
																<td><label for="dirPermsUserRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="dirPermsUserWrite" name="dirPermsUserWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 0200) echo ' checked="checked"'; ?> /></td>
																<td><label for="dirPermsUserWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="dirPermsUserSearch" name="dirPermsUserSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 0100) echo ' checked="checked"'; ?> /></td>
																<td colspan="3"><label for="dirPermsUserSearch"><?php echo _O_SEARCH ?></label></td>
															</tr>
															<tr>
																<td><?php echo _O_GROUP ?></td>
																<td><input type="checkbox" id="dirPermsGroupRead" name="dirPermsGroupRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 040) echo ' checked="checked"'; ?> /></td>
																<td><label for="dirPermsGroupRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="dirPermsGroupWrite" name="dirPermsGroupWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 020) echo ' checked="checked"'; ?> /></td>
																<td><label for="dirPermsGroupWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="dirPermsGroupSearch" name="dirPermsGroupSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 010) echo ' checked="checked"'; ?> /></td>
																<td width="70"><label for="dirPermsGroupSearch"><?php echo _O_SEARCH ?></label></td>
																<td><input type="checkbox" id="applyDirPerms" name="applyDirPerms" value="1"/></td>
																<td class="jtd_nowrap">
																	<label for="applyDirPerms"><?php echo _APPLY_TO_DIRS ?>&nbsp;<?php echo mosWarning(_APPLY_TO_DIRS2); ?></label>
																</td>
															</tr>
															<tr>
																<td><?php echo _CMN_ALL ?></td>
																<td><input type="checkbox" id="dirPermsWorldRead" name="dirPermsWorldRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 04) echo ' checked="checked"'; ?> /></td>
																<td><label for="dirPermsWorldRead"><?php echo _O_READ ?></label></td>
																<td><input type="checkbox" id="dirPermsWorldWrite" name="dirPermsWorldWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 02) echo ' checked="checked"'; ?> /></td>
																<td style="padding:0;"><label for="dirPermsWorldWrite"><?php echo _O_WRITE ?></label></td>
																<td><input type="checkbox" id="dirPermsWorldSearch" name="dirPermsWorldSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 01) echo ' checked="checked"'; ?> /></td>
																<td colspan="3"><label for="dirPermsWorldSearch"><?php echo _O_SEARCH ?></label></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
									</fieldset>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<?php
								$rgmode = 0;
									if (defined('RG_EMULATION')) {
										$rgmode = RG_EMULATION;
										}
								?>
								<td valign="top">Register Globals Emulation</td>
								<td>
									<fieldset>
									<legend><?php echo _RG_EMULATION_TXT ?></legend>
											<table border="0">
												<tr>
													<td width="10%"><input type="radio" id="rgemulation" name="rgemulation" value="0"<?php if (!$rgmode) echo ' checked="checked"'; ?> /></td>
													<td width="90%"><label for="rgemulation"><?php echo _RG_DISABLE ?></label></td>
												</tr>
												<tr>
													<td width="10%"><input type="radio" id="rgemulation" name="rgemulation" value="1"<?php if ($rgmode) echo ' checked="checked"'; ?> /></td>
													<td width="90%"><label for="rgemulation"><?php echo _RG_ENABLE ?></label></td>
												</tr>
											</table>
									</fieldset>
								</td>
								<td>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_METADATA, "metadata-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="40%" valign="top"><?php echo _SITE_DESC ?></td>
								<td width="60%"><textarea class="textarea" cols="30" rows="4" style="width:400px;height:100px;" name="config_MetaDesc"><?php echo $row->config_MetaDesc; ?></textarea><?php echo mosToolTip(_SITE_DESC2); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SITE_KEYWORDS ?></td>
								<td width="60%"><textarea class="textarea" cols="30" rows="4" style="width:400px;height:100px;" name="config_MetaKeys"><?php echo $row->config_MetaKeys; ?></textarea><?php echo mosToolTip(_SITE_KEYWORDS2); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_TITLE_TAG ?></td>
								<td width="60%"><?php echo $lists['MetaTitle'];
									echo mosToolTip(_SHOW_TITLE_TAG2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_AUTHOR_TAG ?></td>
								<td width="60%"><?php echo $lists['MetaAuthor'];
									echo mosToolTip(_SHOW_AUTHOR_TAG2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_BASE_TAG ?></td>
								<td width="60%"><?php echo $lists['mtage_base'];
									echo mosToolTip(_SHOW_BASE_TAG2); ?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _REVISIT_TAG ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_mtage_revisit" size="30" value="<?php echo $row->config_mtage_revisit; ?>" /><?php echo mosToolTip(_REVISIT_TAG2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _DISABLE_GENERATOR_TAG ?></td>
								<td width="60%"><?php echo $lists['generator_off'];
									echo mosToolTip(_DISABLE_GENERATOR_TAG2);
									?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _EXT_IND_TAGS ?></td>
								<td width="60%"><?php echo $lists['index_tag'];
									echo mosToolTip(_EXT_IND_TAGS2);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GEO_TAG ?></td>
								<td width="60%"><?php echo $lists['gtag'];
									echo mosToolTip(_SHOW_GEO_TAG2);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GEO_TAG_LATITUDE ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_gtag_lat" size="10" value="<?php echo $row->config_gtag_lat; ?>" /><?php echo mosToolTip(_SHOW_GEO_TAG2_LATITUDE); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GEO_TAG_LONGITUDE ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_gtag_long" size="10" value="<?php echo $row->config_gtag_long; ?>" /><?php echo mosToolTip(_SHOW_GEO_TAG2_LONGITUDE); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GEO_TAG_PLACENAME ?></td>
								<td width="60%"><textarea class="textarea" cols="30" rows="2" style="width:300px;height:10px;" name="config_gtag_place"><?php echo $row->config_gtag_place; ?></textarea><?php echo mosToolTip(_SHOW_GEO_TAG2_PLACENAME); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GEO_TAG_REGION ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_gtag_reg" size="10" value="<?php echo $row->config_gtag_reg; ?>" /><?php echo mosToolTip(_SHOW_GEO_TAG2_REGION); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_DCORE ?></td>
								<td width="60%"><?php echo $lists['dcore'];
									echo mosToolTip(_SHOW_DCORE2);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_DCORE_LANGUAGE ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_dcore_language" size="10" value="<?php echo $row->config_dcore_language; ?>" /><?php echo mosToolTip(_SHOW_DCORE2_LANGUAGE); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GA ?></td>
								<td width="60%"><?php echo $lists['ga'];
									echo mosToolTip(_SHOW_GA2);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_GA_ID ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_ga_id" size="15" value="<?php echo $row->config_ga_id; ?>" /><?php echo mosToolTip(_SHOW_GA2_ID); ?></td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_YM ?></td>
								<td width="60%"><?php echo $lists['ym'];
									echo mosToolTip(_SHOW_YM2);
									?>
								</td>
							</tr>
							<tr>
								<td width="40%" valign="top"><?php echo _SHOW_YM_ID ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_ym_id" size="15" value="<?php echo $row->config_ym_id; ?>" /><?php echo mosToolTip(_SHOW_YM2_ID); ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_MAIL, "mail-page");
			?>
			<table class="adminform">
				<tr>
					<td>
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _MAIL_METHOD ?></td>
								<td width="60%"><?php echo $lists['mailer']; ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _MAIL_FROM_ADR ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_mailfrom" size="30" value="<?php echo $row->config_mailfrom; ?>" /></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _MAIL_FROM_NAME ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_fromname" size="30" value="<?php echo $row->config_fromname; ?>" /></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SENDMAIL_PATH ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_sendmail" size="30" value="<?php echo $row->config_sendmail; ?>" /></td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table class="sub_adminform">
							<tr>
								<td width="40%"><?php echo _USE_SMTP ?></td>
								<td width="60%"><?php echo $lists['smtpauth']; ?>&nbsp;<?php echo mosToolTip(_USE_SMTP2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SMTP_USER ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_smtpuser" size="30" value="<?php echo $row->config_smtpuser; ?>" />&nbsp;<?php echo mosToolTip(_SMTP_USER2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SMTP_PASS ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_smtppass" size="30" value="<?php echo $row->config_smtppass; ?>" />&nbsp;<?php echo mosToolTip(_SMTP_PASS2); ?></td>
							</tr>
							<tr>
								<td width="40%"><?php echo _SMTP_SERVER ?></td>
								<td width="60%"><input class="textarea" type="text" name="config_smtphost" size="30" value="<?php echo $row->config_smtphost; ?>" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_CACHE, "cache-page");
			?>
			<table class="adminform" >
			<?php if (is_writeable($row->config_cachepath)) { ?>
				<tr>
					<td width="40%"><?php echo _ENABLE_CACHE ?></td>
					<td width="55%"><?php echo $lists['caching']; ?><?php echo mosToolTip(_ENABLE_CACHE2); ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _CACHE_OPTIMIZATION ?></td>
					<td width="55%"><?php echo $lists['config_cache_opt']; ?><?php echo mosToolTip(_CACHE_OPTIMIZATION2); ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _AUTOCLEAN_CACHE_DIR ?></td>
					<td width="55%"><?php echo $lists['config_clearCache']; ?><?php echo mosToolTip(_AUTOCLEAN_CACHE_DIR2); ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _CACHE_MENU ?></td>
					<td width="55%"><?php echo $lists['adm_menu_cache']; ?><?php echo mosToolTip(_CACHE_MENU2); ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<?php } else { ?>
				<tr>
					<td width="40%"><?php echo _CANNOT_CACHE ?></td>
					<td width="55%"><?php echo _CANNOT_CACHE2 ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<?php } ?>
				<tr>
					<td width="40%"><?php echo _CACHE_DIR ?></td>
					<td width="55%"><input class="textarea" type="text" name="config_cachepath" size="30" value="<?php echo $row->config_cachepath; ?>" />
						<?php if (is_writeable($row->config_cachepath)) {
						echo mosToolTip(_CACHE_DIR2);
						} else {
						echo mosWarning(_CACHE_DIR3);
						}
						?>
					</td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _CACHE_TIME ?></td>
					<td width="55%"><input class="textarea" type="text" name="config_cachetime" size="5" value="<?php echo $row->config_cachetime; ?>" /> <?php echo _SECONDS ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DB_CACHE ?></td>
					<td width="55%"><?php echo $lists['db_cache_handler']; ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DB_CACHE_TIME ?></td>
					<td width="55%"><input class="textarea" type="text" name="config_db_cache_time" size="5" value="<?php echo $row->config_db_cache_time; ?>" /> <?php echo _SECONDS ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab(_STATICTICS, "stats-page");
			?>
			<table class="adminform">
				<tr>
					<td width="40%"><?php echo _ENABLE_STATS ?></td>
					<td width="55%"><?php echo $lists['enable_stats']; ?></td>
					<td width="5%"><?php echo mostooltip(_ENABLE_STATS2); ?></td>
					</tr>
				<tr>
					<td width="40%"><?php echo _STATS_HITS_DATE ?></td>
					<td width="55%"><?php echo $lists['log_items']; ?></td>
					<td width="5%"><span class="error"><?php echo mosWarning(_STATS_HITS_DATE2); ?></span></td>
				</tr>
				<tr>
					<td width="40%"><?php echo _STATS_SEARCH_QUERIES ?></td>
					<td width="55%"><?php echo $lists['log_searches']; ?></td>
					<td width="5%">&nbsp;</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab("SEO", "seo-page");
			?>
			<table class="adminform">
				<tr>
					<td width="40%"><?php echo _SEF_URLS ?></td>
					<td width="60%"><?php echo $lists['sef'];
						echo mosWarning(_SEF_URLS2);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DYNAMIC_PAGETITLES ?></td>
					<td width="60%"><?php echo $lists['pagetitles'];
						echo mosToolTip(_DYNAMIC_PAGETITLES2);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _CLEAR_FRONTPAGE_LINK ?></td>
					<td width="60%"><?php echo $lists['com_frontpage_clear'];
						echo mosToolTip(_CLEAR_FRONTPAGE_LINK2);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _DISABLE_PATHWAY_ON_FRONT ?></td>
					<td width="60%"><?php echo $lists['config_pathway_clean'];
						echo mosToolTip(_DISABLE_PATHWAY_ON_FRONT2);
						?>
						</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _TITLE_ORDER ?></td>
					<td width="60%"><?php echo $lists['pagetitles_first'];
						echo mosToolTip(_TITLE_ORDER2);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _TITLE_SEPARATOR ?></td>
					<td width="60%"><input class="textarea" type="text" name="config_tseparator" size="5" value="<?php echo $row->config_tseparator; ?>" /><?php echo mosToolTip(_TITLE_SEPARATOR2); ?></td>
				</tr>
				<tr>
					<td width="40%"><?php echo _INDEX_PRINT_PAGE ?></td>
					<td width="60%"><?php echo $lists['index_print'];
						$tip = _INDEX_PRINT_PAGE2;
						echo mosToolTip($tip);
						?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _REDIR_FROM_NOT_WWW ?></td>
					<td width="60%"><?php echo $lists['www_redir'];
						$tip = _REDIR_FROM_NOT_WWW2;
						echo mosToolTip($tip);
						?>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab("Captcha", "captcha-page");
			?>
			<table class="adminform">
				<tr>
					<td width="40%"><?php echo _ADMIN_CAPTCHA ?></td>
					<td width="60%"><?php echo $lists['captcha'];
						echo mosToolTip(_ADMIN_CAPTCHA2); ?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _REGISTRATION_CAPTCHA ?></td>
					<td width="60%"><?php echo $lists['config_captcha_reg'];
						echo mosToolTip(_REGISTRATION_CAPTCHA2); ?>
					</td>
				</tr>
				<tr>
					<td width="40%"><?php echo _CONTACTS_CAPTCHA ?></td>
					<td width="60%"><?php echo $lists['config_captcha_cont'];
						echo mosToolTip(_CONTACTS_CAPTCHA2); ?>
					</td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->startTab("htaccess", "htaccess-page");
			?>
			<?php
			/* ToDo: Сделать возможность изменять htaccess в админке. Использовать class HTACCESS http://rmcreative.ru/ */
			$htaccess_path = $GLOBALS['mosConfig_absolute_path'] . '/.htaccess';
			if ($fp = @fopen($htaccess_path, 'r')) {
				$htaccess = @fread($fp, @filesize($htaccess_path));
				$htaccess = htmlspecialchars($htaccess);
			}
			?>
			<table class="adminform">
				<tr>
					<td><p class="red">Файл .htaccess отображается только для чтения!</p></td>
				</tr>
				<tr>
					<td><textarea style="width:98%;height:auto;" cols="70" rows="25" name="htaccess" class="inputbox"><?php echo $htaccess; ?></textarea></td>
				</tr>
			</table>
			<?php
			$tabs->endTab();
			$tabs->endPane();
			// show security setting check
			josSecurityCheck();
			?>
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			<input type="hidden" name="config_absolute_path" value="<?php echo $row->config_absolute_path; ?>" />
			<input type="hidden" name="config_live_site" value="<?php echo $row->config_live_site; ?>" />
			<input type="hidden" name="config_secret" value="<?php echo $row->config_secret; ?>" />
			<input type="hidden" name="config_auto_activ_login" value="0" />
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
			</form>
		</div>
		<?php
	}
}
?>