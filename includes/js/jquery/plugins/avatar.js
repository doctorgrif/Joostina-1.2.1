jQuery(document).ready(function($) {
	$('.lightbox_trigger').click(function(e) {
		e.preventDefault();
		var image_href = $(this).attr("href");
		if ($('#lightbox').length > 0) {
			$('#content').html('<img src="' + image_href + '" />');
			$('#lightbox').show();
		}
		else {
			var lightbox = 
			'<div id="lightbox">' +
				'<div id="content">' + 
					'<div class="content_lightbox_img">' + 
						'<img src="' + image_href +'" />' +
					'</div>' +
				'</div>' +
				'<input type="button" name="close" value="Закрыть" class="button" />' +
			'</div>';
			$('body').append(lightbox);
		}
		
	});
	$('#lightbox').live('click', function() {
		$('#lightbox').hide();
	});
});