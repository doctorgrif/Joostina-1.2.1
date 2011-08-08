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

/**
* @package Joostina
* @subpackage Syndicate
*/
class HTML_syndicate {

	function settings($option,&$params,$id) {
		global $mosConfig_live_site,$mosConfig_cachepath,$my;
		mosCommonHTML::loadOverlib();
?>
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="rss">
			<?php echo _NEWS_EXPORT_SETUP?>
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th>
			<?php echo _PARAMETERS?>
			</th>
		</tr>
		<tr>
			<td>
			<?php
		echo $params->render();
?>
			</td>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<td>
				<table align="center">
				<?php
		$visible = 0;
		// check to hide certain paths if not super admin
		if($my->gid == 25) {
			$visible = 1;
		}
		mosHTML::writableCell($mosConfig_cachepath,0,'<strong>'._CACHE_DIRECTORY.'</strong> ',$visible);
?>
				</table>
			</td>
		</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="name" value="<?php echo _RSS_EXPORT?>" />
		<input type="hidden" name="admin_menu_link" value="option=com_syndicate&amp;hidemainmenu=1" />
		<input type="hidden" name="admin_menu_alt" value="<?php echo _RSS_EXPORT_SETUP?>" />
		<input type="hidden" name="option" value="com_syndicate" />
		<input type="hidden" name="admin_menu_img" value="js/ThemeOffice/component.png" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}
}
?>