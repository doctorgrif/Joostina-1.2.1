jQuery(document).ready(function(){
	jQuery('.loginbutton').click (function() {
		jQuery('.loginformarea').toggle(400);
		jQuery('body').addClass('tb');
	return false;
	});
	jQuery('.closewin').click(function(){
		jQuery('.loginformarea').toggle(400);
		jQuery('.closewin').removeClass('tb');
	});
});