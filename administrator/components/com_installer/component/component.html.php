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
* @subpackage Installer
*/
class HTML_component {
	/**
	* @param array An array of records
	* @param string The URL option
	*/
	function showInstalledComponents($rows,$option) {
		if(count($rows)) {
		// подключение скрипта чудесных таблиц
		mosCommonHTML::loadPrettyTable();
?>
	<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<table class="adminheading">
			<tr>
				<th class="install"><?php echo _INSTALLED_COMPONENTS?></th>
			</tr>
			<tr>
				<td><div class="jwarning"><?php echo _INSTALLED_COMPONENTS2?></div></td>
			</tr>
		</table>
		<table class="adminlist" id="adminlist">
			<tr>
				<th width="20%" class="title"><?php echo _COMPONENT_NAME?></th>
				<th width="5%" align="center"><?php echo _E_VERSION?></th>
				<th width="20%" class="title"><?php echo _COMPONENT_LINK?></th>
				<th width="10%" align="left"><?php echo _AUTHOR_BY?></th>
				<th width="10%" align="center"><?php echo _DATE?></th>
				<th width="15%" align="left"><?php echo _CONTACT_EMAIL?></th>
				<th width="15%" align="left"><?php echo _COMPONENT_AUTHOR_URL?></th>
			</tr>
			<?php
			$rc = 0;
			for($i = 0,$n = count($rows); $i < $n; $i++) {
				$row = &$rows[$i];
?>
				<tr class="<?php echo "row$rc"; ?>">
					<td align="left"><input type="radio" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);"><span class="bold"><?php echo $row->name; ?></span></td>
					<td align="center"><?php echo @$row->version != ""?$row->version:"&nbsp;"; ?></td>
					<td align="left"><?php echo @$row->link != ""?$row->link:"&nbsp;"; ?></td>
					<td align="left"><?php echo @$row->author != ""?$row->author:"&nbsp;"; ?></td>
					<td align="center"><?php echo @$row->creationdate != ""?$row->creationdate:"&nbsp;"; ?></td>
					<td align="center"><?php echo @$row->authorEmail != ""?$row->authorEmail:"&nbsp;"; ?></td>
					<td align="center"><?php echo @$row->authorUrl != ""?"<a href=\"".(substr($row->authorUrl,0,7) =='http://'?$row->authorUrl:'http://'.$row->authorUrl)."\" target=\"_blank\">$row->authorUrl</a>":"&nbsp;"; ?></td>
				</tr>
				<?php
				$rc = 1 - $rc;
			}
		} else {
?>
			<td class="small"><?php echo _OTHER_COMPONENTS_NOT_INSTALLED?></td>
			<?php
		}
?>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="option" value="com_installer" />
		<input type="hidden" name="element" value="component" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}
}
?>