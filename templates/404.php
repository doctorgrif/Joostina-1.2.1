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
global $mosConfig_lang, $mosConfig_sitename, $mosConfig_live_site;
// �������� ����� �������� ����� �� ���������
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ('language/' . $mosConfig_lang . '.php');
// �������� �������������
if (!defined('_404')) {
	define('_404', '��������, ����������� �������� �� �������.');
}
if (!defined('_404_RTS')) {
	define('_404_RTS', '��������� �� ����');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>404 - �������� �� ������� - <?php echo $mosConfig_sitename; ?></title>
	<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
</head>
<body class="page_404">
	<h2><?php echo $mosConfig_sitename; ?></h2>
	<h2><?php echo _404; ?></h2>
	<h3><a href="<?php echo $mosConfig_live_site; ?>"><?php echo _404_RTS; ?></a></h3>
	<p>������ 404 - 404 Error</p>
	<p>������������� ���� �������� ����������� � �������� ��� ��� ���� ������� ��������� ����� �����.</p>
	<p>�� ������ <a href="mailto:<?php echo $mosConfig_mailfrom; ?>" title="<?php echo _CMN_EMAIL; ?>">��������</a> �� ���� �������������� ����� ��� ��������� �� <a href="<?php echo $mosConfig_live_site; ?>" title="<?php echo $mosConfig_sitename ?>">������� ��������</a>.</p>
</body>
</html>