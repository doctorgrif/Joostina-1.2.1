<?php
/* * *
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

/**
* Информация о версии
* @package Joostina
*/
class joomlaVersion {

	/** @var Строка Продукт */
	var $PRODUCT = 'Joomla!';
	/** @var Строка CMS */
	var $CMS = 'Joostina';
	/** @var Версия */
	var $CMS_ver = '1.2.1';
	/** @var int Номер основной версии */
	var $RELEASE = '1.0';
	/** @var Строка статус разработки */
	var $DEV_STATUS = '&beta;';
	/** @var int Подверсия */
	var $DEV_LEVEL = '15';
	/** @var int Номер сборки */
	var $BUILD = '3';
	/** @var int SVN checkout */
	var $SVN_R = 'r:16';
	/** @var string Кодовое имя */
	var $CODENAME = '';
	/** @var string Дата */
	var $RELDATE = '01.06.2011';
	/** @var string Время */
	var $RELTIME = '09:41';
	/** @var string Временная зона */
	var $RELTZ = '+5 GMT';
	/** @var string Ваш браузер */
	var $BROUSER = 'Ваш браузер: <span id="browser-info"></span>';
	/** @var string Текст оформление знака охраны авторского права */
	var $COPYRIGHT = '&copy; <a href="http://www.joostina.ru" target="_blank" title="Joostina Team">Joostina Team</a>, 2008&ndash;2011. Все права защищены.';
	/** @var string URL */
	var $URL = '<a href="http://www.joostina.ru" target="_blank" title="Система создания и управления сайтами Joostina CMS">Joostina!</a> - свободное программное обеспечение, распространяемое по лицензии <a href="http://www.opensource.org/licenses/gpl-license.php" title="GNU General Public License (GPL)">GNU/GPL</a>.';
	/** @var string Режим демо-сайта. Для реального использования сайта установите = 1 для демонстраций = 0: 1 используется по умолчанию */
	var $SITE = 1;
	/** @var string Whether site has restricted functionality mostly used for demo sites: 0 is default */
	var $RESTRICT = 0;
	/** @var string Whether site is still in development phase (disables checks for /installation folder) - should be set to 0 for package release: 0 is default */
	var $SVN = 0;
	/** @var string Ссылки на сайты поддержки */
	var $SUPPORT = 'Поддержка: <a href="http://www.joostina.ru" target="_blank" title="Официальный сайт CMS Joostina">www.joostina.ru</a> | <a href="http://www.joomlaportal.ru" target="_blank" title="Joomla! CMS по-русски">www.joomlaportal.ru</a> | <a href="http://www.joom.ru" target="_blank" title="Русский дом Joomla">www.joom.ru</a> | <a href="http://www.joomla.ru" target="_blank" title="Бесплатная система управления сайтом Joomla!">www.joomla.ru</a>.';

	/** @return string Длинный формат версии */
	function getLongVersion() {
		return $this->CMS . ' ' . $this->RELEASE . '. ' . $this->CMS_ver . ' [' . $this->CODENAME . '] ' . $this->RELDATE . ' ' . $this->RELTIME . ' ' . $this->RELTZ;
	}
	/** @return string Краткий формат версии */
	function getShortVersion() {
		return $this->RELEASE . '.' . $this->DEV_LEVEL;
	}
	/** @return string Version suffix for help files */
	function getHelpVersion() {
		if ($this->RELEASE > '1.0') {
			return '.' . str_replace('.', '', $this->RELEASE);
		} else {
			return '';
		}
	}
}

$_VERSION = new joomlaVersion();
$version = $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ;

$jostina_ru = $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' [' . $_VERSION->SVN_R . '] ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . ' ' . $_VERSION->COPYRIGHT . '<br />' . $_VERSION->SUPPORT . ' ' . $_VERSION->BROUSER;
?>