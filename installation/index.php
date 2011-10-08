<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
define('_VALID_MOS',1);
if(file_exists('../configuration.php') && filesize('../configuration.php') > 10) {
	header("Location: ../index.php");
	exit();
}
require ('../globals.php');
/** ���������� common.php*/
include_once ('common.php');
$sp = ini_get('session.save_path');
echo '<?xml version="1.0" encoding="windows-1251"?' . '>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Joostina - Web-���������. �������� �������</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
</head>
<body>
	<div id="ctr" align="center">
		<div class="install">
			<div id="header">
				<p class="ver"><?php echo $version; ?></p>
				<p class="jst"><a href="http://www.joostina.ru">Joostina</a> - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL.</p>
			</div>
			<div id="navigator">
				<span style="font-size:larger;">��������� Joostina CMS</span>
				<ul>
					<li class="step step-on"><strong>1</strong><span>�������� �������</span></li>
					<li class="arrow">&nbsp;</li>
					<li class="step"><strong>2</strong><span>������������ ����������</span></li>
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
				<input type="button" class="button small" value="��������� �����" onclick="window.location=window.location" />
				<input name="Button2" type="submit" class="button" value="����� >>" onclick="window.location='install.php';" />
			</div>
			<div id="wrap">
				<h1>�������� �������� �������: </h1>
				<div class="install-text">
					���� �� ������� ������� ���������, ��������� �������� � ������� �� ����� ��������� ��� ������ Joostina, �� �� ���� �������� ��� ����� �������� <strong class="red">������� ������</strong>.
					��� ����������� � ������������� ������ ������� ����������� ��������� ��� ����������� ���������.
					<div class="ctr"></div>
				</div>
				<div class="install-form">
					<div class="form-block">
						<table class="content">
							<tr>
								<td class="item">������ PHP >= 5.0.0</td>
								<td align="left">
									<?php echo phpversion() < '5.0'?'<strong class="red">���</strong>':'<strong class="green">��</strong>'; ?>
								</td>
							</tr>
							<tr>
								<td class="item">&nbsp; - ��������� zlib-������</td>
								<td align="left">
									<?php echo extension_loaded('zlib')?'<strong class="green">��������</strong>':'<strong class="red">����������</strong>'; ?>
								</td>
							</tr>
							<tr>
								<td class="item">&nbsp; - ��������� XML</td>
								<td align="left">
									<?php echo extension_loaded('xml')?'<strong class="green">��������</strong>':'<strong class="red">����������</strong>'; ?>
								</td>
							</tr>
							<tr>
								<td class="item">&nbsp; - ��������� MySQL</td>
								<td align="left">
									<?php echo function_exists('mysql_connect')?'<strong class="green">��������</strong>':'<strong class="red">����������</strong>'; ?>
								</td>
							</tr>
							<tr>
								<td valign="top" class="item">���� <strong>configuration.php</strong></td>
								<td align="left">
									<?php
										if(@file_exists('../configuration.php') && @is_writable('../configuration.php')) {
											echo '<strong class="green">�������� ��� ������</strong>';
										} else
										if(is_writable('..')) {
											echo '<strong class="green">�������� ��� ������</strong>';
										} else {
											echo '<strong class="red">���������� ��� ������</strong><br /><span class="small">�� ������ ���������� ���������, �������� ����� ������������ ����� �������� � �����. ����������� ��������� ���: ����������/�������� ���������� � ��������� ���� ���� configuration.php � ��������� �� ������!</span>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td class="item">������� ��� ������ ������</td>
								<td align="left" valign="top">
									<?php echo is_writable($sp)?'<strong class="green">�������� ��� ������</strong>':'<strong class="red">���������� ��� ������</strong>'; ?>
								</td>
							</tr>
							<tr>
								<td class="item" colspan="2">
									<strong><?php echo $sp?$sp:'�� ����������'; ?></strong>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clr"></div>
				<?php
					$wrongSettingsTexts = array();
					if(ini_get('magic_quotes_gpc') != '1') {
						$wrongSettingsTexts[] = '�������� PHP magic_quotes_gpc - `OFF` ������ `ON`';
					}
					if(ini_get('register_globals') == '1') {
						$wrongSettingsTexts[] = '�������� PHP register_globals - `ON` ������ `OFF`';
					}
					if(count($wrongSettingsTexts)) {
				?>
				<h1>�������� ������������:</h1>
				<div class="install-text">
					<p>��������� ��������� PHP �������� �������������� ��� <strong>������������</strong> � �� ������������� ��������:</p>
					<p>����������, �� �������������� ����������� ����������� �� <a href="http://www.joostina.ru" target="_blank">����������� ���� Joostina</a>.</p>
					<div class="ctr"></div>
				</div>
				<div class="install-form">
					<div class="form-block" style="border:1px solid #c00;background:#ffc;">
						<table class="content" style="width:355px;">
							<tr>
								<td class="item">
									<ul style="margin:0;padding:0;padding-left:5px;text-align:left;padding-bottom:0;list-style:none;">
										<?php
											foreach($wrongSettingsTexts as $txt) {
										?>
										<li style="min-height:25px;padding-bottom:5px;padding-left:25px;color:red;font-weight:bold;background-image:url(../includes/js/ThemeOffice/warning.png);background-repeat:no-repeat;background-position:0 2px;">
											<?php
												echo $txt;
											?>
										</li>
										<?php
											}
										?>
									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clr"></div>
				<?php
					}
				?>
				<h1>������������� ��������� PHP:</h1>
				<div class="install-text">&nbsp;&nbsp;��� ��������� PHP ������������� ��� ������ ������������� � Joostina.<br />������, Joostina ����� ��������, ���� ��� ��������� �� � ������ ���� ������������� �������������.</div>
				<div class="ctr"></div>
				<div class="install-form">
					<div class="form-block">
						<table class="content">
							<tr>
								<td class="toggle">���������</td>
								<td class="toggle">�������������</td>
								<td class="toggle">�����������</td>
							</tr>
							<?php
								$php_recommended_settings = array(
									array('Safe Mode','safe_mode','OFF'),
									array('Display Errors','display_errors','ON'),
									array('File Uploads','file_uploads','ON'),
									array('Magic Quotes GPC','magic_quotes_gpc','ON'),
									array('Magic Quotes Runtime','magic_quotes_runtime','OFF'),
									array('Register Globals','register_globals','OFF'),
									array('Output Buffering','output_buffering','OFF'),
									array('Session auto start','session.auto_start','OFF')
								,);
								foreach($php_recommended_settings as $phprec) {
							?>
							<tr>
								<td class="item"><?php echo $phprec[0]; ?></td>
								<td class="toggle"><?php echo $phprec[2]; ?></td>
								<td>
									<?php
										if(get_php_setting($phprec[1]) == $phprec[2]) {
									?>
									<strong class="green">
										<?php
											} else {
										?>
									<strong class="red">
										<?php
											}
											echo get_php_setting($phprec[1]);
										?>
									</strong>
								</td>
							</tr>
							<?php }?>
							<tr>
								<td class="item">PCRE UTF-8</td>
								<td class="toggle">ON</td>
								<?php if ( ! @preg_match('/^.$/u', 'n')): $failed = TRUE ?>
								<td colspan="2"><strong class="red"><a href="http://php.net/pcre">PCRE</a> �� ������������ ������ � UTF-8.</strong></td>
								<?php elseif ( ! @preg_match('/^\pL$/u', 'n')): $failed = TRUE ?>
								<td colspan="2"><strong class="red"><a href="http://php.net/pcre">PCRE</a> �� ������������ ������ � ��������.</strong></td>
								<?php else: ?>
								<td><strong class="green">ON</strong></td>
								<?php endif ?>
							</tr>
							<tr>
								<td class="item">mbstring</td>
								<td class="toggle">�����������</td>
								<?php if ( !extension_loaded('mbstring') ): ?>
								<td colspan="2"><strong class="red"><a href="http://php.net/mbstring" target="_blank">mbstring</a> �� �����������</strong></td>
								<?php else: ?>
								<td><strong class="green">�����������</strong></td>
								<?php endif ?>
							</tr>
							<tr>
								<td class="item">iconv</td>
								<td class="toggle">�����������</td>
								<?php if ( !extension_loaded('iconv') ): ?>
								<td colspan="2"><strong class="red"><a href="http://php.net/iconv" target="_blank">iconv</a> �� �����������</strong></td>
								<?php else: ?>
								<td><strong class="green">�����������</strong></td>
								<?php endif ?>
							</tr>
						</table>
					</div>
				</div>
				<div class="clr"></div>
				<!-- ������ ��������� ������� // -->
				<h1>������ � ���������:</h1>
				<div class="install-text">������ ���, ��� ��� ��������� Joostina ��������� ������� ���� ������. ������ ������ ��� ��������� - �������� ������� ������ ���� � ���� ����� ������, ��� � ������������ - ���������� ����� ��� ������ ����. ������ ���� ����� ������ ���������� � ������ ���������� ���������.
					<ul>
						<li><a href="http://www.joostina.ru/" target="_blank"><strong>���������� ���� ������� Joostina</strong></a></li>
						<li><a href="http://www.joomlaforum.ru/" target="_blank"><strong>��������� �� ������������� Joomla - ������</strong></a></li>
						<li>������ ��������� ������ �������</li>
					</ul>
				</div>
				<!-- // ������ ��������� ������� -->
				<div class="clr"></div>
				<h1>����������� �������������� �������</h1>
				<div class="install-text">��������� ��������� ������� �� �������� ���������� ��� ������, �� ������������ ��������� ��������� �������� ������ � Joostina ������������ �������� � ������������.</div>
				<div class="install-form">
					<div class="form-block">
						<table class="content">
							<tr>
								<td class="toggle">���������</td>
								<td class="toggle">�������������</td>
								<td class="toggle">�����������</td>
							</tr>
							<?php
								$php_recommended_settings = array(
									array('allow_url_fopen','allow_url_fopen','OFF'),
									array('short_open_tag','short_open_tag','OFF'),
									array('post_max_size','post_max_size','8M'),
									array('upload_max_filesize','upload_max_filesize','2M'),
									array('default_socket_timeout (in sec.)','default_socket_timeout','30'),
									array('max_execution_time (in sec.)','max_execution_time','30'),
								);
								foreach($php_recommended_settings as $phprec) {
							?>
							<tr>
								<td class="item"><?php echo $phprec[0]; ?></td>
								<td class="toggle"><?php echo $phprec[2]; ?></td>
								<td>
									<?php
										$act_val = ini_get($phprec[1]);
										if($act_val == '1' || $act_val == '2' || $act_val == '') {
										if(get_php_setting($phprec[1]) == $phprec[2]) { ?>
									<strong class="green">
										<?php } else { ?>
									<strong class="red">
										<?php
											}
												}
												if($act_val == '1') {
													echo 'ON';
												} elseif($act_val == '2' || $act_val == '') {
													echo 'OFF';
												} else echo '<strong class="green">'.$act_val.'</strong>';
										?>
									</strong>
								</td>
							</tr>
							<?php
								} // end foreach
							?>
						</table>
					</div>
					<div class="clr"></div>
				</div>
				<div id="dir_info" style="display:none;">
					<h1>����� ������� � ������ � ���������:</h1>
					<div class="install-text">��� ���������� ������ Joostina ����������, ����� �� ������������ ����� � �������� ���� ����������� ����� ������. ���� �� ������ <strong class="red">���������� ��� ������</strong> ��� ��������� ������ � ���������, �� ���������� ���������� �� ��� ����� �������, ����������� �������������� ��.</div>
				</div>
				<div class="install-form">
					<div class="form-block">
					<div class="button2" id="cr" style="width: 98%;" onclick="document.getElementById('cool_dirs').style.display=''; document.getElementById('dir_info').style.display=''; document.getElementById('cr').style.display='none';">
						��������� ����� ������� � ��������� ���������
					</div>
					<div class="clr">&nbsp;</div>
						<?php
								// ������ ��������� ������� ��������� ��������� �� ����������� ������ � ���
							$dirs = array(
								'administrator/backups',
								'administrator/components',
								'administrator/modules',
								'administrator/templates',
								'cache',
								'components',
								'images',
								'images/stories',
								'language',
								'mambots',
								'mambots/content',
								'mambots/editors',
								'mambots/editors-xtd',
								'mambots/search',
								'mambots/system',
								'media',
								'modules',
								'templates');
							$cool_dirs = '';
							$bad_dirs = '';
								foreach($dirs as $dir) {
									if(writableCell($dir)) {
									// �������� � ������� ������ ���������
										$cool_dirs .= '<tr><td class="item">'.$dir.'/</td><td align="right"><strong class="green">�������� ��� ������</strong></tr>';
									}else {
									// �������� � ������� ������ ���������
										$bad_dirs .= '<tr><td class="item">'.$dir.'/</td><td align="right"><strong class="red">���������� ��� ������</strong></tr>';
									}
								}
									if($bad_dirs!='') {
										echo '<table class="content">' . $bad_dirs . '</table>';
									};
										echo '<table id="cool_dirs" class="content" style="display:none;">' . $cool_dirs . '</table>';
							?>
					</div>
					<div class="clr"></div>
				</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</body>
</html>
<?php
	function get_php_setting($val) {
		$r = (ini_get($val) == '1' ? 1:0);
			return $r ? 'ON':'OFF';
	}
	function writableCell($folder,$relative = 1) {
		if($relative) {
			return is_writable("../$folder") ? 1:0;
		} else {
			return is_writable("$folder")    ? 1:0;
		}
	}
	function writableCell_old($folder,$relative = 1,$text = '') {
		$writeable = '<strong class="green">�������� ��� ������</strong>';
		$unwriteable = '<strong class="red">���������� ��� ������</strong>';
			echo '<tr>';
			echo '<td class="item">' . $folder . '/</td>';
			echo '<td align="right">';
				if($relative) {
					echo is_writable("../$folder") ? $writeable:$unwriteable;
				} else {
					echo is_writable("$folder") ? $writeable:$unwriteable;
				}
					echo '</tr>';
	}
?>