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
class loginHTML {
	function loginpage(&$params, $image) {
		global $mosConfig_lang;
// used for spoof hardening
		$validate = josSpoofValue(1);
		$return = $params->get('login');
		?>
<form action="<?php echo sefRelToAbs('index.php?option=login'); ?>" method="post" name="login" id="login">
	<div class="contentpane">
		<?php if ($params->get('page_title')) { ?>
		<div class="componentheading"><?php echo $params->get('header_login'); ?></div>
		<?php } ?>
		<div>
			<?php echo $image; ?>
			<?php if ($params->get('description_login')) { ?>
				<?php echo $params->get('description_login_text'); ?><br /><br />
			<?php } ?>
		</div>
		<div id="username">
			<label for="username" data-icon="u"><?php echo _USERNAME; ?></label>
			<div>
				<input name="username" id="username" type="text" class="inputbox" size="20" />
			</div>
		</div>
		<div id="passwd">
			<label for="passwd" data-icon="p"><?php echo _PASSWORD; ?></label>
			<div>
				<input name="passwd" id="passwd" type="password" class="inputbox" size="20" />
			</div>
		</div>
		<div align="center">
			<input type="submit" name="submit" class="ml_login_button" value="<?php echo _BUTTON_LOGIN; ?>" />
		</div>
		<div id="remember">
			<label for="remember"><?php echo _REMEMBER_ME; ?></label>
			<div>
				<input type="checkbox" id="" name="remember" class="inputbox" value="yes" />
			</div>
		</div>
		<p>
			<a href="<?php echo sefRelToAbs('index.php?option=com_registration&task=lostPassword'); ?>" title="<?php echo _LOST_PASSWORD; ?>"><?php echo _LOST_PASSWORD; ?></a>
		</p>
		<?php if ($params->get('registration')) { ?>
			<?php echo _NO_ACCOUNT; ?>
			<p>
				<a href="<?php echo sefRelToAbs('index.php?option=com_registration&task=register'); ?>" title="<?php echo _CREATE_ACCOUNT; ?>"><?php echo _CREATE_ACCOUNT; ?></a>
			</p>
		<?php } ?>
		<noscript><?php echo _CMN_JAVASCRIPT; ?></noscript>
	</div>
		<?php
// displays back button
			mosHTML::BackButton($params);
		?>
	<input type="hidden" name="op2" value="login" />
	<input type="hidden" name="return" value="<?php echo sefRelToAbs($return); ?>" />
	<input type="hidden" name="lang" value="<?php echo $mosConfig_lang; ?>" />
	<input type="hidden" name="message" value="<?php echo $params->get('login_message'); ?>" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
		<?php
	}

	function logoutpage(&$params, $image) {
		global $mosConfig_lang;
		$return = $params->get('logout');
		?>
<form action="<?php echo sefRelToAbs('index.php?option=logout'); ?>" method="post" name="login" id="login">
	<div class="contentpane">
	<?php if ($params->get('page_title')) { ?>
		<div class="componentheading"><?php echo $params->get('header_logout'); ?></div>
	<?php } ?>
		<div>
			<?php
				echo $image;
				if ($params->get('description_logout')) {
				echo $params->get('description_logout_text');
			?>
			<?php } ?>
		</div>
		<div align="center">
			<input type="submit" name="Submit" class="ml_logout_button" value="<?php echo _BUTTON_LOGOUT; ?>" />
		</div>
	</div>
			<?php
// displays back button
			mosHTML::BackButton($params);
			?>
	<input type="hidden" name="op2" value="logout" />
	<input type="hidden" name="return" value="<?php echo sefRelToAbs($return); ?>" />
	<input type="hidden" name="lang" value="<?php echo $mosConfig_lang; ?>" />
	<input type="hidden" name="message" value="<?php echo $params->get('logout_message'); ?>" />
</form>
		<?php
	}
}
?>