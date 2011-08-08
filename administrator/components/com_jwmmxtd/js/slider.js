// Slider
/*
window.addEvent('domready', function(){
	var mySlide = new Fx.Slide('upload_more');
	mySlide.hide();
	$('toggle').addEvent('click', function(e){
		e = new Event(e);
		mySlide.toggle();
		e.stop();
	});
});
*/
var mySlide=null;
var Slider = {
	init: function(){
	mySlide = new Fx.Slide('upload_more');
	mySlide.hide();
	$('toggle').addEvent('click', function(e){
		e = new Event(e);
		mySlide.toggle();
		e.stop();
	});
	}
}
//window.addEvent('domready',Slider.init);