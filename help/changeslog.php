<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! &ndash; свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
/* запрет прямого доступа */
defined('_VALID_MOS') or die();
?>
<div class="sysinfo">
<img src="<?php echo $mosConfig_live_site; ?>/help/i/joostina.png" alt="Joostina Changelog" style="float:right;" />
<p class="strong">upd. 01.01.12 &ndash; 01.05.12</p><ol>
<li>Изменен код скриптов установки скрипта (/installation/*.php, /installation/*.css).</li>
<li>Добавлена информация в *.sql файлы инсталятора.</li>
<li>Обновлен jQuery до версии 1.7.1.</li>
<li>Изменены имена плагинов jQuery к логике jquery.[plugin_name], данные изменения применены ко всем вызовам данных плагинов.</li>
<li>Изменен /includes/joostina.php &ndash; добавлена обработка html в notetext.</li>
<li>Оптимизация ORDER BY (в mysql вызов добавлена команда STRAIGHT_JOIN для JOIN-а таблиц в указанном порядке) [ http://habrahabr.ru/blogs/mysql/138163/ ].</li>
<li>Исправлено добавление пустой строки в /mambots/mosimage.php при выборе изображения из списка.</li>
<li>Расширен файл русской локализации &ndash; /language/russian.php.</li>
<li>Заменена функция работы со строками substr на mb_substr &ndash; небольшое ускорение работы.</li>
<li>в уведомления о добавлении материала указывается ссылка на сам материал</li>
<li>Исправлено отсутствие пробела в атрибутах ссылки, формируемой модулем mod_mainmenu</li>
<li>Исправлены неопределенные индексы $j_spaw_config['user_dir'] и $j_spaw_config['template'] в WISWIG редакторе Spaw </li>
<li>Исправлены ошибки, отображающиеся при php_flag display_errors On и php_flag display_startup_errors On<pre><code>Warning: Call-time pass-by-reference has been deprecated in \htdocs\sitepath\includes\Cache\Lite\Function.php on line n
Fatal error: Call to a member function add() on a non-object in \htdocs\sitepath\index.php on line n
Notice: Undefined offset: 1 in \htdocs\sitepath\modules\mod_mljoostinamenu.php on line n</code></pre></li>
<li>Создан новый шаблон для Joostina, доступен для выбора.</li>
<li>Убрана ссылка на &laquo;Статистика посещений страниц&raquo; из вкладки &laquo;Содержимое&raquo; &ndash; дубляж аналогичной ссылки вкладки &laquo;Сайт&raquo;.</li>
<li>Объеденены вкладки &laquo;Шаблоны сайта&raquo; и &laquo;Шаблоны админцентра&raquo;, убраны разделители, убран вызов ссылки &laquo;Установка шаблона админцентра&raquo; &ndash; выбор директории уже предопределен в .xml файле расширения.</li>
<li>Модифицирован шаблон админцентра joostfree.</li>
<li>Для компонента админцентра com_jwmmxtd подключен скрипт Litebox (модифицированный скрипт <a href="http://www.huddletogether.com/projects/lightbox/" title="Lightbox">Lightbox</a>). При клике на уменьшенном изображении создает динамический popup, показывающий полную картинку. [автор данной модификации &ndash; <a href="http://www.aether.ru/" title="Александр Шабуневич">Александр Шабуневич</a>]<ul><li>Весит 5.4 Кб (12.5 Кб оригинальный Lightbox). Контроль оформления вынесен в CSS.</li>
<li>Имеет возможность просматривать картинки, не закрывая окна. Не требует указания размеров &ndash; вычисляет автоматом.</li></ul></li>
<li>Небольшая доработка /includes/pageNavigation.php - &ndash; отображение ссылки на &laquo;следующие 10&raquo;/&laquo;предыдущие 10&raquo; осуществляеся лишь при числе страниц более 10, что является, на мой взгляд, логичным.</li>
<li>Исправлена ошибка<pre><code>Warning: preg_split() [function.preg-split]: No ending delimiter '=' found in \htdocs\sitepath\index2.php on line n</code></pre>отображающаяся при отправке на печать, произведена правка с заменой строки
<pre><code>$iso = preg_split('=', _ISO);</code></pre>на<pre><code>$iso = explode('=', _ISO);</code></pre></li>
<li>Добавлена &laquo;пасхалка&raquo; (тест для себя).</li>
</ol><p class="strong">upd. 10.09.11 &ndash; 31.12.11</p><ol>
<li>Изменение часовых зон в России, Белоруссии, Украине и Армении (постановление Правительства РФ от 31 августа 2011 г. №725 «<a href="http://www.government.ru/gov/results/16355/print/">О составе территорий, образующих каждую часовую зону, и порядке исчисления времени в часовых зонах, а также о признании утратившими силу отдельных постановлений Правительства Российской Федерации</a>», <a href="http://www.rg.ru/2011/09/06/chas-zona-dok.html">опубликовано</a> и вступило в силу 6 сентября 2011).</li>
<li>Исправлена ошибка с работой редактора spaw &ndash; не отображался текст при редактировании с front-end. BUGFIX редактора spaw до v.2.0.8.1: possilbe security issue fixed in file class/theme.class.php
</li>
<li>Исправлена ошибка с дублированием "charset=".</li>
<li>Добавлен шаблон-заглушка с таймером &ndash; обратный отсчет до предполагаемого времени запуска сайта.</li>
<li>Исправлена ошибка с отрисовыванием кнопок в расширениях.</li>
<li>Исправлена часть Notice/Warning при влкюченном php_flag display_errors и php_flag display_startup_errors.</li>
<li>В виду отсутствия конпок к редактору (папка /mambots/editors-xtd) закомментирован вызов загрузки данных мамботов<code><pre>$_MAMBOTS->loadBotGroup('editors-xtd');</pre></code></li>
<li>Исправлена ошибка с выделением текста в полях в браузере FireFox (back-end)</li>
</ol><p class="strong">upd. 18.09.11 &ndash; 05.10.11</p><ol>
<li>Мелкие правки кода</li>
<li>Joostina 1.2.1.4 Stabile</li>
</ol><p class="strong">upd. 31.07.11 &ndash; 17.09.11</p><ol>
<li>Доработал функцию header() для отправки заголовков.</li>
<li>Дополнен /language/russian.ignore.php.</li>
<li>Изменен шаблон авторизации в back-end. Добавлены необходимые стили.</li>
<li>Изменен логика отдачи DOCTYPE. Его вызов в шаблоне осуществляется по HTTP_USER_AGENT<pre><code>if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
echo '&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;
&lt;?xml version="1.0" encoding="' . $iso[1] . '"?' . '&gt;';
} else {
echo '&lt;!DOCTYPE html&gt;';
}</code></pre></li>
<li>Изменен логика вывода favicon для IE &ndash; отдача также по HTTP_USER_AGENT (см. логику кода выше).</li>
<li>Изменен логика отдачи файла каскадного стиля с хаками для IE &ndash; отдача также по HTTP_USER_AGENT (см. логику кода выше).</li>
<li>Постепенное избавление от табличной верстки вывода стандартных расширений продолжается.<ol>
<li>Изменена логика вывода описания и изображения категории/раздела содержимого (статьи) в компоненте /components/com_content. Добавлены необходимые стили.</li>
<li>Изменена логика вывода авторизации в компоненте /components/com_login. Добавлены необходимые стили.</li>
<li>Изменена логика вывода пользовательских данных в компоненте /components/com_user. Добавлены необходимые стили.</li>
<li>Изменена логика вывода постраничной навигации (.pagenav_next, .pagenav_prev) в компоненте /components/com_content &ndash; из таблицы выведены в список, добавлены стили, языковые переменные дополнены необходимыми данными.</li>
<li>Изменена логика вывода иконок pdf/print/email/edit в компоненте /components/com_content, /components/com_contact и /includes/joomla.php &ndash; с табличного перенесено в слои. Изменена логика вывода заголовка содержимого (статьи/контакта). Добавлены необходимые стили.</li>
<li>Изменена логика вывода названия категории/раздела, автора, дат создания/модификации содержимого (статьи) в компоненте /components/com_content. Добавлен вывод аватара (добавлена функция создания microavatar) перед именем автора содержимого в блоге и в табличном выводе (по мотивам хака <a href="http://joomla-support.ru/showthread.php?t=5527">Fanamura</a>). При клике всплывает (в lightbox) полноразмерный аватар. Добавлены необходимые стили.</li>
<li><strong>upd.</strong> Изменена логика вывода автора, дат создания/модификации содержимого (статьи), аватара в компоненте /components/com_content. Перенесен под статью. Добавлены необходимые стили.</li>
<li>Изменена логика вывода баннера в компоненте /components/com_banners. Добавлены необходимые стили.</li>
<li>Доработан мамбот mambots/content/joostinasocialbot. Добавлены необходимые стили.</li>
<li>Доработан мамбот mambots/content/joostinatags. Добавлены необходимые стили.</li>
<li>Доработан мамбот mambots/content/plugin_jw_ajaxvote. Добавлены необходимые стили.</li>
</ol></li>
<li>Доработка функционала back-end части cms продолжается.<ol>
<li>Компонент administrator/com_config доработан для осуществления опционального включения в код шаблона скрипта отслеживания Google Analitics (YES/NO RadioButton + input textarea). Для осуществления вышеуказанной опции еще в процессе установки системы доработаны инсталляционные файлы скрипта, генерирующие файл configuration.php.</li>
<li>Компонент administrator/com_config доработан для осуществления опционального включения в код шаблона скрипта отслеживания Яндекс.Метрика (YES/NO RadioButton + input textarea). Для осуществления вышеуказанной опции еще в процессе установки системы доработаны инсталляционные файлы скрипта, генерирующие файл configuration.php.</li>
<li>Dublin Core Metadata Element Set (DCMES)<pre><code>&lt;meta name="DC.Title" content="title" /&gt; /*сделано*/
&lt;meta name="DC.Rights" content="Rights" /&gt; /*сделано*/</code></pre></li>
<li>Компонент administrator/com_content доработан для осуществления вывода фильтра по Разделу/Категории/Автору (так же, как было в версиях до 1.2.0).</li></ol></li>
<li>Откровенно положил на IE &ndash; замучился прикручивать костыли. Если кто поможет исправить &ndash; буду только рад.</li>
<li>Временно отказался от joostinaopenid &ndash; вынесен из скрипта и инстяляционных файлов, модуль авторизации также поправлен.</li>
<li>Ограничил количество используемых плагинов jQuery &ndash; многое решено через css.</li>
</ol><p class="strong">upd. 06.07.11 &ndash; 30.07.11</p><ol>
<li>Обновлена библиотека jQuery до v.1.6.2. Проверена работоспособность плагинов.</li>
<li>Отказ от плагина jQuery textareacounter в форме отпраки сообщения компонента com_contact.</li>
<li>Отказ от плагина jQuery corner для загрузки по умолчанию. Генерация скругленных углов решена добавлением в классы свойства border-radius (css3) для углов (изменен вывод меню в позиции top и left), изменен код шаблона. Его вызов в шаблоне прицельно ориентирован лишь на пользователей, с $_SERVER['HTTP_USER_AGENT'] &ndash; MSIE (определение браузера осуществляется на php).</li>
<li>Компонент administrator/com_config доработан для осуществления переосмысленой логики вывода favicon. Сформированы переменные для загрузки разного типа иконок для разных девайсов<pre><code>/* Для нормальных браузеров */
&lt;link rel="icon" type="image/png" href="images/favicon.png" /&gt; /*сделано*/
/* Для IE */
&lt;!--[if IE]&gt;&lt;link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /&gt;&lt;![endif]--&gt; /*сделано*/
/* Для iДевайсов */
&lt;link rel="apple-touch-icon" href="apple-touch-icon.png" /&gt; /*сделано*/
</code></pre>Для осуществления вышеуказанной опции еще в процессе установки системы доработаны инсталляционные файлы скрипта, генерирующие файл configuration.php. Добавлены необходимые поля, требуемые переменные в языковой файл, добавлены соответствующие графические файлы.</li>
<li>Доработка функционала back-end части cms продолжается.<ol>
<li>Компонент administrator/com_config доработан для осуществления опционального включения в head <a href="http://en.wikipedia.org/wiki/Geotagging">Geotagging</a> и <a href="http://en.wikipedia.org/wiki/ICBM_address">ICBM</a> через back-end-а скрипта.<pre><code>/* абстрактный пример */
&lt;meta name="ICBM" content="50.167958,-97.133185" /&gt; /*сделано*/
&lt;meta name="geo.position" content="50.167958;-97.133185" /&gt; /*сделано*/
&lt;meta name="geo.placename" content="Rockwood Rural Municipality, Manitoba, Canada" /&gt; /*сделано*/
&lt;meta name="geo.region" content="ca-mb" /&gt; /*сделано*/
</code></pre>Для осуществления вышеуказанной опции еще в процессе установки системы доработаны инсталляционные файлы скрипта, генерирующие файл configuration.php. Добавлены необходимые поля, требуемые переменные в языковой файл. <strong>доделать!</strong></li>
<li>Компонент administrator/com_config доработан для осуществления опционального включения в head <a href ="http://dublincore.org/documents/usageguide/elements.shtml">Dublin Core Metadata Element Set (DCMES)</a> через back-end-а скрипта.<pre><code>/* абстрактный пример */
&lt;link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" /&gt; /*сделано*/
&lt;meta name="DC.Title" content="title" /&gt; /*не сделано */
&lt;meta name="DC.Creator" content="creator" /&gt; /*не сделано*/
&lt;meta name="DC.Subject" content="subject" /&gt; /*не сделано*/
&lt;meta name="DC.Description" content="Description?" /&gt; /*сделано*/
&lt;meta name="DC.Publisher" content="Publisher" /&gt; /*не сделано*/
&lt;meta name="DC.Contributor" content="Contributor" /&gt; /*не сделано*/
&lt;meta name="DC.Date" content="Date" /&gt; /*сделано, но показывает дату просмотра, а не создания*/
&lt;meta name="DC.Type" content="Type" /&gt; /*сделано, тип указан жестко*/
&lt;meta name="DC.Format" content="Format" /&gt; /*не сделано*/
&lt;meta name="DC.Identifier" content="Identifier" /&gt; /*не сделано*/
&lt;meta name="DC.Source" content="Source" /&gt; /*не сделано*/
&lt;meta name="DC.Language" content="Language" /&gt; /*сделано, язык указан жестко*/
&lt;meta name="DC.Relation" content="Relation" /&gt; /*не сделано*/
&lt;meta name="DC.Coverage" content="Coverage" /&gt; /*не сделано*/
&lt;meta name="DC.Rights" content="Rights" /&gt; /*не сделано*/
</code></pre>Для осуществления вышеуказанной опции еще в процессе установки системы доработаны инсталляционные файлы скрипта, генерирующие файл configuration.php.Добавлены необходимые поля, требуемые переменные в языковой файл. <strong>доделать!</strong></li>
</ol></li>
<li>Доработка компонентов<ol>
<li>Компонент com_contact частично переписан &ndash; изменена (где возможна) табличная структура вывода на списочный и вывод слоями. Добавлены необходимые стили.</li>
<li>В компоненте com_contact настроенна нормальная отдача информации в формате vCard.</li>
<li>В компоненте com_contact восстановлена работа всплывающего окна авторизации (отфильтровано перекрытие DOM jQuery).</li>
<li>Компонент com_registration частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Компонент com_search частично переписан &ndash; изменена структура оформления стилей, логика вывода информации. Добавлены необходимые стили.</li>
<li>Компонент com_joostinapdf &ndash; поправлена грамматическая ошибка в шаблоне *.pdf файла.</li>
</ol></li>
<li>Доработка модулей<ol>
<li>Модуль mod_search частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_ml_login частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_stats частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_weblinkspercat частично переписан &ndash; изменена (где возможна) табличная структура вывода на списочный и вывод слоями. Добавлены необходимые стили.</li>
<li>Модуль mod_poll частично переписан &ndash; изменена (где возможна) табличная структура вывода на списочный и вывод слоями. Добавлены необходимые стили.</li>
<li>Модуль mod_archive частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_section частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_latestnews частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
<li>Модуль mod_related_items частично переписан &ndash; изменена структура оформления стилей. Добавлены необходимые стили.</li>
</ol></li>
<li>Замена в коде скрипта конструкций с<pre><code>&lt;button ...&gt; &lt;/button&gt;</code></pre>на
<pre><code>&lt;input ... /&gt;</code></pre></li>
<li>ToDo &ndash; перебрать код на предмет поиска ненужных и неиспользуемых элементов, дописать комментарии в доработанных/дополненных/удаленных участках.</li>
<li>ToDo &ndash; нормализовать отображение сайта в IE.</li>
</ol><p class="strong">upd. 05.06.11 &ndash; 05.07.11</p><ol>
<li>Joostina-слет 2011, лето, отпуск...</li>
</ol><p class="strong">upd. 11.05.11 &ndash; 04.06.11</p><ol>
<li>Joostina 1.2.1.3.</li>
<li>Доработка стилей расширений ядра Joostina.</li>
<li>Попытка задействовать lessphp и php-typography (в работе).</li>
<li>Восстановлена генерация pdf-файла из содержимого сайта. Необходимое расширение (форк) включено в стандартную сборку. В его основе <a href="http://www.joomlatwork.com">JoomlaPrettyPDF</a> v.1.6.9 (от 05.06.2007) от  с дополнительным набором кириллических шрифтов и <a href="http://www.fpdf.org">FPDF</a> v.1.1, обновленый до версии 1.6 (от 2008-08-03, автор &ndash; Olivier Plathey). Проведена локализация расширения. Также оно будет доступно в виде отдельного компонента. В настоящее время имеются проблемы с генерацией pdf из содержимого, включающего себя изображения с &alpha;-каналом (вариация *.png) &ndash; в процессе правки.</li>
<li>Исправлена ошибка с WYSIWYG-редактором Spaw &ndash; невозможность работать в поле для introtext. Причина в порядке вызова плагина jQuery formalize &ndash; установлен последним в списке загрузки.</li>
<li>Изменен файл /help/copyright.php (вкладка &laquo;О Joostina&raquo; раздела &laquo;Инструменты&raquo;&rarr;&laquo;Информация о системе&raquo; back-end-а).</li>
<li>Добавлено стилевых &laquo;фишек&raquo; для вывода количества просмотров материала в модуле &laquo;Популярное&raquo; (mod_mostread).</li>
<li>Вместо кода reset.css подключен <a href="https://github.com/jonathantneal/normalize.css">Jonathan Neal's normalize.css</a>. Убран из загрузки плагин jQuery formalize.</li>
</ol><p class="strong">upd. 25.04.11 &ndash; 10.05.11</p><ol>
<li>Joostina 1.2.1.2.</li>
<li>Обновлена библиотека jQuery до v.1.6. Проверена работоспособность плагинов.</li>
<li>Добавлен &laquo;нежный посыл&raquo; регистрирующихся спаммеров в... Доработан /components/com_registration/registration.php.</li>
<li>Добавлен плагин jQuery AutoClear &ndash; авто очистка поля ввода. Размещен в /includes/js/jquery/plugins. Подключать по желанию (требуется коррекция задействованных полей в вызываемых скриптах). Стиль для плагина добавлен в стилевой файл. Реализация от <a href="http://joomla-book.ru/">http://joomla-book.ru/</a></li>
<li>Небольшая модификация стилей для &laquo;Последние новости&raquo; и &laquo;Популярное&raquo;.</li>
</ol><p class="strong">upd. 31.03.2011 &ndash; 20.04.2011</p><ol>
<li>Вызовы:<pre><code>/* иконка для iPad/iPhon */
&lt;link rel="apple-touch-icon" href="&lt;?php echo $mosConfig_live_site;?&gt;/templates/&lt;?php echo $mainframe->getTemplate();?&gt;/
apple-touch-icon.png" /&gt;
/* явное указание кодировки и языка сайта */
&lt;meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /&gt;
&lt;meta http-equiv="Content-Language" content="ru" /&gt;
/* отключение тулбара у изображения при просмотре в браузере IE */
&lt;!--[if IE]&gt;&lt;meta http-equiv="imagetoolbar" content="no" /&gt;&lt;![endif]--&gt;</code></pre>вынесены в /includes/frontend.php.</li>
<li>Вызов <pre><code>&lt;meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /&gt;</code></pre> удален из шаблона &ndash; теперь он предопределяется в htaccess.</li>
<li>В русском языковом файле заменил в необходимых местах Joomla! на Joostina.</li>
<li>Обновлена библиотека jQuery до v.1.5.2.</li>
<li>Отключен плагин jQuery dPassword &ndash; невозможность регистрации с front-end сайта.</li>
<li>Подключен плагин jQuery Preloader &ndash; предзагрузка изображений со стилем. Размещен в /includes/js/jquery/plugins. Стиль для плагина добавлен в стилевой файл.</li>
<li>Изменен код мамботов тэгов и социальных закладок, дополнена русская локализация.</li>
<li>Доработан стилевой файл &ndash; укорочены и переименованы некоторые стили.</li>
<li>В back-end (компонент com_config) вынесен просмотр файла .htaccess.</li>
<li>Проблема с генерацией страницы на печать &ndash; работоспособность восстановлена.</li>
<li>Проблема с генерацией страницы на e-mail &ndash; работоспособность восстановлена.</li>
<li>В функции mosShowHead() файла includes/frontend.php, строка 261 изменена генерация meta name=&laquo;Generator&raquo; с<pre><code>$mainframe->addMetaTag('Generator', $_VERSION->PRODUCT . ' &ndash; ' . $_VERSION->COPYRIGHT);</code></pre>на<pre><code>$mainframe->addMetaTag('Generator', $mosConfig_sitename);</code></pre>т.е. теперь генерируется строка типа <pre><code>&lt;meta name="Generator" content="Имя сайта" /&gt;</code></pre>. Прежний вариант закомментирован.</li>
<li>Возвращена опция генерации pdf файла, определены и подключены вызовы, попытка добиться нормальной кодировки в сгенерированном файле &ndash; в планах подключение для выполнения данной функции библиотеки tcPDF (как один из вариантов реализации).</li>
<li>В WYSIWYG-редакторе Spaw:
	- подключен плагин &laquo;VarInsert&raquo; (Предназначен для одновременного использования  PHPMailer-ML и SPAW Editor v.2. Организует генерацию e-mail рассылки &ndash; опции создания сообщения. Для использования требуется файл &laquo;inc.campaigns.php&raquo; для PHPMailer-ML.).</li>
</ol><p class="strong">upd. 30.01.2011 &ndash; 15.03.2011</p><ol>
<li>Joostina 1.2.1.1. [alpha 1]</li>
<li>Доработка kcaptcha &ndash; добавление шрифтов, увеличение амплитуды, снижение качества генерируемого скриптом изображения.</li>
<li>Поправлены недочеты, выявленные пользователями <a href="http://www.joomlaforum.ru">joomlaforum.ru</a>:
	- &laquo;резина&raquo; в шаблоне административной панели, несколько изменен шаблон back-end &ndash; joostfree: поправлены и дописаны стили, добавлено &laquo;красивостей&raquo;, в том числе и в файлы /help/changelog.php и /help/copyright.php.;
	- сбой вывода списка настраиваемых параметров для пункта меню &laquo;Главная&raquo; в установке по умолчанию;
	- форматирование style.css шаблона для удобства чтения и модификации, небольшая его оптимизация с рефракторингом кода в используемых скриптах, возвращены комментарии в style.css, переверстан сам стилевой файл, добавлены ряд стилей, вынесены в глобальные предопределения все input/textarea/select/button/etc, в дальнейшем в стили добавлялись лишь различия от определения по-умолчанию, добавлены суффиксы для стилей модулей в sql запрос при установке и в xml/php файлы расширений (где подобное не было прописано), файл прогнан через CSScomb для WebStorm (нормализация css);
	- изменены опции формирвания и отображения элементов input, select, textarea, label, fieldset, option, optgroup, button &ndash; для этого подключен и задействован jQuery плагин formalize;
	- изменены стилевые файлы шаблона front-  и  back-end &ndash; стили данных элементов глобализированы, дополнительно произведенена уникализация отдельных стилей для элементов, согласно дизайна шаблона;
	- добавлены в общий стилевой файл опции прозрачности изображений для IE8. Идея и решение <a href="http://css-tricks.com/snippets/css/cross-browser-opacity/">Cross Browser Opacity</a>;
	- label и input/select слинкованы в найденных местах кода, возможно, затронуты не все точки вызова (<a href="http://www.habrahabr.ru">habrahabr.ru</a>);
	- исправлена форма авторизации в back-end (login.php), поправлены стили (admin_login.css).
	- смена атрибута<pre><code>input</code></pre>с<pre><code>type=[text]</code></pre>на<pre><code>type=[email]</code></pre>в /components/com_contact/contact.html.php и /components/com_user/user.html.php для браузеров, поддерживающих HTML5, остальные (даже IE6) воспримут неизвестный атрибут<pre><code>type</code></pre>как<pre><code>type=[text]</code></pre>
	- поправлено оформление знака охраны авторского права в /includes/version.php в соответствии с <a href="http://www.ifap.ru/library/gost/7012003.pdf">ГОСТ Р 7.0.1—2003</a>;
	- логотип на внутренних страницах ведет на титульную. На титульной странице logo &ndash; это div с h1, на внутренних h1 это заголовок контента, а logo это ссылка (рабочий код с http://www.hospsurg.ru, теоретическое подтверждение &ndash; <a href="http://www.habrahabr.ru">habrahabr.ru</a>).</li>
<li>Исправлена ошибка формирования даты (публикация/обновления) в front-end, в /language/russian.php исправлена переменная массива<pre><code>$mon</code></pre>на<pre><code>$month_date</code></pre>Добиться нормализации отдачи русских названий месяцев на настоящее время не удалось &ndash; изменен вызов с<pre><code>' . $m . '</code></pre>на<pre><code>%m</code></pre>
(отображение месяца в цифровом формате &ndash; март=03). Ведутся работы по восстановлению возможностей отображения реального месяца создания/модификации в прежнем виде.</li>
<li>Исправлена ошибка в back-end &ndash; отсутствовал вывод списка разделов/категорий при просмотре содержимого com_content.</li>
<li>Обновлена библиотека jQuery до v.1.5.1.</li>
<li>Для медиа менеджера (/administrator/components/com_jwmmxtd) подключен скрипт плагина jQuery MultiFile. Размещен в /includes/js/jquery/plugins.</li>
<li>Фиксирована ошибка, возникающая при работе /includes/js/jquery/plugins/corner.js в IE.</li>
<li>htaccess настроен под Apache 2.2.16, закомментированы строки для модулей, не активированных при установке скрипта по умолчанию. Дополнительно возвращены правила для Apache 1.* (закомментированы) &ndash; если у вас эта версия &ndash; расскомментируйте, закомментировав правила для Apache 2.</li>
<li>В шаблоне NewLine изменено:
	- добавлена поддержка XFN (XHTML Friends Network — микроформат для пометки социальных взаимоотношений) -
добавлен атрибут в тэг head -<pre><code>profile="http://gmpg.org/xfn/11"</code></pre>
	- в папку js добавлена библиотека <a href="http://www.modernizr.com/">Modernizr v1.6</a> (Modernizr &mdash; микро-библиотека для задействования на сайте возможностей HTML5 &amp; CSS3). Для подключения добавте в index.php шаблона следующую строку <strong>перед</strong> вызовом скрипта Jquery:<pre><code>&lt;script type="text/javascript" src="&lt;?php echo $mosConfig_live_site; ?&gt;/templates/&lt;?php echo $mainframe->getTemplate(); ?&gt;/js/
modernizr.js"&gt;&lt;/script&gt;</code></pre>
	- в index.php перед &lt;/body&gt; добавлен код асинхронного вызова Google Analytics, данный способ размещения кода позволяет отслеживать статистику для всех страниц сайта. Для подключения измените UA-XXXXX-X на ID Вашего сайта (Вы должны быть зарегистрированы в данном сервисе).</li>
</ol><p class="strong">upd. 28.12.2010 &ndash; 28.01.2011</p><ol>
<li>Модификация постраничной навигации. Определение и внедрение стилей, коррекция кода /includes/pageNavigation.php.</li>
<li>Исправление XSS обнаруженной mustlive@websecurity.com.ua в файле /components/com_search/search.html.php.</li>
<li>Форматирование кода для удобства его чтения и редактирования.</li>
<li>Добавлены флаги gzip для js/css, добавлены htassess в целевые папки.</li>
<li>Изменен htassess.</li>
<li>Добавлена функция редактирования статей с front-end только автором. Права на редактирование чужих пользователями групп &laquo;Manager&raquo;, &laquo;Administrator&raquo;, &laquo;Super Administrator&raquo; сохраняются.</li>
<li>Обновлена библиотека jQuery до 1.4.4.</li>
<li>Изменена структура формирования вывода расширения com_content, добавлены стили в css.</li>
<li>Изменена структура создания элемента button &ndash; все оформление вынесено в css (использованы элементы css3). Сами &laquo;плашки&raquo; кнопок оставлены в папке /images/buttons шаблона, имена изменены для быстрого поиска плашек нужного размера.</li>
<li>Добавлен метатэг для ликвидации тулбара, появляющегося над картинками в IE6 (внесено в дефолтный шаблон). Идея <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>Убрано правило<pre><code>text-rendering: optimizeLegibility;</code></pre>ломает капители (small-caps) и странно выглядит в *nix. Идея <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>В файл /includes/joomla.php добавлена возможность загрузки jQuery с CDN (ajax.googleapis.com/ajax/libs/jquery/1.5.1/), а при отсутствии соединения с интернетом (создание сайта на локальном компьютере) &ndash; загрузка локальной копии скрипта (по пути /includes/js/jquery/jquery.js). Идея <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>. При желании осуществлять загрузку данной библиотеки именно с googleapis.com проведите следующие действия с файлом /includes/joomla.php:
1) расскомментируйте следующую строку:<pre><code>$mainframe->addJS('//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js');</code></pre>
2) закомментируйте следующую строку:<pre><code>$mainframe->addJS($mosConfig_live_site . '/includes/js/jquery/jquery.js');</code></pre></li>
<li>Решение проблемы с фильтром поиска по содержимому в административной панели. Решение проблемы с неправильным указанием sectionid ссылки на категории.</li>
<li>Для пробы убрано хранение значения поля &laquo;фильтр&raquo; в сессии отдельно для каждого значения sectionid.</li>
<li>Небольшая оптимизация PHP-кода (по материалам <a href="http://www.habrahabr.ru">habrahabr.ru</a>, <a href="http://www.reinholdweber.com">reinholdweber.com</a>, <a href="http://www.insight-it.ru">insight-it.ru</a>). Для теста проведена оптимизация некоторых участков различных скриптов кода. Эффективность контролировалась по времени выполнения скрипта (синтетические тесты).</li>
<table>
<tr><td><strong>Что меняли</strong></td><td><strong>На что меняли</strong></td><td><strong>Процент затронутых файлов</strong></td></tr>
<tr><td><pre><code>echo "a"</code></pre></td><td><pre><code>echo 'a'</code></pre></td><td>около 20%</td></tr>
<tr><td><pre><code>is_null($var)</code></pre></td><td><pre><code>null === $var</code></pre></td><td>пробно &ndash; в 4-5%</td></tr>
<tr><td><pre><code>$++ / $--</code></pre></td><td><pre><code>++$ / --$</code></pre></td><td>около 100%/пробно &ndash; в 2-3%</td></tr>
<tr><td><pre><code>time()</code></pre></td><td><pre><code>$_SERVER['REQUEST_TIME']</code></pre></td><td>около 80-90%</td></tr>
</table>
<li>Добавлен недостающий файл wz_tooltip.js по пути /includes/js/ (запрос в /includes/parTemplate/tmpl/page.html).</li>
<li>Добавлен недостающий файл calendar-setup по пути /includes/js/calendar/ (запрос в /includes/parTemplate/tmpl/calendar.html).</li>
<li>Добавлена папка со скриптом jscalendar-1.0 (запрос в /includes/parTemplate/tmpl/calendar.html) &ndash; полноценно не подключал.
P.S. по пп. 18, 17 &ndash; не настроен css для публикации материала через front-end (в back-end работает должным образом).</li>
</ol><p class="strong">upd. 25-27.12.2010</p><ol>
<li>Доработка украинского языкового файла локализации Joostina (отдельное спасибо автору локализации Kovalchuk Vitaliy), решение проблемы с отсутствующим меню в административной панели, ошибках в js, коррекция символов<pre><code>\', `, \\\'</code></pre>(удаление из локализации), к сожалению, нарушились правила написания украинских слов, ищется решение проблемы.</li>
<li>Правка mod_mainmenu.php &ndash; &laquo;лечение&raquo; дублирования Itemid в ссылке при повторном вызове модуля.</li>
<li>Правка орфографии в changeslog_joostina_120v2.</li>
</ol><p class="strong">upd. 22.12.2010</p><ol>
<li>Joostina 1.2.1 Stable</li>
</ol><p class="strong">upd. 01-21.12.2010</p><ol>
<li>Доработка style.css &ndash; добавлены новые классы, оптимизация стилевого файла для лучшей его визуализации (модули к модулям, компоненты к компонентам и т.д.).</li>
<li>Рефракторинг кода на предмет смены вызова старого template_css.css на новый файл стилей &ndash; style.css.</li>
<li>Небольшая косметическая правка расширений.</li>
<li>Правка комментариев в коде скрипта &ndash; удалены те, где наличие комментариев не нужно, добавлены новые в необходимых местах.</li>
<li>Замета тегов &lt;i&gt;, &lt;b&gt; на&gt; &lt;em и &lt;strong&gt; соответственно в реализуемых через front-end расширениях.</li>
<li>Changeslog выводится через back-end в табах (по аналогии с copyright.php).</li>
<li>Добавлен модуль mod_downloadjoostina &ndash; загрузка последних версий cms с googlecode.com. Его стили прописаны в основном файле style.css, графика помещена в папку /modules/mod_downloadjoostina.</li>
<li>Несколько упрощен robots.txt</li>
<li>Смена $ на jQuery в вызовах скриптов &ndash; борьба с ошибками в IE.</li>
<li>Настроен подробный вывод информации об общем времени генерации страницы, времени выполнения каждого запроса, в каком файле данный запрос генерируется (в режиме отладки сайта, виден только пользователю типа Super Administrator).</li>
<li>В файл htaccess добавлены правила для блокировки &laquo;плохи ботов&raquo; по user-Agent.</li>
<li>Добавлена опция активации кэширования в большинство модулей.</li>
<li>Добавлена возможность определения суффикса класса модуля для большинства модулей.</li>
<li>Небольшая доработка mod_ml_login &ndash; стили вынес в style.css.</li>
<li>Небольшая доработка /includes/vcard.class.php.</li>
<li>Небольшая доработка мамбота joostinasocialbot &ndash; изменение характера перекодировки заголовка статьи.</li>
<li>Рефракторинг кода WYSIWIG-редактора Spaw &ndash; удаление вызова дублирующихся изображений.</li>
<li>Настройка htaccess для отдачи карты сайта.</li>
<li>Добавлен в стандартную поставку мамбот joostinatag &ndash; отображение ключевых слов под статьей в режиме полного просмотра. Добавлены стили для расширения, вынесены в style.css.</li>
</ol><p class="strong">upd. 14-30.11.2010</p><ol>
<li>Удален WYSIWYG-редактор JCE, а также и btn-мамботы для него. Оставлен единственный WYSIWYG-редактор Spaw.</li>
<li>В WYSIWYG-редакторе Spaw &laquo;подпилено&raquo;:
	- изменены права админов в режиме &laquo;индивидуальные папки&raquo;;
	- подключен плагин вставки файла attache &ndash; кнопка &laquo;Вставить файл&raquo;;
	- подключен плагин вставки видео-файла youtube &ndash; кнопка &laquo;Клип YouTube&raquo;;
	- подключен плагин очистки кода cleanpaste &ndash; кнопка &laquo;Чистка HTML&raquo; (работает в IE). Осуществляется очистка кода по основным регулярным выражениям, характерным для MS Word;
	- подключен плагин custombutton &ndash; создание своей кнопки;
	- подключен плагин iespell &ndash; проверка орфографии (работает в IE);
	- подключен плагин imgpopup &ndash; ссылка, при клике на которую изображение выводится в popup;
	- подключен плагин inserthtml &ndash; вставка html кода;
	- подключен плагин yahooMaps &ndash; вставка ссылки на Yahoomap (планируется переписать на Google);
	- подключен плагин zoom &ndash; увеличение масштаба рабочего поля в редакторе (работает в IE).</li>
<li>Поправлена ошибка при отправке новостей с front-end сайта &ndash; ошибка обработки функций кнопок &laquo;Сохранить&raquo; и &laquo;Применить&raquo;.</li>
</ol><p class="strong">upd. 01-13.11.2010</p><ol>
<li>Подключена авторизация OpenID (версия 2.1.3 php-OpenID libraries by JanRain, Inc.). Доработка расширения для Joostina! CMS, рефракторинг кода, внедрение вызовов авторизации OpenID в модуль mod_ml_login, руссификация.</li>
<li>Поправлена ошибка в вызове модуля mod_mostread, реализующаяся генерацией ошибочного вызова стиля модуля (вида
<pre><code>&lt;class=" class="mostread""&gt;)</code></pre></li>
</ol><p class="strong">upd. 15-30.10.2010</p><ol>
<li>Добавлены jQuery плагины: 
	- dPassword &ndash; плагин скрытия/открытия символов пароля &ndash; aka iPad, настроена работа с формой авторизации на front-end сайта;
	- pngFix &ndash; подключать по требованию;
	- textarearesizer &ndash; плагин изменения размера поля textarea, подключать по требованию;
	- tablednd &ndash; плагин для сортировки ячеек таблиц, перетаскивая их мышью, подключать по требованию;
	- mop-tip &ndash; плагин всплывающих подсказок, подключать по требованию.</li>
<li>В папке /help для плагинов jQuery созданы man-файлы с описанием возможностей и синтаксиса подключения (<a href="<?php echo $mosConfig_live_site; ?>/help/dPassword.txt" target="_blank">dPassword</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/mop-tip.txt" target="_blank">mop-tip</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textareacounter.txt" target="_blank">textareacounter</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textarearesizer.txt" target="_blank">textarearesizer</a>).</li>
<li>В папке с плагинами jQuery для плагинов добавлены файлы графики, стилевые файлы (где имеется такая необходимость).</li>
</ol><p class="strong">upd. 09-10.2010</p><ol>
<li>Joostina 1.2.1 prestable</li>
<li>Добавлено расширение для упрощения генерации мета описаний (com_jmn), вынесены языковые переменные, добавлен английский языковой файл.</li>
<li>Пополнение английской локализации, корректировка перевода (отдельная благодарность Dean).</li>
<li>Решена проблема со смещением вправо звезд рейтинга при выводе мамбота (правка css).</li>
<li>Максимально изменена генерация http-заголовков для нормализации отдачи Expires и Last-Modified (для разных типов файлов), экранирован вызов Cache-Control и Pragma.</li>
<li>Из страницы, сгенерированной для печати, удален вызов социальных закладок.</li>
<li>Возвращен в папку /includes/js/calendar calendar-mini.js v.0.9.2 (проблема со всплывающим окном в новой версии скрипта).</li>
<li>Поправлен файл htaccess &ndash; удалено ненужное, внесены четкие комментарии по использованию.</li>
<li>Произведена коррекция пакета установки (/installation) &ndash; поправлен вывод, вынесены языковые переменные, сформирован русский языковой файл, осуществляется создание английской версии перевода, подготовлен к подключению возможности выбора языка установки (в процессе доработки).</li>
<li>Добавлен плагин jQuery textareacounter (внесен в папку /includes/js/jquery/plugins/, оптимизирован) &ndash; подсчет символов/слов при наборе текста в контактной форме, подключен к компоненту "Контакты" (поля contact_name, contact_email, contact_subject и contact_text), стилевой файл шаблона дополнен необходимыми стилями для вывода счетчика знаков/слов. Настроен подсчет слов, набранных кириллицей.</li>
<li>Добавлена работа с параметром disabled.</li>
<li>Изменена обработка GET-параметров в URL.</li>
</ol><p class="strong">upd. 03-11.09.10</p><ol>
<li>Фиксирована ошибка с невозможностью добавить нового пользователя на сайт через &laquo;Панель администратора&raquo; (в т.ч. и в группу &laquo;Super Administrator&raquo;) и отсутствия его отображения во вкладке &laquo;Пользователи&raquo;.</li>
<li>Фиксирована ошибка с отсутствующей кнопкой &laquo;Редактировать&raquo; у пользователей группы &laquo;Publisher&raquo; при работе с содержимым с front-end сайта.</li>
<li>Фиксирована ошибка с невозможностью просмотра профиля пользователя после авторизации во вкладке &laquo;Личные данные&raquo; (index.php?option=com_user&amp;task=UserDetails).</li>
<li>Фиксирована ошибка с отсутствующей кнопкой &laquo;Редактировать&raquo; при работе с содержимым сайта, когда выбрана в настройках данного пункта меню опция &laquo;Заголовки объектов &ndash; скрыть&raquo;.</li>
<li>Проверен весь выводимый код расширений в поставке по умолчанию на предмет замены & на <code>&amp;</code> в объектах, для которых, по мнению W3C, это критично при валидации html кода.</li>
<li>В css:
	- Доработан css код шаблона NewLine.
	- Дополнен reset.css, base.css, tempate_css.css рядом функций, как для модулей, так и для компонентов.
	- Xmap.css внесен в основной стилевой файл.
	- Включена опция автоматической подстановки иконки для некоторого типа файлов, внешних ссылок, исключен &laquo;родной сайт&raquo; + http://www.joostina.ru, ссылки на валидаторы, баннеры, графики дополнительных поисковых систем в com_search (sic: для модификации смотрите комментарии в css файле!).
	- Добавлена прозрачность для графики валидаторов шаблона и дополнительных поисковых систем в com_search.</li>
<li>Добавлены атрибуты alt, title в коде вызова соответствующих объектов ряда расширений в поставке по умолчанию.</li>
<li>Добавлен второй WISWIG редактор Spaw v.2.0.8-j14. Удален для нормальной работы spaw файл htaccess из папки /cache.</li>
<li>Добавлен украинский язык для части front-end &ndash; языковой файл от Joomla 1.0.14.</li>
<li>Время генерации страницы видно только пользователю со статусом Super Administrator.</li>
<li>Переведены с table/tr/td на div front-end части расширений в поставке по умолчанию:
com_search (весь), com_registration (весь), com_weblinks (частично), com_newsfeeds (частично), com_content (частично).</li>
<li>Обновлены скрипты в папке /includes/js/ в поставке по умолчанию:
	- JSCookMenu с v.1.4.3 до v.2.0.4,
	- fullajax.js с v.1.0.3 build 1 до v.1.0.4 build 8;
	- upload.fullajax.js с v.1.0.3 build 1 (upload) до v.1.0.4 build 8 (upload);
	- dax.fullajax.js с v1.0.3 build 1 (dax) до v1.0.4 build 8 (dax),
	- calendar-mini.js с v.0.9.2 до v.1.0.</li>
<li>Смена части изображений для действий на более удачные версии.</li>
<li>Изменен вызов для отдачи корректных http-заголовков в корневых index.php/index2.php (bay, mambo!).</li>
<li>Дополнен htaccess:
- настроена отдача корректных ETags,
- настроена отдача корректных Expires headers (будет работать при включенном mod_headers.c).</li>
<li>Из /components/com_poll/poll_bars.css стили вынесены в базовый css файл (нормализация отображения графика при активации SEF, его вызов в poll.html.php закомментирован).</li>
<li>Изменен вызов css/js файлов в расширении plugin_jw_ajaxvote &ndash; вызов напрямую скрипта, минуя php файл с прописанными http-заголовками (уже их отдали в index.php/index2.php).</li>
<li>Стилевые файлы (reset, base, template_css) объединены в один файл style.css.</li>
<li>В поставку по умолчанию внесен мамбот закладок в социальные сервисы &ndash; Joostina socialbot (с) doctorgrif, стили внесены в основной css шаблона, изображения кнопок социальных закладок в папке /images/sociable. Рекомендовано для модулей &laquo;Спасибо за выбор Joostina!&raquo; и &laquo;Полезная информация&raquo; отключить обработку мамботами в содержимом, аналогично поступать и для других пользовательских модулей, где не нужно выводить социальные закладки.</li>
<li>htaccess дополнен правилами кэширования для Apache 1.*/Apache 2.* (необходимо закомментировать правила, не относящиеся к вашей версии Apache). Пересмотрен порядок очередности вызовов правил.</li>
<li>Вынесены в языковой файл переменные из:
	1) /modules: mod_whosonline, mod_stats, mod_random_image, mod_ml_login;
	2) /mambots: plugin_jw_ajaxvote, joostinasocialbot;
	3) /components: com_weblinks, com_registration, com_polls, com_content, com_banners;
	4) /administrator: /templates, /popups, /modules.</li>
<li>Добавлен белорусский язык для front-end &ndash; языковой файл от Joomla 1.0.13.</li>
</ol><p class="strong">upd. 01.08.10</p><ol>
<li>Добавлены htaccess в папки /templates, /cache.</li>
</ol><p class="strong">upd. 19.07.10</p><ol>
<li>Дописан htaccess &ndash; добавлен антилич графики.</li>
<li>Дописан robots.txt &ndash; добавлены правила для Yandex.</li>
</ol><p class="strong">upd. 16.07.10</strong><ol>
<li>Добавление/обновление части ссылок на сайты авторов в /help/copyright.php.</li>
<li>Перенесено отображение рейтинга материала после статьи (более логично оценивать материал ПОСЛЕ его прочтения). Смена в мамботе mambots/content/plugin_jw_ajaxvote.php события onBeforeDisplayContent на onAfterDisplayContent.</li>
<li>Настроен до конца вывод информации a-la "Автор: Материал из Википедии Опубликовано: 28 июля 2007" &ndash; дописан забытый класс в css и объявлен его вывод в components/com_content/content.html.php.</li>
<li>Добавление в robots.txt директивы Disallow: /*com_search*/ для запрета индексации поисковиками результатов поиска.</li>
<li>Небольшая модификация /index.php для отображения отладочной информации только лишь администратору сайта. Возможно, эта опция будет доработана для более подробного вывода информации об общем времени генерации страницы, времени выполнения каждого запроса, в каком файле данный запрос генерируется.</li>
<li>Модификация вывода контактных данных в components/com_contact/contact.html.php и приведение его к более привычному виду: почтовый индекс, страна, область, город, улица, дом. Прим.: &laquo;123456, Россия, Челябинская область, г. Копейск, 12-й километр, пост ДПС&raquo;.</li>
</ol><p class="strong">upd. 15.07.10</p><ol>
<li>Обновление js в папке /includes/js/jquery/:
- jQuery JavaScript Library с v1.3.2 до v1.4.2 (включая Sizzle.js &ndash; с v0.9.3 до v1.0).</li>
<li>Обновление js в папке /includes/js/jquery/plugins/:
	- simplegallery.js с версии от 07.12.2008 (jQuery 1.2.x) до версии от 06.02.2009 (jQuery v 1.3.x);
	- corner.js с v1.92 (12.18.2007) до v2.11 (15.06.2010).</li>
</ol><p class="strong">upd. 12.07.10</p><ol>
<li>Удаление из components/com_content/content.php тэгов и комментариев из личной версии cms.</li>
<li>Поправлена ошибка работы htaccess при активации SEF.</li>
<li>Удалены комментарии doctorgrif из текста скриптов.</li>
<li>Оптимизация графики шаблона, css ряда мамботов.</li>
</ol><p class="strong">upd. 10.07.10</p><ol>
<li>Модификация /components/com_contact для отображения в письме администратору IP-адрес автора сообщения.</li>
<li>Модификация /components/com_search для поиска по отдельным категориям. Добавлена переменная в языковой файл. В настоящее время не функционирует &ndash; на доработке.</li>
</ol><p class="strong">upd. 27.06.10</p><ol>
<li>Замена &laquo;...&raquo; на символ многоточия &laquo;…&raquo;.</li>
</ol><p class="strong">upd. 18.06.10</p><ol>
<li>Настроена отдача 503 Service Temporarily Unavailable для отключенного сайта.</li>
<li>Теги в notetext.</li>
</ol><p class="strong">upd. 16.06.10</p><ol>
<li>Поддержка якорей в mod_mainmenu (+ модификация /includes/sef.php для нормального &laquo;подхвата&raquo; ссылок с якорями при активации SEF). Инструкция по использованию:
	1.) меню &rarr; yourmenu (созданный mod_mainmenu) &rarr; создать;
	2.) новый пункт меню &rarr; &laquo;Ссылка &ndash; Url&raquo;;
	3.) далее &ndash; ссылка: http://full_link_to_your_content/#youranchor;
	4.) сохранить;
	5.) В содержимом сайта (статьи/новости/другие расширения &ndash; option=com_yourcomponent), в нужном Вам месте, ставим данный якорь (#youranchor). Теперь при вызове данного пункта в меню откроется страница содержимого именно у данного якоря.</li>
</ol><p class="strong">upd. 11.06.10</p><ol>
<li>Автозаполнение поля "Поиск" в mod_search &ndash; планируется внесение выделенного слова в поле поиска + автодополнение слова (in work).</li>
<li>mod_newsflash &ndash; возможность показа и из раздела.</li>
<li>com_search &ndash; правка для фильтрации повторяющихся пробелов в поисковой строке.</li>
<li>Небольшая (косметическая) правка некоторых компонентов.</li>
<li>Добавлено склонение месяцев (или -ов?) года согласно правил русского языка &ndash; правка соответствующего сегмента /language/russian.php.</li>
<li>Добавлена сортировка по категории. Например, если вы выкладываете книжку, самоучитель или что-то подобное, и вам нужно перелистывать страницы строго в определенной последовательности.</li>
</ol><p class="strong">upd. 02.04.10</p><ol>
<li>Хак includes/joostina.php дает возможность изменения времени, возможность изменения пути в определенных кэш.</li>
</ol><p class="strong">upd. 19.03.10</p><ol>
<li>Добавлены отсутствующие изображения в /administrator/images.</li>
</ol><p class="strong">upd. 03-13.03.10</p><ol>
<li>Joostina 1.2.0 v3.</li>
<li>Оптимизация кода (удаление лишних табов и пробелов). Оптимизирована сайтовая графика, css, js расширений, в т.ч. и шаблона NewLine. Экранирование &laquo;прямых&raquo; вызовов js.</li>
<li>Доработка расширений для прохождения валидации и &laquo;пролечивание&raquo; кода от ошибок.</li>
<li>Доработка вывода в /components/com_content &ndash; вывод дополнительной информации (раздел, категория, автор, дата создания и модификации) в одну строку. Избавление от части табличной верстки &ndash; перевод на слои (in work).</li>
<li>Доработаны описания расширений, исправлены ошибки в комментариях.</li>
<li>Дополнение htaccess &ndash; безопасность, оптимизация.</li>
<li>Удалены рабочие комментарии, оставлены комментарии в /components/com_content/content.html.php для настройки css файла шаблона.</li>
<li>Дополнен языковой файл &ndash; вынесены языковые переменные расширений.</li>
</ol>
</div>