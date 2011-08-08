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
global $mosConfig_form_date, $mosConfig_form_date_full;

// Сторінка сайту не знайдена
define('_404', 'Сторінка, що запрошується, не знайдена.');
define('_404_RTS', 'Повернутись на сайт.');

define('_SYSERR1', 'Немає підтримки  MySQL.');
define('_SYSERR2', 'Неможливо підключитися до сервера бази даних.');
define('_SYSERR3', 'Неможливо підключитися до бази даних.');

// загальне
DEFINE('_LANGUAGE', 'ru');
DEFINE('_NOT_AUTH', 'Вибачте, але для перегляду цієї сторінки у Вас недостатньо прав.');
DEFINE('_DO_LOGIN', 'Ви повинні авторизуватися або пройти реєстрацію.');
DEFINE('_VALID_AZ09', 'Будь ласка, перевірте, чи правильно написано %s.  Імя не повинно містити пробілів, тільки символи 0-9,a-z,A-Z і мати довжину не менше %d символів.');
DEFINE('_VALID_AZ09_USER', 'Будь ласка, правильно введіть %s. Має містити тільки символи 0-9,a-z,A-Z і мати довжину не менше %d символів.');
DEFINE('_CMN_YES', 'Так');
DEFINE('_CMN_NO', 'Ні');
DEFINE('_CMN_SHOW', 'Показати');
DEFINE('_CMN_HIDE', 'Сховати');
DEFINE('_CMN_NAME', 'Імя');
DEFINE('_CMN_DESCRIPTION', 'Опис');
DEFINE('_CMN_SAVE', 'Зберегти');
DEFINE('_CMN_APPLY', 'Застосувати');
DEFINE('_CMN_CANCEL', 'Відміна');
DEFINE('_CMN_PRINT', 'Друк');
DEFINE('_CMN_EMAIL', 'E-mail');
DEFINE('_CMN_SITEMAP', 'Карта сайту');
DEFINE('_ICON_SEP', '|');
DEFINE('_CMN_PARENT', 'Родитель');
DEFINE('_CMN_ORDERING', 'Сортування');
DEFINE('_CMN_ACCESS', 'Рівень доступу');
DEFINE('_CMN_SELECT', 'Вибрати');
DEFINE('_CMN_NEXT', 'Наст.');
DEFINE('_CMN_NEXT_ARROW', '&nbsp;&raquo;');
DEFINE('_CMN_PREV', 'Попер.');
DEFINE('_CMN_PREV_ARROW', '&laquo;&nbsp;');
DEFINE('_CMN_SORT_NONE', 'Без сортування');
DEFINE('_CMN_SORT_ASC', 'По зростанню');
DEFINE('_CMN_SORT_DESC', 'По убуванню');
DEFINE('_CMN_NEW', 'Створити');
DEFINE('_CMN_NONE', 'Ні');
DEFINE('_CMN_LEFT', 'Ліворуч');
DEFINE('_CMN_RIGHT', 'Праворуч');
DEFINE('_CMN_CENTER', 'По центру');
DEFINE('_CMN_ARCHIVE', 'Додати в архів');
DEFINE('_CMN_UNARCHIVE', 'Витягти з архіву');
DEFINE('_CMN_TOP', 'Угорі');
DEFINE('_CMN_BOTTOM', 'Внизу');
DEFINE('_CMN_PUBLISHED', 'Опубліковано');
DEFINE('_CMN_UNPUBLISHED', 'Не опубліковано');
DEFINE('_CMN_EDIT_HTML', 'Редагувати HTML');
DEFINE('_CMN_EDIT_CSS', 'Редагувати CSS');
DEFINE('_CMN_DELETE', 'Видалити');
DEFINE('_CMN_FOLDER', 'Каталог');
DEFINE('_CMN_SUBFOLDER', 'Підкаталог');
DEFINE('_CMN_OPTIONAL', 'Не обовязково');
DEFINE('_CMN_REQUIRED', 'Обовязково');
DEFINE('_CMN_CONTINUE', 'Продовжити');
DEFINE('_STATIC_CONTENT', 'Статичний вміст');
DEFINE('_CMN_NEW_ITEM_LAST', 'За замовчуванням нові обєкти будуть додані в кінець списку. Порядок розташування може бути змінений тільки після збереження обєкта.');
DEFINE('_CMN_NEW_ITEM_FIRST', 'За замовчуванням нові обєкти будуть додані в початок списку. Порядок розташування може бути змінений тільки після збереження обєкта.');
DEFINE('_LOGIN_INCOMPLETE', 'Будь ласка, заповніть поля Імя користувача й Пароль.');
DEFINE('_LOGIN_BLOCKED', 'Вибачте, ваш обліковий запис заблокований. За більше докладною інформацією зверніться до адміністратора сайту.');
DEFINE('_LOGIN_INCORRECT', 'Невірні імя користувача (логін) або пароль. Спробуйте ще раз.');
DEFINE('_LOGIN_NOADMINS', 'Вибачте, ви не можете ввійти на сайт. Адміністратори на сайті не зареєстровані.');
DEFINE('_CMN_JAVASCRIPT', 'Увага! Для виконання даної операції, у вашім браузері повинна бути включена підтримка Java-script.');
DEFINE('_NEW_MESSAGE', 'Вам прийшло нове особисте повідомлення.');
DEFINE('_MESSAGE_FAILED', 'Користувач заблокував свою поштову скриньку. Повідомлення не доставлене.');
DEFINE('_CMN_IFRAMES', 'Ця сторінка буде відображена некоректно. Ваш браузер не підтримує вкладені фрейми (IFrame).');
DEFINE('_INSTALL_3PD_WARN', 'Попередження: Установка сторонніх розширень може порушити безпеку вашого сайту. При відновленні Joomla! сторонні розширення не обновлюються.<br />Для отримання додаткової інформації про міри захисту свого сайту й сервера, будь ласка, відвідайте <a href="http://forum.joomla.org/index.php/board,267.0.html" target="_blank" style="color:blue;text-decoration:underline;">Форум безпеки Joomla!</a>.');
DEFINE('_INSTALL_WARN', 'З міркувань безпеки, будь ласка, видаліть каталог <strong>installation</strong> з вашого сервера й обновите сторінку.');
DEFINE('_TEMPLATE_WARN', '<font color="red"><strong>Файл шаблону не знайдений!</strong></font><br />Зайдіть у Панель керування сайтом і виберіть новий шаблон.');
DEFINE('_NO_PARAMS', 'Обєкт не містить параметрів, що налаштовуються.');
DEFINE('_HANDLER', 'Оброблювач для даного типу відсутній');

/** мамботи */
DEFINE('_TOC_JUMPTO', 'Зміст');

/* plugin_jw_ajaxvote */
DEFINE('_PJA_SAVE', 'Збереження');
DEFINE('_PJA_YOU_VOTE_ADD', 'Ваш голос вже зарахований!');
DEFINE('_PJA_VOTE', 'голос');
DEFINE('_PJA_VOTES', 'голосів');
DEFINE('_PJA_THANKS_FULL', 'Дякуємо за Ваш голос! Результати будуть оновлені після перерахунку.');
DEFINE('_PJA_THANKS', 'Дякуємо за Ваш голос!');

/* joostinasocialbot */
DEFINE('_JSB_ADD', 'Добавити закладку в:');

/**  зміст */
DEFINE('_READ_MORE', 'Докладніше...');
DEFINE('_READ_MORE_REGISTER', 'Тільки для зареєстрованих користувачів…');
DEFINE('_MORE', 'Далі…');
DEFINE('_ON_NEW_CONTENT', 'Користувач [ %s ] добавив новий обєкт [ %s ]. Розділ: [ %s ]. Категорія: [ %s ]');
DEFINE('_SEL_CATEGORY', '- Виберіть категорію -');
DEFINE('_SEL_SECTION', '- Виберіть розділ -');
DEFINE('_SEL_AUTHOR', '- Виберіть автора -');
DEFINE('_SEL_POSITION', '- Виберіть позицію -');
DEFINE('_SEL_TYPE', '- Виберіть тип -');
DEFINE('_EMPTY_CATEGORY', 'Дана категорія не містить обєктів.');
DEFINE('_EMPTY_BLOG', 'Немає обєктів для відображення!');
DEFINE('_NOT_EXIST', 'Вибачте, сторінка не знайдена.<br />Будь ласка, поверніться на головну сторінку сайту.');
DEFINE('_SUBMIT_BUTTON', 'Відправити');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE', 'Голосувати');
DEFINE('_BUTTON_RESULTS', 'Результати');
DEFINE('_USERNAME', 'Користувач');
DEFINE('_LOST_PASSWORD', 'Забули пароль?');
DEFINE('_PASSWORD', 'Пароль');
DEFINE('_BUTTON_LOGIN', 'Увійти');
DEFINE('_BUTTON_LOGOUT', 'Вийти');
DEFINE('_NO_ACCOUNT', 'Ще не зареєстровані?');
DEFINE('_CREATE_ACCOUNT', 'Регістрація');
DEFINE('_VOTE_POOR', 'Гірша');
DEFINE('_VOTE_BEST', 'Краща');
DEFINE('_USER_RATING', 'Рейтинг');
DEFINE('_RATE_BUTTON', 'Оцінити');
DEFINE('_REMEMBER_ME', 'Запамятати');

/** contact.php */
DEFINE('_ENQUIRY', 'Контакт');
DEFINE('_ENQUIRY_TEXT', 'Це повідомлення відправлене із сайту %s. Автор повідомлення:');
DEFINE('_COPY_TEXT', 'Це копія повідомлення, що Ви відправили для %s із сайту %s. ');
DEFINE('_COPY_SUBJECT', 'Копія: ');
DEFINE('_THANK_MESSAGE', 'Дякуємо! Повідомлення успішно відправлене.');
DEFINE('_CLOAKING', 'Цей e-mail захищений від спам-ботів. Для його перегляду у вашім браузері повинна бути включена підтримка Java-script.');
DEFINE('_CONTACT_HEADER_NAME', 'Імя');
DEFINE('_CONTACT_HEADER_POS', 'Положення');
DEFINE('_CONTACT_HEADER_EMAIL', 'E-mail');
DEFINE('_CONTACT_HEADER_PHONE', 'Телефон');
DEFINE('_CONTACT_HEADER_FAX', 'Факс');
DEFINE('_CONTACTS_DESC', 'Список контактів цього сайту.');
DEFINE('_CONTACT_MORE_THAN', 'Ви не можете вводити більше однієї адреси e-mail.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE', 'Зворотній звязок');
DEFINE('_EMAIL_DESCRIPTION', 'Отправить e-mail пользователю:');
DEFINE('_NAME_PROMPT', ' Введите Ваше Імя:');
DEFINE('_EMAIL_PROMPT', ' Введите Ваш e-mail:');
DEFINE('_MESSAGE_PROMPT', ' Введите текст повідомлення:');
DEFINE('_SEND_BUTTON', 'Відправити');
DEFINE('_CONTACT_FORM_NC', 'Будь ласка, заповніть форму повністю й правильно.');
DEFINE('_CONTACT_TELEPHONE', 'Телефон: ');
DEFINE('_CONTACT_MOBILE', 'Мобильний: ');
DEFINE('_CONTACT_FAX', 'Факс: ');
DEFINE('_CONTACT_EMAIL', 'E-mail: ');
DEFINE('_CONTACT_NAME', 'Імя: ');
DEFINE('_CONTACT_POSITION', 'Посада: ');
DEFINE('_CONTACT_ADDRESS', 'Адреса: ');
DEFINE('_CONTACT_MISC', 'Доп. інформація: ');
DEFINE('_CONTACT_SEL', 'Виберіть одержувача:');
DEFINE('_CONTACT_NONE', 'Деталі цього контактного запису відсутні.');
DEFINE('_CONTACT_ONE_EMAIL', 'Не можна вводити більше однієї адреси e-mail.');
DEFINE('_EMAIL_A_COPY', 'Відправити копію повідомлення на власну адресу.');
DEFINE('_CONTACT_DOWNLOAD_AS', 'Скачати інформацію в форматі');
DEFINE('_VCARD', 'VCard');

/** pageNavigation */
DEFINE('_PN_LT', '&lt;');
DEFINE('_PN_RT', '&gt;');
DEFINE('_PN_PAGE', 'Сторінка');
DEFINE('_PN_OF', 'із');
DEFINE('_PN_START', '[Перша]');
DEFINE('_PN_PREVIOUS', 'Попередня');
DEFINE('_PN_NEXT', 'Наступна');
DEFINE('_PN_END', '[Остання]');
DEFINE('_PN_DISPLAY_NR', 'Відображати');
DEFINE('_PN_RESULTS', 'Результати');

/** лист другові */
DEFINE('_EMAIL_TITLE', 'Відправити e-mail другу');
DEFINE('_EMAIL_FRIEND', 'Відправити посилання сторінки на e-mail:');
DEFINE('_EMAIL_FRIEND_ADDR', 'E-Mail друга:');
DEFINE('_EMAIL_YOUR_NAME', 'Ваше Імя:');
DEFINE('_EMAIL_YOUR_MAIL', 'Ваш e-mail:');
DEFINE('_SUBJECT_PROMPT', ' Тема повідомлення:');
DEFINE('_BUTTON_SUBMIT_MAIL', 'Відправити');
DEFINE('_BUTTON_CANCEL', 'Скасування');
DEFINE('_EMAIL_ERR_NOINFO', 'Ви повинні правильно ввести свій e-mail і e-mail одержувача цього листа.');
DEFINE('_EMAIL_MSG', ' Вітаємо! Наступне посилання на сторінку сайту %s відправив Вам %s ( %s ).

Ви зможете переглянути її по цьому посиланню:
%s');
DEFINE('_EMAIL_INFO', 'Лист відправив');
DEFINE('_EMAIL_SENT', 'Посилання на цю сторінку відправлені для');
DEFINE('_PROMPT_CLOSE', 'Закрити вікно');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' Автор');
DEFINE('_WRITTEN_BY', ' Автор');
DEFINE('_LAST_UPDATED', 'Останнє оновлення');
DEFINE('_BACK', 'Повернутися');
DEFINE('_LEGEND', 'Історія');
DEFINE('_DATE', 'Дата');
DEFINE('_ORDER_DROPDOWN', 'Порядок');
DEFINE('_HEADER_TITLE', 'Заголовок');
DEFINE('_HEADER_AUTHOR', 'Автор');
DEFINE('_HEADER_SUBMITTED', 'Написаний');
DEFINE('_HEADER_HITS', 'Переглядів');
DEFINE('_E_EDIT', 'Редагувати');
DEFINE('_E_ADD', 'Додати');
DEFINE('_E_WARNUSER', 'Будь ласка, натисніть кнопку "Скасування" або "Сохранить", щоб покинути цю сторінку.');
DEFINE('_E_WARNTITLE', 'Вміст повинне мати заголовок');
DEFINE('_E_WARNTEXT', 'Вміст повинен мати вступний текст');
DEFINE('_E_WARNCAT', 'Будь ласка, Виберіть категорію');
DEFINE('_E_CONTENT', 'Вміст');
DEFINE('_E_TITLE', 'Заголовок:');
DEFINE('_E_CATEGORY', 'Категорія');
DEFINE('_E_INTRO', 'Вступний текст');
DEFINE('_E_MAIN', 'Основний текст');
DEFINE('_E_MOSIMAGE', 'Вставити тег {mosimage}');
DEFINE('_E_IMAGES', 'Зображення');
DEFINE('_E_GALLERY_IMAGES', 'Галерея зображень');
DEFINE('_E_CONTENT_IMAGES', 'Зображення до тексту');
DEFINE('_E_EDIT_IMAGE', 'Параметри зображення');
DEFINE('_E_NO_IMAGE', 'Без зображення');
DEFINE('_E_INSERT', 'Вставити');
DEFINE('_E_UP', 'Вище');
DEFINE('_E_DOWN', 'Нижче');
DEFINE('_E_REMOVE', 'Видалити');
DEFINE('_E_SOURCE', 'Назва файла:');
DEFINE('_E_ALIGN', 'Розташування:');
DEFINE('_E_ALT', 'Альтернативний текст:');
DEFINE('_E_BORDER', 'Рамка:');
DEFINE('_E_CAPTION', 'Заголовок');
DEFINE('_E_CAPTION_POSITION', 'Положення підпису');
DEFINE('_E_CAPTION_ALIGN', 'Вирівнювання підпису');
DEFINE('_E_CAPTION_WIDTH', 'Ширина підпису');
DEFINE('_E_APPLY', 'Застосувати');
DEFINE('_E_PUBLISHING', 'Публикація');
DEFINE('_E_STATE', 'Стан:');
DEFINE('_E_AUTHOR_ALIAS', 'Псевдонім автора:');
DEFINE('_E_ACCESS_LEVEL', 'Рівень доступу:');
DEFINE('_E_ORDERING', 'Порядок:');
DEFINE('_E_START_PUB', 'Дата початку публикації:');
DEFINE('_E_FINISH_PUB', 'Дата закінчення публикаціїи:');
DEFINE('_E_SHOW_FP', 'оказувати на головній сторінці:');
DEFINE('_E_HIDE_TITLE', 'Сховати заголовок:');
DEFINE('_E_METADATA', 'Мета-теги');
DEFINE('_E_M_DESC', 'Опис:');
DEFINE('_E_M_KEY', 'Ключові слова:');
DEFINE('_E_SUBJECT', 'Тема:');
DEFINE('_E_EXPIRES', 'Дата закінчення:');
DEFINE('_E_VERSION', 'Версія');
DEFINE('_E_ABOUT', 'Про обєкт');
DEFINE('_E_CREATED', 'Дата створення');
DEFINE('_E_LAST_MOD', 'Остання зміна:');
DEFINE('_E_HITS', 'Кількість переглядів:');
DEFINE('_E_SAVE', 'Зберегти');
DEFINE('_E_CANCEL', 'Скасування');
DEFINE('_E_REGISTERED', 'Тільки для зареєстрованих користувачів');
DEFINE('_E_ITEM_INFO', 'Інформація');
DEFINE('_E_ITEM_SAVED', 'Успішно збережено!');
DEFINE('_ITEM_PREVIOUS', '&laquo; ');
DEFINE('_ITEM_NEXT', ' &raquo;');
DEFINE('_KEY_NOT_FOUND', 'Ключ не знайдений');

/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY', 'В цьому розділі архіву зараз немає обєктів. Будь ласка, зайдіть пізніше.');
DEFINE('_CATEGORY_ARCHIVE_EMPTY', 'В цій категорії архіву зараз немає обєктів. Будь ласка, зайдіть пізніше.');
DEFINE('_HEADER_SECTION_ARCHIVE', 'Архів розділів');
DEFINE('_HEADER_CATEGORY_ARCHIVE', 'Архів категорій');
DEFINE('_ARCHIVE_SEARCH_FAILURE', 'Не знайдено архівних записів для %s %s.'); // значення місяця, а потім року
DEFINE('_ARCHIVE_SEARCH_SUCCESS', 'Найдені архівні записи для %s %s.'); // значення місяця, а потім року
DEFINE('_FILTER', 'Фільтр');
DEFINE('_ORDER_DROPDOWN_DA', 'Дата (по зростанню)');
DEFINE('_ORDER_DROPDOWN_DD', 'Дата (по убуванню)');
DEFINE('_ORDER_DROPDOWN_TA', 'Назва (по зростанню)');
DEFINE('_ORDER_DROPDOWN_TD', 'Назва (по убуванню)');
DEFINE('_ORDER_DROPDOWN_HA', 'Просмотры (по зростанню)');
DEFINE('_ORDER_DROPDOWN_HD', 'Просмотры (по убуванню)');
DEFINE('_ORDER_DROPDOWN_AUA', 'Автор (по зростанню)');
DEFINE('_ORDER_DROPDOWN_AUD', 'Автор (по убуванню)');
DEFINE('_ORDER_DROPDOWN_O', 'По порядку');
DEFINE('_CONTENT_ANSWER', 'Отримано відповідь:');

/** poll.php */
DEFINE('_ALERT_ENABLED', 'Cookies повинні бути дозволені!');
DEFINE('_ALREADY_VOTE', 'Ви уже проголосовали в этом опросе!');
DEFINE('_NO_SELECTION', 'Ви не сделали свій Вибор. Будь ласка, попробуйте ещё раз.');
DEFINE('_THANKS', 'Дякуємо за Ваше участие в голосовании!');
DEFINE('_SELECT_POLL', 'Виберіть опрос из списка');

/** classes/html/poll.php */
DEFINE('_JAN', 'Січень');
DEFINE('_FEB', 'Лютий');
DEFINE('_MAR', 'Березень');
DEFINE('_APR', 'Квітень');
DEFINE('_MAY', 'Травень');
DEFINE('_JUN', 'Червень');
DEFINE('_JUL', 'Липень');
DEFINE('_AUG', 'Серпень');
DEFINE('_SEP', 'Вересень');
DEFINE('_OCT', 'Октябрь');
DEFINE('_NOV', 'Листопад');
DEFINE('_DEC', 'Грудень');
DEFINE('_POLL_TITLE', 'Результати опитування');
DEFINE('_SURVEY_TITLE', 'Назва опитування:');
DEFINE('_NUM_VOTERS', 'Кількість, що проголосували:');
DEFINE('_FIRST_VOTE', 'Перший голос:');
DEFINE('_LAST_VOTE', 'Останній голос:');
DEFINE('_SEL_POLL', 'Виберіть опитування:');
DEFINE('_NO_RESULTS', 'Немає даних по обраному опитуванню.');

/** registration.php */
DEFINE('_ERROR_PASS', 'Вибачте, такий користувач не знайдений.');
DEFINE('_NEWPASS_MSG', 'Обліковий запис користувача $checkusername відповідає адресі e-mail.\n' .
        ' Користувач сайта $mosConfig_live_site зробив запит на одержання нового пароля.\n\n' .
        ' Ваш новий пароль: $newpass\n\nЯкщо Ви не запитували зміну пароля, повідомте про це адміністраторові.' .
        ' Тільки Ви можете побачити це повідомлення, більше ніхто. Якщо це помилка, просто зайдіть ' .
        ' на сайт, використовуючи новий пароль, і потім змініть його на зручний Вам.');
DEFINE('_NEWPASS_SUB', '$_sitename :: Новий пароль для $checkusername');
DEFINE('_NEWPASS_SENT', 'Новий пароль створений і відправлений користувачеві!');
DEFINE('_REGWARN_NAME', 'Будь ласка, введіть своє справжнє імя (імя, яке відображається на сайті).');
DEFINE('_REGWARN_UNAME', 'Будь ласка, введіть своє імя користувача (логін).');
DEFINE('_REGWARN_MAIL', 'Будь ласка, правильно введіть адресу e-mail.');
DEFINE('_REGWARN_PASS', 'Будь ласка, правильно введіть пароль. Пароль не повинен містити пробіли, його довжина повинна бути не менше 6 символів і він повинен складатися тільки із цифр (0-9) і латинських символів (a-z, A-Z)');
DEFINE('_REGWARN_VPASS1', 'Будь ласка, перевірте пароль.');
DEFINE('_REGWARN_VPASS2', 'Пароль і його підтвердження не збігаються. Будь ласка, спробуйте ще раз.');
DEFINE('_REGWARN_INUSE', 'Це імя користувача вже використовується. Будь ласка, виберіть інше імя.');
DEFINE('_REGWARN_EMAIL_INUSE', 'Цей e-mail вже використовується. Якщо Ви забули свій пароль, натисніть на посилання "Забули пароль?" і на зазначений e-mail буде висланий новий пароль.');
DEFINE('_SEND_SUB', 'Дані про нового користувача %s с %s');
DEFINE('_USEND_MSG_ACTIVATE', 'Вітаємо %s,

Дякуємо за реєстрацію на сайті %s. Ваш обліковий запис успішно створений і повинен бути активований.
щоб активувати обліковий запис, натисніть на посиланні або скопіюйте його в адресний рядок браузера:
%s

Після активації Ви можете зайти на сайт %s, використовуючи своє імя користувача й пароль:

Імя користувача - %s
Пароль - %s');
DEFINE('_USEND_MSG', 'Вітаємо %s,

Дякуємо Вам за реєстрацію на сайті %s.

Зараз Ви можете ввійти на сайт %s, використовуючи імя користувача й пароль, введені вами при реєстрації.');
DEFINE('_USEND_MSG_NOPASS', 'Вітаємо $name,\n\nВи успішно зареєстровані на сайті $mosConfig_live_site.\n' .
        'Ви можете зайти на сайт $mosConfig_live_site, використовуючи дані, які Ви вказали при реєстрації.\n\n' .
        'На цей лист не потрібно відповідати, тому що воно створено автоматично й призначене тільки для повідомлення\n');
DEFINE('_ASEND_MSG', 'Вітаємо! Це системне повідомлення із сайту %s.

На сайті %s зареєструвався новий користувач.

Дані користувача:
Справжнє імя - %s
Адреса e-mail - %s
Імя користувача - %s

На цей лист не потрібно відповідати, тому що воно створено автоматично й призначене тільки для повідомлення');
DEFINE('_REG_COMPLETE_NOPASS', '<div class="componentheading">Реєстрація завершена!</div><br />&nbsp;&nbsp;' .
        'Зараз Ви можете ввійти на сайт.<br />&nbsp;&nbsp;');
DEFINE('_REG_COMPLETE', '<div class="componentheading">Реєстрація завершена!</div><br />Зараз Ви можете ввійти на сайт.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Реєстрація завершена!</div><br />Ваш обліковий запис створений і повинен бути активований перед тим, як Ви їм скористаєтеся. На Ваш e-mail був відправлений лист із посиланням, за допомогою якого Ви можете активувати свій обліковий запис.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Обліковий запис активований!</div><br />Ваш обліковий запис активований. Тепер Ви можете зайти на сайт, використовуючи імя користувача й пароль, які Ви ввели при реєстрації.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Невірне посилання активації!</div><br />Даний обліковий запис відсутній на сайті або вже активований.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">Помилка активації!</div><br />Активація вашого облікового запису неможлива. Будь ласка, зверніться до адміністратора.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD', 'Забули пароль?');
DEFINE('_NEW_PASS_DESC', 'Будь ласка, введіть свої імя користувача й адреса e-mail, потім натисніть кнопку "Відправити пароль".<br />' .
        'Незабаром, на зазначену адресу e-mail Ви отримаєте листа з новим паролем. Використовуйте цей пароль для входу на сайт.');
DEFINE('_PROMPT_UNAME', 'Імя користувача:');
DEFINE('_PROMPT_EMAIL', 'Адреса e-mail:');
DEFINE('_BUTTON_SEND_PASS', 'Відправити пароль');
DEFINE('_REGISTER_TITLE', 'Реєстрація');
DEFINE('_REGISTER_NAME', 'Справжнє Імя:');
DEFINE('_REGISTER_UNAME', 'Імя користувача:');
DEFINE('_REGISTER_EMAIL', 'E-mail:');
DEFINE('_REGISTER_PASS', 'Пароль:');
DEFINE('_REGISTER_VPASS', 'Підтвердження пароля:');
DEFINE('_REGISTER_REQUIRED', 'Всі поля, помічені символом (<span class="red">*</span>), обовязкові для заповнення!');
DEFINE('_BUTTON_SEND_REG', 'Відправити дані');
DEFINE('_SENDING_PASSWORD', 'Ваш пароль буде відправлений на зазначену вище адресу e-mail.<br />Коли Ви отримаєте' .
        ' новий пароль, Ви зможете зайти на сайт і змінити цей пароль у будь-який час.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE', 'Пошук');
DEFINE('_SEARCH_SEL_CATEGORY', 'Виберіть категорію');
DEFINE('_SEARCH_RESULT', 'Результати пошуку:');
DEFINE('_PROMPT_KEYWORD', 'Пошук по ключовій фразі');
DEFINE('_SEARCH_MATCHES', 'знайдено %d совпадений');
DEFINE('_CONCLUSION', 'Всього знайдено $totalRows матеріалів.');
DEFINE('_NOKEYWORD', 'Нічого не знайдено');
DEFINE('_IGNOREKEYWORD', 'У пошуку були пропущені прийменники');
DEFINE('_SEARCH_ANYWORDS', 'Будь-яке слово');
DEFINE('_SEARCH_ALLWORDS', 'Всі слова');
DEFINE('_SEARCH_PHRASE', 'Цілу фразу');
DEFINE('_SEARCH_NEWEST', 'По убуванню');
DEFINE('_SEARCH_OLDEST', 'по зростанню');
DEFINE('_SEARCH_POPULAR', 'По популярності');
DEFINE('_SEARCH_ALPHABETICAL', 'Алфавітний порядок');
DEFINE('_SEARCH_CATEGORY', 'Розділ / Категорія');
DEFINE('_SEARCH_MESSAGE', 'Текст для пошуку повинен містити від 3 до 20 символів');
DEFINE('_SEARCH_ARCHIVED', 'В архіві');
DEFINE('_SEARCH_CATBLOG', 'Блог категорії');
DEFINE('_SEARCH_CATLIST', 'Список категорії');
DEFINE('_SEARCH_NEWSFEEDS', 'Стрічки новин');
DEFINE('_SEARCH_SECLIST', 'Список розділу');
DEFINE('_SEARCH_SECBLOG', 'Блог розділу');

/** templates/*.php */
DEFINE('_ISO2', 'cp1251');
DEFINE('_ISO', 'charset=windows-1251');
DEFINE('_DATE_FORMAT', 'Сьогодні: d.m.Y г.'); //Використовуйте формат PHP-Функції DATE
/**
 * змініть рядок нижче, для зміни висновку дати на сайті
 * наприклад, DEFINE('_DATE_FORMAT_LC',' %d %B %Y г. %H:%M'); //Використовуйте формат PHP-Функції strftime
 */
$mon_date = array('01' => 'січня',
    '02' => 'лютого',
    '03' => 'березня',
    '04' => 'квітня',
    '05' => 'травня',
    '06' => 'червня',
    '07' => 'липня',
    '08' => 'серпня',
    '09' => 'вересня',
    '10' => 'жовтня',
    '11' => 'листопада',
    '12' => 'грудня',);
$mon = date("m");
$m = $mon_date["$mon"];
//DEFINE('_DATE_FORMAT_LC','%A, %d ".$m." %Y'); //Використовуйте PHP strftime формат
DEFINE('_DATE_FORMAT_LC', '%d ".$m." %Y'); //Використовуйте PHP strftime формат
//DEFINE('_DATE_FORMAT_LC',$mosConfig_form_date); //Використовуйте формат PHP-функції strftime
DEFINE('_DATE_FORMAT_LC2', $mosConfig_form_date_full); // Повний формат часу
DEFINE('_SEARCH_BOX', 'Поиск…');
DEFINE('_NEWSFLASH_BOX', 'Краткие новости!');
DEFINE('_MAINMENU_BOX', 'Главное меню');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE', 'Меню користувача');
DEFINE('_HI', 'Вітаємо, ');

/** user.php */
DEFINE('_SAVE_ERR', 'Будь ласка, заповніть всі поля.');
DEFINE('_THANK_SUB', 'Дякуємо за Ваш матеріал. Він буде переглянутий адміністратором перед розміщенням на сайті.');
DEFINE('_THANK_SUB_PUB', 'Дякуємо за Ваш матеріал.');
DEFINE('_UP_SIZE', 'Ви не можете завантажувати файли розміром більше чим 15Кб.');
DEFINE('_UP_EXISTS', 'Зображення з Імям $userfile_name вже існує. Будь ласка, змініть назву файлу й спробуйте ще раз.');
DEFINE('_UP_COPY_FAIL', 'Помилка при копіюванні');
DEFINE('_UP_TYPE_WARN', 'Ви можете завантажувати зображення тільки у форматі gif або jpg.');
DEFINE('_MAIL_SUB', 'Новий матеріал від користувача');
DEFINE('_MAIL_MSG', 'Вітаємо $adminName,\n\nкористувач $author пропонує новий матеріал у розділ $type з назвою $title' .
        ' для сайту $mosConfig_live_site.\n\n\n' .
        'Будь ласка, зайдіть у панель адміністратора за адресою $mosConfig_live_site/administrator для перегляду й додавання його в $type.\n\n' .
        'На цей лист не треба відповідати, тому що він створений автоматично й призначений тільки для повідомлення\n');
DEFINE('_PASS_VERR1', 'Якщо Ви бажаєте змінити пароль, будь ласка, уведіть його ще раз для підтвердження зміни.');
DEFINE('_PASS_VERR2', 'Якщо Ви вирішили змінити пароль, будь ласка, зверніть увагу, що пароль і його підтвердження повинні збігатися.');
DEFINE('_UNAME_INUSE', 'Обране імя користувача вже використовується.');
DEFINE('_UPDATE', 'Обновити');
DEFINE('_USER_DETAILS_SAVE', 'Ваші дані збережені.');
DEFINE('_USER_LOGIN', 'Вхід користувача');
DEFINE('_USER_ANSWER', 'Отримано відповідь:');
DEFINE('_USER_OK', 'Все ок!');
DEFINE('_USER_TAB_ADDITIONAL', 'Додатково');

/** components/com_user */
DEFINE('_EDIT_TITLE', 'Особисті дані');
DEFINE('_YOUR_NAME', 'Повне Імя');
DEFINE('_EMAIL', 'Адреса e-mail');
DEFINE('_UNAME', 'імя користувача (логін)');
DEFINE('_PASS', 'Пароль');
DEFINE('_VPASS', 'Підтвердження пароля');
DEFINE('_SUBMIT_SUCCESS', 'Ваша інформація прийнята!');
DEFINE('_SUBMIT_SUCCESS_DESC', 'Ваша інформація успішно відправлена адміністраторові. Після перегляду, Ваш матеріал буде опублікований на цьому сайті');
DEFINE('_WELCOME', 'Ласкаво просимо!');
DEFINE('_WELCOME_DESC', 'Ласкаво просимо в розділ користувача нашого сайту');
DEFINE('_CONF_CHECKED_IN', 'Всі заблоковані Вами елементи тепер розблоковани');
DEFINE('_CHECK_TABLE', 'Перевірка таблиці');
DEFINE('_CHECKED_IN', 'Перевірено ');
DEFINE('_CHECKED_IN_ITEMS', '');
DEFINE('_PASS_MATCH', 'Паролі не збігаються');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME', 'Ви повинні ввести імя клієнта.');
DEFINE('_BNR_CONTACT', 'Ви повинні вибрати контакт для клієнта.');
DEFINE('_BNR_VALID_EMAIL', 'Адреси електронної пошти клієнта повинні бути правильними.');
DEFINE('_BNR_CLIENT', 'Ви повинні вибрати клієнта,');
DEFINE('_BNR_NAME', 'введіть імя банера.');
DEFINE('_BNR_IMAGE', 'Виберіть зображення банера.');
DEFINE('_BNR_URL', 'Ви повинні ввести URL/Код банера.');
DEFINE('_BNR_ENTER_ERROR', 'Помилка доступу');
DEFINE('_BNR_NOT_ENTER', 'Доступ не можливий');

/** components/com_login */
DEFINE('_ALREADY_LOGIN', 'Ви вже авторизированы!');
DEFINE('_LOGOUT', 'натисніть тут для завершення роботи');
DEFINE('_LOGIN_TEXT', 'Використовуйте поля "Користувач" і "Пароль" для доступу до сайту');
DEFINE('_LOGIN_SUCCESS', 'Ви успішно ввійшли');
DEFINE('_LOGOUT_SUCCESS', 'Ви успішно закінчили роботу із сайтом');
DEFINE('_LOGIN_DESCRIPTION', 'Ви повинні ввійти на сайт як користувач, для доступу до закритих розділів');
DEFINE('_LOGOUT_DESCRIPTION', 'Ви дійсно хочете покинути профіль?');

/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE', 'Посилання');
DEFINE('_WEBLINKS_DESC', 'В даному розділі зібрані найцікавіші й корисні посилання в мережі. <br />Виберіть зі списку один з розділів, а потім виберіть потрібне посилання.');
DEFINE('_HEADER_TITLE_WEBLINKS', 'Посилання');
DEFINE('_SECTION', 'Розділ');
DEFINE('_SUBMIT_LINK', 'Додати посилання');
DEFINE('_URL', 'URL:');
DEFINE('_URL_DESC', 'Опис:');
DEFINE('_NAME', 'Назва:');
DEFINE('_WEBLINK_EXIST', 'Посилання з таким імям вже існує. Змініть імя й спробуйте ще раз.');
DEFINE('_WEBLINK_TITLE', 'Посилання повинне мати назву.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME', 'Назва джерела');
DEFINE('_FEED_ARTICLES', 'Статей');
DEFINE('_FEED_LINK', 'Посилання джерела');

/** whos_online.php */
DEFINE('_WE_HAVE', 'Зараз на сайті перебувають: <br />');
DEFINE('_REGISTERED_ONLINE', 'Зареєстровано');
DEFINE('_NOW_ONLINE', 'Online');
DEFINE('_AND', ' і ');
DEFINE('_GUEST_COUNT', '%s гість');
DEFINE('_GUESTS_COUNT', '%s гостей');
DEFINE('_MEMBER_COUNT', '%s користувач');
DEFINE('_MEMBERS_COUNT', '%s користувачів');
DEFINE('_ONLINE', '');
DEFINE('_NONE', 'Немає відвідувачів в онлайн');

/** modules/mod_banners */
DEFINE('_BANNER_ALT', 'Реклама');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES', 'Немає зображень');
DEFINE('_RANDOM_IMAGE_ERROR', 'Перевірте настройки модуля mod_random_image і наявність зображень у вказаному в налаштуваннях каталозі!');

/** modules/mod_ml_login */
DEFINE('_AUTH', 'Авторизація');

/** modules/mod_stats.php */
DEFINE('_TIME_STAT', 'Час');
DEFINE('_STAT_OS', 'OS');
DEFINE('_STAT_PHP_VERSION', 'Версія PHP');
DEFINE('_STAT_MYSQL_VERSION', 'Версія MySQL');
DEFINE('_STAT_CACHE', 'Кешування');
DEFINE('_STAT_CACHE_ENABLE', 'Дозволено');
DEFINE('_STAT_CACHE_DISABLE', 'Заборонено');
DEFINE('_MEMBERS_STAT', 'Користувачів');
DEFINE('_HITS_STAT', 'Відвідувань');
DEFINE('_NEWS_STAT', 'Новин');
DEFINE('_LINKS_STAT', 'Посилань');
DEFINE('_VISITORS', 'Відвідувачів');

/** /adminstrator */
DEFINE('_ADMIN_USRNAME', 'Логін');
DEFINE('_ADMIN_PASS', 'Пароль');
DEFINE('_ADMIN_ENTER', 'Ввійти');
DEFINE('_ADMIN_GO_SITE', 'Перейти до сайту');
DEFINE('_ADMIN_EXIT', 'Вихід');
DEFINE('_ADMIN_VIEW_CONTENT', 'Перегляд змісту');
DEFINE('_DETAILS', 'Основні налаштування');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME', '* Перший за списком опублікований пункт цього меню [mainmenu] автоматично стає "Головною" сторінкою сайту*');
DEFINE('_MAINMENU_DEL', '* Ви не можете "Видалити" це меню, оскільки воно необхідно для нормального функціонування сайту*');
DEFINE('_MENU_GROUP', '* Деякі "Типи меню" зявляються більш ніж в одній групі*');

/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', 'Нові дані користувача');
DEFINE('_NEW_USER_MESSAGE', 'Вітаємо, %s


Ви були зареєстровані Адміністратором на сайті %s.

Це повідомлення містить Ваші імя користувача й пароль, для входу на сайт %s:

імя користувача - %s
Пароль - %s


На це повідомлення не потрібно відповідати. Воно сгенерировано роботом розсилань і відправлено тільки для інформування.');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', 'Це повідомлення із сайту %s

Повідомлення:
');

// Joostina!
DEFINE('_REG_CAPTCHA', 'введіть текст із зображення:<span class="red">*</span>');
DEFINE('_REG_CAPTCHA_VAL', 'Необхідно ввести код із зображенням.');
DEFINE('_REG_CAPTCHA_REF', 'Натисніть щоб оновити зображення.');

DEFINE('_PRINT_PAGE_LINK', 'Адреса сторінки на сайті');

$bad_text = array(' але ', ' без ', ' більше ', ' був ', ' була ', ' були ', ' було ', ' бути ', ' вам ', ' вас ', ' нагору ', ' видно ', ' от ', ' всі ', ' завжди ', ' всіх ', ' де ', ' говорила ', ' говоримо ', ' говорить ', ' навіть ', ' два ', ' для ', ' його ', ' йому ', ' якщо ', ' є ', ' ще ', ' потім ', ' тут ', ' знала ', ' знаю ', ' іду ', ' або ', ' кожний ', ' здається ', ' здавалося ', ' як ', ' які ', ' коли ', ' яке ', ' які ', ' хто ', ' мене ', ' мені ', ' міг ', ' могла ', ' можу ', ' моє ', ' моєї ', ' може ', ' можна ', ' мої ', ' мій ', ' мовляв ', ' моя ', ' треба ', ' нас ', ' почав ', ' початку ', ' його ', ' її ', ' їй ', ' небагато ', ' трошки ', ' йому ', ' трохи ', ' немає ', ' ніколи ', ' їх ', ' нічого ', ' однак ', ' вона ', ' вони ', ' воно ', ' знову ', ' дуже ', ' під ', ' поки ', ' після ', ' потім ', ' майже ', ' при ', ' про ', ' раз ', ' своєї ', ' свій ', ' свою ', ' собі ', ' себе ', ' зараз ', ' сказав ', ' сказала ', ' злегка ', ' занадто ', ' немов ', ' знову ', ' став ', ' стала ', ' стали ', ' так ', ' там ', ' твої ', ' твоя ', ' тобі ', ' тебе ', ' тепер ', ' тоді ', ' того ', ' теж ', ' тільки ', ' три ', ' отут ', ' вже ', ' хоча ', ' чим ', ' через ', ' що ', ' щоб ', ' ледве ', ' ця ', ' ці ', ' цих ', ' це ', ' цього ', ' цієї ', ' цьому ', ' цю ');

/* administrator components com_admin */
DEFINE('_FILE_UPLOAD', 'Завантаження файлу');
DEFINE('_MAX_SIZE', 'Максимальний розмір');
DEFINE('_ABOUT_JOOSTINA', 'Про Joostina');
DEFINE('_CHANGESLOG', 'Changeslog');
DEFINE('_ABOUT_SYSTEM', 'Про систему');
DEFINE('_SYSTEM_OS', 'Система');
DEFINE('_DB_VERSION', 'Версія бази даних');
DEFINE('_PHP_VERSION', 'Версія PHP');
DEFINE('_APACHE_VERSION', 'Веб-сервер');
DEFINE('_PHP_APACHE_INTERFACE', 'Інтерфейс між веб-сервером і PHP');
DEFINE('_JOOSTINA_VERSION', 'Версія Joostina!');
DEFINE('_BROWSER', 'Браузер (User Agent)');
DEFINE('_PHP_SETTINGS', 'Важливі настроювання PHP');
DEFINE('_RG_EMULATION', 'Емуляція Register Globals');
DEFINE('_REGISTER_GLOBALS', 'Register Globals - реєстрація глобальних змінних');
DEFINE('_MAGIC_QUOTES', 'Параметр Magic Quotes');
DEFINE('_SAFE_MODE', 'Безпечний режим - Safe Mode');
DEFINE('_SESSION_HANDLING', 'Обробка сесій');
DEFINE('_SESS_SAVE_PATH', 'Каталог зберігання сесій - Session save path');
DEFINE('_PHP_TAGS', 'Спецтеги php');
DEFINE('_BUFFERING', 'Буферизація');
DEFINE('_OPEN_BASEDIR', 'Дозволені/відкриті каталоги');
DEFINE('_ERROR_REPORTING', 'Відображення помилок');
DEFINE('_XML_SUPPORT', 'Підтримка XML');
DEFINE('_ZLIB_SUPPORT', 'Підтримка Zlib');
DEFINE('_DISABLED_FUNCTIONS', 'ЗЗаборонені функції');
DEFINE('_CONFIGURATION_FILE', 'Файл конфігурації');
DEFINE('_ACCESS_RIGHTS', 'Права доступу');
DEFINE('_DIRS_WITH_RIGHTS', 'Для роботи ВСІХ функцій і можливостей Joostina, ВСІ зазначені нижче каталоги повинні бути доступні для запису');
DEFINE('_CACHE_DIRECTORY', 'Каталог кеша');
DEFINE('_SESSION_DIRECTORY', 'Каталог сесій');
DEFINE('_DATABASE', 'База даних');
DEFINE('_TABLE_NAME', 'Назва таблиці');
DEFINE('_DB_CHARSET', 'Кодування');
DEFINE('_DB_NUM_RECORDS', 'Записів');
DEFINE('_DB_SIZE', 'Розмір');
DEFINE('_FIND', 'Знайти');
DEFINE('_CLEAR', 'Очистити');
DEFINE('_GLOSSARY', 'Глосарій');
DEFINE('_DEVELOPERS', 'Розробники');
DEFINE('_SUPPORT', 'Підтримка');
DEFINE('_LICENSE', 'Ліцензія');
DEFINE('_CHANGELOG', 'Журнал змін');
DEFINE('_CHECK_VERSION', 'Перевірити версію Joomla! RE');
DEFINE('_PREVIEW_SITE', 'Передпроглядання сайту');
DEFINE('_IN_NEW_WINDOW', 'Відкрити в новому вікні');

/* administrator components com_banners */
DEFINE('_BANNERS_MANAGEMENT', 'Керування баннерами');
DEFINE('_EDIT_BANNER', 'Редагування банера');
DEFINE('_NEW_BANNER', 'Створення банера');
DEFINE('_IN_CURRENT_WINDOW', 'Тім же вікні');
DEFINE('_IN_PARENT_WINDOW', 'Текущем вікні');
DEFINE('_IN_MAIN_FRAME', 'Поточному фрейме');
DEFINE('_BANNER_CLIENTS', 'Клієнти баннерів');
DEFINE('_BANNER_CATEGORIES', 'Категорії баннерів');
DEFINE('_NO_BANNERS', 'Банеры не обнаружены');
DEFINE('_BANNER_COUNTER_RESETTED', 'Счётчик показа баннеров обнулён');
DEFINE('_CHECK_PUBLISH_DATE', 'Проверьте правильность ввода даты публикации');
DEFINE('_CHECK_START_PUBLICATION_DATE', 'Проверьта дату начала публикации');
DEFINE('_CHECK_END_PUBLICATION_DATE', 'Проверьта дату окончания публикации');
DEFINE('_TASK_UPLOAD', 'Завантажити');
DEFINE('_BANNERS_PANEL', 'Панель баннерів');
DEFINE('_BANNERS_DIRECTORY_DOESNOT_EXISTS', 'Папка banners не існує');
DEFINE('_CHOOSE_BANNER_IMAGE', 'Виберіть зображення для завантаження');
DEFINE('_BAD_FILENAME', 'Файл повинен містити алфавітно-числові символи без пробілів.');
DEFINE('_FILE_ALREADY_EXISTS', 'Файл #FILENAME# вже існує в базі даних.');
DEFINE('_BANNER_UPLOAD_ERROR', 'Завантаження #FILENAME# невдале');
DEFINE('_BANNER_UPLOAD_SUCCESS', 'Завантаження #FILENAME# в #DIRNAME# успішно завершена');
DEFINE('_UPLOAD_BANNER_FILE', 'Завантажити файл банера');

/* administrator components com_categories */
DEFINE('_CATEGORY_CHANGES_SAVED', 'Зміни в категорії збережені');
DEFINE('_USER_GROUP_ALL', 'Загальний');
DEFINE('_USER_GROUP_REGISTERED', 'Учасники');
DEFINE('_USER_GROUP_SPECIAL', 'Спеціальний');
DEFINE('_CONTENT_CATEGORIES', 'Категорії вмісту');
DEFINE('_ALL_CONTENT', 'Весь вміст');
DEFINE('_ACTIVE', 'Активних');
DEFINE('_IN_TRASH', 'У кошику');
DEFINE('_VIEW_CATEGORY_CONTENT', 'Перегляд вмісту категорії');
DEFINE('_CHOOSE_MENU_PLEASE', 'Будь ласка, виберіть меню');
DEFINE('_CHOOSE_MENUTYPE_PLEASE', 'Будь ласка, виберіть тип меню');
DEFINE('_ENTER_MENUITEM_NAME', 'Будь ласка, введіть назву для цього пункта меню');
DEFINE('_CATEGORY_NAME_IS_BLANK', 'Категорія повинна мати назву');
DEFINE('_ENTER_CATEGORY_NAME', 'Введіть імя категорії');
DEFINE('_ENTER_CATEGORY_TITLE', 'Введіть заголовок категорії');
DEFINE('_CATEGORY_ALREADY_EXISTS', 'Категорія з такою назвою вже існує. Повторіть знову');
DEFINE('_EDIT_CATEGORY', 'Редагування');
DEFINE('_NEW_CATEGORY', 'Нова');
DEFINE('_CATEGORY_PROPERTIES', 'Властивості категорії');
DEFINE('_CATEGORY_TITLE', 'Заголовок категорії (Title)');
DEFINE('_CATEGORY_NAME', 'Назва категорії (Name)');
DEFINE('_SORT_ORDER', 'Порядок розташування');
DEFINE('_IMAGE', 'Зображення');
DEFINE('_IMAGE_POSTITION', 'Розташування Зображення');
DEFINE('_MENUITEM', 'Пункт меню');
DEFINE('_NEW_MENUITEM_IN_YOUR_MENU', 'Створення нового пункту в обраному вами меню.');
DEFINE('_MENU_NAME', 'Назва пункту меню');
DEFINE('_CREATE_MENU_ITEM', 'Створити пункт меню');
DEFINE('_EXISTED_MENU_ITEMS', 'Існуючі посилання меню');
DEFINE('_NOT_EXISTS', 'Відсутні');
DEFINE('_MENU_LINK_AVAILABLE_AFTER_SAVE', 'Звязок з меню буде доступна після збереження');
DEFINE('_IMAGES_DIRS', 'Каталоги зображень (MOSImage)');
DEFINE('_MOVE_CATEGORIES', 'Переміщення категорій');
DEFINE('_CHOOSE_CATEGORY_SECTION', 'Будь ласка, виберіть розділ для переміщуваної категорії');
DEFINE('_MOVE_INTO_SECTION', 'Перемістити в розділ');
DEFINE('_CATEGORIES_TO_MOVE', 'Переміщувані категорії');
DEFINE('_CONTENT_ITEMS_TO_MOVE', 'Переміщувані обєкти вмісту');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', 'В обраний розділ будуть переміщені всі <br /> перераховані категорії й всі <br /> перерахований вміст цих категорій.');
DEFINE('_CATEGORY_COPYING', 'Копіювання категорій');
DEFINE('_CHOOSE_CAT_SECTION_TO_COPY', 'Будь ласка, виберіть розділ для категорії, що копіюється');
DEFINE('_COPY_TO_SECTION', 'Копіювати в розділ');
DEFINE('_CATS_TO_COPY', 'Категорії, що копіюються');
DEFINE('_CONTENT_ITEMS_TO_COPY', 'Вміст категорії, що копіюється');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', 'В обраний розділ будуть скопійовані всі <br /> перераховані категорії й всі <br /> перерахований вміст цих категорій.');
DEFINE('_COMPONENT', 'Компонент');
DEFINE('_BEFORE_CREATION_CAT_CREATE_SECTION', 'Перед створенням категорії Ви повинні створити хоча б один розділ');
DEFINE('_CATEGORY_IS_EDITING_NOW', 'Категорія #CATNAME# у цей час редагується іншим адміністратором');
DEFINE('_TABLE_WEBLINKS_CATEGORY', 'Таблица - Веб-посилання категорії');
DEFINE('_TABLE_NEWSFEEDS_CATEGORY', 'Таблица - Стрічки новин категорії');
DEFINE('_TABLE_CATEGORY_CONTACTS', 'Таблица - Контакти категорії');
DEFINE('_TABLE_CATEGORY_CONTENT', 'Таблица - Вміст категорії');
DEFINE('_BLOG_CATEGORY_CONTENT', 'Блог - Вміст категорії');
DEFINE('_BLOG_CATEGORY_ARCHIVE', 'Блог - Архівний вміст категорії');
DEFINE('_USE_SECTION_SETTINGS', 'Використовувати налаштування розділу');
DEFINE('_CMN_ALL', 'Всі');
DEFINE('_CHOOSE_CATEGORY_TO_REMOVE', 'Виберіть категорію для видалення');
DEFINE('_CANNOT_REMOVE_CATEGORY', 'Категорія: #CIDS# не може бути вилучена, тому що вона містить записи');
DEFINE('_CHOOSE_CATEGORY_FOR_', 'Виберіть категорію для');
DEFINE('_CHOOSE_OBJECT_TO_MOVE', 'Виберіть обєкт для переміщення');
DEFINE('_CATEGORIES_MOVED_TO', 'Категорії переміщені в ');
DEFINE('_CATEGORY_MOVED_TO', 'Категорії переміщені в ');
DEFINE('_CATEGORIES_COPIED_TO', 'Категорії скопійовані в ');
DEFINE('_CATEGORY_COPIED_TO', 'Категорія скопійованіа в ');
DEFINE('_NEW_ORDER_SAVED', 'Новий порядок збережений');
DEFINE('_SAVE_AND_ADD', 'Зберегти и додати');
DEFINE('_CLOSE', 'Закрити');
DEFINE('_CREATE_CONTENT', 'Создать вміст');
DEFINE('_MOVE', 'Перенести');
DEFINE('_COPY', 'Копіювати');

/* administrator components com_checkin */
DEFINE('_BLOCKED_OBJECTS', 'Заблоковані обєкти');
DEFINE('_OBJECT', 'Обєкт');
DEFINE('_WHO_BLOCK', 'Заблокував');
DEFINE('_BLOCK_TIME', 'Час блокування');
DEFINE('_ACTION', 'Дія');
DEFINE('_GLOBAL_CHECKIN', 'Глобальне розблокування');
DEFINE('_TABLE_IN_DB', 'Таблиця бази даних');
DEFINE('_OBJECT_COUNT', 'Кіл-ть обєктів');
DEFINE('_UNBLOCKED', 'Разблоковано');
DEFINE('_CHECHKED_TABLE', 'Перевірена таблиця');
DEFINE('_ALL_BLOCKED_IS_UNBLOCKED', 'Всі заблоковані обєкти розблоковані');
DEFINE('_MINUTES', 'хвилин');
DEFINE('_HOURS', 'годин');
DEFINE('_DAYS', 'днів');
DEFINE('_ERROR_WHEN_UNBLOCKING', 'При розблокуванні відбулася помилка');
DEFINE('_UNBLOCKED2', 'разблокований');

/* administrator components com_config */
DEFINE('_CONFIGURATION_IS_UPDATED', 'Конфігурація успішно оновлена');
DEFINE('_CANNOT_OPEN_CONF_FILE', 'Помилка! Неможливо відкрити для запису файл конфігурації!');
DEFINE('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', 'Ви дійсно хочете змінити "Метод аутентифікації сесії"? \n\n Ця дія видалить всі існуючі сесії фронтенда \n\n');
DEFINE('_GLOBAL_CONFIG', 'Глобальна конфігурація');
DEFINE('_PROTECT_AFTER_SAVE', 'Захистити від запису після збереження');
DEFINE('_IGNORE_PROTECTION_WHEN_SAVE', 'Ігнорувати захист від запису при збереженні');
DEFINE('_CONFIG_SAVING', 'Збереження конфігурації');
DEFINE('_NOT_AVAILABLE_CHECK_RIGHTS', 'не доступно');
DEFINE('_AVAILABLE_CHECK_RIGHTS', 'доступно');
DEFINE('_SITE_NAME', 'Назва сайту');
DEFINE('_SITE_LANGUAGE', 'Мова сайту:');
DEFINE('_SITE_OFFLINE', 'Сайт виключений');
DEFINE('_SITE_OFFLINE_MESSAGE', 'Повідомлення при виключеному сайті');
DEFINE('_SITE_OFFLINE_MESSAGE2', 'Повідомлення, що виводиться користувачам замість сайту, коли він перебуває у виключеному стані.');
DEFINE('_SYSTEM_ERROR_MESSAGE', 'Повідомлення при системній помилці');
DEFINE('_SYSTEM_ERROR_MESSAGE2', 'Повідомлення, що виводиться користувачам замість сайту, коли Joostina! не може підключитися до бази даних MySQL.');
DEFINE('_SHOW_READMORE_TO_AUTH', 'Показувати "Докладніше..." неавторизованим');
DEFINE('_SHOW_READMORE_TO_AUTH2', 'Якщо ТАК, те неавторизованим користувачам будуть показуватися посилання на вміст із рівнем доступу -Для зареєстрованих-. Для можливості повного перегляду користувач повинен буде авторизуватися.');
DEFINE('_ENABLE_USER_REGISTRATION', 'Дозволити реєстрацію користувачів');
DEFINE('_ENABLE_USER_REGISTRATION2', 'Якщо ТАК, то користувачам буде дозволено реєструватися на сайті.');
DEFINE('_ACCOUNT_ACTIVATION', 'Використовувати активацію нового аккаунта');
DEFINE('_ACCOUNT_ACTIVATION2', 'Якщо ТАК, то користувачеві необхідно буде активувати новий аккаунт, після одержання ним листа з посиланням для активації.');
DEFINE('_UNIQUE_EMAIL', 'Вимагати унікальний E-mail');
DEFINE('_UNIQUE_EMAIL2', 'Якщо ТАК, то користувачі не зможуть створювати декілька аккаунтов з однаковою адресою e-mail.');
DEFINE('_USER_PARAMS', 'Параметри користувача сайту');
DEFINE('_USER_PARAMS2', 'Якщо "Ні", то буде відключена можливість установки користувачем параметрів сайту (вибір редактори)');
DEFINE('_DEFAULT_EDITOR', 'WYSIWYG-Редактор за замовчуванням');
DEFINE('_LIST_LIMIT', 'Довжина списків (кіл-ть рядків)');
DEFINE('_LIST_LIMIT2', 'Встановлює довжину списків за замовчуванням у панелі керування для всіх користувачів');
DEFINE('_FRONTPAGE', 'Фронт');
DEFINE('_SITE', 'Сайт');
DEFINE('_CUSTOM_PRINT', 'Сторінка друку з каталогу шаблона');
DEFINE('_CUSTOM_PRINT2', 'Використання довільної сторінки для друкованого виду з каталогу поточного шаблона');
DEFINE('_MODULES_MULTI_LANG', 'Дозволити багатомовність модулів');
DEFINE('_MODULES_MULTI_LANG2', 'Дозволити системі перевіряти мовні файли модулів, якщо у Вас таких немає - рекомендується встановити НЕМАЄ');
DEFINE('_DATE_FORMAT_TXT', 'Формат дати');
DEFINE('_DATE_FORMAT2', 'Виберіть формат для відображення дати. Необхідно використовувати формат відповідно до правил strftime.');
DEFINE('_DATE_FORMAT_FULL', 'Повний формат дати й часу');
DEFINE('_DATE_FORMAT_FULL2', 'Виберіть повний формат для відображення дати й часу. Необхідно використовувати формат відповідно до правил strftime.');
DEFINE('_USE_H1_FOR_HEADERS', 'Обрамляти заголовки вмісту тегом h1 при повному перегляді');
DEFINE('_USE_H1_FOR_HEADERS2', 'Обрамляти заголовки тегом h1 тільки в режимі повного перегляду вмісту ( при натисканні на Докладніше… ).');
DEFINE('_USE_H1_HEADERS_ALWAYS', 'Обрамляти всі заголовки вмісту тегом h1');
DEFINE('_USE_H1_HEADERS_ALWAYS2', 'Поміщати заголовки матеріалу в теги h1.');
DEFINE('_DISABLE_RSS', 'Відключити генерацію RSS (syndicate)');
DEFINE('_DISABLE_RSS2', 'Якщо "ТАК", то буде відключена можливість генерації RSS стрічок і робота з ними');
DEFINE('_USE_TEMPLATE', 'Використовувати шаблон');
DEFINE('_USE_TEMPLATE2', 'При виборі шаблона він буде використаний на всьому сайті незалежно від привязок до пунктів меню інших шаблонів. Для використання декількох шаблонів виберіть "Різні"');
DEFINE('_FAVICON_IMAGE', 'Значок сайту в Закладках браузера');
DEFINE('_FAVICON_IMAGE2', 'Значок сайту в Закладках (Вибраному) браузера. Якщо не зазначено або файл значка не знайдений, за замовчуванням буде використовуватися файл favicon.ico.');
DEFINE('_FAVICON_IMAGE3', 'Значок сайту в Закладках');
DEFINE('_DISABLE_FAVICON', 'Відключити favicon');
DEFINE('_DISABLE_FAVICON2', 'Використовувати як значок сайту favicon');
DEFINE('_DISABLE_SYSTEM_MAMBOTS', 'Відключити мамботи групи system');
DEFINE('_DISABLE_SYSTEM_MAMBOTS2', 'Якщо "ТАК", то використання системних мамботів буде припинено. УВАГА, якщо на сайті використовуються мамботи цієї групи, то активація параметра не рекомендується');
DEFINE('_DISABLE_CONTENT_MAMBOTS', 'Відключити мамботи групи content');
DEFINE('_DISABLE_CONTENT_MAMBOTS2', 'Якщо "ТАК", то використання мамботів обробки контента буде припинено. УВАГА, якщо на сайті використовуються мамботи цієї групи, то активація параметра не рекомендується');
DEFINE('_DISABLE_MAINBODY_MAMBOTS', 'Відключити мамботи групи mainbody');
DEFINE('_DISABLE_MAINBODY_MAMBOTS2', 'Якщо "ТАК", то використання мамботов обробки стека компонентів (mainbody) буде припинено.');
DEFINE('_SITE_AUTH', 'Авторизація на сайті');
DEFINE('_SITE_AUTH2', 'Якщо "Ні", то сторінка авторизації на сайті буде відключена, якщо з нею не звязаний пункт меню. Також буде відключена можливість реєстрації на сайті');
DEFINE('_FRONT_SESSION_TIME', 'Час існування сесії на фронті');
DEFINE('_FRONT_SESSION_TIME2', 'Час автовідключення користувача сайту при неактивності. Велике значення цього параметра знижує безпека.');
DEFINE('_DISABLE_FRONT_SESSIONS', 'Відключити сесії на фронті');
DEFINE('_DISABLE_FRONT_SESSIONS2', 'Якщо "ТАК", то будет отключено ведение сесій для каждого користувача на сайте. Якщо подсчет числа користувачів не нужен и Реєстрація отключена - можно Виключить.');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT', 'Відключити контроль доступа к содержимому');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT2', 'Якщо "ТАК", то контроль доступа к содержимому осуществляться не будет, и всем пользователям будет отображено всё Вміст. Рекомендуется совместно с пунктами отключения авторизации и сесій на фронте.');
DEFINE('_COUNT_CONTENT_HITS', 'Считать число прочтений содержимого');
DEFINE('_COUNT_CONTENT_HITS2', 'При вимиканні параметра статистика прочитань вмісту буде не активна.');
DEFINE('_DISABLE_CHECK_CONTENT_DATE', 'Відключити перевірки публікації по датах');
DEFINE('_DISABLE_CHECK_CONTENT_DATE2', 'Якщо на сайті не критичні тимчасові проміжки публікації вмісту - те даний параметр краще активізувати.');
DEFINE('_DISABLE_MODULES_WHEN_EDIT', 'Відключати модулі в редагуванні');
DEFINE('_DISABLE_MODULES_WHEN_EDIT2', 'Якщо "ТАК", то на сторінці редагування вмісту із фронту будуть відключені всі модулі');
DEFINE('_COUNT_GENERATION_TIME', 'Розраховувати час генерації сторінки');
DEFINE('_COUNT_GENERATION_TIME2', 'Якщо "ТАК", то на кожній сторінці буде відображений час на її генерацію');
DEFINE('_ENABLE_GZIP', 'GZIP-стиск сторінок');
DEFINE('_ENABLE_GZIP2', 'Підтримка стискання сторінок перед відправленням (якщо підтримується). Включення цієї функції зменшує розмір сторінок, що завантажуються, і призводить до зменшення трафіка. У той же час, це збільшує навантаження на сервер.');
DEFINE('_IS_SITE_DEBUG', 'Режим відладчика сайту');
DEFINE('_IS_SITE_DEBUG2', 'Якщо "ТАК", то буде показуватися діагностична інформація, запити й помилки MySQL…');
DEFINE('_EXTENDED_DEBUG', 'Розширений відладчик');
DEFINE('_EXTENDED_DEBUG2', 'икористовувати на фронті сайту розширений відладчик, що виводить безліч інформації про сайт.');
DEFINE('_CONTROL_PANEL', 'Панель керування');
DEFINE('_DISABLE_ADMIN_SESS_DEL', 'Відключити видалення сесій у панелі керування');
DEFINE('_DISABLE_ADMIN_SESS_DEL2', 'Не видаляти сесії навіть після витікання часу існування.');
DEFINE('_DISABLE_HELP_BUTTON', 'Відключити кнопку "Допомога"');
DEFINE('_DISABLE_HELP_BUTTON2', 'Дозволяє заборонити до показу кнопку допомоги тулбара панелі керування.');
DEFINE('_USE_OLD_TOOLBAR', 'Використовувати старе відображення туллбара');
DEFINE('_USE_OLD_TOOLBAR2', 'При активуванні параметра висновок кнопок туллбара буде зроблений у режимі таблиць, як було в Joomla.');
DEFINE('_DISABLE_IMAGES_TAB', 'Відключити вкладку "Зображення"');
DEFINE('_DISABLE_IMAGES_TAB2', 'Дозволяє заборонити до показу при редагуванні вмісту вкладку Зображення.');
DEFINE('_ADMIN_SESS_TIME', 'Час існування сесії в панелі керування');
DEFINE('_SECONDS', 'секунд');
DEFINE('_ADMIN_SESS_TIME2', 'Час, після закінчення якого будуть відключені користувачі <strong>адмінцентра</strong> при неактивності. Занадто велике значення зменшує захищеність сайту!');
DEFINE('_SAVE_LAST_PAGE', 'Запамятовувати сторінку Адмінцентру при закінченні сесії');
DEFINE('_SAVE_LAST_PAGE2', 'Якщо сесія роботи в панелі керування закінчилася, і Ви заходите на сайт протягом 10 хвилин, то при вході Ви будете переспрямовані на сторінку, з якої відбулося відключення');
DEFINE('_HTML_CSS_EDITOR', 'Візуальний редактор для html і css');
DEFINE('_HTML_CSS_EDITOR2', 'Використовувати редактор з підсвічуванням синтаксису для редагування html і css файлів шаблона');
DEFINE('_THIS_PARAMS_CONTROL_CONTENT', '* Ці параметри контролюють висновок елементів вмісту *');
DEFINE('_LINK_TITLES', 'Заголовки у вигляді посилань');
DEFINE('_LINK_TITLES2', 'Якщо ТАК, заголовки обєктів вмісту починають працювати як гіперпосилання на ці обєкти');
DEFINE('_READMORE_LINK', 'Посилання "Докладніше…"');
DEFINE('_READMORE_LINK2', 'Якщо обрано параметр Показати, то буде показуватися посилання -Докладніше- для перегляду повного вмісту');
DEFINE('_VOTING_ENABLE', 'Рейтинг/Голосування');
DEFINE('_VOTING_ENABLE2', 'Якщо обрано параметр Показати, система --Рейтинг/Голосування-- буде включена');
DEFINE('_AUTHOR_NAMES', 'Імена авторів');
DEFINE('_AUTHOR_NAMES2', 'Виберіть, чи показувати імена авторів. Це глобальна установка, але вона може бути змінена в інших місцях на рівні меню або обєкта.');
DEFINE('_DATE_TIME_CREATION', 'Дата й час створення');
DEFINE('_DATE_TIME_CREATION2', 'Якщо Показати, то показується дата й час створення статті. Це глобальна установка, але може бути змінена в інших місцях на рівні меню або обєкта.');
DEFINE('_DATE_TIME_MODIFICATION', 'Дата й час зміни');
DEFINE('_DATE_TIME_MODIFICATION2', 'Якщо встановлено Показати, то буде показуватися дата зміни статті. Це глобальна установка, але вона може бути змінена в інших місцях.');
DEFINE('_VIEW_COUNT', 'Кіл-ть переглядів');
DEFINE('_VIEW_COUNT2', 'Якщо встановлено "Показати", то показується кількість переглядів обєкта відвідувачами сайту. Ця глобальна установка може бути змінена в інших місцях панелі керування.');
DEFINE('_LINK_PRINT', 'Посилання Друк');
DEFINE('_LINK_EMAIL', 'Посилання E-mail');
DEFINE('_PRINT_EMAIL_ICONS', 'Значки Друк і E-mail');
DEFINE('_PRINT_EMAIL_ICONS2', 'Якщо обрано Показати, то посилання Друк і E-mail будуть відображатися у вигляді значків, інакше - простим текстом-посиланням.');
DEFINE('_ENABLE_TOC', 'Зміст для багатосторінкових обєктів');
DEFINE('_BACK_BUTTON', 'Кнопка Назад (Повернутися)');
DEFINE('_CONTENT_NAV', 'Навігація по вмісту');
DEFINE('_UNIQ_ITEMS_IDS', 'Унікальні ідентифікатори новин');
DEFINE('_UNIQ_ITEMS_IDS2', 'При включенні параметра для кожної новини в списку буде задаватися унікальний ідентифікатор стилю.');
DEFINE('_AUTO_PUBLICATION_FRONT', 'Автоматична публікація на головній');
DEFINE('_AUTO_PUBLICATION_FRONT2', 'При включенні параметра весь створюваний вміст буде автоматично позначено для публікації на головній сторінці.');
DEFINE('_DISABLE_BLOCK', 'Відключити блокування вмісту');
DEFINE('_DISABLE_BLOCK2', 'При включенні параметра блокування обєктів вмісту не будуть перевірятися. Не рекомендується використовувати на сайтах з більшим числом редакторів.');
DEFINE('_ITEMID_COMPAT', 'Режим работи Itemid');
DEFINE('_ONE_EDITOR', 'Використовувати єдине поле редактора');
DEFINE('_ONE_EDITOR2', 'Використовувати одне поле для Вступного й Основного тексту.');
DEFINE('_LOCALE', 'Локаль');
DEFINE('_TIME_OFFSET', 'Часовий пояс (зсув часу відносно UTC, ч)');
DEFINE('_TIME_OFFSET2', 'Поточна дата й час, які будуть показуватися на сайті:');
DEFINE('_TIME_DIFF', 'Різниця з часом сервера, ч');
DEFINE('_TIME_DIFF2', 'RSS (зсув часу відносно UTC, ч)');
DEFINE('_CURR_DATE_TIME_RSS', 'Поточна дата й час, які будуть показуватися в RSS');
DEFINE('_COUNTRY_LOCALE', 'Локаль країни');
DEFINE('_COUNTRY_LOCALE2', 'Визначає регіональні настроювання країни: відображення дати, часу, чисел і т.д.');
DEFINE('_LOCALE_WINDOWS', 'При використанні в Windows необхідно ввести <span style="color:red"><strong>RU</strong></span>.<br />В Unix-системах, якщо не працює значення за замовчуванням, можна спробувати змінити регістр символів локалі на <strong>RU_RU.CP1251, ru_RU.cp1251, ru_ru.CP1251</strong>, або довідатися значення російської локалі у провайдера.<br />Також можна спробувати ввести одну з наступних локалей: <strong>rus, russian</strong>');
DEFINE('_DB_HOST', 'Адреса хоста MySQL');
DEFINE('_DB_USER', 'Імя користувача БД (MySQL)');
DEFINE('_DB_NAME', 'База даних MySQL');
DEFINE('_DB_PREFIX', 'Префікс бази даних MySQL');
DEFINE('_DB_PREFIX2', '!! НЕ ЗМІНЮЙТЕ, ЯКЩО У ВАС УЖЕ Є РОБОЧА БАЗА ДАНИХ. У ПРОТИВНОМУ ВИПАДКУ, ВИ МОЖЕТЕ ВТРАТИТИ ДО НЕЇ ДОСТУП !!');
DEFINE('_EVERYDAY_OPTIMIZATION', 'Щоденна оптимізація таблиць бази даних');
DEFINE('_EVERYDAY_OPTIMIZATION2', 'Якщо "Так", то щодоби база даних буде автоматично оптимізована для кращої швидкодії');
DEFINE('_OLD_MYSQL_SUPPORT', 'Підтримка молодших версій MySQL');
DEFINE('_OLD_MYSQL_SUPPORT2', 'Параметр дозволяє відключити автоматичний переклад роботи БД у режим сумісності з кирилицею');
DEFINE('_DISABLE_SET_SQL', 'Відключити SET sql_mode');
DEFINE('_DISABLE_SET_SQL2', 'Відключити переклад режиму роботи бази даних SET sql_mode');
DEFINE('_SERVER', 'Сервер');
DEFINE('_ABS_PATH', 'Абсолютний шлях( корінь сайту )');
DEFINE('_MEDIA_ROOT', 'Корінь медіа менеджера');
DEFINE('_MEDIA_ROOT2', 'Кореневий каталог для роботи компонента керування медіа даними. Шлях від кореня сайту без / по краях.');
DEFINE('_FILE_ROOT', 'Корінь файлового менеджера');
DEFINE('_FILE_ROOT2', 'Кореневий каталог для роботи компонента керування файлами. Без / наприкінці. При використанні в Windows (c) шлях може починатися з назви букви диска.');
DEFINE('_SECRET_WORD', 'Секретне слово');
DEFINE('_GZ_CSS_JS', 'Стиск CSS і JS файлів');
DEFINE('_SESSION_TYPE', 'Метод ідентифікації сесії');
DEFINE('_SESSION_TYPE2', 'Не змінюйте, якщо не знаєте, навіщо це треба!<br /><br /> Якщо сайт буде використовуватися користувачами служби AOL або користувачами, що використовують для доступу на сайт проксі-сервери, то можете використовувати настроювання 2 рівня');
DEFINE('_HELP_SERVER', 'Сервер допомоги');
DEFINE('_HELP_SERVER2', 'Сервер помощи - допомоги - Якщо поле порожнє, то файли допомоги будуть братися із локальної папки http://адреса_вашого_сайту/help/, Для включення сервера On-Line допомоги введіть http://help.joom.ru або http://help.joomla.org');
DEFINE('_FILE_MODE', 'Створення файлів');
DEFINE('_FILE_MODE2', 'Дозволи доступу до файлів');
DEFINE('_FILE_MODE3', 'Не міняти CHMOD для нових файлів (використовувати умовчання сервера)');
DEFINE('_FILE_MODE4', 'Установити CHMOD для нових файлів');
DEFINE('_FILE_MODE5', 'Виберіть цей пункт для установки дозволів доступу до знову створюваних файлів');
DEFINE('_OWNER', 'Власник');
DEFINE('_O_READ', 'читання');
DEFINE('_O_WRITE', 'запис');
DEFINE('_O_EXEC', 'виконання');
DEFINE('_APPLY_TO_FILES', 'Застосувати до існуючих файлів');
DEFINE('_APPLY_TO_FILES2', 'Зміни торкнуться <em>всіх існуючих файлів</em> на сайті<br /><strong>НЕПРАВИЛЬНЕ ВИКОРИСТАННЯ ЦІЄЇ ОПЦІЇ МОЖЕ ПРИЗВЕСТИ ДО НЕПРАЦЕЗДАТНОСТІ САЙТУ!</strong>');
DEFINE('_DIR_CREATION', 'Створення каталогів');
DEFINE('_DIR_CREATION2', 'Дозволи доступу до каталогів');
DEFINE('_DIR_CREATION3', 'Не міняти CHMOD для нових каталогів (використовувати умовчання сервера)');
DEFINE('_DIR_CREATION4', 'Установити CHMOD для нових каталогів');
DEFINE('_DIR_CREATION5', 'Виберіть цей пункт для установки дозволів доступу до знову створюваних каталогів');
DEFINE('_O_SEARCH', 'Пошук');
DEFINE('_APPLY_TO_DIRS', 'Застосувати до існуючих каталогів');
DEFINE('_APPLY_TO_DIRS2', 'Включення цих прапорів буде застосоване до<em> всіх існуючих каталогів</em> на сайті<br />' . '<strong>НЕПРАВИЛЬНЕ ВИКОРИСТАННЯ ЦІЄЇ ОПЦІЇ МОЖЕ ПРИВЕСТИ ДО НЕПРАЦЕЗДАТНОСТІ САЙТУ!</strong>');
DEFINE('_O_GROUP', 'Група');
DEFINE('_O_AS', 'як');
DEFINE('_RG_EMULATION_TXT', 'Емуляція Реєстрації глобальних змінних');
DEFINE('_RG_DISABLE', 'Викл. (РЕКОМЕНДУЕТЬСЯ) - додатковий захист');
DEFINE('_RG_ENABLE', 'Вкл. (НЕ РЕКОМЕНДУЕТЬСЯ) - сумісність зі старими розширеннями, при використанні параметра підвищується погроза безпеки.');
DEFINE('_METADATA', 'Метадані');
DEFINE('_SITE_DESC', 'Опис сайта, що індексується пошуковими системами');
DEFINE('_SITE_DESC2', ' Ви можете не обмежувати Ваш опис двадцятьма словами, залежно від Пошукового сервера, що Ви плануєте використовувати. Робіть опис коротким і таким, що підходить за змістом вашому сайту. Ви можете включити деякі з Ваших ключових слів і ключових фраз. Тому що деякі пошукові сервери читають більше 20 слів, то Ви можете додати одне або дві пропозиції. Будь ласка впевніться, що найважливіша частина Вашого опису перебуває в перших 20 словах.');
DEFINE('_SITE_KEYWORDS', 'Ключові слова сайту');
DEFINE('_SHOW_TITLE_TAG', 'Показувати мета-тег <strong>title</strong>');
DEFINE('_SHOW_TITLE_TAG2', 'Показує мета-тег <strong>title</strong> при перегляді обєктів вмісту');
DEFINE('_SHOW_AUTHOR_TAG', 'Показувати мета-тег <strong>author</strong>');
DEFINE('_SHOW_AUTHOR_TAG2', 'Показує мета-тег <strong>author</strong> при перегляді обєктів вмісту');
DEFINE('_SHOW_BASE_TAG', 'Показувати мета-тег <strong>base</strong>');
DEFINE('_SHOW_BASE_TAG2', 'Показує мета-тег <strong>base</strong> у тілі кожної сторінки');
DEFINE('_REVISIT_TAG', 'Значення тега <strong>revisit</strong>');
DEFINE('_REVISIT_TAG2', 'Укажіть значення тега <strong>revisit</strong> у днях');
DEFINE('_DISABLE_GENERATOR_TAG', 'Відключити тег Generator');
DEFINE('_DISABLE_GENERATOR_TAG2', 'Якщо "ТАК", то з коду кожної HTML сторінки буде виключений тег name="Generator"');
DEFINE('_EXT_IND_TAGS', 'Розширені теги індексації');
DEFINE('_EXT_IND_TAGS2', 'Якщо "ТАК", то в код кожної сторінки будуть додані спеціальні теги для кращої індексації');
DEFINE('_MAIL', 'Пошта');
DEFINE('_MAIL_METHOD', 'Для відправлення пошти використовувати');
DEFINE('_MAIL_FROM_ADR', 'Листи від (Mail From)');
DEFINE('_MAIL_FROM_NAME', 'Відправник (From Name)');
DEFINE('_SENDMAIL_PATH', 'Шлях до Sendmail');
DEFINE('_USE_SMTP', 'Використовувати SMTP-Авторизацію');
DEFINE('_USE_SMTP2', 'Виберіть ТАК, якщо для відправлення пошти використовується smtp-сервер з необхідністю авторизації');
DEFINE('_SMTP_USER', 'Імя користувача SMTP');
DEFINE('_SMTP_USER2', 'Заповнюється, якщо для відправлення пошти використовується smtp-сервер з необхідністю авторизації');
DEFINE('_SMTP_PASS', 'Пароль для доступу до SMTP');
DEFINE('_SMTP_PASS2', 'Заповнюється, якщо для відправлення пошти використовується smtp-сервер з необхідністю авторизації');
DEFINE('_SMTP_SERVER', 'Адреси SMTP-сервера');
DEFINE('_CACHE', 'Кеш');
DEFINE('_ENABLE_CACHE', 'Включити кеширування');
DEFINE('_ENABLE_CACHE2', 'Включення кеширування зменшує запити до MySQL і зменшує навантаження на сервер');
DEFINE('_CACHE_OPTIMIZATION', 'Оптимізація кеширування');
DEFINE('_CACHE_OPTIMIZATION2', 'Автоматично видаляє з файлів кеша зайві символи, тим самим зменшуючи розмір файлів.');
DEFINE('_AUTOCLEAN_CACHE_DIR', 'Автоматичне очищення каталогу кеша');
DEFINE('_AUTOCLEAN_CACHE_DIR2', 'Автоматично очищати каталог кеша видаляючи прострочені файли.');
DEFINE('_CACHE_MENU', 'Кеширування меню панелі керування');
DEFINE('_CACHE_MENU2', 'Включення кеширування меню панелі керування. Працює незалежно від стандартного кеша.');
DEFINE('_CANNOT_CACHE', 'Кеширування не можливо');
DEFINE('_CANNOT_CACHE2', '<font color="red"><strong>Каталог кеша не доступний для запису.</strong></font>');
DEFINE('_CACHE_DIR', 'Каталог кеша');
DEFINE('_CACHE_DIR2', 'Поточний каталог кеша <strong>Доступен для записи</strong>');
DEFINE('_CACHE_DIR3', 'Поточний каталог кеша <strong>НЕ ДОСТУПНИЙ ДЛЯ ЗАПИСУ</strong> - змініть CHMOD каталога на 755 перед включенням кеша');
DEFINE('_CACHE_TIME', 'Час життя кеша');
DEFINE('_DB_CACHE', 'Кеш запитів бази даних');
DEFINE('_DB_CACHE_TIME', 'Час життя кеша запитів бази даних');
DEFINE('_STATICTICS', 'Статистика');
DEFINE('_ENABLE_STATS', 'Включити збір статистики');
DEFINE('_ENABLE_STATS2', 'Дозволити/заборонити збір статистики сайту');
DEFINE('_STATS_HITS_DATE', 'Вести статистику перегляду вмісту по даті');
DEFINE('_STATS_HITS_DATE2', 'ПОПЕРЕДЖЕННЯ: У цьому режимі записуються більші обсяги даних!');
DEFINE('_STATS_SEARCH_QUERIES', 'Статистика пошукових запитів');
DEFINE('_SEF_URLS', 'Дружні для пошукових систем URL-и (SEF)');
DEFINE('_SEF_URLS2', 'Тільки для Apache! Перед використанням перейменуйте htaccess.txt в .htaccess. Це необхідно для включення модуля apache - mod_rewrite');
DEFINE('_DYNAMIC_PAGETITLES', 'Динамічні заголовки сторінок (теги title)');
DEFINE('_DYNAMIC_PAGETITLES2', 'Динамічна зміна заголовків сторінок залежно від поточного вмісту, що переглядається');
DEFINE('_CLEAR_FRONTPAGE_LINK', 'Очищення посилання на com_frontpage');
DEFINE('_CLEAR_FRONTPAGE_LINK2', 'Надавати посиланню на компонент головної сторінки більше короткий вид.');
DEFINE('_DISABLE_PATHWAY_ON_FRONT', 'Приховувати пачвей (pathway) на головній');
DEFINE('_DISABLE_PATHWAY_ON_FRONT2', 'При включеному режимі рядок "Головна" на першій сторінці сайту буде замінена на символ нерозривного пробілу.');
DEFINE('_TITLE_ORDER', 'Порядок розташування елементів title');
DEFINE('_TITLE_ORDER2', 'Порядок розташування елементів заголовка сторінок (тег title)');
DEFINE('_TITLE_SEPARATOR', 'Роздільник елементів title');
DEFINE('_TITLE_SEPARATOR2', 'Роздільник елементів заголовка сторінок (тег title). За замовчуванням - дефіс.');
DEFINE('_INDEX_PRINT_PAGE', 'Індексація друкованої версії');
DEFINE('_INDEX_PRINT_PAGE2', 'Якщо "ТАК", то друкована версія вмісту буде доступна для індексації');
DEFINE('_REDIR_FROM_NOT_WWW', 'Переадресація з не WWW адрес');
DEFINE('_REDIR_FROM_NOT_WWW2', 'При заході на сайт по посиланню site.ru, автоматично буде зроблена переадресація на www.sie.ru');
DEFINE('_ADMIN_CAPTCHA', 'Для авторизації в панелі керування');
DEFINE('_ADMIN_CAPTCHA2', 'Використовувати captcha для більше безпечної авторизації в панелі керування.');
DEFINE('_REGISTRATION_CAPTCHA', 'Для реєстрації');
DEFINE('_REGISTRATION_CAPTCHA2', 'Використовувати captcha для більше безпечної реєстрації.');
DEFINE('_CONTACTS_CAPTCHA', 'Для форми контактів');
DEFINE('_CONTACTS_CAPTCHA2', 'Використовувати captcha для більше безпечної форми контактів.');

DEFINE('_O_OTHER', 'Різні');
DEFINE('_SECURITY_LEVEL3', '3 Рівень захисту - За замовчуванням - найкращий');
DEFINE('_SECURITY_LEVEL2', '2 Рівень захисту - Дозволено для IP-адрес проксі');
DEFINE('_SECURITY_LEVEL1', '1 Рівень захисту - Зворотна сумісність');
DEFINE('_PHP_MAIL_FUNCTION', 'Функцію PHP mail');
DEFINE('_CONSTRUCT_ERROR', 'помилка складання');

DEFINE('_TIME_OFFSET_M_12', '(UTC -12:00) Міжнародна лінія добового часу');
DEFINE('_TIME_OFFSET_M_11', '(UTC -11:00) острів Мідуей, Самоа');
DEFINE('_TIME_OFFSET_M_10', '(UTC -10:00) Гаваї');
DEFINE('_TIME_OFFSET_M_9_5', '(UTC -09:30) Тайохае, Маркизські острови');
DEFINE('_TIME_OFFSET_M_9', '(UTC -09:00) Аляска');
DEFINE('_TIME_OFFSET_M_8', '(UTC -08:00) Тихоокеанський час (США &amp; Канада)');
DEFINE('_TIME_OFFSET_M_7', '(UTC -07:00) Час Монтани (США &amp; Канада)');
DEFINE('_TIME_OFFSET_M_6', '(UTC -06:00) Центральний час  (США &amp; Канада), Мехіко');
DEFINE('_TIME_OFFSET_M_5', '(UTC -05:00) Східний час (США &amp; Канада), Богота, Лайма');
DEFINE('_TIME_OFFSET_M_4', '(UTC -04:00) Атлантичний час (Канада), Каракас, Ла-Пас');
DEFINE('_TIME_OFFSET_M_3_5', '(UTC -03:30) Нюфаундленд і Лабрадор');
DEFINE('_TIME_OFFSET_M_3', '(UTC -03:00) Бразабоя, Буенос Айрес, Джорджтаун');
DEFINE('_TIME_OFFSET_M_2', '(UTC -02:00) Середньо-Атлантичний час');
DEFINE('_TIME_OFFSET_M_1', '(UTC -01:00 час) Азорські острови, Острови Зеленого Мису');
DEFINE('_TIME_OFFSET_M_0', '(UTC 00:00) Західно-Європейський час, Лондон, Лісабон, Касабланка');
DEFINE('_TIME_OFFSET_P_1', '(UTC +01:00 час) Брюссель, Копенгаген, Мадрид, Париж');
DEFINE('_TIME_OFFSET_P_2', '(UTC +02:00) Україна, Київ, Мінськ, Калінінград, Південна Африка');
DEFINE('_TIME_OFFSET_P_3', '(UTC +03:00) Москва, Санкт-Петербург, Багдад, Ер-Рияд');
DEFINE('_TIME_OFFSET_P_3_5', '(UTC +03:30) Тегеран');
DEFINE('_TIME_OFFSET_P_4', '(UTC +04:00) Самара, Баку, Тбабосі, Абу-Дабі, Мускат');
DEFINE('_TIME_OFFSET_P_4_5', '(UTC +04:30) Кабул');
DEFINE('_TIME_OFFSET_P_5', '(UTC +05:00) Оренбург, Екатеринбург, Перм, Ташкент, Ісламабад, Карачі');
DEFINE('_TIME_OFFSET_P_5_5', '(UTC +05:30) Бомбей, Калькутта, Мадрас, Ню-Дели');
DEFINE('_TIME_OFFSET_P_5_75', '(UTC +05:45) Катманду');
DEFINE('_TIME_OFFSET_P_6', '(UTC +06:00) Омск, Новосибірськ, Алмати, Дака, Коломбо');
DEFINE('_TIME_OFFSET_P_6_5', '(UTC +06:30) Ягун');
DEFINE('_TIME_OFFSET_P_7', '(UTC +07:00) Красноярськ, Бангкок, Ханой, Джакарта');
DEFINE('_TIME_OFFSET_P_8', '(UTC +08:00) Іркутськ, Улан-Батор, Пекін, Сінгапур, Гонконг');
DEFINE('_TIME_OFFSET_P_8_75', '(UTC +08:00) Західна Австралія');
DEFINE('_TIME_OFFSET_P_9', '(UTC +09:00) Якутськ, Токіо, Сеул, Осака, Саппоро');
DEFINE('_TIME_OFFSET_P_9_5', '(UTC +09:30) Аделаїда, Дарвін');
DEFINE('_TIME_OFFSET_P_10', '(UTC +10:00) Владівосток, Гуам, Східна Австралія');
DEFINE('_TIME_OFFSET_P_10_5', '(UTC +10:30) острів Lord Howe (Австралія)');
DEFINE('_TIME_OFFSET_P_11', '(UTC +11:00) Магадан, Соломонові острови, Нова Каледонія');
DEFINE('_TIME_OFFSET_P_11_5', '(UTC +11:30) острів Норфолк');
DEFINE('_TIME_OFFSET_P_12', '(UTC +12:00) Камчатка, Окленд, Уеллінгтон, Фіджі');
DEFINE('_TIME_OFFSET_P_12_75', '(UTC +12:45) Острів Чатем');
DEFINE('_TIME_OFFSET_P_13', '(UTC +13:00) Тонга');
DEFINE('_TIME_OFFSET_P_14', '(UTC +14:00) Кірібаті');

/* administrator components com_contact */
DEFINE('_CONTACT_MANAGEMENT', 'Керування контактами');
DEFINE('_ON_SITE', 'На сайті');
DEFINE('_RELATED_WITH_USER', 'Повязане з користувачем');
DEFINE('_CHANGE_CONTACT', 'Змінити контакт');
DEFINE('_CHANGE_CATEGORY', 'Змінити категорію');
DEFINE('_CHANGE_USER', 'Змінити користувача');
DEFINE('_ENTER_NAME_PLEASE', 'Ви повинні ввести імя');
DEFINE('_NEW_CONTACT', 'Новий');
DEFINE('_CONTACT_DETAILS', 'Деталі контакту');
DEFINE('_USER_POSITION', 'Положення (посада)');
DEFINE('_ADRESS_STREET_HOUSE', 'Адреса (вулиця, будинок)');
DEFINE('_CITY', 'Місто');
DEFINE('_STATE', 'Край/Область/Республіка');
DEFINE('_COUNTRY', 'Країна');
DEFINE('_POSTCODE', 'Поштовий індекс');
DEFINE('_ADDITIONAL_INFO', 'Додаткова інформація');
DEFINE('_PUBLISH_INFO', 'Інформація про публікацію');
DEFINE('_POSITION', 'Розташування');
DEFINE('_IMAGES_INFO', 'Інформація про зображення');
DEFINE('_PARAMETERS', 'Параметри');
DEFINE('_CONTACT_PARAMS', '* Ці параметри управляють відображенням тільки при перегляді інформації про контакт*');

/* administrator components com_content */
DEFINE('_SITE_CONTENT', 'Вміст сайту');
DEFINE('_GOTO_EDIT', 'Перейти в редагування');
DEFINE('_SORT_BY', 'Сортування по');
DEFINE('_HIDE_NAV_TREE', 'Сховати дерево навігації');
DEFINE('_ON_FRONTPAGE', 'На головній');
DEFINE('_SAVE_ORDER', 'Зберегти порядок');
DEFINE('_TO_TRASH', 'У кошик');
DEFINE('_NEVER', 'Ніколи');
DEFINE('_START', 'Початок');
DEFINE('_ALWAYS', 'Завжди');
DEFINE('_END', 'Закінчення');
DEFINE('_WITHOUT_END', 'Без закінчення');
DEFINE('_CHANGE_USER_DATA', 'Змінити дані користувача');
DEFINE('_CHANGE_CONTENT', 'Змінити вміст');
DEFINE('_CHOOSE_OBJECTS_TO_TRASH', 'Будь ласка, виберіть зі списку обєкти, які Ви хочете відправити в кошик');
DEFINE('_WANT_TO_TRASH', 'Ви впевнені, що хочете відправити обєкт(и) у кошик? \n Це не приведе до повного видалення обєктів');
DEFINE('_ARCHIVE', 'Архів');
DEFINE('_ALL_SECTIONS', 'Всі розділи');
DEFINE('_OBJECT_MUST_HAVE_TITLE', 'Цей обєкт повинен мати заголовок');
DEFINE('_PLEASE_CHOOSE_SECTION', 'Ви повинні вибрати розділ');
DEFINE('_PLEASE_CHOOSE_CATEGORY', 'Ви повинні вибрати категорію');
DEFINE('_O_EDITING', 'Редагування');
DEFINE('_O_CREATION', 'Створення');
DEFINE('_OBJECT_DETAILS', 'Деталі обєкта');
DEFINE('_ALIAS', 'Псевдонім');
DEFINE('_INTROTEXT_M', 'Вступний Текст: (обовязково)');
DEFINE('_MAINTEXT_M', 'Основний текст: (необовязково)');
DEFINE('_NOTETEXT_M', 'Замітки: (необовязково)');
DEFINE('_HIDE_PARAMS_PANEL', 'Сховати панель параметрів');
DEFINE('_SETTINGS', 'Налаштування');
DEFINE('_IN_ARCHIVE', 'В архіві');
DEFINE('_DRAFT_NOT_PUBLISHED', 'Чернетка - Не опублікована');
DEFINE('_RESET', 'Обнулити');
DEFINE('_CHANGED', 'Змінювалося');
DEFINE('_CREATED', 'Створено');
DEFINE('_NEW_DOCUMENT', 'Новий документ');
DEFINE('_LAST_CHANGE', 'Остання зміна');
DEFINE('_NOT_CHANGED', 'Не змінювалося');
DEFINE('_START_PUBLICATION', 'Початок публікації');
DEFINE('_END_PUBLICATION', 'Закінчення публікації');
DEFINE('_OBJECT_ID', 'ID обєкта');
DEFINE('_USED_IMAGES', 'Використовувані зображення');
DEFINE('_SUBDIRECTORY', 'Підпапка');
DEFINE('_IMAGE_EXAMPLE', 'Приклад зображення');
DEFINE('_ACTIVE_IMAGE', 'Активне зображення');
DEFINE('_SOURCE', 'Джерело');
DEFINE('_ALIGN', 'Вирівнювання');
DEFINE('_PARAMS_IN_VIEW', '* Ці параметри управляють зовнішнім виглядом тільки в режимі повного перегляду*');
DEFINE('_ROBOTS_PARAMS', 'Настроювання керування роботами');
DEFINE('_MENU_LINK', 'Звязок з меню');
DEFINE('_MENU_LINK2', 'Тут створюється пункт меню (Посилання – обєкт вмісту), що вставляється в обране зі списку меню');
DEFINE('_EXISTED_MENUITEMS', 'Існуючі пункти меню');
DEFINE('_PLEASE_SELECT_SMTH', 'Будь ласка, виберіть що-небудь');
DEFINE('_OBJECT_MOVING', 'Переміщення обєктів');
DEFINE('_MOVE_INTO_CAT_SECT', 'Перемістити в розділ/категорію');
DEFINE('_OBJECTS_TO_MOVE', 'Будут переміщені обєкти');
DEFINE('_SELECT_CAT_TO_MOVE_OBJECTS', 'Будь ласка, виберіть розділ або категорію для копіювання обєктів');
DEFINE('_COPYING_CONTENT_ITEMS', 'Копіювання обєктів вмісту');
DEFINE('_COPY_INTO_CAT_SECT', 'Копіювати в розділ/категорію');
DEFINE('_OBJECTS_TO_COPY', 'Будут скопійовані обєкти');
DEFINE('_ORDER_BY_NAME', 'Внутрішньому порядку');
DEFINE('_ORDER_BY_HEADERS', 'Заголовкам');
DEFINE('_ORDER_BY_DATE_CR', 'Даті створення');
DEFINE('_ORDER_BY_DATE_MOD', 'Даті модифікації');
DEFINE('_ORDER_BY_ID', 'Ідентифікаторам ID');
DEFINE('_ORDER_BY_HITS', 'Переглядам');
DEFINE('_CANNOT_EDIT_ARCHIVED_ITEM', 'Ви не можете відредагувати архівний обєкт');
DEFINE('_NOW_EDITING_BY_OTHER', 'в цей час редагується іншим користувачем');
DEFINE('_ROBOTS_HIDE', 'Сховати мета-тег robots');
DEFINE('_CONTENT_ITEM_SAVED', 'Зміни успішно збережені в');
DEFINE('_OBJ_ARCHIVED', 'обєкт(и) успішно архівований(і)');
DEFINE('_OBJ_PUBLISHED', 'обєкт(и) успішно опублікований(і)');
DEFINE('_OBJ_UNARCHIVED', 'обєкт(и) успішно витягнутий(і) из архіву');
DEFINE('_OBJ_UNPUBLISHED', 'обєкт(и) успішно знят(і) з публікації');
DEFINE('_CHOOSE_OBJ_TOGGLE', 'Виберіть обєкт для перемикання');
DEFINE('_CHOOSE_OBJ_DELETE', 'Виберіть обєкт для видалення');
DEFINE('_MOVED_TO_TRASH', 'Відправлено в кошик');
DEFINE('_CHOOSE_OBJ_MOVE', 'Виберіть обєкт для переміщення');
DEFINE('_ERROR_OCCURED', 'Сталася помилка');
DEFINE('_OBJECTS_MOVED_TO_SECTION', 'обєкт(и) успішно переміщений(і) в розділ');
DEFINE('_OBJECTS_COPIED_TO_SECTION', 'обєкт(и) успішно скопійовані в розділ');
DEFINE('_HITCOUNT_RESETTED', 'Лічильник переглядів скинутий');
DEFINE('_TIMES', 'раз');

/* administrator components com_easysql */
DEFINE('_SQL_COMMAND', 'Команда');
DEFINE('_MANAGEMENT', 'Керування');
DEFINE('_FIELDS', 'Поля');
DEFINE('_EXEC_SQL', 'Виконати SQL');
DEFINE('_SQL_CONSOL', 'SQL консоль');
DEFINE('_SQL_TABLE', 'Таблиця:');
DEFINE('_SQL_ROWS_ENTER', 'Вивести рядків:');
DEFINE('_SQL_MAKE', 'Зібрати SQL');

/* administrator components com_frontpage */
DEFINE('_UNKNOWN_ID', 'Ідентифікатор не пізнаний');
DEFINE('_REMOVE_FROM_FRONT', 'Забрати з головної');
DEFINE('_PUBLISH_TIME_END', 'Час публікації минув');
DEFINE('_CANNOT_CHANGE_PUBLISH_STATE', 'Зміна статусу публікації недоступна');
DEFINE('_CHANGE_SECTION', 'Змінити розділ');

/* administrator components com_installer */
DEFINE('_OTHER_COMPONENT_USE_DIR', 'Інший компонент вже використовує каталог');
DEFINE('_CANNOT_CREATE_DIR', 'Неможливо створити каталог');
DEFINE('_SQL_ERROR', 'Помилка виконання SQL');
DEFINE('_ERROR_MESSAGE', 'Текст помилки');
DEFINE('_CANNOT_COPY_PHP_INSTALL', 'Не можу скопіювати PHP-Файл установки');
DEFINE('_CANNOT_COPY_PHP_REMOVE', 'Не можу скопіювати PHP-Файл видалення');
DEFINE('_ERROR_DELETING', 'Помилка видалення');
DEFINE('_IS_PART_OF_CMS', 'є елементом ядра Joomla і не може бути вилучений<br />Ви повинні зняти його з публікації, якщо не хочете його використовувати');
DEFINE('_DELETE_ERROR', 'Видалення - помилка');
DEFINE('_UNINSTALL_ERROR', 'Помилка деінсталяції');
DEFINE('_BAD_XML_FILE', 'Неправильний XML-файл');
DEFINE('_PARAM_FILED_EMPTY', 'Поле параметра порожнє й неможливо видалити файли');
DEFINE('_INSTALLED_COMPONENTS', 'Установлені компоненти');
DEFINE('_INSTALLED_COMPONENTS2', 'Тут показані тільки ті розширення, які Ви можете видалити. Частини ядра Joostina видалити не можна.');
DEFINE('_COMPONENT_NAME', 'Назва компонента');
DEFINE('_COMPONENT_LINK', 'Посилання меню компонента');
DEFINE('_COMPONENT_AUTHOR_URL', 'URL автора');
DEFINE('_OTHER_COMPONENTS_NOT_INSTALLED', 'Сторонні компоненти не встановлені');
DEFINE('_COMPONENT_INSTALL', 'Установка компонента');
DEFINE('_DELETING', 'Видалення');
DEFINE('_CANNOT_DEL_LANG_ID', 'id мови порожньо, тому неможливо видалити файли');
DEFINE('_GOTO_LANG_MANAGEMENT', 'Перейти в Керування мовами');
DEFINE('_INTALL_LANG', 'Установка мовного пакета сайту');
DEFINE('_NO_FILES_OF_MAMBOTS', 'Немає файлів, відзначених як мамботи');
DEFINE('_WRONG_ID', 'Неправильный id обєкта');
DEFINE('_BAD_DIR_NAME_EMPTY', 'Поле папки порожнє, неможливо видалити файли');
DEFINE('_INSTALLED_MAMBOTS', 'Встановлені мамботи');
DEFINE('_MAMBOT', 'Мамбот');
DEFINE('_TYPE', 'Тип');
DEFINE('_OTHER_MAMBOTS', 'Це не мамботи ядра, а сторонні мамботи');
DEFINE('_INSTALL_MAMBOT', 'Установка мамбота');
DEFINE('_UNKNOWN_CLIENT', 'Невідомий тип клієнта');
DEFINE('_NO_FILES_MODULES', 'Файли, відмічені як модулі, відсутні');
DEFINE('_ALREADY_EXISTS', 'вже існує');
DEFINE('_DELETING_XML_FILE', 'Видалення XML файла');
DEFINE('_INSTALL_MODULE', 'Встановлення модулів');
DEFINE('_MODULE', 'Модуль');
DEFINE('_USED_ON', 'Використовується');
DEFINE('_NO_OTHER_MODULES', 'Сторонні модулі не встановлені');
DEFINE('_MODULE_INSTALL', 'Установка модуля');
DEFINE('_SITE_MODULES', 'Модулі сайту');
DEFINE('_ADMIN_MODULES', 'Модулі панелі керування');
DEFINE('_CANNOT_DEL_FILE_NO_DIR', 'Неможливо видалити файл, тому що каталог не існує');
DEFINE('_WRITEABLE', 'Доступний для запису');
DEFINE('_UNWRITEABLE', 'Недоступний для запису');
DEFINE('_CHOOSE_DIRECTORY_PLEASE', 'Будь ласка, виберіть каталог');
DEFINE('_ZIP_UPLOAD_AND_INSTALL', 'Завантаження архіву розширення з наступною установкою');
DEFINE('_PACKAGE_FILE', 'Файл пакета');
DEFINE('_UPLOAD_AND_INSTALL', 'Завантажити й встановити');
DEFINE('_INSTALL_FROM_DIR', 'Установка з каталогу');
DEFINE('_INSTALLATION_DIRECTORY', 'Каталог установки');
DEFINE('_CONTINUE', 'Продовжити');
DEFINE('_NO_INSTALLER', 'не знайдений інсталятор');
DEFINE('_CANNOT_INSTALL', 'Установка [$element] неможлива');
DEFINE('_CANNOT_INSTALL_DISABLED_UPLOAD', 'Установка неможлива, поки заборонено завантаження файлів. Будь ласка, використовуйте установку з каталогу.');
DEFINE('_INSTALL_ERROR', 'Помилка установки');
DEFINE('_CANNOT_INSTALL_NO_ZLIB', 'Установка неможлива, поки не встановлена підтримка zlib');
DEFINE('_NO_FILE_CHOOSED', 'Файл не обраний');
DEFINE('_ERORR_UPLOADING_EXT', 'Помилка завантаження нового модуля');
DEFINE('_UPLOADING_ERROR', 'Завантаження невдале');
DEFINE('_SUCCESS', 'успішно');
DEFINE('_UNSUCCESS', 'невдало');
DEFINE('_UPLOAD_OF_EXT', 'Завантаження нового елемента');
DEFINE('_DELETE_SUCCESS', 'Видалення успішно');
DEFINE('_CANNOT_CHMOD', 'Не можу змінити права доступу до завантаженого файлу');
DEFINE('_CANNOT_MOVE_TO_MEDIA', 'Не можу перемістити завантажений файл у каталог <code>/media</code>');
DEFINE('_CANNOT_WRITE_TO_MEDIA', 'Завантаження зірване, тому що каталог <code>/media</code> недоступний для запису.');
DEFINE('_CANNOT_INSTALL_NO_MEDIA', 'Завантаження зірване, тому що каталог <code>/media</code> не існує');
DEFINE('_ERROR_NO_XML_JOOMLA', 'Помилка: У інсталяційному пакеті неможливо знайти XML-файл установки Joomla.');
DEFINE('_ERROR_NO_XML_INSTALL', 'Помилка: У інсталяційному пакеті неможливо знайти XML-файл установки.');
DEFINE('_NO_NAME_DEFINED', 'Не визначене Імя файлу');
DEFINE('_FILE', 'Файл');
DEFINE('_NOT_CORRECT_INSTALL_FILE_FOR_JOOMLA', 'не є коректним файлом установки Joomla!');
DEFINE('_CANNOT_RUN_INSTALL_METHOD', 'Метод "install" не може бути викликаний класом');
DEFINE('_CANNOT_RUN_UNINSTALL_METHOD', 'Метод "uninstall" не може бути викликаний класом');
DEFINE('_CANNOT_FIND_INSTALL_FILE', 'Інсталяційний файл не знайдений');
DEFINE('_XML_NOT_FOR', 'Інсталяційний XML-файл - не для');
DEFINE('_FILE_NOT_EXISTS', 'Файл не існує');
DEFINE('_INSTALL_TWICE', 'Ви намагаєтеся двічі встановити те саме розширення');
DEFINE('_ERROR_COPYING_FILE', 'Помилка копіювання файлу');

/* administrator components com_jce */
DEFINE('_LANG_ALREADY_EXISTS', 'Мова вже існує');
DEFINE('_EMPTY_LANG_ID', 'Порожній id мови, неможливо видалити файли');
DEFINE('_NO_PLUGIN_FILES', 'Файли плагінів відсутні');
DEFINE('_BAD_OBJECT_ID', 'Невірний id обєкта');
DEFINE('_EMPRY_DIR_NAME_CANNOT_DEL_FILE', 'Поле папки порожнє, неможливо видалити файл');
DEFINE('_INSTALLED_JCE_PLUGINS', 'Встановлені плагіни JCE');
DEFINE('_PCLZIP_UNKNOWN_ERROR', 'Непоправна помилка');
DEFINE('_UNZIP_ERROR', 'Помилка розпакування');
DEFINE('_JCE_INSTALL_ERROR_NO_XML', 'ПОМИЛКА: Неможливо знайти в пакеті XML-Файл установки JCE 1.1.x.');
DEFINE('_JCE_INSTALL_ERROR_NO_XML2', 'ПОМИЛКА: Неможливо знайти в пакеті XML-Файл установки.');
DEFINE('_JCE_UNKNOWN_FILENAME', 'Імя файлу не визначене');
DEFINE('_BAD_JCE_INSTALL_FILE', ' неправильный файл установки JCE або його версія неправильна.');
DEFINE('_WRONG_PLUGIN_VERSION', 'Неправильна версія плагина');
DEFINE('_ERROR_CREATING_DIRECTORY', 'Помилка створення каталога');
DEFINE('_INSTALLER_NOT_FIND_ELEMENT', 'Інсталятор не виявив елемент');
DEFINE('_NO_INSTALLER_FOR_COMPONENT', 'Інсталятор недоступний для елемента');
DEFINE('_NO_CHOOSED_FILES', 'Файли не обрані');
DEFINE('_ERROR_OF_UPLOAD', 'Помилка завантаження');
DEFINE('_UPLOADING', 'Завантаження');
DEFINE('_IS_SUCCESS', 'успішна');
DEFINE('_HAS_ERROR', 'завершилася помилкою');
DEFINE('_CANNOT_DELETE_LANG_FILE', 'Не можна видаляти використовуваний мовний пакет');
DEFINE('_GUEST', 'Гість');
DEFINE('_EDITOR', 'Редактор');
DEFINE('_PUBLISHER', 'Видавець');
DEFINE('_MANAGER', 'Менеджер');
DEFINE('_ADMINISTRATOR', 'Адміністратор');
DEFINE('_SUPER_ADMINISTRATOR', 'Супер-Адміністратор');
DEFINE('_CHANGES_FOR_PLUGIN', 'Зміни для плагіна');
DEFINE('_SUCCESS_SAVE', 'успішне збереження');
DEFINE('_PLUGIN', 'Плагін');
DEFINE('_MODULE_IS_EDITING_BY_ADMIN', 'Модуль у цей час редагується іншим адміністратором');
DEFINE('_CHOOSE_PLUGIN_FOR_ACCESS_MANAGEMENT', 'Для призначення прав доступу необхідно вибрати плагін');
DEFINE('_CHOOSE_PLUGIN_FOR', 'Виберіть плагін для');
DEFINE('_JCE_CONFIG', 'Конфігурація JCE');
DEFINE('_EDITOR_CONFIG', 'Конфігурація редактора');
DEFINE('_EXTENSIONS', 'Розширення');
DEFINE('_EXTENSION_MANAGEMENT', 'Керування розширеннями');
DEFINE('_ICONS_POSITIONS', 'Розташування значків');
DEFINE('_LANG_MANAGER', 'Менеджер локалізацій');
DEFINE('_FILE_NOT_FOUND', 'Файл не знайдений');
DEFINE('_PLUGIN_NOT_FOUND', 'Плагін не знайдений');
DEFINE('_JCE_CONTENT_MAMBOT_NOT_INSTALLED', 'Мамбот редактора JCE не встановлений');
DEFINE('_ICONS_POSITIONS_SAVED', 'Розташування значків збережене');
DEFINE('_MAIN_PAGE', 'Головна');
DEFINE('_NEW', 'Новий');
DEFINE('_INSTALLATION', 'Установка');
DEFINE('_PREVIEW', 'Передпроглядання');
DEFINE('_PLUGINS', 'Плагіни');

/* administrator components com_jce */
DEFINE('_USERS', 'Користувачі');
DEFINE('_USER_LOGIN_TXT', 'Імя користувача (логін )');
DEFINE('_LOGGED_IN', 'На сайті');
DEFINE('_ALLOWED', 'Дозволений');
DEFINE('_LAST_LOGIN', 'Останнє відвідування');
DEFINE('_USER_BLOCK', 'Блокування');
DEFINE('_ALLOW', 'Дозволити');
DEFINE('_DISALLOW', 'Заборонити');
DEFINE('_ENTER_LOGIN_PLEASE', 'Ви повинні ввести імя користувача для входу на сайт');
DEFINE('_BAD_USER_LOGIN', 'Ваше імя для входу містить неправильні символи або занадто коротке.');
DEFINE('_ENTER_EMAIL_PLEASE', 'Ви повинні ввести адресу e-mail');
DEFINE('_ENTER_GROUP_PLEASE', 'Ви повинні призначити користувачеві групу доступу');
DEFINE('_BAD_PASSWORD', 'Пароль неправильний');
DEFINE('_BAD_GROUP_1', 'Будь ласка, виберіть іншу групу. Групи типу "Public Front-end" вибирати не можна');
DEFINE('_BAD_GROUP_2', 'Будь ласка, виберіть іншу групу. Групи типу "Public Back-end" вибирати не можна');
DEFINE('_USER_INFO', 'Інформація про користувача');
DEFINE('_NEW_PASSWORD', 'Новий пароль');
DEFINE('_REPEAT_PASSWORD', 'Перевірка пароля');
DEFINE('_BLOCK_USER', 'Блокувати користувача');
DEFINE('_RECEIVE_EMAILS', 'Одержувати системні повідомлення на e-mail');
DEFINE('_REGISTRATION_DATE', 'Дата реєстрації');
DEFINE('_CONTACT_INFO', 'Контактна інформація');
DEFINE('_NO_USER_CONTACTS', 'У цього користувача немає контактної інформації:<br />Для подробиць дивитеся "Компоненти -> Контакти -> Керування контактами"');
DEFINE('_FULL_NAME', 'Повне імя');
DEFINE('_CHANGE_CONTACT_INFO', 'Змінити контактну інформацію');
DEFINE('_CONTACT_INFO_PATH_URL', 'Компоненти -> Контакти -> Керування контактами');
DEFINE('_RESTRICT_FUNCTION', 'Функціональність обмежена');
DEFINE('_NO_RIGHT_TO_CHANGE_GROUP', 'Ви не можете змінити цю групу користувачів. Це може зробити тільки Головний адміністратор сайту');
DEFINE('_NO_RIGHT_TO_USER_CREATION', 'Ви не можете створити користувача із цим рівнем доступу. Це може зробити тільки Головний адміністратор сайту');
DEFINE('_PROFILE_SAVE_SUCCESS', 'Успішно збережені зміни профілю користувача');
DEFINE('_CANNOT_DEL_ONE_SUPER_ADMIN', 'Ви не можете видалити цього Головного адміністратора, тому що він єдиний Головний адміністратор сайту');
DEFINE('_CHOOSE_USER_TO', 'Виберіть користувача для');
DEFINE('_PLEASE_CHOOSE_USER', 'Будь ласка, виберіть користувача');
DEFINE('_CANNOT_DISABLE_SUPER_ADMIN', 'Ви не можете відключити Головного адміністратора');
DEFINE('_THIS_CAN_DO_HIGHLEVEL_USERS', 'Це можуть робити тільки користувачі з більш високим рівнем доступу');
DEFINE('_DISABLE', 'Відключити');

/* administrator components com_typedcontent */
DEFINE('_ACCESS', 'Доступ');
DEFINE('_LINKS_COUNT', 'Посилань');
DEFINE('_DATE_PUBL_END', 'Минув строк публікації');
DEFINE('_CHANGE_STATIC_CONTENT', 'Змінити статичний вміст');
DEFINE('_WANT_TO_RESET_HITCOUNT', 'Ви дійсно хочете обнулити лічильник переглядів? \nЛюбі незбережені зміни цього вмісту будуть загублені.');
DEFINE('_CONTENT_OBJECT_MUST_HAVE_NAME', 'обєкт вмісту повинен мати назву');
DEFINE('_CONTENT_INFO', 'Інформація про вміст');
DEFINE('_O_STATE', 'Стан');
DEFINE('_CHANGE_AUTHOR', 'Змінити автора');
DEFINE('_GALLERY_IMAGES', 'Зображення галереї');
DEFINE('_CONTENT_IMAGES', 'Зображення вмісту');
DEFINE('_EDITING_SELECTED_IMAGE', 'Редагування обраного зображення');
DEFINE('_ALTERNATIVE_TEXT', 'Альтернативний текст');
DEFINE('_MENU_LINK_3', 'Тут створюється пункт меню типу "Посилання - Статичий вміст", який вставляється в обране зі списку меню');
DEFINE('_EXISTED_MENU_LINKS', 'Існуючі звязки з меню');
DEFINE('_CONTENT_SAVED', 'Вміст збережений');
DEFINE('_CHOOSE_OBJECT_FOR', 'Виберіть обєкт для');
DEFINE('_O_SECCESS_PUBLISHED', 'обєктів успішно опубліковано');
DEFINE('_O_SUCCESS_UNPUBLISHED', 'обєктів успішно сховане');
DEFINE('_HIT_COUNT_RESETTED', 'Лічильник переглядів успішно обнулений');
DEFINE('_SUCCESS_MENU_CR_1', '(Посилання - Статичний вміст) в меню');

/* administrator components com_trash */
DEFINE('_TRASH', 'Корзина');
DEFINE('_OBJECT_DELETION', 'Видалення обєктів');
DEFINE('_OBJECTS_TO_DELETE', 'обєкти, що видаляються');
DEFINE('_THIS_ACTION_WILL_DELETE_O_FOREVER', '* Це дія <strong><font color="#FF0000">назовсім видалить</font></strong> <br />перераховані обєкти з бази даних*');
DEFINE('_REALLY_DELETE_OBJECTS', 'Ви дійсно хочете видалити перераховані обєкти? \nЦя дія назовсім видалить перераховані обєкти з бази даних.');
DEFINE('_OBJECT_RESTORE', 'Відновлення обєктів');
DEFINE('_OBECTS_TO_RESTORE', 'Відновлювані обєкти');
DEFINE('_THIS_ACTION_WILL_RESTORE_O_FOREVER', '* Ця дія <strong><font color="#FF0000">відновить</font></strong> ці обєкти,<br />потім вони будуть повернуті на колишні місця, як неопубліковані обєкти*');
DEFINE('_REALLY_RESTORE_OBJECTS', 'Ви дійсно хочете відновити перераховані обєкти?');
DEFINE('_RESTORE', 'Відновити');
DEFINE('_CONTENT_ITEMS', 'обєкти вмісту');
DEFINE('_MENU_ITEMS', 'Пункти меню');
DEFINE('_OBJECTS_DELETED', 'обєкт(и) успішно видалений(і)');
DEFINE('_SUCCESS_DELETION', 'Успішно видалено');
DEFINE('_OBJECTS_RESTORED', 'обєкт(ів) успішно відновлений(о)');
DEFINE('_CLEAR_TRASH', 'Очистити кошик');

/* administrator components com_templates */
DEFINE('_UNSUCCESS_OPERATION_NO_TEMPLATE', 'Операція невдала: Не визначений шаблон.');
DEFINE('_UNSUCCESS_OPERATION_EMPTY_FILE', 'Операція невдала: Порожній вміст.');
DEFINE('_UNSUCCES_OPERAION', 'Операція невдала');
DEFINE('_CANNOT_OPEN_FILE_DOR_WRITE', 'Помилка відкриття файлу для запису.');
DEFINE('_NO_PREVIEW', 'Передпроглядання недоступне');
DEFINE('_TEMPLATES', 'Шаблони');
DEFINE('_TEMPLATE_PREVIEW', 'Передпроглядання шаблона');
DEFINE('_DEFAULT', 'За замовчуванням');
DEFINE('_ASSIGNED_TO', 'Призначений');
DEFINE('_MAKE_UNWRITEABLE_AFTER_SAVING', 'Зробити недоступним для запису після збереження');
DEFINE('_IGNORE_WRITE_PROTECTION_WHEN_SAVE', 'При збереженні ігнорувати захист від запису');
DEFINE('_CHANGE_EDITOR', 'Змінити редактор');
DEFINE('_CSS_TEMPLATE_EDITOR', 'Редактор CSS шаблона');
DEFINE('_ASSGIN_TEMPLATE_TO_MENU', 'призначення шаблона для пунктів меню');
DEFINE('_MODULES_POSITION', 'Позиції модулів');
DEFINE('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', 'В глобальній конфігурації обране використання одного шаблона:');
DEFINE('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', 'Цей шаблон використовується й не може бути видалений');
DEFINE('_UNSUCCES_OPERATION_CANNOT_OPEN', 'Операція невдала: неможливо відкрити');
DEFINE('_POSITIONS_SAVED', 'Позиції збережені');

/* menubar.html.old.php + menubar.html.php */
DEFINE('_BUTTON', 'Кнопка');
DEFINE('_PLEASE_CHOOSE_ELEMENT', 'Будь ласка, виберіть элемент.');
DEFINE('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', 'Будь ласка, виберіть зі списку обєкти для їхньої публікації на сайті');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_MAKE_DEFAULT', 'Будь ласка, виберіть обєкт, щоб призначити його за замовчуванням');
DEFINE('_ASSIGN', 'Призначити');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNPUBLISH', 'Для скасування публікації обєкта, спочатку виберіть його');
DEFINE('_TO_ARCHIVE', 'В&nbsp;архів');
DEFINE('_FROM_ARCHIVE', 'Из&nbsp;архіву');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ARCHIVE', 'Будь ласка, виберіть зі списку обєкти для їхньої архівації');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNARCHIVE', 'Виберіть обєкт для відновлення його з архіву');
DEFINE('_CHANGE', 'Змінити');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_EDIT', 'Виберіть обєкт зі списку для його редагування');
DEFINE('_EDIT_HTML', 'Ред.&nbsp;HTML');
DEFINE('_EDIT_CSS', 'Ред.&nbsp;CSS');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_DELETE', 'Виберіть обєкт зі списку для його видалення');
DEFINE('_REALLY_WANT_TO_DELETE_OBJECTS', 'Ви дійсно хочете видалити обрані обєкти?');
DEFINE('_REMOVE_TO_TRASH', 'В&nbsp;кошик');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_TRASH', 'Виберіть обєкт зі списку для переміщення його в кошик');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ASSIGN', 'Будь ласка, для призначення обєкта виберіть його');
DEFINE('_HELP', 'Допомога');

/* administrator components com_languages */
DEFINE('_LANGUAGE_PACKS', 'Мовні пакети');
DEFINE('_E_LANGUAGE', 'Мова');
DEFINE('_LANGUAGE_EDITOR', 'Редактор мови');
DEFINE('_LANGUAGE_SAVED', 'Мова успішно змінена');
DEFINE('_YOU_CANNOT_DELETE_LANG_FILE', 'Ви не можете видалити мовний файл, що використовується');
DEFINE('_UNSUCCESS_OPERATION_NO_LANGUAGE', 'Операція невдала: Не визначена мова.');

/* administrator components com_linkeditor */
DEFINE('_COMPONENTS_MENU_EDITOR', 'Редагування меню компонентів');
DEFINE('_ICON', 'Значок');
DEFINE('_KERNEL', 'Ядро');
DEFINE('_COMPONENTS_MENU_EDIT', 'Редагування пункту меню компонентів');
DEFINE('_COMPONENTS_MENU_NEW', 'Створення нового пункту меню компонентів');
DEFINE('_COMPONENT_IS_A_PART_OF_CMS', '<strong>Увага:</strong> цей компонент є частиною ядра, при некоректному керуванні їм можливі проблеми в роботі системи.');
DEFINE('_MENU_NAME_REQUIRED', 'Назва пункту меню. Обовязково для заповнення.');
DEFINE('_MENU_ITEM_ICON', 'Значок пункту меню');
DEFINE('_MENU_ITEM_DESCRIPTION', 'Опис пункту меню.');
DEFINE('_MENU_ITEM_LINK', 'Посилання на компонент. Якщо пункт меню не містить підменю то поле обовязкове для заповнення.');
DEFINE('_PARENT_MENU_ITEM', 'Початковий пункт');
DEFINE('_PARENT_MENU_ITEM2', 'Початковий пункт меню. Допускається всього 1 рівень вкладеності.');
DEFINE('_THIS_FILEDS_REQUIRED', '<font color="red">*</font> пункти обовязкові для заповнення');
DEFINE('_MENU_ITEM_DELETED', 'Пункт меню вилучений');
DEFINE('_FIRST_LEVEL', 'Перший рівень');

/* administrator components com_mambots */
DEFINE('_MAMBOTS', 'Мамботи');
DEFINE('_MAMBOT_NAME', 'Назва мамбота');
DEFINE('_NO_MAMBOT_NAME', 'Мамбот повинен мати назву');
DEFINE('_NO_MAMBOT_FILENAME', 'Мамбот повинен мати імя файлу');
DEFINE('_SITE_MAMBOT', 'Мамбот сайту');
DEFINE('_MAMBOT_DETAILS', 'Деталі мамбота');
DEFINE('_USE_THIS_MAMBOT_FILE', 'Файл, що використовується');
DEFINE('_MAMBOT_ORDER', 'Номер по порядку');
DEFINE('_NO_MAMBOT_PARAMS', '<em>Параметри відсутні</em>');
DEFINE('_NEW_MAMBOTS_IN_THE_END', 'НоВие обєкти за замовчуванням розташовуються наприкінці. Порядок розташування може бути змінений тільки після збереження цього обєкта.');
DEFINE('_CHOOSE_MAMBOT_FOR', 'Виберіть мамбот для');

/* administrator components com_massmail */
DEFINE('_PLEASE_ENTER_SUBJECT', 'Будь ласка, впишіть тему');
DEFINE('_PLEASE_CHOOSE_GROUP', 'Будь ласка, виберіть групу');
DEFINE('_PLEASE_ENTER_MESSAGE', 'Будь ласка, заповніть повідомлення');
DEFINE('_MASSMAIL_TTILE', 'Розсилання пошти');
DEFINE('_SEND_TO_SUBGROUPS', 'Відправити підлеглим групам');
DEFINE('_SEND_IN_HTML', 'Відправити в HTML-форматі');
DEFINE('_MAIL_SUBJECT', 'Тема');
DEFINE('_MESSAGE', 'Повідомлення');
DEFINE('_ALL_USER_GROUPS', '- Всі групи користувачів -');
DEFINE('_PLEASE_FILL_FORM', 'Будь ласка, заповніть коректно форму');
DEFINE('_MESSAGE_SENDED_TO_USERS', 'E-mail відправлено користувачеві(ам) - ');

/* administrator components com_menumanager */
DEFINE('_MENU_MANAGER', 'Керування меню');
DEFINE('_MENU_ITEMS_UNPUBLISHED', 'Приховано');
DEFINE('_MENU_MUDULES', 'Модулів');
DEFINE('_CHANGE_MENU_NAME', 'Змінити назву меню');
DEFINE('_CHANGE_MENU_ITEMS', 'Змінити пункти меню');
DEFINE('_PLEASE_ENTER_MENU_NAME', 'Будь ласка, введіть назву меню');
DEFINE('_NO_QUOTES_IN_NAME', 'Назва меню не повинне містити ');
DEFINE('_PLEASE_ENTER_MENU_MODULE_NAME', 'Будь ласка, введіть назву модуля меню');
DEFINE('_MENU_INFO', 'Інформація про меню');
DEFINE('_MENU_NAME_TIP', 'Це імя меню використовується системою для його ідентифікації - воно повинне бути унікальним. Рекомендується давати імя без пробілів');
DEFINE('_MODULE_TITLE_TIP', 'Заголовок mod_mainmenu потрібно для відображення цього меню');
DEFINE('_MODULE_TITLE', 'Заголовок модуля');
DEFINE('_NEW_MENU_ITEM_TIP', '* Новий модуль меню буде автоматчно створений після того, як Ви введете заголовок, а потім натисните кнопку "Зберегти".*<br /><br />редагування параметрів створеного модуля буде доступно в розділі "керування модулями [сайт]": Модулі -> Модулі сайту');
DEFINE('_REMOVE_MENU', 'Видалити меню');
DEFINE('_MODULES_TO_REMOVE', 'Модуль(і) для видалення');
DEFINE('_MENU_ITEMS_TO_REMOVE', 'Пункти меню, що видаляються');
DEFINE('_THIS_OP_REMOVES_MENU', '* Ця операція <strong><font color="#FF0000">видаляє</font></strong> це меню, <br />ВСІ його пункти й модуль(і), назначенный ему*');
DEFINE('_REALLY_DELETE_MENU', 'Ви впевнені, що хочете видалити це меню? \nвідбудеться видалення меню, його пунктів і модулів.');
DEFINE('_PLEASE_ENTER_MENY_COPY_NAME', 'Будь ласка, введіть імя для копії меню');
DEFINE('_PLEASE_ENTER_MODULE_NAME', 'Будь ласка, введіть імя для нового модуля');
DEFINE('_MENU_COPYING', 'Копіювання меню');
DEFINE('_NEW_MENU_NAME', 'імя нового меню');
DEFINE('_NEW_MODULE_NAME', 'імя нового модуля');
DEFINE('_MENU_TO_COPY', 'Меню, що копіюється');
DEFINE('_MENU_ITEMS_TO_COPY', 'Пункти меню, що копіюються');
DEFINE('_CANNOT_RENAME_MAINMENU', 'Ви не можете перейменувати меню "mainmenu", тому що це порушить правильне функціонування Joomla');
DEFINE('_MENU_ALREADY_EXISTS', 'Меню з таким імям вже існує. Ви повинні ввести унікальне імя меню');
DEFINE('_NEW_MENU_CREATED', 'Створено нове меню');
DEFINE('_MENU_ITEMS_AND_MODULES_UPDATED', 'Пункти меню й модулі оновлені');
DEFINE('_MENU_DELETED', 'Меню вилучене');
DEFINE('_NEW_MENU', 'Новое меню');
DEFINE('_NEW_MENU_MODULE', 'Новий модуль меню');

/* administrator components com_menus */
DEFINE('_MODULE_IS_EDITING_MY_ADMIN', 'Модуль у цей час редагується іншим адміністратором'); //The module is currently being edited by another administrator
DEFINE('_LINK_MUST_HAVE_NAME', 'Посилання повинне мати імя');
DEFINE('_CHOOSE_COMPONENT_FOR_LINK', 'Ви повинні вибрати компонент для створення посилання на нього');
DEFINE('_MENU_ITEM_COMPONENT_LINK', 'Пункт меню :: Посилання - обєкт компонента');
DEFINE('_LINK_TITLE', 'title посилання');
DEFINE('_LINK_COMPONENT', 'Компонент для посилання');
DEFINE('_LINK_TARGET', 'При натисканні відкрити в');
DEFINE('_OBJECT_MUST_HAVE_NAME', 'обєкт повинен мати імя');
DEFINE('_CHOOSE_COMPONENT', 'Виберіть компонент');
DEFINE('_MENU_ITEM_COMPONENT', 'Пункт меню :: Компонент');
DEFINE('_MENU_PARAMS_AFTER_SAVE', 'Список параметрів буде доступний тільки після збереження пункту меню');
DEFINE('_MENU_ITEM_TABLE_CONTACT_CATEGORY', 'Пункт меню :: Таблиця - Контакти категорії');
DEFINE('_CATEGORY_TITLE_IF_FILED_IS_EMPTY', 'Якщо поле буде залишено порожнім, то автоматично буде використана назва категорії');
DEFINE('_CHOOSE_CONTACT_FOR_LINK', 'Для створення посилання необхідно вибрати контакт');
DEFINE('_MENU_ITEM_CONTACT_OBJECT', 'Пункт меню :: Посилання - обєкт контакту');
DEFINE('_MENU_ITEM_BLOG_CATEGORY_ARCHIVE', 'Пункт меню :: Блог - Вміст категорії в архіві');
DEFINE('_MENU_ITEM_BLOG_SECTION_ARCHIVE', 'Пункт меню :: Блог - Вміст розділу в архіві');
DEFINE('_SECTION_TITLE_IF_FILED_IS_EMPTY', 'Якщо поле буде залишено порожнім, то автоматично буде використана назва розділу');
DEFINE('_MENU_ITEM_SAVED', 'Пункт меню збережений');
DEFINE('_MENU_ITEM_BLOGCATEGORY', 'Пункт меню :: Блог - Вміст категорії');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_CATEGORIES', 'Ви можете вибрати кілька категорій');
DEFINE('_MENU_ITEM_BLOG_CONTENT_CATEGORY', 'Пункт меню :: Блог - Вміст розділу');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_SECTIONS', 'Ви можете вибрати кілька розділів');
DEFINE('_MENU_ITEM_TABLE_CONTENT_CATEGORY', 'Пункт меню :: Таблиця - Вміст категорії');
DEFINE('_CHANGE_CONTENT_ITEM', 'Змінити обєкт вмісту');
DEFINE('_CONTENT_ITEM_TO_LINK_TO', 'Виберіть статтю для звязку');
DEFINE('_MENU_ITEM_CONTENT_ITEM', 'Пункт меню :: Посилання - обєкт вмісту');
DEFINE('_CONTENT_TO_LINK_TO', 'Вміст для звязку');
DEFINE('_MENU_ITEM_TABLE_CONTENT_SECTION', 'Пункт меню :: Таблиця - Вміст розділу');
DEFINE('_CHOOSE_OBJECT_TO_LINK_TO', 'Ви повинні вибрати обєкт для звязку з ним');
DEFINE('_MENU_ITEM_STATIC_CONTENT', 'Пункт меню :: Посилання - Статичний вміст');
DEFINE('_MENU_ITEM_CATEGORY_NEWSFEEDS', 'Пункт меню :: Таблиця - Стрічки новин з категорії');
DEFINE('_CHOOSE_NEWSFEED_TO_LINK', 'Ви повинні вибрати стрічку новин для звязку з пунктом меню');
DEFINE('_MENU_ITEM_NEWSFEED', 'Пункт меню :: Посилання - Стрічка новин');
DEFINE('_LINKED_TO_NEWSFEED', 'Повязане зі стрічкою');
DEFINE('_MENU_ITEM_SEPARATOR', 'Пункт меню :: Роздільник / Заповнювач');
DEFINE('_ENTER_URL_PLEASE', 'Ви повинні ввести url.');
DEFINE('_MENU_ITEM_URL', 'Пункт меню :: Посилання - URL');
DEFINE('_MENU_ITEM_WEBLINKS_CATEGORY', 'Пункт меню :: Таблиця - Web-Посилання Категорії');
DEFINE('_MENU_ITEM_WRAPPER', 'Пункт меню :: Wrapper');
DEFINE('_WRAPPER_LINK', 'Посилання Wrapper-a');
DEFINE('_MAXIMUM_LEVELS', 'Максимально рівнів');
DEFINE('_NOTE_MENU_ITEMS1', '* Зверніть увагу, що деякі пункти меню входять у кілька груп, але вони ставляться до одного типу меню.');
DEFINE('_MENU_ITEMS_OTHER', 'Різне');
DEFINE('_MENU_ITEMS_SEND', 'Відправлення');
DEFINE('_COMPONENTS', 'Компоненти');
DEFINE('_LINKS', 'Посилання');
DEFINE('_MOVE_MENU_ITEMS', 'Переміщення пунктів меню');
DEFINE('_MENU_ITEMS_TO_MOVE', 'Переміщувані пункти меню');
DEFINE('_COPY_MENU_ITEMS', 'Копіювання пунктів меню');
DEFINE('_COPY_MENU_ITEMS_TO', 'Копіювати в меню');
DEFINE('_CHANGE_THIS_NEWSFEED', 'Змінити цю стрічку новин');
DEFINE('_CHANGE_THIS_CONTACT', 'Змінити цей контакт');
DEFINE('_CHANGE_THIS_CONTENT', 'Змінити цей вміст');
DEFINE('_CHANGE_THIS_STATIC_CONTENT', 'Змінити цей статичний вміст');
DEFINE('_MENU_NEXT', 'Далі');
DEFINE('_MENU_BACK', 'Назад');

/* administrator components com_messages */
DEFINE('_PRIVATE_MESSAGES', 'Особисті повідомлення');
DEFINE('_MAIL_FROM', 'Від');
DEFINE('_MAIL_READED', 'Прочитано');
DEFINE('_MAIL_NOT_READED', 'Не прочитано');
DEFINE('_PRIVATE_MESSAGES_SETTINGS', 'Настроювання особистих повідомлень');
DEFINE('_BLOCK_INCOMING_MAIL', 'Заблокувати вхідну пошту');
DEFINE('_SEND_NEW_MESSAGES', 'Посилати мені нові повідомлення');
DEFINE('_AUTO_PURGE_MESSAGES', 'Автоматичне очищення повідомлень');
DEFINE('_AUTO_PURGE_MESSAGES2', 'старше');
DEFINE('_AUTO_PURGE_MESSAGES3', 'днів');
DEFINE('_VIEW_PRIVATE_MESSAGES', 'Перегляд персональних повідомлень');
DEFINE('_MESSAGE_SEND_DATE', 'Відправлено');
DEFINE('_PLEASE_ENTER_MAIL_SUBJECT', 'Ви повинні ввести назву теми');
DEFINE('_PLEASE_ENTER_MESSAGE_BODY', 'Ви повинні ввести текст повідомлення');
DEFINE('_PLEASE_ENTER_USER', 'Ви повинні вибрати одержувача');
DEFINE('_NEW_PERSONAL_MESSAGE', 'Нове персональне повідомлення');
DEFINE('_MAIL_TO', 'Кому');
DEFINE('_MAIL_ANSWER', 'Відповісти');

/* administrator components com_syndicate */
DEFINE('_NEWS_EXPORT_SETUP', 'Налаштування експорту новин');
DEFINE('_RSS_EXPORT', 'RSS экспорт');
DEFINE('_RSS_EXPORT_SETUP', 'Керування налаштуваннями експорту новин');

/* administrator components com_statistics */
DEFINE('_STAT_BROWSERS_AND_OSES', 'Статистика по браузерах, ОС і доменам');
DEFINE('_BROWSERS', 'Браузери');
DEFINE('_DOMAINS', 'Домени');
DEFINE('_DOMAIN', 'Домен');
DEFINE('_PAGES_HITS', 'Статистика відвідування сторінок');
DEFINE('_CONTENT_TITLE', 'Заголовок вмісту');
DEFINE('_SEARCH_QUERIES', 'Пошукові запити');
DEFINE('_LOG_SEARCH_QUERIES', 'збір даних');
DEFINE('_DISALLOWED', 'Заборонено');
DEFINE('_LOG_LOW_PERFOMANCE', 'Активація цього параметра може дуже сильно знизити продуктивність сайту при великій відвідуваності');
DEFINE('_HIDE_SEARCH_RESULTS', 'Сховати результати пошуку');
DEFINE('_SHOW_SEARCH_RESULTS', 'Показати результати пошуку');
DEFINE('_SEARCH_QUERY_TEXT', 'Текст пошуку');
DEFINE('_SEARCH_QUERY_COUNT', 'Запитів');
DEFINE('_SHOW_RESULTS', 'Видано результатів');

/* administrator components com_quickicons */
DEFINE('_QUICK_BUTTONS', 'Кнопки швидкого доступу');
DEFINE('_DISPLAY_METHOD', 'Відображення');
DEFINE('_DISPLAY_ONLY_TEXT', 'Тільки текст');
DEFINE('_DISPLAY_ONLY_ICON', 'Тільки значок');
DEFINE('_DISPLAY_TEXT_AND_ICON', 'Значок і текст');
DEFINE('_PRESS_TO_EDIT_ELEMENT', 'Натисніть для редагування елемента');
DEFINE('_EDIT_BUTTON', 'Редагування кнопки');
DEFINE('_BUTTON_TEXT', 'Текст кнопки');
DEFINE('_BUTTON_TITLE', 'Підказка');
DEFINE('_BUTTON_TITLE_TIP', '<strong>Опціонально</strong><br />Тут ви можете визначити текст для спливаючої підказки.<br />Цю властивість дуже важливо заповнити, якщо ви вибрали відображення тільки картинки!');
DEFINE('_BUTTON_LINK_TIP', 'Посилання для виклику сайту або компонента.<br />Для компонентів усередині системи посилання повинне бути подібним: <br />index2.php?option=com_joomlastats&task=stats  [ joomlastats - компонент, &task=stats Виклик певної функції компонента ].<br />Зовнішні посилання повинні бути <strong>абсолютними посиланнями</strong> (наприклад: http://www….)!');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW', 'У новому вікні');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW_TIP', 'Посилання буде відкрита в новому вікні');
DEFINE('_BUTTON_ORDER', 'Розташувати після');
DEFINE('_BUTTONS_TAB_GENERAL', 'Загальне');
DEFINE('_BUTTONS_TAB_DISPLAY', 'Відображення');
DEFINE('_DISPLAY_BUTTON', 'Відображати');
DEFINE('_PRESS_TO_CHOOSE_ICON', 'Натисніть для вибору картинки (відкриється в новому вікні)');
DEFINE('_CHOOSE_ICON', 'Вибрати картинку');
DEFINE('_CHOOSE_ICON_TIP', 'Будь ласка, виберіть картинку для цієї кнопки. Якщо хочете завантажити власну картинку для кнопки, то вона повинна бути завантажена в ../administrator/images - ../images ../images/icons');
DEFINE('_PLEASE_ENTER_NUTTON_LINK', 'Потрібна картинка');
DEFINE('_PLEASE_ENTER_BUTTON_TEXT', 'Будь ласка, заповніть поле Текст');
DEFINE('_BUTTON_ERROR_PUBLISHING', 'Помилка публікації');
DEFINE('_BUTTON_ERROR_UNPUBLISHING', 'Помилка приховування');
DEFINE('_BUTTONS_DELETED', 'Кнопки успішно вилучені');
DEFINE('_CHANGE_QUICK_BUTTONS', 'Змінити кнопки швидкого доступу');

/* administrator components com_sections */
DEFINE('_SECTION_CHANGES_SAVED', 'Зміни розділу збережені');
DEFINE('_CONTENT_SECTIONS', 'Розділи вмісту');
DEFINE('_SECTION_NAME', 'Назва розділу');
DEFINE('_SECTION_CATEGORIES', 'Категорій');
DEFINE('_SECTION_CONTENT_ITEMS', 'Активних');
DEFINE('_SECTION_CONTENT_ITEMS_IN_TRASH', 'У кошику');
DEFINE('_VIEW_SECTION_CATEGORIES', 'Перегляд категорій розділу');
DEFINE('_VIEW_SECTION_CONTENT', 'Перегляд вмісту розділу');
DEFINE('_NEW_SECTION_MASK', 'Новий розділ');
DEFINE('_CHOOSE_MENU_ITEM_NAME', 'Будь ласка, введіть імя для цього пункта меню');
DEFINE('_ENTER_SECTION_NAME', 'Розділ повинен мати назва');
DEFINE('_ENTER_SECTION_TITLE', 'Розділ повинен мати заголовок');
DEFINE('_SECTION_ALREADY_EXISTS', 'Вже є розділ з такою назвою. Будь ласка, змініть назву розділу.');
DEFINE('_SECTION_DETAILS', 'Деталі розділу');
DEFINE('_SECTION_USED_IN', 'Використовується в');
DEFINE('_MENU_SHORT_NAME', 'Коротке імя для меню');
DEFINE('_SECTION_NAME_OF_CATEGORY', 'категорії');
DEFINE('_SECTION_NAME_OF_SECTION', 'розділу');
DEFINE('_SECTION_NAME_TIP', 'Довга назва, що відображується в заголовках');
DEFINE('_SECTION_NEW_MENU_LINK', 'Ця функція створить новий пункт в обраному Вами меню');
DEFINE('_CHOOSE_MENU', 'Виберіть меню');
DEFINE('_CHOOSE_MENU_TYPE', 'Виберіть тип меню');
DEFINE('_SECTION_COPYING', 'Копіювання розділу');
DEFINE('_SECTION_COPY_NAME', 'Назва копії розділу');
DEFINE('_SECTION_COPY_DESCRIPTION', 'У знову створений розділ будуть<br />скопійовані перераховані категорії<br />і всі перераховані обєкти<br />вмісту категорій.');
DEFINE('_MASS_CONTENT_ADD', 'Масове додавання');
DEFINE('_NEW_CAT_SECTION_ON_NEW_LINE', 'Кожна нова категорія / розділ повинні починатися з нового рядка');
DEFINE('_MASS_ADD_AS', 'Додати як');
DEFINE('_SECTIONS', 'Розділи');
DEFINE('_CATEGORIES', 'Категорії');
DEFINE('_CATEGORIES_WILL_BE_IN_SECTION', 'Категорії будуть належати розділу');
DEFINE('_CONTENT_WILL_BE_IN_CATEGORY', 'Вміст буде належати категорії');
DEFINE('_ADD_SECTIONS_RESULT', 'Результат додавання розділів');
DEFINE('_ADD_CATEGORIES_RESULT', 'Результат додавання категорій');
DEFINE('_ADD_CONTENT_RESULT', 'Результат додавання вмісту');
DEFINE('_ERROR_WHEN_ADDING', 'відбулася помилка при додаванні');
DEFINE('_SECTION_IS_BEING_EDITED_BY_ADMIN', 'Розділ у цей час редагується іншим адміністратором');
DEFINE('_SECTION_TABLE', 'Таблиця розділу');
DEFINE('_SECTION_BLOG', 'Блог розділу');
DEFINE('_SECTION_BLOG_ARCHIVE', 'Блог архіву розділу');
DEFINE('_SECTION_SAVED', 'Розділ збережений');
DEFINE('_CHOOSE_SECTION_TO_DELETE', 'Виберіть розділ для видалення');
DEFINE('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', 'Розділи не можуть бути видалені, тому що містять категорії');
DEFINE('_CHOOSE_SECTION_FOR', 'Виберіть розділ для');
DEFINE('_CANNOT_PUBLISH_EMPTY_SECTION', 'Неможливо опублікувати порожній розділ');
DEFINE('_SECTION_CONTENT_COPYED', 'Обраний вміст розділу було скопійовано в розділ');
DEFINE('_MENU_MASS_ADD', 'Додати ще');

/* administrator components com_poll */
DEFINE('_POLL', 'Опитування');
DEFINE('_POLLS', 'Опитування');
DEFINE('_POLL_HEADER', 'Заголовок опитування');
DEFINE('_POLL_LAG', 'Затримка');
DEFINE('_CHANGE_POLL', 'Змінити опитування');
DEFINE('_ENTER_POLL_NAME', 'Опитування повинен мати назву');
DEFINE('_ENTER_POLL_LAG', 'Затримка між відповідями не повинна бути нульовою');
DEFINE('_POLL_DETAILS', 'Деталі опитування');
DEFINE('_POLL_LAG_QUESIONS', 'Затримка між відповідями');
DEFINE('_POLL_LAG_QUESIONS2', 'секунд між прийняттям голосів');
DEFINE('_POLL_OPTION', 'Варіант відповіді');
DEFINE('_POLL_OPTIONS', 'Варіанти відповідей');
DEFINE('_POLL_HITS', 'Голосів');
DEFINE('_POLL_GRAFIC', 'Графік');
DEFINE('_POLL_IS_BEING_EDITED_BY_ADMIN', 'Опитування в цей час редагується іншим адміністратором');

/* administrator components com_newsfeeds */
DEFINE('_NEWSFEEDS_MANAGEMENT', 'Керування стрічками новин');
DEFINE('_NEWSFEED_TITLE', 'Стрічка новин');
DEFINE('_NEWSFEED_ON_SITE', 'На сайті');
DEFINE('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', 'Кіл-ть статей');
DEFINE('_NEWSFEED_CACHE_TIME', 'Час кеша (секунд)');
DEFINE('_CHANGE_NEWSFEED', 'Змінити стрічку новин');
DEFINE('_PLEASE_ENTER_NEWSFEED_NAME', 'Будь ласка, введіть назву стрічки');
DEFINE('_PLEASE_ENTER_NEWSFEED_LINK', 'Будь ласка, введіть посилання стрічки новин');
DEFINE('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', 'Будь ласка, введіть кількість статей для відображення');
DEFINE('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', 'Будь ласка, введіть час відновлення кеша');
DEFINE('_NEWSFEED_LINK', 'Посилання');
DEFINE('_NEWSFEED_DECODE_FROM_UTF', 'Перекодувати з UTF-8');

/* administrator components com_modules */
DEFINE('_ALL_MODULE_CHANGES_SAVED', 'Всі зміни модуля успішно збережені');
DEFINE('_MODULES', 'Модулі');
DEFINE('_MODULE_NAME', 'Назва модуля');
DEFINE('_MODULE_POSITION', 'Позиція');
DEFINE('_ASSIGN_TO_URL', 'Привязка до URL');
DEFINE('_ASSIGN_TO_URL_TIP', 'Приклад: <br><br> !option=com_content&task=view&id=4<br>option=com_content&task=view<br>option=com_content&task=blogcategory&id>4<br><br>! - на цих сторінках модуль не відображається<br>= < > != дорівнює, менше, більше, не дорівнює - знаки порівняння для числових параметрів');
DEFINE('_MODULE_PAGES', 'Сторінки');
DEFINE('_MODULE_PAGES_SOME', 'Деякі');
DEFINE('_SHOW_TITLE', 'Показувати заголовок');
DEFINE('_MODULE_ORDER', 'Порядок модуля');
DEFINE('_MODULE_PAGE_MENU_ITEMS', 'Сторінки / Пункти меню');
DEFINE('_MODULE_USER_CONTENT', 'Користувальницький код / Вміст модуля');
DEFINE('_MODULE_COPIED', 'Модуль скопійований');
DEFINE('_CANNOT_DELETE_MOD_MAINMENU', 'Ви не можете видалити модуль mod_mainmenu, що відображається як "mainmenu", тому що це ядро меню');
DEFINE('_CANNOT_DELETE_MODULES', 'Модулі не можуть бути вилучені, тому що вони можуть бути тільки деінстальовані, як всі модулі Joomla!');
DEFINE('_PREVIEW_ONLY_CREATED_MODULES', 'Ви можете переглянути тільки "створені" модулі');

/* administrator components com_modules */
DEFINE('_WEBLINKS_MANAGEMENT', 'Керування web-посиланнями');
DEFINE('_WEBLINKS_HITS', 'Переходів');
DEFINE('_CHANGE_WEBLINK', 'Змінити web-посилання');
DEFINE('_ENTER_WEBLINK_TITLE', 'Web-Посилання повинна мати заголовок');
DEFINE('_PLEASE_ENTER_URL', 'Ви повинні ввести URL');
DEFINE('_WEBLINK_URL', 'Web-Посилання');
DEFINE('_WEBLINK_NAME', 'Назва');

/* administrator components com_jwmmxtd */
DEFINE('_RENAME', 'Перейменувати');
DEFINE('_JWMM_DIRECTORIES', 'Каталогов');
DEFINE('_JWMM_FILES', 'Файлів');
DEFINE('_JWMM_MOVE', 'Перемістити');
DEFINE('_JWMM_BYTES', 'байт');
DEFINE('_JWMM_KBYTES', 'кб');
DEFINE('_JWMM_MBYTES', 'мб');
DEFINE('_JWMM_DELETE_FILE_CONFIRM', 'Видалити файл');
DEFINE('_CLICK_TO_PREVIEW', 'Натисніть для перегляду');
DEFINE('_JWMM_FILESIZE', 'Розмір');
DEFINE('_WIDTH', 'Ширина');
DEFINE('_HEIGHT', 'Висота');
DEFINE('_UNPACK', 'Розпакувати');
DEFINE('_JWMM_VIDEO_FILE', 'Відео файл');
DEFINE('_JWMM_HACK_ATTEMPT', 'Спроба злому…');
DEFINE('_JWMM_DIRECTORY_NOT_EMPTY', 'Каталог не порожній. Будь ласка, видаліть спочатку вміст усередині каталогу!');
DEFINE('_JWMM_DELETE_CATALOG', 'Видалити каталог');
DEFINE('_JWMM_SAFE_MODE_WARNING', 'При активованому параметрі SAFE MODE можливі проблеми зі створенням каталогів');
DEFINE('_JWMM_CATALOG_CREATED', 'Створений каталог');
DEFINE('_JWMM_CATALOG_NOT_CREATED', 'Створений не каталог');
DEFINE('_JWMM_FILE_DELETED', 'Файл успішно вилучений');
DEFINE('_JWMM_FILE_NOT_DELETED', 'Файл не вилучений');
DEFINE('_JWMM_DIRECTORY_DELETED', 'Каталог вилучений');
DEFINE('_JWMM_DIRECTORY_NOT_DELETED', 'Каталог не вилучений');
DEFINE('_JWMM_RENAMED', 'Перейменовано');
DEFINE('_JWMM_NOT_RENAMED', 'Не перейменовано');
DEFINE('_JWMM_COPIED', 'Скопійовано');
DEFINE('_JWMM_NOT_COPIED', 'Не скопійовано');
DEFINE('_JWMM_FILE_MOVED', 'Файл переміщений');
DEFINE('_JWMM_FILE_NOT_MOVED', 'Файл не переміщений');
DEFINE('_TMP_DIR_CLEANED', 'Тимчасовий каталог повністю очищений');
DEFINE('_TMP_DIR_NOT_CLEANED', 'Тимчасовий каталог не очищений');
DEFINE('_FILES_UNPACKED', 'файл(ів) розпаковані');
DEFINE('_ERROR_WHEN_UNPACKING', 'Помилка розпакування');
DEFINE('_FILE_IS_NOT_A_ZIP', 'Файл не є коректним zip архівом');
DEFINE('_FILE_NOT_EXIST', 'Файл не існує');
DEFINE('_IMAGE_SAVED_AS', 'Відредаговане зображення збережене як');
DEFINE('_IMAGE_NOT_SAVED', 'Зображення НЕ збережене');
DEFINE('_FILES_NOT_UPLOADED', 'Файл(и) НЕ завантажені на сервер');
DEFINE('_FILES_UPLOADED', 'Файли завантажені');
DEFINE('_DIRECTORIES', 'Каталоги');
DEFINE('_JWMM_FILE_NAME_WARNING', 'Будь ласка, не використовуйте в назвах пробіли й спецсимволи');
DEFINE('_JWMM_MEDIA_MANAGER', 'Медіа менеджер');
DEFINE('_JWMM_CREATE_DIRECTORY', 'Створити каталог');
DEFINE('_UPLOAD_FILE', 'Завантажити файл');
DEFINE('_JWMM_FILE_PATH', 'Місце розташування');
DEFINE('_JWMM_UP_TO_DIRECTORY', 'Перейти на каталог вище');
DEFINE('_JWMM_RENAMING', 'Перейменування');
DEFINE('_JWMM_NEW_NAME', 'Нове імя (включаючи розширення!)');
DEFINE('_CHOOSE_DIR_TO_COPY', 'Виберіть каталог для копіювання');
DEFINE('_JWMM_COPY_TO', 'копіювати в');
DEFINE('_CHOOSE_DIR_TO_MOVE', 'Виберіть каталог для переміщення');
DEFINE('_JWMM_MOVE_TO', 'Перемістити в');
DEFINE('_CHOOSE_DIR_TO_UNPACK', 'Виберіть каталог для розпакування');
DEFINE('_DERICTORY_TO_UNPACK', 'Каталог розпакування');
DEFINE('_NUMBER_OF_IMAGES_IN_TMP_DIR', 'Число зображень у тимчасовому каталозі');
DEFINE('_CLEAR_DIRECTORY', 'Очистити каталог');
DEFINE('_JWMM_ERROR_EDIT_FILE', 'Помилка при обробці файлу');
DEFINE('_JWMM_EDIT_IMAGE', 'Редагування зображення');
DEFINE('_JWMM_IMAGE_RESIZE', 'Розширення зображення');
DEFINE('_JWMM_IMAGE_CROP', 'Обрізати');
DEFINE('_JWMM_IMAGE_SIZE', 'Розміри');
DEFINE('_JWMM_X_Y_POSITION', 'X і Y координати');
DEFINE('_JWMM_BY_HEIGHT', 'вертикалі');
DEFINE('_JWMM_BY_WIDTH', 'горизонталі');
DEFINE('_JWMM_CROP_TOP', 'Зверху');
DEFINE('_JWMM_CROP_LEFT', 'Ліворуч');
DEFINE('_JWMM_CROP_RIGHT', 'Праворуч');
DEFINE('_JWMM_CROP_BOTTOM', 'Знизу');
DEFINE('_JWMM_ROTATION', 'Поворот');
DEFINE('_JWMM_CHOOSE', '-- Вибір --');
DEFINE('_JWMM_MIRROR', 'Відбиття');
DEFINE('_JWMM_VERICAL', 'вертикалі');
DEFINE('_JWMM_HORIZONTAL', 'горизонталі');
DEFINE('_JWMM_GRADIENT_BORDER', 'Градієнтна рамка');
DEFINE('_JWMM_SIZE_PX', 'Розмір px');
DEFINE('_JWMM_TOP_LEFT', 'Зверху-Ліворуч');
DEFINE('_JWMM_PRESS_TO_CHOOSE_COLOR', 'Натисніть для вибору кольору');
DEFINE('_JWMM_BOTTOM_RIGHT', 'Праворуч-Знизу');
DEFINE('_JWMM_BORDER', 'Бордюр');
DEFINE('_COLOR', 'Колір');
DEFINE('_JWMM_ALL_BORDERS', 'Все бордюри');
DEFINE('_JWMM_TOP', 'Зверху');
DEFINE('_JWMM_LEFT', 'Ліворуч');
DEFINE('_JWMM_RIGHT', 'Праворуч');
DEFINE('_JWMM_BOTTOM', 'Знизу');
DEFINE('_JWMM_BRIGHTNESS', 'Яскравість');
DEFINE('_JWMM_CONTRAST', 'Контраст');
DEFINE('_JWMM_ADDITIONAL_ACTIONS', 'Додаткові дії');
DEFINE('_JWMM_GRAY_SCALE', 'Градієнт сірого');
DEFINE('_JWMM_NEGATIVE', 'Негатив');
DEFINE('_JWMM_ADD_TEXT', 'Додати текст');
DEFINE('_JWMM_TEXT', 'Текст');
DEFINE('_JWMM_TEXT_COLOR', 'Колір текста');
DEFINE('_JWMM_TEXT_FONT', 'Шрифт текста');
DEFINE('_JWMM_TEXT_SIZE', 'Розмір текста');
DEFINE('_JWMM_ORIENTATION', 'Орієнтація');
DEFINE('_JWMM_BG_COLOR', 'Колір фону');
DEFINE('_JWMM_XY_POSITION', 'Розташування по X і Y');
DEFINE('_JWMM_XY_PADDING', 'Відступи по X і Y');
DEFINE('_JWMM_FIRST', 'Перша');
DEFINE('_JWMM_SECOND', 'Друга');
DEFINE('_JWMM_THIRDTH', 'Третя…');
DEFINE('_JWMM_CANCEL_ALL', 'Скасувати всі');

/* administrator components com_joomlaxplorer */
DEFINE('_MENU_GZIP', 'Упакувати');
DEFINE('_MENU_MOVE', 'Перемістити');
DEFINE('_MENU_CHMOD', 'Зміна прав');

/* administrator components com_joomlapack */
DEFINE('_JP_BACKUPPING', 'Резервування');
DEFINE('_JP_PHPINFO', '--- Інформація про PHP ---');
DEFINE('_JP_FREEMEMORY', 'Вільно памяті');
DEFINE('_JP_GZIP_ENABLED', 'GZIP стиск: доступно (це добре)');
DEFINE('_JP_GZIP_NOT_ENABLED', 'GZIP стиск: недоступно (це погано)');
DEFINE('_JP_START_BACKUP_DB', 'Початок резервування бази даних');
DEFINE('_JP_START_BACKUP_FILES', 'Початок резервування всіх даних сайту');
DEFINE('_JP_CUBE_ON_STEP', 'CUBE :: Робота на кроці');
DEFINE('_JP_CUBE_STEP_FINISHED', 'CUBE :: Крок завершений ');
DEFINE('_JP_CUBE_FINISHED', 'CUBE :: Завершено!');
DEFINE('_JP_ERROR_ON_STEP', 'CUBE :: Помилка на кроці ');
DEFINE('_JP_CLEANUP', 'Очищення');
DEFINE('_JP_RECURSING_DELETION', 'Рекурсивне видалення ');
DEFINE('_JP_NOT_FILE', 'Видалення <strong>ЦЕ ФАЙЛ, НЕ КАТАЛОГ!</strong>');
DEFINE('_JP_ERROR_DEL_DIRECTORY', 'Помилка видалення каталогу. Перевірте права доступу');
DEFINE('_JP_QUICK_MODE', 'Режим однопрохідної');
DEFINE('_JP_QUICK_MODE_ON_STEP', 'Використовується швидкий алгоритм на кроці');
DEFINE('_JP_CANNOT_USE_QUICK_MODE', 'Неможливо використовувати швидкий алгоритм на кроці');
DEFINE('_JP_MULTISTEP_MODE', 'Режим многопрохідної');
DEFINE('_JP_MULTISTEP_MODE_ON_STEP', 'Використовується повільний алгоритм на кроці');
DEFINE('_JP_MULTISTEP_MODE_ERROR', 'Помилка виконання повільного алгоритму на кроці');
DEFINE('_JP_SMART_MODE', 'Прискорений режим');
DEFINE('_JP_SMART_MODE_ON_STEP', 'Виконання прискореного режиму на кроці');
DEFINE('_JP_SMART_MODE_ERROR', 'Помилка виконання прискореного режиму на кроці');
DEFINE('_JP_CHOOSED_ALGO', 'Обраний');
DEFINE('_JP_ALGORITHM_FOR', 'алгоритм для');
DEFINE('_JP_NEXT_STEP_BACKUP_DB', 'Наступний крок --> Резервування бази');
DEFINE('_JP_NEXT_STEP_FILE_LIST', 'Наступний крок --> Створення списку файлів');
DEFINE('_JP_NEXT_STEP_FINISHING', 'Наступний крок --> Завершення');
DEFINE('_JP_NEXT_STEP_GZIP', 'Наступний крок --> Упакування');
DEFINE('_JP_NEXT_STEP_FINISHED', 'Наступний крок --> Завершений');
DEFINE('_JP_NO_NEXT_STEP', 'Наступний крок не потрібний; все вже завершено');
DEFINE('_JP_NO_CUBE', 'Немає існуючого CUBE; створення нового');
DEFINE('_JP_CURRENT_STEP', 'Поточний крок');
DEFINE('_JP_UNPACKING_CUBE', 'Розпакування існуючого CUBE');
DEFINE('_JP_TIMEOUT', 'Час на виконання операції вийшов, але операція не завершена');
DEFINE('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine :: Одержання списку таблиць');
DEFINE('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine :: Резервування тільки бази даних');
DEFINE('_JP_ONE_FILE_STORE', 'CDBBackupEngine :: Задане обєднання файлом');
DEFINE('_JP_FILE_STRUCTURE', 'CDBBackupEngine :: Файл структури');
DEFINE('_JP_DATAFILE', 'CDBBackupEngine :: Файл даних');
DEFINE('_JP_FILE_DELETION', 'CDBBackupEngine :: Видалення файлів');
DEFINE('_JP_FIRST_STEP', 'CDBBackupEngine :: Перший прохід');
DEFINE('_JP_ALL_COMPLETED', 'CDBBackupEngine :: Все завершено');
DEFINE('_JP_START_TICK', 'CDBBackupEngine :: Початок обробки');
DEFINE('_JP_READY_FOR_TABLE', 'Виконано для таблиці');
DEFINE('_JP_DB_BACKUP_COMPLETED', 'Резервування бази даних завершено');
DEFINE('_JP_NEW_FRAGMENT_ADDED', 'Доданий новий фрагмент');
DEFINE('_JP_KERNEL_TABLES', 'Таблиці ядра');
DEFINE('_JP_FIRST_STEP_2', 'Перший прохід');
DEFINE('_JP_NEXT_VALUE', 'Вихідне значення');
DEFINE('_JP_SKIP_TABLE', 'Пропуск таблиці');
DEFINE('_JP_GETTING', 'Одержання');
DEFINE('_JP_COLUMN_FROM', 'столбца из');
DEFINE('_JP_ERROR_WRITING_FILE', 'Помилка запису у файл');
DEFINE('_JP_CANNOT_SAVE_DUMP', 'Неможливо зберегти в дамп');
DEFINE('_JP_CHECK_RESULTS', 'Результати перевірки');
DEFINE('_JP_ANALYZE_RESULTS', 'Результати аналізу');
DEFINE('_JP_OPTIMIZE_RESULTS', 'Результати оптимізації');
DEFINE('_JP_REPAIR_RESULTS', 'Результати виправлення');
DEFINE('_JP_GETTING_DIRS_LIST', 'Одержання списку каталогів для виключення з резервної копії');
DEFINE('_JP_GZIP_FIRST_STEP', 'Упакування: перший крок');
DEFINE('_JP_GZIP_FINISHED', 'Упакування :: Завершене');
DEFINE('_JP_PACK_FINISHED', 'Завершення архівування');
DEFINE('_JP_GZIP_OF_FRAGMENT', 'Архівування фрагмента #');
DEFINE('_JP_CURRENT_FRAGMENT', ' Поточний фрагмент');
DEFINE('_JP_DELETE_PATH', ' шлях для видалення :');
DEFINE('_JP_PATH_TO_DELETE', ' шлях для додавання ');
DEFINE('_JP_SAVING_ARCHIVE_INFO', 'Збереження інформації про архівні обєкти');
DEFINE('_JP_LOADING_ARCHIVE_INFO', 'Завантаження інформації про архівні обєкти');
DEFINE('_JP_ADDING_FILE_TO_ARCHIVE', 'Додавань файлів в архів');
DEFINE('_JP_ARCHIVING', 'Архівування');
DEFINE('_JP_ARCHIVE_COMPLETED', 'Архівування завершено');
DEFINE('_JP_BACKUP_CONFIG', 'Конфігурація резервного копіювання даних');
DEFINE('_JP_CONFIG_SAVING', 'Збереження налаштувань');
DEFINE('_JP_MAIN_CONFIG', 'Основні налаштування');
DEFINE('_JP_CONFIG_DIRECTORY', 'Каталог збереження архівів');
DEFINE('_JP_ARCHIVE_NAME', 'Назва архіву');
DEFINE('_JP_LOG_LEVEL', 'Рівень ведення лога');
DEFINE('_JP_ADDITIONAL_CONFIG', 'Додаткові налаштування');
DEFINE('_JP_DELETE_PREFIX', 'Видаляти преффікс таблиць');
DEFINE('_JP_EXPORT_TYPE', 'Тип експорту бази даних');
DEFINE('_JP_FILELIST_ALGORITHM', 'Обробка файлів');
DEFINE('_JP_CONFIG_DB_BACKUP', 'Обробка бази');
DEFINE('_JP_CONFIG_GZIP', 'Стиск файлів');
DEFINE('_JP_CONFIG_DUMP_GZIP', 'Стиск дампа бази даних');
DEFINE('_JP_AVAILABLE', '<font color="green"><strong>доступно</strong></font>');
DEFINE('_JP_NOT_AVAILABLE', '<font color="red"><strong>недоступно</strong></font>');
DEFINE('_JP_MYSQL4_COMPAT', 'В режимі сумісності с MySQL 4');
DEFINE('_JP_NO_GZIP', 'Не архівувати (.sql)');
DEFINE('_JP_GZIP_TAR_GZ', 'Архівувати в TAR.GZ (.tar.gz)');
DEFINE('_JP_GZIP_ZIP', 'Архівувати в ZIP (.zip)');
DEFINE('_JP_QUICK_METHOD', 'Швидко - один прохід');
DEFINE('_JP_STANDARD_METHOD', 'Рекомендовано - Стандартно');
DEFINE('_JP_SLOW_METHOD', 'Повільно - мультипрохідність');
DEFINE('_JP_LOG_ERRORS_OLY', 'Тільки помилки');
DEFINE('_JP_LOG_ERROR_WARNINGS', 'Помилки та попередження');
DEFINE('_JP_LOG_ALL', 'Вся інформація');
DEFINE('_JP_LOG_ALL_DEBUG', 'Вся інформація та налагодження');
DEFINE('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', 'Не зберігати каталоги в резервній копії');
DEFINE('_FILE_NAME', 'імя файлу');
DEFINE('_JP_DOWNLOAD_FILE', 'Скачати');
DEFINE('_JP_REALLY_DELETE_FILE', 'Дійсно видалити файл?');
DEFINE('_JP_FILE_CREATION_DATE', 'Створений');
DEFINE('_JP_NO_BACKUPS', 'Файлы резервных копий відсутні');
DEFINE('_JP_ACTIONS_LOG', 'Лог виконання дій');
DEFINE('_JP_BACKUP_MANAGEMENT', 'Резервне копіювання');
DEFINE('_JP_CREATE_BACKUP', 'Створити архів даних');
DEFINE('_JP_DB_MANAGEMENT', 'Керування базою даних');
DEFINE('_JP_DONT_SAVE_DIRECTORIES', 'Не зберігати каталоги');
DEFINE('_JP_CONFIG', 'Налаштування збереження');
DEFINE('_JP_ERRORS_TMP_DIR', 'Виявлені помилки, перевірте можливість запису в каталог зберігання резервних копій');
DEFINE('_JP_BACKUP_CREATION', 'Створення резервної копії даних');
DEFINE('_JP_DONT_CLOSE_BROWSER_WINDOW', 'Будь ласка, не закривайте вікно браузера й не переходьте із цієї сторінки до закінчення резервування й відображення відповідного повідомлення.');
DEFINE('_JP_ERRORS_VIEW_LOG', 'У ході роботи виявлені помилки, будь ласка, <a href="index2.php?option=com_joomlapack&act=log">подивіться лог</a> роботи й зясуєте причину.');
DEFINE('_JP_BACKUP_SUCCESS', 'Резервування даних сайту виконано успішно. Скачати');
DEFINE('_JP_CREATION_FILELIST', '1. Створення списку файлів для архівування.');
DEFINE('_JP_BACKUPPING_DB', '2. Архівування бази даних.');
DEFINE('_JP_CREATION_OF_ARCHIVE', '3. Створення підсумкового архіву.');
DEFINE('_JP_ALL_COMPLETED_2', '4. Все виконано');
DEFINE('_JP_PROGRESS', 'Обробка');
DEFINE('_JP_TABLES', 'Таблиці');
DEFINE('_JP_TABLE_ROWS', 'Записів');
DEFINE('_JP_SIZE', 'Розмір');
DEFINE('_JP_INCREMENT', 'Інскремент');
DEFINE('_JP_CREATION_DATE', 'Створена');
DEFINE('_JP_CHECKING', 'Перевірка');
DEFINE('_JP_FULL_BACKUP', 'Повний резерв');
DEFINE('_JP_BACKUP_BASE', 'Резервувати базу');
DEFINE('_JP_BACKUP_PANEL', 'Панель резервування');

/* administrator modules mod_components */
DEFINE('_FULL_COMPONENTS_LIST', 'Повний список компонентів');

/* administrator modules mod_fullmenu */
DEFINE('_MENU_CMS_FEATURES', 'Керування основними можливостями системи');
DEFINE('_MENU_GLOBAL_CONFIG', 'Глобальна конфігурація');
DEFINE('_MENU_GLOBAL_CONFIG_TIP', 'Настроювання основних параметрів конфігурації системи');
DEFINE('_MENU_LANGUAGES', 'Мовні пакети');
DEFINE('_MENU_LANGUAGES_TIP', 'Керування мовними файлами');
DEFINE('_MENU_SITE_PREVIEW', 'Передпроглядання сайту');
DEFINE('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', 'В новому вікні');
DEFINE('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', 'Всередині');
DEFINE('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', 'Всередині з позиціями');
DEFINE('_MENU_SITE_STATS', 'Статистика сайту');
DEFINE('_MENU_SITE_STATS_TIP', 'Перегляд статистики по сайту');
DEFINE('_MENU_STATS_BROWSERS', 'Браузери, ОС, домени');
DEFINE('_MENU_STATS_BROWSERS_TIP', 'Статистика відвідувань сайту по браузерах, ОС і доменах');
DEFINE('_MENU_SEARCHES', 'Пошукові запити');
DEFINE('_MENU_SEARCHES_TIP', 'Статистика пошукових запитів по сайту');
DEFINE('_MENU_PAGE_STATS', 'Статистика відвідування сторінок');
DEFINE('_MENU_TEMPLATES_TIP', 'Керування шаблонами');
DEFINE('_MENU_SITE_TEMPLATES', 'Шаблони сайту');
DEFINE('_MENU_NEW_SITE_TEMPLATE', 'Установка нового шаблона');
DEFINE('_MENU_ADMIN_TEMPLATES', 'Шаблоны адмінцентра');
DEFINE('_MENU_NEW_ADMIN_TEMPLATE', 'Установка нового шаблона');
DEFINE('_MENU', 'Меню');
DEFINE('_MENU_TRASH', 'Кошик меню');
DEFINE('_CONTENT_IN_SECTIONS', 'Вміст по розділах');
DEFINE('_CONTENT_IN_SECTION', 'Вміст в розділі');
DEFINE('_SECTION_ARCHIVE', 'Архів розділу');
DEFINE('_SECTION_CATEGORIES2', 'Категорії розділу');
DEFINE('_ADD_CONTENT_ITEM', 'Додати новину / статтю');
DEFINE('_ADD_STATIC_CONTENT', 'Додати статичний вміст');
DEFINE('_CONTENT_ON_FRONTPAGE', 'Вміст на головній');
DEFINE('_CONTENT_TRASH', 'Кошик вмісту');
DEFINE('_ALL_COMPONENTS', 'Всі компоненти…');
DEFINE('_EDIT_COMPONENTS_MENU', 'Редагувати меню компонентів');
DEFINE('_COMPONENTS_INSTALL_UNINSTALL', 'Установка / видалення компонентів');
DEFINE('_MODULES_SETUP', 'Керування модулями');
DEFINE('_MODULES_INSTALL_DEINSTALL', 'Установка / видалення модулів');
DEFINE('_SITE_MAMBOTS', 'Мамботи сайту');
DEFINE('_MAMBOTS_INSTALL_UNINSTALL', 'Установка / видалення мамботів');
DEFINE('_SITE_LANGUAGES', 'Мови сайту');
DEFINE('_JOOMLA_TOOLS', 'Інструменти');
DEFINE('_PRIVATE_MESSAGES_CONFIG', 'Налаштування повідомлень');
DEFINE('_FILE_MANAGER', 'Менеджер файлов');
DEFINE('_SQL_CONSOLE', 'SQL консоль');
DEFINE('_BACKUP_CONFIG', 'Налаштування збереження даних');
DEFINE('_CLEAR_CONTENT_CACHE', 'Очистити кеш вмісту');
DEFINE('_CLEAR_ALL_CACHE', 'Очистити ВЕСЬ кеш');
DEFINE('_SYSTEM_INFO', 'Інформація про систему');
DEFINE('_NO_ACTIVE_MENU_ON_THIS_PAGE', 'На цій сторінці меню не активне');

/* administrator modules mod_latest */
DEFINE('_LAST_ADDED_CONTENT', 'Останній доданий вміст');
DEFINE('_USER_WHO_ADD_CONTENT', 'Додав');

/* administrator modules mod_latest_users */
DEFINE('_NOW_ON_SITE', 'Зараз на сайті');
DEFINE('_REGISTERED_USERS_COUNT', 'Зареєстровано');
DEFINE('_ALL_REGISTERED_USERS_COUNT', 'Всього');
DEFINE('_TODAY_REGISTERED_USERS_COUNT', 'За сьогодні');
DEFINE('_WEEK_REGISTERED_USERS_COUNT', 'За тиждень');
DEFINE('_MONTH_REGISTERED_USERS_COUNT', 'За місяць');
DEFINE('_ADMINLIST_NEW', 'Нові користувачі');
DEFINE('_ADMINLIST_ENABLE', 'Дозволений');
DEFINE('_ADMINLIST_GROUP', 'Група');
DEFINE('_ADMINLIST_REGISTERED', 'Зареєстрований');
DEFINE('_ADMINLIST_ALL', 'все');

/* administrator modules mod_logged */
DEFINE('_NOW_ON_SITE_REGISTERED', 'Зараз на сайті авторизовані');

/* administrator modules mod_online */
DEFINE('_ONLINE_USERS', 'Користувачів онлайн');

/* administrator modules mod_popular */
DEFINE('_POPULAR_CONTENT', 'Часто переглядається');
DEFINE('_CREATED_CONTENT', 'Створено');
DEFINE('_CONTENT_HITS', 'Переглядів');

/* administrator modules mod_stats */
DEFINE('_MENU_ITEMS_COUNT', 'Пунктів');

/* administrator modules includes admin.php */
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE', 'удь ласка, зробіть каталог кеша доступним для запису');
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE2', 'Каталог кеша не доступний для запису');
DEFINE('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc установлено в "OFF" замість "ON"');
DEFINE('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals установлено в "ON" замість "OFF"');
DEFINE('_RG_EMULATION_ON_OFF', 'Параметр Joomla! RG_EMULATION в файлі globals.php установлений в "ON" замість "OFF"<br /><span style="font-weight: normal; font-style: italic; color: #666;">"ON" - параметр за замовчуванням - для сумісності</span>');
DEFINE('_PHP_SETTINGS_WARNING', 'Наступні налаштування PHP не є оптимальними для <strong>БЕЗПЕКИ</strong> і їх рекомендується змінити');
DEFINE('_MENU_CACHE_CLEANED', 'Кеш меню панелі керування очищений');
DEFINE('_CLEANING_ADMIN_MENU_CACHE', 'Помилка очищення кеша меню панелі керування');
DEFINE('_NO_MENU_ADMIN_CACHE', 'Кеш меню панелі керування не виявлений. Перевірте права доступу на каталог кеша.');

/* administrator modules includes pageNavigation.php */
DEFINE('_NAV_SHOW', 'Показано');
DEFINE('_NAV_SHOW_FROM', 'з');
DEFINE('_NAV_NO_RECORDS', 'Записи не знайдені');
DEFINE('_NAV_ORDER_UP', 'Перемістити вище');
DEFINE('_NAV_ORDER_DOWN', 'Перемістити нижче');

/* administrator modules popups pollwindow.php */
DEFINE('_POLL_PREVIEW', 'Передпроглядання опитування');

/* administrator modules popups uploadimage.php */
DEFINE('_CHOOSE_IMAGE_FOR_UPLOAD', 'Будь ласка, виберіть зображення для завантаження');
DEFINE('_BAD_UPLOAD_FILE_NAME', 'Імена файлів повинні складатися із символів алфавіту й не повинні містити пробілів');
DEFINE('_IMAGE_ALREADY_EXISST', 'Зображення вже існує');
DEFINE('_FILE_MUST_HAVE_THIS_EXTENSION', 'Файл повинен мати розширення');
DEFINE('_FILE_UPLOAD_UNSUCCESS', 'ЗЗавантаження файлу невдале');
DEFINE('_FILE_UPLOAD_SUCCESS', 'Завантаження файлу успішно завершено');

/* administrator index.php index2.php index3.php */
DEFINE('_PLEASE_ENTER_PASSWORD', 'Будь ласка, введіть пароль');
DEFINE('_BAD_CAPTCHA_STRING', 'Введений невірний код перевірки');
DEFINE('_BAD_USERNAME_OR_PASSWORD', 'Невірні імя користувача, пароль або рівень доступу.  Будь ласка, повторіть знову');
DEFINE('_BAD_USERNAME_OR_PASSWORD2', 'імя або пароль не вірні. Повторіть введення.'); //not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
DEFINE('_JOOSTINA_CONTRL_PANEL', 'Панель керування [ Joostina ]');
DEFINE('_GO_TO_MAIN_ADMIN_PAGE', 'Перейти на головну сторінку Панелі керування');
DEFINE('_PLEASE_WAIT', 'Чекайте…');
DEFINE('_TOGGLE_WYSIWYG_EDITOR', 'Використання візуального редактора');
DEFINE('_DISABLE_WYSIWYG_EDITOR', 'Відключити редактор');
DEFINE('_PRESS_HERE_TO_RELOAD_CAPTCHA', 'Натисніть, щоб оновити зображення');
DEFINE('_SHOW_CAPTCHA', 'Оновити зображення');
DEFINE('_PLEASE_ENTER_CAPTCHA', 'Введіть код проверки з картинки вище');
DEFINE('_PLEASE_ENABLE_JAVASCRIPT', '!Попередження! Javascript повинен бути дозволений для правильної роботи панелі керування адміністратора!');

/* includes feedcreator.class.php */
DEFINE('_ERROR_CREATING_NEWSFEED', 'Помилка створення файлу стрічки новин. Будь ласка, перевірте дозвіл на запис');

/* includes joomla.php */
DEFINE('_YOU_NEED_TO_AUTH', 'Необхідно авторизуватися');
DEFINE('_ADMIN_SESSION_ENDED', 'Сесія адміністратора закінчилася');
DEFINE('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', 'Вам необхідно авторизуватися. Якщо включено параметр PHP session.auto_start або виключений параметр session.use_cookies setting, то спочатку Ви повинні їх виправити перед тим, як зможете ввійти');
DEFINE('_WRONG_USER_SESSION', 'Неправильна сесія');
DEFINE('_FIRST', 'Перший');
DEFINE('_LAST', 'Останній');
DEFINE('_MOS_WARNING', 'Увага!');
DEFINE('_ADM_MENUS_TARGET_CUR_WINDOW', 'поточному вікні з панеллю навігації');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', 'новому вікні з панеллю навігації');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', 'новому вікні без панелі навігації');
DEFINE('_WITH_UNASSIGNED', 'З вільними');
DEFINE('_CHOOSE_IMAGE', 'Виберіть зображення');
DEFINE('_NO_USER', 'Немає користувача');
DEFINE('_CREATE_CATEGORIES_FIRST', 'Спочатку необхідно створити категорії');
DEFINE('_NOT_CHOOSED', 'Не обрано');
DEFINE('_PUBLISHED_VUT_NOT_ACTIVE', 'Опубліковано, але <u>Не активно</u>');
DEFINE('_PUBLISHED_AND_ACTIVE', 'Опубліковано і <u>Активно</u>');
DEFINE('_PUBLISHED_BUT_DATE_EXPIRED', 'Опубліковано, но <u>Минув строк публікації</u>');
DEFINE('_NOT_PUBLISHED', 'Не опубліковано');
DEFINE('_LINK_NAME', 'Назва посилання');
DEFINE('_MENU_EXPIRED', 'Застаріло');
DEFINE('_MENU_ITEM_NAME', 'Назва пункту');
DEFINE('_CHECKED_OUT', 'Заблоковано');
DEFINE('_PUBLISH_ON_FRONTPAGE', 'Опублікувати на сайті');
DEFINE('_UNPUBLISH_ON_FRONTPAGE', 'Сховати (Не показувати на сайті)');

/* includes joomla.xml.php */
DEFINE('_DONT_USE_IMAGE', '- Не використовувати зображення -');
DEFINE('_DEFAULT_IMAGE', '- Зображення за замовчуванням -');

/* includes debug jdebug.php */
DEFINE('_SQL_QUERIES_COUNT', 'Число SQL запитів');

/* includes Cache Lite Lite.php */
DEFINE('_ERROR_DELETING_CACHE', 'Помилка видалення кеша');
DEFINE('_ERROR_READING_CACHE_DIR', 'Помилка читання директорії кеша');
DEFINE('_ERROR_READING_CACHE_FILE', 'Помилка читання файла кеша');
DEFINE('_ERROR_WRITING_CACHE_FILE', 'Помилка записи файла кеша');
DEFINE('_SCRIPT_MEMORY_USING', 'Використано памяті');

/* components com_content */
DEFINE('_YOU_HAVE_NO_CONTENT', 'Немає доданого Вами вмісту');
DEFINE('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', 'Вміст зараз редагується іншою людиною');

/* components com_poll */
DEFINE('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', 'Вже існує модуль із такою назвою. Введіть іншу  назву.');

/* components com_registration */
DEFINE('_USER_ACTIVATION_FAILED', '<div class="componentheading">Помилка активації!</div><br />Активація вашого облікового запису неможлива. Будь ласка, зверніться до адміністрації сайту.');

/* components com_weblinks */
DEFINE('_ENTER_CORRECT_URL', 'Введіть правильный URL!');
DEFINE('_ENTER_CORRECT_TITLE', 'Посилання повинне мати заголовок!');
DEFINE('_ENTER_CORRECT_CAT', 'Ви повинні обрати категорію');
DEFINE('_ENTER_CORRECT_URL1', 'Ви повинні ввести URL');

/* components com_xmap */
DEFINE('_XMAP_PAGE', ' сторінка');

/* administrator index2.php */
DEFINE('_TEMPLATE_NOT_FOUND', 'Шаблон не виявлений');
DEFINE('_ACCESS_DENIED', 'У доступі відмовлено');
DEFINE('_CHECKIN_OJECT', 'Розблокувати');
?>