<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

define("_VALID_MOS", 1);

/** security check */
require ('../../includes/auth.php');
include_once ($mosConfig_absolute_path . '/language/' . $mosConfig_lang . '.php');

// limit access to functionality
$option = strval(mosGetParam($_SESSION, 'option', ''));
switch($option) {
	case 'com_banners':
		break;

	default:
		echo _NOT_AUTH;
		return;
		break;
}

$directory = 'banners';

$userfile_name = (isset($_FILES['userfile']['name']) ? $_FILES['userfile']['name'] : "");

// check to see if directory exists
if($directory != '' && !is_dir($mosConfig_absolute_path . '/images/' . $directory)) {
	mosErrorAlert(_BANNERS_DIRECTORY_DOESNOT_EXISTS, "window.close()");
}

if(isset($_FILES['userfile'])) {
	$base_Dir = "../../../images/banners/";

	if(empty($userfile_name)) {
		echo "<script>alert("._CHOOSE_BANNER_IMAGE."); document.location.href='uploadbanners.php';</script>";
	}

	$filename = split("\.", $userfile_name);

	if(eregi("[^0-9a-zA-Z_]", $filename[0])) {
		mosErrorAlert(_BAD_FILENAME);
	}

	if(file_exists($base_Dir . $userfile_name)) {
		mosErrorAlert(str_replace("#FILENAME#",$userfile_name,_FILE_ALREADY_EXISTS));
	}

	if((strcasecmp(substr($userfile_name, -4), '.gif')) && (strcasecmp(substr($userfile_name, -4), '.jpg')) && (strcasecmp(substr($userfile_name, -4), '.png')) && (strcasecmp(substr($userfile_name, -4),'.bmp')) && (strcasecmp(substr($userfile_name, -4), '.swf'))) {
		mosErrorAlert('Файл должен быть в формате gif, png, jpg, bmp, swf');
	}


	if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $base_Dir . $_FILES['userfile']['name']) || !mosChmod($base_Dir . $_FILES['userfile']['name'])) {
		mosErrorAlert(str_replace("#FILENAME#",$userfile_name,_BANNER_UPLOAD_ERROR));
		
	} else {
		mosErrorAlert(str_replace(array("#FILENAME#","#DIRNAME#"),array($userfile_name,$base_Dir),_BANNER_UPLOAD_SUCCESS), "window.close()");
		
	}

	echo $base_Dir . $_FILES['userfile']['name'];
}

$iso = split('=', _ISO);
// xml prolog
echo '<?xml version="1.0" encoding="' . $iso[1] . '"?' . '>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Загрузить файл</title>
</head>
<body>
<link rel="stylesheet" href="../../templates/joostfree/css/template_css.css" type="text/css" />
<form method="post" action="uploadbanners.php" enctype="multipart/form-data" name="filename">
	<table class="adminform">
	<tr>
		<th class="title" colspan="2"><?php echo _UPLOAD_BANNER_FILE?></th>
	</tr>
	<tr>
		<td align="center">
			<input class="inputbox" name="userfile" type="file" />
		</td>
		<td>
			<input class="button" type="submit" value="<?php echo _TASK_UPLOAD?>" name="fileupload" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php echo _MAX_SIZE?> = <?php echo ini_get('post_max_size'); ?></td>
	</tr>
	</table>
<input type="hidden" name="directory" value="banners" />
</form>
</body>
</html>
