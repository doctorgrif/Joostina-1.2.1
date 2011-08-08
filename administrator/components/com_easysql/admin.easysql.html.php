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


////////////////////////////////////////////////////////////////
// Execute sql query and display grid
////////////////////////////////////////////////////////////////
function ExecSQL($task = 'execsql') {
	global $database,$mosConfig_db;

	$nDisplayRecords	= intval(mosGetParam($_POST,'easysql_records',10));

	if($task == 'execsql') {
		$cCurrentTable	= mosGetParam($_POST,'easysql_table','');
		$cCurrentSQL	= mosGetParam($_POST,'easysql_query',mosGetParam($_GET,'prm2',''));
		$cCurrentSQL	= stripslashes($cCurrentSQL);
	} else {
		$cCurrentTable	= base64_decode(mosGetParam($_POST,'easysql_table',''));
		$cCurrentSQL	= base64_decode(mosGetParam($_POST,'easysql_query',mosGetParam($_GET,'prm2','')));
		$cCurrentSQL	= stripslashes($cCurrentSQL);
	}

	// Get table list
	$database->setQuery('SHOW TABLES');
	$tables = $database->loadAssocList();

	if(!empty($tables)) {
		$key = 'Tables_in_'.$mosConfig_db;
		$htmTablesList = '';
		foreach($tables as $val) {
			if($val[$key] == $cCurrentTable)
				$_sel = 'selected';
			else
				$_sel = '';
			$htmTablesList .= '<option '.$_sel.' value="'.$val[$key].'">'.$val[$key].'</option>';
		}
	}

	if(!empty($cCurrentSQL)) {
		$database->setQuery($cCurrentSQL);
		$rows = $database->loadAssocList();
		if(!empty($rows)) {
			$aTableHeader = array();
			foreach($rows[0] as $key => $val) {
				$aTableHeader[] = $key;
			}
		}
	} else{
		$rows = array();
	};
	$htmTableData = '';
	if(!empty($cCurrentSQL)) {
			if(trim($cCurrentSQL) != '') $htmTableData .= record_html($cCurrentSQL);
	}

?>
	<script type="text/javascript">
	<!--
	function changeQuery() {
		limit = 'LIMIT ' + SRAX.get('easysql_records').value;
		sel = SRAX.get('easysql_sel').value;
		//alert(sel);
		//return;
		if (sel!='SELECT* FROM ') limit='';
			table = '';
		if (sel=='SELECT* FROM ' ||
			sel=='SHOW KEYS FROM ' ||
			sel=='SHOW FIELDS FROM ' ||
			sel=='REPAIR TABLE ' ||
			sel=='OPTIMIZE TABLE ' ||
			sel=='CHECK TABLE ' ||
			sel=='SHOW FULL COLUMNS FROM ' ||
			sel=='SHOW INDEX FROM ' ||
			sel=='SHOW TABLE STATUS ' ||
			sel=='SHOW CREATE TABLE ' ||
			sel=='ANALYZE TABLE ')
			table= SRAX.get('easysql_table').value+' '+limit;
			SRAX.get('easysql_query').value=sel+table;
	}
	//-->
	</script>
	<table class="adminheading">
		<tbody>
			<tr>
				<th class="db" colspan="3"><?php echo _SQL_CONSOL;?></th>
			</tr>
		</tbody>
	</table>
	<form id="adminForm" action="index2.php?option=com_easysql" method="post" name="adminForm">
	<table width="100%"">
	<tr>
		<td>
			<?php echo _SQL_COMMAND;?>
			<select id="easysql_sel" class="textarea" name="easysql_sel" onchange="changeQuery();">
				<option value="SELECT* FROM ">SELECT*</option>
				<option value="SHOW DATABASES ">SHOW DATABASES~</option>
				<option value="SHOW TABLES ">SHOW TABLES~</option>
				<option value="SHOW FULL COLUMNS FROM ">SHOW COLUMNS</option>
				<option value="SHOW INDEX FROM ">SHOW INDEX</option>
				<option value="SHOW TABLE STATUS ">SHOW TABLE STATUS~</option>
				<option value="SHOW STATUS ">SHOW STATUS~</option>
				<option value="SHOW VARIABLES ">SHOW VARIABLES</option>
				<option value="SHOW FULL PROCESSLIST ">SHOW PROCESSLIST</option>
				<option value="SHOW GRANTS FOR ">SHOW GRANTS FOR username</option>
				<option value="SHOW CREATE TABLE ">SHOW CREATE TABLE</option>
				<option value="SHOW MASTER STATUS ">SHOW MASTER STATUS</option>
				<option value="SHOW MASTER LOGS ">SHOW MASTER LOGS</option>
				<option value="SHOW SLAVE STATUS ">SHOW SLAVE STATUS</option>
				<option value="SHOW KEYS FROM ">SHOW KEYS</option>
				<option value="SHOW FIELDS FROM ">SHOW FIELDS</option>
				<option value="REPAIR TABLE ">REPAIR TABLE</option>
				<option value="OPTIMIZE TABLE ">OPTIMIZE TABLE</option>
				<option value="CHECK TABLE ">CHECK TABLE</option>
				<option value="ANALYZE TABLE ">ANALYZE TABLE</option>
			</select> &nbsp; &nbsp; <?php echo _SQL_TABLE;?>
			<select class="textarea" id="easysql_table" name="easysql_table" onchange="changeQuery();">
			<?php echo $htmTablesList; ?>
			</select> &nbsp; &nbsp; <?php echo _SQL_ROWS_ENTER;?>
			<input class="textarea" type="text" id="easysql_records" name="easysql_records" value="<?php echo $nDisplayRecords; ?>" size="5" onchange="changeQuery()" />&nbsp;&nbsp;&nbsp;
			<input class="button" type="button" value="<?php echo _SQL_MAKE;?>" onclick="changeQuery()" name="crsql" />
		</td>
	</tr>
	<tr>
		<td>
			<textarea cols="" rows="" class="textarea" id="easysql_query" name="easysql_query" style="width:100%;height:150px;"><?php echo $cCurrentSQL; ?></textarea>
			<input type="hidden" name="task" value="" />
		</td>
	</tr>
	<tr>
		<td class="c_sql"><?php echo (strlen(trim($cCurrentSQL)) > 100) ? substr($cCurrentSQL,0,100).'...':$cCurrentSQL; ?></td>
	</tr>
	</table>
	</form>
<?php
	echo $htmTableData;
}


////////////////////////////////////////////////////////////////
// Make grid table from result query
////////////////////////////////////////////////////////////////
function is_table($table) {
	global $database;
	$tables = $database->getTableList();
	$table = str_replace("#__",$database->_table_prefix,$table);
	return (strpos(implode(";",$tables),$table) > 0);
}


function record_html($query) {
	global $database;
	// exec query
	$database->setQuery($query);
	$rows = $database->loadAssocList();
	$table = TableFromSQL($query); // get table name from query string
	$_sel = (substr(strtolower($query),0,6) == 'select');
	// If return rows then display table
	if(!empty($rows)) {
		// Begin form and table
		$body = '<div style="overflow:auto;"><table class="adminlist">';
		$body .= "<thead><tr>\n";
		// Display table header
		if($_sel) $body .= '<th width="25">'._MANAGEMENT.'</th>';
		$k_arr = $rows[0];
		$f = 1;
		$key = '';
		foreach($k_arr as $var => $val) {
			if($f) {
				$key = $var;
				$f = 0;
			}
			if(ereg("[a-zA-Z]+",$var,$array)) $body .= '<th>'.$var."</th>\n";
		}
		$body .= "</tr></thead>\n";
		// Get unique field of table
		$uniq_fld	= (is_table($table)) ? GetUniqFld($table):'';
		$key		= empty($uniq_fld) ? $key:$uniq_fld;
		// Display table rows
		$k = 0;
		$i = 0;
		foreach($rows as $row) {
			$body .= '<tbody><tr valign=top class="row'.$k.'">';
			if($_sel) $body .= '<td align=center nowrap>
				<a href="index2.php?option=com_easysql&task=edit&hidemainmenu=1&prm1='
				.base64_encode($table)
				.'&key='.$key.'&id='.$row[$key].'&prm2='
				.base64_encode($query)
				.'"><img border=0 src="../images/M_images/edit.png" alt="'._E_EDIT.'" /></a>&nbsp;
				<a href="index2.php?option=com_easysql&task=delete&prm1='
				.base64_encode($table)
				.'&key='.$key.'&id='.$row[$key].'&prm2='
				.base64_encode($query)
				.'"><img border=0 src="images/publish_x.png" alt="'._CMN_DELETE.'" /></a></td>';
			foreach($row as $var => $val) {
				if(ereg("[a-zA-Z]+",$var,$array)) $body .= '<td>&nbsp;'.prepare(substr($val,0,50))."</td>\n";
			}
			$body .= "</tbody></tr>\n";
			$k = 1 - $k;
			$i++;
		}
		// End table and form
		$body .= '</table><br /></div>';
		$body .= '<input type="hidden" name="key" value="'.$key.'" />';
	} else {
		// Display DB errors
		$body = '<small class="red">'.$database->_errorMsg.'</small><br />';
	}
	return $body.'<br />';
}

// ���������� ������ � �����������
function prepare( $text ) {
	$text = preg_replace( "'<script[^>]*>.*?</script>'si", '', $text ); // ������� �������
	$text = preg_replace( '/{.+?}/', '', $text); // ������� �����������
	$text = preg_replace( "'<(br[^/>]*?/|hr[^/>]*?/|/(div|h[1-6]|li|p|td))>'si", ' ', $text ); // ������ ������ ����
	$text = preg_replace("/<img.+?>/", "", $text);
	$text = strip_tags($text); // ������ ��� ���������� ����
	return $text;
}

////////////////////////////////////////////////////////////////
// Get unique field of table
////////////////////////////////////////////////////////////////
function GetUniqFld($table) {
	global $database;

	$database->setQuery('SHOW KEYS FROM '.$table);
	$indexes = $database->loadAssocList();

	$uniq_fld = '';
	if(!empty($indexes))
		foreach($indexes as $index)
			if($index['Non_unique'] == 0) {
				$uniq_fld = $index['Column_name'];
				break;
			}
	return $uniq_fld;
}


////////////////////////////////////////////////////////////////
// Get table name from query
////////////////////////////////////////////////////////////////
function TableFromSQL($sql) {
	$in = strpos(strtolower($sql),'from ') + 5;
	$end = strpos($sql,' ',$in);
	$end = empty($end)?strlen($sql):$end; // If table name in query end
	return substr($sql,$in,$end - $in);
}

////////////////////////////////////////////////////////////////
// Display page for editing record of grid
////////////////////////////////////////////////////////////////
function EditRecord($task,$table,$id) {
	global $database;
	$sql = base64_decode(mosGetParam($_GET,'prm2',null));
	$key = mosGetParam($_GET,'key',mosGetParam($_POST,'key',null));
	if($task == 'edit') {
		$get_fld_value = '$value = $rows[$id][$field];';
	} else {
		$table = mosGetParam($_POST,'easysql_table',null);
		$sql = mosGetParam($_POST,'easysql_query',null);
		$get_fld_value = '$value = "";';
	}
	if(!is_null($sql) && !is_null($key) && !is_null($task)) {
		$fields = $database->getTableFields(array($table));
		$database->setQuery($sql);
		$rows = $database->loadAssocList();
		$last_key_vol = $rows[count($rows) - 1][$key];
		if($task == 'edit') {
			foreach($rows as $row) $rows[$row[$key]] = $row;
		} else {
			$rows[0] = array();
		}
?>
<form id="adminForm" action="index2.php?option=com_easysql" method="post" name="adminForm">
	<table class="adminheading" >
		<tr>
			<th class="db">
				<?php echo "$table [ $key = $id ]"; ?>:<small><?php echo _O_EDITING?></small>
			</th>
		</tr>
		</table>
		<table class="adminlist">
		<tr>
			<th colspan="2"><?php echo _FIELDS?></th>
		</tr>
<?php $k = 0;
		foreach($fields[$table] as $field => $type) { ?>
		<tr valign="top" class="row<?php echo $k; ?>">
			<td width="20%" class="key"><?php echo $field; ?>: <?php echo $key == $field ? "PK" : ""; ?></td>
			<td width="80%">
<?php
			if(($key == $field) && ($task == 'edit')) {
				echo $id.GetHtmlForType($field,'hidden',$id).' [ '.$type.' ]';
			} else {
				if(($key == $field) && ($task == 'new'))
					if(is_numeric($last_key_vol))
						$value = $last_key_vol + 1;
					else
						$value = $last_key_vol.'_1';
				else eval($get_fld_value);
				echo GetHtmlForType($field,$type,$value).' [ '.$type.' ]';
			}
?>
			</td>
		</tr>
		<?php $k = 1 - $k;
		} ?>
	</table>
	<input type="hidden" name="task" value="">
	<input type="hidden" name="key" value="<?php echo $key; ?>">
	<input type="hidden" name="easysql_table" value="<?php echo base64_encode($table); ?>">
	<input type="hidden" name="easysql_query" value="<?php echo base64_encode($sql); ?>">
</form>
<?php
	}
}
////////////////////////////////////////////////////////////////
// Save record
////////////////////////////////////////////////////////////////
function SaveRecord() {
	global $database;
	$table = base64_decode(mosGetParam($_POST,'easysql_table',null));
	$key = mosGetParam($_POST,'key',null);
	$sql = base64_decode(mosGetParam($_POST,'easysql_query',null));
	$fields = mosGetParam($_POST,'field',null);
	if((!is_null($table)) && !is_null($sql) && !is_null($fields)) {
		$sql_save = "UPDATE $table SET ";
		$i = 0;
		$comma = ', ';
		$cnt = count($fields);
		foreach($fields as $name => $val) {
			$i++;
			if($cnt <= $i) $comma = '';
			$sql_save .= "`$name`='".htmlspecialchars($val,ENT_QUOTES)."'".$comma;
		}
		$sql_save .= " WHERE $key='".$fields[$key]."'";
	}
	$database->setQuery($sql_save);
	//$database->loadResult();
	if(!$database->query()) {
		echo '<small class="red">'.$database->getErrorMsg().'</small><br />';
		return false;
	} else {
		return true;
	}
}

////////////////////////////////////////////////////////////////
// Delete record
////////////////////////////////////////////////////////////////
function DeleteRecord($table,$id) {
	global $database;
	$task = mosGetParam($_GET,'task',null);
	$sql = base64_decode(mosGetParam($_GET,'prm2',null));
	$key = mosGetParam($_GET,'key',null);
	if(!is_null($sql) && !is_null($key) && !is_null($task)) {
		$database->setQuery("DELETE FROM $table WHERE $key = '$id'");
		@$database->loadResult();
		if(!empty($database->_errorMsg)) {
			echo '<small class="red">'.$database->_errorMsg.'</small><br />';
			break;
			return false;
		} else {
			return true;
		}
	}
}

////////////////////////////////////////////////////////////////
// Get html field for table type
////////////////////////////////////////////////////////////////
function GetHtmlForType($name,$type,$value) {
	$type = trim(eregi_replace('unsigned','',$type));
	switch(strtolower($type)) {
			//text
		case 'hidden':
			$ret = '<input type="hidden" name="field['.$name.']" value="'.$value.'" />';
			break;
		case 'disabled':
			$ret = '<input disabled type="text" name="field['.$name.']" value="'.$value.'" />';
			break;
		case 'char':
		case 'nchar':
			$ret = '<input type="text" name="field['.$name.']"  style="width:7%;" value="'.$value.'" />';
			break;
		case 'varchar':
		case 'nvarchar':
			$ret = '<input type="text" name="field['.$name.']" style="width:40%;" value="'.$value.'" />';
			break;
		case 'tinyblob':
		case 'tinytext':
		case 'blob':
		case 'text':
			$ret = '<textarea name="field['.$name.']" style="width:70%;">'.$value.'</textarea>';
			break;
		case 'mediumblob':
		case 'mediumtext':
		case 'longblob':
		case 'longtext':
			$ret = '<textarea name="field['.$name.']" style="width:70%;height:150px;">'.$value.'</textarea>';
			break;
			//int
		case 'bit':
		case 'bool':
			$ret = '<input type="checkbox" name="field['.$name.']">';
			break;
		case 'tinyint':
		case 'smallint':
		case 'mediumint':
		case 'integer':
		case 'int':
		case 'bigint':
		case 'datetime':
		case 'time':
			$ret = '<input type="text" name="field['.$name.']" style="width:15%;" value="'.$value.'" />';
			break;
			//real
		case 'real':
		case 'float':
		case 'decimal':
		case 'numeric':
		case 'double':
		case 'double precesion':
			$ret = '<input type="text" name="field['.$name.']" style="width:15%;" value="'.$value.'" />';
			break;
		default:
			return false;
	}
	return $ret;
}
?>
