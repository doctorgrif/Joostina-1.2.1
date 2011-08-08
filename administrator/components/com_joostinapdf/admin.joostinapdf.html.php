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
global $cpanel_name;

class HTML_joostinapdf {

	function controlPanel($joopdf_pp_Config) {
		global $mosConfig_absolute_path, $mosConfig_admin_template, $mosConfig_live_site;

		$path = dirname(__FILE__) . '/joostinapdf_cpanel.php';
		if (file_exists($path)) {
			require $path;
		} else {
			echo _JOOPDF_PP_CPANEL_NO . $path . '!';
			mosLoadAdminModules('cpanel', 1);
		}
	}

	function adminHeader($option, $title, $showBackLink = true, $alertBack = false) {
		if ($alertBack) {
			$alertCode = ' onClick="return confirm(' . _JOOPDF_PP_RETURN_CONFIRM . ')"';
		} else {
			$alertCode = '';
		}
?>
<p class="sectionname">
<a href="index2.php?option=<?php echo $option?>" title="<?php echo _JOOPDF_PP_ADMIN_BACK?>"<?php echo $alertCode?>><img src="components/com_joostinapdf/images/logo.png" alt="<?php echo _JOOPDF_PP_ADMIN_BACK?>" /></a>
<?php echo $title?>
</p>
<?php
	if ($showBackLink) {
?>
<p>
<img src="images/cpanel.png" alt="<?php echo _JOOPDF_PP_ADMIN_BACK?>" />
<a href="index2.php?option=com_joostinapdf"><?php echo _JOOPDF_PP_ADMIN_BACK?></a>
</p>
<?php


		}
	}

	function getConfigIdFromTask($task) {
		global $cpanel;

		for ($i = 1; $i < count($cpanel); $i++) {
			if ($cpanel[$i]['TASK'] == $task) {
				return $i;
			}
		}
		return 0;
	}

	function showStyleConfig(& $joopdf_Config, & $lists, $task) {
		global $cpanel, $mosConfig_live_site;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="5" class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td width="150px"><strong><?php echo _JOOPDF_PP_TITLE_FORMAT?></strong></td>
			<td colspan="3">
				<input class="inputbox" type="text" name="cfg_titleHtmlFormat" size="60" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['titleHtmlFormat'])?>" /> <?php echo _JOOPDF_PP_TITLE_FORMAT_HELP?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px"><strong><?php echo _JOOPDF_PP_STANDARD_TITLE_FONT?></strong></td>
			<td><?php echo $lists['cfg_standardTitleFont']?></td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H1_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H1Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H1Format'])?>" />
			</td>
			<td>
				<strong>Space below</strong>
				<input class="inputbox" type="text" name="cfg_H1FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H1FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_STANDARD_TITLE_SIZE?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_standardTitleSize" size="4" maxlength="2" value="<?php echo $joopdf_Config['standardTitleSize']?>" />
			</td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H2_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H2Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H2Format'])?>" />
			</td>
			<td>
				<strong>Space below</strong>
				<input class="inputbox" type="text" name="cfg_H2FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H2FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_STANDARD_FONT?></strong></td>
			<td class="contentpane"><?php echo $lists['cfg_standardFont']?></td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H3_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H3Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H3Format'])?>" />
			</td>
			<td>
				<strong>Space below</strong>
				<input class="inputbox" type="text" name="cfg_H3FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H3FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_STANDARD_SIZE?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_standardSize" size="4" maxlength="2" value="<?php echo $joopdf_Config['standardSize']?>" />
			</td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H4_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H4Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H4Format'])?>" />
			</td>
			<td>
				<strong>Space below</strong>
				<input class="inputbox" type="text" name="cfg_H4FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H4FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_STANDARD_ENCODING?></strong></td>
			<td class="contentpane"><?php echo $lists['cfg_standardEncoding']?></td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H5_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H5Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H5Format'])?>" />
			</td>
			<td>
				<?php echo _JOOPDF_PP_S_B;?>
				<input class="inputbox" type="text" name="cfg_H5FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H5FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_BULLET_CHAR?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_bulletChar" size="10" maxlength="20" value="<?php echo htmlspecialchars( $joopdf_Config['bulletChar'])?>" />
			</td>
			<td width="150px"><strong><?php echo _JOOPDF_PP_H6_FORMAT?></strong></td>
			<td>
				<input class="inputbox" type="text" name="cfg_H6Format" size="50" maxlength="500" value="<?php echo htmlspecialchars( $joopdf_Config['H6Format'])?>" />
			</td>
			<td>
				<?php echo _JOOPDF_PP_S_B;?>
				<input class="inputbox" type="text" name="cfg_H6FormatSpace" size="1" maxlength="3" value="<?php echo $joopdf_Config['H6FormatSpace']?>" />
			</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_SHOW_IMAGES?></strong></td>
			<td class="contentpane"><?php echo $lists['cfg_showImages']?></td>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_IGNORE_FONTSIZE?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_ignoreFontSize" size="4" maxlength="2" value="<?php echo $joopdf_Config['ignoreFontSize']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_IMAGE_ALIGN?></strong></td>
			<td class="contentpane"><?php echo $lists['cfg_imageDefaultAlign']?></td>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_IMAGE_ALIGN_FORCED?></strong></td>
			<td class="contentpane"><?php echo $lists['cfg_imageForcedAlign']?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_SHOW_LINKS?></strong></td>
			<td class="contentpane" colspan="3"><?php echo $lists['cfg_showLinks']?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_SHOW_TABLES?></strong></td>
			<td class="contentpane" colspan="3"><?php echo $lists['cfg_showTables']?> &nbsp; <?php echo _JOOPDF_PP_SHOW_TABLES_HELP?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="5" class="title">&nbsp;</th>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
	
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_titleHtmlFormat.focus();</script>
<?php


	}
	function showTemplateConfig(& $joopdf_Config, & $lists, $task) {
		global $cpanel, $mosConfig_live_site;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="5" class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td width="200px"><strong><?php echo _JOOPDF_PP_TEMPLATE_FILE?></strong></td>
			<script type="text/javascript">
				var pdffile="";
				function openPdf() {
					if (document.adminForm.cfg_templateFile.value != 0) {
						pdfwin = window.open('<?php echo $mosConfig_live_site?>/administrator/components/com_joostinapdf/assets/' + document.adminForm.cfg_templateFile.value,'pdfwindow','width=750,height='+screen.heigth+',toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,copyhistory=no,resizable=yes');
						pdfwin.focus();
					}
				}
			</script>
			<td colspan="4"><?php echo $lists['cfg_templateFile']?> <a href="#" onclick="openPdf(); return false;"><img src="components/com_joostinapdf/images/pdf_button.png" title="<?php echo _JOOPDF_PP_PDF_PREVIEW?>" /></a> <?php echo _JOOPDF_PP_TEMPLATE_FILE_HELP?></td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_TEMPLATE_FIRSTPAGE_NO?></strong></td>
			<td width="300px" class="contentpane">
				<input class="inputbox" type="text" name="cfg_templatePageNoForFirst" size="4" maxlength="2" value="<?php echo $joopdf_Config['templatePageNoForFirst']?>" />
			</td>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_TEMPLATE_OTHERPAGE_NO?></strong></td>
			<td width="300px" class="contentpane">
				<input class="inputbox" type="text" name="cfg_templatePageNoForOther" size="4" maxlength="2" value="<?php echo $joopdf_Config['templatePageNoForOther']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_FIRST_TOP?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginTopFirstpage" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginTopFirstpage']?>" />
			</td>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_OTHER_TOP?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginTopOtherpages" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginTopOtherpages']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_FIRST_BOTTOM?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginBottomFirstpage" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginBottomFirstpage']?>" />
			</td>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_OTHER_BOTTOM?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginBottomOtherpages" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginBottomOtherpages']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_FIRST_LEFT?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginLeftFirstpage" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginLeftFirstpage']?>" />
			</td>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_OTHER_LEFT?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginLeftOtherpages" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginLeftOtherpages']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_FIRST_RIGHT?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginRightFirstpage" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginRightFirstpage']?>" />
			</td>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_MARGIN_OTHER_RIGHT?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_marginRightOtherpages" size="4" maxlength="2" value="<?php echo $joopdf_Config['marginRightOtherpages']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr cellspacing="3" colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="5" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
		<div id="overDiv" style="position:absolute;visibility:hidden;z-index:10000;"></div>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_templateFile.focus();</script>
<?php


	}

	function showHeaderFooterConfig(& $joopdf_Config, & $lists, $task) {
		global $cpanel;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
		/*
		$joopdf_pp_Config['headerXpos']=10;
		$joopdf_pp_Config['headerYpos']=8;
		$joopdf_pp_Config['headerHtmlFormat']='<div align="center">{sitename} {currentdate"d-m-Y"}</div>';
		
		$joopdf_pp_Config['footerXpos']=10;
		$joopdf_pp_Config['footerYpos']=8;
		$joopdf_pp_Config['footerHtmlFormat']='<div align="center">{url} {pageno} of {numberofpages}</div>';
		
		*/
?>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="3" class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_HEADER_FORMAT?></strong></td>
			<td width="300px" class="contentpane">
				<textarea class="inputbox" name="cfg_headerHtmlFormat" rows="2" cols="100"><?php echo htmlspecialchars( $joopdf_Config['headerHtmlFormat'])?></textarea>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_HEADER_POS_X?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_headerXpos" size="4" maxlength="3" value="<?php echo $joopdf_Config['headerXpos']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_HEADER_POS_Y?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_headerYpos" size="4" maxlength="3" value="<?php echo $joopdf_Config['headerYpos']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_FOOTER_FORMAT?></strong></td>
			<td width="300px" class="contentpane">
				<textarea class="inputbox" name="cfg_footerHtmlFormat" rows="2" cols="100"><?php echo htmlspecialchars( $joopdf_Config['footerHtmlFormat'])?></textarea>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_FOOTER_POS_X?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_footerXpos" size="4" maxlength="3" value="<?php echo $joopdf_Config['footerXpos']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_FOOTER_POS_Y?></strong></td>
			<td class="contentpane">
				<input class="inputbox" type="text" name="cfg_footerYpos" size="4" maxlength="3" value="<?php echo $joopdf_Config['footerYpos']?>" />
			</td>
			<td>&nbsp;</td>
		</tr>

		<tr cellspacing="3" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
	
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_headerHtmlFormat.focus();</script>
<?php


	}

	function showPromotionConfig(& $joopdf_Config, & $lists, $task) {
		global $cpanel, $mosConfig_live_site;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="3" class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td width="150px"><strong><?php echo _JOOPDF_PP_PROMOTION_FILE?></strong></td>
			<script type="text/javascript">
				var pdffile="";
				function openPdf() {
					if (document.adminForm.cfg_promotionFile.value != 0) {
						pdfwin = window.open('<?php echo $mosConfig_live_site?>/administrator/components/com_joostinapdf/assets/' + document.adminForm.cfg_promotionFile.value,'pdfwindow','width=750,height='+screen.heigth+',toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,copyhistory=no,resizable=yes');
						pdfwin.focus();
					}
				}
			</script>
			<td colspan="2"><?php echo $lists['cfg_promotionFile']?> <a href="#" onclick="openPdf(); return false;"><img src="components/com_joostinapdf/images/pdf_button.png" title="<?php echo _JOOPDF_PP_PDF_PREVIEW?>" /></a> <?php echo _JOOPDF_PP_PROMOTION_FILE_HELP?></td>
		</tr>
		<tr>
			<td width="150px" class="contentpane"><strong><?php echo _JOOPDF_PP_PROMOTION_PAGES?></strong></td>
			<td colspan="2" class="contentpane">
				<input class="inputbox" type="text" name="cfg_promotionPages" size="10" value="<?php echo $joopdf_Config['promotionPages']?>" /> <?php echo _JOOPDF_PP_PROMOTION_PAGES_HELP?>
			</td>
		</tr>
		<tr cellspacing="3" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
		<div id="overDiv"></div>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_promotionFile.focus();</script>
<?php


	}

	function showReplacementConfig(& $joopdf_Config, & $lists, $task, $message = '') {
		global $cpanel, $mosConfig_live_site, $mosConfig_absolute_path;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
	<strong class="red"><?php echo $message?></strong>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th class="title" colspan="3"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td width="150px"><strong><?php echo _JOOPDF_PP_REPLACEMENT?></strong></td>
			<td class="contentpane">
				<textarea wrap="off" class="inputbox" type="text" name="cfg_customContentReplacements" cols="40" rows="10"><?php echo htmlspecialchars($lists['definition'])?></textarea> 
			</td>
			<td>
				<?php echo _JOOPDF_PP_REPLACEMENT_HELP?>
			</td>
		</tr>
		<tr cellspacing="3" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
		<div id="overDiv"></div>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_customContentReplacements.focus();</script>
<?php


	}

	function showInstall(& $joopdf_Config, & $lists, $task, $message = '') {
		global $cpanel, $mosConfig_live_site, $mosConfig_absolute_path;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
	<strong class="red"><?php echo $message?></strong>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td colspan="3"><?php echo _JOOPDF_PP_INSTALL?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $mosConfig_absolute_path?>/includes/pdf.php <?php echo _JOOPDF_PP_PERMISSION?>&nbsp; 
			<img src="images/<?php 


		$filename = $mosConfig_absolute_path . '/includes/pdf.php';
		$ok = false;
		if (is_writable($filename)) {
			$ok = true;
			echo 'tick.png';
		} else {
			echo 'publish_x.png';
		}
?>"></td>
		</tr>
		</table>
		<table width="100%" class="adminlist">
		<tr>
			<td align="center"><a href="index2.php?option=<?php echo $joopdf_Config['componentOption']?>&task=do_install"<?php if (!$ok) {echo ' onclick="alert(\''._JOOPDF_PP_PERMS_NOK.'\'); return false;"';}?>><img src="images/backup.png" alt="<?php echo $joopdf_Config['componentOption']?>" /><br /><?php echo _JOOPDF_PP_DOINSTALL?></a>
			</td>
		</tr>
		</table>
		<table width="100%" class="adminlist">
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
<?php


	}

	function showRestore(& $joopdf_Config, & $lists, $task, $message = '') {
		global $cpanel, $mosConfig_live_site, $mosConfig_absolute_path;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask('restore');
?>
	<strong class="red"><?php echo $message?></strong>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th class="title"><?php echo $cpanel[$configItem]['DESCR']?></td>
		</tr>
		<tr>
			<td><?php echo _JOOPDF_PP_RESTORE?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
		<table width="100%" class="adminlist">
		<tr>
			<td>
		<table>
		<tr>
			<td><?php echo $mosConfig_absolute_path?>/includes/pdf.php <?php echo _JOOPDF_PP_PERMISSION?>
			</td>
			<td><img src="images/<?php 
		$filename = $mosConfig_absolute_path . '/includes/pdf.php';
		$ok = false;
		if (is_writable($filename)) {
			$ok = true;
			echo 'tick.png';
		} else {
			echo 'publish_x.png';
		}
			?>" />
			</td>
		</tr>
		<tr>
			<td><?php echo _JOOPDF_PP_BACKUP_EXISTS?>
			</td>
			<td>
				<img src="images/<?php 
				$backupfile = $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/backup/pdf.php';
				$bok = false;
				if (file_exists($backupfile)) {
					$bok = true;
					echo 'tick.png';
				} else {
					echo 'publish_x.png';
				}
				?>" />
			</td>
		</tr>
		</table>
				</td>
			</tr>
		</table>
		<table width="100%" class="adminlist">
		<tr>
			<td align="center">
				<a href="index2.php?option=<?php echo $joopdf_Config['componentOption']?>&task=do_restore"<?php if (!$ok) {echo ' onclick="alert(\''._JOOPDF_PP_PERMS_NOK.'\'); return false;"';}?>>
					<img src="images/dbrestore.png" alt="<?php echo $joopdf_Config['componentOption']?>" /><br /><?php echo _JOOPDF_PP_DORESTORE?>
				</a>
			</td>
		</tr>
		</table>
		<table width="100%" class="adminlist">
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3" class="title">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
<?php

	}
	function showCacheConfig(& $joopdf_Config, & $lists, $task) {
		global $cpanel, $mosConfig_live_site;

		$configItem = HTML_joostinapdf :: getConfigIdFromTask($task);
?>
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="adminForm">
		<?php echo HTML_joostinapdf :: adminHeader($joopdf_Config['componentOption'],$joopdf_Config['componentName'].': '.$cpanel[$configItem]['DESCR'], false, false)?>
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="5" class="title"><?php echo $cpanel[$configItem]['DESCR']?></th>
		</tr>
		<tr>
			<td width="200px"><strong><?php echo _JOOPDF_PP_CACHE_ENABLE?></strong></td>
			<td colspan="4"><?php echo $lists['cfg_cacheEnable']?></td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_CACHE_DIR?></strong></td>
			<td colspan="4" class="contentpane">
				<input class="inputbox" type="text" name="cfg_cacheDir" size="100" maxlength="512" value="<?php echo $joopdf_Config['cacheDir']?>" />
			</td>
			</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_CACHE_SEP?></strong></td>
			<td colspan="4" class="contentpane">
				<input class="inputbox" type="text" name="cfg_cacheNameSeparator" size="1" maxlength="1" value="<?php echo $joopdf_Config['cacheNameSeparator']?>" />
				<?php echo _JOOPDF_PP_CACHE_SEP_HELP?>
			</td>
		</tr>
		<tr>
			<td width="200px" class="contentpane"><strong><?php echo _JOOPDF_PP_CACHE_STRATEGY?></strong></td>
			<td colspan="4"	align="left" valign="top" class="contentpane">
				<input type="radio" name="cfg_cacheStrategy" id="cfg_cacheStrategy0" value="d"<?php echo ($joopdf_Config['cacheStrategy']!='d') ? 'false': ' checked="checked"'?> class="inputbox" />
				<label for="cfg_cacheStrategy0"><?php echo _JOOPDF_PP_CACHE_STRATEGY0?></label><br />
				<input type="radio" name="cfg_cacheStrategy" id="cfg_cacheStrategy1" value="m"<?php echo ($joopdf_Config['cacheStrategy']!='m') ? 'false': ' checked="checked"'?> class="inputbox" />
				<label for="cfg_cacheStrategy1"><?php echo _JOOPDF_PP_CACHE_STRATEGY1?></label><br />
				<input type="radio" name="cfg_cacheStrategy" id="cfg_cacheStrategy2" value="md"<?php echo ($joopdf_Config['cacheStrategy']!='md') ? 'false': ' checked="checked"'?>" class="inputbox" />
				<label for="cfg_cacheStrategy2"><?php echo _JOOPDF_PP_CACHE_STRATEGY2?></label><br />
				<input type="radio" name="cfg_cacheStrategy" id="cfg_cacheStrategy3" value="x"<?php echo ($joopdf_Config['cacheStrategy']!='x') ? '': ' checked="checked"'?> class="inputbox" />
				<label for="cfg_cacheStrategy3"><?php echo _JOOPDF_PP_CACHE_STRATEGY3?></label> 
				<input class="inputbox" type="text" name="cfg_cacheInvalidateTimes" size="6" maxlength="6" value="<?php echo $joopdf_Config['cacheInvalidateTimes']?>" />
			</td>
		</tr>
		<tr cellspacing="3" colspan="5">&nbsp;</td>
		</tr>
		</table>
		<input type="hidden" name="task" value="saveConfig" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
		
		<form action="index2.php?option=<?php echo $joopdf_Config['componentOption']?>" method="POST" name="cacheForm">
		<table width="100%" class="adminlist">
		<tr>
			<th colspan="4" class="title"><?php echo _JOOPDF_PP_CACHE_FILES?></th>
			<th class="title"><div align="right">
			<a class="toolbar" href="javascript:if (confirm('<?php echo _JOOPDF_PP_DEL_CONFIRM;?>')){ document.forms['cacheForm'].submit();}">
				<img src="<?php echo $mosConfig_live_site; ?>/administrator/images/delete_f2.png" alt="<?php echo _JOOPDF_PP_DEL_CACHE_REP;?>" name="repository_delete" title="<?php echo _JOOPDF_PP_DEL_CACHE_REP;?>" align="middle" /><br /><?php echo _JOOPDF_PP_DEL;?></a>
			</div>
			</th>
		</tr>
		<tr>
			<th class="title"><?php echo _JOOPDF_PP_CACHE_FILES_CONTENTID?></th>
			<th class="title"><?php echo _JOOPDF_PP_CACHE_FILES_MODIFYDATE ?></th>
			<th class="title"><?php echo _JOOPDF_PP_CACHE_FILES_RENDERDATE ?></th>
			<th class="title"><?php echo _JOOPDF_PP_CACHE_FILES_ACCESSCNT ?></th>
			<th class="title">&nbsp;</th>
		</tr>
		<?php

		$files = & $lists['files'];
		if (($files != null) && (count($files > 0))) {
			foreach ($files as $file) {
				$parts = explode($joopdf_Config['cacheNameSeparator'], $file);
				if (strlen($parts[2]) > 12) {
					$t = substr($parts[2], 0, 4) . '-' . substr($parts[2], 4, 2) . '-' . substr($parts[2], 6, 2) . ' ' . substr($parts[2], 8, 2) . ':' . substr($parts[2], 10, 2) . ':' . substr($parts[2], 12, 2);
					$parts[2] = $t;
				}
				if (strlen($parts[3]) > 12) {
					$t = substr($parts[3], 0, 4) . '-' . substr($parts[3], 4, 2) . '-' . substr($parts[3], 6, 2) . ' ' . substr($parts[3], 8, 2) . ':' . substr($parts[3], 10, 2) . ':' . substr($parts[3], 12, 2);
					$parts[3] = $t;
				}
?>		<tr onClick="location.href='<?php echo $mosConfig_live_site; ?>/index.php?option=com_content&task=view&id=<?php echo $parts[1]?>'">
			<td width="70px" class="contentpane">
				<a href="<?php echo $mosConfig_live_site;?>/index.php?option=com_content&task=view&id=<?php echo $parts[1]?>"><?php echo $parts[1]?></a>
			</td>
			<td width="200px" class="contentpane"><?php echo $parts[2]?></td>
			<td width="200px" class="contentpane"><?php echo $parts[3]?></td>
			<td width="400px" class="contentpane"><?php echo $parts[4]?></td>
			<td class="contentpane">&nbsp;</td>
			</tr>
<?php
			}
		}
?>		<tr cellspacing="3" colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="5" class="title">&nbsp;</th>
		</tr>
		</table>
		<input type="hidden" name="task" value="cacheremovefiles" />
		<input type="hidden" name="option" value="<?php echo $joopdf_Config['componentOption']?>" />
		</form>
		<div id="overDiv"></div>
		<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<!-- Set cursor on name inputfield -->
		<script type="text/javascript">document.adminForm.cfg_cacheDir.focus();</script>
<?php


	}

} //end class
?>