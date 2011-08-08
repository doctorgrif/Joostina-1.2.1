<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
//плагин для вставки произвольных html-кусков кода
//на панели редактора представлен выпадающим списком
SpawConfig::setStaticConfigItem("dropdown_data_customdropdown_customdropdown",
array(
//вставка простого элемента:
//'что будет вставляться' => 'как будет показываться в списке' , (не забываем про запятую)
//нельзя использовать кавычки, переносы строки и элементы HTML-тэгов! (<>)
'{mosimage}' => '{mosimage} - вставка картинки',
'{mospagebreak}' => '{mospagebreak} - разрыв страницы',
//вставки для multithumb! - кому не нужно уберите
'{multithumb enable_thumbs=0}' => '{multithumb откл. иконки}',
'{multithumb enable_thumbs=1}' => '{multithumb вкл. иконки}',
'{multithumb popup_type=lightbox}' => '{multithumb просмотр в lightbox}',
'{multithumb popup_type=expansion}' => '{multithumb простое увеличение}',
'{jcomments off}' => '{jcomments off} - отключение комментариев',
'{jcomments on}' => '{jcomments on} - включение комментариев',
'{nomultithumb}' => '{Выкл multithumb}',
'{multithumb}' => '{multithumb}',
//следующий пример вставки более сложного элемента - если нужно вставлять многострочную строку с тэгами:
//'Название переменной' => 'как будет показываться в списке' , 
// Название переменной (в примере PG_customdropdown_mytbl) используется ниже для описания содержимого вставляемого кода
'PG_customdropdown_mytbl' => 'Пример таблицы' //!!!последний элемент в списке - без запятой на конце!!!
)
);
//теперь опишем содержимое переменной PG_customdropdown_prctbl при помощи конструкции
//SpawConfig::setStaticConfigItem('Название переменной',
//"Содержимое того что вставляем в двойных кавычках, внутри могут быть одинарные кавычки, <,>; переносы строк обозначаем как \\n",
//SPAW_CFG_TRANSFER_JS);
SpawConfig::setStaticConfigItem(
'PG_customdropdown_mytbl',
"<p class='contentheading'>ЗАГОЛОВОК</p>\\n<p class='small'>примечание</p>\\n<table cellpadding='5' border='1' class='mytablecssclass'>\\n <tr>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n</table>",
SPAW_CFG_TRANSFER_JS
);
//все прочие пременные аналогично если нужно ....
?>