<?php
/**
* @JoostFREE
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
$iso = explode('=', _ISO);
$cur_file_img_path = $mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/templates/joostfree/images';
echo '<!DOCTYPE html>' . "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>' . "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $mosConfig_sitename;?> - <?php echo _JOOSTINA_CONTRL_PANEL;?></title>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO;?>" />
<?php
// favourites icon
	if (!$mosConfig_disable_favicon) {
			global $mosConfig_favicon_ie, $mosConfig_disable_favicon_ie, $mosConfig_favicon_ipad, $mosConfig_disable_favicon_ipad;
		if ($mosConfig_favicon) {
			$icon = 'favicon.png';
		}
echo '<link rel="icon" href="' . $icon . '" />' . "\n";
	}
	if (!$mosConfig_disable_favicon_ie) {
		if ($mosConfig_favicon_ie) {
			$icon_ie = 'favicon.ico';
		}
echo '<link rel="shortcut icon" href="' . $icon_ie . '" />' . "\n";
	}
	if (!$mosConfig_disable_favicon_ipad) {
		if ($mosConfig_favicon_ipad) {
			$mosConfig_favicon_ipad = 'apple-touch-icon.png';
			$icon_ipad = 'apple-touch-icon.png';
			$icon_ipad_57 = 'apple-touch-icon-57x57.png';
			$icon_ipad_72 = 'apple-touch-icon-72x72.png';
			$icon_ipad_114 = 'apple-touch-icon-114x114.png';
			$icon_ipad_144 = 'apple-touch-icon-144x144.png';
		}
echo '<link rel="apple-touch-icon" href="'.$icon_ipad.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="57x57" href="'.$icon_ipad_57.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="72x72" href="'.$icon_ipad_72.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="114x114" href="'.$icon_ipad_114.'" />' . "\n";
echo '<link rel="apple-touch-icon" sizes="144x144" href="'.$icon_ipad_144.'" />' . "\n";
	}
?>
<?php
/* ���������� fullajax */
mosCommonHTML::loadFullajax();
/* ���������� Jquery � ������� */
mosCommonHTML::loadJquery();
/** ����������� css � js ������ �������
* $mainframe->addCSS(������_����_�_�����) - ���������� css �����
* $mainframe->addJS(������_����_�_�����) - ���������� java-script �����
**/
if ($mosConfig_gz_js_css) { // ������ �� ������� css � js �������
	$mainframe->addCSS($mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/templates/joostfree/css/joostfree_css.php');
	$mainframe->addJS($mosConfig_live_site.'/includes/js/joostina.admin.php');
} else { // ������������ ����������� - �� ������ �����
	$mainframe->addCSS($mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/templates/joostfree/css/template_css.css');
	$mainframe->addJS($mosConfig_live_site.'/includes/js/joomla.javascript.full.js');
};
 if ($option=='com_jwmmxtd') {
	$mainframe->addCSS($mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/includes/js/litebox/litebox.css');
	$mainframe->addJS($mosConfig_live_site.'/'.ADMINISTRATOR_DIRECTORY.'/includes/js/litebox/litebox.js');
}
include_once ($mosConfig_absolute_path.'/editor/editor.php');
initEditor();
/** ����� ����������� js � css */
if (isset($mainframe->_head['custom'])) {
	$head = array();
	foreach ($mainframe->_head['custom'] as $html) {
	$head[] = $html;
	}
	echo implode("\n", $head) . "\n";
};
// �������� ������������ ����� - ����� ������� �������� ���� ����� ������������� ���������� ��� ��������
flush();
?>
</head>
<body>
<div class="page">
	<div id="topper">
		<div id="wrapper">
			<div class="logo">
				<a href="<?php echo $mosConfig_live_site;?>/<?php echo ADMINISTRATOR_DIRECTORY;?>/index2.php" title="<?php echo _GO_TO_MAIN_ADMIN_PAGE;?>">
					<img alt="Joostina!" src="templates/joostfree/images/logo_121.png" />
				</a>
			</div>
			<div id="joo">
				<span class="sitename"><?php echo $mosConfig_sitename;?></span>
			</div>
		</div>
		<div id="ajax_status"><?php echo _PLEASE_WAIT;?></div>
		<table class="menubar">
			<tr class="menubackgr">
				<td class="fullmenu"><?php mosLoadAdminModule('fullmenu');?></td>
				<td class="header_info"><?php mosLoadAdminModules('header',-2);?></td>
				<td class="img-editor">
					<input type="image" name="jtoggle_editor" id="jtoggle_editor" title="<?php echo _TOGGLE_WYSIWYG_EDITOR;?>" onclick="jtoggle_editor();" src="images/<?php echo (intval(mosGetParam($_SESSION, 'user_editor_off', ''))) ? 'editor_off.png' : 'editor_on.png' ?>" alt="<?php echo _DISABLE_WYSIWYG_EDITOR;?>" />
				</td>
				<td class="img-preview">
					<a href="<?php echo $mosConfig_live_site;?>/" target="_blank" class="preview" title="<?php echo _PREV_A_SITE;?>"></a>
				</td>
				<td class="jtd_nowrap">
					<a href="index2.php?option=logout" class="logoff" title="<?php echo _ADMIN_EXIT;?> <?php echo $my->username;?>"><?php echo _ADMIN_EXIT;?> <?php echo $my->username;?></a>
				</td>
			</tr>
		</table>
		</div>
		<div id="top-toolbar"><?php mosLoadAdminModule('toolbar');?></div>
		<?php mosLoadAdminModule('mosmsg');?>
		<div id="status-info"></div>
		<table class="menubar">
			<tr>
				<td class="main_body">
					<div id="main_body"><?php mosMainBody_Admin();?></div>
				</td>
			</tr>
		</table>
		<div id="footer_cleaner" class="clearfix"></div>
	</div>
<div id="footer"><div class="smallgrey"><?php echo $jostina_ru;?></div></div>
<?php if (mosLoadAdminModule('debug', 2) > 0) { ?>
<div id="debug"><?php mosLoadAdminModule('debug', 2);?></div>
<?php } ?>
<script type="text/javascript">
function jf_hideLoading() {
	document.getElementById('ajax_status').style.display='none';
};
if (window.addEventListener) {
	window.addEventListener('load', jf_hideLoading, false)
;}
else if (window.attachEvent) {
	var r=window.attachEvent("onload", jf_hideLoading)
;}
else{jf_hideLoading()
;}
</script>
</body>
</html>