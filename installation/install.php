<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008-2010 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
define("_VALID_MOS",1);
if(file_exists('../configuration.php') && filesize('../configuration.php') > 10) {
	header('Location: ../index.php');
	exit();
}
/** Include common.php*/
include_once ('common.php');
$lang = 'russian';
function writableCell($folder) {
	echo '<tr>';
	echo '<td class="item">' . $folder . '</td>';
	echo '<td align="left">';
	echo is_writable("../$folder")?'<strong class="green">�������� ��� ������</strong>':'<strong class="red">���������� ��� ������</strong>'."</td>";
	echo "</tr>";
}
echo '<?xml version="1.0" encoding="utf-8"?' . '>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Joostina - Web-���������. �������� ��������</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../images/favicon.ico" />
	<link rel="stylesheet" href="install.css" type="text/css" />
</head>
<body>
	<div id="ctr" align="center">
		<form action="install1.php" method="post" name="adminForm" id="adminForm">
			<div class="install">
				<div id="header">
					<p><?php echo $version; ?></p>
					<p class="jst"><a href="http://www.joostina.ru">Joostina</a> - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL.</p>
				</div>
				<div id="navigator">
					<span style="font-size:larger;">��������� Joostina CMS</span>
					<ul>
						<li class="step"><strong>1</strong><span>�������� �������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step step-on"><strong>2</strong><span>������������ ����������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>3</strong><span>������������ ���� ������</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>4</strong><span>�������� �����</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>5</strong><span>������������ �����</span></li>
						<li class="arrow">&nbsp;</li>
						<li class="step"><strong>6</strong><span>���������� ���������</span></li>
					</ul>
				</div>
				<div class="buttons">
					<input class="button" type="submit" name="next" value="�������� &gt;&gt;"/>
				</div>
				<div id="wrap">
					<div class="clr"></div>
					<div class="install-text">Joostina - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL, ��� ������������� ������� �� ������ ��������� ����������� � ��������������� ���������.</div>
					<div class="clr"></div>
					<div class="license-form">
						<div class="form-block" style="padding:0;">
							<iframe src="lang/<?php echo $lang;?>/license.php" class="license" frameborder="0" scrolling="auto"></iframe>
						</div>
					</div>
				</div>
				<div id="break"></div>
				<div class="clr"></div>
				<div class="clr"></div>
			</div>
		</form>
	</div>
</body>
</html>