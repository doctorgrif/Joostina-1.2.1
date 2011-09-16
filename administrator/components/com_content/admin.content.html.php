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

/**
* @package Joostina
* @subpackage Content
*/
class HTML_content {

	/**
	* Writes a list of the content items
	* @param array An array of content objects
	*/
	function showContent(&$rows,$section,&$lists,$search,$pageNav,$all = null,$redirect='') {
		global $my,$acl,$database,$mosConfig_live_site;
		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadDtree();
	?>
	<script type="text/javascript">
		// смена статуса отображения на главной странице
		function ch_fpage(elID){
			log('Смена отображения на главной: '+elID);
			SRAX.get('img-fpage-'+elID).src = 'images/aload.gif';
			dax({
				url: 'ajax.index.php?option=com_content&utf=0&task=frontpage&id='+elID,
				id:'fpage-'+elID,
				callback:
					function(resp, idTread, status, ops){
						log('Получен ответ: ' + resp.responseText);
						SRAX.get('img-fpage-' + elID).src = 'images/'+resp.responseText;
			}});
		}
		// перемещение содержимого в корзину
		function ch_trash(elID){
			log('Удаление в корзину: '+elID);
			if(SRAX.get('img-trash-'+elID).src == '<?php echo $mosConfig_live_site;?>/<?php echo ADMINISTRATOR_DIRECTORY?>/images/trash_mini.png'){
				SRAX.get('img-trash-'+elID).src = 'images/help.png';
				return null;
			}

			SRAX.get('img-trash-'+elID).src = 'images/aload.gif';
			dax({
				url: 'ajax.index.php?option=com_content&utf=0&task=to_trash&id='+elID,
				id:'trash-'+elID,
				callback:
					function(resp, idTread, status, ops){
						log('Получен ответ: ' + resp.responseText);
						if(resp.responseText=='1') {
							log('Перемещение в корзину успешно: ' + elID);
							SRAX.remove('tr-el-'+elID);
						}else{
							log('Ошибка перемещения в корзину: ' + elID);
							SRAX.get('tr-el-'+elID).style.background='red';
						}
			}});
		}
		/* скрытие дерева навигации по структуре содержимого */
		function ntreetoggle(){
			if(SRAX.get('ntdree').style.display =='none'){
				SRAX.get('ntdree').style.display ='block';
				SRAX.get('tdtoogle').className='tdtoogleoff';
				setCookie('j-ntree-hide','0');
			}else{
				SRAX.get('ntdree').style.display ='none';
				SRAX.get('tdtoogle').className='tdtoogleon';
				setCookie('j-ntree-hide','1');
			}
		}
	</script>
	<form action="index2.php?option=com_content" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="edit" colspan="3" class="jtd_nowrap">
<?php if($all) { ?>
				<?php echo _ALL_CONTENT;?>
<?php } else { ?>
				<?php echo _SITE_CONTENT;?>, <?php echo $section->params['name'];?>: <a href="<?php echo $section->params['link'];?>" title="<?php echo _GOTO_EDIT;?>"><?php echo $section->title; ?></a>
<?php } ?>
			</th>
		</tr>
		<tr>
			<td>
				<?php echo _FILTER;?>:<br /><input type="text" style="width: 99%;" name="search" value="<?php echo htmlspecialchars($search); ?>" class="inputbox" onChange="document.adminForm.submit();" />
			</td>
			<td><?php echo _SORT_BY;?>:<br /><?php echo $lists['order']; ?></td>
			<td><?php echo _ORDER_DROPDOWN;?>:<br /><?php echo $lists['order_sort']; ?></td>
		</tr>
	</table>

<table class="adminlisttop adminlist">
	<tr class="row0">
	<td valign="top" align="left"id="ntdree"><img src="images/con_pix.gif"><?php echo $lists['sectree'];?></td>
	<td onclick="ntreetoggle();" width="1" id="tdtoogle" <?php echo $lists['sectreetoggle'];?>><img alt="<?php echo _HIDE_NAV_TREE;?>" src="images/tgl.gif" /></td>
	<td valign="top" width="100%">
	<table class="adminlist" width="100%">
		<thead>
		<tr>
			<th width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title" width="45%"><?php echo _HEADER_TITLE;?></th>
			<th width="5%"><?php echo _CMN_PUBLISHED;?></th>
			<th width="5%" class="jtd_nowrap"><?php echo _ON_FRONTPAGE;?></th>
			<th width="5%"><?php echo _ORDER_DROPDOWN;?></th>
			<th width="5%">
				<a href="javascript: saveorder( <?php echo count($rows) - 1; ?> )"><img src="images/filesave.png" width="16" height="16" alt="<?php echo _SAVE_ORDER;?>" /></a>
			</th>
			<th width="5%"><?php echo _ACCESS_RIGHTS;?></th>
			<th width="5%"><?php echo _TO_TRASH;?></th>
			<th width="5%">ID</th>
			<?php if ( $all ) { ?>
			<th width="5%"><?php echo _SECTION;?></th>
			<?php } ?>
			<th width="5%"><?php echo _E_CATEGORY;?></th>
			<th width="5%"><?php echo _AUTHOR_BY;?></th>
			<!--<th><?php echo _CREATED;?></th>-->
		</tr>
		</thead>
		<tbody>
<?php
		$k = 0;
		$nullDate = $database->getNullDate();
		$now = _CURRENT_SERVER_TIME;
		for($i = 0,$n = count($rows); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);
			$link = 'index2.php?option=com_content&sectionid='.$redirect.'&task=edit&hidemainmenu=1&id='.$row->id;
			$row->sect_link = 'index2.php?option=com_sections&task=editA&hidemainmenu=1&id='.$row->sectionid;
			$row->cat_link = 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='.$row->catid;
			if($now <= $row->publish_up && $row->state == 1) {
				// опубликовано
				$img = 'publish_y.png';
				//$alt = 'Опубликовано';
			} else if(($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state ==1) {
				// Доступно
				$img = 'publish_g.png';
				//$alt = 'Опубликовано';
			} else if($now > $row->publish_down && $row->state == 1) {
				// Истекло
				$img = 'publish_r.png';
				//$alt = 'Просрочено';
			} elseif($row->state == 0) {
				// Не опубликовано
				$img = 'publish_x.png';
				//$alt = 'Не опубликовано';
			}
			// корректировка и проверка времени
			$row->publish_up = mosFormatDate($row->publish_up,_CURRENT_SERVER_TIME_FORMAT);
			if(trim($row->publish_down) == $nullDate || trim($row->publish_down) == '' || trim($row->publish_down) == '-') {
				$row->publish_down = _NEVER;
			}
			$row->publish_down = mosFormatDate($row->publish_down,_CURRENT_SERVER_TIME_FORMAT);
			$times = '';
			if($row->publish_up == $nullDate) {
				$times .= "<tr><td>"._START.": "._ALWAYS."</td></tr>";
			} else {
				$times .= "<tr><td>"._START.": $row->publish_up</td></tr>";
			}
			if($row->publish_down == $nullDate || $row->publish_down == 'Никогда') {
				$times .= "<tr><td>"._END.": "._WITHOUT_END."</td></tr>";
			} else {
				$times .= "<tr><td>"._END.": $row->publish_down</td></tr>";
			}
			if($acl->acl_check('administration','manage','users',$my->usertype,'components','com_users')) {
				if($row->created_by_alias) {
					$author = $row->created_by_alias;
				} else {
					$linkA = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='.$row->created_by;
					$author = '<a href="'.$linkA.'" title="'._CHANGE_USER_DATA.'">'.$row->author.'</a>';
				}
			} else {
				if($row->created_by_alias) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}
			$date		= mosFormatDate($row->created,'%x');
			$access		= mosCommonHTML::AccessProcessing($row,$i,1);
			$checked	= mosCommonHTML::CheckedOutProcessing($row,$i);
			// значок отображения на главной странице
			$front_img = $row->frontpage ? 'tick.png' : 'publish_x.png';
?>
			<tr class="row<?php echo $k; ?>" id="tr-el-<?php echo $row->id;?>">
				<td width="5%" align="center"><?php echo $checked; ?></td>
				<td width="45%"align="left">
<?php
				if($row->checked_out && ($row->checked_out != $my->id)) {
					echo $row->title;
				} else {
?>
				<a class="abig" href="<?php echo $link; ?>" title="<?php echo _CHANGE_CONTENT;?>"><?php echo $row->title; ?></a>
<?php
				}
?>
				<br />
				<?php echo _CREATED;?> <?php echo $row->created;?>,<br />
				<?php echo _HEADER_HITS;?> <?php echo $row->hits;?>
				<!--,<br /> <?php echo _AUTHOR_BY;?> <?php echo $author; ?>-->
				</td>
<?php
			if($times) {
?>
				<td width="5%" align="center" <?php echo ($row->checked_out && ($row->checked_out != $my->id)) ? null : 'onclick="ch_publ('.$row->id.',\'com_content\');" class="td-state"';?>>
					<img class="img-mini-state" src="images/<?php echo $img;?>" id="img-pub-<?php echo $row->id;?>" alt="<?php echo _E_PUBLISHING;?>" />
				</td>
<?php
			}
?>
				<td width="5%" align="center" <?php echo ($row->checked_out && ($row->checked_out != $my->id)) ? null : 'onclick="ch_fpage('.$row->id.');" class="td-state"';?>>
					<img class="img-mini-state" src="images/<?php echo $front_img;?>" id="img-fpage-<?php echo $row->id;?>" alt="<?php echo _ON_FRONTPAGE;?>" />
				</td>
				<td width="5%" align="center" colspan="2">
					<?php echo $pageNav->orderUpIcon($i,($row->catid == @$rows[$i - 1]->catid)); ?>
					<input type="text" name="order[]" size="3" value="<?php echo $row->ordering; ?>" class="textarea" style="text-align:center;" />
					<?php echo $pageNav->orderDownIcon($i,$n,($row->catid == @$rows[$i + 1]->catid)); ?>
				</td>
				<td width="5%" align="center" id="acc-id-<?php echo $row->id;?>"><?php echo $access; ?></td>
				<td width="5%" align="center" <?php echo $row->checked_out ? null : 'onclick="ch_trash('.$row->id.');" class="td-state"';?>>
					<img class="img-mini-state" src="images/trash_mini.png" id="img-trash-<?php echo $row->id;?>"/>
				</td>
				<td width="5%" align="center"><?php echo $row->id; ?></td>
				<?php if ( $all ) { ?>
				<td width="5%" align="center">
					<a href="<?php echo $row->sect_link; ?>" title="<?php echo _CHANGE_SECTION; ?>"><?php echo $row->section_name; ?></a>
				</td>
				<?php } ?>
				<td width="5%" align="center">
					<a href="<?php echo $row->cat_link; ?>" title="<?php echo _CHANGE_CATEGORY; ?>"><?php echo $row->name; ?></a>
				</td>
				<td width="5%" align="center"><?php echo $author; ?></td>
				<!--<td align="center"><?php echo $date; ?></td>-->
			</tr>
<?php
			$k = 1 - $k;
		}
?>
		</tbody>
		</table>
		</td>
	</tr>
</table>
		<?php echo $pageNav->getListFooter(); ?>
		<?php mosCommonHTML::ContentLegend(); ?>
		<input type="hidden" name="option" value="com_content" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* Writes a list of the content items
	* @param array An array of content objects
	*/
	function showArchive(&$rows,$section,&$lists,$search,$pageNav,$option,$all = null,$redirect) {
		global $my,$acl;

?>
		<script type="text/javascript">
		function submitbutton(pressbutton) {
			if (pressbutton == 'remove') {
				if (document.adminForm.boxchecked.value == 0) {
					alert('<?php echo _CHOOSE_OBJECTS_TO_TRASH?>');
				} else if ( confirm('<?php echo _WANT_TO_TRASH?>')) {
					submitform('remove');
				}
			} else {
				submitform(pressbutton);
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="edit" rowspan="2">
<?php
		if($all) {
?>
				<?php echo _ARCHIVE?> <small><small>[ <?php echo _ALL_SECTIONS?> ]</small></small>
<?php
		} else {
?>
				<?php echo _ARCHIVE?> <small><small>[ <?php echo _SECTION?>: <?php echo $section->title; ?> ]</small></small>
<?php
		}
?>
			</th>
<?php
		if($all) {
?>
				<td align="right" rowspan="2" valign="top"><?php echo $lists['sectionid']; ?></td>
				<?php
		}
?>
			<td align="right" valign="top"><?php echo $lists['catid']; ?></td>
			<td valign="top"><?php echo $lists['authorid']; ?></td>
		</tr>
		<tr>
			<td align="right"><?php echo _FILTER?>:</td>
			<td>
				<input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" class="textarea" onChange="document.adminForm.submit();" />
			</td>
		</tr>
		</table>
		<table class="adminlist">
		<tr>
			<th width="5">#</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title"><?php echo _HEADER_TITLE?></th>
			<th width="2%"><?php echo _ORDER_DROPDOWN?></th>
			<th width="1%">
				<a href="javascript: saveorder( <?php echo count($rows) - 1; ?> )"><img src="images/filesave.png" width="16" height="16" alt="<?php echo _SAVE_ORDER?>" /></a>
			</th>
			<th width="15%" align="left"><?php echo _E_CATEGORY?></th>
			<th width="15%" align="left"><?php echo _AUTHOR_BY?></th>
			<th align="center" width="10"><?php echo _DATE?></th>
		</tr>
		<?php
		$k = 0;
		for($i = 0,$n = count($rows); $i < $n; $i++) {
			$row = &$rows[$i];

			$row->cat_link = 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='.$row->catid;

			if($acl->acl_check('administration','manage','users',$my->usertype,'components','com_users')) {
				if($row->created_by_alias) {
					$author = $row->created_by_alias;
				} else {
					$linkA = 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='.$row->created_by;
					$author = '<a href="'.$linkA.'" title="Изменить данные пользователя">'.$row->author.'</a>';
				}
			} else {
				if($row->created_by_alias) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}

			$date = mosFormatDate($row->created,'%x');
?>
			<tr class="<?php echo "row$k"; ?>">
				<td><?php echo $pageNav->rowNumber($i); ?></td>
				<td width="20"><?php echo mosHTML::idBox($i,$row->id); ?></td>
				<td><?php echo $row->title; ?></td>
				<td align="center" colspan="2">
					<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="textarea" style="text-align: center;" />
				</td>
				<td>
					<a href="<?php echo $row->cat_link; ?>" title="<?php echo _CHANGE_CATEGORY?>">
						<?php echo $row->name; ?>
					</a>
				</td>
				<td><?php echo $author; ?></td>
				<td><?php echo $date; ?></td>
			</tr>
			<?php
			$k = 1 - $k;
		}
?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id; ?>" />
		<input type="hidden" name="task" value="showarchive" />
		<input type="hidden" name="returntask" value="showarchive" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* Отображение формы создания / редактирования содержимого
	*
	* Новая запись характеризуется значениями <var>$row</var> и  <var>id</var>
	* равными 0.
	* @param mosContent The category object
	* @param string The html for the groups select list
	*/
	function editContent(&$row,$section,&$lists,&$sectioncategories,&$images,&$params,$option,$redirect,&$menus) {
		global $database,$mosConfig_disable_image_tab,$mosConfig_one_editor;
		mosMakeHtmlSafe($row);
		$nullDate = $database->getNullDate();
		$create_date = null;
		if($row->created != $nullDate) {
			$create_date = mosFormatDate($row->created,'%d %B %Y %H:%M','0');
		}
		$mod_date = null;
		if($row->modified != $nullDate) {
			$mod_date = mosFormatDate($row->modified,'%d %B %Y %H:%M','0');
		}
		$tabs = new mosTabs(1);
		// used to hide "Reset Hits" when hits = 0
		if(!$row->hits) {
			$visibility = "style='display: none; visibility: hidden;'";
		} else {
			$visibility = '';
		}
		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
?>
		<script type="text/javascript">
		<!--
		var sectioncategories = new Array;
<?php
		$i = 0;
		foreach($sectioncategories as $k => $items) {
			foreach($items as $v) {
				echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes($v->id)."','".addslashes($v->name)."' );\t";
			}
		}
?>
<?php
		// отключение вкладки "Изображения"
		if(!$mosConfig_disable_image_tab) { ?>
			var folderimages = new Array;
<?php
			$i = 0;
			foreach($images as $k => $items) {
				foreach($items as $v) {
					echo "folderimages[".$i++."] = new Array( '$k','".addslashes(ampReplace($v->value))."','".addslashes(ampReplace($v->text))."' );\t";
				}
			}
		}
?>
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "<?php echo _CHOOSE_MENU_PLEASE?>" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "<?php echo _ENTER_MENUITEM_NAME?>" );
					return;
				}
			}

			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
<?php
	// отключение вкладки "Изображения"
	if(!$mosConfig_disable_image_tab) {
?>
			var temp = new Array;
				for (var i=0, n=form.imagelist.options.length; i < n; i++) {
					temp[i] = form.imagelist.options[i].value;
				}
				form.images.value = temp.join( '\n' );
<?php } ?>
			// do field validation
			if (form.title.value == ""){
				alert( "<?php echo _OBJECT_MUST_HAVE_TITLE?>" );
			} else if (form.sectionid.value == "-1"){
				alert( "<?php echo _PLEASE_CHOOSE_SECTION?>" );
			} else if (form.catid.value == "-1"){
				alert( "<?php echo _PLEASE_CHOOSE_CATEGORY?>" );
			} else if (form.catid.value == ""){
				alert( "<?php echo _PLEASE_CHOOSE_CATEGORY?>" );
			} else {
				<?php getEditorContents('editor1','introtext'); ?>
				<?php if(!$mosConfig_one_editor) getEditorContents('editor2','fulltext'); ?>
				<?php getEditorContents('editor3','notetext'); ?>
				submitform( pressbutton );
			}
		}
		function ch_apply(){
			var form = document.adminForm;
			SRAX.get('tb-apply').className='tb-load';
			<?php getEditorContents('editor1','introtext'); ?>
			<?php if(!$mosConfig_one_editor) getEditorContents('editor2','fulltext'); ?>
			<?php getEditorContents('editor3','notetext'); ?>
<?php
	// отключение вкладки "Изображения"
	if(!$mosConfig_disable_image_tab) {
?>
			var temp = new Array;
				for (var i=0, n=form.imagelist.options.length; i < n; i++) {
					temp[i] = form.imagelist.options[i].value;
				}
				form.images.value = temp.join( '\n' );
<?php } ?>
			dax({
				url: 'ajax.index.php?option=com_content&task=apply',
				id:'publ-1',
				method:'post',
				form: 'adminForm',
				callback:
					function(resp){
						log('Получен ответ: ' + resp.responseText);
						mess_cool(resp.responseText);
						SRAX.get('tb-apply').className='tb-apply';
			}});
		}
		function ch_metakey(){
			<?php getEditorContents('editor1','introtext'); ?>
			<?php if(!$mosConfig_one_editor){?><?php getEditorContents('editor2','fulltext'); ?> <?php };?>
			<?php getEditorContents('editor3','notetext'); ?>
			dax({
				url: 'ajax.index.php?option=com_content&task=metakey',
				id:'publ-1',
				method:'post',
				form: 'adminForm',
				callback:
					function(resp){
						log('Получен ответ: ' + resp.responseText);
						SRAX.get('metakey').value = (resp.responseText);
			}});
		}
		function ntreetoggle(){
			if(SRAX.get('ncontent').style.display =='none'){
				SRAX.get('ncontent').style.display ='block';
				SRAX.get('ncontent').style.width ='410px';
				SRAX.get('tdtoogle').className='tdtoogleon';
			}else{
				SRAX.get('ncontent').style.display ='none';
				SRAX.get('tdtoogle').className='tdtoogleoff';
			}
		}
		function x_resethits(){
			id = SRAX.get('id').value;
			dax({
				url: 'ajax.index.php?option=com_content&task=resethits&id='+id,
				id:'resethits',
				method:'post',
				callback:
					function(resp){
						log('Получен ответ: ' + resp.responseText);
						mess_cool(resp.responseText);
						SRAX.get('count_hits').innerHTML='0';
			}});
		}
		//-->
		</script>
		<table class="adminheading">
		<tr><th class="edit"><?php echo _E_CONTENT?>: <small><?php echo $row->id ? _O_EDITING: _O_CREATION; ?></small></th></tr>
		</table>
		<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<table class="adminform" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="100%" valign="top">
				<table width="100%" class="adminform" style="width:100%;" id="adminForm">
				<tr>
					<td width="100%">
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<th colspan="4"><?php echo _OBJECT_DETAILS?></th>
						</tr>
						<tr>
							<td width="15"><?php echo _HEADER_TITLE?>:</td>
							<td width="50%">
								<input class="textarea" type="text" name="title" size="30" maxlength="255" style="width:99%;" value="<?php echo $row->title; ?>" />
							</td>
							<td width="15"><?php echo _CMN_PUBLISHED?>:</td>
							<td width="50%"><?php echo mosHTML::yesnoRadioList('published','',$row->state);?></td>
						</tr>
						<tr>
							<td width="15"><?php echo _ALIAS?>:</td>
							<td width="50%">
								<input name="title_alias" type="text" class="textarea" id="title_alias" value="<?php echo $row->title_alias; ?>" size="30" style="width:99%;" maxlength="255" />
							</td>
							<td width="15"><?php echo _ON_FRONTPAGE?>:</td>
							<td width="50%"><?php echo mosHTML::yesnoRadioList('frontpage','',$row->frontpage ? 1:0);?></td>
						</tr>
						<tr>
							<td width="15"><?php echo _SECTION?>:</td>
							<td width="50%"><?php echo $lists['sectionid']; ?></td>
							<td width="15"><?php echo _E_CATEGORY?>:</td>
							<td width="50%"><?php echo $lists['catid']; ?></td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="100%">
						<?php echo $mosConfig_one_editor ? '': _INTROTEXT_M ; ?>
						<div id="intro_text"><?php editorArea('editor1',$row->introtext,'introtext','99%;','350','75','30'); ?></div>
					</td>
				</tr>
				<?php if(!$mosConfig_one_editor){?>
				<tr>
					<td width="100%">
						<?php echo _MAINTEXT_M?>
						<div id="full_text"><?php editorArea('editor2',$row->fulltext,'fulltext','99%;','400','75','30'); ?></div>
					</td>
				</tr>
				<?php };?>
				<tr>
					<td width="100%">
						<?php echo _NOTETEXT_M?>
						<div id="note_text"><?php editorArea('editor3',$row->notetext,'notetext','99%;','150','75','10'); ?></div>
					</td>
				</tr>
				</table>
			</td>
			<td onclick="ntreetoggle();" width="1" id="tdtoogle" class="tdtoogleon">
				<img alt="<?php echo _HIDE_PARAMS_PANEL?>" src="images/tgl.gif" />
			</td>
			<td valign="top" id="ncontent">
				<img src="images/con_pix.gif" width="410px;">
				<table class="adminform">
				<tr>
					<th>
					<table class="adminform">
						<tr>
							<th><?php echo _SETTINGS?></th>
						</tr>
					</table>
					</th>
				</tr>
				<tr>
				<td>
				<table width="100%">
				<tr>
					<td><strong><?php echo _E_STATE?></strong></td>
					<td><?php echo $row->state > 0? _CMN_PUBLISHED :($row->state < 0? _IN_ARCHIVE : _DRAFT_NOT_PUBLISHED); ?></td>
				</tr>
				<tr <?php echo $visibility; ?>>
					<td><strong><?php echo _HEADER_HITS?>:</strong></td>
					<td id="count_hits">
						<?php echo $row->hits; ?>&nbsp;&nbsp;&nbsp;<input name="reset_hits" type="button" class="button" value="<?php echo _RESET?>" onclick="return x_resethits();" />
					</td>
				</tr>
				<tr>
					<td><strong><?php echo _CHANGED?>:</strong> </td>
					<td><?php echo $row->version; ?> <?php echo _TIMES?></td>
				</tr>
				<tr>
					<td><strong><?php echo _CREATED?>:</strong> </td>
					<td><?php echo $create_date ? $create_date : _NEW_DOCUMENT;?></td>
				</tr>
				<tr>
					<td><strong><?php echo _LAST_CHANGE?>:</strong> </td>
					<td><?php echo $mod_date ? $mod_date.$row->modifier : _NOT_CHANGED;?></td>
				</tr>
			</table>
<?php
		$tabs->startPane("content-pane");
		$tabs->startTab(_E_PUBLISHING,"publish-page");
?>
			<table width="100%" class="adminform">
					<tr>
						<td valign="top" align="right"><?php echo _CMN_ACCESS?>:</td>
						<td><?php echo $lists['access']; ?></td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _E_AUTHOR_ALIAS?></td>
						<td>
							<input type="text" name="created_by_alias" style="width:90%;" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="textarea" />
						</td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _AUTHOR_BY?>:</td>
						<td><?php echo $lists['created_by']; ?></td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _ORDER_DROPDOWN?>:</td>
						<td><?php echo $lists['ordering']; ?></td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _E_CREATED?></td>
						<td>
							<input class="textarea" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
							<input name="reset" type="reset" class="button" onclick="return showCalendar('created', 'y-mm-dd');" value="..." />
						</td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _START_PUBLICATION?>:</td>
						<td>
							<input class="textarea" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
							<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
						</td>
					</tr>
					<tr>
						<td valign="top" align="right"><?php echo _END_PUBLICATION?>:</td>
						<td>
							<input class="textarea" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
							<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
						</td>
					</tr>
					<!--<tr>
						<td valign="top" align="right">Ссылка на источник:</td>
						<td>
							<input class="textarea" type="text" name="urls" id="urls" size="25" maxlength="500" value="<?php echo $row->urls; ?>" />
						</td>
					</tr>-->
				</table>
				<br />
				<table class="adminform">
<?php
	if($row->id) {
?>
					<tr>
						<td><strong><?php echo _OBJECT_ID?>:</strong></td>
						<td><?php echo $row->id; ?></td>
					</tr>
<?php
		}
?>
			</table>
<?php
		$tabs->endTab();
		// отключение вкладки "Изображения"
		if(!$mosConfig_disable_image_tab) {
			$tabs->startTab(_E_IMAGES,"images-page");
?>
					<table class="adminform" width="100%">
					<tr>
						<td colspan="2">
							<table width="100%">
							<tr>
								<td width="48%" valign="top">
									<div align="center">
										<?php echo _E_GALLERY_IMAGES?>:
										<br />
										<?php echo $lists['imagefiles']; ?>
									</div>
								</td>
								<td width="2%">
									<input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="Добавить" />
									<br />
									<input class="button" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="Удалить" />
								</td>
								<td width="48%">
									<div align="center">
										<?php echo _USED_IMAGES?>:
										<br />
										<?php echo $lists['imagelist']; ?>
										<br />
										<input class="button" type="button" value="Вверх" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
										<input class="button" type="button" value="Вниз" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" />
									</div>
								</td>
							</tr>
							</table>
							<?php echo _SUBDIRECTORY?>: <?php echo $lists['folders']; ?>
						</td>
					</tr>
					<tr valign="top">
						<td>
							<div align="center">
								<?php echo _IMAGE_EXAMPLE?>:<br />
								<img name="view_imagefiles" src="../images/M_images/blank.png" alt="<?php echo _IMAGE_EXAMPLE?>" width="100" />
							</div>
						</td>
						<td valign="top">
							<div align="center">
								<?php echo _ACTIVE_IMAGE?>:<br />
								<img name="view_imagelist" src="../images/M_images/blank.png" alt="Активное изображение" width="100" />
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<?php echo _E_EDIT_IMAGE?>:
							<table>
							<tr>
								<td align="right"><?php echo _SOURCE?>:</td>
								<td><input style="width:99%;" class="textarea" type="text" name= "_source" value="" /></td>
							</tr>
							<tr>
								<td align="right"><?php echo _ALIGN?>:</td>
								<td><?php echo $lists['_align']; ?></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_ALT?></td>
								<td><input style="width:99%;" class="textarea" type="text" name="_alt" value="" /></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_BORDER?></td>
								<td><input class="textarea" type="text" name="_border" value="" size="3" maxlength="1" /></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_CAPTION?>:</td>
								<td><input class="textarea" type="text" name="_caption" value="" size="30" /></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_CAPTION_POSITION?>:</td>
								<td><?php echo $lists['_caption_position']; ?></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_CAPTION_ALIGN?>:</td>
								<td><?php echo $lists['_caption_align']; ?></td>
							</tr>
							<tr>
								<td align="right"><?php echo _E_CAPTION_WIDTH?>:</td>
								<td><input class="textarea" type="text" name="_width" value="" size="5" maxlength="5" /></td>
							</tr>
							<tr>
								<td colspan="2"><input class="button" type="button" value="<?php echo _CMN_APPLY?>" onclick="applyImageProps()" /></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
<?php
		$tabs->endTab();
		} else
		echo '<input type="hidden" name="images" id="images" value="" />';
		$tabs->startTab(_PARAMETERS,"params-page");
?>
					<table class="adminform">
					<tr>
						<td>
						<?php echo _PARAMS_IN_VIEW?>
						<br />
						</td>
					</tr>
					<tr>
						<td><?php echo $params->render(); ?></td>
					</tr>
					</table>
<?php
		$tabs->endTab();
		$tabs->startTab(_METADATA,"metadata-page");
?>
					<table class="adminform">
					<tr>
						<td><?php echo _CMN_DESCRIPTION?>:
						<br />
						<textarea class="textarea" cols="60" rows="8" style="width:98%;" name="metadesc"><?php echo str_replace('&','&amp;',$row->metadesc); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
						<?php echo _E_M_KEY?>
						<br />
						<textarea class="textarea" cols="60" rows="8" style="width:98%;" name="metakey" id="metakey"><?php echo str_replace('&','&amp;',$row->metakey); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
						<input type="button" class="button" value="Добавить (Раздел, Категорию, Заголовок)" onclick="f=document.adminForm;f.metakey.value=document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].text+', '+getSelectedText('adminForm','catid')+', '+f.title.value+', '+f.metakey.value;" />
						<input type="button" class="button" value="Автоматически"onclick="return ch_metakey();" />
						</td>
					</tr>
					<tr>
						<td><?php echo _ROBOTS_PARAMS?>: <br /><?php echo $lists['robots'] ?></td>
					</tr>
				</table>
<?php
		$tabs->endTab();
		$tabs->startTab(_MENU_LINK,"link-page");
?>
			<table class="adminform">
				<tr>
					<td colspan="2"><?php echo _MENU_LINK2?></td>
				</tr>
				<tr>
					<td valign="top" width="90"><?php echo _CHOOSE_MENU_PLEASE?></td>
					<td><?php echo $lists['menuselect']; ?></td>
				</tr>
				<tr>
					<td valign="top" width="90"><?php echo _MENU_NAME?></td>
					<td><input style="width:90%;" type="text" name="link_name" class="textarea" value="" size="30" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input name="menu_link" type="button" class="button" value="Связать с меню" onclick="submitbutton('menulink');" /></td>
				</tr>
				<tr>
					<th colspan="2"><?php echo _EXISTED_MENUITEMS?></th>
				</tr>
<?php
		if($menus == null) {
?>
				<tr>
					<td colspan="2"><?php echo _NOT_EXISTS?></td>
				</tr>
<?php
		} else {
			mosCommonHTML::menuLinksContent($menus);
		}
?>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
			</table>
<?php
		$tabs->endTab();
		$tabs->endPane();
?>
				</td>
			</tr>
		</table>
		</tr>
		</td>
		</table>
		<input type="hidden" name="id" id="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
		<input type="hidden" name="mask" value="0" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="images" value="" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php

	}


	/**
	* Form to select Section/Category to move item(s) to
	* @param array An array of selected objects
	* @param int The current section we are looking at
	* @param array The list of sections and categories to move to
	*/
	function moveSection($cid,$sectCatList,$option,$sectionid,$items) {
?>
		<script type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "<?php echo _PLEASE_SELECT_SMTH?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>

		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="edit">
			<?php echo _OBJECT_MOVING?>
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td align="left" valign="top" width="40%">
			<strong><?php echo _MOVE_INTO_CAT_SECT?>:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td align="left" valign="top">
			<strong><?php echo _OBJECTS_TO_MOVE?>:</strong>
			<br />
			<?php
		echo "<ol>";
		foreach($items as $item) {
			echo "<li>".$item->title."</li>";
		}
		echo "</ol>";
?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
?>
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}


	/**
	* Form to select Section/Category to copys item(s) to
	*/
	function copySection($option,$cid,$sectCatList,$sectionid,$items) {
?>
		<script type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "<?php echo _SELECT_CAT_TO_MOVE_OBJECTS?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="edit">
			<?php echo _COPYING_CONTENT_ITEMS?>
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td align="left" valign="top" width="40%">
			<strong><?php echo _COPY_INTO_CAT_SECT?>:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td align="left" valign="top">
			<strong><?php echo _OBJECTS_TO_COPY?>:</strong>
			<br />
<?php
		echo "<ol>";
		foreach($items as $item) {
			echo "<li>".$item->title."</li>";
		}
		echo "</ol>";
?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
?>
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}
	function submit($params){
		mosCommonHTML::loadOverlib();
		echo $params->render(null);
	}
}
?>
