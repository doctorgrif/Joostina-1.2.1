# $Id: joostina.sql Joostina 1.2.0 boston $


#
# ��������� ������� `#__banners`
#

CREATE TABLE IF NOT EXISTS `#__banners` (
  `id` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `type` varchar(10) NOT NULL default 'banner',
  `name` varchar(50) NOT NULL default '',
  `imp_total` int(11) NOT NULL default '0',
  `imp_made` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `image_url` varchar(100) default '',
  `click_url` varchar(200) default '',
  `custom_banner_code` text,
  `state` tinyint(1) NOT NULL default '0',
  `last_show` datetime NOT NULL default '0000-00-00 00:00:00',
  `msec` int(11) NOT NULL default '0',
  `publish_up_date` date NOT NULL default '0000-00-00',
  `publish_up_time` time NOT NULL default '00:00:00',
  `publish_down_date` date NOT NULL default '0000-00-00',
  `publish_down_time` time NOT NULL default '00:00:00',
  `reccurtype` tinyint(1) NOT NULL default '0',
  `reccurweekdays` varchar(100) NOT NULL default '',
  `access` int(11) NOT NULL default '0',
  `target` varchar(15) NOT NULL default '',
  `border_value` int(11) NOT NULL default '0',
  `border_style` varchar(11) NOT NULL default '',
  `border_color` varchar(11) NOT NULL default '',
  `click_value` varchar(10) NOT NULL default '',
  `complete_clicks` int(11) NOT NULL default '0',
  `imp_value` varchar(10) NOT NULL default '',
  `dta_mod_clicks` date default NULL,
  `password` varchar(40) NOT NULL default '',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `alt` varchar(200) default '',
  `title` varchar(200) default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__banners_categories`
#

CREATE TABLE IF NOT EXISTS `#__banners_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;


#
# ��������� ������� `#__banners_clients`
#

CREATE TABLE IF NOT EXISTS `#__banners_clients` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__categories`
#

CREATE TABLE `#__categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `image` varchar(100) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(10) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__components`
#

CREATE TABLE `#__components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__components_params`
#

#CREATE TABLE `#__components_params` (
#  `id` bigint(20) unsigned NOT NULL auto_increment,
#  `component` varchar(50) NOT NULL default '',
#  `params` blob NOT NULL,
#  PRIMARY KEY  (`id`)
#) ENGINE=MyISAM  ;

#
# ������ ������� `#__components`
#

INSERT INTO `#__components` VALUES (1, '�������', '', 0, 0, 'option=com_banners', '���������� ���������', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, '');
INSERT INTO `#__components` VALUES (2, '�������', '', 0, 1, 'option=com_banners&task=banners', '�������� �������', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '');
INSERT INTO `#__components` VALUES (3, '�������', '', 0, 1, 'option=com_banners&task=clients', '���������� ���������', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '');
INSERT INTO `#__components` VALUES (25, '���������', '', 0, 1, 'option=com_banners&task=categories', '���������� �����������', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '');
INSERT INTO `#__components` VALUES (4, '������� ������', 'option=com_weblinks', 0, 0, '', '���������� ��������', 'com_weblinks', 0, 'js/ThemeOffice/globe2.png', 0, '');
INSERT INTO `#__components` VALUES (5, '������', '', 0, 4, 'option=com_weblinks', '�������� ������������ ������', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '');
INSERT INTO `#__components` VALUES (6, '���������', '', 0, 4, 'option=categories&section=com_weblinks', '���������� ����������� ������', '', 2, 'js/ThemeOffice/categories.png', 0, '');
INSERT INTO `#__components` VALUES (7, '��������', 'option=com_contact', 0, 0, '', '������������� ���������� ����������', 'com_contact', 0, 'js/ThemeOffice/user.png', 1, '');
INSERT INTO `#__components` VALUES (8, '��������', '', 0, 7, 'option=com_contact', '������������� ���������� ����������', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '');
INSERT INTO `#__components` VALUES (9, '���������', '', 0, 7, 'option=categories&section=com_contact_details', '���������� ����������� ���������', '', 2, 'js/ThemeOffice/categories.png', 1, '');
INSERT INTO `#__components` VALUES (10, '������� ��������', 'option=com_frontpage', 0, 0, '', '���������� ��������� ������� ��������', 'com_frontpage', 0, 'js/ThemeOffice/component.png', 1, '');
INSERT INTO `#__components` VALUES (11, '������', 'option=com_poll', 0, 0, 'option=com_poll', '���������� ��������', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '');
INSERT INTO `#__components` VALUES (12, '����� ��������', 'option=com_newsfeeds', 0, 0, '', '���������� ����������� ���� ��������', 'com_newsfeeds', 0, 'js/ThemeOffice/rss_go.png', 0, '');
INSERT INTO `#__components` VALUES (13, '����� ��������', '', 0, 12, 'option=com_newsfeeds', '���������� ������� ��������', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, '');
INSERT INTO `#__components` VALUES (14, '���������', '', 0, 12, 'option=com_categories&section=com_newsfeeds', '���������� �����������', '', 2, 'js/ThemeOffice/categories.png', 0, '');
INSERT INTO `#__components` VALUES (15, '�����������', 'option=com_login', 0, 0, '', '', 'com_login', 0, '', 1, '');
INSERT INTO `#__components` VALUES (16, '�����', 'option=com_search', 0, 0, '', '', 'com_search', 0, '', 1, '');
INSERT INTO `#__components` VALUES (17, 'RSS �������', '', 0, 0, 'option=com_syndicate&hidemainmenu=1', '���������� ����������� �������� ��������', 'com_syndicate', 0, 'js/ThemeOffice/rss.png', 0, '');
INSERT INTO `#__components` VALUES (18, '�������� �����', '', 0, 0, 'option=com_massmail&hidemainmenu=1', '�������� �������� �����', 'com_massmail', 0, 'js/ThemeOffice/mass_email.png', 0, '');
INSERT INTO `#__components` VALUES (19, '���������� ��������', 'option=com_jce', 0, 0, 'option=com_jce', '���������� �������� JCE', 'com_jce', 0, 'js/ThemeOffice/editor_on.png', 0, '');
INSERT INTO `#__components` VALUES (20, '���������', '', 0, 19, 'option=com_jce&task=config', '��������� ��������� JCE', 'com_jce', 0, 'js/ThemeOffice/controlpanel.png', 0, '');
INSERT INTO `#__components` VALUES (21, '����� ����������', '', 0, 19, 'option=com_jce&task=lang', '����� ���������� JCE', 'com_jce', 1, 'js/ThemeOffice/language.png', 0, '');
INSERT INTO `#__components` VALUES (22, '����������', '', 0, 19, 'option=com_jce&task=showplugins', '���������� JCE', 'com_jce', 2, 'js/ThemeOffice/add_section.png', 0, '');
INSERT INTO `#__components` VALUES (23, '������������ ������', '0', 0, 19, 'option=com_jce&task=editlayout', '������������ ������ JCE', 'com_jce', 3, 'js/ThemeOffice/content.png', 0, '');
INSERT INTO `#__components` VALUES (24, '����� �����', 'option=com_xmap', 0, 0, 'option=com_xmap', '', 'com_xmap', 0, 'js/ThemeOffice/map.png', 0, '');



#
# ��������� ������� `#__contact_details`
#

CREATE TABLE `#__contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) NOT NULL default '',
  `con_position` varchar(250) default NULL,
  `address` text,
  `suburb` varchar(250) default NULL,
  `state` varchar(250) default NULL,
  `country` varchar(250) default NULL,
  `postcode` varchar(20) default NULL,
  `telephone` varchar(250) default NULL,
  `fax` varchar(250) default NULL,
  `misc` mediumtext,
  `image` varchar(100) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(100) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__content`
#

CREATE TABLE `#__content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(100) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `notetext` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_mask` (`mask`),
  KEY `idx_created_by` (`created_by`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__content_frontpage`
#

CREATE TABLE `#__content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__content_rating`
#

CREATE TABLE `#__content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__core_log_items`
#


CREATE TABLE `#__core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM ;

#
# ��������� ������� `#__core_log_searches`
#


CREATE TABLE `#__core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0',
  KEY `hits` (`hits`),
  KEY `search_term` (`search_term`(16))
) ENGINE=MyISAM ;

#
# ��������� ������� `#__groups`
#

CREATE TABLE `#__groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__groups`
#

INSERT INTO `#__groups` VALUES (0, '�����');
INSERT INTO `#__groups` VALUES (1, '���������');
INSERT INTO `#__groups` VALUES (2, '�����������');
# --------------------------------------------------------

#
# ��������� ������� `#__mambots`
#

CREATE TABLE `#__mambots` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM ;

INSERT INTO `#__mambots` VALUES (1,'����������� MOS','mosimage','content',0,-10000,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (2,'��������� �� �������� MOS','mospaging','content',0,10000,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (3,'��������� ������������ ��������','legacybots','content',0,1,0,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (4,'SEF','mossef','content',0,3,1,0,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (5,'������� ������','plugin_jw_ajaxvote','content',0,4,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (6,'����� �����������','content.searchbot','search',0,1,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (7,'����� ���-������','weblinks.searchbot','search',0,2,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (8,'��������� ����','moscode','content',0,2,0,0,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (9,'������� �������� HTML','none','editors',0,0,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (10, 'WYSIWYG-�������� JCE', 'jce', 'editors', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', 'theme=advance\r\neditor_width=100%');
INSERT INTO `#__mambots` VALUES (11,'������ ����������� MOS � ���������','mosimage.btn','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (12,'������ ������� �������� MOS � ���������','mospage.btn','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (13,'����� ���������','contacts.searchbot','search',0,3,1,1,0,0,'0000-00-00 00:00:00','');
INSERT INTO `#__mambots` VALUES (14, '����� ���������', 'categories.searchbot', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (15, '����� ��������', 'sections.searchbot', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (16, '���������� E-mail', 'mosemailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (17, '����� ���� ��������', 'newsfeeds.searchbot', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (18, '������� �������� ������', 'mosloadposition', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (19, '������ ���������� �����������', 'first', 'mainbody', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__mambots` VALUES (20, '������ �� ������� ��������', 'frontpagemodule', 'content', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'mod_position=banner\nmod_type=1\nmod_after=1');

# --------------------------------------------------------

#
# ��������� ������� `#__menu`
#

CREATE TABLE `#__menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(25) default NULL,
  `name` varchar(100) default NULL,
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM ;

INSERT INTO `#__menu` VALUES (1, 'mainmenu', '�������', 'index.php?option=com_frontpage', 'components', 1, 0, 10, 0, 2, '', '', 0, 0, 0, 3, 'title=\npage_name=\nno_site_name=0\nrobots=-1\nmeta_description=\nmeta_keywords=\nmeta_author=\nmenu_image=-1\npageclass_sfx=\nheader=����� ���������� �� ������� ��������\npage_title=0\nback_button=0\nleading=3\nintro=2\ncolumns=2\nlink=1\norderby_pri=\norderby_sec=front\npagination=2\npagination_results=1\nimage=1\nsection=0\nsection_link=0\ncategory=1\ncategory_link=0\nitem_title=1\nlink_titles=1\nreadmore=0\nrating=0\nauthor=0\ncreatedate=0\nmodifydate=0\nprint=0\nemail=0\nunpublished=0');
# --------------------------------------------------------

#
# ��������� ������� `#__messages`
#

CREATE TABLE `#__messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` varchar(230) NOT NULL default '',
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__messages_cfg`
#

CREATE TABLE `#__messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__modules`
#

CREATE TABLE `#__modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(10) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
#  `assign_to_url` blob not null,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__modules`
#

INSERT INTO `#__modules` VALUES (1, '���� ������', '', 4, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_poll', 0, 0, 1, 'cache=0\nmoduleclass_sfx=', 0, 0);
INSERT INTO `#__modules` VALUES (2, '���� ������������', '', 1, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mljoostinamenu', 0, 1, 1, 'moduleclass_sfx=_menu\nclass_sfx=\nmenutype=usermenu\nmenu_style=ulli\nml_imaged=0\nml_module_number=1\nml_first_hidden=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nml_separated_link=0\nml_linked_sep=0\nml_separated_link_first=0\nml_separated_link_last=0\nml_hide_active=0\nml_separated_active=0\nml_linked_sep_active=0\nml_separated_active_first=0\nml_separated_active_last=0\nml_separated_element=0\nml_separated_element_first=0\nml_separated_element_last=0\nml_td_width=0\nml_div=0\nml_aligner=left\nml_rollover_use=0\nml_image1=-1\nml_image2=-1\nml_image3=-1\nml_image4=-1\nml_image5=-1\nml_image6=-1\nml_image7=-1\nml_image8=-1\nml_image9=-1\nml_image10=-1\nml_image11=-1\nml_image_roll_1=-1\nml_image_roll_2=-1\nml_image_roll_3=-1\nml_image_roll_4=-1\nml_image_roll_5=-1\nml_image_roll_6=-1\nml_image_roll_7=-1\nml_image_roll_8=-1\nml_image_roll_9=-1\nml_image_roll_10=-1\nml_image_roll_11=-1\nml_hide_logged1=1\nml_hide_logged2=1\nml_hide_logged3=1\nml_hide_logged4=1\nml_hide_logged5=1\nml_hide_logged6=1\nml_hide_logged7=1\nml_hide_logged8=1\nml_hide_logged9=1\nml_hide_logged10=1\nml_hide_logged11=1', 1, 0);
INSERT INTO `#__modules` VALUES (3, '������� ����', '', 2, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mljoostinamenu', 0, 0, 0, 'moduleclass_sfx=-round\nclass_sfx=\nmenutype=mainmenu\nmenu_style=ulli\nml_imaged=0\nml_module_number=1\nnumrow=5\nml_first_hidden=1\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nml_separated_link=0\nml_linked_sep=0\nml_separated_link_first=0\nml_separated_link_last=0\nml_hide_active=0\nml_separated_active=0\nml_linked_sep_active=0\nml_separated_active_first=0\nml_separated_active_last=0\nml_separated_element=0\nml_separated_element_first=0\nml_separated_element_last=0\nml_td_width=0\nml_div=0\nml_aligner=left\nml_rollover_use=0\nml_image1=-1\nml_image2=-1\nml_image3=-1\nml_image4=-1\nml_image5=-1\nml_image6=apply.png\nml_image7=apply.png\nml_image8=apply.png\nml_image9=apply.png\nml_image10=apply.png\nml_image11=apply.png\nml_image_roll_1=-1\nml_image_roll_2=-1\nml_image_roll_3=-1\nml_image_roll_4=-1\nml_image_roll_5=-1\nml_image_roll_6=-1\nml_image_roll_7=-1\nml_image_roll_8=-1\nml_image_roll_9=-1\nml_image_roll_10=-1\nml_image_roll_11=-1\nml_hide_logged1=1\nml_hide_logged2=1\nml_hide_logged3=1\nml_hide_logged4=1\nml_hide_logged5=1\nml_hide_logged6=1\nml_hide_logged7=1\nml_hide_logged8=1\nml_hide_logged9=1\nml_hide_logged10=1\nml_hide_logged11=1', 1, 0);
INSERT INTO `#__modules` VALUES (4, '�����������', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_ml_login', 0, 0, 0, 'moduleclass_sfx=\nml_visibility=1\ndr_login_text=����\norientation=0\nml_avatar=0\npretext=\nposttext=\nlogin=\nlogin_message=0\ngreeting=1\nuser_name=0\nprofile_link=0\nprofile_link_text=������ �������\nlogout=\nlogout_message=0\nshow_login_text=1\nshow_login_tooltip=1\nml_login_text=�����\nlogin_tooltip_text=\nshow_pass_text=1\nshow_pass_tooltip=0\nml_pass_text=\npass_tooltip_text=\nshow_remember=0\nml_rem_text=\nshow_lost_pass=1\nml_rem_pass_text=\nshow_register=1\nml_reg_text=\nsubmit_button_text=', 1, 0);
INSERT INTO `#__modules` VALUES (5, '������� ��������', '', 2, 'bottom', 0, '0000-00-00 00:00:00', 1, 'mod_rssfeed', 0, 0, 1, 'cache=0\nmoduleclass_sfx=\ntext=\nyandex=0\nrss091=0\nrss10=0\nrss20=1\natom=0\nopml=0\nrss091_image=\nrss10_image=\nrss20_image=\natom_image=\nopml_image=\nyandex_image=', 1, 0);
INSERT INTO `#__modules` VALUES (6, '��������� �������', '', 1, 'user5', 0, '0000-00-00 00:00:00', 1, 'mod_latestnews', 0, 0, 1, 'moduleclass_sfx=\ncache=0\nnoncss=0\ntype=1\nshow_front=1\ncount=3\ncatid=\nsecid=1\ndef_itemid=29', 1, 0);
INSERT INTO `#__modules` VALUES (7, '����������', '', 2, 'user9', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 0, 0, 'serverinfo=1\nsiteinfo=0\ncounter=0\nincrease=0\nmoduleclass_sfx=-stat', 0, 0);
INSERT INTO `#__modules` VALUES (8, '������������', '', 1, 'user9', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'moduleclass_sfx=\nmodule_orientation=0\nall_user=1\nonline_user_count=0\nonline_users=0\nuser_avatar=0', 0, 0);
INSERT INTO `#__modules` VALUES (9, '����������', '', 1, 'user6', 0, '0000-00-00 00:00:00', 1, 'mod_mostread', 0, 0, 1, 'moduleclass_sfx=\ncache=0\nnoncss=0\ntype=1\nshow_front=1\nshow_hits=0\ncount=3\ncatid=\nsecid=\ndef_itemid=0', 0, 0);
INSERT INTO `#__modules` VALUES (10, '����� �������', '', 7, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_templatechooser', 0, 0, 1, 'show_preview=1', 0, 0);
INSERT INTO `#__modules` VALUES (11, '�����', '', 8, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_archive', 0, 0, 1, '', 1, 0);
INSERT INTO `#__modules` VALUES (12, '�������', '', 9, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_sections', 0, 0, 1, '', 1, 0);
INSERT INTO `#__modules` VALUES (13, '������� �������', '', 1, 'top', 0, '0000-00-00 00:00:00', 0, 'mod_newsflash', 0, 0, 0, 'catid=3\nstyle=random\nimage=0\nlink_titles=\nreadmore=0\nitem_title=0\nitems=\ncache=0\nmoduleclass_sfx=', 0, 0);
INSERT INTO `#__modules` VALUES (14, '��������������� ��������', '', 2, 'user6', 0, '0000-00-00 00:00:00', 0, 'mod_related_items', 0, 0, 1, 'cache=0\nmoduleclass_sfx=', 0, 0);
INSERT INTO `#__modules` VALUES (15, '�����', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_search', 0, 0, 0, 'moduleclass_sfx=\ncache=0\nset_itemid=\nwidth=20\ntext=�����\nbutton=1\nbutton_text=\ntext_pos=inside\nbutton_pos=right', 0, 0);
INSERT INTO `#__modules` VALUES (16, '��������', '', 1, 'user1', 0, '0000-00-00 00:00:00', 1, 'mod_random_image', 0, 0, 0, 'rotate_type=1\ntype=jpg\nfolder=images/rotate\nlink=http://www.joostina.ru\nwidth=400\nheight=280\nmoduleclass_sfx=\nslideshow_name=jstSlideShow_1\nimg_pref=slide\ns_autoplay=1\ns_pause=2500\ns_fadeduration=500\npanel_height=55px\npanel_opacity=0.4\npanel_padding=5px\npanel_font=bold 11px Verdana', 0, 0);
INSERT INTO `#__modules` VALUES (17, '������� ����', '', 1, 'top', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 0, 'class_sfx=-nav\nmoduleclass_sfx=\nmenutype=topmenu\nmenu_style=list_flat\nfull_active_id=0\ncache=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=', 1, 0);
INSERT INTO `#__modules` VALUES (18, '�������', '', 1, 'banner', 0, '0000-00-00 00:00:00', 1, 'mod_banners', 0, 0, 0, 'categories=\nbanners=\nclients=\ncount=1\nrandom=0\norientation=0', 1, 0);
INSERT INTO `#__modules` VALUES (19, '����������', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 0, 'mod_components', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (20, '���������� ����������', '', 3, 'advert2', 0, '0000-00-00 00:00:00', 0, 'mod_popular', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (21, '��������� ����������� ����������', '', 4, 'advert1', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (22, '����', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 99, 1, '', 0, 1);
INSERT INTO `#__modules` VALUES (23, '��������� ������������������ ������������', '', 4, 'advert2', 0, '0000-00-00 00:00:00', 1, 'mod_latest_users', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (24, '����� ���������', '', 1, 'header', 0, '0000-00-00 00:00:00', 0, 'mod_unread', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (25, '�������� ������������', '', 2, 'header', 0, '0000-00-00 00:00:00', 0, 'mod_online', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (26, '������ ����', '', 1, 'top', 0, '0000-00-00 00:00:00', 1, 'mod_fullmenu', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (27, '����', '', 1, 'pathway', 0, '0000-00-00 00:00:00', 0, 'mod_pathway', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (28, '������ ������������', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (29, '��������� ���������', '', 1, 'inset', 0, '0000-00-00 00:00:00', 1, 'mod_mosmsg', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (30, '������ �������� �������', '', 2, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicons', 0, 99, 1, '', 1, 1);
INSERT INTO `#__modules` VALUES (31, '������ on-line', '', 3, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mljoostinamenu', 0, 0, 1, 'moduleclass_sfx=-help\nclass_sfx=\nmenutype=othermenu\nmenu_style=ulli\nml_imaged=0\nml_module_number=1\nnumrow=3\nml_first_hidden=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nml_separated_link=0\nml_linked_sep=0\nml_separated_link_first=0\nml_separated_link_last=0\nml_hide_active=0\nml_separated_active=0\nml_linked_sep_active=0\nml_separated_active_first=0\nml_separated_active_last=0\nml_separated_element=0\nml_separated_element_first=0\nml_separated_element_last=0\nml_td_width=0\nml_div=0\nml_aligner=left\nml_rollover_use=0\nml_image1=-1\nml_image2=-1\nml_image3=-1\nml_image4=-1\nml_image5=-1\nml_image6=apply.png\nml_image7=apply.png\nml_image8=apply.png\nml_image9=apply.png\nml_image10=apply.png\nml_image11=apply.png\nml_image_roll_1=-1\nml_image_roll_2=-1\nml_image_roll_3=-1\nml_image_roll_4=-1\nml_image_roll_5=-1\nml_image_roll_6=-1\nml_image_roll_7=-1\nml_image_roll_8=-1\nml_image_roll_9=-1\nml_image_roll_10=-1\nml_image_roll_11=-1\nml_hide_logged1=1\nml_hide_logged2=1\nml_hide_logged3=1\nml_hide_logged4=1\nml_hide_logged5=1\nml_hide_logged6=1\nml_hide_logged7=1\nml_hide_logged8=1\nml_hide_logged9=1\nml_hide_logged10=1\nml_hide_logged11=1', 0, 0);
INSERT INTO `#__modules` VALUES (32, 'Wrapper', '', 10, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_wrapper', 0, 0, 1, '', 0, 0);
INSERT INTO `#__modules` VALUES (33, '�� �����', '', 0, 'cpanel', 0, '0000-00-00 00:00:00', 0, 'mod_logged', 0, 99, 1, '', 0, 1);
INSERT INTO `#__modules` VALUES (34, '������� �� ����� Joostina!', '������ �� ������, � ��� ����� ������ ). ���� ��� ���������� ������ &quot;� ������ ������ Joostina?&quot;, �� ������ �� �������� ���� �������� �� ��������� �������������� ����������� ���� CMS:\r\n<div class="marker_round">\r\n<b>1</b> ������� ��������� ��������, �������� ������ � ������������������ � �������� �������. ��, ������ � �����.<br />\r\n<b>2</b> ������������� �� ���� ������������� ��������� ����������� � �������. � ����� �������� ���������� ���������� ��� Joostina CMS. <br />\r\n<b>3</b> ������ ������� ��������������� � ������� ������� � ���� � ��������  ��������� � �������������. � ��������. <br />\r\n</div>\r\n', 1, 'user2', 0, '0000-00-00 00:00:00', 1, '', 0, 0, 1, 'moduleclass_sfx=\ncache=0\nfirebots=1\nrssurl=\nrsstitle=1\nrssdesc=1\nrssimage=1\nrssitems=3\nrssitemdesc=1\nword_count=0\nrsscache=3600', 0, 0);
INSERT INTO `#__modules` VALUES (37, '��������� ����', '', 1, 'user7', 0, '0000-00-00 00:00:00', 1, 'mod_random_image', 0, 0, 1, 'rotate_type=0\ntype=jpg\nfolder=images/rotate\nlink=http://www.joostina.ru\nwidth=180\nheight=150\nmoduleclass_sfx=\nslideshow_name=jstSlideShow_1\nimg_pref=pic\ns_autoplay=1\ns_pause=2500\ns_fadeduration=500\npanel_height=55px\npanel_opacity=0.4\npanel_padding=5px\npanel_font=bold 11px Verdana', 0, 0);
INSERT INTO `#__modules` VALUES (38, '�������� ����������', '<ul class="bigred">\r\n	<li>����� �������� Joostina CMS ��������� � templates/[��������_������_�������] </li>\r\n	<li>��������� � ���������� ������������ �������� ������� � ������� ��� ��������� ������ ����� </li>\r\n	<li>��������� ����������� ����������� - ����� �������� ����������������� ����� </li>\r\n</ul>\r\n', 1, 'user8', 0, '0000-00-00 00:00:00', 1, '', 0, 0, 1, 'moduleclass_sfx=\ncache=0\nfirebots=1\nrssurl=\nrsstitle=1\nrssdesc=1\nrssimage=1\nrssitems=3\nrssitemdesc=1\nword_count=0\nrsscache=3600', 0, 0);
INSERT INTO `#__modules` VALUES (39, '������ ����', '', 1, 'bottom', 0, '0000-00-00 00:00:00', 1, 'mod_mljoostinamenu', 0, 0, 0, 'moduleclass_sfx=-bottom\nclass_sfx=\nmenutype=topmenu\nmenu_style=ulli\nml_imaged=0\nml_module_number=2\nnumrow=6\nml_first_hidden=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nml_separated_link=0\nml_linked_sep=0\nml_separated_link_first=0\nml_separated_link_last=0\nml_hide_active=0\nml_separated_active=0\nml_linked_sep_active=0\nml_separated_active_first=0\nml_separated_active_last=0\nml_separated_element=0\nml_separated_element_first=0\nml_separated_element_last=0\nml_td_width=0\nml_div=0\nml_aligner=left\nml_rollover_use=0\nml_image1=-1\nml_image2=-1\nml_image3=-1\nml_image4=-1\nml_image5=-1\nml_image6=apply.png\nml_image7=apply.png\nml_image8=apply.png\nml_image9=apply.png\nml_image10=apply.png\nml_image11=apply.png\nml_image_roll_1=-1\nml_image_roll_2=-1\nml_image_roll_3=-1\nml_image_roll_4=-1\nml_image_roll_5=-1\nml_image_roll_6=-1\nml_image_roll_7=-1\nml_image_roll_8=-1\nml_image_roll_9=-1\nml_image_roll_10=-1\nml_image_roll_11=-1\nml_hide_logged1=1\nml_hide_logged2=1\nml_hide_logged3=1\nml_hide_logged4=1\nml_hide_logged5=1\nml_hide_logged6=1\nml_hide_logged7=1\nml_hide_logged8=1\nml_hide_logged9=1\nml_hide_logged10=1\nml_hide_logged11=1', 0, 0);

# --------------------------------------------------------

#
# ��������� ������� `#__modules_menu`
#

CREATE TABLE `#__modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__modules_menu`
#

INSERT INTO `#__modules_menu` VALUES (1, 0);
INSERT INTO `#__modules_menu` VALUES (2, 0);
INSERT INTO `#__modules_menu` VALUES (3, 0);
INSERT INTO `#__modules_menu` VALUES (4, 0);
INSERT INTO `#__modules_menu` VALUES (5, 0);
INSERT INTO `#__modules_menu` VALUES (6, 1);
INSERT INTO `#__modules_menu` VALUES (7, 1);
INSERT INTO `#__modules_menu` VALUES (8, 1);
INSERT INTO `#__modules_menu` VALUES (9, 1);
INSERT INTO `#__modules_menu` VALUES (10, 1);
INSERT INTO `#__modules_menu` VALUES (13, 0);
INSERT INTO `#__modules_menu` VALUES (15, 0);
INSERT INTO `#__modules_menu` VALUES (16, 1);
INSERT INTO `#__modules_menu` VALUES (17, 0);
INSERT INTO `#__modules_menu` VALUES (18, 0);
INSERT INTO `#__modules_menu` VALUES (30, 0);
INSERT INTO `#__modules_menu` VALUES (31, 0);
INSERT INTO `#__modules_menu` VALUES (34, 1);
INSERT INTO `#__modules_menu` VALUES (37, 1);
INSERT INTO `#__modules_menu` VALUES (38, 1);
INSERT INTO `#__modules_menu` VALUES (39, 0);


# --------------------------------------------------------

#
# ��������� ������� `#__newsfeeds`
#

CREATE TABLE `#__newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `code` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__poll_data`
#

CREATE TABLE `#__poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(4) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM ;

#
# ��������� ������� `#__poll_date`
#

CREATE TABLE `#__poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__polls`
#

CREATE TABLE `#__polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__poll_menu`
#

CREATE TABLE `#__poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__sections`
#

CREATE TABLE `#__sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `image` varchar(100) NOT NULL default '',
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(10) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__session`
#

CREATE TABLE `#__session` (
  `username` varchar(50) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__stats_agents`
#

CREATE TABLE `#__stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1',
  KEY `type_agent` (`type`,`agent`)
) ENGINE=MyISAM ;


#
# ��������� ������� `#__templates_menu`
#

CREATE TABLE `#__templates_menu` (
  `template` varchar(50) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`template`,`menuid`)
) ENGINE=MyISAM ;

# ������ ������� `#__templates_menu`

INSERT INTO `#__templates_menu` VALUES ('newline', '0', '0');
INSERT INTO `#__templates_menu` VALUES ('joostfree', '0', '1');

# --------------------------------------------------------

#
# ��������� ������� `#__template_positions`
#

CREATE TABLE `#__template_positions` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(10) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__template_positions`
#

INSERT INTO `#__template_positions` VALUES (0, 'left', '');
INSERT INTO `#__template_positions` VALUES (0, 'right', '');
INSERT INTO `#__template_positions` VALUES (0, 'top', '');
INSERT INTO `#__template_positions` VALUES (0, 'bottom', '');
INSERT INTO `#__template_positions` VALUES (0, 'inset', '');
INSERT INTO `#__template_positions` VALUES (0, 'banner', '');
INSERT INTO `#__template_positions` VALUES (0, 'header', '');
INSERT INTO `#__template_positions` VALUES (0, 'footer', '');
INSERT INTO `#__template_positions` VALUES (0, 'newsflash', '');
INSERT INTO `#__template_positions` VALUES (0, 'legals', '');
INSERT INTO `#__template_positions` VALUES (0, 'pathway', '');
INSERT INTO `#__template_positions` VALUES (0, 'toolbar', '');
INSERT INTO `#__template_positions` VALUES (0, 'cpanel', '');
INSERT INTO `#__template_positions` VALUES (0, 'user1', '');
INSERT INTO `#__template_positions` VALUES (0, 'user2', '');
INSERT INTO `#__template_positions` VALUES (0, 'user3', '');
INSERT INTO `#__template_positions` VALUES (0, 'user4', '');
INSERT INTO `#__template_positions` VALUES (0, 'user5', '');
INSERT INTO `#__template_positions` VALUES (0, 'user6', '');
INSERT INTO `#__template_positions` VALUES (0, 'user7', '');
INSERT INTO `#__template_positions` VALUES (0, 'user8', '');
INSERT INTO `#__template_positions` VALUES (0, 'user9', '');
INSERT INTO `#__template_positions` VALUES (0, 'advert1', '');
INSERT INTO `#__template_positions` VALUES (0, 'advert2', '');
INSERT INTO `#__template_positions` VALUES (0, 'advert3', '');
INSERT INTO `#__template_positions` VALUES (0, 'icon', '');
INSERT INTO `#__template_positions` VALUES (0, 'debug', '');
# --------------------------------------------------------

#
# ��������� ������� `#__users`
#

CREATE TABLE `#__users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `username` varchar(25) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `idxemail` (`email`),
  KEY `block_id` (`block`,`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__usertypes`
#

CREATE TABLE `#__usertypes` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `mask` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__usertypes`
#

INSERT INTO `#__usertypes` VALUES (0, 'superadministrator', '');
INSERT INTO `#__usertypes` VALUES (1, 'administrator', '');
INSERT INTO `#__usertypes` VALUES (2, 'editor', '');
INSERT INTO `#__usertypes` VALUES (3, 'user', '');
INSERT INTO `#__usertypes` VALUES (4, 'author', '');
INSERT INTO `#__usertypes` VALUES (5, 'publisher', '');
INSERT INTO `#__usertypes` VALUES (6, 'manager', '');
# --------------------------------------------------------

#
# ��������� ������� `#__weblinks`
#

CREATE TABLE `#__weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` varchar(250) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__core_acl_aro`
#

CREATE TABLE `#__core_acl_aro` (
  `aro_id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`aro_id`),
  UNIQUE KEY `#__gacl_section_value_value_aro` (`section_value`(100),`value`(100)),
  UNIQUE KEY `value` (`value`),
  KEY `#__gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  ;

#
# ��������� ������� `#__core_acl_aro_groups`
#
CREATE TABLE `#__core_acl_aro_groups` (
  `group_id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`),
  KEY `parent_id_aro_groups` (`parent_id`),
  KEY `#__gacl_parent_id_aro_groups` (`parent_id`),
  KEY `#__gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM ;

#
# ������ ������� `#__core_acl_aro_groups`
#
INSERT INTO `#__core_acl_aro_groups` VALUES (17,0,'ROOT',1,22);
INSERT INTO `#__core_acl_aro_groups` VALUES (28,17,'USERS',2,21);
INSERT INTO `#__core_acl_aro_groups` VALUES (29,28,'Public Frontend',3,12);
INSERT INTO `#__core_acl_aro_groups` VALUES (18,29,'Registered',4,11);
INSERT INTO `#__core_acl_aro_groups` VALUES (19,18,'Author',5,10);
INSERT INTO `#__core_acl_aro_groups` VALUES (20,19,'Editor',6,9);
INSERT INTO `#__core_acl_aro_groups` VALUES (21,20,'Publisher',7,8);
INSERT INTO `#__core_acl_aro_groups` VALUES (30,28,'Public Backend',13,20);
INSERT INTO `#__core_acl_aro_groups` VALUES (23,30,'Manager',14,19);
INSERT INTO `#__core_acl_aro_groups` VALUES (24,23,'Administrator',15,18);
INSERT INTO `#__core_acl_aro_groups` VALUES (25,24,'Super Administrator',16,17);

#
# ��������� ������� `#__core_acl_groups_aro_map`
#
CREATE TABLE `#__core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`),
  KEY `aro_id` (`aro_id`)
) ENGINE=MyISAM ;

#
# ��������� ������� `#__core_acl_aro_sections`
#
CREATE TABLE `#__core_acl_aro_sections` (
  `section_id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`section_id`),
  UNIQUE KEY `value_aro_sections` (`value`),
  KEY `hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  ;
;

INSERT INTO `#__core_acl_aro_sections` VALUES (10,'users',1,'Users',0);

#
# ������� JoomlaPack
#
CREATE TABLE `#__jp_packvars` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(255) NOT NULL,
  `value` varchar(255) default NULL,
  `value2` LONGTEXT,
  PRIMARY KEY  (`id`)
)ENGINE=MyISAM ;

CREATE TABLE `#__jp_def` (
  `def_id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `directory` VARCHAR(255) NOT NULL,
  PRIMARY KEY(`def_id`)
)ENGINE=MyISAM ;


CREATE TABLE `#__jce_langs` (
  `id` int(11) NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL default '',
  `lang` varchar(100) NOT NULL default '',
  `published` tinyint(3) NOT NULL default '0',
PRIMARY KEY (`id`)
)ENGINE=MyISAM ;

insert into `#__jce_langs` values ('1', '������� (Russian cp1251)', 'ru', '1');

CREATE TABLE `#__jce_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `plugin` varchar(100) NOT NULL default '',
  `type` varchar(100) NOT NULL default 'plugin',
  `icon` varchar(255) NOT NULL default '',
  `layout_icon` varchar(255) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '18',
  `row` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `editable` tinyint(3) NOT NULL default '0',
  `elements` varchar(255) NOT NULL default '',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
PRIMARY KEY  (`id`),
 UNIQUE KEY `plugin` (`plugin`) )
ENGINE=MyISAM ;

# ������� ��������� JCE
INSERT INTO `#__jce_plugins` VALUES(null, '������������� �����', 'fullscreen', 'plugin', 'fullscreen', 'fullscreen', 18, 1, 22, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�������', 'paste', 'plugin', 'pasteword,pastetext', 'paste', 18, 1, 18, 1, 1, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������������', 'preview', 'plugin', 'preview', 'preview', 18, 4, 1, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�������', 'table', 'plugin', 'tablecontrols', 'buttons', 18, 2, 3, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '����� � ������', 'searchreplace', 'plugin', 'search,replace', 'searchreplace', 18, 1, 8, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����', 'style', 'plugin', 'styleprops', 'styleprops', 18, 4, 2, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������� �������', 'visualchars', 'plugin', 'visualchars', 'visualchars', 18, 4, 4, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, 'XHTML Xtras', 'xhtmlxtras', 'plugin', 'cite,abbr,acronym,del,ins', 'xhtmlxtras', 18, 4, 5, 0, 0, 'del[*],ins[*]', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�������� �����������', 'imgmanager', 'plugin', '', 'imgmanager', 18, 4, 6, 1, 1, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'advlink', 'plugin', '', 'advlink', 18, 4, 7, 1, 1, '', 1, 0, 0, '0000-00-00 00:00:00', 'article=18\nsection=18\ncategory=18\nstatic=18\ncontact=18\nmenu=18');
INSERT INTO `#__jce_plugins` VALUES(null, '���� ������', 'forecolor', 'command', 'forecolor', 'forecolor', 18, 1, 7, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'bold', 'command', 'bold', 'bold', 18, 1, 3, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'italic', 'command', 'italic', 'italic', 18, 1, 4, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������������', 'underline', 'command', 'underline', 'underline', 18, 1, 5, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '���� ����', 'backcolor', 'command', 'backcolor', 'backcolor', 18, 1, 8, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������� ������', 'unlink', 'command', 'unlink', 'unlink', 18, 1, 16, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '����� ������', 'fontselect', 'command', 'fontselect', 'fontselect', 18, 3, 2, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������ ������', 'fontsizeselect', 'command', 'fontsizeselect', 'fontsizeselect', 18, 1, 19, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����', 'styleselect', 'command', 'styleselect', 'styleselect', 18, 3, 1, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '����� ��������', 'newdocument', 'command', 'newdocument', 'newdocument', 18, 1, 4, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'strikethrough', 'command', 'strikethrough', 'strikethrough', 18, 1, 6, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'indent', 'command', 'indent', 'indent', 18, 1, 11, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����', 'outdent', 'command', 'outdent', 'outdent', 18, 1, 10, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'undo', 'command', 'undo', 'undo', 18, 1, 1, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'redo', 'command', 'redo', 'redo', 18, 1, 2, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�������������� �����', 'hr', 'command', 'hr', 'hr', 18, 2, 1, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, 'HTML', 'html', 'command', 'code', 'code', 18, 1, 20, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������������ ������', 'numlist', 'command', 'numlist', 'numlist', 18, 1, 10, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������������� ������', 'bullist', 'command', 'bullist', 'bullist', 18, 1, 9, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '����� ������', 'clipboard', 'command', 'cut,copy,paste', 'clipboard', 18, 1, 16, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'sub', 'command', 'sub', 'sub', 18, 2, 2, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'sup', 'command', 'sup', 'sup', 18, 2, 3, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�������', 'visualaid', 'command', 'visualaid', 'visualaid', 18, 3, 7, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'charmap', 'command', 'charmap', 'charmap', 18, 3, 6, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�� ������', 'full', 'command', 'justifyfull', 'justifyfull', 18, 1, 14, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�� ������', 'center', 'command', 'justifycenter', 'justifycenter', 18, 1, 12, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����', 'left', 'command', 'justifyleft', 'justifyleft', 18, 1, 13, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'right', 'command', 'justifyright', 'justifyright', 18, 1, 11, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������� ��������������', 'removeformat', 'command', 'removeformat', 'removeformat', 18, 1, 21, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����', 'anchor', 'command', 'anchor', 'anchor', 18, 2, 9, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'formatselect', 'command', 'formatselect', 'formatselect', 18, 3, 9, 0, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '�����������', 'image', 'command', 'image', 'image', 18, 1, 17, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');
INSERT INTO `#__jce_plugins` VALUES(null, '������', 'link', 'command', 'link', 'link', 18, 1, 15, 1, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '');

# ��������� ������� �������� �������
CREATE TABLE `#__quickicons` (
  `id` int(11) NOT NULL auto_increment,
  `text` varchar(64) NOT NULL default '',
  `target` varchar(255) NOT NULL default '',
  `icon` varchar(100) NOT NULL default '',
  `ordering` int(10) unsigned NOT NULL default '0',
  `new_window` tinyint(1) NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `title` varchar(64) NOT NULL default '',
  `display` tinyint(1) NOT NULL default '0',
  `access` int(11) unsigned NOT NULL default '0',
  `gid` int(3) default '25',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;


# ��������� ���������� ������� �������� �������
INSERT INTO `#__quickicons` VALUES (1, '�������� ����������', 'index2.php?option=com_content&sectionid=0&task=new', '/administrator/templates/joostfree/images/cpanel_ico/add_new.png', 1, 0, 1, '�������� ������� / ������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (2, '�������', 'index2.php?option=com_sections&scope=content', '/administrator/templates/joostfree/images/cpanel_ico/sections.png', 4, 0, 1, '���������� ���������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (3, '������� ��������', 'index2.php?option=com_frontpage', '/administrator/templates/joostfree/images/cpanel_ico/frontpage.png', 6, 0, 1, '���������� ��������� ������� ��������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (4, '��� ���������� �����', 'index2.php?option=com_content&sectionid=0', '/administrator/templates/joostfree/images/cpanel_ico/all_content.png', 2, 0, 1, '���������� ��������� �����������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (5, '��������� ����������', 'index2.php?option=com_typedcontent', '/administrator/templates/joostfree/images/cpanel_ico/all_typed.png', 3, 0, 1, '���������� ��������� ���������� �����������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (6, '����� ��������', 'index2.php?option=com_jwmmxtd', '/administrator/templates/joostfree/images/cpanel_ico/mediamanager.png', 7, 0, 1, '���������� ����� �������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (7, '���������', 'index2.php?option=com_categories&section=content', '/administrator/templates/joostfree/images/cpanel_ico/categories.png', 5, 0, 1, '���������� �����������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (8, '�������', 'index2.php?option=com_trash', '/administrator/templates/joostfree/images/cpanel_ico/trash.png', 12, 0, 1, '���������� �������� ��������� ��������', 0, 0, 0);
INSERT INTO `#__quickicons` VALUES (9, '�������� ����', 'index2.php?option=com_menumanager', '/administrator/templates/joostfree/images/cpanel_ico/menu.png', 9, 0, 1, '���������� ��������� ����', 0, 0, 24);
INSERT INTO `#__quickicons` VALUES (10, '�������� ��������', 'index2.php?option=com_joomlaxplorer', '/administrator/templates/joostfree/images/cpanel_ico/filemanager.png', 8, 0, 1, '���������� ����� �������', 0, 0, 25);
INSERT INTO `#__quickicons` VALUES (11, '������������', 'index2.php?option=com_users', '/administrator/templates/joostfree/images/cpanel_ico/user.png', 10, 0, 1, '���������� ��������������', 0, 0, 24);
INSERT INTO `#__quickicons` VALUES (12, '���������� ������������', 'index2.php?option=com_config&hidemainmenu=1', '/administrator/templates/joostfree/images/cpanel_ico/config.png', 13, 0, 1, '���������� ������������ �����', 0, 0, 25);
INSERT INTO `#__quickicons` VALUES (13, '��������� �����������', 'index2.php?option=com_joomlapack&act=pack&hidemainmenu=1', '/administrator/templates/joostfree/images/cpanel_ico/backup.png', 11, 0, 1, '��������� ����������� ���������� �����', 0, 0, 24);
INSERT INTO `#__quickicons` VALUES (14, '�������� ���� ���', 'index2.php?option=com_admin&task=clean_all_cache', '/administrator/templates/joostfree/images/cpanel_ico/clear.png', 14, 0, 1, '�������� ���� ��� �����', 0, 0, 24);


# ������� ���������� Xmap
CREATE TABLE `#__xmap` (
  `name` varchar(30) NOT NULL default '',
  `value` varchar(100) default NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM ;

# ������� ���������
INSERT INTO `#__xmap` VALUES ('version', '1.0');
INSERT INTO `#__xmap` VALUES ('classname', 'sitemap');
INSERT INTO `#__xmap` VALUES ('expand_category', '1');
INSERT INTO `#__xmap` VALUES ('expand_section', '1');
INSERT INTO `#__xmap` VALUES ('show_menutitle', '1');
INSERT INTO `#__xmap` VALUES ('columns', '1');
INSERT INTO `#__xmap` VALUES ('exlinks', '1');
INSERT INTO `#__xmap` VALUES ('ext_image', 'img_grey.gif');
INSERT INTO `#__xmap` VALUES ('exclmenus', '');
INSERT INTO `#__xmap` VALUES ('includelink', '1');
INSERT INTO `#__xmap` VALUES ('sitemap_default', '1');

# ������� ���� xmap
CREATE TABLE `#__xmap_sitemap` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `expand_category` int(11) default NULL,
  `expand_section` int(11) default NULL,
  `show_menutitle` int(11) default NULL,
  `columns` int(11) default NULL,
  `exlinks` int(11) default NULL,
  `ext_image` varchar(255) default NULL,
  `menus` text,
  `exclmenus` varchar(255) default NULL,
  `includelink` int(11) default NULL,
  `usecache` int(11) default NULL,
  `cachelifetime` int(11) default NULL,
  `classname` varchar(255) default NULL,
  `count_xml` int(11) default NULL,
  `count_html` int(11) default NULL,
  `views_xml` int(11) default NULL,
  `views_html` int(11) default NULL,
  `lastvisit_xml` int(11) default NULL,
  `lastvisit_html` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

# ������� ���������� xmap
CREATE TABLE IF NOT EXISTS `#__xmap_ext` (
  `id` int(11) NOT NULL auto_increment,
  `extension` varchar(100) NOT NULL,
  `published` int(1) default '0',
  `params` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;
# ������ � ���������� ��� �������� ����� ��������
INSERT INTO `#__xmap_ext` ( `extension`, `published`, `params`) VALUES ( 'com_content', 1, '-1{expand_categories=1\nexpand_sections=1\nshow_unauth=0\ncat_priority=-1\ncat_changefreq=-1\nart_priority=-1\nart_changefreq=-1}');
INSERT INTO `#__xmap_ext` ( `extension`, `published`, `params`) VALUES ( 'com_weblinks', 1, '');
