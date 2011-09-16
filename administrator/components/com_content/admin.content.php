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

require_once ($mainframe->getPath('admin_html'));

global $task,$option,$id;

$sectionid = intval(mosGetParam($_REQUEST,'sectionid',0));

$cid = josGetArrayInts('cid');

switch($task) {
	case 'submit':
		submitContent();
		break;

	case 'new':
		editContent(0,$sectionid,$option);
		break;

	case 'edit':
		editContent($id,$sectionid,$option);
		break;

	case 'editA':
		editContent(intval($cid[0]),'',$option);
		break;

	case 'go2menu':
	case 'go2menuitem':
	case 'resethits':
	case 'menulink':
	case 'apply':
	case 'save':

	case 'save_and_new':
		saveContent($sectionid,$task);
		break;

	case 'remove':
		removeContent($cid,$sectionid,$option);
		break;

	case 'publish':
		changeContent($cid,1,$option);
		break;

	case 'unpublish':
		changeContent($cid,0,$option);
		break;

	case 'toggle_frontpage':
		toggleFrontPage($cid,$sectionid,$option);
		break;

	case 'archive':
		changeContent($cid,-1,$option);
		break;

	case 'unarchive':
		changeContent($cid,0,$option);
		break;

	case 'cancel':
		cancelContent();
		break;

	case 'orderup':
		orderContent(intval($cid[0]),-1,$option);
		break;

	case 'orderdown':
		orderContent(intval($cid[0]),1,$option);
		break;

	case 'showarchive':
		viewArchive($sectionid,$option);
		break;

	case 'movesect':
		moveSection($cid,$sectionid,$option);
		break;

	case 'movesectsave':
		moveSectionSave($cid,$sectionid,$option);
		break;

	case 'copy':
		copyItem($cid,$sectionid,$option);
		break;

	case 'copysave':
		copyItemSave($cid,$sectionid,$option);
		break;

	case 'accesspublic':
		accessMenu(intval($cid[0]),0,$option);
		break;

	case 'accessregistered':
		accessMenu(intval($cid[0]),1,$option);
		break;

	case 'accessspecial':
		accessMenu(intval($cid[0]),2,$option);
		break;

	case 'saveorder':
		saveOrder($cid);
		break;

	default:
		viewContent($sectionid,$option);
		break;
}

function submitContent(){
	global $mosConfig_absolute_path,$database;
	$query = 'SELECT params from #__components WHERE id=25';
	$database->setQuery($query);
	$rowp = $database->loadResult();

	$file = $mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/components/com_content/submit_content.xml';
	$params = new mosParameters($rowp,$file,'component');
	HTML_content::submit($params);
}

/**
* Compiles a list of installed or defined modules
* @param database A database connector object
*/
function viewContent($sectionid,$option) {
	global $database,$mainframe,$mosConfig_list_limit;

	$limit = intval($mainframe->getUserStateFromRequest("viewlistlimit",'limit',$mosConfig_list_limit));
	$limitstart = intval($mainframe->getUserStateFromRequest("view{$option}{$sectionid}limitstart",'limitstart',0));

	$search = $mainframe->getUserStateFromRequest("search{$option}{$sectionid}",'search','');

	$order_by = $mainframe->getUserStateFromRequest("order_by{$option}{$sectionid}",'order_by','');
	$order_sort = $mainframe->getUserStateFromRequest("order_sort{$option}{$sectionid}",'order_sort','');

	$filter_sectionid = intval($mainframe->getUserStateFromRequest("filter_sectionid{$option}{$sectionid}",'filter_sectionid',0));

	$catid 				= intval( $mainframe->getUserStateFromRequest( "catid{$option}{$sectionid}", 'catid', 0 ) );
	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 ) );
	$filter_sectionid 	= intval( $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 ) );

	//$catid = intval( mosGetParam($_REQUEST,'catid',0));
	//$filter_authorid = intval( mosGetParam($_REQUEST,'filter_authorid',0) );
	if ($filter_authorid <> 0)  {
		$link = '&filter_authorid='.$filter_authorid;
	}
	else {
		$link = '&catid='.$catid;
	}
	$redirect = $sectionid.$link;

	if($order_sort == '1'){
		$order_sort_sql = ' DESC';
	}else{
		$order_sort_sql = ' ASC';
	}

	$sql_order = "\n ORDER BY ";
	switch($order_by) {
		case '0': // внутренний пор€док
		default:
			$sql_order .= "\n cc.ordering, cc.title, c.ordering";
			break;
		case '1': // заголовки
			$sql_order .= 'c.title';
			break;
		case '2': // дата создани€
			$sql_order .= 'c.created';
			break;
		case '3': // дата последней модификации
			$sql_order .= 'c.modified';
			break;
		case '4': // идентификаторы
			$sql_order .= 'c.id';
			break;
		case '5': // просмотры
			$sql_order .= 'c.hits';
			break;
		case '6': // просмотры
			$sql_order .= 'c.catid';
			break;
		case '7': // просмотры
			$sql_order .= 'c.sectionid';
			break;
	}
	if(get_magic_quotes_gpc()) {
		$search = stripslashes($search);
	}


	if($sectionid == 0 && $catid==0) {
		// used to show All content items
		$where = array("c.state >= 0","c.catid = cc.id","cc.section = s.id","s.scope = 'content'",);
		$order = $sql_order.$order_sort_sql; // подставл€ем свой параметр сортировки
		$all = 1;
		$section->title = _ALL_CONTENT;
		$section->id = 0;
	} elseif(!$catid) {
		$where = array("c.state >= 0","c.catid = cc.id","cc.section = s.id","s.scope = 'content'","c.sectionid = ".(int)$sectionid);
		$all = null;
		$section = new mosSection($database);
		$section->load((int)$sectionid);
		$section->params = array();
		$section->params['name']=_SECTION;
		$section->params['link']='index2.php?option=com_sections&scope=content&task=editA&hidemainmenu=1&id='.$section->id;
	}else{
		$all = null;
		$section = new mosCategory($database);
		$section->load((int)$catid);
		$section->params = array();
		$section->params['name']=_E_CATEGORY;
		$section->params['link']='index2.php?option=com_categories&section=content&task=editA&hidemainmenu=1&id='.$section->id;
	}

	// used by filter
	if($filter_sectionid > 0) {
		$where[] = "c.sectionid = ".(int) $filter_sectionid;
	}
	if($catid > 0) {
		$where[] = "c.catid = ".(int) $catid;
	}
	if($filter_authorid > 0) {
		$where[] = "c.created_by = ".(int) $filter_authorid;
	}

	if($search) {
		$where[] = "LOWER( c.title ) LIKE '%".$database->getEscaped(trim(strtolower($search)))."%'";
	}
	$where[]='state<>-2';
	$order = $sql_order.$order_sort_sql; // подставл€ем свой параметр сортировки
	// get the total number of records
	$query = "SELECT COUNT(*)"
			."\n FROM #__content AS c"
			."\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
			."\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
			.(count($where)?"\n WHERE "
			.implode(' AND ',$where):"");
	$database->setQuery($query);
	$total = $database->loadResult();
	require_once ($GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total,$limitstart,$limit);

	$query = "SELECT c.*, g.name AS groupname, cc.name, u.name AS editor, f.content_id AS frontpage, s.title AS section_name, v.name AS author"
			."\n FROM #__content AS c"
			."\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
			."\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
			."\n LEFT JOIN #__groups AS g ON g.id = c.access"
			."\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
			."\n LEFT JOIN #__users AS v ON v.id = c.created_by"
			."\n LEFT JOIN #__content_frontpage AS f ON f.content_id = c.id"
			.(count($where) ? "\n WHERE ".implode(' AND ',$where):'').$order;
	$database->setQuery($query,$pageNav->limitstart,$pageNav->limit);
	$rows = $database->loadObjectList();

	if($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	// получение списка разделов / категорий и формирование дерева
	$lists['sectree'] = seccatli($catid,$filter_authorid);

	$treeexp = intval(mosGetParam($_COOKIE,'j-ntree-hide',null));
	$lists['sectreeact'] =  $treeexp ? 'style="display: none;"':'';
	$lists['sectreetoggle'] =  $treeexp ? 'class="tdtoogleon"':'class="tdtoogleoff"';

	/* параметры дл€ сортировки элементов содержимого*/
	$order_list = array();
	$order_list[] = mosHTML::makeOption('0',_ORDER_BY_NAME,'order_by','name');
	$order_list[] = mosHTML::makeOption('1',_ORDER_BY_HEADERS,'order_by','name');
	$order_list[] = mosHTML::makeOption('2',_ORDER_BY_DATE_CR,'order_by','name');
	$order_list[] = mosHTML::makeOption('3',_ORDER_BY_DATE_MOD,'order_by','name');
	$order_list[] = mosHTML::makeOption('4',_ORDER_BY_ID,'order_by','name');
	$order_list[] = mosHTML::makeOption('5',_ORDER_BY_HITS,'order_by','name');
	$order_list[] = mosHTML::makeOption('6',_ORDER_BY_CATID,'order_by','name');
	$order_list[] = mosHTML::makeOption('7',_ORDER_BY_SECTIONID,'order_by','name');
	$lists['order'] = mosHTML::selectList($order_list,'order_by','class="inputbox" size="1" style="width:99%;" onchange="document.adminForm.submit( );"','order_by','name',$order_by);

	$order_sort_list = array();
	$order_sort_list[] = mosHTML::makeOption('0',_CMN_SORT_ASC,'order_sort','name');
	$order_sort_list[] = mosHTML::makeOption('1',_CMN_SORT_DESC,'order_sort','name');
	$lists['order_sort'] = mosHTML::selectList($order_sort_list,'order_sort','class="inputbox" size="1" style="width:99%;" onchange="document.adminForm.submit( );"','order_sort','name',$order_sort);

	HTML_content::showContent($rows,$section,$lists,$search,$pageNav,$all,$redirect);
}

/**
* Shows a list of archived content items
* @param int The section id
*/
function viewArchive($sectionid,$option) {
	global $database,$mainframe,$mosConfig_list_limit;

	$catid = intval($mainframe->getUserStateFromRequest("catidarc{$option}{$sectionid}",'catid',0));
	$limit = intval($mainframe->getUserStateFromRequest("viewlistlimit",'limit',$mosConfig_list_limit));
	$limitstart = intval($mainframe->getUserStateFromRequest("viewarc{$option}{$sectionid}limitstart",'limitstart',0));
	$filter_authorid = intval($mainframe->getUserStateFromRequest("filter_authorid{$option}{$sectionid}",'filter_authorid',0));
	$filter_sectionid = intval($mainframe->getUserStateFromRequest("filter_sectionid{$option}{$sectionid}",'filter_sectionid',0));
	$search = $mainframe->getUserStateFromRequest("searcharc{$option}{$sectionid}",'search','');
	if(get_magic_quotes_gpc()) {
		$search = stripslashes($search);
	}
	$redirect = $sectionid;

	if($sectionid == 0) {
		$where = array("c.state = -1","c.catid = cc.id","cc.section = s.id","s.scope = 'content'");
		$filter = "\n , #__sections AS s WHERE s.id = c.section";
		$all = 1;
	} else {
		$where = array("c.state = -1","c.catid = cc.id","cc.section = s.id","s.scope = 'content'","c.sectionid= ".(int)$sectionid);
		$filter = "\n WHERE section = '".(int)$sectionid."'";
		$all = null;
	}

	// used by filter
	if($filter_sectionid > 0) {
		$where[] = "c.sectionid = ".(int)$filter_sectionid;
	}
	if($filter_authorid > 0) {
		$where[] = "c.created_by = ".(int)$filter_authorid;
	}
	if($catid > 0) {
		$where[] = "c.catid = ".(int)$catid;
	}
	if($search) {
		$where[] = "LOWER( c.title ) LIKE '%".$database->getEscaped(trim(strtolower($search))).	"%'";
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
			."\n FROM #__content AS c"
			."\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
			."\n LEFT JOIN #__sections AS s ON s.id = c.sectionid".(count($where)?"\n WHERE ".implode(' AND ',$where):'');
	$database->setQuery($query);
	$total = $database->loadResult();

	require_once ($GLOBALS['mosConfig_absolute_path'].'/'.ADMINISTRATOR_DIRECTORY.'/includes/pageNavigation.php');
	$pageNav = new mosPageNav($total,$limitstart,$limit);

	$query = "SELECT c.*, g.name AS groupname, cc.name, v.name AS author"
			."\n FROM #__content AS c"
			."\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
			."\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
			."\n LEFT JOIN #__groups AS g ON g.id = c.access"
			."\n LEFT JOIN #__users AS v ON v.id = c.created_by".(count
		($where)?"\n WHERE ".implode(' AND ',$where):'')."\n ORDER BY c.catid, c.ordering";
	$database->setQuery($query,$pageNav->limitstart,$pageNav->limit);
	$rows = $database->loadObjectList();
	if($database->getErrorNum()) {
		echo $database->stderr();
		return;
	}

	// get list of categories for dropdown filter
	$query = "SELECT c.id AS value, c.title AS text"."\n FROM #__categories AS c".$filter."\n ORDER BY c.ordering";
	$lists['catid'] = filterCategory($query,$catid);

	// get list of sections for dropdown filter
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['sectionid'] = mosAdminMenus::SelectSection('filter_sectionid',$filter_sectionid,$javascript);

	$section = new mosSection($database);
	$section->load((int)$sectionid);

	// get list of Authors for dropdown filter
	$query = "SELECT c.created_by, u.name"
			."\n FROM #__content AS c"
			."\n INNER JOIN #__sections AS s ON s.id = c.sectionid"
			."\n LEFT JOIN #__users AS u ON u.id = c.created_by"
			."\n WHERE c.state = -1"."\n GROUP BY u.name"
			."\n ORDER BY u.name";
	$authors[] = mosHTML::makeOption('0',_SEL_AUTHOR,'created_by','name');
	$database->setQuery($query);
	$authors = array_merge($authors,$database->loadObjectList());
	$lists['authorid'] = mosHTML::selectList($authors,'filter_authorid','class="inputbox" size="1" onchange="document.adminForm.submit( );"','created_by','name',$filter_authorid);

	HTML_content::showArchive($rows,$section,$lists,$search,$pageNav,$option,$all,$redirect);
}

/**
* Compiles information to add or edit the record
* @param database A database connector object
* @param integer The unique id of the record to edit (0 if new)
* @param integer The id of the content section
*/
function editContent($uid = 0,$sectionid = 0,$option) {
	global $database,$my,$mainframe,$mosConfig_auto_frontpage,$mosConfig_one_editor;
	global $mosConfig_absolute_path,$mosConfig_live_site,$mosConfig_offset;

	$nullDate = $database->getNullDate();
	if ($uid) {
		$catid = intval( mosGetParam($_REQUEST,'catid',0));
		$filter_authorid = intval( mosGetParam($_REQUEST,'filter_authorid',0) );
		if ($filter_authorid <> 0)  {
			$link = '&filter_authorid='.$filter_authorid;
		}
		else {
			$link = '&catid='.$catid;
		}
		$redirect = $sectionid.$link;
	}
	else {
		$redirect = 0;
	}
	// load the row from the db table
	$row = new mosContent($database);
	$row->load((int)$uid);

	if($uid) {
		$sectionid = $row->sectionid;
		if($row->state < 0) {
			mosRedirect('index2.php?option=com_content&sectionid='.$redirect,_CANNOT_EDIT_ARCHIVED_ITEM);
		}
	}

	// fail if checked out not by 'me'
	if($row->checked_out && $row->checked_out != $my->id) {
		mosRedirect('index2.php?option=com_content',_E_CONTENT.' '.$row->title.' '._NOW_EDITING_BY_OTHER);
	}

	$selected_folders = null;
	if($uid) {
		$row->checkout($my->id);

		if(trim($row->images)) {
			$row->images = explode("\n",$row->images);
		} else {
			$row->images = array();
		}

		$row->created = mosFormatDate($row->created,_CURRENT_SERVER_TIME_FORMAT);
		$row->modified = $row->modified == $nullDate?'':mosFormatDate($row->modified,_CURRENT_SERVER_TIME_FORMAT);
		$row->publish_up = mosFormatDate($row->publish_up,_CURRENT_SERVER_TIME_FORMAT);

		if(trim($row->publish_down) == $nullDate || trim($row->publish_down) == '' || trim($row->publish_down) == '-') {
			$row->publish_down = 'Ќикогда';
		}
		$row->publish_down = mosFormatDate($row->publish_down,_CURRENT_SERVER_TIME_FORMAT);

		$query = "SELECT name FROM #__users WHERE id = ".(int)$row->created_by;
		$database->setQuery($query);
		$row->creator = $database->loadResult();

		// test to reduce unneeded query
		if($row->created_by == $row->modified_by) {
			$row->modifier = $row->creator;
		} else {
			$query = "SELECT name"
					."\n FROM #__users"
					."\n WHERE id = ".(int)$row->modified_by;
			$database->setQuery($query);
			$row->modifier = $database->loadResult();
		}

		$query = "SELECT content_id FROM #__content_frontpage WHERE content_id = ".(int)$row->id;
		$database->setQuery($query);
		$row->frontpage = $database->loadResult();

		// get list of links to this item
		$and = "\n AND componentid = ".(int)$row->id;
		$menus = mosAdminMenus::Links2Menu('content_item_link',$and);
	} else {
		if(!$sectionid && @$_POST['filter_sectionid']) {
			$sectionid = $_POST['filter_sectionid'];
		}
		if(@$_POST['catid']) {
			$row->catid = (int)$_POST['catid'];
			$category = new mosCategory($database);
			$category->load((int)$_POST['catid']);
			$sectionid = $category->section;
		} else {
			$row->catid = 0;
		}

		$row->sectionid = $sectionid;
		$row->version = 0;
		$row->state = 1;
		$row->ordering = 0;
		$row->images = array();
		$row->publish_up = date('Y-m-d H:i:s',time() + ($mosConfig_offset* 60* 60));
		$row->publish_down = 'Ќикогда';
		$row->creator = '';
		$row->modified = $nullDate;
		$row->modifier = '';
		$row->frontpage = $mosConfig_auto_frontpage;
		$menus = array();
	}

	$javascript = "onchange=\"changeDynaList( 'catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);\"";

	$query = "SELECT s.id, s.title"
			."\n FROM #__sections AS s"
			."\n ORDER BY s.ordering";
	$database->setQuery($query);
	if($sectionid == 0) {
		$sections[] = mosHTML::makeOption('-1','¬ыберите раздел','id','title');
		$sections = array_merge($sections,$database->loadObjectList());
		$lists['sectionid'] = mosHTML::selectList($sections,'sectionid','class="inputbox" size="1" style="width:99%;"'.$javascript,'id','title');
	} else {
		$sections = $database->loadObjectList();
		$lists['sectionid'] = mosHTML::selectList($sections,'sectionid','class="inputbox" size="1" style="width:99%;"'.$javascript,'id','title',intval($row->sectionid));
	}

	$contentSection = '';
	foreach($sections as $section) {
		$section_list[] = $section->id;
		// get the type name - which is a special category
		if($row->sectionid) {
			if($section->id == $row->sectionid) {
				$contentSection = $section->title;
			}
		} else {
			if($section->id == $sectionid) {
				$contentSection = $section->title;
			}
		}
	}

	$sectioncategories = array();
	$sectioncategories[-1] = array();
	$sectioncategories[-1][] = mosHTML::makeOption('-1',_SEL_CATEGORY,'id','name');
	mosArrayToInts($section_list);
	$section_list = 'section='.implode(' OR section=',$section_list);

	$query = "SELECT id, title as name, section"
			."\n FROM #__categories"
			."\n WHERE ( $section_list )"
			."\n ORDER BY title ASC";
	$database->setQuery($query);
	$cat_list = $database->loadObjectList();
	foreach($sections as $section) {
		$sectioncategories[$section->id] = array();
		$rows2 = array();
		foreach($cat_list as $cat) {
			if($cat->section == $section->id) {
				$rows2[] = $cat;
			}
		}
		foreach($rows2 as $row2) {
			$sectioncategories[$section->id][] = mosHTML::makeOption($row2->id,$row2->name,'id','name');
		}
	}

	// get list of categories
	if(!$row->catid && !$row->sectionid) {
		$categories[] = mosHTML::makeOption('-1',_SEL_CATEGORY,'id','name');
		$lists['catid'] = mosHTML::selectList($categories,'catid','class="inputbox" size="1" style="width:99%;"','id','name');
	} else {
		$categoriesA = array();
		if($sectionid == 0) {
			//$where = "\n WHERE section NOT LIKE '%com_%'";
			foreach($cat_list as $cat) {
				$categoriesA[] = $cat;
			}
		} else {
			//$where = "\n WHERE section = '$sectionid'";
			foreach($cat_list as $cat) {
				if($cat->section == $sectionid) {
					$categoriesA[] = $cat;
				}
			}
		}
		$categories[] = mosHTML::makeOption('-1',_SEL_CATEGORY,'id','name');
		$categories = array_merge($categories,$categoriesA);
		$lists['catid'] = mosHTML::selectList($categories,'catid','class="inputbox" size="1" style="width:99%;"','id','name',intval($row->catid));
	}

	// build the html select list for ordering
	$query = "SELECT ordering AS value, title AS text"
			."\n FROM #__content"
			."\n WHERE catid = ".(int)$row->catid
			."\n AND state >= 0"
			."\n ORDER BY ordering";
	$lists['ordering'] = mosAdminMenus::SpecificOrdering($row,$uid,$query,1);

	// pull param column from category info
	$query = "SELECT params"
			."\n FROM #__categories"
			."\n WHERE id = ".(int)$row->catid;
	$database->setQuery($query);
	$categoryParam = $database->loadResult();

	$paramsCat = new mosParameters($categoryParam,$mainframe->getPath('com_xml','com_categories'),'component');
	$selected_folders = $paramsCat->get('imagefolders','');

	if(!$selected_folders) {
		$selected_folders = '*2*';
	}

	// check if images utilizes settings from section
	if(strpos($selected_folders,'*2*') !== false) {
		unset($selected_folders);
		// load param column from section info
		$query = "SELECT params"
				."\n FROM #__sections"
				."\n WHERE id = ".(int)$row->sectionid;
		$database->setQuery($query);
		$sectionParam = $database->loadResult();

		$paramsSec = new mosParameters($sectionParam,$mainframe->getPath('com_xml','com_sections'),'component');
		$selected_folders = $paramsSec->get('imagefolders','');
	}

	if(trim($selected_folders)) {
		$temps = explode(',',$selected_folders);
		foreach($temps as $temp) {
			$temp = ampReplace($temp);
			$folders[] = mosHTML::makeOption($temp,$temp);
		}
	} else {
		$folders[] = mosHTML::makeOption('*1*');
	}

	// calls function to read image from directory
	$pathA = $mosConfig_absolute_path.'/images/stories';
	$pathL = $mosConfig_live_site.'/images/stories';
	$images = array();

	if($folders[0]->value == '*1*') {
		$folders = array();
		$folders[] = mosHTML::makeOption('/');
		mosAdminMenus::ReadImages($pathA,'/',$folders,$images);
	} else {
		mosAdminMenus::ReadImagesX($folders,$images);
	}

	// list of folders in images/stories/
	$lists['folders'] = mosAdminMenus::GetImageFolders($folders,$pathL);
	// list of images in specfic folder in images/stories/
	$lists['imagefiles'] = mosAdminMenus::GetImages($images,$pathL,$folders);
	// list of saved images
	$lists['imagelist'] = mosAdminMenus::GetSavedImages($row,$pathL);

	// build list of users
	$active = (intval($row->created_by)?intval($row->created_by):$my->id);
	$lists['created_by'] = mosAdminMenus::UserSelect('created_by',$active);
	// build the select list for the image position alignment
	$lists['_align'] = mosAdminMenus::Positions('_align');
	// build the select list for the image caption alignment
	$lists['_caption_align'] = mosAdminMenus::Positions('_caption_align');
	// build the html select list for the group access
	$lists['access'] = mosAdminMenus::Access($row);
	// build the html select list for menu selection
	$lists['menuselect'] = mosAdminMenus::MenuSelect();

	// build the select list for the image caption position
	$pos[] = mosHTML::makeOption('bottom',_CMN_BOTTOM);
	$pos[] = mosHTML::makeOption('top',_CMN_TOP);
	$lists['_caption_position'] = mosHTML::selectList($pos,'_caption_position','class="inputbox" size="1"','value','text');

	// get params definitions
	$params = new mosParameters($row->attribs,$mainframe->getPath('com_xml','com_content'),'component');
	// при активировании параметра одного редактора - сделаем новый объект содержащий соединЄнный текст
	if($mosConfig_one_editor & strlen($row->fulltext) > 1) $row->introtext = $row->introtext.'<!-- pagebreak -->'.$row->fulltext;
	# Added the robots tag for the content!
	$robots[] = mosHTML::makeOption('-1',_ROBOTS_HIDE);
	$robots[] = mosHTML::makeOption('0','Index, Follow');
	$robots[] = mosHTML::makeOption('1','Index, NoFollow');
	$robots[] = mosHTML::makeOption('2','NoIndex, Follow');
	$robots[] = mosHTML::makeOption('3','NoIndex, NoFollow');
	$lists['robots'] = mosHTML::selectList($robots,'params[robots]','class="inputbox" style="width: 356px;" size="1"','value','text',$params->get('robots'));

	HTML_content::editContent($row,$contentSection,$lists,$sectioncategories,$images,$params,$option,$redirect,$menus);
}

/**
* Saves the content item an edit form submit
* @param database A database connector object
* boston, добавил параметр -  возврат в редактирование содержимого после сохранени€ дл€ добавлени€ нового
*/
function saveContent($sectionid,$task) {
	global $database,$my,$mainframe,$mosConfig_offset,$mosConfig_one_editor;
	josSpoofCheck();
	$menu		= strval(mosGetParam($_POST,'menu','mainmenu'));
	$menuid		= intval(mosGetParam($_POST,'menuid',0));
	$nullDate	= $database->getNullDate();
	// инициализаци€ использовани€ одного редактора
	if($mosConfig_one_editor){
		$alltext	= mosGetParam($_POST,'introtext','',_MOS_ALLOWHTML);
		$tagPos		= strpos( $alltext, '<!-- pagebreak -->' );
		if ( $tagPos === false ){
			$_POST['introtext']	= $alltext;
		} else {
			$_POST['introtext']	= substr($alltext, 0, $tagPos);
			$_POST['fulltext']		= substr($alltext, $tagPos + 18 );
		}
	}
	$row = new mosContent($database);
	if(!$row->bind($_POST)) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// sanitise id field
	$row->id = (int)$row->id;

	if($row->id) {
		$row->modified = date('Y-m-d H:i:s');
		$row->modified_by = $my->id;
	}

	$row->created_by = $row->created_by?$row->created_by:$my->id;

	if($row->created && strlen(trim($row->created)) <= 10) {
		$row->created .= ' 00:00:00';
	}
	$row->created = $row->created?mosFormatDate($row->created,'%Y-%m-%d %H:%M:%S',-$mosConfig_offset):date('Y-m-d H:i:s');

	if(strlen(trim($row->publish_up)) <= 10) {
		$row->publish_up .= ' 00:00:00';
	}
	$row->publish_up = mosFormatDate($row->publish_up,_CURRENT_SERVER_TIME_FORMAT,- $mosConfig_offset);

	if(trim($row->publish_down) == 'Ќикогда' || trim($row->publish_down) == '') {
		$row->publish_down = $nullDate;
	} else {
		if(strlen(trim($row->publish_down)) <= 10) {
			$row->publish_down .= ' 00:00:00';
		}
		$row->publish_down = mosFormatDate($row->publish_down,_CURRENT_SERVER_TIME_FORMAT,-$mosConfig_offset);
	}

	$row->state = intval(mosGetParam($_REQUEST,'published',0));

	$params = mosGetParam($_POST,'params','');
	if(is_array($params)) {
		$txt = array();
		foreach($params as $k => $v) {
			if(get_magic_quotes_gpc()) {
				$v = stripslashes($v);
			}
			$txt[] = "$k=$v";
		}
		$row->attribs = implode("\n",$txt);
	}

	// code cleaner for xhtml transitional compliance
	$row->introtext = str_replace('<br>','<br />',$row->introtext);
	$row->fulltext = str_replace('<br>','<br />',$row->fulltext);

	// remove <br /> take being automatically added to empty fulltext
	$length = strlen($row->fulltext) < 9;
	$search = strstr($row->fulltext,'<br />');
	if($length && $search) {
		$row->fulltext = null;
	}

	$row->title = ampReplace($row->title);

	if(!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	$row->version++;
	if(!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// manage frontpage items
	require_once ($mainframe->getPath('class','com_frontpage'));
	$fp = new mosFrontPage($database);

	if(intval(mosGetParam($_REQUEST,'frontpage',0))) {
		// toggles go to first place
		if(!$fp->load((int)$row->id)) {
			// new entry
			$query = "INSERT INTO #__content_frontpage"."\n VALUES ( ".(int)$row->id.", 1 )";
			$database->setQuery($query);
			if(!$database->query()) {
				echo "<script> alert('".$database->stderr()."');</script>\n";
				exit();
			}
			$fp->ordering = 1;
		}
	} else {
		// no frontpage mask
		if(!$fp->delete((int)$row->id)) {
			$msg .= $fp->stderr();
		}
		$fp->ordering = 0;
	}
	$fp->updateOrder();

	$row->checkin();
	$row->updateOrder("catid = ".(int)$row->catid." AND state >= 0");

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$redirect = mosGetParam($_POST,'redirect');
	if (!$redirect) {
		$redirect = $sectionid;
	}
	switch($task) {
		case 'go2menu':
			mosRedirect('index2.php?option=com_menus&menutype='.$menu);
			break;

		case 'go2menuitem':
			mosRedirect('index2.php?option=com_menus&menutype='.$menu.'&task=edit&hidemainmenu=1&id='.$menuid);
			break;

		case 'menulink':
			menuLink($redirect,$row->id);
			break;

		case 'resethits':
			resethits($redirect,$row->id);
			break;

		case 'apply':
			$msg = _CONTENT_ITEM_SAVED.': '.$row->title;
			mosRedirect('index2.php?option=com_content&sectionid='.$redirect.'&task=edit&hidemainmenu=1&id='.$row->id,$msg);
			break;

			/* boston, после сохранени€ возвращаемс€ в окно добавлени€ нового содержимого*/
		case 'save_and_new':
			$msg = $row->title.' - '._E_ITEM_SAVED;
			mosRedirect('index2.php?option=com_content&sectionid=0&task=new',$msg);
			break;

		case 'save':
		default:
			$msg = _E_ITEM_SAVED.': '.$row->title;
			mosRedirect('index2.php?option=com_content&sectionid='.$redirect,$msg);
			break;
	}
}

/**
* Changes the state of one or more content pages
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function changeContent($cid = null,$state = 0,$option) {
	global $database,$my,$task;
	josSpoofCheck();
	if(count($cid) < 1) {
		$action = $state == 1?'publish':($state == -1?'archive':'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts($cid);
	$total = count($cid);
	$cids = 'id='.implode(' OR id=',$cid);

	$query = "UPDATE #__content"."\n SET state = ".(int)$state.", modified = ".$database->Quote(date
		('Y-m-d H:i:s'))."\n WHERE ( $cids ) AND ( checked_out = 0 OR (checked_out = ".(int)
		$my->id.") )";
	$database->setQuery($query);
	if(!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg().
			"'); window.history.go(-1); </script>\n";
		exit();
	}

	if(count($cid) == 1) {
		$row = new mosContent($database);
		$row->checkin($cid[0]);
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	switch($state) {
		case - 1:
			$msg = $total.' '._OBJ_ARCHIVED;
			break;

		case 1:
			$msg = $total.' '._OBJ_PUBLISHED;
			break;

		case 0:
		default:
			if($task == 'unarchive') {
				$msg = $total.' '._OBJ_UNARCHIVED;
			} else {
				$msg = $total.' '._OBJ_UNPUBLISHED;
			}
			break;
	}

	$redirect = mosGetParam($_POST,'redirect');
	if (!$redirect) {
		$redirect = $row->sectionid;
	}
	$rtask = strval(mosGetParam($_POST,'returntask',''));
	if($rtask) {
		$rtask = '&task='.$rtask;
	} else {
		$rtask = '';
	}

	mosRedirect('index2.php?option='.$option.$rtask.'&sectionid='.$redirect.'&mosmsg='.$msg);
}

/**
* Changes the state of one or more content pages
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function toggleFrontPage($cid,$section,$option) {
	global $database,$mainframe;
	josSpoofCheck();
	if(count($cid) < 1) {
		echo "<script> alert('"._CHOOSE_OBJ_TOGGLE."'); window.history.go(-1);</script>\n";
		exit;
	}

	$msg = '';
	require_once ($mainframe->getPath('class','com_frontpage'));

	$fp = new mosFrontPage($database);
	foreach($cid as $id) {
		// toggles go to first place
		if($fp->load($id)) {
			if(!$fp->delete($id)) {
				$msg .= $fp->stderr();
			}
			$fp->ordering = 0;
		} else {
			// new entry
			$query = "INSERT INTO #__content_frontpage"."\n VALUES ( ".(int)$id.", 0 )";
			$database->setQuery($query);
			if(!$database->query()) {
				echo "<script> alert('".$database->stderr()."');</script>\n";
				exit();
			}
			$fp->ordering = 0;
		}
		$fp->updateOrder();
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');
	$redirect = mosGetParam($_POST, 'redirect');
	if (!$redirect) {
		$redirect = $sectionid;
	}

	mosRedirect('index2.php?option='.$option.'&sectionid='.$redirect,$msg);
}

function removeContent(&$cid,$sectionid,$option) {
	global $database;
	josSpoofCheck();
	$total = count($cid);
	if($total < 1) {
		echo "<script> alert('"._CHOOSE_OBJ_DELETE."'); window.history.go(-1);</script>\n";
		exit;
	}

	$state = '-2';
	$ordering = '0';
	//seperate contentids
	mosArrayToInts($cid);
	$cids = 'id='.implode(' OR id=',$cid);
	$query = "UPDATE #__content"."\n SET state = ".(int)$state.", ordering = ".(int)
		$ordering."\n WHERE ( $cids )";
	$database->setQuery($query);
	if(!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg().
			"'); window.history.go(-1); </script>\n";
		exit();
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$msg = _MOVED_TO_TRASH.": ".$total;
	$return = strval(mosGetParam($_POST,'returntask',''));
	$redirect = mosGetParam($_POST, 'redirect');
	if (!$redirect) {
		$redirect = $sectionid;
	}
	mosRedirect('index2.php?option='.$option.'&task='.$return.'&sectionid='.$redirect,$msg);
}

/**
* Cancels an edit operation
*/
function cancelContent() {
	global $database;
	josSpoofCheck();
	$row = new mosContent($database);
	$row->bind($_POST);
	$row->checkin();

	$redirect = mosGetParam($_POST,'redirect');
	mosRedirect('index2.php?option=com_content&sectionid='.$redirect);
}

/**
* Moves the order of a record
* @param integer The increment to reorder by
*/
function orderContent($uid,$inc,$option) {
	global $database;
	josSpoofCheck();
	$row = new mosContent($database);
	$row->load((int)$uid);
	$row->move($inc,"catid = ".(int)$row->catid." AND state >= 0");

	$redirect = mosGetParam($_POST,'redirect');
	if (!$redirect) {
		$redirect = $row->sectionid;
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	mosRedirect('index2.php?option='.$option.'&sectionid='.$redirect);
}

/**
* Form for moving item(s) to a different section and category
*/
function moveSection($cid,$sectionid,$option) {
	global $database;

	if(!is_array($cid) || count($cid) < 1) {
		echo "<script> alert('"._CHOOSE_OBJ_MOVE."'); window.history.go(-1);</script>\n";
		exit;
	}

	//seperate contentids
	mosArrayToInts( $cid );
	$cids = 'a.id='.implode(' OR a.id=',$cid);
	// Content Items query
	$query = "SELECT a.title"."\n FROM #__content AS a"."\n WHERE ( $cids )"."\n ORDER BY a.title";
	$database->setQuery($query);
	$items = $database->loadObjectList();

	$database->setQuery($query =
		"SELECT CONCAT_WS( ', ', s.id, c.id ) AS `value`, CONCAT_WS( '/', s.name, c.name ) AS `text`".
		"\n FROM #__sections AS s"."\n INNER JOIN #__categories AS c ON c.section = s.id".
		"\n WHERE s.scope = 'content'"."\n ORDER BY s.name, c.name");
	$rows = $database->loadObjectList();
	// build the html select list
	$sectCatList = mosHTML::selectList($rows,'sectcat','class="inputbox" size="8"',
		'value','text',null);

	HTML_content::moveSection($cid,$sectCatList,$option,$sectionid,$items);
}

/**
* Save the changes to move item(s) to a different section and category
*/
function moveSectionSave(&$cid,$sectionid,$option) {
	global $database,$my;
	josSpoofCheck();
	$sectcat = mosGetParam($_POST,'sectcat','');
	list($newsect,$newcat) = explode(',',$sectcat);
	// ensure values are integers
	$newsect = intval($newsect);
	$newcat = intval($newcat);

	if(!$newsect && !$newcat) {
		mosRedirect("index.php?option=com_content&sectionid=$sectionid&mosmsg="._ERROR_OCCURED);
	}

	// find section name
	$query = "SELECT a.name"."\n FROM #__sections AS a"."\n WHERE a.id = ".(int)$newsect;
	$database->setQuery($query);
	$section = $database->loadResult();

	// find category name
	$query = "SELECT  a.name"."\n FROM #__categories AS a"."\n WHERE a.id = ".(int)
		$newcat;
	$database->setQuery($query);
	$category = $database->loadResult();

	$total = count($cid);

	$row = new mosContent($database);
	// update old orders - put existing items in last place
	foreach($cid as $id) {
		$row->load(intval($id));
		$row->ordering = 0;
		$row->store();
		$row->updateOrder("catid = ".(int)$row->catid." AND state >= 0");
	}

	mosArrayToInts( $cid );
	$cids = 'id='.implode(' OR id=',$cid);
	$query = "UPDATE #__content SET sectionid = ".(int)$newsect.", catid = ".(int)$newcat.
		"\n WHERE ( $cids )"."\n AND ( checked_out = 0 OR ( checked_out = ".(int)$my->id.
		" ) )";
	$database->setQuery($query);
	if(!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg().
			"'); window.history.go(-1); </script>\n";
		exit();
	}

	// update new orders - put items in last place
	foreach($cid as $id) {
		$row->load(intval($id));
		$row->ordering = 0;
		$row->store();
		$row->updateOrder("catid = ".(int)$row->catid." AND state >= 0");
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$msg = $total.' '._OBJECTS_MOVED_TO_SECTION.': '.$section.', '._E_CATEGORY.': '.$category;
	mosRedirect('index2.php?option='.$option.'&sectionid='.$sectionid.'&mosmsg='.$msg);
}


/**
* Form for copying item(s)
**/
function copyItem($cid,$sectionid,$option) {
	global $database;

	if(!is_array($cid) || count($cid) < 1) {
		echo "<script> alert('"._CHOOSE_OBJECT_TO_MOVE."'); window.history.go(-1);</script>\n";
		exit;
	}

	//seperate contentids
	mosArrayToInts( $cid );
	$cids = 'a.id='.implode(' OR a.id=',$cid);
	## Content Items query
	$query = "SELECT a.title"."\n FROM #__content AS a"."\n WHERE ( $cids )"."\n ORDER BY a.title";
	$database->setQuery($query);
	$items = $database->loadObjectList();

	## Section & Category query
	$query = "SELECT CONCAT_WS(',',s.id,c.id) AS `value`, CONCAT_WS(' // ', s.name, c.name) AS `text`".
		"\n FROM #__sections AS s"."\n INNER JOIN #__categories AS c ON c.section = s.id".
		"\n WHERE s.scope = 'content'"."\n ORDER BY s.name, c.name";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	// build the html select list
	$sectCatList = mosHTML::selectList($rows,'sectcat','class="inputbox" size="10"',
		'value','text',null);

	HTML_content::copySection($option,$cid,$sectCatList,$sectionid,$items);
}


/**
* saves Copies of items
**/
function copyItemSave($cid,$sectionid,$option) {
	global $database;
	josSpoofCheck();
	$sectcat = mosGetParam($_POST,'sectcat','');
	//seperate sections and categories from selection
	$sectcat = explode(',',$sectcat);
	list($newsect,$newcat) = $sectcat;

	if(!$newsect && !$newcat) {
		mosRedirect('index.php?option=com_content&sectionid='.$sectionid.'&mosmsg='._ERROR_OCCURED);
	}

	// find section name
	$query = "SELECT a.name"."\n FROM #__sections AS a"."\n WHERE a.id = ".(int)$newsect;
	$database->setQuery($query);
	$section = $database->loadResult();

	// find category name
	$query = "SELECT a.name"."\n FROM #__categories AS a"."\n WHERE a.id = ".(int)$newcat;
	$database->setQuery($query);
	$category = $database->loadResult();

	$total = count($cid);
	for($i = 0; $i < $total; $i++) {
		$row = new mosContent($database);

		// main query
		$query = "SELECT a.*"."\n FROM #__content AS a"."\n WHERE a.id = ".(int)$cid[$i];
		$database->setQuery($query);
		$item = $database->loadObjectList();

		// values loaded into array set for store
		$row->id = null;
		$row->sectionid = $newsect;
		$row->catid = $newcat;
		$row->hits = '0';
		$row->ordering = '0';
		$row->title = $item[0]->title;
		$row->title_alias = $item[0]->title_alias;
		$row->introtext = $item[0]->introtext;
		$row->fulltext = $item[0]->fulltext;
		$row->state = $item[0]->state;
		$row->mask = $item[0]->mask;
		$row->created = $item[0]->created;
		$row->created_by = $item[0]->created_by;
		$row->created_by_alias = $item[0]->created_by_alias;
		$row->modified = $item[0]->modified;
		$row->modified_by = $item[0]->modified_by;
		$row->checked_out = $item[0]->checked_out;
		$row->checked_out_time = $item[0]->checked_out_time;
		$row->publish_up = $item[0]->publish_up;
		$row->publish_down = $item[0]->publish_down;
		$row->images = $item[0]->images;
		$row->attribs = $item[0]->attribs;
		$row->version = $item[0]->parentid;
		$row->parentid = $item[0]->parentid;
		$row->metakey = $item[0]->metakey;
		$row->metadesc = $item[0]->metadesc;
		$row->access = $item[0]->access;

		if(!$row->check()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if(!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$row->updateOrder("catid='".(int)$row->catid."' AND state >= 0");
	}

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$msg = $total.' '._OBJECTS_COPIED_TO_SECTION.': '.$section.', '._E_CATEGORY.': '.$category;
	mosRedirect('index2.php?option='.$option.'&sectionid='.$sectionid.'&mosmsg='.$msg);
}

/**
* Function to reset Hit count of a content item
* PT
*/
function resethits($redirect,$id) {
	global $database;
	josSpoofCheck();
	$row = new mosContent($database);
	$row->Load((int)$id);
	$row->hits = 0;
	$row->store();
	$row->checkin();

	$msg = _HITCOUNT_RESETTED;
	mosRedirect('index2.php?option=com_content&sectionid='.$redirect.'&task=edit&hidemainmenu=1&id='.$id,$msg);
}

/**
* @param integer The id of the content item
* @param integer The new access level
* @param string The URL option
*/
function accessMenu($uid,$access,$option) {
	global $database;
	josSpoofCheck();
	$row = new mosContent($database);
	$row->load((int)$uid);
	$row->access = $access;

	if(!$row->check()) {
		return $row->getError();
	}
	if(!$row->store()) {
		return $row->getError();
	}

	$redirect = mosGetParam($_POST, 'redirect', $row->sectionid);

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	mosRedirect('index2.php?option='.$option.'&sectionid='.$redirect);
}

function filterCategory($query,$active = null) {
	global $database;

	$categories[] = mosHTML::makeOption('0',_SEL_CATEGORY);
	$database->setQuery($query);
	$categories = array_merge($categories,$database->loadObjectList());

	$category = mosHTML::selectList($categories,'catid',
		'class="inputbox" size="1" onchange="document.adminForm.submit( );"','value',
		'text',$active);

	return $category;
}

function menuLink($redirect,$id) {
	global $database;
	josSpoofCheck();
	$menu = strval(mosGetParam($_POST,'menuselect',''));
	$link = strval(mosGetParam($_POST,'link_name',''));

	$link = stripslashes(ampReplace($link));

	$row = new mosMenu($database);
	$row->menutype = $menu;
	$row->name = $link;
	$row->type = 'content_item_link';
	$row->published = 1;
	$row->componentid = $id;
	$row->link = 'index.php?option=com_content&task=view&id='.$id;
	$row->ordering = 9999;

	if(!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if(!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder("menutype = ".$database->Quote($row->menutype)." AND parent = ".(int)$row->parent);

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$msg = $link.' (—сылка - ќбъект содержимого) в меню: '.$menu.' successfully created';
	mosRedirect('index2.php?option=com_content&sectionid='.$redirect.'&task=edit&hidemainmenu=1&id='.$id,$msg);
}

function go2menu() {
	$menu = strval(mosGetParam($_POST,'menu','mainmenu'));

	mosRedirect('index2.php?option=com_menus&menutype='.$menu);
}

function go2menuitem() {
	$menu = strval(mosGetParam($_POST,'menu','mainmenu'));
	$id = intval(mosGetParam($_POST,'menuid',0));

	mosRedirect('index2.php?option=com_menus&menutype='.$menu.'&task=edit&hidemainmenu=1&id='.$id);
}

function saveOrder(&$cid) {
	global $database;
	josSpoofCheck();
	$total = count($cid);
	$redirect = mosGetParam($_POST,'redirect');
	$rettask = strval(mosGetParam($_POST,'returntask',''));

	$order = josGetArrayInts('order');

	$row = new mosContent($database);
	$conditions = array();

	// update ordering values
	for($i = 0; $i < $total; $i++) {
		$row->load((int)$cid[$i]);
		if($row->ordering != $order[$i]) {
			$row->ordering = $order[$i];
			if(!$row->store()) {
				echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
				exit();
			} // if
			// remember to updateOrder this group
			$condition = "catid = ".(int)$row->catid." AND state >= 0";
			$found = false;
			foreach($conditions as $cond)
				if($cond[1] == $condition) {
					$found = true;
					break;
				} // if
			if(!$found) $conditions[] = array($row->id,$condition);
		} // if
	} // for

	// execute updateOrder for each group
	foreach($conditions as $cond) {
		$row->load($cond[0]);
		$row->updateOrder($cond[1]);
	} // foreach

	// clean any existing cache files
	mosCache::cleanCache('com_content');

	$msg = _NEW_ORDER_SAVED;
	switch($rettask) {
		case 'showarchive':
			mosRedirect('index2.php?option=com_content&task=showarchive&sectionid='.$redirect,$msg);
			break;

		default:
			mosRedirect('index2.php?option=com_content&sectionid='.$redirect,$msg);
			break;
	} // switch
} // saveOrder

function seccatli($act = 0,$filter_authorid=0){
	global $database,$mosConfig_live_site;

	$sectli = '<div id="ntree" class="dtree"><script type="text/javascript"><!--';
	$sectli .= "\n c = new dTree('c','$mosConfig_live_site/".ADMINISTRATOR_DIRECTORY."/images/dtree/');";
	$sectli .= "\n c.add(0,-1,'—труктура (<a href=\"index2.php?option=com_content&sectionid=0&catid=0\">все</a>)');";

	$query = "SELECT s.id, s.title, c.section"
			."\n FROM #__sections AS s"
			."\n LEFT JOIN #__categories AS c ON c.section = s.id"
			."\n INNER JOIN #__content AS con ON con.catid = c.id"
			."\n GROUP BY c.section"
			."\n ORDER BY s.title, s.ordering ASC";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	foreach($rows as $row) {
		$sectli .= "\n c.add($row->id,0,'$row->title');";
	}
	$sectli .= _cat_d($act);

	$sectli .= "\n u = new dTree('u','$mosConfig_live_site/".ADMINISTRATOR_DIRECTORY."/images/dtree/');";
	$sectli .= "\n u.add(0,-1,'јвторы');";
	$sectli .=_user_d($act);
	$query = "SELECT u.id,u.gid,u.name,COUNT(c.id) AS num FROM #__users AS u INNER JOIN #__content AS c ON c.created_by = u.id WHERE c.sectionid>0 AND c.state!='-2' GROUP BY c.created_by";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	foreach($rows as $row) {
		if($filter_authorid!=$row->id) $row->name = "<a href=\"index2.php?option=com_content&sectionid=0&filter_authorid=$row->id\"> $row->name</a>";
		$sectli .= "\n u.add($row->id,$row->gid,'$row->name ($row->num)');";
	}

	$sectli .= "\n document.write(c);";
	$sectli .= "\n document.write(u);";
	$sectli .= '//--></script></div>';
	return $sectli;
}

function _cat_d($act){
	global $database;
	$query = "SELECT cat.id, cat.title, cat.section, COUNT(con.catid) AS countcon"
			."\n FROM #__categories AS cat"
			."\n LEFT JOIN #__content AS con ON con.catid = cat.id"
			."\n WHERE state!=-2"
			."\n GROUP BY cat.id"
			."\n ORDER BY cat.section ASC";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	$ret = '';
	$n=0;
	foreach($rows as $row) {
		$n++;
		if(strlen($row->title)>30) $row->title = substr($row->title,0,30).'...';
		if($act!=$row->id) $row->title="<a href=\"index2.php?option=com_content&sectionid=$row->section&catid=$row->id\"> $row->title</a>";
		$ret .= "\n c.add(2008$n$row->id,$row->section,'$row->title ($row->countcon)');";
	}
	unset($rows);
	return $ret;
}

function _user_d(){
	global $database,$mosConfig_live_site;
	$query = "SELECT a.group_id,a.name FROM #__core_acl_aro_groups AS a"
		." INNER JOIN #__users AS u ON u.gid = a.group_id"
		." GROUP BY u.gid";
	$database->setQuery($query);
	$rows = $database->loadObjectList();
	$ret = '';
	foreach($rows as $row) {
		$ret .= "\n u.add($row->group_id,0,'$row->name','','','','','$mosConfig_live_site/".ADMINISTRATOR_DIRECTORY."/images/dtree/folder_user.gif');";
	}
	unset($rows);
	return $ret;
}


?>
