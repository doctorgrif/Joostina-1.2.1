<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// запрет прямого доступа
defined('_VALID_MOS') or die();

if(!$acl->acl_check('administration','config','users',$my->usertype)) {
	mosRedirect('index2.php?',_NOT_AUTH);
}

require_once ($mainframe->getPath('class'));
require_once ($mainframe->getPath('admin_html'));

switch($task) {
	
	//показ формы конфигурации для компонента
	case 'component_config':
		showComponentConfig(mosGetParam($_REQUEST,'component',''));
		break;

	case 'save_component_config':
		saveComponentConfig();
		break;
		
	case 'apply':
	case 'save':
		js_menu_cache_clear();
		saveconfig($task);
		break;

	case 'cancel':
		mosRedirect('index2.php');
		break;

	default:
		showconfig($option);
		break;
}

/**
* Запись конфигурации компонента в столбец таблички #__components.
*/
function saveComponentConfig() {

	global $database;
	
	//для какого компонента все делаем
	$component = mosGetParam($_REQUEST,'component','');
	$component = preg_replace("|[^a-z_]|Umsi","",$component);
	
	//ничего не мудрил - тупо передрал из сохранялки параметров модулей
	$params = mosGetParam($_POST,'params','');
	if(is_array($params)) {
		$txt = array();
		foreach($params as $k => $v) {
			$txt[] = "$k=$v";
		}
		$save_params = mosParameters::textareaHandling($txt);
	}
	else $save_params = "";
	
	//проверяем наличие ключа для этого компонента
	$database->setQuery("SELECT id FROM #__components_params WHERE component = '{$component}'");
	$id = $database->loadResult();
	
	if ($id) {
		
		$database->setQuery("UPDATE #__components_params SET params = '$save_params' WHERE id='{$id}'");
		$database->query();
	}
	else {
	
		$database->setQuery("INSERT INTO #__components_params (component,params) VALUES ('{$component}','$save_params')");
		$database->query();
	}

	//редиректим на тот же компонент и его форму
	mosRedirect('index2.php?option=com_config&task=component_config&component='.$component,_E_ITEM_SAVED);
}

/**
* Маленькая функция, определяющая доступность файла конфига для компонента
*/
function getComponentConfigXMLPath($component) {

	global $mosConfig_absolute_path;

	//конфиг может лежать либо в админ-папке (что предпочтительно), либо во фронт папке. 
	//называться должен com_XXX.config.xml, параметры как для компонента
	$component = preg_replace("|[^a-z_]|Umsi","",$component);
	$path_to_xml1 = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/'.$component.'/'.$component.'.config.xml';
	$path_to_xml2 = $mosConfig_absolute_path.'/components/'.$component.'/'.$component.'.config.xml';
	$path = file_exists($path_to_xml1) ? $path_to_xml1 : (file_exists($path_to_xml2) ? $path_to_xml2 : false);
	
	return $path;
}
/**
* По идее должна вычитывать xml с конфигурацией и отображать юзеру форму дополнительных параметров компонента
*/
function showComponentConfig($component) {

	global $mosConfig_absolute_path,$database;
	
	$component = preg_replace("|[^a-z_]|Umsi","",$component);
	$path      = getComponentConfigXMLPath($component);
	if ($path===false) {
		mosErrorAlert("XML config file not found");
	}

	//грузим
	$database->setQuery("SELECT params FROM #__components_params WHERE component = '{$component}'");
	$load_params = $database->loadResult();
	
	$params = new mosParameters($load_params,$path,'component');

	mosCommonHTML::loadOverlib();
	//заголовок
	echo '<table class="adminheading">
			<tr>
			<th class="modules"><a href="index2.php?option=com_config&hidemainmenu=1">' . _GLOBAL_CONFIG . '</a> :: ' . $component . '</th>
			</tr>
			</table>';
	//вывод формы
	echo '<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<table cellspacing="0" cellpadding="0" width="100%">
		<tr valign="top">
			<td width="60%">
				<table class="adminform">
				<tr>
					<td>';
	echo $params->render();
	//низ формы
	echo "			</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		
		<input type='hidden' name='option' value='com_config' />
		<input type='hidden' name='task' value='save_component_config' />
		<input type='hidden' name='component' value='".$component."' />
		</form>";
}

/**
* Show the configuration edit form
* @param string The URL option
*/
function showconfig($option) {
	global $database,$mosConfig_absolute_path,$mosConfig_editor,$mosConfig_db_cache_handler_orig;

	$row = new mosConfig();
	$row->bindGlobals();

	// compile list of the languages
	$langs = array();
	$menuitems = array();
	$lists = array();

	// PRE-PROCESS SOME LISTS

	// -- Языки --
	if($handle = opendir($mosConfig_absolute_path.'/language/')) {
		$i = 0;
		while(false !== ($file = readdir($handle))) {
			if(!strcasecmp(substr($file,-4),".php") && $file != "." && $file != ".." &&
				strcasecmp(substr($file,-11),".ignore.php")) {
				$langs[]= mosHTML::makeOption(substr($file,0,-4));
			}
		}
	}

	// сортировка списка языков
	sort($langs);
	reset($langs);

	// -- Редакторы --
	$query = "SELECT element AS value, name AS text"
			."\n FROM #__mambots"
			."\n WHERE folder = 'editors'"
			."\n AND published = 1"
			."\n ORDER BY ordering, name";
	$database->setQuery($query);
	$edits = $database->loadObjectList();

	// -- Показать/Скрыть --
	$show_hide = array(mosHTML::makeOption(1,'Скрыть'),mosHTML::makeOption(0,'Показать'),);
	$show_hide_r = array(mosHTML::makeOption(0,'Скрыть'),mosHTML::makeOption(1,'Показать'),);

	// -- пункты меню --
	$query = "SELECT id AS value, name AS text FROM #__menu"
			."\n WHERE ( type='content_section' OR type='components' OR type='content_typed' )"
			."\n AND published = 1"
			."\n AND access = 0"
			."\n ORDER BY name";
	$database->setQuery($query);
	$menuitems = array_merge($menuitems,$database->loadObjectList());

	// НАСТРОЙКИ САЙТА
	$lists['offline']= mosHTML::yesnoRadioList('config_offline','class="inputbox"',$row->config_offline);

	if(!$row->config_editor) {
		$row->config_editor = '';
	}
	// build the html select list
	$lists['editor']= mosHTML::selectList($edits,'config_editor','class="inputbox" size="1"','value','text',$row->config_editor);

	$listLimit = array(
		mosHTML::makeOption(5,5),
		mosHTML::makeOption(10,10),
		mosHTML::makeOption(15,15),
		mosHTML::makeOption(20,20),
		mosHTML::makeOption(25,25),
		mosHTML::makeOption(30,30),
		mosHTML::makeOption(50,50),
		mosHTML::makeOption(100,100),
		mosHTML::makeOption(150,150),
	);

	$lists['list_limit']= mosHTML::selectList($listLimit,'config_list_limit','class="inputbox" size="1"','value','text',($row->config_list_limit?$row->config_list_limit:50));

	$lists['frontend_login']= mosHTML::yesnoRadioList('config_frontend_login','class="inputbox"',$row->config_frontend_login);

	// boston, отключение ведения сессий подсчета числа пользователей на сайте
	$lists['session_front']= mosHTML::yesnoRadioList('config_session_front','class="inputbox"',$row->config_session_front);
	// boston, отключение syndicate
	$lists['syndicate_off']= mosHTML::yesnoRadioList('config_syndicate_off','class="inputbox"',$row->config_syndicate_off);
	// boston, отключение тега Generator
	$lists['generator_off']= mosHTML::yesnoRadioList('config_generator_off','class="inputbox"',$row->config_generator_off);
	// boston, отключение мамботов группы system
	$lists['mmb_system_off']= mosHTML::yesnoRadioList('config_mmb_system_off','class="inputbox"',$row->config_mmb_system_off);
	// boston, получаем список шаблонов. Код получен из модуля выбора шаблона
	$titlelength = 20;
	$template_path = "$mosConfig_absolute_path/templates";
	$templatefolder = @dir($template_path);
	$darray = array();
	$darray[]= mosHTML::makeOption('...',_O_OTHER); // параметр по умолчанию - позволяет использовать стандартный способ определения шаблона
	if($templatefolder) {
		while($templatefile = $templatefolder->read()) {
			if($templatefile != "." && $templatefile != ".." && $templatefile != ".svn" && $templatefile !=
				"css" && is_dir("$template_path/$templatefile")) {
				if(strlen($templatefile) > $titlelength) {
					$templatename = substr($templatefile,0,$titlelength - 3);
					$templatename .= "...";
				} else {
					$templatename = $templatefile;
				}
				$darray[]= mosHTML::makeOption($templatefile,$templatename);
			}
		}
		$templatefolder->close();
	}
	sort($darray);
	$lists['one_template']= mosHTML::selectList($darray,'config_one_template','class="inputbox" ','value','text',$row->config_one_template);
	// boston, время генерации страницы
	$lists['time_gen']= mosHTML::yesnoRadioList('config_time_gen','class="inputbox"',$row->config_time_gen);
	//boston, индексация страницы печати
	$lists['index_print']= mosHTML::yesnoRadioList('config_index_print','class="inputbox"',$row->config_index_print);
	// boston, расширенные теги индексации
	$lists['index_tag']= mosHTML::yesnoRadioList('config_index_tag','class="inputbox"',$row->config_index_tag);
	// doctorgrif: Geotagging
	$lists['gtag']= mosHTML::yesnoRadioList('config_gtag','class="inputbox"',$row->config_gtag);
	// doctorgrif: Dublin Core
	$lists['dcore']= mosHTML::yesnoRadioList('config_dcore','class="inputbox"',$row->config_dcore);
	// doctorgrif: Google Analitics
	$lists['ga']= mosHTML::yesnoRadioList('config_ga','class="inputbox"',$row->config_ga);
	// doctorgrif: Яндекс.Метрика
	$lists['ym']= mosHTML::yesnoRadioList('config_ym','class="inputbox"',$row->config_ym);
	// boston, отключать модули на странице редактирования на фронте
	$lists['module_on_edit_off']= mosHTML::yesnoRadioList('config_module_on_edit_off','class="inputbox"',$row->config_module_on_edit_off);
	// boston, ежесуточная оптимизация таблиц бд
	$lists['optimizetables']= mosHTML::yesnoRadioList('config_optimizetables','class="inputbox"',$row->config_optimizetables);
	// boston, отключение мамботов группы content
	$lists['mmb_content_off']= mosHTML::yesnoRadioList('config_mmb_content_off','class="inputbox"',$row->config_mmb_content_off);
	// boston, кэширование меню панели управления
	$lists['adm_menu_cache']= mosHTML::yesnoRadioList('config_adm_menu_cache','class="inputbox"',$row->config_adm_menu_cache);
	// управление captcha
	$lists['captcha']= mosHTML::yesnoRadioList('config_captcha','class="inputbox"',$row->config_captcha);
	// управление captcha
	$lists['com_frontpage_clear']= mosHTML::yesnoRadioList('config_com_frontpage_clear','class="inputbox"',$row->config_com_frontpage_clear);
	// корень файлового менеджера
	$row->config_joomlaxplorer_dir = $row->config_joomlaxplorer_dir ? $row->config_joomlaxplorer_dir : $mosConfig_absolute_path;
	// автоматическая установка чекбокса "Публиковать на главной"
	$lists['auto_frontpage']= mosHTML::yesnoRadioList('config_auto_frontpage','class="inputbox"',$row->config_auto_frontpage);
	// уникальные идентификаторы новостей
	$lists['config_uid_news']= mosHTML::yesnoRadioList('config_uid_news','class="inputbox"',$row->config_uid_news);
	// подсчет прочтений содержимого
	$lists['config_content_hits']= mosHTML::yesnoRadioList('config_content_hits','class="inputbox"',$row->config_content_hits);
	// формат времени
	$date_help = array(
		mosHTML::makeOption('%d.%m.%Y г. %H:%M', strftime('%d.%m.%Y г. %H:%M') ),
		mosHTML::makeOption('%d:%m:%Y г. %H:%M', strftime('%d:%m:%Y г. %H:%M') ),
		mosHTML::makeOption('%d-%m-%Y г. %H-%M', strftime('%d-%m-%Y г. %H-%M') ),
		mosHTML::makeOption('%d/%m/%Y г. %H/%M', strftime('%d/%m/%Y г. %H/%M') ),
		mosHTML::makeOption('%d/%m/%Y %H/%M', strftime('%d/%m/%Y %H/%M') ),
		mosHTML::makeOption('%d/%m/%Y', strftime('%d/%m/%Y') ),
		mosHTML::makeOption('%d:%m:%Y', strftime('%d:%m:%Y') ),
		mosHTML::makeOption('%d.%m.%Y', strftime('%d.%m.%Y') ),
		mosHTML::makeOption('%d/%m/%Y г.', strftime('%d/%m/%Y г.') ),
		mosHTML::makeOption('%d:%m:%Y г.', strftime('%d:%m:%Y г.') ),
		mosHTML::makeOption('%d.%m.%Y г.', strftime('%d.%m.%Y г.') ),
		mosHTML::makeOption('%H/%M', strftime('%H/%M') ),
		mosHTML::makeOption('%H:%M', strftime('%H:%M') ),
		mosHTML::makeOption('%H ч:%M м', strftime('%H ч:%M м') ),
		mosHTML::makeOption('%A %d/%m/%Y г. %H/%M', strftime('%A %d/%m/%Y г. %H/%M') ),
		mosHTML::makeOption('%d %B %Y', strftime('%d %B %Y') )
	);
	$lists['form_date_help']= mosHTML::selectList($date_help,'config_form_date_h','class="inputbox" size="1" onchange="adminForm.config_form_date.value=this.value;"','value','text',$row->config_form_date);
	// полный формат даты и времени
	$lists['form_date_full_help']= mosHTML::selectList($date_help,'config_form_date_full_h','class="inputbox" size="1" onchange="adminForm.config_form_date_full.value=this.value;"','value','text',$row->config_form_date_full);

	// поддержка работы на младших версиях MySQL
	$lists['config_dbold']= mosHTML::yesnoRadioList('config_dbold','class="inputbox"',$row->config_dbold);
	// поддержка работы на младших версиях MySQL
	$lists['config_pathway_clean']= mosHTML::yesnoRadioList('config_pathway_clean','class="inputbox"',$row->config_pathway_clean);
	// отключение удаления сессий в панели управления
	$lists['config_adm_session_del']= mosHTML::yesnoRadioList('config_adm_session_del','class="inputbox"',$row->config_adm_session_del);
	// отключение кнопки "Помощь"
	$lists['config_disable_button_help']= mosHTML::yesnoRadioList('config_disable_button_help','class="inputbox"',$row->config_disable_button_help);
	// отключение блокировок объектов
	$lists['config_disable_checked_out']= mosHTML::yesnoRadioList('config_disable_checked_out','class="inputbox"',$row->config_disable_checked_out);
	// отключение favicon
	$lists['config_disable_favicon']= mosHTML::yesnoRadioList('config_disable_favicon','class="inputbox"',$row->config_disable_favicon);
	// doctorgrif
	$lists['config_disable_favicon_ie']= mosHTML::yesnoRadioList('config_disable_favicon_ie','class="inputbox"',$row->config_disable_favicon_ie);
	// doctorgrif
	$lists['config_disable_favicon_ipad']= mosHTML::yesnoRadioList('config_disable_favicon_ipad','class="inputbox"',$row->config_disable_favicon_ipad);
	// использование расширенного отладчика на фронте
	$lists['config_front_debug']= mosHTML::yesnoRadioList('config_front_debug','class="inputbox"',$row->config_front_debug);
	// использование мамботов группы mainbody
	$lists['config_mmb_mainbody_off']= mosHTML::yesnoRadioList('config_mmb_mainbody_off','class="inputbox"',$row->config_mmb_mainbody_off);
	// автоматическая авторизация после подтверждения регистрации
	$lists['config_auto_activ_login']= mosHTML::yesnoRadioList('config_auto_activ_login','class="inputbox"',$row->config_auto_activ_login);
	// автоматическая авторизация после подтверждения регистрации
	$lists['config_sql_mode_off']= mosHTML::yesnoRadioList('config_sql_mode_off','class="inputbox"',$row->config_sql_mode_off);
	// отключение вкладки 'Изображения'
	$lists['config_disable_image_tab']= mosHTML::yesnoRadioList('config_disable_image_tab','class="inputbox"',$row->config_disable_image_tab);
	// обрамлять заголовки тегом h1
	$lists['config_title_h1']= mosHTML::yesnoRadioList('config_title_h1','class="inputbox"',$row->config_title_h1);
	// обрамлять заголовки тегом h1 только в режиме полного просмотра содержимого
	$lists['config_title_h1_only_view']= mosHTML::yesnoRadioList('config_title_h1_only_view','class="inputbox"',$row->config_title_h1_only_view);
	// отключить проверки публикаций по датам
	$lists['config_disable_date_state']= mosHTML::yesnoRadioList('config_disable_date_state','class="inputbox"',$row->config_disable_date_state);
	// отключить проверку доступа к содержимому
	$lists['config_disable_access_control']= mosHTML::yesnoRadioList('config_disable_access_control','class="inputbox"',$row->config_disable_access_control);
	// оптимизация функции кэширования
	$lists['config_cache_opt']= mosHTML::yesnoRadioList('config_cache_opt','class="inputbox"',$row->config_cache_opt);
	// оптимизация функции кэширования
	$lists['config_clearCache']= mosHTML::yesnoRadioList('config_clearCache','class="inputbox"',$row->config_clearCache);

	// включение сжатия css и js файлов
	$lists['config_gz_js_css']= mosHTML::yesnoRadioList('config_gz_js_css','class="inputbox"',$row->config_gz_js_css);
	// captcha для регистрации
	$lists['config_captcha_reg']= mosHTML::yesnoRadioList('config_captcha_reg','class="inputbox"',$row->config_captcha_reg);
	// captcha для формы контактов
	$lists['config_captcha_cont']= mosHTML::yesnoRadioList('config_captcha_cont','class="inputbox"',$row->config_captcha_cont);
	// визуальный редактор для html и css - codepress
	$lists['config_codepress']= mosHTML::yesnoRadioList('config_codepress','class="inputbox"',$row->config_codepress);

	// DEBUG - ОТЛАДКА
	$lists['debug']= mosHTML::yesnoRadioList('config_debug','class="inputbox"',$row->config_debug);

	// НАСТРОЙКИ СЕРВЕРА
	$lists['gzip']= mosHTML::yesnoRadioList('config_gzip','class="inputbox"',$row->config_gzip);

	$session = array(
		mosHTML::makeOption(0,_SECURITY_LEVEL3),
		mosHTML::makeOption(1,_SECURITY_LEVEL2),
		mosHTML::makeOption(2,_SECURITY_LEVEL1)
	);
	$lists['session_type']= mosHTML::selectList($session,'config_session_type','class="inputbox" size="1"','value','text',$row->config_session_type);

	$errors = array(
		mosHTML::makeOption(-1,'Настройки системы'),
		mosHTML::makeOption(0,'Отсутствуют'),
		mosHTML::makeOption(E_ERROR | E_WARNING | E_PARSE,'Простые'),
		mosHTML::makeOption(E_ALL,'Максимум (все)'));

	$lists['error_reporting']	= mosHTML::selectList($errors,'config_error_reporting','class="inputbox" size="1"','value','text',$row->config_error_reporting);

	$lists['admin_expired']		= mosHTML::yesnoRadioList('config_admin_expired','class="inputbox"',$row->config_admin_expired);

	// НАСТРОЙКИ ЛОКАЛИ СТРАНЫ
	$lists['lang']= mosHTML::selectList($langs,'config_lang','class="inputbox" size="1"','value','text',$row->config_lang);

	$timeoffset = array(
		mosHTML::makeOption(-12,_TIME_OFFSET_M_12),
		mosHTML::makeOption(-11,_TIME_OFFSET_M_11),
		mosHTML::makeOption(-10,_TIME_OFFSET_M_10),
		mosHTML::makeOption(-9.5,_TIME_OFFSET_M_9_5),
		mosHTML::makeOption(-9,_TIME_OFFSET_M_9),
		mosHTML::makeOption(-8,_TIME_OFFSET_M_8),
		mosHTML::makeOption(-7,_TIME_OFFSET_M_7),
		mosHTML::makeOption(-6,_TIME_OFFSET_M_6),
		mosHTML::makeOption(-5,_TIME_OFFSET_M_5),
		mosHTML::makeOption(-4,_TIME_OFFSET_M_4),
		mosHTML::makeOption(-3.5,_TIME_OFFSET_M_3_5),
		mosHTML::makeOption(-3,_TIME_OFFSET_M_3),
		mosHTML::makeOption(-2,_TIME_OFFSET_M_2),
		mosHTML::makeOption(-1,_TIME_OFFSET_M_1),
		mosHTML::makeOption(0,_TIME_OFFSET_M_0),
		mosHTML::makeOption(1,_TIME_OFFSET_P_1),
		mosHTML::makeOption(2,_TIME_OFFSET_P_2),
		mosHTML::makeOption(3,_TIME_OFFSET_P_3),
		mosHTML::makeOption(3.5,_TIME_OFFSET_P_3_5),
		mosHTML::makeOption(4,_TIME_OFFSET_P_4),
		mosHTML::makeOption(4.5,_TIME_OFFSET_P_4_5),
		mosHTML::makeOption(5,_TIME_OFFSET_P_5),
		mosHTML::makeOption(5.5,_TIME_OFFSET_P_5_5),
		mosHTML::makeOption(5.75,_TIME_OFFSET_P_5_75),
		mosHTML::makeOption(6,_TIME_OFFSET_P_6),
		mosHTML::makeOption(6.30,_TIME_OFFSET_P_6_5),
		mosHTML::makeOption(7,_TIME_OFFSET_P_7),
		mosHTML::makeOption(8,_TIME_OFFSET_P_8),
		mosHTML::makeOption(8.75,_TIME_OFFSET_P_8_75),
		mosHTML::makeOption(9,_TIME_OFFSET_P_9),
		mosHTML::makeOption(9.5,_TIME_OFFSET_P_9_5),
		mosHTML::makeOption(10,_TIME_OFFSET_P_10),
		mosHTML::makeOption(10.5,_TIME_OFFSET_P_10_5),
		mosHTML::makeOption(11,_TIME_OFFSET_P_11),
		mosHTML::makeOption(11.30,_TIME_OFFSET_P_11_5),
		mosHTML::makeOption(12,_TIME_OFFSET_P_12),
		mosHTML::makeOption(12.75,_TIME_OFFSET_P_12_75),
		mosHTML::makeOption(13,_TIME_OFFSET_P_13),
		mosHTML::makeOption(14,_TIME_OFFSET_P_14),);

	$lists['offset']= mosHTML::selectList($timeoffset,'config_offset_user','class="inputbox" size="1"','value','text',$row->config_offset_user);

	$feed_timeoffset = array(
		mosHTML::makeOption( '-12:00', _TIME_OFFSET_M_12),
		mosHTML::makeOption( '-11:00', _TIME_OFFSET_M_11),
		mosHTML::makeOption( '-10:00', _TIME_OFFSET_M_10),
		mosHTML::makeOption( '-09:30', _TIME_OFFSET_M_9_5),
		mosHTML::makeOption( '-09:00', _TIME_OFFSET_M_9),
		mosHTML::makeOption( '-08:00', _TIME_OFFSET_M_8),
		mosHTML::makeOption( '-07:00', _TIME_OFFSET_M_7),
		mosHTML::makeOption( '-06:00', _TIME_OFFSET_M_6),
		mosHTML::makeOption( '-05:00', _TIME_OFFSET_M_5),
		mosHTML::makeOption( '-04:00', _TIME_OFFSET_M_4),
		mosHTML::makeOption( '-03:30', _TIME_OFFSET_M_3_5),
		mosHTML::makeOption( '-03:00', _TIME_OFFSET_M_3),
		mosHTML::makeOption( '-02:00', _TIME_OFFSET_M_2),
		mosHTML::makeOption( '-01:00', _TIME_OFFSET_M_1),
		mosHTML::makeOption( '00:00', _TIME_OFFSET_M_0),
		mosHTML::makeOption( '+01:00' , _TIME_OFFSET_P_1),
		mosHTML::makeOption( '+02:00', _TIME_OFFSET_P_2),
		mosHTML::makeOption( '+03:00', _TIME_OFFSET_P_3),
		mosHTML::makeOption( '+03:30', _TIME_OFFSET_P_3_5),
		mosHTML::makeOption( '+04:00', _TIME_OFFSET_P_4),
		mosHTML::makeOption( '+04:30', _TIME_OFFSET_P_4_5),
		mosHTML::makeOption( '+05:00', _TIME_OFFSET_P_5),
		mosHTML::makeOption( '+05:30', _TIME_OFFSET_P_5_5),
		mosHTML::makeOption( '+05:45', _TIME_OFFSET_P_5_75),
		mosHTML::makeOption( '+06:00', _TIME_OFFSET_P_6),
		mosHTML::makeOption( '+06:30', _TIME_OFFSET_P_6_5),
		mosHTML::makeOption( '+07:00', _TIME_OFFSET_P_7),
		mosHTML::makeOption( '+08:00', _TIME_OFFSET_P_8),
		mosHTML::makeOption( '+08:45', _TIME_OFFSET_P_8_75),
		mosHTML::makeOption( '+09:00', _TIME_OFFSET_P_9),
		mosHTML::makeOption( '+09:30', _TIME_OFFSET_P_9_5),
		mosHTML::makeOption( '+10:00', _TIME_OFFSET_P_10),
		mosHTML::makeOption( '+10:30', _TIME_OFFSET_P_10_5),
		mosHTML::makeOption( '+11:00', _TIME_OFFSET_P_11),
		mosHTML::makeOption( '+11:30', _TIME_OFFSET_P_11_5),
		mosHTML::makeOption( '+12:00', _TIME_OFFSET_P_12),
		mosHTML::makeOption( '+12:45', _TIME_OFFSET_P_12_75),
		mosHTML::makeOption( '+13:00', _TIME_OFFSET_P_13),
		mosHTML::makeOption( '+14:00', _TIME_OFFSET_P_14),
	);
	$lists['feed_timeoffset']= mosHTML::selectList($feed_timeoffset,'config_feed_timeoffset','class="inputbox" size="1"','value','text',$row->config_feed_timeoffset);

// НАСТРОЙКИ ПОЧТЫ
	$mailer = array(
		mosHTML::makeOption( 'mail', _PHP_MAIL_FUNCTION ),
		mosHTML::makeOption( 'sendmail', 'Sendmail' ),
		mosHTML::makeOption( 'smtp', _SMTP_SERVER ),
	);
	$lists['mailer']	= mosHTML::selectList( $mailer, 'config_mailer', 'class="inputbox" size="1"', 'value', 'text', $row->config_mailer );
	$lists['smtpauth']	= mosHTML::yesnoRadioList( 'config_smtpauth', 'class="inputbox"', $row->config_smtpauth );


// НАСТРОЙКИ КЭША
	$lists['caching']= mosHTML::yesnoRadioList('config_caching','class="inputbox"',$row->config_caching);

// НАСТРОЙКИ ПОЛЬЗОВАТЕЛЕЙ
	$lists['useractivation']	= mosHTML::yesnoRadioList( 'config_useractivation', 'class="inputbox"',	$row->config_useractivation );
	$lists['uniquemail']		= mosHTML::yesnoRadioList( 'config_uniquemail', 'class="inputbox"',	$row->config_uniquemail );
	$lists['shownoauth']		= mosHTML::yesnoRadioList( 'config_shownoauth', 'class="inputbox"', $row->config_shownoauth );
	$lists['frontend_userparams']	= mosHTML::yesnoRadioList( 'config_frontend_userparams', 'class="inputbox"', $row->config_frontend_userparams );
	$lists['allowUserRegistration']	= mosHTML::yesnoRadioList( 'config_allowUserRegistration', 'class="inputbox"',	$row->config_allowUserRegistration );

// НАСТРОЙКИ META-ДАННЫХ
	$lists['MetaAuthor']	= mosHTML::yesnoRadioList( 'config_MetaAuthor', 'class="inputbox"', $row->config_MetaAuthor );
	$lists['MetaTitle']		= mosHTML::yesnoRadioList( 'config_MetaTitle', 'class="inputbox"', $row->config_MetaTitle );

// НАСТРОЙКИ СТАТИСТИКИ
	$lists['log_searches']	= mosHTML::yesnoRadioList( 'config_enable_log_searches', 'class="inputbox"', $row->config_enable_log_searches );
	$lists['enable_stats']	= mosHTML::yesnoRadioList( 'config_enable_stats', 'class="inputbox"', $row->config_enable_stats );
	$lists['log_items']		= mosHTML::yesnoRadioList( 'config_enable_log_items', 'class="inputbox"', $row->config_enable_log_items );

// НАСТРОЙКИ SEO
	$lists['sef']				= mosHTML::yesnoRadioList( 'config_sef', 'class="inputbox" onclick="javascript: if (document.adminForm.config_sef[1].checked) { alert(\'Необходимо переименовать htaccess.txt в .htaccess\') }"', $row->config_sef );
	$lists['pagetitles']	= mosHTML::yesnoRadioList( 'config_pagetitles', 'class="inputbox"', $row->config_pagetitles );

	$pagetitles_first = array(
		mosHTML::makeOption( '0', 'Название сайта - Заголовок страницы' ),
		mosHTML::makeOption( '1', 'Заголовок страницы - Название сайта (по умолчанию)' ),
		mosHTML::makeOption( '2', 'Название сайта ( только )' ),
		mosHTML::makeOption( '3', 'Заголовок страницы ( только )' ),
	);
	$lists['pagetitles_first']	= mosHTML::selectList( $pagetitles_first, 'config_pagetitles_first', 'class="inputbox" size="1"', 'value', 'text', $row->config_pagetitles_first );
/*ToDo: Сделать возможность изменять htaccess в админке. Использовать class HTACCESS http://rmcreative.ru/ */
// НАСТРОЙКИ HTACCESS
	

// НАСТРОЙКИ СОДЕРЖИМОГО
	$lists['link_titles']		= mosHTML::yesnoRadioList( 'config_link_titles', 'class="inputbox"', $row->config_link_titles );
	$lists['readmore']			= mosHTML::RadioList( $show_hide_r, 'config_readmore', 'class="inputbox"', $row->config_readmore, 'value', 'text' );
	$lists['vote']				= mosHTML::RadioList( $show_hide_r, 'config_vote', 'class="inputbox"', $row->config_vote, 'value', 'text' );
	$lists['hideAuthor']		= mosHTML::RadioList( $show_hide, 'config_hideAuthor', 'class="inputbox"', $row->config_hideAuthor, 'value', 'text' );
	$lists['hideCreateDate']	= mosHTML::RadioList( $show_hide, 'config_hideCreateDate', 'class="inputbox"', $row->config_hideCreateDate, 'value', 'text' );
	$lists['hideModifyDate']	= mosHTML::RadioList( $show_hide, 'config_hideModifyDate', 'class="inputbox"', $row->config_hideModifyDate, 'value', 'text' );
	$lists['hits']				= mosHTML::RadioList( $show_hide_r, 'config_hits', 'class="inputbox"', $row->config_hits, 'value', 'text' );
	$lists['back_button']		= mosHTML::RadioList( $show_hide_r, 'config_back_button', 'class="inputbox"', $row->config_back_button, 'value', 'text' );
	$lists['item_navigation']	= mosHTML::RadioList( $show_hide_r, 'config_item_navigation', 'class="inputbox"', $row->config_item_navigation, 'value', 'text' );
	$lists['multipage_toc']	= mosHTML::RadioList( $show_hide_r, 'config_multipage_toc', 'class="inputbox"', $row->config_multipage_toc, 'value', 'text' );
	if (is_writable( "$mosConfig_absolute_path/media/" )) {
	$lists['hidePdf'] = mosHTML::RadioList( $show_hide, 'config_hidePdf', 'class="inputbox"', $row->config_hidePdf, 'value', 'text' );
	} else {
	$lists['hidePdf'] = '<input type="hidden" name="config_hidePdf" value="1" /><strong>Скрыть</strong>';
	}
	$lists['hidePrint']		= mosHTML::RadioList( $show_hide, 'config_hidePrint', 'class="inputbox"', $row->config_hidePrint, 'value', 'text' );
	$lists['hideEmail']		= mosHTML::RadioList( $show_hide, 'config_hideEmail', 'class="inputbox"', $row->config_hideEmail, 'value', 'text' );
	$lists['icons']			= mosHTML::RadioList( $show_hide_r, 'config_icons', 'class="inputbox"', $row->config_icons, 'value', 'text' );

	$lists['www_redir']		= mosHTML::yesnoRadioList( 'config_www_redir', 'class="inputbox"', $row->config_www_redir );

// использование одного редактора для содержимого
	$lists['one_editor']	= mosHTML::yesnoRadioList( 'config_one_editor', 'class="inputbox"', $row->config_one_editor );
// вывод мета-тэга base
	$lists['mtage_base']	= mosHTML::yesnoRadioList( 'config_mtage_base', 'class="inputbox"', $row->config_mtage_base );
// использование страницы печати из каталога текущего шаблона
	$lists['config_custom_print']	= mosHTML::yesnoRadioList( 'config_custom_print', 'class="inputbox"', $row->config_custom_print );
// отключить многоязычность модулей
	$lists['config_module_multilang']	= mosHTML::yesnoRadioList( 'config_module_multilang', 'class="inputbox"', $row->config_module_multilang );
// использование совместимого вывода туллбара
	$lists['config_old_toolbar']	= mosHTML::yesnoRadioList( 'config_old_toolbar', 'class="inputbox"', $row->config_old_toolbar );


	$itemid_compat = array(
		mosHTML::makeOption( '11', 'Joomla! 1.0.11 и ниже' ),
		mosHTML::makeOption( '0', 'Joomla! 1.0.12 и выше' ),
	);
	$lists['itemid_compat']	= mosHTML::selectList( $itemid_compat, 'config_itemid_compat', 'class="inputbox" size="1"', 'value', 'text', $row->config_itemid_compat );

	// обработчики кэширования
	$db_cache_handler = array();
	$db_cache_handler[]= mosHTML::makeOption( 'none', 'Не использовать' );
	$db_cache_handler[]= mosHTML::makeOption( 'file', 'Файлы' );
	//if(function_exists('eaccelerator_get'))
	$db_cache_handler[] = mosHTML::makeOption( 'eaccelerator', 'eAccelerator' );
	//if(function_exists('apc_fetch'))
	$db_cache_handler[] = mosHTML::makeOption( 'apc', 'APC' );
	//if(class_exists('Memcache'))
	$db_cache_handler[] = mosHTML::makeOption( 'memcache', 'Memcache' );
	//if(function_exists('xcache_set'))
	$db_cache_handler[] = mosHTML::makeOption( 'xcache', 'Xcache' );

	$lists['db_cache_handler']= mosHTML::selectList($db_cache_handler,'config_db_cache_handler','class="inputbox" ','value','text',$mosConfig_db_cache_handler_orig);

	HTML_config::showconfig($row,$lists,$option);
}

/**
* Сохранение конфигурации
*/
function saveconfig($task) {
	global $database,$mosConfig_absolute_path,$mosConfig_password,$mosConfig_session_type;
	josSpoofCheck();

	$row = new mosConfig();
	if(!$row->bind($_POST)) {
		mosRedirect('index2.php',$row->getError());
	}

	// if Session Authentication Type changed, delete all old Frontend sessions only - which used old Authentication Type
	if($mosConfig_session_type != $row->config_session_type) {
		$past = time();
		$query = "DELETE FROM #__session"
			."\n WHERE time < ".$database->Quote($past)
			."\n AND ("
			."\n ( guest = 1 AND userid = 0 ) OR ( guest = 0 AND gid > 0 )"
			."\n )";
		$database->setQuery($query);
		$database->query();
	}

	$server_time = date('O') / 100;
	$offset = $_POST['config_offset_user'] - $server_time;
	$row->config_offset = $offset;

	//override any possible database password change
	$row->config_password = $mosConfig_password;

	// handling of special characters
	$row->config_sitename = htmlspecialchars($row->config_sitename,ENT_QUOTES);

	// handling of quotes (double and single) and amp characters
	// htmlspecialchars not used to preserve ability to insert other html characters
	$row->config_offline_message = ampReplace($row->config_offline_message);
	$row->config_offline_message = str_replace('"','&quot;',$row->config_offline_message);
	$row->config_offline_message = str_replace("'",'&#039;',$row->config_offline_message);

	// handling of quotes (double and single) and amp characters
	// htmlspecialchars not used to preserve ability to insert other html characters
	$row->config_error_message = ampReplace($row->config_error_message);
	$row->config_error_message = str_replace('"','&quot;',$row->config_error_message);
	$row->config_error_message = str_replace("'",'&#039;',$row->config_error_message);

	if($row->config_joomlaxplorer_dir == $row->config_absolute_path) $row->config_joomlaxplorer_dir = 0;


	$config = "<?php \n";

	$RGEmulation = intval(mosGetParam($_POST,'rgemulation',0));
	$config .= "if(!defined('RG_EMULATION')) { define( 'RG_EMULATION', $RGEmulation ); }\n";


	$config .= $row->getVarText();
	$config .= "setlocale (LC_TIME, \$mosConfig_locale);\n";
	$config .= '?>';

	$fname = $mosConfig_absolute_path.'/configuration.php';

	$enable_write = intval(mosGetParam($_POST,'enable_write',0));
	$oldperms = fileperms($fname);
	if($enable_write) {
		@chmod($fname,$oldperms | 0222);
	}

	if($fp = fopen($fname,'w')) {
		fputs($fp,$config,strlen($config));
		fclose($fp);
		if($enable_write) {
			@chmod($fname,$oldperms);
		} else {
			if(mosGetParam($_POST,'disable_write',0)) @chmod($fname,$oldperms & 0777555);
		} // if

		$msg = _CONFIGURATION_IS_UPDATED;

		// apply file and directory permissions if requested by user
		$applyFilePerms	= mosGetParam($_POST,'applyFilePerms',0) && $row->config_fileperms !='';
		$applyDirPerms	= mosGetParam($_POST,'applyDirPerms',0) && $row->config_dirperms !='';
		if($applyFilePerms || $applyDirPerms) {
			$mosrootfiles = array(ADMINISTRATOR_DIRECTORY,'cache','components','images','language','mambots','media','modules','templates','configuration.php');
			$filemode = null;
			if($applyFilePerms) {
				$filemode = octdec($row->config_fileperms);
			}
			$dirmode = null;
			if($applyDirPerms) {
				$dirmode = octdec($row->config_dirperms);
			}
			foreach($mosrootfiles as $file) {
				mosChmodRecursive($mosConfig_absolute_path.'/'.$file,$filemode,$dirmode);
			}
		} // if

		switch($task) {
			case 'apply':
				mosRedirect('index2.php?option=com_config&hidemainmenu=1',$msg);
				break;
			case 'save':
			default:
				mosRedirect('index2.php',$msg);
				break;
		}
	} else {
		if($enable_write) {
			@chmod($fname,$oldperms);
		}
		mosRedirect('index2.php',_CANNOT_OPEN_CONF_FILE);
	}
}
?>
