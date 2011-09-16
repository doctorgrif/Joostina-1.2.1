function showId(evt) {
   
evt = (evt) ? evt : ((window.event) ? window.event : null);
if(evt) {
getID = (evt.target) ? evt.target : event.srcElement;

document.getElementById(getID.id).src = getID.src.slice(97,getID.src.length);

}
}
function showId_f(evt) {
        
evt = (evt) ? evt : ((window.event) ? window.event : null);
if(evt) {
getID = (evt.target) ? evt.target : event.srcElement;

document.getElementById(getID.id).src = '/plugins/content/grayscale/blackwhite.php?imm=' + getID.src;         //.slice(22,getID.src.length);


///plugins/content/grayscale/blackwhite.php?imm=http://www.probajoomla.ua/images/wind/11.jpeg
}
}