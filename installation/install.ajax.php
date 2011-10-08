<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������������� ������������ ����
define('_VALID_MOS',1);
global $mosConfig_absolute_path;
// �������� ����� ������������
if(!file_exists('../configuration.php')) {
	die('NON config file');
}
require_once ('../configuration.php');
// ������� �������� �������� ���������
if(!deldir($mosConfig_absolute_path.'/installation/')) echo 'Error!';
	else
echo 'www.joostina.ru';
function deldir($dir) {
	$current_dir = opendir($dir);
	$old_umask = umask(0);
	while($entryname = readdir($current_dir)) {
		if($entryname != '.' and $entryname != '..') {
			if(is_dir($dir.$entryname)) {
				@deldir($dir.$entryname.'/');
			} else {
				@chmod($dir.$entryname,0777);
				@unlink($dir.$entryname);
			}
		}
	}
	@umask($old_umask);
	@closedir($current_dir);
	return @rmdir($dir);
}
?>