<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
require_once(str_replace('\\\\', '/', dirname(__FILE__)) . '/config/config.php');
require_once(str_replace('\\\\', '/', dirname(__FILE__)) . '/class/editor.class.php');
// load plugin configs
$spaw_pgdir = SpawConfig::getStaticConfigValue('SPAW_ROOT') . 'plugins/';
if (is_dir($spaw_pgdir)) {
	if ($spaw_dh = opendir($spaw_pgdir)) {
		while (($spaw_pg = readdir($spaw_dh)) != false) {
			if ($spaw_pg != '.' && $spaw_pg != '..') {
				if (is_dir($spaw_pgdir . $spaw_pg . '/config')) {
					if ($spaw_pgdh = opendir($spaw_pgdir . $spaw_pg . '/config')) {
						while (($spaw_fn = readdir($spaw_pgdh)) !== false) {
							if ($spaw_fn != '.' && $spaw_fn != '..' && !is_dir($spaw_pgdir . $spaw_pg . '/config/' . $spaw_fn))
								include($spaw_pgdir . $spaw_pg . '/config/' . $spaw_fn);
						}
						closedir($spaw_pgdh);
					}
				}
			}
		}
		closedir($spaw_dh);
	}
}
?>