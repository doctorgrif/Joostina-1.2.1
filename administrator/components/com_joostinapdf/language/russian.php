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

// Text definitions
DEFINE('_JOOPDF_PP_ADMIN_BACK','Назад в Панель управления');
DEFINE('_JOOPDF_PP_ADMIN','Панель управления');
DEFINE('_JOOPDF_PP_YES','Да');
DEFINE('_JOOPDF_PP_NO','Нет');
DEFINE('_JOOPDF_PP_CPANEL_NO','<br />CPanel JoostinaPDF не найдена: ');
DEFINE('_JOOPDF_PP_RETURN_CONFIRM','Вы уверены, что хотите отменить сделанные изменения?');
DEFINE('_JOOPDF_PP_DEL_CONFIRM','Вы уверены, что хотите удалить все кэшированные объекты?');
DEFINE('_JOOPDF_PP_DEL_CACHE_REP','Очистить хранилище кэша');
DEFINE('_JOOPDF_PP_DEL','Удалить');
DEFINE('_JOOPDF_PP_CONFIG_ERROR_FIND','Ошибка расположения конфигурации: ');
DEFINE('_JOOPDF_PP_WARNING','<center><h1><strong class="red">Внимание...</strong></h1>');
DEFINE('_JOOPDF_PP_WARNING_CHMOD_1','<p><strong>Конфигурация ');
DEFINE('_JOOPDF_PP_WARNING_CHMOD_2',' не может быть записана.');
DEFINE('_JOOPDF_PP_WARNING_CHMOD','<br />Установите chmod 666 для обновления файла!</strong></center></p>');
DEFINE('_JOOPDF_PP_ART_N_FOUND','Статья не найдена!');

DEFINE('_JOOPDF_PP_CONFIG_SAVE','Файл конфигурации сохранен!');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_OPEN','FATAL ERROR: Конфигурация не может быть открыта.');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP','FATAL ERROR: Файл бэкапа не создан! ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_1','FATAL ERROR: ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_2',' Запись невозможна!');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_1','ФАТАЛЬНАЯ ОШИБКА: Бэкап ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_2',' не может быть записан в ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_REST_1','ФАТАЛЬНАЯ ОШИБКА: Невозможно восстановить pdf.php Joostina: ');

DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_WRIT','ФАТАЛЬНАЯ ОШИБКА: Конфигурация не доступна для записи!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_EMPTY_DIR','Конфигурация не может быть сохранена без директории!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_DIR','Конфигурация не может быть сохранена в несуществующую директорию кэш!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_NO_DIR','Конфигурация не сохранена. Должна присутствовать директория кэш! Исправте.');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_WRIT','Конфигурация не может быть сохранена, потому что директория кэша не доступна для записи!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR1_SEP_NAME','Конфигурация не может быть сохранена, потому что разделитель имен присутствует в названии директории кэш!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR2_SEP_NAME','Конфигурация не может быть сохранена, потому что разделитель имен не может быть точкой (.)!');

DEFINE('_JOOPDF_PP_INST_BACKUP_AL_EXISTS','Бэкап pdf.php создан в ');
DEFINE('_JOOPDF_PP_INST_FAILED_COPY_1','FAILED to make a copy of the original pdf.php file');
DEFINE('_JOOPDF_PP_INST_SUCCS_1','<table><tr><td valign="top"><p>Установка JoostinaPDF завершена.</p>');
DEFINE('_JOOPDF_PP_INST_SUCCS_2','<p>Спасибо за установку расширения от JoostinaTeam (www.joostina.ru)</p></td></tr></table>');
DEFINE('_JOOPDF_PP_INST_FAT_ERROR_1','ФАТАЛЬНАЯ ОШИБКА: Невозможно установить файлы JoostinaPDF: ');
DEFINE('_JOOPDF_PP_TO',' в ');
DEFINE('_JOOPDF_PP_INST_FAT_ERROR_2','<br />Please do it manually or correct the permissions on ');
DEFINE('_JOOPDF_PP_INST_1','<font color=red>Could not install JoostinaDF due to <strong>incorrect</strong> permission settings.</font><br />');
DEFINE('_JOOPDF_PP_INST_2','Please set the file permissions for the following files to <strong>writeable</strong>:<br />');
DEFINE('_JOOPDF_PP_INST_3','<br /><br />After you have corrected the file permissions please install the needed pdf.php file with the cpanel option <strong>(Re)install JoostinaPDF pdf.php</strong>');
DEFINE('_JOOPDF_PP_INST_4','<br /><br />An alternative is to manually copy the file /administrator/components/com_joostinapdf/pdf.php to the /includes directory.<br />');
DEFINE('_JOOPDF_PP_INST_5','Please make a backup/copy of pdf.php before overwriting the original Joostina pdf.php with the JoostinaPDF version.</td></tr></table>');
DEFINE('_JOOPDF_PP_INST_REQ_NOT_TYPE','Required file/dir is not of this type! ');
DEFINE('_JOOPDF_PP_INST_FILE_NOT_EXISTS','Файл не создан! ');

DEFINE('_JOOPDF_PP_UNINST_1','Could not restore the orginal pdf.php file due to <strong>incorrect</strong> permission settings.<br />');
DEFINE('_JOOPDF_PP_UNINST_2','Please set the correct file permissions for the following file:<br />');
DEFINE('_JOOPDF_PP_UNINST_3','<br /><br />After you have corrected the file permissions please restore the orginal files with the cpanel option <strong>Restore Joostina backup files files</strong>');
DEFINE('_JOOPDF_PP_UNINST_REST_ORIG_PDF','Оригинальный файл pdf.php Joostina восстановлен!');
DEFINE('_JOOPDF_PP_UNINST_FAILED_REST_ORIG_PDF','FAILED to restore the orginal Joostina pdf.php file!');

DEFINE('_JOOPDF_PP_TITLE_FORMAT','Формат заголовка');
DEFINE('_JOOPDF_PP_TITLE_FORMAT_HELP','Тэг {title} будет заменен заголовком содержимого.');
DEFINE('_JOOPDF_PP_STANDARD_TITLE_FONT','Шрифт заголовка');
DEFINE('_JOOPDF_PP_STANDARD_TITLE_SIZE','Размер шрифта заголовка');
DEFINE('_JOOPDF_PP_STANDARD_FONT','Стандартный шрифт');
DEFINE('_JOOPDF_PP_STANDARD_SIZE','Стандартный размер шрифта');
DEFINE('_JOOPDF_PP_STANDARD_ENCODING','Кодировка');
DEFINE('_JOOPDF_PP_BULLET_CHAR','Элемент отображения списка');
DEFINE('_JOOPDF_PP_SHOW_IMAGES','Отображение изображений');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN','Позиция изображений по-умолчанию');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_FORCED','Игнорировать позицию изображений по-умолчанию');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_C','По центру');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_L','Слева');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_R','Справа');
DEFINE('_JOOPDF_PP_SHOW_LINKS','Активные ссылки');
DEFINE('_JOOPDF_PP_SHOW_TABLES','Render tables');
DEFINE('_JOOPDF_PP_SHOW_TABLES_HELP','<strong class="red">Beware of incorrect rendering of tables or nested tabels! Test this thorrowly throughout your whole site!</strong>');

DEFINE('_JOOPDF_PP_S_B','<strong>Space below</strong>');
DEFINE('_JOOPDF_PP_H1_FORMAT','Выделение тэга H1');
DEFINE('_JOOPDF_PP_H2_FORMAT','Выделение тэга H2');
DEFINE('_JOOPDF_PP_H3_FORMAT','Выделение тэга H3');
DEFINE('_JOOPDF_PP_H4_FORMAT','Выделение тэга H4');
DEFINE('_JOOPDF_PP_H5_FORMAT','Выделение тэга H5');
DEFINE('_JOOPDF_PP_H6_FORMAT','Выделение тэга H6');
DEFINE('_JOOPDF_PP_IGNORE_FONTSIZE','Игнорировать размеры шрифта менее');

DEFINE('_JOOPDF_PP_TEMPLATE_FILE','Файл шаблона');
DEFINE('_JOOPDF_PP_TEMPLATE_FILE_NONE','Не использовать шаблон');
DEFINE('_JOOPDF_PP_TEMPLATE_FILE_HELP','PDF файл должен находится в /administrator/components/com_joostinapdf/presets/');
DEFINE('_JOOPDF_PP_TEMPLATE_FIRSTPAGE_NO','Шаблон для первой страницы');
DEFINE('_JOOPDF_PP_TEMPLATE_NO_FILES','Не найдены шаблоны PDF файлов в ');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_TOP','Отступ первой страницы вверху');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_BOTTOM','Отступ первой страницы внизу');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_LEFT','Отступ первой страницы слева');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_RIGHT','Отступ первой страницы справа');

DEFINE('_JOOPDF_PP_TEMPLATE_OTHERPAGE_NO','Шаблоны для других страниц');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_TOP','Отступ других страниц вверху');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_BOTTOM','Отступ других страниц внизу');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_LEFT','Отступ других страниц слева');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_RIGHT','Отступ других страниц справа');

DEFINE('_JOOPDF_PP_HEADER_FORMAT','Формат вывода &laquo;Шапки&raquo;');
DEFINE('_JOOPDF_PP_HEADER_POS_X','Позиция &laquo;Шапки&raquo; X');
DEFINE('_JOOPDF_PP_HEADER_POS_Y','Позиция &laquo;Шапки&raquo; Y');
DEFINE('_JOOPDF_PP_FOOTER_FORMAT','Формат вывода &laquo;Подвала&raquo;');
DEFINE('_JOOPDF_PP_FOOTER_POS_X','Позиция &laquo;Подвала&raquo; X (отсчет снизу)');
DEFINE('_JOOPDF_PP_FOOTER_POS_Y','Позиция &laquo;Подвала&raquo; Y (отсчет снизу)');

DEFINE('_JOOPDF_PP_PDF_PREVIEW','Открыть pdf файл для предпросмотра');

DEFINE('_JOOPDF_PP_PROMOTION_FILE','Исходная страница рекламы');
DEFINE('_JOOPDF_PP_PROMOTION_FILE_NONE','Не использовать страницы рекламы');
DEFINE('_JOOPDF_PP_PROMOTION_FILE_HELP','The PDF file with the promotional pages in /administrator/components/com_joostinapdf/presets/');
DEFINE('_JOOPDF_PP_PROMOTION_PAGES','Позиция страниц рекламы');
DEFINE('_JOOPDF_PP_PROMOTION_PAGES_HELP','<p>On what page numbers the promotional pages must be shown. The pages will be picked randomly from the source pdf. (comma seperated, last=last page. Example: 1,3,last)</p>');
DEFINE('_JOOPDF_PP_PROMOTION_NO_FILES','Не найдены рекламные PDF-файлы в ');

DEFINE('_JOOPDF_PP_INSTALL','<p><strong>Ознакомтесь с текстом ниже:</strong></p><p>Click on the button below if you want to (re)install the JoomlAtWork pdf.php file to enable JoostinaPDF.</p><p>(Re)installation must be done if you have received an error message when installing the component. Normally this is due to incorrect file permission settings of the web environment. Please correct these file permission first before reinstallation.</p>');
DEFINE('_JOOPDF_PP_RESTORE','<p><strong>Ознакомтесь с текстом ниже:</strong></p><p>Click on the button if you want to restore the orginal Joomla pdf.php file. By restoring the original pdf.php file you will revert to the default Joomla PDF generation.</p><p>You can reinstall JoostinaPDF again using the Joomlatwork JRE JoostinaPDF control panel.</p>');
DEFINE('_JOOPDF_PP_DOINSTALL','Установка');
DEFINE('_JOOPDF_PP_OKINSTALL','Установка JoostinaPDF завершена успешно!');
DEFINE('_JOOPDF_PP_PERMS_NOK','Please correct the file permission first!');
DEFINE('_JOOPDF_PP_DORESTORE','Восстановить');
DEFINE('_JOOPDF_PP_OKRESTORE','Восстановление оригинального файла pdf.php Joostina закончено успешно!');
DEFINE('_JOOPDF_PP_PERMISSION','can be written?');
DEFINE('_JOOPDF_PP_BACKUP_EXISTS','Backup of original pdf.php exists?');

DEFINE('_JOOPDF_PP_CACHE_ENABLE','Активировать кэш PDF');
DEFINE('_JOOPDF_PP_CACHE_DIR','Папка кэш PDF');
DEFINE('_JOOPDF_PP_CACHE_SEP','Разделитель кэш файла');
DEFINE('_JOOPDF_PP_CACHE_SEP_HELP','<strong class="red">Удостовертесь, что разделитель имени кэш PDF не присутствует в названии директории кэш!</strong>');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY','Настройки кэш');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY0','Обновление один раз в день');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY1','Обновление при модификации');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY2','Обновление один раз в день и при модификации');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY3','Обновление после x-запросов браузера');
DEFINE('_JOOPDF_PP_CACHE_FILES','Currently cached files');
DEFINE('_JOOPDF_PP_CACHE_FILES_CONTENTID','Id содержимого');
DEFINE('_JOOPDF_PP_CACHE_FILES_MODIFYDATE','Дата модификации');
DEFINE('_JOOPDF_PP_CACHE_FILES_RENDERDATE','Render Date');
DEFINE('_JOOPDF_PP_CACHE_FILES_ACCESSCNT','Счетчик запросов (используется для настроек x-запросов браузера)');
DEFINE('_JOOPDF_PP_CACHE_REFRESH','Обновить');

DEFINE('_JOOPDF_PP_REPLACEMENT','Замены');
DEFINE('_JOOPDF_PP_REPLACEMENT_HELP','<p>Replacements must be entered one on each line and must be like: <em>some text=some replacement</em></p><p>The * can be used once in the <em>some text</em> part and acts as a placeholder for any number of characters.</p><p>The = sign can NOT be used the <em>some text</em> part.</p><p>Examples:</p><ul><li>{mospagebreak*}=&lt;br /&gt; This suppresses mospagebreaks to avoid forced new pages</li><li>{styleboxjp*}=&lt;font color="red"&gt; Renders the styleboxjp mambots to red-text output</li><li>{/styleboxjp}=&lt;/font&gt; This is the close tag for the styleboxjp mambot</li></ul>');

// CPANEL definition
$i=1;
$cpanel[$i]['TASK'] = 'styleconfig';
$cpanel[$i]['TEXT'] = 'Генерация стилей в PDF';
$cpanel[$i]['DESCR'] = 'Настройка генерации PDF стилей содержимого';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'templateconfig';
$cpanel[$i]['TEXT'] = 'Шаблон PDF';
$cpanel[$i]['DESCR'] = 'Выбор и настройка генерируемого шаблона PDF';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'headerfooterconfig';
$cpanel[$i]['TEXT'] = '&laquo;Шапка&raquo; и &laquo;Подвал&raquo; PDF';
$cpanel[$i]['DESCR'] = 'Настройка &laquo;Шапки&raquo; и &laquo;Подвала&raquo; генерируемых PDF';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'replacementconfig';
$cpanel[$i]['TEXT'] = 'Атозамена в PDF';
$cpanel[$i]['DESCR'] = 'Настройка опциональной замены тэгов и/или мамботов';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/replacement.png';
++$i;
$cpanel[$i]['TASK'] = 'install';
$cpanel[$i]['TEXT'] = 'Установить pdf.php JoostinaPDF';
$cpanel[$i]['DESCR'] = 'Установка JoostinaPDF pdf.php файла в папку /includes.';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/install.png';
++$i;
$cpanel[$i]['TASK'] = 'restore';
$cpanel[$i]['TEXT'] = 'Восстановить pdf.php Joostina';
$cpanel[$i]['DESCR'] = 'Восстановление оригинального файла pdf.php Joostina из бэкапа';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/restore.png';
++$i;
$cpanel[$i]['TASK'] = 'promotionconfig';
$cpanel[$i]['TEXT'] = 'Реклама в PDF';
$cpanel[$i]['DESCR'] = 'Опциональная настройка дополнительных рекламных страниц';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/adw.png';
++$i;
$cpanel[$i]['TASK'] = 'cache';
$cpanel[$i]['TEXT'] = 'Кэш PDF файлов';
$cpanel[$i]['DESCR'] = 'Настройка и управление кэш PDF файлов';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/database.png';
++$i;
$cpanel[$i]['TASK'] = '';
$cpanel[$i]['TEXT'] = 'Техподдержка JoostinaPDF';
$cpanel[$i]['DESCR'] = 'Проверить новую версию или воспользоваться техподдержкой (в новом окне)';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/support.png';
$cpanel[$i]['URL'] = 'http://www.joostina.ru/';
?>