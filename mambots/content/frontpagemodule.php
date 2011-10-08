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
$_MAMBOTS->registerFunction('onAfterDisplayContent', 'frontpagemodule');
function frontpagemodule($row, &$params) {
	global $option, $mosConfig_absolute_path, $database, $_MAMBOTS;
// ��������� ������ ������� � ������� � ��� ������ �� ������
	$pvars = array_keys(get_object_vars($params->_params));
	if ($params->get('popup') || in_array('moduleclass_sfx', $pvars)) {
		return;
	}
	if ($option == 'com_frontpage') {
		if (!isset($_MAMBOTS->_content_mambot_params['frontpagemodule'])) {
			$database->setQuery("SELECT params FROM #__mambots WHERE element = 'frontpagemodule' AND folder = 'content'");
			$database->loadObject($mambot);
			$_MAMBOTS->_content_mambot_params['bot_frontpagemodule'] = $mambot;
		}
		if (!isset($_MAMBOTS->_content_mambot_params['_frontpagemodule']->params->i)) {
			$_MAMBOTS->_content_mambot_params['_frontpagemodule']->params->i = 1;
		} else {
			$_MAMBOTS->_content_mambot_params['_frontpagemodule']->params->i++;
		}
		$params = new mosParameters($_MAMBOTS->_content_mambot_params['frontpagemodule']->params);
		$mod_position = $params->def('mod_position', 'banner');
		$mod_type = $params->def('mod_type', '1');
		$mod_after = $params->def('mod_after', '1');
		if (mosCountModules($mod_position) > 0 && $_MAMBOTS->_content_mambot_params['_frontpagemodule']->params->i == $mod_after) {
			echo '<div class="frontpagemodule">';
			mosLoadModules($mod_position, $mod_type);
			echo '</div>';
		}
	}
}
?>