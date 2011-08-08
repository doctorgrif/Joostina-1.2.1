<?php
/**
* @package Joostina
* @copyright јвторские права (C) 2008 Joostina team. ¬се права защищены.
* @license Ћицензи€ http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распростран€емое по услови€м лицензии GNU/GPL
* ƒл€ получени€ информации о используемых расширени€х и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет пр€мого доступа
defined('_VALID_MOS') or die();
global $mosConfig_form_date, $mosConfig_form_date_full;

// Page is not found
define('_404', 'We\'re sorry but the page you requested could not be found.');
define('_404_RTS', 'Return to site');

define('_SYSERR1', 'The database adapter is not available');
define('_SYSERR2', 'Could not connect to the database server');
define('_SYSERR3', 'Could not connect to the database');

// global
DEFINE('_LANGUAGE', 'en');
DEFINE('_NOT_AUTH', 'You are not authorised to view this resource.');
DEFINE('_DO_LOGIN', 'You need to login.');
DEFINE('_VALID_AZ09', "Please enter a valid %s. No spaces, more than %d characters and contain 0-9, a-z, A-Z");
DEFINE('_VALID_AZ09_USER', "Please enter a valid %s. More than %d characters and contain 0-9, a-z, A-Z");
DEFINE('_CMN_YES', 'Yes');
DEFINE('_CMN_NO', 'No');
DEFINE('_CMN_SHOW', 'Show');
DEFINE('_CMN_HIDE', 'Hide');
DEFINE('_CMN_NAME', 'Name');
DEFINE('_CMN_DESCRIPTION', 'Description');
DEFINE('_CMN_SAVE', 'Save');
DEFINE('_CMN_APPLY', 'Apply');
DEFINE('_CMN_CANCEL', 'Cancel');
DEFINE('_CMN_PRINT', 'Print');
DEFINE('_CMN_EMAIL', 'E-mail');
DEFINE('_ICON_SEP', '|');
DEFINE('_CMN_PARENT', 'Parent');
DEFINE('_CMN_ORDERING', 'Ordering');
DEFINE('_CMN_ACCESS', 'Access Level');
DEFINE('_CMN_SELECT', 'Select');
DEFINE('_CMN_NEXT', 'Next');
DEFINE('_CMN_NEXT_ARROW', "&nbsp;&raquo;");
DEFINE('_CMN_PREV', 'Prev.');
DEFINE('_CMN_PREV_ARROW', "&laquo;&nbsp;");
DEFINE('_CMN_SORT_NONE', 'No Sorting');
DEFINE('_CMN_SORT_ASC', 'Sort Ascending');
DEFINE('_CMN_SORT_DESC', 'Sort Descending');
DEFINE('_CMN_NEW', 'New');
DEFINE('_CMN_NONE', 'None');
DEFINE('_CMN_LEFT', 'Left');
DEFINE('_CMN_RIGHT', 'Right');
DEFINE('_CMN_CENTER', 'Center');
DEFINE('_CMN_ARCHIVE', 'Archive');
DEFINE('_CMN_UNARCHIVE', 'Unarchive');
DEFINE('_CMN_TOP', 'Top');
DEFINE('_CMN_BOTTOM', 'Bottom');
DEFINE('_CMN_PUBLISHED', 'Published');
DEFINE('_CMN_UNPUBLISHED', 'Unpublished');
DEFINE('_CMN_EDIT_HTML', 'Edit HTML');
DEFINE('_CMN_EDIT_CSS', 'Edit CSS');
DEFINE('_CMN_DELETE', 'Delete');
DEFINE('_CMN_FOLDER', 'Folder');
DEFINE('_CMN_SUBFOLDER', 'Sub-folder');
DEFINE('_CMN_OPTIONAL', 'Optional');
DEFINE('_CMN_REQUIRED', 'Required');
DEFINE('_CMN_CONTINUE', 'Continue');
DEFINE('_STATIC_CONTENT', 'Static Content');
DEFINE('_CMN_NEW_ITEM_LAST', 'New Items default to the last place. Ordering can be changed after this Item is saved.');
DEFINE('_CMN_NEW_ITEM_FIRST', 'New Items default to the first place. Ordering can be changed after this Item is saved.');
DEFINE('_LOGIN_INCOMPLETE', 'Please complete the username and password fields.');
DEFINE('_LOGIN_BLOCKED', 'Your login has been blocked. Please contact the administrator.');
DEFINE('_LOGIN_INCORRECT', 'Incorrect username or password. Please try again.');
DEFINE('_LOGIN_NOADMINS', 'You cannot login. There are no administrators set up.');
DEFINE('_CMN_JAVASCRIPT', '!Warning! JavaScript must be enabled for proper operation.');
DEFINE('_NEW_MESSAGE', 'A new private message has arrived');
DEFINE('_MESSAGE_FAILED', 'The User has locked their mailbox. Message failed.');
DEFINE('_CMN_IFRAMES', 'This option will not work correctly.  Unfortunately, your browser does not support Inline Frames');
DEFINE('_INSTALL_3PD_WARN', 'Warning: Installing 3rd party extensions may compromise your server\'s security. Upgrading your Joomla! installation will not update your 3rd party extensions.<br />For more information on keeping your site secure, please see the <a href="http://forum.joomla.org/index.php/board,267.0.html" target="_blank" style="color: blue; text-decoration: underline;">Joomla! Security Forum</a>.');
DEFINE('_INSTALL_WARN', 'For your security please completely remove the installation directory including all files and sub-folders - then refresh this page.');
DEFINE('_TEMPLATE_WARN', '<font color=\"red\"><strong>Template File Not Found! Looking for template:</strong></font>');
DEFINE('_NO_PARAMS', 'There are no Parameters for this item');
DEFINE('_HANDLER', 'Handler not defined for type');

/** mambots */
DEFINE('_TOC_JUMPTO', 'Article Index');

/* plugin_jw_ajaxvote */
DEFINE('_PJA_SAVE', 'Save');
DEFINE('_PJA_YOU_VOTE_ADD', 'You vote add!');
DEFINE('_PJA_VOTE', 'vote');
DEFINE('_PJA_VOTES', 'votes');
DEFINE('_PJA_THANKS_FULL', '—пасибо за ¬аш голос! –езультаты буду обновлены после перерасчета.');
DEFINE('_PJA_THANKS', '—пасибо за ¬аш голос!');

/* joostinasocialbot */
DEFINE('_JSB_ADD', 'Add bookmark in:');

/** content */
DEFINE('_READ_MORE', 'Read moreЕ');
DEFINE('_READ_MORE_REGISTER', 'Register to read moreЕ');
DEFINE('_MORE', 'MoreЕ');
DEFINE('_ON_NEW_CONTENT', "A new Content Item has been submitted by [ %s ]  titled [ %s ]  from Section [ %s ]  and Category  [ %s ]");
DEFINE('_SEL_CATEGORY', '- Select Category -');
DEFINE('_SEL_SECTION', '- Select Section -');
DEFINE('_SEL_AUTHOR', '- Select Author -');
DEFINE('_SEL_POSITION', '- Select Position -');
DEFINE('_SEL_TYPE', '- Select Type -');
DEFINE('_EMPTY_CATEGORY', 'This Category is currently empty');
DEFINE('_EMPTY_BLOG', 'There are no Items to display');
DEFINE('_NOT_EXIST', 'The page you are trying to access does not exist.<br />Please select a page from the main menu.');
DEFINE('_SUBMIT_BUTTON', 'Submit');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE', 'Vote');
DEFINE('_BUTTON_RESULTS', 'Results');
DEFINE('_USERNAME', 'Username');
DEFINE('_LOST_PASSWORD', 'Lost Password?');
DEFINE('_PASSWORD', 'Password');
DEFINE('_BUTTON_LOGIN', 'Login');
DEFINE('_BUTTON_LOGOUT', 'Logout');
DEFINE('_NO_ACCOUNT', 'No account yet?');
DEFINE('_CREATE_ACCOUNT', 'Register');
DEFINE('_VOTE_POOR', 'Poor');
DEFINE('_VOTE_BEST', 'Best');
DEFINE('_USER_RATING', 'User Rating');
DEFINE('_RATE_BUTTON', 'Rate');
DEFINE('_REMEMBER_ME', 'Remember me');

/** contact.php */
DEFINE('_ENQUIRY', 'Enquiry');
DEFINE('_ENQUIRY_TEXT', 'This is an enquiry e-mail via %s from:');
DEFINE('_COPY_TEXT', 'This is a copy of the following message you sent to %s via %s ');
DEFINE('_COPY_SUBJECT', 'Copy of: ');
DEFINE('_THANK_MESSAGE', 'Thank you for your e-mail');
DEFINE('_CLOAKING', 'This e-mail address is being protected from spam bots, you need JavaScript enabled to view it');
DEFINE('_CONTACT_HEADER_NAME', 'Name');
DEFINE('_CONTACT_HEADER_POS', 'Position');
DEFINE('_CONTACT_HEADER_EMAIL', 'Email');
DEFINE('_CONTACT_HEADER_PHONE', 'Phone');
DEFINE('_CONTACT_HEADER_FAX', 'Fax');
DEFINE('_CONTACTS_DESC', 'The Contact list for this Web site.');
DEFINE('_CONTACT_MORE_THAN', 'You cannot enter more than one e-mail address.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE', 'Contact');
DEFINE('_EMAIL_DESCRIPTION', 'Send an e-mail to this Contact:');
DEFINE('_NAME_PROMPT', ' Enter your name');
DEFINE('_EMAIL_PROMPT', ' E-mail address:');
DEFINE('_MESSAGE_PROMPT', ' Enter your message:');
DEFINE('_SEND_BUTTON', 'Send');
DEFINE('_CONTACT_FORM_NC', 'Please make sure the form is complete and valid.');
DEFINE('_CONTACT_TELEPHONE', 'Telephone: ');
DEFINE('_CONTACT_MOBILE', 'Mobile: ');
DEFINE('_CONTACT_FAX', 'Fax: ');
DEFINE('_CONTACT_EMAIL', 'E-mail: ');
DEFINE('_CONTACT_NAME', 'Name: ');
DEFINE('_CONTACT_POSITION', 'Position: ');
DEFINE('_CONTACT_ADDRESS', 'Address: ');
DEFINE('_CONTACT_MISC', 'Information: ');
DEFINE('_CONTACT_SEL', 'Select Contact:');
DEFINE('_CONTACT_NONE', 'There are no Contact Details listed.');
DEFINE('_CONTACT_ONE_EMAIL', 'You cannot enter more than one e-mail address.');
DEFINE('_EMAIL_A_COPY', 'E-mail a copy of this message to your own address');
DEFINE('_CONTACT_DOWNLOAD_AS', 'Download information as a');
DEFINE('_VCARD', 'VCard');

/** pageNavigation */
DEFINE('_PN_LT', '&lt;');
DEFINE('_PN_RT', '&gt;');
DEFINE('_PN_PAGE', 'Page');
DEFINE('_PN_OF', 'of');
DEFINE('_PN_START', 'Start');
DEFINE('_PN_PREVIOUS', 'Prev');
DEFINE('_PN_NEXT', 'Next');
DEFINE('_PN_END', 'End');
DEFINE('_PN_DISPLAY_NR', 'Display');
DEFINE('_PN_RESULTS', 'Results');

/** email to friend */
DEFINE('_EMAIL_TITLE', 'E-mail a friend');
DEFINE('_EMAIL_FRIEND', 'E-mail this to a friend.');
DEFINE('_EMAIL_FRIEND_ADDR', "Your friend's e-mail:");
DEFINE('_EMAIL_YOUR_NAME', 'Your Name:');
DEFINE('_EMAIL_YOUR_MAIL', 'Your e-mail:');
DEFINE('_SUBJECT_PROMPT', ' Message subject:');
DEFINE('_BUTTON_SUBMIT_MAIL', 'Send e-mail');
DEFINE('_BUTTON_CANCEL', 'Cancel');
DEFINE('_EMAIL_ERR_NOINFO', 'You must enter your valid e-mail and the valid e-mail to send to.');
DEFINE('_EMAIL_MSG', 'The following page from the "%s" web site has been sent to you by %s ( %s ).

You can access it at the following URL:
%s');
DEFINE('_EMAIL_INFO', 'Item sent by');
DEFINE('_EMAIL_SENT', 'This item has been sent to');
DEFINE('_PROMPT_CLOSE', 'Close Window');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' Contributed by');
DEFINE('_WRITTEN_BY', ' Written by');
DEFINE('_LAST_UPDATED', 'Last Updated');
DEFINE('_BACK', '[ Back ]');
DEFINE('_LEGEND', 'Legend');
DEFINE('_DATE', 'Date');
DEFINE('_ORDER_DROPDOWN', 'Order');
DEFINE('_HEADER_TITLE', 'Item Title');
DEFINE('_HEADER_AUTHOR', 'Author');
DEFINE('_HEADER_SUBMITTED', 'Submitted');
DEFINE('_HEADER_HITS', 'Hits');
DEFINE('_E_EDIT', 'Edit');
DEFINE('_E_ADD', 'Add');
DEFINE('_E_WARNUSER', 'Please either Cancel or Save the current change');
DEFINE('_E_WARNTITLE', 'Content Item must have a title');
DEFINE('_E_WARNTEXT', 'Content Item must have intro text');
DEFINE('_E_WARNCAT', 'Please select a Category');
DEFINE('_E_CONTENT', 'Content');
DEFINE('_E_TITLE', 'Title:');
DEFINE('_E_CATEGORY', 'Category:');
DEFINE('_E_INTRO', 'Intro Text');
DEFINE('_E_MAIN', 'Main Text');
DEFINE('_E_MOSIMAGE', 'INSERT {mosimage}');
DEFINE('_E_IMAGES', 'Images');
DEFINE('_E_GALLERY_IMAGES', 'Gallery Images');
DEFINE('_E_CONTENT_IMAGES', 'Content Images');
DEFINE('_E_EDIT_IMAGE', 'Edit Image');
DEFINE('_E_NO_IMAGE', 'No Image');
DEFINE('_E_INSERT', 'Insert');
DEFINE('_E_UP', 'Up');
DEFINE('_E_DOWN', 'Down');
DEFINE('_E_REMOVE', 'Remove');
DEFINE('_E_SOURCE', 'Source:');
DEFINE('_E_ALIGN', 'Align:');
DEFINE('_E_ALT', 'Alt Text:');
DEFINE('_E_BORDER', 'Border:');
DEFINE('_E_CAPTION', 'Caption');
DEFINE('_E_CAPTION_POSITION', 'Caption Position');
DEFINE('_E_CAPTION_ALIGN', 'Caption Align');
DEFINE('_E_CAPTION_WIDTH', 'Caption Width');
DEFINE('_E_APPLY', 'Apply');
DEFINE('_E_PUBLISHING', 'Publishing');
DEFINE('_E_STATE', 'State:');
DEFINE('_E_AUTHOR_ALIAS', 'Author Alias:');
DEFINE('_E_ACCESS_LEVEL', 'Access Level:');
DEFINE('_E_ORDERING', 'Ordering:');
DEFINE('_E_START_PUB', 'Start Publishing:');
DEFINE('_E_FINISH_PUB', 'Finish Publishing:');
DEFINE('_E_SHOW_FP', 'Show on Front Page:');
DEFINE('_E_HIDE_TITLE', 'Hide Item Title:');
DEFINE('_E_METADATA', 'Metadata');
DEFINE('_E_M_DESC', 'Description:');
DEFINE('_E_M_KEY', 'Keywords:');
DEFINE('_E_SUBJECT', 'Subject:');
DEFINE('_E_EXPIRES', 'Expiry Date:');
DEFINE('_E_VERSION', 'Version:');
DEFINE('_E_ABOUT', 'About');
DEFINE('_E_CREATED', 'Created:');
DEFINE('_E_LAST_MOD', 'Last Modified:');
DEFINE('_E_HITS', 'Hits:');
DEFINE('_E_SAVE', 'Save');
DEFINE('_E_CANCEL', 'Cancel');
DEFINE('_E_REGISTERED', 'Registered Users Only');
DEFINE('_E_ITEM_INFO', 'Item Information');
DEFINE('_E_ITEM_SAVED', 'Item successfully saved.');
DEFINE('_ITEM_PREVIOUS', '&lt; Prev');
DEFINE('_ITEM_NEXT', 'Next &gt;');
DEFINE('_KEY_NOT_FOUND', 'Key not found');

/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY', 'There are currently no Archived Entries for this Section, please come back later');
DEFINE('_CATEGORY_ARCHIVE_EMPTY', 'There are currently no Archived Entries for this Category, please come back later');
DEFINE('_HEADER_SECTION_ARCHIVE', 'Section Archives');
DEFINE('_HEADER_CATEGORY_ARCHIVE', 'Category Archives');
DEFINE('_ARCHIVE_SEARCH_FAILURE', 'There are no Archived entries for %s %s'); // values are month then year
DEFINE('_ARCHIVE_SEARCH_SUCCESS', 'Here are the Archived entries for %s %s'); // values are month then year
DEFINE('_FILTER', 'Filter');
DEFINE('_ORDER_DROPDOWN_DA', 'Date asc');
DEFINE('_ORDER_DROPDOWN_DD', 'Date desc');
DEFINE('_ORDER_DROPDOWN_TA', 'Title asc');
DEFINE('_ORDER_DROPDOWN_TD', 'Title desc');
DEFINE('_ORDER_DROPDOWN_HA', 'Hits asc');
DEFINE('_ORDER_DROPDOWN_HD', 'Hits desc');
DEFINE('_ORDER_DROPDOWN_AUA', 'Author asc');
DEFINE('_ORDER_DROPDOWN_AUD', 'Author desc');
DEFINE('_ORDER_DROPDOWN_O', 'Ordering');

/** poll.php */
DEFINE('_ALERT_ENABLED', 'Cookies must be enabled!');
DEFINE('_ALREADY_VOTE', 'You already voted for this item today.');
DEFINE('_NO_SELECTION', 'No selection has been made, please try again');
DEFINE('_THANKS', 'Thanks for your vote!');
DEFINE('_SELECT_POLL', 'Select Poll from the list');

/** classes/html/poll.php */
DEFINE('_JAN', 'January');
DEFINE('_FEB', 'February');
DEFINE('_MAR', 'March');
DEFINE('_APR', 'April');
DEFINE('_MAY', 'May');
DEFINE('_JUN', 'June');
DEFINE('_JUL', 'July');
DEFINE('_AUG', 'August');
DEFINE('_SEP', 'September');
DEFINE('_OCT', 'October');
DEFINE('_NOV', 'November');
DEFINE('_DEC', 'December');
DEFINE('_POLL_TITLE', 'Poll - Results');
DEFINE('_SURVEY_TITLE', 'Poll Title:');
DEFINE('_NUM_VOTERS', 'Number of Voters');
DEFINE('_FIRST_VOTE', 'First Vote');
DEFINE('_LAST_VOTE', 'Last Vote');
DEFINE('_SEL_POLL', 'Select Poll:');
DEFINE('_NO_RESULTS', 'There are no results for this poll.');

/** registration.php */
DEFINE('_ERROR_PASS', 'Sorry, no corresponding User was found');
DEFINE('_NEWPASS_MSG', 'The User account $checkusername has this e-mail associated with it.\n'
        . 'A web user from $mosConfig_live_site has just requested that a new password be sent.\n\n'
        . ' Your New Password is: $newpass\n\nIf you didn\'t ask for this, don\'t worry.'
        . ' You are seeing this message, not them. If this was an error just login with your'
        . ' new password and then change your password to what you would like it to be.');
DEFINE('_NEWPASS_SUB', '$_sitename :: New password for - $checkusername');
DEFINE('_NEWPASS_SENT', 'New User Password created and sent!');
DEFINE('_REGWARN_NAME', 'Please enter your name.');
DEFINE('_REGWARN_UNAME', 'Please enter a User name.');
DEFINE('_REGWARN_MAIL', 'Please enter a valid e-mail address.');
DEFINE('_REGWARN_PASS', 'Please enter a valid password.  No spaces, more than 6 characters and contain 0-9,a-z,A-Z');
DEFINE('_REGWARN_VPASS1', 'Please verify the password.');
DEFINE('_REGWARN_VPASS2', 'Password and verification do not match, please try again.');
DEFINE('_REGWARN_INUSE', 'This username/password already in use. Please try another.');
DEFINE('_REGWARN_EMAIL_INUSE', 'This e-mail is already registered. If you forgot the password click on "Lost your Password" and a new password will be sent to you.');
DEFINE('_SEND_SUB', 'Account details for %s at %s');
DEFINE('_USEND_MSG_ACTIVATE', 'Hello %s,

Thank you for registering at %s. Your account is created and must be activated before you can use it.
To activate the account click on the following link or copy-paste it in your browser:
%s

After activation you may login to %s using the following username and password:

Username - %s
Password - %s');
DEFINE('_USEND_MSG', "Hello %s,

Thank you for registering at %s.

You may now login to %s using the username and password you registered with.");
DEFINE('_USEND_MSG_NOPASS', 'Hello $name,\n\nYou have been added as a user to $mosConfig_live_site.\n'
        . 'You may login to $mosConfig_live_site with the username and password you registered with.\n\n'
        . 'Please do not respond to this message as it is automatically generated and is for information purposes only\n');
DEFINE('_ASEND_MSG', 'Hello %s,

A new User has registered at %s.
This e-mail contains their details:

Name - %s
E-mail - %s
Username - %s

Please do not respond to this message as it is automatically generated and is for information purposes only');
DEFINE('_REG_COMPLETE_NOPASS', '<div class="componentheading">Registration Complete!</div><br />&nbsp;&nbsp;'
        . 'You may now login.<br />&nbsp;&nbsp;');
DEFINE('_REG_COMPLETE', '<div class="componentheading">Registration Complete!</div><br />You may now login.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Registration Complete!</div><br />Your account has been created and activation link has been sent to the e-mail address you entered. Note that you must activate the account by clicking on the activation link when you get the e-mail before you can login.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Activation Complete!</div><br />Your account has been successfully activated. You can now login using the username and password you chose during the registration.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Invalid Activation Link!</div><br />There is no such account in our database or the account has already been activated.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">Activation Failed!</div><br />The system was unable to activate your account, please contact the site administrator.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD', 'Lost your Password?');
DEFINE('_NEW_PASS_DESC', 'Please enter your Username and e-mail address then click on the Send Password button.<br />'
        . 'You will receive a new password shortly.  Use this new password to access the site.');
DEFINE('_PROMPT_UNAME', 'Username:');
DEFINE('_PROMPT_EMAIL', 'E-mail Address:');
DEFINE('_BUTTON_SEND_PASS', 'Send Password');
DEFINE('_REGISTER_TITLE', 'Registration');
DEFINE('_REGISTER_NAME', 'Name:');
DEFINE('_REGISTER_UNAME', 'Username:');
DEFINE('_REGISTER_EMAIL', 'E-mail:');
DEFINE('_REGISTER_PASS', 'Password:');
DEFINE('_REGISTER_VPASS', 'Verify Password:');
DEFINE('_REGISTER_REQUIRED', 'Fields marked with an asterisk (*) are required.');
DEFINE('_BUTTON_SEND_REG', 'Send Registration');
DEFINE('_SENDING_PASSWORD', 'Your password will be sent to the above e-mail address.<br />Once you have received your'
        . ' new password you can login in and change it.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE', 'Search');
DEFINE('_SEARCH_SEL_CATEGORY', 'Select category');
DEFINE('_SEARCH_RESULT', 'Search result:');
DEFINE('_PROMPT_KEYWORD', 'Search Keyword');
DEFINE('_SEARCH_MATCHES', 'returned %d matches');
DEFINE('_CONCLUSION', 'Total $totalRows results found.  Search for [ <strong>$searchword</strong> ] with');
DEFINE('_NOKEYWORD', 'No results were found');
DEFINE('_IGNOREKEYWORD', 'One or more common words were ignored in the search');
DEFINE('_SEARCH_ANYWORDS', 'Any words');
DEFINE('_SEARCH_ALLWORDS', 'All words');
DEFINE('_SEARCH_PHRASE', 'Exact phrase');
DEFINE('_SEARCH_NEWEST', 'Newest first');
DEFINE('_SEARCH_OLDEST', 'Oldest first');
DEFINE('_SEARCH_POPULAR', 'Most popular');
DEFINE('_SEARCH_ALPHABETICAL', 'Alphabetical');
DEFINE('_SEARCH_CATEGORY', 'Section/Category');
DEFINE('_SEARCH_MESSAGE', 'Search term must be a minimum of 3 characters and a maximum of 20 characters');
DEFINE('_SEARCH_ARCHIVED', 'Archived');
DEFINE('_SEARCH_CATBLOG', 'Category Blog');
DEFINE('_SEARCH_CATLIST', 'Category List');
DEFINE('_SEARCH_NEWSFEEDS', 'News Feeds	');
DEFINE('_SEARCH_SECLIST', 'Section List');
DEFINE('_SEARCH_SECBLOG', 'Section Blog');

/** templates/*.php */
DEFINE('_ISO2', 'cp1251');
DEFINE('_ISO', 'charset=iso-8859-1');
DEFINE('_DATE_FORMAT', 'l, F d Y');  //Uses PHP's DATE Command Format - Depreciated

/** Modify this line to reflect how you want the date to appear in your site e.g. DEFINE("_DATE_FORMAT_LC","%A, %d %B %Y %H:%M"); //Uses PHP's strftime Command Format */
DEFINE('_DATE_FORMAT_LC', $mosConfig_form_date); //Uses PHP's strftime Command Format
DEFINE('_DATE_FORMAT_LC2', $mosConfig_form_date_full); //the Full format of time
DEFINE('_SEARCH_BOX', 'SearchЕ');
DEFINE('_NEWSFLASH_BOX', 'Newsflash!');
DEFINE('_MAINMENU_BOX', 'Main Menu');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE', 'User Menu');
DEFINE('_HI', 'Hi, ');

/** user.php */
DEFINE('_SAVE_ERR', 'Please complete all the fields.');
DEFINE('_THANK_SUB', 'Thanks for your submission. Your submission will now be reviewed before being posted to the site.');
DEFINE('_THANK_SUB_PUB', 'Thanks for your submission.');
DEFINE('_UP_SIZE', 'You cannot upload files greater than 15kb in size.');
DEFINE('_UP_EXISTS', 'Image $userfile_name already exists. Please rename the file and try again.');
DEFINE('_UP_COPY_FAIL', 'Failed to copy');
DEFINE('_UP_TYPE_WARN', 'You may only upload a gif, or jpg image.');
DEFINE('_MAIL_SUB', 'User Submitted');
DEFINE('_MAIL_MSG', 'Hello $adminName,\n\n\nA User submitted $type:\n [ $title ]\n has been just been submitted by User:\n [ $author ]\n'
        . ' for $mosConfig_live_site.\n\n\n\n'
        . 'Please go to $mosConfig_live_site/administrator to view and approve this $type.\n\n'
        . 'Please do not respond to this message as it is automatically generated and is for information purposes only\n');
DEFINE('_PASS_VERR1', 'If changing your password please enter the password again to verify.');
DEFINE('_PASS_VERR2', 'If changing your password please make sure the password and verification match.');
DEFINE('_UNAME_INUSE', 'This username already in use.');
DEFINE('_UPDATE', 'Update');
DEFINE('_USER_DETAILS_SAVE', 'Your settings have been saved.');
DEFINE('_USER_LOGIN', 'User Login');

/** components/com_user */
DEFINE('_EDIT_TITLE', 'Edit Your Details');
DEFINE('_YOUR_NAME', 'Your Name:');
DEFINE('_EMAIL', 'e-mail:');
DEFINE('_UNAME', 'User Name:');
DEFINE('_PASS', 'Password:');
DEFINE('_VPASS', 'Verify Password:');
DEFINE('_SUBMIT_SUCCESS', 'Submission Success!');
DEFINE('_SUBMIT_SUCCESS_DESC', 'Your item has been successfully submitted to our administrators. It will be reviewed before being published on this site.');
DEFINE('_WELCOME', 'Welcome!');
DEFINE('_WELCOME_DESC', 'Welcome to the User section of our site');
DEFINE('_CONF_CHECKED_IN', 'Checked out items have now been all checked in');
DEFINE('_CHECK_TABLE', 'Checking table');
DEFINE('_CHECKED_IN', 'Checked in ');
DEFINE('_CHECKED_IN_ITEMS', ' items');
DEFINE('_PASS_MATCH', 'Passwords do not match');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME', 'You must select a name for the Client.');
DEFINE('_BNR_CONTACT', 'You must select a contact for the Client.');
DEFINE('_BNR_VALID_EMAIL', 'You must select a valid e-mail for the Client.');
DEFINE('_BNR_CLIENT', 'You must select a Client,');
DEFINE('_BNR_NAME', 'You must select a name for the Banner.');
DEFINE('_BNR_IMAGE', 'You must select an image for the Banner.');
DEFINE('_BNR_URL', 'You must select a URL/Custom banner code for the Banner.');

/** components/com_login */
DEFINE('_ALREADY_LOGIN', 'You are already logged in!');
DEFINE('_LOGOUT', 'Click here to logout');
DEFINE('_LOGIN_TEXT', 'Use the login and password fields opposite to gain full access');
DEFINE('_LOGIN_SUCCESS', 'You have successfully Logged In');
DEFINE('_LOGOUT_SUCCESS', 'You have successfully Logged Out');
DEFINE('_LOGIN_DESCRIPTION', 'To access the Private area of this site please Login');
DEFINE('_LOGOUT_DESCRIPTION', 'You are currently Logged In to the private area of this site');

/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE', 'Web Links');
DEFINE('_WEBLINKS_DESC', 'We are regularly out on the web. When we find a great site we list it here for you to enjoy.  <br />From the list below choose one of our weblink topics, then select a URL to visit.');
DEFINE('_HEADER_TITLE_WEBLINKS', 'Web Link');
DEFINE('_SECTION', 'Section:');
DEFINE('_SUBMIT_LINK', 'Submit A Web Link');
DEFINE('_URL', 'URL:');
DEFINE('_URL_DESC', 'Description:');
DEFINE('_NAME', 'Name:');
DEFINE('_WEBLINK_EXIST', 'There is a Web Link already with that name, please try again.');
DEFINE('_WEBLINK_TITLE', 'Your Weblink must contain a title.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME', 'Feed Name');
DEFINE('_FEED_ARTICLES', '# Articles');
DEFINE('_FEED_LINK', 'Feed Link');

/** whos_online.php */
DEFINE('_WE_HAVE', 'We have: <br />');
DEFINE('_REGISTERED_ONLINE', 'Registered');
DEFINE('_NOW_ONLINE', 'Online');
DEFINE('_AND', ' and ');
DEFINE('_GUEST_COUNT', '%s guest');
DEFINE('_GUESTS_COUNT', '%s guests');
DEFINE('_MEMBER_COUNT', '%s member');
DEFINE('_MEMBERS_COUNT', '%s members');
DEFINE('_ONLINE', ' online');
DEFINE('_NONE', 'No Users Online');

/** modules/mod_banners */
DEFINE('_BANNER_ALT', 'Advertisement');

/** modules/mod_ml_login */
DEFINE('_AUTH', 'Authorisation');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES', 'No Images');
DEFINE('_RANDOM_IMAGE_ERROR', 'Check up module options mod_random_image and presence of images in the catalogue specified in options!');

/** modules/mod_stats.php */
DEFINE('_TIME_STAT', 'Time');
DEFINE('_STAT_OS', 'OS');
DEFINE('_STAT_PHP_VERSION', 'PHP version');
DEFINE('_STAT_MYSQL_VERSION', 'MYSQL version');
DEFINE('_STAT_CACHE', 'Cache');
DEFINE('_STAT_CACHE_ENABLE', 'Enable');
DEFINE('_STAT_CACHE_DISABLE', 'Disable');
DEFINE('_MEMBERS_STAT', 'Members');
DEFINE('_HITS_STAT', 'Hits');
DEFINE('_NEWS_STAT', 'News');
DEFINE('_LINKS_STAT', 'Web Links');
DEFINE('_VISITORS', 'Visitors');

/** /adminstrator */
DEFINE('_ADMIN_USRNAME', 'Login');
DEFINE('_ADMIN_PASS', 'Password');
DEFINE('_ADMIN_ENTER', 'Enter');
DEFINE('_ADMIN_GO_SITE', 'Go site');
DEFINE('_ADMIN_EXIT', 'Exit');
DEFINE('_ADMIN_VIEW_CONTENT', 'View content');
DEFINE('_DETAILS', 'Detalis');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME', '* The 1st Published item in this Menu [mainmenu] is the default `Home page` for the site *');
DEFINE('_MAINMENU_DEL', '* You cannot `delete` this Menu as it is required for the proper operation of Joomla! *');
DEFINE('_MENU_GROUP', '* Some `Menu Types` appear in more than one group *');
DEFINE('_MENU_NEXT', 'Next');
DEFINE('_MENU_BACK', 'Back');
DEFINE('_NOTE_MENU_ITEMS1', '* Pay attention that some points of the menu are included into some groups, but they concern one type of the menu.');
DEFINE('_MODULE_IS_EDITING_MY_ADMIN', 'The module is currently being edited by another administrator');
DEFINE('_LINKS', 'Links');
DEFINE('_MENU_ITEMS_OTHER', 'Menu items other');
DEFINE('_MENU_ITEMS_SEND', 'Menu items send');

/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', 'New User Details');
DEFINE('_NEW_USER_MESSAGE', 'Hello %s,


You have been added as a User to %s by an Administrator.

This e-mail contains your username and password to log into the %s

Username - %s
Password - %s


Please do not respond to this message as it is automatically generated and is for information purposes only');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', "This is an e-mail from '%s'

Message:
");

// Joostina!

DEFINE('_REG_CAPTCHA', 'Type the text shown in the image:*');
DEFINE('_REG_CAPTCHA_VAL', 'You have to enter the code shown in the image.');
DEFINE('_REG_CAPTCHA_REF', 'Click to refresh the image.');

DEFINE('_PRINT_PAGE_LINK', 'Link to the site page');

$bad_text = array();

/* administrator components com_admin */
DEFINE('_FILE_UPLOAD', 'File upload');
DEFINE('_MAX_SIZE', 'Maximum size');
DEFINE('_ABOUT_JOOSTINA', 'About Joostina');
DEFINE('_ABOUT_SYSTEM', 'System info');
DEFINE('_SYSTEM_OS', 'Operating System');
DEFINE('_DB_VERSION', 'Database version');
DEFINE('_PHP_VERSION', 'PHP version');
DEFINE('_APACHE_VERSION', 'Web server');
DEFINE('_PHP_APACHE_INTERFACE', 'Web server/PHP interface');
DEFINE('_JOOSTINA_VERSION', 'Joostina version!');
DEFINE('_BROWSER', 'Browser(User Agent)');
DEFINE('_PHP_SETTINGS', 'PHP Settings');
DEFINE('_RG_EMULATION', 'Emulation of Register Globals');
DEFINE('_REGISTER_GLOBALS', 'Register Globals - registration of global variables');
DEFINE('_MAGIC_QUOTES', 'Magic Quotes option');
DEFINE('_SAFE_MODE', 'Safe Mode');
DEFINE('_SESSION_HANDLING', 'Session handling');
DEFINE('_SESS_SAVE_PATH', 'Session save path');
DEFINE('_PHP_TAGS', 'PHP tags');
DEFINE('_BUFFERING', 'Buffering');
DEFINE('_OPEN_BASEDIR', 'Allowed/open directories');
DEFINE('_ERROR_REPORTING', 'Display errors');
DEFINE('_XML_SUPPORT', 'XML Support');
DEFINE('_ZLIB_SUPPORT', 'Zlib Support');
DEFINE('_DISABLED_FUNCTIONS', 'Disabled functions');
DEFINE('_CONFIGURATION_FILE', 'Configuration file');
DEFINE('_ACCESS_RIGHTS', 'Acces rights');
DEFINE('_DIRS_WITH_RIGHTS', 'ALL directories mentioned below must be writable, for ALL functions and features of Joostina to work properly');
DEFINE('_CACHE_DIRECTORY', 'Cache directory');
DEFINE('_SESSION_DIRECTORY', 'Session directory');
DEFINE('_DATABASE', 'Database');
DEFINE('_TABLE_NAME', 'Table name');
DEFINE('_DB_CHARSET', 'Charset');
DEFINE('_DB_NUM_RECORDS', 'Records');
DEFINE('_DB_SIZE', 'Size');
DEFINE('_FIND', 'Find');
DEFINE('_CLEAR', 'Clear');
DEFINE('_GLOSSARY', 'Glossary');
DEFINE('_DEVELOPERS', 'Developers');
DEFINE('_SUPPORT', 'Support');
DEFINE('_LICENSE', 'License');
DEFINE('_CHANGELOG', 'Chagelog');
DEFINE('_CHECK_VERSION', 'Check Joomla! RE version');
DEFINE('_PREVIEW_SITE', 'Preview site');
DEFINE('_IN_NEW_WINDOW', 'Open in new window');

/* administrator components com_banners */
DEFINE('_BANNERS_MANAGEMENT', 'Banners management');
DEFINE('_EDIT_BANNER', 'Edit banner');
DEFINE('_NEW_BANNER', 'New banner');
DEFINE('_IN_CURRENT_WINDOW', 'In current window');
DEFINE('_IN_PARENT_WINDOW', 'In parent window');
DEFINE('_IN_MAIN_FRAME', 'In main frame');
DEFINE('_BANNER_CLIENTS', 'Banner Clients');
DEFINE('_BANNER_CATEGORIES', 'Banner Categories');
DEFINE('_NO_BANNERS', 'No Banners');
DEFINE('_BANNER_COUNTER_RESETTED', 'Banner counter was reset');
DEFINE('_CHECK_PUBLISH_DATE', 'Check if publication date is right');
DEFINE('_CHECK_START_PUBLICATION_DATE', 'Check the start of publication date');
DEFINE('_CHECK_END_PUBLICATION_DATE', 'Check the end of publication date');
DEFINE('_TASK_UPLOAD', 'Upload');
DEFINE('_BANNERS_PANEL', 'Banners panel');
DEFINE('_BANNERS_DIRECTORY_DOESNOT_EXISTS', 'Banners directory does not exist');
DEFINE('_CHOOSE_BANNER_IMAGE', 'Choose image for upload');
DEFINE('_BAD_FILENAME', 'Filename must contain alpha-numeric symbols without whitespaces.');
DEFINE('_FILE_ALREADY_EXISTS', '#FILENAME# file already exists.');
DEFINE('_BANNER_UPLOAD_ERROR', 'Error uploading #FILENAME#');
DEFINE('_BANNER_UPLOAD_SUCCESS', 'Uploading of #FILENAME# into #DIRNAME# successfully completed');
DEFINE('_UPLOAD_BANNER_FILE', 'Upload banner file');

/* administrator components com_categories */
DEFINE('_CATEGORY_CHANGES_SAVED', 'Category changes saved');
DEFINE('_USER_GROUP_ALL', 'Public');
DEFINE('_USER_GROUP_REGISTERED', 'Registered');
DEFINE('_USER_GROUP_SPECIAL', 'Special');
DEFINE('_CONTENT_CATEGORIES', 'Content categories');
DEFINE('_ALL_CONTENT', 'All content');
DEFINE('_ACTIVE', 'Active');
DEFINE('_IN_TRASH', 'In Trash');
DEFINE('_VIEW_CATEGORY_CONTENT', 'View Category content');
DEFINE('_CHOOSE_MENU_PLEASE', 'Please, choose a menu');
DEFINE('_CHOOSE_MENUTYPE_PLEASE', 'Please, choose a menu type');
DEFINE('_ENTER_MENUITEM_NAME', 'Please, enter a name for this menu item');
DEFINE('_CATEGORY_NAME_IS_BLANK', 'Category must have a name');
DEFINE('_ENTER_CATEGORY_NAME', 'Enter Category name');
DEFINE('_ENTER_CATEGORY_TITLE', 'Enter Category title');
DEFINE('_CATEGORY_ALREADY_EXISTS', 'Category with the same name already exists. Try again.');
DEFINE('_EDIT_CATEGORY', 'Edit');
DEFINE('_NEW_CATEGORY', 'New');
DEFINE('_CATEGORY_PROPERTIES', 'Category Properties');
DEFINE('_CATEGORY_TITLE', 'Category title');
DEFINE('_CATEGORY_NAME', 'Category name');
DEFINE('_SORT_ORDER', 'Sort order');
DEFINE('_IMAGE', 'Image');
DEFINE('_IMAGE_POSTITION', 'Image position');
DEFINE('_MENUITEM', 'Menu item');
DEFINE('_NEW_MENUITEM_IN_YOUR_MENU', 'Creation of the new menu item in your menu.');
DEFINE('_MENU_NAME', 'Menu name');
DEFINE('_CREATE_MENU_ITEM', 'Create menu item');
DEFINE('_EXISTED_MENU_ITEMS', 'Existing menu items');
DEFINE('_NOT_EXISTS', 'Do not exist');
DEFINE('_MENU_LINK_AVAILABLE_AFTER_SAVE', 'Menu link will be available after saving');
DEFINE('_IMAGES_DIRS', 'Image directories (MOSImage)');
DEFINE('_MOVE_CATEGORIES', 'Move Categiries');
DEFINE('_CHOOSE_CATEGORY_SECTION', 'Please, choose a section for category you want to move');
DEFINE('_MOVE_INTO_SECTION', 'Move into section');
DEFINE('_CATEGORIES_TO_MOVE', 'Categories to move');
DEFINE('_CONTENT_ITEMS_TO_MOVE', 'Content items to move');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_MOVED_ALL', 'All <br /> listed Categories and all <br /> listed Content contained in this categories will be moved to selected Section.');
DEFINE('_CATEGORY_COPYING', 'Category copying');
DEFINE('_CHOOSE_CAT_SECTION_TO_COPY', 'Please, choose a Section for Category you want to copy');
DEFINE('_COPY_TO_SECTION', 'Copy to section');
DEFINE('_CATS_TO_COPY', 'Categories to copy');
DEFINE('_CONTENT_ITEMS_TO_COPY', 'Content items to copy');
DEFINE('_IN_SELECTED_SECTION_WILL_BE_COPIED_ALL', 'All <br /> listed Categories and all <br /> listed Content contained in this categories will be copied to selected Section.');
DEFINE('_COMPONENT', 'Component');
DEFINE('_BEFORE_CREATION_CAT_CREATE_SECTION', 'You must create at least one Section before creating Categories');
DEFINE('_CATEGORY_IS_EDITING_NOW', '#CATNAME# Category is edited by other Administrator at the moment');
DEFINE('_TABLE_WEBLINKS_CATEGORY', 'Table - Weblinks category');
DEFINE('_TABLE_NEWSFEEDS_CATEGORY', 'Table - Newsfeeds category');
DEFINE('_TABLE_CATEGORY_CONTACTS', 'Table - Category contacts');
DEFINE('_TABLE_CATEGORY_CONTENT', 'Table - Category content');
DEFINE('_BLOG_CATEGORY_CONTENT', 'Blog - Category content');
DEFINE('_BLOG_CATEGORY_ARCHIVE', 'Blog - Category archive');
DEFINE('_USE_SECTION_SETTINGS', 'Use Section settings');
DEFINE('_CMN_ALL', 'All');
DEFINE('_CHOOSE_CATEGORY_TO_REMOVE', 'Choose Category to remove');
DEFINE('_CANNOT_REMOVE_CATEGORY', 'Category: #CIDS# cannot be removed, because it contains records');
DEFINE('_CHOOSE_CATEGORY_FOR_', 'Choose category for');
DEFINE('_CHOOSE_OBJECT_TO_MOVE', 'Choose object to move');
DEFINE('_CATEGORIES_MOVED_TO', 'Categories moved to ');
DEFINE('_CATEGORY_MOVED_TO', 'Category moved to ');
DEFINE('_CATEGORIES_COPIED_TO', 'Categories copied to ');
DEFINE('_CATEGORY_COPIED_TO', 'Category copied to ');
DEFINE('_NEW_ORDER_SAVED', 'New order saved');
DEFINE('_SAVE_AND_ADD', 'Save and Add');
DEFINE('_CLOSE', 'Close');
DEFINE('_CREATE_CONTENT', 'Create Content');
DEFINE('_MOVE', 'Move');
DEFINE('_COPY', 'Copy');

/* administrator components com_checkin */
DEFINE('_BLOCKED_OBJECTS', 'Blocked objects');
DEFINE('_OBJECT', 'Object');
DEFINE('_WHO_BLOCK', 'Blocked by');
DEFINE('_BLOCK_TIME', 'Block time');
DEFINE('_ACTION', 'Action');
DEFINE('_GLOBAL_CHECKIN', 'Global check-in');
DEFINE('_TABLE_IN_DB', 'Table in Database');
DEFINE('_OBJECT_COUNT', 'Amount of objects');
DEFINE('_UNBLOCKED', 'Unblocked');
DEFINE('_CHECHKED_TABLE', 'Checked table');
DEFINE('_ALL_BLOCKED_IS_UNBLOCKED', 'All blocked objects are unblocked');
DEFINE('_MINUTES', 'minutes');
DEFINE('_HOURS', 'hours');
DEFINE('_DAYS', 'days');
DEFINE('_ERROR_WHEN_UNBLOCKING', 'An error occured while unblocking');
DEFINE('_UNBLOCKED2', 'unblocked');

/* administrator components com_config */
DEFINE('_CONFIGURATION_IS_UPDATED', 'Configuration successfully updated');
DEFINE('_CANNOT_OPEN_CONF_FILE', 'Error! Cannot open Configuration file!');
DEFINE('_DO_YOU_REALLY_WANT_DEL_AUTENT_METHOD', 'Do you really want to change `Session authentication method`? \n\n This action will delete all existing frontend sessions \n\n');
DEFINE('_GLOBAL_CONFIG', 'Global Configuration');
DEFINE('_PROTECT_AFTER_SAVE', 'Write-protect after saving');
DEFINE('_IGNORE_PROTECTION_WHEN_SAVE', 'Ignore record protection while saving');
DEFINE('_CONFIG_SAVING', 'Configuration saving');
DEFINE('_NOT_AVAILABLE_CHECK_RIGHTS', 'Rights check is not available');
DEFINE('_SITE_NAME', 'Site name');
DEFINE('_SITE_LANGUAGE', 'Site language:');
DEFINE('_SITE_OFFLINE', 'Site offline');
DEFINE('_SITE_OFFLINE_MESSAGE', 'Site offline Message');
DEFINE('_SITE_OFFLINE_MESSAGE2', 'Message, which will be displayed to users, when site is offline.');
DEFINE('_SYSTEM_ERROR_MESSAGE', 'System error message');
DEFINE('_SYSTEM_ERROR_MESSAGE2', 'Message, which will be displayed to users, when Joostina! cannot connect to MySQL database.');
DEFINE('_SHOW_READMORE_TO_AUTH', 'Show \"Read moreЕ\" to guests');
DEFINE('_SHOW_READMORE_TO_AUTH2', 'If set to YES, guests will be able to see links to Content with -Registered- access level. But user will have to login to see full text.');
DEFINE('_ENABLE_USER_REGISTRATION', 'Enable user registration');
DEFINE('_ENABLE_USER_REGISTRATION2', 'If set to YES, users will have permission to register on site.');
DEFINE('_ACCOUNT_ACTIVATION', 'Enable New accounts avivation');
DEFINE('_ACCOUNT_ACTIVATION2', 'If set to YES, user will need to activate new account, after receiving an e-mail message with a link for account activation.');
DEFINE('_UNIQUE_EMAIL', 'Demand unique E-mail');
DEFINE('_UNIQUE_EMAIL2', 'If set to YES, users will not be able to create multiple accounts using the same e-mail address.');
DEFINE('_USER_PARAMS', 'User site parameters');
DEFINE('_USER_PARAMS2', 'If set to NO, users will not be able to use their own site parameters(like Editor selection)');
DEFINE('_DEFAULT_EDITOR', 'Default WYSIWYG-editor');
DEFINE('_LIST_LIMIT', 'List limit(rows amount)');
DEFINE('_LIST_LIMIT2', 'Set length of the lists by default in Control panel for all users');
DEFINE('_FRONTPAGE', 'Frontpage');
DEFINE('_SITE', 'Site');
DEFINE('_CUSTOM_PRINT', 'Page print from template catalogue');
DEFINE('_CUSTOM_PRINT2', 'Usage of custom page for print view from the catalogue of current template');
DEFINE('_MODULES_MULTI_LANG', 'Allow multilingual modules');
DEFINE('_MODULES_MULTI_LANG2', 'Allow system to verify module lang-files/ If there are no such modules, then better set to NO');
DEFINE('_DATE_FORMAT_TXT', 'Date format');
DEFINE('_DATE_FORMAT2', 'Choose format for date display. You need to use format in accordance with strftime maxims.');
DEFINE('_DATE_FORMAT_FULL', 'Full date and time format');
DEFINE('_DATE_FORMAT_FULL2', 'Choose full format for date and time display. You need to use format in accordance with strftime maxims.');
DEFINE('_USE_H1_FOR_HEADERS', 'Use H1 tags for Content headers in Full view');
DEFINE('_USE_H1_FOR_HEADERS2', 'Frame Content headers in H1 tags only when viewing full content text(by clicking on Read moreЕ link).');
DEFINE('_USE_H1_HEADERS_ALWAYS', 'Use H1 tags for all Content headers');
DEFINE('_USE_H1_HEADERS_ALWAYS2', 'Always frame Content headers in H1 tags.');
DEFINE('_DISABLE_RSS', 'Disable RSS(syndicate) generation');
DEFINE('_DISABLE_RSS2', 'If set to YES, possibility for RSS-feeds generation(and also its operation) will be not available');
DEFINE('_USE_TEMPLATE', 'Use template');
DEFINE('_USE_TEMPLATE2', 'After choosing a template, it will be used everywhere on the site regardless of manu items snapped to other templates. If you need to use several templates, the choose \\\'Different\\\'');
DEFINE('_FAVICON_IMAGE', 'Favicon image in browser Bookmarks');
DEFINE('_FAVICON_IMAGE2', 'Favicon image in browser Favourites. If this is not set or favicon file is not found, then favicon.ico will be used by default.');
DEFINE('_FAVICON_IMAGE3', 'Favicon image in Bookmarks');
DEFINE('_DISABLE_FAVICON', 'Disable favicon');
DEFINE('_DISABLE_FAVICON2', 'Use favicon as default site icon');
DEFINE('_DISABLE_SYSTEM_MAMBOTS', 'Disable System mambots');
DEFINE('_DISABLE_SYSTEM_MAMBOTS2', 'If set to YES, usage of System mambots will be disabled. NOTICE, if site uses any mambots of this group, then activation of this parameter is not recommended');
DEFINE('_DISABLE_CONTENT_MAMBOTS', 'Disable Content mambots');
DEFINE('_DISABLE_CONTENT_MAMBOTS2', 'If set to YES, usage of mambots for Content manipulation will be disabled. NOTICE, if site uses any mambots of this group, then activation of this parameter is not recommended');
DEFINE('_DISABLE_MAINBODY_MAMBOTS', 'Disable Mainbody mambots');
DEFINE('_DISABLE_MAINBODY_MAMBOTS2', 'If set to YES, usage of mambots for components stack manipulation(mainbody) will be disabled.');
DEFINE('_SITE_AUTH', 'Site authorization');
DEFINE('_SITE_AUTH2', 'If set to NO, page for logging-in to the site will be disabled, if there is no munu item connected to it. Regisstration possibility will be disabled too');
DEFINE('_FRONT_SESSION_TIME', 'Front session lifetime');
DEFINE('_FRONT_SESSION_TIME2', 'Auto log out Users after they have been inactive for the entered number of minutes. Very high values can affect site security.');
DEFINE('_DISABLE_FRONT_SESSIONS', 'Disable front Sessions');
DEFINE('_DISABLE_FRONT_SESSIONS2', 'If set to YES, Sessions will be disabled for all site Users. If you do not need user counting and registration is disabled, the you can turn this off.');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT', 'Disable Control of Content access');
DEFINE('_DISABLE_ACCESS_CHECK_TO_CONTENT2', 'If set to YES, Control of Content access will be disabled, and all Users will be able to view all Content. Recommended to use with authorization and sessions desactivation parameters.');
DEFINE('_COUNT_CONTENT_HITS', 'Count Content hits');
DEFINE('_COUNT_CONTENT_HITS2', 'If disabled, statistics of content hits will be not available.');
DEFINE('_DISABLE_CHECK_CONTENT_DATE', 'Disable Content date ckecking');
DEFINE('_DISABLE_CHECK_CONTENT_DATE2', 'If time spans for Content publication are not important on the site, then it is better to activate this parameter.');
DEFINE('_DISABLE_MODULES_WHEN_EDIT', 'Disable Modules during editing');
DEFINE('_DISABLE_MODULES_WHEN_EDIT2', 'If set to YES, all Modules will be disabled during editing Content on the frontend');
DEFINE('_COUNT_GENERATION_TIME', 'Count page generation time');
DEFINE('_COUNT_GENERATION_TIME2', 'If set to YES, time of page generation will be displayed on all site pages');
DEFINE('_ENABLE_GZIP', 'GZIP Page Compression');
DEFINE('_ENABLE_GZIP2', 'Compress buffered output if supported. Activation of this function will reduce page size and traffic usage, but in the same time server load will go up.');
DEFINE('_IS_SITE_DEBUG', 'Debug System');
DEFINE('_IS_SITE_DEBUG2', 'If set to YES, diagnostic information, SQL queries and errors(if present) will be displayed.');
DEFINE('_EXTENDED_DEBUG', 'Extended Debug');
DEFINE('_EXTENDED_DEBUG2', 'Use Extended debug for site front, which will display much information about site.');
DEFINE('_CONTROL_PANEL', 'Control Panel');
DEFINE('_DISABLE_ADMIN_SESS_DEL', 'Disable Sessions deletion in Control Panel');
DEFINE('_DISABLE_ADMIN_SESS_DEL2', 'Disallow to detele sessions even after their time-out.');
DEFINE('_DISABLE_HELP_BUTTON', 'Disable "Help" button');
DEFINE('_DISABLE_HELP_BUTTON2', 'Allows you to hide the help button in Control Panel toolbar.');
DEFINE('_USE_OLD_TOOLBAR', 'Use Old Toolbar display');
DEFINE('_USE_OLD_TOOLBAR2', 'If enabled, toolbar buttons interface will be displayed in table mode, as it was in Joomla.');
DEFINE('_DISABLE_IMAGES_TAB', 'Disable "Images" tab');
DEFINE('_DISABLE_IMAGES_TAB2', 'Allows you to disable Images tab display during Content editing.');
DEFINE('_ADMIN_SESS_TIME', 'Session time in Control Panel');
DEFINE('_SECONDS', 'seconds');
DEFINE('_ADMIN_SESS_TIME2', 'Auto logout Users of <strong>Admin CP</strong> after they have been inactive for preset time. Very high values can affect site security!');
DEFINE('_SAVE_LAST_PAGE', 'Save page of Admin CP after Session ending');
DEFINE('_SAVE_LAST_PAGE2', 'If you enter Admin CP within 10 minutes after ending of current Session, then after logging in you will be redirected to the page you were browsing before that');
DEFINE('_HTML_CSS_EDITOR', 'Visual Editor for Html and CSS');
DEFINE('_HTML_CSS_EDITOR2', 'Use Editor with syntax highlighting for editing of HTML and CSS template files');
DEFINE('_THIS_PARAMS_CONTROL_CONTENT', '* This Parameters control the Output of Content Elements *');
DEFINE('_LINK_TITLES', 'Title Linkable');
DEFINE('_LINK_TITLES2', 'If set to YES, the Title of Articles will be hyperlinked to the Article itself');
DEFINE('_READMORE_LINK', '"Read moreЕ" link');
DEFINE('_READMORE_LINK2', 'If set to Show, then a -Read moreЕ- link will be showed to view full content');
DEFINE('_VOTING_ENABLE', 'Rating/Voting');
DEFINE('_VOTING_ENABLE2', 'If set to Show, then -Rating/Voting- system will be enabled');
DEFINE('_AUTHOR_NAMES', 'Author Names');
DEFINE('_AUTHOR_NAMES2', 'Choose if Name of the Author will be displayed. This a global setting but can be changed at Menu and Article levels.');
DEFINE('_DATE_TIME_CREATION', 'Created Date and Time');
DEFINE('_DATE_TIME_CREATION2', 'If set to Show, the date and time an Article was created will be displayed. This a global setting but can be changed at Menu and Article levels.');
DEFINE('_DATE_TIME_MODIFICATION', 'Modified Date and Time');
DEFINE('_DATE_TIME_MODIFICATION2', 'If set to Show, the date and time an Article was last modified will be displayed. This a global setting but can be changed at Menu and Article levels.');
DEFINE('_VIEW_COUNT', 'Hits');
DEFINE('_VIEW_COUNT2', 'If set to Show, the number for Hits on a particular Article will be displayed. This a global setting but can be changed at Menu and Article levels.');
DEFINE('_LINK_PRINT', 'Print link');
DEFINE('_LINK_EMAIL', 'E-mail link');
DEFINE('_PRINT_EMAIL_ICONS', 'Print and E-mail icons');
DEFINE('_PRINT_EMAIL_ICONS2', 'If set to Show, then Print and E-mail links will be displaye as icons, otherwise - they will be just a text-link.');
DEFINE('_ENABLE_TOC', 'Enable Table of Contents');
DEFINE('_BACK_BUTTON', 'Enable Back button');
DEFINE('_CONTENT_NAV', 'Content Navigation');
DEFINE('_UNIQ_ITEMS_IDS', 'Unique Article IDs');
DEFINE('_UNIQ_ITEMS_IDS2', 'If enabled, unique style ID will be defined for every Article in the list.');
DEFINE('_AUTO_PUBLICATION_FRONT', 'Auto publication on front-end');
DEFINE('_AUTO_PUBLICATION_FRONT2', 'If enabled, all created Content will be automatically selected for publication on the Frontpage.');
DEFINE('_DISABLE_BLOCK', 'Disable Content blocking');
DEFINE('_DISABLE_BLOCK2', 'If enabled, parameters of Content elements blocking will be not included. Not recommended to use for sites with many Editors.');
DEFINE('_ITEMID_COMPAT', 'Itemid compatible');
DEFINE('_ONE_EDITOR', 'Use single(united) Editor field');
DEFINE('_ONE_EDITOR2', 'Use the same field for Intro and Main text input.');
DEFINE('_LOCALE', 'Locale');
DEFINE('_TIME_OFFSET', 'Time zone (time offset concerning UTC, hours)');
DEFINE('_TIME_OFFSET2', 'Current date and time, which will be displayed on the site:');
DEFINE('_TIME_DIFF', 'Difference between preset/server time, hours');
DEFINE('_TIME_DIFF2', 'RSS (time offset concerning UTC, hours)');
DEFINE('_CURR_DATE_TIME_RSS', 'Current date and time to display in RSS');
DEFINE('_COUNTRY_LOCALE', 'Country locale');
DEFINE('_COUNTRY_LOCALE2', 'Defines regional country settings: displaying of date, time, numbers etc.');
DEFINE('_LOCALE_WINDOWS', 'Windows users must type <span style="color: red"><strong>RU</strong></span>.
	  <br />If default value is not working for Unix-systems, then you can try to change case of locale symbols to <strong>RU_RU.CP1251, ru_RU.cp1251, ru_ru.CP1251</strong>, or to inquire about the value of russian locale from your provider.<br />
Also you can try to type one of the following locales: <strong>rus, russian</strong>');
DEFINE('_DB_HOST', 'MySQL host address');
DEFINE('_DB_USER', 'DB Username (MySQL)');
DEFINE('_DB_NAME', 'Database name');
DEFINE('_DB_PREFIX', 'Database Prefix');
DEFINE('_DB_PREFIX2', '<strong>WARNING!</strong> Do not change if you already have an operable Database. Otherwise, you can lose access to this database!!!');
DEFINE('_EVERYDAY_OPTIMIZATION', 'Daily DB tables Optimization');
DEFINE('_EVERYDAY_OPTIMIZATION2', 'If set to YES, then Database will be automatically optimized every twenty-four hours to get better performance');
DEFINE('_OLD_MYSQL_SUPPORT', 'Old MySQL versions Support');
DEFINE('_OLD_MYSQL_SUPPORT2', 'This parameter allows you to disable automatic transition of Database operation into Cyrillic compatibility mode');
DEFINE('_DISABLE_SET_SQL', 'Disable SET sql_mode');
DEFINE('_DISABLE_SET_SQL2', 'Disable transition of Database operation into SET sql_mode');
DEFINE('_SERVER', 'Server');
DEFINE('_ABS_PATH', 'Absolute path (site root)');
DEFINE('_MEDIA_ROOT', 'Root of Media manager');
DEFINE('_MEDIA_ROOT2', 'Root directory for operation of Media-files management Component. Path from site root without / on the edges.');
DEFINE('_FILE_ROOT', 'Filemanager root');
DEFINE('_FILE_ROOT2', 'Root directory for operation of Media-files management Component. Without / at the end. If using Windows (c) path can start with the character of disk label.');
DEFINE('_SECRET_WORD', 'Secret word');
DEFINE('_GZ_CSS_JS', 'Compression of CSS and JS files');
DEFINE('_SESSION_TYPE', 'Method for Session identification');
DEFINE('_SESSION_TYPE2', 'Do not cahnge if you do not know what this is for!<br /><br /> If site will be oriented on users of AOL service who use proxy-servers to access the site, then you can use 2nd level Settings');
DEFINE('_HELP_SERVER', 'Help Server');
DEFINE('_HELP_SERVER2', 'Help Server - if blank, then Help files are choosen from local folder http://your_site/help/, To enable Server of On-Line Help type http://help.joom.ru or http://help.joomla.org');
DEFINE('_FILE_MODE', 'Files creation');
DEFINE('_FILE_MODE2', 'Permissions to access files');
DEFINE('_FILE_MODE3', 'Disable CHMOD change for new files (use server defaults)');
DEFINE('_FILE_MODE4', 'Set CHMOD for new files');
DEFINE('_FILE_MODE5', 'Choose this item to set access rights for newly created files');
DEFINE('_OWNER', 'Owner');
DEFINE('_O_READ', 'reading');
DEFINE('_O_WRITE', 'writing');
DEFINE('_O_EXEC', 'execution');
DEFINE('_APPLY_TO_FILES', 'Apply to existing files');
DEFINE('_APPLY_TO_FILES2', 'This changes will be applied to <em>all existing files</em> on the site.<br/><strong>INCORRECT USAGE OF THIS OPTION CAN LEAD TO DISABILITY OF THE SITE!</strong>');
DEFINE('_DIR_CREATION', 'Directories creation');
DEFINE('_DIR_CREATION2', 'Permission for access to directories');
DEFINE('_DIR_CREATION3', 'Disable CHMOD change for new directories (use server defaults)');
DEFINE('_DIR_CREATION4', 'Set CHMOD for new directories');
DEFINE('_DIR_CREATION5', 'Choose this item to set access rights for newly created directories');
DEFINE('_O_SEARCH', 'search');
DEFINE('_APPLY_TO_DIRS', 'Apply to existing directories');
DEFINE('_APPLY_TO_DIRS2', 'Activation of this option will be applied to <em>all existing directories</em> on the site.<br/>' . '<strong>INCORRECT USAGE OF THIS OPTION CAN LEAD TO DISABILITY OF THE SITE!</strong>');
DEFINE('_O_GROUP', 'Group');
DEFINE('_O_AS', 'as');
DEFINE('_RG_EMULATION_TXT', 'Emulation of Global variables registration');
DEFINE('_RG_DISABLE', 'Disable (Recommended) - extra security');
DEFINE('_RG_ENABLE', 'Enable (Not recommended) - compatibility with old exstensions, can impair site security.');
DEFINE('_METADATA', 'Metadata');
DEFINE('_SITE_DESC', 'Site description, which is indexed by Search Engines');
DEFINE('_SITE_DESC2', ' You do not need to limit your description to twenty symbols, according to Search Server you planned to use. Description have to be short and suitable for the content of your site. You can include some of your keywords and key-phrases. As some Servers read more then 20 words, so you can add one or two sentences. Please, make sure that most important part of your description remains in first 20 words.');
DEFINE('_SITE_KEYWORDS', 'Site keywords');
DEFINE('_SHOW_TITLE_TAG', 'Show <strong>title</strong> meta-tag');
DEFINE('_SHOW_TITLE_TAG2', 'Shows <strong>title</strong> meta-tag while viewing Content elements');
DEFINE('_SHOW_AUTHOR_TAG', 'Show <strong>author</strong> meta-tag');
DEFINE('_SHOW_AUTHOR_TAG2', 'Shows <strong>author</strong> meta-tag while viewing Content elements');
DEFINE('_SHOW_BASE_TAG', 'Show <strong>base</strong> meta-tag');
DEFINE('_SHOW_BASE_TAG2', 'Shows <strong>base</strong> meta-tag inside the body of every page');
DEFINE('_REVISIT_TAG', 'Value of <strong>revisit</strong> tag');
DEFINE('_REVISIT_TAG2', 'Set value of <strong>revisit</strong> tag, in days');
DEFINE('_DISABLE_GENERATOR_TAG', 'Disable Generator tag');
DEFINE('_DISABLE_GENERATOR_TAG2', 'If set to YES, then name=\\\'Generator\\\' tag will be excepted from the code of every HTML page');
DEFINE('_EXT_IND_TAGS', 'Extended indexing tags');
DEFINE('_EXT_IND_TAGS2', 'If set to YES, special tags will be added to the code of every page to provide better indexation');
DEFINE('_MAIL', 'Mail');
DEFINE('_MAIL_METHOD', 'Mailer');
DEFINE('_MAIL_FROM_ADR', 'Mail from');
DEFINE('_MAIL_FROM_NAME', 'From Name');
DEFINE('_SENDMAIL_PATH', 'Sendmail Path');
DEFINE('_USE_SMTP', 'Use SMTP Authentication');
DEFINE('_USE_SMTP2', 'Select YES if your SMTP Host requires SMTP Authentication.');
DEFINE('_SMTP_USER', 'SMTP Username');
DEFINE('_SMTP_USER2', 'Fill in if you use SMTP Host that requires SMTP Authentication for mailing');
DEFINE('_SMTP_PASS', 'SMTP Password');
DEFINE('_SMTP_PASS2', 'Fill in if you use SMTP Host that requires SMTP Authentication for mailing');
DEFINE('_SMTP_SERVER', 'SMTP Host');
DEFINE('_CACHE', 'Cache');
DEFINE('_ENABLE_CACHE', 'Enable Cache');
DEFINE('_ENABLE_CACHE2', 'Activation of Cache reduces queries to MySQL and decreases Server load');
DEFINE('_CACHE_OPTIMIZATION', 'Cache optimization');
DEFINE('_CACHE_OPTIMIZATION2', 'Automatically removes unnecessary symbols from Cache files, thereby reducing size of the files.');
DEFINE('_AUTOCLEAN_CACHE_DIR', 'Automatic cleanup of the Cache directory');
DEFINE('_AUTOCLEAN_CACHE_DIR2', 'Automatically cleanup Cache directory, thereby deleting expired files.');
DEFINE('_CACHE_MENU', 'Cache menu in Admin CP');
DEFINE('_CACHE_MENU2', 'Activation of the Menu caching in Admin CP. Works independently of standart Cache.');
DEFINE('_CANNOT_CACHE', 'Cannot cache');
DEFINE('_CANNOT_CACHE2', '<font color="red"><strong>Cache directory is not writable.</strong></font>');
DEFINE('_CACHE_DIR', 'Cache directory');
DEFINE('_CACHE_DIR2', 'Current cache directory is <strong>writable</strong>');
DEFINE('_CACHE_DIR3', 'Current cache directory is <strong>NOT WRITABLE</strong> - set directory CHMOD to 755 before Cache activation');
DEFINE('_CACHE_TIME', 'Cache lifetime');
DEFINE('_DB_CACHE', 'Cache Database queries');
DEFINE('_DB_CACHE_TIME', 'Cache lifetime for Database queries');
DEFINE('_STATICTICS', 'Statistics');
DEFINE('_ENABLE_STATS', 'Enable Statistics gathering');
DEFINE('_ENABLE_STATS2', 'Enable/Disable Site statistics gathering');
DEFINE('_STATS_HITS_DATE', 'Gather Date statistics about Content viewing');
DEFINE('_STATS_HITS_DATE2', 'WARNING: This mode records large data capacity!');
DEFINE('_STATS_SEARCH_QUERIES', 'Statistics of Search queries');
DEFINE('_SEF_URLS', 'Search Engine Friendly URLs');
DEFINE('_SEF_URLS2', 'Apache users only! Rename htaccess.txt to .htaccess before activating. This is necessary for mod_rewrite activation');
DEFINE('_DYNAMIC_PAGETITLES', 'Dynamic Page titles (title tags)');
DEFINE('_DYNAMIC_PAGETITLES2', 'Dynamic Page titles alteration concerning to viewing of the current Content');
DEFINE('_CLEAR_FRONTPAGE_LINK', 'Clean com_frontpage link');
DEFINE('_CLEAR_FRONTPAGE_LINK2', 'Form a shorter state for the links of Frontpage component.');
DEFINE('_DISABLE_PATHWAY_ON_FRONT', 'Hide pathway on the frontpage');
DEFINE('_DISABLE_PATHWAY_ON_FRONT2', 'If enabled, \\\'Home\\\' string will be replaced by the symbol of nonbraking space on the frontpage.');
DEFINE('_TITLE_ORDER', 'Order of Title elements');
DEFINE('_TITLE_ORDER2', 'Order of Page title elements (title tag)');
DEFINE('_TITLE_SEPARATOR', 'Separator of Title elements');
DEFINE('_TITLE_SEPARATOR2', 'Separator of Page title elements (title tag). Hyphen by default.');
DEFINE('_INDEX_PRINT_PAGE', 'Index print pages');
DEFINE('_INDEX_PRINT_PAGE2', 'If set to YES, print content version will be available for indexation');
DEFINE('_REDIR_FROM_NOT_WWW', 'Redirect from other then WWW addresses');
DEFINE('_REDIR_FROM_NOT_WWW2', 'When entering the site from site.com link, everybody will be automatically redirected to www.site.com');
DEFINE('_ADMIN_CAPTCHA', 'For Admin CP authorization');
DEFINE('_ADMIN_CAPTCHA2', 'Use captcha for more secure authorization in Admin CP.');
DEFINE('_REGISTRATION_CAPTCHA', 'For registration');
DEFINE('_REGISTRATION_CAPTCHA2', 'Use captcha for more secure registration.');
DEFINE('_CONTACTS_CAPTCHA', 'For Contacts form');
DEFINE('_CONTACTS_CAPTCHA2', 'Use captcha for more secure Contacts form.');

DEFINE('_O_OTHER', 'Other');
DEFINE('_SECURITY_LEVEL3', '3rd Security Level - Default - Recommended');
DEFINE('_SECURITY_LEVEL2', '2nd Security Level - Allowed for proxy IP-addresses');
DEFINE('_SECURITY_LEVEL1', '1st Security Level - Inverse compatibility');
DEFINE('_PHP_MAIL_FUNCTION', 'PHP-mail Function');
DEFINE('_CONSTRUCT_ERROR', 'Construct error');

DEFINE('_TIME_OFFSET_M_12', '(UTC -12:00) International Date Line West');
DEFINE('_TIME_OFFSET_M_11', '(UTC -11:00) Midway Island, Samoa');
DEFINE('_TIME_OFFSET_M_10', '(UTC -10:00) Hawaii');
DEFINE('_TIME_OFFSET_M_9_5', '(UTC -09:30) Taiohae, Marquesas Islands');
DEFINE('_TIME_OFFSET_M_9', '(UTC -09:00) Alaska');
DEFINE('_TIME_OFFSET_M_8', '(UTC -08:00) Pacific Time (US &amp; Canada)');
DEFINE('_TIME_OFFSET_M_7', '(UTC -07:00) Mountain Time (US &amp; Canada)');
DEFINE('_TIME_OFFSET_M_6', '(UTC -06:00) Central Time (US &amp; Canada), Mexico City');
DEFINE('_TIME_OFFSET_M_5', '(UTC -05:00) Eastern Time (US &amp; Canada), Bogota, Lima');
DEFINE('_TIME_OFFSET_M_4', '(UTC -04:00) Atlantic Time (Canada), Caracas, La Paz');
DEFINE('_TIME_OFFSET_M_3_5', '(UTC -03:30) St. John`s, Newfoundland and Labrador');
DEFINE('_TIME_OFFSET_M_3', '(UTC -03:00) Brazil, Buenos Aires, Georgetown');
DEFINE('_TIME_OFFSET_M_2', '(UTC -02:00) Mid-Atlantic');
DEFINE('_TIME_OFFSET_M_1', '(UTC -01:00 hour) Azores, Cape Verde Islands');
DEFINE('_TIME_OFFSET_M_0', '(UTC 00:00) Western Europe Time, London, Lisbon, Casablanca');
DEFINE('_TIME_OFFSET_P_1', '(UTC +01:00 hour) Berlin, Brussels, Copenhagen, Madrid, Paris');
DEFINE('_TIME_OFFSET_P_2', '(UTC +02:00) Kaliningrad, South Africa');
DEFINE('_TIME_OFFSET_P_3', '(UTC +03:00) Baghdad, Riyadh, Moscow, St. Petersburg');
DEFINE('_TIME_OFFSET_P_3_5', '(UTC +03:30) Tehran');
DEFINE('_TIME_OFFSET_P_4', '(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi');
DEFINE('_TIME_OFFSET_P_4_5', '(UTC +04:30) Kabul');
DEFINE('_TIME_OFFSET_P_5', '(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent');
DEFINE('_TIME_OFFSET_P_5_5', '(UTC +05:30) Bombay, Calcutta, Madras, New Delhi');
DEFINE('_TIME_OFFSET_P_5_75', '(UTC +05:45) Kathmandu');
DEFINE('_TIME_OFFSET_P_6', '(UTC +06:00) Almaty, Dhaka, Colombo');
DEFINE('_TIME_OFFSET_P_6_5', '(UTC +06:30) Yagoon');
DEFINE('_TIME_OFFSET_P_7', '(UTC +07:00) Bangkok, Hanoi, Jakarta');
DEFINE('_TIME_OFFSET_P_8', '(UTC +08:00) Beijing, Perth, Singapore, Hong Kong');
DEFINE('_TIME_OFFSET_P_8_75', '(UTC +08:45) Western Australia');
DEFINE('_TIME_OFFSET_P_9', '(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk');
DEFINE('_TIME_OFFSET_P_9_5', '(UTC +09:30) Adelaide, Darwin');
DEFINE('_TIME_OFFSET_P_10', '(UTC +10:00) Eastern Australia, Guam, Vladivostok');
DEFINE('_TIME_OFFSET_P_10_5', '(UTC +10:30) Lord Howe Island (Australia)');
DEFINE('_TIME_OFFSET_P_11', '(UTC +11:00) Magadan, Solomon Islands, New Caledonia');
DEFINE('_TIME_OFFSET_P_11_5', '(UTC +11:30) Norfolk Island');
DEFINE('_TIME_OFFSET_P_12', '(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka');
DEFINE('_TIME_OFFSET_P_12_75', '(UTC +12:45) Chatham Island');
DEFINE('_TIME_OFFSET_P_13', '(UTC +13:00) Tonga');
DEFINE('_TIME_OFFSET_P_14', '(UTC +14:00) Kiribati');

/* administrator components com_contact */
DEFINE('_CONTACT_MANAGEMENT', 'Contact management');
DEFINE('_ON_SITE', 'On Site');
DEFINE('_RELATED_WITH_USER', 'Related with User');
DEFINE('_CHANGE_CONTACT', 'Change Contact');
DEFINE('_CHANGE_CATEGORY', 'Change Category');
DEFINE('_CHANGE_USER', 'Change user');
DEFINE('_ENTER_NAME_PLEASE', 'You must provide a name for this Contact');
DEFINE('_NEW_CONTACT', 'New');
DEFINE('_CONTACT_DETAILS', 'Contact details');
DEFINE('_USER_POSITION', 'Position');
DEFINE('_ADRESS_STREET_HOUSE', 'Street Address');
DEFINE('_CITY', 'Town/Suburb');
DEFINE('_STATE', 'State');
DEFINE('_COUNTRY', 'Country');
DEFINE('_POSTCODE', 'Postal Code/ZIP');
DEFINE('_ADDITIONAL_INFO', 'Additional information');
DEFINE('_PUBLISH_INFO', 'Publish info');
DEFINE('_POSITION', 'Position');
DEFINE('_IMAGES_INFO', 'Images info');
DEFINE('_PARAMETERS', 'Parameters');
DEFINE('_CONTACT_PARAMS', '*This parameters control Contact display only when viewing contact info*');

/* administrator components com_quickicons */
DEFINE('_QUICK_BUTTONS', 'Quick access buttons');
DEFINE('_DISPLAY_METHOD', 'Display method');
DEFINE('_DISPLAY_ONLY_TEXT', 'Only text');
DEFINE('_DISPLAY_ONLY_ICON', 'Only icon');
DEFINE('_DISPLAY_TEXT_AND_ICON', 'Text and icon');
DEFINE('_PRESS_TO_EDIT_ELEMENT', 'Press to edit element');
DEFINE('_EDIT_BUTTON', 'Button editing');
DEFINE('_BUTTON_TEXT', 'Button text');
DEFINE(' _BUTTON_TITLE', 'Help');
DEFINE('_BUTTON_TITLE_TIP', '<strong>Optional</strong><br/>Here you can define the text for the pop-up help.<br/>It is very important to fill this property if you have chosen display only pictures!');
DEFINE('_BUTTON_LINK_TIP', 'Reference for a site or component call.<br/>For components in system the reference should be as following:<br/>index2.php? option=com_joomlastats&task=stats [joomlastats - is a component, &task=stats is a call of certain function of a component].<br/>External references should be<strong>absolute references</strong>(for example: http://wwwЕ.)!');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW', 'In a new window');
DEFINE('_BUTTON_LINK_IN_NEW_WINDOW_TIP', 'The Reference will be opened in a new window');
DEFINE('_BUTTON_ORDER', 'To place after');
DEFINE('_BUTTONS_TAB_GENERAL', 'General');
DEFINE('_BUTTONS_TAB_DISPLAY', 'Display');
DEFINE(' _DISPLAY_BUTTON', 'To display');
DEFINE('_PRESS_TO_CHOOSE_ICON', 'Press to choose picture (will be opened in a new window)');
DEFINE('_CHOOSE_ICON', 'To choose a picture');
DEFINE('_CHOOSE_ICON_TIP', 'Please, choose a picture for this button. If wish to load your own picture for the button it should be loaded in ../administrator/images- ../images ../images/icons');
DEFINE('_PLEASE_ENTER_NUTTON_LINK', 'It is required the picture');
DEFINE('_PLEASE_ENTER_BUTTON_TEXT', 'Please, fill the field Text');
DEFINE('_BUTTON_ERROR_PUBLISHING', 'Publication error');
DEFINE('_BUTTON_ERROR_UNPUBLISHING', 'Unpublishing error');
DEFINE('_BUTTONS_DELETED', 'Buttons are successfully removed');
DEFINE('_CHANGE_QUICK_BUTTONS', 'Change quick access buttons');

/* administrator components com_sections */
DEFINE('_SECTION_CHANGES_SAVED', 'Section changes are saved');
DEFINE('_CONTENT_SECTIONS', 'Contents sections');
DEFINE('_SECTION_NAME', 'Section name');
DEFINE('_SECTION_CATEGORIES', 'Categories');
DEFINE('_SECTION_CONTENT_ITEMS', 'Active');
DEFINE('_SECTION_CONTENT_ITEMS_IN_TRASH', 'In a trash');
DEFINE('_VIEW_SECTION_CATEGORIES', 'Section categories view');
DEFINE('_VIEW_SECTION_CONTENT', 'Section content view');
DEFINE('_NEW_SECTION_MASK', 'New section');
DEFINE('_CHOOSE_MENU_ITEM_NAME', 'Please, enter a name for this menu item');
DEFINE('_ENTER_SECTION_NAME', 'Section should have the name');
DEFINE('_ENTER_SECTION_TITLE', 'Section should have title');
DEFINE('_SECTION_ALREADY_EXISTS', 'Section with such name already exists. Please, change section name.');
DEFINE('_SECTION_DETAILS', 'Section details');
DEFINE('_SECTION_USED_IN', 'Used in');
DEFINE('_MENU_SHORT_NAME', 'Menu short name');
DEFINE('_SECTION_NAME_OF_CATEGORY', 'categories');
DEFINE('_SECTION_NAME_OF_SECTION', 'section');
DEFINE('_SECTION_NAME_TIP', 'The long name displayed in titles');
DEFINE('_SECTION_NEW_MENU_LINK', 'This function will create new item in chosen menu');
DEFINE('_CHOOSE_MENU', 'Choose the menu');
DEFINE('_CHOOSE_MENU_TYPE', 'Choose menu type');
DEFINE('_SECTION_COPYING', 'Section copying');
DEFINE('_SECTION_COPY_NAME', 'The name of section copy');
DEFINE('_SECTION_COPY_DESCRIPTION', 'The listed categories<br/> and all listed categories<br/>content will be copied <br/>in created section.');
DEFINE('_MASS_CONTENT_ADD', 'Add Mass Content');
DEFINE('_NEW_CAT_SECTION_ON_NEW_LINE', 'Each new category / section should begin with a new line');
DEFINE('_MASS_ADD_AS', 'Add as');
DEFINE('_SECTIONS', 'Sections');
DEFINE('_CATEGORIES', 'Categories');
DEFINE('_CATEGORIES_WILL_BE_IN_SECTION', 'Categories will belong to a section');
DEFINE('_CONTENT_WILL_BE_IN_CATEGORY', 'Content will belong to a category');
DEFINE('_ADD_SECTIONS_RESULT', 'Results of section adding');
DEFINE('_ADD_CATEGORIES_RESULT', 'Results of categories adding');
DEFINE('_ADD_CONTENT_RESULT', 'Results of content adding');
DEFINE('_ERROR_WHEN_ADDING', 'There was an error when adding');
DEFINE('_SECTION_IS_BEING_EDITED_BY_ADMIN', 'Section is editing now by other administrator');
DEFINE('_SECTION_TABLE', 'Section list');
DEFINE('_SECTION_BLOG', 'Section blog');
DEFINE('_SECTION_BLOG_ARCHIVE', 'Archive of section blog');
DEFINE('_SECTION_SAVED', 'Section saved');
DEFINE('_CHOOSE_SECTION_TO_DELETE', 'Choose section to delete');
DEFINE('_CANNOT_DELETE_NOT_EMPTY_SECTIONS', 'Sections cannot be deleted since contain categories');
DEFINE('_CHOOSE_SECTION_FOR', 'Choose section for');
DEFINE('_CANNOT_PUBLISH_EMPTY_SECTION', 'It it is impossible to publish empty section');
DEFINE('_SECTION_CONTENT_COPYED', 'Chosen section contents have been copied in section');
DEFINE('_MENU_MASS_ADD', 'Add more');

/* administrator components com_poll */
DEFINE('_POLLS', 'Polls');
DEFINE('_POLL_HEADER', 'Poll header');
DEFINE('_POLL_LAG', 'Delay');
DEFINE('_CHANGE_POLL', 'Change poll');
DEFINE('_ENTER_POLL_NAME', 'Poll should have the name');
DEFINE('_ENTER_POLL_LAG', 'Delay between the answers should not be eqaul to zero');
DEFINE('_POLL_DETAILS', 'Poll details');
DEFINE('_POLL_LAG_QUESIONS', 'Delay between answers');
DEFINE('_POLL_LAG_QUESIONS2', 'seconds between voices acceptance');
DEFINE('_POLL_OPTIONS', 'Variants of ansewrs');
DEFINE('_POLL_OPTION', 'Variant of ansewr');
DEFINE('_POLL_HITS', 'Hits');
DEFINE('_POLL_GRAFIC', 'Grafic');
DEFINE('_POLL_IS_BEING_EDITED_BY_ADMIN', 'Poll is editing now by other administrator');

/* administrator components com_newsfeeds */
DEFINE('_NEWSFEEDS_MANAGEMENT', 'Newsfeeds Management');
DEFINE('_NEWSFEED_TITLE', 'Newsfeed');
DEFINE('_NEWSFEED_ON_SITE', 'On a site');
DEFINE('_NEWSFEEDS_NUM_OF_CONTENT_ITEMS', 'Number of articles');
DEFINE('_NEWSFEED_CACHE_TIME', 'Cache time (seconds)');
DEFINE('_CHANGE_NEWSFEED', 'Change newsfeed');
DEFINE('_PLEASE_ENTER_NEWSFEED_NAME', 'Please, enter newsfeed name');
DEFINE('_PLEASE_ENTER_NEWSFEED_LINK', 'Please, enter newsfeed reference');
DEFINE('_PLEASE_ENTER_NEWSFEED_NUM_OF_CONTENT_ITEMS', 'Please, enter number of articles to display');
DEFINE('_PLEASE_ENTER_NEWSFEED_CACHE_TIME', 'Please, enter time of cache updating');
DEFINE('_NEWSFEED_LINK', 'Reference');
DEFINE('_NEWSFEED_DECODE_FROM_UTF', 'Recode from UTF-8');

/* administrator components com_modules */
DEFINE('_ALL_MODULE_CHANGES_SAVED', 'All module changes are successfully saved');
DEFINE('_MODULES', 'Modules');
DEFINE('_MODULE_NAME', 'Module name');
DEFINE('_MODULE_POSITION', 'Position');
DEFINE('_ASSIGN_TO_URL', 'Assign URL');
DEFINE('_ASSIGN_TO_URL_TIP', 'Example: <br /><br />! option=com_content&task=view&id=4<br />option=com_content&task=view<br />option=com_content&task=blogcategory&id=4<br /><br />! - on these pages module is not displayed<br />=<>!=it is equal, less then, greater then,not equal - comparison operators for numerical parametres');
DEFINE('_MODULE_PAGES', 'Pages');
DEFINE('_MODULE_PAGES_SOME', 'Some');
DEFINE('_SHOW_TITLE', 'Show title');
DEFINE('_MODULE_ORDER', 'Module order');
DEFINE('_MODULE_PAGE_MENU_ITEMS', 'Pages / Menu items');
DEFINE('_MODULE_USER_CONTENT', 'User code / Module content');
DEFINE('_MODULE_COPIED', 'Module is copied');
DEFINE('_CANNOT_DELETE_MOD_MAINMENU', 'You cannot remove module mod_mainmenu, displayed as \\\' mainmenu \\\' since this is a kernel of the menu');
DEFINE('_CANNOT_DELETE_MODULES', 'Modules cannot be removed, they can be uninstalled only as any Joomla! modules');
DEFINE('_PREVIEW_ONLY_CREATED_MODULES', 'You can see only `created` modules');

/* administrator components com_modules */
DEFINE('_WEBLINKS_MANAGEMENT', 'Weblinks management');
DEFINE('_WEBLINKS_HITS', 'Hits');
DEFINE('_CHANGE_WEBLINK', 'Change weblink');
DEFINE('_ENTER_WEBLINK_TITLE', 'Weblink should have a title');
DEFINE('_PLEASE_ENTER_URL', 'You should enter URL');
DEFINE('_WEBLINK_URL', 'Weblink');
DEFINE('_WEBLINK_NAME', 'Name');

/* administrator components com_jwmmxtd */
DEFINE('_RENAME', 'Rename');
DEFINE('_JWMM_DIRECTORIES', 'Directories');
DEFINE('_JWMM_FILES', 'Files');
DEFINE('_JWMM_MOVE', 'Move');
DEFINE('_JWMM_BYTES', 'byte');
DEFINE('_JWMM_KBYTES', 'Kb');
DEFINE('_JWMM_MBYTES', 'Mb');
DEFINE('_JWMM_DELETE_FILE_CONFIRM', 'Remove file');
DEFINE('_CLICK_TO_PREVIEW', 'Press to view');
DEFINE('_JWMM_FILESIZE', 'Size');
DEFINE('_WIDTH', 'Width');
DEFINE('_HEIGHT', 'Height');
DEFINE('_UNPACK', 'Unpack');
DEFINE('_JWMM_VIDEO_FILE', 'Video file');
DEFINE('_JWMM_HACK_ATTEMPT', 'Hack attemptЕ');
DEFINE('_JWMM_DIRECTORY_NOT_EMPTY', 'Folder is not empty. Please, remove contents in the folder at first!');
DEFINE('_JWMM_DELETE_CATALOG', 'Remove folder');
DEFINE('_JWMM_SAFE_MODE_WARNING', 'At the activated parametre SAFE MODE problems with creation of directories are possible');
DEFINE('_JWMM_CATALOG_CREATED', 'Folder is created');
DEFINE('_JWMM_CATALOG_NOT_CREATED', 'Folder is not created');
DEFINE('_JWMM_FILE_DELETED', 'File is successfully removed');
DEFINE('_JWMM_FILE_NOT_DELETED', 'File is not removed');
DEFINE('_JWMM_DIRECTORY_DELETED', 'Folder is removed');
DEFINE('_JWMM_DIRECTORY_NOT_DELETED', 'Folder is not removed');
DEFINE('_JWMM_RENAMED', ' It is renamed');
DEFINE('_JWMM_NOT_RENAMED', 'It is not renamed');
DEFINE('_JWMM_COPIED', 'It is copied');
DEFINE('_JWMM_NOT_COPIED', 'It is not copied');
DEFINE('_JWMM_FILE_MOVED', 'File is moved');
DEFINE('_JWMM_FILE_NOT_MOVED', 'File is not moved');
DEFINE('_TMP_DIR_CLEANED', 'Temporary folder is completely cleared');
DEFINE('_TMP_DIR_NOT_CLEANED', 'Temporary folder is not cleared');
DEFINE('_FILES_UNPACKED', 'file(s) is(are) unpacked');
DEFINE('_ERROR_WHEN_UNPACKING', 'unpacking error');
DEFINE('_FILE_IS_NOT_A_ZIP', 'File is not a valid zip archive');
DEFINE('_FILE_NOT_EXIST', 'File does not exist');
DEFINE('_IMAGE_SAVED_AS', 'Edited image is saved as');
DEFINE('_IMAGE_NOT_SAVED', 'Image is not saved');
DEFINE('_FILES_NOT_UPLOADED', 'File(s) is(are) not loaded on a server');
DEFINE('_FILES_UPLOADED', 'Files are loaded');
DEFINE('_DIRECTORIES', 'Directories');
DEFINE('_JWMM_FILE_NAME_WARNING', 'Please, do not use in names spaces and wildcard character');
DEFINE('_JWMM_MEDIA_MANAGER', 'Media manager');
DEFINE('_JWMM_CREATE_DIRECTORY', 'Create folder');
DEFINE('_UPLOAD_FILE', 'Load a file');
DEFINE('_JWMM_FILE_PATH', 'Location');
DEFINE('_JWMM_UP_TO_DIRECTORY', 'Move to the parent folder');
DEFINE('_JWMM_RENAMING', 'Renaming');
DEFINE('_JWMM_NEW_NAME', 'New name (including extension!)');
DEFINE('_CHOOSE_DIR_TO_COPY', 'Choose folder to copy');
DEFINE('_JWMM_COPY_TO', 'Copy to');
DEFINE('_CHOOSE_DIR_TO_MOVE', 'Choose folder to move');
DEFINE('_JWMM_MOVE_TO', 'Move to');
DEFINE('_CHOOSE_DIR_TO_UNPACK', 'Choose folder to unpack');
DEFINE('_DERICTORY_TO_UNPACK', 'Unpacking folder');
DEFINE('_NUMBER_OF_IMAGES_IN_TMP_DIR', 'Number of images in the temporary folder');
DEFINE('_CLEAR_DIRECTORY', 'Clear folder');
DEFINE('_JWMM_ERROR_EDIT_FILE', 'Error at file processing');
DEFINE('_JWMM_EDIT_IMAGE', 'Images editing');
DEFINE('_JWMM_IMAGE_RESIZE', 'Image extension');
DEFINE('_JWMM_IMAGE_CROP', 'Crop');
DEFINE('_JWMM_IMAGE_SIZE', 'Sizes');
DEFINE('_JWMM_X_Y_POSITION', 'X and Y coordinates');
DEFINE('_JWMM_BY_HEIGHT', 'verticals');
DEFINE('_JWMM_BY_WIDTH', 'horizontals');
DEFINE('_JWMM_CROP_TOP', 'At the top');
DEFINE('_JWMM_CROP_LEFT', 'At the left');
DEFINE('_JWMM_CROP_RIGHT', 'At the right');
DEFINE('_JWMM_CROP_BOTTOM', 'At the bottom');
DEFINE('_JWMM_ROTATION', 'Rotation');
DEFINE('_JWMM_CHOOSE', '-- choice --');
DEFINE('_JWMM_MIRROR', 'Mirror');
DEFINE('_JWMM_VERICAL', 'verticals');
DEFINE('_JWMM_HORIZONTAL', 'horizontals');
DEFINE('_JWMM_GRADIENT_BORDER', 'Gradient border');
DEFINE('_JWMM_SIZE_PX', 'px size');
DEFINE('_JWMM_TOP_LEFT', 'At the top-left');
DEFINE('_JWMM_PRESS_TO_CHOOSE_COLOR', 'Press to choos√≥ a color');
DEFINE('_JWMM_BOTTOM_RIGHT', 'At the right-bottom');
DEFINE('_JWMM_BORDER', 'Border');
DEFINE('_COLOR', 'Color');
DEFINE('_JWMM_ALL_BORDERS', 'All borders');
DEFINE('_JWMM_TOP', 'At the top');
DEFINE('_JWMM_LEFT', 'At the left');
DEFINE('_JWMM_RIGHT', 'At the right');
DEFINE('_JWMM_BOTTOM', 'At the bottom');
DEFINE('_JWMM_BRIGHTNESS', 'Brightness');
DEFINE('_JWMM_CONTRAST', 'Contrast');
DEFINE('_JWMM_ADDITIONAL_ACTIONS', 'Additional actions');
DEFINE('_JWMM_GRAY_SCALE', 'Grey gradient');
DEFINE('_JWMM_NEGATIVE', 'Negative');
DEFINE('_JWMM_ADD_TEXT', 'Add text');
DEFINE('_JWMM_TEXT', 'Text');
DEFINE('_JWMM_TEXT_COLOR', 'Text color');
DEFINE('_JWMM_TEXT_FONT', 'Text font');
DEFINE('_JWMM_TEXT_SIZE', 'Text size');
DEFINE('_JWMM_ORIENTATION', 'Orientation');
DEFINE('_JWMM_BG_COLOR', 'Background color');
DEFINE('_JWMM_XY_POSITION', 'X and Y position');
DEFINE('_JWMM_XY_PADDING', 'X and Y padding');
DEFINE('_JWMM_FIRST', 'The first');
DEFINE('_JWMM_SECOND', 'The second');
DEFINE('_JWMM_THIRDTH', 'The thirdЕ');
DEFINE('_JWMM_CANCEL_ALL', 'Cancel all');

/* administrator components com_joomlaxplorer */
DEFINE('_MENU_GZIP', 'Pack');
DEFINE('_MENU_MOVE', 'Move');
DEFINE('_MENU_CHMOD', 'Permissions change');

/* administrator components com_joomlapack */
DEFINE('_JP_BACKUPPING', 'Backup');
DEFINE('_JP_PHPINFO', '---Information about PHP---');
DEFINE('_JP_FREEMEMORY', 'Free memory');
DEFINE('_JP_GZIP_ENABLED', 'GZIP compression: enabled (it is good)');
DEFINE('_JP_GZIP_NOT_ENABLED', 'GZIP compression: disabled (it is bad)');
DEFINE('_JP_START_BACKUP_DB', 'The beginning of database backupping');
DEFINE('_JP_START_BACKUP_FILES', 'The beginning of all site data backupping');
DEFINE('_JP_CUBE_ON_STEP', 'CUBE:: Work on a step');
DEFINE('_JP_CUBE_STEP_FINISHED', 'CUBE:: Step is finished');
DEFINE('_JP_CUBE_FINISHED', 'CUBE:: It is finished!');
DEFINE('_JP_ERROR_ON_STEP', 'CUBE:: Error on a step ');
DEFINE('_JP_CLEANUP', 'Cleanup');
DEFINE('_JP_RECURSING_DELETION', 'Recursive deletion');
DEFINE('_JP_NOT_FILE', 'Deletion<strong>It is FILE, NOT a FOLDER!</strong>');
DEFINE('_JP_ERROR_DEL_DIRECTORY', 'Error during folder deleting. Check permissions please');
DEFINE('_JP_QUICK_MODE', 'Quick mode');
DEFINE('_JP_QUICK_MODE_ON_STEP', 'It is used quick mode on a step');
DEFINE('_JP_CANNOT_USE_QUICK_MODE', 'It it is impossible to use quick mode on a step');
DEFINE('_JP_MULTISTEP_MODE', 'Multistep mode');
DEFINE('_JP_MULTISTEP_MODE_ON_STEP', 'It is used multistep mode on a step');
DEFINE('_JP_MULTISTEP_MODE_ERROR', 'Error during multistep mode execution on a step');
DEFINE('_JP_SMART_MODE', 'Smart mode');
DEFINE('_JP_SMART_MODE_ON_STEP', 'Smart mode execution on a step');
DEFINE('_JP_SMART_MODE_ERROR', 'Error during smart mode execution on a step');
DEFINE('_JP_CHOOSED_ALGO', 'It is chosen');
DEFINE('_JP_ALGORITHM_FOR', 'algorithm for');
DEFINE('_JP_NEXT_STEP_BACKUP_DB', 'Next step -> Database backup');
DEFINE('_JP_NEXT_STEP_FILE_LIST', 'Next step -> List of files creation');
DEFINE('_JP_NEXT_STEP_FINISHING', 'Next step -> End');
DEFINE('_JP_NEXT_STEP_GZIP', 'Next step -> Packing');
DEFINE('_JP_NEXT_STEP_FINISHED', 'Next step -> It is finished');
DEFINE('_JP_NO_NEXT_STEP', 'Next step is not required; everything is already done');
DEFINE('_JP_NO_CUBE', 'Existing CUBE was not found; creating new');
DEFINE('_JP_CURRENT_STEP', 'Current step');
DEFINE('_JP_UNPACKING_CUBE', 'Unpacking existing CUBE');
DEFINE('_JP_TIMEOUT', 'Time for operation performance left, operation is not finished ');
DEFINE('_JP_FETCHING_TABLE_LIST', 'CDBBackupEngine:: List of tables creating');
DEFINE('_JP_BACKUP_ONLY_DB', 'CDBBackupEngine:: Only databases backup');
DEFINE('_JP_ONE_FILE_STORE', 'CDBBackupEngine:: It is set association by file ');
DEFINE('_JP_FILE_STRUCTURE', 'CDBBackupEngine:: Structure file');
DEFINE('_JP_DATAFILE', 'CDBBackupEngine:: Data file');
DEFINE('_JP_FILE_DELETION', 'CDBBackupEngine:: Files deleting');
DEFINE('_JP_FIRST_STEP', 'CDBBackupEngine:: The first pass');
DEFINE('_JP_ALL_COMPLETED', 'CDBBackupEngine:: Finished');
DEFINE('_JP_START_TICK', 'CDBBackupEngine:: Processing starts');
DEFINE('_JP_READY_FOR_TABLE', 'Ready for the table');
DEFINE('_JP_DB_BACKUP_COMPLETED', 'Database backup is finished');
DEFINE('_JP_NEW_FRAGMENT_ADDED', 'New fragment is added');
DEFINE('_JP_KERNEL_TABLES', 'Kernels tables');
DEFINE('_JP_FIRST_STEP_2', 'The first pass');
DEFINE('_JP_NEXT_VALUE', 'Output value');
DEFINE('_JP_SKIP_TABLE', 'Skip table');
DEFINE('_JP_GETTING', 'Getting');
DEFINE('_JP_COLUMN_FROM', 'column from');
DEFINE('_JP_ERROR_WRITING_FILE', 'File writing error');
DEFINE('_JP_CANNOT_SAVE_DUMP', 'It it is impossible to save dump');
DEFINE('_JP_CHECK_RESULTS', 'Cheking results');
DEFINE('_JP_ANALYZE_RESULTS', 'Analysis results');
DEFINE('_JP_OPTIMIZE_RESULTS', 'Optimisation results');
DEFINE('_JP_REPAIR_RESULTS', 'Correcting results');
DEFINE('_JP_GETTING_DIRS_LIST', 'Folders list recieving to remove them from a backup copy');
DEFINE('_JP_GZIP_FIRST_STEP', 'Packing: the first step');
DEFINE('_JP_GZIP_FINISHED', 'Packing: finished');
DEFINE('_JP_PACK_FINISHED', 'Archiving completion');
DEFINE('_JP_GZIP_OF_FRAGMENT', 'Fragment # archiving');
DEFINE('_JP_CURRENT_FRAGMENT', 'Current fragment');
DEFINE('_JP_DELETE_PATH', ' path for deletion: ');
DEFINE('_JP_PATH_TO_DELETE', ' path for addition: ');
DEFINE('_JP_SAVING_ARCHIVE_INFO', 'Saving information about archival objects');
DEFINE('_JP_LOADING_ARCHIVE_INFO', 'Loading information about archival objects');
DEFINE('_JP_ADDING_FILE_TO_ARCHIVE', 'Addition files to archive');
DEFINE('_JP_ARCHIVING', 'Archiving');
DEFINE('_JP_ARCHIVE_COMPLETED', 'Archiving completed');
DEFINE('_JP_BACKUP_CONFIG', 'Backup configuration');
DEFINE('_JP_CONFIG_SAVING', 'Saving settings');
DEFINE('_JP_MAIN_CONFIG', 'Main settings');
DEFINE('_JP_CONFIG_DIRECTORY', 'Folder to save archive');
DEFINE('_JP_ARCHIVE_NAME', 'Archive name ');
DEFINE('_JP_LOG_LEVEL', 'Level of log file details');
DEFINE('_JP_ADDITIONAL_CONFIG', 'Additional settings');
DEFINE('_JP_DELETE_PREFIX', 'Delete tables prefix');
DEFINE('_JP_EXPORT_TYPE', 'Type of database export');
DEFINE('_JP_FILELIST_ALGORITHM', 'Files processing');
DEFINE('_JP_CONFIG_DB_BACKUP', 'Database processing');
DEFINE('_JP_CONFIG_GZIP', 'Files compression');
DEFINE('_JP_CONFIG_DUMP_GZIP', 'Database dump compression');
DEFINE('_JP_AVAILABLE', '<font colour = "green"><strong>available</strong></font>');
DEFINE('_JP_NOT_AVAILABLE', '<font colour = "red"><strong>not available</strong></font>');
DEFINE('_JP_MYSQL4_COMPAT', 'In a MySQL 4 compatibility mode');
DEFINE('_JP_NO_GZIP', 'Don\'t compress (.sql) ');
DEFINE('_JP_GZIP_TAR_GZ', 'Compress in TAR.GZ (.tar.gz) ');
DEFINE('_JP_GZIP_ZIP', 'Compress in ZIP (.zip) ');
DEFINE('_JP_QUICK_METHOD', 'Quickly - one pass');
DEFINE('_JP_STANDARD_METHOD', 'Recommended - standard');
DEFINE('_JP_SLOW_METHOD', 'Slowly - multipass');
DEFINE('_JP_LOG_ERRORS_OLY', 'Errors only');
DEFINE('_JP_LOG_ERROR_WARNINGS', 'Errors and warnings');
DEFINE('_JP_LOG_ALL', 'All information');
DEFINE('_JP_LOG_ALL_DEBUG', 'All information and debugging');
DEFINE('_JP_DONT_SAVE_DIRECTORIES_IN_BACKUP', 'Don\'t save folders in a backup');
DEFINE('_FILE_NAME', 'File name');
DEFINE('_JP_DOWNLOAD_FILE', 'Download');
DEFINE('_JP_REALLY_DELETE_FILE', 'Are you sure you want to delete this file?');
DEFINE('_JP_FILE_CREATION_DATE', 'Created');
DEFINE('_JP_NO_BACKUPS', 'Backup files are absent');
DEFINE('_JP_ACTIONS_LOG', 'Actions log');
DEFINE('_JP_BACKUP_MANAGEMENT', 'Backup Management');
DEFINE('_JP_CREATE_BACKUP', 'Create data backup');
DEFINE('_JP_DB_MANAGEMENT', 'Database management');
DEFINE('_JP_DONT_SAVE_DIRECTORIES', 'Don\'t save folders');
DEFINE('_JP_CONFIG', 'Saving setting');
DEFINE('_JP_ERRORS_TMP_DIR', 'Errors are found, please verify that you can write in the backup storage folder');
DEFINE('_JP_BACKUP_CREATION', 'Data backup creation');
DEFINE('_JP_DONT_CLOSE_BROWSER_WINDOW', 'Please, do not close browser window and do not pass from this page before backup is not completed and corresponding message is not displayed.');
DEFINE('_JP_ERRORS_VIEW_LOG', 'Errors are found during work, please, <a href="index2.php? option=com_joomlapack&act=log">investigate log</a> and find out the reason.');
DEFINE('_JP_BACKUP_SUCCESS', 'Site data backup is executed successfully. Download');
DEFINE('_JP_CREATION_FILELIST', '1. List of files to backup creation.');
DEFINE('_JP_BACKUPPING_DB', '2. Database backup.');
DEFINE('_JP_CREATION_OF_ARCHIVE', '3. Final archive creation.');
DEFINE('_JP_ALL_COMPLETED_2', '4. Everything completed');
DEFINE('_JP_PROGRESS', 'Progress');
DEFINE('_JP_TABLES', 'Tables');
DEFINE('_JP_TABLE_ROWS', 'Entries');
DEFINE('_JP_SIZE', 'Size');
DEFINE('_JP_INCREMENT', 'Increment');
DEFINE('_JP_CREATION_DATE', 'Created');
DEFINE('_JP_CHECKING', 'Checking');
DEFINE('_JP_FULL_BACKUP', 'Full backup');
DEFINE('_JP_BACKUP_BASE', 'Database backup');
DEFINE('_JP_BACKUP_PANEL', 'Backup panel');

/* administrator modules mod_components */
DEFINE('_FULL_COMPONENTS_LIST', 'Full list of the components');

/* administrator modules mod_fullmenu */
DEFINE('_MENU_CMS_FEATURES', 'System basic possibilities management');
DEFINE('_MENU_GLOBAL_CONFIG', 'Global configuration');
DEFINE('_MENU_GLOBAL_CONFIG_TIP', 'Global system parametres setup');
DEFINE('_MENU_LANGUAGES', 'Language packages');
DEFINE('_MENU_LANGUAGES_TIP', 'Language files management');
DEFINE('_MENU_SITE_PREVIEW', 'Site preview');
DEFINE('_MENU_SITE_PREVIEW_IN_NEW_WINDOW', 'In a new window');
DEFINE('_MENU_SITE_PREVIEW_IN_THIS_WINDOW', 'In current window');
DEFINE('_MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS', 'In current window with positions');
DEFINE('_MENU_SITE_STATS', 'Site statistics');
DEFINE('_MENU_SITE_STATS_TIP', 'Site statistics viewing');
DEFINE('_MENU_STATS_BROWSERS', 'Browsers, OS, domains');
DEFINE('_MENU_STATS_BROWSERS_TIP', 'Visiting site statistics on browsers, OS and domains');
DEFINE('_MENU_SEARCHES', 'Search requests');
DEFINE('_MENU_SEARCHES_TIP', 'Search requests statistic for the site');
DEFINE('_MENU_PAGE_STATS', 'Pages Visited');
DEFINE('_MENU_TEMPLATES_TIP', 'Templates management');
DEFINE('_MENU_SITE_TEMPLATES', 'Site templates');
DEFINE('_MENU_NEW_SITE_TEMPLATE', 'Install New Template');
DEFINE('_MENU_ADMIN_TEMPLATES', 'Admin templates');
DEFINE('_MENU_NEW_ADMIN_TEMPLATE', 'Install New Admin Template');
DEFINE('_MENU', 'Menu');
DEFINE('_MENU_TRASH', 'Menu trash');
DEFINE('_CONTENT_IN_SECTIONS', 'Sections content');
DEFINE('_CONTENT_IN_SECTION', 'Containt in section');
DEFINE('_SECTION_ARCHIVE', 'Section archive');
DEFINE('_SECTION_CATEGORIES2', 'Section categories');
DEFINE('_ADD_CONTENT_ITEM', 'Add news / article');
DEFINE('_ADD_STATIC_CONTENT', 'Add static content');
DEFINE('_CONTENT_ON_FRONTPAGE', 'FrontPage Content');
DEFINE('_CONTENT_TRASH', 'Content trash');
DEFINE('_ALL_COMPONENTS', 'All componentsЕ');
DEFINE('_EDIT_COMPONENTS_MENU', 'Edit Admin Components Menu');
DEFINE('_COMPONENTS_INSTALL_UNINSTALL', 'Install/Uninstall components');
DEFINE('_MODULES_SETUP', 'Modules management');
DEFINE('_MODULES_INSTALL_DEINSTALL', 'Install/Uninstall modules');
DEFINE('_SITE_MAMBOTS', 'Site mambots');
DEFINE('_MAMBOTS_INSTALL_UNINSTALL', 'Install/Uninstall mambots');
DEFINE('_SITE_LANGUAGES', 'Site languages');
DEFINE('_JOOMLA_TOOLS', 'Tools');
DEFINE('_PRIVATE_MESSAGES_CONFIG', 'Message settings');
DEFINE('_FILE_MANAGER', 'File manager');
DEFINE('_SQL_CONSOLE', 'SQL console');
DEFINE('_BACKUP_CONFIG', 'Backup settings');
DEFINE('_CLEAR_CONTENT_CACHE', 'Clear content cache');
DEFINE('_CLEAR_ALL_CACHE', 'Clear ALL cache');
DEFINE('_SYSTEM_INFO', 'System information');
DEFINE('_NO_ACTIVE_MENU_ON_THIS_PAGE', 'Menu on this page is not active');

/* administrator modules mod_latest_users */
DEFINE('_NOW_ON_SITE', 'Now on site');
DEFINE('_REGISTERED_USERS_COUNT', 'Registered users');
DEFINE('_ALL_REGISTERED_USERS_COUNT', 'All registered users');
DEFINE('_TODAY_REGISTERED_USERS_COUNT', 'today');
DEFINE('_WEEK_REGISTERED_USERS_COUNT', 'by week');
DEFINE('_MONTH_REGISTERED_USERS_COUNT', 'by month');
DEFINE('_ADMINLIST_NEW', 'new');
DEFINE('_ADMINLIST_ENABLE', 'Enable');
DEFINE('_ADMINLIST_GROUP', 'Group');
DEFINE('_ADMINLIST_REGISTERED', 'Registered');
DEFINE('_ADMINLIST_ALL', 'All');

/* Added by Dean Beedell */
DEFINE('_COMPONENTS', 'Components');
DEFINE('_EXTENSIONS', 'Extensions');
DEFINE('_MAMBOTS', 'Mambots');
DEFINE('_SITE_MODULES', 'Site Modules');
DEFINE('_TEMPLATES', 'Templates');
DEFINE('_USERS', 'Users');
DEFINE('_ARCHIVE', 'Archives');
DEFINE('_PAGES_HITS', 'Page Hits');
DEFINE('_ADMIN_MODULES', 'Admin Modules');
DEFINE('_PRIVATE_MESSAGES', 'Private Messages');
DEFINE('_MODULES_POSITION', 'Module Positions');
DEFINE('_BLOCK_INCOMING_MAIL', 'Block Incoming Mail');
DEFINE('_SEND_NEW_MESSAGES', 'Send New Messages');
DEFINE('_AUTO_PURGE_MESSAGES', 'Auto Purge Messages');
DEFINE('_AUTO_PURGE_MESSAGES2', 'Retain');
DEFINE('_AUTO_PURGE_MESSAGES3', 'Messages in your mailbox');
DEFINE('_ZIP_UPLOAD_AND_INSTALL', 'ZIP file upload and install');
DEFINE('_PACKAGE_FILE', 'Package File');
DEFINE('_CANNOT_MOVE_TO_MEDIA', 'Cannot Move to Media');
DEFINE('_UPLOADING_ERROR', 'Uploading Error');
DEFINE('_CONTINUE', 'Continue');
DEFINE('_INSTALLATION_DIRECTORY', 'Installation Folder');
DEFINE('_INSTALL_FROM_DIR', 'Install from Folder');
DEFINE('_WRITEABLE', 'Writeable');
DEFINE('_UPLOAD_AND_INSTALL', 'Upload and Install');
DEFINE('_INTALL_LANG', 'Install Language');
DEFINE('_INSTALL_MAMBOT', 'Install MamBot/Plugin');
DEFINE('_INSTALLED_MAMBOTS', 'Installed MamBots');
DEFINE('_MAMBOT', 'Mambots');
DEFINE('_INSTALLED_COMPONENTS2', 'Installed Components');
DEFINE('_COMPONENT_AUTHOR_URL', 'Component Author URL');
DEFINE('_MAMBOT_NAME', 'Mambot Name');
DEFINE('_ACCESS', 'Access');
DEFINE('_TYPE', 'Type');
DEFINE('_FILE', 'File');
DEFINE('_NAV_SHOW', 'Display No.');
DEFINE('_MODULE_INSTALL', 'Module Install');
DEFINE('_INSTALL_MODULE', 'Installed Modules');
DEFINE('_MODULE', 'Module');
DEFINE('_COMPONENT_LINK', 'Component Link');
DEFINE('_COMPONENT_NAME', 'Component Name');
DEFINE('_INSTALLED_COMPONENTS', 'Installed Components');
DEFINE('_COMPONENT_INSTALL', 'Component Install');
DEFINE('_COMPONENTS_MENU_EDITOR', 'Components Menu Editor');
DEFINE('_MASSMAIL_TTILE', 'Mass Mail Title');
DEFINE('_NEWS_EXPORT_SETUP', 'News Export Setup');
DEFINE('_TRASH', 'Trash');
DEFINE('_RESTORE', 'Restore');
DEFINE('_CLEAR_TRASH', 'Clear Trash');
DEFINE('_REMOVE_TO_TRASH', 'Send to Trash');
DEFINE('_MENU_ITEMS', 'Menu Items');
DEFINE('_CONTENT_TITLE', 'Content Title');
DEFINE('_ALL_SECTIONS', 'All Sections');
DEFINE('_FROM_ARCHIVE', 'From Archive');
DEFINE('_TO_TRASH', 'To Trash');
DEFINE('_SUCCESS_DELETION', 'Success deletion');
DEFINE('_KERNEL', 'Kernel');
DEFINE('_REMOVE_FROM_FRONT', 'Remove from Frontpage');
DEFINE('_PREVIEW', 'Preview');
DEFINE('_CONTENT_INFO', 'Content Info');
DEFINE('_MENU_LINK', 'Link to Menu');
DEFINE('_O_STATE', 'Published State');
DEFINE('_CHANGE_AUTHOR', 'Change Author');
DEFINE('_START_PUBLICATION', 'Start Publication Date');
DEFINE('_END_PUBLICATION', 'End Publication Date');
DEFINE('_CREATED', 'Created');
DEFINE('_NEW_DOCUMENT', 'New Document');
DEFINE('_NOT_CHANGED', 'Not Changed');
DEFINE('_O_CREATION', 'New Item');
DEFINE('_ALIAS', 'ALIAS');
DEFINE('_MAINTEXT_M', 'Text: (required)');
DEFINE('_LINKS_COUNT', 'No. of Links');
DEFINE('_PRIVATE_MESSAGES_SETTINGS', 'Private Message Settings');
DEFINE('_MAIL_SUBJECT', 'Mail Subject');
DEFINE('_MAIL_FROM', 'Mail From');
DEFINE('_SITE_CONTENT', 'Site Content');
DEFINE('_ORDER_BY_NAME', 'Order By Name');
DEFINE('_ORDER_BY_HEADERS', 'Order By Headers');
DEFINE('_ORDER_BY_DATE_CR', 'Order By Date Created');
DEFINE('_ORDER_BY_ID', 'Order By ID');
DEFINE('_ORDER_BY_HITS', 'Order By Hits');
DEFINE('_ORDER_BY_DATE_MOD', 'Order By Date Modified');
DEFINE('_SORT_BY', 'Sort By');
DEFINE('_GALLERY_IMAGES', 'Gallery Images');
DEFINE('_CONTENT_IMAGES', 'Content Images');
DEFINE('_IMAGE_EXAMPLE', 'Image Example');
DEFINE('_ACTIVE_IMAGE', 'Active Image');
DEFINE('_EDITING_SELECTED_IMAGE', 'Editing Selected Image');
DEFINE('_SOURCE', 'Source');
DEFINE('_ALIGN', 'Align');
DEFINE('_ALTERNATIVE_TEX', 'Alternative Text');
DEFINE('_MENU_LINK_3', 'This will create a \'Link - Static Content\' in the menu you select');
DEFINE('_EXISTED_MENU_LINKS', 'Existing Menu Links');
DEFINE('_MENU_MANAGER', 'Menu Manager');
DEFINE('_MAXIMUM_LEVELS', 'Maximum Levels');
DEFINE('_LANGUAGE_PACKS', 'Language Packs');
DEFINE('_E_LANGUAGE', 'Language');
DEFINE('_USED_ON', 'Used On');
DEFINE('_SEARCH_QUERIES', 'Search Queries');
DEFINE('_LOG_SEARCH_QUERIES', 'Log Search Queries');
DEFINE('_DISALLOWED', 'Disallowed');
DEFINE('_SEARCH_QUERY_TEXT', 'Search Query Text');
DEFINE('_SEARCH_QUERY_COUNT', 'Search Query Count');
DEFINE('_SHOW_SEARCH_RESULTS', 'Show Search Results');
DEFINE('_HIDE_SEARCH_RESULTS', 'Hide Search Results');
DEFINE('_SHOW_RESULTS', 'Show Results');
DEFINE('_DEFAULT', 'Default');
DEFINE('_ASSIGNED_TO', 'Assigned To');
DEFINE('_ASSIGN', 'Assign');
DEFINE('_EDIT_HTML', 'Edit HTML');
DEFINE('_EDIT_CSS', 'Edit CSS');
DEFINE('_TEMPLATE_PREVIEW', 'Template Preview');
DEFINE('_USER_LOGIN_TXT', 'Username');
DEFINE('_LOGGED_IN', 'Logged in');
DEFINE('_ALLOWED', 'Allowed');
DEFINE('_LAST_LOGIN', 'Last Login');
DEFINE('_DISABLE', 'Disable');
DEFINE('_NEW_PASSWORD', 'New Password');
DEFINE('_REPEAT_PASSWORD', 'Repeat Password');
DEFINE('_BLOCK_USER', 'Block User');
DEFINE('_RECEIVE_EMAILS', 'Receive Emails');
DEFINE('_REGISTRATION_DATE', 'Registration Date');
DEFINE('_NO_USER_CONTACTS', 'No User Contacts');
DEFINE('_CONTACT_INFO', 'Contact Info');
DEFINE('_MENU_ITEMS_UNPUBLISHED', 'Menu Items Unpublished');
DEFINE('_MENU_MUDULES', 'Menu Modules');
DEFINE('_TO_ARCHIVE', 'Menu Modules');
DEFINE('_CONTENT_ITEMS', 'Content Items');
DEFINE('_MENU_INFO', 'Menu Info');
DEFINE('_ON_FRONTPAGE', 'On FrontPage');
DEFINE('_INTROTEXT_M', 'Intro. Text: (required) ');
DEFINE('_OBJECT_DETAILS', 'Object Details');
DEFINE('_CHANGED', 'Changed');
DEFINE('_TIMES', 'Times');
DEFINE('_LAST_CHANGE:', 'Last Change');
DEFINE('_MENU_LINK2', 'This will create a \'Link - Content Item\' in the menu you select');
DEFINE('_EXISTED_MENUITEMS', 'Existing Menu Items');
DEFINE('_USED_IMAGES', 'Used Images');
DEFINE('_SUBDIRECTORY', 'Sub Directory');
DEFINE('_PARAMS_IN_VIEW', 'Parameters');
DEFINE('_ROBOTS_PARAMS', 'ROBOTS Parameters');
DEFINE('_ROBOTS_HIDE', 'ROBOTS Hide');
DEFINE('_NOTETEXT_M', 'Main Text: (optional)');
DEFINE('_SETTINGS', 'Settings');
DEFINE('_LAST_CHANGE', 'Last Change');
DEFINE('_RESET', 'Reset');
DEFINE('_OBJECT_ID', 'Object ID');
DEFINE('_O_EDITING', 'Editing');
DEFINE('_REALLY_WANT_TO_DELETE_OBJECTS', 'Do you really want to delete these items?');
DEFINE('_MOVED_TO_TRASH', 'Moved to Trash');
DEFINE('_THIS_ACTION_WILL_DELETE_O_FOREVER', 'This Action Will Delete It Forever');
DEFINE('_OBJECTS_TO_DELETE', 'Objects to Delete');
DEFINE('_OBJECT_DELETION', 'Object Deletion');
DEFINE('_REALLY_DELETE_OBJECTS', 'Really Delete Objects?');
DEFINE('_OBJECTS_DELETED', 'Objects Deleted');
DEFINE('_ALTERNATIVE_TEXT', 'Alternative Text');
DEFINE('_AVAILABLE_CHECK_RIGHTS', 'Writeable');
DEFINE('_BUTTON_TITLE', 'Button Title');
DEFINE('_DISPLAY_BUTTON', 'Display Button');
DEFINE('_ICON', 'Icon');
DEFINE('_PARENT_MENU_ITEM', 'Parent Menu Item');
DEFINE('_COMPONENTS_MENU_EDIT', 'Components Menu Edit');
DEFINE('_MENU_ITEM_ICON', 'Menu Item Icon');
DEFINE('_FIRST_LEVEL', 'First Level');
DEFINE('_PROFILE_SAVE_SUCCESS', 'Success in Saving Profile');
DEFINE('_USER_INFO', 'User Information');
DEFINE('_LANGUAGE_SAVED', 'Language Saved');
DEFINE('_ERROR_NO_XML_INSTALL', 'Error - No XML file found in the package');
DEFINE('_NEW_PERSONAL_MESSAGE', 'New Personal Message');
DEFINE('_MAIL_TO', 'Mail To');
DEFINE('_MAKE_UNWRITEABLE_AFTER_SAVING', 'Make unwritable after saving');
DEFINE('_CANNOT_DELETE_THIS_TEMPLATE_WHEN_USING', 'Cannot delete a template when it is being used');
DEFINE('_DELETE_SUCCESS', 'Deletion Success');
DEFINE('_UNSUCCESS', 'Failure');
DEFINE('_XML_NOT_FOR', 'XML file not for Joostina');
DEFINE('_SUCCESS', 'Success');
DEFINE('_INSTALL_TWICE', 'This component already exists, are you mistakenly trying to install it twice?');
DEFINE('_FILE_NOT_EXISTS', 'File does not exist');
DEFINE('_CANNOT_FIND_INSTALL_FILE', 'Cannot Find The Install File');
DEFINE('_ERROR_NO_XML_JOOMLA', 'Joostina XML file not found');
DEFINE('_OTHER_COMPONENT_USE_DIR', 'Other component using this folder');
DEFINE('_MENU_ITEM_DELETED', 'Menu Item Deleted');
DEFINE('_PLEASE_CHOOSE_SECTION', 'Please Choose Selection');
DEFINE('_INOGLOBAL_CONFIG_ONE_TEMPLATE_USING', '');
DEFINE('_HELP', 'Help');
DEFINE('_PLEASE_CHOOSE_ELEMENT_FOR_PUBLICATION', 'Please choose one item for publication');
DEFINE('_SQL_COMMAND', 'SQL command');
DEFINE('_EXEC_SQL', 'Run SQL');
DEFINE('_SQL_CONSOL', 'SQL bash');
DEFINE('_SQL_TABLE', 'Table:');
DEFINE('_SQL_ROWS_ENTER', 'View rows:');
DEFINE('_SQL_MAKE', 'Make SQL');
/*  END  */

/* administrator modules mod_latest */
DEFINE('_LAST_ADDED_CONTENT', 'Last added content');
DEFINE('_USER_WHO_ADD_CONTENT', 'Added');

/* administrator modules mod_latest_users */

/* administrator modules mod_logged */
DEFINE('_NOW_ON_SITE_REGISTERED', 'Authorized on the site now');

/* administrator modules mod_online */
DEFINE('_ONLINE_USERS', 'Users online');

/* administrator modules mod_popular */
DEFINE('_POPULAR_CONTENT', 'Popular');
DEFINE('_CREATED_CONTENT', 'Created');
DEFINE('_CONTENT_HITS', 'Content hits');

/* administrator modules mod_stats */
DEFINE('_MENU_ITEMS_COUNT', 'Items count');

/* administrator modules includes admin.php */
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE', 'Please, make the cache folder accessible to write');
DEFINE('_CACHE_DIR_IS_NOT_WRITEABLE2', 'Cache folder is not accessible to write');
DEFINE('_PHP_MAGIC_QUOTES_ON_OFF', 'PHP magic_quotes_gpc it is set to `OFF` instead of  `ON`');
DEFINE('_PHP_REGISTER_GLOBALS_ON_OFF', 'PHP register_globals it is set to `ON` instead of `OFF`');
DEFINE('_RG_EMULATION_ON_OFF', 'Parameter Joomla! RG_EMULATION in file globals.php it is set to `ON` instead of `OFF` <br/> <span style = "font-weight: normal; font-style: italic; color: #666;"> `ON` - value by default - for compatibility </span>');
DEFINE('_PHP_SETTINGS_WARNING', 'The following PHP options are not optimum for <strong>SAFETY</strong> and they are recommended to be changed');
DEFINE('_MENU_CACHE_CLEANED', 'Cache of the control panel menu is cleared');
DEFINE('_CLEANING_ADMIN_MENU_CACHE', 'Error during clearing cache of the control panel menu');
DEFINE('_NO_MENU_ADMIN_CACHE', 'Cache of the control panel menu is not found out. Check up access rights on the cache folder.');

/* administrator modules includes pageNavigation.php */
DEFINE(' _NAV_SHOW', 'Shown');
DEFINE('_NAV_SHOW_FROM', 'from');
DEFINE('_NAV_NO_RECORDS', 'Records are not found');
DEFINE('_NAV_ORDER_UP', 'Move above');
DEFINE('_NAV_ORDER_DOWN', 'Move below');

/* administrator modules popups pollwindow.php */
DEFINE('_POLL_PREVIEW', 'Poll preview');

/* administrator modules popups uploadimage.php */
DEFINE('_CHOOSE_IMAGE_FOR_UPLOAD', 'Please, choose the image to upload');
DEFINE('_BAD_UPLOAD_FILE_NAME', 'File names should consist of alphabetic symbols and should not contain blanks');
DEFINE('_IMAGE_ALREADY_EXISST', 'Image already exists');
DEFINE('_FILE_MUST_HAVE_THIS_EXTENSION', 'File should have extension');
DEFINE('_FILE_UPLOAD_UNSUCCESS', 'File uploading failed');
DEFINE('_FILE_UPLOAD_SUCCESS', 'File uploading successfully finished');

/* administrator index.php index2.php index3.php */
DEFINE('_PLEASE_ENTER_PASSWORD', 'Please, enter the password');
DEFINE('_BAD_CAPTCHA_STRING', 'Incorrect code of check is entered');
DEFINE('_BAD_USERNAME_OR_PASSWORD', 'Incorrect user name, password, or access level. Please, repeat again');
DEFINE('_BAD_USERNAME_OR_PASSWORD2', 'User name or password are incorrect. Repeat input.'); //not equal to _BAD_USERNAME_OR_PASSWORD!!!

/* administrator templates jostfree index.php */
DEFINE('_JOOSTINA_CONTRL_PANEL', 'Control panel [Joostina]');
DEFINE('_GO_TO_MAIN_ADMIN_PAGE', 'Pass to the main page of the control panel');
DEFINE('_PLEASE_WAIT', 'WaitЕ');
DEFINE('_TOGGLE_WYSIWYG_EDITOR', 'Use of the WYSISYG editor');
DEFINE('_DISABLE_WYSIWYG_EDITOR', 'Disable WYSIWYG editor');
DEFINE('_PRESS_HERE_TO_RELOAD_CAPTCHA', 'Press to reload the image');
DEFINE('_SHOW_CAPTCHA', 'Reload the image');
DEFINE('_PLEASE_ENTER_CAPTCHA', 'Enter check code from the picture above');
DEFINE('_PLEASE_ENABLE_JAVASCRIPT', '!The prevention! Javascript should be enable for correct work of the administrator control panel!');

/* includes feedcreator.class.php */
DEFINE('_ERROR_CREATING_NEWSFEED', 'Error during newsfeed creation. Please, check up permissions to write');

/* includes joomla.php */
DEFINE('_YOU_NEED_TO_AUTH', 'It is required to be authorised');
DEFINE('_ADMIN_SESSION_ENDED', 'Administrator session run out');
DEFINE('_YOU_NEED_TO_AUTH_AND_FIX_PHP_INI', 'You need to authorize. If PHP parameter session.auto_start is enabled or parameter session.use_cookies setting is disabled then at first you should correct them before can enter');
DEFINE('_WRONG_USER_SESSION', 'Wrong session');
DEFINE('_FIRST', 'First');
DEFINE('_LAST', 'Last');
DEFINE('_MOS_WARNING', 'Attention!');
DEFINE('_ADM_MENUS_TARGET_CUR_WINDOW', 'current window with the navigation panel');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITH_PANEL', 'new window with the navigation panel');
DEFINE('_ADM_MENUS_TARGET_NEW_WINDOW_WITHOUT_PANEL', 'new window without the navigation panel');
DEFINE('_WITH_UNASSIGNED', 'With unassigned');
DEFINE('_CHOOSE_IMAGE', 'Choose image');
DEFINE('_NO_USER', 'There is no user');
DEFINE('_CREATE_CATEGORIES_FIRST', 'It it is necessary to create categories at first');
DEFINE('_NOT_CHOOSED', 'Not chosen');
DEFINE('_PUBLISHED_VUT_NOT_ACTIVE', 'Published and <u>not active</u>');
DEFINE('_PUBLISHED_AND_ACTIVE', 'Published and <u>active</u>');
DEFINE('_PUBLISHED_BUT_DATE_EXPIRED', 'Published, but <u>publication time has expired</u>');
DEFINE('_NOT_PUBLISHED', 'Not published');
DEFINE('_LINK_NAME', 'Link name');
DEFINE('_MENU_EXPIRED', 'Expired');
DEFINE('_MENU_ITEM_NAME', 'Menu item name');
DEFINE('_CHECKED_OUT', 'Checked out');
DEFINE('_PUBLISH_ON_FRONTPAGE', 'Publish on a site');
DEFINE('_UNPUBLISH_ON_FRONTPAGE', 'Hide (don\'t show on a site)');

/* includes joomla.xml.php */
DEFINE('_DONT_USE_IMAGE', ' - Don\'t to use image - ');
DEFINE('_DEFAULT_IMAGE', ' - Image by default - ');

/* includes debug jdebug.php */
DEFINE('_SQL_QUERIES_COUNT', 'Number SQL queries');

/* includes Cache Lite Lite.php */
DEFINE('_ERROR_DELETING_CACHE', 'Cache clearing error');
DEFINE('_ERROR_READING_CACHE_DIR', 'Cashe folder reading error');
DEFINE('_ERROR_READING_CACHE_FILE', 'Cashe file reading error');
DEFINE('_ERROR_WRITING_CACHE_FILE', 'Cashe file writing error');
DEFINE('_SCRIPT_MEMORY_USING', 'Memory used');

/* components com_content */
DEFINE('_YOU_HAVE_NO_CONTENT', 'There are no content added by you');
DEFINE('_CONTENT_IS_BEING_EDITED_BY_OTHER_PEOPLE', 'Content are edited now by other user');

/* components com_poll */
DEFINE('_MODULE_WITH_THIS_NAME_ALREADY_EDISTS', 'Module with such name is already exist. Enter other name.');

/* components com_registration */
DEFINE('_USER_ACTIVATION_FAILED', '<div class = "componentheading">Activation error!</div> <br/> Activation of your account is impossible. Please, contact with site administration');

/* components com_weblinks */
DEFINE('_ENTER_CORRECT_URL', 'Enter correct URL');

/* components com_xmap */
DEFINE('_XMAP_PAGE', ' Page');

/* administrator index2.php */
DEFINE('_TEMPLATE_NOT_FOUND', 'Template not found');
DEFINE('_ACCESS_DENIED', 'Access denied');
DEFINE('_CHECKIN_OJECT', 'Checkin object');
?>