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
	/**
	* @var
	* ������ �������
	*/
	var $PRODUCT	 = 'Joostina';
	/**
	* @var
	* ������ CMS
	*/
	var $CMS		 = 'Joostina';
	/**
	* @var
	* ������
	*/
	var $CMS_ver	 = '1.2.1';
	/**
	* @var int
	* ����� �������� ������
	*/
	var $RELEASE	 = '1.2';
	/** 
	* @var
	* ������ ������ ����������
	*/
	var $DEV_STATUS	 = '';
	/**
	* @var int
	* ���������
	*/
	var $DEV_LEVEL	 = '19';
	/**
	* @var int
	* ����� ������
	*/
	var $BUILD		 = '5';
	/**
	* @var string
	* ������� ���
	*/
	//var $CODENAME	 = '[Kenny McCormick]';
	var $CODENAME	 = '[<a class="codename" href="#">Kenny McCormick<span class="codeimg"><img src="../images/kenny-mccormick.png" alt="" /></span></a>]';
	/**
	* @var
	* string ����
	*/
	var $RELDATE	 = '01/05/2012';
	/**
	* @var
	* string �����
	*/
	var $RELTIME	 = '13:29';
	/**
	* @var string
	* ��������� ����
	*/
	var $RELTZ		 = '[+5 GMT]';
	/**
	* @var string
	* ����� ���������� ����� ������ ���������� �����
	*/
	var $COPYRIGHT	 = '&copy; <a href="http://www.joostina.ru" title="Joostina Team">Joostina Team</a>, 2007&ndash;2012. ��� ����� ��������.';
	/** @var string URL */
	var $URL = '<a href="http://www.joostina.ru" title="������� �������� � ���������� ������� Joostina CMS">Joostina!</a> - ��������� ����������� �����������, ���������������� �� �������� <a href="http://www.opensource.org/licenses/gpl-license.php" title="GNU General Public License (GPL)">GNU/GPL</a>.';
	/**
	* @var string
	* ����� ����-�����.
	* ��� ��������� ������������� ����� ���������� = 1 ��� ������������ = 0: 1 �� ���������
	*/
	var $SITE		 = 1;
	/**
	* @var string
	* Whether site has restricted functionality mostly used for demo sites:
	* ��� ��������� ������������� ����� = 0 ��� ������������ = 1: 0 �� ���������
	*/
	var $RESTRICT	 = 0;
	/**
	* @var string
	* ����� ���������� �����.
	* ��� ��������� ������������� ����� = 0 (1 ��������� �������� /installation): 0 �� ���������
	*/
	var $SVN		 = 0;
	/**
	* @var string
	* ������ �� ����� ���������
	*/
	var $SUPPORT	 = '���������: <a href="http://www.joostina.ru" title="����������� ���� CMS Joostina">www.joostina.ru</a> | <a href="http://www.forum.joostina.ru" title="����� Joostina CMS">www.forum.joostina.ru</a> | <a href="http://www.joomlaportal.ru" title="Joomla! CMS ��-������">www.joomlaportal.ru</a> | <a href="http://www.joom.ru" title="������� ��� Joomla">www.joom.ru</a> | <a href="http://www.joomla.ru" title="���������� ������� ���������� ������ Joomla!">www.joomla.ru</a>.';
	/**
	* @return string
	* ������� ������ ������
	*/
	function getLongVersion() {
		return $this->CMS . ' ' . $this->RELEASE . '. ' . $this->CMS_ver . ' [' . $this->CODENAME . '] ' . $this->RELDATE . ' ' . $this->RELTIME . ' ' . $this->RELTZ;
	}
	/**
	* @return string
	* ������� ������ ������
	*/
	function getShortVersion() {
		return $this->RELEASE . '.' . $this->DEV_LEVEL;
	}
	/**
	* @return string
	* Version suffix for help files
	*/
	function getHelpVersion() {
		if ($this->RELEASE > '1.0') {
			return '.' . str_replace('.', '', $this->RELEASE);
		} else {
			return '';
		}
	}
}
$_VERSION = new joomlaVersion();
	$version	 = '<p>' . $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . '</p>';
	$jostina_ru	 = '<p>' . $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . ' ' . $_VERSION->DEV_STATUS .' '. $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . ' ' . $_VERSION->COPYRIGHT . '</p><p>' . $_VERSION->SUPPORT . '</p>';
?>