<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
global $cur_template, $mosConfig_absolute_path;
// ����� ���������, ������������� � ���������� ������
$titlelength = $params->get('title_length', 20);
$preview_height = $params->get('preview_height', 90);
$preview_width = $params->get('preview_width', 140);
$show_preview = $params->get('show_preview', 0);
// ������ ������ �� �������� �������
$template_path = $mosConfig_absolute_path . '/templates';
$templatefolder = @dir($template_path);
$darray = array();
if ($templatefolder) {
	while ($templatefile = $templatefolder->read()) {
	if ($templatefile != "." && $templatefile != ".." && $templatefile != ".svn" && $templatefile != "css" && is_dir($template_path . '/' . $templatefile)) {
		if (strlen($templatefile) > $titlelength) {
		$templatename = substr($templatefile, 0, $titlelength - 3);
		$templatename .= '�';
		} else {
		$templatename = $templatefile;
		}
		$darray[] = mosHTML::makeOption($templatefile, $templatename);
	}
	}
	$templatefolder->close();
}
sort($darray);
// ����� ����������� �������������
$onchange = '';
if ($show_preview) {
	$onchange = 'showimage()';
	?>
	<img src="<?php echo "templates/$cur_template/template_thumbnail.png"; ?>" name="preview" width="<?php echo $preview_width; ?>" height="<?php echo $preview_height; ?>" id="preview" alt="<?php echo $cur_template; ?>" />
	<script type='text/javascript'>
		//<![CDATA[
		function showimage() {
			//if (!document.images) return;
			document.images.preview.src = 'templates/' + getSelectedValue('templateform', 'jos_change_template') + '/template_thumbnail.png';
		}
		function getSelectedValue(frmName, srcListName) {
			var form = eval('document.' + frmName);
			var srcList = eval('form.' + srcListName);
			i = srcList.selectedIndex;
			if (i != null && i > -1) {
			return srcList.options[i].value;
			} else {
			return null;
			}
		}
		//]]>
	</script>
	<?php
}
?>
<form action="index.php" name="templateform" method="post">
	<div class="templatechooser">
	<div>
		<label for="templatechooser"><?php echo _CMN_SELECT; ?></label>
	</div>
		<?php echo mosHTML::selectList($darray, 'jos_change_template', 'id="mod_templatechooser_jos_change_template" class="button" onchange="' . $onchange . '"', 'value', 'text', $cur_template); ?>
		<input class="button" type="submit" id="templatechooser" value="<?php echo _CMN_SELECT_PH; ?>" />
	</div>
</form>