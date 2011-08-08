<?php
/**
* @package Joostina
* @copyright јвторские права (C) 2008 Joostina team. ¬се права защищены.
* @license Ћицензи€ http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распростран€емое по услови€м лицензии GNU/GPL
* ƒл€ получени€ информации о используемых расширени€х и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет пр€мого доступа
defined('_VALID_MOS') or die();

global $cur_template, $mosConfig_absolute_path;

$use_ext = $params->get('use_ext', 0);

if (!defined('_QUICKICON_MODULE')) {
	define('_QUICKICON_MODULE', 1);
	if ($use_ext) {
		// использование значков отображени€ шаблона
		if (file_exists($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/quickicons.php')) {
			require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/templates/' . $cur_template . '/html/quickicons.php');
		} else {
			// использование стандартных значков отображени€
			require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/com_quickicons/quickicons.php');
		}
	} else {
		// использование стандартных значков отображени€
		require_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/components/com_quickicons/quickicons.php');
	}
}
?>