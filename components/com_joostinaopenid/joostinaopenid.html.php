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

class JoostinaOpenID_HTML {
	function show_finish_error($option, $error) {
?>
<?php if (isset($error)) {
	print '<div class="error">' . $error . '</div>';
} ?>
	<?php }
	function show_finish_success($option, $success) { ?>
<?php if (isset($success)) {
	print '<div class="success">' . $success . '</div>';
} ?>
<?php
	}
	function show_login($option) {
	}
}
?>