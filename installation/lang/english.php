<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
//the direct access prohibition
defined('_VALID_MOS') or die();
//index
define('_INSTALL_TITLE','Joostina - Web-installation. System check');
define('_INSTALL_JOOSITNA','system Check');
define('_INSTALL_SISREV','system Check');
define('_INSTALL_RECHECK','to Check up again');
define('_INSTALL_NEXT','Next >>');
define('_INSTALL_LICENSE','the License');
define('_INSTALL_STEP1','Step 1');
define('_INSTALL_STEP2','Step 2');
define('_INSTALL_STEP3','Step 3');
define('_INSTALL_STEP4','Step 4');
define('_INSTALL_CHECK_SERV_OPTS','Server adjustments Check:');
define('_INSTALL_PHPVERSION','Version PHP> = 4.1.0');
define('_INSTALL_ZLIB','&nbsp; - zlib-compression support');
define('_INSTALL_XML','&nbsp; - support XML');
define('_INSTALL_MYSQL','&nbsp; - support MySQL');
define('_INSTALL_NO','<strong><font color="red">No</font></strong>');
define('_INSTALL_YES','<strong><font color="green">Yes</font></strong>');
define('_INSTALL_WRITE','<strong> <font color = "green"> It is accessible </font> </strong>');
define('_INSTALL_UNWRITE','<strong> <font color = "red"> It is inaccessible </font> </strong>');
define('_INSTALL_CONFIGFILE','the File <strong> configuration.php </strong>');
define('_INSTALL_CONFIGFILE_TEXT','<strong> <font color = "red"> It is inaccessible to record </font> </strong> <br/> <span class = "small"> you can to continue setting, values of a file of a configuration will be shown in the end. Is mandatory SAVE IT: copy/insert contained in the file created by you configuration.php and load on the server! </span>');
define('_INSTALL_SESSION_CAT','the Directory for record of sessions');
define('_INSTALL_NOTINSTALL','it is not installed');
define('_INSTALL_REGISTER_GLOBALS_OFF_ON','Parameter PHP magic_quotes_gpc - ` OFF ` instead of ` ON `');
define('_INSTALL_REGISTER_GLOBALS_ON_OFF','Parameter PHP register_globals - ` ON ` instead of ` OFF `');
define('_INSTALL_RG_EMULATION_ON_OFF','Parameter RG_EMULATION in a file globals.php - <br/> ` ON ` instead of ` OFF ` <br/> <span style = "font-weight:normal;font-style:italic;color:#666;"> ` ON ` - by default - for compatibility </span>');
define('_INSTALL_DIRECTIVE','Directive');
define('_INSTALL_RECOMEND','It is recommended');
define('_INSTALL_INSTALLING','It is installed');
define('_INSTALL_TEXT1','If on the server there are the adjustments, capable to lead to errors in an installation time or operations Joostina on this page they will be marked <strong> <font color = "red"> by red color </font> </strong>. For high-grade and without problem system operation it is recommended to correct all necessary adjustments.');
define('_INSTALL_TEST','safety Check:');
define('_INSTALL_TEXT2','<p> the Following parameters PHP are nonoptimal for <strong> Safety </strong> and they are recommended to be changed: </p> <p> Please, for the additional information address on <a href = "http://forum.joomla.org/index.php/topic,81058.0.html" target = "_ blank"> official forum Joomla! - subjects about Safety </a>. </p>');
define('_INSTALL_PHP_REC_SETS','Рекомендуемые parameters PHP:');
define('_INSTALL_TEXT3','&nbsp;&nbsp;This parameters PHP are recommended for the full compatibility with Joostina. <br/> However, Joostina will work, if these parameters not to the full correspond to the recommended.');
define('_INSTALL_RG_EMULATION','Emulation Register Globals');
define('_INSTALL_ALL_SERV_CHARS','Расширенные server characteristics');
define('_INSTALL_TEXT4','the Specified parameters of the north are not critical for operation, but correspondence to indicated values give to operation with Joostina the maximum convenience and safety.');
define('_INSTALL_FILES_AND_CATS_PERMS','Права access to files and directories:');
define('_INSTALL_TEXT5','For normal operation Joostina it is necessary that on certain files and directories the record rights have been installed. If you see <strong> <font color = "red"> Is inaccessible to record </font> </strong> for some files and directories it is necessary to install on them the access rights, allowing to re-record them.');
define('_INSTALL_REV_PERMS_SISCATS','Проверить access rights to system catalogs');
define('_INSTALL_FOOTER','<a href = "http://www.joostina.ru" target = "_ blank" title = "Joostina"> Joostina </a> - the free software spread under license GNU/GPL.');
define('_INSTALL_WRITEABLE','<strong> <font color = "green"> It is accessible to record </font> </strong>');
define('_INSTALL_UNWRITEABLE','<strong> <font color = "red"> It is inaccessible to record </font> </strong>');
//install
define('_INSTALL_TITLE1','Joostina - Web-installation. License acceptance');
define('_INSTALL_LICENSE1','<span> the License </span>');
define('_INSTALL_LICENSETEXT','Joostina - the free software spread under license GNU/GPL, for usage of system you should agree with the given license completely.');
//install1
define('_INSTALL_TITLE2','Joostina - Web-installation. A step 1 - a database configuration.');
define('_INSTALL_DB_CONFIG','<span> database Configurations </span>');
define('_INSTALL_1_INFO1','Please, enter a name of Host MySQL.');
define('_INSTALL_1_INFO2','Please, enter the user name of Database MySQL.');
define('_INSTALL_1_INFO3','Please, enter the Name for the new DB.');
define('_INSTALL_1_INFO4','For the correct operation Joostina you should enter a prefix of tables of DB MySQL.');
define('_INSTALL_1_INFO5','you cannot use a prefix of tables "old _" as Joostina uses it for creation of reserve tables.');
define('_INSTALL_1_INFO6','you are assured, what the data correctly entered? Joostina will fill tables in a DB, which parameters you specified.');
define('_INSTALL_DBHOSTNAME','the Name of host MySQL');
define('_INSTALL_DBHOSTNAME_TEXT','it is normal <strong> localhost </strong>.');
define('_INSTALL_DBUSERNAME','User name MySQL');
define('_INSTALL_DBUSERNAME_TEXT','For setting on the home computer the name <strong> <font color = "green"> root </font> </strong>, and for setting on the Internet more often is used, enter the data received at the Hoster.');
define('_INSTALL_DBPASSWORD','the access Password to DB MySQL');
define('_INSTALL_DBPASSWORD_TEXT','Leave a field empty for house setting or enter the access password to your DB, received at a hoster.');
define('_INSTALL_DBNAME','the Name of DB MySQL');
define('_INSTALL_DBNAME_TEXT','the Name of an existing or new DB which will be used for a site.');
define('_INSTALL_DBPREFIX','the Prefix of tables of DB MySQL');
define('_INSTALL_DBPREFIX_TEXT','Use a prefix of tables for setting in one DB. Do not use <font color = "red"> old _ </font> is the reserved value.');
define('_INSTALL_DBDEL','to Delete existing tables');
define('_INSTALL_DBDEL_TEXT','All existing tables from the previous setting Joostina will be remote.');
define('_INSTALL_DBBACKUP','to Create backup copies of existing tables');
define('_INSTALL_DBBACKUP_TEXT','All existing backup copies of tables from the previous setting Joostina will be replaced.');
define('_INSTALL_DBSAMPLE','to Install the demonstration data');
define('_INSTALL_DBSAMPLE_TEXT','do not ungear it if you are yet familiar with Joostina!');
define('_INSTALL_DBOLD','Support MySQL is more low 4.1');
define('_INSTALL_DBOLD_TEXT','to Use operation in a mode of compatibility with low versions of a database.');
define('_INSTALL_DBEXP','New type of tables');
define('_INSTALL_DBEXP_TEXT','<font color = "red"> <strong> ATTENTION! The experimental point. </strong> <br/> to use new type of tables for system operation. </font>');
//install2
define('_INSTALL_TITLE3','Joostina - Web-installation. A step 2 - a title of your site.');
define('_INSTALL_SITENAME','<span> a site Title </span>');
define('_INSTALL_DB_INPUT_ERROR','There were errors at an insertion of the data in your database! <br/> setting continuation is impossible!');
define('_INSTALL_SITENAME_TEXT','It is used at automatic sending of messages on electronic mail and can it is displayed in site title.');
define('_INSTALL_SITENAME_VAR','For example: My new site!');
define('_INSTALL_ERRORS','Errors:');
define('_INSTALL_2_INFO1','Enter a title of your site!');
define('_INSTALL_2_INFO2','the Error of creation of the data:');
define('_INSTALL_2_INFO3','you enter the incorrect data about DB MySQL or necessary fields of the form are not filled.');
define('_INSTALL_2_INFO4','you can not enter a database prefix.');
define('_INSTALL_2_INFO5','incorrect user name and the password Are entered.');
//install3
define('_INSTALL_TITLE4','Joostina - Web-installation. A step 3 - a site configuration');
define('_INSTALL_SITECONFIG','<span> a site Configuration </span>');
define('_INSTALL_SITECONFIG_TEXT','<p> If you are not assured of correctness of adjustments, leave values by default. <br/> later you can change these adjustments in a global configuration of a site. </p>');
define('_INSTALL_ALL','All:');
define('_INSTALL_GROUP','Group:');
define('_INSTALL_OWNER','the Owner:');
define('_INSTALL_READ','reading');
define('_INSTALL_WRITE','record');
define('_INSTALL_SEARCH','search');
define('_INSTALL_EXECUTE','performance');
define('_INSTALL_DIRPERMS','Права access to directories');
define('_INSTALL_DIRPERMS_TEXT','not to change CHMOD (to use server default)');
define('_INSTALL_DIRPERMS_CHMOD','CHMOD directories:');
define('_INSTALL_FILEPERMS','Права access to files');
define('_INSTALL_FILEPERMS_TEXT','not to change CHMOD (to use server default)');
define('_INSTALL_FILEPERMS_CHMOD','CHMOD files:');
define('_INSTALL_ADMINPASSWORD','the Password of the Super Administrator');
define('_INSTALL_ADMINPASSWORD_TEXT','It is recommended to use the password not more shortly <strong> 6 </strong> characters.');
define('_INSTALL_ADMINEMAIL','your E-mail');
define('_INSTALL_ADMINEMAIL_TEXT','It is used as the address of the Super Administrator of a site.');
define('_INSTALL_ADMINLOGIN','your login');
define('_INSTALL_ADMINLOGIN_TEXT','It is used as login for authorization of the Super Administrator of a site.');
define('_INSTALL_SITEURL','URL a site');
define('_INSTALL_ABSOLUTEPATH','the Absolute way');
define('_INSTALL_3_INFO1','Enter URL a site.');
define('_INSTALL_3_INFO2','Enter an absolute way to your site.');
define('_INSTALL_3_INFO3','Enter an E-mail of the Super Administrator of a site for communication with it.');
define('_INSTALL_3_INFO4','Enter the password of your Super Administrator.');
//install4
define('_INSTALL_TITLE5','Joostina - Web-installation. A step 4 - setting is completed');
define('_INSTALL_4_INFO1','<span id = "alert_mess" class = "error"> PLEASE, DELETE THE DIRECTORY "INSTALLATION", <br/> DIFFERENTLY YOUR SITE DOES NOT BOOT </span>');
define('_INSTALL_SITEVIEW','site Review');
define('_INSTALL_ADMINPANEL','the Control bar');
define('_INSTALL_DEL_INSTALL','to Delete installation');
define('_INSTALL_ADMININFO','the Data for authorization of the Super Administrator of a site:');
define('_INSTALL_LOGIN','Login:');
define('_INSTALL_PASSWORD','the Password:');
define('_INSTALL_CONFIGFILE_ERROR','your configuration file or the necessary directory are inaccessible to record, or there is any problem with creation of the main configuration file. You should load this code manually. <br/> is mandatory select and copy all following code:');
define('_INSTALL_CHMOD_REPORT1','Access rights to files and directories are not changed.');
define('_INSTALL_CHMOD_REPORT2','Access rights to files and directories are successfully changed.');
define('_INSTALL_CHMOD_REPORT3','Access rights to files and directories cannot be changed.<br /> please, install CHMOD directories and files Joostina manually.');