<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

// забарона прамога доступу
defined( '_VALID_MOS' ) or die( 'Доступ забаронены' );

// Старонка сайта не знойдзеная
define( '_404', 'Запытаная старонка не знойдзеная.' );
define( '_404_RTS', 'Вярнуцца на сайт' );
 
define( '_SYSERR1', 'Няма падтрымкі MySQL' );
define( '_SYSERR2', 'Немагчыма падлучыцца да сервера базы дадзеных' );
define( '_SYSERR3', 'Немагчыма падлучыцца да базы дадзеных' );

// агульнае
DEFINE('_LANGUAGE','by');
DEFINE('_NOT_AUTH','Прабачце, але для прагляду гэтай старонкі ў Вас недастаткова правоў.');
DEFINE('_DO_LOGIN','Вы павінны аўтарызавацца або прайсці рэгістрацыю.');
DEFINE('_VALID_AZ09',"Калі ласка, праверце, ці правільна напісана %s. Імя не павінна ўтрымоўваць прабелаў, толькі знакі 0-9, a-z, A-Z і мець даўжыню не меней %d знакаў.");
DEFINE('_VALID_AZ09_USER',"Калі ласка, правільна ўвядзіце %s. Павінна ўтрымоўваць толькі знакі 0-9, a-z, A-Z і мець даўжыню не меней %d знакаў.");
DEFINE('_CMN_YES','Так');
DEFINE('_CMN_NO','Не');
DEFINE('_CMN_SHOW','Паказаць');
DEFINE('_CMN_HIDE','Схаваць');

DEFINE('_CMN_NAME','Імя');
DEFINE('_CMN_DESCRIPTION','Апісанне');
DEFINE('_CMN_SAVE','Захаваць');
DEFINE('_CMN_APPLY','Ужыць');
DEFINE('_CMN_CANCEL','Адмена');
DEFINE('_CMN_PRINT','Друк');
DEFINE('_CMN_PDF','PDF');
DEFINE('_CMN_EMAIL','E-mail');
DEFINE('_ICON_SEP','|');
DEFINE('_CMN_PARENT','Бацька');
DEFINE('_CMN_ORDERING','Сартаванне');
DEFINE('_CMN_ACCESS','Узровень доступу');
DEFINE('_CMN_SELECT','Вылучыць');

DEFINE('_CMN_NEXT','Наст.');
DEFINE('_CMN_NEXT_ARROW',"&nbsp;&raquo;");
DEFINE('_CMN_PREV','Папяр.');
DEFINE('_CMN_PREV_ARROW',"&laquo;&nbsp;");

DEFINE('_CMN_SORT_NONE','Без сартавання');
DEFINE('_CMN_SORT_ASC','Па ўзрастанні');
DEFINE('_CMN_SORT_DESC','Па змяншэнні');

DEFINE('_CMN_NEW','Стварыць');
DEFINE('_CMN_NONE','Не');
DEFINE('_CMN_LEFT','Злева');
DEFINE('_CMN_RIGHT','Справа');
DEFINE('_CMN_CENTER','Па цэнтры');
DEFINE('_CMN_ARCHIVE','Дадаць у архіў');
DEFINE('_CMN_UNARCHIVE','Выняць з архіва');
DEFINE('_CMN_TOP','Угары');
DEFINE('_CMN_BOTTOM','Унізе');

DEFINE('_CMN_PUBLISHED','Апублікавана');
DEFINE('_CMN_UNPUBLISHED','Не апублікавана');

DEFINE('_CMN_EDIT_HTML','Рэдагаваць HTML');
DEFINE('_CMN_EDIT_CSS','Рэдагаваць CSS');

DEFINE('_CMN_DELETE','Выдаліць');

DEFINE('_CMN_FOLDER','Каталог');
DEFINE('_CMN_SUBFOLDER','Падкаталог');
DEFINE('_CMN_OPTIONAL','Не абавязкова');
DEFINE('_CMN_REQUIRED','Абавязкова');

DEFINE('_CMN_CONTINUE','Працягнуць');

DEFINE('_STATIC_CONTENT','Статычнае змесціва');

DEFINE('_CMN_NEW_ITEM_LAST','Па змаўчанні новыя аб\'екты будуць дададзеныя ў канец спісу. Парадак сартавання можа быць зменены толькі пасля захавання аб\'екта.');
DEFINE('_CMN_NEW_ITEM_FIRST','Па змаўчанні новыя аб\'екты будуць дададзеныя ў пачатак спісу. Парадак сартавання можа быць зменены толькі пасля захавання аб\'екта.');
DEFINE('_LOGIN_INCOMPLETE','Калі ласка, запоўніце палі Імя карыстальніка і Пароль.');
DEFINE('_LOGIN_BLOCKED','Прабачце, ваш уліковы запіс заблакаваны. За больш падрабязнай інфармацыяй звярніцеся да адміністратара сайта.');
DEFINE('_LOGIN_INCORRECT','Няправільнае імя карыстальніка (лагін) або пароль. Паспрабуйце яшчэ раз.');
DEFINE('_LOGIN_NOADMINS','Прабачце, вы не можаце ўвайсці на сайт. Адміністратары на сайце не зарэгістраваныя.');
DEFINE('_CMN_JAVASCRIPT','Увага! Для выканання дадзенай аперацыі, у вашым браўзэры павінна быць уключаная падтрымка Java-script.');

DEFINE('_NEW_MESSAGE','Вам дайшло новае асабістае паведамленне');
DEFINE('_MESSAGE_FAILED','Карыстальнік заблакаваў сваю паштовую скрыню. Паведамленне не дастаўлена.');

DEFINE('_CMN_IFRAMES', 'Гэтая старонка будзе адлюстравана некарэктна. Ваш браўзэр не падтрымлівае ўкладзеныя фрэймы (IFrame)');
					   
DEFINE('_INSTALL_3PD_WARN','Папярэджанне: Усталёўка іншых пашырэнняў можа парушаць бяспеку вашага сервера. Пры абнаўленні ўсталёўкі Joomla! не адбываецца абнаўленні іншых пашырэнняў.<br />Для атрымання дадатковай інфармацыі аб абароне свайго сайта, калі ласка, наведайце <a href="http://forum.joomla.org/index.php/board,267.0.html" target="_blank" style="color: blue; text-decoration: underline;">Форум бяспекі Joomla!</a>.');
DEFINE('_INSTALL_WARN','Па меркаваннях бяспекі, калі ласка, выдаліце папку <strong>installation</strong> з вашага сервера і абнавіце старонку.');
DEFINE('_TEMPLATE_WARN','<font color=\"red\"><strong>Файл шаблону не знойдзены:</strong></font> <br /> Зайдзіце ў Панэль кіравання сайтам і вылучыце шаблон');
DEFINE('_NO_PARAMS','Аб\'ект не ўтрымоўвае наладжвальных параметраў');
DEFINE('_HANDLER','Апрацоўшчык для дадзенага тыпу адсутнічае');

/** мамботы */
DEFINE('_TOC_JUMPTO','Змест');

/**  змесціва */
DEFINE('_READ_MORE','Падрабязней...');
DEFINE('_READ_MORE_REGISTER','Толькі для зарэгістраваных карыстальнікаў...');
DEFINE('_MORE','Далей...');
DEFINE('_ON_NEW_CONTENT', "Карыстальнік [ %s ] дадаў новы аб'ект [ %s ]. Падзел: [ %s ]. Катэгорыя: [ %s ]" );
DEFINE('_SEL_CATEGORY','- Вылучыце катэгорыю -');
DEFINE('_SEL_SECTION','- Вылучыце падзел -');
DEFINE('_SEL_AUTHOR','- Вылучыце аўтара -');
DEFINE('_SEL_POSITION','- Вылучыце пазіцыю -');
DEFINE('_SEL_TYPE','- Вылучыце тып -');
DEFINE('_EMPTY_CATEGORY','Дадзеная катэгорыя не ўтрымоўвае аб\'ектаў.');
DEFINE('_EMPTY_BLOG','Няма аб\'ектаў для адлюстравання!');
DEFINE('_NOT_EXIST','Прабачце, старонка не знойдзеная.<br />Калі ласка, вярніцеся на галоўную старонку сайта.');
DEFINE('_SUBMIT_BUTTON','Адправіць');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE','Галасаваць');
DEFINE('_BUTTON_RESULTS','Вынікі');
DEFINE('_USERNAME','Карыстальнік');
DEFINE('_LOST_PASSWORD','Забылі пароль?');
DEFINE('_PASSWORD','Пароль');
DEFINE('_BUTTON_LOGIN','Увайсці');
DEFINE('_BUTTON_LOGOUT','Выйсці');
DEFINE('_NO_ACCOUNT','Яшчэ не зарэгістраваныя?');
DEFINE('_CREATE_ACCOUNT','Рэгістрацыя');
DEFINE('_VOTE_POOR','Горшая');
DEFINE('_VOTE_BEST','Лепшая');
DEFINE('_USER_RATING','Рэйтынг');
DEFINE('_RATE_BUTTON','Ацаніць');
DEFINE('_REMEMBER_ME','Запомніць');

/** contact.php */
DEFINE('_ENQUIRY','Кантакт');
DEFINE('_ENQUIRY_TEXT','Гэтае паведамленне адпраўленае з сайта %s. Аўтар паведамлення:');
DEFINE('_COPY_TEXT','Гэта копія паведамлення, якое Вы адправілі для %s з сайта %s ');
DEFINE('_COPY_SUBJECT','Копія: ');
DEFINE('_THANK_MESSAGE','Дзякуй! Паведамленне паспяхова адпраўленае.');
DEFINE('_CLOAKING','Гэты e-mail абаронены ад спам-ботаў. Для яго прагляду ў вашым браўзэры павінна быць уключаная падтрымка Java-script');
DEFINE('_CONTACT_HEADER_NAME','Імя');
DEFINE('_CONTACT_HEADER_POS','Становішча');
DEFINE('_CONTACT_HEADER_EMAIL','E-mail');
DEFINE('_CONTACT_HEADER_PHONE','Тэлефон');
DEFINE('_CONTACT_HEADER_FAX','Факс');
DEFINE('_CONTACTS_DESC','Спіс кантактаў гэтага сайта.');
DEFINE('_CONTACT_MORE_THAN','Вы не можаце ўводзіць больш аднаго адраса e-mail.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE','Зваротная сувязь');
DEFINE('_EMAIL_DESCRIPTION','Адправіць e-mail карыстальніку:');
DEFINE('_NAME_PROMPT',' Увядзіце Ваша імя:');
DEFINE('_EMAIL_PROMPT',' Увядзіце Ваш e-mail:');
DEFINE('_MESSAGE_PROMPT',' Увядзіце тэкст паведамлення:');
DEFINE('_SEND_BUTTON','Адправіць');
DEFINE('_CONTACT_FORM_NC','Калі ласка, запоўніце форму цалкам і правільна.');
DEFINE('_CONTACT_TELEPHONE','Тэлефон: ');
DEFINE('_CONTACT_MOBILE','Мабільны: ');
DEFINE('_CONTACT_FAX','Факс: ');
DEFINE('_CONTACT_EMAIL','E-mail: ');
DEFINE('_CONTACT_NAME','Імя: ');
DEFINE('_CONTACT_POSITION','Пасада: ');
DEFINE('_CONTACT_ADDRESS','Адрас: ');
DEFINE('_CONTACT_MISC','Дад. інфармацыя: ');
DEFINE('_CONTACT_SEL','Вылучыце атрымальніка:');
DEFINE('_CONTACT_NONE','Дэталі гэтага кантактнага запісу адсутнічаюць.');
DEFINE('_CONTACT_ONE_EMAIL','Нельга ўводзіць больш аднаго адраса e-mail.');
DEFINE('_EMAIL_A_COPY','Адправіць копію паведамлення на ўласны адрас');
DEFINE('_CONTACT_DOWNLOAD_AS','Запампаваць інфармацыю ў фармаце');
DEFINE('_VCARD','VCard');

/** pageNavigation */
DEFINE('_PN_LT','&lt;');
DEFINE('_PN_RT','&gt;');
DEFINE('_PN_PAGE','Старонка');
DEFINE('_PN_OF','з');
DEFINE('_PN_START','[Першая]');
DEFINE('_PN_PREVIOUS','[Папярэдняя]');
DEFINE('_PN_NEXT','[Наступная]');
DEFINE('_PN_END','[Апошняя]');
DEFINE('_PN_DISPLAY_NR','Паказваць');
DEFINE('_PN_RESULTS','Вынікі');

/** ліст сябру */
DEFINE('_EMAIL_TITLE','Адправіць e-mail сябру');
DEFINE('_EMAIL_FRIEND','Адправіць спасылку старонкі на e-mail:');
DEFINE('_EMAIL_FRIEND_ADDR','E-Mail сябра:');
DEFINE('_EMAIL_YOUR_NAME','Ваша імя:');
DEFINE('_EMAIL_YOUR_MAIL','Ваш e-mail:');
DEFINE('_SUBJECT_PROMPT',' Тэма паведамлення:');
DEFINE('_BUTTON_SUBMIT_MAIL','Адправіць');
DEFINE('_BUTTON_CANCEL','Адмена');
DEFINE('_EMAIL_ERR_NOINFO','Вы павінны правільна ўвесці свой e-mail і e-mail атрымальніка гэтага ліста.');
DEFINE('_EMAIL_MSG',' Дабрыдзень! Наступную спасылку на старонку сайта "%s" адправіў Вам %s ( %s ).

Вы зможаце праглядзець яе па гэтай спасылцы:
%s');
DEFINE('_EMAIL_INFO','Ліст адправіў');
DEFINE('_EMAIL_SENT','Спасылка на гэтую старонку адпраўленая для');
DEFINE('_PROMPT_CLOSE','Зачыніць акно');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' Аўтар');
DEFINE('_WRITTEN_BY', ' Аўтар');
DEFINE('_LAST_UPDATED', 'Апошняе абнаўленне');
DEFINE('_BACK','Вярнуцца');
DEFINE('_LEGEND','Гісторыя');
DEFINE('_DATE','Дата');
DEFINE('_ORDER_DROPDOWN','Парадак');
DEFINE('_HEADER_TITLE','Назоў');
DEFINE('_HEADER_AUTHOR','Аўтар');
DEFINE('_PUBLIC_NUMBER','апублікавана ў №'); // opublikovano v nonere
DEFINE('_HEADER_SUBMITTED','Напісаны');
DEFINE('_HEADER_HITS','Праглядаў');
DEFINE('_E_EDIT','Рэдагаваць');
DEFINE('_E_ADD','Дадаць');
DEFINE('_E_WARNUSER','Калі ласка, націсніце кнопку "Адмена" або "Захаваць", каб пакінуць гэтую старонку');
DEFINE('_E_WARNTITLE','Змесціва павінна мець загаловак');
DEFINE('_E_WARNTEXT','Змесціва павінна мець уступны тэкст');
DEFINE('_E_WARNCAT','Калі ласка, вылучыце катэгорыю');
DEFINE('_E_CONTENT','Змесціва');
DEFINE('_E_TITLE','Загаловак:');
DEFINE('_E_CATEGORY','Катэгорыя:');
DEFINE('_E_INTRO','Уступны тэкст');
DEFINE('_E_MAIN','Асноўны тэкст');
DEFINE('_E_MOSIMAGE','Уставіць тэг {mosimage}');
DEFINE('_E_IMAGES','Малюнкі');
DEFINE('_E_GALLERY_IMAGES','Галерэя малюнкаў');
DEFINE('_E_CONTENT_IMAGES','Малюнкі да тэксту');
DEFINE('_E_EDIT_IMAGE','Параметры малюнка');
DEFINE('_E_NO_IMAGE','Без малюнка');
DEFINE('_E_INSERT','Уставіць');
DEFINE('_E_UP','Вышэй');
DEFINE('_E_DOWN','Ніжэй');
DEFINE('_E_REMOVE','Выдаліць');
DEFINE('_E_SOURCE','Назоў файла:');
DEFINE('_E_ALIGN','Размяшчэнне:');
DEFINE('_E_ALT','Альтэрнатыўны тэкст:');
DEFINE('_E_BORDER','Рамка:');
DEFINE('_E_CAPTION','Загаловак');
DEFINE('_E_CAPTION_POSITION','Становішча подпісу');
DEFINE('_E_CAPTION_ALIGN','Выраўнаванне подпісу');
DEFINE('_E_CAPTION_WIDTH','Шырыня подпісу');
DEFINE('_E_APPLY','Ужыць');
DEFINE('_E_PUBLISHING','Публікацыя');
DEFINE('_E_STATE','Стан:');
DEFINE('_E_AUTHOR_ALIAS','Псеўданім аўтара:');
DEFINE('_E_ACCESS_LEVEL','Узровень доступу:');
DEFINE('_E_ORDERING','Парадак:');
DEFINE('_E_START_PUB','Дата пачатку публікацыі:');
DEFINE('_E_FINISH_PUB','Дата заканчэння публікацыі:');
DEFINE('_E_SHOW_FP','Паказваць на галоўнай старонцы:');
DEFINE('_E_HIDE_TITLE','Схаваць загаловак:');
DEFINE('_E_METADATA','Мета-тэгі');
DEFINE('_E_M_DESC','Апісанне:');
DEFINE('_E_M_KEY','Ключавыя словы:');
DEFINE('_E_SUBJECT','Тэма:');
DEFINE('_E_EXPIRES','Дата заканчэння:');
DEFINE('_E_VERSION','Версія:');
DEFINE('_E_ABOUT','Аб аб\'екце');
DEFINE('_E_CREATED','Дата стварэння:');
DEFINE('_E_LAST_MOD','Апошняя змена:');
DEFINE('_E_HITS','Колькасць праглядаў:');
DEFINE('_E_SAVE','Захаваць');
DEFINE('_E_CANCEL','Адмена');
DEFINE('_E_REGISTERED','Толькі для зарэгістраваных карыстальнікаў');
DEFINE('_E_ITEM_INFO','Інфармацыя');
DEFINE('_E_ITEM_SAVED','Паспяхова захавана!');
DEFINE('_ITEM_PREVIOUS','&laquo; Папяр.');
DEFINE('_ITEM_NEXT','Наст. &raquo;');
DEFINE('_KEY_NOT_FOUND','Ключ не знойдзены');


/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY','У гэтым падзеле архіва зараз няма аб\'ектаў. Калі ласка, зайдзіце пазней');
DEFINE('_CATEGORY_ARCHIVE_EMPTY','У гэтай катэгорыі архіва зараз няма аб\'ектаў. Калі ласка, зайдзіце пазней');
DEFINE('_HEADER_SECTION_ARCHIVE','Архіў падзелаў');
DEFINE('_HEADER_CATEGORY_ARCHIVE','Архіў катэгорый');
DEFINE('_ARCHIVE_SEARCH_FAILURE','Не знойдзена архіўных запісаў для %s %s');        // значэнні месяца, а затым года
DEFINE('_ARCHIVE_SEARCH_SUCCESS','Знойдзеныя архіўныя запісы для %s %s');                // значэнні месяца, а затым года
DEFINE('_FILTER','Фільтр');
DEFINE('_ORDER_DROPDOWN_DA','Дата (па ўзрастанні)');
DEFINE('_ORDER_DROPDOWN_DD','Дата (па змяншэнні)');
DEFINE('_ORDER_DROPDOWN_TA','Назоў (па ўзрастанні)');
DEFINE('_ORDER_DROPDOWN_TD','Назоў (па змяншэнні)');
DEFINE('_ORDER_DROPDOWN_HA','Рэйтынг (па ўзрастанні)');
DEFINE('_ORDER_DROPDOWN_HD','Рэйтынг (па змяншэнні)');
DEFINE('_ORDER_DROPDOWN_AUA','Аўтар (па ўзрастанні)');
DEFINE('_ORDER_DROPDOWN_AUD','Аўтар (па змяншэнні)');
DEFINE('_ORDER_DROPDOWN_O','Па парадку');

/** poll.php */
DEFINE('_ALERT_ENABLED','Cookies павінны быць дазволеныя!');
DEFINE('_ALREADY_VOTE','Вы ўжо прагаласавалі ў гэтым апытанні!');
DEFINE('_NO_SELECTION','Вы не зрабілі свой выбар. Калі ласка, паспрабуйце яшчэ раз');
DEFINE('_THANKS','Дзякуй за Ваш удзел у галасаванні!');
DEFINE('_SELECT_POLL','Вылучыце апытанне з спісу');

/** classes/html/poll.php */
DEFINE('_JAN','Студзень');
DEFINE('_FEB','Люты');
DEFINE('_MAR','Сакавік');
DEFINE('_APR','Красавік');
DEFINE('_MAY','Травень');
DEFINE('_JUN','Чэрвень');
DEFINE('_JUL','Ліпень');
DEFINE('_AUG','Жнівень');
DEFINE('_SEP','Верасень');
DEFINE('_OCT','Кастрычнік');
DEFINE('_NOV','Лістапад');
DEFINE('_DEC','Снежань');
DEFINE('_POLL_TITLE','Вынікі апытання');
DEFINE('_SURVEY_TITLE','Назоў апытання:');
DEFINE('_NUM_VOTERS','Колькасць якія прагаласавалі:');
DEFINE('_FIRST_VOTE','Першы голас:');
DEFINE('_LAST_VOTE','Апошні голас:');
DEFINE('_SEL_POLL','Вылучыце апытанне:');
DEFINE('_NO_RESULTS','Няма дадзеных па вылучаным апытанні.');

/** registration.php */
DEFINE('_ERROR_PASS','Прабачце, такі карыстальнік не знойдзены.');
DEFINE('_NEWPASS_MSG','Уліковы запіс карыстальніка $checkusername адпавядае адрасу e-mail.\n'
.' Карыстальнік сайта $mosConfig_live_site зрабіў запыт на атрыманне новага пароля.\n\n'
.' Ваш новы пароль: $newpass\n\nКалі Вы не запытвалі змену пароля, паведаміце аб гэтым адміністатару.'
.' Толькі Вы можаце ўбачыць гэтае паведамленне, больш ніхто. Калі гэта памылка, проста зайдзіце '
.' на сайт, выкарыстоўваючы новы пароль, і затым, змяніце яго на зручны Вам.');
DEFINE('_NEWPASS_SUB','$_sitename :: Новы пароль для $checkusername');
DEFINE('_NEWPASS_SENT','Новы пароль створаны і адпраўлены карыстальніку!');
DEFINE('_REGWARN_NAME','Калі ласка, увядзіце сваё сапраўднае імя (імя, якое адлюстроўваецца на сайце).');
DEFINE('_REGWARN_UNAME','Калі ласка, увядзіце сваё імя карыстальніка (лагін).');
DEFINE('_REGWARN_MAIL','Калі ласка, правільна ўвядзіце адрас e-mail.');
DEFINE('_REGWARN_PASS','Калі ласка, правільна ўвядзіце пароль. Пароль не павінен утрымоўваць прабелы, яго даўжыня павінна быць не менш 6 знакаў і ён павінен складацца толькі з лічб (0-9) і лацінскіх знакаў (a-z, A-Z)');
DEFINE('_REGWARN_VPASS1','Калі ласка, праверце пароль.');
DEFINE('_REGWARN_VPASS2','Пароль і яго пацверджанне не супадаюць. Калі ласка, паспрабуйце яшчэ раз.');
DEFINE('_REGWARN_INUSE','Гэтае імя карыстальніка ўжо выкарыстоўваецца. Калі ласка, вылучыце іншае імя.');
DEFINE('_REGWARN_EMAIL_INUSE', 'Гэты e-mail ужо выкарыстоўваецца. Калі Вы забылі свой пароль, Націсніце на спасылку "Забылі пароль?" і на паказаны e-mail будзе дасланы новы пароль.');
DEFINE('_SEND_SUB','Дадзеныя аб новым карыстальніку %s з %s');
DEFINE('_USEND_MSG_ACTIVATE', 'Дабрыдзень %s,

Дзякуем за рэгістрацыю на сайце %s. Ваш уліковы запіс паспяхова створаны і павінны быць актываваны.
Каб актываваць уліковы запіс, націсніце на спасылцы або скапіруйце яе ў адрасны радок браўзэра:
%s

Пасля актывацыі Вы можаце зайсці на сайт %s, выкарыстоўваючы сваё імя карыстальніка і пароль:

Імя карыстальніка - %s
Пароль - %s');
DEFINE('_USEND_MSG', "Дабрыдзень %s,

Дзякуем Вас за рэгістрацыю на сайце %s.

Зараз Вы можаце ўвайсці на сайт %s, выкарыстаючы імя карыстальніка і пароль, уведзеныя вамі пры рэгістрацыі.");
DEFINE('_USEND_MSG_NOPASS','Дабрыдзень $name,\n\nВы паспяхова зарэгістраваныя на сайце $mosConfig_live_site.\n'
.'Вы можаце зайсці на сайт $mosConfig_live_site, выкарыстаючы дадзеныя, якія Вы паказалі пры рэгістрацыі.\n\n'
.'На гэты ліст не трэба адказваць, бо яно створана аўтаматычна і прызначана толькі для апавяшчэння\n');
DEFINE('_ASEND_MSG','Дабрыдзень! Гэтае сістэмнае паведамленне з сайта %s.

На сайце %s зарэгістраваўся новы карыстальнік.

Дадзеныя карыстальніка:
Сапраўднае імя - %s
Адрас e-mail - %s
Імя карыстальніка - %s

На гэты ліст не трэба адказваць, бо яно створана аўтаматычна і прызначана толькі для апавяшчэння');
DEFINE('_REG_COMPLETE_NOPASS','<div class="componentheading">Рэгістрацыя завершаная!</div><br />&nbsp;&nbsp;'
.'Зараз Вы можаце ўвайсці на сайт.<br />&nbsp;&nbsp;');
DEFINE('_REG_COMPLETE', '<div class="componentheading">Рэгістрацыя завершана!</div><br />Зараз Вы можаце ўвайсці на сайт.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Рэгістрацыя завершаная!</div><br />Ваш уліковы запіс створаны і павінны быць актываваны перад тым, як вы ёю скарыстаецеся. На Ваш e-mail было адпраўлены ліст са спасылкай, з дапамогай якой Вы можаце актываваць свой уліковы запіс.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Уліковы запіс актываваны!</div><br />Ваш уліковы запіс актываваны. Зараз Вы можаце зайсці на сайт, выкарыстоўваючы імя карыстальніка і пароль, якія Вы ўвялі пры рэгістрацыі.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Няслушная спасылка актывацыі!</div><br />Дадзены ўліковы запіс адсутнічае на сайце або ўжо актываваны.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">Памылка актывацыі!</div><br />Актывацыя вашага ўліковага запісу немагчымая. Калі ласка, звярніцеся да адміністратара.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD','Забылі пароль?');
DEFINE('_NEW_PASS_DESC','Калі ласка, увядзіце свае імя карыстальніка і адрас e-mail, затым націсніце кнопку "Адправіць пароль".<br />'
.'Неўзабаве, на паказаны адрас e-mail Вы атрымаеце ліст з новым паролем. Выкарыстайце гэты пароль для ўваходу на сайт.');
DEFINE('_PROMPT_UNAME','Імя карыстальніка:');
DEFINE('_PROMPT_EMAIL','Адрас e-mail:');
DEFINE('_BUTTON_SEND_PASS','Адправіць пароль');
DEFINE('_REGISTER_TITLE','Рэгістрацыя');
DEFINE('_REGISTER_NAME','Сапраўднае імя:');
DEFINE('_REGISTER_UNAME','Імя карыстальніка:');
DEFINE('_REGISTER_EMAIL','E-mail:');
DEFINE('_REGISTER_PASS','Пароль:');
DEFINE('_REGISTER_VPASS','Пацверджанне пароля:');
DEFINE('_REGISTER_REQUIRED','Усё палі, адзначаныя знакам (*), абавязковыя для запаўнення!');
DEFINE('_BUTTON_SEND_REG','Адправіць дадзеныя');
DEFINE('_SENDING_PASSWORD','Ваш пароль будзе адпраўлены на паказаны вышэй адрас e-mail.<br />Калі Вы атрымаеце'
.' новы пароль, Вы зможаце зайсці на сайт і змяніць гэты пароль у любы час.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE','Пошук');
DEFINE('_PROMPT_KEYWORD','Пошук па ключавой фразе');
DEFINE('_SEARCH_MATCHES','знойдзена %d супадзенняў');
DEFINE('_CONCLUSION','Усяго знойдзена $totalRows матэрыялаў. Знайсці <strong>$searchword</strong> з дапамогай');
DEFINE('_NOKEYWORD','Нічога не знойдзена');
DEFINE('_IGNOREKEYWORD','У пошуку былі прапушчаныя прыназоўнікі');
DEFINE('_SEARCH_ANYWORDS','Любое слова');
DEFINE('_SEARCH_ALLWORDS','Усё словы');
DEFINE('_SEARCH_PHRASE','Цэлую фразу');
DEFINE('_SEARCH_NEWEST','Па змяншэнні');
DEFINE('_SEARCH_OLDEST','Па ўзрастанні');
DEFINE('_SEARCH_POPULAR','Па папулярнасці');
DEFINE('_SEARCH_ALPHABETICAL','Алфавітны парадак');
DEFINE('_SEARCH_CATEGORY','Падзел / Катэгорыя');
DEFINE('_SEARCH_MESSAGE','Тэкст для пошуку павінен утрымоўваць ад 3 да 20 знакаў');
DEFINE('_SEARCH_ARCHIVED','У архіве');
DEFINE('_SEARCH_CATBLOG','Блог катэгорыі');
DEFINE('_SEARCH_CATLIST','Спіс катэгорыі');
DEFINE('_SEARCH_NEWSFEEDS','Стужкі навін');
DEFINE('_SEARCH_SECLIST','Спіс падзелу');
DEFINE('_SEARCH_SECBLOG','Блог падзелу');


/** templates/*.php */
DEFINE('_ISO','charset=windows-1251');
DEFINE('_DATE_FORMAT','Сёння: d.m.Y г.');  //Выкарыстайце фармат PHP-функцыі DATE
/**
* зменіце радок ніжэй, для змены высновы даты на сайце
*
* напрыклад, DEFINE("_DATE_FORMAT_LC"," %d %B %Y г. %H:%M"); //Выкарыстайце фармат PHP-функцыі strftime
*/
DEFINE('_DATE_FORMAT_LC'," %d.%m.%Y г."); //Выкарыстайце фармат PHP-функцыі strftime
DEFINE('_DATE_FORMAT_LC2'," %d.%m.%Y г. %H:%M");
DEFINE('_SEARCH_BOX','Пошук...');
DEFINE('_NEWSFLASH_BOX','Кароткія навіны!');
DEFINE('_MAINMENU_BOX','Галоўнае меню');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE','Меню карыстальніка');
DEFINE('_HI','Дабрыдзень, ');

/** user.php */
DEFINE('_SAVE_ERR','Калі ласка, запоўніце ўсе палі.');
DEFINE('_THANK_SUB','Дзякуй за Ваш матэрыял. Ён будзе прагледжаны адміністратарам перад размяшчэннем на сайце.');
DEFINE('_THANK_SUB_PUB','Дзякуй за Ваш матэрыял.');
DEFINE('_UP_SIZE','Вы не можаце загружаць файлы памерам больш чым 15Кб.');
DEFINE('_UP_EXISTS','Малюнак з імем $userfile_name ужо існуе. Калі ласка, змяніце назоў файла і паспрабуйце яшчэ раз.');
DEFINE('_UP_COPY_FAIL','Памылка пры капіяванні');
DEFINE('_UP_TYPE_WARN','Вы можаце загружаць малюнкі толькі ў фармаце gif або jpg.');
DEFINE('_MAIL_SUB','Новы матэрыял ад карыстальніка');
DEFINE('_MAIL_MSG','Дабрыдзень $adminName,\n\nКарыстальнік $author прапаноўвае новы матэрыял у падзел $type з назовам $title'
.' для сайта $mosConfig_live_site.\n\n\n'
.'Калі ласка, зайдзіце ў панэль адміністратара па адрасе $mosConfig_live_site/administrator для прагляду і дадання яго ў $type.\n\n'
.'На гэты ліст не трэба адказваць, бо ён створаны аўтаматычна і прызначаны толькі для апавяшчэння\n');
DEFINE('_PASS_VERR1','Калі Вы жадаеце змяніць пароль, калі ласка, увядзіце яго яшчэ раз для пацверджання змены.');
DEFINE('_PASS_VERR2','Калі Вы вырашылі змяніць пароль, калі ласка, звярнеце ўвагу, што пароль і яго пацверджанне павінны супадаць.');
DEFINE('_UNAME_INUSE','Вылучанае імя карыстальніка ўжо выкарыстоўваецца.');
DEFINE('_UPDATE','Абнавіць');
DEFINE('_USER_DETAILS_SAVE','Вашы дадзеныя захаваныя.');
DEFINE('_USER_LOGIN','Уваход карыстальніка');

/** components/com_user */
DEFINE('_EDIT_TITLE','Асабістыя дадзеныя');
DEFINE('_YOUR_NAME','Сапраўднае імя:');
DEFINE('_EMAIL','Адрас e-mail:');
DEFINE('_UNAME','Імя карыстальніка:');
DEFINE('_PASS','Пароль:');
DEFINE('_VPASS','Пацверджанне пароля:');
DEFINE('_SUBMIT_SUCCESS','Ваша інфармацыя прынятая!');
DEFINE('_SUBMIT_SUCCESS_DESC','Ваша інфармацыя паспяхова адпраўленая адміністратару. Пасля прагляду, Ваш матэрыял будзе апублікаваны на гэтым сайце');
DEFINE('_WELCOME','Сардэчна запрашаем!');
DEFINE('_WELCOME_DESC','Сардэчна запрашаем у падзел карыстальніка нашага сайта');
DEFINE('_CONF_CHECKED_IN','Усё \'заблакаваныя\' элементы зараз \'разблакаваныя\'.');
DEFINE('_CHECK_TABLE','Праверка табліцы');
DEFINE('_CHECKED_IN','Праверана ');
DEFINE('_CHECKED_IN_ITEMS','');
DEFINE('_PASS_MATCH','Паролі не супадаюць');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME','Вы павінны ўвесці імя кліента.');
DEFINE('_BNR_CONTACT','Вы павінны вылучыць кантакт для кліента.');
DEFINE('_BNR_VALID_EMAIL','Адрас электроннай пошты кліента павінен быць правільным.');
DEFINE('_BNR_CLIENT','Вы павінны вылучыць кліента,');
DEFINE('_BNR_NAME','Увядзіце імя банэра.');
DEFINE('_BNR_IMAGE','Вылучыце малюнкі банэра.');
DEFINE('_BNR_URL','Вы павінны ўвесці URL/Код банэра.');

/** components/com_login */
DEFINE('_ALREADY_LOGIN','Вы ўжо аўтарызаваныя!');
DEFINE('_LOGOUT','Націсніце тут для завяршэння працы');
DEFINE('_LOGIN_TEXT','Выкарыстайце палі "Карыстальнік" і "Пароль" для доступу да сайта');
DEFINE('_LOGIN_SUCCESS','Вы паспяхова ўвайшлі');
DEFINE('_LOGOUT_SUCCESS','Вы паспяхова скончылі працу з сайтам');
DEFINE('_LOGIN_DESCRIPTION','Вы павінны ўвайсці на сайт як карыстальнік, для доступу да зачыненых падзелаў');
DEFINE('_LOGOUT_DESCRIPTION','Вы ўжо знаходзіцеся ў абароненай зоне сайта');


/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE','Спасылкі');
DEFINE('_WEBLINKS_DESC','У дадзеным падзеле сабраныя найболей цікавыя і карысныя спасылкі ў сетцы.'
.' <br />Вылучыце са спісу адзін з падзелаў, а затым вылучыце патрэбную спасылку.');
DEFINE('_HEADER_TITLE_WEBLINKS','Спасылка');
DEFINE('_SECTION','Падзел:');
DEFINE('_SUBMIT_LINK','Адправіць спасылку');
DEFINE('_URL','URL:');
DEFINE('_URL_DESC','Апісанне:');
DEFINE('_NAME','Назоў:');
DEFINE('_WEBLINK_EXIST','Спасылка з такім імем ужо існуе. Змяніце імя і паспрабуйце яшчэ раз.');
DEFINE('_WEBLINK_TITLE','Спасылка павінна мець назоў.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME','Назоў крыніцы');
DEFINE('_FEED_ARTICLES','Артыкулаў');
DEFINE('_FEED_LINK','Спасылка крыніцы');

/** whos_online.php */
DEFINE('_WE_HAVE', 'Зараз на сайце знаходзяцца: <br />');
DEFINE('_AND', ' і ');
DEFINE('_GUEST_COUNT','%s госць');
DEFINE('_GUESTS_COUNT','%s госцяў');
DEFINE('_MEMBER_COUNT','%s карыстальнік');
DEFINE('_MEMBERS_COUNT','%s карыстальнікаў');
DEFINE('_ONLINE','');
DEFINE('_NONE','Няма наведвальнікаў у анлайн');	

/** modules/mod_banners */
DEFINE('_BANNER_ALT','Рэклама');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES','Няма малюнкаў');

/** modules/mod_stats.php */
DEFINE('_TIME_STAT','Час');
DEFINE('_MEMBERS_STAT','Карыстальнікаў');
DEFINE('_HITS_STAT','Наведванняў');
DEFINE('_NEWS_STAT','Навін');
DEFINE('_LINKS_STAT','Спасылак');
DEFINE('_VISITORS','Наведвальнікаў');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME','* Першы па спісе апублікаваны пункт гэтага меню [mainmenu] аўтаматычна становіцца `Галоўнай` старонкай сайта *');
DEFINE('_MAINMENU_DEL','* Вы не можаце `выдаліць` гэтае меню, паколькі яно неабходна для нармалёвага функцыянавання сайта *');
DEFINE('_MENU_GROUP','* Некаторыя тыпы меню ўваходзяць больш, чым у адну групу *');


/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', 'Новыя дадзеныя карыстальніка' );
DEFINE('_NEW_USER_MESSAGE', 'Дабрыдзень, %s


Вы былі зарэгістраваныя Адміністратарам на сайце %s.

Гэтае паведамленне ўтрымоўвае Вашы імя карыстальніка і пароль, для ўваходу на сайт %s:

Імя карыстальніка - %s
Пароль - %s


На гэтае паведамленне не трэба адказваць. Яно згенеравана робатам рассыланняў і адпраўленае толькі для інфармавання.');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', "Гэтае паведамленне з сайта '%s'

Паведамленне:
" );


/** includes/pdf.php */
DEFINE('_PDF_GENERATED','Створана:');
DEFINE('_PDF_POWERED','Працуе на Joostina! 1.2.1');
?>