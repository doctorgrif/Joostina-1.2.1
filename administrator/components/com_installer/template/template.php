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

// ensure user has access to this function
if(!$acl->acl_check('administration','install','users',$my->usertype,$element.'s','all')) {
	mosRedirect('index2.php',_NOT_AUTH);
}

$client		= mosGetParam($_REQUEST,'client','');
$userfile	= mosGetParam($_REQUEST,'userfile',dirname(__file__));
$userfile	= mosPathName($userfile);

HTML_installer::showInstallForm('��������� ������� <small><small>[ '.($client =='admin'?'����������':'�����').' ]</small></small>',$option,'template',$client,$userfile,'<a href="index2.php?option=com_templates&client='.$client.'">������� � ���������� ���������</a>');
?>
<table class="adminlist">
<?php
writableCell('media');
writableCell(ADMINISTRATOR_DIRECTORY.'/templates');
writableCell('templates');
writableCell('images/stories');
?>
</table>