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

if(!$acl->acl_check('administration','config','users',$my->usertype)) {
	die('error-acl');
}
// ��������� ����������� ���� ������
$mosConfig_db_cache_handler = 'none';
// ����������� ������ ������������
require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/configuration.php");
require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/sajax.php");
require_once ($mosConfig_absolute_path."/".ADMINISTRATOR_DIRECTORY."/components/com_joomlapack/includes/ajaxtool.php");
?>