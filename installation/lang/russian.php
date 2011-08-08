<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
defined('_VALID_MOS') or die();
//index
define('_INSTALL_TITLE','Joostina - Web-���������. �������� �������');
define('_INSTALL_JOOSITNA','�������� �������');
define('_INSTALL_SISREV','�������� �������');
define('_INSTALL_RECHECK','��������� �����');
define('_INSTALL_NEXT','����� &gt;&gt;');
define('_INSTALL_LICENSE','��������');
define('_INSTALL_STEP1','��� 1');
define('_INSTALL_STEP2','��� 2');
define('_INSTALL_STEP3','��� 3');
define('_INSTALL_STEP4','��� 4');
define('_INSTALL_CHECK_SERV_OPTS','�������� �������� �������:');
define('_INSTALL_PHPVERSION','������ PHP >= 4.1.0');
define('_INSTALL_ZLIB','&nbsp; - ��������� zlib-������');
define('_INSTALL_XML','&nbsp; - ��������� XML');
define('_INSTALL_MYSQL','&nbsp; - ��������� MySQL');
define('_INSTALL_NO','<strong class="red">���</strong>');
define('_INSTALL_YES','<strong class="green">��</strong>');
define('_INSTALL_WRITE','<strong class="green">��������</strong>');
define('_INSTALL_UNWRITE','<strong class="red">����������</strong>');
define('_INSTALL_CONFIGFILE','���� <strong>configuration.php</strong>');
define('_INSTALL_CONFIGFILE_TEXT','<strong class="red">���������� ��� ������</strong><br /><span class="small">�� ������ ���������� ���������, �������� ����� ������������ ����� �������� � �����. ����������� ��������� ���: ����������/�������� ���������� � ��������� ���� ���� configuration.php � ��������� �� ������!</span>');
define('_INSTALL_SESSION_CAT','������� ��� ������ ������');
define('_INSTALL_NOTINSTALL','�� ����������');
define('_INSTALL_REGISTER_GLOBALS_OFF_ON','�������� PHP magic_quotes_gpc - &laquo;OFF&raquo; ������ &laquo;ON&raquo;');
define('_INSTALL_REGISTER_GLOBALS_ON_OFF','�������� PHP register_globals - &laquo;ON&raquo; ������ &laquo;OFF&raquo;');
define('_INSTALL_RG_EMULATION_ON_OFF','�������� RG_EMULATION � ����� globals.php -<br />&laquo;ON&raquo; ������ &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - �� ��������� - ��� �������������</span>');
define('_INSTALL_DIRECTIVE','���������');
define('_INSTALL_RECOMEND','�������������');
define('_INSTALL_INSTALLING','�����������');
define('_INSTALL_TEXT1','���� �� ������� ������� ���������, ��������� �������� � ������� �� ����� ��������� ��� ������ Joostina, �� �� ���� �������� ��� ����� �������� <strong class="red">������� ������</strong>. ��� ����������� � ��� ���������� ������ ������� ����������� ��������� ��� ����������� ���������.');
define('_INSTALL_TEST','�������� ������������:');
define('_INSTALL_TEXT2','<p>��������� ��������� PHP �������� �������������� ��� <strong>������������</strong> � �� ������������� ��������:</p><p>����������, �� �������������� ����������� ����������� �� <a href="http://forum.joostina.ru" target="_blank">����������� ����� Joostina</a>.</p>');
define('_INSTALL_PHP_REC_SETS','������������� ��������� PHP:');
define('_INSTALL_TEXT3','&nbsp;&nbsp;��� ��������� PHP ������������� ��� ������ ������������� � Joostina.<br />������, Joostina ����� ��������, ���� ��� ��������� �� � ������ ���� ������������� �������������.');
define('_INSTALL_RG_EMULATION','�������� Register Globals');
define('_INSTALL_ALL_SERV_CHARS','����������� �������������� �������');
define('_INSTALL_TEXT4','��������� ��������� ������ �� �������� ���������� ��� ������, �� ������������ ��������� ��������� �������� ������ � Joostina ������������ �������� � ������������.');
define('_INSTALL_FILES_AND_CATS_PERMS','����� ������� � ������ � ���������:');
define('_INSTALL_TEXT5','��� ���������� ������ Joostina ����������, ����� �� ������������ ����� � �������� ���� ����������� ����� ������. ���� �� ������ <strong class="red">���������� ��� ������</strong> ��� ��������� ������ � ���������, �� ���������� ���������� �� ��� ����� �������, ����������� �������������� ��.');
define('_INSTALL_REV_PERMS_SISCATS','��������� ����� ������� � ��������� ���������');
define('_INSTALL_FOOTER','<a href="http://www.joostina.ru" target="_blank" title="Joostina">Joostina</a> - ��������� ����������� �����������, ���������������� �� �������� GNU/GPL.');
define('_INSTALL_WRITEABLE','<strong class="green">�������� ��� ������</strong>');
define('_INSTALL_UNWRITEABLE','<strong class="red">���������� ��� ������</strong>');
//install
define('_INSTALL_TITLE1','Joostina - Web-���������. �������� ��������');
define('_INSTALL_LICENSE1','<span>��������</span>');
define('_INSTALL_LICENSETEXT','Joostina- ��������� ����������� �����������, ���������������� �� �������� GNU/GPL, ��� ������������� ������� �� ������ ��������� ����������� � ��������������� ���������.');
//install1
define('_INSTALL_TITLE2','Joostina - Web-���������. ��� 1 - ������������ ���� ������.');
define('_INSTALL_DB_CONFIG','<span>������������ ���� ������</span>');
define('_INSTALL_1_INFO1','����������, ������� ��� ����� MySQL.');
define('_INSTALL_1_INFO2','����������, ������� ��� ������������ ���� ������ MySQL.');
define('_INSTALL_1_INFO3','����������, ������� ��� ��� ����� ����� ��.');
define('_INSTALL_1_INFO4','��� ���������� ������ Joostina �� ������ ������ ������� ������ �� MySQL.');
define('_INSTALL_1_INFO5','�� �� ������ ������������ ������� ������ &laquo;old_&raquo;, ��� ��� Joostina ���������� ��� ��� �������� ��������� ������.');
define('_INSTALL_1_INFO6','�� �������, ��� ��������� ����� ������? Joostina ����� ��������� ������� � ��, ��������� ������� �� �������.');
define('_INSTALL_DBHOSTNAME','��� ����� MySQL');
define('_INSTALL_DBHOSTNAME_TEXT','������ ��� <strong>localhost</strong>.');
define('_INSTALL_DBUSERNAME','��� ������������ MySQL');
define('_INSTALL_DBUSERNAME_TEXT','��� ��������� �� �������� ���������� ���� ����� ������������ ��� <strong class="green">root</strong>, � ��� ��������� � ���������, ������� ������, ���������� � �������.');
define('_INSTALL_DBPASSWORD','������ ������� � �� MySQL');
define('_INSTALL_DBPASSWORD_TEXT','�������� ���� ������ ��� �������� ��������� ��� ������� ������ ������� � ����� ��, ���������� � �������.');
define('_INSTALL_DBNAME','��� �� MySQL');
define('_INSTALL_DBNAME_TEXT','��� ������������ ��� ����� ��, ������� ����� �������������� ��� �����.');
define('_INSTALL_DBPREFIX','������� ������ �� MySQL');
define('_INSTALL_DBPREFIX_TEXT','����������� ������� ������ ��� ��������� � ���� ��. �� ����������� <strong class="red">old_</strong> - ��� ����������������� ��������.');
define('_INSTALL_DBDEL','������� ������������ �������');
define('_INSTALL_DBDEL_TEXT','��� ������������ ������� �� ���������� ��������� Joostina ����� �������.');
define('_INSTALL_DBBACKUP','������� ��������� ����� ������������ ������');
define('_INSTALL_DBBACKUP_TEXT','��� ������������ ��������� ����� ������ �� ���������� ��������� Joostina ����� ��������.');
define('_INSTALL_DBSAMPLE','���������� ���������������� ������');
define('_INSTALL_DBSAMPLE_TEXT','�� ���������� ���, ���� �� ��� �� ������� � Joostina!');
define('_INSTALL_DBOLD','��������� MySQL ������ 4.1');
define('_INSTALL_DBOLD_TEXT','������������ ������ � ������ ������������� � �������� �������� ���� ������.');
define('_INSTALL_DBEXP','����� ��� ������');
define('_INSTALL_DBEXP_TEXT','<strong class="red">��������! ����������������� �����.</strong><br />������������ ����� ��� ������ ��� ������ �������.');
//install2
define('_INSTALL_TITLE3','Joostina - Web-���������. ��� 2 - �������� ������ �����.');
define('_INSTALL_SITENAME','<span>�������� �����</span>');
define('_INSTALL_DB_INPUT_ERROR','��������� ������ ��� ������� ������ � ���� ���� ������!<br />����������� ��������� ����������!');
define('_INSTALL_SITENAME_TEXT','��� ������������ ��� �������������� �������� ��������� �� ����������� ����� � ����� ������������ � ��������� �����.');
define('_INSTALL_SITENAME_VAR','��������: ��� ����� ����!');
define('_INSTALL_ERRORS','������:');
define('_INSTALL_2_INFO1','������� �������� ������ �����!');
define('_INSTALL_2_INFO2','������ �������� ������: ');
define('_INSTALL_2_INFO3','���� ������� �������� ������ � �� MySQL ��� �� ��������� ����������� ���� �����.');
define('_INSTALL_2_INFO4','�� ������ �� ������� ������� ���� ������.');
define('_INSTALL_2_INFO5','������� �������� ��� ������������ � ������.');
//install3
define('_INSTALL_TITLE4','Joostina - Web-���������. ��� 3 - ������������ �����');
define('_INSTALL_SITECONFIG','<span>������������ �����</span>');
define('_INSTALL_SITECONFIG_TEXT','<p>���� �� �� ������� � ������������ ��������, �������� �������� �� ���������.<br />����� �� ������� �������� ��� ��������� � ���������� ������������ �����.</p>');
define('_INSTALL_ALL','���:');
define('_INSTALL_GROUP','������:');
define('_INSTALL_OWNER','��������:');
define('_INSTALL_READ','������');
define('_INSTALL_WRITE','������');
define('_INSTALL_SEARCH','�����');
define('_INSTALL_EXECUTE','����������');
define('_INSTALL_DIRPERMS','����� ������� � ���������');
define('_INSTALL_DIRPERMS_TEXT','�� ������ CHMOD (������������ ��������� �������)');
define('_INSTALL_DIRPERMS_CHMOD','CHMOD ���������:');
define('_INSTALL_FILEPERMS','����� ������� � ������');
define('_INSTALL_FILEPERMS_TEXT','�� ������ CHMOD (������������ ��������� �������)');
define('_INSTALL_FILEPERMS_CHMOD','CHMOD ������:');
define('_INSTALL_ADMINPASSWORD','������ ��������������');
define('_INSTALL_ADMINPASSWORD_TEXT','������������� ������������ ������ �� ������ <strong>6</strong> ��������.');
define('_INSTALL_ADMINEMAIL','��� E-mail');
define('_INSTALL_ADMINEMAIL_TEXT','������������ ��� ����� �������� �������������� �����.');
define('_INSTALL_ADMINLOGIN','��� �����');
define('_INSTALL_ADMINLOGIN_TEXT','������������ ��� ����� ��� ����������� �������� �������������� �����.');
define('_INSTALL_SITEURL','URL �����');
define('_INSTALL_ABSOLUTEPATH','���������� ����');
define('_INSTALL_3_INFO1','������� URL �����.');
define('_INSTALL_3_INFO2','������� ���������� ���� �� ������ �����.');
define('_INSTALL_3_INFO3','������� E-mail �������������� ����� ��� ����� � ���.');
define('_INSTALL_3_INFO4','������� ������ ������ ��������������.');
//install4
define('_INSTALL_TITLE5','Joostina - Web-���������. ��� 4 - ��������� ���������');
define('_INSTALL_4_INFO1','<span id="alert_mess" class="error">����������, ������� ������� &laquo;INSTALLATION&raquo;,<br />����� ��� ���� �� ����������</span>');
define('_INSTALL_SITEVIEW','�������� �����');
define('_INSTALL_ADMINPANEL','������ ����������');
define('_INSTALL_DEL_INSTALL','������� installation');
define('_INSTALL_ADMININFO','������ ��� ����������� �������� �������������� �����:');
define('_INSTALL_LOGIN','�����: ');
define('_INSTALL_PASSWORD','������: ');
define('_INSTALL_CONFIGFILE_ERROR','��� ���������������� ���� ��� ������ ������� ���������� ��� ������, ��� ���� �����-�� �������� � ��������� ��������� ����������������� �����. ��� �������� ��������� ���� ��� �������.<br />����������� �������� � ���������� ���� ��������� ���:');
define('_INSTALL_CHMOD_REPORT1','����� ������� � ������ � ��������� �� ��������.');
define('_INSTALL_CHMOD_REPORT2','����� ������� � ������ � ��������� ������� ��������.');
define('_INSTALL_CHMOD_REPORT3','����� ������� � ������ � ��������� �� ����� ���� ��������.<br />����������, ���������� CHMOD ��������� � ������ Joostina �������.');