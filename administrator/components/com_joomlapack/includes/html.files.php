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

global $JPConfiguration,$option;

$subtask	= mosGetParam($_REQUEST,'subtask','main');
$filename	= mosGetParam($_REQUEST,'filename','');

switch($subtask) {
	// �������� �����
	case 'deletefile':
		if(unlink($filename))
			echo '<div class="message">'.$filename.' '._JWMM_FILE_DELETED.'</div>';
		else
			echo '<div class="jwarning"> '.$filename.' '._JWMM_FILE_NOT_DELETED.'</div>';
		JP_BUFA_Main();
		break;
	case 'downloadfile':
		ob_end_clean();
		$filename = stripslashes($filename);
		if(file_exists($filename)) {
			header('Content-type: application/x-compressed');
			header('Content-Disposition: attachment; filename="'.basename($filename).'"');
			readfile($filename);
		}
		break;
	case 'main':
	default:
		JP_BUFA_Main();
		break;
}


function JP_BUFA_Main() {
	global $option;
?>
	<script>
		function postTaskForm( myTask, myFile ) {
			document.JPadminForm.subtask.value=myTask;
			document.JPadminForm.filename.value=myFile;
			try {
				document.JPadminForm.onsubmit();
				}
			catch(e){}
			document.JPadminForm.submit();
		}
	</script>
	<form name="JPadminForm" id="JPadminForm" action="index2.php" method="get">
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="no_html" id="no_html" value="1" />
		<input type="hidden" name="subtask" value="" />
		<input type="hidden" name="filename" value="" />
	</form>
	<table class="adminlist">
		<tr>
			<th width="90%" class="title"><?php echo _FILE_NAME;?></th>
			<th width="5%" align="right"><?php echo _JP_DOWNLOAD_FILE;?></th>
			<th width="5%" align="right"><?php echo _CMN_DELETE;?></th>
		</tr>
<?php
	JP_GetFileList();
?>
	</table>
<?php
}

// ��������� ������ ��������� �����
function JP_GetFileList() {
	global $JPConfiguration;

	require_once 'engine.abstraction.php';
	$FS = new CFSAbstraction();

	$files1 = $FS->getDirContents($JPConfiguration->OutputDirectory,'*.zip');
	$files2 = $FS->getDirContents($JPConfiguration->OutputDirectory,'*.tar.gz');
	$files3 = $FS->getDirContents($JPConfiguration->OutputDirectory,'*.sql');

	$allFilesAndDirs = _selectiveMergeArrays($files1,$files2);
	$allFilesAndDirs = _selectiveMergeArrays($allFilesAndDirs,$files3);
	if($allFilesAndDirs === false) return false;
	$k = 0;
	if(count($allFilesAndDirs)>0){
		foreach($allFilesAndDirs as $fileDef) {
			$fileName = $fileDef['name'];
			switch($fileDef['type']) {
				case 'file':
					$createdTime	= date('Y-m-d H:i:s',filemtime($fileName));
					$ico = 'compress.png';
					if(strpos ($fileName,"sql")) $ico = 'database.png';
					$fileSizeKb		= round($fileDef['size'] / 1024,2);
					$onlyName		= str_replace($JPConfiguration->OutputDirectory.'/',"",$fileName);
					$linkDownload	= "javascript:postTaskForm('downloadfile', '".addslashes($fileName)."');";
					$linkDelete		= "javascript:if (confirm('"._JP_REALLY_DELETE_FILE."')){ SRAX.get('no_html').value = 0; postTaskForm('deletefile', '".addslashes($fileName)."'); }";
?>
				<tr class="row<?php echo $k;?>">
					<td width="90%" align="left"><img src="images/ico/<?php echo $ico; ?>" border="0"><?php echo $onlyName.'<br />'._JP_FILE_CREATION_DATE.': <b>'.$createdTime.'</b>, '._JWMM_FILESIZE.': <b>'.$fileSizeKb; ?> <?php echo _JWMM_KBYTES;?></b></td>
					<td width="5%" align="center">
						<img src="images/ico/down.png" border="0">&nbsp;&nbsp;<a href="<?php echo $linkDownload; ?>"><?php echo _JP_DOWNLOAD_FILE;?></a></td>
					<td width="5%" align="center">
						<img src="images/publish_x.png" border="0">&nbsp;&nbsp;<a href="<?php echo $linkDelete; ?>"><?php echo _CMN_DELETE;?></a>
					</td>
				</tr>
<?php
					break;
				default:
					break;
			}
			$k = 1 - $k;
		}
	}else{
?>
			<tr>
				<td colspan="3"><?php echo _JP_NO_BACKUPS;?></td>
			</tr>
<?php
	}
}

function _selectiveMergeArrays($files1,$files2) {
	if(is_array($files1)) {
		if(is_array($files2)) {
			return array_merge($files1,$files2);
		} else {
			return $files1;
		}
	} else {
		if(is_array($files2)) {
			return $files2;
		} else {
			return false;
		}
	}
}
?>
