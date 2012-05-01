/*
	Litebox JS by Alexander Shabuniewicz - http://aether.ru
	2006-08-18
	inspired by Lightbox JS - Lokesh Dhakar - http://www.huddletogether.com
	and portfolio script of Cameron Adams - http://portfolio.themaninblue.com
*/
var imgNext;
var imgPrev;
function showBox(theTarget) {
	var theBody = document.getElementsByTagName('body')[0];
	var pageCoords = getPageCoords();
	var theShadow = document.createElement('div');
	theShadow.id = 'shadow';
	theShadow.style.height = (pageCoords[1] + 'px');
	theShadow.className = 'on';
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "hidden";
	}
	theBody.insertBefore(theShadow, theBody.firstChild);
	var theLoading = document.createElement('div');
	theLoading.id = 'loading';
	theLoading.style.top = parseInt(pageCoords[2] + (pageCoords[0] - 55) / 2) + 'px';
	theLoading.onclick = function() { closeBox(); }
	theShadow.appendChild(theLoading);
	var imgPreload = new Image();
	imgPreload.onload = function() {
		var theBox = document.createElement('div');
		theBox.id = 'litebox';
		theBox.style.width = imgPreload.width + 10 + 'px';
		theBox.style.marginTop = parseInt(pageCoords[2] + (pageCoords[0] - imgPreload.height - 50) / 2) + 'px';

		var theImage = document.createElement('img');
		theImage.src = theTarget.href;
		theImage.alt = theTarget.title;
		theImage.width = imgPreload.width;
		theImage.onclick = function() { closeBox(); }
		theImage.title = "Click to close this image";

		var theCaption = document.createElement('p');
		theCaption.innerHTML = (theImage.alt) ? theImage.alt : '';
		theCaption.innerHTML += "<em>click on image or press ESC to close window</em>";
		var allThumbs = new Array();
		var allLinks = document.getElementsByTagName('a');
		var linkLen = allLinks.length;
		for (i=0,j=0; i<linkLen; i++) {
			if (allLinks[i].getAttribute('rel') == 'lightbox') {
				allThumbs[j++] = allLinks[i];
			}
		}
		linkLen = allThumbs.length;
		for (i=0; i<linkLen; i++) {
			if (allThumbs[i].href == theTarget.href) {
				if (allThumbs[i-1]) {
					var thePrevLink = document.createElement('a');
					thePrevLink.className = 'prev';
					thePrevLink.title = allThumbs[i-1].title;
					thePrevLink.href = allThumbs[i-1].href;
					thePrevLink.onclick = function() { closeBox(); showBox(this); return false; }
					theCaption.insertBefore(thePrevLink, theCaption.firstChild);
					imgPrev = allThumbs[i-1];
				}
				if (allThumbs[i+1]) {
					var theNextLink = document.createElement('a');
					theNextLink.className = 'next';
					theNextLink.title = allThumbs[i+1].title;
					theNextLink.href = allThumbs[i+1].href;
					theNextLink.onclick = function() { closeBox(); showBox(this); return false; }
					theCaption.insertBefore(theNextLink, theCaption.firstChild);
					imgNext = allThumbs[i+1];
				}
			}
		}
		theShadow.removeChild(theLoading);
		theBox.appendChild(theImage);
		theBox.appendChild(theCaption);
		theShadow.appendChild(theBox);

		document.onkeypress = getKey;
		return false;
	}
	imgPreload.src = theTarget.href;
}
function getPageCoords() {
	var coords = [0, 0, 0]; // height of window, document, scroll pos
	// all except IE
	if (window.innerHeight) {
		coords[0] = window.innerHeight;
		coords[2] = window.pageYOffset;
	}
	// IE 6 Strict
	else if (document.documentElement && document.documentElement.clientHeight != 0) {
		coords[0] = document.documentElement.clientHeight;
		coords[2] = document.documentElement.scrollTop;
	}
	else if (document.body) {
		coords[0] = document.body.clientHeight;
		coords[2] = document.body.scrollTop;
	}
	var test1 = document.body.scrollHeight;
	var test2 = document.body.offsetHeight;
	if (test1 > test2) {
		coords[1] = document.body.scrollHeight;
	} else {
		coords[1] = document.body.offsetHeight;
	}
	if (coords[1] < coords[0]) coords[1] = coords[0];

	return coords;
}
function closeBox() {
	var theBody = document.getElementsByTagName('body')[0];
	var theBox = document.getElementById('litebox');
	if (theBox) theBox.style.display = 'none';
	var theShadow = document.getElementById('shadow');
	if (theShadow) theShadow.style.display = 'none';
	theBody.removeChild(theShadow);

	selects = document.getElementsByTagName('select');
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = 'visible';
	}
	document.onkeypress = '';
	imgPrev = imgNext = '';
	return false;
}
function getKey(e) {
	var arrowImg;
	if (!e) var e = window.event;
	var keycode = e.keyCode ? e.keyCode : e.which;
	switch (keycode) {
  	case 27: // esc
		case 32: // spacebar
			closeBox();
			break;
		case 37: // <-
			arrowImg = imgPrev ? imgPrev : '';
			break;
		case 39: // ->
			arrowImg = imgNext ? imgNext : '';
	}
	if (arrowImg) { closeBox(); showBox(arrowImg); }
	return false;
}
function initLitebox() {
	if (!document.getElementsByTagName) { return; }
	var anchors = document.getElementsByTagName('a');

	for (i=0,len=anchors.length; i<len; i++){
		var anchor = anchors[i];
		if (anchor.getAttribute('href') && (anchor.getAttribute('rel') == 'lightbox')) {
			anchor.onclick = function() { showBox(this); return false; }
		}
	}
	anchor = null;
}
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}
addLoadEvent(initLitebox);