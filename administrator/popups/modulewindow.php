<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

define("_VALID_MOS",1);

require_once ('../includes/auth.php');
include_once ($mosConfig_absolute_path.'/language/'.$mosConfig_lang.'.php');

// limit access to functionality
$option = strval(mosGetParam($_SESSION,'option',''));
$task = strval(mosGetParam($_SESSION,'task',''));
switch($option) {
	case 'com_modules':
		if($task != 'edit' && $task != 'editA' && $task != 'new') {
			echo _NOT_AUTH;
			return;
		}
		break;

	default:
		echo _NOT_AUTH;
		return;
		break;
}

$title = stripslashes(mosGetParam($_REQUEST,'title',0));
$css = mosGetParam($_REQUEST,'t','');
$row = null;

$database = new database($mosConfig_host,$mosConfig_user,$mosConfig_password,$mosConfig_db,
	$mosConfig_dbprefix);
$database->debug($mosConfig_debug);

$query = "SELECT*"."\n FROM #__modules"."\n WHERE title = ".$database->Quote($title);
$database->setQuery($query);
$database->loadObject($row);

$pat = "src=images";
$replace = "src=../../images";
$pat2 = "\\\\'";
$replace2 = "'";
$content = eregi_replace($pat,$replace,$row->content);
$content = eregi_replace($pat2,$replace2,$row->content);
$title = eregi_replace($pat2,$replace2,$row->title);

// css file handling
// check to see if template exists
if($css != '' && !is_dir($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/templates/'.$css.'/css/template_css.css')) {
	$css = 'joostfree';
} else
	if($css == '') {
		$css = 'joostfree';
	}

$iso = split('=',_ISO);
// xml prolog
echo '<?xml version="1.0" encoding="'.$iso[1].'"?'.'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Предпросмотр модуля</title>
<link rel="stylesheet" href="../../templates/<?php echo $css; ?>/css/template_css.css" type="text/css" />
<script type="text/javascript">
var content = window.opener.document.adminForm.content.value;
var title = window.opener.document.adminForm.title.value;

content = content.replace('#', '');
title = title.replace('#', '');
content = content.replace('src=images', 'src=../../images');
content = content.replace('src=images', 'src=../../images');
title = title.replace('src=images', 'src=../../images');
content = content.replace('src=images', 'src=../../images');
title = title.replace('src=\"images', 'src=\"../../images');
content = content.replace('src=\"images', 'src=\"../../images');
title = title.replace('src=\"images', 'src=\"../../images');
content = content.replace('src=\"images', 'src=\"../../images');
</script>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
</head>

<body style="background-color:#fff;">
<table align="center" width="160" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td class="moduleheading">
		<script type="text/javascript">document.write(title);</script>
	</td>
</tr>
<tr>
	<td valign="top" height="90%">
		<script type="text/javascript">document.write(content);</script>
	</td>
</tr>
<tr>
	<td align="center">
		<a href="#" onClick="window.close()"><?php echo _CLOSE;?></a>
	</td>
</tr>
</table>
</body>
</html>
