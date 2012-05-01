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
// ���� ������ - ������ ������� � ������������
if(!$acl->acl_check('administration','config','users',$my->usertype)) {
	mosRedirect('index2.php',_NOT_AUTH);
}

require_once ($mainframe->getPath('admin_html'));
// ��������� ����������� ���� ������
$mosConfig_db_cache_handler = 'none';

$option = 'com_joomlapack';

$act	= mosGetParam($_REQUEST,'act','default');
$task	= mosGetParam($_REQUEST,'task','');

// ����������� ������ ������������
require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/configuration.php');

switch($act) {
	// ������� ������ � ����� ������
	case 'db':
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/engine.dboption.php');
		break;

	case 'config':
		switch($task) {
			case 'apply':
				processSave();
				jpackScreens::fConfig();
				break;
			case 'save':
				processSave();
				jpackScreens::fMain();
				break;
			case 'cancel':
				jpackScreens::fMain();
				break;
			default:
				jpackScreens::fConfig();
				break;
		}
		break;
	case 'pack':
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/sajax.php');
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/ajaxtool.php');
		jpackScreens::fPack();
		break;
	case 'def':
		// ������ ��������� ������� �� ������� � �����
		require_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_joomlapack/includes/engine.exdirs.php');
		jpackScreens::fDirExclusion();
		break;
	case 'log':
		jpackScreens::fLog();
		break;
	default:
		// Application status check
		jpackScreens::fMain();
		break;
}
// ��������� ���������� ������������ � ����������
function processSave() {
	global $JPConfiguration;
	$outdir		= mosGetParam($_REQUEST,'outdir','');
	$tempdir	= mosGetParam($_REQUEST,'tempdir','');
	$sqlcompat	= mosGetParam($_REQUEST,'sqlcompat','');
	$compress	= mosGetParam($_REQUEST,'compress','');
	$tarname	= mosGetParam($_REQUEST,'tarname','');
	$sql_pack	= mosGetParam($_REQUEST,'sql_pack',1);
	$sql_pref	= mosGetParam($_REQUEST,'sql_pref',1);
	$dbAlgorithm	= mosGetParam($_REQUEST,'dbAlgorithm','smart');
	$packAlgorithm	= mosGetParam($_REQUEST,'packAlgorithm','smart');
	$logLevel		= mosGetParam($_REQUEST,'logLevel','3');
	$fileListAlgorithm	= mosGetParam($_REQUEST,'fileListAlgorithm','smart');

	$JPConfiguration->OutputDirectory	= $outdir;
	$JPConfiguration->TempDirectory		= $tempdir;
	$JPConfiguration->MySQLCompat		= $sqlcompat;
	$JPConfiguration->boolCompress		= $compress;
	$JPConfiguration->TarNameTemplate	= $tarname;
	$JPConfiguration->fileListAlgorithm	= $fileListAlgorithm;
	$JPConfiguration->dbAlgorithm		= $dbAlgorithm;
	$JPConfiguration->packAlgorithm		= $packAlgorithm;
	$JPConfiguration->logLevel			= $logLevel;
	$JPConfiguration->sql_pack			= $sql_pack;
	$JPConfiguration->sql_pref			= $sql_pref;

	$JPConfiguration->SaveConfiguration();
}
?>