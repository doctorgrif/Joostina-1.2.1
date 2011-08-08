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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

if( !defined( 'JOOMAP_LANG' )) {
	define('JOOMAP_LANG', 1 );
	// -- General ------------------------------------------------------------------
	define('_XMAP_CFG_COM_TITLE',			'Xmap Configuration');
	define('_XMAP_CFG_OPTIONS',			'Display Options');
	define('_XMAP_CFG_CSS_CLASSNAME',		'CSS Classname');
	define('_XMAP_CFG_EXPAND_CATEGORIES',	'Expand Content Categories');
	define('_XMAP_CFG_EXPAND_SECTIONS',	'Expand Content Sections');
	define('_XMAP_CFG_SHOW_MENU_TITLES',	'Show Menu Titles');
	define('_XMAP_CFG_NUMBER_COLUMNS',	'Number of Columns');
	define('_XMAP_EX_LINK',				'Mark external links');
	define('_XMAP_CFG_CLICK_HERE', 		'Click here');
	define('_XMAP_CFG_GOOGLE_MAP',		'Google Sitemap');
	define('_XMAP_EXCLUDE_MENU',			'Exclude Menu IDs');
	define('_XMAP_TAB_DISPLAY',			'Display');
	define('_XMAP_TAB_MENUS',				'Menus');
	define('_XMAP_CFG_WRITEABLE',			'Writeable');
	define('_XMAP_CFG_UNWRITEABLE',		'Unwriteable');
	define('_XMAP_MSG_MAKE_UNWRITEABLE',	'Make unwriteable after saving');
	define('_XMAP_MSG_OVERRIDE_WRITE_PROTECTION', 'Override write protection while saving');
	define('_XMAP_GOOGLE_LINK',			'Googlelink');
	define('_XMAP_CFG_INCLUDE_LINK',		'Include link to author');

	// -- Tips ---------------------------------------------------------------------
	define('_XMAP_EXCLUDE_MENU_TIP',		'Specify menu IDs you dont want to be included in the sitemap.<br /><strong>NOTE</strong><br />Seperate IDs with comma!');

	// -- Menus --------------------------------------------------------------------
	define('_XMAP_CFG_SET_ORDER',			'Set Menu Display Order');
	define('_XMAP_CFG_MENU_SHOW',			'Show');
	define('_XMAP_CFG_MENU_REORDER',		'Reorder');
	define('_XMAP_CFG_MENU_ORDER',		'Order');
	define('_XMAP_CFG_MENU_NAME',			'Menu Name');
	define('_XMAP_CFG_DISABLE',			'Click to disable');
	define('_XMAP_CFG_ENABLE',			'Click to enable');
	define('_XMAP_SHOW',					'Show');
	define('_XMAP_NO_SHOW',				'Dont\'t show');

	// -- Toolbar ------------------------------------------------------------------
	define('_XMAP_TOOLBAR_SAVE', 			'Save');
	define('_XMAP_TOOLBAR_CANCEL', 		'Cancel');

	// -- Errors -------------------------------------------------------------------
	define('_XMAP_ERR_NO_LANG',			'Language file [ %s ] not found, loaded default language: english<br />');
	define('_XMAP_ERR_CONF_SAVE',         'ERROR: Failed to save the configuration.');
	define('_XMAP_ERR_NO_CREATE',         'ERROR: Not able to create Settings table');
	define('_XMAP_ERR_NO_DEFAULT_SET',    'ERROR: Not able to insert default Settings');
	define('_XMAP_ERR_NO_PREV_BU',        'WARNING: Not able to drop previous backup');
	define('_XMAP_ERR_NO_BACKUP',         'ERROR: Not able to create backup');
	define('_XMAP_ERR_NO_DROP_DB',        'ERROR: Not able to drop Settings table');
	define('_XMAP_ERR_NO_SETTINGS',		'ERROR: Unable to load Settings from Database: <a href="%s">Create Settings table</a>');

	// -- Config -------------------------------------------------------------------
	define('_XMAP_MSG_SET_RESTORED',      'Settings restored');
	define('_XMAP_MSG_SET_BACKEDUP',      'Settings saved');
	define('_XMAP_MSG_SET_DB_CREATED',    'Settings table created');
	define('_XMAP_MSG_SET_DEF_INSERT',    'Default Settings inserted');
	define('_XMAP_MSG_SET_DB_DROPPED','Xmap\'s tables have been saved!');
	
	// -- CSS ----------------------------------------------------------------------
	define('_XMAP_CSS',					'Xmap CSS');
	define('_XMAP_CSS_EDIT',				'Edit template'); // Edit template
	
	// -- Sitemap (Frontend) -------------------------------------------------------
	define('_XMAP_SHOW_AS_EXTERN_ALT',	'Link opens new window');
	
	// -- Added for Xmap 
	define('_XMAP_CFG_MENU_SHOW_HTML',		'Shown in the site');
	define('_XMAP_CFG_MENU_SHOW_XML',		'Show in XML Sitemap');
	define('_XMAP_CFG_MENU_PRIORITY',		'Priority');
	define('_XMAP_CFG_MENU_CHANGEFREQ',		'Change frequency');
	define('_XMAP_CFG_CHANGEFREQ_ALWAYS',		'Always');
	define('_XMAP_CFG_CHANGEFREQ_HOURLY',		'Hourly');
	define('_XMAP_CFG_CHANGEFREQ_DAILY',		'Daily');
	define('_XMAP_CFG_CHANGEFREQ_WEEKLY',		'Weekly');
	define('_XMAP_CFG_CHANGEFREQ_MONTHLY',		'Monthly');
	define('_XMAP_CFG_CHANGEFREQ_YEARLY',		'Yearly');
	define('_XMAP_CFG_CHANGEFREQ_NEVER',		'Never');

	define('_XMAP_TIT_SETTINGS_OF',			'Preferences for %s');
	define('_XMAP_TAB_SITEMAPS',			'Sitemaps');
	define('_XMAP_MSG_NO_SITEMAPS',			'There is not created sitemaps yet');
	define('_XMAP_MSG_NO_SITEMAP',			'This sitemap is unavailable');
	define('_XMAP_MSG_LOADING_SETTINGS',		'Loading preferences...');
	define('_XMAP_MSG_ERROR_LOADING_SITEMAP',		'Error. Cannot load the sitemap');
	define('_XMAP_MSG_ERROR_SAVE_PROPERTY',		'Error. Cannot save the property of the sitemap.');
	define('_XMAP_MSG_ERROR_CLEAN_CACHE',		'Error. Cannot clean the sitemap cache');
	define('_XMAP_ERROR_DELETE_DEFAULT',		'Cannot delete the default sitemap!');
	define('_XMAP_MSG_CACHE_CLEANED',			'The cache has been cleaned!');
	define('_XMAP_CHARSET',				'ISO-8859-1');
	define('_XMAP_SITEMAP_ID',				'Sitemap\'s ID');
	define('_XMAP_ADD_SITEMAP',				'Add Sitemap');
	define('_XMAP_NAME_NEW_SITEMAP',			'New Sitemap');
	define('_XMAP_DELETE_SITEMAP',			'Delete');
	define('_XMAP_SETTINGS_SITEMAP',			'Preferences');
	define('_XMAP_COPY_SITEMAP',			'Copy');
	define('_XMAP_SITEMAP_SET_DEFAULT',			'Set Default');
	define('_XMAP_EDIT_MENU',				'Options');
	define('_XMAP_DELETE_MENU',				'Delete');
	define('_XMAP_CLEAR_CACHE',				'Clean cache');
	define('_XMAP_MOVEUP_MENU',		'Up');
	define('_XMAP_MOVEDOWN_MENU',	'Down');
	define('_XMAP_ADD_MENU',		'Add menus');
	define('_XMAP_COPY_OF',		'Copy of %s');
	define('_XMAP_INFO_LAST_VISIT',	'Last visit');
	define('_XMAP_INFO_COUNT_VIEWS',	'Number of visits');
	define('_XMAP_INFO_TOTAL_LINKS',	'Number of links');
	define('_XMAP_CFG_URLS',		'Sitemap\'s URL');
	define('_XMAP_XML_LINK_TIP',	'Copy link and submit to Google and Yahoo');
	define('_XMAP_HTML_LINK_TIP',	'This is the sitemap\'s URL. You can use it to create items on your menus.');
	define('_XMAP_CFG_XML_MAP',		'XML Sitemap');
	define('_XMAP_CFG_HTML_MAP',	'HTML Sitemap');
	define('_XMAP_XML_LINK',		'Googlelink');
	define('_XMAP_CFG_XML_MAP_TIP',	'The XML file generated for the search engines');
	define('_XMAP_ADD', 'Save');
	define('_XMAP_CANCEL', 'Cancel');
	define('_XMAP_LOADING', 'Loading...');
	define('_XMAP_CACHE', 'Cache');
	define('_XMAP_USE_CACHE', 'Use Cache');
	define('_XMAP_CACHE_LIFE_TIME', 'Cache Lifetime');
	define('_XMAP_NEVER_VISITED', 'Never');
	
	// New on Xmap 1.1 beta 1
	define('_XMAP_PLUGINS','Plugins');	
	define( '_XMAP_INSTALL_3PD_WARN', 'Warning: Installing 3rd party extensions may compromise your server\'s security.' );
	define('_XMAP_INSTALL_NEW_PLUGIN', 'Install new Plugins');
	define('_XMAP_UNKNOWN_AUTHOR','Unknown author');
	define('_XMAP_PLUGIN_VERSION','Version %s');
	define('_XMAP_TAB_INSTALL_PLUGIN','Install');
	define('_XMAP_TAB_EXTENSIONS','Extensions');
	define('_XMAP_TAB_INSTALLED_EXTENSIONS','Installed Extensions');
	define('_XMAP_NO_PLUGINS_INSTALLED','No custom plugins installed');
	define('_XMAP_AUTHOR','Author');
	define('_XMAP_CONFIRM_DELETE_SITEMAP','Are you sure you want to delete this sitemap?');
	define('_XMAP_CONFIRM_UNINSTALL_PLUGIN','Are you sure you want to uninstall this plugin?');
	define('_XMAP_UNINSTALL','Uninstall');
	define('_XMAP_EXT_PUBLISHED','Published');
	define('_XMAP_EXT_UNPUBLISHED','Unpublished');
	define('_XMAP_PLUGIN_OPTIONS','Options');
	define('_XMAP_EXT_INSTALLED_MSG','The extension was installed successfully, please review their options and then publish the extension.');
	define('_XMAP_CONTINUE','Continue...');
	define('_XMAP_MSG_EXCLUDE_CSS_SITEMAP','Do not include the CSS within the Sitemap');
	define('_XMAP_MSG_EXCLUDE_XSL_SITEMAP','Use classic XML Sitemap display');

	// New on Xmap 1.1
	define('_XMAP_MSG_SELECT_FOLDER','Please select a directory');
	define('_XMAP_UPLOAD_PKG_FILE','Upload Package File');
	define('_XMAP_UPLOAD_AND_INSTALL','Upload File &amp; Install');
	define('_XMAP_INSTALL_F_DIRECTORY','Install from directory');
	define('_XMAP_INSTALL_DIRECTORY','Install directory');
	define('_XMAP_INSTALL','Install');
	define('_XMAP_WRITEABLE','Writeable');
	define('_XMAP_UNWRITEABLE','Unwriteable');
	define('_XMAP_PKG_FILE','Plugin file:');
	define('_XMAP_PLUGIN_NAME','Name');
	define('_XMAP_PLUGIN_PUBLITION','Publish');
	define('_XMAP_PLUGIN_VERSION','Version');
	define('_XMAP_PLUGIN_AUTHOR','Author');
	define('_XMAP_PLUGIN_DELETE','Delete');
	define('_XMAP_PLUGIN_DATE','Date');
	
}
