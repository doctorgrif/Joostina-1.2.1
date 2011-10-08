jQuery(function() {
	var maxWidth, maxCount;
	jQuery('li.mostread').each(function(i) {
		var $this = $(this);
		var thisCount = ~~$this.find('.view-count').text();
		if ( i == 0 ) {
			maxWidth = $this.width() - 40;
			maxCount = thisCount;
		}
		var thisWidth = (thisCount / maxCount) * maxWidth;
		$this.find('.view-bar').animate({
			width : thisWidth
		}, 200, 'swing');
	});
});