<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
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