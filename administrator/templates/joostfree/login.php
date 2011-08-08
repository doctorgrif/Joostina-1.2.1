<?php
/**
* @JoostFREE
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $mosConfig_sitename; ?> - <?php echo _JOOSTINA_CONTRL_PANEL; ?></title>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<style type="text/css">@import url(templates/joostfree/css/admin_login.css);</style>
<script type="text/javascript">
	function setFocus() {
		document.loginForm.usrname.select();
		document.loginForm.usrname.focus();
	}
</script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/includes/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/includes/js/jquery/plugins/formalize.js"></script>
</head>
<body onload="setFocus();">
<div class="joo">
	<img align="left" alt="<?php echo _GO_TO_MAIN_ADMIN_PAGE ?>" src="templates/joostfree/images/logo_121.png" />
	<span class="sitename"><?php echo $mosConfig_sitename; ?></span>
</div>
<div class="clear"></div>
<?php include_once ($mosConfig_absolute_path . '/' . ADMINISTRATOR_DIRECTORY . '/modules/mod_mosmsg.php'); ?>
<div class="ctr1">
	<div class="login">
		<div class="login-form">
			<form action="index.php" method="post" name="loginForm" id="loginForm">
				<div class="form-block">
					<div id="usrname">
						<div>
						<label for="usrname"><?php echo _ADMIN_USRNAME; ?></label>
						</div>
						<input name="usrname" id="usrname" type="text" class="inputbox" size="37" placeholder="<?php echo _ADMIN_USRNAME_PH; ?>" />
					</div>
					<div id="password">
						<div>
							<label for="password"><?php echo _ADMIN_PASS; ?></label>
						</div>
						<input name="pass" type="password" id="password" class="inputbox" size="37" placeholder="<?php echo _ADMIN_PASS_PH; ?>" />
					</div>
					<?php if ($mosConfig_captcha) {
					session_start(); ?>
					<div id="captchatext">
						<div>
							<label for="captchatext"><?php echo _PLEASE_ENTER_CAPTCHA; ?></label>
						</div>
						<div>
							<img id="captchaimg" alt="Нажмите чтобы обновить изображение" onclick="document.emailForm.captchaimg.src='<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?'+new String(Math.random())" src="<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?<?php echo session_id() ?>" />
						</div>
						<input name="captcha" type="text" id="captchatext"class="inputbox" size="15" placeholder="<?php echo _PLEASE_ENTER_CAPTCHA_PH; ?>" />
					</div>
					<?php }; ?>
					<div align="center">
						<div>
							<p>
								<input type="submit" name="submit" class="button" value="<?php echo _ADMIN_ENTER_LOGIN; ?>" />
							</p>
						</div>
						<div>
							<p>
								<input type="button" name="submit" onClick="document.location.href='<?php echo $mosConfig_live_site; ?>'" class="button" value="<?php echo _ADMIN_GO_SITE; ?>" />
							</p>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="clr"></div>
	</div>
</div>
<div><noscript><div class="message"><?php echo _PLEASE_ENABLE_JAVASCRIPT; ?></div></noscript></div>
<div class="freeplace"></div>
<div class="footer"><span><?php echo $_VERSION->URL; ?></span></div>
</body>
</html>