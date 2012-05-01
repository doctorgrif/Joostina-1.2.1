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
	/**
	* @var
	* Строка Продукт
	*/
	var $PRODUCT	 = 'Joostina';
	/**
	* @var
	* Строка CMS
	*/
	var $CMS		 = 'Joostina';
	/**
	* @var
	* Версия
	*/
	var $CMS_ver	 = '1.2.1';
	/**
	* @var int
	* Номер основной версии
	*/
	var $RELEASE	 = '1.2';
	/** 
	* @var
	* Строка статус разработки
	*/
	var $DEV_STATUS	 = '';
	/**
	* @var int
	* Подверсия
	*/
	var $DEV_LEVEL	 = '19';
	/**
	* @var int
	* Номер сборки
	*/
	var $BUILD		 = '5';
	/**
	* @var string
	* Кодовое имя
	*/
	//var $CODENAME	 = '[Kenny McCormick]';
	var $CODENAME	 = '[<a class="codename" href="#">Kenny McCormick<span class="codeimg"><img src="../images/kenny-mccormick.png" alt="" /></span></a>]';
	/**
	* @var
	* string Дата
	*/
	var $RELDATE	 = '01/05/2012';
	/**
	* @var
	* string Время
	*/
	var $RELTIME	 = '13:29';
	/**
	* @var string
	* Временная зона
	*/
	var $RELTZ		 = '[+5 GMT]';
	/**
	* @var string
	* Текст оформление знака охраны авторского права
	*/
	var $COPYRIGHT	 = '&copy; <a href="http://www.joostina.ru" title="Joostina Team">Joostina Team</a>, 2007&ndash;2012. Все права защищены.';
	/** @var string URL */
	var $URL = '<a href="http://www.joostina.ru" title="Система создания и управления сайтами Joostina CMS">Joostina!</a> - свободное программное обеспечение, распространяемое по лицензии <a href="http://www.opensource.org/licenses/gpl-license.php" title="GNU General Public License (GPL)">GNU/GPL</a>.';
	/**
	* @var string
	* Режим демо-сайта.
	* Для реального использования сайта установите = 1 для демонстраций = 0: 1 по умолчанию
	*/
	var $SITE		 = 1;
	/**
	* @var string
	* Whether site has restricted functionality mostly used for demo sites:
	* Для реального использования сайта = 0 для демонстраций = 1: 0 по умолчанию
	*/
	var $RESTRICT	 = 0;
	/**
	* @var string
	* Режим разработки сайта.
	* Для реального использования сайта = 0 (1 отключена проверка /installation): 0 по умолчанию
	*/
	var $SVN		 = 0;
	/**
	* @var string
	* Ссылки на сайты поддержки
	*/
	var $SUPPORT	 = 'Поддержка: <a href="http://www.joostina.ru" title="Официальный сайт CMS Joostina">www.joostina.ru</a> | <a href="http://www.forum.joostina.ru" title="Форум Joostina CMS">www.forum.joostina.ru</a> | <a href="http://www.joomlaportal.ru" title="Joomla! CMS по-русски">www.joomlaportal.ru</a> | <a href="http://www.joom.ru" title="Русский дом Joomla">www.joom.ru</a> | <a href="http://www.joomla.ru" title="Бесплатная система управления сайтом Joomla!">www.joomla.ru</a>.';
	/**
	* @return string
	* Длинный формат версии
	*/
	function getLongVersion() {
		return $this->CMS . ' ' . $this->RELEASE . '. ' . $this->CMS_ver . ' [' . $this->CODENAME . '] ' . $this->RELDATE . ' ' . $this->RELTIME . ' ' . $this->RELTZ;
	}
	/**
	* @return string
	* Краткий формат версии
	*/
	function getShortVersion() {
		return $this->RELEASE . '.' . $this->DEV_LEVEL;
	}
	/**
	* @return string
	* Version suffix for help files
	*/
	function getHelpVersion() {
		if ($this->RELEASE > '1.0') {
			return '.' . str_replace('.', '', $this->RELEASE);
		} else {
			return '';
		}
	}
}
$_VERSION = new joomlaVersion();
	$version	 = '<p>' . $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . '' . $_VERSION->DEV_STATUS . ' ' . $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . '</p>';
	$jostina_ru	 = '<p>' . $_VERSION->CMS . ' ' . $_VERSION->CMS_ver . '.' . $_VERSION->BUILD . ' ' . $_VERSION->DEV_STATUS .' '. $_VERSION->CODENAME . ' ' . $_VERSION->RELDATE . ' ' . $_VERSION->RELTIME . ' ' . $_VERSION->RELTZ . ' ' . $_VERSION->COPYRIGHT . '</p><p>' . $_VERSION->SUPPORT . '</p>';
?>