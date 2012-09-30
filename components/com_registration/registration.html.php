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
class HTML_registration {
	/** Display LostPass Form */
	function lostPassForm($option) {
		global $mosConfig_captcha_reg, $mosConfig_live_site;
// used for spoof hardening
		$validate = josSpoofValue();
		?>
<div id="lost-password">
	<form action="<?php echo sefRelToAbs('index.php'); ?>" method="post" name="mosForm" target="_top" class="form" id="mosForm">
		<fieldset>
			<div class="componentheading"><?php echo _PROMPT_PASSWORD; ?></div>
			<div class="regrequired"><?php echo _NEW_PASS_DESC; ?></div>
			<div class="regrequired"><?php echo _REGISTER_REQUIRED; ?></div>
			<div id="checkUName">
				<label for="checkUName"><span class="red">*</span><?php echo _PROMPT_UNAME; ?></label>
				<div>
					<input type="text" name="checkusername" class="inputbox" id="checkUName" size="40" maxlength="25" />
				</div>
			</div>
			<div id="confirmEmail">
				<label for="confirmEmail"><span class="red">*</span><?php echo _PROMPT_EMAIL; ?></label>
				<div>
					<input type="text" name="confirmEmail" class="inputbox" id="confirmEmail" size="40" />
				</div>
			</div>
			<?php if ($mosConfig_captcha_reg) { session_start(); ?>
			<div id="captchatext">
				<label for="captchatext"><?php echo _REG_CAPTCHA_REF; ?></label>
				<div>
					<img id="captchaimg" alt="<?php echo _REG_CAPTCHA_REF; ?>" onclick="document.mosForm.captchaimg.src='<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?'+new String(Math.random())" src="<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?<?php echo session_id() ?>" />
				</div>
				<div>
					<input name="captcha" type="text" id="captchatext" class="inputbox" size="51" placeholder="<?php echo _PLEASE_ENTER_CAPTCHA_PH; ?>" />
				</div>
			</div>
			<?php }; ?>
			<input type="submit" id="button" value="<?php echo _BUTTON_SEND_PASS; ?>" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			<input type="hidden" name="task" value="sendNewPass" /> 
			<input type="hidden" name="<?php echo $validate; ?>" value="1" />
		</fieldset>
	</form>
</div>
		<?php
	}
	/** Display Register Form */
	function registerForm($option, $useractivation) {
		global $mosConfig_live_site, $mosConfig_captcha_reg;
// used for spoof hardening
		$validate = josSpoofValue();
		?>
<div id="registration">
<script type="text/javascript">
	//<![CDATA[
	function submitbutton_reg() {
		var form = document.mosForm;
		var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
		// do field validation
			if (form.name.value == "") {
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_NAME)); ?>");
			} else if (form.username.value == "") {
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_UNAME)); ?>");
			} else if (r.exec(form.username.value) || form.username.value.length < 3) {
				alert("<?php printf(addslashes(html_entity_decode(_VALID_AZ09_USER)), addslashes(html_entity_decode(_PROMPT_UNAME)), 2); ?>" );
			} else if (form.email.value == "") {
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_MAIL)); ?>");
			} else if (form.password.value.length < 6) {
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_PASS)); ?>");
			} else if (form.password2.value == "") {
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_VPASS1)); ?>");
			} else if ((form.password.value != "") && (form.password.value != form.password2.value)){
				alert("<?php echo addslashes(html_entity_decode(_REGWARN_VPASS2)); ?>");
			} else if (r.exec(form.password.value)) {
				alert("<?php printf(addslashes(html_entity_decode(_VALID_AZ09)), addslashes(html_entity_decode(_REGISTER_PASS)), 6); ?>");
			}
		<?php if ($mosConfig_captcha_reg) { ?>
			else if (form.captcha.value == "") {
				alert("<?php echo addslashes(html_entity_decode(_REG_CAPTCHA_VAL)); ?>");
			}
		<?php }; ?>
			else {
				form.submit();
		}
		}
		//]]>
	</script>
	<form action="<?php echo sefRelToAbs('index.php'); ?>" method="post" name="mosForm" target="_top" class="form" id="mosForm" autocomplete="on">
		<fieldset>
			<div class="componentheading"><?php echo _REGISTER_TITLE; ?></div>
			<div class="regrequired"><?php echo _REGISTER_REQUIRED; ?></div>
			<div id="regname">
				<label for="regname" data-icon="u"><span class="red">*</span><?php echo _REGISTER_NAME; ?></label>
				<div>
					<input class="text-input" name="name" value="" id="regname" required="required" class="inputbox" placeholder="<?php echo _REGISTER_NAME_PH; ?>" />
				</div>
			</div>
			<div id="reguname">
				<label for="reguname" data-icon="u"><span class="red">*</span><?php echo _REGISTER_UNAME; ?></label>
				<div>
					<input class="text-input" name="username" value="" id="reguname" required="required" class="inputbox" placeholder="<?php echo _REGISTER_UNAME_PH; ?>" />
				</div>
			</div>
			<div id="regemail">
				<label for="regemail" data-icon="e"><span class="red">*</span><?php echo _REGISTER_EMAIL; ?></label>
				<div>
					<input class="text-input" name="email" value="" id="regemail" required="required" class="inputbox" placeholder="Введите адрес электронной почты" />
				</div>
			</div>
			<div id="password">
				<label for="password" data-icon="p"><span class="red">*</span><?php echo _REGISTER_PASS; ?></label>
				<div>
					<input class="text-input" type="password" id="password" required="required" name="password" value="" placeholder="Введите пароль" />
					<br /><span id="passstrength"></span>
				</div>
			</div>
			<div id="password2">
				<label for="password2" data-icon="p"><span class="red">*</span><?php echo _REGISTER_VPASS; ?></label>
				<div>
					<input class="text-input" type="password" id="password2" required="required" name="password2" value="" placeholder="Повторите пароль" />
				</div>
			</div>
			<?php if ($mosConfig_captcha_reg) { session_start(); ?>
			<div id="captchatext">
				<label for="captchatext"><?php echo _REG_CAPTCHA_REF; ?></label>
				<div>
					<img id="captchaimg" alt="<?php echo _REG_CAPTCHA_REF; ?>" onclick="document.mosForm.captchaimg.src='<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?'+new String(Math.random())" src="<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?<?php echo session_id() ?>" />
				</div>
				<div>
					<input name="captcha" type="text" id="captchatext" class="inputbox" size="51" placeholder="<?php echo _PLEASE_ENTER_CAPTCHA_PH; ?>" />
				</div>
			</div>
		<?php }; ?>
			<input type="button" value="<?php echo _BUTTON_SEND_REG; ?>" class="button" onclick="submitbutton_reg()" />
			<input type="hidden" name="id" value="0" />
			<input type="hidden" name="gid" value="0" />
			<input type="hidden" name="useractivation" value="<?php echo $useractivation; ?>" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			<input type="hidden" name="task" value="saveRegistration" />
			<input type="hidden" name="<?php echo $validate; ?>" value="1" />
		</fieldset>
	</form>
</div>
		<?php
	}
}
?>