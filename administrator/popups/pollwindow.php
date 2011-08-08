<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

define("_VALID_MOS",1);

require_once ('../includes/auth.php');
include_once ($mosConfig_absolute_path.'/language/'.$mosConfig_lang.'.php');

$database = new database($mosConfig_host,$mosConfig_user,$mosConfig_password,$mosConfig_db,
	$mosConfig_dbprefix);
$database->debug($mosConfig_debug);

$pollid = mosGetParam($_REQUEST,'pollid',0);
$css = mosGetParam($_REQUEST,'t','');

$query = "SELECT title"."\n FROM #__polls"."\n WHERE id = ".(int)$pollid;
$database->setQuery($query);
$title = $database->loadResult();

$query = "SELECT text"."\n FROM #__poll_data"."\n WHERE pollid = ".(int)$pollid.
	"\n ORDER BY id";
$database->setQuery($query);
$options = $database->loadResultArray();

$iso = split('=',_ISO);
// xml prolog
echo '<?xml version="1.0" encoding="'.$iso[1].'"?'.'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo _POLL_PREVIEW?></title>
	<link rel="stylesheet" href="../../templates/<?php echo $css; ?>/css/template_css.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
</head>

<body>
<form action="" >
<table align="center" width="90%" cellspacing="2" cellpadding="2" border="0" >
	<tr>
		<td class="moduleheading" colspan="2"><?php echo $title; ?></td>
	</tr>
	<?php foreach($options as $text) {
	if($text != "") { ?>
		<tr>
			<td valign="top" height="30"><input type="radio" name="poll" value="<?php echo
$text; ?>" /></td>
			<td class="poll" width="100%" valign="top"><?php echo $text; ?></td>
		</tr>
		<?php }
} ?>
	<tr>
		<td valign="middle" height="50" colspan="2" align="center">
		<input type="button" name="submit" value="<?php echo _BUTTON_VOTE?>" /><br />
		<input type="button" name="result" value="<?php echo _BUTTON_RESULTS?>" />
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><a href="#" onClick="window.close()"><?php echo _CLOSE?></a></td>
	</tr>
</table>
</form>
</body>
</html>