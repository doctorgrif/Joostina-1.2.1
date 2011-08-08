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

function writableCell($folder) {
	echo '<tr><td class="item">'.$folder.'/</td><td align="left">';
	echo is_writable($GLOBALS['mosConfig_absolute_path'].'/'.$folder)?'<strong style="color=:green;">'._WRITEABLE.'</strong>':'<strong style="color=:red;">'._UNWRITEABLE.'</strong></td>';
	echo '</tr>';
}

/**
* @package Joostina
*/
class HTML_installer {

	function showInstallForm($title,$option,$element,$client = "",$p_startdir = "",
		$backLink = "") {
?>
	<script type="text/javascript">
		function submitbutton3(pressbutton) {
			var form = document.adminForm_dir;
			if (form.userfile.value == ""){
				alert( "<?php echo _CHOOSE_DIRECTORY_PLEASE?>" );
			} else {
				form.submit();
			}
		}
	</script>
		<table class="adminheading">
		<tr>
			<th class="install"><?php echo $title; ?></th>
			<td align="right" class="jtd_nowrap"><?php echo $backLink; ?></td>
		</tr>
		</table>
		<table width="100%">
			<tr>
				<td style="width:50%;">
					<form enctype="multipart/form-data" action="index2.php" method="post" name="filename">
					<table class="adminform">
					<tr>
						<th><?php echo _ZIP_UPLOAD_AND_INSTALL?></th>
					</tr>
					<tr>
						<td align="left">
							<label for="packagefile"><?php echo _PACKAGE_FILE?></label><br />
							<input class="textarea" name="userfile" id="packagefile" type="file" size="60"/><br />
							<input class="packagefile button" type="submit" value="<?php echo _UPLOAD_AND_INSTALL?>" />
						</td>
					</tr>
					</table>
					<input type="hidden" name="task" value="uploadfile"/>
					<input type="hidden" name="option" value="<?php echo $option; ?>"/>
					<input type="hidden" name="element" value="<?php echo $element; ?>"/>
					<input type="hidden" name="client" value="<?php echo $client; ?>"/>
					<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
					</form>
				</td>
				<td style="width:50%;">
					<form enctype="multipart/form-data" action="index2.php" method="post" name="adminForm_dir">
					<table class="adminform">
					<tr>
						<th><?php echo _INSTALL_FROM_DIR?></th>
					</tr>
					<tr>
						<td align="left">
							<label for="installationdirectory"><?php echo _INSTALLATION_DIRECTORY?></label><br />
							<input type="text" name="userfile" class="textarea" id="installationdirectory" size="60" value="<?php echo $p_startdir; ?>"/><br />
							<input type="button" class="installationdirectory button" value="Установить" onclick="submitbutton3()" />
						</td>
					</tr>
					</table>
					<input type="hidden" name="task" value="installfromdir" />
					<input type="hidden" name="option" value="<?php echo $option; ?>"/>
					<input type="hidden" name="element" value="<?php echo $element; ?>"/>
					<input type="hidden" name="client" value="<?php echo $client; ?>"/>
					<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
					</form>
				</td>
			</tr>
		</table>

		<?php
	}

	/**
	* @param string
	* @param string
	* @param string
	* @param string
	*/
	function showInstallMessage($message,$title,$url) {
		global $PHP_SELF;
?>
	<table class="adminheading">
		<tr>
			<th class="install"><?php echo $title; ?></th>
		</tr>
	</table>
	<table class="adminform">
		<tr>
			<td align="left"><strong><?php echo $message; ?></strong></td>
		</tr>
		<tr>
			<td colspan="2" align="center">[&nbsp;<a href="<?php echo $url; ?>" style="font-size: 16px; font-weight: bold;"><?php echo _CONTINUE?> ...</a>&nbsp;]</td>
		</tr>
	</table>
		<?php
	}
}
?>