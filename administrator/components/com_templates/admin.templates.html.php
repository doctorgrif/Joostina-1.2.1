<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/copyleft/gpl.html GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// ������ ������� �������
defined('_VALID_MOS') or die();

/**
* @package Joostina
* @subpackage Templates
*/
class HTML_templates {
	/**
	* @param array An array of data objects
	* @param object A page navigation object
	* @param string The option
	*/
	function showTemplates(&$rows,&$pageNav,$option,$client) {
		global $my,$mosConfig_live_site;
		if(isset($row->authorUrl) && $row->authorUrl != '') {
			$row->authorUrl = str_replace('http://','',$row->authorUrl);
		}
		mosCommonHTML::loadOverlib();
?>
<script type="text/javascript">
		<!--
		function showInfo(name, dir) {
			var pattern = /\b \b/ig;
			name = name.replace(pattern,'_');
			name = name.toLowerCase();
			if (document.adminForm.doPreview.checked) {
				var src = '<?php echo $mosConfig_live_site.($client == 'admin'?'/' . ADMINISTRATOR_DIRECTORY:''); ?>/templates/'+dir+'/template_thumbnail.png';
				var html=name;
				html = '<p><img border="1" src="'+src+'" name="imagelib" alt="<?php echo _NO_PREVIEW?>" width="206" height="145" /></p>';
				return overlib(html, CAPTION, name)
			} else {
				return false;
			}
		}
		-->
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="templates">
				<?php echo _TEMPLATES?> <small><small>[ <?php echo $client == 'admin'?_CONTROL_PANEL:_SITE; ?> ]</small></small>
			</th>
			<td align="right" class="jtd_nowrap"><?php echo _TEMPLATE_PREVIEW?></td>
			<td align="right"><input type="checkbox" name="doPreview" checked="checked"/></td>
		</tr>
		</table>
		<table class="adminlist">
		<tr>
			<th width="2%">#</th>
			<th width="2%">&nbsp;</th>
			<th class="title"><?php echo _HEADER_TITLE?></th>
<?php
		if($client == 'admin') {
?>
				<th width="10%"><?php echo _DEFAULT?></th>
<?php
		} else {
?>
				<th width="10%"><?php echo _DEFAULT?>
				</th>
				<th width="5%"><?php echo _ASSIGNED_TO?></th>
<?php
		}
?>
			<th width="20%" align="left"><?php echo _AUTHOR_BY?></th>
			<th width="5%" align="center"><?php echo _E_VERSION?></th>
			<th width="10%" align="center"><?php echo _E_CREATED?></th>
			<th width="20%" align="left">URL</th>
		</tr>
<?php
		$k = 0;
		for($i = 0,$n = count($rows); $i < $n; $i++) {
			$row = &$rows[$i];
?>
			<tr class="<?php echo 'row'.$k; ?>">
				<td>
					<?php echo $pageNav->rowNumber($i); ?>
				</td>
				<td>
<?php
					if($row->checked_out && $row->checked_out != $my->id) {
?>
					&nbsp;
<?php
			} else {
?>
					<input type="radio" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->directory; ?>" onClick="isChecked(this.checked);" />
<?php
			}
?>
				</td>
				<td align="left">
					<a href="#info" onmouseover="showInfo('<?php echo $row->name; ?>','<?php echo $row->directory; ?>')" onmouseout="return nd();"><?php echo $row->name; ?></a>
				</td>
<?php
			if($client == 'admin') {
?>
				<td align="center"><?php echo $row->published ? '<img src="images/tick.png" alt="' . _ASSIGNED_TO . '" />' : '&nbsp;'; ?></td>
<?php
			} else {
?>
				<td align="center"><?php echo $row->published ? '<img src="images/tick.png" alt="' . _ASSIGNED_TO . '" />' : '&nbsp;'; ?></td>
				<td align="center"><?php echo $row->assigned ? '<img src="images/tick.png" alt="' . _ASSIGNED_TO . '" />' : '&nbsp;'; ?></td>
<?php
			}
?>
				<td><?php echo $row->authorEmail?'<a href="mailto:' . $row->authorEmail.'">' . $row->author.'</a>':$row->author; ?></td>
				<td align="center"><?php echo $row->version; ?></td>
				<td align="center"><?php echo $row->creationdate; ?></td>
				<td><a href="<?php echo substr($row->authorUrl,0,7) == 'http://'?$row->authorUrl:'http://' . $row->authorUrl; ?>" target="_blank"><?php echo $row->authorUrl; ?></a></td>
			</tr>
			<?php
		}
?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="client" value="<?php echo $client; ?>" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* @param string Template name
	* @param string Source code
	* @param string The option
	*/
	function editTemplateSource($template,&$content,$option,$client) {
		global $mosConfig_absolute_path,$mosConfig_codepress;
		$template_path = $mosConfig_absolute_path.($client == 'admin'?'/' . ADMINISTRATOR_DIRECTORY:'') . '/templates/' . $template . '/index.php';
		/* ����������� js ����� codepress*/
		if($mosConfig_codepress) mosCommonHTML::loadCodepress();
?>
		<script type="text/javascript">
	
		function ch_apply(){
			SRAX.get('tb-apply').className='tb-load';
			<?php if($mosConfig_codepress) echo 'document.adminForm.filecontent.value=codearea.getCode();';?>
			dax({
				url: 'ajax.index.php?option=com_templates&task=source',
				id:'publ-1',
				method: 'post',
				form: 'adminForm',
				callback:
					function(resp){
						log('������� �����: ' + resp.responseText);
						mess_cool(resp.responseText);
						SRAX.get('tb-apply').className='tb-apply';
			}});
		}
		-->
		</script>
	
	<form action="index2.php" method="post" name="adminForm" id="adminForm" <?php if($mosConfig_codepress) echo 'onsubmit="document.adminForm.filecontent.value=codearea.getCode();document.adminForm.submit();"';?>>
		<table cellpadding="1" cellspacing="1" border="0" width="100%">
		<tr>
			<td width="290"><table class="adminheading"><tr><th class="templates">HTML-�������� �������</th></tr></table></td>
			<td width="220" class="jtd_nowrap">
				<span class="componentheading">index.php: <?php echo is_writable($template_path)?'<strong class="green">' . _WRITEABLE . '</strong>':'<strong class="red">' . _UNWRITEABLE . '</strong>' ?></span>
			</td>
<?php
		if(mosIsChmodable($template_path)) {
			if(is_writable($template_path)) {
?>
			<td>
				<input type="checkbox" id="disable_write" name="disable_write" value="1"/>
				<label for="disable_write"><?php echo _MAKE_UNWRITEABLE_AFTER_SAVING?></label>
			</td>
<?php
			} else {
?>
			<td>
				<input type="checkbox" id="enable_write" name="enable_write" value="1"/>
				<label for="enable_write"><?php echo _IGNORE_WRITE_PROTECTION_WHEN_SAVE?></label>
			</td>
<?php
			} // if
		} // if

?>
		</tr>
		</table>
		<table class="adminform">
			<?php if($mosConfig_codepress) {?>
			<tr><th><a href="#" onclick="codearea.toggleEditor();return false;"><?php echo _CHANGE_EDITOR?></a>: <?php echo $template_path; ?></th></tr>
			<tr>
				<td>
					<textarea style="width:100%;height:600px" cols="130" rows="35" name="codearea" id="codearea" class="codepress html inputbox"><?php echo $content; ?></textarea>
					<input type="hidden" name="filecontent" value="" />
				</td>
			</tr>
			<?php }else{;?>
			<tr><td><textarea style="width:100%;height:600px" cols="130" rows="35" name="filecontent"><?php echo $content; ?></textarea></td></tr>
			<?php };?>
		</table>
		<input type="hidden" name="template" value="<?php echo $template; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="client" value="<?php echo $client; ?>" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* @param string Template name
	* @param string Source code
	* @param string The option
	*/
	function editCSSSource($template,&$content,$option,$client) {
		global $mosConfig_absolute_path,$mosConfig_codepress;
		$css_path = $mosConfig_absolute_path.($client == 'admin'?'/' . ADMINISTRATOR_DIRECTORY:'') . '/templates/' . $template . '/css/template_css.css';
		/* ����������� js ����� codepress*/
		if($mosConfig_codepress) mosCommonHTML::loadCodepress();
?>
		<script type="text/javascript">
	
		function ch_apply(){
			SRAX.get('tb-apply').className='tb-load';
			<?php if($mosConfig_codepress) echo 'document.adminForm.filecontent.value=codearea.getCode();';?>
			dax({
				url: 'ajax.index.php?option=com_templates&task=css',
				id:'publ-1',
				method: 'post',
				form: 'adminForm',
				callback:
					function(resp){
						log('������� �����: ' + resp.responseText);
						mess_cool(resp.responseText);
						SRAX.get('tb-apply').className='tb-apply';
			}});
		}
		-->
		</script>
		
		<form action="index2.php" method="post" name="adminForm" id="adminForm" <?php if($mosConfig_codepress) echo 'onsubmit="document.adminForm.filecontent.value=codearea.getCode();document.adminForm.submit();"';?>>
		<table cellpadding="1" cellspacing="1" border="0" width="100%">
		<tr>
			<td width="280">
			<table class="adminheading"><tr><th class="templates"><?php echo _CSS_TEMPLATE_EDITOR?></th></tr></table></td>
			<td width="260" class="jtd_nowrap">
				<span class="componentheading">style.css: <?php echo is_writable($css_path)?'<strong class="green">' . _WRITEABLE . '</strong>':'<strong class="red">' . _UNWRITEABLE . '</strong>' ?></span>
			</td>
<?php
		if(mosIsChmodable($css_path)) {
			if(is_writable($css_path)) {
?>
			<td>
				<input type="checkbox" id="disable_write" name="disable_write" value="1"/>
				<label for="disable_write"><?php echo _MAKE_UNWRITEABLE_AFTER_SAVING?></label>
			</td>
<?php
			} else {
?>
			<td>
				<input type="checkbox" id="enable_write" name="enable_write" value="1"/>
				<label for="enable_write"><?php echo _IGNORE_WRITE_PROTECTION_WHEN_SAVE?></label>
			</td>
<?php
			} // if
		} // if

?>
		</tr>
		</table>
		<table class="adminform">
			<?php if($mosConfig_codepress) {?>
			<tr><th><a href="#" onclick="codearea.toggleEditor();return false;"><?php echo _CHANGE_EDITOR?></a>: <?php echo $css_path; ?></th></tr>
			<tr>
				<td>
					<textarea style="width:100%;height:600px" cols="130" rows="35" name="codearea" id="codearea" class="codepress css inputbox"><?php echo $content; ?></textarea>
					<input type="hidden" name="filecontent" value="" />
				</td>
			</tr>
			<?php }else{;?>
			<tr><td><textarea style="width:100%;height:600px" cols="130" rows="35" name="filecontent"><?php echo $content; ?></textarea></td></tr>
			<?php };?>
		</table>
		<input type="hidden" name="template" value="<?php echo $template; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="client" value="<?php echo $client; ?>" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* @param string Template name
	* @param string Menu list
	* @param string The option
	*/
	function assignTemplate($template,&$menulist,$option) {
?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminform">
		<tr>
			<th class="left" colspan="2"><?php echo $template; ?> - <?php echo _ASSGIN_TEMPLATE_TO_MENU?></th>
		</tr>
		<tr>
			<td valign="top" align="left"><?php echo _PN_PAGE?>:</td>
			<td width="90%"><?php echo $menulist; ?></td>
		</tr>
		</table>
		<input type="hidden" name="template" value="<?php echo $template; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* @param array
	* @param string The option
	*/
	function editPositions(&$positions,$option) {
		$rows = 25;
		$cols = 2;
		$n = $rows* $cols;
?>
	<form action="index2.php" method="post" name="adminForm">
	<table class="adminheading">
		<tr>
			<th class="templates"><?php echo _MODULES_POSITION?></th>
		</tr>
	</table>
	<table class="adminlist">
		<tr>
<?php
		for($c = 0; $c < $cols; $c++) {
?>
			<th width="25">#</th>
			<th align="left"><?php echo _POSITION?></th>
			<th align="left"><?php echo _CMN_DESCRIPTION?></th>
<?php
		}
?>
		</tr>
<?php
		$i = 1;
		for($r = 0; $r < $rows; $r++) {
?>
		<tr>
<?php
			for($c = 0; $c < $cols; $c++) {
?>
			<td>(<?php echo $i; ?>)</td>
			<td><input type="text" name="position[<?php echo $i; ?>]" value="<?php echo @$positions[$i -1]->position; ?>" size="10" maxlength="10" /></td>
			<td><input type="text" name="description[<?php echo $i; ?>]" value="<?php echo htmlspecialchars(@$positions[$i - 1]->description); ?>" size="50" maxlength="255" /></td>
<?php
				$i++;
			}
?>
			</tr>
<?php
		}
?>
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}
}
?>