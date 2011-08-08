<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// заборона прямого доступу
defined('_VALID_MOS') or die();
//index
define('_INSTALL_TITLE','Joostina - Web-встановлення. Перевірка системи');
define('_INSTALL_JOOSITNA','Перевірка системи');
define('_INSTALL_SISREV','Перевірка системи');
define('_INSTALL_RECHECK','Перевірити знову');
define('_INSTALL_NEXT','Далі >>');
define('_INSTALL_LICENSE','Ліцензія');
define('_INSTALL_STEP1','Крок 1');
define('_INSTALL_STEP2','Крок 2');
define('_INSTALL_STEP3','Крок 3');
define('_INSTALL_STEP4','Крок 4');
define('_INSTALL_CHECK_SERV_OPTS','Перевірка налаштувань сервера:');
define('_INSTALL_PHPVERSION','Версія PHP >= 4.1.0');
define('_INSTALL_ZLIB','&nbsp; - підтримка zlib-стиску');
define('_INSTALL_XML','&nbsp; - підтримка XML');
define('_INSTALL_MYSQL','&nbsp; - підтримка MySQL');
define('_INSTALL_NO','<b><font color="red">Ні</font></b>');
define('_INSTALL_YES','<b><font color="green">Так</font></b>');
define('_INSTALL_WRITE','<b><font color="green">Доступний</font></b>');
define('_INSTALL_UNWRITE','<b><font color="red">Недоступний</font></b>');
define('_INSTALL_CONFIGFILE','Файл <strong>configuration.php</strong>');
define('_INSTALL_CONFIGFILE_TEXT','<b><font color="red">Недоступний для запису</font></b><br /><span class="small">Ви можете продовжувати установку, значення файлу конфігурації будуть показані наприкінці. ОБОВ\'ЯЗКОВО ЗБЕРЕЖІТЬ ЙОГО: скопіюйте/вставте вміст в створений вами файл configuration.php і завантажте на сервер!</span>');
define('_INSTALL_SESSION_CAT','Каталог для запису сесій');
define('_INSTALL_NOTINSTALL','Не встановлений');
define('_INSTALL_REGISTER_GLOBALS_OFF_ON','Параметр PHP magic_quotes_gpc - `OFF` замість `ON`');
define('_INSTALL_REGISTER_GLOBALS_ON_OFF','Параметр PHP register_globals - `ON` замість `OFF`');
define('_INSTALL_RG_EMULATION_ON_OFF','Параметр RG_EMULATION в файлі globals.php -<br />`ON` замість `OFF`<br /><span style="font-weight:normal;font-style:italic;color:#666;">`ON` - за замовчуванням - для сумісності</span>');
define('_INSTALL_DIRECTIVE','Директива');
define('_INSTALL_RECOMEND','Рекомендовано');
define('_INSTALL_INSTALLING','Встановлено');
define('_INSTALL_TEXT1','Якщо на сервері є налаштування, здатні привести до помилок під час встановлення або работи Joostina, то на цій сторінці вони будуть відзначені <b><font color="red">червоним кольором</font></b>. Для повноцінної й безпроблемної роботи системи рекомендуємо виправити всі необхідні налаштування.');
define('_INSTALL_TEST','Перевірка безпеки:');
define('_INSTALL_TEXT2','<p>Наступні параметри PHP є неоптимальними для <strong>безпеки</strong>, їх рекомендується змінити:</p><p>Будь ласка, за додатковою інформацією звертайтеся на <a href="http://forum.joomla.org/index.php/topic,81058.0.html" target="_blank">офіційний форум Joomla! - теми про безпеку</a>.</p>');
define('_INSTALL_PHP_REC_SETS','Рекомендуються параметри PHP:');
define('_INSTALL_TEXT3','&nbsp;&nbsp;Ці параметри PHP рекомендуються для повної сумісності з Joostina.<br />Однак, Joostina буде працювати, якщо ці параметри не повною мірою відповідають тим, що рекомендуються.');
define('_INSTALL_RG_EMULATION','Емуляція Register Globals');
define('_INSTALL_ALL_SERV_CHARS','Розширені характеристики сервера');
define('_INSTALL_TEXT4','Зазначені параметри сервера не є критичними для работи, але відповідність вказаним значенням додадуть роботі з Joostina максимальну зручність і безпеку.');
define('_INSTALL_FILES_AND_CATS_PERMS','Права доступу до файлів і каталогів:');
define('_INSTALL_TEXT5','Для нормальної работи Joostina необхідно, щоб на певні файли й каталоги були встановлені права запису. Якщо ви бачите <b><font color="red">Недоступний для запису</font></b> для деяких файлів і каталогів, то необхідно встановити на них права доступу, що дозволяють перезаписувати їх.');
define('_INSTALL_REV_PERMS_SISCATS','Перевірити права доступу до системних каталогів');
define('_INSTALL_FOOTER','<a href="http://www.joostina.ru" target="_blank" title="Joostina">Joostina</a> - вільне програмне забезпечення, що розповсюджується по ліцензії GNU/GPL.');
define('_INSTALL_WRITEABLE','<b><font color="green">Доступний для запису</font></b>');
define('_INSTALL_UNWRITEABLE','<b><font color="red">Недоступний для запису</font></b>');
//install
define('_INSTALL_TITLE1','Joostina - Web-встановлення. Прийняття ліцензії');
define('_INSTALL_LICENSE1','<span>Ліцензія</span>');
define('_INSTALL_LICENSETEXT','Joostina- вільне програмне забезпечення, що розповсюджується по ліцензії GNU/GPL, для використання системи Ви повинні повністю погодитися з наданою ліцензією.');
//install1
define('_INSTALL_TITLE2','Joostina - Web-встановлення. Крок 1 - конфігурація бази даних.');
define('_INSTALL_DB_CONFIG','<span>Конфігурації бази даних</span>');
define('_INSTALL_1_INFO1','Будь ласка, введіть ім\'я Хоста MySQL.');
define('_INSTALL_1_INFO2','Будь ласка, введіть ім\'я користувача Бази Даних MySQL.');
define('_INSTALL_1_INFO3','Будь ласка, введіть ім\'я для своєї нової БД.');
define('_INSTALL_1_INFO4','Для правильної роботи Joostina Ви повинні ввести префікс таблиць БД MySQL.');
define('_INSTALL_1_INFO5','Ви не можете использовать префикс таблиц "old_", так как Joostina использует его для создания резервных таблиц.');
define('_INSTALL_1_INFO6','Ви впевнені, що правильно ввели дані? Joostina буде заповнювати таблиці в БД, параметри якої Ви вказали.');
define('_INSTALL_DBHOSTNAME','Ім\'я хоста MySQL');
define('_INSTALL_DBHOSTNAME_TEXT','Зазвичай це <b>localhost</b>.');
define('_INSTALL_DBUSERNAME','Ім\'я користувача MySQL');
define('_INSTALL_DBUSERNAME_TEXT','Для встановлення на домашньому комп\'ютері найчастіше використовується ім\'я <b><font color="green">root</font></b>, а для встановлення в Інтернеті, введіть дані, отримані у Хостера.');
define('_INSTALL_DBPASSWORD','Пароль доступу до БД MySQL');
define('_INSTALL_DBPASSWORD_TEXT','Залиште поле порожнім для домашнього встановлення або введіть пароль доступу до Вашої БД, отриманий у хостера.');
define('_INSTALL_DBNAME','Ім\'я БД MySQL');
define('_INSTALL_DBNAME_TEXT','Ім\'я існуючої або нової БД, що буде використовуватися для сайту.');
define('_INSTALL_DBPREFIX','Префікс таблиць БД MySQL');
define('_INSTALL_DBPREFIX_TEXT','Використовуйте префікс таблиць для встановлення в одну БД. Не використовуйте <font color="red">old_</font> - це зарезервоване значення.');
define('_INSTALL_DBDEL','Видалити існуючі таблиці');
define('_INSTALL_DBDEL_TEXT','Всі існуючі таблиці від попередніх встановлень Joostina будуть вилучені.');
define('_INSTALL_DBBACKUP','Створити резервні копії існуючих таблиць');
define('_INSTALL_DBBACKUP_TEXT','Всі існуючі резервні копії таблиць від попередніх встановлень Joostina будуть замінені.');
define('_INSTALL_DBSAMPLE','Встановити демонстраційні дані');
define('_INSTALL_DBSAMPLE_TEXT','Не виключайте це, якщо Ви ще не знайомі з Joostina!');
define('_INSTALL_DBOLD','Підтримка MySQL молодше 4.1');
define('_INSTALL_DBOLD_TEXT','Використовувати роботу в режимі сумісності з молодшими версіями бази даних.');
define('_INSTALL_DBEXP','Новий тип таблиць');
define('_INSTALL_DBEXP_TEXT','<font color="red"><b>УВАГА! Експериментальний пункт.</b><br />Використовувати новий тип таблиць для роботи системи.</font>');
//install2
define('_INSTALL_TITLE3','Joostina - Web-встановлення. Крок 2 - назва вашого сайту.');
define('_INSTALL_SITENAME','<span>Назва сайту</span>');
define('_INSTALL_DB_INPUT_ERROR','Виникли помилки при вставці даних у вашу базу даних!<br />Продовження встановлення НЕМОЖЛИВО!');
define('_INSTALL_SITENAME_TEXT','Воно використовується при автоматичному відправленні повідомлень по електронній пошті й може відображатися в заголовку сайту.');
define('_INSTALL_SITENAME_VAR','Наприклад: Мій новий сайт!');
define('_INSTALL_ERRORS','Помилки:');
define('_INSTALL_2_INFO1','Введіть назву Вашого сайту!');
define('_INSTALL_2_INFO2','Помилка створення даних: ');
define('_INSTALL_2_INFO3','Вами введені невірні дані про БД MySQL або не заповнені необхідні поля форми.');
define('_INSTALL_2_INFO4','Ви можете не вводити префікс бази даних.');
define('_INSTALL_2_INFO5','Введені невірні ім\'я користувача й пароль.');
//install3
define('_INSTALL_TITLE4','Joostina - Web-встановлення. Крок 3 - конфігурація сайту');
define('_INSTALL_SITECONFIG','<span>конфігурація сайту</span>');
define('_INSTALL_SITECONFIG_TEXT','<p>Якщо ви не впевнені в правильності настроювань, залишіть значення за замовченням.<br />Пізніше Ви зможете змінити ці налаштування в глобальній конфігурації сайту.</p>');
define('_INSTALL_ALL','Всі:');
define('_INSTALL_GROUP','Група:');
define('_INSTALL_OWNER','Власник:');
define('_INSTALL_READ','читання');
define('_INSTALL_WRITE','запис');
define('_INSTALL_SEARCH','пошук');
define('_INSTALL_EXECUTE','виконання');
define('_INSTALL_DIRPERMS','Права доступу до каталогів');
define('_INSTALL_DIRPERMS_TEXT','Не міняти CHMOD (використовувати умовчання сервера)');
define('_INSTALL_DIRPERMS_CHMOD','CHMOD каталогів:');
define('_INSTALL_FILEPERMS','Права доступу до файлів');
define('_INSTALL_FILEPERMS_TEXT','Не міняти CHMOD (використовувати умовчання сервера)');
define('_INSTALL_FILEPERMS_CHMOD','CHMOD файлів:');
define('_INSTALL_ADMINPASSWORD','Пароль Адміністратора');
define('_INSTALL_ADMINPASSWORD_TEXT','Рекомендується використовувати пароль не коротше <b>6</b> символів.');
define('_INSTALL_ADMINEMAIL','Ваш E-mail');
define('_INSTALL_ADMINEMAIL_TEXT','Використовується як адреса головного Адміністратора сайту.');
define('_INSTALL_ADMINLOGIN','Ваш логін');
define('_INSTALL_ADMINLOGIN_TEXT','Використовується як логін для авторизації головного Адміністратора сайту.');
define('_INSTALL_SITEURL','URL сайту');
define('_INSTALL_ABSOLUTEPATH','Абсолютний шлях');
define('_INSTALL_3_INFO1','Введіть URL сайта.');
define('_INSTALL_3_INFO2','Введіть абсолютний шлях до вашого сайту.');
define('_INSTALL_3_INFO3','Введіть E-mail Адміністратора сайту для зв\'язку з ним.');
define('_INSTALL_3_INFO4','Введіть пароль вашого Адміністратора.');
//install4
define('_INSTALL_TITLE5','Joostina - Web-встановлення. Крок 4 - встановлення завершено');
define('_INSTALL_4_INFO1','<span id="alert_mess" class="error">БУДЬ ЛАСКА, ВИДАЛІТЬ КАТАЛОГ "INSTALLATION",<br />ІНАКШЕ ВАШ САЙТ НЕ ЗАВАНТАЖИТЬСЯ</span>');
define('_INSTALL_SITEVIEW','Перегляд сайту');
define('_INSTALL_ADMINPANEL','Панель керування');
define('_INSTALL_DEL_INSTALL','Видалити installation');
define('_INSTALL_ADMININFO','Дані для авторизації Головного Адміністратора сайту:');
define('_INSTALL_LOGIN','Логін: ');
define('_INSTALL_PASSWORD','Пароль: ');
define('_INSTALL_CONFIGFILE_ERROR','Ваш конфігураційний файл або потрібний каталог недоступні для запису, або є якась проблема зі створенням основного конфігураційного файлу. Вам доведеться завантажити цей код вручну.<br />ОБОВ\'ЯЗКОВО виділіть та скопіюйте весь наступний код:');
define('_INSTALL_CHMOD_REPORT1','Права доступу до файлів і каталогів не змінені.');
define('_INSTALL_CHMOD_REPORT2','Права доступу до файлів і каталогів успішно змінені.');
define('_INSTALL_CHMOD_REPORT3','Права доступу до файлів і каталогів не можуть бути змінені.<br />Будь ласка, установіть CHMOD каталогів та файлів Joostina вручну.');