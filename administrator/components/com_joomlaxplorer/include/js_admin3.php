<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
* @package joomlaXplorer
* @copyright soeren 2007
* @author The joomlaXplorer project (http://joomlacode.org/gf/project/joomlaxplorer/)
* @author The  The QuiX project (http://quixplorer.sourceforge.net)
**/
defined('_VALID_MOS') or die();
?>
<script language="JavaScript1.2" type="text/javascript">
<!--
	function check_pwd() {
		if(document.edituser.user.value=="" || document.edituser.home_dir.value=="") {
			alert("<?php echo $GLOBALS["error_msg"]["miscfieldmissed"]; ?>");
			return false;
		}
		if(document.edituser.chpass.checked &&
			document.edituser.pass1.value!=document.edituser.pass2.value)
		{
			alert("<?php echo $GLOBALS["error_msg"]["miscnopassmatch"]; ?>");
			return false;
		}
		return true;
	}
// -->
</script>
