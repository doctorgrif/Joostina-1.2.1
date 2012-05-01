<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008-2010 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// Set flag that this is a parent file
define("_VALID_MOS",1);
/** Include common.php*/
require_once ('common.php');
echo $DBhostname	= mosGetParam($_POST,'DBhostname','');
$DBuserName	= mosGetParam($_POST,'DBuserName','');
$DBpassword	= mosGetParam($_POST,'DBpassword','');
$DBname		= mosGetParam($_POST,'DBname','');
$DBPrefix	= mosGetParam($_POST,'DBPrefix','jos_');
$DBDel		= intval(mosGetParam($_POST,'DBDel',0));
$DBBackup	= intval(mosGetParam($_POST,'DBBackup',0));
$DBSample	= intval(mosGetParam($_POST,'DBSample',1));
$DBexp		= intval(mosGetParam($_POST,'DBexp',0));
// заменить на 1 для возможности выбора экспериментального типа базы данных
$YA_UVEREN = 0;
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="utf-8"?>';
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Joostina - Web-установка. Шаг 1 - конфигурация базы данных.</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<script type="text/javascript">
<!--
function check() {
// форма основной конфигурации
	var formValid=false;
	var f = document.form;
		if ( f.DBhostname.value == '' ) {
			alert('Пожалуйста, введите имя Хоста MySQL');
			f.DBhostname.focus();
			formValid=false;
		} else if ( f.DBuserName.value == '' ) {
			alert('Пожалуйста, введите имя пользователя Базы Данных MySQL');
			f.DBuserName.focus();
			formValid=false;
		} else if ( f.DBname.value == '' ) {
			alert('Пожалуйста, введите Имя для своей новой БД');
			f.DBname.focus();
			formValid=false;
		} else if ( f.DBPrefix.value == '' ) {
			alert('Для правильной работы Joostina Вы должны ввести префикс таблиц БД MySQL.');
			f.DBPrefix.focus();
			formValid=false;
		} else if ( f.DBPrefix.value == 'old_' ) {
			alert('Вы не можете использовать префикс таблиц "old_", так как Joostina использует его для создания резервных таблиц.');
			f.DBPrefix.focus();
			formValid=false;
		} else if ( confirm('Вы уверены, что правильно ввели данные? \Joostina будет заполнять таблицы в БД, параметры которой Вы указали.')) {
			formValid=true;
		}
	return formValid;
}
//-->
</script>
</head>
<body onload="document.form.DBhostname.focus();">
<div id="ctr" align="center">
<form action="install2.php" method="post" name="form" id="form" onsubmit="return check();">
	<div class="install">
		<div id="header">
			<p><?php echo $version; ?></p>
			<p class="jst"><a href="http://www.joostina.ru">Joostina</a> &ndash; свободное программное обеспечение, распространяемое по лицензии GNU/GPL.</p>
		</div>
		<div id="navigator">
			<span style="font-size:larger;">Установка Joostina CMS</span>
			<ul>
				<li class="step"><strong>1</strong><span>Проверка системы</span></li>
				<li class="arrow">&nbsp;</li>
				<li class="step"><strong>2</strong><span>Лицензионное соглашение</span></li>
				<li class="arrow">&nbsp;</li>
				<li class="step step-on"><strong>3</strong><span>Конфигурация базы данных</span></li>
				<li class="arrow">&nbsp;</li>
				<li class="step"><strong>4</strong><span>Название сайта</span></li>
				<li class="arrow">&nbsp;</li>
				<li class="step"><strong>5</strong><span>Конфигурация сайта</span></li>
				<li class="arrow">&nbsp;</li>
				<li class="step"><strong>6</strong><span>Завершение установки</span></li>
			</ul>
		</div>
		<div class="buttons">
			<input class="button" type="submit" name="next" value="Далее &gt;&gt;" />
		</div>
		<div id="wrap">
			<div class="install-form">
				<div class="form-block">
					<table class="content2" width="100%">
						<tr>
							<th><p>Имя хоста MySQL</p></th>
							<td>
								<input class="inputbox" type="text" name="DBhostname" value="<?php echo ($DBhostname=='') ? 'localhost':$DBhostname; ?>" />
								<p>Обычно это <span class="strong">localhost</span>.</p>
							</td>
						</tr>
						<tr>
							<th><p>Имя пользователя MySQL</p></th>
							<td>
								<input class="inputbox" type="text" name="DBuserName" value="<?php echo $DBuserName; ?>" />
								<p>Для установки на домашнем компьютере чаще всего используется имя <span class="strong green">root</span>, а для установки в Интернете, введите данные, полученные у Хостера.</p>
							</td>
						</tr>
						<tr>
							<th><p>Пароль доступа к БД MySQL</p></th>
							<td>
								<input class="inputbox" type="text" name="DBpassword" value="<?php echo $DBpassword; ?>" />
								<p>Оставьте поле пустым для домашней установки или введите пароль доступа к Вашей БД, полученный у хостера.</p>
							</td>
						</tr>
						<tr>
							<th><p>Имя БД MySQL</p></th>
							<td>
								<input class="inputbox" type="text" name="DBname" value="<?php echo $DBname; ?>" />
								<p>Имя существующей или новой БД, которая будет использоваться для сайта.</p>
							</td>
						</tr>
						<tr>
							<th><p>Префикс таблиц БД MySQL</p></th>
							<td>
								<input class="inputbox" type="text" name="DBPrefix" value="<?php echo $DBPrefix; ?>" />
								<p>Используйте префикс таблиц для установки в одну БД. Не используйте <span class="strong red">'old_'</span> - это зарезервированное значение.</p>
							</td>
						</tr>
						<tr>
							<th><p>Удалить существующие таблицы</p></th>
							<td>
								<input type="checkbox" name="DBDel" id="DBDel" value="1" <?php if($DBDel) echo 'checked="checked"'; ?> />
								<p>Все существующие таблицы от предыдущих установок Joostina будут удалены.</p>
							</td>
						</tr>
						<tr>
							<th><p>Создать резервные копии существующих таблиц</p></th>
							<td>
								<input type="checkbox" name="DBBackup" id="DBBackup" value="1" <?php if($DBBackup) echo 'checked="checked"'; ?> />
								<p>Все существующие резервные копии таблиц от предыдущих установок Joostina будут заменены.</p>
							</td>
						</tr>
						<tr>
							<th><p>Создать базу данных, если её нет</p></th>
							<td>
								<input type="checkbox" name="create_db" id="create_db" value="1" checked="checked" />
								<p>Внимание! Не на всех хостингах создание БД таким способом будет возможно. В случае возникновения ошибок - создайте пустую БД стандартным для вашего хостинга способом и выберите её.</p>
							</td>
						</tr>
						<tr>
							<th><p>Установить демонстрационные данные</p></th>
							<td>
								<input type="checkbox" name="DBSample" id="DBSample" value="1" <?php if($DBSample) echo 'checked="checked"'; ?> />
								<p>Не выключайте это, если Вы ещё не знакомы с Joostina!</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</form>
</div>
<div class="clearfix"></div>
</body>
</html>