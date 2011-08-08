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
global $mosConfig_form_date, $mosConfig_form_date_full, $month_date, $month;

// �������� ����� �� �������
define('_404', '����������� �������� �� �������.');
define('_404_RTS', '��������� �� ����.');

define('_SYSERR1', '��� ��������� MySQL.');
define('_SYSERR2', '���������� ������������ � ������� ���� ������.');
define('_SYSERR3', '���������� ������������ � ���� ������.');

// Error 503 (Database Error)
define('_503', '��������, ������ �������� ����������.');
define('_503_RTS', '��������� �� ���� �����.');

// �����
DEFINE('_LANGUAGE', 'ru');
DEFINE('_NOT_AUTH', '��������, �� ��� ��������� ���� �������� � ��� ������������ ����.');
DEFINE('_DO_LOGIN', '�� ������ �������������� ��� ������ �����������.');
DEFINE('_VALID_AZ09', '����������, ���������, ��������� �� �������� %s.  ��� �� ������ ��������� ��������, ������ ������� 0-9, a-z, A-Z � ����� ����� �� ����� %d ��������.');
DEFINE('_VALID_AZ09_USER', '����������, ��������� ������� %s. ������ ��������� ������ ������� 0-9, a-z, A-Z � ����� ����� �� ����� %d ��������.');
DEFINE('_CMN_YES', '��');
DEFINE('_CMN_NO', '���');
DEFINE('_CMN_SHOW', '��������');
DEFINE('_CMN_HIDE', '������');
DEFINE('_CMN_NAME', '���');
DEFINE('_CMN_DESCRIPTION', '��������');
DEFINE('_CMN_SAVE', '���������');
DEFINE('_CMN_APPLY', '���������');
DEFINE('_CMN_CANCEL', '������');
DEFINE('_CMN_PRINT', '������');
DEFINE('_CMN_PDF','PDF');
DEFINE('_CMN_EMAIL', 'E-mail');
DEFINE('_CMN_SITEMAP', '����� �����');
DEFINE('_ICON_SEP', '|');
DEFINE('_CMN_PARENT', '��������');
DEFINE('_CMN_ORDERING', '����������');
DEFINE('_CMN_ACCESS', '������� �������');
DEFINE('_CMN_SELECT', '�������');
DEFINE('_CMN_SELECT_PH', '����������� �����');
DEFINE('_CMN_NEXT', '����.');
DEFINE('_CMN_NEXT_ARROW', '&nbsp;&raquo;');
DEFINE('_CMN_PREV', '����.');
DEFINE('_CMN_PREV_ARROW', '&laquo;&nbsp;');
DEFINE('_CMN_SORT_NONE', '��� ����������');
DEFINE('_CMN_SORT_ASC', '�� �����������');
DEFINE('_CMN_SORT_DESC', '�� ��������');
DEFINE('_CMN_NEW', '�������');
DEFINE('_CMN_NONE', '���');
DEFINE('_CMN_LEFT', '�����');
DEFINE('_CMN_RIGHT', '������');
DEFINE('_CMN_CENTER', '�� ������');
DEFINE('_CMN_ARCHIVE', '�������� � �����');
DEFINE('_CMN_UNARCHIVE', '������� �� ������');
DEFINE('_CMN_TOP', '������');
DEFINE('_CMN_BOTTOM', '�����');
DEFINE('_CMN_PUBLISHED', '������������');
DEFINE('_CMN_UNPUBLISHED', '�� ������������');
DEFINE('_CMN_EDIT_HTML', '������������� HTML');
DEFINE('_CMN_EDIT_CSS', '������������� CSS');
DEFINE('_CMN_DELETE', '�������');
DEFINE('_CMN_FOLDER', '�������');
DEFINE('_CMN_SUBFOLDER', '����������');
DEFINE('_CMN_OPTIONAL', '�� �����������');
DEFINE('_CMN_REQUIRED', '�����������');
DEFINE('_CMN_CONTINUE', '����������');
DEFINE('_STATIC_CONTENT', '����������� ����������');
DEFINE('_CMN_NEW_ITEM_LAST', '�� ��������� ����� ������� ����� ��������� � ����� ������. ������� ������������ ����� ���� ������� ������ ����� ���������� �������.');
DEFINE('_CMN_NEW_ITEM_FIRST', '�� ��������� ����� ������� ����� ��������� � ������ ������. ������� ������������ ����� ���� ������� ������ ����� ���������� �������.');
DEFINE('_LOGIN_INCOMPLETE', '����������, ��������� ���� &laquo;��� ������������&raquo; � &laquo;������&raquo;.');
DEFINE('_LOGIN_BLOCKED', '��������, ���� ������� ������ �������������. �� ����� ��������� ����������� ���������� � �������������� �����.');
DEFINE('_LOGIN_INCORRECT', '������������ ��� ������������ (�����) ��� ������. ���������� ��� ���.');
DEFINE('_LOGIN_NOADMINS', '��������, �� �� ������ ����� �� ����. �������������� �� ����� �� ����������������.');
DEFINE('_CMN_JAVASCRIPT', '��������! ��� ���������� ������ ��������, � ����� �������� ������ ���� �������� ��������� Java-script.');
DEFINE('_NEW_MESSAGE', '��� ������ ����� ������ ���������.');
DEFINE('_MESSAGE_FAILED', '������������ ������������ ���� �������� ����. ��������� �� ����������.');
DEFINE('_CMN_IFRAMES', '��� �������� ����� ���������� �����������. ��� ������� �� ������������ ��������� ������ (IFrame).');
DEFINE('_INSTALL_3PD_WARN', '��������������: ��������� ��������� ���������� ����� �������� ������������ ������ �����. ��� ���������� Joostina ��������� ���������� �� �����������.<br />��� ��������� �������������� ���������� � ����� ������ ������ ����� � �������, ����������, �������� <a href="http:// forum.joostina.ru" target="_blank" style="color:blue;text-decoration:underline;">����� Joostina</a>.');
DEFINE('_INSTALL_WARN', '�� ������������ ������������, ����������, ������� ������� <strong>installation</strong> � ������ ������� � �������� ��������.');
DEFINE('_TEMPLATE_WARN', '<strong class="red">���� ������� �� ������!</strong><br />������� � ������ ���������� ������ � �������� ����� ������.');
DEFINE('_NO_PARAMS', '������ �� �������� ������������� ����������.');
DEFINE('_HANDLER', '���������� ��� ������� ���� �����������.');

/** ������� */
DEFINE('_TOC_JUMPTO', '����������');

/* plugin_jw_ajaxvote */
DEFINE('_PJA_SAVE', '����������');
DEFINE('_PJA_YOU_VOTE_ADD', '��� ����� ��� ����!');
DEFINE('_PJA_VOTE', '�����');
DEFINE('_PJA_VOTES', '�������');
DEFINE('_PJA_THANKS_FULL', '������� �� ��� �����! ���������� ���� ��������� ����� �����������.');
DEFINE('_PJA_THANKS', '������� �� ��� �����!');
DEFINE('_PJA_1_5', '1 ���� �� 5');
DEFINE('_PJA_2_5', '2 ����� �� 5');
DEFINE('_PJA_3_5', '3 ����� �� 5');
DEFINE('_PJA_4_5', '4 ����� �� 5');
DEFINE('_PJA_5_5', '5 ������ �� 5');

/* joostinasocialbot */
DEFINE('_JSB_BEFORE', '�������� �������� �');
DEFINE('_JSB_ADD', '�������� �������� �');
DEFINE('_JSB_AFTER', '�������� ��� ����������� Joostina CMS!');

/**  ���������� */
DEFINE('_READ_MORE', '���������');
DEFINE('_READ_MORE_REGISTER', '������ ��� ������������������ �������������');
DEFINE('_MORE', '�����');
DEFINE('_ON_NEW_CONTENT', '������������ [ %s ] ������� ����� ������ [ %s ]. ������: [ %s ]/���������: [ %s ]');
DEFINE('_SEL_CATEGORY', '-�������� ���������-');
DEFINE('_SEL_SECTION', '-�������� ������-');
DEFINE('_SEL_AUTHOR', '-�������� ������-');
DEFINE('_SEL_POSITION', '-�������� �������-');
DEFINE('_SEL_TYPE', '-�������� ���-');
DEFINE('_EMPTY_CATEGORY', '������ ��������� �� �������� ��������.');
DEFINE('_EMPTY_BLOG', '��� �������� ��� �����������!');
DEFINE('_NOT_EXIST', '��������, �������� �� �������.<br />����������, ��������� �� ������� �������� �����.');
DEFINE('_SUBMIT_BUTTON', '���������');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE', '����������');
DEFINE('_BUTTON_RESULTS', '����������');
DEFINE('_USERNAME', '������������');
DEFINE('_LOST_PASSWORD', '������ ������?');
DEFINE('_PASSWORD', '������');
DEFINE('_BUTTON_LOGIN', '�����');
DEFINE('_BUTTON_LOGOUT', '�����');
DEFINE('_NO_ACCOUNT', '��� �� ����������������?');
DEFINE('_CREATE_ACCOUNT', '�����������');
DEFINE('_VOTE_POOR', '������');
DEFINE('_VOTE_BEST', '������');
DEFINE('_USER_RATING', '�������');
DEFINE('_RATE_BUTTON', '�������');
DEFINE('_REMEMBER_ME', '���������');

/** contact.php */
DEFINE('_ENQUIRY', '�������');
DEFINE('_ENQUIRY_TEXT', '��� ��������� ���������� � ����� %s. ����� ���������:');
DEFINE('_COPY_TEXT', '��� ����� ���������, ������� �� ��������� ��� %s � ����� %s.');
DEFINE('_COPY_SUBJECT', '�����: ');
DEFINE('_THANK_MESSAGE', '�������! ��������� ������� ����������.');
DEFINE('_CLOAKING', '���� e-mail ������� �� ����-�����. ��� ��� ��������� � ����� �������� ������ ���� �������� ��������� Java-script.');
DEFINE('_CONTACT_HEADER_NAME', '���');
DEFINE('_CONTACT_HEADER_POS', '���������');
DEFINE('_CONTACT_HEADER_EMAIL', 'E-mail');
DEFINE('_CONTACT_HEADER_PHONE', '�������');
DEFINE('_CONTACT_HEADER_FAX', '����');
DEFINE('_CONTACT_HEADER_MISC', '�������������� ����������');
DEFINE('_CONTACTS_DESC', '������ ��������� ����� �����');
DEFINE('_CONTACT_MORE_THAN', '�� �� ������ ������� ����� ������ ������ e-mail.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE', '�������� �����');
DEFINE('_EMAIL_DESCRIPTION', '��������� e-mail ������������');
DEFINE('_NAME_PROMPT', '���� ���');
DEFINE('_NAME_PROMPT_PH', '������� ���� ���');
DEFINE('_EMAIL_PROMPT', '��� e-mail');
DEFINE('_EMAIL_PROMPT_PH', '������� ��� e-mail');
DEFINE('_SUBJECT_PROMPT_PH', '������� ���� ������ ���������');
DEFINE('_MESSAGE_PROMPT', '������� ����� ���������');
DEFINE('_MESSAGE_PROMPT_PH', '������� ����� ������ ���������');
DEFINE('_PLEASE_ENTER_CAPTCHA_PH', '������� ���');
DEFINE('_SEND_BUTTON', '���������');
DEFINE('_SEND_BUTTON_CONTACT', '��������� ���������');
DEFINE('_CONTACT_FORM_NC', '����������, ��������� ����� ��������� � ���������.');
DEFINE('_CONTACT_TELEPHONE', '�������');
DEFINE('_CONTACT_MOBILE', '���������');
DEFINE('_CONTACT_FAX', '����');
DEFINE('_CONTACT_EMAIL', 'E-mail');
DEFINE('_CONTACT_NAME', '���');
DEFINE('_CONTACT_POSITION', '���������');
DEFINE('_CONTACT_ADDRESS', '�����');
DEFINE('_CONTACT_MISC', '�������������� ����������');
DEFINE('_CONTACT_SEL', '�������� ����������');
DEFINE('_CONTACT_NONE', '������ ���� ���������� ������ �����������.');
DEFINE('_CONTACT_ONE_EMAIL', '������ ������� ����� ������ ������ e-mail.');
DEFINE('_EMAIL_A_COPY', '��������� ����� ��������� �� ����������� �����');
DEFINE('_CONTACT_DOWNLOAD_AS', '������� ���������� � �������');
DEFINE('_VCARD', 'VCard');

/** pageNavigation */
DEFINE('_PN_LT', '&lt;');
DEFINE('_PN_RT', '&gt;');
DEFINE('_PN_PAGE', '��������');
DEFINE('_PN_OF', '��');
DEFINE('_PN_LLAST', '[������]');
DEFINE('_PN_PREV10', '����������');
DEFINE('_PN_PREV1', '����������');
DEFINE('_PN_NEXT1', '���������');
DEFINE('_PN_NEXT10', '���������');
DEFINE('_PN_RLAST', '[���������]');
DEFINE('_PN_DISPLAY_NR', '����������');
DEFINE('_PN_RESULTS', '����������');

/** ������ ����� */
DEFINE('_EMAIL_TITLE', '��������� e-mail �����');
DEFINE('_EMAIL_FRIEND', '��������� ������ �������� �� e-mail:');
DEFINE('_EMAIL_FRIEND_ADDR', 'E-Mail �����:');
DEFINE('_EMAIL_YOUR_NAME', '���� ���:');
DEFINE('_EMAIL_YOUR_MAIL', '��� e-mail:');
DEFINE('_SUBJECT_PROMPT', ' ���� ���������:');
DEFINE('_BUTTON_SUBMIT_MAIL', '���������');
DEFINE('_BUTTON_CANCEL', '������');
DEFINE('_EMAIL_ERR_NOINFO', '�� ������ ��������� ������ ���� e-mail � e-mail ���������� ����� ������.');
DEFINE('_EMAIL_MSG', ' ������������! ��������� ������ �� �������� ����� "%s" �������� ��� %s ( %s ).

�� ������� ����������� � �� ���� ������:
%s');
DEFINE('_EMAIL_INFO', '������ ��������');
DEFINE('_EMAIL_SENT', '������ �� ��� �������� ���������� ���');
DEFINE('_PROMPT_CLOSE', '������� ����');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' �����');
DEFINE('_WRITTEN_BY', ' �����');
DEFINE('_LAST_UPDATED', '��������� ����������:');
DEFINE('_BACK', '���������');
DEFINE('_LEGEND', '�������');
DEFINE('_DATE', '����');
DEFINE('_ORDER_DROPDOWN', '�������');
DEFINE('_HEADER_TITLE', '���������');
DEFINE('_HEADER_AUTHOR', '�����');
DEFINE('_HEADER_SUBMITTED', '�������');
DEFINE('_HEADER_HITS', '����������');
DEFINE('_E_EDIT', '�������������');
DEFINE('_E_ADD', '��������');
DEFINE('_E_WARNUSER', '����������, ������� ������ &laquo;������&raquo; ��� &laquo;���������&raquo;, ����� �������� ��� ��������.');
DEFINE('_E_WARNTITLE', '���������� ������ ����� ���������');
DEFINE('_E_WARNTEXT', '���������� ������ ����� ������� �����');
DEFINE('_E_WARNCAT', '����������, �������� ���������');
DEFINE('_E_CONTENT', '����������');
DEFINE('_E_TITLE', '���������:');
DEFINE('_E_CATEGORY', '���������');
DEFINE('_E_INTRO', '������� �����');
DEFINE('_E_MAIN', '�������� �����');
DEFINE('_E_MOSIMAGE', '�������� ��� {mosimage}');
DEFINE('_E_IMAGES', '�����������');
DEFINE('_E_GALLERY_IMAGES', '������� �����������');
DEFINE('_E_CONTENT_IMAGES', '����������� � ������');
DEFINE('_E_EDIT_IMAGE', '��������� �����������');
DEFINE('_E_NO_IMAGE', '��� �����������');
DEFINE('_E_INSERT', '��������');
DEFINE('_E_UP', '����');
DEFINE('_E_DOWN', '����');
DEFINE('_E_REMOVE', '�������');
DEFINE('_E_SOURCE', '�������� �����:');
DEFINE('_E_ALIGN', '������������:');
DEFINE('_E_ALT', '�������������� �����:');
DEFINE('_E_BORDER', '�����:');
DEFINE('_E_CAPTION', '���������');
DEFINE('_E_CAPTION_POSITION', '��������� �������');
DEFINE('_E_CAPTION_ALIGN', '������������ �������');
DEFINE('_E_CAPTION_WIDTH', '������ �������');
DEFINE('_E_APPLY', '���������');
DEFINE('_E_PUBLISHING', '����������');
DEFINE('_E_STATE', '���������:');
DEFINE('_E_AUTHOR_ALIAS', '��������� ������:');
DEFINE('_E_ACCESS_LEVEL', '������� �������:');
DEFINE('_E_ORDERING', '�������:');
DEFINE('_E_START_PUB', '���� ������ ����������:');
DEFINE('_E_FINISH_PUB', '���� ��������� ����������:');
DEFINE('_E_SHOW_FP', '���������� �� ������� ��������:');
DEFINE('_E_HIDE_TITLE', '������ ���������:');
DEFINE('_E_METADATA', '����-����');
DEFINE('_E_M_DESC', '��������:');
DEFINE('_E_M_KEY', '�������� �����:');
DEFINE('_E_SUBJECT', '����:');
DEFINE('_E_EXPIRES', '���� ���������:');
DEFINE('_E_VERSION', '������');
DEFINE('_E_ABOUT', '�� �������');
DEFINE('_E_CREATED', '���� ��������');
DEFINE('_E_LAST_MOD', '��������� ���������:');
DEFINE('_E_HITS', '���������� ����������:');
DEFINE('_E_SAVE', '���������');
DEFINE('_E_CANCEL', '������');
DEFINE('_E_REGISTERED', '������ ��� ������������������ �������������!');
DEFINE('_E_ITEM_INFO', '����������');
DEFINE('_E_ITEM_SAVED', '������� ���������!');
DEFINE('_ITEM_PREVIOUS', '&lt; ');
DEFINE('_ITEM_NEXT', ' &gt;');
DEFINE('_KEY_NOT_FOUND', '���� �� ������!');

/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY', '� ���� ������� ������ ������ ��� ��������. ����������, ������� �����.');
DEFINE('_CATEGORY_ARCHIVE_EMPTY', '� ���� ��������� ������ ������ ��� ��������. ����������, ������� �����.');
DEFINE('_HEADER_SECTION_ARCHIVE', '����� ��������');
DEFINE('_HEADER_CATEGORY_ARCHIVE', '����� ���������');
DEFINE('_ARCHIVE_SEARCH_FAILURE', '�� ������� �������� ������� ��� %s %s.'); // �������� ������, � ����� ����
DEFINE('_ARCHIVE_SEARCH_SUCCESS', '������� �������� ������ ��� %s %s.'); // �������� ������, � ����� ����
DEFINE('_FILTER', '������');
DEFINE('_ORDER_DROPDOWN_DA', '���� (�� �����������)');
DEFINE('_ORDER_DROPDOWN_DD', '���� (�� ��������)');
DEFINE('_ORDER_DROPDOWN_TA', '�������� (�� �����������)');
DEFINE('_ORDER_DROPDOWN_TD', '�������� (�� ��������)');
DEFINE('_ORDER_DROPDOWN_HA', '��������� (�� �����������)');
DEFINE('_ORDER_DROPDOWN_HD', '��������� (�� ��������)');
DEFINE('_ORDER_DROPDOWN_AUA', '����� (�� �����������)');
DEFINE('_ORDER_DROPDOWN_AUD', '����� (�� ��������)');
DEFINE('_ORDER_DROPDOWN_O', '�� �������');
DEFINE('_CONTENT_ANSWER', '������� �����:');
DEFINE('_CONTENT_CNG_STAT_PUB', '����� ������� ���������� �����������: ');

/** poll.php */
DEFINE('_ALERT_ENABLED', 'Cookies ������ ���� ���������!');
DEFINE('_ALREADY_VOTE', '�� ��� ������������� � ���� ������!');
DEFINE('_NO_SELECTION', '�� �� ������� ���� �����. ����������, ���������� ��� ���.');
DEFINE('_THANKS', '������� �� ���� ������� � �����������!');
DEFINE('_SELECT_POLL', '�������� ����� �� ������');

/** classes/html/poll.php */
DEFINE('_JAN', '������');
DEFINE('_FEB', '�������');
DEFINE('_MAR', '����');
DEFINE('_APR', '������');
DEFINE('_MAY', '���');
DEFINE('_JUN', '����');
DEFINE('_JUL', '����');
DEFINE('_AUG', '������');
DEFINE('_SEP', '��������');
DEFINE('_OCT', '�������');
DEFINE('_NOV', '������');
DEFINE('_DEC', '�������');
DEFINE('_POLL_TITLE', '���������� ������');
DEFINE('_SURVEY_TITLE', '�������� ������');
DEFINE('_NUM_VOTERS', '���������� ���������������');
DEFINE('_FIRST_VOTE', '������ �����');
DEFINE('_LAST_VOTE', '��������� �����');
DEFINE('_SEL_POLL', '�������� �����');
DEFINE('_NO_RESULTS', '��� ������ �� ���������� ������.');

/** registration.php */
DEFINE('_ERROR_PASS', '��������, ����� ������������ �� ������.');
DEFINE('_NEWPASS_MSG', '������� ������ ������������ $checkusername ������������� ������ e-mail.\n' .
		' ������������ ����� $mosConfig_live_site ������ ������ �� ��������� ������ ������.\n\n' .
		' ��� ����� ������: $newpass\n\n���� �� �� ����������� ��������� ������, �������� �� ���� ��������������.' .
		' ������ �� ������ ������� ��� ���������, ������ �����. ���� ��� ������, ������ ������� ' .
		' �� ����, ��������� ����� ������, � �����, �������� ��� �� ������� ���.');
DEFINE('_NEWPASS_SUB', '$_sitename: ����� ������ ��� $checkusername');
DEFINE('_NEWPASS_SENT', '����� ������ ������ � ��������� ������������!');
DEFINE('_REGWARN_NAME', '����������, ������� ���� ��������� ��� (���, ������������ �� �����).');
DEFINE('_REGWARN_UNAME', '����������, ������� ���� ��� ������������ (�����).');
DEFINE('_REGWARN_MAIL', '����������, ��������� ������� ����� e-mail.');
DEFINE('_REGWARN_PASS', '����������, ��������� ������� ������. ������ �� ������ ��������� �������, ��� ����� ������ ���� �� ������ 6 �������� � �� ������ �������� ������ �� ���� (0-9) � ��������� �������� (a-z, A-Z)');
DEFINE('_REGWARN_VPASS1', '����������, ��������� ������.');
DEFINE('_REGWARN_VPASS2', '������ � ��� ������������� �� ���������. ����������, ���������� ��� ���.');
DEFINE('_REGWARN_INUSE', '��� ��� ������������ ��� ������������. ����������, �������� ������ ���.');
DEFINE('_REGWARN_EMAIL_INUSE', '���� e-mail ��� ������������. ���� �� ������ ���� ������, ������� �� ������ &laquo;������ ������?&raquo; � �� ��������� e-mail ����� ������ ����� ������.');
DEFINE('_SEND_SUB', '������ � ����� ������������ %s � %s');
DEFINE('_USEND_MSG_ACTIVATE', '������������ %s,

���������� �� ����������� �� ����� %s. ���� ������� ������ ������� ������� � ������ ���� ������������.
����� ������������ ������� ������, ������� �� ������ ��� ���������� �� � �������� ������ ��������:
%s

����� ��������� �� ������ ����� �� ���� %s, ��������� ���� ��� ������������ � ������:

��� ������������ - %s
������ - %s');
DEFINE('_USEND_MSG', '������������ %s,

���������� ��� �� ����������� �� ����� %s.

������ �� ������ ����� �� ���� %s, ��������� ��� ������������ � ������, ��������� ���� ��� �����������.');
DEFINE('_USEND_MSG_NOPASS', '������������ $name,\n\n�� ������� ���������������� �� ����� $mosConfig_live_site.\n' .
		'�� ������ ����� �� ���� $mosConfig_live_site, ��������� ������, ������� �� ������� ��� �����������.\n\n' .
		'�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������\n');
DEFINE('_ASEND_MSG', '������������! ��� ��������� ��������� � ����� %s.

�� ����� %s ����������������� ����� ������������.

������ ������������:
��������� ��� - %s
����� e-mail - %s
��� ������������ - %s

�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������');
DEFINE('_REG_COMPLETE_NOPASS', '<div class="componentheading">����������� ���������!</div><br />' .
		'������ �� ������ ����� �� ����.<br />');
DEFINE('_REG_COMPLETE', '<div class="componentheading">����������� ���������!</div><br />������ �� ������ ����� �� ����.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">����������� ���������!</div><br />���� ������� ������ ������� � ������ ���� ������������ ����� ���, ��� �� �� ��������������. �� ��� e-mail ���� ���������� ������ �� �������, � ������� ������� �� ������ ������������ ���� ������� ������.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">������� ������ ������������!</div><br />���� ������� ������ ������������. ������ �� ������ ����� �� ����, ��������� ��� ������������ � ������, ������� �� ����� ��� �����������.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">�������� ������ ���������!</div><br />������ ������� ������ ����������� �� ����� ��� ��� ������������.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">������ ���������!</div><br />��������� ����� ������� ������ ����������. ����������, ���������� � ��������������.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD', '������ ������?');
DEFINE('_NEW_PASS_DESC', '����������, ������� ���� ��� ������������ � ����� e-mail, ����� ������� ������ &laquo;��������� ������&raquo;.<br />' .
		'������, �� ��������� ����� e-mail �� �������� ������ � ����� �������. ����������� ���� ������ ��� ����� �� ����.');
DEFINE('_PROMPT_UNAME', '��� ������������:');
DEFINE('_PROMPT_EMAIL', '����� e-mail:');
DEFINE('_BUTTON_SEND_PASS', '��������� ������');
DEFINE('_REGISTER_TITLE', '�����������');
DEFINE('_REGISTER_NAME', '��������� ���:');
DEFINE('_REGISTER_UNAME', '��� ������������:');
DEFINE('_REGISTER_EMAIL', 'E-mail:');
DEFINE('_REGISTER_NAME_PH', '������� ��������� ���');
DEFINE('_REGISTER_UNAME_PH', '������� ��� ������������');
DEFINE('_REGISTER_EMAIL_PH', '������� e-mail');
DEFINE('_REGISTER_PASS', '������:');
DEFINE('_REGISTER_VPASS', '������������� ������:');
DEFINE('_REGISTER_REQUIRED', '��� ����, ���������� �������� <span class="red">*</span>, ����������� ��� ����������!');
DEFINE('_BUTTON_SEND_REG', '��������� ������');
DEFINE('_SENDING_PASSWORD', '��� ������ ����� ��������� �� ��������� ���� ����� e-mail.<br />����� �� ��������' .
		' ����� ������, �� ������� ����� �� ���� � �������� ���� ������ � ����� �����.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE', '�����');
DEFINE('_SEARCH_SEL_CATEGORY', '�������� ���������');
DEFINE('_SEARCH_RESULT', '���������� ������:');
DEFINE('_SEARCH_LIMITSTART', '���������� �������� �� ��������');
DEFINE('_PROMPT_KEYWORD', '����� �� �������� �����');
DEFINE('_SEARCH_MATCHES', '������� %d ����������');
DEFINE('_CONCLUSION', '����� ������� $totalRows ����������.');
DEFINE('_NOKEYWORD', '������ �� �������');
DEFINE('_IGNOREKEYWORD', '� ������ ���� ��������� ��������');
DEFINE('_SEARCH_ANYWORDS', '����� �����');
DEFINE('_SEARCH_ALLWORDS', '��� �����');
DEFINE('_SEARCH_PHRASE', '����� �����');
DEFINE('_SEARCH_NEWEST', '�� ��������');
DEFINE('_SEARCH_OLDEST', '�� �����������');
DEFINE('_SEARCH_POPULAR', '�� ������������');
DEFINE('_SEARCH_ALPHABETICAL', '���������� �������');
DEFINE('_SEARCH_CATEGORY', '������/���������');
DEFINE('_SEARCH_MESSAGE', '����� ��� ������ ������ ��������� �� 3 �� 20 ��������');
DEFINE('_SEARCH_ARCHIVED', '� ������');
DEFINE('_SEARCH_CATBLOG', '���� ���������');
DEFINE('_SEARCH_CATLIST', '������ ���������');
DEFINE('_SEARCH_NEWSFEEDS', '����� ��������');
DEFINE('_SEARCH_SECLIST', '������ �������');
DEFINE('_SEARCH_SECBLOG', '���� �������');

/** templates/*.php */
DEFINE('_ISO2', 'cp1251');
DEFINE('_ISO', 'charset=windows-1251');
DEFINE('_DATE_FORMAT', '�������: d.m.Y �.'); // ����������� ������ PHP-������� DATE

/**
 * �������� ������� ����, ��� ��������� ������ ���� �� �����
 * ��������, DEFINE("_DATE_FORMAT_LC"," %d %B %Y �. %H:%M"); // ����������� ������ PHP-������� strftime
 */
$month_date = array(
	'01' => "������",
	'02' => "�������",
	'03' => "�����",
	'04' => "������",
	'05' => "���",
	'06' => "����",
	'07' => "����",
	'08' => "�������",
	'09' => "��������",
	'10' => "�������",
	'11' => "������",
	'12' => "�������",);
$month = date("m");
$m = $month_date["$month"];
// DEFINE('_DATE_FORMAT_LC',"%A, %d ".$m." %Y"); // ����������� PHP strftime ������
DEFINE('_DATE_FORMAT_LC', '%d.%m.%Y'); // ����������� PHP strftime ������
// DEFINE('_DATE_FORMAT_LC',$mosConfig_form_date); // ����������� ������ PHP-������� strftime
DEFINE('_DATE_FORMAT_LC2', $mosConfig_form_date_full); // ������ ������ �������
DEFINE('_SEARCH_BOX', '�����');
DEFINE('_NEWSFLASH_BOX', '������� �������!');
DEFINE('_MAINMENU_BOX', '������� ����');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE', '���� ������������');
DEFINE('_HI', '������������, ');
DEFINE('_HI_AUTH', '����<script type="text/javascript">
<!--
date = new Date();
date = date.getHours();
if (date >= 0 && date < 6) {document.write("�� ����")}
	else {if (date >= 6 && date < 12) {document.write("�� ����")}
		else {if (date >= 12 && date < 18) {document.write("�� ����")}
			else {document.write("�� �����")}
		}
	}
//-->
</script><noscript>� ����������</noscript>, ');

/** user.php */
DEFINE('_SAVE_ERR', '����������, ��������� ��� ����.');
DEFINE('_THANK_SUB', '������� �� ��� ��������. �� ����� ���������� ��������������� ����� ����������� �� �����.');
DEFINE('_THANK_SUB_PUB', '������� �� ��� ��������!');
DEFINE('_UP_SIZE', '�� �� ������ ��������� ����� �������� ������ ��� 15��.');
DEFINE('_UP_EXISTS', '����������� � ������ $userfile_name ��� ����������. ����������, �������� �������� ����� � ���������� ��� ���.');
DEFINE('_UP_COPY_FAIL', '������ ��� �����������!');
DEFINE('_UP_TYPE_WARN', '�� ������ ��������� ����������� ������ � ������� .gif ��� .jpg.');
DEFINE('_MAIL_SUB', '����� �������� �� ������������');
DEFINE('_MAIL_MSG', '������������ $adminName,\n\n������������ $author ���������� ����� �������� � ������ $type � ��������� $title' .
		' ��� ����� $mosConfig_live_site.\n\n\n' .
		'����������, ������� � ������ �������������� �� ������ $mosConfig_live_site/administrator ��� ��������� � ���������� ��� � $type.\n\n' .
		'�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������\n');
DEFINE('_PASS_VERR1', '���� �� ������� �������� ������, ����������, ������� ��� ��� ��� ��� ������������� ���������.');
DEFINE('_PASS_VERR2', '���� �� ������ �������� ������, ����������, �������� ��������, ��� ������ � ��� ������������� ������ ���������.');
DEFINE('_UNAME_INUSE', '��������� ��� ������������ ��� ������������.');
DEFINE('_UPDATE', '��������');
DEFINE('_USER_DETAILS_SAVE', '���� ������ ���������.');
DEFINE('_USER_LOGIN', '���� ������������');
DEFINE('_USER_ANSWER', '������� �����:');
DEFINE('_USER_OK', '�� ��!');
DEFINE('_USER_TAB_ADDITIONAL', '�������������');

/** components/com_user */
DEFINE('_EDIT_TITLE', '������ ������');
DEFINE('_YOUR_NAME', '������ ���');
DEFINE('_EMAIL', '����� e-mail');
DEFINE('_UNAME', '��� ������������ (�����)');
DEFINE('_PASS', '������');
DEFINE('_NEW_AVATAR_UPLOAD', '��������� ���� ������');
DEFINE('_AVATAR_UPLOAD', '��������� ������');
DEFINE('_AVATAR_DELETE', '������� ������');
DEFINE('_AVATAR_DELETING', '�������� �������: ');
DEFINE('_VPASS', '������������� ������');
DEFINE('_PASS_PH', '������� ����� ������');
DEFINE('_VPASS_PH', '��������� ����� ������');
DEFINE('_SUBMIT_SUCCESS', '���� ���������� �������!');
DEFINE('_SUBMIT_SUCCESS_DESC', '���� ���������� ������� ���������� ��������������. ����� ���������, ��� �������� ����� ����������� �� ���� �����');
DEFINE('_WELCOME', '����� ����������!');
DEFINE('_WELCOME_DESC', '����� ���������� � ������ ������������ ������ �����');
DEFINE('_CONF_CHECKED_IN', '��� &laquo;���������������&raquo; ���� �������� ������ &laquo;��������������&raquo;.');
DEFINE('_CHECK_TABLE', '�������� �������');
DEFINE('_CHECKED_IN', '��������� ');
DEFINE('_CHECKED_IN_ITEMS', ''); /* ������ - ����� �� ����������� ��������� ��������� ����� */
DEFINE('_PASS_MATCH', '������ �� ���������');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME', '�� ������ ������ ��� �������.');
DEFINE('_BNR_CONTACT', '�� ������ ������� ������� ��� �������.');
DEFINE('_BNR_VALID_EMAIL', '����� ����������� ����� ������� ������ ���� ����������.');
DEFINE('_BNR_CLIENT', '�� ������ ������� �������,');
DEFINE('_BNR_NAME', '������� ��� �������.');
DEFINE('_BNR_IMAGE', '�������� ����������� �������.');
DEFINE('_BNR_URL', '�� ������ ������ URL/��� �������.');
DEFINE('_BNR_ENTER_ERROR', '������ �������');
DEFINE('_BNR_NOT_ENTER', '������ �� ��������');

/** components/com_login */
DEFINE('_ALREADY_LOGIN', '�� ��� ��������������!');
DEFINE('_LOGOUT', '������� ����� ��� ���������� ������');
DEFINE('_LOGIN_TEXT', '����������� ���� &laquo;������������&raquo; � &laquo;������&raquo; ��� ������� � �����');
DEFINE('_LOGIN_SUCCESS', '�� ������� �����');
DEFINE('_LOGOUT_SUCCESS', '�� ������� ��������� ������ � ������');
DEFINE('_LOGIN_DESCRIPTION', '�� ������ ����� �� ���� ��� ������������, ��� ������� � �������� ��������');
DEFINE('_LOGOUT_DESCRIPTION', '�� ������������� ������ �������� �������?');

/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE', '������');
DEFINE('_WEBLINKS_DESC', '� ������ ������� ������� �������� ���������� � �������� ������ � ����.<br />�������� �� ������ ���� �� ��������, � ����� �������� ������ ������.');
DEFINE('_HEADER_TITLE_WEBLINKS', '������');
DEFINE('_SECTION', '������');
DEFINE('_SUBMIT_LINK', '�������� ������');
DEFINE('_URL', 'URL:');
DEFINE('_URL_DESC', '��������:');
DEFINE('_NAME', '��������:');
DEFINE('_WEBLINK_EXIST', '������ � ����� ������ ��� ����������. �������� ��� � ���������� ��� ���.');
DEFINE('_WEBLINK_TITLE', '������ ������ ����� ��������.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME', '�������� ���������');
DEFINE('_FEED_ARTICLES', '������');
DEFINE('_FEED_LINK', '������ ���������');

/** modules/mod_whosonline.php */
DEFINE('_WE_HAVE', '������ �� ����� ���������<br />');
DEFINE('_REGISTERED_ONLINE', '����������������');
DEFINE('_NOW_ONLINE', 'Online');
DEFINE('_AND', ' � ');
DEFINE('_GUEST_COUNT', '%s �����');
DEFINE('_GUESTS_COUNT', '%s ������');
DEFINE('_MEMBER_COUNT', '%s ������������');
DEFINE('_MEMBERS_COUNT', '%s �������������');
DEFINE('_ONLINE', '');
DEFINE('_NONE', '��� ����������� � ������');

/** modules/mod_banners */
DEFINE('_BANNER_ALT', '�������');

/** modules/mod_downloadjoostina */
DEFINE('_DJOOSTINA_12', '��������� Joostina ������ 1.2.1');
DEFINE('_DJOOSTINA_13', '��������� Joostina ������ 1.3.0');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES', '��� �����������');
DEFINE('_RANDOM_IMAGE_ERROR', '��������� ��������� ������ mod_random_image � ������� ����������� � ��������� � ���������� ��������!');

/** modules/mod_ml_login */
DEFINE('_AUTH', '�����������');
DEFINE('_AUTH_DEF', '����������� �����������');
DEFINE('_REM_PASS', '��������');
DEFINE('_NO_REGISTRED', '�� ����������������?');
DEFINE('_AUTH_OPENID', '�����, ��������� <img src="' . $mosConfig_live_site . '/modules/mod_ml_login/openid_big.png" alt="�����, ��������� OpenID" class="openidimg" title="�����, ��������� OpenID" width="99" height="20" />');
DEFINE('_OPENID_PROVS', '���������� OpenID');
DEFINE('_OPENID_SUB_TEXT', '����� � OpenID');
DEFINE('_ENTER_YOUR_LOGIN', '������� ��� �����');
DEFINE('_ENTER_YOUR_PASSWORD', '������� ��� ������');

/** modules/mod_stats.php */
DEFINE('_STAT_DATETIME', '���� � �����');
DEFINE('_STAT_OS', 'OS');
DEFINE('_STAT_PHP_VERSION', '������ PHP');
DEFINE('_STAT_MYSQL_VERSION', '������ MySQL');
DEFINE('_STAT_CACHE', '�����������');
DEFINE('_STAT_GZIP', 'GZIP');
DEFINE('_STAT_CACHE_ENABLE', '���������');
DEFINE('_STAT_CACHE_DISABLE', '���������');
DEFINE('_STAT_MEMBERS', '�������������');
DEFINE('_STAT_HITS', '���������');
DEFINE('_STAT_NEWS', '��������');
DEFINE('_STAT_LINKS', '������');
DEFINE('_STAT_VISITORS', '�����������');

/** /adminstrator */
DEFINE('_ADMIN_USRNAME', '�����');
DEFINE('_ADMIN_USRNAME_PH', '����� ��������������');
DEFINE('_ADMIN_PASS', '������');
DEFINE('_ADMIN_PASS_PH', '������ ��������������');
DEFINE('_ADMIN_ENTER', '�����');
DEFINE('_ADMIN_ENTER_LOGIN', '����� � ���������������� ������');
DEFINE('_ADMIN_GO_SITE', '������� �� ����');
DEFINE('_ADMIN_EXIT', '�����');
DEFINE('_ADMIN_VIEW_CONTENT', '�������� �����������');
DEFINE('_DETAILS', '�������� ���������');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME', '* ������ �� ������ �������������� ����� ����� ���� [mainmenu] ������������� ���������� &laquo;�������&raquo; ��������� ����� *');
DEFINE('_MAINMENU_DEL', '* �� �� ������ &laquo;�������&raquo; ��� ����, ��������� ��� ���������� ��� ����������� ���������������� ����� *');
DEFINE('_MENU_GROUP', '* ��������� &laquo;���� ����&raquo; ���������� ����� ��� � ����� ������ *');

/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', '����� ������ ������������');
DEFINE('_NEW_USER_MESSAGE', '������������, %s


�� ���� ���������������� ��������������� �� ����� %s.

��� ��������� �������� ���� ��� ������������ � ������, ��� ����� �� ���� %s:

��� ������������ - %s
������ - %s


�� ��� ��������� �� ����� ��������. ��� ������������� ������� �������� � ���������� ������ ��� ��������������.');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', '��� ��������� � ����� \'%s\'

���������:
');

// Joostina!
DEFINE('_REG_CAPTCHA', '������� ����� � �����������<span class="red">*</span>:');
DEFINE('_REG_CAPTCHA_VAL', '���������� ������ ��� � �����������!');
DEFINE('_REG_CAPTCHA_REF', '������� ����� �������� �����������.');

DEFINE('_PRINT_PAGE_LINK', '����� �������� �� �����');

$bad_text = array(' ���� ', ' ��� ', ' ������ ', ' ��� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ��� ', ' ��� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ������ ', ' ���� ', ' ��� ', ' �������� ', ' ������� ', ' ������� ', ' ���� ', ' ��� ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ���� ', ' ��� ', ' ����� ', ' ����� ', ' ����� ', ' ���� ', ' ��� ', ' ��� ', ' ������ ', ' ������� ', ' �������� ', ' ��� ', ' ����� ', ' ����� ', ' ������� ', ' ������� ', ' ��� ', ' ���� ', ' ��� ', ' ��� ', ' ����� ', ' ���� ', ' ��� ', ' ���� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ������ ', ' ���� ', ' ��� ', ' ��� ', ' ������� ', ' �������� ', ' ���� ', ' ��������� ', ' ��� ', ' ������� ', ' ��� ', ' ������ ', ' ������ ', ' ��� ', ' ��� ', ' ��� ', ' ����� ', ' ����� ', ' ��� ', ' ���� ', ' ����� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ��� ', ' ����� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ������ ', ' ������ ', ' ������� ', ' ������ ', ' ������� ', ' ������ ', ' ����� ', ' ���� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ������ ', ' ����� ', ' ���� ', ' ���� ', ' ������ ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ��� ', ' ����� ', ' ���� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ���� ', ' ���� ', ' ��� ');

/* administrator components com_admin */
DEFINE('_FILE_UPLOAD', '�������� �����');
DEFINE('_MAX_SIZE', '������������ ������');
DEFINE('_ABOUT_JOOSTINA', '� Joostina');
DEFINE('_CHANGESLOG', 'Changeslog');
DEFINE('_ABOUT_SYSTEM', '� �������');
DEFINE('_SYSTEM_OS', '�������');
DEFINE('_DB_VERSION', '������ ���� ������');
DEFINE('_PHP_VERSION', '������ PHP');
DEFINE('_APACHE_VERSION', '���-������');
DEFINE('_PHP_APACHE_INTERFACE', '��������� ����� ���-�������� � PHP');
DEFINE('_JOOSTINA_VERSION', '������ Joostina!');
DEFINE('_BROWSER', '������� (User Agent)');
DEFINE('_PHP_SETTINGS', '������ ��������� PHP');
DEFINE('_RG_EMULATION', '�������� Register Globals');
DEFINE('_REGISTER_GLOBALS', 'Register Globals - ����������� ���������� ����������');
DEFINE('_MAGIC_QUOTES', '�������� Magic Quotes');
DEFINE('_SAFE_MODE', '���������� ����� - Safe Mode');
DEFINE('_SESSION_HANDLING', '��������� ������');
DEFINE('_SESS_SAVE_PATH', '������� �������� ������ - Session save path');
DEFINE('_PHP_TAGS', '�������� php');
DEFINE('_BUFFERING', '�����������');
DEFINE('_OPEN_BASEDIR', '�����������/�������� ��������');
DEFINE('_ERROR_REPORTING', '����������� ������');
DEFINE('_XML_SUPPORT', '��������� XML');
DEFINE('_ZLIB_SUPPORT', '��������� Zlib');
DEFINE('_DISABLED_FUNCTIONS', '����������� �������');
DEFINE('_CONFIGURATION_FILE', '���� ������������');
DEFINE('_ACCESS_RIGHTS', '����� �������');
DEFINE('_DIRS_WITH_RIGHTS', '��� ������ <strong>����</strong> ������� � ������������ Joostina, <strong>���</strong> ��������� ���� �������� ������ ���� �������� ��� ������!');
DEFINE('_CACHE_DIRECTORY', '������� ����');
DEFINE('_SESSION_DIRECTORY', '������� ������');
DEFINE('_DATABASE', '���� ������');
DEFINE('_TABLE_NAME', '�������� �������');
DEFINE('_DB_CHARSET', '���������');
DEFINE('_DB_NUM_RECORDS', '�������');
DEFINE('_DB_SIZE', '������');
DEFINE('_FIND', '�����');
DEFINE('_CLEAR', '��������');
DEFINE('_GLOSSARY', '���������');
DEFINE('_DEVELOPERS', '������������');
DEFINE('_SUPPORT', '���������');
DEFINE('_LICENSE', '��������');
DEFINE('_CHANGELOG', '������ ���������');
DEFINE('_CHECK_VERSION', '��������� ������ Joostina!');
DEFINE('_PREVIEW_SITE', '������������ �����');
DEFINE('_PREV_A_SITE', '������������');
DEFINE('_IN_NEW_WINDOW', '������� � ����� ����');

/* administrator components com_banners */
DEFINE('_BANNERS_MANAGEMENT', '���������� ���������');
DEFINE('_EDIT_BANNER', '�������������� �������');
DEFINE('_NEW_BANNER', '�������� �������');
DEFINE('_IN_CURRENT_WINDOW', '��� �� ����');
DEFINE('_IN_PARENT_WINDOW', '������� ����');
DEFINE('_IN_MAIN_FRAME', '������� ������');
DEFINE('_BANNER_CLIENTS', '������� ��������');
DEFINE('_BANNER_CATEGORIES', '��������� ��������');
DEFINE('_NO_BANNERS', '������ �� ����������');
DEFINE('_BANNER_COUNTER_RESETTED', '������� ������ �������� ������');
DEFINE('_CHECK_PUBLISH_DATE', '��������� ������������ ����� ���� ����������');
DEFINE('_CHECK_START_PUBLICATION_DATE', '��������� ���� ������ ����������');
DEFINE('_CHECK_END_PUBLICATION_DATE', '��������� ���� ��������� ����������');
DEFINE('_TASK_UPLOAD', '���������');
DEFINE('_BANNERS_PANEL', '������ ��������');
DEFINE('_BANNERS_DIRECTORY_DOESNOT_EXISTS', '����� banners �� ����������');
DEFINE('_CHOOSE_BANNER_IMAGE', '�������� ����������� ��� ��������');
DEFINE('_BAD_FILENAME', '���� ������ ��������� ���������-�������� ������� ��� ��������!');
DEFINE('_FILE_ALREADY_EXISTS', '���� #FILENAME# ��� ���������� � ���� ������!');
DEFINE('_BANNER_UPLOAD_ERROR', '�������� #FILENAME# ��������!');
DEFINE('_BANNER_UPLOAD_SUCCESS', '�������� #FILENAME# � #DIRNAME# ������� ��������!');
DEFINE('_UPLOAD_BANNER_FILE', '��������� ���� �������');

/* administrator components com_categories */
DEFINE('_CATEGORY_CHANGES_SAVED', '��������� � ��������� ���������');
DEFINE('_USER_GROUP_ALL', '�����');
DEFINE('_USER_GROUP_REGISTERED', '���������');
DEFINE('_USER_GROUP_SPECIAL', '�����������');
DEFINE('_CONTENT_CATEGORIES', '��������� �����������');
DEFINE('_ALL_CONTENT', '�� ����������');
DEFINE('_ACTIVE', '��������');
DEFINE('_IN_TRASH', '� �������');
DEFINE('_VIEW_CATEGORY_CONTENT', '�������� ����������� ���������');
DEFINE('_CHOOSE_MENU_PLEASE', '����������, �������� ����');
DEFINE('_CHOOSE_MENUTYPE_PLEASE', '����������, �������� ��� ����');
DEFINE('_ENTER_MENUITEM_NAME', '����������, ������� �������� ��� ����� ������ ����');
DEFINE('_CATEGORY_NAME_IS_BLANK', '��������� ������ ����� ��������');
DEFINE('_ENTER_CATEGORY_NAME', '������� ��� ���������');
DEFINE('_ENTER_CATEGORY_TITLE', '������� ��������� ���������');
DEFINE('_CATEGORY_ALREADY_EXISTS', '��������� � ����� ��������� ��� ����������. ��������� �����');
DEFINE('_EDIT_CATEGORY', '��������������');
DEFINE('_NEW_CATEGORY', '�����');
DEFINE('_CATEGORY_PROPERTIES', '�������� ���������');
DEFINE('_CATEGORY_TITLE', '��������� ��������� (Title)');
DEFINE('_CATEGORY_NAME', '�������� ��������� (Name)');
DEFINE('_SORT_ORDER', '������� ������������');
DEFINE('_IMAGE', '�����������');
DEFINE('_IMAGE_POSTITION', '������������ �����������');
DEFINE('_MENUITEM', '����� ����');
DEFINE('_NEW_MENUITEM_IN_YOUR_MENU', '�������� ������ ������ � ��������� ���� ����.');
DEFINE('_MENU_NAME', '�������� ������ ����');
DEFINE('_CREATE_MENU_ITEM', '������� ����� ����');
DEFINE('_EXISTED_MENU_ITEMS', '������������ ������ ����');
DEFINE('_NOT_EXISTS', '�����������');
DEFINE('_MENU_LINK_AVAILABLE_AFTER_SAVE', '����� � ���� ����� �������� ����� ����������');
DEFINE('_IMAGES_DIRS', '�������� ����������� (mosimage)');
DEFINE('_MOVE_CATEGORIES', '����������� ���������');
DEFINE('_CHOOSE_CATEGORY_SECTION', '����������, �������� ������ ��� ������������ ���������');
DEFINE('_MOVE_INTO_SECTION', '����������� � ������');
DEFINE('_CATEGORIES_TO_MOVE', '������������ ���������');
DEFINE('_CONTENT_ITEMS_TO_MOVE', '������������ ������� �����������');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', '� ��������� ������ ����� ���������� ���<br />������������� ��������� � ��<br />������������� ���������� ���� ���������.');
DEFINE('_CATEGORY_COPYING', '����������� ���������');
DEFINE('_CHOOSE_CAT_SECTION_TO_COPY', '����������, �������� ������ ��� ���������� ���������');
DEFINE('_COPY_TO_SECTION', '���������� � ������');
DEFINE('_CATS_TO_COPY', '���������� ���������');
DEFINE('_CONTENT_ITEMS_TO_COPY', '���������� ���������� ���������');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', '� ��������� ������ ����� ����������� ���<br />������������� ��������� � ��<br />������������� ���������� ���� ���������.');
DEFINE('_COMPONENT', '���������');
DEFINE('_BEFORE_CREATION_CAT_CREATE_SECTION', '����� ��������� ��������� �� ������ ������� ���� �� ���� ������!');
DEFINE('_CATEGORY_IS_EDITING_NOW', '��������� #CATNAME# � ��������� ����� ������������� ������ ���������������');
DEFINE('_TABLE_WEBLINKS_CATEGORY', '������� - ���-������ ���������');
DEFINE('_TABLE_NEWSFEEDS_CATEGORY', '������� - ����� �������� ���������');
DEFINE('_TABLE_CATEGORY_CONTACTS', '������� - �������� ���������');
DEFINE('_TABLE_CATEGORY_CONTENT', '������� - ���������� ���������');
DEFINE('_BLOG_CATEGORY_CONTENT', '���� - ���������� ���������');
DEFINE('_BLOG_CATEGORY_ARCHIVE', '���� - �������� ���������� ���������');
DEFINE('_USE_SECTION_SETTINGS', '������������ ��������� �������');
DEFINE('_CMN_ALL', '���');
DEFINE('_CHOOSE_CATEGORY_TO_REMOVE', '�������� ��������� ��� ��������');
DEFINE('_CANNOT_REMOVE_CATEGORY', '���������: #CIDS# �� ����� ���� �������, �.�. ��� �������� ������');
DEFINE('_CHOOSE_CATEGORY_FOR_', '�������� ��������� ���');
DEFINE('_CHOOSE_OBJECT_TO_MOVE', '�������� ������ ��� �����������');
DEFINE('_CATEGORIES_MOVED_TO', '��������� ���������� � ');
DEFINE('_CATEGORY_MOVED_TO', '��������� ���������� � ');
DEFINE('_CATEGORIES_COPIED_TO', '��������� ����������� � ');
DEFINE('_CATEGORY_COPIED_TO', '��������� ����������� � ');
DEFINE('_NEW_ORDER_SAVED', '����� ������� ��������');
DEFINE('_SAVE_AND_ADD', '��������� � ��������');
DEFINE('_CLOSE', '�������');
DEFINE('_CREATE_CONTENT', '������� ����������');
DEFINE('_MOVE', '���������');
DEFINE('_COPY', '����������');

/* administrator components com_checkin */
DEFINE('_BLOCKED_OBJECTS', '��������������� �������');
DEFINE('_OBJECT', '������');
DEFINE('_WHO_BLOCK', '������������');
DEFINE('_BLOCK_TIME', '����� ����������');
DEFINE('_ACTION', '��������');
DEFINE('_GLOBAL_CHECKIN', '���������� �������������');
DEFINE('_TABLE_IN_DB', '������� ���� ������');
DEFINE('_OBJECT_COUNT', '���-�� ��������');
DEFINE('_UNBLOCKED', '��������������');
DEFINE('_CHECHKED_TABLE', '��������� �������');
DEFINE('_ALL_BLOCKED_IS_UNBLOCKED', '��� ��������������� ������� ��������������');
DEFINE('_MINUTES', '�����');
DEFINE('_HOURS', '�����');
DEFINE('_DAYS', '����');
DEFINE('_ERROR_WHEN_UNBLOCKING', '��� ��������������� ��������� ������');
DEFINE('_UNBLOCKED2', '�������������');

/* administrator components com_config */
DEFINE('_CONFIGURATION_IS_UPDATED', '������������ ������� ���������');
DEFINE('_CANNOT_OPEN_CONF_FILE', '������! ���������� ������� ��� ������ ���� ������������!');
DEFINE('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', '�� ������������� ������ �������� &laquo;����� �������������� ������&raquo;?\n\n��� �������� ������ ��� ������������ ������ ���������.\n\n');
DEFINE('_GLOBAL_CONFIG', '���������� ������������');
DEFINE('_PROTECT_AFTER_SAVE', '�������� �� ������ ����� ����������');
DEFINE('_IGNORE_PROTECTION_WHEN_SAVE', '������������ ������ �� ������ ��� ����������');
DEFINE('_CONFIG_SAVING', '���������� ������������');
DEFINE('_NOT_AVAILABLE_CHECK_RIGHTS', '�� ��������');
DEFINE('_AVAILABLE_CHECK_RIGHTS', '��������');
DEFINE('_SITE_NAME', '�������� �����');
DEFINE('_SITE_LANGUAGE', '���� �����');
DEFINE('_SITE_OFFLINE', '���� ��������');
DEFINE('_SITE_OFFLINE_MESSAGE', '��������� ��� ����������� �����');
DEFINE('_SITE_OFFLINE_MESSAGE2', '���������, ������� ��������� ������������� ������ �����, ����� �� ��������� � ����������� ���������.');
DEFINE('_SYSTEM_ERROR_MESSAGE', '��������� ��� ��������� ������');
DEFINE('_SYSTEM_ERROR_MESSAGE2', '���������, ������� ��������� ������������� ������ �����, ����� Joostina! �� ����� ������������ � ���� ������ MySQL.');
DEFINE('_SHOW_READMORE_TO_AUTH', '���������� &laquo;���������&raquo; ����������������');
DEFINE('_SHOW_READMORE_TO_AUTH2', '���� &laquo;��&raquo;, �� ���������������� ������������� ����� ������������ ������ �� ���������� � ������� ������� &laquo;��� ������������������&raquo;. ��� ����������� ������� ��������� ������������ ������ ����� ��������������.');
DEFINE('_ENABLE_USER_REGISTRATION', '��������� ����������� �������������');
DEFINE('_ENABLE_USER_REGISTRATION2', '���� &laquo;��&raquo;, �� ������������� ����� ��������� ���������������� �� �����.');
DEFINE('_ACCOUNT_ACTIVATION', '������������ ��������� ������ ��������');
DEFINE('_ACCOUNT_ACTIVATION2', '���� &laquo;��&raquo;, �� ������������ ���������� ����� ������������ ����� �������, ����� ��������� �� ������ �� ������� ��� ���������.');
DEFINE('_UNIQUE_EMAIL', '��������� ���������� E-mail');
DEFINE('_UNIQUE_EMAIL2', '���� &laquo;��&raquo;, �� ������������ �� ������ ��������� ��������� ��������� � ���������� ������� e-mail.');
DEFINE('_USER_PARAMS', '��������� ������������ �����');
DEFINE('_USER_PARAMS2', '���� &laquo;���&raquo;, �� ����� ��������� ����������� ��������� ������������� ���������� ����� (����� ���������)');
DEFINE('_DEFAULT_EDITOR', 'WYSIWYG-�������� �� ���������');
DEFINE('_LIST_LIMIT', '����� ������� (���-�� �����)');
DEFINE('_LIST_LIMIT2', '������������� ����� ������� �� ��������� � ������ ���������� ��� ���� �������������');
DEFINE('_FRONTPAGE', '�����');
DEFINE('_SITE', '����');
DEFINE('_CUSTOM_PRINT', '�������� ������ �� �������� �������');
DEFINE('_CUSTOM_PRINT2', '������������� ������������ �������� ��� ��������� ���� �� �������� �������� �������');
DEFINE('_MODULES_MULTI_LANG', '��������� �������������� �������');
DEFINE('_MODULES_MULTI_LANG2', '��������� ������� ��������� �������� ����� �������, ���� � ��� ����� �� ������� - ������������� ���������� &laquo;���&raquo;');
DEFINE('_DATE_FORMAT_TXT', '������ ����');
DEFINE('_DATE_FORMAT2', '�������� ������ ��� ����������� ����. ���������� ������������ ������ � ������������ � ��������� strftime.');
DEFINE('_DATE_FORMAT_FULL', '������ ������ ���� � �������');
DEFINE('_DATE_FORMAT_FULL2', '�������� ������ ������ ��� ����������� ���� � �������. ���������� ������������ ������ � ������������ � ��������� strftime.');
DEFINE('_USE_H1_FOR_HEADERS', '��������� ��������� ����������� ����� H1 ��� ������ ���������');
DEFINE('_USE_H1_FOR_HEADERS2', '��������� ��������� ����� h1 ������ � ������ ������� ��������� ����������� ( ��� ������� �� ��������� ).');
DEFINE('_USE_H1_HEADERS_ALWAYS', '��������� ��� ��������� ����������� ����� H1');
DEFINE('_USE_H1_HEADERS_ALWAYS2', '�������� ��������� ��������� � ���� h1.');
DEFINE('_DISABLE_RSS', '��������� ��������� RSS (syndicate)');
DEFINE('_DISABLE_RSS2', '���� &laquo;��&raquo;, �� ����� ��������� ����������� ��������� RSS ���� � ������ � ����');
DEFINE('_USE_TEMPLATE', '������������ ������');
DEFINE('_USE_TEMPLATE2', '��� ������ ������� �� ����� ����������� �� ���� ����� ���������� �� �������� � ������� ���� ������ ��������. ��� ������������� ���������� �������� �������� &laquo;������&raquo;');
DEFINE('_FAVICON_IMAGE', '������ ����� � &laquo;���������&raquo; �������� (���������� ��������)');
DEFINE('_FAVICON_IMAGE_IE', '������ ����� � &laquo;���������&raquo; �������� (IE)');
DEFINE('_FAVICON_IMAGE_IPAD', '������ ����� � &laquo;���������&raquo; �������� (iPad)');
DEFINE('_FAVICON_IMAGE2', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (���������� ��������). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� favicon.png.');
DEFINE('_FAVICON_IMAGE2_IE', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (IE). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� favicon.ico.');
DEFINE('_FAVICON_IMAGE2_IPAD', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (iPad). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� apple-touch-icon.png.');
DEFINE('_FAVICON_IMAGE3', '������ ����� � &laquo;���������&raquo; (���������� ��������)');
DEFINE('_FAVICON_IMAGE3_IE', '������ ����� � &laquo;���������&raquo; (IE)');
DEFINE('_FAVICON_IMAGE3_IPAD', '������ ����� � &laquo;���������&raquo; (iPad)');
DEFINE('_DISABLE_FAVICON', '��������� favicon (���������� ��������)');
DEFINE('_DISABLE_FAVICON_IE', '��������� favicon (IE)');
DEFINE('_DISABLE_FAVICON_IPAD', '��������� favicon (iPad)');
DEFINE('_DISABLE_FAVICON2', '������������ � �������� ������ ����� favicon (���������� ��������)');
DEFINE('_DISABLE_FAVICON2_IE', '������������ � �������� ������ ����� favicon (IE)');
DEFINE('_DISABLE_FAVICON2_IPAD', '������������ � �������� ������ ����� favicon (iPad)');
DEFINE('_DISABLE_SYSTEM_MAMBOTS', '��������� ������� ������ system');
DEFINE('_DISABLE_SYSTEM_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� ��������� �������� ����� ����������. ��������, ���� �� ����� ������������ ������� ���� ������, �� ��������� ��������� �� �������������');
DEFINE('_DISABLE_CONTENT_MAMBOTS', '��������� ������� ������ content');
DEFINE('_DISABLE_CONTENT_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� �������� ��������� �������� ����� ����������. ��������, ���� �� ����� ������������ ������� ���� ������, �� ��������� ��������� �� �������������');
DEFINE('_DISABLE_MAINBODY_MAMBOTS', '��������� ������� ������ mainbody');
DEFINE('_DISABLE_MAINBODY_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� �������� ��������� ����� ����������� (mainbody) ����� ����������.');
DEFINE('_SITE_AUTH', '����������� �� �����');
DEFINE('_SITE_AUTH2', '���� &laquo;���&raquo;, �� �������� ����������� �� ����� ����� ���������, ���� � ��� �� ������ ����� ����. ����� ����� ��������� ����������� ����������� �� �����');
DEFINE('_FRONT_SESSION_TIME', '����� ������������� ������ �� ������');
DEFINE('_FRONT_SESSION_TIME2', '����� �������������� ������������ ����� ��� ������������. ������� �������� ����� ��������� ������� ������������.');
DEFINE('_DISABLE_FRONT_SESSIONS', '��������� ������ �� ������');
DEFINE('_DISABLE_FRONT_SESSIONS2', '���� &laquo;��&raquo;, �� ����� ��������� ������� ������ ��� ������� ������������ �� �����. ���� ������� ����� ������������� �� ����� � ����������� ��������� - ����� ���������.');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT', '��������� �������� ������� � �����������');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT2', '���� &laquo;��&raquo;, �� �������� ������� � ����������� �������������� �� �����, � ���� ������������� ����� ���������� �� ����������. ������������� ��������� � �������� ���������� ����������� � ������ �� ������.');
DEFINE('_COUNT_CONTENT_HITS', '������� ����� ��������� �����������');
DEFINE('_COUNT_CONTENT_HITS2', '��� ���������� ��������� ���������� ��������� ����������� ����� �� �������.');
DEFINE('_DISABLE_CHECK_CONTENT_DATE', '��������� �������� ���������� �� �����');
DEFINE('_DISABLE_CHECK_CONTENT_DATE2', '���� �� ����� �� �������� ��������� ���������� ���������� ����������� - �� ������ �������� ����� ��������������.');
DEFINE('_DISABLE_MODULES_WHEN_EDIT', '��������� ������ � ��������������');
DEFINE('_DISABLE_MODULES_WHEN_EDIT2', '���� &laquo;��&raquo;, �� �� �������� �������������� ����������� � ������ ����� ��������� ��� ������');
DEFINE('_COUNT_GENERATION_TIME', '������������ ����� ��������� ��������');
DEFINE('_COUNT_GENERATION_TIME2', '���� &laquo;��&raquo;, �� �� ������ �������� ����� ���������� ����� �� � ���������');
DEFINE('_ENABLE_GZIP', 'GZIP-������ �������');
DEFINE('_ENABLE_GZIP2', '��������� ������ ������� ����� ��������� (���� ��������������). ��������� ���� ������� ��������� ������ ����������� ������� � �������� � ���������� �������. � �� �� �����, ��� ����������� �������� �� ������.');
DEFINE('_IS_SITE_DEBUG', '����� ������� �����');
DEFINE('_IS_SITE_DEBUG2', '���� &laquo;��&raquo;, �� ����� ������������ ��������������� ����������, ������� � ������ MySQL�');
DEFINE('_EXTENDED_DEBUG', '����������� ��������');
DEFINE('_EXTENDED_DEBUG2', '������������ �� ������ ����� ����������� �������� ��������� ��������� ���������� � �����.');
DEFINE('_CONTROL_PANEL', '������ ����������');
DEFINE('_DISABLE_ADMIN_SESS_DEL', '��������� �������� ������ � ������ ����������');
DEFINE('_DISABLE_ADMIN_SESS_DEL2', '�� ������� ������ ���� ����� ��������� ������� �������������.');
DEFINE('_DISABLE_HELP_BUTTON', '��������� ������ &laquo;������&raquo;');
DEFINE('_DISABLE_HELP_BUTTON2', '��������� ��������� � ������ ������ ������ ������� ������ ����������.');
DEFINE('_USE_OLD_TOOLBAR', '������������ ������ ����������� ��������');
DEFINE('_USE_OLD_TOOLBAR2', '��� ������������� ��������� ����� ������ �������� ����� ��������� � ������ ������, ��� ���� � Joomla.');
DEFINE('_DISABLE_IMAGES_TAB', '��������� ������� &laquo;�����������&raquo;');
DEFINE('_DISABLE_IMAGES_TAB2', '��������� ��������� � ������ ��� �������������� ����������� ������� &laquo;�����������&raquo;.');
DEFINE('_ADMIN_SESS_TIME', '����� ������������� ������ � ������ ����������');
DEFINE('_SECONDS', '������');
DEFINE('_ADMIN_SESS_TIME2', '�����, �� ��������� �������� ����� ��������� ������������ <strong>�����������</strong> ��� ������������. ������� ������� �������� ��������� ������������ �����!');
DEFINE('_SAVE_LAST_PAGE', '���������� �������� ����������� ��� ��������� ������');
DEFINE('_SAVE_LAST_PAGE2', '���� ������ ������ � ������ ���������� �����������, � �� �������� �� ���� � ������� 10 �����, �� ��� ����� �� ������ �������������� �� ��������, � ������� ��������� ����������');
DEFINE('_HTML_CSS_EDITOR', '���������� �������� ��� html � css');
DEFINE('_HTML_CSS_EDITOR2', '������������ �������� � ���������� ���������� ��� �������������� html � css ������ �������');
DEFINE('_THIS_PARAMS_CONTROL_CONTENT', '<span class="green">* ��� ��������� ������������ ����� ��������� �����������. *</span>');
DEFINE('_LINK_TITLES', '��������� � ���� ������');
DEFINE('_LINK_TITLES2', '���� &laquo;��&raquo;, ��������� �������� ����������� �������� �������� ��� ����������� �� ��� �������');
DEFINE('_READMORE_LINK', '������ &laquo;���������&raquo;');
DEFINE('_READMORE_LINK2', '���� ������ �������� &laquo;��������&raquo;, �� ����� ������������ ������ &laquo;���������&raquo; ��� ��������� ������� �����������');
DEFINE('_VOTING_ENABLE', '�������/�����������');
DEFINE('_VOTING_ENABLE2', '���� ������ �������� &laquo;��������&raquo;, ������� &laquo;�������/�����������&raquo; ����� ��������');
DEFINE('_AUTHOR_NAMES', '����� �������');
DEFINE('_AUTHOR_NAMES2', '��������, ���������� �� ����� �������. ��� ���������� ���������, �� ��� ����� ���� �������� � ������ ������ �� ������ ���� ��� �������.');
DEFINE('_DATE_TIME_CREATION', '���� � ����� ��������');
DEFINE('_DATE_TIME_CREATION2', '���� &laquo;��������&raquo;, �� ������������ ���� � ����� �������� ������. ��� ���������� ���������, �� ����� ���� �������� � ������ ������ �� ������ ���� ��� �������.');
DEFINE('_DATE_TIME_MODIFICATION', '���� � ����� ���������');
DEFINE('_DATE_TIME_MODIFICATION2', '���� ����������� &laquo;��������&raquo;, �� ����� ������������ ���� ��������� ������. ��� ���������� ���������, �� ��� ����� ���� �������� � ������ ������.');
DEFINE('_VIEW_COUNT', '���-�� ����������');
DEFINE('_VIEW_COUNT2', '���� ����������� &laquo;��������&raquo;, �� ������������ ���������� ���������� ������� ������������ �����. ��� ���������� ��������� ����� ���� �������� � ������ ������ ������ ����������.');
DEFINE('_LINK_PRINT', '������ &laquo;������&raquo;');
DEFINE('_LINK_PDF', '������ &laquo;PDF&raquo;');
DEFINE('_LINK_EMAIL', '������ &laquo;E-mail&raquo;');
DEFINE('_PRINT_EMAIL_ICONS', '������ &laquo;������&raquo;, &laquo;E-mail&raquo; � &laquo;PDF&raquo;');
DEFINE('_PRINT_EMAIL_ICONS2', '���� ������� &laquo;��������&raquo;, �� ������ &laquo;������&raquo;, &laquo;E-mail&raquo; � &laquo;PDF&raquo; ����� ������������ � ���� �������, ����� - ������� �������-�������.');
DEFINE('_PRINT_PDF_ICON', '�������� ����������, ����� ������� /media ������� �� ������.');
DEFINE('_ENABLE_TOC', '���������� ��� ��������������� ��������');
DEFINE('_BACK_BUTTON', '������ &laquo;�����&raquo; (&laquo;���������&raquo;)');
DEFINE('_CONTENT_NAV', '��������� �� �����������');
DEFINE('_UNIQ_ITEMS_IDS', '���������� �������������� ��������');
DEFINE('_UNIQ_ITEMS_IDS2', '��� ��������� ��������� ��� ������ ������� � ������ ����� ���������� ���������� ������������� �����.');
DEFINE('_AUTO_PUBLICATION_FRONT', '�������������� ���������� �� �������');
DEFINE('_AUTO_PUBLICATION_FRONT2', '��� ��������� ��������� �� ����������� ���������� ����� ������������� �������� ��� ���������� �� ������� ��������.');
DEFINE('_DISABLE_BLOCK', '��������� ���������� �����������');
DEFINE('_DISABLE_BLOCK2', '��� ��������� ��������� ���������� �������� ����������� �� ����� �����������. �� ������������� ������������ �� ������ � ������� ������ ����������.');
DEFINE('_ITEMID_COMPAT', '����� ������ Itemid');
DEFINE('_ONE_EDITOR', '������������ ������ ���� ���������');
DEFINE('_ONE_EDITOR2', '������������ ���� ���� ��� �������� � ��������� ������.');
DEFINE('_LOCALE', '������');
DEFINE('_TIME_OFFSET', '������� ���� (�������� ������� ������������ UTC, �)');
DEFINE('_TIME_OFFSET2', '������� ���� � �����, ������� ����� ������������ �� �����:');
DEFINE('_TIME_DIFF', '������� �� �������� �������, �');
DEFINE('_TIME_DIFF2', 'RSS (�������� ������� ������������ UTC, �)');
DEFINE('_CURR_DATE_TIME_RSS', '������� ���� � �����, ������� ����� ������������ � RSS');
DEFINE('_COUNTRY_LOCALE', '������ ������');
DEFINE('_COUNTRY_LOCALE2', '���������� ������������ ��������� ������: ����������� ����, �������, ����� � �.�.');
DEFINE('_LOCALE_WINDOWS', '��� ������������� � Windows ���������� ������ <span style="color:red">RU</span>.<br />� Unix-��������, ���� �� �������� �������� �� ���������, ����� ����������� �������� ������� �������� ������ �� <span style="color:red">RU_RU.CP1251</span>, <span style="color:red">ru_RU.cp1251</span>, <span style="color:red">ru_ru.CP1251</span>, ��� ������ �������� ������� ������ � ����������.<br />����� ����� ����������� ������ ���� �� ��������� �������: <span style="color:red">rus</span>, <span style="color:red">russian</span>');
DEFINE('_DB_HOST', '����� ����� MySQL');
DEFINE('_DB_USER', '��� ������������ �� (MySQL)');
DEFINE('_DB_NAME', '���� ������ MySQL');
DEFINE('_DB_PREFIX', '������� ���� ������ MySQL');
DEFINE('_DB_PREFIX2', '!! �� ���������, ���� � ��� ��� ���� ������� ���� ������. � ��������� ������, �� ������ �������� � ��� ������ !!');
DEFINE('_EVERYDAY_OPTIMIZATION', '���������� ����������� ������ ���� ������');
DEFINE('_EVERYDAY_OPTIMIZATION2', '���� &laquo;��&raquo;, �� ������ ����� ���� ������ ����� ������������� �������������� ��� ������� ��������������');
DEFINE('_OLD_MYSQL_SUPPORT', '��������� ������� ������ MySQL');
DEFINE('_OLD_MYSQL_SUPPORT2', '�������� ��������� ��������� �������������� ������� ������ �� � ����� ������������� � ����������');
DEFINE('_DISABLE_SET_SQL', '��������� SET sql_mode');
DEFINE('_DISABLE_SET_SQL2', '��������� ������� ������ ������ ���� ������ SET sql_mode');
DEFINE('_SERVER', '������');
DEFINE('_ABS_PATH', '���������� ����( ������ ����� )');
DEFINE('_MEDIA_ROOT', '������ ����� ���������');
DEFINE('_MEDIA_ROOT2', '�������� ������� ��� ������ ���������� ���������� ����� �������. ���� �� ����� ����� ��� &frasl; �� �����.');
DEFINE('_FILE_ROOT', '������ ��������� ���������');
DEFINE('_FILE_ROOT2', '�������� ������� ��� ������ ���������� ���������� �������. ��� &frasl; � �����. ��� ������������� � Windows (c) ���� ����� ���������� � �������� ����� �����.');
DEFINE('_SECRET_WORD', '��������� �����');
DEFINE('_GZ_CSS_JS', '������ CSS � JS ������');
DEFINE('_SESSION_TYPE', '����� ������������� ������');
DEFINE('_SESSION_TYPE2', '�� ���������, ���� �� ������, ����� ��� ����!<br /><br />���� ���� ����� �������������� �������������� ������ AOL ��� ��������������, ������������� ��� ������� �� ���� ������-�������, �� ������ ������������ ��������� 2 ������');
DEFINE('_HELP_SERVER', '������ ������');
DEFINE('_HELP_SERVER2', '������ ������ - ���� ���� ������, �� ����� ������ ����� ������� �� ��������� ����� http://�����_������_�����/help/, ��� ��������� ������� On-Line ������ ������� http://joostina.ru, http://help.joom.ru ��� http://help.joomla.org');
DEFINE('_FILE_MODE', '�������� ������');
DEFINE('_FILE_MODE2', '���������� ������� � ������');
DEFINE('_FILE_MODE3', '�� ������ CHMOD ��� ����� ������ (������������ ��������� �������)');
DEFINE('_FILE_MODE4', '���������� CHMOD ��� ����� ������');
DEFINE('_FILE_MODE5', '�������� ���� ����� ��� ��������� ���������� ������� � ����� ����������� ������');
DEFINE('_OWNER', '��������');
DEFINE('_O_READ', '������');
DEFINE('_O_WRITE', '������');
DEFINE('_O_EXEC', '����������');
DEFINE('_APPLY_TO_FILES', '��������� � ������������ ������');
DEFINE('_APPLY_TO_FILES2', '��������� �������� <em>���� ������������ ������</em> �� �����.<br /><strong>������������ ������������� ���� ����� ����� �������� � ������������������� �����!</strong>');
DEFINE('_DIR_CREATION', '�������� ���������');
DEFINE('_DIR_CREATION2', '���������� ������� � ���������');
DEFINE('_DIR_CREATION3', '�� ������ CHMOD ��� ����� ��������� (������������ ��������� �������)');
DEFINE('_DIR_CREATION4', '���������� CHMOD ��� ����� ���������');
DEFINE('_DIR_CREATION5', '�������� ���� ����� ��� ��������� ���������� ������� � ����� ����������� ���������');
DEFINE('_O_SEARCH', '�����');
DEFINE('_APPLY_TO_DIRS', '��������� � ������������ ���������');
DEFINE('_APPLY_TO_DIRS2', '��������� ���� ������ ����� ��������� <em>�� ���� ������������ ���������</em> �� �����.<br />' . '<strong>������������ ������������� ���� ����� ����� �������� � ������������������� �����!</strong>');
DEFINE('_O_GROUP', '������');
DEFINE('_O_AS', '���');
DEFINE('_RG_EMULATION_TXT', '�������� ����������� ���������� ����������');
DEFINE('_RG_DISABLE', '����. (<span class="green">�������������</span>) - �������������� ������');
DEFINE('_RG_ENABLE', '���. (<span class="red">�� �������������</span>) - ������������� �� ������� ������������, ��� ������������� ��������� ���������� ������ ������������.');
DEFINE('_METADATA', '����������');
DEFINE('_SITE_DESC', '�������� �����, ������� ������������� ������������');
DEFINE('_SITE_DESC2', ' �� ������ �� ������������ ���� �������� ��������� �������, � ����������� �� ���������� �������, ������� �� ���������� ������������. ������� �������� ������� � ���������� ��� ���������� ������ �����. �� ������ �������� ��������� �� ����� �������� ���� � �������� ����. ��� ��� ��������� ��������� ������� ������ ������ 20 ����, �� �� ������ �������� ���� ��� ��� �����������. ���������� ��������������, ��� ����� ������ ����� ������ �������� ��������� � ������ 20 ������.');
DEFINE('_SITE_KEYWORDS', '�������� ����� �����');
DEFINE('_SITE_KEYWORDS2', ' �� ������ �� ������������ ��� �������� ����� ���������, � ����������� �� ���������� �������, ������� �� ���������� ������������. ������� �������� ����� ���������� ��� ���������� ������ �����.');
DEFINE('_SHOW_TITLE_TAG', '���������� ����-��� <strong>title</strong>');
DEFINE('_SHOW_TITLE_TAG2', '���������� ����-��� <strong>title</strong> ��� ��������� �������� �����������');
DEFINE('_SHOW_GEO_TAG', '���������� <strong>Geotagging</strong>');
DEFINE('_SHOW_GEO_TAG2', '���������� <strong>Geotagging</strong> ����-���� ��� ��������� �������� �����������');
DEFINE('_SHOW_GEO_TAG_LATITUDE', '������');
DEFINE('_SHOW_GEO_TAG2_LATITUDE', '������ �������. ������������ � ������� <strong>50.167958</strong> (������!). ���� ������ ���������� � �������� ���������, �� ����� ������� ����������� ���� ������ (-).');
DEFINE('_SHOW_GEO_TAG_LONGITUDE', '�������');
DEFINE('_SHOW_GEO_TAG2_LONGITUDE', '������� �������. ������������ � ������� <strong>50.167958</strong> (������!). ���� ������ ���������� � ����� ���������, �� ����� ������� ����������� ���� ������ (-).');
DEFINE('_SHOW_GEO_TAG_PLACENAME', '����������������� �������');
DEFINE('_SHOW_GEO_TAG2_PLACENAME', '����������������� �������. ����������� � ������� <strong>�����, ������</strong> (������!)');
DEFINE('_SHOW_GEO_TAG_REGION', '������ �������');
DEFINE('_SHOW_GEO_TAG2_REGION', '������ �������. ����������� � ������������ ������� ������ <strong>ru</strong> (������!)');
DEFINE('_SHOW_DCORE', '���������� <strong>Dublin Core Metadata Element Set (DCMES)</strong>');
DEFINE('_SHOW_DCORE2', '���������� <strong>Dublin Core Metadata Element Set (DCMES)</strong> ����-���� ��� ��������� �������� �����������');
DEFINE('_SHOW_DCORE_LANGUAGE', '����');
DEFINE('_SHOW_DCORE2_LANGUAGE', '����. ����������� � ������������ ������� ������ <strong>ru</strong> (������!)');
DEFINE('_SHOW_AUTHOR_TAG', '���������� ����-��� <strong>author</strong>');
DEFINE('_SHOW_AUTHOR_TAG2', '���������� ����-��� <strong>author</strong> ��� ��������� �������� �����������');
DEFINE('_SHOW_BASE_TAG', '���������� ����-��� <strong>base</strong>');
DEFINE('_SHOW_BASE_TAG2', '���������� ����-��� <strong>base</strong> � ���� ������ ��������');
DEFINE('_REVISIT_TAG', '�������� ���� <strong>revisit</strong>');
DEFINE('_REVISIT_TAG2', '������� �������� ���� <strong>revisit</strong> � ����');
DEFINE('_DISABLE_GENERATOR_TAG', '��������� ��� Generator');
DEFINE('_DISABLE_GENERATOR_TAG2', '���� &laquo;��&raquo;, �� �� ���� ������ HTML �������� ����� �������� ��� name=&laquo;Generator&raquo;');
DEFINE('_EXT_IND_TAGS', '����������� ���� ����������');
DEFINE('_EXT_IND_TAGS2', '���� &laquo;��&raquo;, �� � ��� ������ �������� ����� ��������� ����������� ���� ��� ������ ����������');
DEFINE('_MAIL', '�����');
DEFINE('_MAIL_METHOD', '��� �������� ����� ������������');
DEFINE('_MAIL_FROM_ADR', '������ �� (Mail From)');
DEFINE('_MAIL_FROM_NAME', '����������� (From Name)');
DEFINE('_SENDMAIL_PATH', '���� � Sendmail');
DEFINE('_USE_SMTP', '������������ SMTP-�����������');
DEFINE('_USE_SMTP2', '�������� &laquo;��&raquo;, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
DEFINE('_SMTP_USER', '��� ������������ SMTP');
DEFINE('_SMTP_USER2', '�����������, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
DEFINE('_SMTP_PASS', '������ ��� ������� � SMTP');
DEFINE('_SMTP_PASS2', '�����������, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
DEFINE('_SMTP_SERVER', '����� SMTP-�������');
DEFINE('_CACHE', '���');
DEFINE('_ENABLE_CACHE', '�������� �����������');
DEFINE('_ENABLE_CACHE2', '��������� ����������� ��������� ������� � MySQL � ���������� �������� �� ������');
DEFINE('_CACHE_OPTIMIZATION', '����������� �����������');
DEFINE('_CACHE_OPTIMIZATION2', '������������� ������� �� ������ ���� ������ ������� ��� ����� �������� ������ ������.');
DEFINE('_AUTOCLEAN_CACHE_DIR', '�������������� ������� �������� ����');
DEFINE('_AUTOCLEAN_CACHE_DIR2', '������������� ������� ������� ���� ������ ������������ �����.');
DEFINE('_CACHE_MENU', '����������� ���� ������ ����������');
DEFINE('_CACHE_MENU2', '��������� ����������� ���� ������ ����������. �������� ���������� �� ������������ ����.');
DEFINE('_CANNOT_CACHE', '����������� �� ��������');
DEFINE('_CANNOT_CACHE2', '<strong class="red">������� ���� �� �������� ��� ������.</strong>');
DEFINE('_CACHE_DIR', '������� ����');
DEFINE('_CACHE_DIR2', '������� ������� ���� <strong>�������� ��� ������</strong>');
DEFINE('_CACHE_DIR3', '������� ������� ���� <strong>�� �������� ��� ������</strong> - ������� CHMOD �������� �� 755 ����� ���������� ����');
DEFINE('_CACHE_TIME', '����� ����� ����');
DEFINE('_DB_CACHE', '��� �������� ���� ������');
DEFINE('_DB_CACHE_TIME', '����� ����� ���� �������� ���� ������');
DEFINE('_STATICTICS', '����������');
DEFINE('_ENABLE_STATS', '�������� ���� ����������');
DEFINE('_ENABLE_STATS2', '���������/��������� ���� ���������� �����');
DEFINE('_STATS_HITS_DATE', '����� ���������� ��������� ����������� �� ����');
DEFINE('_STATS_HITS_DATE2', '��������������: � ���� ������ ������������ ������� ������ ������!');
DEFINE('_STATS_SEARCH_QUERIES', '���������� ��������� ��������');
DEFINE('_SEF_URLS', '������������� ��� ��������� ������ URL-� (SEF)');
DEFINE('_SEF_URLS2', '������ ��� Apache! ����� �������������� ������������ htaccess.txt � .htaccess. ��� ���������� ��� ��������� ������ apache - mod_rewrite');
DEFINE('_DYNAMIC_PAGETITLES', '������������ ��������� ������� (���� title)');
DEFINE('_DYNAMIC_PAGETITLES2', '������������ ��������� ���������� ������� � ����������� �� �������� ���������������� �����������');
DEFINE('_CLEAR_FRONTPAGE_LINK', '������� ������ �� com_frontpage');
DEFINE('_CLEAR_FRONTPAGE_LINK2', '��������� ������ �� ��������� ������� �������� ����� �������� ���.');
DEFINE('_DISABLE_PATHWAY_ON_FRONT', '�������� ������ (pathway) �� �������');
DEFINE('_DISABLE_PATHWAY_ON_FRONT2', '��� ���������� ������ ������ &laquo;�������&raquo; �� ������ �������� ����� ����� �������� �� ������ ������������ �������.');
DEFINE('_TITLE_ORDER', '������� ������������ ��������� title');
DEFINE('_TITLE_ORDER2', '������� ������������ ��������� ��������� ������� (��� title)');
DEFINE('_TITLE_SEPARATOR', '����������� ��������� title');
DEFINE('_TITLE_SEPARATOR2', '����������� ��������� ��������� ������� (��� title). �� ��������� - �����.');
DEFINE('_INDEX_PRINT_PAGE', '���������� �������� ������');
DEFINE('_INDEX_PRINT_PAGE2', '���� &laquo;��&raquo;, �� �������� ������ ����������� ����� �������� ��� ����������');
DEFINE('_REDIR_FROM_NOT_WWW', '������������� � �� WWW �������');
DEFINE('_REDIR_FROM_NOT_WWW2', '��� ������ �� ���� �� ������ site.ru, ������������� ����� ����������� ������������� �� www.site.ru');
DEFINE('_ADMIN_CAPTCHA', '��� ����������� � ������ ����������');
DEFINE('_ADMIN_CAPTCHA2', '������������ captcha ��� ����� ���������� ����������� � ������ ����������.');
DEFINE('_REGISTRATION_CAPTCHA', '��� �����������');
DEFINE('_REGISTRATION_CAPTCHA2', '������������ captcha ��� ����� ���������� �����������.');
DEFINE('_CONTACTS_CAPTCHA', '��� ����� ���������');
DEFINE('_CONTACTS_CAPTCHA2', '������������ captcha ��� ����� ���������� ����� ���������.');

DEFINE('_O_OTHER', '������');
DEFINE('_SECURITY_LEVEL3', '3 ������� ������ - �� ��������� - ���������');
DEFINE('_SECURITY_LEVEL2', '2 ������� ������ - ��������� ��� IP-������� ������');
DEFINE('_SECURITY_LEVEL1', '1 ������� ������ - �������� �������������');
DEFINE('_PHP_MAIL_FUNCTION', '������� PHP mail');
DEFINE('_CONSTRUCT_ERROR', '������ ������');

DEFINE('_TIME_OFFSET_M_12', '(UTC -12:00) ������������� ����� ��������� �������');
DEFINE('_TIME_OFFSET_M_11', '(UTC -11:00) ������ ������, �����');
DEFINE('_TIME_OFFSET_M_10', '(UTC -10:00) ������');
DEFINE('_TIME_OFFSET_M_9_5', '(UTC -09:30) �������, ���������� �������');
DEFINE('_TIME_OFFSET_M_9', '(UTC -09:00) ������');
DEFINE('_TIME_OFFSET_M_8', '(UTC -08:00) ������������� ����� (��� &amp; ������)');
DEFINE('_TIME_OFFSET_M_7', '(UTC -07:00) ����� ������� (��� &amp; ������)');
DEFINE('_TIME_OFFSET_M_6', '(UTC -06:00) ����������� �����  (��� &amp; ������), ������');
DEFINE('_TIME_OFFSET_M_5', '(UTC -05:00) ��������� ����� (��� &amp; ������), ������, �����');
DEFINE('_TIME_OFFSET_M_4', '(UTC -04:00) ������������� ����� (������), �������, ��-���');
DEFINE('_TIME_OFFSET_M_3_5', '(UTC -03:30) ������������ � ��������');
DEFINE('_TIME_OFFSET_M_3', '(UTC -03:00) ��������, ������ �����, ����������');
DEFINE('_TIME_OFFSET_M_2', '(UTC -02:00) ������-������������� �����');
DEFINE('_TIME_OFFSET_M_1', '(UTC -01:00 ���) �������� �������, ������� �������� ����');
DEFINE('_TIME_OFFSET_M_0', '(UTC 00:00) �������-����������� �����, ������, ��������, ����������');
DEFINE('_TIME_OFFSET_P_1', '(UTC +01:00 ���) ��������, ����������, ������, �����');
DEFINE('_TIME_OFFSET_P_2', '(UTC +02:00) �������, ����, �����, �����������, ����� ������');
DEFINE('_TIME_OFFSET_P_3', '(UTC +03:00) ������, �����-���������, ������, ��-����');
DEFINE('_TIME_OFFSET_P_3_5', '(UTC +03:30) �������');
DEFINE('_TIME_OFFSET_P_4', '(UTC +04:00) ������, ����, �������, ���-����, ������');
DEFINE('_TIME_OFFSET_P_4_5', '(UTC +04:30) �����');
DEFINE('_TIME_OFFSET_P_5', '(UTC +05:00) ��������, ������������, �����, �������, ���������, ������');
DEFINE('_TIME_OFFSET_P_5_5', '(UTC +05:30) ������, ���������, ������, ���-����');
DEFINE('_TIME_OFFSET_P_5_75', '(UTC +05:45) ��������');
DEFINE('_TIME_OFFSET_P_6', '(UTC +06:00) ����, �����������, ������, ����, �������');
DEFINE('_TIME_OFFSET_P_6_5', '(UTC +06:30) ����');
DEFINE('_TIME_OFFSET_P_7', '(UTC +07:00) ����������, �������, �����, ��������');
DEFINE('_TIME_OFFSET_P_8', '(UTC +08:00) �������, ����-�����, �����, ��������, �������');
DEFINE('_TIME_OFFSET_P_8_75', '(UTC +08:00) �������� ���������');
DEFINE('_TIME_OFFSET_P_9', '(UTC +09:00) ������, �����, ����, �����, �������');
DEFINE('_TIME_OFFSET_P_9_5', '(UTC +09:30) ��������, ������');
DEFINE('_TIME_OFFSET_P_10', '(UTC +10:00) �����������, ����, ��������� ���������');
DEFINE('_TIME_OFFSET_P_10_5', '(UTC +10:30) ������ Lord Howe (���������)');
DEFINE('_TIME_OFFSET_P_11', '(UTC +11:00) �������, ���������� �������, ����� ���������');
DEFINE('_TIME_OFFSET_P_11_5', '(UTC +11:30) ������ �������');
DEFINE('_TIME_OFFSET_P_12', '(UTC +12:00) ��������, ������, ����������, �����');
DEFINE('_TIME_OFFSET_P_12_75', '(UTC +12:45) ������ �����');
DEFINE('_TIME_OFFSET_P_13', '(UTC +13:00) �����');
DEFINE('_TIME_OFFSET_P_14', '(UTC +14:00) ��������');

/* administrator components com_contact */
DEFINE('_CONTACT_MANAGEMENT', '���������� ����������');
DEFINE('_ON_SITE', '�� �����');
DEFINE('_RELATED_WITH_USER', '������� � �������������');
DEFINE('_CHANGE_CONTACT', '�������� �������');
DEFINE('_CHANGE_CATEGORY', '�������� ���������');
DEFINE('_CHANGE_USER', '�������� ������������');
DEFINE('_ENTER_NAME_PLEASE', '�� ������ ������ ���');
DEFINE('_NEW_CONTACT', '�����');
DEFINE('_CONTACT_DETAILS', '������ ��������');
DEFINE('_USER_POSITION', '��������� (���������)');
DEFINE('_ADRESS_STREET_HOUSE', '����� (�����, ���)');
DEFINE('_CITY', '�����');
DEFINE('_STATE', '����/�������/����������');
DEFINE('_COUNTRY', '������');
DEFINE('_POSTCODE', '�������� ������');
DEFINE('_ADDITIONAL_INFO', '�������������� ����������');
DEFINE('_PUBLISH_INFO', '���������� � ����������');
DEFINE('_POSITION', '������������');
DEFINE('_IMAGES_INFO', '���������� �� �����������');
DEFINE('_PARAMETERS', '���������');
DEFINE('_CONTACT_PARAMS', '* ��� ��������� ��������� ������������ ������ ��� ��������� ���������� � ��������. *');

/* administrator components com_content */
DEFINE('_SITE_CONTENT', '���������� �����');
DEFINE('_GOTO_EDIT', '������� � ��������������');
DEFINE('_SORT_BY', '���������� ��');
DEFINE('_HIDE_NAV_TREE', '������ ������ ���������');
DEFINE('_ON_FRONTPAGE', '�� �������');
DEFINE('_SAVE_ORDER', '��������� �������');
DEFINE('_TO_TRASH', '� �������');
DEFINE('_NEVER', '�������');
DEFINE('_START', '������');
DEFINE('_ALWAYS', '������');
DEFINE('_END', '���������');
DEFINE('_WITHOUT_END', '��� ���������');
DEFINE('_CHANGE_USER_DATA', '�������� ������ ������������');
DEFINE('_CHANGE_CONTENT', '�������� ����������');
DEFINE('_CHOOSE_OBJECTS_TO_TRASH', '����������, �������� �� ������ �������, ������� �� ������ ��������� � �������');
DEFINE('_WANT_TO_TRASH', '�� �������, ��� ������ ��������� ������(�) � �������?\n��� �� �������� � ������� �������� ��������');
DEFINE('_ARCHIVE', '�����');
DEFINE('_ALL_SECTIONS', '��� �������');
DEFINE('_OBJECT_MUST_HAVE_TITLE', '���� ������ ������ ����� ���������');
DEFINE('_PLEASE_CHOOSE_SECTION', '�� ������ ������� ������');
DEFINE('_PLEASE_CHOOSE_CATEGORY', '�� ������ ������� ���������');
DEFINE('_O_EDITING', '��������������');
DEFINE('_O_CREATION', '��������');
DEFINE('_OBJECT_DETAILS', '������ �������');
DEFINE('_ALIAS', '���������');
DEFINE('_INTROTEXT_M', '������� �����: (�����������)');
DEFINE('_MAINTEXT_M', '�������� �����: (�������������)');
DEFINE('_NOTETEXT_M', '�������: (�������������)');
DEFINE('_HIDE_PARAMS_PANEL', '������ ������ ����������');
DEFINE('_SETTINGS', '���������');
DEFINE('_IN_ARCHIVE', '� ������');
DEFINE('_DRAFT_NOT_PUBLISHED', '�������� - �� �����������');
DEFINE('_RESET', '��������');
DEFINE('_CHANGED', '����������');
DEFINE('_CREATED', '�������');
DEFINE('_NEW_DOCUMENT', '����� ��������');
DEFINE('_LAST_CHANGE', '��������� ���������');
DEFINE('_NOT_CHANGED', '�� ����������');
DEFINE('_START_PUBLICATION', '������ ����������');
DEFINE('_END_PUBLICATION', '��������� ����������');
DEFINE('_OBJECT_ID', 'ID �������');
DEFINE('_USED_IMAGES', '������������ �����������');
DEFINE('_SUBDIRECTORY', '��������');
DEFINE('_IMAGE_EXAMPLE', '������ �����������');
DEFINE('_ACTIVE_IMAGE', '�������� �����������');
DEFINE('_SOURCE', '��������');
DEFINE('_ALIGN', '������������');
DEFINE('_PARAMS_IN_VIEW', '* ��� ��������� ��������� ������� ����� ������ � ������ ������� ���������*');
DEFINE('_ROBOTS_PARAMS', '��������� ���������� ��������');
DEFINE('_MENU_LINK', '����� � ����');
DEFINE('_MENU_LINK2', '����� ��������� ����� ���� (������ - ������ �����������), ������� ����������� � ��������� �� ������ ����');
DEFINE('_EXISTED_MENUITEMS', '������������ ������ ����');
DEFINE('_PLEASE_SELECT_SMTH', '����������, �������� ���-������');
DEFINE('_OBJECT_MOVING', '����������� ��������');
DEFINE('_MOVE_INTO_CAT_SECT', '����������� � ������/���������');
DEFINE('_OBJECTS_TO_MOVE', '����� ���������� �������');
DEFINE('_SELECT_CAT_TO_MOVE_OBJECTS', '����������, �������� ������ ��� ��������� ��� ����������� ��������');
DEFINE('_COPYING_CONTENT_ITEMS', '����������� �������� �����������');
DEFINE('_COPY_INTO_CAT_SECT', '���������� � ������/���������');
DEFINE('_OBJECTS_TO_COPY', '����� ����������� �������');
DEFINE('_ORDER_BY_NAME', '����������� �������');
DEFINE('_ORDER_BY_HEADERS', '����������');
DEFINE('_ORDER_BY_DATE_CR', '���� ��������');
DEFINE('_ORDER_BY_DATE_MOD', '���� �����������');
DEFINE('_ORDER_BY_ID', '��������������� ID');
DEFINE('_ORDER_BY_HITS', '����������');
DEFINE('_CANNOT_EDIT_ARCHIVED_ITEM', '�� �� ������ ��������������� �������� ������');
DEFINE('_NOW_EDITING_BY_OTHER', '� ��������� ����� ������������� ������ �������������');
DEFINE('_ROBOTS_HIDE', '������ ����-��� robots');
DEFINE('_CONTENT_ITEM_SAVED', '��������� ������� ��������� �');
DEFINE('_OBJ_ARCHIVED', '������(�) ������� �����������(�)');
DEFINE('_OBJ_PUBLISHED', '������(�) ������� �����������(�)');
DEFINE('_OBJ_UNARCHIVED', '������(�) ������� ��������(�) �� ������');
DEFINE('_OBJ_UNPUBLISHED', '������(�) ������� ����(�) � ����������');
DEFINE('_CHOOSE_OBJ_TOGGLE', '�������� ������ ��� ������������');
DEFINE('_CHOOSE_OBJ_DELETE', '�������� ������ ��� ��������');
DEFINE('_MOVED_TO_TRASH', '���������� � �������');
DEFINE('_CHOOSE_OBJ_MOVE', '�������� ������ ��� �����������');
DEFINE('_ERROR_OCCURED', '��������� ������');
DEFINE('_OBJECTS_MOVED_TO_SECTION', '������(�) ������� ���������(�) � ������');
DEFINE('_OBJECTS_COPIED_TO_SECTION', '������(�) ������� ����������� � ������');
DEFINE('_HITCOUNT_RESETTED', '������� ���������� �������');
DEFINE('_TIMES', '���');

/* administrator components com_easysql */
DEFINE('_SQL_COMMAND', '�������');
DEFINE('_MANAGEMENT', '����������');
DEFINE('_FIELDS', '����');
DEFINE('_EXEC_SQL', '��������� SQL');
DEFINE('_SQL_CONSOL', 'SQL �������');
DEFINE('_SQL_TABLE', '�������');
DEFINE('_SQL_ROWS_ENTER', '������� �����');
DEFINE('_SQL_MAKE', '������� SQL');

/* administrator components com_frontpage */
DEFINE('_UNKNOWN_ID', '������������� �� �������');
DEFINE('_REMOVE_FROM_FRONT', '������ � �������');
DEFINE('_PUBLISH_TIME_END', '����� ���������� �������');
DEFINE('_CANNOT_CHANGE_PUBLISH_STATE', '����� ������� ���������� ����������');
DEFINE('_CHANGE_SECTION', '�������� ������');

/* administrator components com_installer */
DEFINE('_OTHER_COMPONENT_USE_DIR', '������ ��������� ��� ���������� �������');
DEFINE('_CANNOT_CREATE_DIR', '���������� ������� �������');
DEFINE('_SQL_ERROR', '������ ���������� SQL');
DEFINE('_ERROR_MESSAGE', '����� ������');
DEFINE('_CANNOT_COPY_PHP_INSTALL', '�� ���� ����������� PHP-���� ���������');
DEFINE('_CANNOT_COPY_PHP_REMOVE', '�� ���� ����������� PHP-���� ��������');
DEFINE('_ERROR_DELETING', '������ ��������');
DEFINE('_IS_PART_OF_CMS', '�������� ��������� ���� Joostina � �� ����� ���� ������.<br />�� ������ ����� ��� � ����������, ���� �� ������ ��� ������������');
DEFINE('_DELETE_ERROR', '�������� - ������');
DEFINE('_UNINSTALL_ERROR', '������ �������������');
DEFINE('_BAD_XML_FILE', '������������ XML-����');
DEFINE('_PARAM_FILED_EMPTY', '���� ��������� ������ � ���������� ������� �����');
DEFINE('_INSTALLED_COMPONENTS', '������������� ����������');
DEFINE('_INSTALLED_COMPONENTS2', '����� �������� ������ �� ����������, ������� �� ������ �������. ����� ���� Joostina ������� ������.');
DEFINE('_COMPONENT_NAME', '�������� ����������');
DEFINE('_COMPONENT_LINK', '������ ���� ����������');
DEFINE('_COMPONENT_AUTHOR_URL', 'URL ������');
DEFINE('_OTHER_COMPONENTS_NOT_INSTALLED', '��������� ���������� �� �����������');
DEFINE('_COMPONENT_INSTALL', '��������� ����������');
DEFINE('_DELETING', '��������');
DEFINE('_CANNOT_DEL_LANG_ID', 'id ����� �����, ������� ���������� ������� �����');
DEFINE('_GOTO_LANG_MANAGEMENT', '������� � ���������� �������');
DEFINE('_INTALL_LANG', '��������� ��������� ������ �����');
DEFINE('_NO_FILES_OF_MAMBOTS', '��� ������, ���������� ��� �������');
DEFINE('_WRONG_ID', '������������ id �������');
DEFINE('_BAD_DIR_NAME_EMPTY', '���� ����� ������, ���������� ������� �����');
DEFINE('_INSTALLED_MAMBOTS', '������������� �������');
DEFINE('_MAMBOT', '������');
DEFINE('_TYPE', '���');
DEFINE('_OTHER_MAMBOTS', '��� �� ������� ����, � ��������� �������');
DEFINE('_INSTALL_MAMBOT', '��������� �������');
DEFINE('_UNKNOWN_CLIENT', '����������� ��� �������');
DEFINE('_NO_FILES_MODULES', '�����, ���������� ��� ������, �����������');
DEFINE('_ALREADY_EXISTS', '��� ����������');
DEFINE('_DELETING_XML_FILE', '�������� XML �����');
DEFINE('_INSTALL_MODULE', '������������� �������');
DEFINE('_MODULE', '������');
DEFINE('_USED_ON', '������������');
DEFINE('_NO_OTHER_MODULES', '��������� ������ �� �����������');
DEFINE('_MODULE_INSTALL', '��������� ������');
DEFINE('_SITE_MODULES', '������ �����');
DEFINE('_ADMIN_MODULES', '������ ������ ����������');
DEFINE('_CANNOT_DEL_FILE_NO_DIR', '���������� ������� ����, �.�. ������� �� ����������');
DEFINE('_WRITEABLE', '�������� ��� ������');
DEFINE('_UNWRITEABLE', '���������� ��� ������');
DEFINE('_CHOOSE_DIRECTORY_PLEASE', '����������, �������� �������');
DEFINE('_ZIP_UPLOAD_AND_INSTALL', '�������� ������ ���������� � ����������� ����������');
DEFINE('_PACKAGE_FILE', '���� ������');
DEFINE('_UPLOAD_AND_INSTALL', '��������� � ����������');
DEFINE('_INSTALL_FROM_DIR', '��������� �� ��������');
DEFINE('_INSTALLATION_DIRECTORY', '������� ���������');
DEFINE('_CONTINUE', '����������');
DEFINE('_NO_INSTALLER', '�� ������ �����������');
DEFINE('_CANNOT_INSTALL', '��������� [$element] ����������');
DEFINE('_CANNOT_INSTALL_DISABLED_UPLOAD', '��������� ����������, ���� ��������� �������� ������. ����������, ����������� ��������� �� ��������.');
DEFINE('_INSTALL_ERROR', '������ ���������');
DEFINE('_CANNOT_INSTALL_NO_ZLIB', '��������� ����������, ���� �� ����������� ��������� zlib');
DEFINE('_NO_FILE_CHOOSED', '���� �� ������');
DEFINE('_ERORR_UPLOADING_EXT', '������ �������� ������ ������');
DEFINE('_UPLOADING_ERROR', '�������� ��������');
DEFINE('_SUCCESS', '�������');
DEFINE('_UNSUCCESS', '��������');
DEFINE('_UPLOAD_OF_EXT', '�������� ������ ��������');
DEFINE('_DELETE_SUCCESS', '�������� �������');
DEFINE('_CANNOT_CHMOD', '�� ���� �������� ����� ������� � ����������� �����');
DEFINE('_CANNOT_MOVE_TO_MEDIA', '�� ���� ����������� ��������� ���� � ������� <code>/media</code>');
DEFINE('_CANNOT_WRITE_TO_MEDIA', '�������� �������, ��� ��� ������� <code>/media</code> ���������� ��� ������.');
DEFINE('_CANNOT_INSTALL_NO_MEDIA', '�������� �������, ��� ��� ������� <code>/media</code> �� ����������');
DEFINE('_ERROR_NO_XML_JOOMLA', '������: � ������������ ������ ���������� ����� XML-���� ��������� Joostina.');
DEFINE('_ERROR_NO_XML_INSTALL', '������: � ������������ ������ ���������� ����� XML-���� ���������.');
DEFINE('_NO_NAME_DEFINED', '�� ���������� ��� �����');
DEFINE('_FILE', '����');
DEFINE('_NOT_CORRECT_INSTALL_FILE_FOR_JOOMLA', '�� �������� ���������� ������ ��������� Joostina!');
DEFINE('_CANNOT_RUN_INSTALL_METHOD', '����� &laquo;install&raquo; �� ����� ���� ������ �������');
DEFINE('_CANNOT_RUN_UNINSTALL_METHOD', '����� &laquo;uninstall&raquo; �� ����� ���� ������ �������');
DEFINE('_CANNOT_FIND_INSTALL_FILE', '������������ ���� �� ������');
DEFINE('_XML_NOT_FOR', '������������ XML-���� - �� ���');
DEFINE('_FILE_NOT_EXISTS', '���� �� ����������');
DEFINE('_INSTALL_TWICE', '�� ��������� ������ ���������� ���� � �� �� ����������');
DEFINE('_ERROR_COPYING_FILE', '������ ����������� �����');

/* administrator components com_jce */
DEFINE('_LANG_ALREADY_EXISTS', '���� ��� ����������');
DEFINE('_EMPTY_LANG_ID', '������ id �����, ���������� ������� �����');
DEFINE('_NO_PLUGIN_FILES', '����� �������� �����������');
DEFINE('_BAD_OBJECT_ID', '�������� id �������');
DEFINE('_EMPRY_DIR_NAME_CANNOT_DEL_FILE', '���� ����� ������, ���������� ������� ����');
DEFINE('_INSTALLED_JCE_PLUGINS', '������������� ������� JCE');
DEFINE('_PCLZIP_UNKNOWN_ERROR', '������������ ������');
DEFINE('_UNZIP_ERROR', '������ ����������');
DEFINE('_JCE_INSTALL_ERROR_NO_XML', '������: ���������� ����� � ������ XML-���� ��������� JCE 1.1.x.');
DEFINE('_JCE_INSTALL_ERROR_NO_XML2', '������: ���������� ����� � ������ XML-���� ���������.');
DEFINE('_JCE_UNKNOWN_FILENAME', '��� ����� �� ����������');
DEFINE('_BAD_JCE_INSTALL_FILE', ' ������������ ���� ��������� JCE ��� ��� ������ ������������.');
DEFINE('_WRONG_PLUGIN_VERSION', '������������ ������ �������');
DEFINE('_ERROR_CREATING_DIRECTORY', '������ �������� ��������');
DEFINE('_INSTALLER_NOT_FIND_ELEMENT', '����������� �� ��������� �������');
DEFINE('_NO_INSTALLER_FOR_COMPONENT', '����������� ���������� ��� ��������');
DEFINE('_NO_CHOOSED_FILES', '����� �� �������');
DEFINE('_ERROR_OF_UPLOAD', '������ ��������');
DEFINE('_UPLOADING', '��������');
DEFINE('_IS_SUCCESS', '�������');
DEFINE('_HAS_ERROR', '����������� �������');
DEFINE('_CANNOT_DELETE_LANG_FILE', '������ ������� ������������ �������� �����');
DEFINE('_GUEST', '�����');
DEFINE('_EDITOR', '��������');
DEFINE('_PUBLISHER', '��������');
DEFINE('_MANAGER', '��������');
DEFINE('_ADMINISTRATOR', '�������������');
DEFINE('_SUPER_ADMINISTRATOR', '�����-�������������');
DEFINE('_CHANGES_FOR_PLUGIN', '��������� ��� �������');
DEFINE('_SUCCESS_SAVE', '�������� ����������');
DEFINE('_PLUGIN', '������');
DEFINE('_MODULE_IS_EDITING_BY_ADMIN', '������ � ��������� ����� ������������� ������ ���������������');
DEFINE('_CHOOSE_PLUGIN_FOR_ACCESS_MANAGEMENT', '��� ���������� ���� ������� ���������� ������� ������');
DEFINE('_CHOOSE_PLUGIN_FOR', '�������� ������ ���');
DEFINE('_JCE_CONFIG', '������������ JCE');
DEFINE('_EDITOR_CONFIG', '������������ ���������');
DEFINE('_EXTENSIONS', '����������');
DEFINE('_EXTENSION_MANAGEMENT', '���������� ������������');
DEFINE('_ICONS_POSITIONS', '������������ �������');
DEFINE('_LANG_MANAGER', '�������� �����������');
DEFINE('_FILE_NOT_FOUND', '���� �� ������');
DEFINE('_PLUGIN_NOT_FOUND', '������ �� ������');
DEFINE('_JCE_CONTENT_MAMBOT_NOT_INSTALLED', '������ ��������� JCE �� ����������');
DEFINE('_ICONS_POSITIONS_SAVED', '������������ ������� ���������');
DEFINE('_MAIN_PAGE', '�������');
DEFINE('_NEW', '�����');
DEFINE('_INSTALLATION', '���������');
DEFINE('_PREVIEW', '������������');
DEFINE('_PLUGINS', '�������');

/* administrator components com_jce */
DEFINE('_USERS', '������������');
DEFINE('_USER_LOGIN_TXT', '��� ������������ (����� )');
DEFINE('_LOGGED_IN', '�� �����');
DEFINE('_ALLOWED', '��������');
DEFINE('_LAST_LOGIN', '��������� ���������');
DEFINE('_USER_BLOCK', '����������');
DEFINE('_ALLOW', '���������');
DEFINE('_DISALLOW', '���������');
DEFINE('_ENTER_LOGIN_PLEASE', '�� ������ ������ ��� ������������ ��� ����� �� ����');
DEFINE('_BAD_USER_LOGIN', '���� ��� ��� ����� �������� ������������ ������� ��� ������� ��������.');
DEFINE('_ENTER_EMAIL_PLEASE', '�� ������ ������ ����� e-mail');
DEFINE('_ENTER_GROUP_PLEASE', '�� ������ ��������� ������������ ������ �������');
DEFINE('_BAD_PASSWORD', '������ ������������');
DEFINE('_BAD_GROUP_1', '����������, �������� ������ ������. ������ ���� &laquo;Public Front-end&raquo; �������� ������');
DEFINE('_BAD_GROUP_2', '����������, �������� ������ ������. ������ ���� &laquo;Public Back-end&raquo; �������� ������');
DEFINE('_USER_INFO', '���������� � ������������');
DEFINE('_NEW_PASSWORD', '����� ������');
DEFINE('_REPEAT_PASSWORD', '�������� ������');
DEFINE('_BLOCK_USER', '����������� ������������');
DEFINE('_RECEIVE_EMAILS', '�������� ��������� ��������� �� e-mail');
DEFINE('_REGISTRATION_DATE', '���� �����������');
DEFINE('_CONTACT_INFO', '���������� ����������');
DEFINE('_NO_USER_CONTACTS', '� ����� ������������ ��� ���������� ����������:<br />��� ������������ �������� &laquo;���������� &rarr; �������� &rarr; ���������� ����������&raquo;');
DEFINE('_FULL_NAME', '������ ���');
DEFINE('_CHANGE_CONTACT_INFO', '�������� ���������� ����������');
DEFINE('_CONTACT_INFO_PATH_URL', '���������� &rarr; �������� &rarr; ���������� ����������');
DEFINE('_RESTRICT_FUNCTION', '���������������� ����������');
DEFINE('_NO_RIGHT_TO_CHANGE_GROUP', '�� �� ������ �������� ��� ������ �������������. ��� ����� ������� ������ ������� ������������� �����');
DEFINE('_NO_RIGHT_TO_USER_CREATION', '�� �� ������ ������� ������������ � ���� ������� �������. ��� ����� ������� ������ ������� ������������� �����');
DEFINE('_PROFILE_SAVE_SUCCESS', '������� ��������� ��������� ������� ������������');
DEFINE('_CANNOT_DEL_ONE_SUPER_ADMIN', '�� �� ������ ������� ����� �������� ��������������, �.�. �� ������������ ������� ������������� �����');
DEFINE('_CHOOSE_USER_TO', '�������� ������������ ���');
DEFINE('_PLEASE_CHOOSE_USER', '����������, �������� ������������');
DEFINE('_CANNOT_DISABLE_SUPER_ADMIN', '�� �� ������ ��������� �������� ��������������');
DEFINE('_THIS_CAN_DO_HIGHLEVEL_USERS', '��� ����� ������ ������ ������������ � ����� ������� ������� �������');
DEFINE('_DISABLE', '���������');

/* administrator components com_typedcontent */
DEFINE('_ACCESS', '������');
DEFINE('_LINKS_COUNT', '������');
DEFINE('_DATE_PUBL_END', '����� ���� ����������');
DEFINE('_CHANGE_STATIC_CONTENT', '�������� ��������� ����������');
DEFINE('_WANT_TO_RESET_HITCOUNT', '�� ������������� ������ �������� ������� ����������?\n����� ������������� ��������� ����� ����������� ����� �������.');
DEFINE('_CONTENT_OBJECT_MUST_HAVE_NAME', '������ ����������� ������ ����� ��������');
DEFINE('_CONTENT_INFO', '���������� � ����������');
DEFINE('_O_STATE', '���������');
DEFINE('_CHANGE_AUTHOR', '�������� ������');
DEFINE('_GALLERY_IMAGES', '����������� �������');
DEFINE('_CONTENT_IMAGES', '����������� �����������');
DEFINE('_EDITING_SELECTED_IMAGE', '�������������� ���������� �����������');
DEFINE('_ALTERNATIVE_TEXT', '�������������� �����');
DEFINE('_MENU_LINK_3', '����� ��������� ����� ���� ���� &laquo;������ - ��������� ����������&raquo;, ������� ����������� � ��������� �� ������ ����');
DEFINE('_EXISTED_MENU_LINKS', '������������ ����� � ����');
DEFINE('_CONTENT_SAVED', '���������� ���������');
DEFINE('_CHOOSE_OBJECT_FOR', '�������� ������ ���');
DEFINE('_O_SECCESS_PUBLISHED', '�������� ������� ������������');
DEFINE('_O_SUCCESS_UNPUBLISHED', '�������� ������� ������');
DEFINE('_HIT_COUNT_RESETTED', '������� ���������� ������� �������');
DEFINE('_SUCCESS_MENU_CR_1', '(������ - ��������� ����������) � ����');

/* administrator components com_trash */
DEFINE('_TRASH', '�������');
DEFINE('_OBJECT_DELETION', '�������� ��������');
DEFINE('_OBJECTS_TO_DELETE', '��������� �������');
DEFINE('_THIS_ACTION_WILL_DELETE_O_FOREVER', '* ��� �������� <strong class="red">�������� ������</strong><br />������������� ������� �� ���� ������*');
DEFINE('_REALLY_DELETE_OBJECTS', '�� ������������� ������ ������� ������������� �������?\n��� �������� �������� ������ ������������� ������� �� ���� ������.');
DEFINE('_OBJECT_RESTORE', '�������������� ��������');
DEFINE('_OBECTS_TO_RESTORE', '����������������� �������');
DEFINE('_THIS_ACTION_WILL_RESTORE_O_FOREVER', '* ��� �������� <strong style="color:#FF0000;">�����������</strong> ��� �������,<br />����� ��� ����� ���������� �� ������� �����, ��� ���������������� �������*');
DEFINE('_REALLY_RESTORE_OBJECTS', '�� ������������� ������ ������������ ������������� �������?');
DEFINE('_RESTORE', '������������');
DEFINE('_CONTENT_ITEMS', '������� �����������');
DEFINE('_MENU_ITEMS', '������ ����');
DEFINE('_OBJECTS_DELETED', '������(�) ������� ������(�)');
DEFINE('_SUCCESS_DELETION', '������� �������');
DEFINE('_OBJECTS_RESTORED', '������(��) ������� ������������(�)');
DEFINE('_CLEAR_TRASH', '�������� �������');

/* administrator components com_templates */
DEFINE('_UNSUCCESS_OPERATION_NO_TEMPLATE', '�������� ��������: �� ��������� ������.');
DEFINE('_UNSUCCESS_OPERATION_EMPTY_FILE', '�������� ��������: ������ ����������.');
DEFINE('_UNSUCCES_OPERAION', '�������� ��������');
DEFINE('_CANNOT_OPEN_FILE_DOR_WRITE', '������ �������� ����� ��� ������.');
DEFINE('_NO_PREVIEW', '������������ ����������');
DEFINE('_TEMPLATES', '�������');
DEFINE('_TEMPLATE_PREVIEW', '������������ �������');
DEFINE('_DEFAULT', '�� ���������');
DEFINE('_ASSIGNED_TO', '��������');
DEFINE('_MAKE_UNWRITEABLE_AFTER_SAVING', '������� ����������� ��� ������ ����� ����������');
DEFINE('_IGNORE_WRITE_PROTECTION_WHEN_SAVE', '��� ���������� ������������ ������ �� ������');
DEFINE('_CHANGE_EDITOR', '�������� ��������');
DEFINE('_CSS_TEMPLATE_EDITOR', '�������� CSS �������');
DEFINE('_ASSGIN_TEMPLATE_TO_MENU', '���������� ������� ��� ������� ����');
DEFINE('_MODULES_POSITION', '������� �������');
DEFINE('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', '� ���������� ������������ ������� ������������� ������ �������:');
DEFINE('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', '���� ������ ������������ � �� ����� ���� ������');
DEFINE('_UNSUCCES_OPERATION_CANNOT_OPEN', '�������� ��������: ���������� �������');
DEFINE('_POSITIONS_SAVED', '������� ���������');

/* menubar.html.old.php + menubar.html.php */
DEFINE('_BUTTON', '������');
DEFINE('_PLEASE_CHOOSE_ELEMENT', '����������, �������� �������.');
DEFINE('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', '����������, �������� �� ������ ������� ��� �� ���������� �� �����');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_MAKE_DEFAULT', '����������, �������� ������, ����� ��������� ��� �� ���������');
DEFINE('_ASSIGN', '���������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNPUBLISH', '��� ������ ���������� �������, ������� �������� ���');
DEFINE('_TO_ARCHIVE', '� �����');
DEFINE('_FROM_ARCHIVE', '�� ������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ARCHIVE', '����������, �������� �� ������ ������� ��� �� ���������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_UNARCHIVE', '�������� ������ ��� �������������� ��� �� ������');
DEFINE('_CHANGE', '��������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_EDIT', '�������� ������ �� ������ ��� ��� ��������������');
DEFINE('_EDIT_HTML', '���. HTML');
DEFINE('_EDIT_CSS', '���. CSS');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_DELETE', '�������� ������ �� ������ ��� ��� ��������');
DEFINE('_REALLY_WANT_TO_DELETE_OBJECTS', '�� ������������� ������ ������� ��������� �������?');
DEFINE('_REMOVE_TO_TRASH', '�&nbsp;�������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_TRASH', '�������� ������ �� ������ ��� ����������� ��� � �������');
DEFINE('_PLEASE_CHOOSE_ELEMENT_TO_ASSIGN', '����������, ��� ���������� ������� �������� ���');
DEFINE('_HELP', '������');

/* administrator components com_languages */
DEFINE('_LANGUAGE_PACKS', '�������� ������');
DEFINE('_E_LANGUAGE', '����');
DEFINE('_LANGUAGE_EDITOR', '�������� �����');
DEFINE('_LANGUAGE_SAVED', '���� ������� �������');
DEFINE('_YOU_CANNOT_DELETE_LANG_FILE', '�� �� ������ ������� �������������� �������� ����');
DEFINE('_UNSUCCESS_OPERATION_NO_LANGUAGE', '�������� ��������: �� ��������� ����.');

/* administrator components com_linkeditor */
DEFINE('_COMPONENTS_MENU_EDITOR', '�������������� ���� �����������');
DEFINE('_ICON', '������');
DEFINE('_KERNEL', '����');
DEFINE('_COMPONENTS_MENU_EDIT', '�������������� ������ ���� �����������');
DEFINE('_COMPONENTS_MENU_NEW', '�������� ������ ������ ���� �����������');
DEFINE('_COMPONENT_IS_A_PART_OF_CMS', '<strong>��������:</strong> ���� ��������� �������� ������ ����, ��� ������������ ���������� �� �������� �������� � ������ �������.');
DEFINE('_MENU_NAME_REQUIRED', '�������� ������ ����. ����������� ��� ����������.');
DEFINE('_MENU_ITEM_ICON', '������ ������ ����');
DEFINE('_MENU_ITEM_DESCRIPTION', '�������� ������ ����.');
DEFINE('_MENU_ITEM_LINK', '������ �� ���������. ���� ����� ���� �� �������� ������� �� ���� ����������� ��� ����������.');
DEFINE('_PARENT_MENU_ITEM', '������������ �����');
DEFINE('_PARENT_MENU_ITEM2', '������������ ����� ����. ����������� ����� 1 ������� �����������.');
DEFINE('_THIS_FILEDS_REQUIRED', '<strong class="red">*</strong> ������ ����������� ��� ����������');
DEFINE('_MENU_ITEM_DELETED', '����� ���� �����');
DEFINE('_FIRST_LEVEL', '������ �������');

/* administrator components com_mambots */
DEFINE('_MAMBOTS', '�������');
DEFINE('_MAMBOT_NAME', '�������� �������');
DEFINE('_NO_MAMBOT_NAME', '������ ������ ����� ��������');
DEFINE('_NO_MAMBOT_FILENAME', '������ ������ ����� ��� �����');
DEFINE('_SITE_MAMBOT', '������ �����');
DEFINE('_MAMBOT_DETAILS', '������ �������');
DEFINE('_USE_THIS_MAMBOT_FILE', '������������ ����');
DEFINE('_MAMBOT_ORDER', '����� �� �������');
DEFINE('_NO_MAMBOT_PARAMS', '<em>��������� �����������</em>');
DEFINE('_NEW_MAMBOTS_IN_THE_END', '����� ������� �� ��������� ������������� � �����. ������� ������������ ����� ���� ������� ������ ����� ���������� ����� �������.');
DEFINE('_CHOOSE_MAMBOT_FOR', '�������� ������ ���');

/* administrator components com_massmail */
DEFINE('_PLEASE_ENTER_SUBJECT', '����������, ������� ����');
DEFINE('_PLEASE_CHOOSE_GROUP', '����������, �������� ������');
DEFINE('_PLEASE_ENTER_MESSAGE', '����������, ��������� ���������');
DEFINE('_MASSMAIL_TTILE', '�������� �����');
DEFINE('_SEND_TO_SUBGROUPS', '��������� ����������� �������');
DEFINE('_SEND_IN_HTML', '��������� � HTML-�������');
DEFINE('_MAIL_SUBJECT', '����');
DEFINE('_MESSAGE', '���������');
DEFINE('_ALL_USER_GROUPS', '- ��� ������ ������������� -');
DEFINE('_PLEASE_FILL_FORM', '����������, ��������� ��������� �����');
DEFINE('_MESSAGE_SENDED_TO_USERS', 'E-mail ���������� ������������(��) - ');

/* administrator components com_menumanager */
DEFINE('_MENU_MANAGER', '���������� ����');
DEFINE('_MENU_ITEMS_UNPUBLISHED', '������');
DEFINE('_MENU_MUDULES', '�������');
DEFINE('_CHANGE_MENU_NAME', '�������� �������� ����');
DEFINE('_CHANGE_MENU_ITEMS', '�������� ������ ����');
DEFINE('_PLEASE_ENTER_MENU_NAME', '����������, ������� �������� ����');
DEFINE('_NO_QUOTES_IN_NAME', '�������� ���� �� ������ ��������� &frasl;, &prime;');
DEFINE('_PLEASE_ENTER_MENU_MODULE_NAME', '����������, ������� �������� ������ ����');
DEFINE('_MENU_INFO', '���������� � ����');
DEFINE('_MENU_NAME_TIP', '��� ��� ���� ������������ �������� ��� ��� ������������� - ��� ������ ���� ���������. ������������� ������ ��� ��� ��������');
DEFINE('_MODULE_TITLE_TIP', '��������� mod_mainmenu ��������� ��� ����������� ����� ����');
DEFINE('_MODULE_TITLE', '��������� ������');
DEFINE('_NEW_MENU_ITEM_TIP', '* ����� ������ ���� ����� ������������� ������ ����� ����, ��� �� ������� ���������, � ����� ������� ������ "���������". *<br /><br />�������������� ���������� ���������� ������ ����� �������� � ������� &laquo;���������� �������� [����]&raquo;: ������ &rarr; ������ �����');
DEFINE('_REMOVE_MENU', '������� ����');
DEFINE('_MODULES_TO_REMOVE', '������(�) ��� ��������');
DEFINE('_MENU_ITEMS_TO_REMOVE', '��������� ������ ����');
DEFINE('_THIS_OP_REMOVES_MENU', '* ��� �������� <strong class="red">�������</strong> ��� ����,<br />��� ��� ������ � ������(�), �����������(��) ���(��). *');
DEFINE('_REALLY_DELETE_MENU', '�� �������, ��� ������ ������� ��� ����?\n���������� �������� ����, ��� ������� � �������.');
DEFINE('_PLEASE_ENTER_MENY_COPY_NAME', '����������, ������� ��� ��� ����� ����');
DEFINE('_PLEASE_ENTER_MODULE_NAME', '����������, ������� ��� ��� ������ ������');
DEFINE('_MENU_COPYING', '����������� ����');
DEFINE('_NEW_MENU_NAME', '��� ������ ����');
DEFINE('_NEW_MODULE_NAME', '��� ������ ������');
DEFINE('_MENU_TO_COPY', '���������� ����');
DEFINE('_MENU_ITEMS_TO_COPY', '���������� ������ ����');
DEFINE('_CANNOT_RENAME_MAINMENU', '�� �� ������ ������������� ���� &laquo;mainmenu&raquo;, �.�.  ��� ������� ���������� ���������������� Joostina');
DEFINE('_MENU_ALREADY_EXISTS', '���� � ����� ������ ��� ����������. �� ������ ������ ���������� ��� ����');
DEFINE('_NEW_MENU_CREATED', '������� ����� ����');
DEFINE('_MENU_ITEMS_AND_MODULES_UPDATED', '������ ���� � ������ ���������');
DEFINE('_MENU_DELETED', '���� �������');
DEFINE('_NEW_MENU', '����� ����');
DEFINE('_NEW_MENU_MODULE', '����� ������ ����');

/* administrator components com_menus */
DEFINE('_MODULE_IS_EDITING_MY_ADMIN', '������ ��� ������������� ������ ���������������');
DEFINE('_LINK_MUST_HAVE_NAME', '������ ������ ����� ���');
DEFINE('_CHOOSE_COMPONENT_FOR_LINK', '�� ������ ������� ��������� ��� �������� ������ �� ����');
DEFINE('_MENU_ITEM_COMPONENT_LINK', '����� ����: ������ - ������ ����������');
DEFINE('_LINK_TITLE', 'title ������');
DEFINE('_LINK_COMPONENT', '��������� ��� ������');
DEFINE('_LINK_TARGET', '��� ������� ������� �');
DEFINE('_OBJECT_MUST_HAVE_NAME', '������ ������ ����� ���');
DEFINE('_CHOOSE_COMPONENT', '�������� ���������');
DEFINE('_MENU_ITEM_COMPONENT', '����� ����: ���������');
DEFINE('_MENU_PARAMS_AFTER_SAVE', '������ ���������� ����� �������� ������ ����� ���������� ������ ����');
DEFINE('_MENU_ITEM_TABLE_CONTACT_CATEGORY', '����� ����: ������� - �������� ���������');
DEFINE('_CATEGORY_TITLE_IF_FILED_IS_EMPTY', '���� ���� ����� ��������� ������, �� ������������� ����� ������������ �������� ���������');
DEFINE('_CHOOSE_CONTACT_FOR_LINK', '��� �������� ������ ���������� ������� �������');
DEFINE('_MENU_ITEM_CONTACT_OBJECT', '����� ����: ������ - ������ ��������');
DEFINE('_MENU_ITEM_BLOG_CATEGORY_ARCHIVE', '����� ����: ���� - ���������� ��������� � ������');
DEFINE('_MENU_ITEM_BLOG_SECTION_ARCHIVE', '����� ����: ���� - ���������� ������� � ������');
DEFINE('_SECTION_TITLE_IF_FILED_IS_EMPTY', '���� ���� ����� ��������� ������, �� ������������� ����� ������������ �������� �������');
DEFINE('_MENU_ITEM_SAVED', '����� ���� ��������');
DEFINE('_MENU_ITEM_BLOGCATEGORY', '����� ����: ���� - ���������� ���������');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_CATEGORIES', '�� ������ ������� ��������� ���������');
DEFINE('_MENU_ITEM_BLOG_CONTENT_CATEGORY', '����� ����: ���� - ���������� �������');
DEFINE('_YOU_CAN_CHOOSE_SEVERAL_SECTIONS', '�� ������ ������� ��������� ��������');
DEFINE('_MENU_ITEM_TABLE_CONTENT_CATEGORY', '����� ����: ������� - ���������� ���������');
DEFINE('_CHANGE_CONTENT_ITEM', '�������� ������ �����������');
DEFINE('_CONTENT_ITEM_TO_LINK_TO', '�������� ������ ��� �����');
DEFINE('_MENU_ITEM_CONTENT_ITEM', '����� ����: ������ - ������ �����������');
DEFINE('_CONTENT_TO_LINK_TO', '���������� ��� �����');
DEFINE('_MENU_ITEM_TABLE_CONTENT_SECTION', '����� ����: ������� - ���������� �������');
DEFINE('_CHOOSE_OBJECT_TO_LINK_TO', '�� ������ ������� ������ ��� ����� � ���');
DEFINE('_MENU_ITEM_STATIC_CONTENT', '����� ����: ������ - ��������� ����������');
DEFINE('_MENU_ITEM_CATEGORY_NEWSFEEDS', '����� ����: ������� - ����� �������� �� ���������');
DEFINE('_CHOOSE_NEWSFEED_TO_LINK', '�� ������ ������� ����� �������� ��� ����� � ������� ����');
DEFINE('_MENU_ITEM_NEWSFEED', '����� ����: ������ - ����� ��������');
DEFINE('_LINKED_TO_NEWSFEED', '������� � ������');
DEFINE('_MENU_ITEM_SEPARATOR', '����� ����: �����������/�����������');
DEFINE('_ENTER_URL_PLEASE', '�� ������ ������ URL.');
DEFINE('_MENU_ITEM_URL', '����� ����: ������ - URL');
DEFINE('_MENU_ITEM_WEBLINKS_CATEGORY', '����� ����: ������� - Web-������ ���������');
DEFINE('_MENU_ITEM_WRAPPER', '����� ����: Wrapper');
DEFINE('_WRAPPER_LINK', '������ Wrapper&prime;�');
DEFINE('_MAXIMUM_LEVELS', '����������� �������');
DEFINE('_NOTE_MENU_ITEMS1', '* �������� ��������, ��� ��������� ������ ���� ������ � ��������� �����, �� ��� ��������� � ������ ���� ����.');
DEFINE('_MENU_ITEMS_OTHER', '������');
DEFINE('_MENU_ITEMS_SEND', '��������');
DEFINE('_COMPONENTS', '����������');
DEFINE('_LINKS', '������');
DEFINE('_MOVE_MENU_ITEMS', '����������� ������� ����');
DEFINE('_MENU_ITEMS_TO_MOVE', '������������ ������ ����');
DEFINE('_COPY_MENU_ITEMS', '����������� ������� ����');
DEFINE('_COPY_MENU_ITEMS_TO', '���������� � ����');
DEFINE('_CHANGE_THIS_NEWSFEED', '�������� ��� ����� ��������');
DEFINE('_CHANGE_THIS_CONTACT', '�������� ���� �������');
DEFINE('_CHANGE_THIS_CONTENT', '�������� ��� ����������');
DEFINE('_CHANGE_THIS_STATIC_CONTENT', '�������� ��� ��������� ����������');
DEFINE('_MENU_NEXT', '�����');
DEFINE('_MENU_BACK', '�����');

/* administrator components com_messages */
DEFINE('_PRIVATE_MESSAGES', '������ ���������');
DEFINE('_MAIL_FROM', '��');
DEFINE('_MAIL_READED', '���������');
DEFINE('_MAIL_NOT_READED', '�� ���������');
DEFINE('_PRIVATE_MESSAGES_SETTINGS', '��������� ������ ���������');
DEFINE('_BLOCK_INCOMING_MAIL', '������������� �������� �����');
DEFINE('_SEND_NEW_MESSAGES', '�������� ��� ����� ���������');
DEFINE('_AUTO_PURGE_MESSAGES', '�������������� ������� ���������');
DEFINE('_AUTO_PURGE_MESSAGES2', '������');
DEFINE('_AUTO_PURGE_MESSAGES3', '����');
DEFINE('_VIEW_PRIVATE_MESSAGES', '�������� ������������ ���������');
DEFINE('_MESSAGE_SEND_DATE', '����������');
DEFINE('_PLEASE_ENTER_MAIL_SUBJECT', '�� ������ ������ �������� ����');
DEFINE('_PLEASE_ENTER_MESSAGE_BODY', '�� ������ ������ ����� ���������');
DEFINE('_PLEASE_ENTER_USER', '�� ������ ������� ����������');
DEFINE('_NEW_PERSONAL_MESSAGE', '����� ������������ ���������');
DEFINE('_MAIL_TO', '����');
DEFINE('_MAIL_ANSWER', '��������');

/* administrator components com_syndicate */
DEFINE('_NEWS_EXPORT_SETUP', '��������� �������� ��������');
DEFINE('_RSS_EXPORT', 'RSS �������');
DEFINE('_RSS_EXPORT_SETUP', '���������� ����������� �������� ��������');

/* administrator components com_statistics */
DEFINE('_STAT_BROWSERS_AND_OSES', '���������� �� ���������, �� � �������');
DEFINE('_BROWSERS', '��������');
DEFINE('_DOMAINS', '������');
DEFINE('_DOMAIN', '�����');
DEFINE('_PAGES_HITS', '���������� ��������� �������');
DEFINE('_CONTENT_TITLE', '��������� �����������');
DEFINE('_SEARCH_QUERIES', '��������� �������');
DEFINE('_LOG_SEARCH_QUERIES', '���� ������');
DEFINE('_DISALLOWED', '���������');
DEFINE('_LOG_LOW_PERFOMANCE', '��������� ����� ��������� ����� ����� ������ ������� ������������������ ����� ��� ������� ������������');
DEFINE('_HIDE_SEARCH_RESULTS', '������ ���������� ������');
DEFINE('_SHOW_SEARCH_RESULTS', '�������� ���������� ������');
DEFINE('_SEARCH_QUERY_TEXT', '����� ������');
DEFINE('_SEARCH_QUERY_COUNT', '��������');
DEFINE('_SHOW_RESULTS', '������ �����������');

/* administrator components com_quickicons */
DEFINE('_QUICK_BUTTONS', '������ �������� �������');
DEFINE('_DISPLAY_METHOD', '�����������');
DEFINE('_DISPLAY_ONLY_TEXT', '������ �����');
DEFINE('_DISPLAY_ONLY_ICON', '������ ������');
DEFINE('_DISPLAY_TEXT_AND_ICON', '������ � �����');
DEFINE('_PRESS_TO_EDIT_ELEMENT', '������� ��� �������������� ��������');
DEFINE('_EDIT_BUTTON', '�������������� ������');
DEFINE('_BUTTON_TEXT', '����� ������');
DEFINE('_BUTTON_TITLE', '���������');
DEFINE('_BUTTON_TITLE_TIP', '<strong>�����������</strong><br />����� �� ������ ���������� ����� ��� ����������� ���������.<br />��� �������� ����� ����� ��������� ���� �� ������� ����������� ������ ��������!');
DEFINE('_BUTTON_LINK_TIP', '������ ��� ������ ����� ��� ����������.<br />��� ����������� ������ ������� ������ ������ ���� ��������:<br />index2.php?option=com_joomlastats&task=stats [joomlastats - ���������, &task=stats ����� ����������� ������� ����������].<br />������� ������ ������ ���� <strong>����������� ��������</strong> (��������: http://www�.)!');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW', '� ����� ����');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW_TIP', '������ ����� ������� � ����� ����');
DEFINE('_BUTTON_ORDER', '����������� �����');
DEFINE('_BUTTONS_TAB_GENERAL', '�����');
DEFINE('_BUTTONS_TAB_DISPLAY', '�����������');
DEFINE('_DISPLAY_BUTTON', '����������');
DEFINE('_PRESS_TO_CHOOSE_ICON', '������� ��� ������ �������� (��������� � ����� ����)');
DEFINE('_CHOOSE_ICON', '������� ��������');
DEFINE('_CHOOSE_ICON_TIP', '����������, �������� �������� ��� ���� ������. ���� ������ ��������� ����������� �������� ��� ������, �� ��� ������ ���� ��������� � ../administrator/images - ../images ../images/icons');
DEFINE('_PLEASE_ENTER_NUTTON_LINK', '��������� ��������');
DEFINE('_PLEASE_ENTER_BUTTON_TEXT', '����������, ��������� ���� �����');
DEFINE('_BUTTON_ERROR_PUBLISHING', '������ ����������');
DEFINE('_BUTTON_ERROR_UNPUBLISHING', '������ �������');
DEFINE('_BUTTONS_DELETED', '������ ������� �������');
DEFINE('_CHANGE_QUICK_BUTTONS', '�������� ������ �������� �������');

/* administrator components com_sections */
DEFINE('_SECTION_CHANGES_SAVED', '��������� ������� ���������');
DEFINE('_CONTENT_SECTIONS', '������� �����������');
DEFINE('_SECTION_NAME', '�������� �������');
DEFINE('_SECTION_CATEGORIES', '���������');
DEFINE('_SECTION_CONTENT_ITEMS', '��������');
DEFINE('_SECTION_CONTENT_ITEMS_IN_TRASH', '� �������');
DEFINE('_VIEW_SECTION_CATEGORIES', '�������� ��������� �������');
DEFINE('_VIEW_SECTION_CONTENT', '�������� ����������� �������');
DEFINE('_NEW_SECTION_MASK', '����� ������');
DEFINE('_CHOOSE_MENU_ITEM_NAME', '����������, ������� ��� ��� ����� ������ ����');
DEFINE('_ENTER_SECTION_NAME', '������ ������ ����� ��������');
DEFINE('_ENTER_SECTION_TITLE', '������ ������ ����� ���������');
DEFINE('_SECTION_ALREADY_EXISTS', '��� ������� ������ � ����� ���������. ����������, �������� �������� �������.');
DEFINE('_SECTION_DETAILS', '������ �������');
DEFINE('_SECTION_USED_IN', '������������ �');
DEFINE('_MENU_SHORT_NAME', '�������� ��� ��� ����');
DEFINE('_SECTION_NAME_OF_CATEGORY', '���������');
DEFINE('_SECTION_NAME_OF_SECTION', '�������');
DEFINE('_SECTION_NAME_TIP', '������� ��������, ������������ � ����������');
DEFINE('_SECTION_NEW_MENU_LINK', '��� ������� ������� ����� ����� � ��������� ���� ����');
DEFINE('_CHOOSE_MENU', '�������� ����');
DEFINE('_CHOOSE_MENU_TYPE', '�������� ��� ����');
DEFINE('_SECTION_COPYING', '����������� �������');
DEFINE('_SECTION_COPY_NAME', '�������� ����� �������');
DEFINE('_SECTION_COPY_DESCRIPTION', '�� ����� ��������� ������ �����<br />����������� ������������� ���������<br />� ��� ������������� �������<br />����������� ���������.');
DEFINE('_MASS_CONTENT_ADD', '�������� ����������');
DEFINE('_NEW_CAT_SECTION_ON_NEW_LINE', '������ ����� ���������/������ ������ ���������� � ����� ������');
DEFINE('_MASS_ADD_AS', '�������� ���');
DEFINE('_SECTIONS', '�������');
DEFINE('_CATEGORIES', '���������');
DEFINE('_CATEGORIES_WILL_BE_IN_SECTION', '��������� ���� ������������ �������');
DEFINE('_CONTENT_WILL_BE_IN_CATEGORY', '���������� ����� ������������ ���������');
DEFINE('_ADD_SECTIONS_RESULT', '��������� ���������� ��������');
DEFINE('_ADD_CATEGORIES_RESULT', '��������� ���������� ���������');
DEFINE('_ADD_CONTENT_RESULT', '��������� ���������� �����������');
DEFINE('_ERROR_WHEN_ADDING', '��������� ������ ��� ����������');
DEFINE('_SECTION_IS_BEING_EDITED_BY_ADMIN', '������ � ��������� ����� ������������� ������ ���������������');
DEFINE('_SECTION_TABLE', '������� �������');
DEFINE('_SECTION_BLOG', '���� �������');
DEFINE('_SECTION_BLOG_ARCHIVE', '���� ������ �������');
DEFINE('_SECTION_SAVED', '������ ��������');
DEFINE('_CHOOSE_SECTION_TO_DELETE', '�������� ������ ��� ��������');
DEFINE('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', '������� �� ����� ���� �������, �.�. �������� ���������');
DEFINE('_CHOOSE_SECTION_FOR', '�������� ������ ���');
DEFINE('_CANNOT_PUBLISH_EMPTY_SECTION', '���������� ������������ ������ ������');
DEFINE('_SECTION_CONTENT_COPYED', '��������� ���������� ������� ���� ����������� � ������');
DEFINE('_MENU_MASS_ADD', '�������� ���');

/* administrator components com_poll */
DEFINE('_POLL', '�����');
DEFINE('_POLLS', '������');
DEFINE('_POLL_HEADER', '��������� ������');
DEFINE('_POLL_LAG', '��������');
DEFINE('_CHANGE_POLL', '�������� �����');
DEFINE('_ENTER_POLL_NAME', '����� ������ ����� ��������');
DEFINE('_ENTER_POLL_LAG', '�������� ����� �������� �� ������ ���� �������');
DEFINE('_POLL_DETAILS', '������ ������');
DEFINE('_POLL_LAG_QUESIONS', '�������� ����� ��������');
DEFINE('_POLL_LAG_QUESIONS2', '������ ����� ��������� �������');
DEFINE('_POLL_OPTION', '������� ������');
DEFINE('_POLL_OPTIONS', '�������� �������');
DEFINE('_POLL_HITS', '�������');
DEFINE('_POLL_GRAFIC', '������');
DEFINE('_POLL_IS_BEING_EDITED_BY_ADMIN', '����� � ��������� ����� ������������� ������ ���������������');

/* administrator components com_newsfeeds */
DEFINE('_NEWSFEEDS_MANAGEMENT', '���������� ������� ��������');
DEFINE('_NEWSFEED_TITLE', '����� ��������');
DEFINE('_NEWSFEED_ON_SITE', '�� �����');
DEFINE('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', '���-�� ������');
DEFINE('_NEWSFEED_CACHE_TIME', '����� ���� (������)');
DEFINE('_CHANGE_NEWSFEED', '�������� ����� ��������');
DEFINE('_PLEASE_ENTER_NEWSFEED_NAME', '����������, ������� �������� �����');
DEFINE('_PLEASE_ENTER_NEWSFEED_LINK', '����������, ������� ������ ����� ��������');
DEFINE('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', '����������, ������� ���������� ������ ��� �����������');
DEFINE('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', '����������, ������� ����� ���������� ����');
DEFINE('_NEWSFEED_LINK', '������');
DEFINE('_NEWSFEED_DECODE_FROM_UTF', '�������������� �� UTF-8');

/* administrator components com_modules */
DEFINE('_ALL_MODULE_CHANGES_SAVED', '��� ��������� ������ ������� ���������');
DEFINE('_MODULES', '������');
DEFINE('_MODULE_NAME', '�������� ������');
DEFINE('_MODULE_POSITION', '�������');
DEFINE('_ASSIGN_TO_URL', '�������� � URL');
DEFINE('_ASSIGN_TO_URL_TIP', '������:<br /><br />!option=com_content&task=view&id=4<br />option=com_content&task=view<br />option=com_content&task=blogcategory&id>4<br /><br />! - �� ���� ��������� ������ �� ������������<br />= < > != �����, ������, ������, �� ����� - ����� ��������� ��� �������� ����������');
DEFINE('_MODULE_PAGES', '��������');
DEFINE('_MODULE_PAGES_SOME', '���������');
DEFINE('_SHOW_TITLE', '���������� ���������');
DEFINE('_MODULE_ORDER', '������� ������');
DEFINE('_MODULE_PAGE_MENU_ITEMS', '��������/������ ����');
DEFINE('_MODULE_USER_CONTENT', '���������������� ���/���������� ������');
DEFINE('_MODULE_COPIED', '������ ����������');
DEFINE('_CANNOT_DELETE_MOD_MAINMENU', '�� �� ������ ������� ������ mod_mainmenu, ������������ ��� &laquo;mainmenu&raquo;, �.�. ��� ���� ����');
DEFINE('_CANNOT_DELETE_MODULES', '������ �� ����� ���� �������, �.�. ��� ����� ���� ������ ����������������, ��� ��� ������ Joostina.');
DEFINE('_PREVIEW_ONLY_CREATED_MODULES', '�� ������ ����������� ������ &laquo;���������&raquo; ������');

/* administrator components com_modules */
DEFINE('_WEBLINKS_MANAGEMENT', '���������� web-��������');
DEFINE('_WEBLINKS_HITS', '���������');
DEFINE('_CHANGE_WEBLINK', '�������� web-������');
DEFINE('_ENTER_WEBLINK_TITLE', 'Web-������ ������ ����� ���������');
DEFINE('_PLEASE_ENTER_URL', '�� ������ ������ URL');
DEFINE('_WEBLINK_URL', 'Web-������');
DEFINE('_WEBLINK_NAME', '��������');

/* administrator components com_jwmmxtd */
DEFINE('_RENAME', '�������������');
DEFINE('_JWMM_DIRECTORIES', '���������');
DEFINE('_JWMM_FILES', '������');
DEFINE('_JWMM_MOVE', '�����������');
DEFINE('_JWMM_BYTES', '����');
DEFINE('_JWMM_KBYTES', '��');
DEFINE('_JWMM_MBYTES', '��');
DEFINE('_JWMM_DELETE_FILE_CONFIRM', '������� ����');
DEFINE('_CLICK_TO_PREVIEW', '������� ��� ���������');
DEFINE('_JWMM_FILESIZE', '������');
DEFINE('_WIDTH', '������');
DEFINE('_HEIGHT', '������');
DEFINE('_UNPACK', '�����������');
DEFINE('_JWMM_VIDEO_FILE', '����� ����');
DEFINE('_JWMM_HACK_ATTEMPT', '������� �������');
DEFINE('_JWMM_DIRECTORY_NOT_EMPTY', '������� �� ������. ����������, ������� ������� ���������� ������ ��������!');
DEFINE('_JWMM_DELETE_CATALOG', '������� �������');
DEFINE('_JWMM_SAFE_MODE_WARNING', '��� �������������� ��������� SAFE MODE �������� �������� � ��������� ���������');
DEFINE('_JWMM_CATALOG_CREATED', '������ �������');
DEFINE('_JWMM_CATALOG_NOT_CREATED', '������ �� �������');
DEFINE('_JWMM_FILE_DELETED', '���� ������� �����');
DEFINE('_JWMM_FILE_NOT_DELETED', '���� �� �����');
DEFINE('_JWMM_DIRECTORY_DELETED', '������� �����');
DEFINE('_JWMM_DIRECTORY_NOT_DELETED', '������� �� �����');
DEFINE('_JWMM_RENAMED', '�������������');
DEFINE('_JWMM_NOT_RENAMED', '�� �������������');
DEFINE('_JWMM_COPIED', '�����������');
DEFINE('_JWMM_NOT_COPIED', '�� �����������');
DEFINE('_JWMM_FILE_MOVED', '���� ���������');
DEFINE('_JWMM_FILE_NOT_MOVED', '���� �� ���������');
DEFINE('_TMP_DIR_CLEANED', '��������� ������� ��������� ������');
DEFINE('_TMP_DIR_NOT_CLEANED', '��������� ������� �� ������');
DEFINE('_FILES_UNPACKED', '����(��) �����������');
DEFINE('_ERROR_WHEN_UNPACKING', '������ ����������');
DEFINE('_FILE_IS_NOT_A_ZIP', '���� �� �������� ���������� zip �������');
DEFINE('_FILE_NOT_EXIST', '���� �� ����������');
DEFINE('_IMAGE_SAVED_AS', '����������������� ����������� ��������� ���');
DEFINE('_IMAGE_NOT_SAVED', '����������� �� ���������');
DEFINE('_FILES_NOT_UPLOADED', '����(�) �� ��������� �� ������');
DEFINE('_FILES_UPLOADED', '����� ���������');
DEFINE('_DIRECTORIES', '��������');
DEFINE('_JWMM_FILE_NAME_WARNING', '����������, �� ����������� � ��������� ������� � �����������');
DEFINE('_JWMM_MEDIA_MANAGER', '����� ��������');
DEFINE('_JWMM_CREATE_DIRECTORY', '������� �������');
DEFINE('_UPLOAD_FILE', '��������� ����');
DEFINE('_JWMM_FILE_PATH', '��������������');
DEFINE('_JWMM_UP_TO_DIRECTORY', '������� �� ������� ����');
DEFINE('_JWMM_RENAMING', '��������������');
DEFINE('_JWMM_NEW_NAME', '����� ��� (������� ����������!)');
DEFINE('_CHOOSE_DIR_TO_COPY', '�������� ������� ��� �����������');
DEFINE('_JWMM_COPY_TO', '���������� �');
DEFINE('_CHOOSE_DIR_TO_MOVE', '�������� ������� ��� �����������');
DEFINE('_JWMM_MOVE_TO', '����������� �');
DEFINE('_CHOOSE_DIR_TO_UNPACK', '�������� ������� ��� ����������');
DEFINE('_DERICTORY_TO_UNPACK', '������� ����������');
DEFINE('_NUMBER_OF_IMAGES_IN_TMP_DIR', '����� ����������� �� ��������� ��������');
DEFINE('_CLEAR_DIRECTORY', '�������� �������');
DEFINE('_JWMM_ERROR_EDIT_FILE', '������ ��� ��������� �����');
DEFINE('_JWMM_EDIT_IMAGE', '�������������� �����������');
DEFINE('_JWMM_IMAGE_RESIZE', '���������� �����������');
DEFINE('_JWMM_IMAGE_CROP', '��������');
DEFINE('_JWMM_IMAGE_SIZE', '�������');
DEFINE('_JWMM_X_Y_POSITION', 'X � Y ����������');
DEFINE('_JWMM_BY_HEIGHT', '���������');
DEFINE('_JWMM_BY_WIDTH', '�����������');
DEFINE('_JWMM_CROP_TOP', '������');
DEFINE('_JWMM_CROP_LEFT', '�����');
DEFINE('_JWMM_CROP_RIGHT', '������');
DEFINE('_JWMM_CROP_BOTTOM', '�����');
DEFINE('_JWMM_ROTATION', '�������');
DEFINE('_JWMM_CHOOSE', '-�����-');
DEFINE('_JWMM_MIRROR', '���������');
DEFINE('_JWMM_VERICAL', '���������');
DEFINE('_JWMM_HORIZONTAL', '�����������');
DEFINE('_JWMM_GRADIENT_BORDER', '����������� �����');
DEFINE('_JWMM_SIZE_PX', '������ px');
DEFINE('_JWMM_TOP_LEFT', '������-�����');
DEFINE('_JWMM_PRESS_TO_CHOOSE_COLOR', '������� ��� ������ �����');
DEFINE('_JWMM_BOTTOM_RIGHT', '������-�����');
DEFINE('_JWMM_BORDER', '������');
DEFINE('_COLOR', '����');
DEFINE('_JWMM_ALL_BORDERS', '��� �������');
DEFINE('_JWMM_TOP', '������');
DEFINE('_JWMM_LEFT', '�����');
DEFINE('_JWMM_RIGHT', '������');
DEFINE('_JWMM_BOTTOM', '�����');
DEFINE('_JWMM_BRIGHTNESS', '�������');
DEFINE('_JWMM_CONTRAST', '��������');
DEFINE('_JWMM_ADDITIONAL_ACTIONS', '�������������� ��������');
DEFINE('_JWMM_GRAY_SCALE', '�������� ������');
DEFINE('_JWMM_NEGATIVE', '�������');
DEFINE('_JWMM_ADD_TEXT', '�������� �����');
DEFINE('_JWMM_TEXT', '�����');
DEFINE('_JWMM_TEXT_COLOR', '���� ������');
DEFINE('_JWMM_TEXT_FONT', '����� ������');
DEFINE('_JWMM_TEXT_SIZE', '������ ������');
DEFINE('_JWMM_ORIENTATION', '����������');
DEFINE('_JWMM_BG_COLOR', '���� ����');
DEFINE('_JWMM_XY_POSITION', '������������ �� X � Y');
DEFINE('_JWMM_XY_PADDING', '������� �� X � Y');
DEFINE('_JWMM_FIRST', '������');
DEFINE('_JWMM_SECOND', '������');
DEFINE('_JWMM_THIRDTH', '�������');
DEFINE('_JWMM_CANCEL_ALL', '�������� ��');

/* administrator components com_joomlaxplorer */
DEFINE('_MENU_GZIP', '���������');
DEFINE('_MENU_MOVE', '�����������');
DEFINE('_MENU_CHMOD', '����� ����');

/* administrator components com_joomlapack */
DEFINE('_JP_BACKUPPING', '��������������');
DEFINE('_JP_PHPINFO', '-���������� � PHP-');
DEFINE('_JP_FREEMEMORY', '�������� ������');
DEFINE('_JP_GZIP_ENABLED', 'GZIP ������: �������� (��� ������)');
DEFINE('_JP_GZIP_NOT_ENABLED', 'GZIP ������: ���������� (��� �����)');
DEFINE('_JP_START_BACKUP_DB', '������ �������������� ���� ������');
DEFINE('_JP_START_BACKUP_FILES', '������ �������������� ���� ������ �����');
DEFINE('_JP_CUBE_ON_STEP', 'CUBE: ������ �� ����');
DEFINE('_JP_CUBE_STEP_FINISHED', 'CUBE: ��� �������� ');
DEFINE('_JP_CUBE_FINISHED', 'CUBE: ���������!');
DEFINE('_JP_ERROR_ON_STEP', 'CUBE: ������ �� ���� ');
DEFINE('_JP_CLEANUP', '�������');
DEFINE('_JP_RECURSING_DELETION', '����������� �������� ');
DEFINE('_JP_NOT_FILE', '�������� <strong>��� ����, �� �������!</strong>');
DEFINE('_JP_ERROR_DEL_DIRECTORY', '������ �������� ��������. ��������� ����� �������');
DEFINE('_JP_QUICK_MODE', '����� ���������������');
DEFINE('_JP_QUICK_MODE_ON_STEP', '������������ ������� �������� �� ����');
DEFINE('_JP_CANNOT_USE_QUICK_MODE', '���������� ������������ ������� �������� �� ����');
DEFINE('_JP_MULTISTEP_MODE', '����� ����������������');
DEFINE('_JP_MULTISTEP_MODE_ON_STEP', '������������ ��������� �������� �� ����');
DEFINE('_JP_MULTISTEP_MODE_ERROR', '������ ���������� ���������� ��������� �� ����');
DEFINE('_JP_SMART_MODE', '���������� �����');
DEFINE('_JP_SMART_MODE_ON_STEP', '���������� ����������� ������ �� ����');
DEFINE('_JP_SMART_MODE_ERROR', '������ ���������� ����������� ������ �� ����');
DEFINE('_JP_CHOOSED_ALGO', '������');
DEFINE('_JP_ALGORITHM_FOR', '�������� ���');
DEFINE('_JP_NEXT_STEP_BACKUP_DB', '��������� ��� &rarr; �������������� ����');
DEFINE('_JP_NEXT_STEP_FILE_LIST', '��������� ��� &rarr; �������� ������ ������');
DEFINE('_JP_NEXT_STEP_FINISHING', '��������� ��� &rarr; ����������');
DEFINE('_JP_NEXT_STEP_GZIP', '��������� ��� &rarr; ��������');
DEFINE('_JP_NEXT_STEP_FINISHED', '��������� ��� &rarr; ���������');
DEFINE('_JP_NO_NEXT_STEP', '��������� ��� �� ���������; �� ��� ���������');
DEFINE('_JP_NO_CUBE', '��� ������������� CUBE; �������� ������');
DEFINE('_JP_CURRENT_STEP', '������� ���');
DEFINE('_JP_UNPACKING_CUBE', '���������� ������������� CUBE');
DEFINE('_JP_TIMEOUT', '����� �� ���������� �������� �����, �� �������� �� ���������');
DEFINE('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine: ��������� ������ ������');
DEFINE('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine: �������������� ������ ���� ������');
DEFINE('_JP_ONE_FILE_STORE', 'CDBBackupEngine: ������ ����������� ������');
DEFINE('_JP_FILE_STRUCTURE', 'CDBBackupEngine: ���� ���������');
DEFINE('_JP_DATAFILE', 'CDBBackupEngine: ���� ������');
DEFINE('_JP_FILE_DELETION', 'CDBBackupEngine: �������� ������');
DEFINE('_JP_FIRST_STEP', 'CDBBackupEngine: ������ ������');
DEFINE('_JP_ALL_COMPLETED', 'CDBBackupEngine: �� ���������');
DEFINE('_JP_START_TICK', 'CDBBackupEngine: ������ ���������');
DEFINE('_JP_READY_FOR_TABLE', '��������� ��� �������');
DEFINE('_JP_DB_BACKUP_COMPLETED', '�������������� ���� ������ ���������');
DEFINE('_JP_NEW_FRAGMENT_ADDED', '�������� ����� ��������');
DEFINE('_JP_KERNEL_TABLES', '������� ����');
DEFINE('_JP_FIRST_STEP_2', '������ ������');
DEFINE('_JP_NEXT_VALUE', '�������� ��������');
DEFINE('_JP_SKIP_TABLE', '������� �������');
DEFINE('_JP_GETTING', '���������');
DEFINE('_JP_COLUMN_FROM', '������� ��');
DEFINE('_JP_ERROR_WRITING_FILE', '������ ������ � ����');
DEFINE('_JP_CANNOT_SAVE_DUMP', '���������� ��������� � ����');
DEFINE('_JP_CHECK_RESULTS', '���������� ��������');
DEFINE('_JP_ANALYZE_RESULTS', '���������� �������');
DEFINE('_JP_OPTIMIZE_RESULTS', '���������� �����������');
DEFINE('_JP_REPAIR_RESULTS', '���������� �����������');
DEFINE('_JP_GETTING_DIRS_LIST', '��������� ������ ��������� ��� ���������� �� ��������� �����');
DEFINE('_JP_GZIP_FIRST_STEP', '��������: ������ ���');
DEFINE('_JP_GZIP_FINISHED', '��������: ���������');
DEFINE('_JP_PACK_FINISHED', '���������� �������������');
DEFINE('_JP_GZIP_OF_FRAGMENT', '������������� ��������� #');
DEFINE('_JP_CURRENT_FRAGMENT', ' ������� ��������');
DEFINE('_JP_DELETE_PATH', ' ���� ��� �������� :');
DEFINE('_JP_PATH_TO_DELETE', ' ���� ��� ���������� ');
DEFINE('_JP_SAVING_ARCHIVE_INFO', '���������� ���������� � �������� ��������');
DEFINE('_JP_LOADING_ARCHIVE_INFO', '�������� ���������� � �������� ��������');
DEFINE('_JP_ADDING_FILE_TO_ARCHIVE', '���������� ������ � �����');
DEFINE('_JP_ARCHIVING', '�������������');
DEFINE('_JP_ARCHIVE_COMPLETED', '������������� ���������');
DEFINE('_JP_BACKUP_CONFIG', '������������ ���������� ����������� ������');
DEFINE('_JP_CONFIG_SAVING', '���������� ��������');
DEFINE('_JP_MAIN_CONFIG', '�������� ���������');
DEFINE('_JP_CONFIG_DIRECTORY', '������� ���������� �������');
DEFINE('_JP_ARCHIVE_NAME', '�������� ������');
DEFINE('_JP_LOG_LEVEL', '������� ������� ����');
DEFINE('_JP_ADDITIONAL_CONFIG', '�������������� ���������');
DEFINE('_JP_DELETE_PREFIX', '������� �������� ������');
DEFINE('_JP_EXPORT_TYPE', '��� �������� ���� ������');
DEFINE('_JP_FILELIST_ALGORITHM', '��������� ������');
DEFINE('_JP_CONFIG_DB_BACKUP', '��������� ����');
DEFINE('_JP_CONFIG_GZIP', '������ ������');
DEFINE('_JP_CONFIG_DUMP_GZIP', '������ ����� ���� ������');
DEFINE('_JP_AVAILABLE', '<strong class="green">��������</strong>');
DEFINE('_JP_NOT_AVAILABLE', '<strong class="red">����������</strong>');
DEFINE('_JP_MYSQL4_COMPAT', '� ������ ������������� � MySQL 4');
DEFINE('_JP_NO_GZIP', '�� ������������ (.sql)');
DEFINE('_JP_GZIP_TAR_GZ', '������������ � TAR.GZ (.tar.gz)');
DEFINE('_JP_GZIP_ZIP', '������������ � ZIP (.zip)');
DEFINE('_JP_QUICK_METHOD', '������ - ���� ������');
DEFINE('_JP_STANDARD_METHOD', '������������� - ����������');
DEFINE('_JP_SLOW_METHOD', '�������� - �����������������');
DEFINE('_JP_LOG_ERRORS_OLY', '������ ������');
DEFINE('_JP_LOG_ERROR_WARNINGS', '������ � ��������������');
DEFINE('_JP_LOG_ALL', '��� ����������');
DEFINE('_JP_LOG_ALL_DEBUG', '��� ���������� � �������');
DEFINE('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', '�� ��������� �������� � ��������� �����');
DEFINE('_FILE_NAME', '��� �����');
DEFINE('_JP_DOWNLOAD_FILE', '�������');
DEFINE('_JP_REALLY_DELETE_FILE', '������������� ������� ����?');
DEFINE('_JP_FILE_CREATION_DATE', '������');
DEFINE('_JP_NO_BACKUPS', '����� ��������� ����� �����������');
DEFINE('_JP_ACTIONS_LOG', '��� ���������� ��������');
DEFINE('_JP_BACKUP_MANAGEMENT', '��������� �����������');
DEFINE('_JP_CREATE_BACKUP', '������� ����� ������');
DEFINE('_JP_DB_MANAGEMENT', '���������� ����� ������');
DEFINE('_JP_DONT_SAVE_DIRECTORIES', '�� ��������� ��������');
DEFINE('_JP_CONFIG', '��������� ����������');
DEFINE('_JP_ERRORS_TMP_DIR', '���������� ������, ��������� ����������� ������ � ������� �������� ��������� �����');
DEFINE('_JP_BACKUP_CREATION', '�������� ��������� ����� ������');
DEFINE('_JP_DONT_CLOSE_BROWSER_WINDOW', '����������, �� ���������� ���� �������� � �� ���������� � ���� �������� �� ��������� �������������� � ����������� ���������������� ���������.');
DEFINE('_JP_ERRORS_VIEW_LOG', '� ���� ������ ���������� ������, ����������, <a href="index2.php?option=com_joomlapack&act=log">���������� ���</a> ������ � �������� �������.');
DEFINE('_JP_BACKUP_SUCCESS', '�������������� ������ ����� ��������� �������. �������');
DEFINE('_JP_CREATION_FILELIST', '1. �������� ������ ������ ��� �������������.');
DEFINE('_JP_BACKUPPING_DB', '2. ������������� ���� ������.');
DEFINE('_JP_CREATION_OF_ARCHIVE', '3. �������� ��������� ������.');
DEFINE('_JP_ALL_COMPLETED_2', '4. �� ���������');
DEFINE('_JP_PROGRESS', '���������');
DEFINE('_JP_TABLES', '�������');
DEFINE('_JP_TABLE_ROWS', '�������');
DEFINE('_JP_SIZE', '������');
DEFINE('_JP_INCREMENT', '����������');
DEFINE('_JP_CREATION_DATE', '�������');
DEFINE('_JP_CHECKING', '��������');
DEFINE('_JP_FULL_BACKUP', '������ ������');
DEFINE('_JP_BACKUP_BASE', '������������� ����');
DEFINE('_JP_BACKUP_PANEL', '������ ��������������');

/* administrator modules mod_components */
DEFINE('_FULL_COMPONENTS_LIST', '������ ������ �����������');

/* administrator modules mod_fullmenu */
DEFINE('_MENU_CMS_FEATURES', '���������� ��������� ������������� �������');
DEFINE('_MENU_GLOBAL_CONFIG', '���������� ������������');
DEFINE('_MENU_GLOBAL_CONFIG_TIP', '��������� �������� ���������� ������������ �������');
DEFINE('_MENU_LANGUAGES', '�������� ������');
DEFINE('_MENU_LANGUAGES_TIP', '���������� ��������� �������');
DEFINE('_MENU_SITE_PREVIEW', '������������ �����');
DEFINE('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', '� ����� ����');
DEFINE('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', '������');
DEFINE('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', '������ � ���������');
DEFINE('_MENU_SITE_STATS', '���������� �����');
DEFINE('_MENU_SITE_STATS_TIP', '�������� ���������� �� �����');
DEFINE('_MENU_STATS_BROWSERS', '��������, ��, ������');
DEFINE('_MENU_STATS_BROWSERS_TIP', '���������� ��������� ����� �� ���������, �� � �������');
DEFINE('_MENU_SEARCHES', '��������� �������');
DEFINE('_MENU_SEARCHES_TIP', '���������� ��������� �������� �� �����');
DEFINE('_MENU_PAGE_STATS', '���������� ��������� �������');
DEFINE('_MENU_TEMPLATES_TIP', '���������� ���������');
DEFINE('_MENU_SITE_TEMPLATES', '������� �����');
DEFINE('_MENU_NEW_SITE_TEMPLATE', '��������� ������ �������');
DEFINE('_MENU_ADMIN_TEMPLATES', '������� �����������');
DEFINE('_MENU_NEW_ADMIN_TEMPLATE', '��������� ������ �������');
DEFINE('_MENU', '����');
DEFINE('_MENU_TRASH', '������� ����');
DEFINE('_CONTENT_IN_SECTIONS', '���������� �� ��������');
DEFINE('_CONTENT_IN_SECTION', '���������� � �������');
DEFINE('_SECTION_ARCHIVE', '����� �������');
DEFINE('_SECTION_CATEGORIES2', '��������� �������');
DEFINE('_ADD_CONTENT_ITEM', '�������� �������/������');
DEFINE('_ADD_STATIC_CONTENT', '�������� ��������� ����������');
DEFINE('_CONTENT_ON_FRONTPAGE', '���������� �� �������');
DEFINE('_CONTENT_TRASH', '������� �����������');
DEFINE('_ALL_COMPONENTS', '��� �����������');
DEFINE('_EDIT_COMPONENTS_MENU', '������������� ���� �����������');
DEFINE('_COMPONENTS_INSTALL_UNINSTALL', '���������/�������� �����������');
DEFINE('_MODULES_SETUP', '���������� ��������');
DEFINE('_MODULES_INSTALL_DEINSTALL', '���������/�������� �������');
DEFINE('_SITE_MAMBOTS', '������� �����');
DEFINE('_MAMBOTS_INSTALL_UNINSTALL', '���������/�������� ��������');
DEFINE('_SITE_LANGUAGES', '����� �����');
DEFINE('_JOOMLA_TOOLS', '�����������');
DEFINE('_PRIVATE_MESSAGES_CONFIG', '��������� ���������');
DEFINE('_FILE_MANAGER', '�������� ������');
DEFINE('_SQL_CONSOLE', 'SQL �������');
DEFINE('_BACKUP_CONFIG', '��������� ���������� ������');
DEFINE('_CLEAR_CONTENT_CACHE', '�������� ��� �����������');
DEFINE('_CLEAR_ALL_CACHE', '�������� ���� ���');
DEFINE('_SYSTEM_INFO', '���������� � �������');
DEFINE('_NO_ACTIVE_MENU_ON_THIS_PAGE', '�� ���� �������� ���� �� �������');

/* administrator modules mod_latest */
DEFINE('_LAST_ADDED_CONTENT', '��������� ����������� ����������');
DEFINE('_USER_WHO_ADD_CONTENT', '�������');

/* administrator modules mod_latest_users */
DEFINE('_NOW_ON_SITE', '������ �� �����');
DEFINE('_REGISTERED_USERS_COUNT', '����������������');
DEFINE('_ALL_REGISTERED_USERS_COUNT', '�����');
DEFINE('_TODAY_REGISTERED_USERS_COUNT', '�� �������');
DEFINE('_WEEK_REGISTERED_USERS_COUNT', '�� ������');
DEFINE('_MONTH_REGISTERED_USERS_COUNT', '�� �����');
DEFINE('_ADMINLIST_NEW', '����� ������������');
DEFINE('_ADMINLIST_ENABLE', '��������');
DEFINE('_ADMINLIST_GROUP', '������');
DEFINE('_ADMINLIST_REGISTERED', '���������������');
DEFINE('_ADMINLIST_ALL', '��');

/* administrator modules mod_logged */
DEFINE('_NOW_ON_SITE_REGISTERED', '������ �� ����� ������������');

/* administrator modules mod_online */
DEFINE('_ONLINE_USERS', '������������� ������');

/* administrator modules mod_popular */
DEFINE('_POPULAR_CONTENT', '����� ���������������');
DEFINE('_CREATED_CONTENT', '�������');
DEFINE('_CONTENT_HITS', '����������');

/* administrator modules mod_stats */
DEFINE('_MENU_ITEMS_COUNT', '�������');

/* administrator modules includes admin.php */
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE', '����������, �������� ������� ���� ��������� ��� ������');
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE2', '������� ���� �� �������� ��� ������');
DEFINE('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc ����������� � &laquo;OFF&raquo; ������ &laquo;ON&raquo;');
DEFINE('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals ����������� � &laquo;ON&raquo; ������ &laquo;OFF&raquo;');
DEFINE('_RG_EMULATION_ON_OFF', '�������� Joostina RG_EMULATION � ����� globals.php ���������� � &laquo;ONraquo; ������ &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - �������� �� ��������� - ��� �������������</span>');
DEFINE('_PHP_SETTINGS_WARNING', '��������� ��������� PHP �� �������� ������������ ��� <strong>������������</strong> � �� ������������� ��������');
DEFINE('_MENU_CACHE_CLEANED', '��� ���� ������ ���������� ������');
DEFINE('_CLEANING_ADMIN_MENU_CACHE', '������ ������� ���� ���� ������ ����������');
DEFINE('_NO_MENU_ADMIN_CACHE', '��� ���� ������ ���������� �� ���������. ��������� ����� ������� �� ������� ����.');

/* administrator modules includes pageNavigation.php */
DEFINE('_NAV_SHOW', '��������');
DEFINE('_NAV_SHOW_FROM', '��');
DEFINE('_NAV_NO_RECORDS', '������ �� �������');
DEFINE('_NAV_ORDER_UP', '����������� ����');
DEFINE('_NAV_ORDER_DOWN', '����������� ����');

/* administrator modules popups pollwindow.php */
DEFINE('_POLL_PREVIEW', '������������ ������');

/* administrator modules popups uploadimage.php */
DEFINE('_CHOOSE_IMAGE_FOR_UPLOAD', '����������, �������� ����������� ��� ��������');
DEFINE('_BAD_UPLOAD_FILE_NAME', '����� ������ ������ �������� �� �������� �������� � �� ������ ��������� ��������');
DEFINE('_IMAGE_ALREADY_EXISST', '����������� ��� ����������');
DEFINE('_FILE_MUST_HAVE_THIS_EXTENSION', '���� ������ ����� ����������');
DEFINE('_FILE_UPLOAD_UNSUCCESS', '�������� ����� ��������');
DEFINE('_FILE_UPLOAD_SUCCESS', '�������� ����� ������� ���������');

/* administrator index.php index2.php index3.php */
DEFINE('_PLEASE_ENTER_PASSWORD', '����������, ������� ������');
DEFINE('_BAD_CAPTCHA_STRING', '������ �������� ��� ��������');
DEFINE('_BAD_USERNAME_OR_PASSWORD', '�������� ��� ������������, ������, ��� ������� �������.  ����������, ��������� �����');
DEFINE('_BAD_USERNAME_OR_PASSWORD2', '��� ��� ������ �� �����. ��������� ����.'); // not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
DEFINE('_JOOSTINA_CONTRL_PANEL', '������ ���������� [Joostina]');
DEFINE('_GO_TO_MAIN_ADMIN_PAGE', '������� �� ������� �������� ������ ����������');
DEFINE('_PLEASE_WAIT', '�����');
DEFINE('_TOGGLE_WYSIWYG_EDITOR', '������������� ����������� ���������');
DEFINE('_DISABLE_WYSIWYG_EDITOR', '��������� ��������');
DEFINE('_PRESS_HERE_TO_RELOAD_CAPTCHA', '������� ����� �������� �����������');
DEFINE('_SHOW_CAPTCHA', '�������� �����������');
DEFINE('_PLEASE_ENTER_CAPTCHA', '������� ��� �������� � ��������:');
DEFINE('_PLEASE_ENABLE_JAVASCRIPT', '��������������! Javascript ������ ���� ��������� ��� ���������� ������ ������ ���������� ��������������!');

/* includes feedcreator.class.php */
DEFINE('_ERROR_CREATING_NEWSFEED', '������ �������� ����� ����� ��������. ����������, ��������� ���������� �� ������');

/* includes joomla.php */
DEFINE('_YOU_NEED_TO_AUTH', '���������� ��������������');
DEFINE('_ADMIN_SESSION_ENDED', '������ �������������� �����������');
DEFINE('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', '��� ���������� ��������������. ���� ������� �������� PHP session.auto_start ��� �������� �������� session.use_cookies setting, �� ������� �� ������ �� ��������� ����� ���, ��� ������� �����');
DEFINE('_WRONG_USER_SESSION', '������������ ������');
DEFINE('_FIRST', '������');
DEFINE('_LAST', '���������');
DEFINE('_MOS_WARNING', '��������!');
DEFINE('_ADM_MENUS_TARGET_CUR_WINDOW', '������� ���� � ������� ���������');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', '����� ���� � ������� ���������');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', '����� ���� ��� ������ ���������');
DEFINE('_WITH_UNASSIGNED', '�� ����������');
DEFINE('_CHOOSE_IMAGE', '�������� �����������');
DEFINE('_NO_USER', '��� ������������');
DEFINE('_CREATE_CATEGORIES_FIRST', '������� ���������� ������� ���������');
DEFINE('_NOT_CHOOSED', '�� �������');
DEFINE('_PUBLISHED_VUT_NOT_ACTIVE', '������������, �� <u>�� �������</u>');
DEFINE('_PUBLISHED_AND_ACTIVE', '������������ � <u>�������</u>');
DEFINE('_PUBLISHED_BUT_DATE_EXPIRED', '������������, �� <u>����� ���� ����������</u>');
DEFINE('_NOT_PUBLISHED', '�� ������������');
DEFINE('_LINK_NAME', '�������� ������');
DEFINE('_MENU_EXPIRED', '��������');
DEFINE('_MENU_ITEM_NAME', '�������� ������');
DEFINE('_CHECKED_OUT', '�������������');
DEFINE('_PUBLISH_ON_FRONTPAGE', '������������ �� �����');
DEFINE('_UNPUBLISH_ON_FRONTPAGE', '������ (�� ���������� �� �����)');

/* includes joomla.xml.php */
DEFINE('_DONT_USE_IMAGE', '-�� ������������ �����������-');
DEFINE('_DEFAULT_IMAGE', '-����������� �� ���������-');

/* includes debug jdebug.php */
DEFINE('_SQL_QUERIES_COUNT', '����� SQL ��������');

/* includes Cache Lite Lite.php */
DEFINE('_ERROR_DELETING_CACHE', '������ �������� ����');
DEFINE('_ERROR_READING_CACHE_DIR', '������ ������ ���������� ����');
DEFINE('_ERROR_READING_CACHE_FILE', '������ ������ ����� ����');
DEFINE('_ERROR_WRITING_CACHE_FILE', '������ ������ ����� ����');
DEFINE('_SCRIPT_MEMORY_USING', '������������ ������');

/* components com_content */
DEFINE('_YOU_HAVE_NO_CONTENT', '��� ������������ ���� �����������');
DEFINE('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', '���������� ������ ������������� ������ ���������');

/* components com_poll */
DEFINE('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', '��� ���������� ������ � ����� ���������. ������� ������  ��������.');

/* components com_registration */
DEFINE('_USER_ACTIVATION_FAILED', '<div class="componentheading">������ ���������!</div><p>��������� ����� ������� ������ ����������. ����������, ���������� � ������������� �����.</p>');

/* components com_weblinks */
DEFINE('_ENTER_CORRECT_URL', '������� ���������� URL!');
DEFINE('_ENTER_CORRECT_TITLE', '������ ������ ����� ���������!');
DEFINE('_ENTER_CORRECT_CAT', '�� ������ ������� ���������');
DEFINE('_ENTER_CORRECT_URL1', '�� ������ ������ URL');

/* components com_xmap */
DEFINE('_XMAP_PAGE', ' ��������');

/* administrator index2.php */
DEFINE('_TEMPLATE_NOT_FOUND', '������ �� ���������');
DEFINE('_ACCESS_DENIED', '� ������� ��������');
DEFINE('_CHECKIN_OJECT', '��������������');

/** includes/pdf.php */
DEFINE('_PDF_GENERATED','�������:');
DEFINE('_PDF_POWERED','�������� �� Joostina!');
?>