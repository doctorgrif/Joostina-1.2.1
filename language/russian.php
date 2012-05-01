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
global $mosConfig_form_date, $mosConfig_live_site, $mosConfig_form_date_full, $month_date, $month;

// �������� ����� �� �������
define('_404', '����������� �������� �� �������.');
define('_404_TEXT', '������������� ���� �������� ����������� � �������� ��� ��� ���� ������� ��������� ����� �����.');
define('_404_FULLTEXT', '�� ������ <a href="mailto:' . $mosConfig_mailfrom . '" title="E-mail">��������</a> �� ���� �������������� ����� ��� ��������� �� <a href="<' . $mosConfig_live_site . '" title="' . $mosConfig_sitename . '">������� ��������</a>.');
define('_404_RTS', '��������� �� ����.');

define('_SYSERR1', '��� ��������� MySQL.');
define('_SYSERR2', '���������� ������������ � ������� ���� ������.');
define('_SYSERR3', '���������� ������������ � ���� ������.');

// Error 503 (Database Error)
define('_503', '��������, ������ �������� ����������.');
define('_503_RTS', '��������� �� ���� �����.');

// common
define('_FAILED_ITEM', '����������� ����������');
define('_OR', '���');
define('_IN_SCRIPT', '� �������.');
define('_LANGUAGE', 'ru');
define('_NEW', '�����');
define('_NOT_AUTH', '��������, �� ��� ��������� ���� �������� � ��� ������������ ����.');
define('_DO_LOGIN', '�� ������ �������������� ��� ������ �����������.');
define('_VALID_AZ09', '����������, ���������, ��������� �� �������� %s.  ��� �� ������ ��������� ��������, ������ ������� 0-9, a-z, A-Z � ����� ����� �� ����� %d ��������.');
define('_VALID_AZ09_USER', '����������, ��������� ������� %s. ������ ��������� ������ ������� 0-9, a-z, A-Z � ����� ����� �� ����� %d ��������.');
define('_CMN_YES', '��');
define('_CMN_NO', '���');
define('_CMN_SHOW', '��������');
define('_CMN_HIDE', '������');
define('_CMN_NAME', '���');
define('_CMN_DESCRIPTION', '��������');
define('_CMN_SAVE', '���������');
define('_CMN_APPLY', '���������');
define('_CMN_CANCEL', '������');
define('_CMN_PRINT', '������');
define('_CMN_PDF','PDF');
define('_CMN_RSS','RSS');
define('_CMN_EMAIL', 'E-mail');
define('_CMN_SITEMAP', '����� �����');
define('_ICON_SEP', '|');
define('_CMN_PARENT', '��������');
define('_CMN_SEARCHPHRASE', '��� ������ �� �������� �����');
define('_CMN_ORDERING', '����������');
define('_CMN_ACCESS', '������� �������');
define('_CMN_SELECT', '�������');
define('_CMN_SELECT_PH', '����������� �����');
define('_CMN_NEXT', '<span class="pagenav_txt">��������� &rarr;</span>');
//define('_CMN_NEXT_ARROW', '&nbsp;&raquo;');
define('_CMN_PREV', '<span class="pagenav_txt">&larr; ����������</span>');
//define('_CMN_PREV_ARROW', '&laquo;&nbsp;');
define('_CMN_SORT_NONE', '��� ����������');
define('_CMN_SORT_ASC', '�� �����������');
define('_CMN_SORT_DESC', '�� ��������');
define('_CMN_NEW', '�������');
define('_CMN_NONE', '���');
define('_CMN_LEFT', '�����');
define('_CMN_RIGHT', '������');
define('_CMN_CENTER', '�� ������');
define('_CMN_ARCHIVE', '�������� � �����');
define('_CMN_UNARCHIVE', '������� �� ������');
define('_CMN_TOP', '������');
define('_CMN_BOTTOM', '�����');
define('_CMN_PUBLISHED', '������������');
define('_CMN_UNPUBLISHED', '�� ������������');
define('_CMN_EDIT_HTML', '������������� HTML');
define('_CMN_EDIT_CSS', '������������� CSS');
define('_CMN_DELETE', '�������');
define('_CMN_FOLDER', '�������');
define('_CMN_SUBFOLDER', '����������');
define('_CMN_OPTIONAL', '�� �����������');
define('_CMN_REQUIRED', '�����������');
define('_CMN_CONTINUE', '����������');
define('_STATIC_CONTENT', '����������� ����������');
define('_CMN_NEW_ITEM_LAST', '�� ��������� ����� ������� ����� ��������� � ����� ������. ������� ������������ ����� ���� ������� ������ ����� ���������� �������.');
define('_CMN_NEW_ITEM_FIRST', '�� ��������� ����� ������� ����� ��������� � ������ ������. ������� ������������ ����� ���� ������� ������ ����� ���������� �������.');
define('_LOGIN_INCOMPLETE', '����������, ��������� ���� &laquo;��� ������������&raquo; � &laquo;������&raquo;.');
define('_LOGIN_BLOCKED', '��������, ���� ������� ������ �������������. �� ����� ��������� ����������� ���������� � �������������� �����.');
define('_LOGIN_INCORRECT', '������������ ��� ������������ (�����) ��� ������. ���������� ��� ���.');
define('_LOGIN_NOADMINS', '��������, �� �� ������ ����� �� ����. �������������� �� ����� �� ����������������.');
define('_CMN_JAVASCRIPT', '��������! ��� ���������� ������ ��������, � ����� �������� ������ ���� �������� ��������� Java-script.');
define('_NEW_MESSAGE', '��� ������ ����� ������ ���������.');
define('_MESSAGE_FAILED', '������������ ������������ ���� �������� ����. ��������� �� ����������.');
define('_CMN_IFRAMES', '��� �������� ����� ���������� �����������. ��� ������� �� ������������ ��������� ������ (IFrame).');
define('_INSTALL_3PD_WARN', '��������������: ��������� ��������� ���������� ����� �������� ������������ ������ �����. ��� ���������� Joostina ��������� ���������� �� �����������.<br />��� ��������� �������������� ���������� � ����� ������ ������ ����� � �������, ����������, �������� <a href="http:// forum.joostina.ru" target="_blank" style="color:blue;text-decoration:underline;">����� Joostina</a>.');
define('_INSTALL_WARN', '�� ������������ ������������, ����������, ������� ������� <strong>installation</strong> � ������ ������� � �������� ��������.');
define('_TEMPLATE_WARN', '<strong class="red">���� ������� �� ������!</strong><br />������� � ������ ���������� ������ � �������� ����� ������.');
define('_NO_PARAMS', '������ �� �������� ������������� ����������.');
define('_HANDLER', '���������� ��� ������� ���� �����������.');

/** ������� */
define('_TOC_JUMPTO', '����������');

/* plugin_jw_ajaxvote */
define('_PJA_SAVE', '����������');
define('_PJA_YOU_VOTE_ADD', '��� ����� ��� ����!');
define('_PJA_VOTE', '�����');
define('_PJA_VOTES', '�������');
define('_PJA_THANKS_FULL', '������� �� ��� �����! ���������� ���� ��������� ����� �����������.');
define('_PJA_THANKS', '������� �� ��� �����!');
define('_PJA_1_5', '1 ���� �� 5');
define('_PJA_2_5', '2 ����� �� 5');
define('_PJA_3_5', '3 ����� �� 5');
define('_PJA_4_5', '4 ����� �� 5');
define('_PJA_5_5', '5 ������ �� 5');

/* joostinasocialbot */
define('_JSB_BEFORE', '�������� �������� � ���������� �������');
define('_JSB_ADD', '�������� �������� �');
define('_JSB_AFTER', '�������� ��� ����������� Joostina CMS!');

/**  ���������� */
define('_READ_MORE', '��������� &crarr;');
define('_READ_ITEM', '������ ��������� &crarr;');
define('_READ_MORE_REGISTER', '������ ��� ������������������ �������������');
define('_MORE', '�����');
define('_ON_NEW_CONTENT', '������������ [ %s ] ������� ����� ������ [ %s ]. ������: [ %s ]/���������: [ %s ]');
define('_SEL_CATEGORY', '-�������� ���������-');
define('_SEL_SECTION', '-�������� ������-');
define('_SEL_AUTHOR', '-�������� ������-');
define('_SEL_POSITION', '-�������� �������-');
define('_SEL_TYPE', '-�������� ���-');
define('_EMPTY_CATEGORY', '������ ��������� �� �������� ��������.');
define('_EMPTY_BLOG', '��� �������� ��� �����������!');
define('_NOT_EXIST', '��������, �������� �� �������.<br />����������, ��������� �� ������� �������� �����.');
define('_SUBMIT_BUTTON', '���������');

/** classes/html/modules.php */
define('_BUTTON_VOTE', '����������');
define('_BUTTON_RESULTS', '����������');
define('_USERNAME', '������������');
define('_LOST_PASSWORD', '������ ������?');
define('_PASSWORD', '������');
define('_BUTTON_LOGIN', '����� &crarr;');
define('_BUTTON_LOGOUT', '�����');
define('_NO_ACCOUNT', '��� �� ����������������?');
define('_CREATE_ACCOUNT', '�����������');
define('_VOTE_POOR', '������');
define('_VOTE_BEST', '������');
define('_USER_RATING', '�������');
define('_RATE_BUTTON', '�������');
define('_REMEMBER_ME', '���������');
define('_REMEMBER_ME_2', '��������� ����');

/** contact.php */
define('_ENQUIRY', '�������');
define('_ENQUIRY_TEXT', '��� ��������� ���������� � ����� %s. ����� ���������:');
define('_COPY_TEXT', '��� ����� ���������, ������� �� ��������� ��� %s � ����� %s.');
define('_COPY_SUBJECT', '�����: ');
define('_THANK_MESSAGE', '�������! ��������� ������� ����������.');
define('_CLOAKING', '���� e-mail ������� �� ����-�����. ��� ��� ��������� � ����� �������� ������ ���� �������� ��������� Java-script.');
define('_CONTACT_HEADER_NAME', '���');
define('_CONTACT_HEADER_POS', '���������');
define('_CONTACT_HEADER_EMAIL', 'E-mail');
define('_CONTACT_HEADER_PHONE', '�������');
define('_CONTACT_HEADER_FAX', '����');
define('_CONTACT_HEADER_MISC', '�������������� ����������');
define('_CONTACTS_DESC', '������ ��������� ����� �����');
define('_CONTACT_MORE_THAN', '�� �� ������ ������� ����� ������ ������ e-mail.');

/** classes/html/contact.php */
define('_CONTACT_TITLE', '�������� �����');
define('_EMAIL_DESCRIPTION', '��������� e-mail ������������');
define('_NAME_PROMPT', '���� ���');
define('_NAME_PROMPT_PH', '������� ���� ���');
define('_EMAIL_PROMPT', '��� e-mail');
define('_EMAIL_PROMPT_PH', '������� ��� e-mail');
define('_SUBJECT_PROMPT_PH', '������� ���� ������ ���������');
define('_MESSAGE_PROMPT', '������� ����� ���������');
define('_MESSAGE_PROMPT_PH', '������� ����� ������ ���������');
define('_PLEASE_ENTER_CAPTCHA_PH', '������� ���');
define('_SEND_BUTTON', '���������');
define('_SEND_BUTTON_CONTACT', '��������� ��������� &crarr;');
define('_SEND_EMAIL_CONTACT', '��������� ��������� ');
define('_CONTACT_FORM_NC', '����������, ��������� ����� ��������� � ���������.');
define('_CONTACT_TELEPHONE', '�������');
define('_CONTACT_MOBILE', '���������');
define('_CONTACT_FAX', '����');
define('_CONTACT_EMAIL', 'E-mail');
define('_CONTACT_NAME', '���');
define('_CONTACT_POSITION', '���������');
define('_CONTACT_ADDRESS', '�����');
define('_CONTACT_MISC', '�������������� ����������');
define('_CONTACT_SEL', '�������� ����������');
define('_CONTACT_NONE', '������ ���� ���������� ������ �����������.');
define('_CONTACT_ONE_EMAIL', '������ ������� ����� ������ ������ e-mail.');
define('_EMAIL_A_COPY', '��������� ����� ��������� �� ����������� �����');
define('_CONTACT_DOWNLOAD_AS', '������� ���������� � �������');
define('_VCARD', 'VCard');

/** pageNavigation */
define('_PN_LT', '&lt;');
define('_PN_RT', '&gt;');
define('_PN_PAGE', '��������');
define('_PN_OF', '��');
define('_PN_LLAST', '<span class="pagenav_txt">������</span>');
define('_PN_PREV10', '<span class="pagenav_txt">���������� 10</span>');
define('_PN_PREV1', '<span class="pagenav_txt">����������</span>');
define('_PN_NEXT1', '<span class="pagenav_txt">���������</span>');
define('_PN_NEXT10', '<span class="pagenav_txt">��������� 10</span>');
define('_PN_RLAST', '<span class="pagenav_txt">���������</span>');
define('_PN_L_LLAST', '������');
define('_PN_L_PREV10', '���������� 10');
define('_PN_L_PREV1', '����������');
define('_PN_L_NEXT1', '���������');
define('_PN_L_NEXT10', '��������� 10');
define('_PN_PAGE_NUMBER', '�������� �����');
define('_PN_L_RLAST', '���������');
define('_PN_DISPLAY_NR', '����������');
define('_PN_RESULTS', '����������');
define('_PN_START', '� ������');
define('_PN_PREVIOUS', '����������');
define('_PN_NEXT', '���������');
define('_PN_END', '� �����');

/** ������ ����� */
define('_EMAIL_TITLE', '��������� e-mail �����');
define('_EMAIL_FRIEND', '��������� ������ �������� �� e-mail:');
define('_EMAIL_FRIEND_ADDR', 'E-Mail �����:');
define('_EMAIL_YOUR_NAME', '���� ���:');
define('_EMAIL_YOUR_MAIL', '��� e-mail:');
define('_SUBJECT_PROMPT', ' ���� ���������:');
define('_BUTTON_SUBMIT_MAIL', '���������');
define('_BUTTON_CANCEL', '������');
define('_EMAIL_ERR_NOINFO', '�� ������ ��������� ������ ���� e-mail � e-mail ���������� ����� ������.');
define('_EMAIL_MSG', ' ������������! ��������� ������ �� �������� ����� "%s" �������� ��� %s ( %s ).

�� ������� ����������� � �� ���� ������:
%s');
define('_EMAIL_INFO', '������ ��������');
define('_EMAIL_SENT', '������ �� ��� �������� ���������� ���');
define('_PROMPT_CLOSE', '������� ����');

/** classes/html/content.php */
define('_AUTHOR_BY', '�����');
define('_WRITTEN_BY', '��������');
//define('_LAST_UPDATED', '��������� ����������');
define('_LAST_UPDATED', '���������');
define('_BACK', '&larr; ���������');
define('_LEGEND', '�������');
define('_DATE', '����');
define('_ORDER_DROPDOWN', '�������');
define('_HEADER_TITLE', '���������');
define('_HEADER_AUTHOR', '�����');
define('_HEADER_SUBMITTED', '�������');
define('_HEADER_HITS', '����������');
define('_E_EDIT', '�������������');
define('_E_ADD', '��������');
define('_E_WARNUSER', '����������, ������� ������ &laquo;������&raquo; ��� &laquo;���������&raquo;, ����� �������� ��� ��������.');
define('_E_WARNTITLE', '���������� ������ ����� ���������');
define('_E_WARNTEXT', '���������� ������ ����� ������� �����');
define('_E_WARNCAT', '����������, �������� ���������');
define('_E_CONTENT', '����������');
define('_E_TITLE', '���������:');
define('_E_CATEGORY', '���������');
define('_E_INTRO', '������� �����');
define('_E_MAIN', '�������� �����');
define('_E_MOSIMAGE', '�������� ��� {mosimage}');
define('_E_IMAGES', '�����������');
define('_E_GALLERY_IMAGES', '������� �����������');
define('_E_CONTENT_IMAGES', '����������� � ������');
define('_E_EDIT_IMAGE', '��������� �����������');
define('_E_NO_IMAGE', '��� �����������');
define('_E_INSERT', '��������');
define('_E_UP', '����');
define('_E_DOWN', '����');
define('_E_REMOVE', '�������');
define('_E_SOURCE', '�������� �����:');
define('_E_ALIGN', '������������:');
define('_E_ALT', '�������������� �����:');
define('_E_BORDER', '�����:');
define('_E_CAPTION', '���������');
define('_E_CAPTION_POSITION', '��������� �������');
define('_E_CAPTION_ALIGN', '������������ �������');
define('_E_CAPTION_WIDTH', '������ �������');
define('_E_APPLY', '���������');
define('_E_PUBLISHING', '����������');
define('_E_STATE', '���������:');
define('_E_AUTHOR_ALIAS', '��������� ������:');
define('_E_ACCESS_LEVEL', '������� �������:');
define('_E_ORDERING', '�������:');
define('_E_START_PUB', '���� ������ ����������:');
define('_E_FINISH_PUB', '���� ��������� ����������:');
define('_E_SHOW_FP', '���������� �� ������� ��������:');
define('_E_HIDE_TITLE', '������ ���������:');
define('_E_METADATA', '����-����');
define('_E_M_DESC', '��������:');
define('_E_M_KEY', '�������� �����:');
define('_E_SUBJECT', '����:');
define('_E_EXPIRES', '���� ���������:');
define('_E_VERSION', '������');
define('_E_ABOUT', '�� �������');
define('_E_CREATED', '���� ��������');
define('_E_LAST_MOD', '��������� ���������:');
define('_E_HITS', '���������� ����������:');
define('_E_SAVE', '���������');
define('_E_CANCEL', '������');
define('_E_REGISTERED', '������ ��� ������������������ �������������!');
define('_E_ITEM_INFO', '����������');
define('_E_ITEM_SAVED', '������� ���������!');
define('_ITEM_PREVIOUS', '<span class="pagenav_txt">&larr; ����������</span> ');
define('_ITEM_NEXT', ' <span class="pagenav_txt">��������� &rarr;</span>');
define('_KEY_NOT_FOUND', '���� �� ������!');

/** content.php */
define('_SECTION_ARCHIVE_EMPTY', '� ���� ������� ������ ������ ��� ��������. ����������, ������� �����.');
define('_CATEGORY_ARCHIVE_EMPTY', '� ���� ��������� ������ ������ ��� ��������. ����������, ������� �����.');
define('_HEADER_SECTION_ARCHIVE', '����� ��������');
define('_HEADER_CATEGORY_ARCHIVE', '����� ���������');
define('_ARCHIVE_SEARCH_FAILURE', '�� ������� �������� ������� ��� %s %s.'); // �������� ������, � ����� ����
define('_ARCHIVE_SEARCH_SUCCESS', '������� �������� ������ ��� %s %s.'); // �������� ������, � ����� ����
define('_FILTER', '������');
define('_ORDER_DROPDOWN_DA', '���� (�� �����������)');
define('_ORDER_DROPDOWN_DD', '���� (�� ��������)');
define('_ORDER_DROPDOWN_TA', '�������� (�� �����������)');
define('_ORDER_DROPDOWN_TD', '�������� (�� ��������)');
define('_ORDER_DROPDOWN_HA', '��������� (�� �����������)');
define('_ORDER_DROPDOWN_HD', '��������� (�� ��������)');
define('_ORDER_DROPDOWN_AUA', '����� (�� �����������)');
define('_ORDER_DROPDOWN_AUD', '����� (�� ��������)');
define('_ORDER_DROPDOWN_O', '�� �������');
define('_CONTENT_ANSWER', '������� �����:');
define('_CONTENT_CNG_STAT_PUB', '����� ������� ���������� �����������: ');

/** poll.php */
define('_ALERT_ENABLED', 'Cookies ������ ���� ���������!');
define('_ALREADY_VOTE', '�� ��� ������������� � ���� ������!');
define('_NO_SELECTION', '�� �� ������� ���� �����. ����������, ���������� ��� ���.');
define('_THANKS', '������� �� ���� ������� � �����������!');
define('_SELECT_POLL', '�������� ����� �� ������');

/** classes/html/poll.php */
define('_JAN', '������');
define('_FEB', '�������');
define('_MAR', '����');
define('_APR', '������');
define('_MAY', '���');
define('_JUN', '����');
define('_JUL', '����');
define('_AUG', '������');
define('_SEP', '��������');
define('_OCT', '�������');
define('_NOV', '������');
define('_DEC', '�������');
define('_POLL_TITLE', '���������� ������');
define('_SURVEY_TITLE', '�������� ������');
define('_NUM_VOTERS', '���������� ���������������');
define('_FIRST_VOTE', '������ �����');
define('_LAST_VOTE', '��������� �����');
define('_SEL_POLL', '�������� �����');
define('_NO_RESULTS', '��� ������ �� ���������� ������.');

/** registration.php */
define('_ERROR_PASS', '��������, ����� ������������ �� ������.');
define('_NEWPASS_MSG', '������� ������ ������������ $checkusername ������������� ������ e-mail.\n' .
		' ������������ ����� $mosConfig_live_site ������ ������ �� ��������� ������ ������.\n\n' .
		' ��� ����� ������: $newpass\n\n���� �� �� ����������� ��������� ������, �������� �� ���� ��������������.' .
		' ������ �� ������ ������� ��� ���������, ������ �����. ���� ��� ������, ������ ������� ' .
		' �� ����, ��������� ����� ������, � �����, �������� ��� �� ������� ���.');
define('_NEWPASS_SUB', '$_sitename: ����� ������ ��� $checkusername');
define('_NEWPASS_SENT', '����� ������ ������ � ��������� ������������!');
define('_REGWARN_NAME', '����������, ������� ���� ��������� ��� (���, ������������ �� �����).');
define('_REGWARN_UNAME', '����������, ������� ���� ��� ������������ (�����).');
define('_REGWARN_MAIL', '����������, ��������� ������� ����� e-mail.');
define('_REGWARN_PASS', '����������, ��������� ������� ������. ������ �� ������ ��������� �������, ��� ����� ������ ���� �� ������ 6 �������� � �� ������ �������� ������ �� ���� (0-9) � ��������� �������� (a-z, A-Z)');
define('_REGWARN_VPASS1', '����������, ��������� ������.');
define('_REGWARN_VPASS2', '������ � ��� ������������� �� ���������. ����������, ���������� ��� ���.');
define('_REGWARN_INUSE', '��� ��� ������������ ��� ������������. ����������, �������� ������ ���.');
define('_REGWARN_EMAIL_INUSE', '���� e-mail ��� ������������. ���� �� ������ ���� ������, ������� �� ������ &laquo;������ ������?&raquo; � �� ��������� e-mail ����� ������ ����� ������.');
define('_SEND_SUB', '������ � ����� ������������ %s � %s');
define('_USEND_MSG_ACTIVATE', '������������ %s,

���������� �� ����������� �� ����� %s. ���� ������� ������ ������� ������� � ������ ���� ������������.
����� ������������ ������� ������, ������� �� ������ ��� ���������� �� � �������� ������ ��������:
%s

����� ��������� �� ������ ����� �� ���� %s, ��������� ���� ��� ������������ � ������:

��� ������������ - %s
������ - %s');
define('_USEND_MSG', '������������ %s,

���������� ��� �� ����������� �� ����� %s.

������ �� ������ ����� �� ���� %s, ��������� ��� ������������ � ������, ��������� ���� ��� �����������.');
define('_USEND_MSG_NOPASS', '������������ $name,\n\n�� ������� ���������������� �� ����� $mosConfig_live_site.\n' .
		'�� ������ ����� �� ���� $mosConfig_live_site, ��������� ������, ������� �� ������� ��� �����������.\n\n' .
		'�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������\n');
define('_ASEND_MSG', '������������! ��� ��������� ��������� � ����� %s.

�� ����� %s ����������������� ����� ������������.

������ ������������:
��������� ��� - %s
����� e-mail - %s
��� ������������ - %s

�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������');
define('_REG_COMPLETE_NOPASS', '<div class="componentheading">����������� ���������!</div><br />' .
		'������ �� ������ ����� �� ����.<br />');
define('_REG_COMPLETE', '<div class="componentheading">����������� ���������!</div><br />������ �� ������ ����� �� ����.');
define('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">����������� ���������!</div><br />���� ������� ������ ������� � ������ ���� ������������ ����� ���, ��� �� �� ��������������. �� ��� e-mail ���� ���������� ������ �� �������, � ������� ������� �� ������ ������������ ���� ������� ������.');
define('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">������� ������ ������������!</div><br />���� ������� ������ ������������. ������ �� ������ ����� �� ����, ��������� ��� ������������ � ������, ������� �� ����� ��� �����������.');
define('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">�������� ������ ���������!</div><br />������ ������� ������ ����������� �� ����� ��� ��� ������������.');
define('_REG_ACTIVATE_FAILURE', '<div class="componentheading">������ ���������!</div><br />��������� ����� ������� ������ ����������. ����������, ���������� � ��������������.');

/** classes/html/registration.php */
define('_PROMPT_PASSWORD', '������ ������?');
define('_NEW_PASS_DESC', '����������, ������� ���� ��� ������������ � ����� e-mail, ����� ������� ������ &laquo;��������� ������&raquo;.<br />' .
		'������, �� ��������� ����� e-mail �� �������� ������ � ����� �������. ����������� ���� ������ ��� ����� �� ����.');
define('_PROMPT_UNAME', '��� ������������:');
define('_PROMPT_EMAIL', '����� e-mail:');
define('_BUTTON_SEND_PASS', '��������� ������');
define('_REGISTER_TITLE', '�����������');
define('_REGISTER_NAME', '��������� ���:');
define('_REGISTER_UNAME', '��� ������������:');
define('_REGISTER_EMAIL', 'E-mail:');
define('_REGISTER_NAME_PH', '������� ��������� ���');
define('_REGISTER_UNAME_PH', '������� ��� ������������');
define('_REGISTER_EMAIL_PH', '������� e-mail');
define('_REGISTER_PASS', '������:');
define('_REGISTER_VPASS', '������������� ������:');
define('_REGISTER_REQUIRED', '��� ����, ���������� �������� <span class="red">*</span>, ����������� ��� ����������!');
define('_BUTTON_SEND_REG', '��������� ������');
define('_SENDING_PASSWORD', '��� ������ ����� ��������� �� ��������� ���� ����� e-mail.<br />����� �� ��������' .
		' ����� ������, �� ������� ����� �� ���� � �������� ���� ������ � ����� �����.');

/** classes/html/search.php */
define('_SEARCH_TITLE', '�����');
define('_SEARCH_SEL_CATEGORY', '�������� ���������');
define('_SEARCH_RESULT', '���������� ������');
define('_SEARCH_SEARCHPHRASE', '��� ������ �� �������� �����');
define('_SEARCH_ORDERING', '���������� ������');
define('_SEARCH_LIMITSTART', '���������� �� ��������');
define('_PROMPT_KEYWORD', '����� �� �������� �����');
define('_SEARCH_MATCHES', '������� %d ����������');
define('_CONCLUSION', '����� ������� $totalRows ����������.');
define('_NOKEYWORD', '������ �� �������');
define('_IGNOREKEYWORD', '� ������ ���� ��������� ��������');
define('_SEARCH_ANYWORDS', '����� �����');
define('_SEARCH_ALLWORDS', '��� �����');
define('_SEARCH_PHRASE', '����� �����');
define('_SEARCH_NEWEST', '�� ��������');
define('_SEARCH_OLDEST', '�� �����������');
define('_SEARCH_POPULAR', '�� ������������');
define('_SEARCH_ALPHABETICAL', '���������� �������');
define('_SEARCH_CATEGORY', '������/���������');
define('_SEARCH_MESSAGE', '����� ��� ������ ������ ��������� �� 3 �� 20 ��������');
define('_SEARCH_ARCHIVED', '� ������');
define('_SEARCH_CATBLOG', '���� ���������');
define('_SEARCH_CATLIST', '������ ���������');
define('_SEARCH_NEWSFEEDS', '����� ��������');
define('_SEARCH_SECLIST', '������ �������');
define('_SEARCH_SECBLOG', '���� �������');

/** templates/*.php */
define('_ISO2', 'cp1251');
define('_ISO', 'charset=windows-1251');
define('_DATE_FORMAT', '�������: d.m.Y �.'); // ����������� ������ PHP-������� DATE

/**
 * �������� ������� ����, ��� ��������� ������ ���� �� �����
 * ��������, define("_DATE_FORMAT_LC"," %d %B %Y �. %H:%M"); // ����������� ������ PHP-������� strftime
 */
//define('_DATE_FORMAT_LC', '%A, %d-�� %B %Y �. � %H:%m'); // ����������� PHP strftime ������
//define('_DATE_FORMAT_LC', '%d.%m.%Y'); // ����������� PHP strftime ������
define('_DATE_FORMAT_LC',$mosConfig_form_date); // ����������� ������ PHP-������� strftime
define('_DATE_FORMAT_LC2', $mosConfig_form_date_full); // ������ ������ �������
define('_SEARCH_BOX', '�����');
define('_NEWSFLASH_BOX', '������� �������!');
define('_MAINMENU_BOX', '������� ����');

/** classes/html/usermenu.php */
define('_UMENU_TITLE', '���� ������������');
define('_HI', '������������, ');
define('_HI_AUTH', '����<script type="text/javascript">
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
define('_SAVE_ERR', '����������, ��������� ��� ����.');
define('_THANK_SUB', '������� �� ��� ��������. �� ����� ���������� ��������������� ����� ����������� �� �����.');
define('_THANK_SUB_PUB', '������� �� ��� ��������!');
define('_UP_SIZE', '�� �� ������ ��������� ����� �������� ������ ��� 15��.');
define('_UP_EXISTS', '����������� � ������ $userfile_name ��� ����������. ����������, �������� �������� ����� � ���������� ��� ���.');
define('_UP_COPY_FAIL', '������ ��� �����������!');
define('_UP_TYPE_WARN', '�� ������ ��������� ����������� ������ � ������� .gif ��� .jpg.');
define('_MAIL_SUB', '����� �������� �� ������������');
define('_MAIL_MSG', '������������ $adminName,\n\n������������ $author ���������� ����� �������� � ������ $type � ��������� $title' .
		' ��� ����� $mosConfig_live_site.\n\n\n' .
		'����������, ������� � ������ �������������� �� ������ $mosConfig_live_site/administrator ��� ��������� � ���������� ��� � $type.\n\n' .
		'�� ��� ������ �� ���� ��������, ��� ��� ��� ������� ������������� � ������������� ������ ��� �����������\n');
define('_PASS_VERR1', '���� �� ������� �������� ������, ����������, ������� ��� ��� ��� ��� ������������� ���������.');
define('_PASS_VERR2', '���� �� ������ �������� ������, ����������, �������� ��������, ��� ������ � ��� ������������� ������ ���������.');
define('_UNAME_INUSE', '��������� ��� ������������ ��� ������������.');
define('_UPDATE', '��������');
define('_USER_DETAILS_SAVE', '���� ������ ���������.');
define('_USER_LOGIN', '���� ������������');
define('_USER_ANSWER', '������� �����:');
define('_USER_OK', '�� ��!');
define('_USER_TAB_ADDITIONAL', '�������������');

/** components/com_user */
define('_EDIT_TITLE', '������ ������');
define('_YOUR_NAME', '������ ���');
define('_EMAIL', '����� e-mail');
define('_UNAME', '��� ������������ (�����)');
define('_PASS', '������');
define('_NEW_AVATAR_UPLOAD', '��������� ���� ������');
define('_AVATAR_UPLOAD', '��������� ������');
define('_AVATAR_DELETE', '������� ������');
define('_AVATAR_DELETING', '�������� �������: ');
define('_VPASS', '������������� ������');
define('_PASS_PH', '������� ����� ������');
define('_VPASS_PH', '��������� ����� ������');
define('_SUBMIT_SUCCESS', '���� ���������� �������!');
define('_SUBMIT_SUCCESS_DESC', '���� ���������� ������� ���������� ��������������. ����� ���������, ��� �������� ����� ����������� �� ���� �����');
define('_WELCOME', '����� ����������!');
define('_WELCOME_DESC', '����� ���������� � ������ ������������ ������ �����');
define('_CONF_CHECKED_IN', '��� &laquo;���������������&raquo; ���� �������� ������ &laquo;��������������&raquo;.');
define('_CHECK_TABLE', '�������� �������');
define('_CHECKED_IN', '��������� ');
define('_CHECKED_IN_ITEMS', ''); /* ������ - ����� �� ����������� ��������� ��������� ����� */
define('_PASS_MATCH', '������ �� ���������');

/** components/com_banners */
define('_BNR_CLIENT_NAME', '�� ������ ������ ��� �������.');
define('_BNR_CONTACT', '�� ������ ������� ������� ��� �������.');
define('_BNR_VALID_EMAIL', '����� ����������� ����� ������� ������ ���� ����������.');
define('_BNR_CLIENT', '�� ������ ������� �������,');
define('_BNR_NAME', '������� ��� �������.');
define('_BNR_IMAGE', '�������� ����������� �������.');
define('_BNR_URL', '�� ������ ������ URL/��� �������.');
define('_BNR_ENTER_ERROR', '������ �������');
define('_BNR_NOT_ENTER', '������ �� ��������');

/** components/com_login */
define('_ALREADY_LOGIN', '�� ��� ��������������!');
define('_LOGOUT', '������� ����� ��� ���������� ������');
define('_LOGIN_TEXT', '����������� ���� &laquo;������������&raquo; � &laquo;������&raquo; ��� ������� � �����');
define('_LOGIN_SUCCESS', '�� ������� �����');
define('_LOGOUT_SUCCESS', '�� ������� ��������� ������ � ������');
define('_LOGIN_DESCRIPTION', '�� ������ ����� �� ���� ��� ������������, ��� ������� � �������� ��������');
define('_LOGOUT_DESCRIPTION', '�� ������������� ������ �������� �������?');

/** components/com_weblinks */
define('_WEBLINKS_TITLE', '������');
define('_WEBLINKS_DESC', '� ������ ������� ������� �������� ���������� � �������� ������ � ����.<br />�������� �� ������ ���� �� ��������, � ����� �������� ������ ������.');
define('_HEADER_TITLE_WEBLINKS', '������');
define('_SECTION', '������');
define('_SUBMIT_LINK', '�������� ������');
define('_URL', 'URL:');
define('_URL_DESC', '��������:');
define('_NAME', '��������:');
define('_WEBLINK_EXIST', '������ � ����� ������ ��� ����������. �������� ��� � ���������� ��� ���.');
define('_WEBLINK_TITLE', '������ ������ ����� ��������.');

/** components/com_newfeeds */
define('_FEED_NAME', '�������� ���������');
define('_FEED_ARTICLES', '������');
define('_FEED_LINK', '������ ���������');

/** modules/mod_whosonline.php */
define('_WE_HAVE', '������ �� ����� ���������<br />');
define('_REGISTERED_ONLINE', '����������������');
define('_NOW_ONLINE', 'Online');
define('_AND', ' � ');
define('_GUEST_COUNT', '%s �����');
define('_GUESTS_COUNT', '%s ������');
define('_MEMBER_COUNT', '%s ������������');
define('_MEMBERS_COUNT', '%s �������������');
define('_ONLINE', '');
define('_NONE', '��� ����������� � ������');

/** modules/mod_banners */
define('_BANNER_ALT', '�������');

/** modules/mod_downloadjoostina */
define('_DJOOSTINA_12', '��������� Joostina ������ 1.2.1');
define('_DJOOSTINA_13', '��������� Joostina ������ 1.3.0');

/** modules/mod_random_image */
define('_NO_IMAGES', '��� �����������');
define('_RANDOM_IMAGE_ERROR', '��������� ��������� ������ mod_random_image � ������� ����������� � ��������� � ���������� ��������!');

/** modules/mod_ml_login */
define('_AUTH', '�����������');
define('_AUTH_DEF', '�����������');
define('_REM_PASS', '��������');
define('_NO_REGISTRED', '�� ����������������?');
/*define('_AUTH_OPENID', '�����, ��������� <img src="' . $mosConfig_live_site . '/modules/mod_ml_login/openid_big.png" alt="�����, ��������� OpenID" class="openidimg" title="�����, ��������� OpenID" width="99" height="20" />');
define('_OPENID_PROVS', '���������� OpenID');
define('_OPENID_SUB_TEXT', '����� � OpenID');*/
define('_ENTER_YOUR_LOGIN', '������� ��� �����');
define('_ENTER_YOUR_PASSWORD', '������� ��� ������');

/** modules/mod_stats.php */
define('_STAT_DATETIME', '���� � �����');
define('_STAT_OS', 'OS');
define('_STAT_PHP_VERSION', '������ PHP');
define('_STAT_MYSQL_VERSION', '������ MySQL');
define('_STAT_CACHE', '�����������');
define('_STAT_GZIP', 'GZIP');
define('_STAT_CACHE_ENABLE', '���������');
define('_STAT_CACHE_DISABLE', '���������');
define('_STAT_MEMBERS', '�������������');
define('_STAT_HITS', '���������');
define('_STAT_NEWS', '��������');
define('_STAT_LINKS', '������');
define('_STAT_VISITORS', '�����������');

/** /adminstrator */
define('_ADMIN_USRNAME', '�����');
define('_ADMIN_USRNAME_PH', '����� ��������������');
define('_ADMIN_PASS', '������');
define('_ADMIN_PASS_PH', '������ ��������������');
define('_ADMIN_ENTER', '�����');
define('_ADMIN_ENTER_LOGIN', '����� � ���������������� ������');
define('_ADMIN_GO_SITE', '������� �� ����');
define('_ADMIN_EXIT', '�����');
define('_ADMIN_VIEW_CONTENT', '�������� �����������');
define('_DETAILS', '�������� ���������');

/** /adminstrator/components/com_menus/admin.menus.html.php */
define('_MAINMENU_HOME', '* ������ �� ������ �������������� ����� ����� ���� [mainmenu] ������������� ���������� &laquo;�������&raquo; ��������� ����� *');
define('_MAINMENU_DEL', '* �� �� ������ &laquo;�������&raquo; ��� ����, ��������� ��� ���������� ��� ����������� ���������������� ����� *');
define('_MENU_GROUP', '* ��������� &laquo;���� ����&raquo; ���������� ����� ��� � ����� ������ *');

/** administrators/components/com_users */
define('_NEW_USER_MESSAGE_SUBJECT', '����� ������ ������������');
define('_NEW_USER_MESSAGE', '������������, %s


�� ���� ���������������� ��������������� �� ����� %s.

��� ��������� �������� ���� ��� ������������ � ������, ��� ����� �� ���� %s:

��� ������������ - %s
������ - %s


�� ��� ��������� �� ����� ��������. ��� ������������� ������� �������� � ���������� ������ ��� ��������������.');

/** administrators/components/com_massmail */
define('_MASSMAIL_MESSAGE', '��� ��������� � ����� \'%s\'

���������:
');

// Joostina!
define('_REG_CAPTCHA', '������� ����� � �����������<span class="red">*</span>:');
define('_REG_CAPTCHA_VAL', '���������� ������ ��� � �����������!');
define('_REG_CAPTCHA_REF', '������� ����� �������� �����������.');

define('_PRINT_PAGE_LINK', '����� �������� �� �����');

$bad_text = array(' ���� ', ' ��� ', ' ������ ', ' ��� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ��� ', ' ��� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ������ ', ' ���� ', ' ��� ', ' �������� ', ' ������� ', ' ������� ', ' ���� ', ' ��� ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ���� ', ' ��� ', ' ����� ', ' ����� ', ' ����� ', ' ���� ', ' ��� ', ' ��� ', ' ������ ', ' ������� ', ' �������� ', ' ��� ', ' ����� ', ' ����� ', ' ������� ', ' ������� ', ' ��� ', ' ���� ', ' ��� ', ' ��� ', ' ����� ', ' ���� ', ' ��� ', ' ���� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ������ ', ' ���� ', ' ��� ', ' ��� ', ' ������� ', ' �������� ', ' ���� ', ' ��������� ', ' ��� ', ' ������� ', ' ��� ', ' ������ ', ' ������ ', ' ��� ', ' ��� ', ' ��� ', ' ����� ', ' ����� ', ' ��� ', ' ���� ', ' ����� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ��� ', ' ����� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ������ ', ' ������ ', ' ������� ', ' ������ ', ' ������� ', ' ������ ', ' ����� ', ' ���� ', ' ����� ', ' ����� ', ' ��� ', ' ��� ', ' ���� ', ' ���� ', ' ���� ', ' ���� ', ' ������ ', ' ����� ', ' ���� ', ' ���� ', ' ������ ', ' ��� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ��� ', ' ����� ', ' ���� ', ' ��� ', ' ��� ', ' ���� ', ' ��� ', ' ����� ', ' ���� ', ' ���� ', ' ��� ');

/* administrator components com_admin */
define('_FILE_UPLOAD', '�������� �����');
define('_MAX_SIZE', '������������ ������');
define('_ABOUT_JOOSTINA', '� Joostina');
define('_CHANGESLOG', 'Changeslog');
define('_ABOUT_SYSTEM', '� �������');
define('_SYSTEM_OS', '�������');
define('_DB_VERSION', '������ ���� ������');
define('_PHP_VERSION', '������ PHP');
define('_APACHE_VERSION', '���-������');
define('_PHP_APACHE_INTERFACE', '��������� ����� ���-�������� � PHP');
define('_JOOSTINA_VERSION', '������ Joostina!');
define('_BROWSER', '������� (User Agent)');
define('_PHP_SETTINGS', '������ ��������� PHP');
define('_RG_EMULATION', '�������� Register Globals');
define('_REGISTER_GLOBALS', 'Register Globals - ����������� ���������� ����������');
define('_MAGIC_QUOTES', '�������� Magic Quotes');
define('_SAFE_MODE', '���������� ����� - Safe Mode');
define('_SESSION_HANDLING', '��������� ������');
define('_SESS_SAVE_PATH', '������� �������� ������ - Session save path');
define('_PHP_TAGS', '�������� php');
define('_BUFFERING', '�����������');
define('_OPEN_BASEDIR', '�����������/�������� ��������');
define('_ERROR_REPORTING', '����������� ������');
define('_XML_SUPPORT', '��������� XML');
define('_ZLIB_SUPPORT', '��������� Zlib');
define('_DISABLED_FUNCTIONS', '����������� �������');
define('_CONFIGURATION_FILE', '���� ������������');
define('_ACCESS_RIGHTS', '����� �������');
define('_DIRS_WITH_RIGHTS', '��� ������ <strong>����</strong> ������� � ������������ Joostina, <strong>���</strong> ��������� ���� �������� ������ ���� �������� ��� ������!');
define('_CACHE_DIRECTORY', '������� ����');
define('_SESSION_DIRECTORY', '������� ������');
define('_DATABASE', '���� ������');
define('_TABLE_NAME', '�������� �������');
define('_DB_CHARSET', '���������');
define('_DB_NUM_RECORDS', '�������');
define('_DB_SIZE', '������');
define('_FIND', '�����');
define('_CLEAR', '��������');
define('_GLOSSARY', '���������');
define('_DEVELOPERS', '������������');
define('_SUPPORT', '���������');
define('_LICENSE', '��������');
define('_CHANGELOG', '������ ���������');
define('_CHECK_VERSION', '��������� ������ Joostina!');
define('_PREVIEW_SITE', '������������ �����');
define('_PREV_A_SITE', '������������');
define('_IN_NEW_WINDOW', '������� � ����� ����');

/* administrator components com_banners */
define('_BANNERS_MANAGEMENT', '���������� ���������');
define('_EDIT_BANNER', '�������������� �������');
define('_NEW_BANNER', '�������� �������');
define('_IN_CURRENT_WINDOW', '��� �� ����');
define('_IN_PARENT_WINDOW', '������� ����');
define('_IN_MAIN_FRAME', '������� ������');
define('_BANNER_CLIENTS', '������� ��������');
define('_BANNER_CATEGORIES', '��������� ��������');
define('_NO_BANNERS', '������ �� ����������');
define('_BANNER_COUNTER_RESETTED', '������� ������ �������� ������');
define('_CHECK_PUBLISH_DATE', '��������� ������������ ����� ���� ����������');
define('_CHECK_START_PUBLICATION_DATE', '��������� ���� ������ ����������');
define('_CHECK_END_PUBLICATION_DATE', '��������� ���� ��������� ����������');
define('_TASK_UPLOAD', '���������');
define('_BANNERS_PANEL', '������ ��������');
define('_BANNERS_DIRECTORY_DOESNOT_EXISTS', '����� banners �� ����������');
define('_CHOOSE_BANNER_IMAGE', '�������� ����������� ��� ��������');
define('_BAD_FILENAME', '���� ������ ��������� ���������-�������� ������� ��� ��������!');
define('_FILE_ALREADY_EXISTS', '���� #FILENAME# ��� ���������� � ���� ������!');
define('_BANNER_UPLOAD_ERROR', '�������� #FILENAME# ��������!');
define('_BANNER_UPLOAD_SUCCESS', '�������� #FILENAME# � #DIRNAME# ������� ��������!');
define('_UPLOAD_BANNER_FILE', '��������� ���� �������');

/* administrator components com_categories */
define('_CATEGORY_CHANGES_SAVED', '��������� � ��������� ���������');
define('_USER_GROUP_ALL', '�����');
define('_USER_GROUP_REGISTERED', '���������');
define('_USER_GROUP_SPECIAL', '�����������');
define('_CONTENT_CATEGORIES', '��������� �����������');
define('_ALL_CONTENT', '�� ����������');
define('_ACTIVE', '��������');
define('_IN_TRASH', '� �������');
define('_VIEW_CATEGORY_CONTENT', '�������� ����������� ���������');
define('_CHOOSE_MENU_PLEASE', '����������, �������� ����');
define('_CHOOSE_MENUTYPE_PLEASE', '����������, �������� ��� ����');
define('_ENTER_MENUITEM_NAME', '����������, ������� �������� ��� ����� ������ ����');
define('_CATEGORY_NAME_IS_BLANK', '��������� ������ ����� ��������');
define('_ENTER_CATEGORY_NAME', '������� ��� ���������');
define('_ENTER_CATEGORY_TITLE', '������� ��������� ���������');
define('_CATEGORY_ALREADY_EXISTS', '��������� � ����� ��������� ��� ����������. ��������� �����');
define('_EDIT_CATEGORY', '��������������');
define('_NEW_CATEGORY', '�����');
define('_CATEGORY_PROPERTIES', '�������� ���������');
define('_CATEGORY_TITLE', '��������� ��������� (Title)');
define('_CATEGORY_NAME', '�������� ��������� (Name)');
define('_SORT_ORDER', '������� ������������');
define('_IMAGE', '�����������');
define('_IMAGE_POSTITION', '������������ �����������');
define('_MENUITEM', '����� ����');
define('_NEW_MENUITEM_IN_YOUR_MENU', '�������� ������ ������ � ��������� ���� ����.');
define('_MENU_NAME', '�������� ������ ����');
define('_CREATE_MENU_ITEM', '������� ����� ����');
define('_EXISTED_MENU_ITEMS', '������������ ������ ����');
define('_NOT_EXISTS', '�����������');
define('_MENU_LINK_AVAILABLE_AFTER_SAVE', '����� � ���� ����� �������� ����� ����������');
define('_IMAGES_DIRS', '�������� ����������� (mosimage)');
define('_MOVE_CATEGORIES', '����������� ���������');
define('_CHOOSE_CATEGORY_SECTION', '����������, �������� ������ ��� ������������ ���������');
define('_MOVE_INTO_SECTION', '����������� � ������');
define('_CATEGORIES_TO_MOVE', '������������ ���������');
define('_CONTENT_ITEMS_TO_MOVE', '������������ ������� �����������');
define('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', '� ��������� ������ ����� ���������� ���<br />������������� ��������� � ��<br />������������� ���������� ���� ���������.');
define('_CATEGORY_COPYING', '����������� ���������');
define('_CHOOSE_CAT_SECTION_TO_COPY', '����������, �������� ������ ��� ���������� ���������');
define('_COPY_TO_SECTION', '���������� � ������');
define('_CATS_TO_COPY', '���������� ���������');
define('_CONTENT_ITEMS_TO_COPY', '���������� ���������� ���������');
define('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', '� ��������� ������ ����� ����������� ���<br />������������� ��������� � ��<br />������������� ���������� ���� ���������.');
define('_COMPONENT', '���������');
define('_BEFORE_CREATION_CAT_CREATE_SECTION', '����� ��������� ��������� �� ������ ������� ���� �� ���� ������!');
define('_CATEGORY_IS_EDITING_NOW', '��������� #CATNAME# � ��������� ����� ������������� ������ ���������������');
define('_TABLE_WEBLINKS_CATEGORY', '������� - ���-������ ���������');
define('_TABLE_NEWSFEEDS_CATEGORY', '������� - ����� �������� ���������');
define('_TABLE_CATEGORY_CONTACTS', '������� - �������� ���������');
define('_TABLE_CATEGORY_CONTENT', '������� - ���������� ���������');
define('_BLOG_CATEGORY_CONTENT', '���� - ���������� ���������');
define('_BLOG_CATEGORY_ARCHIVE', '���� - �������� ���������� ���������');
define('_USE_SECTION_SETTINGS', '������������ ��������� �������');
define('_CMN_ALL', '���');
define('_CMN_ALL_LIMITS', '-���-');
define('_CHOOSE_CATEGORY_TO_REMOVE', '�������� ��������� ��� ��������');
define('_CANNOT_REMOVE_CATEGORY', '���������: #CIDS# �� ����� ���� �������, �.�. ��� �������� ������');
define('_CHOOSE_CATEGORY_FOR_', '�������� ��������� ���');
define('_CHOOSE_OBJECT_TO_MOVE', '�������� ������ ��� �����������');
define('_CATEGORIES_MOVED_TO', '��������� ���������� � ');
define('_CATEGORY_MOVED_TO', '��������� ���������� � ');
define('_CATEGORIES_COPIED_TO', '��������� ����������� � ');
define('_CATEGORY_COPIED_TO', '��������� ����������� � ');
define('_NEW_ORDER_SAVED', '����� ������� ��������');
define('_SAVE_AND_ADD', '��������� � ��������');
define('_CLOSE', '�������');
define('_CREATE_CONTENT', '������� ����������');
define('_MOVE', '���������');
define('_COPY', '����������');

/* administrator components com_checkin */
define('_BLOCKED_OBJECTS', '��������������� �������');
define('_OBJECT', '������');
define('_WHO_BLOCK', '������������');
define('_BLOCK_TIME', '����� ����������');
define('_ACTION', '��������');
define('_GLOBAL_CHECKIN', '���������� �������������');
define('_TABLE_IN_DB', '������� ���� ������');
define('_OBJECT_COUNT', '���-�� ��������');
define('_UNBLOCKED', '��������������');
define('_CHECHKED_TABLE', '��������� �������');
define('_ALL_BLOCKED_IS_UNBLOCKED', '��� ��������������� ������� ��������������');
define('_MINUTES', '�����');
define('_HOURS', '�����');
define('_DAYS', '����');
define('_ERROR_WHEN_UNBLOCKING', '��� ��������������� ��������� ������');
define('_UNBLOCKED2', '�������������');

/* administrator components com_config */
define('_CONFIGURATION_IS_UPDATED', '������������ ������� ���������');
define('_CANNOT_OPEN_CONF_FILE', '������! ���������� ������� ��� ������ ���� ������������!');
define('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', '�� ������������� ������ �������� &laquo;����� �������������� ������&raquo;?\n\n��� �������� ������ ��� ������������ ������ ���������.\n\n');
define('_GLOBAL_CONFIG', '���������� ������������');
define('_PROTECT_AFTER_SAVE', '�������� �� ������ ����� ����������');
define('_IGNORE_PROTECTION_WHEN_SAVE', '������������ ������ �� ������ ��� ����������');
define('_CONFIG_SAVING', '���������� ������������');
define('_NOT_AVAILABLE_CHECK_RIGHTS', '�� ��������');
define('_AVAILABLE_CHECK_RIGHTS', '��������');
define('_SITE_NAME', '�������� �����');
define('_SITE_LANGUAGE', '���� �����');
define('_SITE_OFFLINE', '���� ��������');
define('_SITE_OFFLINE_MESSAGE', '��������� ��� ����������� �����');
define('_SITE_OFFLINE_MESSAGE2', '���������, ������� ��������� ������������� ������ �����, ����� �� ��������� � ����������� ���������.');
define('_SYSTEM_ERROR_MESSAGE', '��������� ��� ��������� ������');
define('_SYSTEM_ERROR_MESSAGE2', '���������, ������� ��������� ������������� ������ �����, ����� Joostina! �� ����� ������������ � ���� ������ MySQL.');
define('_SHOW_READMORE_TO_AUTH', '���������� &laquo;���������&raquo; ����������������');
define('_SHOW_READMORE_TO_AUTH2', '���� &laquo;��&raquo;, �� ���������������� ������������� ����� ������������ ������ �� ���������� � ������� ������� &laquo;��� ������������������&raquo;. ��� ����������� ������� ��������� ������������ ������ ����� ��������������.');
define('_ENABLE_USER_REGISTRATION', '��������� ����������� �������������');
define('_ENABLE_USER_REGISTRATION2', '���� &laquo;��&raquo;, �� ������������� ����� ��������� ���������������� �� �����.');
define('_ACCOUNT_ACTIVATION', '������������ ��������� ������ ��������');
define('_ACCOUNT_ACTIVATION2', '���� &laquo;��&raquo;, �� ������������ ���������� ����� ������������ ����� �������, ����� ��������� �� ������ �� ������� ��� ���������.');
define('_UNIQUE_EMAIL', '��������� ���������� E-mail');
define('_UNIQUE_EMAIL2', '���� &laquo;��&raquo;, �� ������������ �� ������ ��������� ��������� ��������� � ���������� ������� e-mail.');
define('_USER_PARAMS', '��������� ������������ �����');
define('_USER_PARAMS2', '���� &laquo;���&raquo;, �� ����� ��������� ����������� ��������� ������������� ���������� ����� (����� ���������)');
define('_DEFAULT_EDITOR', 'WYSIWYG-�������� �� ���������');
define('_LIST_LIMIT', '����� ������� (���-�� �����)');
define('_LIST_LIMIT2', '������������� ����� ������� �� ��������� � ������ ���������� ��� ���� �������������');
define('_FRONTPAGE', '�����');
define('_SITE', '����');
define('_CUSTOM_PRINT', '�������� ������ �� �������� �������');
define('_CUSTOM_PRINT2', '������������� ������������ �������� ��� ��������� ���� �� �������� �������� �������');
define('_MODULES_MULTI_LANG', '��������� �������������� �������');
define('_MODULES_MULTI_LANG2', '��������� ������� ��������� �������� ����� �������, ���� � ��� ����� �� ������� - ������������� ���������� &laquo;���&raquo;');
define('_DATE_FORMAT_TXT', '������ ����');
define('_DATE_FORMAT2', '�������� ������ ��� ����������� ����. ���������� ������������ ������ � ������������ � ��������� strftime.');
define('_DATE_FORMAT_FULL', '������ ������ ���� � �������');
define('_DATE_FORMAT_FULL2', '�������� ������ ������ ��� ����������� ���� � �������. ���������� ������������ ������ � ������������ � ��������� strftime.');
define('_USE_H1_FOR_HEADERS', '��������� ��������� ����������� ����� H1 ��� ������ ���������');
define('_USE_H1_FOR_HEADERS2', '��������� ��������� ����� h1 ������ � ������ ������� ��������� ����������� ( ��� ������� �� ��������� ).');
define('_USE_H1_HEADERS_ALWAYS', '��������� ��� ��������� ����������� ����� H1');
define('_USE_H1_HEADERS_ALWAYS2', '�������� ��������� ��������� � ���� h1.');
define('_DISABLE_RSS', '��������� ��������� RSS (syndicate)');
define('_DISABLE_RSS2', '���� &laquo;��&raquo;, �� ����� ��������� ����������� ��������� RSS ���� � ������ � ����');
define('_USE_TEMPLATE', '������������ ������');
define('_USE_TEMPLATE2', '��� ������ ������� �� ����� ����������� �� ���� ����� ���������� �� �������� � ������� ���� ������ ��������. ��� ������������� ���������� �������� �������� &laquo;������&raquo;');
define('_FAVICON_IMAGE', '������ ����� � &laquo;���������&raquo; �������� (���������� ��������)');
define('_FAVICON_IMAGE_IE', '������ ����� � &laquo;���������&raquo; �������� (IE)');
define('_FAVICON_IMAGE_IPAD', '������ ����� � &laquo;���������&raquo; �������� (iPad)');
define('_FAVICON_IMAGE2', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (���������� ��������). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� favicon.png.');
define('_FAVICON_IMAGE2_IE', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (IE). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� favicon.ico.');
define('_FAVICON_IMAGE2_IPAD', '������ ����� � &laquo;���������&raquo; (&laquo;���������&raquo;) �������� (iPad). ���� �� ������� ��� ���� ������ �� ������, �� ��������� ����� �������������� ���� apple-touch-icon.png.');
define('_FAVICON_IMAGE3', '������ ����� � &laquo;���������&raquo; (���������� ��������)');
define('_FAVICON_IMAGE3_IE', '������ ����� � &laquo;���������&raquo; (IE)');
define('_FAVICON_IMAGE3_IPAD', '������ ����� � &laquo;���������&raquo; (iPad)');
define('_DISABLE_FAVICON', '��������� favicon (���������� ��������)');
define('_DISABLE_FAVICON_IE', '��������� favicon (IE)');
define('_DISABLE_FAVICON_IPAD', '��������� favicon (iPad)');
define('_DISABLE_FAVICON2', '������������ � �������� ������ ����� favicon (���������� ��������)');
define('_DISABLE_FAVICON2_IE', '������������ � �������� ������ ����� favicon (IE)');
define('_DISABLE_FAVICON2_IPAD', '������������ � �������� ������ ����� favicon (iPad)');
define('_DISABLE_SYSTEM_MAMBOTS', '��������� ������� ������ system');
define('_DISABLE_SYSTEM_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� ��������� �������� ����� ����������. ��������, ���� �� ����� ������������ ������� ���� ������, �� ��������� ��������� �� �������������');
define('_DISABLE_CONTENT_MAMBOTS', '��������� ������� ������ content');
define('_DISABLE_CONTENT_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� �������� ��������� �������� ����� ����������. ��������, ���� �� ����� ������������ ������� ���� ������, �� ��������� ��������� �� �������������');
define('_DISABLE_MAINBODY_MAMBOTS', '��������� ������� ������ mainbody');
define('_DISABLE_MAINBODY_MAMBOTS2', '���� &laquo;��&raquo;, �� ������������� �������� ��������� ����� ����������� (mainbody) ����� ����������.');
define('_SITE_AUTH', '����������� �� �����');
define('_SITE_AUTH2', '���� &laquo;���&raquo;, �� �������� ����������� �� ����� ����� ���������, ���� � ��� �� ������ ����� ����. ����� ����� ��������� ����������� ����������� �� �����');
define('_FRONT_SESSION_TIME', '����� ������������� ������ �� ������');
define('_FRONT_SESSION_TIME2', '����� �������������� ������������ ����� ��� ������������. ������� �������� ����� ��������� ������� ������������.');
define('_DISABLE_FRONT_SESSIONS', '��������� ������ �� ������');
define('_DISABLE_FRONT_SESSIONS2', '���� &laquo;��&raquo;, �� ����� ��������� ������� ������ ��� ������� ������������ �� �����. ���� ������� ����� ������������� �� ����� � ����������� ��������� - ����� ���������.');
define('_DISABLE_ACCESS_CHECK_TO_CONTENT', '��������� �������� ������� � �����������');
define('_DISABLE_ACCESS_CHECK_TO_CONTENT2', '���� &laquo;��&raquo;, �� �������� ������� � ����������� �������������� �� �����, � ���� ������������� ����� ���������� �� ����������. ������������� ��������� � �������� ���������� ����������� � ������ �� ������.');
define('_COUNT_CONTENT_HITS', '������� ����� ��������� �����������');
define('_COUNT_CONTENT_HITS2', '��� ���������� ��������� ���������� ��������� ����������� ����� �� �������.');
define('_DISABLE_CHECK_CONTENT_DATE', '��������� �������� ���������� �� �����');
define('_DISABLE_CHECK_CONTENT_DATE2', '���� �� ����� �� �������� ��������� ���������� ���������� ����������� - �� ������ �������� ����� ��������������.');
define('_DISABLE_MODULES_WHEN_EDIT', '��������� ������ � ��������������');
define('_DISABLE_MODULES_WHEN_EDIT2', '���� &laquo;��&raquo;, �� �� �������� �������������� ����������� � ������ ����� ��������� ��� ������');
define('_COUNT_GENERATION_TIME', '������������ ����� ��������� ��������');
define('_COUNT_GENERATION_TIME2', '���� &laquo;��&raquo;, �� �� ������ �������� ����� ���������� ����� �� � ���������');
define('_ENABLE_GZIP', 'GZIP-������ �������');
define('_ENABLE_GZIP2', '��������� ������ ������� ����� ��������� (���� ��������������). ��������� ���� ������� ��������� ������ ����������� ������� � �������� � ���������� �������. � �� �� �����, ��� ����������� �������� �� ������.');
define('_IS_SITE_DEBUG', '����� ������� �����');
define('_IS_SITE_DEBUG2', '���� &laquo;��&raquo;, �� ����� ������������ ��������������� ����������, ������� � ������ MySQL�');
define('_EXTENDED_DEBUG', '����������� ��������');
define('_EXTENDED_DEBUG2', '������������ �� ������ ����� ����������� �������� ��������� ��������� ���������� � �����.');
define('_CONTROL_PANEL', '������ ����������');
define('_DISABLE_ADMIN_SESS_DEL', '��������� �������� ������ � ������ ����������');
define('_DISABLE_ADMIN_SESS_DEL2', '�� ������� ������ ���� ����� ��������� ������� �������������.');
define('_DISABLE_HELP_BUTTON', '��������� ������ &laquo;������&raquo;');
define('_DISABLE_HELP_BUTTON2', '��������� ��������� � ������ ������ ������ ������� ������ ����������.');
define('_USE_OLD_TOOLBAR', '������������ ������ ����������� ��������');
define('_USE_OLD_TOOLBAR2', '��� ������������� ��������� ����� ������ �������� ����� ��������� � ������ ������, ��� ���� � Joomla.');
define('_DISABLE_IMAGES_TAB', '��������� ������� &laquo;�����������&raquo;');
define('_DISABLE_IMAGES_TAB2', '��������� ��������� � ������ ��� �������������� ����������� ������� &laquo;�����������&raquo;.');
define('_ADMIN_SESS_TIME', '����� ������������� ������ � ������ ����������');
define('_SECONDS', '������');
define('_ADMIN_SESS_TIME2', '�����, �� ��������� �������� ����� ��������� ������������ <strong>�����������</strong> ��� ������������. ������� ������� �������� ��������� ������������ �����!');
define('_SAVE_LAST_PAGE', '���������� �������� ����������� ��� ��������� ������');
define('_SAVE_LAST_PAGE2', '���� ������ ������ � ������ ���������� �����������, � �� �������� �� ���� � ������� 10 �����, �� ��� ����� �� ������ �������������� �� ��������, � ������� ��������� ����������');
define('_HTML_CSS_EDITOR', '���������� �������� ��� html � css');
define('_HTML_CSS_EDITOR2', '������������ �������� � ���������� ���������� ��� �������������� html � css ������ �������');
define('_THIS_PARAMS_CONTROL_CONTENT', '<span class="green">* ��� ��������� ������������ ����� ��������� �����������. *</span>');
define('_LINK_TITLES', '��������� � ���� ������');
define('_LINK_TITLES2', '���� &laquo;��&raquo;, ��������� �������� ����������� �������� �������� ��� ����������� �� ��� �������');
define('_READMORE_LINK', '������ &laquo;���������&raquo;');
define('_READMORE_LINK2', '���� ������ �������� &laquo;��������&raquo;, �� ����� ������������ ������ &laquo;���������&raquo; ��� ��������� ������� �����������');
define('_VOTING_ENABLE', '�������/�����������');
define('_VOTING_ENABLE2', '���� ������ �������� &laquo;��������&raquo;, ������� &laquo;�������/�����������&raquo; ����� ��������');
define('_AUTHOR_NAMES', '����� �������');
define('_AUTHOR_NAMES2', '��������, ���������� �� ����� �������. ��� ���������� ���������, �� ��� ����� ���� �������� � ������ ������ �� ������ ���� ��� �������.');
define('_DATE_TIME_CREATION', '���� � ����� ��������');
define('_DATE_TIME_CREATION2', '���� &laquo;��������&raquo;, �� ������������ ���� � ����� �������� ������. ��� ���������� ���������, �� ����� ���� �������� � ������ ������ �� ������ ���� ��� �������.');
define('_DATE_TIME_MODIFICATION', '���� � ����� ���������');
define('_DATE_TIME_MODIFICATION2', '���� ����������� &laquo;��������&raquo;, �� ����� ������������ ���� ��������� ������. ��� ���������� ���������, �� ��� ����� ���� �������� � ������ ������.');
define('_VIEW_COUNT', '���-�� ����������');
define('_VIEW_COUNT2', '���� ����������� &laquo;��������&raquo;, �� ������������ ���������� ���������� ������� ������������ �����. ��� ���������� ��������� ����� ���� �������� � ������ ������ ������ ����������.');
define('_LINK_PRINT', '������ &laquo;������&raquo;');
define('_LINK_PDF', '������ &laquo;PDF&raquo;');
define('_LINK_EMAIL', '������ &laquo;E-mail&raquo;');
define('_PRINT_EMAIL_ICONS', '������ &laquo;������&raquo;, &laquo;E-mail&raquo; � &laquo;PDF&raquo;');
define('_PRINT_EMAIL_ICONS2', '���� ������� &laquo;��������&raquo;, �� ������ &laquo;������&raquo;, &laquo;E-mail&raquo; � &laquo;PDF&raquo; ����� ������������ � ���� �������, ����� - ������� �������-�������.');
define('_PRINT_PDF_ICON', '�������� ����������, ����� ������� /media ������� �� ������.');
define('_ENABLE_TOC', '���������� ��� ��������������� ��������');
define('_BACK_BUTTON', '������ &laquo;�����&raquo; (&laquo;���������&raquo;)');
define('_CONTENT_NAV', '��������� �� �����������');
define('_UNIQ_ITEMS_IDS', '���������� �������������� ��������');
define('_UNIQ_ITEMS_IDS2', '��� ��������� ��������� ��� ������ ������� � ������ ����� ���������� ���������� ������������� �����.');
define('_AUTO_PUBLICATION_FRONT', '�������������� ���������� �� �������');
define('_AUTO_PUBLICATION_FRONT2', '��� ��������� ��������� �� ����������� ���������� ����� ������������� �������� ��� ���������� �� ������� ��������.');
define('_DISABLE_BLOCK', '��������� ���������� �����������');
define('_DISABLE_BLOCK2', '��� ��������� ��������� ���������� �������� ����������� �� ����� �����������. �� ������������� ������������ �� ������ � ������� ������ ����������.');
define('_ITEMID_COMPAT', '����� ������ Itemid');
define('_ONE_EDITOR', '������������ ������ ���� ���������');
define('_ONE_EDITOR2', '������������ ���� ���� ��� �������� � ��������� ������.');
define('_LOCALE', '������');
define('_TIME_OFFSET', '������� ���� (�������� ������� ������������ UTC, �)');
define('_TIME_OFFSET2', '������� ���� � �����, ������� ����� ������������ �� �����:');
define('_TIME_DIFF', '������� �� �������� �������, �');
define('_TIME_DIFF2', 'RSS (�������� ������� ������������ UTC, �)');
define('_CURR_DATE_TIME_RSS', '������� ���� � �����, ������� ����� ������������ � RSS');
define('_COUNTRY_LOCALE', '������ ������');
define('_COUNTRY_LOCALE2', '���������� ������������ ��������� ������: ����������� ����, �������, ����� � �.�.');
define('_LOCALE_WINDOWS', '��� ������������� � Windows ���������� ������ <span style="color:red">RU</span>.<br />� Unix-��������, ���� �� �������� �������� �� ���������, ����� ����������� �������� ������� �������� ������ �� <span style="color:red">RU_RU.CP1251</span>, <span style="color:red">ru_RU.cp1251</span>, <span style="color:red">ru_ru.CP1251</span>, ��� ������ �������� ������� ������ � ����������.<br />����� ����� ����������� ������ ���� �� ��������� �������: <span style="color:red">rus</span>, <span style="color:red">russian</span>');
define('_DB_HOST', '����� ����� MySQL');
define('_DB_USER', '��� ������������ �� (MySQL)');
define('_DB_NAME', '���� ������ MySQL');
define('_DB_PREFIX', '������� ���� ������ MySQL');
define('_DB_PREFIX2', '!! �� ���������, ���� � ��� ��� ���� ������� ���� ������. � ��������� ������, �� ������ �������� � ��� ������ !!');
define('_EVERYDAY_OPTIMIZATION', '���������� ����������� ������ ���� ������');
define('_EVERYDAY_OPTIMIZATION2', '���� &laquo;��&raquo;, �� ������ ����� ���� ������ ����� ������������� �������������� ��� ������� ��������������');
define('_OLD_MYSQL_SUPPORT', '��������� ������� ������ MySQL');
define('_OLD_MYSQL_SUPPORT2', '�������� ��������� ��������� �������������� ������� ������ �� � ����� ������������� � ����������');
define('_DISABLE_SET_SQL', '��������� SET sql_mode');
define('_DISABLE_SET_SQL2', '��������� ������� ������ ������ ���� ������ SET sql_mode');
define('_SERVER', '������');
define('_ABS_PATH', '���������� ����( ������ ����� )');
define('_MEDIA_ROOT', '������ ����� ���������');
define('_MEDIA_ROOT2', '�������� ������� ��� ������ ���������� ���������� ����� �������. ���� �� ����� ����� ��� &frasl; �� �����.');
define('_FILE_ROOT', '������ ��������� ���������');
define('_FILE_ROOT2', '�������� ������� ��� ������ ���������� ���������� �������. ��� &frasl; � �����. ��� ������������� � Windows (c) ���� ����� ���������� � �������� ����� �����.');
define('_SECRET_WORD', '��������� �����');
define('_GZ_CSS_JS', '������ CSS � JS ������');
define('_SESSION_TYPE', '����� ������������� ������');
define('_SESSION_TYPE2', '�� ���������, ���� �� ������, ����� ��� ����!<br /><br />���� ���� ����� �������������� �������������� ������ AOL ��� ��������������, ������������� ��� ������� �� ���� ������-�������, �� ������ ������������ ��������� 2 ������');
define('_HELP_SERVER', '������ ������');
define('_HELP_SERVER2', '������ ������ - ���� ���� ������, �� ����� ������ ����� ������� �� ��������� ����� http://�����_������_�����/help/, ��� ��������� ������� On-Line ������ ������� http://joostina.ru, http://help.joom.ru ��� http://help.joomla.org');
define('_FILE_MODE', '�������� ������');
define('_FILE_MODE2', '���������� ������� � ������');
define('_FILE_MODE3', '�� ������ CHMOD ��� ����� ������ (������������ ��������� �������)');
define('_FILE_MODE4', '���������� CHMOD ��� ����� ������');
define('_FILE_MODE5', '�������� ���� ����� ��� ��������� ���������� ������� � ����� ����������� ������');
define('_OWNER', '��������');
define('_O_READ', '������');
define('_O_WRITE', '������');
define('_O_EXEC', '����������');
define('_APPLY_TO_FILES', '��������� � ������������ ������');
define('_APPLY_TO_FILES2', '��������� �������� <em>���� ������������ ������</em> �� �����.<br /><strong>������������ ������������� ���� ����� ����� �������� � ������������������� �����!</strong>');
define('_DIR_CREATION', '�������� ���������');
define('_DIR_CREATION2', '���������� ������� � ���������');
define('_DIR_CREATION3', '�� ������ CHMOD ��� ����� ��������� (������������ ��������� �������)');
define('_DIR_CREATION4', '���������� CHMOD ��� ����� ���������');
define('_DIR_CREATION5', '�������� ���� ����� ��� ��������� ���������� ������� � ����� ����������� ���������');
define('_O_SEARCH', '�����');
define('_APPLY_TO_DIRS', '��������� � ������������ ���������');
define('_APPLY_TO_DIRS2', '��������� ���� ������ ����� ��������� <em>�� ���� ������������ ���������</em> �� �����.<br />' . '<strong>������������ ������������� ���� ����� ����� �������� � ������������������� �����!</strong>');
define('_O_GROUP', '������');
define('_O_AS', '���');
define('_RG_EMULATION_TXT', '�������� ����������� ���������� ����������');
define('_RG_DISABLE', '����. (<span class="green">�������������</span>) - �������������� ������');
define('_RG_ENABLE', '���. (<span class="red">�� �������������</span>) - ������������� �� ������� ������������, ��� ������������� ��������� ���������� ������ ������������.');
define('_METADATA', '����������');
define('_SITE_DESC', '�������� �����, ������� ������������� ������������');
define('_SITE_DESC2', ' �� ������ �� ������������ ���� �������� ��������� �������, � ����������� �� ���������� �������, ������� �� ���������� ������������. ������� �������� ������� � ���������� ��� ���������� ������ �����. �� ������ �������� ��������� �� ����� �������� ���� � �������� ����. ��� ��� ��������� ��������� ������� ������ ������ 20 ����, �� �� ������ �������� ���� ��� ��� �����������. ���������� ��������������, ��� ����� ������ ����� ������ �������� ��������� � ������ 20 ������.');
define('_SITE_KEYWORDS', '�������� ����� �����');
define('_SITE_KEYWORDS2', ' �� ������ �� ������������ ��� �������� ����� ���������, � ����������� �� ���������� �������, ������� �� ���������� ������������. ������� �������� ����� ���������� ��� ���������� ������ �����.');
define('_SHOW_TITLE_TAG', '���������� ����-��� title');
define('_SHOW_TITLE_TAG2', '���������� ����-��� title ��� ��������� �������� �����������');
define('_SHOW_GEO_TAG', 'Geotagging');
define('_SHOW_GEO_TAG2', '���������� Geotagging ����-���� ��� ��������� �������� �����������');
define('_SHOW_GEO_TAG_LATITUDE', '������');
define('_SHOW_GEO_TAG2_LATITUDE', '������ �������. ������������ � ������� 50.167958 (������!). ���� ������ ���������� � �������� ���������, �� ����� ������� ����������� ���� ������ (-).');
define('_SHOW_GEO_TAG_LONGITUDE', '�������');
define('_SHOW_GEO_TAG2_LONGITUDE', '������� �������. ������������ � ������� 50.167958 (������!). ���� ������ ���������� � ����� ���������, �� ����� ������� ����������� ���� ������ (-).');
define('_SHOW_GEO_TAG_PLACENAME', '����������������� �������');
define('_SHOW_GEO_TAG2_PLACENAME', '����������������� �������. ����������� � ������� �����, ������ (������!)');
define('_SHOW_GEO_TAG_REGION', '������ �������');
define('_SHOW_GEO_TAG2_REGION', '������ �������. ����������� � ������������ ������� ������ ru (������!)');
define('_SHOW_DCORE', 'Dublin Core Metadata Element Set');
define('_SHOW_DCORE2', '���������� Dublin Core Metadata Element Set (DCMES) ����-���� ��� ��������� �������� �����������');
define('_SHOW_DCORE_LANGUAGE', '����');
define('_SHOW_DCORE2_LANGUAGE', '����. ����������� � ������������ ������� ������ ru (������!)');
define('_SHOW_GA', 'Google Analitics');
define('_SHOW_GA2', '���������� ��� Google Analitics � ������������ ����');
define('_SHOW_GA_ID', 'Google Analitics ID');
define('_SHOW_GA2_ID', 'Google Analitics ID ��� ������������ ���������� �����');
define('_SHOW_YM', '������.�������');
define('_SHOW_YM2', '���������� ��� ������.������� � ������������ ����');
define('_SHOW_YM_ID', '������.������� ID');
define('_SHOW_YM2_ID', '������.������� ID ��� ������������ ���������� �����');
define('_SHOW_AUTHOR_TAG', '���������� ����-��� author');
define('_SHOW_AUTHOR_TAG2', '���������� ����-��� author ��� ��������� �������� �����������');
define('_SHOW_BASE_TAG', '���������� ����-��� base');
define('_SHOW_BASE_TAG2', '���������� ����-��� base � ���� ������ ��������');
define('_REVISIT_TAG', '�������� ���� revisit');
define('_REVISIT_TAG2', '������� �������� ���� revisit � ����');
define('_DISABLE_GENERATOR_TAG', '��������� ��� Generator');
define('_DISABLE_GENERATOR_TAG2', '���� &laquo;��&raquo;, �� �� ���� ������ HTML �������� ����� �������� ��� name=&laquo;Generator&raquo;');
define('_EXT_IND_TAGS', '����������� ���� ����������');
define('_EXT_IND_TAGS2', '���� &laquo;��&raquo;, �� � ��� ������ �������� ����� ��������� ����������� ���� ��� ������ ����������');
define('_MAIL', '�����');
define('_MAIL_METHOD', '��� �������� ����� ������������');
define('_MAIL_FROM_ADR', '������ �� (Mail From)');
define('_MAIL_FROM_NAME', '����������� (From Name)');
define('_SENDMAIL_PATH', '���� � Sendmail');
define('_USE_SMTP', '������������ SMTP-�����������');
define('_USE_SMTP2', '�������� &laquo;��&raquo;, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
define('_SMTP_USER', '��� ������������ SMTP');
define('_SMTP_USER2', '�����������, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
define('_SMTP_PASS', '������ ��� ������� � SMTP');
define('_SMTP_PASS2', '�����������, ���� ��� �������� ����� ������������ smtp-������ � �������������� �����������');
define('_SMTP_SERVER', '����� SMTP-�������');
define('_CACHE', '���');
define('_ENABLE_CACHE', '�������� �����������');
define('_ENABLE_CACHE2', '��������� ����������� ��������� ������� � MySQL � ���������� �������� �� ������');
define('_CACHE_OPTIMIZATION', '����������� �����������');
define('_CACHE_OPTIMIZATION2', '������������� ������� �� ������ ���� ������ ������� ��� ����� �������� ������ ������.');
define('_AUTOCLEAN_CACHE_DIR', '�������������� ������� �������� ����');
define('_AUTOCLEAN_CACHE_DIR2', '������������� ������� ������� ���� ������ ������������ �����.');
define('_CACHE_MENU', '����������� ���� ������ ����������');
define('_CACHE_MENU2', '��������� ����������� ���� ������ ����������. �������� ���������� �� ������������ ����.');
define('_CANNOT_CACHE', '����������� �� ��������');
define('_CANNOT_CACHE2', '<strong class="red">������� ���� �� �������� ��� ������.</strong>');
define('_CACHE_DIR', '������� ����');
define('_CACHE_DIR2', '������� ������� ���� <strong>�������� ��� ������</strong>');
define('_CACHE_DIR3', '������� ������� ���� <strong>�� �������� ��� ������</strong> - ������� CHMOD �������� �� 755 ����� ���������� ����');
define('_CACHE_TIME', '����� ����� ����');
define('_DB_CACHE', '��� �������� ���� ������');
define('_DB_CACHE_TIME', '����� ����� ���� �������� ���� ������');
define('_STATICTICS', '����������');
define('_ENABLE_STATS', '�������� ���� ����������');
define('_ENABLE_STATS2', '���������/��������� ���� ���������� �����');
define('_STATS_HITS_DATE', '����� ���������� ��������� ����������� �� ����');
define('_STATS_HITS_DATE2', '��������������: � ���� ������ ������������ ������� ������ ������!');
define('_STATS_SEARCH_QUERIES', '���������� ��������� ��������');
define('_SEF_URLS', '������������� ��� ��������� ������ URL-� (SEF)');
define('_SEF_URLS2', '������ ��� Apache! ����� �������������� ������������ htaccess.txt � .htaccess. ��� ���������� ��� ��������� ������ apache - mod_rewrite');
define('_DYNAMIC_PAGETITLES', '������������ ��������� ������� (���� title)');
define('_DYNAMIC_PAGETITLES2', '������������ ��������� ���������� ������� � ����������� �� �������� ���������������� �����������');
define('_CLEAR_FRONTPAGE_LINK', '������� ������ �� com_frontpage');
define('_CLEAR_FRONTPAGE_LINK2', '��������� ������ �� ��������� ������� �������� ����� �������� ���.');
define('_DISABLE_PATHWAY_ON_FRONT', '�������� ������ (pathway) �� �������');
define('_DISABLE_PATHWAY_ON_FRONT2', '��� ���������� ������ ������ &laquo;�������&raquo; �� ������ �������� ����� ����� �������� �� ������ ������������ �������.');
define('_TITLE_ORDER', '������� ������������ ��������� title');
define('_TITLE_ORDER2', '������� ������������ ��������� ��������� ������� (��� title)');
define('_TITLE_SEPARATOR', '����������� ��������� title');
define('_TITLE_SEPARATOR2', '����������� ��������� ��������� ������� (��� title). �� ��������� - �����.');
define('_INDEX_PRINT_PAGE', '���������� �������� ������');
define('_INDEX_PRINT_PAGE2', '���� &laquo;��&raquo;, �� �������� ������ ����������� ����� �������� ��� ����������');
define('_REDIR_FROM_NOT_WWW', '������������� � �� WWW �������');
define('_REDIR_FROM_NOT_WWW2', '��� ������ �� ���� �� ������ site.ru, ������������� ����� ����������� ������������� �� www.site.ru');
define('_ADMIN_CAPTCHA', '��� ����������� � ������ ����������');
define('_ADMIN_CAPTCHA2', '������������ captcha ��� ����� ���������� ����������� � ������ ����������.');
define('_REGISTRATION_CAPTCHA', '��� �����������');
define('_REGISTRATION_CAPTCHA2', '������������ captcha ��� ����� ���������� �����������.');
define('_CONTACTS_CAPTCHA', '��� ����� ���������');
define('_CONTACTS_CAPTCHA2', '������������ captcha ��� ����� ���������� ����� ���������.');

define('_O_OTHER', '������');
define('_SECURITY_LEVEL3', '3 ������� ������ - �� ��������� - ���������');
define('_SECURITY_LEVEL2', '2 ������� ������ - ��������� ��� IP-������� ������');
define('_SECURITY_LEVEL1', '1 ������� ������ - �������� �������������');
define('_PHP_MAIL_FUNCTION', '������� PHP mail');
define('_CONSTRUCT_ERROR', '������ ������');

define('_TIME_OFFSET_M_12', '(UTC -12:00) ������������� ����� ��������� �������');
define('_TIME_OFFSET_M_11', '(UTC -11:00) ������ ������, �����');
define('_TIME_OFFSET_M_10', '(UTC -10:00) ������');
define('_TIME_OFFSET_M_9_5', '(UTC -09:30) �������, ���������� �������');
define('_TIME_OFFSET_M_9', '(UTC -09:00) ������');
define('_TIME_OFFSET_M_8', '(UTC -08:00) ������������� ����� (��� &amp; ������)');
define('_TIME_OFFSET_M_7', '(UTC -07:00) ����� ������� (��� &amp; ������)');
define('_TIME_OFFSET_M_6', '(UTC -06:00) ����������� �����  (��� &amp; ������), ������');
define('_TIME_OFFSET_M_5', '(UTC -05:00) ��������� ����� (��� &amp; ������), ������, �����');
define('_TIME_OFFSET_M_4', '(UTC -04:00) ������������� ����� (������), �������, ��-���');
define('_TIME_OFFSET_M_3_5', '(UTC -03:30) ������������ � ��������');
define('_TIME_OFFSET_M_3', '(UTC -03:00) ��������, ������ �����, ����������');
define('_TIME_OFFSET_M_2', '(UTC -02:00) ������-������������� �����');
define('_TIME_OFFSET_M_1', '(UTC -01:00) �������� �������, ������� �������� ����');
define('_TIME_OFFSET_M_0', '(UTC 00:00) �������-����������� �����, ������, ��������, ����������');
define('_TIME_OFFSET_P_1', '(UTC +01:00) ��������, ����������, ������, �����');
define('_TIME_OFFSET_P_2', '(UTC +02:00) �������� ����� - �������; ������� ����� &ndash; ���������; Further-eastern European Time (FET) &ndash; ��������������� ���������� ����������; ����� ������');
define('_TIME_OFFSET_P_3', '(UTC +03:00) Kaliningrad Time (MSK-1) 1-� ������� ���� &ndash; ��������������� �������; ������, ��-����');
define('_TIME_OFFSET_P_3_5', '(UTC +03:30) �������');
define('_TIME_OFFSET_P_4', '(UTC +04:00) Moscow Time (MSK) 2-� ������� ���� &ndash; ������ � ��� ����������� ����� ������;<br />���������� ����� - �������, ����� ������; ����, �������, ���-����, ������');
define('_TIME_OFFSET_P_4_5', '(UTC +04:30) �����');
define('_TIME_OFFSET_P_5', '(UTC +05:00) �������, ���������� ����� - �������, ���������, ������');
define('_TIME_OFFSET_P_5_5', '(UTC +05:30) ������, ���������, ������, ���-����');
define('_TIME_OFFSET_P_5_75', '(UTC +05:45) ��������');
define('_TIME_OFFSET_P_6', '(UTC +06:00) Yekaterinburg Time (MSK+2) 3-� ������� ���� &ndash; ���������� ������������, �������� ����, ���������� �������, ������������ �������, ������������ �������, ��������� �������, ����������� �������,<br />�����-���������� ���������� ����� &ndash; ����, �����-�������� ���������� �����; ������, ����, �������');
define('_TIME_OFFSET_P_6_5', '(UTC +06:30) ����');
define('_TIME_OFFSET_P_7', '(UTC +07:00) Omsk Time (MSK+3) 4-� ������� ���� &ndash; ���������� �����, ��������� ����, ����������� �������, ������������� �������, ������ �������, ������� �������; �������, �����, ��������');
define('_TIME_OFFSET_P_8', '(UTC +08:00) Krasnoyarsk Time (MSK+4) 5-� ������� ���� &ndash; ���������� ����, ���������� �������, ������������ ����; ����-�����, �����, ��������, �������');
define('_TIME_OFFSET_P_8_75', '(UTC +08:00) �������� ���������');
define('_TIME_OFFSET_P_9', '(UTC +09:00) Irkutsk Time (MSK+5) 6-� ������� ���� &ndash; ���������� �������, ��������� �������; �����, ����, �����, �������');
define('_TIME_OFFSET_P_9_5', '(UTC +09:30) ��������, ������');
define('_TIME_OFFSET_P_10', '(UTC +10:00) Yakutsk Time (MSK+6) 7-� ������� ���� &ndash; ���������� ���� (������) (����� ������������, ������������, ����-�������, ���������, �������������, ����������������, ��������, ���������������, ���������������� �������), ������� ������, ������������� ����, �������� �������; ����, ��������� ���������');
define('_TIME_OFFSET_P_10_5', '(UTC +10:30) ������ Lord Howe (���������)');
define('_TIME_OFFSET_P_11', '(UTC +11:00) Vladivostok Time (MSK+7) 8-� ������� ���� &ndash; ���������� ����, ����������� ����, ��������� ���������� �������, ���������� ���� (������) (�����������, �����������, ����-������ ������), ����������� ������� (����� ������-����������� ������); ���������� �������, ����� ���������');
define('_TIME_OFFSET_P_11_5', '(UTC +11:30) ������ �������');
define('_TIME_OFFSET_P_12', '(UTC +12:00) Magadan Time (MSK+8) 9-� ������� ���� &ndash; ���������� ����, ����������� �������, ��������� ���������� �����, ���������� ���� (������) (��������, ������������, ���������������, �������, ��������������, ��������������� ������), ����������� ������� (������-���������� �����); ������, ����������, �����');
define('_TIME_OFFSET_P_12_75', '(UTC +12:45) ������ �����');
define('_TIME_OFFSET_P_13', '(UTC +13:00) �����');
define('_TIME_OFFSET_P_14', '(UTC +14:00) ��������');

/* administrator components com_contact */
define('_CONTACT_MANAGEMENT', '���������� ����������');
define('_ON_SITE', '�� �����');
define('_RELATED_WITH_USER', '������� � �������������');
define('_CHANGE_CONTACT', '�������� �������');
define('_CHANGE_CATEGORY', '�������� ���������');
define('_CHANGE_USER', '�������� ������������');
define('_ENTER_NAME_PLEASE', '�� ������ ������ ���');
define('_NEW_CONTACT', '�����');
define('_CONTACT_DETAILS', '������ ��������');
define('_USER_POSITION', '��������� (���������)');
define('_ADRESS_STREET_HOUSE', '����� (�����, ���)');
define('_CITY', '�����');
define('_STATE', '����/�������/����������');
define('_COUNTRY', '������');
define('_POSTCODE', '�������� ������');
define('_ADDITIONAL_INFO', '�������������� ����������');
define('_PUBLISH_INFO', '���������� � ����������');
define('_POSITION', '������������');
define('_IMAGES_INFO', '���������� �� �����������');
define('_PARAMETERS', '���������');
define('_CONTACT_PARAMS', '* ��� ��������� ��������� ������������ ������ ��� ��������� ���������� � ��������. *');

/* administrator components com_content */
define('_SITE_CONTENT', '���������� �����');
define('_GOTO_EDIT', '������� � ��������������');
define('_SORT_BY', '���������� ��');
define('_HIDE_NAV_TREE', '������ ������ ���������');
define('_ON_FRONTPAGE', '�� �������');
define('_SAVE_ORDER', '��������� �������');
define('_TO_TRASH', '� �������');
define('_NEVER', '�������');
define('_START', '������');
define('_ALWAYS', '������');
define('_END', '���������');
define('_WITHOUT_END', '��� ���������');
define('_CHANGE_USER_DATA', '�������� ������ ������������');
define('_CHANGE_CONTENT', '�������� ����������');
define('_CHOOSE_OBJECTS_TO_TRASH', '����������, �������� �� ������ �������, ������� �� ������ ��������� � �������');
define('_WANT_TO_TRASH', '�� �������, ��� ������ ��������� ������(�) � �������?\n��� �� �������� � ������� �������� ��������');
define('_ARCHIVE', '�����');
define('_ALL_SECTIONS', '��� �������');
define('_OBJECT_MUST_HAVE_TITLE', '���� ������ ������ ����� ���������');
define('_PLEASE_CHOOSE_SECTION', '�� ������ ������� ������');
define('_PLEASE_CHOOSE_CATEGORY', '�� ������ ������� ���������');
define('_O_EDITING', '��������������');
define('_O_CREATION', '��������');
define('_OBJECT_DETAILS', '������ �������');
define('_ALIAS', '���������');
define('_INTROTEXT_M', '������� �����: (�����������)');
define('_MAINTEXT_M', '�������� �����: (�������������)');
define('_NOTETEXT_M', '�������: (�������������)');
define('_HIDE_PARAMS_PANEL', '������ ������ ����������');
define('_SETTINGS', '���������');
define('_IN_ARCHIVE', '� ������');
define('_DRAFT_NOT_PUBLISHED', '�������� - �� �����������');
define('_RESET', '��������');
define('_CHANGED', '����������');
define('_CREATED', '�������');
define('_NEW_DOCUMENT', '����� ��������');
define('_LAST_CHANGE', '��������� ���������');
define('_NOT_CHANGED', '�� ����������');
define('_START_PUBLICATION', '������ ����������');
define('_END_PUBLICATION', '��������� ����������');
define('_OBJECT_ID', 'ID �������');
define('_USED_IMAGES', '������������ �����������');
define('_SUBDIRECTORY', '��������');
define('_IMAGE_EXAMPLE', '������ �����������');
define('_ACTIVE_IMAGE', '�������� �����������');
define('_SOURCE', '��������');
define('_ALIGN', '������������');
define('_PARAMS_IN_VIEW', '* ��� ��������� ��������� ������� ����� ������ � ������ ������� ���������*');
define('_ROBOTS_PARAMS', '��������� ���������� ��������');
define('_MENU_LINK', '����� � ����');
define('_MENU_LINK2', '����� ��������� ����� ���� (������ - ������ �����������), ������� ����������� � ��������� �� ������ ����');
define('_EXISTED_MENUITEMS', '������������ ������ ����');
define('_PLEASE_SELECT_SMTH', '����������, �������� ���-������');
define('_OBJECT_MOVING', '����������� ��������');
define('_MOVE_INTO_CAT_SECT', '����������� � ������/���������');
define('_OBJECTS_TO_MOVE', '����� ���������� �������');
define('_SELECT_CAT_TO_MOVE_OBJECTS', '����������, �������� ������ ��� ��������� ��� ����������� ��������');
define('_COPYING_CONTENT_ITEMS', '����������� �������� �����������');
define('_COPY_INTO_CAT_SECT', '���������� � ������/���������');
define('_OBJECTS_TO_COPY', '����� ����������� �������');
define('_ORDER_BY_NAME', '����������� �������');
define('_ORDER_BY_HEADERS', '����������');
define('_ORDER_BY_DATE_CR', '���� ��������');
define('_ORDER_BY_DATE_MOD', '���� �����������');
define('_ORDER_BY_ID', '��������������� ID');
define('_ORDER_BY_SECTIONID', '�������');
define('_ORDER_BY_CATID', '���������');
define('_ORDER_BY_HITS', '����������');
define('_CANNOT_EDIT_ARCHIVED_ITEM', '�� �� ������ ��������������� �������� ������');
define('_NOW_EDITING_BY_OTHER', '� ��������� ����� ������������� ������ �������������');
define('_ROBOTS_HIDE', '������ ����-��� robots');
define('_CONTENT_ITEM_SAVED', '��������� ������� ��������� �');
define('_OBJ_ARCHIVED', '������(�) ������� �����������(�)');
define('_OBJ_PUBLISHED', '������(�) ������� �����������(�)');
define('_OBJ_UNARCHIVED', '������(�) ������� ��������(�) �� ������');
define('_OBJ_UNPUBLISHED', '������(�) ������� ����(�) � ����������');
define('_CHOOSE_OBJ_TOGGLE', '�������� ������ ��� ������������');
define('_CHOOSE_OBJ_DELETE', '�������� ������ ��� ��������');
define('_MOVED_TO_TRASH', '���������� � �������');
define('_CHOOSE_OBJ_MOVE', '�������� ������ ��� �����������');
define('_ERROR_OCCURED', '��������� ������');
define('_OBJECTS_MOVED_TO_SECTION', '������(�) ������� ���������(�) � ������');
define('_OBJECTS_COPIED_TO_SECTION', '������(�) ������� ����������� � ������');
define('_HITCOUNT_RESETTED', '������� ���������� �������');
define('_TIMES', '���');

/* administrator components com_easysql */
define('_SQL_COMMAND', '�������');
define('_MANAGEMENT', '����������');
define('_FIELDS', '����');
define('_EXEC_SQL', '��������� SQL');
define('_SQL_CONSOL', 'SQL �������');
define('_SQL_TABLE', '�������');
define('_SQL_ROWS_ENTER', '������� �����');
define('_SQL_MAKE', '������� SQL');

/* administrator components com_frontpage */
define('_UNKNOWN_ID', '������������� �� �������');
define('_REMOVE_FROM_FRONT', '������ � �������');
define('_PUBLISH_TIME_END', '����� ���������� �������');
define('_CANNOT_CHANGE_PUBLISH_STATE', '����� ������� ���������� ����������');
define('_CHANGE_SECTION', '�������� ������');

/* administrator components com_installer */
define('_OTHER_COMPONENT_USE_DIR', '������ ��������� ��� ���������� �������');
define('_CANNOT_CREATE_DIR', '���������� ������� �������');
define('_SQL_ERROR', '������ ���������� SQL');
define('_ERROR_MESSAGE', '����� ������');
define('_CANNOT_COPY_PHP_INSTALL', '�� ���� ����������� PHP-���� ���������');
define('_CANNOT_COPY_PHP_REMOVE', '�� ���� ����������� PHP-���� ��������');
define('_ERROR_DELETING', '������ ��������');
define('_IS_PART_OF_CMS', '�������� ��������� ���� Joostina � �� ����� ���� ������.<br />�� ������ ����� ��� � ����������, ���� �� ������ ��� ������������');
define('_DELETE_ERROR', '�������� - ������');
define('_UNINSTALL_ERROR', '������ �������������');
define('_BAD_XML_FILE', '������������ XML-����');
define('_PARAM_FILED_EMPTY', '���� ��������� ������ � ���������� ������� �����');
define('_INSTALLED_COMPONENTS', '������������� ����������');
define('_INSTALLED_COMPONENTS2', '����� �������� ������ �� ����������, ������� �� ������ �������. ����� ���� Joostina ������� ������.');
define('_COMPONENT_NAME', '�������� ����������');
define('_COMPONENT_LINK', '������ ���� ����������');
define('_COMPONENT_AUTHOR_URL', 'URL ������');
define('_OTHER_COMPONENTS_NOT_INSTALLED', '��������� ���������� �� �����������');
define('_COMPONENT_INSTALL', '��������� ����������');
define('_DELETING', '��������');
define('_CANNOT_DEL_LANG_ID', 'id ����� �����, ������� ���������� ������� �����');
define('_GOTO_LANG_MANAGEMENT', '������� � ���������� �������');
define('_INTALL_LANG', '��������� ��������� ������ �����');
define('_NO_FILES_OF_MAMBOTS', '��� ������, ���������� ��� �������');
define('_WRONG_ID', '������������ id �������');
define('_BAD_DIR_NAME_EMPTY', '���� ����� ������, ���������� ������� �����');
define('_INSTALLED_MAMBOTS', '������������� �������');
define('_MAMBOT', '������');
define('_TYPE', '���');
define('_OTHER_MAMBOTS', '��� �� ������� ����, � ��������� �������');
define('_INSTALL_MAMBOT', '��������� �������');
define('_UNKNOWN_CLIENT', '����������� ��� �������');
define('_NO_FILES_MODULES', '�����, ���������� ��� ������, �����������');
define('_ALREADY_EXISTS', '��� ����������');
define('_DELETING_XML_FILE', '�������� XML �����');
define('_INSTALL_MODULE', '������������� �������');
define('_MODULE', '������');
define('_USED_ON', '������������');
define('_NO_OTHER_MODULES', '��������� ������ �� �����������');
define('_MODULE_INSTALL', '��������� ������');
define('_SITE_MODULES', '������ �����');
define('_ADMIN_MODULES', '������ ������ ����������');
define('_CANNOT_DEL_FILE_NO_DIR', '���������� ������� ����, �.�. ������� �� ����������');
define('_WRITEABLE', '�������� ��� ������');
define('_UNWRITEABLE', '���������� ��� ������');
define('_CHOOSE_DIRECTORY_PLEASE', '����������, �������� �������');
define('_ZIP_UPLOAD_AND_INSTALL', '�������� ������ ���������� � ����������� ����������');
define('_PACKAGE_FILE', '���� ������');
define('_UPLOAD_AND_INSTALL', '��������� � ����������');
define('_INSTALL_FROM_DIR', '��������� �� ��������');
define('_INSTALLATION_DIRECTORY', '������� ���������');
define('_CONTINUE', '����������');
define('_NO_INSTALLER', '�� ������ �����������');
define('_CANNOT_INSTALL', '��������� [$element] ����������');
define('_CANNOT_INSTALL_DISABLED_UPLOAD', '��������� ����������, ���� ��������� �������� ������. ����������, ����������� ��������� �� ��������.');
define('_INSTALL_ERROR', '������ ���������');
define('_CANNOT_INSTALL_NO_ZLIB', '��������� ����������, ���� �� ����������� ��������� zlib');
define('_NO_FILE_CHOOSED', '���� �� ������');
define('_ERORR_UPLOADING_EXT', '������ �������� ������ ������');
define('_UPLOADING_ERROR', '�������� ��������');
define('_SUCCESS', '�������');
define('_UNSUCCESS', '��������');
define('_UPLOAD_OF_EXT', '�������� ������ ��������');
define('_DELETE_SUCCESS', '�������� �������');
define('_CANNOT_CHMOD', '�� ���� �������� ����� ������� � ����������� �����');
define('_CANNOT_MOVE_TO_MEDIA', '�� ���� ����������� ��������� ���� � ������� <code>/media</code>');
define('_CANNOT_WRITE_TO_MEDIA', '�������� �������, ��� ��� ������� <code>/media</code> ���������� ��� ������.');
define('_CANNOT_INSTALL_NO_MEDIA', '�������� �������, ��� ��� ������� <code>/media</code> �� ����������');
define('_ERROR_NO_XML_JOOMLA', '������: � ������������ ������ ���������� ����� XML-���� ��������� Joostina.');
define('_ERROR_NO_XML_INSTALL', '������: � ������������ ������ ���������� ����� XML-���� ���������.');
define('_NO_NAME_DEFINED', '�� ���������� ��� �����');
define('_FILE', '����');
define('_NOT_CORRECT_INSTALL_FILE_FOR_JOOMLA', '�� �������� ���������� ������ ��������� Joostina!');
define('_CANNOT_RUN_INSTALL_METHOD', '����� &laquo;install&raquo; �� ����� ���� ������ �������');
define('_CANNOT_RUN_UNINSTALL_METHOD', '����� &laquo;uninstall&raquo; �� ����� ���� ������ �������');
define('_CANNOT_FIND_INSTALL_FILE', '������������ ���� �� ������');
define('_XML_NOT_FOR', '������������ XML-���� - �� ���');
define('_FILE_NOT_EXISTS', '���� �� ����������');
define('_INSTALL_TWICE', '�� ��������� ������ ���������� ���� � �� �� ����������');
define('_ERROR_COPYING_FILE', '������ ����������� �����');

/* administrator components com_jce */
define('_LANG_ALREADY_EXISTS', '���� ��� ����������');
define('_EMPTY_LANG_ID', '������ id �����, ���������� ������� �����');
define('_NO_PLUGIN_FILES', '����� �������� �����������');
define('_BAD_OBJECT_ID', '�������� id �������');
define('_EMPRY_DIR_NAME_CANNOT_DEL_FILE', '���� ����� ������, ���������� ������� ����');
define('_INSTALLED_JCE_PLUGINS', '������������� ������� JCE');
define('_PCLZIP_UNKNOWN_ERROR', '������������ ������');
define('_UNZIP_ERROR', '������ ����������');
define('_JCE_INSTALL_ERROR_NO_XML', '������: ���������� ����� � ������ XML-���� ��������� JCE 1.1.x.');
define('_JCE_INSTALL_ERROR_NO_XML2', '������: ���������� ����� � ������ XML-���� ���������.');
define('_JCE_UNKNOWN_FILENAME', '��� ����� �� ����������');
define('_BAD_JCE_INSTALL_FILE', ' ������������ ���� ��������� JCE ��� ��� ������ ������������.');
define('_WRONG_PLUGIN_VERSION', '������������ ������ �������');
define('_ERROR_CREATING_DIRECTORY', '������ �������� ��������');
define('_INSTALLER_NOT_FIND_ELEMENT', '����������� �� ��������� �������');
define('_NO_INSTALLER_FOR_COMPONENT', '����������� ���������� ��� ��������');
define('_NO_CHOOSED_FILES', '����� �� �������');
define('_ERROR_OF_UPLOAD', '������ ��������');
define('_UPLOADING', '��������');
define('_IS_SUCCESS', '�������');
define('_HAS_ERROR', '����������� �������');
define('_CANNOT_DELETE_LANG_FILE', '������ ������� ������������ �������� �����');
define('_GUEST', '�����');
define('_EDITOR', '��������');
define('_PUBLISHER', '��������');
define('_MANAGER', '��������');
define('_ADMINISTRATOR', '�������������');
define('_SUPER_ADMINISTRATOR', '�����-�������������');
define('_CHANGES_FOR_PLUGIN', '��������� ��� �������');
define('_SUCCESS_SAVE', '�������� ����������');
define('_PLUGIN', '������');
define('_MODULE_IS_EDITING_BY_ADMIN', '������ � ��������� ����� ������������� ������ ���������������');
define('_CHOOSE_PLUGIN_FOR_ACCESS_MANAGEMENT', '��� ���������� ���� ������� ���������� ������� ������');
define('_CHOOSE_PLUGIN_FOR', '�������� ������ ���');
define('_JCE_CONFIG', '������������ JCE');
define('_EDITOR_CONFIG', '������������ ���������');
define('_EXTENSIONS', '����������');
define('_EXTENSION_MANAGEMENT', '���������� ������������');
define('_ICONS_POSITIONS', '������������ �������');
define('_LANG_MANAGER', '�������� �����������');
define('_FILE_NOT_FOUND', '���� �� ������');
define('_PLUGIN_NOT_FOUND', '������ �� ������');
define('_JCE_CONTENT_MAMBOT_NOT_INSTALLED', '������ ��������� JCE �� ����������');
define('_ICONS_POSITIONS_SAVED', '������������ ������� ���������');
define('_MAIN_PAGE', '�������');
define('_INSTALLATION', '���������');
define('_PREVIEW', '������������');
define('_PLUGINS', '�������');

/* administrator components com_jce */
define('_USERS', '������������');
define('_USER_LOGIN_TXT', '��� ������������ (����� )');
define('_LOGGED_IN', '�� �����');
define('_ALLOWED', '��������');
define('_LAST_LOGIN', '��������� ���������');
define('_USER_BLOCK', '����������');
define('_ALLOW', '���������');
define('_DISALLOW', '���������');
define('_ENTER_LOGIN_PLEASE', '�� ������ ������ ��� ������������ ��� ����� �� ����');
define('_BAD_USER_LOGIN', '���� ��� ��� ����� �������� ������������ ������� ��� ������� ��������.');
define('_ENTER_EMAIL_PLEASE', '�� ������ ������ ����� e-mail');
define('_ENTER_GROUP_PLEASE', '�� ������ ��������� ������������ ������ �������');
define('_BAD_PASSWORD', '������ ������������');
define('_BAD_GROUP_1', '����������, �������� ������ ������. ������ ���� &laquo;Public Front-end&raquo; �������� ������');
define('_BAD_GROUP_2', '����������, �������� ������ ������. ������ ���� &laquo;Public Back-end&raquo; �������� ������');
define('_USER_INFO', '���������� � ������������');
define('_NEW_PASSWORD', '����� ������');
define('_REPEAT_PASSWORD', '�������� ������');
define('_BLOCK_USER', '����������� ������������');
define('_RECEIVE_EMAILS', '�������� ��������� ��������� �� e-mail');
define('_REGISTRATION_DATE', '���� �����������');
define('_CONTACT_INFO', '���������� ����������');
define('_NO_USER_CONTACTS', '� ����� ������������ ��� ���������� ����������:<br />��� ������������ �������� &laquo;���������� &rarr; �������� &rarr; ���������� ����������&raquo;');
define('_FULL_NAME', '������ ���');
define('_CHANGE_CONTACT_INFO', '�������� ���������� ����������');
define('_CONTACT_INFO_PATH_URL', '���������� &rarr; �������� &rarr; ���������� ����������');
define('_RESTRICT_FUNCTION', '���������������� ����������');
define('_NO_RIGHT_TO_CHANGE_GROUP', '�� �� ������ �������� ��� ������ �������������. ��� ����� ������� ������ ������� ������������� �����');
define('_NO_RIGHT_TO_USER_CREATION', '�� �� ������ ������� ������������ � ���� ������� �������. ��� ����� ������� ������ ������� ������������� �����');
define('_PROFILE_SAVE_SUCCESS', '������� ��������� ��������� ������� ������������');
define('_CANNOT_DEL_ONE_SUPER_ADMIN', '�� �� ������ ������� ����� �������� ��������������, �.�. �� ������������ ������� ������������� �����');
define('_CHOOSE_USER_TO', '�������� ������������ ���');
define('_PLEASE_CHOOSE_USER', '����������, �������� ������������');
define('_CANNOT_DISABLE_SUPER_ADMIN', '�� �� ������ ��������� �������� ��������������');
define('_THIS_CAN_DO_HIGHLEVEL_USERS', '��� ����� ������ ������ ������������ � ����� ������� ������� �������');
define('_DISABLE', '���������');

/* administrator components com_typedcontent */
define('_ACCESS', '������');
define('_LINKS_COUNT', '������');
define('_DATE_PUBL_END', '����� ���� ����������');
define('_CHANGE_STATIC_CONTENT', '�������� ��������� ����������');
define('_WANT_TO_RESET_HITCOUNT', '�� ������������� ������ �������� ������� ����������?\n����� ������������� ��������� ����� ����������� ����� �������.');
define('_CONTENT_OBJECT_MUST_HAVE_NAME', '������ ����������� ������ ����� ��������');
define('_CONTENT_INFO', '���������� � ����������');
define('_O_STATE', '���������');
define('_CHANGE_AUTHOR', '�������� ������');
define('_GALLERY_IMAGES', '����������� �������');
define('_CONTENT_IMAGES', '����������� �����������');
define('_EDITING_SELECTED_IMAGE', '�������������� ���������� �����������');
define('_ALTERNATIVE_TEXT', '�������������� �����');
define('_MENU_LINK_3', '����� ��������� ����� ���� ���� &laquo;������ - ��������� ����������&raquo;, ������� ����������� � ��������� �� ������ ����');
define('_EXISTED_MENU_LINKS', '������������ ����� � ����');
define('_CONTENT_SAVED', '���������� ���������');
define('_CHOOSE_OBJECT_FOR', '�������� ������ ���');
define('_O_SECCESS_PUBLISHED', '�������� ������� ������������');
define('_O_SUCCESS_UNPUBLISHED', '�������� ������� ������');
define('_HIT_COUNT_RESETTED', '������� ���������� ������� �������');
define('_SUCCESS_MENU_CR_1', '(������ - ��������� ����������) � ����');

/* administrator components com_trash */
define('_TRASH', '�������');
define('_OBJECT_DELETION', '�������� ��������');
define('_OBJECTS_TO_DELETE', '��������� �������');
define('_THIS_ACTION_WILL_DELETE_O_FOREVER', '* ��� �������� <strong class="red">�������� ������</strong><br />������������� ������� �� ���� ������*');
define('_REALLY_DELETE_OBJECTS', '�� ������������� ������ ������� ������������� �������?\n��� �������� �������� ������ ������������� ������� �� ���� ������.');
define('_OBJECT_RESTORE', '�������������� ��������');
define('_OBECTS_TO_RESTORE', '����������������� �������');
define('_THIS_ACTION_WILL_RESTORE_O_FOREVER', '* ��� �������� <strong style="color:#FF0000;">�����������</strong> ��� �������,<br />����� ��� ����� ���������� �� ������� �����, ��� ���������������� �������*');
define('_REALLY_RESTORE_OBJECTS', '�� ������������� ������ ������������ ������������� �������?');
define('_RESTORE', '������������');
define('_CONTENT_ITEMS', '������� �����������');
define('_MENU_ITEMS', '������ ����');
define('_OBJECTS_DELETED', '������(�) ������� ������(�)');
define('_SUCCESS_DELETION', '������� �������');
define('_OBJECTS_RESTORED', '������(��) ������� ������������(�)');
define('_CLEAR_TRASH', '�������� �������');

/* administrator components com_templates */
define('_UNSUCCESS_OPERATION_NO_TEMPLATE', '�������� ��������: �� ��������� ������.');
define('_UNSUCCESS_OPERATION_EMPTY_FILE', '�������� ��������: ������ ����������.');
define('_UNSUCCES_OPERAION', '�������� ��������');
define('_CANNOT_OPEN_FILE_DOR_WRITE', '������ �������� ����� ��� ������.');
define('_NO_PREVIEW', '������������ ����������');
define('_TEMPLATES', '�������');
define('_TEMPLATE_PREVIEW', '������������ �������');
define('_DEFAULT', '�� ���������');
define('_ASSIGNED_TO', '��������');
define('_MAKE_UNWRITEABLE_AFTER_SAVING', '������� ����������� ��� ������ ����� ����������');
define('_IGNORE_WRITE_PROTECTION_WHEN_SAVE', '��� ���������� ������������ ������ �� ������');
define('_CHANGE_EDITOR', '�������� ��������');
define('_CSS_TEMPLATE_EDITOR', '�������� CSS �������');
define('_ASSGIN_TEMPLATE_TO_MENU', '���������� ������� ��� ������� ����');
define('_MODULES_POSITION', '������� �������');
define('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', '� ���������� ������������ ������� ������������� ������ �������:');
define('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', '���� ������ ������������ � �� ����� ���� ������');
define('_UNSUCCES_OPERATION_CANNOT_OPEN', '�������� ��������: ���������� �������');
define('_POSITIONS_SAVED', '������� ���������');

/* menubar.html.old.php + menubar.html.php */
define('_BUTTON', '������');
define('_PLEASE_CHOOSE_ELEMENT', '����������, �������� �������.');
define('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', '����������, �������� �� ������ ������� ��� �� ���������� �� �����');
define('_PLEASE_CHOOSE_ELEMENT_TO_MAKE_DEFAULT', '����������, �������� ������, ����� ��������� ��� �� ���������');
define('_ASSIGN', '���������');
define('_PLEASE_CHOOSE_ELEMENT_TO_UNPUBLISH', '��� ������ ���������� �������, ������� �������� ���');
define('_TO_ARCHIVE', '� �����');
define('_FROM_ARCHIVE', '�� ������');
define('_PLEASE_CHOOSE_ELEMENT_TO_ARCHIVE', '����������, �������� �� ������ ������� ��� �� ���������');
define('_PLEASE_CHOOSE_ELEMENT_TO_UNARCHIVE', '�������� ������ ��� �������������� ��� �� ������');
define('_CHANGE', '��������');
define('_PLEASE_CHOOSE_ELEMENT_TO_EDIT', '�������� ������ �� ������ ��� ��� ��������������');
define('_EDIT_HTML', '���. HTML');
define('_EDIT_CSS', '���. CSS');
define('_PLEASE_CHOOSE_ELEMENT_TO_DELETE', '�������� ������ �� ������ ��� ��� ��������');
define('_REALLY_WANT_TO_DELETE_OBJECTS', '�� ������������� ������ ������� ��������� �������?');
define('_REMOVE_TO_TRASH', '�&nbsp;�������');
define('_PLEASE_CHOOSE_ELEMENT_TO_TRASH', '�������� ������ �� ������ ��� ����������� ��� � �������');
define('_PLEASE_CHOOSE_ELEMENT_TO_ASSIGN', '����������, ��� ���������� ������� �������� ���');
define('_HELP', '������');

/* administrator components com_languages */
define('_LANGUAGE_PACKS', '�������� ������');
define('_E_LANGUAGE', '����');
define('_LANGUAGE_EDITOR', '�������� �����');
define('_LANGUAGE_SAVED', '���� ������� �������');
define('_YOU_CANNOT_DELETE_LANG_FILE', '�� �� ������ ������� �������������� �������� ����');
define('_UNSUCCESS_OPERATION_NO_LANGUAGE', '�������� ��������: �� ��������� ����.');

/* administrator components com_linkeditor */
define('_COMPONENTS_MENU_EDITOR', '�������������� ���� �����������');
define('_ICON', '������');
define('_KERNEL', '����');
define('_COMPONENTS_MENU_EDIT', '�������������� ������ ���� �����������');
define('_COMPONENTS_MENU_NEW', '�������� ������ ������ ���� �����������');
define('_COMPONENT_IS_A_PART_OF_CMS', '<strong>��������:</strong> ���� ��������� �������� ������ ����, ��� ������������ ���������� �� �������� �������� � ������ �������.');
define('_MENU_NAME_REQUIRED', '�������� ������ ����. ����������� ��� ����������.');
define('_MENU_ITEM_ICON', '������ ������ ����');
define('_MENU_ITEM_DESCRIPTION', '�������� ������ ����.');
define('_MENU_ITEM_LINK', '������ �� ���������. ���� ����� ���� �� �������� ������� �� ���� ����������� ��� ����������.');
define('_PARENT_MENU_ITEM', '������������ �����');
define('_PARENT_MENU_ITEM2', '������������ ����� ����. ����������� ����� 1 ������� �����������.');
define('_THIS_FILEDS_REQUIRED', '<strong class="red">*</strong> ������ ����������� ��� ����������');
define('_MENU_ITEM_DELETED', '����� ���� �����');
define('_FIRST_LEVEL', '������ �������');

/* administrator components com_mambots */
define('_MAMBOTS', '�������');
define('_MAMBOT_NAME', '�������� �������');
define('_NO_MAMBOT_NAME', '������ ������ ����� ��������');
define('_NO_MAMBOT_FILENAME', '������ ������ ����� ��� �����');
define('_SITE_MAMBOT', '������ �����');
define('_MAMBOT_DETAILS', '������ �������');
define('_USE_THIS_MAMBOT_FILE', '������������ ����');
define('_MAMBOT_ORDER', '����� �� �������');
define('_NO_MAMBOT_PARAMS', '<em>��������� �����������</em>');
define('_NEW_MAMBOTS_IN_THE_END', '����� ������� �� ��������� ������������� � �����. ������� ������������ ����� ���� ������� ������ ����� ���������� ����� �������.');
define('_CHOOSE_MAMBOT_FOR', '�������� ������ ���');

/* administrator components com_massmail */
define('_PLEASE_ENTER_SUBJECT', '����������, ������� ����');
define('_PLEASE_CHOOSE_GROUP', '����������, �������� ������');
define('_PLEASE_ENTER_MESSAGE', '����������, ��������� ���������');
define('_MASSMAIL_TTILE', '�������� �����');
define('_SEND_TO_SUBGROUPS', '��������� ����������� �������');
define('_SEND_IN_HTML', '��������� � HTML-�������');
define('_MAIL_SUBJECT', '����');
define('_MESSAGE', '���������');
define('_ALL_USER_GROUPS', '- ��� ������ ������������� -');
define('_PLEASE_FILL_FORM', '����������, ��������� ��������� �����');
define('_MESSAGE_SENDED_TO_USERS', 'E-mail ���������� ������������(��) - ');

/* administrator components com_menumanager */
define('_MENU_MANAGER', '���������� ����');
define('_MENU_ITEMS_UNPUBLISHED', '������');
define('_MENU_MUDULES', '�������');
define('_CHANGE_MENU_NAME', '�������� �������� ����');
define('_CHANGE_MENU_ITEMS', '�������� ������ ����');
define('_PLEASE_ENTER_MENU_NAME', '����������, ������� �������� ����');
define('_NO_QUOTES_IN_NAME', '�������� ���� �� ������ ��������� &frasl;, &prime;');
define('_PLEASE_ENTER_MENU_MODULE_NAME', '����������, ������� �������� ������ ����');
define('_MENU_INFO', '���������� � ����');
define('_MENU_NAME_TIP', '��� ��� ���� ������������ �������� ��� ��� ������������� - ��� ������ ���� ���������. ������������� ������ ��� ��� ��������');
define('_MODULE_TITLE_TIP', '��������� mod_mainmenu ��������� ��� ����������� ����� ����');
define('_MODULE_TITLE', '��������� ������');
define('_NEW_MENU_ITEM_TIP', '* ����� ������ ���� ����� ������������� ������ ����� ����, ��� �� ������� ���������, � ����� ������� ������ "���������". *<br /><br />�������������� ���������� ���������� ������ ����� �������� � ������� &laquo;���������� �������� [����]&raquo;: ������ &rarr; ������ �����');
define('_REMOVE_MENU', '������� ����');
define('_MODULES_TO_REMOVE', '������(�) ��� ��������');
define('_MENU_ITEMS_TO_REMOVE', '��������� ������ ����');
define('_THIS_OP_REMOVES_MENU', '* ��� �������� <strong class="red">�������</strong> ��� ����,<br />��� ��� ������ � ������(�), �����������(��) ���(��). *');
define('_REALLY_DELETE_MENU', '�� �������, ��� ������ ������� ��� ����?\n���������� �������� ����, ��� ������� � �������.');
define('_PLEASE_ENTER_MENY_COPY_NAME', '����������, ������� ��� ��� ����� ����');
define('_PLEASE_ENTER_MODULE_NAME', '����������, ������� ��� ��� ������ ������');
define('_MENU_COPYING', '����������� ����');
define('_NEW_MENU_NAME', '��� ������ ����');
define('_NEW_MODULE_NAME', '��� ������ ������');
define('_MENU_TO_COPY', '���������� ����');
define('_MENU_ITEMS_TO_COPY', '���������� ������ ����');
define('_CANNOT_RENAME_MAINMENU', '�� �� ������ ������������� ���� &laquo;mainmenu&raquo;, �.�.  ��� ������� ���������� ���������������� Joostina');
define('_MENU_ALREADY_EXISTS', '���� � ����� ������ ��� ����������. �� ������ ������ ���������� ��� ����');
define('_NEW_MENU_CREATED', '������� ����� ����');
define('_MENU_ITEMS_AND_MODULES_UPDATED', '������ ���� � ������ ���������');
define('_MENU_DELETED', '���� �������');
define('_NEW_MENU', '����� ����');
define('_NEW_MENU_MODULE', '����� ������ ����');

/* administrator components com_menus */
define('_MODULE_IS_EDITING_MY_ADMIN', '������ ��� ������������� ������ ���������������');
define('_LINK_MUST_HAVE_NAME', '������ ������ ����� ���');
define('_CHOOSE_COMPONENT_FOR_LINK', '�� ������ ������� ��������� ��� �������� ������ �� ����');
define('_MENU_ITEM_COMPONENT_LINK', '����� ����: ������ - ������ ����������');
define('_LINK_TITLE', 'title ������');
define('_LINK_COMPONENT', '��������� ��� ������');
define('_LINK_TARGET', '��� ������� ������� �');
define('_OBJECT_MUST_HAVE_NAME', '������ ������ ����� ���');
define('_CHOOSE_COMPONENT', '�������� ���������');
define('_MENU_ITEM_COMPONENT', '����� ����: ���������');
define('_MENU_PARAMS_AFTER_SAVE', '������ ���������� ����� �������� ������ ����� ���������� ������ ����');
define('_MENU_ITEM_TABLE_CONTACT_CATEGORY', '����� ����: ������� - �������� ���������');
define('_CATEGORY_TITLE_IF_FILED_IS_EMPTY', '���� ���� ����� ��������� ������, �� ������������� ����� ������������ �������� ���������');
define('_CHOOSE_CONTACT_FOR_LINK', '��� �������� ������ ���������� ������� �������');
define('_MENU_ITEM_CONTACT_OBJECT', '����� ����: ������ - ������ ��������');
define('_MENU_ITEM_BLOG_CATEGORY_ARCHIVE', '����� ����: ���� - ���������� ��������� � ������');
define('_MENU_ITEM_BLOG_SECTION_ARCHIVE', '����� ����: ���� - ���������� ������� � ������');
define('_SECTION_TITLE_IF_FILED_IS_EMPTY', '���� ���� ����� ��������� ������, �� ������������� ����� ������������ �������� �������');
define('_MENU_ITEM_SAVED', '����� ���� ��������');
define('_MENU_ITEM_BLOGCATEGORY', '����� ����: ���� - ���������� ���������');
define('_YOU_CAN_CHOOSE_SEVERAL_CATEGORIES', '�� ������ ������� ��������� ���������');
define('_MENU_ITEM_BLOG_CONTENT_CATEGORY', '����� ����: ���� - ���������� �������');
define('_YOU_CAN_CHOOSE_SEVERAL_SECTIONS', '�� ������ ������� ��������� ��������');
define('_MENU_ITEM_TABLE_CONTENT_CATEGORY', '����� ����: ������� - ���������� ���������');
define('_CHANGE_CONTENT_ITEM', '�������� ������ �����������');
define('_CONTENT_ITEM_TO_LINK_TO', '�������� ������ ��� �����');
define('_MENU_ITEM_CONTENT_ITEM', '����� ����: ������ - ������ �����������');
define('_CONTENT_TO_LINK_TO', '���������� ��� �����');
define('_MENU_ITEM_TABLE_CONTENT_SECTION', '����� ����: ������� - ���������� �������');
define('_CHOOSE_OBJECT_TO_LINK_TO', '�� ������ ������� ������ ��� ����� � ���');
define('_MENU_ITEM_STATIC_CONTENT', '����� ����: ������ - ��������� ����������');
define('_MENU_ITEM_CATEGORY_NEWSFEEDS', '����� ����: ������� - ����� �������� �� ���������');
define('_CHOOSE_NEWSFEED_TO_LINK', '�� ������ ������� ����� �������� ��� ����� � ������� ����');
define('_MENU_ITEM_NEWSFEED', '����� ����: ������ - ����� ��������');
define('_LINKED_TO_NEWSFEED', '������� � ������');
define('_MENU_ITEM_SEPARATOR', '����� ����: �����������/�����������');
define('_ENTER_URL_PLEASE', '�� ������ ������ URL.');
define('_MENU_ITEM_URL', '����� ����: ������ - URL');
define('_MENU_ITEM_WEBLINKS_CATEGORY', '����� ����: ������� - Web-������ ���������');
define('_MENU_ITEM_WRAPPER', '����� ����: Wrapper');
define('_WRAPPER_LINK', '������ Wrapper&prime;�');
define('_MAXIMUM_LEVELS', '����������� �������');
define('_NOTE_MENU_ITEMS1', '* �������� ��������, ��� ��������� ������ ���� ������ � ��������� �����, �� ��� ��������� � ������ ���� ����.');
define('_MENU_ITEMS_OTHER', '������');
define('_MENU_ITEMS_SEND', '��������');
define('_COMPONENTS', '����������');
define('_LINKS', '������');
define('_MOVE_MENU_ITEMS', '����������� ������� ����');
define('_MENU_ITEMS_TO_MOVE', '������������ ������ ����');
define('_COPY_MENU_ITEMS', '����������� ������� ����');
define('_COPY_MENU_ITEMS_TO', '���������� � ����');
define('_CHANGE_THIS_NEWSFEED', '�������� ��� ����� ��������');
define('_CHANGE_THIS_CONTACT', '�������� ���� �������');
define('_CHANGE_THIS_CONTENT', '�������� ��� ����������');
define('_CHANGE_THIS_STATIC_CONTENT', '�������� ��� ��������� ����������');
define('_MENU_NEXT', '�����');
define('_MENU_BACK', '�����');

/* administrator components com_messages */
define('_PRIVATE_MESSAGES', '������ ���������');
define('_MAIL_FROM', '��');
define('_MAIL_READED', '���������');
define('_MAIL_NOT_READED', '�� ���������');
define('_PRIVATE_MESSAGES_SETTINGS', '��������� ������ ���������');
define('_BLOCK_INCOMING_MAIL', '������������� �������� �����');
define('_SEND_NEW_MESSAGES', '�������� ��� ����� ���������');
define('_AUTO_PURGE_MESSAGES', '�������������� ������� ���������');
define('_AUTO_PURGE_MESSAGES2', '������');
define('_AUTO_PURGE_MESSAGES3', '����');
define('_VIEW_PRIVATE_MESSAGES', '�������� ������������ ���������');
define('_MESSAGE_SEND_DATE', '����������');
define('_PLEASE_ENTER_MAIL_SUBJECT', '�� ������ ������ �������� ����');
define('_PLEASE_ENTER_MESSAGE_BODY', '�� ������ ������ ����� ���������');
define('_PLEASE_ENTER_USER', '�� ������ ������� ����������');
define('_NEW_PERSONAL_MESSAGE', '����� ������������ ���������');
define('_MAIL_TO', '����');
define('_MAIL_ANSWER', '��������');

/* administrator components com_syndicate */
define('_NEWS_EXPORT_SETUP', '��������� �������� ��������');
define('_RSS_EXPORT', 'RSS �������');
define('_RSS_EXPORT_SETUP', '���������� ����������� �������� ��������');

/* administrator components com_statistics */
define('_STAT_BROWSERS_AND_OSES', '���������� �� ���������, �� � �������');
define('_BROWSERS', '��������');
define('_DOMAINS', '������');
define('_DOMAIN', '�����');
define('_PAGES_HITS', '���������� ��������� �������');
define('_CONTENT_TITLE', '��������� �����������');
define('_SEARCH_QUERIES', '��������� �������');
define('_LOG_SEARCH_QUERIES', '���� ������');
define('_DISALLOWED', '���������');
define('_LOG_LOW_PERFOMANCE', '��������� ����� ��������� ����� ����� ������ ������� ������������������ ����� ��� ������� ������������');
define('_HIDE_SEARCH_RESULTS', '������ ���������� ������');
define('_SHOW_SEARCH_RESULTS', '�������� ���������� ������');
define('_SEARCH_QUERY_TEXT', '����� ������');
define('_SEARCH_QUERY_COUNT', '��������');
define('_SHOW_RESULTS', '������ �����������');

/* administrator components com_quickicons */
define('_QUICK_BUTTONS', '������ �������� �������');
define('_DISPLAY_METHOD', '�����������');
define('_DISPLAY_ONLY_TEXT', '������ �����');
define('_DISPLAY_ONLY_ICON', '������ ������');
define('_DISPLAY_TEXT_AND_ICON', '������ � �����');
define('_PRESS_TO_EDIT_ELEMENT', '������� ��� �������������� ��������');
define('_EDIT_BUTTON', '�������������� ������');
define('_BUTTON_TEXT', '����� ������');
define('_BUTTON_TITLE', '���������');
define('_BUTTON_TITLE_TIP', '<strong>�����������</strong><br />����� �� ������ ���������� ����� ��� ����������� ���������.<br />��� �������� ����� ����� ��������� ���� �� ������� ����������� ������ ��������!');
define('_BUTTON_LINK_TIP', '������ ��� ������ ����� ��� ����������.<br />��� ����������� ������ ������� ������ ������ ���� ��������:<br />index2.php?option=com_joomlastats&task=stats [joomlastats - ���������, &task=stats ����� ����������� ������� ����������].<br />������� ������ ������ ���� <strong>����������� ��������</strong> (��������: http://www�.)!');
define('_BUTTON_LINK_IN_NEW_WINDOW', '� ����� ����');
define('_BUTTON_LINK_IN_NEW_WINDOW_TIP', '������ ����� ������� � ����� ����');
define('_BUTTON_ORDER', '����������� �����');
define('_BUTTONS_TAB_GENERAL', '�����');
define('_BUTTONS_TAB_DISPLAY', '�����������');
define('_DISPLAY_BUTTON', '����������');
define('_PRESS_TO_CHOOSE_ICON', '������� ��� ������ �������� (��������� � ����� ����)');
define('_CHOOSE_ICON', '������� ��������');
define('_CHOOSE_ICON_TIP', '����������, �������� �������� ��� ���� ������. ���� ������ ��������� ����������� �������� ��� ������, �� ��� ������ ���� ��������� � ../administrator/images - ../images ../images/icons');
define('_PLEASE_ENTER_NUTTON_LINK', '��������� ��������');
define('_PLEASE_ENTER_BUTTON_TEXT', '����������, ��������� ���� �����');
define('_BUTTON_ERROR_PUBLISHING', '������ ����������');
define('_BUTTON_ERROR_UNPUBLISHING', '������ �������');
define('_BUTTONS_DELETED', '������ ������� �������');
define('_CHANGE_QUICK_BUTTONS', '�������� ������ �������� �������');

/* administrator components com_sections */
define('_SECTION_CHANGES_SAVED', '��������� ������� ���������');
define('_CONTENT_SECTIONS', '������� �����������');
define('_SECTION_NAME', '�������� �������');
define('_SECTION_CATEGORIES', '���������');
define('_SECTION_CONTENT_ITEMS', '��������');
define('_SECTION_CONTENT_ITEMS_IN_TRASH', '� �������');
define('_VIEW_SECTION_CATEGORIES', '�������� ��������� �������');
define('_VIEW_SECTION_CONTENT', '�������� ����������� �������');
define('_NEW_SECTION_MASK', '����� ������');
define('_CHOOSE_MENU_ITEM_NAME', '����������, ������� ��� ��� ����� ������ ����');
define('_ENTER_SECTION_NAME', '������ ������ ����� ��������');
define('_ENTER_SECTION_TITLE', '������ ������ ����� ���������');
define('_SECTION_ALREADY_EXISTS', '��� ������� ������ � ����� ���������. ����������, �������� �������� �������.');
define('_SECTION_DETAILS', '������ �������');
define('_SECTION_USED_IN', '������������ �');
define('_MENU_SHORT_NAME', '�������� ��� ��� ����');
define('_SECTION_NAME_OF_CATEGORY', '���������');
define('_SECTION_NAME_OF_SECTION', '�������');
define('_SECTION_NAME_TIP', '������� ��������, ������������ � ����������');
define('_SECTION_NEW_MENU_LINK', '��� ������� ������� ����� ����� � ��������� ���� ����');
define('_CHOOSE_MENU', '�������� ����');
define('_CHOOSE_MENU_TYPE', '�������� ��� ����');
define('_SECTION_COPYING', '����������� �������');
define('_SECTION_COPY_NAME', '�������� ����� �������');
define('_SECTION_COPY_DESCRIPTION', '�� ����� ��������� ������ �����<br />����������� ������������� ���������<br />� ��� ������������� �������<br />����������� ���������.');
define('_MASS_CONTENT_ADD', '�������� ����������');
define('_NEW_CAT_SECTION_ON_NEW_LINE', '������ ����� ���������/������ ������ ���������� � ����� ������');
define('_MASS_ADD_AS', '�������� ���');
define('_SECTIONS', '�������');
define('_CATEGORIES', '���������');
define('_CATEGORIES_WILL_BE_IN_SECTION', '��������� ���� ������������ �������');
define('_CONTENT_WILL_BE_IN_CATEGORY', '���������� ����� ������������ ���������');
define('_ADD_SECTIONS_RESULT', '��������� ���������� ��������');
define('_ADD_CATEGORIES_RESULT', '��������� ���������� ���������');
define('_ADD_CONTENT_RESULT', '��������� ���������� �����������');
define('_ERROR_WHEN_ADDING', '��������� ������ ��� ����������');
define('_SECTION_IS_BEING_EDITED_BY_ADMIN', '������ � ��������� ����� ������������� ������ ���������������');
define('_SECTION_TABLE', '������� �������');
define('_SECTION_BLOG', '���� �������');
define('_SECTION_BLOG_ARCHIVE', '���� ������ �������');
define('_SECTION_SAVED', '������ ��������');
define('_CHOOSE_SECTION_TO_DELETE', '�������� ������ ��� ��������');
define('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', '������� �� ����� ���� �������, �.�. �������� ���������');
define('_CHOOSE_SECTION_FOR', '�������� ������ ���');
define('_CANNOT_PUBLISH_EMPTY_SECTION', '���������� ������������ ������ ������');
define('_SECTION_CONTENT_COPYED', '��������� ���������� ������� ���� ����������� � ������');
define('_MENU_MASS_ADD', '�������� ���');

/* administrator components com_poll */
define('_POLL', '�����');
define('_POLLS', '������');
define('_POLL_HEADER', '��������� ������');
define('_POLL_LAG', '��������');
define('_CHANGE_POLL', '�������� �����');
define('_ENTER_POLL_NAME', '����� ������ ����� ��������');
define('_ENTER_POLL_LAG', '�������� ����� �������� �� ������ ���� �������');
define('_POLL_DETAILS', '������ ������');
define('_POLL_LAG_QUESIONS', '�������� ����� ��������');
define('_POLL_LAG_QUESIONS2', '������ ����� ��������� �������');
define('_POLL_OPTION', '������� ������');
define('_POLL_OPTIONS', '�������� �������');
define('_POLL_HITS', '�������');
define('_POLL_GRAFIC', '������');
define('_POLL_IS_BEING_EDITED_BY_ADMIN', '����� � ��������� ����� ������������� ������ ���������������');

/* administrator components com_newsfeeds */
define('_NEWSFEEDS_MANAGEMENT', '���������� ������� ��������');
define('_NEWSFEED_TITLE', '����� ��������');
define('_NEWSFEED_ON_SITE', '�� �����');
define('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', '���-�� ������');
define('_NEWSFEED_CACHE_TIME', '����� ���� (������)');
define('_CHANGE_NEWSFEED', '�������� ����� ��������');
define('_PLEASE_ENTER_NEWSFEED_NAME', '����������, ������� �������� �����');
define('_PLEASE_ENTER_NEWSFEED_LINK', '����������, ������� ������ ����� ��������');
define('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', '����������, ������� ���������� ������ ��� �����������');
define('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', '����������, ������� ����� ���������� ����');
define('_NEWSFEED_LINK', '������');
define('_NEWSFEED_DECODE_FROM_UTF', '�������������� �� UTF-8');

/* administrator components com_modules */
define('_ALL_MODULE_CHANGES_SAVED', '��� ��������� ������ ������� ���������');
define('_MODULES', '������');
define('_MODULE_NAME', '�������� ������');
define('_MODULE_POSITION', '�������');
define('_ASSIGN_TO_URL', '�������� � URL');
define('_ASSIGN_TO_URL_TIP', '������:<br /><br />!option=com_content&task=view&id=4<br />option=com_content&task=view<br />option=com_content&task=blogcategory&id>4<br /><br />! - �� ���� ��������� ������ �� ������������<br />= < > != �����, ������, ������, �� ����� - ����� ��������� ��� �������� ����������');
define('_MODULE_PAGES', '��������');
define('_MODULE_PAGES_SOME', '���������');
define('_SHOW_TITLE', '���������� ���������');
define('_MODULE_ORDER', '������� ������');
define('_MODULE_PAGE_MENU_ITEMS', '��������/������ ����');
define('_MODULE_USER_CONTENT', '���������������� ���/���������� ������');
define('_MODULE_COPIED', '������ ����������');
define('_CANNOT_DELETE_MOD_MAINMENU', '�� �� ������ ������� ������ mod_mainmenu, ������������ ��� &laquo;mainmenu&raquo;, �.�. ��� ���� ����');
define('_CANNOT_DELETE_MODULES', '������ �� ����� ���� �������, �.�. ��� ����� ���� ������ ����������������, ��� ��� ������ Joostina.');
define('_PREVIEW_ONLY_CREATED_MODULES', '�� ������ ����������� ������ &laquo;���������&raquo; ������');

/* administrator components com_modules */
define('_WEBLINKS_MANAGEMENT', '���������� web-��������');
define('_WEBLINKS_HITS', '���������');
define('_CHANGE_WEBLINK', '�������� web-������');
define('_ENTER_WEBLINK_TITLE', 'Web-������ ������ ����� ���������');
define('_PLEASE_ENTER_URL', '�� ������ ������ URL');
define('_WEBLINK_URL', 'Web-������');
define('_WEBLINK_NAME', '��������');

/* administrator components com_jwmmxtd */
define('_RENAME', '�������������');
define('_JWMM_DIRECTORIES', '���������');
define('_JWMM_FILES', '������');
define('_JWMM_MOVE', '�����������');
define('_JWMM_BYTES', '����');
define('_JWMM_KBYTES', '��');
define('_JWMM_MBYTES', '��');
define('_JWMM_DELETE_FILE_CONFIRM', '������� ����');
define('_CLICK_TO_PREVIEW', '������� ��� ���������');
define('_JWMM_FILESIZE', '������');
define('_WIDTH', '������');
define('_HEIGHT', '������');
define('_UNPACK', '�����������');
define('_JWMM_VIDEO_FILE', '����� ����');
define('_JWMM_HACK_ATTEMPT', '������� �������');
define('_JWMM_DIRECTORY_NOT_EMPTY', '������� �� ������. ����������, ������� ������� ���������� ������ ��������!');
define('_JWMM_DELETE_CATALOG', '������� �������');
define('_JWMM_SAFE_MODE_WARNING', '��� �������������� ��������� SAFE MODE �������� �������� � ��������� ���������');
define('_JWMM_CATALOG_CREATED', '������ �������');
define('_JWMM_CATALOG_NOT_CREATED', '������ �� �������');
define('_JWMM_FILE_DELETED', '���� ������� �����');
define('_JWMM_FILE_NOT_DELETED', '���� �� �����');
define('_JWMM_DIRECTORY_DELETED', '������� �����');
define('_JWMM_DIRECTORY_NOT_DELETED', '������� �� �����');
define('_JWMM_RENAMED', '�������������');
define('_JWMM_NOT_RENAMED', '�� �������������');
define('_JWMM_COPIED', '�����������');
define('_JWMM_NOT_COPIED', '�� �����������');
define('_JWMM_FILE_MOVED', '���� ���������');
define('_JWMM_FILE_NOT_MOVED', '���� �� ���������');
define('_TMP_DIR_CLEANED', '��������� ������� ��������� ������');
define('_TMP_DIR_NOT_CLEANED', '��������� ������� �� ������');
define('_FILES_UNPACKED', '����(��) �����������');
define('_ERROR_WHEN_UNPACKING', '������ ����������');
define('_FILE_IS_NOT_A_ZIP', '���� �� �������� ���������� zip �������');
define('_FILE_NOT_EXIST', '���� �� ����������');
define('_IMAGE_SAVED_AS', '����������������� ����������� ��������� ���');
define('_IMAGE_NOT_SAVED', '����������� �� ���������');
define('_FILES_NOT_UPLOADED', '����(�) �� ��������� �� ������');
define('_FILES_UPLOADED', '����� ���������');
define('_DIRECTORIES', '��������');
define('_JWMM_FILE_NAME_WARNING', '����������, �� ����������� � ��������� ������� � �����������');
define('_JWMM_MEDIA_MANAGER', '����� ��������');
define('_JWMM_CREATE_DIRECTORY', '������� �������');
define('_UPLOAD_FILE', '��������� ����');
define('_JWMM_FILE_PATH', '��������������');
define('_JWMM_UP_TO_DIRECTORY', '������� �� ������� ����');
define('_JWMM_RENAMING', '��������������');
define('_JWMM_NEW_NAME', '����� ��� (������� ����������!)');
define('_CHOOSE_DIR_TO_COPY', '�������� ������� ��� �����������');
define('_JWMM_COPY_TO', '���������� �');
define('_CHOOSE_DIR_TO_MOVE', '�������� ������� ��� �����������');
define('_JWMM_MOVE_TO', '����������� �');
define('_CHOOSE_DIR_TO_UNPACK', '�������� ������� ��� ����������');
define('_DERICTORY_TO_UNPACK', '������� ����������');
define('_NUMBER_OF_IMAGES_IN_TMP_DIR', '����� ����������� �� ��������� ��������');
define('_CLEAR_DIRECTORY', '�������� �������');
define('_JWMM_ERROR_EDIT_FILE', '������ ��� ��������� �����');
define('_JWMM_EDIT_IMAGE', '�������������� �����������');
define('_JWMM_IMAGE_RESIZE', '���������� �����������');
define('_JWMM_IMAGE_CROP', '��������');
define('_JWMM_IMAGE_SIZE', '�������');
define('_JWMM_X_Y_POSITION', 'X � Y ����������');
define('_JWMM_BY_HEIGHT', '���������');
define('_JWMM_BY_WIDTH', '�����������');
define('_JWMM_CROP_TOP', '������');
define('_JWMM_CROP_LEFT', '�����');
define('_JWMM_CROP_RIGHT', '������');
define('_JWMM_CROP_BOTTOM', '�����');
define('_JWMM_ROTATION', '�������');
define('_JWMM_CHOOSE', '-�����-');
define('_JWMM_MIRROR', '���������');
define('_JWMM_VERICAL', '���������');
define('_JWMM_HORIZONTAL', '�����������');
define('_JWMM_GRADIENT_BORDER', '����������� �����');
define('_JWMM_SIZE_PX', '������ px');
define('_JWMM_TOP_LEFT', '������-�����');
define('_JWMM_PRESS_TO_CHOOSE_COLOR', '������� ��� ������ �����');
define('_JWMM_BOTTOM_RIGHT', '������-�����');
define('_JWMM_BORDER', '������');
define('_COLOR', '����');
define('_JWMM_ALL_BORDERS', '��� �������');
define('_JWMM_TOP', '������');
define('_JWMM_LEFT', '�����');
define('_JWMM_RIGHT', '������');
define('_JWMM_BOTTOM', '�����');
define('_JWMM_BRIGHTNESS', '�������');
define('_JWMM_CONTRAST', '��������');
define('_JWMM_ADDITIONAL_ACTIONS', '�������������� ��������');
define('_JWMM_GRAY_SCALE', '�������� ������');
define('_JWMM_NEGATIVE', '�������');
define('_JWMM_ADD_TEXT', '�������� �����');
define('_JWMM_TEXT', '�����');
define('_JWMM_TEXT_COLOR', '���� ������');
define('_JWMM_TEXT_FONT', '����� ������');
define('_JWMM_TEXT_SIZE', '������ ������');
define('_JWMM_ORIENTATION', '����������');
define('_JWMM_BG_COLOR', '���� ����');
define('_JWMM_XY_POSITION', '������������ �� X � Y');
define('_JWMM_XY_PADDING', '������� �� X � Y');
define('_JWMM_FIRST', '������');
define('_JWMM_SECOND', '������');
define('_JWMM_THIRDTH', '�������');
define('_JWMM_CANCEL_ALL', '�������� ��');

/* administrator components com_joomlaxplorer */
define('_MENU_GZIP', '���������');
define('_MENU_MOVE', '�����������');
define('_MENU_CHMOD', '����� ����');

/* administrator components com_joomlapack */
define('_JP_BACKUPPING', '��������������');
define('_JP_PHPINFO', '-���������� � PHP-');
define('_JP_FREEMEMORY', '�������� ������');
define('_JP_GZIP_ENABLED', 'GZIP ������: �������� (��� ������)');
define('_JP_GZIP_NOT_ENABLED', 'GZIP ������: ���������� (��� �����)');
define('_JP_START_BACKUP_DB', '������ �������������� ���� ������');
define('_JP_START_BACKUP_FILES', '������ �������������� ���� ������ �����');
define('_JP_CUBE_ON_STEP', 'CUBE: ������ �� ����');
define('_JP_CUBE_STEP_FINISHED', 'CUBE: ��� �������� ');
define('_JP_CUBE_FINISHED', 'CUBE: ���������!');
define('_JP_ERROR_ON_STEP', 'CUBE: ������ �� ���� ');
define('_JP_CLEANUP', '�������');
define('_JP_RECURSING_DELETION', '����������� �������� ');
define('_JP_NOT_FILE', '�������� <strong>��� ����, �� �������!</strong>');
define('_JP_ERROR_DEL_DIRECTORY', '������ �������� ��������. ��������� ����� �������');
define('_JP_QUICK_MODE', '����� ���������������');
define('_JP_QUICK_MODE_ON_STEP', '������������ ������� �������� �� ����');
define('_JP_CANNOT_USE_QUICK_MODE', '���������� ������������ ������� �������� �� ����');
define('_JP_MULTISTEP_MODE', '����� ����������������');
define('_JP_MULTISTEP_MODE_ON_STEP', '������������ ��������� �������� �� ����');
define('_JP_MULTISTEP_MODE_ERROR', '������ ���������� ���������� ��������� �� ����');
define('_JP_SMART_MODE', '���������� �����');
define('_JP_SMART_MODE_ON_STEP', '���������� ����������� ������ �� ����');
define('_JP_SMART_MODE_ERROR', '������ ���������� ����������� ������ �� ����');
define('_JP_CHOOSED_ALGO', '������');
define('_JP_ALGORITHM_FOR', '�������� ���');
define('_JP_NEXT_STEP_BACKUP_DB', '��������� ��� &rarr; �������������� ����');
define('_JP_NEXT_STEP_FILE_LIST', '��������� ��� &rarr; �������� ������ ������');
define('_JP_NEXT_STEP_FINISHING', '��������� ��� &rarr; ����������');
define('_JP_NEXT_STEP_GZIP', '��������� ��� &rarr; ��������');
define('_JP_NEXT_STEP_FINISHED', '��������� ��� &rarr; ���������');
define('_JP_NO_NEXT_STEP', '��������� ��� �� ���������; �� ��� ���������');
define('_JP_NO_CUBE', '��� ������������� CUBE; �������� ������');
define('_JP_CURRENT_STEP', '������� ���');
define('_JP_UNPACKING_CUBE', '���������� ������������� CUBE');
define('_JP_TIMEOUT', '����� �� ���������� �������� �����, �� �������� �� ���������');
define('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine: ��������� ������ ������');
define('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine: �������������� ������ ���� ������');
define('_JP_ONE_FILE_STORE', 'CDBBackupEngine: ������ ����������� ������');
define('_JP_FILE_STRUCTURE', 'CDBBackupEngine: ���� ���������');
define('_JP_DATAFILE', 'CDBBackupEngine: ���� ������');
define('_JP_FILE_DELETION', 'CDBBackupEngine: �������� ������');
define('_JP_FIRST_STEP', 'CDBBackupEngine: ������ ������');
define('_JP_ALL_COMPLETED', 'CDBBackupEngine: �� ���������');
define('_JP_START_TICK', 'CDBBackupEngine: ������ ���������');
define('_JP_READY_FOR_TABLE', '��������� ��� �������');
define('_JP_DB_BACKUP_COMPLETED', '�������������� ���� ������ ���������');
define('_JP_NEW_FRAGMENT_ADDED', '�������� ����� ��������');
define('_JP_KERNEL_TABLES', '������� ����');
define('_JP_FIRST_STEP_2', '������ ������');
define('_JP_NEXT_VALUE', '�������� ��������');
define('_JP_SKIP_TABLE', '������� �������');
define('_JP_GETTING', '���������');
define('_JP_COLUMN_FROM', '������� ��');
define('_JP_ERROR_WRITING_FILE', '������ ������ � ����');
define('_JP_CANNOT_SAVE_DUMP', '���������� ��������� � ����');
define('_JP_CHECK_RESULTS', '���������� ��������');
define('_JP_ANALYZE_RESULTS', '���������� �������');
define('_JP_OPTIMIZE_RESULTS', '���������� �����������');
define('_JP_REPAIR_RESULTS', '���������� �����������');
define('_JP_GETTING_DIRS_LIST', '��������� ������ ��������� ��� ���������� �� ��������� �����');
define('_JP_GZIP_FIRST_STEP', '��������: ������ ���');
define('_JP_GZIP_FINISHED', '��������: ���������');
define('_JP_PACK_FINISHED', '���������� �������������');
define('_JP_GZIP_OF_FRAGMENT', '������������� ��������� #');
define('_JP_CURRENT_FRAGMENT', ' ������� ��������');
define('_JP_DELETE_PATH', ' ���� ��� �������� :');
define('_JP_PATH_TO_DELETE', ' ���� ��� ���������� ');
define('_JP_SAVING_ARCHIVE_INFO', '���������� ���������� � �������� ��������');
define('_JP_LOADING_ARCHIVE_INFO', '�������� ���������� � �������� ��������');
define('_JP_ADDING_FILE_TO_ARCHIVE', '���������� ������ � �����');
define('_JP_ARCHIVING', '�������������');
define('_JP_ARCHIVE_COMPLETED', '������������� ���������');
define('_JP_BACKUP_CONFIG', '������������ ���������� ����������� ������');
define('_JP_CONFIG_SAVING', '���������� ��������');
define('_JP_MAIN_CONFIG', '�������� ���������');
define('_JP_CONFIG_DIRECTORY', '������� ���������� �������');
define('_JP_ARCHIVE_NAME', '�������� ������');
define('_JP_LOG_LEVEL', '������� ������� ����');
define('_JP_ADDITIONAL_CONFIG', '�������������� ���������');
define('_JP_DELETE_PREFIX', '������� �������� ������');
define('_JP_EXPORT_TYPE', '��� �������� ���� ������');
define('_JP_FILELIST_ALGORITHM', '��������� ������');
define('_JP_CONFIG_DB_BACKUP', '��������� ����');
define('_JP_CONFIG_GZIP', '������ ������');
define('_JP_CONFIG_DUMP_GZIP', '������ ����� ���� ������');
define('_JP_AVAILABLE', '<strong class="green">��������</strong>');
define('_JP_NOT_AVAILABLE', '<strong class="red">����������</strong>');
define('_JP_MYSQL4_COMPAT', '� ������ ������������� � MySQL 4');
define('_JP_NO_GZIP', '�� ������������ (.sql)');
define('_JP_GZIP_TAR_GZ', '������������ � TAR.GZ (.tar.gz)');
define('_JP_GZIP_ZIP', '������������ � ZIP (.zip)');
define('_JP_QUICK_METHOD', '������ - ���� ������');
define('_JP_STANDARD_METHOD', '������������� - ����������');
define('_JP_SLOW_METHOD', '�������� - �����������������');
define('_JP_LOG_ERRORS_OLY', '������ ������');
define('_JP_LOG_ERROR_WARNINGS', '������ � ��������������');
define('_JP_LOG_ALL', '��� ����������');
define('_JP_LOG_ALL_DEBUG', '��� ���������� � �������');
define('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', '�� ��������� �������� � ��������� �����');
define('_FILE_NAME', '��� �����');
define('_JP_DOWNLOAD_FILE', '�������');
define('_JP_REALLY_DELETE_FILE', '������������� ������� ����?');
define('_JP_FILE_CREATION_DATE', '������');
define('_JP_NO_BACKUPS', '����� ��������� ����� �����������');
define('_JP_ACTIONS_LOG', '��� ���������� ��������');
define('_JP_BACKUP_MANAGEMENT', '��������� �����������');
define('_JP_CREATE_BACKUP', '������� ����� ������');
define('_JP_DB_MANAGEMENT', '���������� ����� ������');
define('_JP_DONT_SAVE_DIRECTORIES', '�� ��������� ��������');
define('_JP_CONFIG', '��������� ����������');
define('_JP_ERRORS_TMP_DIR', '���������� ������, ��������� ����������� ������ � ������� �������� ��������� �����');
define('_JP_BACKUP_CREATION', '�������� ��������� ����� ������');
define('_JP_DONT_CLOSE_BROWSER_WINDOW', '����������, �� ���������� ���� �������� � �� ���������� � ���� �������� �� ��������� �������������� � ����������� ���������������� ���������.');
define('_JP_ERRORS_VIEW_LOG', '� ���� ������ ���������� ������, ����������, <a href="' .  $mosConfig_live_site . '/index2.php?option=com_joomlapack&amp;act=log" title="JoomlaPack Log">���������� ���</a> ������ � �������� �������.');
define('_JP_BACKUP_SUCCESS', '�������������� ������ ����� ��������� �������. �������');
define('_JP_CREATION_FILELIST', '1. �������� ������ ������ ��� �������������.');
define('_JP_BACKUPPING_DB', '2. ������������� ���� ������.');
define('_JP_CREATION_OF_ARCHIVE', '3. �������� ��������� ������.');
define('_JP_ALL_COMPLETED_2', '4. �� ���������');
define('_JP_PROGRESS', '���������');
define('_JP_TABLES', '�������');
define('_JP_TABLE_ROWS', '�������');
define('_JP_SIZE', '������');
define('_JP_INCREMENT', '����������');
define('_JP_CREATION_DATE', '�������');
define('_JP_CHECKING', '��������');
define('_JP_FULL_BACKUP', '������ ������');
define('_JP_BACKUP_BASE', '������������� ����');
define('_JP_BACKUP_PANEL', '������ ��������������');

/* administrator modules mod_components */
define('_FULL_COMPONENTS_LIST', '������ ������ �����������');

/* administrator modules mod_fullmenu */
define('_MENU_CMS_FEATURES', '���������� ��������� ������������� �������');
define('_MENU_GLOBAL_CONFIG', '���������� ������������');
define('_MENU_GLOBAL_CONFIG_TIP', '��������� �������� ���������� ������������ �������');
define('_MENU_LANGUAGES', '�������� ������');
define('_MENU_LANGUAGES_TIP', '���������� ��������� �������');
define('_MENU_SITE_PREVIEW', '������������ �����');
define('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', '� ����� ����');
define('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', '������');
define('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', '������ � ���������');
define('_MENU_SITE_STATS', '���������� �����');
define('_MENU_SITE_STATS_TIP', '�������� ���������� �� �����');
define('_MENU_STATS_BROWSERS', '��������, ��, ������');
define('_MENU_STATS_BROWSERS_TIP', '���������� ��������� ����� �� ���������, �� � �������');
define('_MENU_SEARCHES', '��������� �������');
define('_MENU_SEARCHES_TIP', '���������� ��������� �������� �� �����');
define('_MENU_PAGE_STATS', '���������� ��������� �������');
define('_MENU_TEMPLATES_TIP', '���������� ���������');
define('_MENU_SITE_TEMPLATES', '������� �����');
define('_MENU_NEW_SITE_TEMPLATE', '��������� ������ �������');
define('_MENU_ADMIN_TEMPLATES', '������� �����������');
define('_MENU_NEW_ADMIN_TEMPLATE', '��������� ������ �������');
define('_MENU', '����');
define('_MENU_TRASH', '������� ����');
define('_CONTENT_IN_SECTIONS', '���������� �� ��������');
define('_CONTENT_IN_SECTION', '���������� � �������');
define('_SECTION_ARCHIVE', '����� �������');
define('_SECTION_CATEGORIES2', '��������� �������');
define('_ADD_CONTENT_ITEM', '�������� �������/������');
define('_ADD_STATIC_CONTENT', '�������� ��������� ����������');
define('_CONTENT_ON_FRONTPAGE', '���������� �� �������');
define('_CONTENT_TRASH', '������� �����������');
define('_ALL_COMPONENTS', '��� �����������');
define('_EDIT_COMPONENTS_MENU', '������������� ���� �����������');
define('_COMPONENTS_INSTALL_UNINSTALL', '���������/�������� �����������');
define('_MODULES_SETUP', '���������� ��������');
define('_MODULES_INSTALL_DEINSTALL', '���������/�������� �������');
define('_SITE_MAMBOTS', '������� �����');
define('_MAMBOTS_INSTALL_UNINSTALL', '���������/�������� ��������');
define('_SITE_LANGUAGES', '����� �����');
define('_JOOMLA_TOOLS', '�����������');
define('_PRIVATE_MESSAGES_CONFIG', '��������� ���������');
define('_FILE_MANAGER', '�������� ������');
define('_SQL_CONSOLE', 'SQL �������');
define('_BACKUP_CONFIG', '��������� ���������� ������');
define('_CLEAR_CONTENT_CACHE', '�������� ��� �����������');
define('_CLEAR_ALL_CACHE', '�������� ���� ���');
define('_SYSTEM_INFO', '���������� � �������');
define('_NO_ACTIVE_MENU_ON_THIS_PAGE', '�� ���� �������� ���� �� �������');

/* administrator modules mod_latest */
define('_LAST_ADDED_CONTENT', '��������� ����������� ����������');
define('_USER_WHO_ADD_CONTENT', '�������');

/* administrator modules mod_latest_users */
define('_NOW_ON_SITE', '������ �� �����');
define('_REGISTERED_USERS_COUNT', '����������������');
define('_ALL_REGISTERED_USERS_COUNT', '�����');
define('_TODAY_REGISTERED_USERS_COUNT', '�� �������');
define('_WEEK_REGISTERED_USERS_COUNT', '�� ������');
define('_MONTH_REGISTERED_USERS_COUNT', '�� �����');
define('_ADMINLIST_NEW', '����� ������������');
define('_ADMINLIST_ENABLE', '��������');
define('_ADMINLIST_GROUP', '������');
define('_ADMINLIST_REGISTERED', '���������������');
define('_ADMINLIST_ALL', '��');

/* administrator modules mod_logged */
define('_NOW_ON_SITE_REGISTERED', '������ �� ����� ������������');

/* administrator modules mod_online */
define('_ONLINE_USERS', '������������� ������');

/* administrator modules mod_popular */
define('_POPULAR_CONTENT', '����� ���������������');
define('_CREATED_CONTENT', '�������');
define('_CONTENT_HITS', '����������');

/* administrator modules mod_stats */
define('_MENU_ITEMS_COUNT', '�������');

/* administrator modules includes admin.php */
define('_CACHE_DIR_IS_NOT_WRITEABLE', '����������, �������� ������� ���� ��������� ��� ������');
define('_CACHE_DIR_IS_NOT_WRITEABLE2', '������� ���� �� �������� ��� ������');
define('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc ����������� � &laquo;OFF&raquo; ������ &laquo;ON&raquo;');
define('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals ����������� � &laquo;ON&raquo; ������ &laquo;OFF&raquo;');
define('_RG_EMULATION_ON_OFF', '�������� Joostina RG_EMULATION � ����� globals.php ���������� � &laquo;ON&raquo; ������ &laquo;OFF&raquo;<br /><span style="font-weight:normal;font-style:italic;color:#666;">&laquo;ON&raquo; - �������� �� ��������� - ��� �������������</span>');
define('_PHP_SETTINGS_WARNING', '��������� ��������� PHP �� �������� ������������ ��� <strong>������������</strong> � �� ������������� ��������');
define('_MENU_CACHE_CLEANED', '��� ���� ������ ���������� ������');
define('_CLEANING_ADMIN_MENU_CACHE', '������ ������� ���� ���� ������ ����������');
define('_NO_MENU_ADMIN_CACHE', '��� ���� ������ ���������� �� ���������. ��������� ����� ������� �� ������� ����.');

/* administrator modules includes pageNavigation.php */
define('_NAV_SHOW', '��������');
define('_NAV_SHOW_FROM', '��');
define('_NAV_NO_RECORDS', '������ �� �������');
define('_NAV_ORDER_UP', '����������� ����');
define('_NAV_ORDER_DOWN', '����������� ����');

/* administrator modules popups pollwindow.php */
define('_POLL_PREVIEW', '������������ ������');

/* administrator modules popups uploadimage.php */
define('_CHOOSE_IMAGE_FOR_UPLOAD', '����������, �������� ����������� ��� ��������');
define('_BAD_UPLOAD_FILE_NAME', '����� ������ ������ �������� �� �������� �������� � �� ������ ��������� ��������');
define('_IMAGE_ALREADY_EXISST', '����������� ��� ����������');
define('_FILE_MUST_HAVE_THIS_EXTENSION', '���� ������ ����� ����������');
define('_FILE_UPLOAD_UNSUCCESS', '�������� ����� ��������');
define('_FILE_UPLOAD_SUCCESS', '�������� ����� ������� ���������');

/* administrator index.php index2.php index3.php */
define('_PLEASE_ENTER_PASSWORD', '����������, ������� ������');
define('_BAD_CAPTCHA_STRING', '������ �������� ��� ��������');
define('_BAD_USERNAME_OR_PASSWORD', '�������� ��� ������������, ������, ��� ������� �������.  ����������, ��������� �����');
define('_BAD_USERNAME_OR_PASSWORD2', '��� ��� ������ �� �����. ��������� ����.'); // not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
define('_JOOSTINA_CONTRL_PANEL', '������ ���������� [Joostina]');
define('_GO_TO_MAIN_ADMIN_PAGE', '������� �� ������� �������� ������ ����������');
define('_PLEASE_WAIT', '�����');
define('_TOGGLE_WYSIWYG_EDITOR', '������������� ����������� ���������');
define('_DISABLE_WYSIWYG_EDITOR', '��������� ��������');
define('_PRESS_HERE_TO_RELOAD_CAPTCHA', '������� ����� �������� �����������');
define('_SHOW_CAPTCHA', '�������� �����������');
define('_PLEASE_ENTER_CAPTCHA', '������� ��� �������� � ��������:');
define('_PLEASE_ENABLE_JAVASCRIPT', '��������������! Javascript ������ ���� ��������� ��� ���������� ������ ������ ���������� ��������������!');

/* includes feedcreator.class.php */
define('_ERROR_CREATING_NEWSFEED', '������ �������� ����� ����� ��������. ����������, ��������� ���������� �� ������');

/* includes class.upload.php */
define('_file_error', '�������� ������. ���������� ��� ���.');
define('_local_file_missing', '��������� ���� �� ����������.');
define('_local_file_not_readable', '��������� ���� ������ ��� ������.');
define('_uploaded_too_big_ini', '������ �������� ����� (����������� ���� ��������� ����� ��������� the upload_max_filesize �� php.ini).');
define('_uploaded_too_big_html', '������ �������� ����� (����������� ���� ��������� ����� ��������� MAX_FILE_SIZE ������������ � HTML-�����).');
define('_uploaded_partial', '������ �������� ����� (���� �������� ��������).');
define('_uploaded_missing', '������ �������� ����� (���� �� ��� ��������).');
define('_uploaded_unknown', '������ �������� ����� (����������� ��� ������).');
define('_try_again', '������ �������� �����. ���������� ��� ���.');
define('_file_too_big', '���� ����� �������.');
define('_no_mime', '���������� ���������� MIME-��� �����.');
define('_incorrect_file', '������������ ��� �����.');
define('_image_too_wide', '����������� ����� �������.');
define('_image_too_narrow', '����������� ����� �����.');
define('_image_too_high', '����������� ����� �������.');
define('_image_too_short', '����������� ����� ��������.');
define('_ratio_too_high', '����������� ������ ����� ������ (����������� ����� �������).');
define('_ratio_too_low', '����������� ������ ����� ���� (����������� ����� �������).');
define('_too_many_pixels', '� ����������� ����� ����� ��������.');
define('_not_enough_pixels', '� ����������� ������������ ��������.');
define('_file_not_uploaded', '���� �� ��������. ���������� ���������� �������.');
define('_already_exists', '%s ����������. �������� ��� �����.');
define('_temp_file_missing', '������������ �������� ����. ���������� ���������� �������.');
define('_source_missing', '������������ ����������� ����. ���������� ���������� �������.');
define('_destination_dir', '���������� ���������� �� ����� ���� �������. ���������� ���������� �������.');
define('_destination_dir_missing', '���������� ���������� �� ����������. ���������� ���������� �������.');
define('_destination_path_not_dir', '���� ���������� �� �������� �����������. ���������� ���������� �������.');
define('_destination_dir_write', '���������� ���������� ������� ��� ������. ���������� ���������� �������.');
define('_destination_path_write', '���� ���������� ������ ��� ������. ���������� ���������� �������.');
define('_temp_file', '���������� ������� ��������� ����. ���������� ���������� �������.');
define('_source_not_readable', '�������� ���� �������������. ���������� ���������� �������.');
define('_no_create_support', '�������� �� %s �� ��������������.');
define('_create_error', '������ �������� %s ����������� �� ���������.');
define('_source_invalid', '���������� ��������� �������� ����.');
define('_gd_missing', '���������� GD �� ����������.');
define('_watermark_no_create_support', '%s �� ��������������, ���������� �������� ������ ����.');
define('_watermark_create_error', '%s �� �������������� ������, ���������� ������� ������ ����.');
define('_watermark_invalid', '����������� ������ �����������, ���������� �������� ������ ����.');
define('_file_create', '%s �� ��������������.');
define('_no_conversion_type', '��� ��������� �� ������.');
define('_copy_failed', '������ ����������� ����� �� ������. ������� copy() ��������� � �������.');
define('_reading_failed', '������ ������ �����.');

/* includes joomla.php */
define('_YOU_NEED_TO_AUTH', '���������� ��������������');
define('_ADMIN_SESSION_ENDED', '������ �������������� �����������');
define('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', '��� ���������� ��������������. ���� ������� �������� PHP session.auto_start ��� �������� �������� session.use_cookies setting, �� ������� �� ������ �� ��������� ����� ���, ��� ������� �����');
define('_WRONG_USER_SESSION', '������������ ������');
define('_FIRST', '������');
define('_LAST', '���������');
define('_MOS_WARNING', '��������!');
define('_ADM_MENUS_TARGET_CUR_WINDOW', '������� ���� � ������� ���������');
define('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', '����� ���� � ������� ���������');
define('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', '����� ���� ��� ������ ���������');
define('_WITH_UNASSIGNED', '�� ����������');
define('_CHOOSE_IMAGE', '�������� �����������');
define('_NO_USER', '��� ������������');
define('_CREATE_CATEGORIES_FIRST', '������� ���������� ������� ���������');
define('_NOT_CHOOSED', '�� �������');
define('_PUBLISHED_VUT_NOT_ACTIVE', '������������, �� <em>�� �������</em>');
define('_PUBLISHED_AND_ACTIVE', '������������ � <em>�������</em>');
define('_PUBLISHED_BUT_DATE_EXPIRED', '������������, �� <em>����� ���� ����������</em>');
define('_NOT_PUBLISHED', '�� ������������');
define('_LINK_NAME', '�������� ������');
define('_MENU_EXPIRED', '��������');
define('_MENU_ITEM_NAME', '�������� ������');
define('_CHECKED_OUT', '�������������');
define('_PUBLISH_ON_FRONTPAGE', '������������ �� �����');
define('_UNPUBLISH_ON_FRONTPAGE', '������ (�� ���������� �� �����)');

/* includes joomla.xml.php */
define('_DONT_USE_IMAGE', '-�� ������������ �����������-');
define('_DEFAULT_IMAGE', '-����������� �� ���������-');

/* includes debug jdebug.php */
define('_SQL_QUERIES_COUNT', '����� SQL ��������');

/* includes Cache Lite Lite.php */
define('_ERROR_DELETING_CACHE', '������ �������� ����');
define('_ERROR_READING_CACHE_DIR', '������ ������ ���������� ����');
define('_ERROR_READING_CACHE_FILE', '������ ������ ����� ����');
define('_ERROR_WRITING_CACHE_FILE', '������ ������ ����� ����');
define('_SCRIPT_MEMORY_USING', '������������ ������');

/* components com_content */
define('_YOU_HAVE_NO_CONTENT', '��� ������������ ���� �����������');
define('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', '���������� ������ ������������� ������ ���������');

/* components com_poll */
define('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', '��� ���������� ������ � ����� ���������. ������� ������  ��������.');

/* components com_registration */
define('_USER_ACTIVATION_FAILED', '<div class="componentheading">������ ���������!</div><p>��������� ����� ������� ������ ����������. ����������, ���������� � ������������� �����.</p>');

/* components com_weblinks */
define('_ENTER_CORRECT_URL', '������� ���������� URL!');
define('_ENTER_CORRECT_TITLE', '������ ������ ����� ���������!');
define('_ENTER_CORRECT_CAT', '�� ������ ������� ���������');
define('_ENTER_CORRECT_URL1', '�� ������ ������ URL');

/* components com_xmap */
define('_XMAP_PAGE', ' ��������');

/* administrator index2.php */
define('_TEMPLATE_NOT_FOUND', '������ �� ���������');
define('_ACCESS_DENIED', '� ������� ��������');
define('_CHECKIN_OJECT', '��������������');

/** includes/pdf.php */
define('_PDF_GENERATED','�������:');
define('_PDF_POWERED','�������� �� Joostina!');

/* jmn */
define('_MG_NAME','JMN (Joostina Meta Name)');
define('_MG_INSTALL','��������� JMN (Joostina Meta Name) ����������!');
define('_MG_UNINSTALL','��������� ������.');
define('_MG_SETTINGS','���������');
define('_MG_KWORDS','�������� �����');
define('_MG_DESC','��������');
define('_MG_EXWORDEDIT','�������� ����-����������');
define('_MG_DESCCOMMON','���������� �������� �������� ��������, ��� ������� �� �� ������ ������� �������� ��� �������� �����. ����� �������� ���� ������ <b>"��������"</b> ��� <b>"�������� �����"</b>.<br />����� ����, ��� �������� �����/�������� ������� ��� ���������� ������ ������ <b>"���������"</b> ��� ���������� ���������.');
define('_MG_SAVE','���������');
define('_MG_CANCEL','������');
define('_MG_BACK','�����');
define('_MG_CLOSE','�������');
define('_MG_MGRMETA','�������� ���������');
define('_MG_MGRARH','�������� ������');
define('_MG_FILTR','������');
define('_MG_TITLE','���������');
define('_MG_PREV','�������� ���������');
define('_MG_SECT','������');
define('_MG_CAT','���������');
define('_MG_VIEWPAGE','����������� ��������');
define('_MG_ALL','���');
define('_MG_START','������');
define('_MG_FINISH','���������');
define('_MG_ORDER','�������');
define('_MG_HITS','���������');
define('_MG_ID','ID');
define('_MG_ALLWAYS','������');
define('_MG_NOEXPIRY','�� ������������');
define('_MG_AUTH','�����');
define('_MG_DATE','����');
define('_MG_CONTITEM','������ �����������');
define('_MG_ITEMDETLS','������ �������');
define('_MG_TITLEALIAS','��������� ���������');
define('_MG_INTROTXT','������� �����: (�������������)');
define('_MG_MAINTXT','�������� �����: (�����������)');
define('_MG_PUBLINFO','���������� � ����������');
define('_MG_FRONTSHOW','�������� �� �������');
define('_MG_ACCLAYER','������� �������');
define('_MG_AUTHALIAS','��������� ������');
define('_MG_CREATBY','�������� ���������');
define('_MG_ORDERING','������������ ���� ��������)');
define('_MG_RECREATBY','������������ ���� ��������)');
define('_MG_PUBLSTART','������ ����������');
define('_MG_PUBLFINISH','��������� ����������');
define('_MG_IDITEM','ID �����������');
define('_MG_KEYEXTR','���������� �������� ����');
define('_MG_ENTERURL','������� URL');
define('_MG_ENTERTXT','������� �����');
define('_MG_LIMITRES','���������� ����������');
define('_MG_DELRES','��������� ����������');
define('_MG_ORDRES','�������������� �����������');
define('_MG_WEXCL','�����-����������');
define('_MG_MOSTEXCLS','�������� ����� ������������� �����-����������� � ������� � ���������� ������');
define('_MG_SHORTFST','�������� �������� ����� �������');
define('_MG_LONDFST','������� �������� ����� �������');
define('_MG_COMMA','�������');
define('_MG_BREAK','������� ������');
define('_MG_SPACE','������');
define('_MG_5W','5 ����');
define('_MG_10W','10 ����');
define('_MG_25W','25 ����');
define('_MG_50W','50 ����');
define('_MG_100W','100 ����');
define('_MG_200W','200 ����');
define('_MG_500W','500 ����');
define('_MG_UNLIM','�������������');
define('_MG_W','����');
define('_MG_GENKWORDS','������������ �������� �����');
define('_MG_WARNKWORDS','��� ����������� �������� ����� ��� ���� ��������� ���������. ������� "��" ��� ����������� ��� "������" ��� ������ ��������.');
define('_MG_WARNDESC','��� �������� ����������� �������� ��� ���� ��������� ���������. ������� "��" ��� ����������� ��� "������" ��� ������ ��������.');
define('_MG_SELTRASH','�������� �� ������ ������� ��� �������� � �������');
define('_MG_WARNTRASH','�� �������, ��� ������ ��������� � ������� ��������� ��������? \n ��� �������� �� ������ �������� ��������.');
define('_MG_STATE','���������');
define('_MG_REVISED','���������');
define('_MG_TIMES','���');
define('_MG_CREATED','������');
define('_MG_LASTMOD','��������� �����������');
define('_MG_MOSIMGCTRL','���������� mosimage');
define('_MG_IMGGAL','������� �����������');
define('_MG_SUBFLDRS','��������');
define('_MG_CONTIMG','����������� �����������');
define('_MG_SAMPLEIMG','������ �����������');
define('_MG_ACTIVEIMG','�������� �����������');
define('_MG_SELIMGEDITE','������������� ��������� �����������');
define('_MG_CODE','���');
define('_MG_IMGALIGN','������������ �����������');
define('_MG_ALTTXT','�������������� �����');
define('_MG_BORD','�������');
define('_MG_CAPTION','�������');
define('_MG_CAPTIONPOS','������� �������');
define('_MG_CAPTIONALIGN','������������ �������');
define('_MG_CAPTIONWIDTH','������ �������');
define('_MG_PARAMCTRL','���������� �����������');
define('_MG_PARAMDESC','*��� ��������� ������������ ������ ��, ��� �� ������ ����� �������� ��� ������� ��������� ��������.*');
define('_MG_PUBLISH','������������');
define('_MG_UNPUBLISH','�� ������������');
define('_MG_EXPIRED','�����');
define('_MG_USEREDITE','������������� ������������');
define('_MG_CONTEDITE','������������� ����������');
define('_MG_SECTEDITE','������������� ������');
define('_MG_CATEDITE','������������� ���������');
define('_MG_SELMENU','�������� ����');
define('_MG_ENTRMENUNAME','������� ��� ��� ����� ������� ����');
define('_MG_ITEMMUSTHATETITLE','������ ����������� ������ ����� ���������');
define('_MG_MUSTSELSECT','�� ������ ������� ������.');
define('_MG_MUSTSELCAT','�� ������ ������� ���������.');
define('_MG_EDITE','�������������');
define('_MG_NEW','�����');
define('_MG_ARH','�����');
define('_MG_DRAFT','��������');
define('_MG_RESETHITS','����� ���������� ����������');
define('_MG_NEWDOC','����� ��������');
define('_MG_UNMOD','�� ��������������');
define('_MG_METEDATE','����������');
define('_MG_LINKTOMENU','������ �� ����');
define('_MG_MENUINFO','��� �������� ������� "������ - ������� ��������" � ��������� ����.<br />');
define('_MG_MENUSEL','����� ����');
define('_MG_ITEMMENUNAME','�������� ������� ����');
define('_MG_EXISTLINKMENU','������������ ������ � ����');
define('_MG_NO','���');
define('_MG_YES','��');
define('_MG_SELSMSNG','�������� ���-������');
define('_MG_MOVEITEM','����������� ������');
define('_MG_MOVESECTCAT','����������� � ������/���������');
define('_MG_ITEMMOVED','������� ���� ����������');
define('_MG_SELSECTCATTOCOPY','�������� ������/��������� ��� ����������� � ���� �������');
define('_MG_COPYITEM','���������� ���������� �������');
define('_MG_COPYSECTCAT','���������� � ������/���������');
define('_MG_ITEMMCOPY','������� ���� ������������');
define('_MG_NOTSELITEMFORMETA','�� ������� ���������� ��� ����������� ����������!');
define('_MG_KWCHNGTITLE','�������� ����� ��������� ���� �������� � ������������ � ���������� �����������');
define('_MG_DESCCHNGTITLE','�������� ��������� ���� �������� � ������������ � ���������� �����������');
define('_MG_SELITEMCNG','���������� �������� ��������');
define('_MG_KWITEMGEN','�������� ����� ��� ��������� �������� ���������������');
define('_MG_DESCITEMGEN','�������� ��� ��������� �������� ���������������');
define('_MG_SETMTGSAVE','��������� JMN (Joostina Meta Name) ������� ���������!');
define('_MG_ACSINFOCONF','��������� ����� ������� � ����� $config �� \"�������� ��� ������\"!');
define('_MG_KWGEN','��������� �������� ����');
define('_MG_TOGEN','������������');
define('_MG_COUNTKWVIEW','���������� ���������� ����������� ������������ �������� ����');
define('_MG_SEP','�����������');
define('_MG_SEPKW','���������� ����������� ��� �������� ����');
define('_MG_SORTDESC','��������');
define('_MG_SORTASC','�����������');
define('_MG_CHGSORTKW','�������� ������� �������� ���� (�� ����������� ��� ��������)');
define('_MG_REWRKW','������������ ��������� �������� �����');
define('_MG_CHEKREWRKW','������� ��� ���������� ���������� �������� ����');
define('_MG_REWRDESC','������������ ��������� ��������');
define('_MG_CHEKREWRDESC','������� ��� ���������� ����������� ��������');
define('_MG_IGNORESIMB','������������ ��������� �������');
define('_MG_ENTERIGNORESIMB','������� �������, ������� ������ ������������ (�� ������ � ������ ������)');
define('_MG_DESCGEN','��������� ��������');
define('_MG_GETDESCFROM','�������� �������� ��');
define('_MG_CHEKREWRDESCINFO','������� ������ ����� ����� ��������. ���� ��������, ��� �� "��������� ������" �� ������� ����� ������ ����.');
define('_MG_GETFITXT','������������ �� ��������� ������ �����/������� ����� �� �����������');
define('_MG_GETFITXTINFO','������������ ������ �����/������� ����� �� ���������');
define('_MG_DESCLEN','����� ��������');
define('_MG_DESCLENINFO','����� �������� (���������� ��������)');
define('_MG_EXKWDESC','��������� ��� �������� ����� �� ��������');
define('_MG_EXKWDESCINFO','������� �������� �����, ������� ����� ��������� �� �������� (�� ������ � ������ ������)');
define('_MG_WEXSAVE','�����-���������� ������� ���������');
define('_MG_READINFOCONF','�������� � ������� ����� $conf!');
define('_MG_WEXLISTINFO','������� ����� �����, ������� ����� ��������� �� ������ �������� ����.<br />������ ��� �������� �������� ��������������� ������� � ���������� �����');
define('_MG_FILEEDITE','�������������� �����');
define('_MG_ALLCONTITEM','��� ������� �����������');
define('_MG_ARHWARNEDITE','�� �������� ������������� �������� �������');
define('_MG_ANOTHADMEDITE','��� ������������� ������ ���������������');
define('_MG_SELCAT','����� ���������');
define('_MG_CHGITEMSAVE','��������� ������� ������� ���������');
define('_MG_ITEMSAVE','������ ������� ��������');
define('_MG_ITEMARHSUX','������(�) ������� ������������');
define('_MG_ITEMPUBLSUX','������(�) ������� ������������');
define('_MG_ITEMUNPUBLSUX','������(�) ������� ����� � ����������');
define('_MG_ITEMSENDTRASH','������(�) ���������� � �������');
define('_MG_ITEMMOVESECTSUX','������(�) ������� ���������� � ������');
define('_MG_ITEMCOPYSECTSUX','������(�) ������� ����������� � ������');
define('_MG_CATEGORY','���������');
define('_MG_DROPCOUNTSUX','������� ���������� ������� �������');
define('_MG_LINKSTATITEM','(������ - ��������� ����������) � ����');
define('_MG_MADESUX','������� �������');
?>