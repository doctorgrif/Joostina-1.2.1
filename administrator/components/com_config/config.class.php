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

/**
* @package Joostina
* @subpackage Config
*/
class mosConfig {
	// Site Settings
	/**
	@var int*/
	var $config_offline = null;
	/**
	@var string*/
	var $config_offline_message = null;
	/**
	@var string*/
	var $config_error_message = null;
	/**
	@var string*/
	var $config_sitename = null;
	/**
	@var string*/
	var $config_editor = 'jce';
	/**
	@var int*/
	var $config_list_limit = 30;
	/**
	@var string*/
	var $config_favicon = null;
	/**
	@var string*/
	var $config_favicon_ie = null;
	/**
	@var string*/
	var $config_favicon_ipad = null;
	/**
	@var string*/
	var $config_frontend_login = 1;

	// Debug
	/**
	@var int*/
	var $config_debug = 0;

	// Database Settings
	/**
	@var string*/
	var $config_host = null;
	/**
	@var string*/
	var $config_user = null;
	/**
	@var string*/
	var $config_password = null;
	/**
	@var string*/
	var $config_db = null;
	/**
	@var string*/
	var $config_dbprefix = null;

	// Server Settings
	/**
	@var string*/
	var $config_absolute_path = null;
	/**
	@var string*/
	var $config_live_site = null;
	/**
	@var string*/
	var $config_secret = null;
	/**
	@var int*/
	var $config_gzip = 0;
	/**
	@var int*/
	var $config_lifetime = 900;
	/**
	@var int*/
	var $config_session_life_admin = 1800;
	/**
	@var int*/
	var $config_admin_expired = '1';
	/**
	@var int*/
	var $config_session_type = 0;
	/**
	@var int*/
	var $config_error_reporting = 0;
	/**
	@var string*/
	var $config_helpurl = 'http://help.joom.ru';
	/**
	@var string*/
	var $config_fileperms = '0644';
	/**
	@var string*/
	var $config_dirperms = '0755';

	// Locale Settings
	/**
	@var string*/
	var $config_locale = null;
	/**
	@var string*/
	var $config_lang = null;
	/**
	@var int*/
	var $config_offset = null;
	/**
	@var int*/
	var $config_offset_user = null;

	// Mail Settings
	/**
	@var string*/
	var $config_mailer = null;
	/**
	@var string*/
	var $config_mailfrom = null;
	/**
	@var string*/
	var $config_fromname = null;
	/**
	@var string*/
	var $config_sendmail = '/usr/sbin/sendmail';
	/**
	@var string*/
	var $config_smtpauth = 0;
	/**
	@var string*/
	var $config_smtpuser = null;
	/**
	@var string*/
	var $config_smtppass = null;
	/**
	@var string*/
	var $config_smtphost = null;

	// Cache Settings
	/**
	@var int*/
	var $config_caching = 0;
	/**
	@var string*/
	var $config_cachepath = null;
	/**
	@var string*/
	var $config_cachetime = null;

	// User Settings
	/**
	@var int*/
	var $config_allowUserRegistration = 0;
	/**
	@var int*/
	var $config_useractivation = null;
	/**
	@var int*/
	var $config_uniquemail = null;
	/**
	@var int*/
	var $config_shownoauth = 0;
	/**
	@var int*/
	var $config_frontend_userparams = 1;

	// Meta Settings
	/**
	@var string*/
	var $config_MetaDesc = null;
	/**
	@var string*/
	var $config_MetaKeys = null;
	/**
	@var int*/
	var $config_MetaTitle = null;
	/**
	@var int*/
	var $config_MetaAuthor = null;

	// Statistics Settings
	/**
	@var int*/
	var $config_enable_log_searches = null;
	/**
	@var int*/
	var $config_enable_stats = null;
	/**
	@var int*/
	var $config_enable_log_items = null;

	// SEO ���������
	/**
	@var int*/
	var $config_sef = 0;
	/**
	@var int*/
	var $config_pagetitles = 1;

	// Content Settings
	/**
	@var int*/
	var $config_link_titles = 0;
	/**
	@var int*/
	var $config_readmore = 1;
	/**
	@var int*/
	var $config_vote = 0;
	/**
	@var int*/
	var $config_hideAuthor = 0;
	/**
	@var int*/
	var $config_hideCreateDate = 0;
	/**
	@var int*/
	var $config_hideModifyDate = 0;
	/**
	@var int*/
	var $config_hits = 1;
	/** @var int */
	var $config_hidePdf = 0;
	/**
	@var int*/
	var $config_hidePrint = 0;
	/**
	@var int*/
	var $config_hideEmail = 0;
	/**
	@var int*/
	var $config_icons = 1;
	/**
	@var int*/
	var $config_back_button = 0;
	/**
	@var int*/
	var $config_item_navigation = 0;
	/**
	@var int*/
	var $config_multilingual_support = 0;
	/**
	@var int*/
	var $config_multipage_toc = 0;
	/** ����� ������ � itemid, 0 - ������� �����*/
	var $config_itemid_compat = 0;
	// boston, ����������
	/**
	@var int ���������� ������� ������ �� ������*/
	var $config_session_front = 0;
	/**
	@var int ���������� syndicate*/
	var $config_syndicate_off = 0;
	/**
	@var int ���������� ���� Generator*/
	var $config_generator_off = 0;
	/**
	@var int ���������� �������� ������ system*/
	var $config_mmb_system_off = 0;
	/**
	@var str ������������� ������ ������� �� ���� ����*/
	var $config_one_template = '...';
	/**
	@var int ������� ������� ��������� ��������*/
	var $config_time_gen = 0;
	/**
	@var int ���������� �������� ������*/
	var $config_index_print = 0;
	/**
	@var int ����������� ���� ����������*/
	var $config_index_tag = 0;
	/**
	@var int Geotagging*/
	var $config_gtag = 0;
	/**
	@var int Geotagging latitude*/
	var $config_gtag_lat = null;
	/**
	@var int Geotagging longitude*/
	var $config_gtag_long = null;
	/**
	@var int Geotagging placename*/
	var $config_gtag_place = null;
	/**
	@var int Geotagging region*/
	var $config_gtag_reg = null;

	/**
	@var int Dublin Core*/
	var $config_dcore = 0;
	/**
	@var int Dublin Core title*/
	var $config_dcore_title = null;
	/**
	@var int Dublin Core creator*/
	var $config_dcore_creator = null;
	/**
	@var int Dublin Core subject*/
	var $config_dcore_subject = null;
	/**
	@var int Dublin Core description*/
	var $config_dcore_description = null;
	/**
	@var int Dublin Core publisher*/
	var $config_dcore_publisher = null;
	/**
	@var int Dublin Core contributor*/
	var $config_dcore_contributor = null;
	/**
	@var int Dublin Core date*/
	var $config_dcore_date = null;
	/**
	@var int Dublin Core type*/
	var $config_dcore_type = null;
	/**
	@var int Dublin Core format*/
	var $config_dcore_format = null;
	/**
	@var int Dublin Core identifier*/
	var $config_dcore_identifier = null;
	/**
	@var int Dublin Core source*/
	var $config_dcore_source = null;
	/**
	@var int Dublin Core language*/
	var $config_dcore_language = null;
	/**
	@var int Dublin Core relation*/
	var $config_dcore_relation = null;
	/**
	@var int Dublin Core coverage*/
	var $config_dcore_coverage = null;
	/**
	@var int Dublin Core rights*/
	var $config_dcore_rights = null;
	/**
	@var int GA*/
	var $config_ga = 0;
	/**
	@var int GA ID*/
	var $config_ga_id = null;
	/**
	@var int ������.�������*/
	var $config_ym = 0;
	/**
	@var int ������.������� ID*/
	var $config_ym_id = null;
	/**
	@var int ���������� ������� �� �������� �������������� � ������*/
	var $config_module_on_edit_off = 0;
	/**
	@var int ������������� ����������� ����������� ������ ���� ������*/
	var $config_optimizetables = 1;
	/**
	@var int ���������� �������� ������ content*/
	var $config_mmb_content_off = 0;
	/**
	@var int ����������� ���� ������ ����������*/
	var $config_adm_menu_cache = 0;
	/**
	@var int ������������ ��������� title*/
	var $config_pagetitles_first = 1;
	/**
	@var string ����������� "��������� �������� - �������� ����� "*/
	var $config_tseparator = ' - ';
	/**
	@int ���������� captcha*/
	var $config_captcha = 1;
	/**
	@int ������� ������ �� com_frontpage*/
	var $config_com_frontpage_clear = 1;
	/**
	@str ������ ��� ���������� ���������� ����� ����������*/
	var $config_media_dir = 'images/stories';
	/**
	@str ������ ��������� ���������*/
	var $config_joomlaxplorer_dir = null;
	/**
	@int �������������� ��������� "����������� �� �������"*/
	var $config_auto_frontpage = 0;
	/**
	@int ���������� �������������� ��������*/
	var $config_uid_news = 0;
	/**
	@int ������� ��������� �����������*/
	var $config_content_hits = 1;
	/**
	@str ������ ����*/
	var $config_form_date = '%d.%m.%Y �.';
	/**
	@str ������ ������ ���� � �������*/
	var $config_form_date_full = '%d.%m.%Y �. %H:%M';
	/**
	@int ��������� ������ �� ������� ������� MySQL*/
	var $config_dbold = 1;
	/**
	@int �� ���������� "�������" �� ������ ��������*/
	var $config_pathway_clean = 1;
	/**
	@int ���������� �������� ������ � ������ ����������*/
	var $config_adm_session_del = 0;
	/**
	@int ���������� ������ "������"*/
	var $config_disable_button_help = 0;
	/**
	@int ���������� ���������� ��������*/
	var $config_disable_checked_out = 0;
	/**
	@int ���������� favicon*/
	var $config_disable_favicon = 1;
	/**
	@int ���������� favicon*/
	var $config_disable_favicon_ie = 1;
	/**
	@int ���������� favicon*/
	var $config_disable_favicon_ipad = 1;
	/**
	@str �������� ��� rss*/
	var $config_feed_timeoffset = null;
	/**
	@int ������������ ����������� ������� �� ������*/
	var $config_front_debug = 0;
	/**
	@var int ���������� �������� ������ mainbody*/
	var $config_mmb_mainbody_off = 0;
	/**
	@var int �������������� ����������� ����� ������������� �����������*/
	var $config_auto_activ_login = 0;
	/**
	@var int ���������� SET sql_mode*/
	var $config_sql_mode_off = 0;
	/**
	@var int ���������� ������� '�����������'*/
	var $config_disable_image_tab = 0;
	/**
	@var int ��������� ��������� ����� h1*/
	var $config_title_h1 = 0;
	/**
	@var int ��������� ��������� ����� h1 ������ � ������ ������� ��������� �����������*/
	var $config_title_h1_only_view = 1;
	/**
	@var int ��������� �������� ���������� �� �����*/
	var $config_disable_date_state = 0;
	/**
	@var int ��������� �������� ������� � �����������*/
	var $config_disable_access_control = 0;
	/**
	@var int ��������� ����������� ������� �����������*/
	var $config_cache_opt = 0;
	/**
	@var int ��������� ������ css � js ������*/
	var $config_gz_js_css = 0;
	/**
	@var int captcha ��� �����������*/
	var $config_captcha_reg = 0;
	/**
	@var int captcha ��� ����� ���������*/
	var $config_captcha_cont = 0;
	/**
	@var int ���������� �������� ��� ������ html � css*/
	var $config_codepress = 0;
	/**
	@var int ���������� ����������� �������� ���� ������
	*/
	var $config_db_cache_handler = 'none';
	/**
	@var int ����� ����� ���� �������� ���� ������
	*/
	var $config_db_cache_time = 0;
	/**
	* @var int ������������� ������ ��������� ��� �������� �����������
	*/
	var $config_one_editor = 0;
	/**
	* @var int ������������� � �� WWW �������
	*/
	var $config_www_redir = 0;
	/**
	* @var int �������������� ������� ����
	*/
	var $config_clearCache = 0;
	/**
	* @var int ����� ����-���� baser
	*/
	var $config_mtage_base = 1;
	/**
	* @var int ����� ����-���� revisit � ����
	*/
	var $config_mtage_revisit = 10;
	/**
	* @var int ������������� �������� ������ �� �������� �������� �������
	*/
	var $config_custom_print = 0;
	/**
	* @var int ��������� �������������� �������
	*/
	var $config_module_multilang = 0;
	/**
	* @var int ������������� ������������ ������ ��������
	*/
	var $config_old_toolbar = 0;





	/**
	* @return array An array of the public vars in the class
	*/
	function getPublicVars() {
		$public = array();
		$vars = array_keys(get_class_vars(get_class($this)));
		sort($vars);
		foreach($vars as $v) {
			if($v{0} != '_') {
				$public[] = $v;
			}
		}
		return $public;
	}
	/**
	*	binds a named array/hash to this object
	*	@param array $hash named array
	*	@return null|string	null is operation was satisfactory, otherwise returns an error
	*/
	function bind($array,$ignore = '') {
		if(!is_array($array)) {
			$this->_error = strtolower(get_class($this)).'::'._CONSTRUCT_ERROR;
			return false;
		} else {
			return mosBindArrayToObject($array,$this,$ignore);
		}
	}
	/**
	* Writes the configuration file line for a particular variable
	* @return string
	*/
	function getVarText() {
		$txt = '';
		$vars = $this->getPublicVars();
		foreach($vars as $v) {
			$k = str_replace('config_','mosConfig_',$v);
			$txt .= "\$$k = '".addslashes($this->$v)."';\n";
		}
		return $txt;
	}

	/**
	* Binds the global configuration variables to the class properties
	*/
	function bindGlobals() {
		$vars = $this->getPublicVars();
		foreach($vars as $v) {
			$k = str_replace('config_','mosConfig_',$v);
			if(isset($GLOBALS[$k])) $this->$v = $GLOBALS[$k];
		}
		/*
		*	Maintain the value of $mosConfig_live_site even if
		*	user signs in with https://
		*/
		require ('../configuration.php');
		if($mosConfig_live_site != $this->config_live_site) $this->config_live_site = $mosConfig_live_site;
	}
}
?>
