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
global $option, $database;
global $mosConfig_live_site, $mainframe, $mosConfig_lang, $mosConfig_sitename, $mosConfig_offline;
require_once ('includes/joomla.php');
include_once ('language/' . $mosConfig_lang . '.php');
// получение шаблона страницы
$cur_template = @$mainframe->getTemplate();
if (!$cur_template) {
	$cur_template = 'newline';
}
// Вывод HTML
// требуется для разделения номера ISO из константы языкового файла _ISO
$iso = split('=', _ISO);
// пролог xml
echo '<?xml version="1.0" encoding="' . $iso[1] . '"?' . '>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<title><?php echo $mosConfig_sitename; ?> - <?php echo _SITE_OFFLINE; ?></title>
<link href="<?php echo $mosConfig_live_site; ?>/templates/<?php echo $cur_template; ?>/css/style.css" type="text/css" rel="stylesheet" />
</head>
<body id="warning">
	<div class="moswarning">
		<?php if ($mosConfig_offline == 1) { ?>
		<h2>
			<?php
				echo $mosConfig_sitename;
				echo ' - ';
				echo $mosConfig_offline_message;
			?>
		</h2>
			<?php } else if (@$mosSystemError) { ?>
				<h2><?php echo $mosConfig_error_message; ?></h2>
				<p><?php echo $mosSystemError; ?></p>
			<?php } else { ?>
				<h2>
					<?php echo _INSTALL_WARN; ?>
				</h2>
<?php } ?>
	</div>
</body>
</html>