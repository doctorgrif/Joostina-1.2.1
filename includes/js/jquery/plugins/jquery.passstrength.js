jQuery(document).ready(function(){
	jQuery('#password').keyup(function(e) {
		var strongRegex = new RegExp("^(?=.{7,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
		var mediumRegex = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
		var enoughRegex = new RegExp("(?=.{5,}).*", "g");
		if (false == enoughRegex.test(jQuery(this).val())) {
			jQuery('#passstrength').html('<span class="superred">Слишком простой пароль!</span>');
		} else if (strongRegex.test(jQuery(this).val())) {
			jQuery('#passstrength').className = 'ok';
			jQuery('#passstrength').html('<span class="green">Сильный пароль!</span>');
		} else if (mediumRegex.test(jQuery(this).val())) {
			jQuery('#passstrength').className = 'alert';
			jQuery('#passstrength').html('<span class="yellow">Средний пароль!</span>');
		} else {
			jQuery('#passstrength').className = 'error';
			jQuery('#passstrength').html('<span class="red">Слабый пароль!</span>');
		}
		return true;
	});
});