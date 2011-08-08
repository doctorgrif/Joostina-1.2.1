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

/**
* @package Joostina
* @subpackage Modules
*/
class HTML_modules {

	/**
	* Writes a list of the defined modules
	* @param array An array of category objects
	*/
	function showModules(&$rows,$myid,$client,&$pageNav,$option,&$lists,$search) {
		global $my,$mosConfig_live_site;
		mosCommonHTML::loadOverlib();
?>
	<script type="text/javascript">
	function ch_get_positon(elID){
		log('��������� ������ ������� ������: '+elID);
		SRAX.replaceHtml('mod-id-'+elID,'<img src="images/aload.gif" />');
		dax({
			url: 'ajax.index.php?option=com_modules&utf=1&task=position&id='+elID,
			id:'publ-'+elID,
			callback:
				function(resp, idTread, status, ops){
					log('������� �����: ' + resp.responseText);
					SRAX.replaceHtml('mod-id-'+elID,resp.responseText);
		}});
	}
	// ����� ������� ������
	function ch_sav_pos(elID,newPOS){
		log('����� ������� ������: '+elID+' �� '+newPOS);
		SRAX.replaceHtml('mod-id-'+elID,'<img src="images/aload.gif" />');
		dax({
			url: 'ajax.index.php?option=com_modules&task=save_position&id='+elID+'&new_pos='+newPOS,
			id:'publ-'+elID,
			callback:
				function(resp, idTread, status, ops){
					log('������� �����: ' + resp.responseText);
					if(resp.responseText==1)
						SRAX.replaceHtml('mod-id-'+elID,'<a href="#" onclick="ch_get_positon(\''+elID+'\');" >'+newPOS+'</a>');
					else
						SRAX.replaceHtml('mod-id-'+elID,'<img src="images/error.png" alt="" />');
		}});
	}
	</script>
	<form action="index2.php" method="post" name="adminForm">
	<table class="adminheading">
		<tr>
			<th class="modules" rowspan="2">
				<?php echo _MODULES?> <small><small>[ <?php echo $client == 'admin'?_CONTROL_PANEL:_SITE; ?> ]</small></small>
			</th>
			<td width="right"><?php echo $lists['position']; ?></td>
			<td width="right"><?php echo $lists['type']; ?></td>
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
			<th width="20px">#</th>
			<th width="2%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title"><?php echo _MODULE_NAME?></th>
			<th class="jtd_nowrap" width="10%"><?php echo _CMN_PUBLISHED?></th>
			<th colspan="2" align="center" width="5%"><?php echo _CMN_ORDERING?></th>
			<th width="2%"><?php echo _ORDER_DROPDOWN?></th>
			<th width="1%">
				<a href="javascript: saveorder( <?php echo count($rows) - 1; ?> )"><img src="images/filesave.png" width="16" height="16" alt="<?php echo _SAVE_ORDER?>" /></a>
			</th>
<?php
		if(!$client) {
?>
			<th class="jtd_nowrap" width="7%"><?php echo _ACCESS?></th>
<?php
		}
?>
			<th class="jtd_nowrap" width="7%"><?php echo _MODULE_POSITION?></th>
			<th class="jtd_nowrap" width="5%"><?php echo _MODULE_PAGES?></th>
			<th class="jtd_nowrap" width="5%">ID</th>
			<th class="jtd_nowrap" width="10%" align="left"><?php echo _TYPE;?></th>
		</tr>
<?php
		$k = 0;
		for($i = 0,$n = count($rows); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);
			$link		= 'index2.php?option=com_modules&client='.$client.'&task=editA&hidemainmenu=1&id='.$row->id;
			$access		= mosCommonHTML::AccessProcessing($row,$i,1);
			$checked	= mosCommonHTML::CheckedOutProcessing($row,$i);
			$img		= $row->published ? 'publish_g.png' : 'publish_x.png';
?>
		<tr class="<?php echo "row$k"; ?>" id="tr-el-<?php echo $row->id;?>">
			<td align="right"><?php echo $pageNav->rowNumber($i); ?></td>
			<td><?php echo $checked; ?></td>
			<td align="left">
<?php
			if($row->checked_out && ($row->checked_out != $my->id)) {
				echo $row->title;
			} else {
?>
				<a href="<?php echo $link; ?>"><?php echo $row->title; ?></a>
<?php
			}
?>
			</td>
			<td align="center" <?php echo ($row->checked_out && ($row->checked_out != $my->id)) ? null : 'onclick="ch_publ('.$row->id.',\'com_modules\');" class="td-state"';?>>
				<img class="img-mini-state" src="images/<?php echo $img;?>" id="img-pub-<?php echo $row->id;?>" alt="<?php echo _E_PUBLISHING?>" />
			</td>
			<td><?php echo $pageNav->orderUpIcon($i,($row->position == @$rows[$i - 1]->position)); ?></td>
			<td><?php echo $pageNav->orderDownIcon($i,$n,($row->position == @$rows[$i + 1]->position)); ?></td>
			<td align="center" colspan="2">
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="textarea" style="text-align: center" />
			</td>
<?php
			if(!$client) {
?>
			<td id="acc-id-<?php echo $row->id;?>" align="center"><?php echo $access; ?></td>
<?php
			}
?>
			<td id="mod-id-<?php echo $row->id; ?>" align="center">
<?php
			if($row->checked_out && ($row->checked_out != $my->id))
				echo $row->position;
			else
				echo '<a href="#" onclick="ch_get_positon('.$row->id.');" >'.$row->position.'</a>';
?>
			</td>
			<td align="center">
<?php
			if(is_null($row->pages)) {
				echo _CMN_NO;
			} else
				if($row->pages > 0) {
					echo _MODULE_PAGES_SOME;
				} else {
					echo _CMN_ALL;
				}
?>
			</td>
			<td align="center"><?php echo $row->id; ?></td>
			<td align="left"><?php echo $row->module?$row->module:"User"; ?></td>
		</tr>
			<?php
			$k = 1 - $k;
		}
?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="client" value="<?php echo $client; ?>" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}

	/**
	* Writes the edit form for new and existing module
	*
	* A new record is defined when <var>$row</var> is passed with the <var>id</var>
	* property set to 0.
	* @param mosCategory The category object
	* @param array <p>The modules of the left side.  The array elements are in the form
	* <var>$leftorder[<i>order</i>] = <i>label</i></var>
	* where <i>order</i> is the module order from the db table and <i>label</i> is a
	* text label associciated with the order.</p>
	* @param array See notes for leftorder
	* @param array An array of select lists
	* @param object Parameters
	*/
	function editModule(&$row,&$orders2,&$lists,&$params,$option) {
		global $mosConfig_live_site,$mosConfig_cachepath,$my;
		$row->title = htmlspecialchars($row->title);
		$row->titleA = '';
		if($row->id) {
			$row->titleA = '<small><small>[ '.$row->title.' ]</small></small>';
		}
		mosCommonHTML::loadOverlib();
?>
		<script type="text/javascript">
		function ch_apply(){
			SRAX.get('tb-apply').className='tb-load';
			<?php if($row->module == "") {
				getEditorContents('editor1','content');
			} ?>
			dax({
				url: 'ajax.index.php?option=com_mambots&task=apply',
				id:'publ-1',
				method:'post',
				form: 'adminForm',
				callback:
					function(resp){
						log('������� �����: ' + resp.responseText);
						mess_cool(resp.responseText);
						SRAX.get('tb-apply').className='tb-apply';
			}});
		}
		function submitbutton(pressbutton) {
			if ( ( pressbutton == 'save' ) && ( document.adminForm.title.value == "" ) ) {
				alert("<?php echo _PLEASE_ENTER_MODULE_NAME?>");
			} else {
				<?php if($row->module == "") {
				getEditorContents('editor1','content');
				} ?>
			}
			submitform(pressbutton);
		}
		<!--
		var originalOrder = '<?php echo $row->ordering; ?>';
		var originalPos = '<?php echo $row->position; ?>';
		var orders = new Array();	// array in the format [key,value,text]
		<?php $i = 0;
		foreach($orders2 as $k => $items) {
			foreach($items as $v) {
				echo "\n orders[".$i++."] = new Array( \"$k\",\"$v->value\",\"$v->text\" );";
			}
		}
?>
		//-->
		</script>
		<table class="adminheading">
		<tr>
			<th class="modules"><?php echo _MODULE?> -&nbsp;<?php echo $lists['client_id']?_CONTROL_PANEL:_SITE; ?> :
			<small><?php echo $row->id?'��������������':'�����'; ?></small><?php echo $row->titleA; ?></th>
		</tr>
		</table>
		<form action="index2.php" method="post" name="adminForm" id="adminForm">
		<table cellspacing="0" cellpadding="0" width="100%">
		<tr valign="top">
			<td width="60%">
				<table class="adminform">
				<tr>
					<th colspan="2"><?php echo _DETAILS?></th>
				</tr>
				<tr>
					<td width="100" class="key"><?php echo _HEADER_TITLE?>:</td>
					<td>
						<input class="textarea" type="text" name="title" size="35" value="<?php echo $row->title; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" class="key"><?php echo _SHOW_TITLE?>:</td>
					<td><?php echo $lists['showtitle']; ?></td>
				</tr>
				<tr>
					<td valign="top" class="key"><?php echo _MODULE_POSITION?>:</td>
					<td><?php echo $lists['position']; ?></td>
				</tr>
				<tr>
					<td valign="top" class="key"><?php echo _MODULE_ORDER?>:</td>
					<td>
					<script type="text/javascript">
					<!--
					writeDynaList( 'class="inputbox" name="ordering" size="1"', orders, originalPos, originalPos, originalOrder );
					//-->
					</script>
					</td>
				</tr>
				<tr>
					<td valign="top" class="key"><?php echo _CMN_ACCESS?>:</td>
					<td><?php echo $lists['access']; ?></td>
				</tr>
				<tr>
					<td valign="top" class="key"><?php echo _CMN_PUBLISHED?>:</td>
					<td><?php echo $lists['published']; ?></td>
				</tr>
				<tr>
					<td valign="top"  class="key">ID:</td>
					<td><?php echo $row->id; ?></td>
				</tr>
				<tr>
					<td valign="top" class="key"><?php echo _CMN_DESCRIPTION?>:</td>
					<td><?php echo $row->description; ?></td>
				</tr>
				<!--<tr>
					<td valign="top" class="key"><?php //echo _ASSIGN_TO_URL?>:</td>
					<td>
					<?php //echo _ASSIGN_TO_URL_TIP?>
					<textarea name='assign_to_url' style='width:100%' rows='7'><?php //echo $row->assign_to_url?></textarea></td>
				</tr>-->
				</table>
				<table class="adminform">
				<tr>
					<th><?php echo _PARAMETERS?></th>
				</tr>
				<tr>
					<td><?php echo $params->render(); ?></td>
            	</tr>
				</table>
<?php
		if($row->module == "") {
?>
					<table class="adminform">
					<tr>
						<td>
							<table align="center">
<?php
			$visible = 0;
			// check to hide certain paths if not super admin
			if($my->gid == 25) {
				$visible = 1;
			}
			mosHTML::writableCell($mosConfig_cachepath, 0, '<strong>' . _CACHE_DIRECTORY . '</strong> ',$visible);
?>
							</table>
						</td>
					</tr>
					</table>
<?php
		}
?>				
			</td>
			<td width="40%" >
				<table width="100%" class="adminform">
				<tr>
					<th><?php echo _MODULE_PAGE_MENU_ITEMS?></th>
				</tr>
				<tr>
					<td><?php echo _MENU_LINK?>:<br /><?php echo $lists['selections']; ?>
					</td>
				</tr>
				</table>
			</td>
		</tr>
<?php
		if($row->module == "") {
?>
			<tr>
				<td colspan="2">
						<table width="100%" class="adminform">
						<tr>
							<th colspan="2"><?php echo _MODULE_USER_CONTENT?></th>
						</tr>
						<tr>
							<td valign="top" align="left"><?php echo _E_CONTENT?>:</td>
							<td>
<?php
								// parameters : areaname, content, hidden field, width, height, rows, cols
								editorArea('editor1',$row->content,'content','800','400','110','40');
?>
							</td>
						</tr>
						</table>
				</td>
			</tr>
<?php
		}
?>
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="original" value="<?php echo $row->ordering; ?>" />
		<input type="hidden" name="module" value="<?php echo $row->module; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="client_id" value="<?php echo $lists['client_id']; ?>" />
<?php
		if($row->client_id || $lists['client_id']) {
			echo '<input type="hidden" name="client" value="admin" />';
		}
?>
		<input type="hidden" name="<?php echo josSpoofValue(); ?>" value="1" />
		</form>
		<?php
	}

}
?>
