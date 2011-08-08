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

// �������� ������������ ��������
$task	= mosGetParam($_GET,'task','publish');

// ������������ ���������� �������� task
switch($task) {
	case 'toggle_editor':
		echo x_toggle_editor();
		return;
	case 'upload':
		echo x_upload();
		return;
	default:
		echo 'error-task';
		return;
}

// ��������� / ���������� ����������� ���������
function x_toggle_editor(){
	if(!intval(mosGetParam($_SESSION,'user_editor_off',''))){
		// ��������� ��������
		$_SESSION['user_editor_off'] = 1;
		return 'editor_off.png';
	}else{
		// �������� ��������
		$_SESSION['user_editor_off'] = 0;
		return 'editor_on.png';
	}
}

function x_upload(){
?>
<form method="post" action="uploadimage.php" enctype="multipart/form-data" name="filename" id="filename">
	<table class="adminform" style="width:100%;">
		<tr>
		<th class="title">
			<?php echo _FILE_UPLOAD?>:
		</th>
		</tr>
		<tr>
			<td align="center">
				<input class="inputbox" name="userfile" type="file" /><input class="button" type="submit" value="���������" name="fileupload" />
			</td>
		</tr>
		<tr>
			<td><?php echo _MAX_SIZE?> = <?php echo ini_get('post_max_size'); ?></td>
	</tr>
	</table>
	<input type="hidden" name="directory" value="" />
	<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
</form>
<?php
}

?>