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
global $mosConfig_frontend_login, $my, $mosConfig_lang, $mainframe;
if ($mosConfig_frontend_login != NULL && ($mosConfig_frontend_login === 0 || $mosConfig_frontend_login === '0')) {
	return;
}
// url of current page that user will be returned to after login
$query_string = mosGetParam($_SERVER, 'QUERY_STRING', '');
$return = trim('index.php?'.$query_string);
// converts & to &amp; for xtml compliance
$return = str_replace('&', '&amp;', $return);
$params_aray = array(
	'registration_enabled' => $mainframe->getCfg('allowUserRegistration'),
// �������� ���������
	'moduleclass_sfx' => $params->get('moduleclass_sfx'),
	'ml_visibility' => $params->get('ml_visibility'),
	'dr_login_text' => $params->get('dr_login_text'),
	'orientation' => $params->get('orientation'),
	'pretext' => $params->get('pretext'),
	'posttext' => $params->get('posttext'),
// �����������
	'login' => $params->def('login', $return),
	'message_login' => $params->def('login_message', 0),
	'greeting' => $params->def('greeting', 1),
	'user_name' => $params->def('user_name', 1),
	'profile_link' => $params->def('profile_link', 0),
	'profile_link_text' => $params->get('profile_link_text'),
// ����� �� �������
	'message_logout' => $params->def('logout_message', 0),
	'logout' => $params->def('logout', $return),
// ���� �����/������
	'show_login_text' => $params->get('show_login_text', 1),
	'ml_login_text' => $params->get('ml_login_text', _USERNAME),
	'show_login_tooltip' => $params->get('show_login_tooltip'),
	'login_tooltip_text' => $params->get('login_tooltip_text'),
	'show_pass_text' => $params->get('show_pass_text', 1),
	'ml_pass_text' => $params->get('ml_pass_text', _PASSWORD),
	'show_pass_tooltip' => $params->get('show_pass_tooltip'),
	'pass_tooltip_text' => $params->get('pass_tooltip_text'),
	'ml_login_text_ph' => $params->get('ml_login_text_ph', _ENTER_YOUR_LOGIN),
	'ml_pass_text_ph' => $params->get('ml_pass_text_ph', _ENTER_YOUR_PASSWORD),
// ������ �������� �����
	'ml_avatar' => $params->get('ml_avatar', 1),
	'show_remember' => $params->get('show_remember', 1),
	'ml_rem_text' => $params->get('ml_rem_text', _REMEMBER_ME_2),
	'show_lost_pass' => $params->get('show_lost_pass', 1),
	'ml_rem_pass_text' => $params->get('ml_rem_pass_text', _LOST_PASSWORD),
	'show_register' => $params->get('show_register', 1),
	'ml_reg_text' => $params->get('ml_reg_text', _CREATE_ACCOUNT),
	'submit_button_text' => $params->get('submit_button_text', _BUTTON_LOGIN),
);
if ($params_aray['show_login_tooltip'] == 1 OR $params_aray['show_pass_tooltip']) {
	mosCommonHTML::loadOverlib(1);
}
if ($my->id) {
	logoutForm($params_aray);
} else {
	loginForm($params_aray);
}
function logoutForm($params_aray) {
	global $mosConfig_frontend_login, $my, $mosConfig_lang, $mosConfig_live_site;
	if ($params_aray['user_name']) {
		$name = $my->name;
	} else {
		$name = $my->username;
	}
	$user_link = 'index.php?option=com_user&amp;task=profile&amp;user='.$my->id;
	$user_seflink = sefRelToAbs($user_link);
	$profile_link = '';
	if ($params_aray['profile_link'] == 0) {
		$profile_link0 = '<a href="'.$user_seflink.'" title="'.$name.'">'.$name.'</a>';
		$name = $profile_link0;
		$profile_link = '';
	} else if ($params_aray['profile_link'] == 1) {
		$profile_link = '<a href="'.$user_seflink.'" title="'.$params_aray['profile_link_text'].'">'.$params_aray['profile_link_text'].'</a>';
	}
	if ($params_aray['ml_avatar']) {
		$avatar = '<figure><img id="avatar" src="'.$mosConfig_live_site . mosUser::avatar($my->id, 'mini').'" alt="'.$my->name.'" /></figure>';
	} else {
		$avatar = '';
	}
	?>
<form action="<?php echo sefRelToAbs('index.php?option=logout'); ?>" method="post" name="logout">
	<div class="greeting">
	<?php
		if ($params_aray['greeting']) {
			echo $avatar.'<p>'._HI_AUTH.'<span class="strong">'.$name.'</span></p>';
		} 
			echo $profile_link;
	?>
		<input type="submit" name="submit" id="button" class="button" value="<?php echo _BUTTON_LOGOUT; ?>" />
		<input type="hidden" name="option" value="logout" />
		<input type="hidden" name="op2" value="logout" />
		<input type="hidden" name="lang" value="<?php echo $mosConfig_lang; ?>" />
		<input type="hidden" name="return" value="<?php echo sefRelToAbs($params_aray['logout']); ?>" />
		<input type="hidden" name="message" value="<?php echo $params_aray['message_logout']; ?>" />
	</div>
</form>
	<?php
}
function loginForm($params_aray) {
	global $mainframe, $mosConfig_live_site;
	if ($params_aray['ml_visibility'] == 0) {
		BuildLoginForm($params_aray, $params_aray['orientation']);
	} else {
	?>
<div class="loginbutton" id="log_in">
	<p><?php echo $params_aray['dr_login_text']; ?></p>
</div>
<div id="box1">
	<div class="loginformarea">
		<div class="loginformareainside">
			<p class="authtitle"><?php echo _AUTH_DEF; ?></p>
			<?php BuildLoginForm($params_aray, $params_aray['orientation']); ?>
			<div class="clearfix"></div>
		</div>
		<div class="closewin"></div>
	</div>
</div>
	<?php
	}
}
function BuildLoginForm($params_aray, $orientation) {
	global $mosConfig_frontend_login, $my, $mosConfig_lang;
	$validate = josSpoofValue(1);
	if ($params_aray['show_login_tooltip']) {
		$login_tooltip = "onmouseover=\"return overlib('" . $params_aray['login_tooltip_text'] . "');\" onmouseout=\"return nd();\"";
	} else {
		$login_tooltip = '';
	}
	if ($params_aray['show_pass_tooltip']) {
		$pass_tooltip = "onmouseover=\"return overlib('" . $params_aray['pass_tooltip_text'] . "');\" onmouseout=\"return nd();\"";
	} else {
		$pass_tooltip = '';
	}
	$login_label_def = '<label for="username">'.$params_aray['ml_login_text'].'</label><br />';
	$login_input_def = '<input class="text-input" type="text" name="username" id="username" placeholder="'.$params_aray['ml_login_text_ph'].'" value="" '.$login_tooltip.' />';
	$pass_label_def = '<label for="password">'.$params_aray['ml_pass_text'].'</label><br />';
	$pass_input_def = '<input class="text-input" type="password" id="password" name="passwd" placeholder="'.$params_aray['ml_pass_text_ph'].'" value="" /><br /><span id="passstrength"></span>';
	switch ($params_aray['show_login_text']) {
		case '0':
			$input_login = '<p>'.$login_input_def.'</p>';
		case '1':
		default:
			$input_login = '<p>'.$login_label_def . $login_input_def.'</p>';
			break;
		case '2':
			$input_login = '<input class="text-input" type="text" name="username" id="username" placeholder="'.$params_aray['ml_login_text_ph'].'" value="'.$params_aray['ml_login_text'].'" onblur="if(this.value==\'\') this.value=\''.$params_aray['ml_login_text'].'\';" onfocus="if(this.value==\''.$params_aray['ml_login_text'].'\') this.value=\'\';" />';
			break;
		case '3':
		default:
			$input_login = '<p>'.$login_label_def . $login_input_def.'</p>';
			break;
	}
	switch ($params_aray['show_pass_text']) {
		case '0':
			$input_pass = '<p>'.$pass_input_def.'</p>';
		case '1':
		default:
			$input_pass = '<p>'.$pass_label_def . $pass_input_def.'</p>';
			break;
		case '2':
			$input_pass = '<input class="text-input" type="password" id="password" name="passwd" placeholder="'.$params_aray['ml_pass_text_ph'].'" value="'.$params_aray['ml_pass_text'].'" onblur="if(this.value==\'\') this.value=\''.$params_aray['ml_pass_text'].'\';" onfocus="if(this.value==\''.$params_aray['ml_pass_text'].'\') this.value=\'\';" /><br /><span id="passstrength"></span>';
			break;
		case '3':
		default:
			$input_pass = '<p>'.$pass_label_def . $pass_input_def.'</p>';
			break;
	}
	if ($params_aray['show_remember'] == 1) {
		$remember_me = '<p><label for="mod-login-remember">'.$params_aray['ml_rem_text'].'</label> <input type="checkbox" name="remember" id="mod-login-remember" value="yes" alt="'.$params_aray['ml_rem_text'].'" /></p>';
	} else {
		$remember_me = '';
	}
	if ($params_aray['show_lost_pass'] == 1) {
		$lost_pass = '<p><label for="lost-pass">'.$params_aray['ml_rem_pass_text'].'</label></p><p><a href="'.sefRelToAbs('index.php?option=com_registration&amp;task=lostPassword').'" id="lost-pass" title="'.$params_aray['ml_rem_pass_text'].' '. _REM_PASS.'. ">'._REM_PASS.'</a></p>';
	} else {
		$lost_pass = '';
	}
	if ($params_aray['show_register'] == 1) {
		$register_me = '<p><label for="register-me">'._NO_REGISTRED.'</label></p><p><a href="'.sefRelToAbs('index.php?option=com_registration&amp;task=register').'" id="register-me" title="'.$params_aray['ml_reg_text'].'">'.$params_aray['ml_reg_text'].'</a></p>';
	} else {
		$register_me = '';
	}
	$submit_button = '<input type="submit" name="submit" class="button" id="button" value="'.$params_aray['submit_button_text'].'" />';
// ������� �����
echo '<div class="formpretext">'.$params_aray['pretext'].'</div>
';
	?>
<form action="<?php echo sefRelToAbs('index.php?option=login'); ?>" method="post" name="login" class="form">
	<?php if ($orientation == '1') { ?>
	<div class="loginform-gorisontal">
		<div class="login-line">
			<div class="login-f-line">
				<?php echo $input_login; ?>
				<?php echo $input_pass; ?>
				<?php echo $submit_button; ?>
			</div><br />
			<div class="login-s-line">
				<?php echo $remember_me; ?>
				<?php echo $lost_pass; ?>
				<?php echo $register_me; ?>
			</div>
		</div>
	</div>
	<?php } else { /* ����� �� ����������� ���� */ ?>
	<div class="loginform">
		<div class="loginleft col_50">
			<?php echo $lost_pass; ?>
			<?php echo $register_me; ?>
		</div>
		<div class="loginright col_50">
			<?php echo $input_login; ?>
			<?php echo $input_pass; ?>
			<?php echo $remember_me; ?>
			<?php echo $submit_button; ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
	}
echo '<div class="formposttext">'.$params_aray['posttext'].'</div>
';
	?>
	<input type="hidden" name="option" value="login" />
	<input type="hidden" name="op2" value="login" />
	<input type="hidden" name="lang" value="<?php echo $mosConfig_lang; ?>" />
	<input type="hidden" name="return" value="<?php echo sefRelToAbs($params_aray['login']); ?>" />
	<input type="hidden" name="message" value="<?php echo $params_aray['message_login']; ?>" />
	<input type="hidden" name="force_session" value="1" />
	<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
	<?php
		mosCommonHTML::loadJqueryPlugins('jquery.passstrength', 1);
	?>
	<?php
}
?>