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

// Text definitions
DEFINE('_JOOPDF_PP_ADMIN_BACK','����� � ������ ����������');
DEFINE('_JOOPDF_PP_ADMIN','������ ����������');
DEFINE('_JOOPDF_PP_YES','��');
DEFINE('_JOOPDF_PP_NO','���');
DEFINE('_JOOPDF_PP_CPANEL_NO','<br />CPanel JoostinaPDF �� �������: ');
DEFINE('_JOOPDF_PP_RETURN_CONFIRM','�� �������, ��� ������ �������� ��������� ���������?');
DEFINE('_JOOPDF_PP_DEL_CONFIRM','�� �������, ��� ������ ������� ��� ������������ �������?');
DEFINE('_JOOPDF_PP_DEL_CACHE_REP','�������� ��������� ����');
DEFINE('_JOOPDF_PP_DEL','�������');
DEFINE('_JOOPDF_PP_CONFIG_ERROR_FIND','������ ������������ ������������: ');
DEFINE('_JOOPDF_PP_WARNING','<center><h1><strong class="red">��������...</strong></h1>');
DEFINE('_JOOPDF_PP_WARNING_CHMOD_1','<p><strong>������������ ');
DEFINE('_JOOPDF_PP_WARNING_CHMOD_2',' �� ����� ���� ��������.');
DEFINE('_JOOPDF_PP_WARNING_CHMOD','<br />���������� chmod 666 ��� ���������� �����!</strong></center></p>');
DEFINE('_JOOPDF_PP_ART_N_FOUND','������ �� �������!');

DEFINE('_JOOPDF_PP_CONFIG_SAVE','���� ������������ ��������!');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_OPEN','FATAL ERROR: ������������ �� ����� ���� �������.');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP','FATAL ERROR: ���� ������ �� ������! ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_1','FATAL ERROR: ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_2',' ������ ����������!');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_1','��������� ������: ����� ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_BACKUP_2',' �� ����� ���� ������� � ');
DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_REST_1','��������� ������: ���������� ������������ pdf.php Joostina: ');

DEFINE('_JOOPDF_PP_CONFIG_FAT_ERROR_WRIT','��������� ������: ������������ �� �������� ��� ������!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_EMPTY_DIR','������������ �� ����� ���� ��������� ��� ����������!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_DIR','������������ �� ����� ���� ��������� � �������������� ���������� ���!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_CACHE_NO_DIR','������������ �� ���������. ������ �������������� ���������� ���! ��������.');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR_WRIT','������������ �� ����� ���� ���������, ������ ��� ���������� ���� �� �������� ��� ������!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR1_SEP_NAME','������������ �� ����� ���� ���������, ������ ��� ����������� ���� ������������ � �������� ���������� ���!');
DEFINE('_JOOPDF_PP_CONFIG_SAVE_ERROR2_SEP_NAME','������������ �� ����� ���� ���������, ������ ��� ����������� ���� �� ����� ���� ������ (.)!');

DEFINE('_JOOPDF_PP_INST_BACKUP_AL_EXISTS','����� pdf.php ������ � ');
DEFINE('_JOOPDF_PP_INST_FAILED_COPY_1','FAILED to make a copy of the original pdf.php file');
DEFINE('_JOOPDF_PP_INST_SUCCS_1','<table><tr><td valign="top"><p>��������� JoostinaPDF ���������.</p>');
DEFINE('_JOOPDF_PP_INST_SUCCS_2','<p>������� �� ��������� ���������� �� JoostinaTeam (www.joostina.ru)</p></td></tr></table>');
DEFINE('_JOOPDF_PP_INST_FAT_ERROR_1','��������� ������: ���������� ���������� ����� JoostinaPDF: ');
DEFINE('_JOOPDF_PP_TO',' � ');
DEFINE('_JOOPDF_PP_INST_FAT_ERROR_2','<br />Please do it manually or correct the permissions on ');
DEFINE('_JOOPDF_PP_INST_1','<font color=red>Could not install JoostinaDF due to <strong>incorrect</strong> permission settings.</font><br />');
DEFINE('_JOOPDF_PP_INST_2','Please set the file permissions for the following files to <strong>writeable</strong>:<br />');
DEFINE('_JOOPDF_PP_INST_3','<br /><br />After you have corrected the file permissions please install the needed pdf.php file with the cpanel option <strong>(Re)install JoostinaPDF pdf.php</strong>');
DEFINE('_JOOPDF_PP_INST_4','<br /><br />An alternative is to manually copy the file /administrator/components/com_joostinapdf/pdf.php to the /includes directory.<br />');
DEFINE('_JOOPDF_PP_INST_5','Please make a backup/copy of pdf.php before overwriting the original Joostina pdf.php with the JoostinaPDF version.</td></tr></table>');
DEFINE('_JOOPDF_PP_INST_REQ_NOT_TYPE','Required file/dir is not of this type! ');
DEFINE('_JOOPDF_PP_INST_FILE_NOT_EXISTS','���� �� ������! ');

DEFINE('_JOOPDF_PP_UNINST_1','Could not restore the orginal pdf.php file due to <strong>incorrect</strong> permission settings.<br />');
DEFINE('_JOOPDF_PP_UNINST_2','Please set the correct file permissions for the following file:<br />');
DEFINE('_JOOPDF_PP_UNINST_3','<br /><br />After you have corrected the file permissions please restore the orginal files with the cpanel option <strong>Restore Joostina backup files files</strong>');
DEFINE('_JOOPDF_PP_UNINST_REST_ORIG_PDF','������������ ���� pdf.php Joostina ������������!');
DEFINE('_JOOPDF_PP_UNINST_FAILED_REST_ORIG_PDF','FAILED to restore the orginal Joostina pdf.php file!');

DEFINE('_JOOPDF_PP_TITLE_FORMAT','������ ���������');
DEFINE('_JOOPDF_PP_TITLE_FORMAT_HELP','��� {title} ����� ������� ���������� �����������.');
DEFINE('_JOOPDF_PP_STANDARD_TITLE_FONT','����� ���������');
DEFINE('_JOOPDF_PP_STANDARD_TITLE_SIZE','������ ������ ���������');
DEFINE('_JOOPDF_PP_STANDARD_FONT','����������� �����');
DEFINE('_JOOPDF_PP_STANDARD_SIZE','����������� ������ ������');
DEFINE('_JOOPDF_PP_STANDARD_ENCODING','���������');
DEFINE('_JOOPDF_PP_BULLET_CHAR','������� ����������� ������');
DEFINE('_JOOPDF_PP_SHOW_IMAGES','����������� �����������');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN','������� ����������� ��-���������');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_FORCED','������������ ������� ����������� ��-���������');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_C','�� ������');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_L','�����');
DEFINE('_JOOPDF_PP_IMAGE_ALIGN_R','������');
DEFINE('_JOOPDF_PP_SHOW_LINKS','�������� ������');
DEFINE('_JOOPDF_PP_SHOW_TABLES','Render tables');
DEFINE('_JOOPDF_PP_SHOW_TABLES_HELP','<strong class="red">Beware of incorrect rendering of tables or nested tabels! Test this thorrowly throughout your whole site!</strong>');

DEFINE('_JOOPDF_PP_S_B','<strong>Space below</strong>');
DEFINE('_JOOPDF_PP_H1_FORMAT','��������� ���� H1');
DEFINE('_JOOPDF_PP_H2_FORMAT','��������� ���� H2');
DEFINE('_JOOPDF_PP_H3_FORMAT','��������� ���� H3');
DEFINE('_JOOPDF_PP_H4_FORMAT','��������� ���� H4');
DEFINE('_JOOPDF_PP_H5_FORMAT','��������� ���� H5');
DEFINE('_JOOPDF_PP_H6_FORMAT','��������� ���� H6');
DEFINE('_JOOPDF_PP_IGNORE_FONTSIZE','������������ ������� ������ �����');

DEFINE('_JOOPDF_PP_TEMPLATE_FILE','���� �������');
DEFINE('_JOOPDF_PP_TEMPLATE_FILE_NONE','�� ������������ ������');
DEFINE('_JOOPDF_PP_TEMPLATE_FILE_HELP','PDF ���� ������ ��������� � /administrator/components/com_joostinapdf/presets/');
DEFINE('_JOOPDF_PP_TEMPLATE_FIRSTPAGE_NO','������ ��� ������ ��������');
DEFINE('_JOOPDF_PP_TEMPLATE_NO_FILES','�� ������� ������� PDF ������ � ');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_TOP','������ ������ �������� ������');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_BOTTOM','������ ������ �������� �����');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_LEFT','������ ������ �������� �����');
DEFINE('_JOOPDF_PP_MARGIN_FIRST_RIGHT','������ ������ �������� ������');

DEFINE('_JOOPDF_PP_TEMPLATE_OTHERPAGE_NO','������� ��� ������ �������');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_TOP','������ ������ ������� ������');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_BOTTOM','������ ������ ������� �����');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_LEFT','������ ������ ������� �����');
DEFINE('_JOOPDF_PP_MARGIN_OTHER_RIGHT','������ ������ ������� ������');

DEFINE('_JOOPDF_PP_HEADER_FORMAT','������ ������ &laquo;�����&raquo;');
DEFINE('_JOOPDF_PP_HEADER_POS_X','������� &laquo;�����&raquo; X');
DEFINE('_JOOPDF_PP_HEADER_POS_Y','������� &laquo;�����&raquo; Y');
DEFINE('_JOOPDF_PP_FOOTER_FORMAT','������ ������ &laquo;�������&raquo;');
DEFINE('_JOOPDF_PP_FOOTER_POS_X','������� &laquo;�������&raquo; X (������ �����)');
DEFINE('_JOOPDF_PP_FOOTER_POS_Y','������� &laquo;�������&raquo; Y (������ �����)');

DEFINE('_JOOPDF_PP_PDF_PREVIEW','������� pdf ���� ��� �������������');

DEFINE('_JOOPDF_PP_PROMOTION_FILE','�������� �������� �������');
DEFINE('_JOOPDF_PP_PROMOTION_FILE_NONE','�� ������������ �������� �������');
DEFINE('_JOOPDF_PP_PROMOTION_FILE_HELP','The PDF file with the promotional pages in /administrator/components/com_joostinapdf/presets/');
DEFINE('_JOOPDF_PP_PROMOTION_PAGES','������� ������� �������');
DEFINE('_JOOPDF_PP_PROMOTION_PAGES_HELP','<p>On what page numbers the promotional pages must be shown. The pages will be picked randomly from the source pdf. (comma seperated, last=last page. Example: 1,3,last)</p>');
DEFINE('_JOOPDF_PP_PROMOTION_NO_FILES','�� ������� ��������� PDF-����� � ');

DEFINE('_JOOPDF_PP_INSTALL','<p><strong>����������� � ������� ����:</strong></p><p>Click on the button below if you want to (re)install the JoomlAtWork pdf.php file to enable JoostinaPDF.</p><p>(Re)installation must be done if you have received an error message when installing the component. Normally this is due to incorrect file permission settings of the web environment. Please correct these file permission first before reinstallation.</p>');
DEFINE('_JOOPDF_PP_RESTORE','<p><strong>����������� � ������� ����:</strong></p><p>Click on the button if you want to restore the orginal Joomla pdf.php file. By restoring the original pdf.php file you will revert to the default Joomla PDF generation.</p><p>You can reinstall JoostinaPDF again using the Joomlatwork JRE JoostinaPDF control panel.</p>');
DEFINE('_JOOPDF_PP_DOINSTALL','���������');
DEFINE('_JOOPDF_PP_OKINSTALL','��������� JoostinaPDF ��������� �������!');
DEFINE('_JOOPDF_PP_PERMS_NOK','Please correct the file permission first!');
DEFINE('_JOOPDF_PP_DORESTORE','������������');
DEFINE('_JOOPDF_PP_OKRESTORE','�������������� ������������� ����� pdf.php Joostina ��������� �������!');
DEFINE('_JOOPDF_PP_PERMISSION','can be written?');
DEFINE('_JOOPDF_PP_BACKUP_EXISTS','Backup of original pdf.php exists?');

DEFINE('_JOOPDF_PP_CACHE_ENABLE','������������ ��� PDF');
DEFINE('_JOOPDF_PP_CACHE_DIR','����� ��� PDF');
DEFINE('_JOOPDF_PP_CACHE_SEP','����������� ��� �����');
DEFINE('_JOOPDF_PP_CACHE_SEP_HELP','<strong class="red">�������������, ��� ����������� ����� ��� PDF �� ������������ � �������� ���������� ���!</strong>');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY','��������� ���');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY0','���������� ���� ��� � ����');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY1','���������� ��� �����������');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY2','���������� ���� ��� � ���� � ��� �����������');
DEFINE('_JOOPDF_PP_CACHE_STRATEGY3','���������� ����� x-�������� ��������');
DEFINE('_JOOPDF_PP_CACHE_FILES','Currently cached files');
DEFINE('_JOOPDF_PP_CACHE_FILES_CONTENTID','Id �����������');
DEFINE('_JOOPDF_PP_CACHE_FILES_MODIFYDATE','���� �����������');
DEFINE('_JOOPDF_PP_CACHE_FILES_RENDERDATE','Render Date');
DEFINE('_JOOPDF_PP_CACHE_FILES_ACCESSCNT','������� �������� (������������ ��� �������� x-�������� ��������)');
DEFINE('_JOOPDF_PP_CACHE_REFRESH','��������');

DEFINE('_JOOPDF_PP_REPLACEMENT','������');
DEFINE('_JOOPDF_PP_REPLACEMENT_HELP','<p>Replacements must be entered one on each line and must be like: <em>some text=some replacement</em></p><p>The * can be used once in the <em>some text</em> part and acts as a placeholder for any number of characters.</p><p>The = sign can NOT be used the <em>some text</em> part.</p><p>Examples:</p><ul><li>{mospagebreak*}=&lt;br /&gt; This suppresses mospagebreaks to avoid forced new pages</li><li>{styleboxjp*}=&lt;font color="red"&gt; Renders the styleboxjp mambots to red-text output</li><li>{/styleboxjp}=&lt;/font&gt; This is the close tag for the styleboxjp mambot</li></ul>');

// CPANEL definition
$i=1;
$cpanel[$i]['TASK'] = 'styleconfig';
$cpanel[$i]['TEXT'] = '��������� ������ � PDF';
$cpanel[$i]['DESCR'] = '��������� ��������� PDF ������ �����������';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'templateconfig';
$cpanel[$i]['TEXT'] = '������ PDF';
$cpanel[$i]['DESCR'] = '����� � ��������� ������������� ������� PDF';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'headerfooterconfig';
$cpanel[$i]['TEXT'] = '&laquo;�����&raquo; � &laquo;������&raquo; PDF';
$cpanel[$i]['DESCR'] = '��������� &laquo;�����&raquo; � &laquo;�������&raquo; ������������ PDF';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/config.png';
++$i;
$cpanel[$i]['TASK'] = 'replacementconfig';
$cpanel[$i]['TEXT'] = '��������� � PDF';
$cpanel[$i]['DESCR'] = '��������� ������������ ������ ����� �/��� ��������';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/replacement.png';
++$i;
$cpanel[$i]['TASK'] = 'install';
$cpanel[$i]['TEXT'] = '���������� pdf.php JoostinaPDF';
$cpanel[$i]['DESCR'] = '��������� JoostinaPDF pdf.php ����� � ����� /includes.';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/install.png';
++$i;
$cpanel[$i]['TASK'] = 'restore';
$cpanel[$i]['TEXT'] = '������������ pdf.php Joostina';
$cpanel[$i]['DESCR'] = '�������������� ������������� ����� pdf.php Joostina �� ������';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/restore.png';
++$i;
$cpanel[$i]['TASK'] = 'promotionconfig';
$cpanel[$i]['TEXT'] = '������� � PDF';
$cpanel[$i]['DESCR'] = '������������ ��������� �������������� ��������� �������';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/adw.png';
++$i;
$cpanel[$i]['TASK'] = 'cache';
$cpanel[$i]['TEXT'] = '��� PDF ������';
$cpanel[$i]['DESCR'] = '��������� � ���������� ��� PDF ������';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/database.png';
++$i;
$cpanel[$i]['TASK'] = '';
$cpanel[$i]['TEXT'] = '������������ JoostinaPDF';
$cpanel[$i]['DESCR'] = '��������� ����� ������ ��� ��������������� ������������� (� ����� ����)';
$cpanel[$i]['IMG'] = 'components/com_joostinapdf/images/support.png';
$cpanel[$i]['URL'] = 'http://www.joostina.ru/';
?>