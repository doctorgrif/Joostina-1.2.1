<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ��������� ������������� �����
define('_VALID_MOS', 1);
if (!file_exists('../configuration.php')) {
	header('Location: ../installation/index.php');
	exit();
}
require ('../globals.php');
require_once ('../configuration.php');
require_once ('../includes/definitions.php');
// ��������� ����������� �������� ���� ������ ��� ������ ����������
$mosConfig_db_cache_handler = 'none';
// SSL check - $http_host returns <live site url>:<port number if it is 443>
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://'.substr($mosConfig_live_site, 7);
}
require_once ($mosConfig_absolute_path.'/includes/joomla.php');
include_once ($mosConfig_absolute_path.'/language/'.$mosConfig_lang.'.php');
require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/includes/admin.php');
// must start the session before we create the mainframe object
session_name(md5($mosConfig_live_site));
session_start();
$option = strval(strtolower(mosGetParam($_REQUEST, 'option', '')));
$task = strval(mosGetParam($_REQUEST, 'task', ''));
// mainframe is an API workhorse, lots of 'core' interaction routines
$mainframe = new mosMainFrame($database, $option, '..', true);
// admin session handling
$my = $mainframe->initSessionAdmin($option, $task);
// initialise some common request directives
$act = strtolower(mosGetParam($_REQUEST, 'act', ''));
$section = mosGetParam($_REQUEST, 'section', '');
$mosmsg = strval(strip_tags(mosGetParam($_REQUEST, 'mosmsg', '')));
$no_html = mosGetParam($_REQUEST, 'no_html', '');
$id = intval(mosGetParam($_REQUEST, 'id', 0));
// start the html output
if ($no_html) {
	if ($path = $mainframe->getPath('admin')) {
		require $path;
	}
	exit;
}
initGzip();
?>
<?php
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO;?>" />
<title><?php echo $mosConfig_sitename;?> - Joostina</title>
<link type="text/css" rel="stylesheet" href="<?php echo $mosConfig_live_site;?>/administrator/templates/<?php echo $mainframe->getTemplate();?>/css/template_css.css" />
<?php
	$mainframe->set('loadEditor', true);
	include_once ($mosConfig_absolute_path.'/editor/editor.php');
	initEditor();
?>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/JSCookMenu.js"></script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/administrator/includes/js/ThemeOffice/theme.js"></script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/joomla.javascript.js"></script>
</head>
<body>
	<?php
	if ($mosmsg) {
		if (!get_magic_quotes_gpc()) {
			$mosmsg = addslashes($mosmsg);
		}
		echo "\n<script type=\"text/javascript\">alert('$mosmsg');</script>";
	}
// Show list of items to edit or delete or create new
	if ($path = $mainframe->getPath('admin')) {
		require $path;
	} else {
	?>
	<img src="images/error.jpg" alt="Joostina!" />
	<br />
	<?php } ?>
</body>
</html>
<?php
doGzip();
?>