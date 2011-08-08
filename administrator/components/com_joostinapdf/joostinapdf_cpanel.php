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

global $joopdf_pp_Config, $cpanel, $version;
// Init vars
$joopdfversion = $joopdf_pp_Config['version'];
$componentName = $joopdf_pp_Config['componentName'];
$comp = $joopdf_pp_Config['componentOption'];
?>
<table class="adminheading" border="0">
	<tr>
		<th class="cpanel"><?php echo $componentName;?> - <?php echo _JOOPDF_PP_ADMIN;?></th>
	</tr>
</table>
<table class="thisform">
	<tr class="thisform">
		<td class="thisform">
			<table class="thisform2">
				<?php 
				for ($i = 1; $i <= count($cpanel); ++$i) {
					if ((($i -1) % 4) == 0) {
					if ($i != 1) {
				?>
	</tr>
			<?php
				}
			?>
	<tr class="thisform2">
			<?php
				}
				$url = 'index2.php?option='.$comp.'&task='.$cpanel[$i]['TASK'];
				$onClick = 'window.location=\''.$url.'\'';
				// If this is not a local task -> use given url in new window
				if ($cpanel[$i]['TASK'] == '') {
					$url = $cpanel[$i]['URL'].'" target="_blank';
					$onClick = 'window.open(\''.$cpanel[$i]['URL'].'\')';
				}
				if ($cpanel[$i]['IMG'] == '') {
				?>
		<td class="thisform2"></td>
			<?php
				} else {
			?>
		<td class="thisform2" onClick="<?php echo $onClick;?>">
			<img src="<?php echo $cpanel[$i]['IMG'];?>" alt="<?php echo $cpanel[$i]['TEXT'];?>" />
				<a href="<?php echo $url;?>" title="<?php echo $cpanel[$i]['DESCR'];?>">
					<?php echo $cpanel[$i]['TEXT'];?>
				</a>
		</td>
			<?php
				}
				}
			?>
	</tr>
			</table>
		</td>
	</tr>
</table>
<p class="joopdfcopy"><?php echo $componentName;?> v.<?php echo $joopdfversion;?></p>