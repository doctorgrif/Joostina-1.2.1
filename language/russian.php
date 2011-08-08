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
global $mosConfig_form_date, $mosConfig_form_date_full, $month_date, $month;

// Страница сайта не найдена
define('_404', 'Запрошенная страница не найдена.');
define('_404_RTS', 'Вернуться на сайт.');

define('_SYSERR1', 'Нет поддержки MySQL.');
define('_SYSERR2', 'Невозможно подключиться к серверу базы данных.');
define('_SYSERR3', 'Невозможно подключиться к базе данных.');

// Error 503 (Database Error)
define('_503', 'Извините, сервис временно недоступен.');
define('_503_RTS', 'Вернитесь на сайт позже.');

// общее
DEFINE('_LANGUAGE', 'ru');
DEFINE('_NOT_AUTH', 'Извините, но для просмотра этой страницы у Вас недостаточно прав.');
DEFINE('_DO_LOGIN', 'Вы должны авторизоваться или пройти регистрацию.');
DEFINE('_VALID_AZ09', 'Пожалуйста, проверьте, правильно ли написано %s.  Имя не должно содержать пробелов, только символы 0-9, a-z, A-Z и иметь длину не менее %d символов.');
DEFINE('_VALID_AZ09_USER', 'Пожалуйста, правильно введите %s. Должно содержать только символы 0-9, a-z, A-Z и иметь длину не менее %d символов.');
DEFINE('_CMN_YES', 'Да');
DEFINE('_CMN_NO', 'Нет');
DEFINE('_CMN_SHOW', 'Показать');
DEFINE('_CMN_HIDE', 'Скрыть');
DEFINE('_CMN_NAME', 'Имя');
DEFINE('_CMN_DESCRIPTION', 'Описание');
DEFINE('_CMN_SAVE', 'Сохранить');
DEFINE('_CMN_APPLY', 'Применить');
DEFINE('_CMN_CANCEL', 'Отмена');
DEFINE('_CMN_PRINT', 'Печать');
DEFINE('_CMN_PDF','PDF');
DEFINE('_CMN_EMAIL', 'E-mail');
DEFINE('_CMN_SITEMAP', 'Карта сайта');
DEFINE('_ICON_SEP', '|');
DEFINE('_CMN_PARENT', 'Родитель');
DEFINE('_CMN_ORDERING', 'Сортировка');
DEFINE('_CMN_ACCESS', 'Уровень доступа');
DEFINE('_CMN_SELECT', 'Выбрать');
DEFINE('_CMN_SELECT_PH', 'Подтвердите выбор');
DEFINE('_CMN_NEXT', 'След.');
DEFINE('_CMN_NEXT_ARROW', '&nbsp;&raquo;');
DEFINE('_CMN_PREV', 'Пред.');
DEFINE('_CMN_PREV_ARROW', '&laquo;&nbsp;');
DEFINE('_CMN_SORT_NONE', 'Без сортировки');
DEFINE('_CMN_SORT_ASC', 'По возрастанию');
DEFINE('_CMN_SORT_DESC', 'По убыванию');
DEFINE('_CMN_NEW', 'Создать');
DEFINE('_CMN_NONE', 'Нет');
DEFINE('_CMN_LEFT', 'Слева');
DEFINE('_CMN_RIGHT', 'Справа');
DEFINE('_CMN_CENTER', 'По центру');
DEFINE('_CMN_ARCHIVE', 'Добавить в архив');
DEFINE('_CMN_UNARCHIVE', 'Извлечь из архива');
DEFINE('_CMN_TOP', 'Вверху');
DEFINE('_CMN_BOTTOM', 'Внизу');
DEFINE('_CMN_PUBLISHED', 'Опубликовано');
DEFINE('_CMN_UNPUBLISHED', 'Не опубликовано');
DEFINE('_CMN_EDIT_HTML', 'Редактировать HTML');
DEFINE('_CMN_EDIT_CSS', 'Редактировать CSS');
DEFINE('_CMN_DELETE', 'Удалить');
DEFINE('_CMN_FOLDER', 'Каталог');
DEFINE('_CMN_SUBFOLDER', 'Подкаталог');
DEFINE('_CMN_OPTIONAL', 'Не обязательно');
DEFINE('_CMN_REQUIRED', 'Обязательно');
DEFINE('_CMN_CONTINUE', 'Продолжить');
DEFINE('_STATIC_CONTENT', 'Статическое содержимое');
DEFINE('_CMN_NEW_ITEM_LAST', 'По умолчанию новые объекты будут добавлены в конец списка. Порядок расположения может быть изменен только после сохранения объекта.');
DEFINE('_CMN_NEW_ITEM_FIRST', 'По умолчанию новые объекты будут добавлены в начало списка. Порядок расположения может быть изменен только после сохранения объекта.');
DEFINE('_LOGIN_INCOMPLETE', 'Пожалуйста, заполните поля &laquo;Имя пользователя&raquo; и &laquo;Пароль&raquo;.');
DEFINE('_LOGIN_BLOCKED', 'Извините, ваша учетная запись заблокирована. За более подробной информацией обратитесь к администратору сайта.');
DEFINE('_LOGIN_INCORRECT', 'Неправильное имя пользователя (логин) или пароль. Попробуйте ещё раз.');
DEFINE('_LOGIN_NOADMINS', 'Извините, вы не можете войти на сайт. Администраторы на сайте не зарегистрированы.');
DEFINE('_CMN_JAVASCRIPT', 'Внимание! Для выполнения данной операции, в вашем браузере должна быть включена поддержка Java-script.');
DEFINE('_NEW_MESSAGE', 'Вам пришло новое личное сообщение.');
DEFINE('_MESSAGE_FAILED', 'Пользователь заблокировал свой почтовый ящик. Сообщение не доставлено.');
DEFINE('_CMN_IFRAMES', 'Эта страница будет отображена некорректно. Ваш браузер не поддерживает вложенные фреймы (IFrame).');
DEFINE('_INSTALL_3PD_WARN', 'Предупреждение: Установка сторонних расширений может нарушить безопасность вашего сайта. При обновлении Joostina сторонние расширения не обновляются.<br />Для получения дополнительной информации о мерах защиты своего сайта и сервера, пожалуйста, посетите <a href="http:// forum.joostina.ru" target="_blank" style="color:blue;text-decoration:underline;">Форум Joostina</a>.');
DEFINE('_INSTALL_WARN', 'По соображениям безопасности, пожалуйста, удалите каталог <strong>installation</strong> с вашего сервера и обновите страницу.');
DEFINE('_TEMPLATE_WARN', '<strong class="red">Файл шаблона не найден!</strong><br />Зайдите в Панель управления сайтом и выберите новый шаблон.');
DEFINE('_NO_PARAMS', 'Объект не содержит настраиваемых параметров.');
DEFINE('_HANDLER', 'Обработчик для данного типа отсутствует.');

/** мамботы */
DEFINE('_TOC_JUMPTO', 'Оглавление');

/* plugin_jw_ajaxvote */
DEFINE('_PJA_SAVE', 'Сохранение');
DEFINE('_PJA_YOU_VOTE_ADD', 'Ваш голос уже учтён!');
DEFINE('_PJA_VOTE', 'голос');
DEFINE('_PJA_VOTES', 'голосов');
DEFINE('_PJA_THANKS_FULL', 'Спасибо за Ваш голос! Результаты буду обновлены после перерасчета.');
DEFINE('_PJA_THANKS', 'Спасибо за Ваш голос!');
DEFINE('_PJA_1_5', '1 балл из 5');
DEFINE('_PJA_2_5', '2 балла из 5');
DEFINE('_PJA_3_5', '3 балла из 5');
DEFINE('_PJA_4_5', '4 балла из 5');
DEFINE('_PJA_5_5', '5 баллов из 5');

/* joostinasocialbot */
DEFINE('_JSB_BEFORE', 'Добавить закладку в');
DEFINE('_JSB_ADD', 'Добавить закладку в');
DEFINE('_JSB_AFTER', 'Работает под управлением Joostina CMS!');

/**  содержимое */
DEFINE('_READ_MORE', 'Подробнее…');
DEFINE('_READ_MORE_REGISTER', 'Только для зарегистрированных пользователей…');
DEFINE('_MORE', 'Далее…');
DEFINE('_ON_NEW_CONTENT', 'Пользователь [ %s ] добавил новый объект [ %s ]. Раздел: [ %s ]/Категория: [ %s ]');
DEFINE('_SEL_CATEGORY', '-Выберите категорию-');
DEFINE('_SEL_SECTION', '-Выберите раздел-');
DEFINE('_SEL_AUTHOR', '-Выберите автора-');
DEFINE('_SEL_POSITION', '-Выберите позицию-');
DEFINE('_SEL_TYPE', '-Выберите тип-');
DEFINE('_EMPTY_CATEGORY', 'Данная категория не содержит объектов.');
DEFINE('_EMPTY_BLOG', 'Нет объектов для отображения!');
DEFINE('_NOT_EXIST', 'Извините, страница не найдена.<br />Пожалуйста, вернитесь на главную страницу сайта.');
DEFINE('_SUBMIT_BUTTON', 'Отправить');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE', 'Голосовать');
DEFINE('_BUTTON_RESULTS', 'Результаты');
DEFINE('_USERNAME', 'Пользователь');
DEFINE('_LOST_PASSWORD', 'Забыли пароль?');
DEFINE('_PASSWORD', 'Пароль');
DEFINE('_BUTTON_LOGIN', 'Войти');
DEFINE('_BUTTON_LOGOUT', 'Выйти');
DEFINE('_NO_ACCOUNT', 'Ещё не зарегистрированы?');
DEFINE('_CREATE_ACCOUNT', 'Регистрация');
DEFINE('_VOTE_POOR', 'Худшая');
DEFINE('_VOTE_BEST', 'Лучшая');
DEFINE('_USER_RATING', 'Рейтинг');
DEFINE('_RATE_BUTTON', 'Оценить');
DEFINE('_REMEMBER_ME', 'Запомнить');

/** contact.php */
DEFINE('_ENQUIRY', 'Контакт');
DEFINE('_ENQUIRY_TEXT', 'Это сообщение отправлено с сайта %s. Автор сообщения:');
DEFINE('_COPY_TEXT', 'Это копия сообщения, которое Вы отправили для %s с сайта %s.');
DEFINE('_COPY_SUBJECT', 'Копия: ');
DEFINE('_THANK_MESSAGE', 'Спасибо! Сообщение успешно отправлено.');
DEFINE('_CLOAKING', 'Этот e-mail защищен от спам-ботов. Для его просмотра в вашем браузере должна быть включена поддержка Java-script.');
DEFINE('_CONTACT_HEADER_NAME', 'Имя');
DEFINE('_CONTACT_HEADER_POS', 'Положение');
DEFINE('_CONTACT_HEADER_EMAIL', 'E-mail');
DEFINE('_CONTACT_HEADER_PHONE', 'Телефон');
DEFINE('_CONTACT_HEADER_FAX', 'Факс');
DEFINE('_CONTACT_HEADER_MISC', 'Дополнительная информация');
DEFINE('_CONTACTS_DESC', 'Список контактов этого сайта');
DEFINE('_CONTACT_MORE_THAN', 'Вы не можете вводить более одного адреса e-mail.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE', 'Обратная связь');
DEFINE('_EMAIL_DESCRIPTION', 'Отправить e-mail пользователю');
DEFINE('_NAME_PROMPT', 'Ваше имя');
DEFINE('_NAME_PROMPT_PH', 'Введите Ваше имя');
DEFINE('_EMAIL_PROMPT', 'Ваш e-mail');
DEFINE('_EMAIL_PROMPT_PH', 'Введите Ваш e-mail');
DEFINE('_SUBJECT_PROMPT_PH', 'Введите тему Вашего сообщения');
DEFINE('_MESSAGE_PROMPT', 'Введите текст сообщения');
DEFINE('_MESSAGE_PROMPT_PH', 'Введите текст Вашего сообщения');
DEFINE('_PLEASE_ENTER_CAPTCHA_PH', 'Введите код');
DEFINE('_SEND_BUTTON', 'Отправить');
DEFINE('_SEND_BUTTON_CONTACT', 'Отправить сообщение');
DEFINE('_CONTACT_FORM_NC', 'Пожалуйста, заполните форму полностью и правильно.');
DEFINE('_CONTACT_TELEPHONE', 'Телефон');
DEFINE('_CONTACT_MOBILE', 'Мобильный');
DEFINE('_CONTACT_FAX', 'Факс');
DEFINE('_CONTACT_EMAIL', 'E-mail');
DEFINE('_CONTACT_NAME', 'Имя');
DEFINE('_CONTACT_POSITION', 'Должность');
DEFINE('_CONTACT_ADDRESS', 'Адрес');
DEFINE('_CONTACT_MISC', 'Дополнительная информация');
DEFINE('_CONTACT_SEL', 'Выберите получателя');
DEFINE('_CONTACT_NONE', 'Детали этой контактной записи отсутствуют.');
DEFINE('_CONTACT_ONE_EMAIL', 'Нельзя вводить более одного адреса e-mail.');
DEFINE('_EMAIL_A_COPY', 'Отправить копию сообщения на собственный адрес');
DEFINE('_CONTACT_DOWNLOAD_AS', 'Скачать информацию в формате');
DEFINE('_VCARD', 'VCard');

/** pageNavigation */
DEFINE('_PN_LT', '&lt;');
DEFINE('_PN_RT', '&gt;');
DEFINE('_PN_PAGE', 'Страница');
DEFINE('_PN_OF', 'из');
DEFINE('_PN_LLAST', '[Первая]');
DEFINE('_PN_PREV10', 'Предыдущая');
DEFINE('_PN_PREV1', 'Предыдущая');
DEFINE('_PN_NEXT1', 'Следующая');
DEFINE('_PN_NEXT10', 'Следующие');
DEFINE('_PN_RLAST', '[Последняя]');
DEFINE('_PN_DISPLAY_NR', 'Отображать');
DEFINE('_PN_RESULTS', 'Результаты');

/** письмо другу */
DEFINE('_EMAIL_TITLE', 'Отправить e-mail другу');
DEFINE('_EMAIL_FRIEND', 'Отправить ссылку страницы на e-mail:');
DEFINE('_EMAIL_FRIEND_ADDR', 'E-Mail друга:');
DEFINE('_EMAIL_YOUR_NAME', 'Ваше имя:');
DEFINE('_EMAIL_YOUR_MAIL', 'Ваш e-mail:');
DEFINE('_SUBJECT_PROMPT', ' Тема сообщения:');
DEFINE('_BUTTON_SUBMIT_MAIL', 'Отправить');
DEFINE('_BUTTON_CANCEL', 'Отмена');
DEFINE('_EMAIL_ERR_NOINFO', 'Вы должны правильно ввести свой e-mail и e-mail получателя этого письма.');
DEFINE('_EMAIL_MSG', ' Здравствуйте! Следующую ссылку на страницу сайта "%s" отправил Вам %s ( %s ).

Вы сможете просмотреть её по этой ссылке:
%s');
DEFINE('_EMAIL_INFO', 'Письмо отправил');
DEFINE('_EMAIL_SENT', 'Ссылка на эту страницу отправлена для');
DEFINE('_PROMPT_CLOSE', 'Закрыть окно');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' Автор');
DEFINE('_WRITTEN_BY', ' Автор');
DEFINE('_LAST_UPDATED', 'Последнее обновление:');
DEFINE('_BACK', 'Вернуться');
DEFINE('_LEGEND', 'История');
DEFINE('_DATE', 'Дата');
DEFINE('_ORDER_DROPDOWN', 'Порядок');
DEFINE('_HEADER_TITLE', 'Заголовок');
DEFINE('_HEADER_AUTHOR', 'Автор');
DEFINE('_HEADER_SUBMITTED', 'Написан');
DEFINE('_HEADER_HITS', 'Просмотров');
DEFINE('_E_EDIT', 'Редактировать');
DEFINE('_E_ADD', 'Добавить');
DEFINE('_E_WARNUSER', 'Пожалуйста, нажмите кнопку &laquo;Отмена&raquo; или &laquo;Сохранить&raquo;, чтобы покинуть эту страницу.');
DEFINE('_E_WARNTITLE', 'Содержимое должно иметь заголовок');
DEFINE('_E_WARNTEXT', 'Содержимое должно иметь вводный текст');
DEFINE('_E_WARNCAT', 'Пожалуйста, выберите категорию');
DEFINE('_E_CONTENT', 'Содержимое');
DEFINE('_E_TITLE', 'Заголовок:');
DEFINE('_E_CATEGORY', 'Категория');
DEFINE('_E_INTRO', 'Вводный текст');
DEFINE('_E_MAIN', 'Основной текст');
DEFINE('_E_MOSIMAGE', 'Вставить тег {mosimage}');
DEFINE('_E_IMAGES', 'Изображения');
DEFINE('_E_GALLERY_IMAGES', 'Галерея изображений');
DEFINE('_E_CONTENT_IMAGES', 'Изображения к тексту');
DEFINE('_E_EDIT_IMAGE', 'Параметры изображения');
DEFINE('_E_NO_IMAGE', 'Без изображения');
DEFINE('_E_INSERT', 'Вставить');
DEFINE('_E_UP', 'Выше');
DEFINE('_E_DOWN', 'Ниже');
DEFINE('_E_REMOVE', 'Удалить');
DEFINE('_E_SOURCE', 'Название файла:');
DEFINE('_E_ALIGN', 'Расположение:');
DEFINE('_E_ALT', 'Альтернативный текст:');
DEFINE('_E_BORDER', 'Рамка:');
DEFINE('_E_CAPTION', 'Заголовок');
DEFINE('_E_CAPTION_POSITION', 'Положение подписи');
DEFINE('_E_CAPTION_ALIGN', 'Выравнивание подписи');
DEFINE('_E_CAPTION_WIDTH', 'Ширина подписи');
DEFINE('_E_APPLY', 'Применить');
DEFINE('_E_PUBLISHING', 'Публикация');
DEFINE('_E_STATE', 'Состояние:');
DEFINE('_E_AUTHOR_ALIAS', 'Псевдоним автора:');
DEFINE('_E_ACCESS_LEVEL', 'Уровень доступа:');
DEFINE('_E_ORDERING', 'Порядок:');
DEFINE('_E_START_PUB', 'Дата начала публикации:');
DEFINE('_E_FINISH_PUB', 'Дата окончания публикации:');
DEFINE('_E_SHOW_FP', 'Показывать на главной странице:');
DEFINE('_E_HIDE_TITLE', 'Скрыть заголовок:');
DEFINE('_E_METADATA', 'Мета-тэги');
DEFINE('_E_M_DESC', 'Описание:');
DEFINE('_E_M_KEY', 'Ключевые слова:');
DEFINE('_E_SUBJECT', 'Тема:');
DEFINE('_E_EXPIRES', 'Дата истечения:');
DEFINE('_E_VERSION', 'Версия');
DEFINE('_E_ABOUT', 'Об объекте');
DEFINE('_E_CREATED', 'Дата создания');
DEFINE('_E_LAST_MOD', 'Последнее изменение:');
DEFINE('_E_HITS', 'Количество просмотров:');
DEFINE('_E_SAVE', 'Сохранить');
DEFINE('_E_CANCEL', 'Отмена');
DEFINE('_E_REGISTERED', 'Только для зарегистрированных пользователей!');
DEFINE('_E_ITEM_INFO', 'Информация');
DEFINE('_E_ITEM_SAVED', 'Успешно сохранено!');
DEFINE('_ITEM_PREVIOUS', '&lt; ');
DEFINE('_ITEM_NEXT', ' &gt;');
DEFINE('_KEY_NOT_FOUND', 'Ключ не найден!');

/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY', 'В этом разделе архива сейчас нет объектов. Пожалуйста, зайдите позже.');
DEFINE('_CATEGORY_ARCHIVE_EMPTY', 'В этой категории архива сейчас нет объектов. Пожалуйста, зайдите позже.');
DEFINE('_HEADER_SECTION_ARCHIVE', 'Архив разделов');
DEFINE('_HEADER_CATEGORY_ARCHIVE', 'Архив категорий');
DEFINE('_ARCHIVE_SEARCH_FAILURE', 'Не найдено архивных записей для %s %s.'); // значения месяца, а затем года
DEFINE('_ARCHIVE_SEARCH_SUCCESS', 'Найдены архивные записи для %s %s.'); // значения месяца, а затем года
DEFINE('_FILTER', 'Фильтр');
DEFINE('_ORDER_DROPDOWN_DA', 'Дата (по возрастанию)');
DEFINE('_ORDER_DROPDOWN_DD', 'Дата (по убыванию)');
DEFINE('_ORDER_DROPDOWN_TA', 'Название (по возрастанию)');
DEFINE('_ORDER_DROPDOWN_TD', 'Название (по убыванию)');
DEFINE('_ORDER_DROPDOWN_HA', 'Просмотры (по возрастанию)');
DEFINE('_ORDER_DROPDOWN_HD', 'Просмотры (по убыванию)');
DEFINE('_ORDER_DROPDOWN_AUA', 'Автор (по возрастанию)');
DEFINE('_ORDER_DROPDOWN_AUD', 'Автор (по убыванию)');
DEFINE('_ORDER_DROPDOWN_O', 'По порядку');
DEFINE('_CONTENT_ANSWER', 'Получен ответ:');
DEFINE('_CONTENT_CNG_STAT_PUB', 'Смена статуса публикации содержимого: ');

/** poll.php */
DEFINE('_ALERT_ENABLED', 'Cookies должны быть разрешены!');
DEFINE('_ALREADY_VOTE', 'Вы уже проголосовали в этом опросе!');
DEFINE('_NO_SELECTION', 'Вы не сделали свой выбор. Пожалуйста, попробуйте ещё раз.');
DEFINE('_THANKS', 'Спасибо за Ваше участие в голосовании!');
DEFINE('_SELECT_POLL', 'Выберите опрос из списка');

/** classes/html/poll.php */
DEFINE('_JAN', 'Январь');
DEFINE('_FEB', 'Февраль');
DEFINE('_MAR', 'Март');
DEFINE('_APR', 'Апрель');
DEFINE('_MAY', 'Май');
DEFINE('_JUN', 'Июнь');
DEFINE('_JUL', 'Июль');
DEFINE('_AUG', 'Август');
DEFINE('_SEP', 'Сентябрь');
DEFINE('_OCT', 'Октябрь');
DEFINE('_NOV', 'Ноябрь');
DEFINE('_DEC', 'Декабрь');
DEFINE('_POLL_TITLE', 'Результаты опроса');
DEFINE('_SURVEY_TITLE', 'Название опроса');
DEFINE('_NUM_VOTERS', 'Количество проголосовавших');
DEFINE('_FIRST_VOTE', 'Первый голос');
DEFINE('_LAST_VOTE', 'Последний голос');
DEFINE('_SEL_POLL', 'Выберите опрос');
DEFINE('_NO_RESULTS', 'Нет данных по выбранному опросу.');

/** registration.php */
DEFINE('_ERROR_PASS', 'Извините, такой пользователь не найден.');
DEFINE('_NEWPASS_MSG', 'Учетная запись пользователя $checkusername соответствует адресу e-mail.\n' .
		' Пользователь сайта $mosConfig_live_site сделал запрос на получение нового пароля.\n\n' .
		' Ваш новый пароль: $newpass\n\nЕсли Вы не запрашивали изменение пароля, сообщите об этом администратору.' .
		' Только Вы можете увидеть это сообщение, больше никто. Если это ошибка, просто зайдите ' .
		' на сайт, используя новый пароль, и затем, измените его на удобный Вам.');
DEFINE('_NEWPASS_SUB', '$_sitename: Новый пароль для $checkusername');
DEFINE('_NEWPASS_SENT', 'Новый пароль создан и отправлен пользователю!');
DEFINE('_REGWARN_NAME', 'Пожалуйста, введите свое настоящее имя (имя, отображаемое на сайте).');
DEFINE('_REGWARN_UNAME', 'Пожалуйста, введите свое имя пользователя (логин).');
DEFINE('_REGWARN_MAIL', 'Пожалуйста, правильно введите адрес e-mail.');
DEFINE('_REGWARN_PASS', 'Пожалуйста, правильно введите пароль. Пароль не должен содержать пробелы, его длина должна быть не меньше 6 символов и он должен состоять только из цифр (0-9) и латинских символов (a-z, A-Z)');
DEFINE('_REGWARN_VPASS1', 'Пожалуйста, проверьте пароль.');
DEFINE('_REGWARN_VPASS2', 'Пароль и его подтверждение не совпадают. Пожалуйста, попробуйте ещё раз.');
DEFINE('_REGWARN_INUSE', 'Это имя пользователя уже используется. Пожалуйста, выберите другое имя.');
DEFINE('_REGWARN_EMAIL_INUSE', 'Этот e-mail уже используется. Если Вы забыли свой пароль, Нажмите на ссылку &laquo;Забыли пароль?&raquo; и на указанный e-mail будет выслан новый пароль.');
DEFINE('_SEND_SUB', 'Данные о новом пользователе %s с %s');
DEFINE('_USEND_MSG_ACTIVATE', 'Здравствуйте %s,

Благодарим за регистрацию на сайте %s. Ваша учетная запись успешно создана и должна быть активирована.
Чтобы активировать учетную запись, нажмите на ссылке или скопируйте ее в адресную строку браузера:
%s

После активации Вы можете зайти на сайт %s, используя свое имя пользователя и пароль:

Имя пользователя - %s
Пароль - %s');
DEFINE('_USEND_MSG', 'Здравствуйте %s,

Благодарим Вас за регистрацию на сайте %s.

Сейчас Вы можете войти на сайт %s, используя имя пользователя и пароль, введенные вами при регистрации.');
DEFINE('_USEND_MSG_NOPASS', 'Здравствуйте $name,\n\nВы успешно зарегистрированы на сайте $mosConfig_live_site.\n' .
		'Вы можете зайти на сайт $mosConfig_live_site, используя данные, которые Вы указали при регистрации.\n\n' .
		'На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления\n');
DEFINE('_ASEND_MSG', 'Здравствуйте! Это системное сообщение с сайта %s.

На сайте %s зарегистрировался новый пользователь.

Данные пользователя:
Настоящее имя - %s
Адрес e-mail - %s
Имя пользователя - %s

На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления');
DEFINE('_REG_COMPLETE_NOPASS', '<div class="componentheading">Регистрация завершена!</div><br />' .
		'Сейчас Вы можете войти на сайт.<br />');
DEFINE('_REG_COMPLETE', '<div class="componentheading">Регистрация завершена!</div><br />Сейчас Вы можете войти на сайт.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Регистрация завершена!</div><br />Ваша учетная запись создана и должна быть активирована перед тем, как вы ею воспользуетесь. На Ваш e-mail было отправлено письмо со ссылкой, с помощью которой Вы можете активировать свою учетную запись.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Учетная запись активирована!</div><br />Ваша учетная запись активирована. Теперь Вы можете зайти на сайт, используя имя пользователя и пароль, которые Вы ввели при регистрации.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Неверная ссылка активации!</div><br />Данная учетная запись отсутствует на сайте или уже активирована.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">Ошибка активации!</div><br />Активация вашей учетной записи невозможна. Пожалуйста, обратитесь к администратору.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD', 'Забыли пароль?');
DEFINE('_NEW_PASS_DESC', 'Пожалуйста, введите свои имя пользователя и адрес e-mail, затем нажмите кнопку &laquo;Отправить пароль&raquo;.<br />' .
		'Вскоре, на указанный адрес e-mail Вы получите письмо с новым паролем. Используйте этот пароль для входа на сайт.');
DEFINE('_PROMPT_UNAME', 'Имя пользователя:');
DEFINE('_PROMPT_EMAIL', 'Адрес e-mail:');
DEFINE('_BUTTON_SEND_PASS', 'Отправить пароль');
DEFINE('_REGISTER_TITLE', 'Регистрация');
DEFINE('_REGISTER_NAME', 'Настоящее имя:');
DEFINE('_REGISTER_UNAME', 'Имя пользователя:');
DEFINE('_REGISTER_EMAIL', 'E-mail:');
DEFINE('_REGISTER_NAME_PH', 'Введите настоящее имя');
DEFINE('_REGISTER_UNAME_PH', 'Введите имя пользователя');
DEFINE('_REGISTER_EMAIL_PH', 'Введите e-mail');
DEFINE('_REGISTER_PASS', 'Пароль:');
DEFINE('_REGISTER_VPASS', 'Подтверждение пароля:');
DEFINE('_REGISTER_REQUIRED', 'Все поля, отмеченные символом <span class="red">*</span>, обязательны для заполнения!');
DEFINE('_BUTTON_SEND_REG', 'Отправить данные');
DEFINE('_SENDING_PASSWORD', 'Ваш пароль будет отправлен на указанный выше адрес e-mail.<br />Когда Вы получите' .
		' новый пароль, Вы сможете зайти на сайт и изменить этот пароль в любое время.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE', 'Поиск');
DEFINE('_SEARCH_SEL_CATEGORY', 'Выберите категорию');
DEFINE('_SEARCH_RESULT', 'Результаты поиска:');
DEFINE('_SEARCH_LIMITSTART', 'Показывать объектов на странице');
DEFINE('_PROMPT_KEYWORD', 'Поиск по ключевой фразе');
DEFINE('_SEARCH_MATCHES', 'найдено %d совпадений');
DEFINE('_CONCLUSION', 'Всего найдено $totalRows материалов.');
DEFINE('_NOKEYWORD', 'Ничего не найдено');
DEFINE('_IGNOREKEYWORD', 'В поиске были пропущены предлоги');
DEFINE('_SEARCH_ANYWORDS', 'Любое слово');
DEFINE('_SEARCH_ALLWORDS', 'Все слова');
DEFINE('_SEARCH_PHRASE', 'Целую фразу');
DEFINE('_SEARCH_NEWEST', 'По убыванию');
DEFINE('_SEARCH_OLDEST', 'По возрастанию');
DEFINE('_SEARCH_POPULAR', 'По популярности');
DEFINE('_SEARCH_ALPHABETICAL', 'Алфавитный порядок');
DEFINE('_SEARCH_CATEGORY', 'Раздел/Категория');
DEFINE('_SEARCH_MESSAGE', 'Текст для поиска должен содержать от 3 до 20 символов');
DEFINE('_SEARCH_ARCHIVED', 'В архиве');
DEFINE('_SEARCH_CATBLOG', 'Блог категории');
DEFINE('_SEARCH_CATLIST', 'Список категории');
DEFINE('_SEARCH_NEWSFEEDS', 'Ленты новостей');
DEFINE('_SEARCH_SECLIST', 'Список раздела');
DEFINE('_SEARCH_SECBLOG', 'Блог раздела');

/** templates/*.php */
DEFINE('_ISO2', 'cp1251');
DEFINE('_ISO', 'charset=windows-1251');
DEFINE('_DATE_FORMAT', 'Сегодня: d.m.Y г.'); // Используйте формат PHP-функции DATE

/**
 * измените строчку ниже, для изменения вывода даты на сайте
 * например, DEFINE("_DATE_FORMAT_LC"," %d %B %Y г. %H:%M"); // Используйте формат PHP-функции strftime
 */
$month_date = array(
	'01' => "января",
	'02' => "февраля",
	'03' => "марта",
	'04' => "апреля",
	'05' => "мая",
	'06' => "июня",
	'07' => "июля",
	'08' => "августа",
	'09' => "сентября",
	'10' => "октября",
	'11' => "ноября",
	'12' => "декабря",);
$month = date("m");
$m = $month_date["$month"];
// DEFINE('_DATE_FORMAT_LC',"%A, %d ".$m." %Y"); // Используйте PHP strftime формат
DEFINE('_DATE_FORMAT_LC', '%d.%m.%Y'); // Используйте PHP strftime формат
// DEFINE('_DATE_FORMAT_LC',$mosConfig_form_date); // Используйте формат PHP-функции strftime
DEFINE('_DATE_FORMAT_LC2', $mosConfig_form_date_full); // Полный формат времени
DEFINE('_SEARCH_BOX', 'Поиск…');
DEFINE('_NEWSFLASH_BOX', 'Краткие новости!');
DEFINE('_MAINMENU_BOX', 'Главное меню');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE', 'Меню пользователя');
DEFINE('_HI', 'Здравствуйте, ');
DEFINE('_HI_AUTH', 'Добр<script type="text/javascript">
<!--
date = new Date();
date = date.getHours();
if (date >= 0 && date < 6) {document.write("ой ночи")}
	else {if (date >= 6 && date < 12) {document.write("ое утро")}
		else {if (date >= 12 && date < 18) {document.write("ый день")}
			else {document.write("ый вечер")}
		}
	}
//-->
</script><noscript>о пожаловать</noscript>, ');

/** user.php */
DEFINE('_SAVE_ERR', 'Пожалуйста, заполните все поля.');
DEFINE('_THANK_SUB', 'Спасибо за Ваш материал. Он будет просмотрен администратором перед размещением на сайте.');
DEFINE('_THANK_SUB_PUB', 'Спасибо за Ваш материал!');
DEFINE('_UP_SIZE', 'Вы не можете загружать файлы размером больше чем 15Кб.');
DEFINE('_UP_EXISTS', 'Изображение с именем $userfile_name уже существует. Пожалуйста, измените название файла и попробуйте ещё раз.');
DEFINE('_UP_COPY_FAIL', 'Ошибка при копировании!');
DEFINE('_UP_TYPE_WARN', 'Вы можете загружать изображения только в формате .gif или .jpg.');
DEFINE('_MAIL_SUB', 'Новый материал от пользователя');
DEFINE('_MAIL_MSG', 'Здравствуйте $adminName,\n\nПользователь $author предлагает новый материал в раздел $type с названием $title' .
		' для сайта $mosConfig_live_site.\n\n\n' .
		'Пожалуйста, зайдите в панель администратора по адресу $mosConfig_live_site/administrator для просмотра и добавления его в $type.\n\n' .
		'На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления\n');
DEFINE('_PASS_VERR1', 'Если Вы желаете изменить пароль, пожалуйста, введите его ещё раз для подтверждения изменения.');
DEFINE('_PASS_VERR2', 'Если Вы решили изменить пароль, пожалуйста, обратите внимание, что пароль и его подтверждение должны совпадать.');
DEFINE('_UNAME_INUSE', 'Выбранное имя пользователя уже используется.');
DEFINE('_UPDATE', 'Обновить');
DEFINE('_USER_DETAILS_SAVE', 'Ваши данные сохранены.');
DEFINE('_USER_LOGIN', 'Вход пользователя');
DEFINE('_USER_ANSWER', 'Получен ответ:');
DEFINE('_USER_OK', 'Всё ОК!');
DEFINE('_USER_TAB_ADDITIONAL', 'Дополнительно');

/** components/com_user */
DEFINE('_EDIT_TITLE', 'Личные данные');
DEFINE('_YOUR_NAME', 'Полное имя');
DEFINE('_EMAIL', 'Адрес e-mail');
DEFINE('_UNAME', 'Имя пользователя (логин)');
DEFINE('_PASS', 'Пароль');
DEFINE('_NEW_AVATAR_UPLOAD', 'Загрузить свой аватар');
DEFINE('_AVATAR_UPLOAD', 'Загрузить аватар');
DEFINE('_AVATAR_DELETE', 'Удалить аватар');
DEFINE('_AVATAR_DELETING', 'Удаление аватара: ');
DEFINE('_VPASS', 'Подтверждение пароля');
DEFINE('_PASS_PH', 'Введите новый пароль');
DEFINE('_VPASS_PH', 'Повторите новый пароль');
DEFINE('_SUBMIT_SUCCESS', 'Ваша информация принята!');
DEFINE('_SUBMIT_SUCCESS_DESC', 'Ваша информация успешно отправлена администратору. После просмотра, Ваш материал будет опубликован на этом сайте');
DEFINE('_WELCOME', 'Добро пожаловать!');
DEFINE('_WELCOME_DESC', 'Добро пожаловать в раздел пользователя нашего сайта');
DEFINE('_CONF_CHECKED_IN', 'Все &laquo;заблокированные&raquo; Вами элементы теперь &laquo;разблокированы&raquo;.');
DEFINE('_CHECK_TABLE', 'Проверка таблицы');
DEFINE('_CHECKED_IN', 'Проверено ');
DEFINE('_CHECKED_IN_ITEMS', ''); /* статей - вынес до возможности настройки склонения слова */
DEFINE('_PASS_MATCH', 'Пароли не совпадают');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME', 'Вы должны ввести имя клиента.');
DEFINE('_BNR_CONTACT', 'Вы должны выбрать контакт для клиента.');
DEFINE('_BNR_VALID_EMAIL', 'Адрес электронной почты клиента должен быть правильным.');
DEFINE('_BNR_CLIENT', 'Вы должны выбрать клиента,');
DEFINE('_BNR_NAME', 'Введите имя баннера.');
DEFINE('_BNR_IMAGE', 'Выберите изображения баннера.');
DEFINE('_BNR_URL', 'Вы должны ввести URL/Код баннера.');
DEFINE('_BNR_ENTER_ERROR', 'Ошибка доступа');
DEFINE('_BNR_NOT_ENTER', 'Доступ не возможен');

/** components/com_login */
DEFINE('_ALREADY_LOGIN', 'Вы уже авторизированы!');
DEFINE('_LOGOUT', 'Нажмите здесь для завершения работы');
DEFINE('_LOGIN_TEXT', 'Используйте поля &laquo;Пользователь&raquo; и &laquo;Пароль&raquo; для доступа к сайту');
DEFINE('_LOGIN_SUCCESS', 'Вы успешно вошли');
DEFINE('_LOGOUT_SUCCESS', 'Вы успешно закончили работу с сайтом');
DEFINE('_LOGIN_DESCRIPTION', 'Вы должны войти на сайт как пользователь, для доступа к закрытым разделам');
DEFINE('_LOGOUT_DESCRIPTION', 'Вы действительно хотите покинуть профиль?');

/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE', 'Ссылки');
DEFINE('_WEBLINKS_DESC', 'В данном разделе собраны наиболее интересные и полезные ссылки в сети.<br />Выберите из списка один из разделов, а затем выберите нужную ссылку.');
DEFINE('_HEADER_TITLE_WEBLINKS', 'Ссылка');
DEFINE('_SECTION', 'Раздел');
DEFINE('_SUBMIT_LINK', 'Добавить ссылку');
DEFINE('_URL', 'URL:');
DEFINE('_URL_DESC', 'Описание:');
DEFINE('_NAME', 'Название:');
DEFINE('_WEBLINK_EXIST', 'Ссылка с таким именем уже существует. Измените имя и попробуйте ещё раз.');
DEFINE('_WEBLINK_TITLE', 'Ссылка должна иметь название.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME', 'Название источника');
DEFINE('_FEED_ARTICLES', 'Статей');
DEFINE('_FEED_LINK', 'Ссылка источника');

/** modules/mod_whosonline.php */
DEFINE('_WE_HAVE', 'Сейчас на сайте находятся<br />');
DEFINE('_REGISTERED_ONLINE', 'Зарегистрировано');
DEFINE('_NOW_ONLINE', 'Online');
DEFINE('_AND', ' и ');
DEFINE('_GUEST_COUNT', '%s гость');
DEFINE('_GUESTS_COUNT', '%s гостей');
DEFINE('_MEMBER_COUNT', '%s пользователь');
DEFINE('_MEMBERS_COUNT', '%s пользователей');
DEFINE('_ONLINE', '');
DEFINE('_NONE', 'Нет посетителей в онлайн');

/** modules/mod_banners */
DEFINE('_BANNER_ALT', 'Реклама');

/** modules/mod_downloadjoostina */
DEFINE('_DJOOSTINA_12', 'Загрузить Joostina версии 1.2.1');
DEFINE('_DJOOSTINA_13', 'Загрузить Joostina версии 1.3.0');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES', 'Нет изображений');
DEFINE('_RANDOM_IMAGE_ERROR', 'Проверьте настройки модуля mod_random_image и наличие изображений в указанном в настройках каталоге!');

/** modules/mod_ml_login */
DEFINE('_AUTH', 'Авторизация');
DEFINE('_AUTH_DEF', 'Стандартная авторизация');
DEFINE('_REM_PASS', 'Напомним');
DEFINE('_NO_REGISTRED', 'Не зарегистрированы?');
DEFINE('_AUTH_OPENID', 'Войти, используя <img src="' . $mosConfig_live_site . '/modules/mod_ml_login/openid_big.png" alt="Войти, используя OpenID" class="openidimg" title="Войти, используя OpenID" width="99" height="20" />');
DEFINE('_OPENID_PROVS', 'Провайдеры OpenID');
DEFINE('_OPENID_SUB_TEXT', 'Войти с OpenID');
DEFINE('_ENTER_YOUR_LOGIN', 'Введите Ваш Логин');
DEFINE('_ENTER_YOUR_PASSWORD', 'Введите Ваш пароль');

/** modules/mod_stats.php */
DEFINE('_STAT_DATETIME', 'Дата и время');
DEFINE('_STAT_OS', 'OS');
DEFINE('_STAT_PHP_VERSION', 'Версия PHP');
DEFINE('_STAT_MYSQL_VERSION', 'Версия MySQL');
DEFINE('_STAT_CACHE', 'Кэширование');
DEFINE('_STAT_GZIP', 'GZIP');
DEFINE('_STAT_CACHE_ENABLE', 'Разрешено');
DEFINE('_STAT_CACHE_DISABLE', 'Запрещено');
DEFINE('_STAT_MEMBERS', 'Пользователей');
DEFINE('_STAT_HITS', 'Посещений');
DEFINE('_STAT_NEWS', 'Новостей');
DEFINE('_STAT_LINKS', 'Ссылок');
DEFINE('_STAT_VISITORS', 'Посетителей');

/** /adminstrator */
DEFINE('_ADMIN_USRNAME', 'Логин');
DEFINE('_ADMIN_USRNAME_PH', 'Логин администратора');
DEFINE('_ADMIN_PASS', 'Пароль');
DEFINE('_ADMIN_PASS_PH', 'Пароль администратора');
DEFINE('_ADMIN_ENTER', 'Войти');
DEFINE('_ADMIN_ENTER_LOGIN', 'Войти в административную панель');
DEFINE('_ADMIN_GO_SITE', 'Перейти на сайт');
DEFINE('_ADMIN_EXIT', 'Выход');
DEFINE('_ADMIN_VIEW_CONTENT', 'Просмотр содержимого');
DEFINE('_DETAILS', 'Основные настройки');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME', '* Первый по списку опубликованный пункт этого меню [mainmenu] автоматически становится &laquo;Главной&raquo; страницей сайта *');
DEFINE('_MAINMENU_DEL', '* Вы не можете &laquo;удалить&raquo; это меню, поскольку оно необходимо для нормального функционирования сайта *');
DEFINE('_MENU_GROUP', '* Некоторые &laquo;Типы меню&raquo; появляются более чем в одной группе *');

/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', 'Новые данные пользователя');
DEFINE('_NEW_USER_MESSAGE', 'Здравствуйте, %s


Вы были зарегистрированы Администратором на сайте %s.

Это сообщение содержит Ваши имя пользователя и пароль, для входа на сайт %s:

Имя пользователя - %s
Пароль - %s


На это сообщение не нужно отвечать. Оно сгенерировано роботом рассылок и отправлено только для информирования.');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', 'Это сообщение с сайта \'%s\'

Сообщение:
');

// Joostina!
DEFINE('_REG_CAPTCHA', 'Введите текст с изображения<span class="red">*</span>:');
DEFINE('_REG_CAPTCHA_VAL', 'Необходимо ввести код с изображения!');
DEFINE('_REG_CAPTCHA_REF', 'Нажмите чтобы обновить изображение.');

DEFINE('_PRINT_PAGE_LINK', 'Адрес страницы на сайте');

$bad_text = array(' авле ', ' без ', ' больше ', ' был ', ' была ', ' были ', ' было ', ' быть ', ' вам ', ' вас ', ' вверх ', ' видно ', ' вот ', ' все ', ' всегда ', ' всех ', ' где ', ' говорила ', ' говорим ', ' говорит ', ' даже ', ' два ', ' для ', ' его ', ' ему ', ' если ', ' есть ', ' еще ', ' затем ', ' здесь ', ' знала ', ' знаю ', ' иду ', ' или ', ' каждый ', ' кажется ', ' казалось ', ' как ', ' какие ', ' когда ', ' которое ', ' которые ', ' кто ', ' меня ', ' мне ', ' мог ', ' могла ', ' могу ', ' мое ', ' моей ', ' может ', ' можно ', ' мои ', ' мой ', ' мол ', ' моя ', ' надо ', ' нас ', ' начал ', ' начала ', ' него ', ' нее ', ' ней ', ' немного ', ' немножко ', ' нему ', ' несколько ', ' нет ', ' никогда ', ' них ', ' ничего ', ' однако ', ' она ', ' они ', ' оно ', ' опять ', ' очень ', ' под ', ' пока ', ' после ', ' потом ', ' почти ', ' при ', ' про ', ' раз ', ' своей ', ' свой ', ' свою ', ' себе ', ' себя ', ' сейчас ', ' сказал ', ' сказала ', ' слегка ', ' слишком ', ' словно ', ' снова ', ' стал ', ' стала ', ' стали ', ' так ', ' там ', ' твои ', ' твоя ', ' тебе ', ' тебя ', ' теперь ', ' тогда ', ' того ', ' тоже ', ' только ', ' три ', ' тут ', ' уже ', ' хотя ', ' чем ', ' через ', ' что ', ' чтобы ', ' чуть ', ' эта ', ' эти ', ' этих ', ' это ', ' этого ', ' этой ', ' этом ', ' эту ');

/* administrator components com_admin */
DEFINE('_FILE_UPLOAD', 'Загрузка файла');
DEFINE('_MAX_SIZE', 'Максимальный размер');
DEFINE('_ABOUT_JOOSTINA', 'О Joostina');
DEFINE('_CHANGESLOG', 'Changeslog');
DEFINE('_ABOUT_SYSTEM', 'О системе');
DEFINE('_SYSTEM_OS', 'Система');
DEFINE('_DB_VERSION', 'Версия базы данных');
DEFINE('_PHP_VERSION', 'Версия PHP');
DEFINE('_APACHE_VERSION', 'Веб-сервер');
DEFINE('_PHP_APACHE_INTERFACE', 'Интерфейс между веб-сервером и PHP');
DEFINE('_JOOSTINA_VERSION', 'Версия Joostina!');
DEFINE('_BROWSER', 'Браузер (User Agent)');
DEFINE('_PHP_SETTINGS', 'Важные настройки PHP');
DEFINE('_RG_EMULATION', 'Эмуляция Register Globals');
DEFINE('_REGISTER_GLOBALS', 'Register Globals - регистрация глобальных переменных');
DEFINE('_MAGIC_QUOTES', 'Параметр Magic Quotes');
DEFINE('_SAFE_MODE', 'Безопасный режим - Safe Mode');
DEFINE('_SESSION_HANDLING', 'Обработка сессий');
DEFINE('_SESS_SAVE_PATH', 'Каталог хранения сессий - Session save path');
DEFINE('_PHP_TAGS', 'Спецтеги php');
DEFINE('_BUFFERING', 'Буферизация');
DEFINE('_OPEN_BASEDIR', 'Разрешенные/Открытые каталоги');
DEFINE('_ERROR_REPORTING', 'Отображение ошибок');
DEFINE('_XML_SUPPORT', 'Поддержка XML');
DEFINE('_ZLIB_SUPPORT', 'Поддержка Zlib');
DEFINE('_DISABLED_FUNCTIONS', 'Запрещенные функции');
DEFINE('_CONFIGURATION_FILE', 'Файл конфигурации');
DEFINE('_ACCESS_RIGHTS', 'Права доступа');
DEFINE('_DIRS_WITH_RIGHTS', 'Для работы <strong>ВСЕХ</strong> функций и возможностей Joostina, <strong>ВСЕ</strong> указанные ниже каталоги должны быть доступны для записи!');
DEFINE('_CACHE_DIRECTORY', 'Каталог кэша');
DEFINE('_SESSION_DIRECTORY', 'Каталог сессий');
DEFINE('_DATABASE', 'База данных');
DEFINE('_TABLE_NAME', 'Название таблицы');
DEFINE('_DB_CHARSET', 'Кодировка');
DEFINE('_DB_NUM_RECORDS', 'Записей');
DEFINE('_DB_SIZE', 'Размер');
DEFINE('_FIND', 'Найти');
DEFINE('_CLEAR', 'Очистить');
DEFINE('_GLOSSARY', 'Глоссарий');
DEFINE('_DEVELOPERS', 'Разработчики');
DEFINE('_SUPPORT', 'Поддержка');
DEFINE('_LICENSE', 'Лицензия');
DEFINE('_CHANGELOG', 'Журнал изменений');
DEFINE('_CHECK_VERSION', 'Проверить версию Joostina!');
DEFINE('_PREVIEW_SITE', 'Предпросмотр сайта');
DEFINE('_PREV_A_SITE', 'Предпросмотр');
DEFINE('_IN_NEW_WINDOW', 'Открыть в новом окне');

/* administrator components com_banners */
DEFINE('_BANNERS_MANAGEMENT', 'Управление баннерами');
DEFINE('_EDIT_BANNER', 'Редактирование баннера');
DEFINE('_NEW_BANNER', 'Создание баннера');
DEFINE('_IN_CURRENT_WINDOW', 'Том же окне');
DEFINE('_IN_PARENT_WINDOW', 'Текущем окне');
DEFINE('_IN_MAIN_FRAME', 'Главном фрейме');
DEFINE('_BANNER_CLIENTS', 'Клиенты баннеров');
DEFINE('_BANNER_CATEGORIES', 'Категории баннеров');
DEFINE('_NO_BANNERS', 'Банеры не обнаружены');
DEFINE('_BANNER_COUNTER_RESETTED', 'Счётчик показа баннеров обнулён');
DEFINE('_CHECK_PUBLISH_DATE', 'Проверьте правильность ввода даты публикации');
DEFINE('_CHECK_START_PUBLICATION_DATE', 'Проверьте дату начала публикации');
DEFINE('_CHECK_END_PUBLICATION_DATE', 'Проверьте дату окончания публикации');
DEFINE('_TASK_UPLOAD', 'Загрузить');
DEFINE('_BANNERS_PANEL', 'Панель баннеров');
DEFINE('_BANNERS_DIRECTORY_DOESNOT_EXISTS', 'Папка banners не существует');
DEFINE('_CHOOSE_BANNER_IMAGE', 'Выберите изображение для загрузки');
DEFINE('_BAD_FILENAME', 'Файл должен содержать алфавитно-числовые символы без пробелов!');
DEFINE('_FILE_ALREADY_EXISTS', 'Файл #FILENAME# уже существует в базе данных!');
DEFINE('_BANNER_UPLOAD_ERROR', 'Загрузка #FILENAME# неудачна!');
DEFINE('_BANNER_UPLOAD_SUCCESS', 'Загрузка #FILENAME# в #DIRNAME# успешно завешена!');
DEFINE('_UPLOAD_BANNER_FILE', 'Загрузить файл баннера');

/* administrator components com_categories */
DEFINE('_CATEGORY_CHANGES_SAVED', 'Изменения в категории сохранены');
DEFINE('_USER_GROUP_ALL', 'Общий');
DEFINE('_USER_GROUP_REGISTERED', 'Участники');
DEFINE('_USER_GROUP_SPECIAL', 'Специальный');
DEFINE('_CONTENT_CATEGORIES', 'Категории содержимого');
DEFINE('_ALL_CONTENT', 'Всё содержимое');
DEFINE('_ACTIVE', 'Активных');
DEFINE('_IN_TRASH', 'В корзине');
DEFINE('_VIEW_CATEGORY_CONTENT', 'Просмотр содержимого категории');
DEFINE('_CHOOSE_MENU_PLEASE', 'Пожалуйста, выберите меню');
DEFINE('_CHOOSE_MENUTYPE_PLEASE', 'Пожалуйста, выберите тип меню');
DEFINE('_ENTER_MENUITEM_NAME', 'Пожалуйста, введите название для этого пункта меню');
DEFINE('_CATEGORY_NAME_IS_BLANK', 'Категория должна иметь название');
DEFINE('_ENTER_CATEGORY_NAME', 'Введите имя категории');
DEFINE('_ENTER_CATEGORY_TITLE', 'Введите заголовок категории');
DEFINE('_CATEGORY_ALREADY_EXISTS', 'Категория с таким названием уже существует. Повторите снова');
DEFINE('_EDIT_CATEGORY', 'Редактирование');
DEFINE('_NEW_CATEGORY', 'Новая');
DEFINE('_CATEGORY_PROPERTIES', 'Свойства категории');
DEFINE('_CATEGORY_TITLE', 'Заголовок категории (Title)');
DEFINE('_CATEGORY_NAME', 'Название категории (Name)');
DEFINE('_SORT_ORDER', 'Порядок расположения');
DEFINE('_IMAGE', 'Изображение');
DEFINE('_IMAGE_POSTITION', 'Расположение изображения');
DEFINE('_MENUITEM', 'Пункт меню');
DEFINE('_NEW_MENUITEM_IN_YOUR_MENU', 'Создание нового пункта в выбранном вами меню.');
DEFINE('_MENU_NAME', 'Название пункта меню');
DEFINE('_CREATE_MENU_ITEM', 'Создать пункт меню');
DEFINE('_EXISTED_MENU_ITEMS', 'Существующие ссылки меню');
DEFINE('_NOT_EXISTS', 'Отсутствуют');
DEFINE('_MENU_LINK_AVAILABLE_AFTER_SAVE', 'Связь с меню будет доступна после сохранения');
DEFINE('_IMAGES_DIRS', 'Каталоги изображений (mosimage)');
DEFINE('_MOVE_CATEGORIES', 'Перемещение категорий');
DEFINE('_CHOOSE_CATEGORY_SECTION', 'Пожалуйста, выберите раздел для перемещаемой категории');
DEFINE('_MOVE_INTO_SECTION', 'Переместить в раздел');
DEFINE('_CATEGORIES_TO_MOVE', 'Перемещаемые категории');
DEFINE('_CONTENT_ITEMS_TO_MOVE', 'Перемещаемые объекты содержимого');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', 'В выбранный раздел будут перемещены все<br />перечисленные категории и всё<br />перечисленное содержимое этих категорий.');
DEFINE('_CATEGORY_COPYING', 'Копирование категорий');
DEFINE('_CHOOSE_CAT_SECTION_TO_COPY', 'Пожалуйста, выберите раздел для копируемой категории');
DEFINE('_COPY_TO_SECTION', 'Копировать в раздел');
DEFINE('_CATS_TO_COPY', 'Копируемые категории');
DEFINE('_CONTENT_ITEMS_TO_COPY', 'Копируемое содержимое категории');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', 'В выбранный раздел будут скопированы все<br />перечисленные категории и всё<br />перечисленное содержимое этих категорий.');
DEFINE('_COMPONENT', 'Компонент');
DEFINE('_BEFORE_CREATION_CAT_CREATE_SECTION', 'Перед созданием категории Вы должны создать хотя бы один раздел!');
DEFINE('_CATEGORY_IS_EDITING_NOW', 'Категория #CATNAME# в настоящее время редактируется другим администратором');
DEFINE('_TABLE_WEBLINKS_CATEGORY', 'Таблица - Веб-ссылки категории');
DEFINE('_TABLE_NEWSFEEDS_CATEGORY', 'Таблица - Ленты новостей категории');
DEFINE('_TABLE_CATEGORY_CONTACTS', 'Таблица - Контакты категории');
DEFINE('_TABLE_CATEGORY_CONTENT', 'Таблица - Содержимое категории');
DEFINE('_BLOG_CATEGORY_CONTENT', 'Блог - Содержимое категории');
DEFINE('_BLOG_CATEGORY_ARCHIVE', 'Блог - Архивное содержимое категории');
DEFINE('_USE_SECTION_SETTINGS', 'Использовать настройки раздела');
DEFINE('_CMN_ALL', 'Все');
DEFINE('_CHOOSE_CATEGORY_TO_REMOVE', 'Выберите категорию для удаления');
DEFINE('_CANNOT_REMOVE_CATEGORY', 'Категория: #CIDS# не может быть удалена, т.к. она содержит записи');
DEFINE('_CHOOSE_CATEGORY_FOR_', 'Выберите категорию для');
DEFINE('_CHOOSE_OBJECT_TO_MOVE', 'Выберите объект для перемещения');
DEFINE('_CATEGORIES_MOVED_TO', 'Категории перемещены в ');
DEFINE('_CATEGORY_MOVED_TO', 'Категории перемещены в ');
DEFINE('_CATEGORIES_COPIED_TO', 'Категории скопированы в ');
DEFINE('_CATEGORY_COPIED_TO', 'Категория скопирована в ');
DEFINE('_NEW_ORDER_SAVED', 'Новый порядок сохранен');
DEFINE('_SAVE_AND_ADD', 'Сохранить и добавить');
DEFINE('_CLOSE', 'Закрыть');
DEFINE('_CREATE_CONTENT', 'Создать содержимое');
DEFINE('_MOVE', 'Перенести');
DEFINE('_COPY', 'Копировать');

/* administrator components com_checkin */
DEFINE('_BLOCKED_OBJECTS', 'Заблокированные объекты');
DEFINE('_OBJECT', 'Объект');
DEFINE('_WHO_BLOCK', 'Заблокировал');
DEFINE('_BLOCK_TIME', 'Время блокировки');
DEFINE('_ACTION', 'Действие');
DEFINE('_GLOBAL_CHECKIN', 'Глобальная разблокировка');
DEFINE('_TABLE_IN_DB', 'Таблица базы данных');
DEFINE('_OBJECT_COUNT', 'Кол-во объектов');
DEFINE('_UNBLOCKED', 'Разблокировано');
DEFINE('_CHECHKED_TABLE', 'Проверена таблица');
DEFINE('_ALL_BLOCKED_IS_UNBLOCKED', 'Все заблокированные объекты разблокированы');
DEFINE('_MINUTES', 'минут');
DEFINE('_HOURS', 'часов');
DEFINE('_DAYS', 'дней');
DEFINE('_ERROR_WHEN_UNBLOCKING', 'При разблокировании произошла ошибка');
DEFINE('_UNBLOCKED2', 'разблокирован');

/* administrator components com_config */
DEFINE('_CONFIGURATION_IS_UPDATED', 'Конфигурация успешно обновлена');
DEFINE('_CANNOT_OPEN_CONF_FILE', 'Ошибка! Невозможно открыть для записи файл конфигурации!');
DEFINE('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', 'Вы действительно хотите изменить &laquo;Метод аутентификации сессии&raquo;?\n\nЭто действие удалит все существующие сессии фронтенда.\n\n');
DEFINE('_GLOBAL_CONFIG', 'Глобальная конфигурация');
DEFINE('_PROTECT_AFTER_SAVE', 'Защитить от записи после сохранения');
DEFINE('_IGNORE_PROTECTION_WHEN_SAVE', 'Игнорировать защиту от записи при сохранении');
DEFINE('_CONFIG_SAVING', 'Сохранение конфигурации');
DEFINE('_NOT_AVAILABLE_CHECK_RIGHTS', 'не доступно');
DEFINE('_AVAILABLE_CHECK_RIGHTS', 'доступно');
DEFINE('_SITE_NAME', 'Название сайта');
DEFINE('_SITE_LANGUAGE', 'Язык сайта');
DEFINE('_SITE_OFFLINE', 'Сайт выключен');
DEFINE('_SITE_OFFLINE_MESSAGE', 'Сообщение при выключенном сайте');
DEFINE('_SITE_OFFLINE_MESSAGE2', 'Сообщение, которое выводится пользователям вместо сайта, когда он находится в выключенном состоянии.');
DEFINE('_SYSTEM_ERROR_MESSAGE', 'Сообщение при системной ошибке');
DEFINE('_SYSTEM_ERROR_MESSAGE2', 'Сообщение, которое выводится пользователям вместо сайта, когда Joostina! не может подключиться к базе данных MySQL.');
DEFINE('_SHOW_READMORE_TO_AUTH', 'Показывать &laquo;Подробнее…&raquo; неавторизованным');
DEFINE('_SHOW_READMORE_TO_AUTH2', 'Если &laquo;Да&raquo;, то неавторизованным пользователям будут показываться ссылки на содержимое с уровнем доступа &laquo;Для зарегистрированных&raquo;. Для возможности полного просмотра пользователь должен будет авторизоваться.');
DEFINE('_ENABLE_USER_REGISTRATION', 'Разрешить регистрацию пользователей');
DEFINE('_ENABLE_USER_REGISTRATION2', 'Если &laquo;Да&raquo;, то пользователям будет разрешено регистрироваться на сайте.');
DEFINE('_ACCOUNT_ACTIVATION', 'Использовать активацию нового аккаунта');
DEFINE('_ACCOUNT_ACTIVATION2', 'Если &laquo;Да&raquo;, то пользователю необходимо будет активировать новый аккаунт, после получения им письма со ссылкой для активации.');
DEFINE('_UNIQUE_EMAIL', 'Требовать уникальный E-mail');
DEFINE('_UNIQUE_EMAIL2', 'Если &laquo;Да&raquo;, то пользователи не смогут создавать несколько аккаунтов с одинаковым адресом e-mail.');
DEFINE('_USER_PARAMS', 'Параметры пользователя сайта');
DEFINE('_USER_PARAMS2', 'Если &laquo;Нет&raquo;, то будет отключена возможность установки пользователем параметров сайта (выбор редактора)');
DEFINE('_DEFAULT_EDITOR', 'WYSIWYG-редактор по умолчанию');
DEFINE('_LIST_LIMIT', 'Длина списков (кол-во строк)');
DEFINE('_LIST_LIMIT2', 'Устанавливает длину списков по умолчанию в панели управления для всех пользователей');
DEFINE('_FRONTPAGE', 'Фронт');
DEFINE('_SITE', 'Сайт');
DEFINE('_CUSTOM_PRINT', 'Страница печати из каталога шаблона');
DEFINE('_CUSTOM_PRINT2', 'Использование произвольной страницы для печатного вида из каталога текущего шаблона');
DEFINE('_MODULES_MULTI_LANG', 'Разрешить многоязычность модулей');
DEFINE('_MODULES_MULTI_LANG2', 'Позволить системе проверять языковые файлы модулей, если у вас таких не имеется - рекомендуется установить &laquo;Нет&raquo;');
DEFINE('_DATE_FORMAT_TXT', 'Формат даты');
DEFINE('_DATE_FORMAT2', 'Выберите формат для отображения даты. Необходимо использовать формат в соответствии с правилами strftime.');
DEFINE('_DATE_FORMAT_FULL', 'Полный формат даты и времени');
DEFINE('_DATE_FORMAT_FULL2', 'Выберите полный формат для отображения даты и времени. Необходимо использовать формат в соответствии с правилами strftime.');
DEFINE('_USE_H1_FOR_HEADERS', 'Обрамлять заголовки содержимого тегом H1 при полном просмотре');
DEFINE('_USE_H1_FOR_HEADERS2', 'Обрамлять заголовки тегом h1 только в режиме полного просмотра содержимого ( при нажатии на Подробнее… ).');
DEFINE('_USE_H1_HEADERS_ALWAYS', 'Обрамлять все заголовки содержимого тегом H1');
DEFINE('_USE_H1_HEADERS_ALWAYS2', 'Помещать заголовки материала в теги h1.');
DEFINE('_DISABLE_RSS', 'Отключить генерацию RSS (syndicate)');
DEFINE('_DISABLE_RSS2', 'Если &laquo;Да&raquo;, то будет отключена возможность генерации RSS лент и работа с ними');
DEFINE('_USE_TEMPLATE', 'Использовать шаблон');
DEFINE('_USE_TEMPLATE2', 'При выборе шаблона он будет использован на всем сайте независимо от привязок к пунктам меню других шаблонов. Для использования нескольких шаблонов выберите &laquo;Разные&raquo;');
DEFINE('_FAVICON_IMAGE', 'Значок сайта в &laquo;Закладках&raquo; браузера (Нормальные браузеры)');
DEFINE('_FAVICON_IMAGE_IE', 'Значок сайта в &laquo;Закладках&raquo; браузера (IE)');
DEFINE('_FAVICON_IMAGE_IPAD', 'Значок сайта в &laquo;Закладках&raquo; браузера (iPad)');
DEFINE('_FAVICON_IMAGE2', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (Нормальные браузеры). Если не указано или файл значка не найден, по умолчанию будет использоваться файл favicon.png.');
DEFINE('_FAVICON_IMAGE2_IE', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (IE). Если не указано или файл значка не найден, по умолчанию будет использоваться файл favicon.ico.');
DEFINE('_FAVICON_IMAGE2_IPAD', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (iPad). Если не указано или файл значка не найден, по умолчанию будет использоваться файл apple-touch-icon.png.');
DEFINE('_FAVICON_IMAGE3', 'Значок сайта в &laquo;Закладках&raquo; (Нормальные браузеры)');
DEFINE('_FAVICON_IMAGE3_IE', 'Значок сайта в &laquo;Закладках&raquo; (IE)');
DEFINE('_FAVICON_IMAGE3_IPAD', 'Значок сайта в &laquo;Закладках&raquo; (iPad)');
DEFINE('_DISABLE_FAVICON', 'Отключить favicon (Нормальные браузеры)');
DEFINE('_DISABLE_FAVICON_IE', 'Отключить favicon (IE)');
DEFINE('_DISABLE_FAVICON_IPAD', 'Отключить favicon (iPad)');
DEFINE('_DISABLE_FAVICON2', 'Использовать в качестве значка сайта favicon (Нормальные браузеры)');
DEFINE('_DISABLE_FAVICON2_IE', 'Использовать в качестве значка сайта favicon (IE)');
DEFINE('_DISABLE_FAVICON2_IPAD', 'Использовать в качестве значка сайта favicon (iPad)');
DEFINE('_DISABLE_SYSTEM_MAMBOTS', 'Отключить мамботы группы system');
DEFINE('_DISABLE_SYSTEM_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование системных мамботов будет прекращено. ВНИМАНИЕ, если на сайте используются мамботы этой группы, то активация параметра не рекомендуется');
DEFINE('_DISABLE_CONTENT_MAMBOTS', 'Отключить мамботы группы content');
DEFINE('_DISABLE_CONTENT_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование мамботов обработки контента будет прекращено. ВНИМАНИЕ, если на сайте используются мамботы этой группы, то активация параметра не рекомендуется');
DEFINE('_DISABLE_MAINBODY_MAMBOTS', 'Отключить мамботы группы mainbody');
DEFINE('_DISABLE_MAINBODY_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование мамботов обработки стека компонентов (mainbody) будет прекращено.');
DEFINE('_SITE_AUTH', 'Авторизация на сайте');
DEFINE('_SITE_AUTH2', 'Если &laquo;Нет&raquo;, то страница авторизации на сайте будет отключена, если с ней не связан пункт меню. Также будет отключена возможность регистрации на сайте');
DEFINE('_FRONT_SESSION_TIME', 'Время существования сессии на фронте');
DEFINE('_FRONT_SESSION_TIME2', 'Время автоотключения пользователя сайта при неактивности. Большое значение этого параметра снижает безопасность.');
DEFINE('_DISABLE_FRONT_SESSIONS', 'Отключить сессии на фронте');
DEFINE('_DISABLE_FRONT_SESSIONS2', 'Если &laquo;Да&raquo;, то будет отключено ведение сессий для каждого пользователя на сайте. Если подсчет числа пользователей не нужен и регистрация отключена - можно выключить.');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT', 'Отключить контроль доступа к содержимому');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT2', 'Если &laquo;Да&raquo;, то контроль доступа к содержимому осуществляться не будет, и всем пользователям будет отображено всё содержимое. Рекомендуется совместно с пунктами отключения авторизации и сессий на фронте.');
DEFINE('_COUNT_CONTENT_HITS', 'Считать число прочтений содержимого');
DEFINE('_COUNT_CONTENT_HITS2', 'При выключении параметра статистика прочтений содержимого будет не активна.');
DEFINE('_DISABLE_CHECK_CONTENT_DATE', 'Отключить проверки публикации по датам');
DEFINE('_DISABLE_CHECK_CONTENT_DATE2', 'Если на сайте не критичны временные промежутки публикации содержимого - то данный параметр лучше активизировать.');
DEFINE('_DISABLE_MODULES_WHEN_EDIT', 'Отключать модули в редактировании');
DEFINE('_DISABLE_MODULES_WHEN_EDIT2', 'Если &laquo;Да&raquo;, то на странице редактирования содержимого с фронта будут отключены все модули');
DEFINE('_COUNT_GENERATION_TIME', 'Рассчитывать время генерации страницы');
DEFINE('_COUNT_GENERATION_TIME2', 'Если &laquo;Да&raquo;, то на каждой странице будет отображено время на её генерацию');
DEFINE('_ENABLE_GZIP', 'GZIP-сжатие страниц');
DEFINE('_ENABLE_GZIP2', 'Поддержка сжатия страниц перед отправкой (если поддерживается). Включение этой функции уменьшает размер загружаемых страниц и приводит к уменьшению трафика. В то же время, это увеличивает нагрузку на сервер.');
DEFINE('_IS_SITE_DEBUG', 'Режим отладки сайта');
DEFINE('_IS_SITE_DEBUG2', 'Если &laquo;Да&raquo;, то будет показываться диагностическая информация, запросы и ошибки MySQL…');
DEFINE('_EXTENDED_DEBUG', 'Расширенный отладчик');
DEFINE('_EXTENDED_DEBUG2', 'Использовать на фронте сайта расширенный отладчик выводящий множество информации о сайте.');
DEFINE('_CONTROL_PANEL', 'Панель управления');
DEFINE('_DISABLE_ADMIN_SESS_DEL', 'Отключить удаление сессий в панели управления');
DEFINE('_DISABLE_ADMIN_SESS_DEL2', 'Не удалять сессии даже после истечения времени существования.');
DEFINE('_DISABLE_HELP_BUTTON', 'Отключить кнопку &laquo;Помощь&raquo;');
DEFINE('_DISABLE_HELP_BUTTON2', 'Позволяет запретить к показу кнопку помощи тулбара панели управления.');
DEFINE('_USE_OLD_TOOLBAR', 'Использовать старое отображение туллбара');
DEFINE('_USE_OLD_TOOLBAR2', 'При активировании параметра вывод кнопок туллбара будет произведён в режиме таблиц, как было в Joomla.');
DEFINE('_DISABLE_IMAGES_TAB', 'Отключить вкладку &laquo;Изображения&raquo;');
DEFINE('_DISABLE_IMAGES_TAB2', 'Позволяет запретить к показу при редактировании содержимого вкладку &laquo;Изображения&raquo;.');
DEFINE('_ADMIN_SESS_TIME', 'Время существования сессии в панели управления');
DEFINE('_SECONDS', 'секунд');
DEFINE('_ADMIN_SESS_TIME2', 'Время, по истечении которого будут отключены пользователи <strong>админцентра</strong> при неактивности. Слишком большое значение уменьшает защищенность сайта!');
DEFINE('_SAVE_LAST_PAGE', 'Запоминать страницу Админцентра при окончании сессии');
DEFINE('_SAVE_LAST_PAGE2', 'Если сессия работы в панели управления закончилась, и Вы заходите на сайт в течение 10 минут, то при входе вы будете перенаправлены на страницу, с которой произошло отключение');
DEFINE('_HTML_CSS_EDITOR', 'Визуальный редактор для html и css');
DEFINE('_HTML_CSS_EDITOR2', 'Использовать редактор с подсветкой синтаксиса для редактирования html и css файлов шаблона');
DEFINE('_THIS_PARAMS_CONTROL_CONTENT', '<span class="green">* Эти параметры контролируют вывод элементов содержимого. *</span>');
DEFINE('_LINK_TITLES', 'Заголовки в виде ссылок');
DEFINE('_LINK_TITLES2', 'Если &laquo;Да&raquo;, заголовки объектов содержимого начинают работать как гиперссылки на эти объекты');
DEFINE('_READMORE_LINK', 'Ссылка &laquo;Подробнее…&raquo;');
DEFINE('_READMORE_LINK2', 'Если выбран параметр &laquo;Показать&raquo;, то будет показываться ссылка &laquo;Подробнее…&raquo; для просмотра полного содержимого');
DEFINE('_VOTING_ENABLE', 'Рейтинг/Голосование');
DEFINE('_VOTING_ENABLE2', 'Если выбран параметр &laquo;Показать&raquo;, система &laquo;Рейтинг/Голосование&raquo; будет включена');
DEFINE('_AUTHOR_NAMES', 'Имена авторов');
DEFINE('_AUTHOR_NAMES2', 'Выберите, показывать ли имена авторов. Это глобальная установка, но она может быть изменена в других местах на уровне меню или объекта.');
DEFINE('_DATE_TIME_CREATION', 'Дата и время создания');
DEFINE('_DATE_TIME_CREATION2', 'Если &laquo;Показать&raquo;, то показывается дата и время создания статьи. Это глобальная установка, но может быть изменена в других местах на уровне меню или объекта.');
DEFINE('_DATE_TIME_MODIFICATION', 'Дата и время изменения');
DEFINE('_DATE_TIME_MODIFICATION2', 'Если установлено &laquo;Показать&raquo;, то будет показываться дата изменения статьи. Это глобальная установка, но она может быть изменена в других местах.');
DEFINE('_VIEW_COUNT', 'Кол-во просмотров');
DEFINE('_VIEW_COUNT2', 'Если установлено &laquo;Показать&raquo;, то показывается количество просмотров объекта посетителями сайта. Эта глобальная установка может быть изменена в других местах панели управления.');
DEFINE('_LINK_PRINT', 'Ссылка &laquo;Печать&raquo;');
DEFINE('_LINK_PDF', 'Ссылка &laquo;PDF&raquo;');
DEFINE('_LINK_EMAIL', 'Ссылка &laquo;E-mail&raquo;');
DEFINE('_PRINT_EMAIL_ICONS', 'Значки &laquo;Печать&raquo;, &laquo;E-mail&raquo; и &laquo;PDF&raquo;');
DEFINE('_PRINT_EMAIL_ICONS2', 'Если выбрано &laquo;Показать&raquo;, то ссылки &laquo;Печать&raquo;, &laquo;E-mail&raquo; и &laquo;PDF&raquo; будут отображаться в виде значков, иначе - простым текстом-ссылкой.');
DEFINE('_PRINT_PDF_ICON', 'Параметр недоступен, когда каталог /media защищен от записи.');
DEFINE('_ENABLE_TOC', 'Оглавление для многостраничных объектов');
DEFINE('_BACK_BUTTON', 'Кнопка &laquo;Назад&raquo; (&laquo;Вернуться&raquo;)');
DEFINE('_CONTENT_NAV', 'Навигация по содержимому');
DEFINE('_UNIQ_ITEMS_IDS', 'Уникальные идентификаторы новостей');
DEFINE('_UNIQ_ITEMS_IDS2', 'При включении параметра для каждой новости в списке будет задаваться уникальный идентификатор стиля.');
DEFINE('_AUTO_PUBLICATION_FRONT', 'Автоматическая публикация на главной');
DEFINE('_AUTO_PUBLICATION_FRONT2', 'При включении параметра всё создаваемое содержимое будет автоматически помечено для публикации на главной странице.');
DEFINE('_DISABLE_BLOCK', 'Отключить блокировки содержимого');
DEFINE('_DISABLE_BLOCK2', 'При включении параметра блокировки объектов содержимого не будут проверяться. Не рекомендуется использовать на сайтах с большим числом редакторов.');
DEFINE('_ITEMID_COMPAT', 'Режим работы Itemid');
DEFINE('_ONE_EDITOR', 'Использовать единое поле редактора');
DEFINE('_ONE_EDITOR2', 'Использовать одно поле для Вводного и Основного текста.');
DEFINE('_LOCALE', 'Локаль');
DEFINE('_TIME_OFFSET', 'Часовой пояс (смещение времени относительно UTC, ч)');
DEFINE('_TIME_OFFSET2', 'Текущие дата и время, которые будут показываться на сайте:');
DEFINE('_TIME_DIFF', 'Разница со временем сервера, ч');
DEFINE('_TIME_DIFF2', 'RSS (смещение времени относительно UTC, ч)');
DEFINE('_CURR_DATE_TIME_RSS', 'Текущие дата и время, которые будут показываться в RSS');
DEFINE('_COUNTRY_LOCALE', 'Локаль страны');
DEFINE('_COUNTRY_LOCALE2', 'Определяет региональные настройки страны: отображение даты, времени, чисел и т.д.');
DEFINE('_LOCALE_WINDOWS', 'При использовании в Windows необходимо ввести <span style="color:red">RU</span>.<br />В Unix-системах, если не работает значение по умолчанию, можно попробовать изменить регистр символов локали на <span style="color:red">RU_RU.CP1251</span>, <span style="color:red">ru_RU.cp1251</span>, <span style="color:red">ru_ru.CP1251</span>, или узнать значение русской локали у провайдера.<br />Также можно попробовать ввести одну из следующих локалей: <span style="color:red">rus</span>, <span style="color:red">russian</span>');
DEFINE('_DB_HOST', 'Адрес хоста MySQL');
DEFINE('_DB_USER', 'Имя пользователя БД (MySQL)');
DEFINE('_DB_NAME', 'База данных MySQL');
DEFINE('_DB_PREFIX', 'Префикс базы данных MySQL');
DEFINE('_DB_PREFIX2', '!! НЕ ИЗМЕНЯЙТЕ, ЕСЛИ У ВАС УЖЕ ЕСТЬ РАБОЧАЯ БАЗА ДАННЫХ. В ПРОТИВНОМ СЛУЧАЕ, ВЫ МОЖЕТЕ ПОТЕРЯТЬ К НЕЙ ДОСТУП !!');
DEFINE('_EVERYDAY_OPTIMIZATION', 'Ежедневная оптимизация таблиц базы данных');
DEFINE('_EVERYDAY_OPTIMIZATION2', 'Если &laquo;Да&raquo;, то каждые сутки база данных будет автоматически оптимизирована для лучшего быстродействия');
DEFINE('_OLD_MYSQL_SUPPORT', 'Поддержка младших версий MySQL');
DEFINE('_OLD_MYSQL_SUPPORT2', 'Параметр позволяет отключить автоматический перевод работы БД в режим совместимости с кириллицей');
DEFINE('_DISABLE_SET_SQL', 'Отключить SET sql_mode');
DEFINE('_DISABLE_SET_SQL2', 'Отключить перевод режима работы базы данных SET sql_mode');
DEFINE('_SERVER', 'Сервер');
DEFINE('_ABS_PATH', 'Абсолютный путь( корень сайта )');
DEFINE('_MEDIA_ROOT', 'Корень медиа менеджера');
DEFINE('_MEDIA_ROOT2', 'Корневой каталог для работы компонента управления медиа данными. Путь от корня сайта без &frasl; по краям.');
DEFINE('_FILE_ROOT', 'Корень файлового менеджера');
DEFINE('_FILE_ROOT2', 'Корневой каталог для работы компонента управления файлами. Без &frasl; в конце. При использовании в Windows (c) путь может начинаться с названия буквы диска.');
DEFINE('_SECRET_WORD', 'Секретное слово');
DEFINE('_GZ_CSS_JS', 'Сжатие CSS и JS файлов');
DEFINE('_SESSION_TYPE', 'Метод идентификации сессии');
DEFINE('_SESSION_TYPE2', 'Не изменяйте, если не знаете, зачем это надо!<br /><br />Если сайт будет использоваться пользователями службы AOL или пользователями, использующими для доступа на сайт прокси-серверы, то можете использовать настройки 2 уровня');
DEFINE('_HELP_SERVER', 'Сервер помощи');
DEFINE('_HELP_SERVER2', 'Сервер помощи - Если поле пустое, то файлы помощи будут браться из локальной папки http://адрес_вашего_сайта/help/, Для включения сервера On-Line помощи введите http://joostina.ru, http://help.joom.ru или http://help.joomla.org');
DEFINE('_FILE_MODE', 'Создание файлов');
DEFINE('_FILE_MODE2', 'Разрешения доступа к файлам');
DEFINE('_FILE_MODE3', 'Не менять CHMOD для новых файлов (использовать умолчание сервера)');
DEFINE('_FILE_MODE4', 'Установить CHMOD для новых файлов');
DEFINE('_FILE_MODE5', 'Выберите этот пункт для установки разрешений доступа к вновь создаваемым файлам');
DEFINE('_OWNER', 'Владелец');
DEFINE('_O_READ', 'чтение');
DEFINE('_O_WRITE', 'запись');
DEFINE('_O_EXEC', 'выполнение');
DEFINE('_APPLY_TO_FILES', 'Применить к существующим файлам');
DEFINE('_APPLY_TO_FILES2', 'Изменения коснутся <em>всех существующих файлов</em> на сайте.<br /><strong>НЕПРАВИЛЬНОЕ ИСПОЛЬЗОВАНИЕ ЭТОЙ ОПЦИИ МОЖЕТ ПРИВЕСТИ К НЕРАБОТОСПОСОБНОСТИ САЙТА!</strong>');
DEFINE('_DIR_CREATION', 'Создание каталогов');
DEFINE('_DIR_CREATION2', 'Разрешения доступа к каталогам');
DEFINE('_DIR_CREATION3', 'Не менять CHMOD для новых каталогов (использовать умолчание сервера)');
DEFINE('_DIR_CREATION4', 'Установить CHMOD для новых каталогов');
DEFINE('_DIR_CREATION5', 'Выберите этот пункт для установки разрешений доступа к вновь создаваемым каталогам');
DEFINE('_O_SEARCH', 'поиск');
DEFINE('_APPLY_TO_DIRS', 'Применить к существующим каталогам');
DEFINE('_APPLY_TO_DIRS2', 'Включение этих флагов будет применено <em>ко всем существующим каталогам</em> на сайте.<br />' . '<strong>НЕПРАВИЛЬНОЕ ИСПОЛЬЗОВАНИЕ ЭТОЙ ОПЦИИ МОЖЕТ ПРИВЕСТИ К НЕРАБОТОСПОСОБНОСТИ САЙТА!</strong>');
DEFINE('_O_GROUP', 'Группа');
DEFINE('_O_AS', 'как');
DEFINE('_RG_EMULATION_TXT', 'Эмуляция Регистрации глобальных переменных');
DEFINE('_RG_DISABLE', 'Выкл. (<span class="green">РЕКОМЕНДУЕТСЯ</span>) - дополнительная защита');
DEFINE('_RG_ENABLE', 'Вкл. (<span class="red">НЕ РЕКОМЕНДУЕТСЯ</span>) - совместимость со старыми расширениями, при использовании параметра повышается угроза безопасности.');
DEFINE('_METADATA', 'Метаданные');
DEFINE('_SITE_DESC', 'Описание сайта, которое индексируется поисковиками');
DEFINE('_SITE_DESC2', ' Вы можете не ограничивать Ваше описание двадцатью словами, в зависимости от Поискового сервера, который Вы планируете использовать. Делайте описание кратким и подходящим для содержания вашего сайта. Вы можете включить некоторые из ваших ключевых слов и ключевых фраз. Так как некоторые поисковые серверы читают больше 20 слов, то Вы можете добавить одно или два предложения. Пожалуйста удостоверьтесь, что самая важная часть вашего описания находится в первых 20 словах.');
DEFINE('_SITE_KEYWORDS', 'Ключевые слова сайта');
DEFINE('_SITE_KEYWORDS2', ' Вы можете не ограничивать Ваш ключевые слова двадцатью, в зависимости от Поискового сервера, который Вы планируете использовать. Делайте ключевые слова подходящим для содержания вашего сайта.');
DEFINE('_SHOW_TITLE_TAG', 'Показывать мета-тег <strong>title</strong>');
DEFINE('_SHOW_TITLE_TAG2', 'Показывает мета-тег <strong>title</strong> при просмотре объектов содержимого');
DEFINE('_SHOW_GEO_TAG', 'Показывать <strong>Geotagging</strong>');
DEFINE('_SHOW_GEO_TAG2', 'Показывает <strong>Geotagging</strong> мета-теги при просмотре объектов содержимого');
DEFINE('_SHOW_GEO_TAG_LATITUDE', 'Широта');
DEFINE('_SHOW_GEO_TAG2_LATITUDE', 'Широта объекта. Записывается в формате <strong>50.167958</strong> (пример!). Если объект расположен в западном полушарии, то перед циврами добавляется знак минуса (-).');
DEFINE('_SHOW_GEO_TAG_LONGITUDE', 'Долгота');
DEFINE('_SHOW_GEO_TAG2_LONGITUDE', 'Долгота объекта. Записывается в формате <strong>50.167958</strong> (пример!). Если объект расположен в южном полушарии, то перед циврами добавляется знак минуса (-).');
DEFINE('_SHOW_GEO_TAG_PLACENAME', 'Месторасположение объекта');
DEFINE('_SHOW_GEO_TAG2_PLACENAME', 'Месторасположения объекта. Записывется в формате <strong>Город, Страна</strong> (пример!)');
DEFINE('_SHOW_GEO_TAG_REGION', 'Регион объекта');
DEFINE('_SHOW_GEO_TAG2_REGION', 'Регион объекта. Записывется в двубуквенном формате страны <strong>ru</strong> (пример!)');
DEFINE('_SHOW_DCORE', 'Показывать <strong>Dublin Core Metadata Element Set (DCMES)</strong>');
DEFINE('_SHOW_DCORE2', 'Показывает <strong>Dublin Core Metadata Element Set (DCMES)</strong> мета-теги при просмотре объектов содержимого');
DEFINE('_SHOW_DCORE_LANGUAGE', 'Язык');
DEFINE('_SHOW_DCORE2_LANGUAGE', 'Язык. Записывется в двубуквенном формате страны <strong>ru</strong> (пример!)');
DEFINE('_SHOW_AUTHOR_TAG', 'Показывать мета-тег <strong>author</strong>');
DEFINE('_SHOW_AUTHOR_TAG2', 'Показывает мета-тег <strong>author</strong> при просмотре объектов содержимого');
DEFINE('_SHOW_BASE_TAG', 'Показывать мета-тег <strong>base</strong>');
DEFINE('_SHOW_BASE_TAG2', 'Показывает мета-тег <strong>base</strong> в теле каждой страницы');
DEFINE('_REVISIT_TAG', 'Значение тега <strong>revisit</strong>');
DEFINE('_REVISIT_TAG2', 'Укажите значение тега <strong>revisit</strong> в днях');
DEFINE('_DISABLE_GENERATOR_TAG', 'Отключить тег Generator');
DEFINE('_DISABLE_GENERATOR_TAG2', 'Если &laquo;Да&raquo;, то из кода каждой HTML страницы будет исключен тег name=&laquo;Generator&raquo;');
DEFINE('_EXT_IND_TAGS', 'Расширенные теги индексации');
DEFINE('_EXT_IND_TAGS2', 'Если &laquo;Да&raquo;, то в код каждой страницы будут добавлены специальные теги для лучшей индексации');
DEFINE('_MAIL', 'Почта');
DEFINE('_MAIL_METHOD', 'Для отправки почты использовать');
DEFINE('_MAIL_FROM_ADR', 'Письма от (Mail From)');
DEFINE('_MAIL_FROM_NAME', 'Отправитель (From Name)');
DEFINE('_SENDMAIL_PATH', 'Путь к Sendmail');
DEFINE('_USE_SMTP', 'Использовать SMTP-авторизацию');
DEFINE('_USE_SMTP2', 'Выберите &laquo;ДА&raquo;, если для отправки почты используется smtp-сервер с необходимостью авторизации');
DEFINE('_SMTP_USER', 'Имя пользователя SMTP');
DEFINE('_SMTP_USER2', 'Заполняется, если для отправки почты используется smtp-сервер с необходимостью авторизации');
DEFINE('_SMTP_PASS', 'Пароль для доступа к SMTP');
DEFINE('_SMTP_PASS2', 'Заполняется, если для отправки почты используется smtp-сервер с необходимостью авторизации');
DEFINE('_SMTP_SERVER', 'Адрес SMTP-сервера');
DEFINE('_CACHE', 'Кэш');
DEFINE('_ENABLE_CACHE', 'Включить кэширование');
DEFINE('_ENABLE_CACHE2', 'Включение кэширования уменьшает запросы к MySQL и уменьшению нагрузки на сервер');
DEFINE('_CACHE_OPTIMIZATION', 'Оптимизация кэширования');
DEFINE('_CACHE_OPTIMIZATION2', 'Автоматически удаляет из файлов кэша лишние символы тем самым уменьшая размер файлов.');
DEFINE('_AUTOCLEAN_CACHE_DIR', 'Автоматическая очистка каталога кэша');
DEFINE('_AUTOCLEAN_CACHE_DIR2', 'Автоматически очищать каталог кэша удаляя просроченные файлы.');
DEFINE('_CACHE_MENU', 'Кэширование меню панели управления');
DEFINE('_CACHE_MENU2', 'Включение кэширования меню панели управления. Работает независимо от стандартного кэша.');
DEFINE('_CANNOT_CACHE', 'Кэширование не возможно');
DEFINE('_CANNOT_CACHE2', '<strong class="red">Каталог кэша не доступен для записи.</strong>');
DEFINE('_CACHE_DIR', 'Каталог кэша');
DEFINE('_CACHE_DIR2', 'Текущий каталог кэша <strong>Доступен для записи</strong>');
DEFINE('_CACHE_DIR3', 'Текущий каталог кэша <strong>НЕ ДОСТУПЕН ДЛЯ ЗАПИСИ</strong> - смените CHMOD каталога на 755 перед включением кэша');
DEFINE('_CACHE_TIME', 'Время жизни кэша');
DEFINE('_DB_CACHE', 'Кэш запросов базы данных');
DEFINE('_DB_CACHE_TIME', 'Время жизни кэша запросов базы данных');
DEFINE('_STATICTICS', 'Статистика');
DEFINE('_ENABLE_STATS', 'Включить сбор статистики');
DEFINE('_ENABLE_STATS2', 'Разрешить/запретить сбор статистики сайта');
DEFINE('_STATS_HITS_DATE', 'Вести статистику просмотра содержимого по дате');
DEFINE('_STATS_HITS_DATE2', 'ПРЕДУПРЕЖДЕНИЕ: В этом режиме записываются большие объемы данных!');
DEFINE('_STATS_SEARCH_QUERIES', 'Статистика поисковых запросов');
DEFINE('_SEF_URLS', 'Дружественные для поисковых систем URL-ы (SEF)');
DEFINE('_SEF_URLS2', 'Только для Apache! Перед использованием переименуйте htaccess.txt в .htaccess. Это необходимо для включения модуля apache - mod_rewrite');
DEFINE('_DYNAMIC_PAGETITLES', 'Динамические заголовки страниц (теги title)');
DEFINE('_DYNAMIC_PAGETITLES2', 'Динамическое изменение заголовков страниц в зависимости от текущего просматриваемого содержимого');
DEFINE('_CLEAR_FRONTPAGE_LINK', 'Очистка ссылки на com_frontpage');
DEFINE('_CLEAR_FRONTPAGE_LINK2', 'Придавать ссылке на компонент главной страницы более короткий вид.');
DEFINE('_DISABLE_PATHWAY_ON_FRONT', 'Скрывать пачвей (pathway) на главной');
DEFINE('_DISABLE_PATHWAY_ON_FRONT2', 'При включенном режиме строка &laquo;Главная&raquo; на первой странице сайта будет заменена на символ неразрывного пробела.');
DEFINE('_TITLE_ORDER', 'Порядок расположения элементов title');
DEFINE('_TITLE_ORDER2', 'Порядок расположения элементов заголовка страниц (тег title)');
DEFINE('_TITLE_SEPARATOR', 'Разделитель элементов title');
DEFINE('_TITLE_SEPARATOR2', 'Разделитель элементов заголовка страниц (тег title). По умолчанию - дефис.');
DEFINE('_INDEX_PRINT_PAGE', 'Индексация печатной версии');
DEFINE('_INDEX_PRINT_PAGE2', 'Если &laquo;Да&raquo;, то печатная версия содержимого будет доступна для индексации');
DEFINE('_REDIR_FROM_NOT_WWW', 'Переадресация с не WWW адресов');
DEFINE('_REDIR_FROM_NOT_WWW2', 'При заходе на сайт по ссылке site.ru, автоматически будет произведена переадресация на www.site.ru');
DEFINE('_ADMIN_CAPTCHA', 'Для авторизации в панели управления');
DEFINE('_ADMIN_CAPTCHA2', 'Использовать captcha для более безопасной авторизации в панели управления.');
DEFINE('_REGISTRATION_CAPTCHA', 'Для регистрации');
DEFINE('_REGISTRATION_CAPTCHA2', 'Использовать captcha для более безопасной регистрации.');
DEFINE('_CONTACTS_CAPTCHA', 'Для формы контактов');
DEFINE('_CONTACTS_CAPTCHA2', 'Использовать captcha для более безопасной формы контактов.');

DEFINE('_O_OTHER', 'Разные');
DEFINE('_SECURITY_LEVEL3', '3 уровень защиты - По умолчанию - наилучший');
DEFINE('_SECURITY_LEVEL2', '2 уровень защиты - Разрешено для IP-адресов прокси');
DEFINE('_SECURITY_LEVEL1', '1 уровень защиты - Обратная совместимость');
DEFINE('_PHP_MAIL_FUNCTION', 'Функцию PHP mail');
DEFINE('_CONSTRUCT_ERROR', 'ошибка сборки');

DEFINE('_TIME_OFFSET_M_12', '(UTC -12:00) Международная линия суточного времени');
DEFINE('_TIME_OFFSET_M_11', '(UTC -11:00) остров Мидуэй, Самоа');
DEFINE('_TIME_OFFSET_M_10', '(UTC -10:00) Гавайи');
DEFINE('_TIME_OFFSET_M_9_5', '(UTC -09:30) Тайохае, Маркизские острова');
DEFINE('_TIME_OFFSET_M_9', '(UTC -09:00) Аляска');
DEFINE('_TIME_OFFSET_M_8', '(UTC -08:00) Тихоокеанское время (США &amp; Канада)');
DEFINE('_TIME_OFFSET_M_7', '(UTC -07:00) Время Монтаны (США &amp; Канада)');
DEFINE('_TIME_OFFSET_M_6', '(UTC -06:00) Центральное время  (США &amp; Канада), Мехико');
DEFINE('_TIME_OFFSET_M_5', '(UTC -05:00) Восточное время (США &amp; Канада), Богота, Лайма');
DEFINE('_TIME_OFFSET_M_4', '(UTC -04:00) Атлантическое время (Канада), Каракас, Ла-Пас');
DEFINE('_TIME_OFFSET_M_3_5', '(UTC -03:30) Ньюфаундленд и Лабрадор');
DEFINE('_TIME_OFFSET_M_3', '(UTC -03:00) Бразилия, Буэнос Айрес, Джорджтаун');
DEFINE('_TIME_OFFSET_M_2', '(UTC -02:00) Средне-Атлантическое время');
DEFINE('_TIME_OFFSET_M_1', '(UTC -01:00 час) Азорские острова, Острова Зеленого Мыса');
DEFINE('_TIME_OFFSET_M_0', '(UTC 00:00) Западно-Европейское время, Лондон, Лиссабон, Касабланка');
DEFINE('_TIME_OFFSET_P_1', '(UTC +01:00 час) Брюссель, Копенгаген, Мадрид, Париж');
DEFINE('_TIME_OFFSET_P_2', '(UTC +02:00) Украина, Киев, Минск, Калининград, Южная Африка');
DEFINE('_TIME_OFFSET_P_3', '(UTC +03:00) Москва, Санкт-Петербург, Багдад, Эр-Рияд');
DEFINE('_TIME_OFFSET_P_3_5', '(UTC +03:30) Тегеран');
DEFINE('_TIME_OFFSET_P_4', '(UTC +04:00) Самара, Баку, Тбилиси, Абу-Даби, Мускат');
DEFINE('_TIME_OFFSET_P_4_5', '(UTC +04:30) Кабул');
DEFINE('_TIME_OFFSET_P_5', '(UTC +05:00) Оренбург, Екатеринбург, Пермь, Ташкент, Исламабад, Карачи');
DEFINE('_TIME_OFFSET_P_5_5', '(UTC +05:30) Бомбей, Калькутта, Мадрас, Нью-Дели');
DEFINE('_TIME_OFFSET_P_5_75', '(UTC +05:45) Катманду');
DEFINE('_TIME_OFFSET_P_6', '(UTC +06:00) Омск, Новосибирск, Алматы, Дака, Коломбо');
DEFINE('_TIME_OFFSET_P_6_5', '(UTC +06:30) Ягун');
DEFINE('_TIME_OFFSET_P_7', '(UTC +07:00) Красноярск, Бангкок, Ханой, Джакарта');
DEFINE('_TIME_OFFSET_P_8', '(UTC +08:00) Иркутск, Улан-Батор, Пекин, Сингапур, Гонконг');
DEFINE('_TIME_OFFSET_P_8_75', '(UTC +08:00) Западная Австралия');
DEFINE('_TIME_OFFSET_P_9', '(UTC +09:00) Якутск, Токио, Сеул, Осака, Саппоро');
DEFINE('_TIME_OFFSET_P_9_5', '(UTC +09:30) Аделаида, Дарвин');
DEFINE('_TIME_OFFSET_P_10', '(UTC +10:00) Владивосток, Гуам, Восточная Австралия');
DEFINE('_TIME_OFFSET_P_10_5', '(UTC +10:30) остров Lord Howe (Австралия)');
DEFINE('_TIME_OFFSET_P_11', '(UTC +11:00) Магадан, Соломоновы острова, Новая Каледония');
DEFINE('_TIME_OFFSET_P_11_5', '(UTC +11:30) остров Норфолк');
DEFINE('_TIME_OFFSET_P_12', '(UTC +12:00) Камчатка, Окленд, Уэллингтон, Фиджи');
DEFINE('_TIME_OFFSET_P_12_75', '(UTC +12:45) Остров Чатем');
DEFINE('_TIME_OFFSET_P_13', '(UTC +13:00) Тонга');
DEFINE('_TIME_OFFSET_P_14', '(UTC +14:00) Кирибати');

/* administrator components com_contact */
DEFINE('_CONTACT_MANAGEMENT', 'Управление контактами');
DEFINE('_ON_SITE', 'На сайте');
DEFINE('_RELATED_WITH_USER', 'Связано с пользователем');
DEFINE('_CHANGE_CONTACT', 'Изменить контакт');
DEFINE('_CHANGE_CATEGORY', 'Изменить категорию');
DEFINE('_CHANGE_USER', 'Изменить пользователя');
DEFINE('_ENTER_NAME_PLEASE', 'Вы должны ввести имя');
DEFINE('_NEW_CONTACT', 'Новый');
DEFINE('_CONTACT_DETAILS', 'Детали контакта');
DEFINE('_USER_POSITION', 'Положение (должность)');
DEFINE('_ADRESS_STREET_HOUSE', 'Адрес (улица, дом)');
DEFINE('_CITY', 'Город');
DEFINE('_STATE', 'Край/Область/Республика');
DEFINE('_COUNTRY', 'Страна');
DEFINE('_POSTCODE', 'Почтовый индекс');
DEFINE('_ADDITIONAL_INFO', 'Дополнительная информация');
DEFINE('_PUBLISH_INFO', 'Информация о публикации');
DEFINE('_POSITION', 'Расположение');
DEFINE('_IMAGES_INFO', 'Информация об изображении');
DEFINE('_PARAMETERS', 'Параметры');
DEFINE('_CONTACT_PARAMS', '* Эти параметры управляют отображением только при просмотре информации о контакте. *');

/* administrator components com_content */
DEFINE('_SITE_CONTENT', 'Содержимое сайта');
DEFINE('_GOTO_EDIT', 'Перейти в редактирование');
DEFINE('_SORT_BY', 'Сортировка по');
DEFINE('_HIDE_NAV_TREE', 'Скрыть дерево навигации');
DEFINE('_ON_FRONTPAGE', 'На главной');
DEFINE('_SAVE_ORDER', 'Сохранить порядок');
DEFINE('_TO_TRASH', 'В корзину');
DEFINE('_NEVER', 'Никогда');
DEFINE('_START', 'Начало');
DEFINE('_ALWAYS', 'Всегда');
DEFINE('_END', 'Окончание');
DEFINE('_WITHOUT_END', 'Без окончания');
DEFINE('_CHANGE_USER_DATA', 'Изменить данные пользователя');
DEFINE('_CHANGE_CONTENT', 'Изменить содержимое');
DEFINE('_CHOOSE_OBJECTS_TO_TRASH', 'Пожалуйста, выберите из списка объекты, которые Вы хотите отправить в корзину');
DEFINE('_WANT_TO_TRASH', 'Вы уверены, что хотите отправить объект(ы) в корзину?\nЭто не приведет к полному удалению объектов');
DEFINE('_ARCHIVE', 'Архив');
DEFINE('_ALL_SECTIONS', 'Все разделы');
DEFINE('_OBJECT_MUST_HAVE_TITLE', 'Этот объект должен иметь заголовок');
DEFINE('_PLEASE_CHOOSE_SECTION', 'Вы должны выбрать раздел');
DEFINE('_PLEASE_CHOOSE_CATEGORY', 'Вы должны выбрать категорию');
DEFINE('_O_EDITING', 'Редактирование');
DEFINE('_O_CREATION', 'Создание');
DEFINE('_OBJECT_DETAILS', 'Детали объекта');
DEFINE('_ALIAS', 'Псевдоним');
DEFINE('_INTROTEXT_M', 'Вводный Текст: (обязательно)');
DEFINE('_MAINTEXT_M', 'Основной текст: (необязательно)');
DEFINE('_NOTETEXT_M', 'Заметки: (необязательно)');
DEFINE('_HIDE_PARAMS_PANEL', 'Скрыть панель параметров');
DEFINE('_SETTINGS', 'Настройки');
DEFINE('_IN_ARCHIVE', 'В архиве');
DEFINE('_DRAFT_NOT_PUBLISHED', 'Черновик - Не опубликован');
DEFINE('_RESET', 'Обнулить');
DEFINE('_CHANGED', 'Изменялось');
DEFINE('_CREATED', 'Создано');
DEFINE('_NEW_DOCUMENT', 'Новый документ');
DEFINE('_LAST_CHANGE', 'Последнее изменение');
DEFINE('_NOT_CHANGED', 'Не изменялось');
DEFINE('_START_PUBLICATION', 'Начало публикации');
DEFINE('_END_PUBLICATION', 'Окончание публикации');
DEFINE('_OBJECT_ID', 'ID объекта');
DEFINE('_USED_IMAGES', 'Используемые изображения');
DEFINE('_SUBDIRECTORY', 'Подпапка');
DEFINE('_IMAGE_EXAMPLE', 'Пример изображения');
DEFINE('_ACTIVE_IMAGE', 'Активное изображение');
DEFINE('_SOURCE', 'Источник');
DEFINE('_ALIGN', 'Выравнивание');
DEFINE('_PARAMS_IN_VIEW', '* Эти параметры управляют внешним видом только в режиме полного просмотра*');
DEFINE('_ROBOTS_PARAMS', 'Настройки управления роботами');
DEFINE('_MENU_LINK', 'Связь с меню');
DEFINE('_MENU_LINK2', 'Здесь создается пункт меню (Ссылка - объект содержимого), который вставляется в выбранное из списка меню');
DEFINE('_EXISTED_MENUITEMS', 'Существующие пункты меню');
DEFINE('_PLEASE_SELECT_SMTH', 'Пожалуйста, выберите что-нибудь');
DEFINE('_OBJECT_MOVING', 'Перемещение объектов');
DEFINE('_MOVE_INTO_CAT_SECT', 'Переместить в Раздел/Категорию');
DEFINE('_OBJECTS_TO_MOVE', 'Будут перемещены объекты');
DEFINE('_SELECT_CAT_TO_MOVE_OBJECTS', 'Пожалуйста, выберите раздел или категорию для копирования объектов');
DEFINE('_COPYING_CONTENT_ITEMS', 'Копирование объектов содержимого');
DEFINE('_COPY_INTO_CAT_SECT', 'Копировать в Раздел/Категорию');
DEFINE('_OBJECTS_TO_COPY', 'Будут скопированы объекты');
DEFINE('_ORDER_BY_NAME', 'Внутреннему порядку');
DEFINE('_ORDER_BY_HEADERS', 'Заголовкам');
DEFINE('_ORDER_BY_DATE_CR', 'Дате создания');
DEFINE('_ORDER_BY_DATE_MOD', 'Дате модификации');
DEFINE('_ORDER_BY_ID', 'Идентификаторам ID');
DEFINE('_ORDER_BY_HITS', 'Просмотрам');
DEFINE('_CANNOT_EDIT_ARCHIVED_ITEM', 'Вы не можете отредактировать архивный объект');
DEFINE('_NOW_EDITING_BY_OTHER', 'в настоящее время редактируется другим пользователем');
DEFINE('_ROBOTS_HIDE', 'Скрыть мета-тег robots');
DEFINE('_CONTENT_ITEM_SAVED', 'Изменения успешно сохранены в');
DEFINE('_OBJ_ARCHIVED', 'Объект(ы) успешно архивирован(ы)');
DEFINE('_OBJ_PUBLISHED', 'Объект(ы) успешно опубликован(ы)');
DEFINE('_OBJ_UNARCHIVED', 'Объект(ы) успешно извлечен(ы) из архива');
DEFINE('_OBJ_UNPUBLISHED', 'Объект(ы) успешно снят(ы) с публикации');
DEFINE('_CHOOSE_OBJ_TOGGLE', 'Выберите объект для переключения');
DEFINE('_CHOOSE_OBJ_DELETE', 'Выберите объект для удаления');
DEFINE('_MOVED_TO_TRASH', 'Отправлено в корзину');
DEFINE('_CHOOSE_OBJ_MOVE', 'Выберите объект для перемещения');
DEFINE('_ERROR_OCCURED', 'Произошла ошибка');
DEFINE('_OBJECTS_MOVED_TO_SECTION', 'объект(ы) успешно перемещен(ы) в раздел');
DEFINE('_OBJECTS_COPIED_TO_SECTION', 'объект(ы) успешно скопированы в раздел');
DEFINE('_HITCOUNT_RESETTED', 'Счетчик просмотров сброшен');
DEFINE('_TIMES', 'раз');

/* administrator components com_easysql */
DEFINE('_SQL_COMMAND', 'Команда');
DEFINE('_MANAGEMENT', 'Управление');
DEFINE('_FIELDS', 'Поля');
DEFINE('_EXEC_SQL', 'Выполнить SQL');
DEFINE('_SQL_CONSOL', 'SQL консоль');
DEFINE('_SQL_TABLE', 'Таблица');
DEFINE('_SQL_ROWS_ENTER', 'Вывести строк');
DEFINE('_SQL_MAKE', 'Собрать SQL');

/* administrator components com_frontpage */
DEFINE('_UNKNOWN_ID', 'Идентификатор не опознан');
DEFINE('_REMOVE_FROM_FRONT', 'Убрать с главной');
DEFINE('_PUBLISH_TIME_END', 'Время публикации истекло');
DEFINE('_CANNOT_CHANGE_PUBLISH_STATE', 'Смена статуса публикации недоступна');
DEFINE('_CHANGE_SECTION', 'Изменить раздел');

/* administrator components com_installer */
DEFINE('_OTHER_COMPONENT_USE_DIR', 'Другой компонент уже использует каталог');
DEFINE('_CANNOT_CREATE_DIR', 'Невозможно создать каталог');
DEFINE('_SQL_ERROR', 'Ошибка выполнения SQL');
DEFINE('_ERROR_MESSAGE', 'Текст ошибки');
DEFINE('_CANNOT_COPY_PHP_INSTALL', 'Не могу скопировать PHP-файл установки');
DEFINE('_CANNOT_COPY_PHP_REMOVE', 'Не могу скопировать PHP-файл удаления');
DEFINE('_ERROR_DELETING', 'Ошибка удаления');
DEFINE('_IS_PART_OF_CMS', 'является элементом ядра Joostina и не может быть удален.<br />Вы должны снять его с публикации, если не хотите его использовать');
DEFINE('_DELETE_ERROR', 'Удаление - ошибка');
DEFINE('_UNINSTALL_ERROR', 'Ошибка деинсталляции');
DEFINE('_BAD_XML_FILE', 'Неправильный XML-файл');
DEFINE('_PARAM_FILED_EMPTY', 'Поле параметра пустое и невозможно удалить файлы');
DEFINE('_INSTALLED_COMPONENTS', 'Установленные компоненты');
DEFINE('_INSTALLED_COMPONENTS2', 'Здесь показаны только те расширения, которые Вы можете удалить. Части ядра Joostina удалить нельзя.');
DEFINE('_COMPONENT_NAME', 'Название компонента');
DEFINE('_COMPONENT_LINK', 'Ссылка меню компонента');
DEFINE('_COMPONENT_AUTHOR_URL', 'URL автора');
DEFINE('_OTHER_COMPONENTS_NOT_INSTALLED', 'Сторонние компоненты не установлены');
DEFINE('_COMPONENT_INSTALL', 'Установка компонента');
DEFINE('_DELETING', 'Удаление');
DEFINE('_CANNOT_DEL_LANG_ID', 'id языка пусто, поэтому невозможно удалить файлы');
DEFINE('_GOTO_LANG_MANAGEMENT', 'Перейти в Управление языками');
DEFINE('_INTALL_LANG', 'Установка языкового пакета сайта');
DEFINE('_NO_FILES_OF_MAMBOTS', 'Нет файлов, отмеченных как мамботы');
DEFINE('_WRONG_ID', 'Неправильный id объекта');
DEFINE('_BAD_DIR_NAME_EMPTY', 'Поле папки пустое, невозможно удалить файлы');
DEFINE('_INSTALLED_MAMBOTS', 'Установленные мамботы');
DEFINE('_MAMBOT', 'Мамбот');
DEFINE('_TYPE', 'Тип');
DEFINE('_OTHER_MAMBOTS', 'Это не мамботы ядра, а сторонние мамботы');
DEFINE('_INSTALL_MAMBOT', 'Установка мамбота');
DEFINE('_UNKNOWN_CLIENT', 'Неизвестный тип клиента');
DEFINE('_NO_FILES_MODULES', 'Файлы, отмеченные как модули, отсутствуют');
DEFINE('_ALREADY_EXISTS', 'уже существует');
DEFINE('_DELETING_XML_FILE', 'Удаление XML файла');
DEFINE('_INSTALL_MODULE', 'Установленные модулей');
DEFINE('_MODULE', 'Модуль');
DEFINE('_USED_ON', 'Используется');
DEFINE('_NO_OTHER_MODULES', 'Сторонние модули не установлены');
DEFINE('_MODULE_INSTALL', 'Установка модуля');
DEFINE('_SITE_MODULES', 'Модули сайта');
DEFINE('_ADMIN_MODULES', 'Модули панели управления');
DEFINE('_CANNOT_DEL_FILE_NO_DIR', 'Невозможно удалить файл, т.к. каталог не существует');
DEFINE('_WRITEABLE', 'Доступен для записи');
DEFINE('_UNWRITEABLE', 'Недоступен для записи');
DEFINE('_CHOOSE_DIRECTORY_PLEASE', 'Пожалуйста, выберите каталог');
DEFINE('_ZIP_UPLOAD_AND_INSTALL', 'Загрузка архива расширения с последующей установкой');
DEFINE('_PACKAGE_FILE', 'Файл пакета');
DEFINE('_UPLOAD_AND_INSTALL', 'Загрузить и установить');
DEFINE('_INSTALL_FROM_DIR', 'Установка из каталога');
DEFINE('_INSTALLATION_DIRECTORY', 'Каталог установки');
DEFINE('_CONTINUE', 'Продолжить');
DEFINE('_NO_INSTALLER', 'не найден инсталлятор');
DEFINE('_CANNOT_INSTALL', 'Установка [$element] невозможна');
DEFINE('_CANNOT_INSTALL_DISABLED_UPLOAD', 'Установка невозможна, пока запрещена загрузка файлов. Пожалуйста, используйте установку из каталога.');
DEFINE('_INSTALL_ERROR', 'Ошибка установки');
DEFINE('_CANNOT_INSTALL_NO_ZLIB', 'Установка невозможна, пока не установлена поддержка zlib');
DEFINE('_NO_FILE_CHOOSED', 'Файл не выбран');
DEFINE('_ERORR_UPLOADING_EXT', 'Ошибка загрузки нового модуля');
DEFINE('_UPLOADING_ERROR', 'Загрузка неудачна');
DEFINE('_SUCCESS', 'успешно');
DEFINE('_UNSUCCESS', 'неудачно');
DEFINE('_UPLOAD_OF_EXT', 'Загрузка нового элемента');
DEFINE('_DELETE_SUCCESS', 'Удаление успешно');
DEFINE('_CANNOT_CHMOD', 'Не могу изменить права доступа к закачанному файлу');
DEFINE('_CANNOT_MOVE_TO_MEDIA', 'Не могу переместить скачанный файл в каталог <code>/media</code>');
DEFINE('_CANNOT_WRITE_TO_MEDIA', 'Загрузка сорвана, так как каталог <code>/media</code> недоступен для записи.');
DEFINE('_CANNOT_INSTALL_NO_MEDIA', 'Загрузка сорвана, так как каталог <code>/media</code> не существует');
DEFINE('_ERROR_NO_XML_JOOMLA', 'ОШИБКА: В установочном пакете невозможно найти XML-файл установки Joostina.');
DEFINE('_ERROR_NO_XML_INSTALL', 'ОШИБКА: В установочном пакете невозможно найти XML-файл установки.');
DEFINE('_NO_NAME_DEFINED', 'Не определено имя файла');
DEFINE('_FILE', 'Файл');
DEFINE('_NOT_CORRECT_INSTALL_FILE_FOR_JOOMLA', 'не является корректным файлом установки Joostina!');
DEFINE('_CANNOT_RUN_INSTALL_METHOD', 'Метод &laquo;install&raquo; не может быть вызван классом');
DEFINE('_CANNOT_RUN_UNINSTALL_METHOD', 'Метод &laquo;uninstall&raquo; не может быть вызван классом');
DEFINE('_CANNOT_FIND_INSTALL_FILE', 'Установочный файл не найден');
DEFINE('_XML_NOT_FOR', 'Установочный XML-файл - не для');
DEFINE('_FILE_NOT_EXISTS', 'Файл не существует');
DEFINE('_INSTALL_TWICE', 'Вы пытаетесь дважды установить одно и то же расширение');
DEFINE('_ERROR_COPYING_FILE', 'Ошибка копирования файла');

/* administrator components com_jce */
DEFINE('_LANG_ALREADY_EXISTS', 'Язык уже существует');
DEFINE('_EMPTY_LANG_ID', 'Пустой id языка, невозможно удалить файлы');
DEFINE('_NO_PLUGIN_FILES', 'Файлы плагинов отсутствуют');
DEFINE('_BAD_OBJECT_ID', 'Неверный id объекта');
DEFINE('_EMPRY_DIR_NAME_CANNOT_DEL_FILE', 'Поле папки пустое, невозможно удалить файл');
DEFINE('_INSTALLED_JCE_PLUGINS', 'Установленные плагины JCE');
DEFINE('_PCLZIP_UNKNOWN_ERROR', 'Неисправимая ошибка');
DEFINE('_UNZIP_ERROR', 'Ошибка распаковки');
DEFINE('_JCE_INSTALL_ERROR_NO_XML', 'ОШИБКА: Невозможно найти в пакете XML-файл установки JCE 1.1.x.');
DEFINE('_JCE_INSTALL_ERROR_NO_XML2', 'ОШИБКА: Невозможно найти в пакете XML-файл установки.');
DEFINE('_JCE_UNKNOWN_FILENAME', 'Имя файла не определено');
DEFINE('_BAD_JCE_INSTALL_FILE', ' неправильный файл установки JCE или его версия неправильная.');
DEFINE('_WRONG_PLUGIN_VERSION', 'Неправильная версия плагина');
DEFINE('_ERROR_CREATING_DIRECTORY', 'Ошибка создания каталога');
DEFINE('_INSTALLER_NOT_FIND_ELEMENT', 'Инсталлятор не обнаружил элемент');
DEFINE('_NO_INSTALLER_FOR_COMPONENT', 'Инсталлятор недоступен для элемента');
DEFINE('_NO_CHOOSED_FILES', 'Файлы не выбраны');
DEFINE('_ERROR_OF_UPLOAD', 'Ошибка загрузки');
DEFINE('_UPLOADING', 'Загрузка');
DEFINE('_IS_SUCCESS', 'успешна');
DEFINE('_HAS_ERROR', 'завершилась ошибкой');
DEFINE('_CANNOT_DELETE_LANG_FILE', 'Нельзя удалять используемый языковой пакет');
DEFINE('_GUEST', 'Гость');
DEFINE('_EDITOR', 'Редактор');
DEFINE('_PUBLISHER', 'Издатель');
DEFINE('_MANAGER', 'Менеджер');
DEFINE('_ADMINISTRATOR', 'Администратор');
DEFINE('_SUPER_ADMINISTRATOR', 'Супер-Администратор');
DEFINE('_CHANGES_FOR_PLUGIN', 'Изменения для плагина');
DEFINE('_SUCCESS_SAVE', 'успешное сохранение');
DEFINE('_PLUGIN', 'Плагин');
DEFINE('_MODULE_IS_EDITING_BY_ADMIN', 'Модуль в настоящее время редактируется другим администратором');
DEFINE('_CHOOSE_PLUGIN_FOR_ACCESS_MANAGEMENT', 'Для назначения прав доступа необходимо выбрать плагин');
DEFINE('_CHOOSE_PLUGIN_FOR', 'Выберите плагин для');
DEFINE('_JCE_CONFIG', 'Конфигурация JCE');
DEFINE('_EDITOR_CONFIG', 'Конфигурация редактора');
DEFINE('_EXTENSIONS', 'Расширения');
DEFINE('_EXTENSION_MANAGEMENT', 'Управление расширениями');
DEFINE('_ICONS_POSITIONS', 'Расположение значков');
DEFINE('_LANG_MANAGER', 'Менеджер локализаций');
DEFINE('_FILE_NOT_FOUND', 'Файл не найден');
DEFINE('_PLUGIN_NOT_FOUND', 'Плагин не найден');
DEFINE('_JCE_CONTENT_MAMBOT_NOT_INSTALLED', 'Мамбот редактора JCE не установлен');
DEFINE('_ICONS_POSITIONS_SAVED', 'Расположение значков сохранено');
DEFINE('_MAIN_PAGE', 'Главная');
DEFINE('_NEW', 'Новый');
DEFINE('_INSTALLATION', 'Установка');
DEFINE('_PREVIEW', 'Предпросмотр');
DEFINE('_PLUGINS', 'Плагины');

/* administrator components com_jce */
DEFINE('_USERS', 'Пользователи');
DEFINE('_USER_LOGIN_TXT', 'Имя пользователя (логин )');
DEFINE('_LOGGED_IN', 'На сайте');
DEFINE('_ALLOWED', 'Разрешен');
DEFINE('_LAST_LOGIN', 'Последнее посещение');
DEFINE('_USER_BLOCK', 'Блокировка');
DEFINE('_ALLOW', 'Разрешить');
DEFINE('_DISALLOW', 'Запретить');
DEFINE('_ENTER_LOGIN_PLEASE', 'Вы должны ввести имя пользователя для входа на сайт');
DEFINE('_BAD_USER_LOGIN', 'Ваше имя для входа содержит неправильные символы или слишком короткое.');
DEFINE('_ENTER_EMAIL_PLEASE', 'Вы должны ввести адрес e-mail');
DEFINE('_ENTER_GROUP_PLEASE', 'Вы должны назначить пользователю группу доступа');
DEFINE('_BAD_PASSWORD', 'Пароль неправильный');
DEFINE('_BAD_GROUP_1', 'Пожалуйста, выберите другую группу. Группы типа &laquo;Public Front-end&raquo; выбирать нельзя');
DEFINE('_BAD_GROUP_2', 'Пожалуйста, выберите другую группу. Группы типа &laquo;Public Back-end&raquo; выбирать нельзя');
DEFINE('_USER_INFO', 'Информация о пользователе');
DEFINE('_NEW_PASSWORD', 'Новый пароль');
DEFINE('_REPEAT_PASSWORD', 'Проверка пароля');
DEFINE('_BLOCK_USER', 'Блокировать пользователя');
DEFINE('_RECEIVE_EMAILS', 'Получать системные сообщения на e-mail');
DEFINE('_REGISTRATION_DATE', 'Дата регистрации');
DEFINE('_CONTACT_INFO', 'Контактная информация');
DEFINE('_NO_USER_CONTACTS', 'У этого пользователя нет контактной информации:<br />Для подробностей смотрите &laquo;Компоненты &rarr; Контакты &rarr; Управление контактами&raquo;');
DEFINE('_FULL_NAME', 'Полное имя');
DEFINE('_CHANGE_CONTACT_INFO', 'Изменить контактную информацию');
DEFINE('_CONTACT_INFO_PATH_URL', 'Компоненты &rarr; Контакты &rarr; Управление контактами');
DEFINE('_RESTRICT_FUNCTION', 'Функциональность ограничена');
DEFINE('_NO_RIGHT_TO_CHANGE_GROUP', 'Вы не можете изменить эту группу пользователей. Это может сделать только Главный администратор сайта');
DEFINE('_NO_RIGHT_TO_USER_CREATION', 'Вы не можете создать пользователя с этим уровнем доступа. Это может сделать только Главный администратор сайта');
DEFINE('_PROFILE_SAVE_SUCCESS', 'Успешно сохранены изменения профиля пользователя');
DEFINE('_CANNOT_DEL_ONE_SUPER_ADMIN', 'Вы не можете удалить этого Главного администратора, т.к. он единственный Главный администратор сайта');
DEFINE('_CHOOSE_USER_TO', 'Выберите пользователя для');
DEFINE('_PLEASE_CHOOSE_USER', 'Пожалуйста, выберите пользователя');
DEFINE('_CANNOT_DISABLE_SUPER_ADMIN', 'Вы не можете отключить Главного администратора');
DEFINE('_THIS_CAN_DO_HIGHLEVEL_USERS', 'Это могут делать только пользователи с более высоким уровнем доступа');
DEFINE('_DISABLE', 'Отключить');

/* administrator components com_typedcontent */
DEFINE('_ACCESS', 'Доступ');
DEFINE('_LINKS_COUNT', 'Ссылок');
DEFINE('_DATE_PUBL_END', 'Истек срок публикации');
DEFINE('_CHANGE_STATIC_CONTENT', 'Изменить статичное содержимое');
DEFINE('_WANT_TO_RESET_HITCOUNT', 'Вы действительно хотите обнулить счетчик просмотров?\nЛюбые несохраненные изменения этого содержимого будут утеряны.');
DEFINE('_CONTENT_OBJECT_MUST_HAVE_NAME', 'Объект содержимого должен иметь название');
DEFINE('_CONTENT_INFO', 'Информация о содержимом');
DEFINE('_O_STATE', 'Состояние');
DEFINE('_CHANGE_AUTHOR', 'Изменить автора');
DEFINE('_GALLERY_IMAGES', 'Изображения галереи');
DEFINE('_CONTENT_IMAGES', 'Изображения содержимого');
DEFINE('_EDITING_SELECTED_IMAGE', 'Редактирование выбранного изображения');
DEFINE('_ALTERNATIVE_TEXT', 'Альтернативный текст');
DEFINE('_MENU_LINK_3', 'Здесь создается пункт меню типа &laquo;Ссылка - Статичное содержимое&raquo;, который вставляется в выбранное из списка меню');
DEFINE('_EXISTED_MENU_LINKS', 'Существующие связи с меню');
DEFINE('_CONTENT_SAVED', 'Содержимое сохранено');
DEFINE('_CHOOSE_OBJECT_FOR', 'Выберите объект для');
DEFINE('_O_SECCESS_PUBLISHED', 'Объектов успешно опубликовано');
DEFINE('_O_SUCCESS_UNPUBLISHED', 'Объектов успешно скрыто');
DEFINE('_HIT_COUNT_RESETTED', 'Счетчик просмотров успешно обнулен');
DEFINE('_SUCCESS_MENU_CR_1', '(Ссылка - Статичное содержимое) в меню');

/* administrator components com_trash */
DEFINE('_TRASH', 'Корзина');
DEFINE('_OBJECT_DELETION', 'Удаление объектов');
DEFINE('_OBJECTS_TO_DELETE', 'Удаляемые объекты');
DEFINE('_THIS_ACTION_WILL_DELETE_O_FOREVER', '* Это действие <strong class="red">насовсем удалит</strong><br />перечисленные объекты из базы данных*');
DEFINE('_REALLY_DELETE_OBJECTS', 'Вы действительно хотите удалить перечисленные объекты?\nЭто действие насовсем удалит перечисленные объекты из базы данных.');
DEFINE('_OBJECT_RESTORE', 'Восстановление объектов');
DEFINE('_OBECTS_TO_RESTORE', 'Восстанавливаемые объекты');
DEFINE('_THIS_ACTION_WILL_RESTORE_O_FOREVER', '* Это действие <strong style="color:#FF0000;">восстановит</strong> эти объекты,<br />затем они будут возвращены на прежние места, как неопубликованные объекты*');
DEFINE('_REALLY_RESTORE_OBJECTS', 'Вы действительно хотите восстановить перечисленные объекты?');
DEFINE('_RESTORE', 'Восстановить');
DEFINE('_CONTENT_ITEMS', 'Объекты содержимого');
DEFINE('_MENU_ITEMS', 'Пункты меню');
DEFINE('_OBJECTS_DELETED', 'Объект(ы) успешно удален(ы)');
DEFINE('_SUCCESS_DELETION', 'Успешно удалено');
DEFINE('_OBJECTS_RESTORED', 'Объект(ов) успешно восстановлен(о)');
DEFINE('_CLEAR_TRASH', 'Очистить корзину');

/* administrator components com_templates */
DEFINE('_UNSUCCESS_OPERATION_NO_TEMPLATE', 'Операция неудачна: Не определен шаблон.');
DEFINE('_UNSUCCESS_OPERATION_EMPTY_FILE', 'Операция неудачна: Пустое содержимое.');
DEFINE('_UNSUCCES_OPERAION', 'Операция неудачна');
DEFINE('_CANNOT_OPEN_FILE_DOR_WRITE', 'Ошибка открытия файла для записи.');
DEFINE('_NO_PREVIEW', 'Предпросмотр недоступен');
DEFINE('_TEMPLATES', 'Шаблоны');
DEFINE('_TEMPLATE_PREVIEW', 'Предпросмотр шаблона');
DEFINE('_DEFAULT', 'По умолчанию');
DEFINE('_ASSIGNED_TO', 'Назначен');
DEFINE('_MAKE_UNWRITEABLE_AFTER_SAVING', 'Сделать недоступным для записи после сохранения');
DEFINE('_IGNORE_WRITE_PROTECTION_WHEN_SAVE', 'При сохранении игнорировать защиту от записи');
DEFINE('_CHANGE_EDITOR', 'Изменить редактор');
DEFINE('_CSS_TEMPLATE_EDITOR', 'Редактор CSS шаблона');
DEFINE('_ASSGIN_TEMPLATE_TO_MENU', 'назначение шаблона для пунктов меню');
DEFINE('_MODULES_POSITION', 'Позиции модулей');
DEFINE('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', 'В глобальной конфигурации выбрано использование одного шаблона:');
DEFINE('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', 'Этот шаблон используется и не может быть удален');
DEFINE('_UNSUCCES_OPERATION_CANNOT_OPEN', 'Операция неудачна: невозможно открыть');
DEFINE('_POSITIONS_SAVED', 'Позиции сохранены');

/* menubar.html.old.php + menubar.html.php */
DEFINE('_BUTTON', 'Кнопка');
DEFINE('_PLEASE_CHOOSE_ELEMENT', 'Пожалуйста, выберите элемент.');
DEFINE('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', 'Пожалуйста, выберите из списка объекты для их публикации на сайте');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_MAKE_DEFAULT', 'Пожалуйста, выберите объект, чтобы назначить его по умолчанию');
DEFINE('_ASSIGN', 'Назначить');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNPUBLISH', 'Для отмены публикации объекта, сначала выберите его');
DEFINE('_TO_ARCHIVE', 'В архив');
DEFINE('_FROM_ARCHIVE', 'Из архива');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ARCHIVE', 'Пожалуйста, выберите из списка объекты для их архивации');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNARCHIVE', 'Выберите объект для восстановления его из архива');
DEFINE('_CHANGE', 'Изменить');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_EDIT', 'Выберите объект из списка для его редактирования');
DEFINE('_EDIT_HTML', 'Ред. HTML');
DEFINE('_EDIT_CSS', 'Ред. CSS');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_DELETE', 'Выберите объект из списка для его удаления');
DEFINE('_REALLY_WANT_TO_DELETE_OBJECTS', 'Вы действительно хотите удалить выбранные объекты?');
DEFINE('_REMOVE_TO_TRASH', 'В&nbsp;корзину');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_TRASH', 'Выберите объект из списка для перемещения его в корзину');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ASSIGN', 'Пожалуйста, для назначения объекта выберите его');
DEFINE('_HELP', 'Помощь');

/* administrator components com_languages */
DEFINE('_LANGUAGE_PACKS', 'Языковые пакеты');
DEFINE('_E_LANGUAGE', 'Язык');
DEFINE('_LANGUAGE_EDITOR', 'Редактор языка');
DEFINE('_LANGUAGE_SAVED', 'Язык успешно изменен');
DEFINE('_YOU_CANNOT_DELETE_LANG_FILE', 'Вы не можете удалить использующийся языковой файл');
DEFINE('_UNSUCCESS_OPERATION_NO_LANGUAGE', 'Операция неудачна: Не определен язык.');

/* administrator components com_linkeditor */
DEFINE('_COMPONENTS_MENU_EDITOR', 'Редактирование меню компонентов');
DEFINE('_ICON', 'Значок');
DEFINE('_KERNEL', 'Ядро');
DEFINE('_COMPONENTS_MENU_EDIT', 'Редактирование пункта меню компонентов');
DEFINE('_COMPONENTS_MENU_NEW', 'Создание нового пункта меню компонентов');
DEFINE('_COMPONENT_IS_A_PART_OF_CMS', '<strong>Внимание:</strong> этот компонент является частью ядра, при некорректном управлении им возможны проблемы в работе системы.');
DEFINE('_MENU_NAME_REQUIRED', 'Название пункта меню. Обязательно для заполнения.');
DEFINE('_MENU_ITEM_ICON', 'Значок пункта меню');
DEFINE('_MENU_ITEM_DESCRIPTION', 'Описание пункта меню.');
DEFINE('_MENU_ITEM_LINK', 'Ссылка на компонент. Если пункт меню не содержит подменю то поле обязательно для заполнения.');
DEFINE('_PARENT_MENU_ITEM', 'Родительский пункт');
DEFINE('_PARENT_MENU_ITEM2', 'Родительский пункт меню. Допускается всего 1 уровень вложенности.');
DEFINE('_THIS_FILEDS_REQUIRED', '<strong class="red">*</strong> пункты обязательны для заполнения');
DEFINE('_MENU_ITEM_DELETED', 'Пункт меню удалён');
DEFINE('_FIRST_LEVEL', 'Первый уровень');

/* administrator components com_mambots */
DEFINE('_MAMBOTS', 'Мамботы');
DEFINE('_MAMBOT_NAME', 'Название мамбота');
DEFINE('_NO_MAMBOT_NAME', 'Мамбот должен иметь название');
DEFINE('_NO_MAMBOT_FILENAME', 'Мамбот должен иметь имя файла');
DEFINE('_SITE_MAMBOT', 'Мамбот сайта');
DEFINE('_MAMBOT_DETAILS', 'Детали мамбота');
DEFINE('_USE_THIS_MAMBOT_FILE', 'Используемый файл');
DEFINE('_MAMBOT_ORDER', 'Номер по порядку');
DEFINE('_NO_MAMBOT_PARAMS', '<em>Параметры отсутствуют</em>');
DEFINE('_NEW_MAMBOTS_IN_THE_END', 'Новые объекты по умолчанию располагаются в конце. Порядок расположения может быть изменен только после сохранения этого объекта.');
DEFINE('_CHOOSE_MAMBOT_FOR', 'Выберите мамбот для');

/* administrator components com_massmail */
DEFINE('_PLEASE_ENTER_SUBJECT', 'Пожалуйста, впишите тему');
DEFINE('_PLEASE_CHOOSE_GROUP', 'Пожалуйста, выберите группу');
DEFINE('_PLEASE_ENTER_MESSAGE', 'Пожалуйста, заполните сообщение');
DEFINE('_MASSMAIL_TTILE', 'Рассылка почты');
DEFINE('_SEND_TO_SUBGROUPS', 'Отправить подчиненным группам');
DEFINE('_SEND_IN_HTML', 'Отправить в HTML-формате');
DEFINE('_MAIL_SUBJECT', 'Тема');
DEFINE('_MESSAGE', 'Сообщение');
DEFINE('_ALL_USER_GROUPS', '- Все группы пользователей -');
DEFINE('_PLEASE_FILL_FORM', 'Пожалуйста, заполните корректно форму');
DEFINE('_MESSAGE_SENDED_TO_USERS', 'E-mail отправлено пользователю(ям) - ');

/* administrator components com_menumanager */
DEFINE('_MENU_MANAGER', 'Управление меню');
DEFINE('_MENU_ITEMS_UNPUBLISHED', 'Скрыто');
DEFINE('_MENU_MUDULES', 'Модулей');
DEFINE('_CHANGE_MENU_NAME', 'Изменить название меню');
DEFINE('_CHANGE_MENU_ITEMS', 'Изменить пункты меню');
DEFINE('_PLEASE_ENTER_MENU_NAME', 'Пожалуйста, введите название меню');
DEFINE('_NO_QUOTES_IN_NAME', 'Название меню не должно содержать &frasl;, &prime;');
DEFINE('_PLEASE_ENTER_MENU_MODULE_NAME', 'Пожалуйста, введите название модуля меню');
DEFINE('_MENU_INFO', 'Информация о меню');
DEFINE('_MENU_NAME_TIP', 'Это имя меню используется системой для его идентификации - оно должно быть уникально. Рекомендуется давать имя без пробелов');
DEFINE('_MODULE_TITLE_TIP', 'Заголовок mod_mainmenu требуется для отображения этого меню');
DEFINE('_MODULE_TITLE', 'Заголовок модуля');
DEFINE('_NEW_MENU_ITEM_TIP', '* Новый модуль меню будет автоматически создан после того, как вы введете заголовок, а затем нажмете кнопку "Сохранить". *<br /><br />Редактирование параметров созданного модуля будет доступно в разделе &laquo;Управления модулями [сайт]&raquo;: Модули &rarr; Модули сайта');
DEFINE('_REMOVE_MENU', 'Удалить меню');
DEFINE('_MODULES_TO_REMOVE', 'Модуль(и) для удаления');
DEFINE('_MENU_ITEMS_TO_REMOVE', 'Удаляемые пункты меню');
DEFINE('_THIS_OP_REMOVES_MENU', '* Эта операция <strong class="red">удаляет</strong> это меню,<br />ВСЕ его пункты и модуль(и), назначенный(ые) ему(им). *');
DEFINE('_REALLY_DELETE_MENU', 'Вы уверены, что хотите удалить это меню?\nПроизойдет удаление меню, его пунктов и модулей.');
DEFINE('_PLEASE_ENTER_MENY_COPY_NAME', 'Пожалуйста, введите имя для копии меню');
DEFINE('_PLEASE_ENTER_MODULE_NAME', 'Пожалуйста, введите имя для нового модуля');
DEFINE('_MENU_COPYING', 'Копирование меню');
DEFINE('_NEW_MENU_NAME', 'Имя нового меню');
DEFINE('_NEW_MODULE_NAME', 'Имя нового модуля');
DEFINE('_MENU_TO_COPY', 'Копируемое меню');
DEFINE('_MENU_ITEMS_TO_COPY', 'Копируемые пункты меню');
DEFINE('_CANNOT_RENAME_MAINMENU', 'Вы не можете переименовать меню &laquo;mainmenu&raquo;, т.к.  это нарушит правильное функционирование Joostina');
DEFINE('_MENU_ALREADY_EXISTS', 'Меню с таким именем уже существует. Вы должны ввести уникальное имя меню');
DEFINE('_NEW_MENU_CREATED', 'Создано новое меню');
DEFINE('_MENU_ITEMS_AND_MODULES_UPDATED', 'Пункты меню и модули обновлены');
DEFINE('_MENU_DELETED', 'Меню удалено');
DEFINE('_NEW_MENU', 'Новое меню');
DEFINE('_NEW_MENU_MODULE', 'Новый модуль меню');

/* administrator components com_menus */
DEFINE('_MODULE_IS_EDITING_MY_ADMIN', 'Модуль уже редактируется другим администратором');
DEFINE('_LINK_MUST_HAVE_NAME', 'Ссылка должна иметь имя');
DEFINE('_CHOOSE_COMPONENT_FOR_LINK', 'Вы должны выбрать компонент для создания ссылки на него');
DEFINE('_MENU_ITEM_COMPONENT_LINK', 'Пункт меню: Ссылка - Объект компонента');
DEFINE('_LINK_TITLE', 'title ссылки');
DEFINE('_LINK_COMPONENT', 'Компонент для ссылки');
DEFINE('_LINK_TARGET', 'При нажатии открыть в');
DEFINE('_OBJECT_MUST_HAVE_NAME', 'Объект должен иметь имя');
DEFINE('_CHOOSE_COMPONENT', 'Выберите компонент');
DEFINE('_MENU_ITEM_COMPONENT', 'Пункт меню: Компонент');
DEFINE('_MENU_PARAMS_AFTER_SAVE', 'Список параметров будет доступен только после сохранения пункта меню');
DEFINE('_MENU_ITEM_TABLE_CONTACT_CATEGORY', 'Пункт меню: Таблица - Контакты категории');
DEFINE('_CATEGORY_TITLE_IF_FILED_IS_EMPTY', 'Если поле будет оставлено пустым, то автоматически будет использовано название категории');
DEFINE('_CHOOSE_CONTACT_FOR_LINK', 'Для создания ссылки необходимо выбрать контакт');
DEFINE('_MENU_ITEM_CONTACT_OBJECT', 'Пункт меню: Ссылка - Объект контакта');
DEFINE('_MENU_ITEM_BLOG_CATEGORY_ARCHIVE', 'Пункт меню: Блог - Содержимое категории в архиве');
DEFINE('_MENU_ITEM_BLOG_SECTION_ARCHIVE', 'Пункт меню: Блог - Содержимое раздела в архиве');
DEFINE('_SECTION_TITLE_IF_FILED_IS_EMPTY', 'Если поле будет оставлено пустым, то автоматически будет использовано название раздела');
DEFINE('_MENU_ITEM_SAVED', 'Пункт меню сохранен');
DEFINE('_MENU_ITEM_BLOGCATEGORY', 'Пункт меню: Блог - Содержимое категории');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_CATEGORIES', 'Вы можете выбрать несколько категорий');
DEFINE('_MENU_ITEM_BLOG_CONTENT_CATEGORY', 'Пункт меню: Блог - Содержимое раздела');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_SECTIONS', 'Вы можете выбрать несколько разделов');
DEFINE('_MENU_ITEM_TABLE_CONTENT_CATEGORY', 'Пункт меню: Таблица - Содержимое категории');
DEFINE('_CHANGE_CONTENT_ITEM', 'Изменить объект содержимого');
DEFINE('_CONTENT_ITEM_TO_LINK_TO', 'Выберите статью для связи');
DEFINE('_MENU_ITEM_CONTENT_ITEM', 'Пункт меню: Ссылка - Объект содержимого');
DEFINE('_CONTENT_TO_LINK_TO', 'Содержимое для связи');
DEFINE('_MENU_ITEM_TABLE_CONTENT_SECTION', 'Пункт меню: Таблица - содержимое раздела');
DEFINE('_CHOOSE_OBJECT_TO_LINK_TO', 'Вы должны выбрать объект для связи с ним');
DEFINE('_MENU_ITEM_STATIC_CONTENT', 'Пункт меню: Ссылка - Статичное содержимое');
DEFINE('_MENU_ITEM_CATEGORY_NEWSFEEDS', 'Пункт меню: Таблица - Ленты новостей из категории');
DEFINE('_CHOOSE_NEWSFEED_TO_LINK', 'Вы должны выбрать ленту новостей для связи с пунктом меню');
DEFINE('_MENU_ITEM_NEWSFEED', 'Пункт меню: Ссылка - Лента новостей');
DEFINE('_LINKED_TO_NEWSFEED', 'Связано с лентой');
DEFINE('_MENU_ITEM_SEPARATOR', 'Пункт меню: Разделитель/Заполнитель');
DEFINE('_ENTER_URL_PLEASE', 'Вы должны ввести URL.');
DEFINE('_MENU_ITEM_URL', 'Пункт меню: Ссылка - URL');
DEFINE('_MENU_ITEM_WEBLINKS_CATEGORY', 'Пункт меню: Таблица - Web-ссылки категории');
DEFINE('_MENU_ITEM_WRAPPER', 'Пункт меню: Wrapper');
DEFINE('_WRAPPER_LINK', 'Ссылка Wrapper&prime;а');
DEFINE('_MAXIMUM_LEVELS', 'Максимально уровней');
DEFINE('_NOTE_MENU_ITEMS1', '* Обратите внимание, что некоторые пункты меню входят в несколько групп, но они относятся к одному типу меню.');
DEFINE('_MENU_ITEMS_OTHER', 'Разное');
DEFINE('_MENU_ITEMS_SEND', 'Отправка');
DEFINE('_COMPONENTS', 'Компоненты');
DEFINE('_LINKS', 'Ссылки');
DEFINE('_MOVE_MENU_ITEMS', 'Перемещение пунктов меню');
DEFINE('_MENU_ITEMS_TO_MOVE', 'Перемещаемые пункты меню');
DEFINE('_COPY_MENU_ITEMS', 'Копирование пунктов меню');
DEFINE('_COPY_MENU_ITEMS_TO', 'Копировать в меню');
DEFINE('_CHANGE_THIS_NEWSFEED', 'Изменить эту ленту новостей');
DEFINE('_CHANGE_THIS_CONTACT', 'Изменить этот контакт');
DEFINE('_CHANGE_THIS_CONTENT', 'Изменить это содержимое');
DEFINE('_CHANGE_THIS_STATIC_CONTENT', 'Изменить это статичное содержимое');
DEFINE('_MENU_NEXT', 'Далее');
DEFINE('_MENU_BACK', 'Назад');

/* administrator components com_messages */
DEFINE('_PRIVATE_MESSAGES', 'Личные сообщения');
DEFINE('_MAIL_FROM', 'От');
DEFINE('_MAIL_READED', 'Прочитано');
DEFINE('_MAIL_NOT_READED', 'Не прочитано');
DEFINE('_PRIVATE_MESSAGES_SETTINGS', 'Настройки личных сообщений');
DEFINE('_BLOCK_INCOMING_MAIL', 'Заблокировать входящую почту');
DEFINE('_SEND_NEW_MESSAGES', 'Посылать мне новые сообщения');
DEFINE('_AUTO_PURGE_MESSAGES', 'Автоматическая очистка сообщений');
DEFINE('_AUTO_PURGE_MESSAGES2', 'старше');
DEFINE('_AUTO_PURGE_MESSAGES3', 'дней');
DEFINE('_VIEW_PRIVATE_MESSAGES', 'Просмотр персональных сообщений');
DEFINE('_MESSAGE_SEND_DATE', 'Отправлено');
DEFINE('_PLEASE_ENTER_MAIL_SUBJECT', 'Вы должны ввести название темы');
DEFINE('_PLEASE_ENTER_MESSAGE_BODY', 'Вы должны ввести текст сообщения');
DEFINE('_PLEASE_ENTER_USER', 'Вы должны выбрать получателя');
DEFINE('_NEW_PERSONAL_MESSAGE', 'Новое персональное сообщение');
DEFINE('_MAIL_TO', 'Кому');
DEFINE('_MAIL_ANSWER', 'Ответить');

/* administrator components com_syndicate */
DEFINE('_NEWS_EXPORT_SETUP', 'Настройки экспорта новостей');
DEFINE('_RSS_EXPORT', 'RSS экспорт');
DEFINE('_RSS_EXPORT_SETUP', 'Управление настройками экспорта новостей');

/* administrator components com_statistics */
DEFINE('_STAT_BROWSERS_AND_OSES', 'Статистика по браузерам, ОС и доменам');
DEFINE('_BROWSERS', 'Браузеры');
DEFINE('_DOMAINS', 'Домены');
DEFINE('_DOMAIN', 'Домен');
DEFINE('_PAGES_HITS', 'Статистика посещения страниц');
DEFINE('_CONTENT_TITLE', 'Заголовок содержимого');
DEFINE('_SEARCH_QUERIES', 'Поисковые запросы');
DEFINE('_LOG_SEARCH_QUERIES', 'сбор данных');
DEFINE('_DISALLOWED', 'Запрещено');
DEFINE('_LOG_LOW_PERFOMANCE', 'Активация этого параметра может очень сильно снизить производительность сайта при большой посещаемости');
DEFINE('_HIDE_SEARCH_RESULTS', 'Скрыть результаты поиска');
DEFINE('_SHOW_SEARCH_RESULTS', 'Показать результаты поиска');
DEFINE('_SEARCH_QUERY_TEXT', 'Текст поиска');
DEFINE('_SEARCH_QUERY_COUNT', 'Запросов');
DEFINE('_SHOW_RESULTS', 'Выдано результатов');

/* administrator components com_quickicons */
DEFINE('_QUICK_BUTTONS', 'Кнопки быстрого доступа');
DEFINE('_DISPLAY_METHOD', 'Отображение');
DEFINE('_DISPLAY_ONLY_TEXT', 'Только текст');
DEFINE('_DISPLAY_ONLY_ICON', 'Только значок');
DEFINE('_DISPLAY_TEXT_AND_ICON', 'Значок и текст');
DEFINE('_PRESS_TO_EDIT_ELEMENT', 'Нажмите для редактирования элемента');
DEFINE('_EDIT_BUTTON', 'Редактирование кнопки');
DEFINE('_BUTTON_TEXT', 'Текст кнопки');
DEFINE('_BUTTON_TITLE', 'Подсказка');
DEFINE('_BUTTON_TITLE_TIP', '<strong>Опционально</strong><br />Здесь вы можете определить текст для всплывающей подсказки.<br />Это свойство очень важно заполнить если вы выбрали отображение только картинки!');
DEFINE('_BUTTON_LINK_TIP', 'Ссылка для вызова сайта или компонента.<br />Для компонентов внутри системы ссылка должна быть подобной:<br />index2.php?option=com_joomlastats&task=stats [joomlastats - компонент, &task=stats вызов определённой функции компонента].<br />Внешние ссылки должны быть <strong>абсолютными ссылками</strong> (например: http://www….)!');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW', 'В новом окне');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW_TIP', 'Ссылка будет открыта в новом окне');
DEFINE('_BUTTON_ORDER', 'Расположить после');
DEFINE('_BUTTONS_TAB_GENERAL', 'Общее');
DEFINE('_BUTTONS_TAB_DISPLAY', 'Отображение');
DEFINE('_DISPLAY_BUTTON', 'Отображать');
DEFINE('_PRESS_TO_CHOOSE_ICON', 'Нажмите для выбора картинки (откроется в новом окне)');
DEFINE('_CHOOSE_ICON', 'Выбрать картинку');
DEFINE('_CHOOSE_ICON_TIP', 'Пожалуйста, выберите картинку для этой кнопки. Если хотите загрузить собственную картинку для кнопки, то она должна быть загружена в ../administrator/images - ../images ../images/icons');
DEFINE('_PLEASE_ENTER_NUTTON_LINK', 'Требуется картинка');
DEFINE('_PLEASE_ENTER_BUTTON_TEXT', 'Пожалуйста, заполните поле Текст');
DEFINE('_BUTTON_ERROR_PUBLISHING', 'Ошибка публикации');
DEFINE('_BUTTON_ERROR_UNPUBLISHING', 'Ошибка скрытия');
DEFINE('_BUTTONS_DELETED', 'Кнопки успешно удалены');
DEFINE('_CHANGE_QUICK_BUTTONS', 'Изменить кнопки быстрого доступа');

/* administrator components com_sections */
DEFINE('_SECTION_CHANGES_SAVED', 'Изменения раздела сохранены');
DEFINE('_CONTENT_SECTIONS', 'Разделы содержимого');
DEFINE('_SECTION_NAME', 'Название раздела');
DEFINE('_SECTION_CATEGORIES', 'Категорий');
DEFINE('_SECTION_CONTENT_ITEMS', 'Активных');
DEFINE('_SECTION_CONTENT_ITEMS_IN_TRASH', 'В корзине');
DEFINE('_VIEW_SECTION_CATEGORIES', 'Просмотр категорий раздела');
DEFINE('_VIEW_SECTION_CONTENT', 'Просмотр содержимого раздела');
DEFINE('_NEW_SECTION_MASK', 'Новый раздел');
DEFINE('_CHOOSE_MENU_ITEM_NAME', 'Пожалуйста, введите имя для этого пункта меню');
DEFINE('_ENTER_SECTION_NAME', 'Раздел должен иметь название');
DEFINE('_ENTER_SECTION_TITLE', 'Раздел должен иметь заголовок');
DEFINE('_SECTION_ALREADY_EXISTS', 'Уже имеется раздел с таким названием. Пожалуйста, измените название раздела.');
DEFINE('_SECTION_DETAILS', 'Детали раздела');
DEFINE('_SECTION_USED_IN', 'Используется в');
DEFINE('_MENU_SHORT_NAME', 'Короткое имя для меню');
DEFINE('_SECTION_NAME_OF_CATEGORY', 'категории');
DEFINE('_SECTION_NAME_OF_SECTION', 'раздела');
DEFINE('_SECTION_NAME_TIP', 'Длинное название, отображаемое в заголовках');
DEFINE('_SECTION_NEW_MENU_LINK', 'Эта функция создаст новый пункт в выбранном вами меню');
DEFINE('_CHOOSE_MENU', 'Выберите меню');
DEFINE('_CHOOSE_MENU_TYPE', 'Выберите тип меню');
DEFINE('_SECTION_COPYING', 'Копирование раздела');
DEFINE('_SECTION_COPY_NAME', 'Название копии раздела');
DEFINE('_SECTION_COPY_DESCRIPTION', 'Во вновь созданный раздел будут<br />скопированы перечисленные категории<br />и все перечисленные объекты<br />содержимого категорий.');
DEFINE('_MASS_CONTENT_ADD', 'Массовое добавление');
DEFINE('_NEW_CAT_SECTION_ON_NEW_LINE', 'Каждая новая Категория/Раздел должны начинаться с новой строки');
DEFINE('_MASS_ADD_AS', 'Добавить как');
DEFINE('_SECTIONS', 'Разделы');
DEFINE('_CATEGORIES', 'Категории');
DEFINE('_CATEGORIES_WILL_BE_IN_SECTION', 'Категории буду принадлежать разделу');
DEFINE('_CONTENT_WILL_BE_IN_CATEGORY', 'Содержимое будет принадлежать категории');
DEFINE('_ADD_SECTIONS_RESULT', 'Результат добавления разделов');
DEFINE('_ADD_CATEGORIES_RESULT', 'Результат добавления категорий');
DEFINE('_ADD_CONTENT_RESULT', 'Результат добавления содержимого');
DEFINE('_ERROR_WHEN_ADDING', 'произошла ошибка при добавлении');
DEFINE('_SECTION_IS_BEING_EDITED_BY_ADMIN', 'Раздел в настоящее время редактируется другим администратором');
DEFINE('_SECTION_TABLE', 'Таблица раздела');
DEFINE('_SECTION_BLOG', 'Блог раздела');
DEFINE('_SECTION_BLOG_ARCHIVE', 'Блог архива раздела');
DEFINE('_SECTION_SAVED', 'Раздел сохранен');
DEFINE('_CHOOSE_SECTION_TO_DELETE', 'Выберите раздел для удаления');
DEFINE('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', 'Разделы не могут быть удалены, т.к. содержат категории');
DEFINE('_CHOOSE_SECTION_FOR', 'Выберите раздел для');
DEFINE('_CANNOT_PUBLISH_EMPTY_SECTION', 'Невозможно опубликовать пустой раздел');
DEFINE('_SECTION_CONTENT_COPYED', 'Выбранное содержимое раздела было скопировано в раздел');
DEFINE('_MENU_MASS_ADD', 'Добавить еще');

/* administrator components com_poll */
DEFINE('_POLL', 'Опрос');
DEFINE('_POLLS', 'Опросы');
DEFINE('_POLL_HEADER', 'Заголовок опроса');
DEFINE('_POLL_LAG', 'Задержка');
DEFINE('_CHANGE_POLL', 'Изменить опрос');
DEFINE('_ENTER_POLL_NAME', 'Опрос должен иметь название');
DEFINE('_ENTER_POLL_LAG', 'Задержка между ответами не должна быть нулевой');
DEFINE('_POLL_DETAILS', 'Детали опроса');
DEFINE('_POLL_LAG_QUESIONS', 'Задержка между ответами');
DEFINE('_POLL_LAG_QUESIONS2', 'секунд между принятием голосов');
DEFINE('_POLL_OPTION', 'Вариант ответа');
DEFINE('_POLL_OPTIONS', 'Варианты ответов');
DEFINE('_POLL_HITS', 'Голосов');
DEFINE('_POLL_GRAFIC', 'График');
DEFINE('_POLL_IS_BEING_EDITED_BY_ADMIN', 'Опрос в настоящее время редактируется другим администратором');

/* administrator components com_newsfeeds */
DEFINE('_NEWSFEEDS_MANAGEMENT', 'Управление лентами новостей');
DEFINE('_NEWSFEED_TITLE', 'Лента новостей');
DEFINE('_NEWSFEED_ON_SITE', 'На сайте');
DEFINE('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', 'Кол-во статей');
DEFINE('_NEWSFEED_CACHE_TIME', 'Время кэша (секунд)');
DEFINE('_CHANGE_NEWSFEED', 'Изменить ленту новостей');
DEFINE('_PLEASE_ENTER_NEWSFEED_NAME', 'Пожалуйста, введите название ленты');
DEFINE('_PLEASE_ENTER_NEWSFEED_LINK', 'Пожалуйста, введите ссылку ленты новостей');
DEFINE('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', 'Пожалуйста, введите количество статей для отображения');
DEFINE('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', 'Пожалуйста, введите время обновления кэша');
DEFINE('_NEWSFEED_LINK', 'Ссылка');
DEFINE('_NEWSFEED_DECODE_FROM_UTF', 'Перекодировать из UTF-8');

/* administrator components com_modules */
DEFINE('_ALL_MODULE_CHANGES_SAVED', 'Все изменения модуля успешно сохранены');
DEFINE('_MODULES', 'Модули');
DEFINE('_MODULE_NAME', 'Название модуля');
DEFINE('_MODULE_POSITION', 'Позиция');
DEFINE('_ASSIGN_TO_URL', 'Привязка к URL');
DEFINE('_ASSIGN_TO_URL_TIP', 'Пример:<br /><br />!option=com_content&task=view&id=4<br />option=com_content&task=view<br />option=com_content&task=blogcategory&id>4<br /><br />! - на этих страницах модуль не отображается<br />= < > != равно, меньше, больше, не равно - знаки сравнения для числовых параметров');
DEFINE('_MODULE_PAGES', 'Страницы');
DEFINE('_MODULE_PAGES_SOME', 'Некоторые');
DEFINE('_SHOW_TITLE', 'Показывать заголовок');
DEFINE('_MODULE_ORDER', 'Порядок модуля');
DEFINE('_MODULE_PAGE_MENU_ITEMS', 'Страницы/Пункты меню');
DEFINE('_MODULE_USER_CONTENT', 'Пользовательский код/Содержимое модуля');
DEFINE('_MODULE_COPIED', 'Модуль скопирован');
DEFINE('_CANNOT_DELETE_MOD_MAINMENU', 'Вы не можете удалить модуль mod_mainmenu, отображаемый как &laquo;mainmenu&raquo;, т.к. это ядро меню');
DEFINE('_CANNOT_DELETE_MODULES', 'Модули не могут быть удалены, т.к. они могут быть только деинсталлированы, как все модули Joostina.');
DEFINE('_PREVIEW_ONLY_CREATED_MODULES', 'Вы можете просмотреть только &laquo;созданные&raquo; модули');

/* administrator components com_modules */
DEFINE('_WEBLINKS_MANAGEMENT', 'Управление web-ссылками');
DEFINE('_WEBLINKS_HITS', 'Переходов');
DEFINE('_CHANGE_WEBLINK', 'Изменить web-ссылку');
DEFINE('_ENTER_WEBLINK_TITLE', 'Web-ссылка должна иметь заголовок');
DEFINE('_PLEASE_ENTER_URL', 'Вы должны ввести URL');
DEFINE('_WEBLINK_URL', 'Web-ссылка');
DEFINE('_WEBLINK_NAME', 'Название');

/* administrator components com_jwmmxtd */
DEFINE('_RENAME', 'Переименовать');
DEFINE('_JWMM_DIRECTORIES', 'Каталогов');
DEFINE('_JWMM_FILES', 'Файлов');
DEFINE('_JWMM_MOVE', 'Переместить');
DEFINE('_JWMM_BYTES', 'байт');
DEFINE('_JWMM_KBYTES', 'Кб');
DEFINE('_JWMM_MBYTES', 'Мб');
DEFINE('_JWMM_DELETE_FILE_CONFIRM', 'Удалить файл');
DEFINE('_CLICK_TO_PREVIEW', 'Нажмите для просмотра');
DEFINE('_JWMM_FILESIZE', 'Размер');
DEFINE('_WIDTH', 'Ширина');
DEFINE('_HEIGHT', 'Высота');
DEFINE('_UNPACK', 'Распаковать');
DEFINE('_JWMM_VIDEO_FILE', 'Видео файл');
DEFINE('_JWMM_HACK_ATTEMPT', 'Попытка взлома…');
DEFINE('_JWMM_DIRECTORY_NOT_EMPTY', 'Каталог не пустой. Пожалуйста, удалите сначала содержимое внутри каталога!');
DEFINE('_JWMM_DELETE_CATALOG', 'Удалить каталог');
DEFINE('_JWMM_SAFE_MODE_WARNING', 'При активированном параметре SAFE MODE возможны проблемы с созданием каталогов');
DEFINE('_JWMM_CATALOG_CREATED', 'Создан каталог');
DEFINE('_JWMM_CATALOG_NOT_CREATED', 'Создан не каталог');
DEFINE('_JWMM_FILE_DELETED', 'Файл успешно удалён');
DEFINE('_JWMM_FILE_NOT_DELETED', 'Файл не удалён');
DEFINE('_JWMM_DIRECTORY_DELETED', 'Каталог удалён');
DEFINE('_JWMM_DIRECTORY_NOT_DELETED', 'Каталог не удалён');
DEFINE('_JWMM_RENAMED', 'Переименовано');
DEFINE('_JWMM_NOT_RENAMED', 'Не переименовано');
DEFINE('_JWMM_COPIED', 'Скопировано');
DEFINE('_JWMM_NOT_COPIED', 'Не скопировано');
DEFINE('_JWMM_FILE_MOVED', 'Файл перемещён');
DEFINE('_JWMM_FILE_NOT_MOVED', 'Файл не перемещён');
DEFINE('_TMP_DIR_CLEANED', 'Временный каталог полностью очищен');
DEFINE('_TMP_DIR_NOT_CLEANED', 'Временный каталог не очищен');
DEFINE('_FILES_UNPACKED', 'файл(ов) распакованы');
DEFINE('_ERROR_WHEN_UNPACKING', 'Ошибка распаковки');
DEFINE('_FILE_IS_NOT_A_ZIP', 'Файл не является корректным zip архивом');
DEFINE('_FILE_NOT_EXIST', 'Файл не существует');
DEFINE('_IMAGE_SAVED_AS', 'Отредактированное изображение сохранено как');
DEFINE('_IMAGE_NOT_SAVED', 'Изображение НЕ сохранено');
DEFINE('_FILES_NOT_UPLOADED', 'Файл(ы) НЕ загружены на сервер');
DEFINE('_FILES_UPLOADED', 'Файлы загружены');
DEFINE('_DIRECTORIES', 'Каталоги');
DEFINE('_JWMM_FILE_NAME_WARNING', 'Пожалуйста, не используйте в названиях пробелы и спецсимволы');
DEFINE('_JWMM_MEDIA_MANAGER', 'Медиа менеджер');
DEFINE('_JWMM_CREATE_DIRECTORY', 'Создать каталог');
DEFINE('_UPLOAD_FILE', 'Загрузить файл');
DEFINE('_JWMM_FILE_PATH', 'Местоположение');
DEFINE('_JWMM_UP_TO_DIRECTORY', 'Перейти на каталог выше');
DEFINE('_JWMM_RENAMING', 'Переименование');
DEFINE('_JWMM_NEW_NAME', 'Новое имя (включая расширение!)');
DEFINE('_CHOOSE_DIR_TO_COPY', 'Выберите каталог для копирования');
DEFINE('_JWMM_COPY_TO', 'Копировать в');
DEFINE('_CHOOSE_DIR_TO_MOVE', 'Выберите каталог для перемещения');
DEFINE('_JWMM_MOVE_TO', 'Переместить в');
DEFINE('_CHOOSE_DIR_TO_UNPACK', 'Выберите каталог для распаковки');
DEFINE('_DERICTORY_TO_UNPACK', 'Каталог распаковки');
DEFINE('_NUMBER_OF_IMAGES_IN_TMP_DIR', 'Число изображений во временном каталоге');
DEFINE('_CLEAR_DIRECTORY', 'Очистить каталог');
DEFINE('_JWMM_ERROR_EDIT_FILE', 'Ошибка при обработке файла');
DEFINE('_JWMM_EDIT_IMAGE', 'Редактирование изображения');
DEFINE('_JWMM_IMAGE_RESIZE', 'Расширение изображения');
DEFINE('_JWMM_IMAGE_CROP', 'Обрезать');
DEFINE('_JWMM_IMAGE_SIZE', 'Размеры');
DEFINE('_JWMM_X_Y_POSITION', 'X и Y координаты');
DEFINE('_JWMM_BY_HEIGHT', 'вертикали');
DEFINE('_JWMM_BY_WIDTH', 'горизонтали');
DEFINE('_JWMM_CROP_TOP', 'Сверху');
DEFINE('_JWMM_CROP_LEFT', 'Слева');
DEFINE('_JWMM_CROP_RIGHT', 'Справа');
DEFINE('_JWMM_CROP_BOTTOM', 'Снизу');
DEFINE('_JWMM_ROTATION', 'Поворот');
DEFINE('_JWMM_CHOOSE', '-выбор-');
DEFINE('_JWMM_MIRROR', 'Отражение');
DEFINE('_JWMM_VERICAL', 'вертикали');
DEFINE('_JWMM_HORIZONTAL', 'горизонтали');
DEFINE('_JWMM_GRADIENT_BORDER', 'Градиентная рамка');
DEFINE('_JWMM_SIZE_PX', 'Размер px');
DEFINE('_JWMM_TOP_LEFT', 'Сверху-Слева');
DEFINE('_JWMM_PRESS_TO_CHOOSE_COLOR', 'Нажмите для выбора цвета');
DEFINE('_JWMM_BOTTOM_RIGHT', 'Справа-Снизу');
DEFINE('_JWMM_BORDER', 'Бордюр');
DEFINE('_COLOR', 'Цвет');
DEFINE('_JWMM_ALL_BORDERS', 'Все бордюры');
DEFINE('_JWMM_TOP', 'Сверху');
DEFINE('_JWMM_LEFT', 'Слева');
DEFINE('_JWMM_RIGHT', 'Справа');
DEFINE('_JWMM_BOTTOM', 'Снизу');
DEFINE('_JWMM_BRIGHTNESS', 'Яркость');
DEFINE('_JWMM_CONTRAST', 'Контраст');
DEFINE('_JWMM_ADDITIONAL_ACTIONS', 'Дополнительные действия');
DEFINE('_JWMM_GRAY_SCALE', 'Градиент серого');
DEFINE('_JWMM_NEGATIVE', 'Негатив');
DEFINE('_JWMM_ADD_TEXT', 'Добавить текст');
DEFINE('_JWMM_TEXT', 'Текст');
DEFINE('_JWMM_TEXT_COLOR', 'Цвет текста');
DEFINE('_JWMM_TEXT_FONT', 'Шрифт текста');
DEFINE('_JWMM_TEXT_SIZE', 'Размер текста');
DEFINE('_JWMM_ORIENTATION', 'Ориентация');
DEFINE('_JWMM_BG_COLOR', 'Цвет фона');
DEFINE('_JWMM_XY_POSITION', 'Расположение по X и Y');
DEFINE('_JWMM_XY_PADDING', 'Отступы по X и Y');
DEFINE('_JWMM_FIRST', 'Первая');
DEFINE('_JWMM_SECOND', 'Вторая');
DEFINE('_JWMM_THIRDTH', 'Третья…');
DEFINE('_JWMM_CANCEL_ALL', 'Отменить всё');

/* administrator components com_joomlaxplorer */
DEFINE('_MENU_GZIP', 'Упаковать');
DEFINE('_MENU_MOVE', 'Переместить');
DEFINE('_MENU_CHMOD', 'Смена прав');

/* administrator components com_joomlapack */
DEFINE('_JP_BACKUPPING', 'Резервирование');
DEFINE('_JP_PHPINFO', '-Информация о PHP-');
DEFINE('_JP_FREEMEMORY', 'Свободно памяти');
DEFINE('_JP_GZIP_ENABLED', 'GZIP сжатие: доступно (это хорошо)');
DEFINE('_JP_GZIP_NOT_ENABLED', 'GZIP сжатие: недоступно (это плохо)');
DEFINE('_JP_START_BACKUP_DB', 'Начало резервирования базы данных');
DEFINE('_JP_START_BACKUP_FILES', 'Начало резервирования всех данных сайта');
DEFINE('_JP_CUBE_ON_STEP', 'CUBE: Работа на шаге');
DEFINE('_JP_CUBE_STEP_FINISHED', 'CUBE: Шаг завершён ');
DEFINE('_JP_CUBE_FINISHED', 'CUBE: Завершено!');
DEFINE('_JP_ERROR_ON_STEP', 'CUBE: Ошибка на шаге ');
DEFINE('_JP_CLEANUP', 'Очистка');
DEFINE('_JP_RECURSING_DELETION', 'Рекурсивное удаление ');
DEFINE('_JP_NOT_FILE', 'Удаление <strong>ЭТО ФАЙЛ, НЕ КАТАЛОГ!</strong>');
DEFINE('_JP_ERROR_DEL_DIRECTORY', 'Ошибка удаления каталога. Проверьте права доступа');
DEFINE('_JP_QUICK_MODE', 'Режим однопроходности');
DEFINE('_JP_QUICK_MODE_ON_STEP', 'Используется быстрый алгоритм на шаге');
DEFINE('_JP_CANNOT_USE_QUICK_MODE', 'Невозможно использовать быстрый алгоритм на шаге');
DEFINE('_JP_MULTISTEP_MODE', 'Режим многопроходности');
DEFINE('_JP_MULTISTEP_MODE_ON_STEP', 'Используется медленный алгоритм на шаге');
DEFINE('_JP_MULTISTEP_MODE_ERROR', 'Ошибка выполнения медленного алгоритма на шаге');
DEFINE('_JP_SMART_MODE', 'Ускоренный режим');
DEFINE('_JP_SMART_MODE_ON_STEP', 'Выполнение ускоренного режима на шаге');
DEFINE('_JP_SMART_MODE_ERROR', 'Ошибка выполнения ускоренного режима на шаге');
DEFINE('_JP_CHOOSED_ALGO', 'Выбран');
DEFINE('_JP_ALGORITHM_FOR', 'алгоритм для');
DEFINE('_JP_NEXT_STEP_BACKUP_DB', 'Следующий шаг &rarr; Резервирование базы');
DEFINE('_JP_NEXT_STEP_FILE_LIST', 'Следующий шаг &rarr; Создание списка файлов');
DEFINE('_JP_NEXT_STEP_FINISHING', 'Следующий шаг &rarr; Завершение');
DEFINE('_JP_NEXT_STEP_GZIP', 'Следующий шаг &rarr; Упаковка');
DEFINE('_JP_NEXT_STEP_FINISHED', 'Следующий шаг &rarr; Завершено');
DEFINE('_JP_NO_NEXT_STEP', 'Следующий шаг не требуется; всё уже завершено');
DEFINE('_JP_NO_CUBE', 'Нет существующего CUBE; создание нового');
DEFINE('_JP_CURRENT_STEP', 'Текущий шаг');
DEFINE('_JP_UNPACKING_CUBE', 'Распаковка существующего CUBE');
DEFINE('_JP_TIMEOUT', 'Время на выполнение операции вышло, но операция не завершена');
DEFINE('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine: Получение списка таблиц');
DEFINE('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine: Резервирование только базы данных');
DEFINE('_JP_ONE_FILE_STORE', 'CDBBackupEngine: Задано объединение файлом');
DEFINE('_JP_FILE_STRUCTURE', 'CDBBackupEngine: Файл структуры');
DEFINE('_JP_DATAFILE', 'CDBBackupEngine: Файл данных');
DEFINE('_JP_FILE_DELETION', 'CDBBackupEngine: Удаление файлов');
DEFINE('_JP_FIRST_STEP', 'CDBBackupEngine: Первый проход');
DEFINE('_JP_ALL_COMPLETED', 'CDBBackupEngine: Всё завершено');
DEFINE('_JP_START_TICK', 'CDBBackupEngine: Начало обработки');
DEFINE('_JP_READY_FOR_TABLE', 'Выполнено для таблицы');
DEFINE('_JP_DB_BACKUP_COMPLETED', 'Резервирование базы данных завершено');
DEFINE('_JP_NEW_FRAGMENT_ADDED', 'Добавлен новый фрагмент');
DEFINE('_JP_KERNEL_TABLES', 'Таблицы ядра');
DEFINE('_JP_FIRST_STEP_2', 'Первый проход');
DEFINE('_JP_NEXT_VALUE', 'Выходное значение');
DEFINE('_JP_SKIP_TABLE', 'Пропуск таблицы');
DEFINE('_JP_GETTING', 'Получение');
DEFINE('_JP_COLUMN_FROM', 'столбца из');
DEFINE('_JP_ERROR_WRITING_FILE', 'Ошибка записи в файл');
DEFINE('_JP_CANNOT_SAVE_DUMP', 'Невозможно сохранить в дамп');
DEFINE('_JP_CHECK_RESULTS', 'Результаты проверки');
DEFINE('_JP_ANALYZE_RESULTS', 'Результаты анализа');
DEFINE('_JP_OPTIMIZE_RESULTS', 'Результаты оптимизации');
DEFINE('_JP_REPAIR_RESULTS', 'Результаты исправления');
DEFINE('_JP_GETTING_DIRS_LIST', 'Получение списка каталогов для исключения из резервной копии');
DEFINE('_JP_GZIP_FIRST_STEP', 'Упаковка: первый шаг');
DEFINE('_JP_GZIP_FINISHED', 'Упаковка: Завершено');
DEFINE('_JP_PACK_FINISHED', 'Завершение архивирования');
DEFINE('_JP_GZIP_OF_FRAGMENT', 'Архивирование фрагмента #');
DEFINE('_JP_CURRENT_FRAGMENT', ' Текущий фрагмент');
DEFINE('_JP_DELETE_PATH', ' путь для удаления :');
DEFINE('_JP_PATH_TO_DELETE', ' путь для добавления ');
DEFINE('_JP_SAVING_ARCHIVE_INFO', 'Сохранение информации о архивных объектах');
DEFINE('_JP_LOADING_ARCHIVE_INFO', 'Загрузка информации о архивных объектах');
DEFINE('_JP_ADDING_FILE_TO_ARCHIVE', 'Добавлений файлов в архив');
DEFINE('_JP_ARCHIVING', 'Архивирование');
DEFINE('_JP_ARCHIVE_COMPLETED', 'Архивирование завершено');
DEFINE('_JP_BACKUP_CONFIG', 'Конфигурация резервного копирования данных');
DEFINE('_JP_CONFIG_SAVING', 'Сохранение настроек');
DEFINE('_JP_MAIN_CONFIG', 'Основные настройки');
DEFINE('_JP_CONFIG_DIRECTORY', 'Каталог сохранения архивов');
DEFINE('_JP_ARCHIVE_NAME', 'Название архива');
DEFINE('_JP_LOG_LEVEL', 'Уровень ведения лога');
DEFINE('_JP_ADDITIONAL_CONFIG', 'Дополнительные настройки');
DEFINE('_JP_DELETE_PREFIX', 'Удалять преффикс таблиц');
DEFINE('_JP_EXPORT_TYPE', 'Тип экспорта базы данных');
DEFINE('_JP_FILELIST_ALGORITHM', 'Обработка файлов');
DEFINE('_JP_CONFIG_DB_BACKUP', 'Обработка базы');
DEFINE('_JP_CONFIG_GZIP', 'Сжатие файлов');
DEFINE('_JP_CONFIG_DUMP_GZIP', 'Сжатие дампа базы данных');
DEFINE('_JP_AVAILABLE', '<strong class="green">доступно</strong>');
DEFINE('_JP_NOT_AVAILABLE', '<strong class="red">недоступно</strong>');
DEFINE('_JP_MYSQL4_COMPAT', 'В режиме совместимости с MySQL 4');
DEFINE('_JP_NO_GZIP', 'Не архивировать (.sql)');
DEFINE('_JP_GZIP_TAR_GZ', 'Архивировать в TAR.GZ (.tar.gz)');
DEFINE('_JP_GZIP_ZIP', 'Архивировать в ZIP (.zip)');
DEFINE('_JP_QUICK_METHOD', 'Быстро - один проход');
DEFINE('_JP_STANDARD_METHOD', 'Рекомендовано - Стандартно');
DEFINE('_JP_SLOW_METHOD', 'Медленно - Мультипроходность');
DEFINE('_JP_LOG_ERRORS_OLY', 'Только ошибки');
DEFINE('_JP_LOG_ERROR_WARNINGS', 'Ошибки и предупреждения');
DEFINE('_JP_LOG_ALL', 'Вся информация');
DEFINE('_JP_LOG_ALL_DEBUG', 'Вся информация и отладка');
DEFINE('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', 'Не сохранять каталоги в резервной копии');
DEFINE('_FILE_NAME', 'Имя файла');
DEFINE('_JP_DOWNLOAD_FILE', 'Скачать');
DEFINE('_JP_REALLY_DELETE_FILE', 'Действительно удалить файл?');
DEFINE('_JP_FILE_CREATION_DATE', 'Создан');
DEFINE('_JP_NO_BACKUPS', 'Файлы резервных копий отсутствуют');
DEFINE('_JP_ACTIONS_LOG', 'Лог выполнения действий');
DEFINE('_JP_BACKUP_MANAGEMENT', 'Резервное копирование');
DEFINE('_JP_CREATE_BACKUP', 'Создать архив данных');
DEFINE('_JP_DB_MANAGEMENT', 'Управление базой данных');
DEFINE('_JP_DONT_SAVE_DIRECTORIES', 'Не сохранять каталоги');
DEFINE('_JP_CONFIG', 'Настройки сохранения');
DEFINE('_JP_ERRORS_TMP_DIR', 'Обнаружены ошибки, проверьте возможность записи в каталог хранения резервных копий');
DEFINE('_JP_BACKUP_CREATION', 'Создание резервной копии данных');
DEFINE('_JP_DONT_CLOSE_BROWSER_WINDOW', 'Пожалуйста, не закрывайте окно браузера и не переходите с этой страницы до окончания резервирования и отображения соответствующего сообщения.');
DEFINE('_JP_ERRORS_VIEW_LOG', 'В ходе работы обнаружены ошибки, пожалуйста, <a href="index2.php?option=com_joomlapack&act=log">посмотрите лог</a> работы и выясните причину.');
DEFINE('_JP_BACKUP_SUCCESS', 'Резервирование данных сайта выполнено успешно. Скачать');
DEFINE('_JP_CREATION_FILELIST', '1. Создание списка файлов для архивирования.');
DEFINE('_JP_BACKUPPING_DB', '2. Архивирование базы данных.');
DEFINE('_JP_CREATION_OF_ARCHIVE', '3. Создание итогового архива.');
DEFINE('_JP_ALL_COMPLETED_2', '4. Всё выполнено');
DEFINE('_JP_PROGRESS', 'Обработка');
DEFINE('_JP_TABLES', 'Таблицы');
DEFINE('_JP_TABLE_ROWS', 'Записей');
DEFINE('_JP_SIZE', 'Размер');
DEFINE('_JP_INCREMENT', 'Инскремент');
DEFINE('_JP_CREATION_DATE', 'Создана');
DEFINE('_JP_CHECKING', 'Проверка');
DEFINE('_JP_FULL_BACKUP', 'Полный резерв');
DEFINE('_JP_BACKUP_BASE', 'Резервировать базу');
DEFINE('_JP_BACKUP_PANEL', 'Панель резервирования');

/* administrator modules mod_components */
DEFINE('_FULL_COMPONENTS_LIST', 'Полный список компонентов');

/* administrator modules mod_fullmenu */
DEFINE('_MENU_CMS_FEATURES', 'Управление основными возможностями системы');
DEFINE('_MENU_GLOBAL_CONFIG', 'Глобальная конфигурация');
DEFINE('_MENU_GLOBAL_CONFIG_TIP', 'Настройка основных параметров конфигурации системы');
DEFINE('_MENU_LANGUAGES', 'Языковые пакеты');
DEFINE('_MENU_LANGUAGES_TIP', 'Управление языковыми файлами');
DEFINE('_MENU_SITE_PREVIEW', 'Предпросмотр сайта');
DEFINE('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', 'В новом окне');
DEFINE('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', 'Внутри');
DEFINE('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', 'Внутри с позициями');
DEFINE('_MENU_SITE_STATS', 'Статистика сайта');
DEFINE('_MENU_SITE_STATS_TIP', 'Просмотр статистики по сайту');
DEFINE('_MENU_STATS_BROWSERS', 'Браузеры, ОС, домены');
DEFINE('_MENU_STATS_BROWSERS_TIP', 'Статистика посещений сайта по браузерам, ОС и доменам');
DEFINE('_MENU_SEARCHES', 'Поисковые запросы');
DEFINE('_MENU_SEARCHES_TIP', 'Статистика поисковых запросов по сайту');
DEFINE('_MENU_PAGE_STATS', 'Статистика посещения страниц');
DEFINE('_MENU_TEMPLATES_TIP', 'Управление шаблонами');
DEFINE('_MENU_SITE_TEMPLATES', 'Шаблоны сайта');
DEFINE('_MENU_NEW_SITE_TEMPLATE', 'Установка нового шаблона');
DEFINE('_MENU_ADMIN_TEMPLATES', 'Шаблоны админцентра');
DEFINE('_MENU_NEW_ADMIN_TEMPLATE', 'Установка нового шаблона');
DEFINE('_MENU', 'Меню');
DEFINE('_MENU_TRASH', 'Корзина меню');
DEFINE('_CONTENT_IN_SECTIONS', 'Содержимое по разделам');
DEFINE('_CONTENT_IN_SECTION', 'Содержимое в разделе');
DEFINE('_SECTION_ARCHIVE', 'Архив раздела');
DEFINE('_SECTION_CATEGORIES2', 'Категории раздела');
DEFINE('_ADD_CONTENT_ITEM', 'Добавить Новость/Статью');
DEFINE('_ADD_STATIC_CONTENT', 'Добавить статичное содержимое');
DEFINE('_CONTENT_ON_FRONTPAGE', 'Содержимое на главной');
DEFINE('_CONTENT_TRASH', 'Корзина содержимого');
DEFINE('_ALL_COMPONENTS', 'Все компоненты…');
DEFINE('_EDIT_COMPONENTS_MENU', 'Редактировать меню компонентов');
DEFINE('_COMPONENTS_INSTALL_UNINSTALL', 'Установка/Удаление компонентов');
DEFINE('_MODULES_SETUP', 'Управление модулями');
DEFINE('_MODULES_INSTALL_DEINSTALL', 'Установка/Удаление модулей');
DEFINE('_SITE_MAMBOTS', 'Мамботы сайта');
DEFINE('_MAMBOTS_INSTALL_UNINSTALL', 'Установка/Удаление мамботов');
DEFINE('_SITE_LANGUAGES', 'Языки сайта');
DEFINE('_JOOMLA_TOOLS', 'Инструменты');
DEFINE('_PRIVATE_MESSAGES_CONFIG', 'Настройки сообщений');
DEFINE('_FILE_MANAGER', 'Менеджер файлов');
DEFINE('_SQL_CONSOLE', 'SQL консоль');
DEFINE('_BACKUP_CONFIG', 'Настройки сохранения данных');
DEFINE('_CLEAR_CONTENT_CACHE', 'Очистить кэш содержимого');
DEFINE('_CLEAR_ALL_CACHE', 'Очистить ВЕСЬ кэш');
DEFINE('_SYSTEM_INFO', 'Информация о системе');
DEFINE('_NO_ACTIVE_MENU_ON_THIS_PAGE', 'На этой странице меню не активно');

/* administrator modules mod_latest */
DEFINE('_LAST_ADDED_CONTENT', 'Последнее добавленное содержимое');
DEFINE('_USER_WHO_ADD_CONTENT', 'Добавил');

/* administrator modules mod_latest_users */
DEFINE('_NOW_ON_SITE', 'Сейчас на сайте');
DEFINE('_REGISTERED_USERS_COUNT', 'Зарегистрировано');
DEFINE('_ALL_REGISTERED_USERS_COUNT', 'Всего');
DEFINE('_TODAY_REGISTERED_USERS_COUNT', 'За сегодня');
DEFINE('_WEEK_REGISTERED_USERS_COUNT', 'За неделю');
DEFINE('_MONTH_REGISTERED_USERS_COUNT', 'За месяц');
DEFINE('_ADMINLIST_NEW', 'Новые пользователи');
DEFINE('_ADMINLIST_ENABLE', 'Разрешен');
DEFINE('_ADMINLIST_GROUP', 'Группа');
DEFINE('_ADMINLIST_REGISTERED', 'Зарегистрирован');
DEFINE('_ADMINLIST_ALL', 'всё');

/* administrator modules mod_logged */
DEFINE('_NOW_ON_SITE_REGISTERED', 'Сейчас на сайте авторизованы');

/* administrator modules mod_online */
DEFINE('_ONLINE_USERS', 'Пользователей онлайн');

/* administrator modules mod_popular */
DEFINE('_POPULAR_CONTENT', 'Часто просматриваемое');
DEFINE('_CREATED_CONTENT', 'Создано');
DEFINE('_CONTENT_HITS', 'Просмотров');

/* administrator modules mod_stats */
DEFINE('_MENU_ITEMS_COUNT', 'Пунктов');

/* administrator modules includes admin.php */
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE', 'Пожалуйста, сделайте каталог кэша доступным для записи');
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE2', 'Каталог кэша не доступен для записи');
DEFINE('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc установлено в &laquo;OFF&raquo; вместо &laquo;ON&raquo;');
DEFINE('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals установлено в &laquo;ON&raquo; вместо &laquo;OFF&raquo;');
DEFINE('_RG_EMULATION_ON_OFF', 'Параметр Joostina RG_EMULATION в файле globals.php установлен в &laquo;ONraquo; вместо &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - параметр по умолчанию - для совместимости</span>');
DEFINE('_PHP_SETTINGS_WARNING', 'Следующие настройки PHP не являются оптимальными для <strong>БЕЗОПАСНОСТИ</strong> и их рекомендуется изменить');
DEFINE('_MENU_CACHE_CLEANED', 'Кэш меню панели управления очищен');
DEFINE('_CLEANING_ADMIN_MENU_CACHE', 'Ошибка очистки кэша меню панели управления');
DEFINE('_NO_MENU_ADMIN_CACHE', 'Кэш меню панели управления не обнаружен. Проверьте права доступа на каталог кэша.');

/* administrator modules includes pageNavigation.php */
DEFINE('_NAV_SHOW', 'Показано');
DEFINE('_NAV_SHOW_FROM', 'из');
DEFINE('_NAV_NO_RECORDS', 'Записи не найдены');
DEFINE('_NAV_ORDER_UP', 'Переместить выше');
DEFINE('_NAV_ORDER_DOWN', 'Переместить ниже');

/* administrator modules popups pollwindow.php */
DEFINE('_POLL_PREVIEW', 'Предпросмотр опроса');

/* administrator modules popups uploadimage.php */
DEFINE('_CHOOSE_IMAGE_FOR_UPLOAD', 'Пожалуйста, выберите изображение для загрузки');
DEFINE('_BAD_UPLOAD_FILE_NAME', 'Имена файлов должны состоять из символов алфавита и не должны содержать пробелов');
DEFINE('_IMAGE_ALREADY_EXISST', 'Изображение уже существует');
DEFINE('_FILE_MUST_HAVE_THIS_EXTENSION', 'Файл должен иметь расширение');
DEFINE('_FILE_UPLOAD_UNSUCCESS', 'Загрузка файла неудачна');
DEFINE('_FILE_UPLOAD_SUCCESS', 'Загрузка файла успешно завершена');

/* administrator index.php index2.php index3.php */
DEFINE('_PLEASE_ENTER_PASSWORD', 'Пожалуйста, введите пароль');
DEFINE('_BAD_CAPTCHA_STRING', 'Введен неверный код проверки');
DEFINE('_BAD_USERNAME_OR_PASSWORD', 'Неверные имя пользователя, пароль, или уровень доступа.  Пожалуйста, повторите снова');
DEFINE('_BAD_USERNAME_OR_PASSWORD2', 'Имя или пароль не верны. Повторите ввод.'); // not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
DEFINE('_JOOSTINA_CONTRL_PANEL', 'Панель управления [Joostina]');
DEFINE('_GO_TO_MAIN_ADMIN_PAGE', 'Перейти на главную страницу Панели управления');
DEFINE('_PLEASE_WAIT', 'Ждите…');
DEFINE('_TOGGLE_WYSIWYG_EDITOR', 'Использование визуального редактора');
DEFINE('_DISABLE_WYSIWYG_EDITOR', 'Отключить редактор');
DEFINE('_PRESS_HERE_TO_RELOAD_CAPTCHA', 'Нажмите чтобы обновить изображение');
DEFINE('_SHOW_CAPTCHA', 'Обновить изображение');
DEFINE('_PLEASE_ENTER_CAPTCHA', 'Введите код проверки с картинки:');
DEFINE('_PLEASE_ENABLE_JAVASCRIPT', 'Предупреждение! Javascript должен быть разрешены для правильной работы панели управления администратора!');

/* includes feedcreator.class.php */
DEFINE('_ERROR_CREATING_NEWSFEED', 'Ошибка создания файла ленты новостей. Пожалуйста, проверьте разрешения на запись');

/* includes joomla.php */
DEFINE('_YOU_NEED_TO_AUTH', 'Необходимо авторизоваться');
DEFINE('_ADMIN_SESSION_ENDED', 'Сессия администратора закончилась');
DEFINE('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', 'Вам необходимо авторизоваться. Если включен параметр PHP session.auto_start или выключен параметр session.use_cookies setting, то сначала вы должны их исправить перед тем, как сможете войти');
DEFINE('_WRONG_USER_SESSION', 'Неправильная сессия');
DEFINE('_FIRST', 'Первый');
DEFINE('_LAST', 'Последний');
DEFINE('_MOS_WARNING', 'Внимание!');
DEFINE('_ADM_MENUS_TARGET_CUR_WINDOW', 'текущем окне с панелью навигации');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', 'новом окне с панелью навигации');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', 'новом окне без панели навигации');
DEFINE('_WITH_UNASSIGNED', 'Со свободными');
DEFINE('_CHOOSE_IMAGE', 'Выберите изображение');
DEFINE('_NO_USER', 'Нет пользователя');
DEFINE('_CREATE_CATEGORIES_FIRST', 'Сначала необходимо создать категории');
DEFINE('_NOT_CHOOSED', 'Не выбрано');
DEFINE('_PUBLISHED_VUT_NOT_ACTIVE', 'Опубликовано, но <u>Не активно</u>');
DEFINE('_PUBLISHED_AND_ACTIVE', 'Опубликовано и <u>Активно</u>');
DEFINE('_PUBLISHED_BUT_DATE_EXPIRED', 'Опубликовано, но <u>Истек срок публикации</u>');
DEFINE('_NOT_PUBLISHED', 'Не опубликовано');
DEFINE('_LINK_NAME', 'Название ссылки');
DEFINE('_MENU_EXPIRED', 'Устарело');
DEFINE('_MENU_ITEM_NAME', 'Название пункта');
DEFINE('_CHECKED_OUT', 'Заблокировано');
DEFINE('_PUBLISH_ON_FRONTPAGE', 'Опубликовать на сайте');
DEFINE('_UNPUBLISH_ON_FRONTPAGE', 'Скрыть (Не показывать на сайте)');

/* includes joomla.xml.php */
DEFINE('_DONT_USE_IMAGE', '-Не использовать изображение-');
DEFINE('_DEFAULT_IMAGE', '-Изображение по умолчанию-');

/* includes debug jdebug.php */
DEFINE('_SQL_QUERIES_COUNT', 'Число SQL запросов');

/* includes Cache Lite Lite.php */
DEFINE('_ERROR_DELETING_CACHE', 'Ошибка удаления кэша');
DEFINE('_ERROR_READING_CACHE_DIR', 'Ошибка чтения директории кэша');
DEFINE('_ERROR_READING_CACHE_FILE', 'Ошибка чтения файла кэша');
DEFINE('_ERROR_WRITING_CACHE_FILE', 'Ошибка записи файла кэша');
DEFINE('_SCRIPT_MEMORY_USING', 'Использовано памяти');

/* components com_content */
DEFINE('_YOU_HAVE_NO_CONTENT', 'Нет добавленного Вами содержимого');
DEFINE('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', 'Содержимое сейчас редактируется другим человеком');

/* components com_poll */
DEFINE('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', 'Уже существует модуль с таким названием. Введите другое  название.');

/* components com_registration */
DEFINE('_USER_ACTIVATION_FAILED', '<div class="componentheading">Ошибка активации!</div><p>Активация вашей учетной записи невозможна. Пожалуйста, обратитесь к администрации сайта.</p>');

/* components com_weblinks */
DEFINE('_ENTER_CORRECT_URL', 'Введите правильный URL!');
DEFINE('_ENTER_CORRECT_TITLE', 'Ссылка должна иметь заголовок!');
DEFINE('_ENTER_CORRECT_CAT', 'Вы должны выбрать категорию');
DEFINE('_ENTER_CORRECT_URL1', 'Вы должны ввести URL');

/* components com_xmap */
DEFINE('_XMAP_PAGE', ' страница');

/* administrator index2.php */
DEFINE('_TEMPLATE_NOT_FOUND', 'Шаблон не обнаружен');
DEFINE('_ACCESS_DENIED', 'В доступе отказано');
DEFINE('_CHECKIN_OJECT', 'Разблокировать');

/** includes/pdf.php */
DEFINE('_PDF_GENERATED','Создано:');
DEFINE('_PDF_POWERED','Работает на Joostina!');
?>