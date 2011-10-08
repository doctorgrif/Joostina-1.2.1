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
global $mosConfig_form_date, $mosConfig_live_site, $mosConfig_form_date_full, $month_date, $month;

// Страница сайта не найдена
define('_404', 'Запрошенная страница не найдена.');
define('_404_TEXT', 'Запрашиваемая вами страница отсутствует в принципе или она была удалена некоторое время назад.');
define('_404_FULLTEXT', 'Вы можете <a href="mailto:' . $mosConfig_mailfrom . '" title="E-mail">написать</a> об этом администратору сайта или вернуться на <a href="<' . $mosConfig_live_site . '" title="' . $mosConfig_sitename . '">главную страницу</a>.');
define('_404_RTS', 'Вернуться на сайт.');

define('_SYSERR1', 'Нет поддержки MySQL.');
define('_SYSERR2', 'Невозможно подключиться к серверу базы данных.');
define('_SYSERR3', 'Невозможно подключиться к базе данных.');

// Error 503 (Database Error)
define('_503', 'Извините, сервис временно недоступен.');
define('_503_RTS', 'Вернитесь на сайт позже.');

// common
define('_FAILED_ITEM', 'Запрещенная переменная');
define('_OR', 'или');
define('_IN_SCRIPT', 'в скрипте.');
define('_LANGUAGE', 'ru');
define('_NOT_AUTH', 'Извините, но для просмотра этой страницы у Вас недостаточно прав.');
define('_DO_LOGIN', 'Вы должны авторизоваться или пройти регистрацию.');
define('_VALID_AZ09', 'Пожалуйста, проверьте, правильно ли написано %s.  Имя не должно содержать пробелов, только символы 0-9, a-z, A-Z и иметь длину не менее %d символов.');
define('_VALID_AZ09_USER', 'Пожалуйста, правильно введите %s. Должно содержать только символы 0-9, a-z, A-Z и иметь длину не менее %d символов.');
define('_CMN_YES', 'Да');
define('_CMN_NO', 'Нет');
define('_CMN_SHOW', 'Показать');
define('_CMN_HIDE', 'Скрыть');
define('_CMN_NAME', 'Имя');
define('_CMN_DESCRIPTION', 'Описание');
define('_CMN_SAVE', 'Сохранить');
define('_CMN_APPLY', 'Применить');
define('_CMN_CANCEL', 'Отмена');
define('_CMN_PRINT', 'Печать');
define('_CMN_PDF','PDF');
define('_CMN_RSS','RSS');
define('_CMN_EMAIL', 'E-mail');
define('_CMN_SITEMAP', 'Карта сайта');
define('_ICON_SEP', '|');
define('_CMN_PARENT', 'Родитель');
define('_CMN_ORDERING', 'Сортировка');
define('_CMN_ACCESS', 'Уровень доступа');
define('_CMN_SELECT', 'Выбрать');
define('_CMN_SELECT_PH', 'Подтвердите выбор');
define('_CMN_NEXT', '<span class="pagenav_txt">следующая &rarr;</span>');
//define('_CMN_NEXT_ARROW', '&nbsp;&raquo;');
define('_CMN_PREV', '<span class="pagenav_txt">&larr; предыдущая</span>');
//define('_CMN_PREV_ARROW', '&laquo;&nbsp;');
define('_CMN_SORT_NONE', 'Без сортировки');
define('_CMN_SORT_ASC', 'По возрастанию');
define('_CMN_SORT_DESC', 'По убыванию');
define('_CMN_NEW', 'Создать');
define('_CMN_NONE', 'Нет');
define('_CMN_LEFT', 'Слева');
define('_CMN_RIGHT', 'Справа');
define('_CMN_CENTER', 'По центру');
define('_CMN_ARCHIVE', 'Добавить в архив');
define('_CMN_UNARCHIVE', 'Извлечь из архива');
define('_CMN_TOP', 'Вверху');
define('_CMN_BOTTOM', 'Внизу');
define('_CMN_PUBLISHED', 'Опубликовано');
define('_CMN_UNPUBLISHED', 'Не опубликовано');
define('_CMN_EDIT_HTML', 'Редактировать HTML');
define('_CMN_EDIT_CSS', 'Редактировать CSS');
define('_CMN_DELETE', 'Удалить');
define('_CMN_FOLDER', 'Каталог');
define('_CMN_SUBFOLDER', 'Подкаталог');
define('_CMN_OPTIONAL', 'Не обязательно');
define('_CMN_REQUIRED', 'Обязательно');
define('_CMN_CONTINUE', 'Продолжить');
define('_STATIC_CONTENT', 'Статическое содержимое');
define('_CMN_NEW_ITEM_LAST', 'По умолчанию новые объекты будут добавлены в конец списка. Порядок расположения может быть изменен только после сохранения объекта.');
define('_CMN_NEW_ITEM_FIRST', 'По умолчанию новые объекты будут добавлены в начало списка. Порядок расположения может быть изменен только после сохранения объекта.');
define('_LOGIN_INCOMPLETE', 'Пожалуйста, заполните поля &laquo;Имя пользователя&raquo; и &laquo;Пароль&raquo;.');
define('_LOGIN_BLOCKED', 'Извините, ваша учетная запись заблокирована. За более подробной информацией обратитесь к администратору сайта.');
define('_LOGIN_INCORRECT', 'Неправильное имя пользователя (логин) или пароль. Попробуйте ещё раз.');
define('_LOGIN_NOADMINS', 'Извините, вы не можете войти на сайт. Администраторы на сайте не зарегистрированы.');
define('_CMN_JAVASCRIPT', 'Внимание! Для выполнения данной операции, в вашем браузере должна быть включена поддержка Java-script.');
define('_NEW_MESSAGE', 'Вам пришло новое личное сообщение.');
define('_MESSAGE_FAILED', 'Пользователь заблокировал свой почтовый ящик. Сообщение не доставлено.');
define('_CMN_IFRAMES', 'Эта страница будет отображена некорректно. Ваш браузер не поддерживает вложенные фреймы (IFrame).');
define('_INSTALL_3PD_WARN', 'Предупреждение: Установка сторонних расширений может нарушить безопасность вашего сайта. При обновлении Joostina сторонние расширения не обновляются.<br />Для получения дополнительной информации о мерах защиты своего сайта и сервера, пожалуйста, посетите <a href="http:// forum.joostina.ru" target="_blank" style="color:blue;text-decoration:underline;">Форум Joostina</a>.');
define('_INSTALL_WARN', 'По соображениям безопасности, пожалуйста, удалите каталог <strong>installation</strong> с вашего сервера и обновите страницу.');
define('_TEMPLATE_WARN', '<strong class="red">Файл шаблона не найден!</strong><br />Зайдите в Панель управления сайтом и выберите новый шаблон.');
define('_NO_PARAMS', 'Объект не содержит настраиваемых параметров.');
define('_HANDLER', 'Обработчик для данного типа отсутствует.');

/** мамботы */
define('_TOC_JUMPTO', 'Оглавление');

/* plugin_jw_ajaxvote */
define('_PJA_SAVE', 'Сохранение');
define('_PJA_YOU_VOTE_ADD', 'Ваш голос уже учтён!');
define('_PJA_VOTE', 'голос');
define('_PJA_VOTES', 'голосов');
define('_PJA_THANKS_FULL', 'Спасибо за Ваш голос! Результаты буду обновлены после перерасчета.');
define('_PJA_THANKS', 'Спасибо за Ваш голос!');
define('_PJA_1_5', '1 балл из 5');
define('_PJA_2_5', '2 балла из 5');
define('_PJA_3_5', '3 балла из 5');
define('_PJA_4_5', '4 балла из 5');
define('_PJA_5_5', '5 баллов из 5');

/* joostinasocialbot */
define('_JSB_BEFORE', 'Добавить закладку в социальные сервисы');
define('_JSB_ADD', 'Добавить закладку в');
define('_JSB_AFTER', 'Работает под управлением Joostina CMS!');

/**  содержимое */
define('_READ_MORE', 'Подробнее…');
define('_READ_MORE_REGISTER', 'Только для зарегистрированных пользователей…');
define('_MORE', 'Далее…');
define('_ON_NEW_CONTENT', 'Пользователь [ %s ] добавил новый объект [ %s ]. Раздел: [ %s ]/Категория: [ %s ]');
define('_SEL_CATEGORY', '-Выберите категорию-');
define('_SEL_SECTION', '-Выберите раздел-');
define('_SEL_AUTHOR', '-Выберите автора-');
define('_SEL_POSITION', '-Выберите позицию-');
define('_SEL_TYPE', '-Выберите тип-');
define('_EMPTY_CATEGORY', 'Данная категория не содержит объектов.');
define('_EMPTY_BLOG', 'Нет объектов для отображения!');
define('_NOT_EXIST', 'Извините, страница не найдена.<br />Пожалуйста, вернитесь на главную страницу сайта.');
define('_SUBMIT_BUTTON', 'Отправить');

/** classes/html/modules.php */
define('_BUTTON_VOTE', 'Голосовать');
define('_BUTTON_RESULTS', 'Результаты');
define('_USERNAME', 'Пользователь');
define('_LOST_PASSWORD', 'Забыли пароль?');
define('_PASSWORD', 'Пароль');
define('_BUTTON_LOGIN', 'Войти');
define('_BUTTON_LOGOUT', 'Выйти');
define('_NO_ACCOUNT', 'Ещё не зарегистрированы?');
define('_CREATE_ACCOUNT', 'Регистрация');
define('_VOTE_POOR', 'Худшая');
define('_VOTE_BEST', 'Лучшая');
define('_USER_RATING', 'Рейтинг');
define('_RATE_BUTTON', 'Оценить');
define('_REMEMBER_ME', 'Запомнить');

/** contact.php */
define('_ENQUIRY', 'Контакт');
define('_ENQUIRY_TEXT', 'Это сообщение отправлено с сайта %s. Автор сообщения:');
define('_COPY_TEXT', 'Это копия сообщения, которое Вы отправили для %s с сайта %s.');
define('_COPY_SUBJECT', 'Копия: ');
define('_THANK_MESSAGE', 'Спасибо! Сообщение успешно отправлено.');
define('_CLOAKING', 'Этот e-mail защищен от спам-ботов. Для его просмотра в вашем браузере должна быть включена поддержка Java-script.');
define('_CONTACT_HEADER_NAME', 'Имя');
define('_CONTACT_HEADER_POS', 'Положение');
define('_CONTACT_HEADER_EMAIL', 'E-mail');
define('_CONTACT_HEADER_PHONE', 'Телефон');
define('_CONTACT_HEADER_FAX', 'Факс');
define('_CONTACT_HEADER_MISC', 'Дополнительная информация');
define('_CONTACTS_DESC', 'Список контактов этого сайта');
define('_CONTACT_MORE_THAN', 'Вы не можете вводить более одного адреса e-mail.');

/** classes/html/contact.php */
define('_CONTACT_TITLE', 'Обратная связь');
define('_EMAIL_DESCRIPTION', 'Отправить e-mail пользователю');
define('_NAME_PROMPT', 'Ваше имя');
define('_NAME_PROMPT_PH', 'Введите Ваше имя');
define('_EMAIL_PROMPT', 'Ваш e-mail');
define('_EMAIL_PROMPT_PH', 'Введите Ваш e-mail');
define('_SUBJECT_PROMPT_PH', 'Введите тему Вашего сообщения');
define('_MESSAGE_PROMPT', 'Введите текст сообщения');
define('_MESSAGE_PROMPT_PH', 'Введите текст Вашего сообщения');
define('_PLEASE_ENTER_CAPTCHA_PH', 'Введите код');
define('_SEND_BUTTON', 'Отправить');
define('_SEND_BUTTON_CONTACT', 'Отправить сообщение');
define('_CONTACT_FORM_NC', 'Пожалуйста, заполните форму полностью и правильно.');
define('_CONTACT_TELEPHONE', 'Телефон');
define('_CONTACT_MOBILE', 'Мобильный');
define('_CONTACT_FAX', 'Факс');
define('_CONTACT_EMAIL', 'E-mail');
define('_CONTACT_NAME', 'Имя');
define('_CONTACT_POSITION', 'Должность');
define('_CONTACT_ADDRESS', 'Адрес');
define('_CONTACT_MISC', 'Дополнительная информация');
define('_CONTACT_SEL', 'Выберите получателя');
define('_CONTACT_NONE', 'Детали этой контактной записи отсутствуют.');
define('_CONTACT_ONE_EMAIL', 'Нельзя вводить более одного адреса e-mail.');
define('_EMAIL_A_COPY', 'Отправить копию сообщения на собственный адрес');
define('_CONTACT_DOWNLOAD_AS', 'Скачать информацию в формате');
define('_VCARD', 'VCard');

/** pageNavigation */
define('_PN_LT', '&lt;');
define('_PN_RT', '&gt;');
define('_PN_PAGE', 'Страница');
define('_PN_OF', 'из');
define('_PN_LLAST', '<span class="pagenav_txt">первая</span>');
define('_PN_PREV10', '<span class="pagenav_txt">предыдущие 10</span>');
define('_PN_PREV1', '<span class="pagenav_txt">предыдущая</span>');
define('_PN_NEXT1', '<span class="pagenav_txt">следующая</span>');
define('_PN_NEXT10', '<span class="pagenav_txt">следующие 10</span>');
define('_PN_RLAST', '<span class="pagenav_txt">последняя</span>');
define('_PN_L_LLAST', 'первая');
define('_PN_L_PREV10', 'предыдущие 10');
define('_PN_L_PREV1', 'предыдущая');
define('_PN_L_NEXT1', 'следующая');
define('_PN_L_NEXT10', 'следующие 10');
define('_PN_PAGE_NUMBER', 'страница номер');
define('_PN_L_RLAST', 'последняя');
define('_PN_DISPLAY_NR', 'Отображать');
define('_PN_RESULTS', 'Результаты');
define('_PN_START', 'В начало');
define('_PN_PREVIOUS', 'Предыдущие');
define('_PN_NEXT', 'Следующие');
define('_PN_END', 'В конец');

/** письмо другу */
define('_EMAIL_TITLE', 'Отправить e-mail другу');
define('_EMAIL_FRIEND', 'Отправить ссылку страницы на e-mail:');
define('_EMAIL_FRIEND_ADDR', 'E-Mail друга:');
define('_EMAIL_YOUR_NAME', 'Ваше имя:');
define('_EMAIL_YOUR_MAIL', 'Ваш e-mail:');
define('_SUBJECT_PROMPT', ' Тема сообщения:');
define('_BUTTON_SUBMIT_MAIL', 'Отправить');
define('_BUTTON_CANCEL', 'Отмена');
define('_EMAIL_ERR_NOINFO', 'Вы должны правильно ввести свой e-mail и e-mail получателя этого письма.');
define('_EMAIL_MSG', ' Здравствуйте! Следующую ссылку на страницу сайта "%s" отправил Вам %s ( %s ).

Вы сможете просмотреть её по этой ссылке:
%s');
define('_EMAIL_INFO', 'Письмо отправил');
define('_EMAIL_SENT', 'Ссылка на эту страницу отправлена для');
define('_PROMPT_CLOSE', 'Закрыть окно');

/** classes/html/content.php */
define('_AUTHOR_BY', 'Автор');
define('_WRITTEN_BY', 'Написано');
//define('_LAST_UPDATED', 'Последнее обновление');
define('_LAST_UPDATED', 'Обновлено');
define('_BACK', 'Вернуться');
define('_LEGEND', 'История');
define('_DATE', 'Дата');
define('_ORDER_DROPDOWN', 'Порядок');
define('_HEADER_TITLE', 'Заголовок');
define('_HEADER_AUTHOR', 'Автор');
define('_HEADER_SUBMITTED', 'Написан');
define('_HEADER_HITS', 'Просмотров');
define('_E_EDIT', 'Редактировать');
define('_E_ADD', 'Добавить');
define('_E_WARNUSER', 'Пожалуйста, нажмите кнопку &laquo;Отмена&raquo; или &laquo;Сохранить&raquo;, чтобы покинуть эту страницу.');
define('_E_WARNTITLE', 'Содержимое должно иметь заголовок');
define('_E_WARNTEXT', 'Содержимое должно иметь вводный текст');
define('_E_WARNCAT', 'Пожалуйста, выберите категорию');
define('_E_CONTENT', 'Содержимое');
define('_E_TITLE', 'Заголовок:');
define('_E_CATEGORY', 'Категория');
define('_E_INTRO', 'Вводный текст');
define('_E_MAIN', 'Основной текст');
define('_E_MOSIMAGE', 'Вставить тег {mosimage}');
define('_E_IMAGES', 'Изображения');
define('_E_GALLERY_IMAGES', 'Галерея изображений');
define('_E_CONTENT_IMAGES', 'Изображения к тексту');
define('_E_EDIT_IMAGE', 'Параметры изображения');
define('_E_NO_IMAGE', 'Без изображения');
define('_E_INSERT', 'Вставить');
define('_E_UP', 'Выше');
define('_E_DOWN', 'Ниже');
define('_E_REMOVE', 'Удалить');
define('_E_SOURCE', 'Название файла:');
define('_E_ALIGN', 'Расположение:');
define('_E_ALT', 'Альтернативный текст:');
define('_E_BORDER', 'Рамка:');
define('_E_CAPTION', 'Заголовок');
define('_E_CAPTION_POSITION', 'Положение подписи');
define('_E_CAPTION_ALIGN', 'Выравнивание подписи');
define('_E_CAPTION_WIDTH', 'Ширина подписи');
define('_E_APPLY', 'Применить');
define('_E_PUBLISHING', 'Публикация');
define('_E_STATE', 'Состояние:');
define('_E_AUTHOR_ALIAS', 'Псевдоним автора:');
define('_E_ACCESS_LEVEL', 'Уровень доступа:');
define('_E_ORDERING', 'Порядок:');
define('_E_START_PUB', 'Дата начала публикации:');
define('_E_FINISH_PUB', 'Дата окончания публикации:');
define('_E_SHOW_FP', 'Показывать на главной странице:');
define('_E_HIDE_TITLE', 'Скрыть заголовок:');
define('_E_METADATA', 'Мета-тэги');
define('_E_M_DESC', 'Описание:');
define('_E_M_KEY', 'Ключевые слова:');
define('_E_SUBJECT', 'Тема:');
define('_E_EXPIRES', 'Дата истечения:');
define('_E_VERSION', 'Версия');
define('_E_ABOUT', 'Об объекте');
define('_E_CREATED', 'Дата создания');
define('_E_LAST_MOD', 'Последнее изменение:');
define('_E_HITS', 'Количество просмотров:');
define('_E_SAVE', 'Сохранить');
define('_E_CANCEL', 'Отмена');
define('_E_REGISTERED', 'Только для зарегистрированных пользователей!');
define('_E_ITEM_INFO', 'Информация');
define('_E_ITEM_SAVED', 'Успешно сохранено!');
define('_ITEM_PREVIOUS', '<span class="pagenav_txt">&larr; предыдущая</span> ');
define('_ITEM_NEXT', ' <span class="pagenav_txt">следующая &rarr;</span>');
define('_KEY_NOT_FOUND', 'Ключ не найден!');

/** content.php */
define('_SECTION_ARCHIVE_EMPTY', 'В этом разделе архива сейчас нет объектов. Пожалуйста, зайдите позже.');
define('_CATEGORY_ARCHIVE_EMPTY', 'В этой категории архива сейчас нет объектов. Пожалуйста, зайдите позже.');
define('_HEADER_SECTION_ARCHIVE', 'Архив разделов');
define('_HEADER_CATEGORY_ARCHIVE', 'Архив категорий');
define('_ARCHIVE_SEARCH_FAILURE', 'Не найдено архивных записей для %s %s.'); // значения месяца, а затем года
define('_ARCHIVE_SEARCH_SUCCESS', 'Найдены архивные записи для %s %s.'); // значения месяца, а затем года
define('_FILTER', 'Фильтр');
define('_ORDER_DROPDOWN_DA', 'Дата (по возрастанию)');
define('_ORDER_DROPDOWN_DD', 'Дата (по убыванию)');
define('_ORDER_DROPDOWN_TA', 'Название (по возрастанию)');
define('_ORDER_DROPDOWN_TD', 'Название (по убыванию)');
define('_ORDER_DROPDOWN_HA', 'Просмотры (по возрастанию)');
define('_ORDER_DROPDOWN_HD', 'Просмотры (по убыванию)');
define('_ORDER_DROPDOWN_AUA', 'Автор (по возрастанию)');
define('_ORDER_DROPDOWN_AUD', 'Автор (по убыванию)');
define('_ORDER_DROPDOWN_O', 'По порядку');
define('_CONTENT_ANSWER', 'Получен ответ:');
define('_CONTENT_CNG_STAT_PUB', 'Смена статуса публикации содержимого: ');

/** poll.php */
define('_ALERT_ENABLED', 'Cookies должны быть разрешены!');
define('_ALREADY_VOTE', 'Вы уже проголосовали в этом опросе!');
define('_NO_SELECTION', 'Вы не сделали свой выбор. Пожалуйста, попробуйте ещё раз.');
define('_THANKS', 'Спасибо за Ваше участие в голосовании!');
define('_SELECT_POLL', 'Выберите опрос из списка');

/** classes/html/poll.php */
define('_JAN', 'Январь');
define('_FEB', 'Февраль');
define('_MAR', 'Март');
define('_APR', 'Апрель');
define('_MAY', 'Май');
define('_JUN', 'Июнь');
define('_JUL', 'Июль');
define('_AUG', 'Август');
define('_SEP', 'Сентябрь');
define('_OCT', 'Октябрь');
define('_NOV', 'Ноябрь');
define('_DEC', 'Декабрь');
define('_POLL_TITLE', 'Результаты опроса');
define('_SURVEY_TITLE', 'Название опроса');
define('_NUM_VOTERS', 'Количество проголосовавших');
define('_FIRST_VOTE', 'Первый голос');
define('_LAST_VOTE', 'Последний голос');
define('_SEL_POLL', 'Выберите опрос');
define('_NO_RESULTS', 'Нет данных по выбранному опросу.');

/** registration.php */
define('_ERROR_PASS', 'Извините, такой пользователь не найден.');
define('_NEWPASS_MSG', 'Учетная запись пользователя $checkusername соответствует адресу e-mail.\n' .
		' Пользователь сайта $mosConfig_live_site сделал запрос на получение нового пароля.\n\n' .
		' Ваш новый пароль: $newpass\n\nЕсли Вы не запрашивали изменение пароля, сообщите об этом администратору.' .
		' Только Вы можете увидеть это сообщение, больше никто. Если это ошибка, просто зайдите ' .
		' на сайт, используя новый пароль, и затем, измените его на удобный Вам.');
define('_NEWPASS_SUB', '$_sitename: Новый пароль для $checkusername');
define('_NEWPASS_SENT', 'Новый пароль создан и отправлен пользователю!');
define('_REGWARN_NAME', 'Пожалуйста, введите свое настоящее имя (имя, отображаемое на сайте).');
define('_REGWARN_UNAME', 'Пожалуйста, введите свое имя пользователя (логин).');
define('_REGWARN_MAIL', 'Пожалуйста, правильно введите адрес e-mail.');
define('_REGWARN_PASS', 'Пожалуйста, правильно введите пароль. Пароль не должен содержать пробелы, его длина должна быть не меньше 6 символов и он должен состоять только из цифр (0-9) и латинских символов (a-z, A-Z)');
define('_REGWARN_VPASS1', 'Пожалуйста, проверьте пароль.');
define('_REGWARN_VPASS2', 'Пароль и его подтверждение не совпадают. Пожалуйста, попробуйте ещё раз.');
define('_REGWARN_INUSE', 'Это имя пользователя уже используется. Пожалуйста, выберите другое имя.');
define('_REGWARN_EMAIL_INUSE', 'Этот e-mail уже используется. Если Вы забыли свой пароль, Нажмите на ссылку &laquo;Забыли пароль?&raquo; и на указанный e-mail будет выслан новый пароль.');
define('_SEND_SUB', 'Данные о новом пользователе %s с %s');
define('_USEND_MSG_ACTIVATE', 'Здравствуйте %s,

Благодарим за регистрацию на сайте %s. Ваша учетная запись успешно создана и должна быть активирована.
Чтобы активировать учетную запись, нажмите на ссылке или скопируйте ее в адресную строку браузера:
%s

После активации Вы можете зайти на сайт %s, используя свое имя пользователя и пароль:

Имя пользователя - %s
Пароль - %s');
define('_USEND_MSG', 'Здравствуйте %s,

Благодарим Вас за регистрацию на сайте %s.

Сейчас Вы можете войти на сайт %s, используя имя пользователя и пароль, введенные вами при регистрации.');
define('_USEND_MSG_NOPASS', 'Здравствуйте $name,\n\nВы успешно зарегистрированы на сайте $mosConfig_live_site.\n' .
		'Вы можете зайти на сайт $mosConfig_live_site, используя данные, которые Вы указали при регистрации.\n\n' .
		'На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления\n');
define('_ASEND_MSG', 'Здравствуйте! Это системное сообщение с сайта %s.

На сайте %s зарегистрировался новый пользователь.

Данные пользователя:
Настоящее имя - %s
Адрес e-mail - %s
Имя пользователя - %s

На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления');
define('_REG_COMPLETE_NOPASS', '<div class="componentheading">Регистрация завершена!</div><br />' .
		'Сейчас Вы можете войти на сайт.<br />');
define('_REG_COMPLETE', '<div class="componentheading">Регистрация завершена!</div><br />Сейчас Вы можете войти на сайт.');
define('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Регистрация завершена!</div><br />Ваша учетная запись создана и должна быть активирована перед тем, как вы ею воспользуетесь. На Ваш e-mail было отправлено письмо со ссылкой, с помощью которой Вы можете активировать свою учетную запись.');
define('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Учетная запись активирована!</div><br />Ваша учетная запись активирована. Теперь Вы можете зайти на сайт, используя имя пользователя и пароль, которые Вы ввели при регистрации.');
define('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Неверная ссылка активации!</div><br />Данная учетная запись отсутствует на сайте или уже активирована.');
define('_REG_ACTIVATE_FAILURE', '<div class="componentheading">Ошибка активации!</div><br />Активация вашей учетной записи невозможна. Пожалуйста, обратитесь к администратору.');

/** classes/html/registration.php */
define('_PROMPT_PASSWORD', 'Забыли пароль?');
define('_NEW_PASS_DESC', 'Пожалуйста, введите свои имя пользователя и адрес e-mail, затем нажмите кнопку &laquo;Отправить пароль&raquo;.<br />' .
		'Вскоре, на указанный адрес e-mail Вы получите письмо с новым паролем. Используйте этот пароль для входа на сайт.');
define('_PROMPT_UNAME', 'Имя пользователя:');
define('_PROMPT_EMAIL', 'Адрес e-mail:');
define('_BUTTON_SEND_PASS', 'Отправить пароль');
define('_REGISTER_TITLE', 'Регистрация');
define('_REGISTER_NAME', 'Настоящее имя:');
define('_REGISTER_UNAME', 'Имя пользователя:');
define('_REGISTER_EMAIL', 'E-mail:');
define('_REGISTER_NAME_PH', 'Введите настоящее имя');
define('_REGISTER_UNAME_PH', 'Введите имя пользователя');
define('_REGISTER_EMAIL_PH', 'Введите e-mail');
define('_REGISTER_PASS', 'Пароль:');
define('_REGISTER_VPASS', 'Подтверждение пароля:');
define('_REGISTER_REQUIRED', 'Все поля, отмеченные символом <span class="red">*</span>, обязательны для заполнения!');
define('_BUTTON_SEND_REG', 'Отправить данные');
define('_SENDING_PASSWORD', 'Ваш пароль будет отправлен на указанный выше адрес e-mail.<br />Когда Вы получите' .
		' новый пароль, Вы сможете зайти на сайт и изменить этот пароль в любое время.');

/** classes/html/search.php */
define('_SEARCH_TITLE', 'Поиск');
define('_SEARCH_SEL_CATEGORY', 'Выберите категорию');
define('_SEARCH_RESULT', 'Результаты поиска:');
define('_SEARCH_LIMITSTART', 'Показывать объектов на странице');
define('_PROMPT_KEYWORD', 'Поиск по ключевой фразе');
define('_SEARCH_MATCHES', 'найдено %d совпадений');
define('_CONCLUSION', 'Всего найдено $totalRows материалов.');
define('_NOKEYWORD', 'Ничего не найдено');
define('_IGNOREKEYWORD', 'В поиске были пропущены предлоги');
define('_SEARCH_ANYWORDS', 'Любое слово');
define('_SEARCH_ALLWORDS', 'Все слова');
define('_SEARCH_PHRASE', 'Целую фразу');
define('_SEARCH_NEWEST', 'По убыванию');
define('_SEARCH_OLDEST', 'По возрастанию');
define('_SEARCH_POPULAR', 'По популярности');
define('_SEARCH_ALPHABETICAL', 'Алфавитный порядок');
define('_SEARCH_CATEGORY', 'Раздел/Категория');
define('_SEARCH_MESSAGE', 'Текст для поиска должен содержать от 3 до 20 символов');
define('_SEARCH_ARCHIVED', 'В архиве');
define('_SEARCH_CATBLOG', 'Блог категории');
define('_SEARCH_CATLIST', 'Список категории');
define('_SEARCH_NEWSFEEDS', 'Ленты новостей');
define('_SEARCH_SECLIST', 'Список раздела');
define('_SEARCH_SECBLOG', 'Блог раздела');

/** templates/*.php */
define('_ISO2', 'cp1251');
define('_ISO', 'charset=windows-1251');
define('_DATE_FORMAT', 'Сегодня: d.m.Y г.'); // Используйте формат PHP-функции DATE

/**
 * измените строчку ниже, для изменения вывода даты на сайте
 * например, define("_DATE_FORMAT_LC"," %d %B %Y г. %H:%M"); // Используйте формат PHP-функции strftime
 */
define('_DATE_FORMAT_LC', '%A, %d-го %B %Y г. в %H:%m'); // Используйте PHP strftime формат
//define('_DATE_FORMAT_LC', '%d.%m.%Y'); // Используйте PHP strftime формат
//define('_DATE_FORMAT_LC',$mosConfig_form_date); // Используйте формат PHP-функции strftime
define('_DATE_FORMAT_LC2', $mosConfig_form_date_full); // Полный формат времени
define('_SEARCH_BOX', 'Поиск…');
define('_NEWSFLASH_BOX', 'Краткие новости!');
define('_MAINMENU_BOX', 'Главное меню');

/** classes/html/usermenu.php */
define('_UMENU_TITLE', 'Меню пользователя');
define('_HI', 'Здравствуйте, ');
define('_HI_AUTH', 'Добр<script type="text/javascript">
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
define('_SAVE_ERR', 'Пожалуйста, заполните все поля.');
define('_THANK_SUB', 'Спасибо за Ваш материал. Он будет просмотрен администратором перед размещением на сайте.');
define('_THANK_SUB_PUB', 'Спасибо за Ваш материал!');
define('_UP_SIZE', 'Вы не можете загружать файлы размером больше чем 15Кб.');
define('_UP_EXISTS', 'Изображение с именем $userfile_name уже существует. Пожалуйста, измените название файла и попробуйте ещё раз.');
define('_UP_COPY_FAIL', 'Ошибка при копировании!');
define('_UP_TYPE_WARN', 'Вы можете загружать изображения только в формате .gif или .jpg.');
define('_MAIL_SUB', 'Новый материал от пользователя');
define('_MAIL_MSG', 'Здравствуйте $adminName,\n\nПользователь $author предлагает новый материал в раздел $type с названием $title' .
		' для сайта $mosConfig_live_site.\n\n\n' .
		'Пожалуйста, зайдите в панель администратора по адресу $mosConfig_live_site/administrator для просмотра и добавления его в $type.\n\n' .
		'На это письмо не надо отвечать, так как оно создано автоматически и предназначено только для уведомления\n');
define('_PASS_VERR1', 'Если Вы желаете изменить пароль, пожалуйста, введите его ещё раз для подтверждения изменения.');
define('_PASS_VERR2', 'Если Вы решили изменить пароль, пожалуйста, обратите внимание, что пароль и его подтверждение должны совпадать.');
define('_UNAME_INUSE', 'Выбранное имя пользователя уже используется.');
define('_UPDATE', 'Обновить');
define('_USER_DETAILS_SAVE', 'Ваши данные сохранены.');
define('_USER_LOGIN', 'Вход пользователя');
define('_USER_ANSWER', 'Получен ответ:');
define('_USER_OK', 'Всё ОК!');
define('_USER_TAB_ADDITIONAL', 'Дополнительно');

/** components/com_user */
define('_EDIT_TITLE', 'Личные данные');
define('_YOUR_NAME', 'Полное имя');
define('_EMAIL', 'Адрес e-mail');
define('_UNAME', 'Имя пользователя (логин)');
define('_PASS', 'Пароль');
define('_NEW_AVATAR_UPLOAD', 'Загрузить свой аватар');
define('_AVATAR_UPLOAD', 'Загрузить аватар');
define('_AVATAR_DELETE', 'Удалить аватар');
define('_AVATAR_DELETING', 'Удаление аватара: ');
define('_VPASS', 'Подтверждение пароля');
define('_PASS_PH', 'Введите новый пароль');
define('_VPASS_PH', 'Повторите новый пароль');
define('_SUBMIT_SUCCESS', 'Ваша информация принята!');
define('_SUBMIT_SUCCESS_DESC', 'Ваша информация успешно отправлена администратору. После просмотра, Ваш материал будет опубликован на этом сайте');
define('_WELCOME', 'Добро пожаловать!');
define('_WELCOME_DESC', 'Добро пожаловать в раздел пользователя нашего сайта');
define('_CONF_CHECKED_IN', 'Все &laquo;заблокированные&raquo; Вами элементы теперь &laquo;разблокированы&raquo;.');
define('_CHECK_TABLE', 'Проверка таблицы');
define('_CHECKED_IN', 'Проверено ');
define('_CHECKED_IN_ITEMS', ''); /* статей - вынес до возможности настройки склонения слова */
define('_PASS_MATCH', 'Пароли не совпадают');

/** components/com_banners */
define('_BNR_CLIENT_NAME', 'Вы должны ввести имя клиента.');
define('_BNR_CONTACT', 'Вы должны выбрать контакт для клиента.');
define('_BNR_VALID_EMAIL', 'Адрес электронной почты клиента должен быть правильным.');
define('_BNR_CLIENT', 'Вы должны выбрать клиента,');
define('_BNR_NAME', 'Введите имя баннера.');
define('_BNR_IMAGE', 'Выберите изображения баннера.');
define('_BNR_URL', 'Вы должны ввести URL/Код баннера.');
define('_BNR_ENTER_ERROR', 'Ошибка доступа');
define('_BNR_NOT_ENTER', 'Доступ не возможен');

/** components/com_login */
define('_ALREADY_LOGIN', 'Вы уже авторизированы!');
define('_LOGOUT', 'Нажмите здесь для завершения работы');
define('_LOGIN_TEXT', 'Используйте поля &laquo;Пользователь&raquo; и &laquo;Пароль&raquo; для доступа к сайту');
define('_LOGIN_SUCCESS', 'Вы успешно вошли');
define('_LOGOUT_SUCCESS', 'Вы успешно закончили работу с сайтом');
define('_LOGIN_DESCRIPTION', 'Вы должны войти на сайт как пользователь, для доступа к закрытым разделам');
define('_LOGOUT_DESCRIPTION', 'Вы действительно хотите покинуть профиль?');

/** components/com_weblinks */
define('_WEBLINKS_TITLE', 'Ссылки');
define('_WEBLINKS_DESC', 'В данном разделе собраны наиболее интересные и полезные ссылки в сети.<br />Выберите из списка один из разделов, а затем выберите нужную ссылку.');
define('_HEADER_TITLE_WEBLINKS', 'Ссылка');
define('_SECTION', 'Раздел');
define('_SUBMIT_LINK', 'Добавить ссылку');
define('_URL', 'URL:');
define('_URL_DESC', 'Описание:');
define('_NAME', 'Название:');
define('_WEBLINK_EXIST', 'Ссылка с таким именем уже существует. Измените имя и попробуйте ещё раз.');
define('_WEBLINK_TITLE', 'Ссылка должна иметь название.');

/** components/com_newfeeds */
define('_FEED_NAME', 'Название источника');
define('_FEED_ARTICLES', 'Статей');
define('_FEED_LINK', 'Ссылка источника');

/** modules/mod_whosonline.php */
define('_WE_HAVE', 'Сейчас на сайте находятся<br />');
define('_REGISTERED_ONLINE', 'Зарегистрировано');
define('_NOW_ONLINE', 'Online');
define('_AND', ' и ');
define('_GUEST_COUNT', '%s гость');
define('_GUESTS_COUNT', '%s гостей');
define('_MEMBER_COUNT', '%s пользователь');
define('_MEMBERS_COUNT', '%s пользователей');
define('_ONLINE', '');
define('_NONE', 'Нет посетителей в онлайн');

/** modules/mod_banners */
define('_BANNER_ALT', 'Реклама');

/** modules/mod_downloadjoostina */
define('_DJOOSTINA_12', 'Загрузить Joostina версии 1.2.1');
define('_DJOOSTINA_13', 'Загрузить Joostina версии 1.3.0');

/** modules/mod_random_image */
define('_NO_IMAGES', 'Нет изображений');
define('_RANDOM_IMAGE_ERROR', 'Проверьте настройки модуля mod_random_image и наличие изображений в указанном в настройках каталоге!');

/** modules/mod_ml_login */
define('_AUTH', 'Авторизация');
define('_AUTH_DEF', 'Стандартная авторизация');
define('_REM_PASS', 'Напомним');
define('_NO_REGISTRED', 'Не зарегистрированы?');
define('_AUTH_OPENID', 'Войти, используя <img src="' . $mosConfig_live_site . '/modules/mod_ml_login/openid_big.png" alt="Войти, используя OpenID" class="openidimg" title="Войти, используя OpenID" width="99" height="20" />');
define('_OPENID_PROVS', 'Провайдеры OpenID');
define('_OPENID_SUB_TEXT', 'Войти с OpenID');
define('_ENTER_YOUR_LOGIN', 'Введите Ваш Логин');
define('_ENTER_YOUR_PASSWORD', 'Введите Ваш пароль');

/** modules/mod_stats.php */
define('_STAT_DATETIME', 'Дата и время');
define('_STAT_OS', 'OS');
define('_STAT_PHP_VERSION', 'Версия PHP');
define('_STAT_MYSQL_VERSION', 'Версия MySQL');
define('_STAT_CACHE', 'Кэширование');
define('_STAT_GZIP', 'GZIP');
define('_STAT_CACHE_ENABLE', 'Разрешено');
define('_STAT_CACHE_DISABLE', 'Запрещено');
define('_STAT_MEMBERS', 'Пользователей');
define('_STAT_HITS', 'Посещений');
define('_STAT_NEWS', 'Новостей');
define('_STAT_LINKS', 'Ссылок');
define('_STAT_VISITORS', 'Посетителей');

/** /adminstrator */
define('_ADMIN_USRNAME', 'Логин');
define('_ADMIN_USRNAME_PH', 'Логин администратора');
define('_ADMIN_PASS', 'Пароль');
define('_ADMIN_PASS_PH', 'Пароль администратора');
define('_ADMIN_ENTER', 'Войти');
define('_ADMIN_ENTER_LOGIN', 'Войти в административную панель');
define('_ADMIN_GO_SITE', 'Перейти на сайт');
define('_ADMIN_EXIT', 'Выход');
define('_ADMIN_VIEW_CONTENT', 'Просмотр содержимого');
define('_DETAILS', 'Основные настройки');

/** /adminstrator/components/com_menus/admin.menus.html.php */
define('_MAINMENU_HOME', '* Первый по списку опубликованный пункт этого меню [mainmenu] автоматически становится &laquo;Главной&raquo; страницей сайта *');
define('_MAINMENU_DEL', '* Вы не можете &laquo;удалить&raquo; это меню, поскольку оно необходимо для нормального функционирования сайта *');
define('_MENU_GROUP', '* Некоторые &laquo;Типы меню&raquo; появляются более чем в одной группе *');

/** administrators/components/com_users */
define('_NEW_USER_MESSAGE_SUBJECT', 'Новые данные пользователя');
define('_NEW_USER_MESSAGE', 'Здравствуйте, %s


Вы были зарегистрированы Администратором на сайте %s.

Это сообщение содержит Ваши имя пользователя и пароль, для входа на сайт %s:

Имя пользователя - %s
Пароль - %s


На это сообщение не нужно отвечать. Оно сгенерировано роботом рассылок и отправлено только для информирования.');

/** administrators/components/com_massmail */
define('_MASSMAIL_MESSAGE', 'Это сообщение с сайта \'%s\'

Сообщение:
');

// Joostina!
define('_REG_CAPTCHA', 'Введите текст с изображения<span class="red">*</span>:');
define('_REG_CAPTCHA_VAL', 'Необходимо ввести код с изображения!');
define('_REG_CAPTCHA_REF', 'Нажмите чтобы обновить изображение.');

define('_PRINT_PAGE_LINK', 'Адрес страницы на сайте');

$bad_text = array(' авле ', ' без ', ' больше ', ' был ', ' была ', ' были ', ' было ', ' быть ', ' вам ', ' вас ', ' вверх ', ' видно ', ' вот ', ' все ', ' всегда ', ' всех ', ' где ', ' говорила ', ' говорим ', ' говорит ', ' даже ', ' два ', ' для ', ' его ', ' ему ', ' если ', ' есть ', ' еще ', ' затем ', ' здесь ', ' знала ', ' знаю ', ' иду ', ' или ', ' каждый ', ' кажется ', ' казалось ', ' как ', ' какие ', ' когда ', ' которое ', ' которые ', ' кто ', ' меня ', ' мне ', ' мог ', ' могла ', ' могу ', ' мое ', ' моей ', ' может ', ' можно ', ' мои ', ' мой ', ' мол ', ' моя ', ' надо ', ' нас ', ' начал ', ' начала ', ' него ', ' нее ', ' ней ', ' немного ', ' немножко ', ' нему ', ' несколько ', ' нет ', ' никогда ', ' них ', ' ничего ', ' однако ', ' она ', ' они ', ' оно ', ' опять ', ' очень ', ' под ', ' пока ', ' после ', ' потом ', ' почти ', ' при ', ' про ', ' раз ', ' своей ', ' свой ', ' свою ', ' себе ', ' себя ', ' сейчас ', ' сказал ', ' сказала ', ' слегка ', ' слишком ', ' словно ', ' снова ', ' стал ', ' стала ', ' стали ', ' так ', ' там ', ' твои ', ' твоя ', ' тебе ', ' тебя ', ' теперь ', ' тогда ', ' того ', ' тоже ', ' только ', ' три ', ' тут ', ' уже ', ' хотя ', ' чем ', ' через ', ' что ', ' чтобы ', ' чуть ', ' эта ', ' эти ', ' этих ', ' это ', ' этого ', ' этой ', ' этом ', ' эту ');

/* administrator components com_admin */
define('_FILE_UPLOAD', 'Загрузка файла');
define('_MAX_SIZE', 'Максимальный размер');
define('_ABOUT_JOOSTINA', 'О Joostina');
define('_CHANGESLOG', 'Changeslog');
define('_ABOUT_SYSTEM', 'О системе');
define('_SYSTEM_OS', 'Система');
define('_DB_VERSION', 'Версия базы данных');
define('_PHP_VERSION', 'Версия PHP');
define('_APACHE_VERSION', 'Веб-сервер');
define('_PHP_APACHE_INTERFACE', 'Интерфейс между веб-сервером и PHP');
define('_JOOSTINA_VERSION', 'Версия Joostina!');
define('_BROWSER', 'Браузер (User Agent)');
define('_PHP_SETTINGS', 'Важные настройки PHP');
define('_RG_EMULATION', 'Эмуляция Register Globals');
define('_REGISTER_GLOBALS', 'Register Globals - регистрация глобальных переменных');
define('_MAGIC_QUOTES', 'Параметр Magic Quotes');
define('_SAFE_MODE', 'Безопасный режим - Safe Mode');
define('_SESSION_HANDLING', 'Обработка сессий');
define('_SESS_SAVE_PATH', 'Каталог хранения сессий - Session save path');
define('_PHP_TAGS', 'Спецтеги php');
define('_BUFFERING', 'Буферизация');
define('_OPEN_BASEDIR', 'Разрешенные/Открытые каталоги');
define('_ERROR_REPORTING', 'Отображение ошибок');
define('_XML_SUPPORT', 'Поддержка XML');
define('_ZLIB_SUPPORT', 'Поддержка Zlib');
define('_DISABLED_FUNCTIONS', 'Запрещенные функции');
define('_CONFIGURATION_FILE', 'Файл конфигурации');
define('_ACCESS_RIGHTS', 'Права доступа');
define('_DIRS_WITH_RIGHTS', 'Для работы <strong>ВСЕХ</strong> функций и возможностей Joostina, <strong>ВСЕ</strong> указанные ниже каталоги должны быть доступны для записи!');
define('_CACHE_DIRECTORY', 'Каталог кэша');
define('_SESSION_DIRECTORY', 'Каталог сессий');
define('_DATABASE', 'База данных');
define('_TABLE_NAME', 'Название таблицы');
define('_DB_CHARSET', 'Кодировка');
define('_DB_NUM_RECORDS', 'Записей');
define('_DB_SIZE', 'Размер');
define('_FIND', 'Найти');
define('_CLEAR', 'Очистить');
define('_GLOSSARY', 'Глоссарий');
define('_DEVELOPERS', 'Разработчики');
define('_SUPPORT', 'Поддержка');
define('_LICENSE', 'Лицензия');
define('_CHANGELOG', 'Журнал изменений');
define('_CHECK_VERSION', 'Проверить версию Joostina!');
define('_PREVIEW_SITE', 'Предпросмотр сайта');
define('_PREV_A_SITE', 'Предпросмотр');
define('_IN_NEW_WINDOW', 'Открыть в новом окне');

/* administrator components com_banners */
define('_BANNERS_MANAGEMENT', 'Управление баннерами');
define('_EDIT_BANNER', 'Редактирование баннера');
define('_NEW_BANNER', 'Создание баннера');
define('_IN_CURRENT_WINDOW', 'Том же окне');
define('_IN_PARENT_WINDOW', 'Текущем окне');
define('_IN_MAIN_FRAME', 'Главном фрейме');
define('_BANNER_CLIENTS', 'Клиенты баннеров');
define('_BANNER_CATEGORIES', 'Категории баннеров');
define('_NO_BANNERS', 'Банеры не обнаружены');
define('_BANNER_COUNTER_RESETTED', 'Счётчик показа баннеров обнулён');
define('_CHECK_PUBLISH_DATE', 'Проверьте правильность ввода даты публикации');
define('_CHECK_START_PUBLICATION_DATE', 'Проверьте дату начала публикации');
define('_CHECK_END_PUBLICATION_DATE', 'Проверьте дату окончания публикации');
define('_TASK_UPLOAD', 'Загрузить');
define('_BANNERS_PANEL', 'Панель баннеров');
define('_BANNERS_DIRECTORY_DOESNOT_EXISTS', 'Папка banners не существует');
define('_CHOOSE_BANNER_IMAGE', 'Выберите изображение для загрузки');
define('_BAD_FILENAME', 'Файл должен содержать алфавитно-числовые символы без пробелов!');
define('_FILE_ALREADY_EXISTS', 'Файл #FILENAME# уже существует в базе данных!');
define('_BANNER_UPLOAD_ERROR', 'Загрузка #FILENAME# неудачна!');
define('_BANNER_UPLOAD_SUCCESS', 'Загрузка #FILENAME# в #DIRNAME# успешно завешена!');
define('_UPLOAD_BANNER_FILE', 'Загрузить файл баннера');

/* administrator components com_categories */
define('_CATEGORY_CHANGES_SAVED', 'Изменения в категории сохранены');
define('_USER_GROUP_ALL', 'Общий');
define('_USER_GROUP_REGISTERED', 'Участники');
define('_USER_GROUP_SPECIAL', 'Специальный');
define('_CONTENT_CATEGORIES', 'Категории содержимого');
define('_ALL_CONTENT', 'Всё содержимое');
define('_ACTIVE', 'Активных');
define('_IN_TRASH', 'В корзине');
define('_VIEW_CATEGORY_CONTENT', 'Просмотр содержимого категории');
define('_CHOOSE_MENU_PLEASE', 'Пожалуйста, выберите меню');
define('_CHOOSE_MENUTYPE_PLEASE', 'Пожалуйста, выберите тип меню');
define('_ENTER_MENUITEM_NAME', 'Пожалуйста, введите название для этого пункта меню');
define('_CATEGORY_NAME_IS_BLANK', 'Категория должна иметь название');
define('_ENTER_CATEGORY_NAME', 'Введите имя категории');
define('_ENTER_CATEGORY_TITLE', 'Введите заголовок категории');
define('_CATEGORY_ALREADY_EXISTS', 'Категория с таким названием уже существует. Повторите снова');
define('_EDIT_CATEGORY', 'Редактирование');
define('_NEW_CATEGORY', 'Новая');
define('_CATEGORY_PROPERTIES', 'Свойства категории');
define('_CATEGORY_TITLE', 'Заголовок категории (Title)');
define('_CATEGORY_NAME', 'Название категории (Name)');
define('_SORT_ORDER', 'Порядок расположения');
define('_IMAGE', 'Изображение');
define('_IMAGE_POSTITION', 'Расположение изображения');
define('_MENUITEM', 'Пункт меню');
define('_NEW_MENUITEM_IN_YOUR_MENU', 'Создание нового пункта в выбранном вами меню.');
define('_MENU_NAME', 'Название пункта меню');
define('_CREATE_MENU_ITEM', 'Создать пункт меню');
define('_EXISTED_MENU_ITEMS', 'Существующие ссылки меню');
define('_NOT_EXISTS', 'Отсутствуют');
define('_MENU_LINK_AVAILABLE_AFTER_SAVE', 'Связь с меню будет доступна после сохранения');
define('_IMAGES_DIRS', 'Каталоги изображений (mosimage)');
define('_MOVE_CATEGORIES', 'Перемещение категорий');
define('_CHOOSE_CATEGORY_SECTION', 'Пожалуйста, выберите раздел для перемещаемой категории');
define('_MOVE_INTO_SECTION', 'Переместить в раздел');
define('_CATEGORIES_TO_MOVE', 'Перемещаемые категории');
define('_CONTENT_ITEMS_TO_MOVE', 'Перемещаемые объекты содержимого');
define('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', 'В выбранный раздел будут перемещены все<br />перечисленные категории и всё<br />перечисленное содержимое этих категорий.');
define('_CATEGORY_COPYING', 'Копирование категорий');
define('_CHOOSE_CAT_SECTION_TO_COPY', 'Пожалуйста, выберите раздел для копируемой категории');
define('_COPY_TO_SECTION', 'Копировать в раздел');
define('_CATS_TO_COPY', 'Копируемые категории');
define('_CONTENT_ITEMS_TO_COPY', 'Копируемое содержимое категории');
define('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', 'В выбранный раздел будут скопированы все<br />перечисленные категории и всё<br />перечисленное содержимое этих категорий.');
define('_COMPONENT', 'Компонент');
define('_BEFORE_CREATION_CAT_CREATE_SECTION', 'Перед созданием категории Вы должны создать хотя бы один раздел!');
define('_CATEGORY_IS_EDITING_NOW', 'Категория #CATNAME# в настоящее время редактируется другим администратором');
define('_TABLE_WEBLINKS_CATEGORY', 'Таблица - Веб-ссылки категории');
define('_TABLE_NEWSFEEDS_CATEGORY', 'Таблица - Ленты новостей категории');
define('_TABLE_CATEGORY_CONTACTS', 'Таблица - Контакты категории');
define('_TABLE_CATEGORY_CONTENT', 'Таблица - Содержимое категории');
define('_BLOG_CATEGORY_CONTENT', 'Блог - Содержимое категории');
define('_BLOG_CATEGORY_ARCHIVE', 'Блог - Архивное содержимое категории');
define('_USE_SECTION_SETTINGS', 'Использовать настройки раздела');
define('_CMN_ALL', 'Все');
define('_CMN_ALL_LIMITS', '-Все-');
define('_CHOOSE_CATEGORY_TO_REMOVE', 'Выберите категорию для удаления');
define('_CANNOT_REMOVE_CATEGORY', 'Категория: #CIDS# не может быть удалена, т.к. она содержит записи');
define('_CHOOSE_CATEGORY_FOR_', 'Выберите категорию для');
define('_CHOOSE_OBJECT_TO_MOVE', 'Выберите объект для перемещения');
define('_CATEGORIES_MOVED_TO', 'Категории перемещены в ');
define('_CATEGORY_MOVED_TO', 'Категории перемещены в ');
define('_CATEGORIES_COPIED_TO', 'Категории скопированы в ');
define('_CATEGORY_COPIED_TO', 'Категория скопирована в ');
define('_NEW_ORDER_SAVED', 'Новый порядок сохранен');
define('_SAVE_AND_ADD', 'Сохранить и добавить');
define('_CLOSE', 'Закрыть');
define('_CREATE_CONTENT', 'Создать содержимое');
define('_MOVE', 'Перенести');
define('_COPY', 'Копировать');

/* administrator components com_checkin */
define('_BLOCKED_OBJECTS', 'Заблокированные объекты');
define('_OBJECT', 'Объект');
define('_WHO_BLOCK', 'Заблокировал');
define('_BLOCK_TIME', 'Время блокировки');
define('_ACTION', 'Действие');
define('_GLOBAL_CHECKIN', 'Глобальная разблокировка');
define('_TABLE_IN_DB', 'Таблица базы данных');
define('_OBJECT_COUNT', 'Кол-во объектов');
define('_UNBLOCKED', 'Разблокировано');
define('_CHECHKED_TABLE', 'Проверена таблица');
define('_ALL_BLOCKED_IS_UNBLOCKED', 'Все заблокированные объекты разблокированы');
define('_MINUTES', 'минут');
define('_HOURS', 'часов');
define('_DAYS', 'дней');
define('_ERROR_WHEN_UNBLOCKING', 'При разблокировании произошла ошибка');
define('_UNBLOCKED2', 'разблокирован');

/* administrator components com_config */
define('_CONFIGURATION_IS_UPDATED', 'Конфигурация успешно обновлена');
define('_CANNOT_OPEN_CONF_FILE', 'Ошибка! Невозможно открыть для записи файл конфигурации!');
define('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', 'Вы действительно хотите изменить &laquo;Метод аутентификации сессии&raquo;?\n\nЭто действие удалит все существующие сессии фронтенда.\n\n');
define('_GLOBAL_CONFIG', 'Глобальная конфигурация');
define('_PROTECT_AFTER_SAVE', 'Защитить от записи после сохранения');
define('_IGNORE_PROTECTION_WHEN_SAVE', 'Игнорировать защиту от записи при сохранении');
define('_CONFIG_SAVING', 'Сохранение конфигурации');
define('_NOT_AVAILABLE_CHECK_RIGHTS', 'не доступно');
define('_AVAILABLE_CHECK_RIGHTS', 'доступно');
define('_SITE_NAME', 'Название сайта');
define('_SITE_LANGUAGE', 'Язык сайта');
define('_SITE_OFFLINE', 'Сайт выключен');
define('_SITE_OFFLINE_MESSAGE', 'Сообщение при выключенном сайте');
define('_SITE_OFFLINE_MESSAGE2', 'Сообщение, которое выводится пользователям вместо сайта, когда он находится в выключенном состоянии.');
define('_SYSTEM_ERROR_MESSAGE', 'Сообщение при системной ошибке');
define('_SYSTEM_ERROR_MESSAGE2', 'Сообщение, которое выводится пользователям вместо сайта, когда Joostina! не может подключиться к базе данных MySQL.');
define('_SHOW_READMORE_TO_AUTH', 'Показывать &laquo;Подробнее…&raquo; неавторизованным');
define('_SHOW_READMORE_TO_AUTH2', 'Если &laquo;Да&raquo;, то неавторизованным пользователям будут показываться ссылки на содержимое с уровнем доступа &laquo;Для зарегистрированных&raquo;. Для возможности полного просмотра пользователь должен будет авторизоваться.');
define('_ENABLE_USER_REGISTRATION', 'Разрешить регистрацию пользователей');
define('_ENABLE_USER_REGISTRATION2', 'Если &laquo;Да&raquo;, то пользователям будет разрешено регистрироваться на сайте.');
define('_ACCOUNT_ACTIVATION', 'Использовать активацию нового аккаунта');
define('_ACCOUNT_ACTIVATION2', 'Если &laquo;Да&raquo;, то пользователю необходимо будет активировать новый аккаунт, после получения им письма со ссылкой для активации.');
define('_UNIQUE_EMAIL', 'Требовать уникальный E-mail');
define('_UNIQUE_EMAIL2', 'Если &laquo;Да&raquo;, то пользователи не смогут создавать несколько аккаунтов с одинаковым адресом e-mail.');
define('_USER_PARAMS', 'Параметры пользователя сайта');
define('_USER_PARAMS2', 'Если &laquo;Нет&raquo;, то будет отключена возможность установки пользователем параметров сайта (выбор редактора)');
define('_DEFAULT_EDITOR', 'WYSIWYG-редактор по умолчанию');
define('_LIST_LIMIT', 'Длина списков (кол-во строк)');
define('_LIST_LIMIT2', 'Устанавливает длину списков по умолчанию в панели управления для всех пользователей');
define('_FRONTPAGE', 'Фронт');
define('_SITE', 'Сайт');
define('_CUSTOM_PRINT', 'Страница печати из каталога шаблона');
define('_CUSTOM_PRINT2', 'Использование произвольной страницы для печатного вида из каталога текущего шаблона');
define('_MODULES_MULTI_LANG', 'Разрешить многоязычность модулей');
define('_MODULES_MULTI_LANG2', 'Позволить системе проверять языковые файлы модулей, если у вас таких не имеется - рекомендуется установить &laquo;Нет&raquo;');
define('_DATE_FORMAT_TXT', 'Формат даты');
define('_DATE_FORMAT2', 'Выберите формат для отображения даты. Необходимо использовать формат в соответствии с правилами strftime.');
define('_DATE_FORMAT_FULL', 'Полный формат даты и времени');
define('_DATE_FORMAT_FULL2', 'Выберите полный формат для отображения даты и времени. Необходимо использовать формат в соответствии с правилами strftime.');
define('_USE_H1_FOR_HEADERS', 'Обрамлять заголовки содержимого тегом H1 при полном просмотре');
define('_USE_H1_FOR_HEADERS2', 'Обрамлять заголовки тегом h1 только в режиме полного просмотра содержимого ( при нажатии на Подробнее… ).');
define('_USE_H1_HEADERS_ALWAYS', 'Обрамлять все заголовки содержимого тегом H1');
define('_USE_H1_HEADERS_ALWAYS2', 'Помещать заголовки материала в теги h1.');
define('_DISABLE_RSS', 'Отключить генерацию RSS (syndicate)');
define('_DISABLE_RSS2', 'Если &laquo;Да&raquo;, то будет отключена возможность генерации RSS лент и работа с ними');
define('_USE_TEMPLATE', 'Использовать шаблон');
define('_USE_TEMPLATE2', 'При выборе шаблона он будет использован на всем сайте независимо от привязок к пунктам меню других шаблонов. Для использования нескольких шаблонов выберите &laquo;Разные&raquo;');
define('_FAVICON_IMAGE', 'Значок сайта в &laquo;Закладках&raquo; браузера (Нормальные браузеры)');
define('_FAVICON_IMAGE_IE', 'Значок сайта в &laquo;Закладках&raquo; браузера (IE)');
define('_FAVICON_IMAGE_IPAD', 'Значок сайта в &laquo;Закладках&raquo; браузера (iPad)');
define('_FAVICON_IMAGE2', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (Нормальные браузеры). Если не указано или файл значка не найден, по умолчанию будет использоваться файл favicon.png.');
define('_FAVICON_IMAGE2_IE', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (IE). Если не указано или файл значка не найден, по умолчанию будет использоваться файл favicon.ico.');
define('_FAVICON_IMAGE2_IPAD', 'Значок сайта в &laquo;Закладках&raquo; (&laquo;Избранном&raquo;) браузера (iPad). Если не указано или файл значка не найден, по умолчанию будет использоваться файл apple-touch-icon.png.');
define('_FAVICON_IMAGE3', 'Значок сайта в &laquo;Закладках&raquo; (Нормальные браузеры)');
define('_FAVICON_IMAGE3_IE', 'Значок сайта в &laquo;Закладках&raquo; (IE)');
define('_FAVICON_IMAGE3_IPAD', 'Значок сайта в &laquo;Закладках&raquo; (iPad)');
define('_DISABLE_FAVICON', 'Отключить favicon (Нормальные браузеры)');
define('_DISABLE_FAVICON_IE', 'Отключить favicon (IE)');
define('_DISABLE_FAVICON_IPAD', 'Отключить favicon (iPad)');
define('_DISABLE_FAVICON2', 'Использовать в качестве значка сайта favicon (Нормальные браузеры)');
define('_DISABLE_FAVICON2_IE', 'Использовать в качестве значка сайта favicon (IE)');
define('_DISABLE_FAVICON2_IPAD', 'Использовать в качестве значка сайта favicon (iPad)');
define('_DISABLE_SYSTEM_MAMBOTS', 'Отключить мамботы группы system');
define('_DISABLE_SYSTEM_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование системных мамботов будет прекращено. ВНИМАНИЕ, если на сайте используются мамботы этой группы, то активация параметра не рекомендуется');
define('_DISABLE_CONTENT_MAMBOTS', 'Отключить мамботы группы content');
define('_DISABLE_CONTENT_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование мамботов обработки контента будет прекращено. ВНИМАНИЕ, если на сайте используются мамботы этой группы, то активация параметра не рекомендуется');
define('_DISABLE_MAINBODY_MAMBOTS', 'Отключить мамботы группы mainbody');
define('_DISABLE_MAINBODY_MAMBOTS2', 'Если &laquo;Да&raquo;, то использование мамботов обработки стека компонентов (mainbody) будет прекращено.');
define('_SITE_AUTH', 'Авторизация на сайте');
define('_SITE_AUTH2', 'Если &laquo;Нет&raquo;, то страница авторизации на сайте будет отключена, если с ней не связан пункт меню. Также будет отключена возможность регистрации на сайте');
define('_FRONT_SESSION_TIME', 'Время существования сессии на фронте');
define('_FRONT_SESSION_TIME2', 'Время автоотключения пользователя сайта при неактивности. Большое значение этого параметра снижает безопасность.');
define('_DISABLE_FRONT_SESSIONS', 'Отключить сессии на фронте');
define('_DISABLE_FRONT_SESSIONS2', 'Если &laquo;Да&raquo;, то будет отключено ведение сессий для каждого пользователя на сайте. Если подсчет числа пользователей не нужен и регистрация отключена - можно выключить.');
define('_DISABLE_ACCESS_CHECK_TO_CONTENT', 'Отключить контроль доступа к содержимому');
define('_DISABLE_ACCESS_CHECK_TO_CONTENT2', 'Если &laquo;Да&raquo;, то контроль доступа к содержимому осуществляться не будет, и всем пользователям будет отображено всё содержимое. Рекомендуется совместно с пунктами отключения авторизации и сессий на фронте.');
define('_COUNT_CONTENT_HITS', 'Считать число прочтений содержимого');
define('_COUNT_CONTENT_HITS2', 'При выключении параметра статистика прочтений содержимого будет не активна.');
define('_DISABLE_CHECK_CONTENT_DATE', 'Отключить проверки публикации по датам');
define('_DISABLE_CHECK_CONTENT_DATE2', 'Если на сайте не критичны временные промежутки публикации содержимого - то данный параметр лучше активизировать.');
define('_DISABLE_MODULES_WHEN_EDIT', 'Отключать модули в редактировании');
define('_DISABLE_MODULES_WHEN_EDIT2', 'Если &laquo;Да&raquo;, то на странице редактирования содержимого с фронта будут отключены все модули');
define('_COUNT_GENERATION_TIME', 'Рассчитывать время генерации страницы');
define('_COUNT_GENERATION_TIME2', 'Если &laquo;Да&raquo;, то на каждой странице будет отображено время на её генерацию');
define('_ENABLE_GZIP', 'GZIP-сжатие страниц');
define('_ENABLE_GZIP2', 'Поддержка сжатия страниц перед отправкой (если поддерживается). Включение этой функции уменьшает размер загружаемых страниц и приводит к уменьшению трафика. В то же время, это увеличивает нагрузку на сервер.');
define('_IS_SITE_DEBUG', 'Режим отладки сайта');
define('_IS_SITE_DEBUG2', 'Если &laquo;Да&raquo;, то будет показываться диагностическая информация, запросы и ошибки MySQL…');
define('_EXTENDED_DEBUG', 'Расширенный отладчик');
define('_EXTENDED_DEBUG2', 'Использовать на фронте сайта расширенный отладчик выводящий множество информации о сайте.');
define('_CONTROL_PANEL', 'Панель управления');
define('_DISABLE_ADMIN_SESS_DEL', 'Отключить удаление сессий в панели управления');
define('_DISABLE_ADMIN_SESS_DEL2', 'Не удалять сессии даже после истечения времени существования.');
define('_DISABLE_HELP_BUTTON', 'Отключить кнопку &laquo;Помощь&raquo;');
define('_DISABLE_HELP_BUTTON2', 'Позволяет запретить к показу кнопку помощи тулбара панели управления.');
define('_USE_OLD_TOOLBAR', 'Использовать старое отображение туллбара');
define('_USE_OLD_TOOLBAR2', 'При активировании параметра вывод кнопок туллбара будет произведён в режиме таблиц, как было в Joomla.');
define('_DISABLE_IMAGES_TAB', 'Отключить вкладку &laquo;Изображения&raquo;');
define('_DISABLE_IMAGES_TAB2', 'Позволяет запретить к показу при редактировании содержимого вкладку &laquo;Изображения&raquo;.');
define('_ADMIN_SESS_TIME', 'Время существования сессии в панели управления');
define('_SECONDS', 'секунд');
define('_ADMIN_SESS_TIME2', 'Время, по истечении которого будут отключены пользователи <strong>админцентра</strong> при неактивности. Слишком большое значение уменьшает защищенность сайта!');
define('_SAVE_LAST_PAGE', 'Запоминать страницу Админцентра при окончании сессии');
define('_SAVE_LAST_PAGE2', 'Если сессия работы в панели управления закончилась, и Вы заходите на сайт в течение 10 минут, то при входе вы будете перенаправлены на страницу, с которой произошло отключение');
define('_HTML_CSS_EDITOR', 'Визуальный редактор для html и css');
define('_HTML_CSS_EDITOR2', 'Использовать редактор с подсветкой синтаксиса для редактирования html и css файлов шаблона');
define('_THIS_PARAMS_CONTROL_CONTENT', '<span class="green">* Эти параметры контролируют вывод элементов содержимого. *</span>');
define('_LINK_TITLES', 'Заголовки в виде ссылок');
define('_LINK_TITLES2', 'Если &laquo;Да&raquo;, заголовки объектов содержимого начинают работать как гиперссылки на эти объекты');
define('_READMORE_LINK', 'Ссылка &laquo;Подробнее…&raquo;');
define('_READMORE_LINK2', 'Если выбран параметр &laquo;Показать&raquo;, то будет показываться ссылка &laquo;Подробнее…&raquo; для просмотра полного содержимого');
define('_VOTING_ENABLE', 'Рейтинг/Голосование');
define('_VOTING_ENABLE2', 'Если выбран параметр &laquo;Показать&raquo;, система &laquo;Рейтинг/Голосование&raquo; будет включена');
define('_AUTHOR_NAMES', 'Имена авторов');
define('_AUTHOR_NAMES2', 'Выберите, показывать ли имена авторов. Это глобальная установка, но она может быть изменена в других местах на уровне меню или объекта.');
define('_DATE_TIME_CREATION', 'Дата и время создания');
define('_DATE_TIME_CREATION2', 'Если &laquo;Показать&raquo;, то показывается дата и время создания статьи. Это глобальная установка, но может быть изменена в других местах на уровне меню или объекта.');
define('_DATE_TIME_MODIFICATION', 'Дата и время изменения');
define('_DATE_TIME_MODIFICATION2', 'Если установлено &laquo;Показать&raquo;, то будет показываться дата изменения статьи. Это глобальная установка, но она может быть изменена в других местах.');
define('_VIEW_COUNT', 'Кол-во просмотров');
define('_VIEW_COUNT2', 'Если установлено &laquo;Показать&raquo;, то показывается количество просмотров объекта посетителями сайта. Эта глобальная установка может быть изменена в других местах панели управления.');
define('_LINK_PRINT', 'Ссылка &laquo;Печать&raquo;');
define('_LINK_PDF', 'Ссылка &laquo;PDF&raquo;');
define('_LINK_EMAIL', 'Ссылка &laquo;E-mail&raquo;');
define('_PRINT_EMAIL_ICONS', 'Значки &laquo;Печать&raquo;, &laquo;E-mail&raquo; и &laquo;PDF&raquo;');
define('_PRINT_EMAIL_ICONS2', 'Если выбрано &laquo;Показать&raquo;, то ссылки &laquo;Печать&raquo;, &laquo;E-mail&raquo; и &laquo;PDF&raquo; будут отображаться в виде значков, иначе - простым текстом-ссылкой.');
define('_PRINT_PDF_ICON', 'Параметр недоступен, когда каталог /media защищен от записи.');
define('_ENABLE_TOC', 'Оглавление для многостраничных объектов');
define('_BACK_BUTTON', 'Кнопка &laquo;Назад&raquo; (&laquo;Вернуться&raquo;)');
define('_CONTENT_NAV', 'Навигация по содержимому');
define('_UNIQ_ITEMS_IDS', 'Уникальные идентификаторы новостей');
define('_UNIQ_ITEMS_IDS2', 'При включении параметра для каждой новости в списке будет задаваться уникальный идентификатор стиля.');
define('_AUTO_PUBLICATION_FRONT', 'Автоматическая публикация на главной');
define('_AUTO_PUBLICATION_FRONT2', 'При включении параметра всё создаваемое содержимое будет автоматически помечено для публикации на главной странице.');
define('_DISABLE_BLOCK', 'Отключить блокировки содержимого');
define('_DISABLE_BLOCK2', 'При включении параметра блокировки объектов содержимого не будут проверяться. Не рекомендуется использовать на сайтах с большим числом редакторов.');
define('_ITEMID_COMPAT', 'Режим работы Itemid');
define('_ONE_EDITOR', 'Использовать единое поле редактора');
define('_ONE_EDITOR2', 'Использовать одно поле для Вводного и Основного текста.');
define('_LOCALE', 'Локаль');
define('_TIME_OFFSET', 'Часовой пояс (смещение времени относительно UTC, ч)');
define('_TIME_OFFSET2', 'Текущие дата и время, которые будут показываться на сайте:');
define('_TIME_DIFF', 'Разница со временем сервера, ч');
define('_TIME_DIFF2', 'RSS (смещение времени относительно UTC, ч)');
define('_CURR_DATE_TIME_RSS', 'Текущие дата и время, которые будут показываться в RSS');
define('_COUNTRY_LOCALE', 'Локаль страны');
define('_COUNTRY_LOCALE2', 'Определяет региональные настройки страны: отображение даты, времени, чисел и т.д.');
define('_LOCALE_WINDOWS', 'При использовании в Windows необходимо ввести <span style="color:red">RU</span>.<br />В Unix-системах, если не работает значение по умолчанию, можно попробовать изменить регистр символов локали на <span style="color:red">RU_RU.CP1251</span>, <span style="color:red">ru_RU.cp1251</span>, <span style="color:red">ru_ru.CP1251</span>, или узнать значение русской локали у провайдера.<br />Также можно попробовать ввести одну из следующих локалей: <span style="color:red">rus</span>, <span style="color:red">russian</span>');
define('_DB_HOST', 'Адрес хоста MySQL');
define('_DB_USER', 'Имя пользователя БД (MySQL)');
define('_DB_NAME', 'База данных MySQL');
define('_DB_PREFIX', 'Префикс базы данных MySQL');
define('_DB_PREFIX2', '!! НЕ ИЗМЕНЯЙТЕ, ЕСЛИ У ВАС УЖЕ ЕСТЬ РАБОЧАЯ БАЗА ДАННЫХ. В ПРОТИВНОМ СЛУЧАЕ, ВЫ МОЖЕТЕ ПОТЕРЯТЬ К НЕЙ ДОСТУП !!');
define('_EVERYDAY_OPTIMIZATION', 'Ежедневная оптимизация таблиц базы данных');
define('_EVERYDAY_OPTIMIZATION2', 'Если &laquo;Да&raquo;, то каждые сутки база данных будет автоматически оптимизирована для лучшего быстродействия');
define('_OLD_MYSQL_SUPPORT', 'Поддержка младших версий MySQL');
define('_OLD_MYSQL_SUPPORT2', 'Параметр позволяет отключить автоматический перевод работы БД в режим совместимости с кириллицей');
define('_DISABLE_SET_SQL', 'Отключить SET sql_mode');
define('_DISABLE_SET_SQL2', 'Отключить перевод режима работы базы данных SET sql_mode');
define('_SERVER', 'Сервер');
define('_ABS_PATH', 'Абсолютный путь( корень сайта )');
define('_MEDIA_ROOT', 'Корень медиа менеджера');
define('_MEDIA_ROOT2', 'Корневой каталог для работы компонента управления медиа данными. Путь от корня сайта без &frasl; по краям.');
define('_FILE_ROOT', 'Корень файлового менеджера');
define('_FILE_ROOT2', 'Корневой каталог для работы компонента управления файлами. Без &frasl; в конце. При использовании в Windows (c) путь может начинаться с названия буквы диска.');
define('_SECRET_WORD', 'Секретное слово');
define('_GZ_CSS_JS', 'Сжатие CSS и JS файлов');
define('_SESSION_TYPE', 'Метод идентификации сессии');
define('_SESSION_TYPE2', 'Не изменяйте, если не знаете, зачем это надо!<br /><br />Если сайт будет использоваться пользователями службы AOL или пользователями, использующими для доступа на сайт прокси-серверы, то можете использовать настройки 2 уровня');
define('_HELP_SERVER', 'Сервер помощи');
define('_HELP_SERVER2', 'Сервер помощи - Если поле пустое, то файлы помощи будут браться из локальной папки http://адрес_вашего_сайта/help/, Для включения сервера On-Line помощи введите http://joostina.ru, http://help.joom.ru или http://help.joomla.org');
define('_FILE_MODE', 'Создание файлов');
define('_FILE_MODE2', 'Разрешения доступа к файлам');
define('_FILE_MODE3', 'Не менять CHMOD для новых файлов (использовать умолчание сервера)');
define('_FILE_MODE4', 'Установить CHMOD для новых файлов');
define('_FILE_MODE5', 'Выберите этот пункт для установки разрешений доступа к вновь создаваемым файлам');
define('_OWNER', 'Владелец');
define('_O_READ', 'чтение');
define('_O_WRITE', 'запись');
define('_O_EXEC', 'выполнение');
define('_APPLY_TO_FILES', 'Применить к существующим файлам');
define('_APPLY_TO_FILES2', 'Изменения коснутся <em>всех существующих файлов</em> на сайте.<br /><strong>НЕПРАВИЛЬНОЕ ИСПОЛЬЗОВАНИЕ ЭТОЙ ОПЦИИ МОЖЕТ ПРИВЕСТИ К НЕРАБОТОСПОСОБНОСТИ САЙТА!</strong>');
define('_DIR_CREATION', 'Создание каталогов');
define('_DIR_CREATION2', 'Разрешения доступа к каталогам');
define('_DIR_CREATION3', 'Не менять CHMOD для новых каталогов (использовать умолчание сервера)');
define('_DIR_CREATION4', 'Установить CHMOD для новых каталогов');
define('_DIR_CREATION5', 'Выберите этот пункт для установки разрешений доступа к вновь создаваемым каталогам');
define('_O_SEARCH', 'поиск');
define('_APPLY_TO_DIRS', 'Применить к существующим каталогам');
define('_APPLY_TO_DIRS2', 'Включение этих флагов будет применено <em>ко всем существующим каталогам</em> на сайте.<br />' . '<strong>НЕПРАВИЛЬНОЕ ИСПОЛЬЗОВАНИЕ ЭТОЙ ОПЦИИ МОЖЕТ ПРИВЕСТИ К НЕРАБОТОСПОСОБНОСТИ САЙТА!</strong>');
define('_O_GROUP', 'Группа');
define('_O_AS', 'как');
define('_RG_EMULATION_TXT', 'Эмуляция Регистрации глобальных переменных');
define('_RG_DISABLE', 'Выкл. (<span class="green">РЕКОМЕНДУЕТСЯ</span>) - дополнительная защита');
define('_RG_ENABLE', 'Вкл. (<span class="red">НЕ РЕКОМЕНДУЕТСЯ</span>) - совместимость со старыми расширениями, при использовании параметра повышается угроза безопасности.');
define('_METADATA', 'Метаданные');
define('_SITE_DESC', 'Описание сайта, которое индексируется поисковиками');
define('_SITE_DESC2', ' Вы можете не ограничивать Ваше описание двадцатью словами, в зависимости от Поискового сервера, который Вы планируете использовать. Делайте описание кратким и подходящим для содержания вашего сайта. Вы можете включить некоторые из ваших ключевых слов и ключевых фраз. Так как некоторые поисковые серверы читают больше 20 слов, то Вы можете добавить одно или два предложения. Пожалуйста удостоверьтесь, что самая важная часть вашего описания находится в первых 20 словах.');
define('_SITE_KEYWORDS', 'Ключевые слова сайта');
define('_SITE_KEYWORDS2', ' Вы можете не ограничивать Ваш ключевые слова двадцатью, в зависимости от Поискового сервера, который Вы планируете использовать. Делайте ключевые слова подходящим для содержания вашего сайта.');
define('_SHOW_TITLE_TAG', 'Показывать мета-тег <strong>title</strong>');
define('_SHOW_TITLE_TAG2', 'Показывает мета-тег <strong>title</strong> при просмотре объектов содержимого');
define('_SHOW_GEO_TAG', '<strong>Geotagging</strong>');
define('_SHOW_GEO_TAG2', 'Показывает <strong>Geotagging</strong> мета-теги при просмотре объектов содержимого');
define('_SHOW_GEO_TAG_LATITUDE', 'Широта');
define('_SHOW_GEO_TAG2_LATITUDE', 'Широта объекта. Записывается в формате <strong>50.167958</strong> (пример!). Если объект расположен в западном полушарии, то перед циврами добавляется знак минуса (-).');
define('_SHOW_GEO_TAG_LONGITUDE', 'Долгота');
define('_SHOW_GEO_TAG2_LONGITUDE', 'Долгота объекта. Записывается в формате <strong>50.167958</strong> (пример!). Если объект расположен в южном полушарии, то перед циврами добавляется знак минуса (-).');
define('_SHOW_GEO_TAG_PLACENAME', 'Месторасположение объекта');
define('_SHOW_GEO_TAG2_PLACENAME', 'Месторасположения объекта. Записывется в формате <strong>Город, Страна</strong> (пример!)');
define('_SHOW_GEO_TAG_REGION', 'Регион объекта');
define('_SHOW_GEO_TAG2_REGION', 'Регион объекта. Записывется в двубуквенном формате страны <strong>ru</strong> (пример!)');
define('_SHOW_DCORE', '<strong>Dublin Core Metadata Element Set</strong>');
define('_SHOW_DCORE2', 'Показывает <strong>Dublin Core Metadata Element Set (DCMES)</strong> мета-теги при просмотре объектов содержимого');
define('_SHOW_DCORE_LANGUAGE', 'Язык');
define('_SHOW_DCORE2_LANGUAGE', 'Язык. Записывется в двубуквенном формате страны <strong>ru</strong> (пример!)');
define('_SHOW_GA', '<strong>Google Analitics</strong>');
define('_SHOW_GA2', 'Показывает код <strong>Google Analitics</strong> в генерируемом коде');
define('_SHOW_GA_ID', 'Google Analitics <strong>ID</strong>');
define('_SHOW_GA2_ID', '<strong>Google Analitics ID</strong> для отслеживания статистики сайта');
define('_SHOW_YM', '<strong>Яндекс.Метрика</strong>');
define('_SHOW_YM2', 'Показывает код <strong>Яндекс.Метрика</strong> в генерируемом коде');
define('_SHOW_YM_ID', 'Яндекс.Метрика <strong>ID</strong>');
define('_SHOW_YM2_ID', '<strong>Яндекс.Метрика ID</strong> для отслеживания статистики сайта');
define('_SHOW_AUTHOR_TAG', 'Показывать мета-тег <strong>author</strong>');
define('_SHOW_AUTHOR_TAG2', 'Показывает мета-тег <strong>author</strong> при просмотре объектов содержимого');
define('_SHOW_BASE_TAG', 'Показывать мета-тег <strong>base</strong>');
define('_SHOW_BASE_TAG2', 'Показывает мета-тег <strong>base</strong> в теле каждой страницы');
define('_REVISIT_TAG', 'Значение тега <strong>revisit</strong>');
define('_REVISIT_TAG2', 'Укажите значение тега <strong>revisit</strong> в днях');
define('_DISABLE_GENERATOR_TAG', 'Отключить тег <strong>Generator</strong>');
define('_DISABLE_GENERATOR_TAG2', 'Если &laquo;Да&raquo;, то из кода каждой HTML страницы будет исключен тег name=&laquo;Generator&raquo;');
define('_EXT_IND_TAGS', 'Расширенные теги индексации');
define('_EXT_IND_TAGS2', 'Если &laquo;Да&raquo;, то в код каждой страницы будут добавлены специальные теги для лучшей индексации');
define('_MAIL', 'Почта');
define('_MAIL_METHOD', 'Для отправки почты использовать');
define('_MAIL_FROM_ADR', 'Письма от (Mail From)');
define('_MAIL_FROM_NAME', 'Отправитель (From Name)');
define('_SENDMAIL_PATH', 'Путь к Sendmail');
define('_USE_SMTP', 'Использовать SMTP-авторизацию');
define('_USE_SMTP2', 'Выберите &laquo;ДА&raquo;, если для отправки почты используется smtp-сервер с необходимостью авторизации');
define('_SMTP_USER', 'Имя пользователя SMTP');
define('_SMTP_USER2', 'Заполняется, если для отправки почты используется smtp-сервер с необходимостью авторизации');
define('_SMTP_PASS', 'Пароль для доступа к SMTP');
define('_SMTP_PASS2', 'Заполняется, если для отправки почты используется smtp-сервер с необходимостью авторизации');
define('_SMTP_SERVER', 'Адрес SMTP-сервера');
define('_CACHE', 'Кэш');
define('_ENABLE_CACHE', 'Включить кэширование');
define('_ENABLE_CACHE2', 'Включение кэширования уменьшает запросы к MySQL и уменьшению нагрузки на сервер');
define('_CACHE_OPTIMIZATION', 'Оптимизация кэширования');
define('_CACHE_OPTIMIZATION2', 'Автоматически удаляет из файлов кэша лишние символы тем самым уменьшая размер файлов.');
define('_AUTOCLEAN_CACHE_DIR', 'Автоматическая очистка каталога кэша');
define('_AUTOCLEAN_CACHE_DIR2', 'Автоматически очищать каталог кэша удаляя просроченные файлы.');
define('_CACHE_MENU', 'Кэширование меню панели управления');
define('_CACHE_MENU2', 'Включение кэширования меню панели управления. Работает независимо от стандартного кэша.');
define('_CANNOT_CACHE', 'Кэширование не возможно');
define('_CANNOT_CACHE2', '<strong class="red">Каталог кэша не доступен для записи.</strong>');
define('_CACHE_DIR', 'Каталог кэша');
define('_CACHE_DIR2', 'Текущий каталог кэша <strong>Доступен для записи</strong>');
define('_CACHE_DIR3', 'Текущий каталог кэша <strong>НЕ ДОСТУПЕН ДЛЯ ЗАПИСИ</strong> - смените CHMOD каталога на 755 перед включением кэша');
define('_CACHE_TIME', 'Время жизни кэша');
define('_DB_CACHE', 'Кэш запросов базы данных');
define('_DB_CACHE_TIME', 'Время жизни кэша запросов базы данных');
define('_STATICTICS', 'Статистика');
define('_ENABLE_STATS', 'Включить сбор статистики');
define('_ENABLE_STATS2', 'Разрешить/запретить сбор статистики сайта');
define('_STATS_HITS_DATE', 'Вести статистику просмотра содержимого по дате');
define('_STATS_HITS_DATE2', 'ПРЕДУПРЕЖДЕНИЕ: В этом режиме записываются большие объемы данных!');
define('_STATS_SEARCH_QUERIES', 'Статистика поисковых запросов');
define('_SEF_URLS', 'Дружественные для поисковых систем URL-ы (SEF)');
define('_SEF_URLS2', 'Только для Apache! Перед использованием переименуйте htaccess.txt в .htaccess. Это необходимо для включения модуля apache - mod_rewrite');
define('_DYNAMIC_PAGETITLES', 'Динамические заголовки страниц (теги title)');
define('_DYNAMIC_PAGETITLES2', 'Динамическое изменение заголовков страниц в зависимости от текущего просматриваемого содержимого');
define('_CLEAR_FRONTPAGE_LINK', 'Очистка ссылки на com_frontpage');
define('_CLEAR_FRONTPAGE_LINK2', 'Придавать ссылке на компонент главной страницы более короткий вид.');
define('_DISABLE_PATHWAY_ON_FRONT', 'Скрывать пачвей (pathway) на главной');
define('_DISABLE_PATHWAY_ON_FRONT2', 'При включенном режиме строка &laquo;Главная&raquo; на первой странице сайта будет заменена на символ неразрывного пробела.');
define('_TITLE_ORDER', 'Порядок расположения элементов title');
define('_TITLE_ORDER2', 'Порядок расположения элементов заголовка страниц (тег title)');
define('_TITLE_SEPARATOR', 'Разделитель элементов title');
define('_TITLE_SEPARATOR2', 'Разделитель элементов заголовка страниц (тег title). По умолчанию - дефис.');
define('_INDEX_PRINT_PAGE', 'Индексация печатной версии');
define('_INDEX_PRINT_PAGE2', 'Если &laquo;Да&raquo;, то печатная версия содержимого будет доступна для индексации');
define('_REDIR_FROM_NOT_WWW', 'Переадресация с не WWW адресов');
define('_REDIR_FROM_NOT_WWW2', 'При заходе на сайт по ссылке site.ru, автоматически будет произведена переадресация на www.site.ru');
define('_ADMIN_CAPTCHA', 'Для авторизации в панели управления');
define('_ADMIN_CAPTCHA2', 'Использовать captcha для более безопасной авторизации в панели управления.');
define('_REGISTRATION_CAPTCHA', 'Для регистрации');
define('_REGISTRATION_CAPTCHA2', 'Использовать captcha для более безопасной регистрации.');
define('_CONTACTS_CAPTCHA', 'Для формы контактов');
define('_CONTACTS_CAPTCHA2', 'Использовать captcha для более безопасной формы контактов.');

define('_O_OTHER', 'Разные');
define('_SECURITY_LEVEL3', '3 уровень защиты - По умолчанию - наилучший');
define('_SECURITY_LEVEL2', '2 уровень защиты - Разрешено для IP-адресов прокси');
define('_SECURITY_LEVEL1', '1 уровень защиты - Обратная совместимость');
define('_PHP_MAIL_FUNCTION', 'Функцию PHP mail');
define('_CONSTRUCT_ERROR', 'ошибка сборки');

define('_TIME_OFFSET_M_12', '(UTC -12:00) Международная линия суточного времени');
define('_TIME_OFFSET_M_11', '(UTC -11:00) остров Мидуэй, Самоа');
define('_TIME_OFFSET_M_10', '(UTC -10:00) Гавайи');
define('_TIME_OFFSET_M_9_5', '(UTC -09:30) Тайохае, Маркизские острова');
define('_TIME_OFFSET_M_9', '(UTC -09:00) Аляска');
define('_TIME_OFFSET_M_8', '(UTC -08:00) Тихоокеанское время (США &amp; Канада)');
define('_TIME_OFFSET_M_7', '(UTC -07:00) Время Монтаны (США &amp; Канада)');
define('_TIME_OFFSET_M_6', '(UTC -06:00) Центральное время  (США &amp; Канада), Мехико');
define('_TIME_OFFSET_M_5', '(UTC -05:00) Восточное время (США &amp; Канада), Богота, Лайма');
define('_TIME_OFFSET_M_4', '(UTC -04:00) Атлантическое время (Канада), Каракас, Ла-Пас');
define('_TIME_OFFSET_M_3_5', '(UTC -03:30) Ньюфаундленд и Лабрадор');
define('_TIME_OFFSET_M_3', '(UTC -03:00) Бразилия, Буэнос Айрес, Джорджтаун');
define('_TIME_OFFSET_M_2', '(UTC -02:00) Средне-Атлантическое время');
define('_TIME_OFFSET_M_1', '(UTC -01:00 час) Азорские острова, Острова Зеленого Мыса');
define('_TIME_OFFSET_M_0', '(UTC 00:00) Западно-Европейское время, Лондон, Лиссабон, Касабланка');
define('_TIME_OFFSET_P_1', '(UTC +01:00 час) Брюссель, Копенгаген, Мадрид, Париж');
define('_TIME_OFFSET_P_2', '(UTC +02:00) Украина, Киев, Минск, Калининград, Южная Африка');
define('_TIME_OFFSET_P_3', '(UTC +03:00) Москва, Санкт-Петербург, Багдад, Эр-Рияд');
define('_TIME_OFFSET_P_3_5', '(UTC +03:30) Тегеран');
define('_TIME_OFFSET_P_4', '(UTC +04:00) Самара, Баку, Тбилиси, Абу-Даби, Мускат');
define('_TIME_OFFSET_P_4_5', '(UTC +04:30) Кабул');
define('_TIME_OFFSET_P_5', '(UTC +05:00) Оренбург, Екатеринбург, Пермь, Ташкент, Исламабад, Карачи');
define('_TIME_OFFSET_P_5_5', '(UTC +05:30) Бомбей, Калькутта, Мадрас, Нью-Дели');
define('_TIME_OFFSET_P_5_75', '(UTC +05:45) Катманду');
define('_TIME_OFFSET_P_6', '(UTC +06:00) Омск, Новосибирск, Алматы, Дака, Коломбо');
define('_TIME_OFFSET_P_6_5', '(UTC +06:30) Ягун');
define('_TIME_OFFSET_P_7', '(UTC +07:00) Красноярск, Бангкок, Ханой, Джакарта');
define('_TIME_OFFSET_P_8', '(UTC +08:00) Иркутск, Улан-Батор, Пекин, Сингапур, Гонконг');
define('_TIME_OFFSET_P_8_75', '(UTC +08:00) Западная Австралия');
define('_TIME_OFFSET_P_9', '(UTC +09:00) Якутск, Токио, Сеул, Осака, Саппоро');
define('_TIME_OFFSET_P_9_5', '(UTC +09:30) Аделаида, Дарвин');
define('_TIME_OFFSET_P_10', '(UTC +10:00) Владивосток, Гуам, Восточная Австралия');
define('_TIME_OFFSET_P_10_5', '(UTC +10:30) остров Lord Howe (Австралия)');
define('_TIME_OFFSET_P_11', '(UTC +11:00) Магадан, Соломоновы острова, Новая Каледония');
define('_TIME_OFFSET_P_11_5', '(UTC +11:30) остров Норфолк');
define('_TIME_OFFSET_P_12', '(UTC +12:00) Камчатка, Окленд, Уэллингтон, Фиджи');
define('_TIME_OFFSET_P_12_75', '(UTC +12:45) Остров Чатем');
define('_TIME_OFFSET_P_13', '(UTC +13:00) Тонга');
define('_TIME_OFFSET_P_14', '(UTC +14:00) Кирибати');

/* administrator components com_contact */
define('_CONTACT_MANAGEMENT', 'Управление контактами');
define('_ON_SITE', 'На сайте');
define('_RELATED_WITH_USER', 'Связано с пользователем');
define('_CHANGE_CONTACT', 'Изменить контакт');
define('_CHANGE_CATEGORY', 'Изменить категорию');
define('_CHANGE_USER', 'Изменить пользователя');
define('_ENTER_NAME_PLEASE', 'Вы должны ввести имя');
define('_NEW_CONTACT', 'Новый');
define('_CONTACT_DETAILS', 'Детали контакта');
define('_USER_POSITION', 'Положение (должность)');
define('_ADRESS_STREET_HOUSE', 'Адрес (улица, дом)');
define('_CITY', 'Город');
define('_STATE', 'Край/Область/Республика');
define('_COUNTRY', 'Страна');
define('_POSTCODE', 'Почтовый индекс');
define('_ADDITIONAL_INFO', 'Дополнительная информация');
define('_PUBLISH_INFO', 'Информация о публикации');
define('_POSITION', 'Расположение');
define('_IMAGES_INFO', 'Информация об изображении');
define('_PARAMETERS', 'Параметры');
define('_CONTACT_PARAMS', '* Эти параметры управляют отображением только при просмотре информации о контакте. *');

/* administrator components com_content */
define('_SITE_CONTENT', 'Содержимое сайта');
define('_GOTO_EDIT', 'Перейти в редактирование');
define('_SORT_BY', 'Сортировка по');
define('_HIDE_NAV_TREE', 'Скрыть дерево навигации');
define('_ON_FRONTPAGE', 'На главной');
define('_SAVE_ORDER', 'Сохранить порядок');
define('_TO_TRASH', 'В корзину');
define('_NEVER', 'Никогда');
define('_START', 'Начало');
define('_ALWAYS', 'Всегда');
define('_END', 'Окончание');
define('_WITHOUT_END', 'Без окончания');
define('_CHANGE_USER_DATA', 'Изменить данные пользователя');
define('_CHANGE_CONTENT', 'Изменить содержимое');
define('_CHOOSE_OBJECTS_TO_TRASH', 'Пожалуйста, выберите из списка объекты, которые Вы хотите отправить в корзину');
define('_WANT_TO_TRASH', 'Вы уверены, что хотите отправить объект(ы) в корзину?\nЭто не приведет к полному удалению объектов');
define('_ARCHIVE', 'Архив');
define('_ALL_SECTIONS', 'Все разделы');
define('_OBJECT_MUST_HAVE_TITLE', 'Этот объект должен иметь заголовок');
define('_PLEASE_CHOOSE_SECTION', 'Вы должны выбрать раздел');
define('_PLEASE_CHOOSE_CATEGORY', 'Вы должны выбрать категорию');
define('_O_EDITING', 'Редактирование');
define('_O_CREATION', 'Создание');
define('_OBJECT_DETAILS', 'Детали объекта');
define('_ALIAS', 'Псевдоним');
define('_INTROTEXT_M', 'Вводный Текст: (обязательно)');
define('_MAINTEXT_M', 'Основной текст: (необязательно)');
define('_NOTETEXT_M', 'Заметки: (необязательно)');
define('_HIDE_PARAMS_PANEL', 'Скрыть панель параметров');
define('_SETTINGS', 'Настройки');
define('_IN_ARCHIVE', 'В архиве');
define('_DRAFT_NOT_PUBLISHED', 'Черновик - Не опубликован');
define('_RESET', 'Обнулить');
define('_CHANGED', 'Изменялось');
define('_CREATED', 'Создано');
define('_NEW_DOCUMENT', 'Новый документ');
define('_LAST_CHANGE', 'Последнее изменение');
define('_NOT_CHANGED', 'Не изменялось');
define('_START_PUBLICATION', 'Начало публикации');
define('_END_PUBLICATION', 'Окончание публикации');
define('_OBJECT_ID', 'ID объекта');
define('_USED_IMAGES', 'Используемые изображения');
define('_SUBDIRECTORY', 'Подпапка');
define('_IMAGE_EXAMPLE', 'Пример изображения');
define('_ACTIVE_IMAGE', 'Активное изображение');
define('_SOURCE', 'Источник');
define('_ALIGN', 'Выравнивание');
define('_PARAMS_IN_VIEW', '* Эти параметры управляют внешним видом только в режиме полного просмотра*');
define('_ROBOTS_PARAMS', 'Настройки управления роботами');
define('_MENU_LINK', 'Связь с меню');
define('_MENU_LINK2', 'Здесь создается пункт меню (Ссылка - объект содержимого), который вставляется в выбранное из списка меню');
define('_EXISTED_MENUITEMS', 'Существующие пункты меню');
define('_PLEASE_SELECT_SMTH', 'Пожалуйста, выберите что-нибудь');
define('_OBJECT_MOVING', 'Перемещение объектов');
define('_MOVE_INTO_CAT_SECT', 'Переместить в Раздел/Категорию');
define('_OBJECTS_TO_MOVE', 'Будут перемещены объекты');
define('_SELECT_CAT_TO_MOVE_OBJECTS', 'Пожалуйста, выберите раздел или категорию для копирования объектов');
define('_COPYING_CONTENT_ITEMS', 'Копирование объектов содержимого');
define('_COPY_INTO_CAT_SECT', 'Копировать в Раздел/Категорию');
define('_OBJECTS_TO_COPY', 'Будут скопированы объекты');
define('_ORDER_BY_NAME', 'Внутреннему порядку');
define('_ORDER_BY_HEADERS', 'Заголовкам');
define('_ORDER_BY_DATE_CR', 'Дате создания');
define('_ORDER_BY_DATE_MOD', 'Дате модификации');
define('_ORDER_BY_ID', 'Идентификаторам ID');
define('_ORDER_BY_SECTIONID', 'Разделу');
define('_ORDER_BY_CATID', 'Категории');
define('_ORDER_BY_HITS', 'Просмотрам');
define('_CANNOT_EDIT_ARCHIVED_ITEM', 'Вы не можете отредактировать архивный объект');
define('_NOW_EDITING_BY_OTHER', 'в настоящее время редактируется другим пользователем');
define('_ROBOTS_HIDE', 'Скрыть мета-тег robots');
define('_CONTENT_ITEM_SAVED', 'Изменения успешно сохранены в');
define('_OBJ_ARCHIVED', 'Объект(ы) успешно архивирован(ы)');
define('_OBJ_PUBLISHED', 'Объект(ы) успешно опубликован(ы)');
define('_OBJ_UNARCHIVED', 'Объект(ы) успешно извлечен(ы) из архива');
define('_OBJ_UNPUBLISHED', 'Объект(ы) успешно снят(ы) с публикации');
define('_CHOOSE_OBJ_TOGGLE', 'Выберите объект для переключения');
define('_CHOOSE_OBJ_DELETE', 'Выберите объект для удаления');
define('_MOVED_TO_TRASH', 'Отправлено в корзину');
define('_CHOOSE_OBJ_MOVE', 'Выберите объект для перемещения');
define('_ERROR_OCCURED', 'Произошла ошибка');
define('_OBJECTS_MOVED_TO_SECTION', 'объект(ы) успешно перемещен(ы) в раздел');
define('_OBJECTS_COPIED_TO_SECTION', 'объект(ы) успешно скопированы в раздел');
define('_HITCOUNT_RESETTED', 'Счетчик просмотров сброшен');
define('_TIMES', 'раз');

/* administrator components com_easysql */
define('_SQL_COMMAND', 'Команда');
define('_MANAGEMENT', 'Управление');
define('_FIELDS', 'Поля');
define('_EXEC_SQL', 'Выполнить SQL');
define('_SQL_CONSOL', 'SQL консоль');
define('_SQL_TABLE', 'Таблица');
define('_SQL_ROWS_ENTER', 'Вывести строк');
define('_SQL_MAKE', 'Собрать SQL');

/* administrator components com_frontpage */
define('_UNKNOWN_ID', 'Идентификатор не опознан');
define('_REMOVE_FROM_FRONT', 'Убрать с главной');
define('_PUBLISH_TIME_END', 'Время публикации истекло');
define('_CANNOT_CHANGE_PUBLISH_STATE', 'Смена статуса публикации недоступна');
define('_CHANGE_SECTION', 'Изменить раздел');

/* administrator components com_installer */
define('_OTHER_COMPONENT_USE_DIR', 'Другой компонент уже использует каталог');
define('_CANNOT_CREATE_DIR', 'Невозможно создать каталог');
define('_SQL_ERROR', 'Ошибка выполнения SQL');
define('_ERROR_MESSAGE', 'Текст ошибки');
define('_CANNOT_COPY_PHP_INSTALL', 'Не могу скопировать PHP-файл установки');
define('_CANNOT_COPY_PHP_REMOVE', 'Не могу скопировать PHP-файл удаления');
define('_ERROR_DELETING', 'Ошибка удаления');
define('_IS_PART_OF_CMS', 'является элементом ядра Joostina и не может быть удален.<br />Вы должны снять его с публикации, если не хотите его использовать');
define('_DELETE_ERROR', 'Удаление - ошибка');
define('_UNINSTALL_ERROR', 'Ошибка деинсталляции');
define('_BAD_XML_FILE', 'Неправильный XML-файл');
define('_PARAM_FILED_EMPTY', 'Поле параметра пустое и невозможно удалить файлы');
define('_INSTALLED_COMPONENTS', 'Установленные компоненты');
define('_INSTALLED_COMPONENTS2', 'Здесь показаны только те расширения, которые Вы можете удалить. Части ядра Joostina удалить нельзя.');
define('_COMPONENT_NAME', 'Название компонента');
define('_COMPONENT_LINK', 'Ссылка меню компонента');
define('_COMPONENT_AUTHOR_URL', 'URL автора');
define('_OTHER_COMPONENTS_NOT_INSTALLED', 'Сторонние компоненты не установлены');
define('_COMPONENT_INSTALL', 'Установка компонента');
define('_DELETING', 'Удаление');
define('_CANNOT_DEL_LANG_ID', 'id языка пусто, поэтому невозможно удалить файлы');
define('_GOTO_LANG_MANAGEMENT', 'Перейти в Управление языками');
define('_INTALL_LANG', 'Установка языкового пакета сайта');
define('_NO_FILES_OF_MAMBOTS', 'Нет файлов, отмеченных как мамботы');
define('_WRONG_ID', 'Неправильный id объекта');
define('_BAD_DIR_NAME_EMPTY', 'Поле папки пустое, невозможно удалить файлы');
define('_INSTALLED_MAMBOTS', 'Установленные мамботы');
define('_MAMBOT', 'Мамбот');
define('_TYPE', 'Тип');
define('_OTHER_MAMBOTS', 'Это не мамботы ядра, а сторонние мамботы');
define('_INSTALL_MAMBOT', 'Установка мамбота');
define('_UNKNOWN_CLIENT', 'Неизвестный тип клиента');
define('_NO_FILES_MODULES', 'Файлы, отмеченные как модули, отсутствуют');
define('_ALREADY_EXISTS', 'уже существует');
define('_DELETING_XML_FILE', 'Удаление XML файла');
define('_INSTALL_MODULE', 'Установленные модулей');
define('_MODULE', 'Модуль');
define('_USED_ON', 'Используется');
define('_NO_OTHER_MODULES', 'Сторонние модули не установлены');
define('_MODULE_INSTALL', 'Установка модуля');
define('_SITE_MODULES', 'Модули сайта');
define('_ADMIN_MODULES', 'Модули панели управления');
define('_CANNOT_DEL_FILE_NO_DIR', 'Невозможно удалить файл, т.к. каталог не существует');
define('_WRITEABLE', 'Доступен для записи');
define('_UNWRITEABLE', 'Недоступен для записи');
define('_CHOOSE_DIRECTORY_PLEASE', 'Пожалуйста, выберите каталог');
define('_ZIP_UPLOAD_AND_INSTALL', 'Загрузка архива расширения с последующей установкой');
define('_PACKAGE_FILE', 'Файл пакета');
define('_UPLOAD_AND_INSTALL', 'Загрузить и установить');
define('_INSTALL_FROM_DIR', 'Установка из каталога');
define('_INSTALLATION_DIRECTORY', 'Каталог установки');
define('_CONTINUE', 'Продолжить');
define('_NO_INSTALLER', 'не найден инсталлятор');
define('_CANNOT_INSTALL', 'Установка [$element] невозможна');
define('_CANNOT_INSTALL_DISABLED_UPLOAD', 'Установка невозможна, пока запрещена загрузка файлов. Пожалуйста, используйте установку из каталога.');
define('_INSTALL_ERROR', 'Ошибка установки');
define('_CANNOT_INSTALL_NO_ZLIB', 'Установка невозможна, пока не установлена поддержка zlib');
define('_NO_FILE_CHOOSED', 'Файл не выбран');
define('_ERORR_UPLOADING_EXT', 'Ошибка загрузки нового модуля');
define('_UPLOADING_ERROR', 'Загрузка неудачна');
define('_SUCCESS', 'успешно');
define('_UNSUCCESS', 'неудачно');
define('_UPLOAD_OF_EXT', 'Загрузка нового элемента');
define('_DELETE_SUCCESS', 'Удаление успешно');
define('_CANNOT_CHMOD', 'Не могу изменить права доступа к закачанному файлу');
define('_CANNOT_MOVE_TO_MEDIA', 'Не могу переместить скачанный файл в каталог <code>/media</code>');
define('_CANNOT_WRITE_TO_MEDIA', 'Загрузка сорвана, так как каталог <code>/media</code> недоступен для записи.');
define('_CANNOT_INSTALL_NO_MEDIA', 'Загрузка сорвана, так как каталог <code>/media</code> не существует');
define('_ERROR_NO_XML_JOOMLA', 'ОШИБКА: В установочном пакете невозможно найти XML-файл установки Joostina.');
define('_ERROR_NO_XML_INSTALL', 'ОШИБКА: В установочном пакете невозможно найти XML-файл установки.');
define('_NO_NAME_DEFINED', 'Не определено имя файла');
define('_FILE', 'Файл');
define('_NOT_CORRECT_INSTALL_FILE_FOR_JOOMLA', 'не является корректным файлом установки Joostina!');
define('_CANNOT_RUN_INSTALL_METHOD', 'Метод &laquo;install&raquo; не может быть вызван классом');
define('_CANNOT_RUN_UNINSTALL_METHOD', 'Метод &laquo;uninstall&raquo; не может быть вызван классом');
define('_CANNOT_FIND_INSTALL_FILE', 'Установочный файл не найден');
define('_XML_NOT_FOR', 'Установочный XML-файл - не для');
define('_FILE_NOT_EXISTS', 'Файл не существует');
define('_INSTALL_TWICE', 'Вы пытаетесь дважды установить одно и то же расширение');
define('_ERROR_COPYING_FILE', 'Ошибка копирования файла');

/* administrator components com_jce */
define('_LANG_ALREADY_EXISTS', 'Язык уже существует');
define('_EMPTY_LANG_ID', 'Пустой id языка, невозможно удалить файлы');
define('_NO_PLUGIN_FILES', 'Файлы плагинов отсутствуют');
define('_BAD_OBJECT_ID', 'Неверный id объекта');
define('_EMPRY_DIR_NAME_CANNOT_DEL_FILE', 'Поле папки пустое, невозможно удалить файл');
define('_INSTALLED_JCE_PLUGINS', 'Установленные плагины JCE');
define('_PCLZIP_UNKNOWN_ERROR', 'Неисправимая ошибка');
define('_UNZIP_ERROR', 'Ошибка распаковки');
define('_JCE_INSTALL_ERROR_NO_XML', 'ОШИБКА: Невозможно найти в пакете XML-файл установки JCE 1.1.x.');
define('_JCE_INSTALL_ERROR_NO_XML2', 'ОШИБКА: Невозможно найти в пакете XML-файл установки.');
define('_JCE_UNKNOWN_FILENAME', 'Имя файла не определено');
define('_BAD_JCE_INSTALL_FILE', ' неправильный файл установки JCE или его версия неправильная.');
define('_WRONG_PLUGIN_VERSION', 'Неправильная версия плагина');
define('_ERROR_CREATING_DIRECTORY', 'Ошибка создания каталога');
define('_INSTALLER_NOT_FIND_ELEMENT', 'Инсталлятор не обнаружил элемент');
define('_NO_INSTALLER_FOR_COMPONENT', 'Инсталлятор недоступен для элемента');
define('_NO_CHOOSED_FILES', 'Файлы не выбраны');
define('_ERROR_OF_UPLOAD', 'Ошибка загрузки');
define('_UPLOADING', 'Загрузка');
define('_IS_SUCCESS', 'успешна');
define('_HAS_ERROR', 'завершилась ошибкой');
define('_CANNOT_DELETE_LANG_FILE', 'Нельзя удалять используемый языковой пакет');
define('_GUEST', 'Гость');
define('_EDITOR', 'Редактор');
define('_PUBLISHER', 'Издатель');
define('_MANAGER', 'Менеджер');
define('_ADMINISTRATOR', 'Администратор');
define('_SUPER_ADMINISTRATOR', 'Супер-Администратор');
define('_CHANGES_FOR_PLUGIN', 'Изменения для плагина');
define('_SUCCESS_SAVE', 'успешное сохранение');
define('_PLUGIN', 'Плагин');
define('_MODULE_IS_EDITING_BY_ADMIN', 'Модуль в настоящее время редактируется другим администратором');
define('_CHOOSE_PLUGIN_FOR_ACCESS_MANAGEMENT', 'Для назначения прав доступа необходимо выбрать плагин');
define('_CHOOSE_PLUGIN_FOR', 'Выберите плагин для');
define('_JCE_CONFIG', 'Конфигурация JCE');
define('_EDITOR_CONFIG', 'Конфигурация редактора');
define('_EXTENSIONS', 'Расширения');
define('_EXTENSION_MANAGEMENT', 'Управление расширениями');
define('_ICONS_POSITIONS', 'Расположение значков');
define('_LANG_MANAGER', 'Менеджер локализаций');
define('_FILE_NOT_FOUND', 'Файл не найден');
define('_PLUGIN_NOT_FOUND', 'Плагин не найден');
define('_JCE_CONTENT_MAMBOT_NOT_INSTALLED', 'Мамбот редактора JCE не установлен');
define('_ICONS_POSITIONS_SAVED', 'Расположение значков сохранено');
define('_MAIN_PAGE', 'Главная');
define('_NEW', 'Новый');
define('_INSTALLATION', 'Установка');
define('_PREVIEW', 'Предпросмотр');
define('_PLUGINS', 'Плагины');

/* administrator components com_jce */
define('_USERS', 'Пользователи');
define('_USER_LOGIN_TXT', 'Имя пользователя (логин )');
define('_LOGGED_IN', 'На сайте');
define('_ALLOWED', 'Разрешен');
define('_LAST_LOGIN', 'Последнее посещение');
define('_USER_BLOCK', 'Блокировка');
define('_ALLOW', 'Разрешить');
define('_DISALLOW', 'Запретить');
define('_ENTER_LOGIN_PLEASE', 'Вы должны ввести имя пользователя для входа на сайт');
define('_BAD_USER_LOGIN', 'Ваше имя для входа содержит неправильные символы или слишком короткое.');
define('_ENTER_EMAIL_PLEASE', 'Вы должны ввести адрес e-mail');
define('_ENTER_GROUP_PLEASE', 'Вы должны назначить пользователю группу доступа');
define('_BAD_PASSWORD', 'Пароль неправильный');
define('_BAD_GROUP_1', 'Пожалуйста, выберите другую группу. Группы типа &laquo;Public Front-end&raquo; выбирать нельзя');
define('_BAD_GROUP_2', 'Пожалуйста, выберите другую группу. Группы типа &laquo;Public Back-end&raquo; выбирать нельзя');
define('_USER_INFO', 'Информация о пользователе');
define('_NEW_PASSWORD', 'Новый пароль');
define('_REPEAT_PASSWORD', 'Проверка пароля');
define('_BLOCK_USER', 'Блокировать пользователя');
define('_RECEIVE_EMAILS', 'Получать системные сообщения на e-mail');
define('_REGISTRATION_DATE', 'Дата регистрации');
define('_CONTACT_INFO', 'Контактная информация');
define('_NO_USER_CONTACTS', 'У этого пользователя нет контактной информации:<br />Для подробностей смотрите &laquo;Компоненты &rarr; Контакты &rarr; Управление контактами&raquo;');
define('_FULL_NAME', 'Полное имя');
define('_CHANGE_CONTACT_INFO', 'Изменить контактную информацию');
define('_CONTACT_INFO_PATH_URL', 'Компоненты &rarr; Контакты &rarr; Управление контактами');
define('_RESTRICT_FUNCTION', 'Функциональность ограничена');
define('_NO_RIGHT_TO_CHANGE_GROUP', 'Вы не можете изменить эту группу пользователей. Это может сделать только Главный администратор сайта');
define('_NO_RIGHT_TO_USER_CREATION', 'Вы не можете создать пользователя с этим уровнем доступа. Это может сделать только Главный администратор сайта');
define('_PROFILE_SAVE_SUCCESS', 'Успешно сохранены изменения профиля пользователя');
define('_CANNOT_DEL_ONE_SUPER_ADMIN', 'Вы не можете удалить этого Главного администратора, т.к. он единственный Главный администратор сайта');
define('_CHOOSE_USER_TO', 'Выберите пользователя для');
define('_PLEASE_CHOOSE_USER', 'Пожалуйста, выберите пользователя');
define('_CANNOT_DISABLE_SUPER_ADMIN', 'Вы не можете отключить Главного администратора');
define('_THIS_CAN_DO_HIGHLEVEL_USERS', 'Это могут делать только пользователи с более высоким уровнем доступа');
define('_DISABLE', 'Отключить');

/* administrator components com_typedcontent */
define('_ACCESS', 'Доступ');
define('_LINKS_COUNT', 'Ссылок');
define('_DATE_PUBL_END', 'Истек срок публикации');
define('_CHANGE_STATIC_CONTENT', 'Изменить статичное содержимое');
define('_WANT_TO_RESET_HITCOUNT', 'Вы действительно хотите обнулить счетчик просмотров?\nЛюбые несохраненные изменения этого содержимого будут утеряны.');
define('_CONTENT_OBJECT_MUST_HAVE_NAME', 'Объект содержимого должен иметь название');
define('_CONTENT_INFO', 'Информация о содержимом');
define('_O_STATE', 'Состояние');
define('_CHANGE_AUTHOR', 'Изменить автора');
define('_GALLERY_IMAGES', 'Изображения галереи');
define('_CONTENT_IMAGES', 'Изображения содержимого');
define('_EDITING_SELECTED_IMAGE', 'Редактирование выбранного изображения');
define('_ALTERNATIVE_TEXT', 'Альтернативный текст');
define('_MENU_LINK_3', 'Здесь создается пункт меню типа &laquo;Ссылка - Статичное содержимое&raquo;, который вставляется в выбранное из списка меню');
define('_EXISTED_MENU_LINKS', 'Существующие связи с меню');
define('_CONTENT_SAVED', 'Содержимое сохранено');
define('_CHOOSE_OBJECT_FOR', 'Выберите объект для');
define('_O_SECCESS_PUBLISHED', 'Объектов успешно опубликовано');
define('_O_SUCCESS_UNPUBLISHED', 'Объектов успешно скрыто');
define('_HIT_COUNT_RESETTED', 'Счетчик просмотров успешно обнулен');
define('_SUCCESS_MENU_CR_1', '(Ссылка - Статичное содержимое) в меню');

/* administrator components com_trash */
define('_TRASH', 'Корзина');
define('_OBJECT_DELETION', 'Удаление объектов');
define('_OBJECTS_TO_DELETE', 'Удаляемые объекты');
define('_THIS_ACTION_WILL_DELETE_O_FOREVER', '* Это действие <strong class="red">насовсем удалит</strong><br />перечисленные объекты из базы данных*');
define('_REALLY_DELETE_OBJECTS', 'Вы действительно хотите удалить перечисленные объекты?\nЭто действие насовсем удалит перечисленные объекты из базы данных.');
define('_OBJECT_RESTORE', 'Восстановление объектов');
define('_OBECTS_TO_RESTORE', 'Восстанавливаемые объекты');
define('_THIS_ACTION_WILL_RESTORE_O_FOREVER', '* Это действие <strong style="color:#FF0000;">восстановит</strong> эти объекты,<br />затем они будут возвращены на прежние места, как неопубликованные объекты*');
define('_REALLY_RESTORE_OBJECTS', 'Вы действительно хотите восстановить перечисленные объекты?');
define('_RESTORE', 'Восстановить');
define('_CONTENT_ITEMS', 'Объекты содержимого');
define('_MENU_ITEMS', 'Пункты меню');
define('_OBJECTS_DELETED', 'Объект(ы) успешно удален(ы)');
define('_SUCCESS_DELETION', 'Успешно удалено');
define('_OBJECTS_RESTORED', 'Объект(ов) успешно восстановлен(о)');
define('_CLEAR_TRASH', 'Очистить корзину');

/* administrator components com_templates */
define('_UNSUCCESS_OPERATION_NO_TEMPLATE', 'Операция неудачна: Не определен шаблон.');
define('_UNSUCCESS_OPERATION_EMPTY_FILE', 'Операция неудачна: Пустое содержимое.');
define('_UNSUCCES_OPERAION', 'Операция неудачна');
define('_CANNOT_OPEN_FILE_DOR_WRITE', 'Ошибка открытия файла для записи.');
define('_NO_PREVIEW', 'Предпросмотр недоступен');
define('_TEMPLATES', 'Шаблоны');
define('_TEMPLATE_PREVIEW', 'Предпросмотр шаблона');
define('_DEFAULT', 'По умолчанию');
define('_ASSIGNED_TO', 'Назначен');
define('_MAKE_UNWRITEABLE_AFTER_SAVING', 'Сделать недоступным для записи после сохранения');
define('_IGNORE_WRITE_PROTECTION_WHEN_SAVE', 'При сохранении игнорировать защиту от записи');
define('_CHANGE_EDITOR', 'Изменить редактор');
define('_CSS_TEMPLATE_EDITOR', 'Редактор CSS шаблона');
define('_ASSGIN_TEMPLATE_TO_MENU', 'назначение шаблона для пунктов меню');
define('_MODULES_POSITION', 'Позиции модулей');
define('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', 'В глобальной конфигурации выбрано использование одного шаблона:');
define('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', 'Этот шаблон используется и не может быть удален');
define('_UNSUCCES_OPERATION_CANNOT_OPEN', 'Операция неудачна: невозможно открыть');
define('_POSITIONS_SAVED', 'Позиции сохранены');

/* menubar.html.old.php + menubar.html.php */
define('_BUTTON', 'Кнопка');
define('_PLEASE_CHOOSE_ELEMENT', 'Пожалуйста, выберите элемент.');
define('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', 'Пожалуйста, выберите из списка объекты для их публикации на сайте');
define('_PLEASE_CHOOSE_ELEMENT_TO_MAKE_DEFAULT', 'Пожалуйста, выберите объект, чтобы назначить его по умолчанию');
define('_ASSIGN', 'Назначить');
define('_PLEASE_CHOOSE_ELEMENT_TO_UNPUBLISH', 'Для отмены публикации объекта, сначала выберите его');
define('_TO_ARCHIVE', 'В архив');
define('_FROM_ARCHIVE', 'Из архива');
define('_PLEASE_CHOOSE_ELEMENT_TO_ARCHIVE', 'Пожалуйста, выберите из списка объекты для их архивации');
define('_PLEASE_CHOOSE_ELEMENT_TO_UNARCHIVE', 'Выберите объект для восстановления его из архива');
define('_CHANGE', 'Изменить');
define('_PLEASE_CHOOSE_ELEMENT_TO_EDIT', 'Выберите объект из списка для его редактирования');
define('_EDIT_HTML', 'Ред. HTML');
define('_EDIT_CSS', 'Ред. CSS');
define('_PLEASE_CHOOSE_ELEMENT_TO_DELETE', 'Выберите объект из списка для его удаления');
define('_REALLY_WANT_TO_DELETE_OBJECTS', 'Вы действительно хотите удалить выбранные объекты?');
define('_REMOVE_TO_TRASH', 'В&nbsp;корзину');
define('_PLEASE_CHOOSE_ELEMENT_TO_TRASH', 'Выберите объект из списка для перемещения его в корзину');
define('_PLEASE_CHOOSE_ELEMENT_TO_ASSIGN', 'Пожалуйста, для назначения объекта выберите его');
define('_HELP', 'Помощь');

/* administrator components com_languages */
define('_LANGUAGE_PACKS', 'Языковые пакеты');
define('_E_LANGUAGE', 'Язык');
define('_LANGUAGE_EDITOR', 'Редактор языка');
define('_LANGUAGE_SAVED', 'Язык успешно изменен');
define('_YOU_CANNOT_DELETE_LANG_FILE', 'Вы не можете удалить использующийся языковой файл');
define('_UNSUCCESS_OPERATION_NO_LANGUAGE', 'Операция неудачна: Не определен язык.');

/* administrator components com_linkeditor */
define('_COMPONENTS_MENU_EDITOR', 'Редактирование меню компонентов');
define('_ICON', 'Значок');
define('_KERNEL', 'Ядро');
define('_COMPONENTS_MENU_EDIT', 'Редактирование пункта меню компонентов');
define('_COMPONENTS_MENU_NEW', 'Создание нового пункта меню компонентов');
define('_COMPONENT_IS_A_PART_OF_CMS', '<strong>Внимание:</strong> этот компонент является частью ядра, при некорректном управлении им возможны проблемы в работе системы.');
define('_MENU_NAME_REQUIRED', 'Название пункта меню. Обязательно для заполнения.');
define('_MENU_ITEM_ICON', 'Значок пункта меню');
define('_MENU_ITEM_DESCRIPTION', 'Описание пункта меню.');
define('_MENU_ITEM_LINK', 'Ссылка на компонент. Если пункт меню не содержит подменю то поле обязательно для заполнения.');
define('_PARENT_MENU_ITEM', 'Родительский пункт');
define('_PARENT_MENU_ITEM2', 'Родительский пункт меню. Допускается всего 1 уровень вложенности.');
define('_THIS_FILEDS_REQUIRED', '<strong class="red">*</strong> пункты обязательны для заполнения');
define('_MENU_ITEM_DELETED', 'Пункт меню удалён');
define('_FIRST_LEVEL', 'Первый уровень');

/* administrator components com_mambots */
define('_MAMBOTS', 'Мамботы');
define('_MAMBOT_NAME', 'Название мамбота');
define('_NO_MAMBOT_NAME', 'Мамбот должен иметь название');
define('_NO_MAMBOT_FILENAME', 'Мамбот должен иметь имя файла');
define('_SITE_MAMBOT', 'Мамбот сайта');
define('_MAMBOT_DETAILS', 'Детали мамбота');
define('_USE_THIS_MAMBOT_FILE', 'Используемый файл');
define('_MAMBOT_ORDER', 'Номер по порядку');
define('_NO_MAMBOT_PARAMS', '<em>Параметры отсутствуют</em>');
define('_NEW_MAMBOTS_IN_THE_END', 'Новые объекты по умолчанию располагаются в конце. Порядок расположения может быть изменен только после сохранения этого объекта.');
define('_CHOOSE_MAMBOT_FOR', 'Выберите мамбот для');

/* administrator components com_massmail */
define('_PLEASE_ENTER_SUBJECT', 'Пожалуйста, впишите тему');
define('_PLEASE_CHOOSE_GROUP', 'Пожалуйста, выберите группу');
define('_PLEASE_ENTER_MESSAGE', 'Пожалуйста, заполните сообщение');
define('_MASSMAIL_TTILE', 'Рассылка почты');
define('_SEND_TO_SUBGROUPS', 'Отправить подчиненным группам');
define('_SEND_IN_HTML', 'Отправить в HTML-формате');
define('_MAIL_SUBJECT', 'Тема');
define('_MESSAGE', 'Сообщение');
define('_ALL_USER_GROUPS', '- Все группы пользователей -');
define('_PLEASE_FILL_FORM', 'Пожалуйста, заполните корректно форму');
define('_MESSAGE_SENDED_TO_USERS', 'E-mail отправлено пользователю(ям) - ');

/* administrator components com_menumanager */
define('_MENU_MANAGER', 'Управление меню');
define('_MENU_ITEMS_UNPUBLISHED', 'Скрыто');
define('_MENU_MUDULES', 'Модулей');
define('_CHANGE_MENU_NAME', 'Изменить название меню');
define('_CHANGE_MENU_ITEMS', 'Изменить пункты меню');
define('_PLEASE_ENTER_MENU_NAME', 'Пожалуйста, введите название меню');
define('_NO_QUOTES_IN_NAME', 'Название меню не должно содержать &frasl;, &prime;');
define('_PLEASE_ENTER_MENU_MODULE_NAME', 'Пожалуйста, введите название модуля меню');
define('_MENU_INFO', 'Информация о меню');
define('_MENU_NAME_TIP', 'Это имя меню используется системой для его идентификации - оно должно быть уникально. Рекомендуется давать имя без пробелов');
define('_MODULE_TITLE_TIP', 'Заголовок mod_mainmenu требуется для отображения этого меню');
define('_MODULE_TITLE', 'Заголовок модуля');
define('_NEW_MENU_ITEM_TIP', '* Новый модуль меню будет автоматически создан после того, как вы введете заголовок, а затем нажмете кнопку "Сохранить". *<br /><br />Редактирование параметров созданного модуля будет доступно в разделе &laquo;Управления модулями [сайт]&raquo;: Модули &rarr; Модули сайта');
define('_REMOVE_MENU', 'Удалить меню');
define('_MODULES_TO_REMOVE', 'Модуль(и) для удаления');
define('_MENU_ITEMS_TO_REMOVE', 'Удаляемые пункты меню');
define('_THIS_OP_REMOVES_MENU', '* Эта операция <strong class="red">удаляет</strong> это меню,<br />ВСЕ его пункты и модуль(и), назначенный(ые) ему(им). *');
define('_REALLY_DELETE_MENU', 'Вы уверены, что хотите удалить это меню?\nПроизойдет удаление меню, его пунктов и модулей.');
define('_PLEASE_ENTER_MENY_COPY_NAME', 'Пожалуйста, введите имя для копии меню');
define('_PLEASE_ENTER_MODULE_NAME', 'Пожалуйста, введите имя для нового модуля');
define('_MENU_COPYING', 'Копирование меню');
define('_NEW_MENU_NAME', 'Имя нового меню');
define('_NEW_MODULE_NAME', 'Имя нового модуля');
define('_MENU_TO_COPY', 'Копируемое меню');
define('_MENU_ITEMS_TO_COPY', 'Копируемые пункты меню');
define('_CANNOT_RENAME_MAINMENU', 'Вы не можете переименовать меню &laquo;mainmenu&raquo;, т.к.  это нарушит правильное функционирование Joostina');
define('_MENU_ALREADY_EXISTS', 'Меню с таким именем уже существует. Вы должны ввести уникальное имя меню');
define('_NEW_MENU_CREATED', 'Создано новое меню');
define('_MENU_ITEMS_AND_MODULES_UPDATED', 'Пункты меню и модули обновлены');
define('_MENU_DELETED', 'Меню удалено');
define('_NEW_MENU', 'Новое меню');
define('_NEW_MENU_MODULE', 'Новый модуль меню');

/* administrator components com_menus */
define('_MODULE_IS_EDITING_MY_ADMIN', 'Модуль уже редактируется другим администратором');
define('_LINK_MUST_HAVE_NAME', 'Ссылка должна иметь имя');
define('_CHOOSE_COMPONENT_FOR_LINK', 'Вы должны выбрать компонент для создания ссылки на него');
define('_MENU_ITEM_COMPONENT_LINK', 'Пункт меню: Ссылка - Объект компонента');
define('_LINK_TITLE', 'title ссылки');
define('_LINK_COMPONENT', 'Компонент для ссылки');
define('_LINK_TARGET', 'При нажатии открыть в');
define('_OBJECT_MUST_HAVE_NAME', 'Объект должен иметь имя');
define('_CHOOSE_COMPONENT', 'Выберите компонент');
define('_MENU_ITEM_COMPONENT', 'Пункт меню: Компонент');
define('_MENU_PARAMS_AFTER_SAVE', 'Список параметров будет доступен только после сохранения пункта меню');
define('_MENU_ITEM_TABLE_CONTACT_CATEGORY', 'Пункт меню: Таблица - Контакты категории');
define('_CATEGORY_TITLE_IF_FILED_IS_EMPTY', 'Если поле будет оставлено пустым, то автоматически будет использовано название категории');
define('_CHOOSE_CONTACT_FOR_LINK', 'Для создания ссылки необходимо выбрать контакт');
define('_MENU_ITEM_CONTACT_OBJECT', 'Пункт меню: Ссылка - Объект контакта');
define('_MENU_ITEM_BLOG_CATEGORY_ARCHIVE', 'Пункт меню: Блог - Содержимое категории в архиве');
define('_MENU_ITEM_BLOG_SECTION_ARCHIVE', 'Пункт меню: Блог - Содержимое раздела в архиве');
define('_SECTION_TITLE_IF_FILED_IS_EMPTY', 'Если поле будет оставлено пустым, то автоматически будет использовано название раздела');
define('_MENU_ITEM_SAVED', 'Пункт меню сохранен');
define('_MENU_ITEM_BLOGCATEGORY', 'Пункт меню: Блог - Содержимое категории');
define('_YOU_CAN_CHOOSE_SEVERAL_CATEGORIES', 'Вы можете выбрать несколько категорий');
define('_MENU_ITEM_BLOG_CONTENT_CATEGORY', 'Пункт меню: Блог - Содержимое раздела');
define('_YOU_CAN_CHOOSE_SEVERAL_SECTIONS', 'Вы можете выбрать несколько разделов');
define('_MENU_ITEM_TABLE_CONTENT_CATEGORY', 'Пункт меню: Таблица - Содержимое категории');
define('_CHANGE_CONTENT_ITEM', 'Изменить объект содержимого');
define('_CONTENT_ITEM_TO_LINK_TO', 'Выберите статью для связи');
define('_MENU_ITEM_CONTENT_ITEM', 'Пункт меню: Ссылка - Объект содержимого');
define('_CONTENT_TO_LINK_TO', 'Содержимое для связи');
define('_MENU_ITEM_TABLE_CONTENT_SECTION', 'Пункт меню: Таблица - содержимое раздела');
define('_CHOOSE_OBJECT_TO_LINK_TO', 'Вы должны выбрать объект для связи с ним');
define('_MENU_ITEM_STATIC_CONTENT', 'Пункт меню: Ссылка - Статичное содержимое');
define('_MENU_ITEM_CATEGORY_NEWSFEEDS', 'Пункт меню: Таблица - Ленты новостей из категории');
define('_CHOOSE_NEWSFEED_TO_LINK', 'Вы должны выбрать ленту новостей для связи с пунктом меню');
define('_MENU_ITEM_NEWSFEED', 'Пункт меню: Ссылка - Лента новостей');
define('_LINKED_TO_NEWSFEED', 'Связано с лентой');
define('_MENU_ITEM_SEPARATOR', 'Пункт меню: Разделитель/Заполнитель');
define('_ENTER_URL_PLEASE', 'Вы должны ввести URL.');
define('_MENU_ITEM_URL', 'Пункт меню: Ссылка - URL');
define('_MENU_ITEM_WEBLINKS_CATEGORY', 'Пункт меню: Таблица - Web-ссылки категории');
define('_MENU_ITEM_WRAPPER', 'Пункт меню: Wrapper');
define('_WRAPPER_LINK', 'Ссылка Wrapper&prime;а');
define('_MAXIMUM_LEVELS', 'Максимально уровней');
define('_NOTE_MENU_ITEMS1', '* Обратите внимание, что некоторые пункты меню входят в несколько групп, но они относятся к одному типу меню.');
define('_MENU_ITEMS_OTHER', 'Разное');
define('_MENU_ITEMS_SEND', 'Отправка');
define('_COMPONENTS', 'Компоненты');
define('_LINKS', 'Ссылки');
define('_MOVE_MENU_ITEMS', 'Перемещение пунктов меню');
define('_MENU_ITEMS_TO_MOVE', 'Перемещаемые пункты меню');
define('_COPY_MENU_ITEMS', 'Копирование пунктов меню');
define('_COPY_MENU_ITEMS_TO', 'Копировать в меню');
define('_CHANGE_THIS_NEWSFEED', 'Изменить эту ленту новостей');
define('_CHANGE_THIS_CONTACT', 'Изменить этот контакт');
define('_CHANGE_THIS_CONTENT', 'Изменить это содержимое');
define('_CHANGE_THIS_STATIC_CONTENT', 'Изменить это статичное содержимое');
define('_MENU_NEXT', 'Далее');
define('_MENU_BACK', 'Назад');

/* administrator components com_messages */
define('_PRIVATE_MESSAGES', 'Личные сообщения');
define('_MAIL_FROM', 'От');
define('_MAIL_READED', 'Прочитано');
define('_MAIL_NOT_READED', 'Не прочитано');
define('_PRIVATE_MESSAGES_SETTINGS', 'Настройки личных сообщений');
define('_BLOCK_INCOMING_MAIL', 'Заблокировать входящую почту');
define('_SEND_NEW_MESSAGES', 'Посылать мне новые сообщения');
define('_AUTO_PURGE_MESSAGES', 'Автоматическая очистка сообщений');
define('_AUTO_PURGE_MESSAGES2', 'старше');
define('_AUTO_PURGE_MESSAGES3', 'дней');
define('_VIEW_PRIVATE_MESSAGES', 'Просмотр персональных сообщений');
define('_MESSAGE_SEND_DATE', 'Отправлено');
define('_PLEASE_ENTER_MAIL_SUBJECT', 'Вы должны ввести название темы');
define('_PLEASE_ENTER_MESSAGE_BODY', 'Вы должны ввести текст сообщения');
define('_PLEASE_ENTER_USER', 'Вы должны выбрать получателя');
define('_NEW_PERSONAL_MESSAGE', 'Новое персональное сообщение');
define('_MAIL_TO', 'Кому');
define('_MAIL_ANSWER', 'Ответить');

/* administrator components com_syndicate */
define('_NEWS_EXPORT_SETUP', 'Настройки экспорта новостей');
define('_RSS_EXPORT', 'RSS экспорт');
define('_RSS_EXPORT_SETUP', 'Управление настройками экспорта новостей');

/* administrator components com_statistics */
define('_STAT_BROWSERS_AND_OSES', 'Статистика по браузерам, ОС и доменам');
define('_BROWSERS', 'Браузеры');
define('_DOMAINS', 'Домены');
define('_DOMAIN', 'Домен');
define('_PAGES_HITS', 'Статистика посещения страниц');
define('_CONTENT_TITLE', 'Заголовок содержимого');
define('_SEARCH_QUERIES', 'Поисковые запросы');
define('_LOG_SEARCH_QUERIES', 'сбор данных');
define('_DISALLOWED', 'Запрещено');
define('_LOG_LOW_PERFOMANCE', 'Активация этого параметра может очень сильно снизить производительность сайта при большой посещаемости');
define('_HIDE_SEARCH_RESULTS', 'Скрыть результаты поиска');
define('_SHOW_SEARCH_RESULTS', 'Показать результаты поиска');
define('_SEARCH_QUERY_TEXT', 'Текст поиска');
define('_SEARCH_QUERY_COUNT', 'Запросов');
define('_SHOW_RESULTS', 'Выдано результатов');

/* administrator components com_quickicons */
define('_QUICK_BUTTONS', 'Кнопки быстрого доступа');
define('_DISPLAY_METHOD', 'Отображение');
define('_DISPLAY_ONLY_TEXT', 'Только текст');
define('_DISPLAY_ONLY_ICON', 'Только значок');
define('_DISPLAY_TEXT_AND_ICON', 'Значок и текст');
define('_PRESS_TO_EDIT_ELEMENT', 'Нажмите для редактирования элемента');
define('_EDIT_BUTTON', 'Редактирование кнопки');
define('_BUTTON_TEXT', 'Текст кнопки');
define('_BUTTON_TITLE', 'Подсказка');
define('_BUTTON_TITLE_TIP', '<strong>Опционально</strong><br />Здесь вы можете определить текст для всплывающей подсказки.<br />Это свойство очень важно заполнить если вы выбрали отображение только картинки!');
define('_BUTTON_LINK_TIP', 'Ссылка для вызова сайта или компонента.<br />Для компонентов внутри системы ссылка должна быть подобной:<br />index2.php?option=com_joomlastats&task=stats [joomlastats - компонент, &task=stats вызов определённой функции компонента].<br />Внешние ссылки должны быть <strong>абсолютными ссылками</strong> (например: http://www….)!');
define('_BUTTON_LINK_IN_NEW_WINDOW', 'В новом окне');
define('_BUTTON_LINK_IN_NEW_WINDOW_TIP', 'Ссылка будет открыта в новом окне');
define('_BUTTON_ORDER', 'Расположить после');
define('_BUTTONS_TAB_GENERAL', 'Общее');
define('_BUTTONS_TAB_DISPLAY', 'Отображение');
define('_DISPLAY_BUTTON', 'Отображать');
define('_PRESS_TO_CHOOSE_ICON', 'Нажмите для выбора картинки (откроется в новом окне)');
define('_CHOOSE_ICON', 'Выбрать картинку');
define('_CHOOSE_ICON_TIP', 'Пожалуйста, выберите картинку для этой кнопки. Если хотите загрузить собственную картинку для кнопки, то она должна быть загружена в ../administrator/images - ../images ../images/icons');
define('_PLEASE_ENTER_NUTTON_LINK', 'Требуется картинка');
define('_PLEASE_ENTER_BUTTON_TEXT', 'Пожалуйста, заполните поле Текст');
define('_BUTTON_ERROR_PUBLISHING', 'Ошибка публикации');
define('_BUTTON_ERROR_UNPUBLISHING', 'Ошибка скрытия');
define('_BUTTONS_DELETED', 'Кнопки успешно удалены');
define('_CHANGE_QUICK_BUTTONS', 'Изменить кнопки быстрого доступа');

/* administrator components com_sections */
define('_SECTION_CHANGES_SAVED', 'Изменения раздела сохранены');
define('_CONTENT_SECTIONS', 'Разделы содержимого');
define('_SECTION_NAME', 'Название раздела');
define('_SECTION_CATEGORIES', 'Категорий');
define('_SECTION_CONTENT_ITEMS', 'Активных');
define('_SECTION_CONTENT_ITEMS_IN_TRASH', 'В корзине');
define('_VIEW_SECTION_CATEGORIES', 'Просмотр категорий раздела');
define('_VIEW_SECTION_CONTENT', 'Просмотр содержимого раздела');
define('_NEW_SECTION_MASK', 'Новый раздел');
define('_CHOOSE_MENU_ITEM_NAME', 'Пожалуйста, введите имя для этого пункта меню');
define('_ENTER_SECTION_NAME', 'Раздел должен иметь название');
define('_ENTER_SECTION_TITLE', 'Раздел должен иметь заголовок');
define('_SECTION_ALREADY_EXISTS', 'Уже имеется раздел с таким названием. Пожалуйста, измените название раздела.');
define('_SECTION_DETAILS', 'Детали раздела');
define('_SECTION_USED_IN', 'Используется в');
define('_MENU_SHORT_NAME', 'Короткое имя для меню');
define('_SECTION_NAME_OF_CATEGORY', 'категории');
define('_SECTION_NAME_OF_SECTION', 'раздела');
define('_SECTION_NAME_TIP', 'Длинное название, отображаемое в заголовках');
define('_SECTION_NEW_MENU_LINK', 'Эта функция создаст новый пункт в выбранном вами меню');
define('_CHOOSE_MENU', 'Выберите меню');
define('_CHOOSE_MENU_TYPE', 'Выберите тип меню');
define('_SECTION_COPYING', 'Копирование раздела');
define('_SECTION_COPY_NAME', 'Название копии раздела');
define('_SECTION_COPY_DESCRIPTION', 'Во вновь созданный раздел будут<br />скопированы перечисленные категории<br />и все перечисленные объекты<br />содержимого категорий.');
define('_MASS_CONTENT_ADD', 'Массовое добавление');
define('_NEW_CAT_SECTION_ON_NEW_LINE', 'Каждая новая Категория/Раздел должны начинаться с новой строки');
define('_MASS_ADD_AS', 'Добавить как');
define('_SECTIONS', 'Разделы');
define('_CATEGORIES', 'Категории');
define('_CATEGORIES_WILL_BE_IN_SECTION', 'Категории буду принадлежать разделу');
define('_CONTENT_WILL_BE_IN_CATEGORY', 'Содержимое будет принадлежать категории');
define('_ADD_SECTIONS_RESULT', 'Результат добавления разделов');
define('_ADD_CATEGORIES_RESULT', 'Результат добавления категорий');
define('_ADD_CONTENT_RESULT', 'Результат добавления содержимого');
define('_ERROR_WHEN_ADDING', 'произошла ошибка при добавлении');
define('_SECTION_IS_BEING_EDITED_BY_ADMIN', 'Раздел в настоящее время редактируется другим администратором');
define('_SECTION_TABLE', 'Таблица раздела');
define('_SECTION_BLOG', 'Блог раздела');
define('_SECTION_BLOG_ARCHIVE', 'Блог архива раздела');
define('_SECTION_SAVED', 'Раздел сохранен');
define('_CHOOSE_SECTION_TO_DELETE', 'Выберите раздел для удаления');
define('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', 'Разделы не могут быть удалены, т.к. содержат категории');
define('_CHOOSE_SECTION_FOR', 'Выберите раздел для');
define('_CANNOT_PUBLISH_EMPTY_SECTION', 'Невозможно опубликовать пустой раздел');
define('_SECTION_CONTENT_COPYED', 'Выбранное содержимое раздела было скопировано в раздел');
define('_MENU_MASS_ADD', 'Добавить еще');

/* administrator components com_poll */
define('_POLL', 'Опрос');
define('_POLLS', 'Опросы');
define('_POLL_HEADER', 'Заголовок опроса');
define('_POLL_LAG', 'Задержка');
define('_CHANGE_POLL', 'Изменить опрос');
define('_ENTER_POLL_NAME', 'Опрос должен иметь название');
define('_ENTER_POLL_LAG', 'Задержка между ответами не должна быть нулевой');
define('_POLL_DETAILS', 'Детали опроса');
define('_POLL_LAG_QUESIONS', 'Задержка между ответами');
define('_POLL_LAG_QUESIONS2', 'секунд между принятием голосов');
define('_POLL_OPTION', 'Вариант ответа');
define('_POLL_OPTIONS', 'Варианты ответов');
define('_POLL_HITS', 'Голосов');
define('_POLL_GRAFIC', 'График');
define('_POLL_IS_BEING_EDITED_BY_ADMIN', 'Опрос в настоящее время редактируется другим администратором');

/* administrator components com_newsfeeds */
define('_NEWSFEEDS_MANAGEMENT', 'Управление лентами новостей');
define('_NEWSFEED_TITLE', 'Лента новостей');
define('_NEWSFEED_ON_SITE', 'На сайте');
define('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', 'Кол-во статей');
define('_NEWSFEED_CACHE_TIME', 'Время кэша (секунд)');
define('_CHANGE_NEWSFEED', 'Изменить ленту новостей');
define('_PLEASE_ENTER_NEWSFEED_NAME', 'Пожалуйста, введите название ленты');
define('_PLEASE_ENTER_NEWSFEED_LINK', 'Пожалуйста, введите ссылку ленты новостей');
define('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', 'Пожалуйста, введите количество статей для отображения');
define('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', 'Пожалуйста, введите время обновления кэша');
define('_NEWSFEED_LINK', 'Ссылка');
define('_NEWSFEED_DECODE_FROM_UTF', 'Перекодировать из UTF-8');

/* administrator components com_modules */
define('_ALL_MODULE_CHANGES_SAVED', 'Все изменения модуля успешно сохранены');
define('_MODULES', 'Модули');
define('_MODULE_NAME', 'Название модуля');
define('_MODULE_POSITION', 'Позиция');
define('_ASSIGN_TO_URL', 'Привязка к URL');
define('_ASSIGN_TO_URL_TIP', 'Пример:<br /><br />!option=com_content&task=view&id=4<br />option=com_content&task=view<br />option=com_content&task=blogcategory&id>4<br /><br />! - на этих страницах модуль не отображается<br />= < > != равно, меньше, больше, не равно - знаки сравнения для числовых параметров');
define('_MODULE_PAGES', 'Страницы');
define('_MODULE_PAGES_SOME', 'Некоторые');
define('_SHOW_TITLE', 'Показывать заголовок');
define('_MODULE_ORDER', 'Порядок модуля');
define('_MODULE_PAGE_MENU_ITEMS', 'Страницы/Пункты меню');
define('_MODULE_USER_CONTENT', 'Пользовательский код/Содержимое модуля');
define('_MODULE_COPIED', 'Модуль скопирован');
define('_CANNOT_DELETE_MOD_MAINMENU', 'Вы не можете удалить модуль mod_mainmenu, отображаемый как &laquo;mainmenu&raquo;, т.к. это ядро меню');
define('_CANNOT_DELETE_MODULES', 'Модули не могут быть удалены, т.к. они могут быть только деинсталлированы, как все модули Joostina.');
define('_PREVIEW_ONLY_CREATED_MODULES', 'Вы можете просмотреть только &laquo;созданные&raquo; модули');

/* administrator components com_modules */
define('_WEBLINKS_MANAGEMENT', 'Управление web-ссылками');
define('_WEBLINKS_HITS', 'Переходов');
define('_CHANGE_WEBLINK', 'Изменить web-ссылку');
define('_ENTER_WEBLINK_TITLE', 'Web-ссылка должна иметь заголовок');
define('_PLEASE_ENTER_URL', 'Вы должны ввести URL');
define('_WEBLINK_URL', 'Web-ссылка');
define('_WEBLINK_NAME', 'Название');

/* administrator components com_jwmmxtd */
define('_RENAME', 'Переименовать');
define('_JWMM_DIRECTORIES', 'Каталогов');
define('_JWMM_FILES', 'Файлов');
define('_JWMM_MOVE', 'Переместить');
define('_JWMM_BYTES', 'байт');
define('_JWMM_KBYTES', 'Кб');
define('_JWMM_MBYTES', 'Мб');
define('_JWMM_DELETE_FILE_CONFIRM', 'Удалить файл');
define('_CLICK_TO_PREVIEW', 'Нажмите для просмотра');
define('_JWMM_FILESIZE', 'Размер');
define('_WIDTH', 'Ширина');
define('_HEIGHT', 'Высота');
define('_UNPACK', 'Распаковать');
define('_JWMM_VIDEO_FILE', 'Видео файл');
define('_JWMM_HACK_ATTEMPT', 'Попытка взлома…');
define('_JWMM_DIRECTORY_NOT_EMPTY', 'Каталог не пустой. Пожалуйста, удалите сначала содержимое внутри каталога!');
define('_JWMM_DELETE_CATALOG', 'Удалить каталог');
define('_JWMM_SAFE_MODE_WARNING', 'При активированном параметре SAFE MODE возможны проблемы с созданием каталогов');
define('_JWMM_CATALOG_CREATED', 'Создан каталог');
define('_JWMM_CATALOG_NOT_CREATED', 'Создан не каталог');
define('_JWMM_FILE_DELETED', 'Файл успешно удалён');
define('_JWMM_FILE_NOT_DELETED', 'Файл не удалён');
define('_JWMM_DIRECTORY_DELETED', 'Каталог удалён');
define('_JWMM_DIRECTORY_NOT_DELETED', 'Каталог не удалён');
define('_JWMM_RENAMED', 'Переименовано');
define('_JWMM_NOT_RENAMED', 'Не переименовано');
define('_JWMM_COPIED', 'Скопировано');
define('_JWMM_NOT_COPIED', 'Не скопировано');
define('_JWMM_FILE_MOVED', 'Файл перемещён');
define('_JWMM_FILE_NOT_MOVED', 'Файл не перемещён');
define('_TMP_DIR_CLEANED', 'Временный каталог полностью очищен');
define('_TMP_DIR_NOT_CLEANED', 'Временный каталог не очищен');
define('_FILES_UNPACKED', 'файл(ов) распакованы');
define('_ERROR_WHEN_UNPACKING', 'Ошибка распаковки');
define('_FILE_IS_NOT_A_ZIP', 'Файл не является корректным zip архивом');
define('_FILE_NOT_EXIST', 'Файл не существует');
define('_IMAGE_SAVED_AS', 'Отредактированное изображение сохранено как');
define('_IMAGE_NOT_SAVED', 'Изображение НЕ сохранено');
define('_FILES_NOT_UPLOADED', 'Файл(ы) НЕ загружены на сервер');
define('_FILES_UPLOADED', 'Файлы загружены');
define('_DIRECTORIES', 'Каталоги');
define('_JWMM_FILE_NAME_WARNING', 'Пожалуйста, не используйте в названиях пробелы и спецсимволы');
define('_JWMM_MEDIA_MANAGER', 'Медиа менеджер');
define('_JWMM_CREATE_DIRECTORY', 'Создать каталог');
define('_UPLOAD_FILE', 'Загрузить файл');
define('_JWMM_FILE_PATH', 'Местоположение');
define('_JWMM_UP_TO_DIRECTORY', 'Перейти на каталог выше');
define('_JWMM_RENAMING', 'Переименование');
define('_JWMM_NEW_NAME', 'Новое имя (включая расширение!)');
define('_CHOOSE_DIR_TO_COPY', 'Выберите каталог для копирования');
define('_JWMM_COPY_TO', 'Копировать в');
define('_CHOOSE_DIR_TO_MOVE', 'Выберите каталог для перемещения');
define('_JWMM_MOVE_TO', 'Переместить в');
define('_CHOOSE_DIR_TO_UNPACK', 'Выберите каталог для распаковки');
define('_DERICTORY_TO_UNPACK', 'Каталог распаковки');
define('_NUMBER_OF_IMAGES_IN_TMP_DIR', 'Число изображений во временном каталоге');
define('_CLEAR_DIRECTORY', 'Очистить каталог');
define('_JWMM_ERROR_EDIT_FILE', 'Ошибка при обработке файла');
define('_JWMM_EDIT_IMAGE', 'Редактирование изображения');
define('_JWMM_IMAGE_RESIZE', 'Расширение изображения');
define('_JWMM_IMAGE_CROP', 'Обрезать');
define('_JWMM_IMAGE_SIZE', 'Размеры');
define('_JWMM_X_Y_POSITION', 'X и Y координаты');
define('_JWMM_BY_HEIGHT', 'вертикали');
define('_JWMM_BY_WIDTH', 'горизонтали');
define('_JWMM_CROP_TOP', 'Сверху');
define('_JWMM_CROP_LEFT', 'Слева');
define('_JWMM_CROP_RIGHT', 'Справа');
define('_JWMM_CROP_BOTTOM', 'Снизу');
define('_JWMM_ROTATION', 'Поворот');
define('_JWMM_CHOOSE', '-выбор-');
define('_JWMM_MIRROR', 'Отражение');
define('_JWMM_VERICAL', 'вертикали');
define('_JWMM_HORIZONTAL', 'горизонтали');
define('_JWMM_GRADIENT_BORDER', 'Градиентная рамка');
define('_JWMM_SIZE_PX', 'Размер px');
define('_JWMM_TOP_LEFT', 'Сверху-Слева');
define('_JWMM_PRESS_TO_CHOOSE_COLOR', 'Нажмите для выбора цвета');
define('_JWMM_BOTTOM_RIGHT', 'Справа-Снизу');
define('_JWMM_BORDER', 'Бордюр');
define('_COLOR', 'Цвет');
define('_JWMM_ALL_BORDERS', 'Все бордюры');
define('_JWMM_TOP', 'Сверху');
define('_JWMM_LEFT', 'Слева');
define('_JWMM_RIGHT', 'Справа');
define('_JWMM_BOTTOM', 'Снизу');
define('_JWMM_BRIGHTNESS', 'Яркость');
define('_JWMM_CONTRAST', 'Контраст');
define('_JWMM_ADDITIONAL_ACTIONS', 'Дополнительные действия');
define('_JWMM_GRAY_SCALE', 'Градиент серого');
define('_JWMM_NEGATIVE', 'Негатив');
define('_JWMM_ADD_TEXT', 'Добавить текст');
define('_JWMM_TEXT', 'Текст');
define('_JWMM_TEXT_COLOR', 'Цвет текста');
define('_JWMM_TEXT_FONT', 'Шрифт текста');
define('_JWMM_TEXT_SIZE', 'Размер текста');
define('_JWMM_ORIENTATION', 'Ориентация');
define('_JWMM_BG_COLOR', 'Цвет фона');
define('_JWMM_XY_POSITION', 'Расположение по X и Y');
define('_JWMM_XY_PADDING', 'Отступы по X и Y');
define('_JWMM_FIRST', 'Первая');
define('_JWMM_SECOND', 'Вторая');
define('_JWMM_THIRDTH', 'Третья…');
define('_JWMM_CANCEL_ALL', 'Отменить всё');

/* administrator components com_joomlaxplorer */
define('_MENU_GZIP', 'Упаковать');
define('_MENU_MOVE', 'Переместить');
define('_MENU_CHMOD', 'Смена прав');

/* administrator components com_joomlapack */
define('_JP_BACKUPPING', 'Резервирование');
define('_JP_PHPINFO', '-Информация о PHP-');
define('_JP_FREEMEMORY', 'Свободно памяти');
define('_JP_GZIP_ENABLED', 'GZIP сжатие: доступно (это хорошо)');
define('_JP_GZIP_NOT_ENABLED', 'GZIP сжатие: недоступно (это плохо)');
define('_JP_START_BACKUP_DB', 'Начало резервирования базы данных');
define('_JP_START_BACKUP_FILES', 'Начало резервирования всех данных сайта');
define('_JP_CUBE_ON_STEP', 'CUBE: Работа на шаге');
define('_JP_CUBE_STEP_FINISHED', 'CUBE: Шаг завершён ');
define('_JP_CUBE_FINISHED', 'CUBE: Завершено!');
define('_JP_ERROR_ON_STEP', 'CUBE: Ошибка на шаге ');
define('_JP_CLEANUP', 'Очистка');
define('_JP_RECURSING_DELETION', 'Рекурсивное удаление ');
define('_JP_NOT_FILE', 'Удаление <strong>ЭТО ФАЙЛ, НЕ КАТАЛОГ!</strong>');
define('_JP_ERROR_DEL_DIRECTORY', 'Ошибка удаления каталога. Проверьте права доступа');
define('_JP_QUICK_MODE', 'Режим однопроходности');
define('_JP_QUICK_MODE_ON_STEP', 'Используется быстрый алгоритм на шаге');
define('_JP_CANNOT_USE_QUICK_MODE', 'Невозможно использовать быстрый алгоритм на шаге');
define('_JP_MULTISTEP_MODE', 'Режим многопроходности');
define('_JP_MULTISTEP_MODE_ON_STEP', 'Используется медленный алгоритм на шаге');
define('_JP_MULTISTEP_MODE_ERROR', 'Ошибка выполнения медленного алгоритма на шаге');
define('_JP_SMART_MODE', 'Ускоренный режим');
define('_JP_SMART_MODE_ON_STEP', 'Выполнение ускоренного режима на шаге');
define('_JP_SMART_MODE_ERROR', 'Ошибка выполнения ускоренного режима на шаге');
define('_JP_CHOOSED_ALGO', 'Выбран');
define('_JP_ALGORITHM_FOR', 'алгоритм для');
define('_JP_NEXT_STEP_BACKUP_DB', 'Следующий шаг &rarr; Резервирование базы');
define('_JP_NEXT_STEP_FILE_LIST', 'Следующий шаг &rarr; Создание списка файлов');
define('_JP_NEXT_STEP_FINISHING', 'Следующий шаг &rarr; Завершение');
define('_JP_NEXT_STEP_GZIP', 'Следующий шаг &rarr; Упаковка');
define('_JP_NEXT_STEP_FINISHED', 'Следующий шаг &rarr; Завершено');
define('_JP_NO_NEXT_STEP', 'Следующий шаг не требуется; всё уже завершено');
define('_JP_NO_CUBE', 'Нет существующего CUBE; создание нового');
define('_JP_CURRENT_STEP', 'Текущий шаг');
define('_JP_UNPACKING_CUBE', 'Распаковка существующего CUBE');
define('_JP_TIMEOUT', 'Время на выполнение операции вышло, но операция не завершена');
define('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine: Получение списка таблиц');
define('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine: Резервирование только базы данных');
define('_JP_ONE_FILE_STORE', 'CDBBackupEngine: Задано объединение файлом');
define('_JP_FILE_STRUCTURE', 'CDBBackupEngine: Файл структуры');
define('_JP_DATAFILE', 'CDBBackupEngine: Файл данных');
define('_JP_FILE_DELETION', 'CDBBackupEngine: Удаление файлов');
define('_JP_FIRST_STEP', 'CDBBackupEngine: Первый проход');
define('_JP_ALL_COMPLETED', 'CDBBackupEngine: Всё завершено');
define('_JP_START_TICK', 'CDBBackupEngine: Начало обработки');
define('_JP_READY_FOR_TABLE', 'Выполнено для таблицы');
define('_JP_DB_BACKUP_COMPLETED', 'Резервирование базы данных завершено');
define('_JP_NEW_FRAGMENT_ADDED', 'Добавлен новый фрагмент');
define('_JP_KERNEL_TABLES', 'Таблицы ядра');
define('_JP_FIRST_STEP_2', 'Первый проход');
define('_JP_NEXT_VALUE', 'Выходное значение');
define('_JP_SKIP_TABLE', 'Пропуск таблицы');
define('_JP_GETTING', 'Получение');
define('_JP_COLUMN_FROM', 'столбца из');
define('_JP_ERROR_WRITING_FILE', 'Ошибка записи в файл');
define('_JP_CANNOT_SAVE_DUMP', 'Невозможно сохранить в дамп');
define('_JP_CHECK_RESULTS', 'Результаты проверки');
define('_JP_ANALYZE_RESULTS', 'Результаты анализа');
define('_JP_OPTIMIZE_RESULTS', 'Результаты оптимизации');
define('_JP_REPAIR_RESULTS', 'Результаты исправления');
define('_JP_GETTING_DIRS_LIST', 'Получение списка каталогов для исключения из резервной копии');
define('_JP_GZIP_FIRST_STEP', 'Упаковка: первый шаг');
define('_JP_GZIP_FINISHED', 'Упаковка: Завершено');
define('_JP_PACK_FINISHED', 'Завершение архивирования');
define('_JP_GZIP_OF_FRAGMENT', 'Архивирование фрагмента #');
define('_JP_CURRENT_FRAGMENT', ' Текущий фрагмент');
define('_JP_DELETE_PATH', ' путь для удаления :');
define('_JP_PATH_TO_DELETE', ' путь для добавления ');
define('_JP_SAVING_ARCHIVE_INFO', 'Сохранение информации о архивных объектах');
define('_JP_LOADING_ARCHIVE_INFO', 'Загрузка информации о архивных объектах');
define('_JP_ADDING_FILE_TO_ARCHIVE', 'Добавлений файлов в архив');
define('_JP_ARCHIVING', 'Архивирование');
define('_JP_ARCHIVE_COMPLETED', 'Архивирование завершено');
define('_JP_BACKUP_CONFIG', 'Конфигурация резервного копирования данных');
define('_JP_CONFIG_SAVING', 'Сохранение настроек');
define('_JP_MAIN_CONFIG', 'Основные настройки');
define('_JP_CONFIG_DIRECTORY', 'Каталог сохранения архивов');
define('_JP_ARCHIVE_NAME', 'Название архива');
define('_JP_LOG_LEVEL', 'Уровень ведения лога');
define('_JP_ADDITIONAL_CONFIG', 'Дополнительные настройки');
define('_JP_DELETE_PREFIX', 'Удалять преффикс таблиц');
define('_JP_EXPORT_TYPE', 'Тип экспорта базы данных');
define('_JP_FILELIST_ALGORITHM', 'Обработка файлов');
define('_JP_CONFIG_DB_BACKUP', 'Обработка базы');
define('_JP_CONFIG_GZIP', 'Сжатие файлов');
define('_JP_CONFIG_DUMP_GZIP', 'Сжатие дампа базы данных');
define('_JP_AVAILABLE', '<strong class="green">доступно</strong>');
define('_JP_NOT_AVAILABLE', '<strong class="red">недоступно</strong>');
define('_JP_MYSQL4_COMPAT', 'В режиме совместимости с MySQL 4');
define('_JP_NO_GZIP', 'Не архивировать (.sql)');
define('_JP_GZIP_TAR_GZ', 'Архивировать в TAR.GZ (.tar.gz)');
define('_JP_GZIP_ZIP', 'Архивировать в ZIP (.zip)');
define('_JP_QUICK_METHOD', 'Быстро - один проход');
define('_JP_STANDARD_METHOD', 'Рекомендовано - Стандартно');
define('_JP_SLOW_METHOD', 'Медленно - Мультипроходность');
define('_JP_LOG_ERRORS_OLY', 'Только ошибки');
define('_JP_LOG_ERROR_WARNINGS', 'Ошибки и предупреждения');
define('_JP_LOG_ALL', 'Вся информация');
define('_JP_LOG_ALL_DEBUG', 'Вся информация и отладка');
define('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', 'Не сохранять каталоги в резервной копии');
define('_FILE_NAME', 'Имя файла');
define('_JP_DOWNLOAD_FILE', 'Скачать');
define('_JP_REALLY_DELETE_FILE', 'Действительно удалить файл?');
define('_JP_FILE_CREATION_DATE', 'Создан');
define('_JP_NO_BACKUPS', 'Файлы резервных копий отсутствуют');
define('_JP_ACTIONS_LOG', 'Лог выполнения действий');
define('_JP_BACKUP_MANAGEMENT', 'Резервное копирование');
define('_JP_CREATE_BACKUP', 'Создать архив данных');
define('_JP_DB_MANAGEMENT', 'Управление базой данных');
define('_JP_DONT_SAVE_DIRECTORIES', 'Не сохранять каталоги');
define('_JP_CONFIG', 'Настройки сохранения');
define('_JP_ERRORS_TMP_DIR', 'Обнаружены ошибки, проверьте возможность записи в каталог хранения резервных копий');
define('_JP_BACKUP_CREATION', 'Создание резервной копии данных');
define('_JP_DONT_CLOSE_BROWSER_WINDOW', 'Пожалуйста, не закрывайте окно браузера и не переходите с этой страницы до окончания резервирования и отображения соответствующего сообщения.');
define('_JP_ERRORS_VIEW_LOG', 'В ходе работы обнаружены ошибки, пожалуйста, <a href="' .  $mosConfig_live_site . '/index2.php?option=com_joomlapack&amp;act=log" title="JoomlaPack Log">посмотрите лог</a> работы и выясните причину.');
define('_JP_BACKUP_SUCCESS', 'Резервирование данных сайта выполнено успешно. Скачать');
define('_JP_CREATION_FILELIST', '1. Создание списка файлов для архивирования.');
define('_JP_BACKUPPING_DB', '2. Архивирование базы данных.');
define('_JP_CREATION_OF_ARCHIVE', '3. Создание итогового архива.');
define('_JP_ALL_COMPLETED_2', '4. Всё выполнено');
define('_JP_PROGRESS', 'Обработка');
define('_JP_TABLES', 'Таблицы');
define('_JP_TABLE_ROWS', 'Записей');
define('_JP_SIZE', 'Размер');
define('_JP_INCREMENT', 'Инскремент');
define('_JP_CREATION_DATE', 'Создана');
define('_JP_CHECKING', 'Проверка');
define('_JP_FULL_BACKUP', 'Полный резерв');
define('_JP_BACKUP_BASE', 'Резервировать базу');
define('_JP_BACKUP_PANEL', 'Панель резервирования');

/* administrator modules mod_components */
define('_FULL_COMPONENTS_LIST', 'Полный список компонентов');

/* administrator modules mod_fullmenu */
define('_MENU_CMS_FEATURES', 'Управление основными возможностями системы');
define('_MENU_GLOBAL_CONFIG', 'Глобальная конфигурация');
define('_MENU_GLOBAL_CONFIG_TIP', 'Настройка основных параметров конфигурации системы');
define('_MENU_LANGUAGES', 'Языковые пакеты');
define('_MENU_LANGUAGES_TIP', 'Управление языковыми файлами');
define('_MENU_SITE_PREVIEW', 'Предпросмотр сайта');
define('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', 'В новом окне');
define('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', 'Внутри');
define('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', 'Внутри с позициями');
define('_MENU_SITE_STATS', 'Статистика сайта');
define('_MENU_SITE_STATS_TIP', 'Просмотр статистики по сайту');
define('_MENU_STATS_BROWSERS', 'Браузеры, ОС, домены');
define('_MENU_STATS_BROWSERS_TIP', 'Статистика посещений сайта по браузерам, ОС и доменам');
define('_MENU_SEARCHES', 'Поисковые запросы');
define('_MENU_SEARCHES_TIP', 'Статистика поисковых запросов по сайту');
define('_MENU_PAGE_STATS', 'Статистика посещения страниц');
define('_MENU_TEMPLATES_TIP', 'Управление шаблонами');
define('_MENU_SITE_TEMPLATES', 'Шаблоны сайта');
define('_MENU_NEW_SITE_TEMPLATE', 'Установка нового шаблона');
define('_MENU_ADMIN_TEMPLATES', 'Шаблоны админцентра');
define('_MENU_NEW_ADMIN_TEMPLATE', 'Установка нового шаблона');
define('_MENU', 'Меню');
define('_MENU_TRASH', 'Корзина меню');
define('_CONTENT_IN_SECTIONS', 'Содержимое по разделам');
define('_CONTENT_IN_SECTION', 'Содержимое в разделе');
define('_SECTION_ARCHIVE', 'Архив раздела');
define('_SECTION_CATEGORIES2', 'Категории раздела');
define('_ADD_CONTENT_ITEM', 'Добавить Новость/Статью');
define('_ADD_STATIC_CONTENT', 'Добавить статичное содержимое');
define('_CONTENT_ON_FRONTPAGE', 'Содержимое на главной');
define('_CONTENT_TRASH', 'Корзина содержимого');
define('_ALL_COMPONENTS', 'Все компоненты…');
define('_EDIT_COMPONENTS_MENU', 'Редактировать меню компонентов');
define('_COMPONENTS_INSTALL_UNINSTALL', 'Установка/Удаление компонентов');
define('_MODULES_SETUP', 'Управление модулями');
define('_MODULES_INSTALL_DEINSTALL', 'Установка/Удаление модулей');
define('_SITE_MAMBOTS', 'Мамботы сайта');
define('_MAMBOTS_INSTALL_UNINSTALL', 'Установка/Удаление мамботов');
define('_SITE_LANGUAGES', 'Языки сайта');
define('_JOOMLA_TOOLS', 'Инструменты');
define('_PRIVATE_MESSAGES_CONFIG', 'Настройки сообщений');
define('_FILE_MANAGER', 'Менеджер файлов');
define('_SQL_CONSOLE', 'SQL консоль');
define('_BACKUP_CONFIG', 'Настройки сохранения данных');
define('_CLEAR_CONTENT_CACHE', 'Очистить кэш содержимого');
define('_CLEAR_ALL_CACHE', 'Очистить ВЕСЬ кэш');
define('_SYSTEM_INFO', 'Информация о системе');
define('_NO_ACTIVE_MENU_ON_THIS_PAGE', 'На этой странице меню не активно');

/* administrator modules mod_latest */
define('_LAST_ADDED_CONTENT', 'Последнее добавленное содержимое');
define('_USER_WHO_ADD_CONTENT', 'Добавил');

/* administrator modules mod_latest_users */
define('_NOW_ON_SITE', 'Сейчас на сайте');
define('_REGISTERED_USERS_COUNT', 'Зарегистрировано');
define('_ALL_REGISTERED_USERS_COUNT', 'Всего');
define('_TODAY_REGISTERED_USERS_COUNT', 'За сегодня');
define('_WEEK_REGISTERED_USERS_COUNT', 'За неделю');
define('_MONTH_REGISTERED_USERS_COUNT', 'За месяц');
define('_ADMINLIST_NEW', 'Новые пользователи');
define('_ADMINLIST_ENABLE', 'Разрешен');
define('_ADMINLIST_GROUP', 'Группа');
define('_ADMINLIST_REGISTERED', 'Зарегистрирован');
define('_ADMINLIST_ALL', 'всё');

/* administrator modules mod_logged */
define('_NOW_ON_SITE_REGISTERED', 'Сейчас на сайте авторизованы');

/* administrator modules mod_online */
define('_ONLINE_USERS', 'Пользователей онлайн');

/* administrator modules mod_popular */
define('_POPULAR_CONTENT', 'Часто просматриваемое');
define('_CREATED_CONTENT', 'Создано');
define('_CONTENT_HITS', 'Просмотров');

/* administrator modules mod_stats */
define('_MENU_ITEMS_COUNT', 'Пунктов');

/* administrator modules includes admin.php */
define('_CACHE_DIR_IS_NOT_WRITEABLE', 'Пожалуйста, сделайте каталог кэша доступным для записи');
define('_CACHE_DIR_IS_NOT_WRITEABLE2', 'Каталог кэша не доступен для записи');
define('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc установлено в &laquo;OFF&raquo; вместо &laquo;ON&raquo;');
define('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals установлено в &laquo;ON&raquo; вместо &laquo;OFF&raquo;');
define('_RG_EMULATION_ON_OFF', 'Параметр Joostina RG_EMULATION в файле globals.php установлен в &laquo;ON&raquo; вместо &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - параметр по умолчанию - для совместимости</span>');
define('_PHP_SETTINGS_WARNING', 'Следующие настройки PHP не являются оптимальными для <strong>БЕЗОПАСНОСТИ</strong> и их рекомендуется изменить');
define('_MENU_CACHE_CLEANED', 'Кэш меню панели управления очищен');
define('_CLEANING_ADMIN_MENU_CACHE', 'Ошибка очистки кэша меню панели управления');
define('_NO_MENU_ADMIN_CACHE', 'Кэш меню панели управления не обнаружен. Проверьте права доступа на каталог кэша.');

/* administrator modules includes pageNavigation.php */
define('_NAV_SHOW', 'Показано');
define('_NAV_SHOW_FROM', 'из');
define('_NAV_NO_RECORDS', 'Записи не найдены');
define('_NAV_ORDER_UP', 'Переместить выше');
define('_NAV_ORDER_DOWN', 'Переместить ниже');

/* administrator modules popups pollwindow.php */
define('_POLL_PREVIEW', 'Предпросмотр опроса');

/* administrator modules popups uploadimage.php */
define('_CHOOSE_IMAGE_FOR_UPLOAD', 'Пожалуйста, выберите изображение для загрузки');
define('_BAD_UPLOAD_FILE_NAME', 'Имена файлов должны состоять из символов алфавита и не должны содержать пробелов');
define('_IMAGE_ALREADY_EXISST', 'Изображение уже существует');
define('_FILE_MUST_HAVE_THIS_EXTENSION', 'Файл должен иметь расширение');
define('_FILE_UPLOAD_UNSUCCESS', 'Загрузка файла неудачна');
define('_FILE_UPLOAD_SUCCESS', 'Загрузка файла успешно завершена');

/* administrator index.php index2.php index3.php */
define('_PLEASE_ENTER_PASSWORD', 'Пожалуйста, введите пароль');
define('_BAD_CAPTCHA_STRING', 'Введен неверный код проверки');
define('_BAD_USERNAME_OR_PASSWORD', 'Неверные имя пользователя, пароль, или уровень доступа.  Пожалуйста, повторите снова');
define('_BAD_USERNAME_OR_PASSWORD2', 'Имя или пароль не верны. Повторите ввод.'); // not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
define('_JOOSTINA_CONTRL_PANEL', 'Панель управления [Joostina]');
define('_GO_TO_MAIN_ADMIN_PAGE', 'Перейти на главную страницу Панели управления');
define('_PLEASE_WAIT', 'Ждите…');
define('_TOGGLE_WYSIWYG_EDITOR', 'Использование визуального редактора');
define('_DISABLE_WYSIWYG_EDITOR', 'Отключить редактор');
define('_PRESS_HERE_TO_RELOAD_CAPTCHA', 'Нажмите чтобы обновить изображение');
define('_SHOW_CAPTCHA', 'Обновить изображение');
define('_PLEASE_ENTER_CAPTCHA', 'Введите код проверки с картинки:');
define('_PLEASE_ENABLE_JAVASCRIPT', 'Предупреждение! Javascript должен быть разрешены для правильной работы панели управления администратора!');

/* includes feedcreator.class.php */
define('_ERROR_CREATING_NEWSFEED', 'Ошибка создания файла ленты новостей. Пожалуйста, проверьте разрешения на запись');

/* includes joomla.php */
define('_YOU_NEED_TO_AUTH', 'Необходимо авторизоваться');
define('_ADMIN_SESSION_ENDED', 'Сессия администратора закончилась');
define('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', 'Вам необходимо авторизоваться. Если включен параметр PHP session.auto_start или выключен параметр session.use_cookies setting, то сначала вы должны их исправить перед тем, как сможете войти');
define('_WRONG_USER_SESSION', 'Неправильная сессия');
define('_FIRST', 'Первый');
define('_LAST', 'Последний');
define('_MOS_WARNING', 'Внимание!');
define('_ADM_MENUS_TARGET_CUR_WINDOW', 'текущем окне с панелью навигации');
define('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', 'новом окне с панелью навигации');
define('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', 'новом окне без панели навигации');
define('_WITH_UNASSIGNED', 'Со свободными');
define('_CHOOSE_IMAGE', 'Выберите изображение');
define('_NO_USER', 'Нет пользователя');
define('_CREATE_CATEGORIES_FIRST', 'Сначала необходимо создать категории');
define('_NOT_CHOOSED', 'Не выбрано');
define('_PUBLISHED_VUT_NOT_ACTIVE', 'Опубликовано, но <em>Не активно</em>');
define('_PUBLISHED_AND_ACTIVE', 'Опубликовано и <em>Активно</em>');
define('_PUBLISHED_BUT_DATE_EXPIRED', 'Опубликовано, но <em>Истек срок публикации</em>');
define('_NOT_PUBLISHED', 'Не опубликовано');
define('_LINK_NAME', 'Название ссылки');
define('_MENU_EXPIRED', 'Устарело');
define('_MENU_ITEM_NAME', 'Название пункта');
define('_CHECKED_OUT', 'Заблокировано');
define('_PUBLISH_ON_FRONTPAGE', 'Опубликовать на сайте');
define('_UNPUBLISH_ON_FRONTPAGE', 'Скрыть (Не показывать на сайте)');

/* includes joomla.xml.php */
define('_DONT_USE_IMAGE', '-Не использовать изображение-');
define('_DEFAULT_IMAGE', '-Изображение по умолчанию-');

/* includes debug jdebug.php */
define('_SQL_QUERIES_COUNT', 'Число SQL запросов');

/* includes Cache Lite Lite.php */
define('_ERROR_DELETING_CACHE', 'Ошибка удаления кэша');
define('_ERROR_READING_CACHE_DIR', 'Ошибка чтения директории кэша');
define('_ERROR_READING_CACHE_FILE', 'Ошибка чтения файла кэша');
define('_ERROR_WRITING_CACHE_FILE', 'Ошибка записи файла кэша');
define('_SCRIPT_MEMORY_USING', 'Использовано памяти');

/* components com_content */
define('_YOU_HAVE_NO_CONTENT', 'Нет добавленного Вами содержимого');
define('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', 'Содержимое сейчас редактируется другим человеком');

/* components com_poll */
define('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', 'Уже существует модуль с таким названием. Введите другое  название.');

/* components com_registration */
define('_USER_ACTIVATION_FAILED', '<div class="componentheading">Ошибка активации!</div><p>Активация вашей учетной записи невозможна. Пожалуйста, обратитесь к администрации сайта.</p>');

/* components com_weblinks */
define('_ENTER_CORRECT_URL', 'Введите правильный URL!');
define('_ENTER_CORRECT_TITLE', 'Ссылка должна иметь заголовок!');
define('_ENTER_CORRECT_CAT', 'Вы должны выбрать категорию');
define('_ENTER_CORRECT_URL1', 'Вы должны ввести URL');

/* components com_xmap */
define('_XMAP_PAGE', ' страница');

/* administrator index2.php */
define('_TEMPLATE_NOT_FOUND', 'Шаблон не обнаружен');
define('_ACCESS_DENIED', 'В доступе отказано');
define('_CHECKIN_OJECT', 'Разблокировать');

/** includes/pdf.php */
define('_PDF_GENERATED','Создано:');
define('_PDF_POWERED','Работает на Joostina!');

/* jmn */
define('_MG_NAME','JMN (Joostina Meta Name)');
define('_MG_INSTALL','Компонент JMN (Joostina Meta Name) установлен!');
define('_MG_UNINSTALL','Компонент удален.');
define('_MG_SETTINGS','Настройки');
define('_MG_KWORDS','Ключевые слова');
define('_MG_DESC','Описание');
define('_MG_EXWORDEDIT','Редактор слов-исключений');
define('_MG_DESCCOMMON','Пожалуйста выберите элементы контента, для которых вы бы хотели создать описания или ключевые слова. Затем выберите выше кнопку <b>"Описание"</b> или <b>"Ключевые слова"</b>.<br />После того, как ключевые слова/описание созданы вам необходимо нажать кнопку <b>"Сохранить"</b> для сохранения изменений.');
define('_MG_SAVE','Сохранить');
define('_MG_CANCEL','Отмена');
define('_MG_BACK','Назад');
define('_MG_CLOSE','Закрыть');
define('_MG_MGRMETA','Менеджер метатегов');
define('_MG_MGRARH','Менеджер архива');
define('_MG_FILTR','Фильтр');
define('_MG_TITLE','Заголовок');
define('_MG_PREV','Менеджер метатегов');
define('_MG_SECT','Раздел');
define('_MG_CAT','Категория');
define('_MG_VIEWPAGE','Просмотреть страницу');
define('_MG_ALL','Все');
define('_MG_START','Начало');
define('_MG_FINISH','Окончание');
define('_MG_ORDER','Порядок');
define('_MG_HITS','Просмотры');
define('_MG_ID','ID');
define('_MG_ALLWAYS','Всегда');
define('_MG_NOEXPIRY','Не действителен');
define('_MG_AUTH','Автор');
define('_MG_DATE','Дата');
define('_MG_CONTITEM','Объект содержимого');
define('_MG_ITEMDETLS','Детали объекта');
define('_MG_TITLEALIAS','Псевдоним заголовка');
define('_MG_INTROTXT','Вводный текст: (рекомендуется)');
define('_MG_MAINTXT','Основной текст: (опционально)');
define('_MG_PUBLINFO','Информация о публикации');
define('_MG_FRONTSHOW','Показать на главной');
define('_MG_ACCLAYER','Уровень доступа');
define('_MG_AUTHALIAS','Псевдоним автора');
define('_MG_CREATBY','Изменить создателя');
define('_MG_ORDERING','Перезаписать дату создания)');
define('_MG_RECREATBY','Перезаписать дату создания)');
define('_MG_PUBLSTART','Начало публикации');
define('_MG_PUBLFINISH','Окончание публикации');
define('_MG_IDITEM','ID содержимого');
define('_MG_KEYEXTR','Экстрактор ключевых слов');
define('_MG_ENTERURL','Введите URL');
define('_MG_ENTERTXT','Введите текст');
define('_MG_LIMITRES','Ограничить результаты');
define('_MG_DELRES','Разделять результаты');
define('_MG_ORDRES','Упорядочивание результатов');
define('_MG_WEXCL','Слова-исключения');
define('_MG_MOSTEXCLS','Наиболее часто встречающиеся слова-разделители в Русском и Английском языках');
define('_MG_SHORTFST','Короткие ключевые слова первыми');
define('_MG_LONDFST','Длинные ключевые слова первыми');
define('_MG_COMMA','запятая');
define('_MG_BREAK','перевод строки');
define('_MG_SPACE','пробел');
define('_MG_5W','5 слов');
define('_MG_10W','10 слов');
define('_MG_25W','25 слов');
define('_MG_50W','50 слов');
define('_MG_100W','100 слов');
define('_MG_200W','200 слов');
define('_MG_500W','500 слов');
define('_MG_UNLIM','неограниченно');
define('_MG_W','слов');
define('_MG_GENKWORDS','Генерировать ключевые слова');
define('_MG_WARNKWORDS','Это перезапишет ключевые слова для всех выбранных элементов. Нажмите "ОК" для продолжения или "Отмена" для отмены действия.');
define('_MG_WARNDESC','Это действие перезапишет описание для всех выбранных элементов. Нажмите "ОК" для продолжения или "Отмена" для отмены действия.');
define('_MG_SELTRASH','Выберите из списка объекты для отправки в корзину');
define('_MG_WARNTRASH','Вы уверены, что хотите отправить в корзину выбранные элементы? \n Это действие не удалит элементы навсегда.');
define('_MG_STATE','Состояние');
define('_MG_REVISED','Вернулись');
define('_MG_TIMES','раз');
define('_MG_CREATED','Создан');
define('_MG_LASTMOD','Последняя модификация');
define('_MG_MOSIMGCTRL','Управление mosimage');
define('_MG_IMGGAL','Галерея изображений');
define('_MG_SUBFLDRS','Подпапки');
define('_MG_CONTIMG','Изображения содержимого');
define('_MG_SAMPLEIMG','Пример изображения');
define('_MG_ACTIVEIMG','Активное изображение');
define('_MG_SELIMGEDITE','Редактировать выбранное изображение');
define('_MG_CODE','Код');
define('_MG_IMGALIGN','Выравнивание изображения');
define('_MG_ALTTXT','Альтернативный текст');
define('_MG_BORD','Граница');
define('_MG_CAPTION','Подпись');
define('_MG_CAPTIONPOS','Позиция подписи');
define('_MG_CAPTIONALIGN','Выравнивание подписи');
define('_MG_CAPTIONWIDTH','Ширина подписи');
define('_MG_PARAMCTRL','Управление параметрами');
define('_MG_PARAMDESC','*Эти параметры контролируют только то, что вы видите когда кликаете для полного просмотра элемента.*');
define('_MG_PUBLISH','Опубликовано');
define('_MG_UNPUBLISH','Не опубликовано');
define('_MG_EXPIRED','Истек');
define('_MG_USEREDITE','Редактировать пользователя');
define('_MG_CONTEDITE','Редактировать содержимое');
define('_MG_SECTEDITE','Редактировать раздел');
define('_MG_CATEDITE','Редактировать категорию');
define('_MG_SELMENU','Выберите меню');
define('_MG_ENTRMENUNAME','Введите имя для этого объекта меню');
define('_MG_ITEMMUSTHATETITLE','Объект содержимого должен иметь заголовок');
define('_MG_MUSTSELSECT','Вы должны выбрать раздел.');
define('_MG_MUSTSELCAT','Вы должны выбрать категорию.');
define('_MG_EDITE','Редактировать');
define('_MG_NEW','Новый');
define('_MG_ARH','Архив');
define('_MG_DRAFT','Черновик');
define('_MG_RESETHITS','Сброс количества просмотров');
define('_MG_NEWDOC','Новый документ');
define('_MG_UNMOD','Не модифицировано');
define('_MG_METEDATE','Метаданные');
define('_MG_LINKTOMENU','Ссылка на меню');
define('_MG_MENUINFO','Это действие создаст "Ссылку - элемент контента" в выбранном меню.<br />');
define('_MG_MENUSEL','Выбор меню');
define('_MG_ITEMMENUNAME','Название объекта меню');
define('_MG_EXISTLINKMENU','Существующие ссылки в меню');
define('_MG_NO','Нет');
define('_MG_YES','Да');
define('_MG_SELSMSNG','Выберите что-нибудь');
define('_MG_MOVEITEM','Переместить объект');
define('_MG_MOVESECTCAT','Переместить в Раздел/Категорию');
define('_MG_ITEMMOVED','Объекты были перемещены');
define('_MG_SELSECTCATTOCOPY','Выберите Раздел/Категорию для копирования в него объекта');
define('_MG_COPYITEM','Копировать содержимое объекта');
define('_MG_COPYSECTCAT','Копировать в Раздел/Категорию');
define('_MG_ITEMMCOPY','Объекты были скопированны');
define('_MG_NOTSELITEMFORMETA','Не выбрано содержимое для генерирации метаданных!');
define('_MG_KWCHNGTITLE','Ключевые слова метатегов были изменены в соответствии с заголовком содержимого');
define('_MG_DESCCHNGTITLE','Описание метатегов было изменено в соответствии с заголовком содержимого');
define('_MG_SELITEMCNG','Выделенные элементы изменены');
define('_MG_KWITEMGEN','Ключевые слова для выбранных объектов сгененерированы');
define('_MG_DESCITEMGEN','Описания для выбранных объектов сгененерированы');
define('_MG_SETMTGSAVE','Настройки JMN (Joostina Meta Name) успешно сохранены!');
define('_MG_ACSINFOCONF','Настройте права доступа к файлу $config на \"Доступен для записи\"!');
define('_MG_KWGEN','Генератор ключевых слов');
define('_MG_TOGEN','Генерировать');
define('_MG_COUNTKWVIEW','Установите количество отображения генерируемых ключевых слов');
define('_MG_SEP','Разделитель');
define('_MG_SEPKW','Установите разделитель для ключевых слов');
define('_MG_SORTDESC','Убывание');
define('_MG_SORTASC','Возрастание');
define('_MG_CHGSORTKW','Изменить порядок ключевых слов (по возрастанию или убыванию)');
define('_MG_REWRKW','Перезаписать имеющиеся ключевые слова');
define('_MG_CHEKREWRKW','Отметте для перезаписи предыдущих ключевых слов');
define('_MG_REWRDESC','Перезаписать имеющееся описание');
define('_MG_CHEKREWRDESC','Отметте для перезаписи предыдущего описания');
define('_MG_IGNORESIMB','Игнорировать следующие символы');
define('_MG_ENTERIGNORESIMB','Введите символы, которые хотите игнорировать (по одному в каждой строке)');
define('_MG_DESCGEN','Генератор описания');
define('_MG_GETDESCFROM','Получить описание из');
define('_MG_CHEKREWRDESCINFO','Отметте откуда будет взято описание. Если отмечено, что из "Основного текста" то укажите лимит знаков ниже.');
define('_MG_GETFITXT','Использовать по умолчанию Полный текст/Вводный текст по возможности');
define('_MG_GETFITXTINFO','Используется Полный текст/Вводный текст по умолчанию');
define('_MG_DESCLEN','Длина описания');
define('_MG_DESCLENINFO','Длина описания (количество символов)');
define('_MG_EXKWDESC','Исключить эти ключевые слова из описания');
define('_MG_EXKWDESCINFO','Введите ключевые слова, которые нужно исключить из описания (по одному в каждой строке)');
define('_MG_WEXSAVE','Слова-исключения успешно сохранены');
define('_MG_READINFOCONF','Проблема с чтением файла $conf!');
define('_MG_WEXLISTINFO','Введите любые слова, которые нужно исключить из списка ключевых слов.<br />Список уже содержит наиболее употребительные русские и английские слова');
define('_MG_FILEEDITE','Редактирование файла');
define('_MG_ALLCONTITEM','Все объекты содержимого');
define('_MG_ARHWARNEDITE','Не возможно редактировать архивные объекты');
define('_MG_ANOTHADMEDITE','уже редактируется другим администратором');
define('_MG_SELCAT','Выбор категории');
define('_MG_CHGITEMSAVE','Изменения объекта успешно сохранены');
define('_MG_ITEMSAVE','Объект успешно сохранен');
define('_MG_ITEMARHSUX','Объект(ы) успешно архивированы');
define('_MG_ITEMPUBLSUX','Объект(ы) успешно опубликованы');
define('_MG_ITEMUNPUBLSUX','Объект(ы) успешно сняты с публикации');
define('_MG_ITEMSENDTRASH','Объект(ы) отправлены в корзину');
define('_MG_ITEMMOVESECTSUX','Объект(ы) успешно перемещены в раздел');
define('_MG_ITEMCOPYSECTSUX','Объект(ы) успешно скопированы в раздел');
define('_MG_CATEGORY','категорию');
define('_MG_DROPCOUNTSUX','Счетчик просмотров успешно сброшен');
define('_MG_LINKSTATITEM','(Ссылка - Статичное содержимое) в меню');
define('_MG_MADESUX','успешно создана');
?>