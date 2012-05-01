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
$mainframe->SetPageTitle('<?php echo _MG_KEYEXTR;?>');
$chars=array('Ч','У','"',',','.','-','?','Х',',','.',':','!','@','#','$','%','^','&','*','(',')','_','-','1','2','3','4','5','6','7','8','9','0','.',';','{','}','[',']','|','/','<','>','+','=');
$result = '';
if ($_POST['exclude'] == '') {
	$compare = '';
	$fp = fopen('components/com_jmn/words.txt', 'r');
	while (!feof($fp))
		$compare.=fread($fp, 1024);
	fclose($fp);
	$exclude = $compare;
} else {
	$compare = $_POST['exclude'];
	$exclude = $compare;
}
if (isset($_POST[submit])) {
	if ($_POST['nsep'] == 'br')
		$nsep = "\n";
	else
		$nsep=$_POST['nsep'];
	$content = '';
	if ($_POST[type] == 'url') {
		$fp = fopen($_POST[url], 'r');
		while (!feof($fp))
			$content.=fread($fp, 1024);
		fclose($fp);
	} else {
		$content = $_POST[text];
	}
	$content = str_replace(array('\t', '>', '<'), array(' ', '> ', ' <'), strtolower($content));
	$compare = explode("\r\n", strtolower($compare));
	$content.="\r\n";
	$content = strip_tags(stripslashes(strtolower($content)));
	$content = str_replace(array('&nbsp;'), array(' '), $content);
	$content = str_replace(array("\n", '-'), array(' ', ' '), $content);
	for ($s = 0; $s < sizeof($chars); $s++) {
		$content = str_replace($chars[$s], " ", $content);
	}
	$content = html_entity_decode($content);
	$content = str_replace(array("\t"), array(' '), $content);
	$contents = explode(' ', $content);
	$results = array('', '');
	$i = 0;
	foreach ($contents as $key => $value) {
		$value = trim($value, "\x00..\x1F");
		$value = str_replace(array("\r"), array(' '), $value);
		$value = str_replace(array("\n"), array(' '), $value);
		if (!in_array($value, $compare))
			if (strlen($value) > 1)
				if (!in_array(array(trim($value), strlen(trim($value))), $results))
					if (trim($value) != '') {
						$results[$i][0] = trim($value);
						$results[$i][1] = strlen(trim($value));
						++$i;
					}
	}
	foreach ($results as $res)
		$sortAux[] = $res['1'];
	if ($_POST[nsort] == 'SORT_DESC')
		$tp = SORT_DESC;
	elseif ($_POST[nsort] == 'SORT_ASC')
		$tp = SORT_ASC;
	array_multisort($sortAux, $tp, $results);
	$result = "";
	for ($j = 0; $j <= $i; $j++) {
		if ($j > $_POST[nlist])
			break;
		if ($results[$j][0] != '') {
			$result.=$results[$j][0] . $nsep . ' ';
		}
	}
}
if ($_POST[type] == '')
	$_POST[type] = 'url';
?>
<table width="100%">
	<tr>
		<td class="contentheading"><?php echo _MG_KEYEXTR; ?></td>
	</tr>
</table>
<form action="<?= $_SERVER['REQUEST_URI'] ?>#results" method="POST">
	<table class="contenttable" width="100%" cellspacing="10" >
		<tr>
			<td width="150px" valign="top" align="left">
				<input type="radio" name="type" id="enrerurl" value="url"<? if ($_POST[type] == 'url') echo 'checked'; ?> />
				<label for="enrerurl"><?php echo _MG_ENTERURL; ?>:</label>
			</td>
			<td align="left"><input type="text" size="40" name="url" value="<?= $_POST[url] ?>"></td>
		</tr>
		<tr>
			<td width="150" valign="top" align="left">
				<input type="radio" name="type" id="enrertxt" value="text" <? if ($_POST[type] == 'text') echo 'checked'; ?> />
				<label for="enrertxt"><?php echo _MG_ENTERTXT; ?>:</label>
			</td>
			<td align="left">
				<textarea cols="30"rows="10" name="text"><?= stripslashes($_POST[text]) ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="150" valign="top" align="left">
				<strong><?php echo _MG_LIMITRES; ?>:</strong>
			</td>
			<td align="left"><select name="nlist">
<?
if ($_POST['nlist'])
	echo '<option value="' . $_POST[nlist] . '">' . $_POST[nlist] _MG_W . '</option>'; //?
?>
					<option value="10"><?php echo _MG_10W; ?></option>
					<option value="25"><?php echo _MG_25W; ?></option>
					<option value="50"><?php echo _MG_50W; ?></option>
					<option value="100"><?php echo _MG_100W; ?></option>
					<option value="200"><?php echo _MG_200W; ?></option>
					<option value="500"><?php echo _MG_500W; ?></option>
					<option value="1000000"><?php echo _MG_UNLIM; ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="150" valign="top" align="left">
				<strong><?php echo _MG_DELRES; ?>:</strong>
			</td>
			<td align="left">
				<select name="nsep">
					<option value="," <? if ($_POST['nsep'] == ',') echo 'selected'; ?> ><?php echo _MG_COMMA; ?></option>
					<option value="br" <? if ($_POST['nsep'] == 'br') echo 'selected'; ?> ><?php echo _MG_BREAK; ?></option>
					<option value=" " <? if ($_POST['nsep'] == ' ') echo 'selected'; ?> ><?php echo _MG_SPACE; ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="150" valign="top" align="left">
				<strong><?php echo _MG_ORDRES; ?>:</strong>
			</td>
			<td align="left">
				<select name="nsort">
					<option value="SORT_DESC" <? if ($_POST['nsort'] == 'SORT_DESC') echo 'selected'; ?> ><?php echo _MG_SHORTFST; ?></option>
					<option value="SORT_ASC" <? if ($_POST['nsort'] == 'SORT_ASC') echo 'selected'; ?> ><?php echo _MG_LONDFST; ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="150" valign="top" align="left">
				<strong><?php echo _MG_WEXCL; ?>:</strong><br />
				<?php echo _MG_MOSTEXCLS; ?>
			</td>
			<td align="left">
				<textarea name="exclude" cols="30"rows="6"><?= stripslashes($exclude) ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="left"></td>
			<td align="left">
				<input type="submit" name="submit" value="<?php echo _MG_GENKWORDS; ?>" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="left">
				<br />
				<h3><?php echo _MG_KWORDS; ?><br />
					<a name="results">
					<textarea name="result" cols="30" rows="7"><?= $result ?></textarea>
					</a>
				</h3>
			</td>
		</tr>
	</table>
</form>