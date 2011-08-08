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
* @subpackage Installer
*/
class HTML_mambot {
	/**
	* Displays the installed non-core Joostina
	* @param array An array of mambot object
	* @param strong The URL option
	*/
	function showInstalledMambots(&$rows,$option) {
		// ����������� ������� �������� ������
		mosCommonHTML::loadPrettyTable();
?>
	<table class="adminheading">
		<tr>
			<th class="install"><?php echo _INSTALLED_MAMBOTS?></th>
		</tr>
		<tr>
			<td><div class="jwarning"><?php echo _INSTALLED_COMPONENTS2?></div></td>
		</tr>
	</table>
		<?php
		if(count($rows)) { ?>
			<form action="index2.php" method="post" name="adminForm">
			<table class="adminlist" id="adminlist">
			<tr>
				<th width="20%" class="title"><?php echo _MAMBOT?></th>
				<th width="10%" class="title"><?php echo _TYPE?></th>
				<th width="10%" align="left"><?php echo _AUTHOR_BY?></th>
				<th width="5%" align="center"><?php echo _E_VERSION?></th>
				<th width="10%" align="center"><?php echo _DATE?></th>
				<th width="15%" align="left">E-mail</th>
				<th width="15%" align="left"><?php echo _COMPONENT_AUTHOR_URL?></th>
			</tr>
			<?php
			$rc = 0;
			$n = count($rows);
			for($i = 0; $i < $n; $i++) {
				$row = &$rows[$i];
?>
				<tr class="<?php echo "row$rc"; ?>">
					<td align="left">
					<input type="radio" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);">
					<span class="bold"><?php echo $row->name; ?></span>
					</td><td align="left"><?php echo $row->folder; ?></td>
					<td><?php echo @$row->author != ''?$row->author:"&nbsp;"; ?></td>
					<td align="center"><?php echo @$row->version != ''?$row->version:"&nbsp;"; ?></td>
					<td align="center"><?php echo @$row->creationdate != ''?$row->creationdate:"&nbsp;"; ?></td>
					<td><?php echo @$row->authorEmail != ''?$row->authorEmail:"&nbsp;"; ?></td>
					<td><?php echo @$row->authorUrl != ""?"<a href=\"".(substr($row->authorUrl,0,7) =='http://'?$row->authorUrl:'http://'.$row->authorUrl)."\" target=\"_blank\">$row->authorUrl</a>":"&nbsp;"; ?></td>
				</tr>
				<?php
				$rc = 1 - $rc;
			}
?>
			</table>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="option" value="com_installer" />
			<input type="hidden" name="element" value="mambot" />
			<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
			</form>
			<?php
		} else {
?>
			<?php echo _OTHER_MAMBOTS?>
			<?php
		}
	}
}
?>