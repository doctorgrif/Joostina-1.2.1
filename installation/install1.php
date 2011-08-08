<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008-2010 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
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
// �������� �� 1 ��� ����������� ������ ������������������ ���� ���� ������
$YA_UVEREN = 0;

echo '<?xml version="1.0" encoding="utf-8"?' . '>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Joostina - Web-���������. ��� 1 - ������������ ���� ������.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<script type="text/javascript">
<!--
function check() {
// ����� �������� ������������
var formValid=false;
var f = document.form;
if ( f.DBhostname.value == '' ) {
alert('����������, ������� ��� ����� MySQL');
f.DBhostname.focus();
formValid=false;
} else if ( f.DBuserName.value == '' ) {
alert('����������, ������� ��� ������������ ���� ������ MySQL');
f.DBuserName.focus();
formValid=false;
} else if ( f.DBname.value == '' ) {
alert('����������, ������� ��� ��� ����� ����� ��');
f.DBname.focus();
formValid=false;
} else if ( f.DBPrefix.value == '' ) {
alert('��� ���������� ������ Joostina �� ������ ������ ������� ������ �� MySQL.');
f.DBPrefix.focus();
formValid=false;
} else if ( f.DBPrefix.value == 'old_' ) {
alert('�� �� ������ ������������ ������� ������ "old_", ��� ��� Joostina ���������� ��� ��� �������� ��������� ������.');
f.DBPrefix.focus();
formValid=false;
} else if ( confirm('�� �������, ��� ��������� ����� ������? \Joostina ����� ��������� ������� � ��, ��������� ������� �� �������.')) {
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
					<p class="jst"><a href="http://www.joostina.ru">Joostina</a> - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL.</p>
				</div>
				<div id="navigator">
					<big>��������� Joostina CMS</big>
					<ul>
						<li class="step"><strong>1</strong><span>�������� �������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>2</strong><span>������������ ����������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step step-on"><strong>3</strong><span>������������ ���� ������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>4</strong><span>�������� �����</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>5</strong><span>������������ �����</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>6</strong><span>���������� ���������</span></li>
					</ul>
				</div>
				<div class="buttons">
					<input class="button" type="submit" name="next" value="����� &gt;&gt;"/>
				</div>
					<div id="wrap">
						<div class="install-form">
							<div class="form-block">
							<table class="content2" width="100%">
								<tr>
									<th>��� ����� MySQL</th>
									<td>
										<input class="inputbox" type="text" name="DBhostname" value="<?php echo ($DBhostname=='') ? 'localhost':$DBhostname; ?>" />
										������ ��� &nbsp;<strong>localhost</strong>
									</td>
								</tr>
								<tr>
									<th>��� ������������ MySQL</th>
									<td>
										<input class="inputbox" type="text" name="DBuserName" value="<?php echo $DBuserName; ?>" />
										��� ��������� �� �������� ���������� ���� ����� ������������ ���&nbsp; <strong class="green">root</strong>, � ��� ��������� � ���������, ������� ������, ���������� � �������.
									</td>
								</tr>
								<tr>
									<th>������ ������� � �� MySQL</th>
									<td>
										<input class="inputbox" type="text" name="DBpassword" value="<?php echo $DBpassword; ?>" />
										�������� ���� ������ ��� �������� ��������� ��� ������� ������ ������� � ����� ��, ���������� � �������.
									</td>
								</tr>
								<tr>
									<th>��� �� MySQL</th>
									<td>
										<input class="inputbox" type="text" name="DBname" value="<?php echo $DBname; ?>" />
										��� ������������ ��� ����� ��, ������� ����� �������������� ��� �����
									</td>
								</tr>
								<tr>
									<th>������� ������ �� MySQL</th>
									<td>
										<input class="inputbox" type="text" name="DBPrefix" value="<?php echo $DBPrefix; ?>" />
										����������� ������� ������ ��� ��������� � ���� ��. �� ����������� <strong class="red">'old_'</strong> - ��� ����������������� ��������.
									</td>
								</tr>
								<tr>
									<th>������� ������������ �������</th>
									<td>
										<input type="checkbox" name="DBDel" id="DBDel" value="1" <?php if($DBDel) echo 'checked="checked"'; ?> />
										<br />��� ������������ ������� �� ���������� ��������� Joostina ����� �������.
									</td>
								</tr>
								<tr>
									<th>������� ��������� ����� ������������ ������</th>
									<td>
										<input type="checkbox" name="DBBackup" id="DBBackup" value="1" <?php if($DBBackup) echo 'checked="checked"'; ?> />
										<br />��� ������������ ��������� ����� ������ �� ���������� ��������� Joostina ����� ��������.
									</td>
								</tr>
								<tr>
									<th>������� ���� ������, ���� � ���</th>
									<td>
										<input type="checkbox" name="create_db" id="create_db" value="1" checked="checked" />
										<br />��������! �� �� ���� ��������� �������� �� ����� �������� ����� ��������. � ������ ������������� ������ - �������� ������ �� ����������� ��� ������ �������� �������� � �������� �
									</td>
								</tr>
								<tr>
									<th>���������� ���������������� ������</th>
									<td>
										<input type="checkbox" name="DBSample" id="DBSample" value="1" <?php if($DBSample) echo 'checked="checked"'; ?> />
										<br />�� ���������� ���, ���� �� ��� �� ������� � Joostina!
									</td>
								</tr>
							</table>
							</div>
						</div>
					</div>
				<div class="clr"></div>
			</div>
		</form>
	</div>
	<div class="clr"></div>
</body>
</html>