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

class TOOLBAR_joostinapdf {

	function _EDIT_CONFIG() {
		mosMenuBar :: startTable();
		mosMenuBar :: save('saveConfig');
		mosMenuBar :: cancel('');
		mosMenuBar :: endTable();
	}

	function _CACHE_CONFIG() {
		mosMenuBar :: startTable();
		TOOLBAR_joostinapdf :: reload('cache');
		mosMenuBar :: save('saveConfig');
		mosMenuBar :: cancel('');
		mosMenuBar :: endTable();
	}

	function _CANCEL_CONFIG() {
		mosMenuBar :: startTable();
		mosMenuBar :: cancel('cpanel');
		mosMenuBar :: endTable();
	}

	/*
	function BACKONLY_MENU() {
		mosMenuBar :: startTable();
		mosMenuBar :: back('������ ���������� Joostina','index2.php');
		mosMenuBar :: endTable();
	}*/
	
	/**
	* Writes a refresh button for a given option
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	
	function reload( $task='refresh', $alt= _JOOPDF_PP_CACHE_REFRESH ) {
		$image = mosAdminMenus::ImageCheck( 'refresh.png', $mosConfig_absolute_path . '/administrator/components/com_joostinapdf/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');" title="<?php echo _JOOPDF_PP_CACHE_REFRESH?>"><?php echo $image;?><?php echo _JOOPDF_PP_CACHE_REFRESH?></a>
		<?php
	}
	
}
?>