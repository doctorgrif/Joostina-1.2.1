<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2007 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/copyleft/gpl.html GNU/GPL, �������� LICENSE.php
* Joostina! - ��������� ����������� �����������. ��� ������ ����� ���� ��������
* � ������������ � ����������� ������������ ��������� GNU, ������� ��������
* � ���������� ��������������� � ������� ���������� ������, ����������������
* �������� ����������� ������������ ��������� GNU ��� ������ �������� ���������
* �������� ��� �������� � �������� �������� �����.
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� COPYRIGHT.php.
*/

// ������ ������� �������
defined( '_VALID_MOS' ) or die( '������ ����� ����� ��������' );
/* @package xmap
 * @author: Daniel Grothe, http://www.ko-ca.com/
 * @�����������: boston http://www.joom.ru. � ������ ������� Joostina.
 */
if( !defined( 'JOOMAP_LANG' )) {
	define('JOOMAP_LANG', 1 );
	// -- General ------------------------------------------------------------------
	define('_XMAP_CFG_COM_TITLE',		'����� �����');
	define('_XMAP_CFG_OPTIONS',			'�����������');
	define('_XMAP_CFG_CSS_CLASSNAME',	'����� CSS');
	define('_XMAP_CFG_EXPAND_CATEGORIES','��������� ��������� �����������');
	define('_XMAP_CFG_EXPAND_SECTIONS',	'��������� ������� �����������');
	define('_XMAP_CFG_SHOW_MENU_TITLES','���������� �������� ����');
	define('_XMAP_CFG_NUMBER_COLUMNS',	'����� ��������');
	define('_XMAP_EX_LINK',				'�������� ������� ������');
	define('_XMAP_CFG_CLICK_HERE', 		'������� ����');
	define('_XMAP_CFG_GOOGLE_MAP',		'Google Sitemap');
	define('_XMAP_EXCLUDE_MENU',		'��������� ID ����');
	define('_XMAP_TAB_DISPLAY',			'�����������');
	define('_XMAP_TAB_MENUS',			'����');
	define('_XMAP_CFG_WRITEABLE',		'��������');
	define('_XMAP_CFG_UNWRITEABLE',		'�� ��������');
	define('_XMAP_MSG_MAKE_UNWRITEABLE','��������� �������������� ����� ����������');
	define('_XMAP_MSG_OVERRIDE_WRITE_PROTECTION', '������������ ������ ��� ������');
	define('_XMAP_GOOGLE_LINK',			'Googlelink');
	define('_XMAP_CFG_INCLUDE_LINK',	'�������� ������ �� ������');
	// -- Tips ---------------------------------------------------------------------
	define('_XMAP_EXCLUDE_MENU_TIP',	'�������������� ���� ����������� �� �����.<br /><strong>��������</strong><br />�������������� ��������� ��������!');
	// -- Menus --------------------------------------------------------------------
	define('_XMAP_CFG_SET_ORDER',		'���������� ����');
	define('_XMAP_CFG_MENU_SHOW',		'��������');
	define('_XMAP_CFG_MENU_REORDER',	'���������������');
	define('_XMAP_CFG_MENU_ORDER',		'���������');
	define('_XMAP_CFG_MENU_NAME',		'�������� ����');
	define('_XMAP_CFG_DISABLE',			'���������');
	define('_XMAP_CFG_ENABLE',			'��������');
	define('_XMAP_SHOW',				'��������');
	define('_XMAP_NO_SHOW',				'�� ����������');
	// -- Toolbar ------------------------------------------------------------------
	define('_XMAP_TOOLBAR_SAVE', 		'���������');
	define('_XMAP_TOOLBAR_CANCEL', 		'�����');
	// -- Errors -------------------------------------------------------------------
	define('_XMAP_ERR_NO_LANG',			'�������� ���� [ %s ] �� ������, ������������ ���� �� ���������<br />');
	define('_XMAP_ERR_CONF_SAVE',		 '������: ���������� ��������� ������������.');
	define('_XMAP_ERR_NO_CREATE',		 '������: ����������� ������� ��������');
	define('_XMAP_ERR_NO_DEFAULT_SET',	'������: ����������� ������� ������� ������');
	define('_XMAP_ERR_NO_PREV_BU',		'��������������: ���������� ������� �����');
	define('_XMAP_ERR_NO_BACKUP',		 '������: ���������� ������� �����');
	define('_XMAP_ERR_NO_DROP_DB',		'������: ���������� ������� ���������');
	define('_XMAP_ERR_NO_SETTINGS',		'������: ���������� ��������� ���������: <a href="%s">������� ������� ��������</a>');
	// -- Config -------------------------------------------------------------------
	define('_XMAP_MSG_SET_RESTORED',	'��������� �������������');
	define('_XMAP_MSG_SET_BACKEDUP',	'��������� ���������');
	define('_XMAP_MSG_SET_DB_CREATED',	'������� �������� �������');
	define('_XMAP_MSG_SET_DEF_INSERT',	'������� ������ �������');
	define('_XMAP_MSG_SET_DB_DROPPED',	'������� Xmap\'s ���������!');
	// -- CSS ----------------------------------------------------------------------
	define('_XMAP_CSS',		'Xmap CSS');
	define('_XMAP_CSS_EDIT','�������������� CSS ����'); // Edit template
	// -- Sitemap (Frontend) -------------------------------------------------------
	define('_XMAP_SHOW_AS_EXTERN_ALT',	'������ ��������� � ����� ����');
	
	// -- Added for Xmap 
	define('_XMAP_CFG_MENU_SHOW_HTML',		'���������� �� �����');
	define('_XMAP_CFG_MENU_SHOW_XML',		'���������� � XML �����');
	define('_XMAP_CFG_MENU_PRIORITY',		'���������');
	define('_XMAP_CFG_MENU_CHANGEFREQ',		'���������');
	define('_XMAP_CFG_CHANGEFREQ_ALWAYS',	'���������');
	define('_XMAP_CFG_CHANGEFREQ_HOURLY',	'��������');
	define('_XMAP_CFG_CHANGEFREQ_DAILY',	'���������');
	define('_XMAP_CFG_CHANGEFREQ_WEEKLY',	'�����������');
	define('_XMAP_CFG_CHANGEFREQ_MONTHLY',	'����������');
	define('_XMAP_CFG_CHANGEFREQ_YEARLY',	'��������');
	define('_XMAP_CFG_CHANGEFREQ_NEVER',	'������');
	define('_XMAP_TIT_SETTINGS_OF',			'��������� %s');
	define('_XMAP_TAB_SITEMAPS',			'�����');
	define('_XMAP_MSG_NO_SITEMAPS',			'��� ��������� ����');
	define('_XMAP_MSG_NO_SITEMAP',			'������ ����� ����������');
	define('_XMAP_MSG_LOADING_SETTINGS',	'�������� ��������');
	define('_XMAP_MSG_ERROR_LOADING_SITEMAP','������. ���������� ��������� �����');
	define('_XMAP_MSG_ERROR_SAVE_PROPERTY',	'������. ���������� ��������� ���������.');
	define('_XMAP_MSG_ERROR_CLEAN_CACHE',	'������. ���������� �������� ��� �����.');
	define('_XMAP_ERROR_DELETE_DEFAULT',	'���������� ������� �����, ������������ �� ���������!');
	define('_XMAP_MSG_CACHE_CLEANED',		'��� ����� ������!');
	define('_XMAP_CHARSET',					'windows-1251');
	define('_XMAP_SITEMAP_ID',				'������������� �����');
	define('_XMAP_ADD_SITEMAP',				'������� ����� ����� �����');
	define('_XMAP_NAME_NEW_SITEMAP',		'����� �����');
	define('_XMAP_DELETE_SITEMAP',			'�������');
	define('_XMAP_SETTINGS_SITEMAP',		'���������');
	define('_XMAP_COPY_SITEMAP',			'����������');
	define('_XMAP_SITEMAP_SET_DEFAULT',		'�� ���������');
	define('_XMAP_EDIT_MENU',				'���������');
	define('_XMAP_DELETE_MENU',				'�������');
	define('_XMAP_CLEAR_CACHE',				'�������� ���');
	define('_XMAP_MOVEUP_MENU',		'����');
	define('_XMAP_MOVEDOWN_MENU',	'����');
	define('_XMAP_ADD_MENU',		'�������� ����');
	define('_XMAP_COPY_OF',			'����� %s');
	define('_XMAP_INFO_LAST_VISIT',	'��������� ���������');
	define('_XMAP_INFO_COUNT_VIEWS','����� ���������');
	define('_XMAP_INFO_TOTAL_LINKS','����� ������');
	define('_XMAP_CFG_URLS',		'URL �����');
	define('_XMAP_XML_LINK_TIP',	'���������� ��� ������ ��� ������������� � Google � Yahoo');
	define('_XMAP_HTML_LINK_TIP',	'��� ������ ����� �����.');
	define('_XMAP_CFG_XML_MAP',		'XML  �����');
	define('_XMAP_CFG_HTML_MAP',	'HTML �����');
	define('_XMAP_XML_LINK',		'Googlelink');
	define('_XMAP_CFG_XML_MAP_TIP',	'XML ���� �������� ��� ��������� ������');
	define('_XMAP_ADD', '���������');
	define('_XMAP_CANCEL', '�������');
	define('_XMAP_LOADING', '���������');
	define('_XMAP_CACHE', '�����������');
	define('_XMAP_USE_CACHE', '������������');
	define('_XMAP_CACHE_LIFE_TIME', '����� ����� ����');
	define('_XMAP_NEVER_VISITED', '���');
	// New on Xmap 1.1 beta 1
	define('_XMAP_PLUGINS','����������');
	define( '_XMAP_INSTALL_3PD_WARN', 'Warning: Installing 3rd party extensions may compromise your server\'s security.' );
	define('_XMAP_INSTALL_NEW_PLUGIN', '���������� ����� ����������');
	define('_XMAP_UNKNOWN_AUTHOR','����� ����������');
	define('_XMAP_PLUGIN_VERSION','������ %s');
	define('_XMAP_TAB_INSTALL_PLUGIN','����������');
	define('_XMAP_TAB_EXTENSIONS','����������');
	define('_XMAP_TAB_INSTALLED_EXTENSIONS','������������� ����������');
	define('_XMAP_NO_PLUGINS_INSTALLED','���������� �� �����������');
	define('_XMAP_AUTHOR','�����');
	define('_XMAP_CONFIRM_DELETE_SITEMAP','�� ������� ��� ������ ������� ��� �����?');
	define('_XMAP_CONFIRM_UNINSTALL_PLUGIN','�� ������� ��� ������ ������� ��� ����������?');
	define('_XMAP_UNINSTALL','�������');
	define('_XMAP_EXT_PUBLISHED','������������');
	define('_XMAP_EXT_UNPUBLISHED','������');
	define('_XMAP_PLUGIN_OPTIONS','��������� �������');
	define('_XMAP_EXT_INSTALLED_MSG','���������� �����������, ���������� ��������� ��� ��������� � �����������.');
	define('_XMAP_CONTINUE','�����������');
	define('_XMAP_MSG_EXCLUDE_CSS_SITEMAP','�� ������������ CSS � �����');
	define('_XMAP_MSG_EXCLUDE_XSL_SITEMAP','������������ ������������ XML �����');
	// New on Xmap 1.1
	define('_XMAP_MSG_SELECT_FOLDER','����������, �������� �������');
	define('_XMAP_UPLOAD_PKG_FILE','�������� ������ ����������');
	define('_XMAP_UPLOAD_AND_INSTALL','��������� � ����������');
	define('_XMAP_INSTALL_F_DIRECTORY','��������� �� ��������');
	define('_XMAP_INSTALL_DIRECTORY','������� ���������');
	define('_XMAP_INSTALL','����������');
	define('_XMAP_WRITEABLE','��������');
	define('_XMAP_UNWRITEABLE','�� ��������');
	define('_XMAP_PLUGIN_NAME','�������� ����������');
	define('_XMAP_PLUGIN_PUBLITION','����������');
	define('_XMAP_PLUGIN_AUTHOR','�����');
	define('_XMAP_PLUGIN_DELETE','��������');
	define('_XMAP_PLUGIN_DATE','����');
	define('_XMAP_PKG_FILE','���� ����������:');
	// joostina edition
	define('_XMAP_INVALID_SID','������ �������������� �����');
}
?>