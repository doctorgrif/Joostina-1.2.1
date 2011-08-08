<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

if (!defined('_JOS_FULLMENU_MODULE')) {
	/** ensure that functions are declared only once */
	define('_JOS_FULLMENU_MODULE', 1);

	/**
	* Full DHTML Admnistrator Menus
	* @package Joostina
	*/
	class mosFullAdminMenu {

		/**
		* Show the menu
		* @param string The current user type
		*/
		function show($usertype = '') {
			global $acl, $database, $my, $mosConfig_cachepath;
			global $mosConfig_live_site, $mosConfig_enable_stats, $mosConfig_caching, $mosConfig_secret, $mosConfig_cachepath, $mosConfig_adm_menu_cache;
			echo '<div id="myMenuID"></div>'; // в этот слой выводится содержимое меню
			if ($mosConfig_adm_menu_cache) { // проверяем, активировано ли кэширование в панели управления
				$usertype = $my->usertype;
				$usertype_menu = str_replace(' ', '_', $usertype);
				// название файла меню получим из md5 хеша типа пользователя и секретного слова конкретной установки
				$menuname = md5($usertype_menu . $mosConfig_secret);
				echo '<script type="text/javascript" src="' . $mosConfig_live_site . '/cache/adm_menu_' . $menuname . '.js\"></script>';
				if (js_menu_cache('', $usertype_menu, 1) == 'true') { // файл есть, выводим ссылку на него и прекращаем работу
					return; // дальнейшую обработку меню не ведём
				} // файла не было - генерируем его, создаём и всё равно возвращаем ссылку
			}
			// получение данных о правах пользователя
			$canConfig = $acl->acl_check('administration', 'config', 'users', $usertype);
			$manageTemplates = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_templates');
			$manageTrash = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_trash');
			$manageMenuMan = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_menumanager');
			$manageLanguages = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_languages');
			$installModules = $acl->acl_check('administration', 'install', 'users', $usertype, 'modules', 'all');
			$editAllModules = $acl->acl_check('administration', 'edit', 'users', $usertype, 'modules', 'all');
			$installMambots = $acl->acl_check('administration', 'install', 'users', $usertype, 'mambots', 'all');
			$editAllMambots = $acl->acl_check('administration', 'edit', 'users', $usertype, 'mambots', 'all');
			$installComponents = $acl->acl_check('administration', 'install', 'users', $usertype, 'components', 'all');
			$editAllComponents = $acl->acl_check('administration', 'edit', 'users', $usertype, 'components', 'all');
			$canMassMail = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_massmail');
			$canManageUsers = $acl->acl_check('administration', 'manage', 'users', $usertype, 'components', 'com_users');
			$menuTypes = mosAdminMenus::menutypes();
			$query = "SELECT a.id, a.title, a.name"
					. "\n FROM #__sections AS a"
					. "\n WHERE a.scope = 'content'"
					. "\n GROUP BY a.id"
					. "\n ORDER BY a.ordering";
			$database->setQuery($query);
			$sections = $database->loadObjectList();
			ob_start(); // складываем всё выдаваемое меню в буфер
			?>
			var myMenu =[
			[null,'<?php echo _SITE; ?>',null,null,'<?php echo _MENU_CMS_FEATURES; ?>',
			<?php
			if ($canConfig) {
				?>['<img src="../includes/js/ThemeOffice/config.png" alt="" />','<?php echo _MENU_GLOBAL_CONFIG; ?>','index2.php?option=com_config&hidemainmenu=1',null,'<?php echo _MENU_GLOBAL_CONFIG_TIP; ?>'],
				<?php
			}
			if ($manageLanguages) {
				?>['<img src="../includes/js/ThemeOffice/language.png" alt="" />','<?php echo _MENU_LANGUAGES; ?>','index2.php?option=com_languages',null,'<?php echo _MENU_LANGUAGES_TIP; ?>',

				],
				<?php
			}
			?>['<img src="../includes/js/ThemeOffice/preview.png" alt="" />', '<?php echo _MENU_SITE_PREVIEW; ?>', null, null, '<?php echo _MENU_SITE_PREVIEW; ?>',
			['<img src="../includes/js/ThemeOffice/preview.png" alt="" />','<?php echo _MENU_SITE_PREVIEW_IN_NEW_WINDOW; ?>','<?php echo $mosConfig_live_site; ?>/index.php','_blank','<?php echo $mosConfig_live_site; ?>'],
			['<img src="../includes/js/ThemeOffice/preview.png" alt="" />','<?php echo _MENU_SITE_PREVIEW_IN_THIS_WINDOW; ?>','index2.php?option=com_admin&task=preview',null,'<?php echo $mosConfig_live_site; ?>'],
			['<img src="../includes/js/ThemeOffice/preview.png" alt="" />','<?php echo _MENU_SITE_PREVIEW_WITH_MODULE_POSITIONS; ?>','index2.php?option=com_admin&task=preview2',null,'<?php echo $mosConfig_live_site; ?>'],
			],
			['<img src="../includes/js/ThemeOffice/globe1.png" alt="" />', '<?php echo _MENU_SITE_STATS; ?>', null, null, '<?php echo _MENU_SITE_STATS_TIP; ?>',
			<?php
			if ($mosConfig_enable_stats == 1) {
				?> ['<img src="../includes/js/ThemeOffice/globe4.png" alt="" />', '<?php echo _MENU_STATS_BROWSERS; ?>', 'index2.php?option=com_statistics', null, '<?php echo _MENU_STATS_BROWSERS_TIP; ?>'],
				<?php
			}
			?>['<img src="../includes/js/ThemeOffice/search_text.png" alt="" />', '<?php echo _MENU_SEARCHES; ?>', 'index2.php?option=com_statistics&task=searches', null, '<?php echo _MENU_SEARCHES_TIP; ?>'],
			['<img src="../includes/js/ThemeOffice/globe3.png" alt="" />', '<?php echo _MENU_PAGE_STATS; ?>', 'index2.php?option=com_statistics&task=pageimp', null, '<?php echo _MENU_PAGE_STATS; ?>']
			],
			<?php
			if ($manageTemplates) {
				?>['<img src="../includes/js/ThemeOffice/template.png" alt="" />','<?php echo _TEMPLATES; ?>',null,null,'<?php echo _MENU_TEMPLATES_TIP; ?>',
					['<img src="../includes/js/ThemeOffice/template.png" alt="" />','<?php echo _MENU_SITE_TEMPLATES; ?>','index2.php?option=com_templates',null,'<?php echo _MENU_SITE_TEMPLATES; ?>'],
					['<img src="../includes/js/ThemeOffice/install.png" alt="" />','<?php echo _MENU_NEW_SITE_TEMPLATE; ?>','index2.php?option=com_installer&element=template&client=',null,'<?php echo _MENU_NEW_SITE_TEMPLATE; ?>'],
					_cmSplit,
					['<img src="../includes/js/ThemeOffice/template.png" alt="" />','<?php echo _MENU_ADMIN_TEMPLATES; ?>','index2.php?option=com_templates&client=admin',null,'<?php echo _MENU_ADMIN_TEMPLATES; ?>'],
					['<img src="../includes/js/ThemeOffice/install.png" alt="" />','<?php echo _MENU_NEW_ADMIN_TEMPLATE; ?>','index2.php?option=com_installer&element=template&client=admin',null,'<?php echo _MENU_NEW_ADMIN_TEMPLATE; ?>'],
					_cmSplit,
					['<img src="../includes/js/ThemeOffice/template.png" alt="" />','<?php echo _MODULES_POSITION; ?>','index2.php?option=com_templates&task=positions',null,'<?php echo _MODULES_POSITION; ?>']
					],
			<?php
			}
			if ($canManageUsers || $canMassMail) {
				?>['<img src="../includes/js/ThemeOffice/users.png" alt="" />','<?php echo _USERS; ?>','index2.php?option=com_users&task=view',null,'<?php echo _USERS; ?>'],

				<?php
			}
			// Menu Sub-Menu
			?>],_cmSplit,
			[null,'<?php echo _MENU; ?>',null,null,'<?php echo _MENU; ?>',
			<?php
			if ($manageMenuMan) {
				?>['<img src="../includes/js/ThemeOffice/menus.png" alt="" />','<?php echo _MENU; ?>','index2.php?option=com_menumanager',null,'<?php echo _MENU; ?>'],
				_cmSplit,
				<?php
			}
			foreach ($menuTypes as $menuType) {
				?>['<img src="../includes/js/ThemeOffice/menus.png" alt="" />','<?php echo $menuType; ?>','index2.php?option=com_menus&menutype=<?php echo $menuType; ?>',null,''],
				<?php
			}
			if ($manageTrash) {
				?>
				_cmSplit,['<img src="../includes/js/ThemeOffice/trash.png" alt="" />','<?php echo _MENU_TRASH; ?>','index2.php?option=com_trash&catid=menu',null,'<?php echo _MENU_TRASH; ?>'],
				<?php
			}
			?>
			],_cmSplit,[null,'<?php echo _E_CONTENT; ?>',null,null,'<?php echo _E_CONTENT; ?>',
			<?php
			if (count($sections) > 0) {
				?>  ['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _CONTENT_IN_SECTIONS; ?>',null,null,'<?php echo _CONTENT_IN_SECTIONS; ?>',
				<?php
				foreach ($sections as $section) {
					$txt = addslashes($section->title ? $section->title : $section->name);
					?>['<img src="../includes/js/ThemeOffice/document.png" alt="" />','<?php echo $txt; ?>', null, null,'<?php echo _SECTION; ?>: <?php echo $txt; ?>',
						['<img src="../includes/js/ThemeOffice/edit.png" alt="" />', '<?php echo _CONTENT_IN_SECTION; ?>: <?php echo $txt; ?>', 'index2.php?option=com_content&sectionid=<?php echo $section->id; ?>',null,null],
						['<img src="../includes/js/ThemeOffice/backup.png" alt="" />', '<?php echo _SECTION_ARCHIVE; ?>: <?php echo $txt; ?>', 'index2.php?option=com_content&task=showarchive&sectionid=<?php echo $section->id; ?>',null,null],
						['<img src="../includes/js/ThemeOffice/sections.png" alt="" />', '<?php echo _SECTION_CATEGORIES2; ?>: <?php echo $txt; ?>', 'index2.php?option=com_categories&section=<?php echo $section->id; ?>',null, null],
					],
					<?php
				} // foreach
				?>
				],_cmSplit,
				<?php
			}
			?>
			['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _ALL_CONTENT; ?>','index2.php?option=com_content&sectionid=0',null,'<?php echo _ALL_CONTENT; ?>'],
			['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _ADD_CONTENT_ITEM; ?>','index2.php?option=com_content&sectionid=0&task=new',null,'<?php echo _ADD_CONTENT_ITEM; ?>'],
			_cmSplit,
			['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _STATIC_CONTENT; ?>','index2.php?option=com_typedcontent',null,'<?php echo _STATIC_CONTENT; ?>'],
			['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _ADD_STATIC_CONTENT; ?>','index2.php?option=com_typedcontent&task=new',null,'<?php echo _ADD_STATIC_CONTENT; ?>'],
			_cmSplit,
			['<img src="../includes/js/ThemeOffice/add_section.png" alt="" />','<?php echo _SECTIONS; ?>','index2.php?option=com_sections&scope=content',null,'<?php echo _SECTIONS; ?>'],
			['<img src="../includes/js/ThemeOffice/sections.png" alt="" />','<?php echo _CATEGORIES; ?>','index2.php?option=com_categories&section=content',null,'<?php echo _CATEGORIES; ?>'],
			['<img src="../includes/js/ThemeOffice/masadd.png" alt="" />','<?php echo _MASS_CONTENT_ADD; ?>','index2.php?option=com_sections&task=masadd',null,'<?php echo _MASS_CONTENT_ADD; ?>'],
			_cmSplit,
			['<img src="../includes/js/ThemeOffice/home.png" alt="" />','<?php echo _CONTENT_ON_FRONTPAGE; ?>','index2.php?option=com_frontpage',null,'<?php echo _CONTENT_ON_FRONTPAGE; ?>'],
			['<img src="../includes/js/ThemeOffice/edit.png" alt="" />','<?php echo _ARCHIVE; ?>','index2.php?option=com_content&task=showarchive&sectionid=0',null,'<?php echo _ARCHIVE; ?>'],
			['<img src="../includes/js/ThemeOffice/globe3.png" alt="" />', '<?php echo _PAGES_HITS; ?>', 'index2.php?option=com_statistics&task=pageimp', null, '<?php echo _PAGES_HITS; ?>'],
			['<img src="../includes/js/ThemeOffice/trash.png" alt="" />','<?php echo _CONTENT_TRASH; ?>','index2.php?option=com_trash&catid=content',null,'<?php echo _CONTENT_TRASH; ?>'],
			],
			<?php
			// Components Sub-Menu
			if ($installComponents | $editAllComponents) {
				?>_cmSplit,
				[null,'<?php echo _COMPONENTS; ?>',null,null,'<?php echo _COMPONENTS; ?>',
				<?php
				$query = "SELECT* FROM #__components ORDER BY ordering, name";
				$database->setQuery($query);
				$comps = $database->loadObjectList(); // component list
				$subs = array(); // sub menus
				// first pass to collect sub-menu items
				foreach ($comps as $row) {
					if ($row->parent) {
						if (!array_key_exists($row->parent, $subs)) {
							$subs[$row->parent] = array();
						}
						$subs[$row->parent][] = $row;
					}
				}
				$topLevelLimit = 19; //You can get 19 top levels on a 800x600 Resolution
				$topLevelCount = 0;
				foreach ($comps as $row) {
					if ($editAllComponents | $acl->acl_check('administration', 'edit', 'users', $usertype, 'components', $row->option)) {
						if ($row->parent == 0 && (trim($row->admin_menu_link) || array_key_exists($row->id, $subs))) {
							$topLevelCount++;
							if ($topLevelCount > $topLevelLimit) {
								continue;
							}
							$name = addslashes($row->name);
							$alt = addslashes($row->admin_menu_alt);
							$link = $row->admin_menu_link ? "'index2.php?$row->admin_menu_link'" : "null";
							echo "\t['<img src=\"../includes/$row->admin_menu_img\" />','$name',$link,null,'$alt'";
							if (array_key_exists($row->id, $subs)) {
								foreach ($subs[$row->id] as $sub) {
									echo ",\n";
									$name = addslashes($sub->name);
									$alt = addslashes($sub->admin_menu_alt);
									$link = $sub->admin_menu_link ? "'index2.php?$sub->admin_menu_link'" : "null";
									echo "['<img src=\"../includes/$sub->admin_menu_img\" />','$name',$link,null,'$alt']";
								}
							}
							echo "],\n";
						}
					}
				}
				if ($topLevelLimit < $topLevelCount) {
					echo "['<img src=\"../includes/js/ThemeOffice/sections.png\" />','" . _ALL_COMPONENTS . "','index2.php?option=com_admin&task=listcomponents',null,'" . _ALL_COMPONENTS . "'],\n";
				}
				if ($installModules) {
					?> _cmSplit,
										['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _EDIT_COMPONENTS_MENU; ?>','index2.php?option=com_linkeditor ',null,'<?php echo _EDIT_COMPONENTS_MENU; ?>'],
										['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _COMPONENTS_INSTALL_UNINSTALL; ?>','index2.php?option=com_installer&element=component',null,'<?php echo _COMPONENTS_INSTALL_UNINSTALL; ?>'],
										],
					<?php
				}
				// Modules Sub-Menu
				if ($installModules | $editAllModules) {
					?>_cmSplit,
					[null,'<?php echo _MODULES; ?>',null,null,'<?php echo _MODULES_SETUP; ?>',
					<?php
					if ($editAllModules) {
						?>
							['<img src="../includes/js/ThemeOffice/module.png" alt="" />', '<?php echo _SITE_MODULES; ?>', "index2.php?option=com_modules", null, '<?php echo _SITE_MODULES; ?>'],
							['<img src="../includes/js/ThemeOffice/module.png" alt="" />', '<?php echo _ADMIN_MODULES; ?>', "index2.php?option=com_modules&client=admin", null, '<?php echo _ADMIN_MODULES; ?>'],
							_cmSplit,
							['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _MODULES_INSTALL_DEINSTALL; ?>', 'index2.php?option=com_installer&element=module', null, '<?php echo _MODULES_INSTALL_DEINSTALL; ?>'],
						<?php
					}
					?>],
					<?php
				}
			} if ($installMambots | $editAllMambots) {
				?>
				_cmSplit,
				[null,'<?php echo _MAMBOTS; ?>',null,null,'<?php echo _MAMBOTS; ?>',
				<?php if ($editAllMambots) { ?>
					['<img src="../includes/js/ThemeOffice/module.png" alt="" />', '<?php echo _SITE_MAMBOTS; ?>', "index2.php?option=com_mambots", null, '<?php echo _SITE_MAMBOTS; ?>'],
					_cmSplit,
					['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _MAMBOTS_INSTALL_UNINSTALL; ?>', 'index2.php?option=com_installer&element=mambot', null, '<?php echo _MAMBOTS_INSTALL_UNINSTALL; ?>'],
				<?php } ?>
				],
			<?php } if ($installModules) { ?>
				_cmSplit,
				[null,'<?php echo _EXTENSIONS ?>',null,null,'<?php echo _EXTENSION_MANAGEMENT ?>',
				['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _COMPONENTS; ?>','index2.php?option=com_installer&element=component',null,'<?php echo _COMPONENTS; ?>'],
				['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _MODULES; ?>', 'index2.php?option=com_installer&element=module', null, '<?php echo _MODULES; ?>'],
				['<img src="../includes/js/ThemeOffice/install.png" alt="" />', '<?php echo _MAMBOTS; ?>', 'index2.php?option=com_installer&element=mambot', null, '<?php echo _MAMBOTS; ?>'],

				<?php if ($manageLanguages) { ?>
					_cmSplit,['<img src="../includes/js/ThemeOffice/install.png" alt="" />','<?php echo _SITE_LANGUAGES; ?>','index2.php?option=com_installer&element=language',null,'<?php echo _SITE_LANGUAGES; ?>'],
				<?php } if ($manageTemplates) { ?>
					_cmSplit,
					['<img src="../includes/js/ThemeOffice/install.png" alt="" />','<?php echo _MENU_SITE_TEMPLATES; ?>','index2.php?option=com_installer&element=template&client=',null,'<?php echo _MENU_SITE_TEMPLATES; ?>'],
					['<img src="../includes/js/ThemeOffice/install.png" alt="" />','<?php echo _MENU_ADMIN_TEMPLATES; ?>','index2.php?option=com_installer&element=template&client=admin',null,'<?php echo _MENU_ADMIN_TEMPLATES; ?>'],
				<?php } ?>
				],
			<?php } ?>
			_cmSplit,
			[null,'<?php echo _JOOMLA_TOOLS; ?>',null,null,'<?php echo _JOOMLA_TOOLS; ?>',
			['<img src="../includes/js/ThemeOffice/messaging_inbox.png" alt="" />','<?php echo _PRIVATE_MESSAGES; ?>','index2.php?option=com_messages',null,'<?php echo _PRIVATE_MESSAGES; ?>'],
			['<img src="../includes/js/ThemeOffice/messaging_config.png" alt="" />','<?php echo _PRIVATE_MESSAGES_CONFIG; ?>','index2.php?option=com_messages&task=config&hidemainmenu=1',null,'<?php echo _PRIVATE_MESSAGES_CONFIG; ?>'],
			_cmSplit,
			['<img src="../includes/js/ThemeOffice/media.png" alt="" />','<?php echo _JWMM_MEDIA_MANAGER; ?>','index2.php?option=com_jwmmxtd',null,'<?php echo _JWMM_MEDIA_MANAGER; ?>'],
			<?php if ($canConfig) { ?>
				['<img src="../includes/js/ThemeOffice/jfmanager.png" alt="" />','<?php echo _FILE_MANAGER; ?>','index2.php?option=com_joomlaxplorer',null,'<?php echo _FILE_MANAGER; ?>'],
				['<img src="../includes/js/ThemeOffice/sql-console.png" alt="" />','<?php echo _SQL_CONSOLE; ?>','index2.php?option=com_easysql',null,'<?php echo _SQL_CONSOLE; ?>'],
				_cmSplit,
				['<img src="../includes/js/ThemeOffice/checkin.png" alt="" />', '<?php echo _GLOBAL_CHECKIN; ?>', 'index2.php?option=com_checkin', null,'<?php echo _GLOBAL_CHECKIN; ?>'],
				['<img src="../includes/js/ThemeOffice/checkin.png" alt="" />', '<?php echo _BLOCKED_OBJECTS; ?>', 'index2.php?option=com_checkin&task=mycheckin', null,'<?php echo _BLOCKED_OBJECTS; ?>'],
				_cmSplit,
				['<img src="../includes/js/ThemeOffice/jbackup.png" alt="" />','<?php echo _JP_BACKUP_MANAGEMENT; ?>','index2.php?option=com_joomlapack',null,'<?php echo _JP_BACKUP_MANAGEMENT; ?>',
				['<img src="../includes/js/ThemeOffice/jbackup.png" alt="" />','<?php echo _JP_CREATE_BACKUP; ?>','index2.php?option=com_joomlapack&act=pack&hidemainmenu=1',null,'<?php echo _JP_CREATE_BACKUP; ?>'],
				['<img src="../includes/js/ThemeOffice/db.png" alt="" />','<?php echo _JP_DB_MANAGEMENT; ?>','index2.php?option=com_joomlapack&act=db',null,'<?php echo _JP_DB_MANAGEMENT; ?>'],
				['<img src="../includes/js/ThemeOffice/config.png" alt="" />','<?php echo _BACKUP_CONFIG; ?>','index2.php?option=com_joomlapack&act=config',null,'<?php echo _BACKUP_CONFIG; ?>']],
			<?php } ?>
			<?php if ($mosConfig_caching) { ?>
				_cmSplit,['<img src="../includes/js/ThemeOffice/config.png" alt="" />','<?php echo _CLEAR_CONTENT_CACHE; ?>','index2.php?option=com_admin&task=clean_cache',null,'<?php echo _CLEAR_CONTENT_CACHE; ?>'],
				['<img src="../includes/js/ThemeOffice/config.png" alt="" />','<?php echo _CLEAR_ALL_CACHE; ?>','index2.php?option=com_admin&task=clean_all_cache',null,'<?php echo _CLEAR_ALL_CACHE; ?>'],
			<?php } ?>
			<?php if ($canConfig) { ?>
				['<img src="../includes/js/ThemeOffice/sysinfo.png" alt="" />', '<?php echo _SYSTEM_INFO; ?>', 'index2.php?option=com_admin&task=sysinfo', null,'<?php echo _SYSTEM_INFO; ?>'],
				<?php
			}
			?>
			],
			_cmSplit];
			cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			<?php
			// boston, складываем меню в кэш, и записываем в файл
			$cur_menu = ob_get_contents();
			ob_end_clean();
			/* $cur_menu = str_replace("\n",'',$cur_menu);
			  $cur_menu = str_replace("\r",'',$cur_menu);
			  $cur_menu = str_replace("\t",'',$cur_menu);
			  $cur_menu = str_replace('  ',' ',$cur_menu); */
			if ($mosConfig_adm_menu_cache)
				js_menu_cache($cur_menu, $usertype_menu);
			else
				echo '<script type="text/javascript">' . $cur_menu . '</script>';
			?>
			<?php
		}

		/**
		 * Show an disbaled version of the menu, used in edit pages
		 * @param string The current user type
		 */
		function showDisabled($usertype = '') {
			global $acl;

			$canConfig = $acl->acl_check('administration', 'config', 'users', $usertype);
			$installModules = $acl->acl_check('administration', 'install', 'users', $usertype, 'modules', 'all');
			$editAllModules = $acl->acl_check('administration', 'edit', 'users', $usertype, 'modules', 'all');
			$installMambots = $acl->acl_check('administration', 'install', 'users', $usertype, 'mambots', 'all');
			$editAllMambots = $acl->acl_check('administration', 'edit', 'users', $usertype, 'mambots', 'all');
			$installComponents = $acl->acl_check('administration', 'install', 'users', $usertype, 'components', 'all');
			$editAllComponents = $acl->acl_check('administration', 'edit', 'users', $usertype, 'components', 'all');
//			$canMassMail = $acl->acl_check('administration','manage','users',$usertype,'components','com_massmail');
//			$canManageUsers = $acl->acl_check('administration','manage','users',$usertype,'components','com_users');

			$text = _NO_ACTIVE_MENU_ON_THIS_PAGE;
			?>
			<div id="myMenuID" class="inactive"></div>
			<script type="text/javascript">
				var myMenu =
					[
					[null,'<?php echo _SITE; ?>',null,null,'<?php echo $text; ?>'
					],
			<?php
			/* Menu Sub-Menu */
			?>
				  _cmSplit,
				  [null,'<?php echo _MENU; ?>',null,null,'<?php echo $text; ?>'
				  ],
				  _cmSplit,
			<?php
			/* Content Sub-Menu */
			?>
				  [null,'<?php echo _E_CONTENT; ?>',null,null,'<?php echo $text; ?>'
				  ],
			<?php
			/* Components Sub-Menu */
			if ($installComponents | $editAllComponents) {
				?>
					  _cmSplit,
					  [null,'<?php echo _COMPONENTS; ?>',null,null,'<?php echo $text; ?>'
					  ],
				<?php
			} // if $installComponents
			?>
			<?php
			/* Modules Sub-Menu */
			if ($installModules | $editAllModules) {
				?>
					  _cmSplit,
					  [null,'<?php echo _MODULES; ?>',null,null,'<?php echo $text; ?>'
					  ],
				<?php
			} // if ( $installModules | $editAllModules)
			/* Mambots Sub-Menu */
			if ($installMambots | $editAllMambots) {
				?>
					  _cmSplit,
					  [null,'<?php echo _MAMBOTS; ?>',null,null,'<?php echo $text; ?>'],
				<?php
			} // if ( $installMambots | $editAllMambots)
			?>


			<?php
			/* Installer Sub-Menu */
			if ($installModules) {
				?>
					  _cmSplit,
					  [null,'<?php echo _EXTENSIONS; ?>',null,null,'<?php echo $text; ?>'
				<?php ?>
					  ],
				<?php
			} // if ( $installModules)
			/* System Sub-Menu */
			if ($canConfig) {
				?>
					  _cmSplit,[null,'<?php echo _JOOMLA_TOOLS; ?>',null,null,'<?php echo $text; ?>'],
				<?php
			}
			?>
			  ];
			  cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			</script>
			<?php
		}

	}

}
$cache = &mosCache::getCache('mos_fullmenu');

$hide = intval(mosGetParam($_REQUEST, 'hidemainmenu', 0));

global $my;

if ($hide) {
	mosFullAdminMenu::showDisabled($my->usertype);
} else {
	mosFullAdminMenu::show($my->usertype);
}
?>