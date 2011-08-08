<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2007 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/copyleft/gpl.html GNU/GPL, смотрите LICENSE.php
* Joostina! - свободное программное обеспечение. Эта версия может быть изменена
* в соответствии с Генеральной Общественной Лицензией GNU, поэтому возможно
* её дальнейшее распространение в составе результата работы, лицензированного
* согласно Генеральной Общественной Лицензией GNU или других лицензий свободных
* программ или программ с открытым исходным кодом.
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл COPYRIGHT.php.
*/

// запрет прямого доступа
defined( '_VALID_MOS' ) or die( 'Прямой вызов файла запрещен' );
/* @package xmap
 * @author: Daniel Grothe, http://www.ko-ca.com/
 * @локализация: boston http://www.joom.ru. В рамках проекта Joostina.
 */
if( !defined( 'JOOMAP_LANG' )) {
	define('JOOMAP_LANG', 1 );
	// -- General ------------------------------------------------------------------
	define('_XMAP_CFG_COM_TITLE',		'Карты сайта');
	define('_XMAP_CFG_OPTIONS',			'Отображение');
	define('_XMAP_CFG_CSS_CLASSNAME',	'Стили CSS');
	define('_XMAP_CFG_EXPAND_CATEGORIES','Расширять категории содержимого');
	define('_XMAP_CFG_EXPAND_SECTIONS',	'Расширять разделы содержимого');
	define('_XMAP_CFG_SHOW_MENU_TITLES','Показывать названия меню');
	define('_XMAP_CFG_NUMBER_COLUMNS',	'Число столбцов');
	define('_XMAP_EX_LINK',				'Отмечать внешние ссылки');
	define('_XMAP_CFG_CLICK_HERE', 		'Нажмите сюда');
	define('_XMAP_CFG_GOOGLE_MAP',		'Google Sitemap');
	define('_XMAP_EXCLUDE_MENU',		'Исключать ID меню');
	define('_XMAP_TAB_DISPLAY',			'Отображение');
	define('_XMAP_TAB_MENUS',			'Меню');
	define('_XMAP_CFG_WRITEABLE',		'доступен');
	define('_XMAP_CFG_UNWRITEABLE',		'не доступен');
	define('_XMAP_MSG_MAKE_UNWRITEABLE','Запретить редактирование после сохранения');
	define('_XMAP_MSG_OVERRIDE_WRITE_PROTECTION', 'Игнорировать защиту при записи');
	define('_XMAP_GOOGLE_LINK',			'Googlelink');
	define('_XMAP_CFG_INCLUDE_LINK',	'Скрывать ссылку на автора');
	// -- Tips ---------------------------------------------------------------------
	define('_XMAP_EXCLUDE_MENU_TIP',	'Идентификаторы меню исключаемые из карты.<br /><strong>ВНИМАНИЕ</strong><br />Идентификаторы разделять запятыми!');
	// -- Menus --------------------------------------------------------------------
	define('_XMAP_CFG_SET_ORDER',		'Сортировка меню');
	define('_XMAP_CFG_MENU_SHOW',		'Показать');
	define('_XMAP_CFG_MENU_REORDER',	'Пересортировать');
	define('_XMAP_CFG_MENU_ORDER',		'Положение');
	define('_XMAP_CFG_MENU_NAME',		'Название меню');
	define('_XMAP_CFG_DISABLE',			'Отключить');
	define('_XMAP_CFG_ENABLE',			'Включить');
	define('_XMAP_SHOW',				'Показать');
	define('_XMAP_NO_SHOW',				'Не показывать');
	// -- Toolbar ------------------------------------------------------------------
	define('_XMAP_TOOLBAR_SAVE', 		'Сохранить');
	define('_XMAP_TOOLBAR_CANCEL', 		'Выход');
	// -- Errors -------------------------------------------------------------------
	define('_XMAP_ERR_NO_LANG',			'Языковой файл [ %s ] не найден, используется язык по умолчанию<br />');
	define('_XMAP_ERR_CONF_SAVE',		 'ОШИБКА: Невозможно сохранить конфигурацию.');
	define('_XMAP_ERR_NO_CREATE',		 'ОШИБКА: Отсутствует таблица настроек');
	define('_XMAP_ERR_NO_DEFAULT_SET',	'ОШИБКА: Отсутствует таблица базовых данных');
	define('_XMAP_ERR_NO_PREV_BU',		'ПРЕДУПРЕЖДЕНИЕ: Невозможно удалить копию');
	define('_XMAP_ERR_NO_BACKUP',		 'ОШИБКА: Невозможно создать копию');
	define('_XMAP_ERR_NO_DROP_DB',		'ОШИБКА: Невозможно удалить настройки');
	define('_XMAP_ERR_NO_SETTINGS',		'ОШИБКА: Невозможно загрузить настройки: <a href="%s">Создать таблицу настроек</a>');
	// -- Config -------------------------------------------------------------------
	define('_XMAP_MSG_SET_RESTORED',	'Настройки восстановлены');
	define('_XMAP_MSG_SET_BACKEDUP',	'Настройки сохранены');
	define('_XMAP_MSG_SET_DB_CREATED',	'Таблица настроек создана');
	define('_XMAP_MSG_SET_DEF_INSERT',	'Базовые данные внесены');
	define('_XMAP_MSG_SET_DB_DROPPED',	'Таблицы Xmap\'s сохранены!');
	// -- CSS ----------------------------------------------------------------------
	define('_XMAP_CSS',		'Xmap CSS');
	define('_XMAP_CSS_EDIT','Редактирование CSS карт'); // Edit template
	// -- Sitemap (Frontend) -------------------------------------------------------
	define('_XMAP_SHOW_AS_EXTERN_ALT',	'Ссылка откроется в новом окне');
	
	// -- Added for Xmap 
	define('_XMAP_CFG_MENU_SHOW_HTML',		'Показывать на сайте');
	define('_XMAP_CFG_MENU_SHOW_XML',		'Показывать в XML карте');
	define('_XMAP_CFG_MENU_PRIORITY',		'Приоритет');
	define('_XMAP_CFG_MENU_CHANGEFREQ',		'Создавать');
	define('_XMAP_CFG_CHANGEFREQ_ALWAYS',	'Постоянно');
	define('_XMAP_CFG_CHANGEFREQ_HOURLY',	'Ежечасно');
	define('_XMAP_CFG_CHANGEFREQ_DAILY',	'Ежедневно');
	define('_XMAP_CFG_CHANGEFREQ_WEEKLY',	'Еженедельно');
	define('_XMAP_CFG_CHANGEFREQ_MONTHLY',	'Ежемесячно');
	define('_XMAP_CFG_CHANGEFREQ_YEARLY',	'Ежегодно');
	define('_XMAP_CFG_CHANGEFREQ_NEVER',	'Всегда');
	define('_XMAP_TIT_SETTINGS_OF',			'Настройки %s');
	define('_XMAP_TAB_SITEMAPS',			'Карта');
	define('_XMAP_MSG_NO_SITEMAPS',			'Нет созданных карт');
	define('_XMAP_MSG_NO_SITEMAP',			'Данная карта недоступна');
	define('_XMAP_MSG_LOADING_SETTINGS',	'Загрузка настроек…');
	define('_XMAP_MSG_ERROR_LOADING_SITEMAP','Ошибка. Невозможно загрузить карту');
	define('_XMAP_MSG_ERROR_SAVE_PROPERTY',	'Ошибка. Невозможно сохранить приоритет.');
	define('_XMAP_MSG_ERROR_CLEAN_CACHE',	'Ошибка. Невозможно очистить кэш карты.');
	define('_XMAP_ERROR_DELETE_DEFAULT',	'Невозможно удалить карту, используемую по умолчанию!');
	define('_XMAP_MSG_CACHE_CLEANED',		'Кэш карты очищен!');
	define('_XMAP_CHARSET',					'windows-1251');
	define('_XMAP_SITEMAP_ID',				'Идентификатор карты');
	define('_XMAP_ADD_SITEMAP',				'Создать новую карту сайта');
	define('_XMAP_NAME_NEW_SITEMAP',		'Новая карта');
	define('_XMAP_DELETE_SITEMAP',			'Удалить');
	define('_XMAP_SETTINGS_SITEMAP',		'Настройки');
	define('_XMAP_COPY_SITEMAP',			'Копировать');
	define('_XMAP_SITEMAP_SET_DEFAULT',		'По умолчанию');
	define('_XMAP_EDIT_MENU',				'Настройки');
	define('_XMAP_DELETE_MENU',				'Удалить');
	define('_XMAP_CLEAR_CACHE',				'Очистить кэш');
	define('_XMAP_MOVEUP_MENU',		'Выше');
	define('_XMAP_MOVEDOWN_MENU',	'Ниже');
	define('_XMAP_ADD_MENU',		'Добавить меню');
	define('_XMAP_COPY_OF',			'Копия %s');
	define('_XMAP_INFO_LAST_VISIT',	'Последнее посещение');
	define('_XMAP_INFO_COUNT_VIEWS','Число посещений');
	define('_XMAP_INFO_TOTAL_LINKS','Число ссылок');
	define('_XMAP_CFG_URLS',		'URL карты');
	define('_XMAP_XML_LINK_TIP',	'Скопируйте эту ссылку для использования в Google и Yahoo');
	define('_XMAP_HTML_LINK_TIP',	'Это полный адрес карты.');
	define('_XMAP_CFG_XML_MAP',		'XML  карта');
	define('_XMAP_CFG_HTML_MAP',	'HTML карта');
	define('_XMAP_XML_LINK',		'Googlelink');
	define('_XMAP_CFG_XML_MAP_TIP',	'XML файл создаётся для поисковых систем');
	define('_XMAP_ADD', 'Сохранить');
	define('_XMAP_CANCEL', 'Закрыть');
	define('_XMAP_LOADING', 'Загрузка…');
	define('_XMAP_CACHE', 'Кэширование');
	define('_XMAP_USE_CACHE', 'Использовать');
	define('_XMAP_CACHE_LIFE_TIME', 'Время жизни кэша');
	define('_XMAP_NEVER_VISITED', 'Нет');
	// New on Xmap 1.1 beta 1
	define('_XMAP_PLUGINS','Расширения');
	define( '_XMAP_INSTALL_3PD_WARN', 'Warning: Installing 3rd party extensions may compromise your server\'s security.' );
	define('_XMAP_INSTALL_NEW_PLUGIN', 'Установить новое расширение');
	define('_XMAP_UNKNOWN_AUTHOR','Автор неизвестен');
	define('_XMAP_PLUGIN_VERSION','Версия %s');
	define('_XMAP_TAB_INSTALL_PLUGIN','Установить');
	define('_XMAP_TAB_EXTENSIONS','Расширение');
	define('_XMAP_TAB_INSTALLED_EXTENSIONS','Установленные расширения');
	define('_XMAP_NO_PLUGINS_INSTALLED','Расширения не установлены');
	define('_XMAP_AUTHOR','Автор');
	define('_XMAP_CONFIRM_DELETE_SITEMAP','Вы уверены что хотите удалить эту карту?');
	define('_XMAP_CONFIRM_UNINSTALL_PLUGIN','Вы уверены что хотите удалить это расширение?');
	define('_XMAP_UNINSTALL','Удалить');
	define('_XMAP_EXT_PUBLISHED','Опубликовать');
	define('_XMAP_EXT_UNPUBLISHED','Скрыть');
	define('_XMAP_PLUGIN_OPTIONS','Настройки плагина');
	define('_XMAP_EXT_INSTALLED_MSG','Расширение установлено, пожалуйста проверьте его параметры и опубликуйте.');
	define('_XMAP_CONTINUE','Продолжить…');
	define('_XMAP_MSG_EXCLUDE_CSS_SITEMAP','Не использовать CSS в карте');
	define('_XMAP_MSG_EXCLUDE_XSL_SITEMAP','Использовать классическую XML карту');
	// New on Xmap 1.1
	define('_XMAP_MSG_SELECT_FOLDER','Пожалуйста, выберите каталог');
	define('_XMAP_UPLOAD_PKG_FILE','Загрузка пакета расширения');
	define('_XMAP_UPLOAD_AND_INSTALL','Загрузить и установить');
	define('_XMAP_INSTALL_F_DIRECTORY','Установка из каталога');
	define('_XMAP_INSTALL_DIRECTORY','Каталог установки');
	define('_XMAP_INSTALL','Установить');
	define('_XMAP_WRITEABLE','Доступен');
	define('_XMAP_UNWRITEABLE','Не доступен');
	define('_XMAP_PLUGIN_NAME','Название расширения');
	define('_XMAP_PLUGIN_PUBLITION','Публикация');
	define('_XMAP_PLUGIN_AUTHOR','Автор');
	define('_XMAP_PLUGIN_DELETE','Удаление');
	define('_XMAP_PLUGIN_DATE','Дата');
	define('_XMAP_PKG_FILE','Файл расширения:');
	// joostina edition
	define('_XMAP_INVALID_SID','Ошибка идентификатора карты');
}
?>