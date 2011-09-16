<?php
/* * *
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();

/**
* ���������� � ������
* @package Joostina
*/
class joomlaVersion {

	/** @var ������ ������� */
	var $PRODUCT = 'Joomla!';
	/** @var ������ CMS */
	var $CMS = 'Joostina';
	/** @var ������ */
	var $CMS_ver = '1.2.1';
	/** @var int ����� �������� ������ */
	var $RELEASE = '1.0';
	/** @var ������ ������ ���������� */
	var $DEV_STATUS = ' RC1';
	/** @var int ��������� */
	var $DEV_LEVEL = '15';
	/** @var int ����� ������ */
	var $BUILD = '4';
	/** @var int SVN checkout */
	var $SVN_R = 'r:19';
	/** @var string ������� ��� */
	var $CODENAME = '';
	/** @var string ���� */
	var $RELDATE = '01.06.2011';
	/** @var string ����� */
	var $RELTIME = '09:41';
	/** @var string ��������� ���� */
	var $RELTZ = '+5 GMT';
	/** @var string ��� ������� */
	var $BROUSER = '��� �������: <span id="browser-info"></span>';
	/** @var string ����� ���������� ����� ������ ���������� ����� */
	var $COPYRIGHT = '&copy; <a href="http://www.joostina.ru" target="_blank" title="Joostina Team">Joostina Team</a>, 2008&ndash;2011. ��� ����� ��������.';
	/** @var string URL */
	var $URL = '<a href="http://www.joostina.ru" target="_blank" title="������� �������� � ���������� ������� Joostina CMS">Joostina!</a> - ��������� ����������� �����������, ���������������� �� �������� <a href="http://www.opensource.org/licenses/gpl-license.php" title="GNU General Public License (GPL)">GNU/GPL</a>.';
	/** @var string ����� ����-�����. ��� ��������� ������������� ����� ���������� = 1 ��� ������������ = 0: 1 ������������ �� ��������� */
	var $SITE = 1;
	/** @var string Whether site has restricted functionality mostly used for demo sites: 0 is default */
	var $RESTRICT = 0;
	/** @var string Whether site is still in development phase (disables checks for /installation folder) - should be set to 0 for package release: 0 is default */
	var $SVN = 0;
	/** @var string ������ �� ����� ��������� */
	var $SUPPORT = '���������: <a href="http://www.joostina.ru" target="_blank" title="����������� ���� CMS Joostina">www.joostina.ru</a> | <a href="http://www.joomlaportal.ru" target="_blank" title="Joomla! CMS ��-������">www.joomlaportal.ru</a> | <a href="http://www.joom.ru" target="_blank" title="������� ��� Joomla">www.joom.ru</a> | <a href="http://www.joomla.ru" target="_blank" title="���������� ������� ���������� ������ Joomla!">www.joomla.ru</a>.';

	/** @return string ������� ������ ������ */
	function getLongVersion() {
		return $this->CMS . ' ' . $this->RELEASE . '. ' . $this->CMS_ver . ' [' . $this->CODENAME . '] ' . $this->RELDATE . ' ' . $this->RELTIME . ' ' . $this->RELTZ;
	}
	/** @return string ������� ������ ������ */
	function getShortVersion() {
		return $this->RELEASE . '.' . $this->DEV_LEVEL;
	}
	/** @return string Version suffix for help files */
	function getHelpVersion() {
		if ($this->RELEASE > '1.0') {
			return '.' . str_replace('.', '', $this->RELEASE);
		} else {
			return '';
		}
	}
}

$_VERSION = new joomlaVersion();
$version = $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ;

$jostina_ru = $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' [' . $_VERSION->SVN_R . '] ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . ' ' . $_VERSION->COPYRIGHT . '<br />' . $_VERSION->SUPPORT . ' ' . $_VERSION->BROUSER;
?>