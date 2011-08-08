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
/* � $_MOS_OPTION['buffer'] ���������� ����� �������� */
$mainframe->addCSS($mosConfig_live_site . '/templates/css/print.css');
$mainframe->addJS($mosConfig_live_site . '/includes/js/print/print.js');
$pg_link = str_replace(array('&pop=1','&page=0'),'',$_SERVER['REQUEST_URI']);
$pg_link = str_replace('index2.php','index.php',$pg_link);
?>
<div class="logo"><?php echo $mosConfig_sitename; ?></div>
<div id="main"><?php echo $_MOS_OPTION['buffer']; ?></div>
<div id="ju_foo"><?php echo _PRINT_PAGE_LINK; ?>:
	<p style="display:none;"><em><?php echo sefRelToAbs($pg_link); ?></em></p>
	<p>&copy; <?php echo $mosConfig_sitename; ?>, <?php echo date('Y'); ?></p>
</div>