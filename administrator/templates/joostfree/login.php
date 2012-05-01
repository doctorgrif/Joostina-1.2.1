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
$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<html lang="ru">
<head>
<title><?php echo $mosConfig_sitename;?> - <?php echo _JOOSTINA_CONTRL_PANEL; ?></title>
<meta http-equiv="Content-Type" content="text/html;<?php echo _ISO;?>" />
<style type="text/css">@import url(templates/joostfree/css/admin_login.css);</style>
<script type="text/javascript">
function setFocus() {
	document.loginForm.usrname.select();
	document.loginForm.usrname.focus();
}
</script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/jquery/jquery.js"></script>
</head>
<body onload="setFocus();">
<?php include_once ($mosConfig_absolute_path.'/'.ADMINISTRATOR_DIRECTORY.'/modules/mod_mosmsg.php'); ?>
<div class="sitename"><h1><?php echo $mosConfig_sitename;?></h1></div>
<div class="sitedesc"><h2><?php echo $mosConfig_MetaDesc;?></h2></div>
<div class="ctr1 col_100 ">
	<div class="login">
	<form action="index.php" method="post" name="loginForm" id="loginForm" class="form" target="_top">
	<fieldset>
		<div class="col_50">
			<p>
				<label for="usrname"><?php echo _ADMIN_USRNAME;?></label><br />
				<input name="usrname" id="usrname" class="text-input" type="text" placeholder="<?php echo _ADMIN_USRNAME_PH;?>" />
			</p>
			<p>
				<label for="password"><?php echo _ADMIN_PASS;?></label><br />
				<input name="pass" id="password" class="text-input" type="password" placeholder="<?php echo _ADMIN_PASS_PH;?>" />
			</p>
			<?php if ($mosConfig_captcha) { session_start(); ?>
			<p id="captchatext">
				<label for="captchatext"><?php echo _PLEASE_ENTER_CAPTCHA;?></label><br />
				<img id="captchaimg" alt="Нажмите чтобы обновить изображение" onclick="document.emailForm.captchaimg.src='<?php echo $mosConfig_live_site;?>/includes/kcaptcha/index.php?'+new String(Math.random())" src="<?php echo $mosConfig_live_site;?>/includes/kcaptcha/index.php?<?php echo session_id();?>" />
				<br />
				<input name="captcha" type="text" id="captchatext" size="15" placeholder="<?php echo _PLEASE_ENTER_CAPTCHA_PH;?>" />
			</p>
			<?php }; ?>
		</div>
		<div class="col_50">
			<p>
				<br />
				<input type="submit" name="submit" class="button" value="<?php echo _ADMIN_ENTER_LOGIN;?>" />
			</p>
			<p>
				<br />
				<input type="button" name="submit" onClick="document.location.href='<?php echo $mosConfig_live_site;?>'" class="button" value="<?php echo _ADMIN_GO_SITE;?>" />
			</p>
		</div>
		<div class="clearfix"></div>
	</fieldset>
	</form>
	<div class="clearfix"></div>
	</div>
</div>
<div><noscript><div class="message"><?php echo _PLEASE_ENABLE_JAVASCRIPT;?></div></noscript></div>
<div class="footer"><p><?php echo $_VERSION->URL;?></p></div>
</body>
</html>