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
// загрузка модулей панели управления позиции icon без использования деления модулей по вкладкам
mosLoadAdminModules('icon', 0);
?>
<form action="index2.php" method="post" name="adminForm" id="adminForm">
	<table class="cpanel">
		<tr>
			<td class="cpanel1">
				<?php
// загрузка модулей панели управления позиции advert1 c использованием деления модулей по вкладкам
				mosLoadAdminModules('advert1', 0);
				?>
			</td>
			<td class="cpanel2">
				<?php
// загрузка модулей панели управления позиции advert1 c использованием деления модулей по вкладкам
				mosLoadAdminModules('advert2', 0);
				?>
			</td>
		</tr>
	</table>
</form>