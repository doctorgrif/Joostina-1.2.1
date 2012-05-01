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
* @subpackage Users
*/
class HTML_user {
	function frontpage() {
		?>
<div class="componentheading"><?php echo _WELCOME; ?></div>
<div><?php echo _WELCOME_DESC; ?></div>
		<?php
	}
	function userEdit($row, $option, $submitvalue, &$params) {
		global $mosConfig_absolute_path, $mosConfig_frontend_userparams, $mosConfig_live_site;
		require_once ($mosConfig_absolute_path . '/includes/HTML_toolbar.php');
// used for spoof hardening
		$validate = josSpoofValue();
		mosCommonHTML::loadFullajax();
		$tabs = new mosTabs(1);
		mosCommonHTML::loadOverlib();
		?>
		<script type="text/javascript">
			//<![CDATA[
			function submitbutton( pressbutton ) {
				var form = document.mosUserForm;
				var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
				if (pressbutton == 'cancel') {
					form.task.value = 'cancel';
					form.submit();
					return;
				}
				// do field validation
				if (form.name.value == "") {
					alert("<?php echo addslashes(_REGWARN_NAME); ?>");
				} else if (form.username.value == "") {
					alert("<?php echo addslashes(_REGWARN_UNAME); ?>");
				} else if (r.exec(form.username.value) || form.username.value.length < 3) {
					alert("<?php printf(addslashes(_VALID_AZ09), addslashes(_PROMPT_UNAME), 4); ?>");
				} else if (form.email.value == "") {
					alert("<?php echo addslashes(_REGWARN_MAIL); ?>");
				} else if ((form.password.value != "") && (form.password.value != form.verifyPass.value)){
					alert( "<?php echo addslashes(_REGWARN_VPASS2); ?>" );
				} else if (r.exec(form.password.value)) {
					alert("<?php printf(addslashes(_VALID_AZ09), addslashes(_REGISTER_PASS), 4); ?>");
				} else {
					form.submit();
				}
			}
			function startupload() {
				SRAX.get('userav').src = 'images/aload.gif';
				return true;
			};
			function funishupload(text) {
				log(text);
				if(text!='0'){
					log('<?php echo _USER_OK; ?>');
					log(text);
					SRAX.get('userav').src = text;
				}
				SRAX.get('mosUserForm').action='index.php';
				SRAX.get('mosUserForm').target='';
				SRAX.get('task').value='saveUserEdit';
				SRAX.get('mosUserForm').reset();
				return true;
			};
			function addavatar(){
				SRAX.get('mosUserForm').action='ajax.index.php';
				log(SRAX.get('mosUserForm').action);
				SRAX.get('task').value='uploadavatar';
				SRAX.Uploader('mosUserForm', startupload, funishupload, true);
				return false;
			}
			function delavatar(){
				log('<?php echo _AVATAR_DELETING; ?>');
				SRAX.get('userav').src = 'images/aload.gif';
				dax({
					url: 'ajax.index.php?option=com_user&utf=0&task=delavatar',
					callback:
						function(resp, idTread, status, ops){
						log('<?php echo _USER_ANSWER; ?> ' + resp.responseText);
						SRAX.get('userav').src = resp.responseText;
					}});
			}
			//]]>
		</script>
<form action="<?php echo sefRelToAbs('index.php'); ?>" method="post" name="mosUserForm" id="mosUserForm" enctype="multipart/form-data">
	<div style="float:right;height:100%;">
				<?php
				mosToolBar::save();
				mosToolBar::cancel();
				?>
	</div>
	<div class="componentheading"><?php echo _EDIT_TITLE; ?></div>
			<?php
			$tabs->startPane('userInfo');
			$tabs->startTab('Общее', 'main-page');
			?>
		<div id="table_userprofile">
			<div id="user_avatar">
				<div>
					<figure>
						<img id="userav" src="<?php echo $mosConfig_live_site . mosUser::avatar($row->id, 'big'); ?>" alt="" />
					</figure>
				</div>
				<div id="fileavatar">
					<p>
						<label for="fileavatar"><?php echo _NEW_AVATAR_UPLOAD; ?></label><br />
						<input class="text-input" type="file" name="avatar" id="fileavatar" />
					</p>
				</div>
				<div>
					<p>
						<input type="submit" name="send" value="<?php echo _TASK_UPLOAD; ?>" class="button" onclick="addavatar(); return false;" /> <input type="submit" class="button" name="send" value="<?php echo _CMN_DELETE; ?>" class="button" onclick="delavatar(); return false;" />
					</p>
				</div>
			</div>
			<div id="user_info">
				<div>
					<p>
						<label for="username1"><?php echo _UNAME; ?></label><br />
						<input class="text-input" type="text" name="username" id="username1" value="<?php echo $row->username; ?>" size="40" placeholder="<?php echo $row->username; ?>" />
					</p>
				</div>
				<div>
					<p>
						<label for="name"><?php echo _YOUR_NAME; ?></label><br />
						<input class="text-input" type="text" name="name" id="name" value="<?php echo $row->name; ?>" size="40" placeholder="<?php echo $row->name; ?>" />
					</p>
				</div>
				<div>
					<p>
						<label for="email"><?php echo _EMAIL; ?></label><br />
						<input class="text-input" type="email" name="email" id="email" value="<?php echo $row->email; ?>" size="40" placeholder="<?php echo $row->email; ?>" />
					</p>
				</div>
				<div>
					<p>
						<label for="password"><?php echo _PASS; ?></label><br />
						<input class="text-input" type="password" name="password" id="password" value="" size="40" placeholder="<?php echo _PASS_PH; ?>" />
					</p>
				</div>
				<div>
					<p>
						<label for="verifyPass"><?php echo _VPASS; ?></label><br />
						<input class="text-input" type="password" name="verifyPass" id="verifyPass" size="40" placeholder="<?php echo _VPASS_PH; ?>" />
					</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php
			$tabs->endTab();
			if ($mosConfig_frontend_userparams == '1' || $mosConfig_frontend_userparams == 1 || $mosConfig_frontend_userparams == null) {
				$tabs->startTab('Дополнительно', 'ext-page');
		?>
		<div>
			<?php echo $params->render('params'); ?>
		</div>
		<?php } $tabs->endTab(); ?>
	<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" id="task" value="saveUserEdit" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
		<?php
		$tabs->endPane();
	}
	function confirmation() {
		?>
<div class="componentheading"><?php echo _SUBMIT_SUCCESS; ?></div>
<div><?php echo _SUBMIT_SUCCESS_DESC; ?></div>
		<?php
	}
}
?>