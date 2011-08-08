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
/*******************************************************************************
** The Russian language file for joomlaXplorer until further notice
** Created by AllXXX & boston from Russian Joomla! Team
** (c) 2006 Joom.Ru - Russian home of Joomla!
** Encoding: Win-1251
*******************************************************************************/

global $_VERSION;

$GLOBALS['charset'] = 'windows-1251';
$GLOBALS['text_dir'] = 'ltr'; // ('ltr' ��� ����� �������, 'rtl' ��� ������ ������)
$GLOBALS['date_fmt'] = 'Y/m/d H:i';
$GLOBALS['error_msg'] = array( // ������
	'error' => '������(�)','back' => '���������', // �������� �������
	'home' => '�������� ������� �� ����������! ��������� ���������.','abovehome' =>
	'������� ������� �� ����� ���������� ���� ��������� ��������.',
	'targetabovehome' =>
	'������������� ������� �� ����� ���������� ���� ��������� ��������.',
	// ������������
	'direxist' => '������� �� ����������','fileexist' =>
	'������ ����� �� ����������','itemdoesexist' => '����� ������ ��� ����������',
	'itemexist' => '������ ������� ����������','targetexist' =>
	'������������ �������� �� ����������','targetdoesexist' =>
	'������������ ������� �� ����������', // �������
	'opendir' => '���������� ������� �������','readdir' =>
	'���������� ��������� �������', // ������
	'accessdir' => '��� ��������� �������� � ���� �������','accessfile' =>
	'��� ��������� ������������ ���� ����','accessitem' =>
	'��� ��������� ������������ ���� ������','accessfunc' =>
	'��� ��������� ������������ ��� �������','accesstarget' =>
	'��� ��������� ������� � ���� �������', // ��������
	'permread' => '������ ��� ��������� ���� �������','permchange' =>
	'������ ��� ����� ���� �������','openfile' => '������ ��� �������� �����',
	'savefile' => '������ ��� ���������� �����','createfile' =>
	'������ ��� �������� �����','createdir' => '������ ��� �������� ��������',
	'uploadfile' => '������ ��� �������� �����','copyitem' =>
	'������ ��� �����������','moveitem' => '������ ��� ��������������','delitem' =>
	'������ ��� ��������','chpass' => '������ ��� ����� ������','deluser' =>
	'������ ��� �������� ������������','adduser' =>
	'������ ��� ���������� ������������','saveuser' =>
	'������ ��� ���������� ������������','searchnothing' =>
	'������ ������ �� ������ ���� ������', // ��������������� �������
	'miscnofunc' => '������� ����������','miscfilesize' =>
	'���� ��������� ������������ ������','miscfilepart' =>
	'���� ��� �������� ��������','miscnoname' => '�� ������ ������ ���',
	'miscselitems' => '�� �� ������� ������(�)','miscdelitems' =>
	"�� �������, ��� ������ ������� \"+num+\" ������(��)?",'miscdeluser' =>
	"�� �������, ��� ������ ������� ������������ \'+user+\'?",'miscnopassdiff' =>
	'����� ������ �� ���������� �� ��������','miscnopassmatch' =>
	'������ �� ���������','miscfieldmissed' => '�� ���������� ������ ����',
	'miscnouserpass' => '��� ������������ ��� ������ �� ���������','miscselfremove' =>
	'�� �� ������ ������� ������ ����','miscuserexist' =>
	'����� ������������ ��� ����������','miscnofinduser' =>
	'���������� ����� ������������','extract_noarchive' =>
	'���� ����� �� ���������������','extract_unknowntype' =>
	'���� ����� �� ��������������');
$GLOBALS['messages'] = array( // ������
	'permlink' => '����� ���� �������','editlink' => '�������������','downlink' =>
	'�������','uplink' => '�����','homelink' => '������','reloadlink' => '��������',
	'copylink' => '����������','movelink' => '�����������','dellink' => '�������',
	'comprlink' => '������������','adminlink' => '�����������������','logoutlink' =>
	'�����','uploadlink' => '���������','searchlink' => '�����','extractlink' =>
	'���������������','chmodlink' => '����� ���� (��������(��)/�����(��))',
	'mossysinfolink' => $_VERSION->CMS.' ��������� ���������� ('.$_VERSION->CMS.
	', ������, PHP, mySQL)','logolink' =>
	'������� ���-���� joomlaXplorer � ����� ����', // ������
	'nameheader' => '����','sizeheader' => '������','typeheader' => '���',
	'modifheader' => '�������','permheader' => '�����','actionheader' => '��������',
	'pathheader' => '����', // buttons
	'btncancel' => '��������','btnsave' => '���������','btnchange' => '��������',
	'btnreset' => '��������','btnclose' => '�������','btncreate' => '�������',
	'btnsearch' => '�����','btnupload' => '��������','btncopy' => '����������',
	'btnmove' => '�����������','btnlogin' => '�����','btnlogout' => '�����',
	'btnadd' => '��������','btnedit' => '�������������','btnremove' => '�������',
	// ���������, joomlaXplorer 1.3.0 � ����
	'renamelink' => '�������������','confirm_delete_file' =>
	'�� �������, ��� ������ ������� ����? \\n%s','success_delete_file' =>
	'������(�), ������� ������..','success_rename_file' =>
	'�������/���� %s ������������ � %s.', // actions
	'actdir' => '�������','actperms' => '����� ���� �������','actedit' =>
	'�������������� �����','actsearchresults' => '�����','actcopyitems' =>
	'���������� ������(�)','actcopyfrom' => '���������� �� /%s � /%s ',
	'actmoveitems' => '����������� ������(�)','actmovefrom' =>
	'����������� �� /%s � /%s ','actlogin' => '�����','actloginheader' =>
	'�����, ����� ������ ������������ QuiXplorer','actadmin' => '�����������������',
	'actchpwd' => '������� ������','actusers' => '������������','actarchive' =>
	'������������ ������(�)','actupload' => '�������� ����(�)', // misc
	'miscitems' => '������(��)','miscfree' => '��������','miscusername' =>
	'������������','miscpassword' => '������','miscoldpass' => '������ ������',
	'miscnewpass' => '����� ������','miscconfpass' => '����������� ������',
	'miscconfnewpass' => '����������� ����� ������','miscchpass' =>
	'�������� ������','mischomedir' => '�������� �������','mischomeurl' =>
	'�������� URL','miscshowhidden' => '���������� ���������� �������',
	'mischidepattern' => '������� �����','miscperms' => '�����','miscuseritems' =>
	'(���, �������� ����������, ���������� ���������� �������, ����� �������, �������)',
	'miscadduser' => '�������� ������������','miscedituser' =>
	'������������� ������������ "%s"','miscactive' => '�������','misclang' => '����',
	'miscnoresult' => '��� �����������','miscsubdirs' => '������ � ������������',
	'miscpermnames' => array('������ ��������','��������������','����� ������',
	'������ � ����� ������','�������������'),'miscyesno' => array('��','���','�',
	'�'),'miscchmod' => array('��������','������','��������'),
	// from here all new by mic
	'miscowner' => '��������','miscownerdesc' =>
	'<strong>Description:</strong><br />User (UID) /<br />Group (GID)<br />Current rights:<br /><strong> %s ( %s ) </strong>/<br /><strong> %s ( %s )</strong>',
	// sysinfo (new by mic)
	'simamsysinfo' => $_VERSION->CMS.' ����������','sisysteminfo' => '� �������',
	'sibuilton' => '�������','sidbversion' => '������ ���� ������','siphpversion' =>
	'������ PHP','siphpupdate' =>
	'INFORMATION: <span style="color: red;">The PHP version you use is <strong>not</strong> actual!</span><br />To guarantee all functions and features of '.
	$_VERSION->CMS.' and addons,<br />you should use as minimum <strong>PHP.Version 4.3</strong>!',
	'siwebserver' => '���-������','siwebsphpif' =>
	'��������� ����� ���-�������� � PHP','simamboversion' => '������ '.$_VERSION->CMS,
	'siuseragent' => '������� (User Agent)','sirelevantsettings' =>
	'������ ��������� PHP','sisafemode' => '�������� Joomla! Register Globals',
	'sibasedir' => 'Open basedir','sidisplayerrors' => 'PHP Errors',
	'sishortopentags' => 'Short Open Tags','sifileuploads' => 'Datei Uploads',
	'simagicquotes' => 'Magic Quotes','siregglobals' => 'Register Globals',
	'sioutputbuf' => 'Output Buffer','sisesssavepath' => 'Session Savepath',
	'sisessautostart' => 'Session auto start','sixmlenabled' => 'XML enabled',
	'sizlibenabled' => 'ZLIB enabled','sidisabledfuncs' => 'Non enabled functions',
	'sieditor' => 'WYSIWYG Editor','siconfigfile' => '���������������� ����',
	'siphpinfo' => 'PHP Info','siphpinformation' => '���������� � PHP',
	'sipermissions' => '����������','sidirperms' => '����� ������� �� ��������',
	'sidirpermsmess' => '��� ������ ���� ������� � ������������ '.$_VERSION->CMS.
	' , ��� ��������� ���� �������� ������ ���� �������� ��� ������','sionoff' =>
	array('���.','����.'),'extract_warning' =>
	'�� ������������� ������ ��������������� ���� ����?\\n ������������ ����� ����� ������������!',
	'extract_success' => '������� ���������������','extract_failure' =>
	'������ ��� ����������������','overwrite_files' => '������������ ����(�)?',
	'viewlink' => '��������','actview' => '�������� �����',
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_chmod.php file
	'recurse_subdirs' => '��������� ��� ������������',
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to footer.php file
	'check_version' => '��������� ��������� ������',
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_rename.php file
	'rename_file' => '�������������� �������� ��� �����','newname' => '����� ���',
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_edit.php file
	'returndir' => '��������� � ������� ����� ����������','line' => '������',
	'column' => '�������','wordwrap' =>
	'�������������� ������� �����: (������ � IE)','copyfile' =>
	'����������� ���� �:', // Bookmarks
	'quick_jump' => '������� �������','already_bookmarked' =>
	'������� ��� ���������� � ���������','bookmark_was_added' =>
	'������� ��� �������� � ��������','not_a_bookmark' =>
	'������� is not a bookmark.','bookmark_was_removed' =>
	'������� ��� ������ �� ��������','bookmarkfile_not_writable' => '������  %s \n ���� �������� "%s" \n �� ����������������.',
	'lbl_add_bookmark' => '�������� ������� � ��������','lbl_remove_bookmark' =>
	'������� ������� �� ��������','enter_alias_name' =>
	'����������, ������� ��� ��������','normal_compression' => '���������� ������',
	'good_compression' => '������� ������','best_compression' => '������ ������',
	'no_compression' => '��� ������','creating_archive' => '�������������...',
	'processed_x_files' => '���������� %s %s �����','ftp_login_lbl' =>
	'������� ��� � ������ ��� ����������� � FTP �������','ftp_login_name' =>
	'��� ������������ FTP','ftp_login_pass' => '������ FTP','ftp_hostname_port' =>
	'��� ����� FTP ������� � ���� <br />(���� �������������)','ftp_login_check' =>
	'����������� FTP �������...','ftp_connection_failed' =>
	"������: ���������� ����������� � FTP ��������.\n ���������� ��������� ������������ �� FTP ��� ������.",
	'ftp_login_failed' =>
	'������ ����������� � FTP �������. ����������, ��������� ��� � ������ ������������ � ����������� �����.',
	'switch_file_mode' =>
	'����� ������: <strong>%s</strong>. �� ������ ������������� � ����� %s.',
	'symlink_target' => '������� ������������� �����','archive_name' =>
	'��� ����� ������','archive_saveToDir' => '����� ������� � �������',
	'editor_simple' => '������� ��������','editor_syntaxhighlight' =>
	'����� �������������� � ����������');
?>
