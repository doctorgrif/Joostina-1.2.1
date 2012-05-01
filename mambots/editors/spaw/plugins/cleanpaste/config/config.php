<?php 
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// Clean paste config
// When to apply cleaning to the pasted content
// "selective" -  when content matches (javascript) regular expression pattern specified in the cofiguration
// "always"
// "never"
SpawConfig::setStaticConfigItem("PG_CLEANPASTE_CLEAN", 'always', SPAW_CFG_TRANSFER_JS);
// pattern to determine that content should be cleaned in "selective" mode
SpawConfig::setStaticConfigItem("PG_CLEANPASTE_PATTERN", 
	'(urn:schemas-microsoft-com:office)'
	.'|(<([^>]*)style([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)class([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)font([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)span([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)size([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)face([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<([^>]*)lang([\s]*)=([\s]*)([\"]*)mso)'
	.'|(<o:)'
	, 
	SPAW_CFG_TRANSFER_JS);
?>