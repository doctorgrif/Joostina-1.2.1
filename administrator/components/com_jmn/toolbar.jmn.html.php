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
class TOOLBAR_jmn {
// Draws the menu for to Edit a banner
function _EDIT() {
global $id;
mosMenuBar::startTable();
mosMenuBar::media_manager('banners');
mosMenuBar::spacer();
mosMenuBar::save();
mosMenuBar::spacer();
mosMenuBar::apply();
mosMenuBar::spacer();
mosMenuBar::close();
mosMenuBar::spacer();
if ( $id ) {
// for existing content items the button is renamed `close`
mosMenuBar::cancel('cancel','Отмена');
} else {
mosMenuBar::cancel();
}
mosMenuBar::spacer();
mosMenuBar::help('screen.banners.edit');
mosMenuBar::endTable();
}
function _DEFAULT() {
mosMenuBar::startTable();
mosMenuBar::custom( $task='gen_metakey', $icon='browser.png', $iconOver='browser.png', $alt='Ключевые слова', $listSelect=true );
mosMenuBar::spacer();
mosMenuBar::custom( $task='gen_metadesc', $icon='browser.png', $iconOver='browser.png', $alt='Описание', $listSelect=true );
mosMenuBar::spacer();
mosMenuBar::custom( $task='config', $icon='config.png', $iconOver='config.png', $alt='Настройки', $listSelect=false );
mosMenuBar::spacer();
mosMenuBar::custom( $task='settings', $icon='config.png', $iconOver='config.png', $alt='Слова-исключения', $listSelect=false );
mosMenuBar::spacer();
mosMenuBar::custom( $task='save_manager', $icon='save_f2.png', $iconOver='save_f2.png', $alt='Сохранить', $listSelect=true );
mosMenuBar::spacer();
mosMenuBar::endTable();
}
function _CONFIG() {
mosMenuBar::startTable();
mosMenuBar::save('save_config','Сохранить');
mosMenuBar::spacer();
mosMenuBar::cancel('cancel','Отмена');
mosMenuBar::spacer();
mosMenuBar::endTable();
}
function _SETTINGS() {
mosMenuBar::startTable();
mosMenuBar::save('settings','Сохранить');
mosMenuBar::spacer();
mosMenuBar::cancel('cancel','Отмена');
mosMenuBar::spacer();
mosMenuBar::endTable();
}
function _METAKEY() {
mosMenuBar::startTable();
mosMenuBar::cancel('cancel','Назад');
mosMenuBar::spacer();
mosMenuBar::endTable();
}
function _METADESC() {
mosMenuBar::startTable();
mosMenuBar::cancel('cancel','Назад');
mosMenuBar::spacer();
mosMenuBar::endTable();
}
}
?>