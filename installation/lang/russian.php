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
//index
define('_INSTALL_TITLE','Joostina - Web-установка. Проверка системы');
define('_INSTALL_JOOSITNA','Проверка системы');
define('_INSTALL_SISREV','Проверка системы');
define('_INSTALL_RECHECK','Проверить снова');
define('_INSTALL_NEXT','Далее &gt;&gt;');
define('_INSTALL_LICENSE','Лицензия');
define('_INSTALL_STEP1','Шаг 1');
define('_INSTALL_STEP2','Шаг 2');
define('_INSTALL_STEP3','Шаг 3');
define('_INSTALL_STEP4','Шаг 4');
define('_INSTALL_CHECK_SERV_OPTS','Проверка настроек сервера:');
define('_INSTALL_PHPVERSION','Версия PHP >= 4.1.0');
define('_INSTALL_ZLIB','&nbsp; - поддержка zlib-сжатия');
define('_INSTALL_XML','&nbsp; - поддержка XML');
define('_INSTALL_MYSQL','&nbsp; - поддержка MySQL');
define('_INSTALL_NO','<strong class="red">Нет</strong>');
define('_INSTALL_YES','<strong class="green">Да</strong>');
define('_INSTALL_WRITE','<strong class="green">Доступна</strong>');
define('_INSTALL_UNWRITE','<strong class="red">Недоступна</strong>');
define('_INSTALL_CONFIGFILE','Файл <strong>configuration.php</strong>');
define('_INSTALL_CONFIGFILE_TEXT','<strong class="red">Недоступен для записи</strong><br /><span class="small">Вы можете продолжать установку, значения файла конфигурации будут показаны в конце. ОБЯЗАТЕЛЬНО СОХРАНИТЕ ЕГО: скопируйте/вставьте содержимое в созданный вами файл configuration.php и загрузите на сервер!</span>');
define('_INSTALL_SESSION_CAT','Каталог для записи сессий');
define('_INSTALL_NOTINSTALL','Не установлен');
define('_INSTALL_REGISTER_GLOBALS_OFF_ON','Параметр PHP magic_quotes_gpc - &laquo;OFF&raquo; вместо &laquo;ON&raquo;');
define('_INSTALL_REGISTER_GLOBALS_ON_OFF','Параметр PHP register_globals - &laquo;ON&raquo; вместо &laquo;OFF&raquo;');
define('_INSTALL_RG_EMULATION_ON_OFF','Параметр RG_EMULATION в файле globals.php -<br />&laquo;ON&raquo; вместо &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - по умолчанию - для совместимости</span>');
define('_INSTALL_DIRECTIVE','Директива');
define('_INSTALL_RECOMEND','Рекомендовано');
define('_INSTALL_INSTALLING','Установлено');
define('_INSTALL_TEXT1','Если на сервере имеются настройки, способные привести к ошибкам во время установки или работы Joostina, то на этой странице они будут отмечены <strong class="red">красным цветом</strong>. Для полноценной и без проблемной работы системы рекомендуем исправить все необходимые настройки.');
define('_INSTALL_TEST','Проверка безопасности:');
define('_INSTALL_TEXT2','<p>Следующие параметры PHP являются неоптимальными для <strong>Безопасности</strong> и их рекомендуется изменить:</p><p>Пожалуйста, за дополнительной информацией обращайтесь на <a href="http://forum.joostina.ru" target="_blank">официальный форум Joostina</a>.</p>');
define('_INSTALL_PHP_REC_SETS','Рекомендуемые параметры PHP:');
define('_INSTALL_TEXT3','&nbsp;&nbsp;Эти параметры PHP рекомендуются для полной совместимости с Joostina.<br />Однако, Joostina будет работать, если эти параметры не в полной мере соответствуют рекомендуемым.');
define('_INSTALL_RG_EMULATION','Эмуляция Register Globals');
define('_INSTALL_ALL_SERV_CHARS','Расширенные характеристики сервера');
define('_INSTALL_TEXT4','Указанные параметры севера не являются критичными для работы, но соответствие указанным значениям придадут работе с Joostina максимальное удобство и безопасность.');
define('_INSTALL_FILES_AND_CATS_PERMS','Права доступа к файлам и каталогам:');
define('_INSTALL_TEXT5','Для нормальной работы Joostina необходимо, чтобы на определенные файлы и каталоги были установлены права записи. Если вы видите <strong class="red">Недоступен для записи</strong> для некоторых файлов и каталогов, то необходимо установить на них права доступа, позволяющие перезаписывать их.');
define('_INSTALL_REV_PERMS_SISCATS','Проверить права доступа к системным каталогам');
define('_INSTALL_FOOTER','<a href="http://www.joostina.ru" target="_blank" title="Joostina">Joostina</a> - свободное программное обеспечение, распространяемое по лицензии GNU/GPL.');
define('_INSTALL_WRITEABLE','<strong class="green">Доступен для записи</strong>');
define('_INSTALL_UNWRITEABLE','<strong class="red">Недоступен для записи</strong>');
//install
define('_INSTALL_TITLE1','Joostina - Web-установка. Принятие лицензии');
define('_INSTALL_LICENSE1','<span>Лицензия</span>');
define('_INSTALL_LICENSETEXT','Joostina- свободное программное обеспечение, распространяемое по лицензии GNU/GPL, для использования системы Вы должны полностью согласиться с предоставленной лицензией.');
//install1
define('_INSTALL_TITLE2','Joostina - Web-установка. Шаг 1 - конфигурация базы данных.');
define('_INSTALL_DB_CONFIG','<span>Конфигурации базы данных</span>');
define('_INSTALL_1_INFO1','Пожалуйста, введите имя Хоста MySQL.');
define('_INSTALL_1_INFO2','Пожалуйста, введите имя пользователя Базы Данных MySQL.');
define('_INSTALL_1_INFO3','Пожалуйста, введите Имя для своей новой БД.');
define('_INSTALL_1_INFO4','Для правильной работы Joostina Вы должны ввести префикс таблиц БД MySQL.');
define('_INSTALL_1_INFO5','Вы не можете использовать префикс таблиц &laquo;old_&raquo;, так как Joostina использует его для создания резервных таблиц.');
define('_INSTALL_1_INFO6','Вы уверены, что правильно ввели данные? Joostina будет заполнять таблицы в БД, параметры которой Вы указали.');
define('_INSTALL_DBHOSTNAME','Имя хоста MySQL');
define('_INSTALL_DBHOSTNAME_TEXT','Обычно это <strong>localhost</strong>.');
define('_INSTALL_DBUSERNAME','Имя пользователя MySQL');
define('_INSTALL_DBUSERNAME_TEXT','Для установки на домашнем компьютере чаще всего используется имя <strong class="green">root</strong>, а для установки в Интернете, введите данные, полученные у Хостера.');
define('_INSTALL_DBPASSWORD','Пароль доступа к БД MySQL');
define('_INSTALL_DBPASSWORD_TEXT','Оставьте поле пустым для домашней установки или введите пароль доступа к Вашей БД, полученный у хостера.');
define('_INSTALL_DBNAME','Имя БД MySQL');
define('_INSTALL_DBNAME_TEXT','Имя существующей или новой БД, которая будет использоваться для сайта.');
define('_INSTALL_DBPREFIX','Префикс таблиц БД MySQL');
define('_INSTALL_DBPREFIX_TEXT','Используйте префикс таблиц для установки в одну БД. Не используйте <strong class="red">old_</strong> - это зарезервированное значение.');
define('_INSTALL_DBDEL','Удалить существующие таблицы');
define('_INSTALL_DBDEL_TEXT','Все существующие таблицы от предыдущих установок Joostina будут удалены.');
define('_INSTALL_DBBACKUP','Создать резервные копии существующих таблиц');
define('_INSTALL_DBBACKUP_TEXT','Все существующие резервные копии таблиц от предыдущих установок Joostina будут заменены.');
define('_INSTALL_DBSAMPLE','Установить демонстрационные данные');
define('_INSTALL_DBSAMPLE_TEXT','Не выключайте это, если Вы ещё не знакомы с Joostina!');
define('_INSTALL_DBOLD','Поддержка MySQL младше 4.1');
define('_INSTALL_DBOLD_TEXT','Использовать работу в режиме совместимости с младшими версиями базы данных.');
define('_INSTALL_DBEXP','Новый тип таблиц');
define('_INSTALL_DBEXP_TEXT','<strong class="red">ВНИМАНИЕ! Экспериментальный пункт.</strong><br />Использовать новый тип таблиц для работы системы.');
//install2
define('_INSTALL_TITLE3','Joostina - Web-установка. Шаг 2 - название вашего сайта.');
define('_INSTALL_SITENAME','<span>Название сайта</span>');
define('_INSTALL_DB_INPUT_ERROR','Произошли ошибки при вставке данных в вашу базу данных!<br />Продолжение установки НЕВОЗМОЖНО!');
define('_INSTALL_SITENAME_TEXT','Оно используется при автоматической отправке сообщений по электронной почте и может отображается в заголовке сайта.');
define('_INSTALL_SITENAME_VAR','Например: Мой новый сайт!');
define('_INSTALL_ERRORS','Ошибки:');
define('_INSTALL_2_INFO1','Введите название Вашего сайта!');
define('_INSTALL_2_INFO2','Ошибка создания данных: ');
define('_INSTALL_2_INFO3','Вами введены неверные данные о БД MySQL или не заполнены необходимые поля формы.');
define('_INSTALL_2_INFO4','Вы можете не вводить префикс базы данных.');
define('_INSTALL_2_INFO5','Введены неверные имя пользователя и пароль.');
//install3
define('_INSTALL_TITLE4','Joostina - Web-установка. Шаг 3 - конфигурация сайта');
define('_INSTALL_SITECONFIG','<span>Конфигурация сайта</span>');
define('_INSTALL_SITECONFIG_TEXT','<p>Если вы не уверены в правильности настроек, оставьте значения по умолчанию.<br />Позже Вы сможете изменить эти настройки в глобальной конфигурации сайта.</p>');
define('_INSTALL_ALL','Все:');
define('_INSTALL_GROUP','Группа:');
define('_INSTALL_OWNER','Владелец:');
define('_INSTALL_READ','чтение');
define('_INSTALL_WRITE','запись');
define('_INSTALL_SEARCH','поиск');
define('_INSTALL_EXECUTE','выполнение');
define('_INSTALL_DIRPERMS','Права доступа к каталогам');
define('_INSTALL_DIRPERMS_TEXT','Не менять CHMOD (использовать умолчания сервера)');
define('_INSTALL_DIRPERMS_CHMOD','CHMOD каталогов:');
define('_INSTALL_FILEPERMS','Права доступа к файлам');
define('_INSTALL_FILEPERMS_TEXT','Не менять CHMOD (использовать умолчания сервера)');
define('_INSTALL_FILEPERMS_CHMOD','CHMOD файлов:');
define('_INSTALL_ADMINPASSWORD','Пароль Администратора');
define('_INSTALL_ADMINPASSWORD_TEXT','Рекомендуется использовать пароль не короче <strong>6</strong> символов.');
define('_INSTALL_ADMINEMAIL','Ваш E-mail');
define('_INSTALL_ADMINEMAIL_TEXT','Используется как адрес главного Администратора сайта.');
define('_INSTALL_ADMINLOGIN','Ваш логин');
define('_INSTALL_ADMINLOGIN_TEXT','Используется как логин для авторизации главного Администратора сайта.');
define('_INSTALL_SITEURL','URL сайта');
define('_INSTALL_ABSOLUTEPATH','Абсолютный путь');
define('_INSTALL_3_INFO1','Введите URL сайта.');
define('_INSTALL_3_INFO2','Введите абсолютный путь до вашего сайта.');
define('_INSTALL_3_INFO3','Введите E-mail Администратора сайта для связи с ним.');
define('_INSTALL_3_INFO4','Введите пароль вашего Администратора.');
//install4
define('_INSTALL_TITLE5','Joostina - Web-установка. Шаг 4 - установка завершена');
define('_INSTALL_4_INFO1','<span id="alert_mess" class="error">ПОЖАЛУЙСТА, УДАЛИТЕ КАТАЛОГ &laquo;INSTALLATION&raquo;,<br />ИНАЧЕ ВАШ САЙТ НЕ ЗАГРУЗИТСЯ</span>');
define('_INSTALL_SITEVIEW','Просмотр сайта');
define('_INSTALL_ADMINPANEL','Панель управления');
define('_INSTALL_DEL_INSTALL','Удалить installation');
define('_INSTALL_ADMININFO','Данные для авторизации Главного Администратора сайта:');
define('_INSTALL_LOGIN','Логин: ');
define('_INSTALL_PASSWORD','Пароль: ');
define('_INSTALL_CONFIGFILE_ERROR','Ваш конфигурационный файл или нужный каталог недоступны для записи, или есть какая-то проблема с созданием основного конфигурационного файла. Вам придется загрузить этот код вручную.<br />ОБЯЗАТЕЛЬНО выделите и скопируйте весь следующий код:');
define('_INSTALL_CHMOD_REPORT1','Права доступа к файлам и каталогам не изменены.');
define('_INSTALL_CHMOD_REPORT2','Права доступа к файлам и каталогам успешно изменены.');
define('_INSTALL_CHMOD_REPORT3','Права доступа к файлам и каталогам не могут быть изменены.<br />Пожалуйста, установите CHMOD каталогов и файлов Joostina вручную.');