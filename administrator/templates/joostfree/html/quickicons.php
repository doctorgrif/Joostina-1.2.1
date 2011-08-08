<?php
/**
* @JoostFREE
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

global $my, $mosConfig_live_site;

function quickiconButton($row, $newWindow) {
	global $mosConfig_live_site;
	$title = $row->title ? $row->title : $row->text;
	$cur_file_img_path = $mosConfig_live_site . '/' . ADMINISTRATOR_DIRECTORY . '/templates/joostfree/images';
	?>
<span>
	<a href="<?php echo htmlentities($row->target); ?>" title="<?php echo $title; ?>" <?php echo $newWindow; ?>>
	<?php
		$icon = '<img src="' . $mosConfig_live_site . $row->icon . '" alt="' . $title . '" />';
			if ($row->display == 1) {
	?>
		<strong><?php echo $row->text; ?></strong>
	<?php
			} elseif ($row->display == 2) {
// только значок
				echo $icon;
			} else {
// значок и текст
				echo $icon . '<strong>' . $row->text . '</strong>';
		}
		?>
	</a>
</span>
	<?php
}
?>
<div class="cpicons">
	<?php
		$query = 'SELECT* FROM #__quickicons'
			. ' WHERE published = 1'
			. ' AND gid <= ' . $my->gid . ' ORDER BY ordering';
		$database->setQuery($query);
		$rows = $database->loadObjectList();
		foreach ($rows as $row) {
			$newWindow = $row->new_window ? ' target="_blank"' : '';
			quickiconButton($row, $newWindow);
		}
		unset($query, $rows);
		?>
</div>
<?php
$securitycheck = intval($params->get('securitycheck', 1));
if (!empty($securitycheck)) {
	josSecurityCheck('100%');
}
?>
<div style="display:block;clear:both;text-align:left;padding-top:10px;">
	<?php if ($my->usertype == 'Super Administrator') { ?>
	<a href="index2.php?option=com_quickicons" title="<?php echo _CHANGE_QUICK_BUTTONS; ?>">
		<img src="<?php echo $cur_file_img_path;?>/shortcut.png" alt="<?php echo _CHANGE_QUICK_BUTTONS; ?>" />
	<?php echo _CHANGE_QUICK_BUTTONS; ?>
	</a>
<?php } ?>
</div>