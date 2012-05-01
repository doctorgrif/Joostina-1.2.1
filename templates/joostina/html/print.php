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
/* в $_MOS_OPTION['buffer'] содержится текст страницы */
$mainframe->addCSS($mosConfig_live_site.'/templates/css/print.css');
$mainframe->addJS($mosConfig_live_site.'/includes/js/print/print.js');
$pg_link = str_replace(array('&pop=1', '&page=0'), '', $_SERVER['REQUEST_URI']);
$pg_link = str_replace('index2.php', 'index.php', $pg_link);
?>
<div class="logo"><?php echo $mosConfig_sitename;?></div>
<div id="main"><?php echo $_MOS_OPTION['buffer'];?></div>
<div id="ju_foo"><?php echo _PRINT_PAGE_LINK;?>:
	<p class="nodisplay"><em><?php echo sefRelToAbs($pg_link);?></em></p>
	<p>&copy; <?php echo $mosConfig_sitename;?>, <?php echo date('Y');?></p>
</div>