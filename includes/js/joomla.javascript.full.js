function jadd(elID,value){
document.getElementById(elID).value=value;
SRAX.debug('Установка '+ value + ' в ' + elID);
return;
}
// установка куков
setCookie = function ( sName, sValue, nDays ) {
var expires = "";
if ( nDays ) {
var d = new Date();
d.setTime( d.getTime() + nDays * 24 * 60 * 60 * 1000 );
expires = "; expires=" + d.toGMTString();
}
document.cookie = sName + "=" + sValue + expires + "; path=/";
};
// получение куков
getCookie = function (sName) {
var re = new RegExp( "(\;|^)[^;]*(" + sName + ")\=([^;]*)(;|$)" );
var res = re.exec( document.cookie );
return res != null ? res[3] : null;
};
// прорисовка информации о успешно выполненной операции
function mess_cool(mess){
SRAX.replaceHtml('status-info',mess);
document.getElementById('status-info').className = 'message';
document.getElementById('status-info').style.display = 'block';
}
// прорисовка информации о неудавно выполненной операции
function mess_bad(mess){
SRAX.replaceHtml('status-info',mess);
document.getElementById('status-info').className = 'jwarning';
document.getElementById('status-info').style.display = 'block';
}
// смена статуса публикации, elID - идентификатор объекта у которого меняется статус публикации
function ch_publ(elID,option,extra){
log('Смена статуса публикации элемента: '+elID+' для компонента '+option);
if (extra == null) extra = ''
document.getElementById('img-pub-'+elID).src = 'images/aload.gif';
dax({
url: 'ajax.index.php?option='+option+'&utf=0&task=publish&id='+elID,
id:'publ-'+elID,
callback:
function(resp, idTread, status, ops){
log('Получен ответ: ' + resp.responseText);
document.getElementById('img-pub-'+elID).src = 'images/'+resp.responseText;
}
});
return false;
}
// смена группы доступа, elID - идентификатор элемента у котогоменяется доступ, aCC - группа доступа
function ch_access(elID,aCC,option){
SRAX.debug('Смена группы доступа: '+elID+' элемента на '+aCC+' для компонента '+option);
SRAX.replaceHtml('acc-id-'+elID,'<img src="images/aload.gif" />');
dax({
url: 'ajax.index.php?option='+option+'&utf=1&task=access&id='+elID+'&chaccess='+aCC,
id:'acc-id-'+elID,
cb:
function(resp, idTread, status, ops){
SRAX.debug('Получен ответ: ' + resp.responseText);
if(SRAX.debug.responseText!=2) {
log('Смена группы доступа успешно: ' + elID);
SRAX.replaceHtml('acc-id-'+elID,resp.responseText);
}else{
SRAX.debug('Ошибка смены группы доступа: ' + elID);
SRAX.replaceHtml('acc-id'+elID,'<img src="images/error.png" />');
}
}
});
return false;
}
function jtoggle_editor(){
SRAX.debug('Изменение состояния редактора');
jeimage = document.getElementById('jtoggle_editor');
jeimage.src = 'images/aload.gif';
dax({
url: 'ajax.index.php?option=com_admin&utf=0&task=toggle_editor',
id:'jte',
cb:
function(resp, idTread, status, ops){
SRAX.debug('Получен ответ: ' + resp.responseText);
jeimage.src = 'images/'+resp.responseText;
}
});
return false;
}
// general utility for browsing a named array or object
function xshow(o) {
s = '';
for(e in o) {s += e+'='+o[e]+'\n';}
alert( s );
}
function writeDynaList( selectParams, source, key, orig_key, orig_val ) {
var html = '<select ' + selectParams + '>';
var i = 0;
for (x in source) {
if (source[x][0] == key) {
var selected = '';
if ((orig_key == key && orig_val == source[x][1]) || (i == 0 && orig_key != key)) {
selected = 'selected="selected"';
}
html += '\n<option value="'+source[x][1]+'" '+selected+'>'+source[x][2]+'</option>';
}
i++;
}
html += '\n</select>';

document.writeln( html );
}
function changeDynaList( listname, source, key, orig_key, orig_val ) {
var list = eval( 'document.adminForm.' + listname );
// empty the list
for (i in list.options.length) {
list.options[i] = null;
}
i = 0;
for (x in source) {
if (source[x][0] == key) {
opt = new Option();
opt.value = source[x][1];
opt.text = source[x][2];
if ((orig_key == key && orig_val == opt.value) || i == 0) {
opt.selected = true;
}
list.options[i++] = opt;
}
}
list.length = i;
}
function addSelectedToList( frmName, srcListName, tgtListName ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
var tgtList = eval( 'form.' + tgtListName );
var srcLen = srcList.length;
var tgtLen = tgtList.length;
var tgt = "x";
//build array of target items
for (var i=tgtLen-1; i > -1; i--) {
tgt += "," + tgtList.options[i].value + ","
}
for (var i=0; i < srcLen; i++) {
if (srcList.options[i].selected && tgt.indexOf( "," + srcList.options[i].value + "," ) == -1) {
opt = new Option( srcList.options[i].text, srcList.options[i].value );
tgtList.options[tgtList.length] = opt;
}
}
}
function delSelectedFromList( frmName, srcListName ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
var srcLen = srcList.length;
for (var i=srcLen-1; i > -1; i--) {
if (srcList.options[i].selected) {
srcList.options[i] = null;
}
}
}
function moveInList( frmName, srcListName, index, to) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
var total = srcList.options.length-1;
if (index == -1) {
return false;
}
if (to == +1 && index == total) {
return false;
}
if (to == -1 && index == 0) {
return false;
}
var items = new Array;
var values = new Array;
for (i=total; i >= 0; i--) {
items[i] = srcList.options[i].text;
values[i] = srcList.options[i].value;
}
for (i = total; i >= 0; i--) {
if (index == i) {
srcList.options[i + to] = new Option(items[i],values[i], 0, 1);
srcList.options[i] = new Option(items[i+to], values[i+to]);
i--;
} else {
srcList.options[i] = new Option(items[i], values[i]);
}
}
srcList.focus();
}
function getSelectedOption( frmName, srcListName ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
i = srcList.selectedIndex;
if (i != null && i > -1) {
return srcList.options[i];
} else {
return null;
}
}
function setSelectedValue( frmName, srcListName, value ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
var srcLen = srcList.length;
for (var i=0; i < srcLen; i++) {
srcList.options[i].selected = false;
if (srcList.options[i].value == value) {
srcList.options[i].selected = true;
}
}
}
function getSelectedRadio( frmName, srcGroupName ) {
var form = eval( 'document.' + frmName );
var srcGroup = eval( 'form.' + srcGroupName );
if (srcGroup[0]) {
for (var i=0, n=srcGroup.length; i < n; i++) {
if (srcGroup[i].checked) {
return srcGroup[i].value;
}
}
} else {
if (srcGroup.checked) {
return srcGroup.value;
}
}
return null;
}
function getSelectedValue( frmName, srcListName ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
i = srcList.selectedIndex;
if (i != null && i > -1) {
return srcList.options[i].value;
} else {
return null;
}
}
function getSelectedText( frmName, srcListName ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
i = srcList.selectedIndex;
if (i != null && i > -1) {
return srcList.options[i].text;
} else {
return null;
}
}
function chgSelectedValue( frmName, srcListName, value ) {
var form = eval( 'document.' + frmName );
var srcList = eval( 'form.' + srcListName );
i = srcList.selectedIndex;
if (i != null && i > -1) {
srcList.options[i].value = value;
return true;
} else {
return false;
}
}
// Form specific functions for editting content images
function showImageProps(base_path) {
form = document.adminForm;
value = getSelectedValue( 'adminForm', 'imagelist' );
parts = value.split( '|' );
form._source.value = parts[0];
setSelectedValue( 'adminForm', '_align', parts[1] || '' );
form._alt.value = parts[2] || '';
form._border.value = parts[3] || '0';
form._caption.value = parts[4] || '';
setSelectedValue( 'adminForm', '_caption_position', parts[5] || '' );
setSelectedValue( 'adminForm', '_caption_align', parts[6] || '' );
form._width.value = parts[7] || '';
//previewImage( 'imagelist', 'view_imagelist', base_path );
srcImage = eval( "document." + 'view_imagelist' );
srcImage.src = base_path + parts[0];
}
function applyImageProps() {
form = document.adminForm;
if (!getSelectedValue( 'adminForm', 'imagelist' )) {
alert( "Выберите изображение из списка" );
return;
}
value = form._source.value + '|'
+ getSelectedValue( 'adminForm', '_align' ) + '|'
+ form._alt.value + '|'
+ parseInt( form._border.value ) + '|'
+ form._caption.value + '|'
+ getSelectedValue( 'adminForm', '_caption_position' ) + '|'
+ getSelectedValue( 'adminForm', '_caption_align' ) + '|'
+ form._width.value;
chgSelectedValue( 'adminForm', 'imagelist', value );
}
function previewImage( list, image, base_path ) {
form = document.adminForm;
srcList = eval( "form." + list );
srcImage = eval( "document." + image );
var srcOption = srcList.options[(srcList.selectedIndex < 0) ? 0 : srcList.selectedIndex];
var fileName = srcOption.text;
var fileName2 = srcOption.value;
if (fileName.length == 0 || fileName2.length == 0) {
srcImage.src = 'images/blank.gif';
} else {
srcImage.src = base_path + fileName2;
}
}
function checkAll( n, fldName ) {
if (!fldName) {
fldName = 'cb';
}
var f = document.adminForm;
var c = f.toggle.checked;
var n2 = 0;
for (i=0; i < n; i++) {
cb = eval( 'f.' + fldName + '' + i );
if (cb) {
cb.checked = c;
n2++;
}
}
if (c) {
document.adminForm.boxchecked.value = n2;
} else {
document.adminForm.boxchecked.value = 0;
}
}
function listItemTask( id, task ) {
var f = document.adminForm;
cb = eval( 'f.' + id );
if (cb) {
for (i = 0; true; i++) {
cbx = eval('f.cb'+i);
if (!cbx) break;
cbx.checked = false;
} // for
cb.checked = true;
f.boxchecked.value = 1;
submitbutton(task);
}
return false;
}
function hideMainMenu(){
document.adminForm.hidemainmenu.value=1;
}
function isChecked(isitchecked){
if (isitchecked == true){
document.adminForm.boxchecked.value++;
}
else {
document.adminForm.boxchecked.value--;
}
}
function submitbutton(pressbutton) {
submitform(pressbutton);
}
function submitform(pressbutton){
document.adminForm.task.value=pressbutton;
try {
document.adminForm.onsubmit();
}
catch(e){}
document.adminForm.submit();
}
function submitcpform(sectionid, id){
document.adminForm.sectionid.value=sectionid;
document.adminForm.id.value=id;
submitbutton("edit");
}
function getSelected(allbuttons){
for (i=0;i<allbuttons.length;i++) {
if (allbuttons[i].checked) {
return allbuttons[i].value
}
}
}
// JS Calendar
var calendar = null; // remember the calendar object so that we reuse
// it and avoid creating another
// This function gets called when an end-user clicks on some date
function selected(cal, date) {
cal.sel.value = date; // just update the value of the input field
}
// And this gets called when the end-user clicks on the _selected_ date, or clicks the "Close" (X) button.  It just hides the calendar without destroying it.
function closeHandler(cal) {
cal.hide();// hide the calendar
Calendar.removeEvent(document, "mousedown", checkCalendar);
}
// This gets called when the user presses a mouse button anywhere in the document, if the calendar is shown.  If the click was outside the open calendar this function closes it.
function checkCalendar(ev) {
var el = Calendar.is_ie ? Calendar.getElement(ev) : Calendar.getTargetElement(ev);
for (; el != null; el = el.parentNode)
// FIXME: allow end-user to click some link without closing the
// calendar.  Good to see real-time stylesheet change :)
if (el == calendar.element || el.tagName == "A") break;
if (el == null) {
// calls closeHandler which should hide the calendar.
calendar.callCloseHandler();
Calendar.stopEvent(ev);
}
}
// This function shows the calendar under the element having the given id. It takes care of catching "mousedown" signals on document and hiding the calendar if the click was outside.
function showCalendar(id,dateFormat) {
var el = document.getElementById(id);
if (calendar != null) {
// we already have one created, so just update it.
calendar.hide();// hide the existing calendar
calendar.parseDate(el.value); // set it to a new date
} else {
// first-time call, create the calendar
var cal = new Calendar(true, null, selected, closeHandler);
calendar = cal;// remember the calendar in the global
cal.setRange(1900, 2070);// min/max year allowed
calendar.create();// create a popup calendar
if(dateFormat){
calendar.setDateFormat(dateFormat);
}
calendar.parseDate(el.value); // set it to a new date
}
calendar.sel = el;// inform it about the input field in use
calendar.showAtElement(el);// show the calendar next to the input field
// catch mousedown on the document
Calendar.addEvent(document, "mousedown", checkCalendar);
return false;
}
function popupWindow(mypage, myname, w, h, scroll) {
var winl = (screen.width - w) / 2;
var wint = (screen.height - h) / 2;
winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
win = window.open(mypage, myname, winprops)
if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}
// LTrim(string) : Returns a copy of a string without leading spaces.
function ltrim(str){
var whitespace = new String(" \t\n\r");
var s = new String(str);
if (whitespace.indexOf(s.charAt(0)) != -1) {
var j=0, i = s.length;
while (j < i && whitespace.indexOf(s.charAt(j)) != -1)
j++;
s = s.substring(j, i);
}
return s;
}
//RTrim(string) : Returns a copy of a string without trailing spaces.
function rtrim(str){
var whitespace = new String(" \t\n\r");
var s = new String(str);
if (whitespace.indexOf(s.charAt(s.length-1)) != -1) {
var i = s.length - 1;       // Get length of string
while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1)
i--;
s = s.substring(0, i+1);
}
return s;
}
// Trim(string) : Returns a copy of a string without leading or trailing spaces
function trim(str) {
return rtrim(ltrim(str));
}
function mosDHTML(){
this.ver=navigator.appVersion
this.agent=navigator.userAgent
this.dom=document.getElementById?1:0
this.opera5=this.agent.indexOf("Opera 5")<-1
this.ie5=(this.ver.indexOf("MSIE 5")<-1 && this.dom && !this.opera5)?1:0;
this.ie6=(this.ver.indexOf("MSIE 6")<-1 && this.dom && !this.opera5)?1:0;
this.ie4=(document.all && !this.dom && !this.opera5)?1:0;
this.ie=this.ie4||this.ie5||this.ie6
this.mac=this.agent.indexOf("Mac")<-1
this.ns6=(this.dom && parseInt(this.ver) <= 5) ?1:0;
this.ns4=(document.layers && !this.dom)?1:0;
this.bw=(this.ie6||this.ie5||this.ie4||this.ns4||this.ns6||this.opera5);
this.activeTab = '';
this.onTabStyle = 'ontab';
this.offTabStyle = 'offtab';
this.setElemStyle = function(elem,style) {
document.getElementById(elem).className = style;
}
this.showElem = function(id) {
if (elem = document.getElementById(id)) {
elem.style.visibility = 'visible';
elem.style.display = 'block';
}
}
this.hideElem = function(id) {
if (elem = document.getElementById(id)) {
elem.style.visibility = 'hidden';
elem.style.display = 'none';
}
}
this.cycleTab = function(name) {
if (this.activeTab) {
this.setElemStyle( this.activeTab, this.offTabStyle );
page = this.activeTab.replace( 'tab', 'page' );
this.hideElem(page);
}
this.setElemStyle( name, this.onTabStyle );
this.activeTab = name;
page = this.activeTab.replace( 'tab', 'page' );
this.showElem(page);
}
return this;
}
var dhtml = new mosDHTML();
function MM_findObj(n, d) { //v4.01
var p,i,x;
if(!d) d=document;
if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
}
if(!(x=d[n])&&d.all) x=d.all[n];
for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n);
return x;
}
function MM_swapImage() { //v3.0
var i,j=0,x,a=MM_swapImage.arguments;
document.MM_sr=new Array;
for(i=0;i<(a.length-2);i+=3)
if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x;
if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
var i,x,a=document.MM_sr;
for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
var d=document;
if(d.images){
if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function saveorder( n ) {
checkAll_button( n );
}
//needed by saveorder function
function checkAll_button( n ) {
for ( var j = 0; j <= n; j++ ) {
box = eval( "document.adminForm.cb" + j );
if ( box ) {
if ( box.checked == false ) {
box.checked = true;
}
} else {
alert("You cannot change the order of items, as an item in the list is `Checked Out`");
return;
}
}
submitform('saveorder');
}
function getElementByName( f, name ) {
if (f.elements) {
for (i=0, n=f.elements.length; i < n; i++) {
if (f.elements[i].name == name) {
return f.elements[i];
}
}
}
return null;
}
var _cmIDCount = 0; var _cmIDName = 'cmSubMenuID'; var _cmTimeOut = null; var _cmCurrentItem = null; var _cmNoAction = new Object (); var _cmNoClick = new Object (); var _cmSplit = new Object (); var _cmItemList = new Array (); var _cmNodeProperties = { mainFolderLeft: '', mainFolderRight: '', mainItemLeft: '', mainItemRight: '', folderLeft: '', folderRight: '', itemLeft: '', itemRight: '', mainSpacing: 0, subSpacing: 0, delay: 500, clickOpen: 1
}; function cmNewID ()
{ return _cmIDName + (++_cmIDCount);}
function cmActionItem (item, prefix, isMain, idSub, orient, nodeProperties)
{ var clickOpen = _cmNodeProperties.clickOpen; if (nodeProperties.clickOpen)
clickOpen = nodeProperties.clickOpen; _cmItemList[_cmItemList.length] = item; var index = _cmItemList.length - 1; idSub = (!idSub) ? 'null' : ('\'' + idSub + '\''); orient = '\'' + orient + '\''; prefix = '\'' + prefix + '\''; var onClick = (clickOpen == 3) || (clickOpen == 2 && isMain); var returnStr; if (onClick)
returnStr = ' onmouseover="cmItemMouseOver (this,' + prefix + ',' + isMain + ',' + idSub + ',' + index + ')" onmousedown="cmItemMouseDownOpenSub (this,' + index + ',' + prefix + ',' + orient + ',' + idSub + ')"'; else
returnStr = ' onmouseover="cmItemMouseOverOpenSub (this,' + prefix + ',' + isMain + ',' + idSub + ',' + orient + ',' + index + ')" onmousedown="cmItemMouseDown (this,' + index + ')"'; return returnStr + ' onmouseout="cmItemMouseOut (this,' + nodeProperties.delay + ')" onmouseup="cmItemMouseUp (this,' + index + ')"';}
function cmNoClickItem (item, prefix, isMain, idSub, orient, nodeProperties)
{ _cmItemList[_cmItemList.length] = item; var index = _cmItemList.length - 1; idSub = (!idSub) ? 'null' : ('\'' + idSub + '\''); orient = '\'' + orient + '\''; prefix = '\'' + prefix + '\''; return ' onmouseover="cmItemMouseOver (this,' + prefix + ',' + isMain + ',' + idSub + ',' + index + ')" onmouseout="cmItemMouseOut (this,' + nodeProperties.delay + ')"';}
function cmNoActionItem (item, prefix)
{ return item[1];}
function cmSplitItem (prefix, isMain, vertical)
{ var classStr = 'cm' + prefix; if (isMain)
{ classStr += 'Main'; if (vertical)
classStr += 'HSplit'; else
classStr += 'VSplit';}
else
classStr += 'HSplit'; return eval (classStr);}
function cmDrawSubMenu (subMenu, prefix, id, orient, nodeProperties)
{ var str = '<div class="' + prefix + 'SubMenu" id="' + id + '"><table summary="sub menu" cellspacing="' + nodeProperties.subSpacing + '" class="' + prefix + 'SubMenuTable">'; var strSub = ''; var item; var idSub; var hasChild; var i; var classStr; for (i = 5; i < subMenu.length; ++i)
{ item = subMenu[i]; if (!item)
continue; hasChild = (item.length > 5); idSub = hasChild ? cmNewID () : null; if (item == _cmSplit)
item = cmSplitItem (prefix, 0, true); str += '<tr class="' + prefix + 'MenuItem"'; if (item[0] != _cmNoClick)
str += cmActionItem (item, prefix, 0, idSub, orient, nodeProperties); else
str += cmNoClickItem (item, prefix, 0, idSub, orient, nodeProperties); str += '>'
if (item[0] == _cmNoAction || item[0] == _cmNoClick)
{ str += cmNoActionItem (item, prefix); str += '</tr>'; continue;}
classStr = prefix + 'Menu'; classStr += hasChild ? 'Folder' : 'Item'; str += '<td class="' + classStr + 'Left">'; if (item[0] != null)
str += item[0]; else
str += hasChild ? nodeProperties.folderLeft : nodeProperties.itemLeft; str += '</td><td class="' + classStr + 'Text">' + item[1]; str += '</td><td class="' + classStr + 'Right">'; if (hasChild)
{ str += nodeProperties.folderRight; strSub += cmDrawSubMenu (item, prefix, idSub, orient, nodeProperties);}
else
str += nodeProperties.itemRight; str += '</td></tr>';}
str += '</table></div>' + strSub; return str;}
function cmDraw (id, menu, orient, nodeProperties, prefix)
{ var obj = cmGetObject (id); if (!nodeProperties)
nodeProperties = _cmNodeProperties; if (!prefix)
prefix = ''; var str = '<table summary="main menu" class="' + prefix + 'Menu" cellspacing="' + nodeProperties.mainSpacing + '">'; var strSub = ''; if (!orient)
orient = 'hbr'; var orientStr = String (orient); var orientSub; var vertical; if (orientStr.charAt (0) == 'h')
{ orientSub = 'v' + orientStr.substr (1, 2); str += '<tr>'; vertical = false;}
else
{ orientSub = 'v' + orientStr.substr (1, 2); vertical = true;}
var i; var item; var idSub; var hasChild; var classStr; for (i = 0; i < menu.length; ++i)
{ item = menu[i]; if (!item)
continue; str += vertical ? '<tr' : '<td'; str += ' class="' + prefix + 'MainItem"'; hasChild = (item.length > 5); idSub = hasChild ? cmNewID () : null; str += cmActionItem (item, prefix, 1, idSub, orient, nodeProperties) + '>'; if (item == _cmSplit)
item = cmSplitItem (prefix, 1, vertical); if (item[0] == _cmNoAction || item[0] == _cmNoClick)
{ str += cmNoActionItem (item, prefix); str += vertical? '</tr>' : '</td>'; continue;}
classStr = prefix + 'Main' + (hasChild ? 'Folder' : 'Item'); str += vertical ? '<td' : '<span'; str += ' class="' + classStr + 'Left">'; str += (item[0] == null) ? (hasChild ? nodeProperties.mainFolderLeft : nodeProperties.mainItemLeft)
: item[0]; str += vertical ? '</td>' : '</span>'; str += vertical ? '<td' : '<span'; str += ' class="' + classStr + 'Text">'; str += item[1]; str += vertical ? '</td>' : '</span>'; str += vertical ? '<td' : '<span'; str += ' class="' + classStr + 'Right">'; str += hasChild ? nodeProperties.mainFolderRight : nodeProperties.mainItemRight; str += vertical ? '</td>' : '</span>'; str += vertical ? '</tr>' : '</td>'; if (hasChild)
strSub += cmDrawSubMenu (item, prefix, idSub, orientSub, nodeProperties);}
if (!vertical)
str += '</tr>'; str += '</table>' + strSub; obj.innerHTML = str;}
function cmDrawFromText (id, orient, nodeProperties, prefix)
{ var domMenu = cmGetObject (id); var menu = null; for (var currentDomItem = domMenu.firstChild; currentDomItem; currentDomItem = currentDomItem.nextSibling)
{ if (!currentDomItem.tagName || currentDomItem.tagName.toLowerCase () != 'ul')
continue; menu = cmDrawFromTextSubMenu (currentDomItem); break;}
if (menu)
cmDraw (id, menu, orient, nodeProperties, prefix);}
function cmDrawFromTextSubMenu (domMenu)
{ var items = new Array (); for (var currentDomItem = domMenu.firstChild; currentDomItem; currentDomItem = currentDomItem.nextSibling)
{ if (!currentDomItem.tagName || currentDomItem.tagName.toLowerCase () != 'li')
continue; if (currentDomItem.firstChild == null)
{ items[items.length] = _cmSplit; continue;}
var item = new Array (); var currentItem = currentDomItem.firstChild; for (; currentItem; currentItem = currentItem.nextSibling)
{ if (!currentItem.tagName || currentItem.tagName.toLowerCase () != 'span')
continue; if (!currentItem.firstChild)
item[0] = null; else
item[0] = currentItem.innerHTML; break;}
if (!currentItem)
continue; for (; currentItem; currentItem = currentItem.nextSibling)
{ if (!currentItem.tagName || currentItem.tagName.toLowerCase () != 'a')
continue; item[1] = currentItem.innerHTML; item[2] = currentItem.href; item[3] = currentItem.target; item[4] = currentItem.title; if (item[4] == '')
item[4] = null; break;}
for (; currentItem; currentItem = currentItem.nextSibling)
{ if (!currentItem.tagName || currentItem.tagName.toLowerCase () != 'ul')
continue; var subMenuItems = cmDrawFromTextSubMenu (currentItem); for (i = 0; i < subMenuItems.length; ++i)
item[i + 5] = subMenuItems[i]; break;}
items[items.length] = item;}
return items;}
function cmItemMouseOver (obj, prefix, isMain, idSub, index)
{ clearTimeout (_cmTimeOut); if (!obj.cmPrefix)
{ obj.cmPrefix = prefix; obj.cmIsMain = isMain;}
var thisMenu = cmGetThisMenu (obj, prefix); if (!thisMenu.cmItems)
thisMenu.cmItems = new Array (); var i; for (i = 0; i < thisMenu.cmItems.length; ++i)
{ if (thisMenu.cmItems[i] == obj)
break;}
if (i == thisMenu.cmItems.length)
{ thisMenu.cmItems[i] = obj;}
if (_cmCurrentItem)
{ if (_cmCurrentItem == obj || _cmCurrentItem == thisMenu)
{ var item = _cmItemList[index]; cmSetStatus (item); return;}
var thatPrefix = _cmCurrentItem.cmPrefix; var thatMenu = cmGetThisMenu (_cmCurrentItem, thatPrefix); if (thatMenu != thisMenu.cmParentMenu)
{ if (_cmCurrentItem.cmIsMain)
_cmCurrentItem.className = thatPrefix + 'MainItem'; else
_cmCurrentItem.className = thatPrefix + 'MenuItem'; if (thatMenu.id != idSub)
cmHideMenu (thatMenu, thisMenu, thatPrefix);}
}
_cmCurrentItem = obj; cmResetMenu (thisMenu, prefix); var item = _cmItemList[index]; var isDefaultItem = cmIsDefaultItem (item); if (isDefaultItem)
{ if (isMain)
obj.className = prefix + 'MainItemHover'; else
obj.className = prefix + 'MenuItemHover';}
cmSetStatus (item);}
function cmItemMouseOverOpenSub (obj, prefix, isMain, idSub, orient, index)
{ cmItemMouseOver (obj, prefix, isMain, idSub, index); if (idSub)
{ var subMenu = cmGetObject (idSub); cmShowSubMenu (obj, prefix, subMenu, orient);}
}
function cmItemMouseOut (obj, delayTime)
{ if (!delayTime)
delayTime = _cmNodeProperties.delay; _cmTimeOut = window.setTimeout ('cmHideMenuTime ()', delayTime); window.defaultStatus = '';}
function cmItemMouseDown (obj, index)
{ if (cmIsDefaultItem (_cmItemList[index]))
{ if (obj.cmIsMain)
obj.className = obj.cmPrefix + 'MainItemActive'; else
obj.className = obj.cmPrefix + 'MenuItemActive';}
}
function cmItemMouseDownOpenSub (obj, index, prefix, orient, idSub)
{ cmItemMouseDown (obj, index); if (idSub)
{ var subMenu = cmGetObject (idSub); cmShowSubMenu (obj, prefix, subMenu, orient);}
}
function cmItemMouseUp (obj, index)
{ var item = _cmItemList[index]; var link = null, target = '_self'; if (item.length > 2)
link = item[2]; if (item.length > 3 && item[3])
target = item[3]; if (link != null)
{ window.open (link, target);}
var prefix = obj.cmPrefix; var thisMenu = cmGetThisMenu (obj, prefix); var hasChild = (item.length > 5); if (!hasChild)
{ if (cmIsDefaultItem (item))
{ if (obj.cmIsMain)
obj.className = prefix + 'MainItem'; else
obj.className = prefix + 'MenuItem';}
cmHideMenu (thisMenu, null, prefix);}
else
{ if (cmIsDefaultItem (item))
{ if (obj.cmIsMain)
obj.className = prefix + 'MainItemHover'; else
obj.className = prefix + 'MenuItemHover';}
}
}
function cmMoveSubMenu (obj, subMenu, orient)
{ var mode = String (orient); var p = subMenu.offsetParent; var subMenuWidth = cmGetWidth (subMenu); var horiz = cmGetHorizontalAlign (obj, mode, p, subMenuWidth); if (mode.charAt (0) == 'h')
{ if (mode.charAt (1) == 'b')
subMenu.style.top = (cmGetYAt (obj, p) + cmGetHeight (obj)) + 'px'; else
subMenu.style.top = (cmGetYAt (obj, p) - cmGetHeight (subMenu)) + 'px'; if (horiz == 'r')
subMenu.style.left = (cmGetXAt (obj, p)) + 'px'; else
subMenu.style.left = (cmGetXAt (obj, p) + cmGetWidth (obj) - subMenuWidth) + 'px';}
else
{ if (horiz == 'r')
subMenu.style.left = (cmGetXAt (obj, p) + cmGetWidth (obj)) + 'px'; else
subMenu.style.left = (cmGetXAt (obj, p) - subMenuWidth) + 'px'; if (mode.charAt (1) == 'b')
subMenu.style.top = (cmGetYAt (obj, p)) + 'px'; else
subMenu.style.top = (cmGetYAt (obj, p) + cmGetHeight (obj) - cmGetHeight (subMenu)) + 'px';}
}
function cmGetHorizontalAlign (obj, mode, p, subMenuWidth)
{ var horiz = mode.charAt (2); if (!(document.body))
return horiz; var body = document.body; var browserLeft; var browserRight; if (window.innerWidth)
{ browserLeft = window.pageXOffset; browserRight = window.innerWidth + browserLeft;}
else if (body.clientWidth)
{ browserLeft = body.clientLeft; browserRight = body.clientWidth + browserLeft;}
else
return horiz; if (mode.charAt (0) == 'h')
{ if (horiz == 'r' && (cmGetXAt (obj) + subMenuWidth) > browserRight)
horiz = 'l'; if (horiz == 'l' && (cmGetXAt (obj) + cmGetWidth (obj) - subMenuWidth) < browserLeft)
horiz = 'r'; return horiz;}
else
{ if (horiz == 'r' && (cmGetXAt (obj, p) + cmGetWidth (obj) + subMenuWidth) > browserRight)
horiz = 'l'; if (horiz == 'l' && (cmGetXAt (obj, p) - subMenuWidth) < browserLeft)
horiz = 'r'; return horiz;}
}
function cmShowSubMenu (obj, prefix, subMenu, orient)
{ if (!subMenu.cmParentMenu)
{ var thisMenu = cmGetThisMenu (obj, prefix); subMenu.cmParentMenu = thisMenu; if (!thisMenu.cmSubMenu)
thisMenu.cmSubMenu = new Array (); thisMenu.cmSubMenu[thisMenu.cmSubMenu.length] = subMenu;}
cmMoveSubMenu (obj, subMenu, orient); subMenu.style.visibility = 'visible'; if (document.all)
{ if (!subMenu.cmOverlap)
subMenu.cmOverlap = new Array (); cmHideControl ("IFRAME", subMenu); cmHideControl ("SELECT", subMenu); cmHideControl ("OBJECT", subMenu);}
}
function cmResetMenu (thisMenu, prefix)
{ if (thisMenu.cmItems)
{ var i; var str; var items = thisMenu.cmItems; for (i = 0; i < items.length; ++i)
{ if (items[i].cmIsMain)
str = prefix + 'MainItem'; else
str = prefix + 'MenuItem'; if (items[i].className != str)
items[i].className = str;}
}
}
function cmHideMenuTime ()
{ if (_cmCurrentItem)
{ var prefix = _cmCurrentItem.cmPrefix; cmHideMenu (cmGetThisMenu (_cmCurrentItem, prefix), null, prefix); _cmCurrentItem = null;}
}
function cmHideMenu (thisMenu, currentMenu, prefix)
{ var str = prefix + 'SubMenu'; if (thisMenu.cmSubMenu)
{ var i; for (i = 0; i < thisMenu.cmSubMenu.length; ++i)
{ cmHideSubMenu (thisMenu.cmSubMenu[i], prefix);}
}
while (thisMenu && thisMenu != currentMenu)
{ cmResetMenu (thisMenu, prefix); if (thisMenu.className == str)
{ thisMenu.style.visibility = 'hidden'; cmShowControl (thisMenu);}
else
break; thisMenu = cmGetThisMenu (thisMenu.cmParentMenu, prefix);}
}
function cmHideSubMenu (thisMenu, prefix)
{ if (thisMenu.style.visibility == 'hidden')
return; if (thisMenu.cmSubMenu)
{ var i; for (i = 0; i < thisMenu.cmSubMenu.length; ++i)
{ cmHideSubMenu (thisMenu.cmSubMenu[i], prefix);}
}
cmResetMenu (thisMenu, prefix); thisMenu.style.visibility = 'hidden'; cmShowControl (thisMenu);}
function cmHideControl (tagName, subMenu)
{ var x = cmGetX (subMenu); var y = cmGetY (subMenu); var w = subMenu.offsetWidth; var h = subMenu.offsetHeight; var i; for (i = 0; i < document.all.tags(tagName).length; ++i)
{ var obj = document.all.tags(tagName)[i]; if (!obj || !obj.offsetParent)
continue; var ox = cmGetX (obj); var oy = cmGetY (obj); var ow = obj.offsetWidth; var oh = obj.offsetHeight; if (ox > (x + w) || (ox + ow) < x)
continue; if (oy > (y + h) || (oy + oh) < y)
continue; if(obj.style.visibility == "hidden")
continue; subMenu.cmOverlap[subMenu.cmOverlap.length] = obj; obj.style.visibility = "hidden";}
}
function cmShowControl (subMenu)
{ if (subMenu.cmOverlap)
{ var i; for (i = 0; i < subMenu.cmOverlap.length; ++i)
subMenu.cmOverlap[i].style.visibility = "";}
subMenu.cmOverlap = null;}
function cmGetThisMenu (obj, prefix)
{ var str1 = prefix + 'SubMenu'; var str2 = prefix + 'Menu'; while (obj)
{ if (obj.className == str1 || obj.className == str2)
return obj; obj = obj.parentNode;}
return null;}
function cmIsDefaultItem (item)
{ if (item == _cmSplit || item[0] == _cmNoAction || item[0] == _cmNoClick)
return false; return true;}
function cmGetObject (id)
{ if (document.all)
return document.all[id]; return document.getElementById (id);}
function cmGetWidth (obj)
{ var width = obj.offsetWidth; if (width > 0 || !cmIsTRNode (obj))
return width; if (!obj.firstChild)
return 0; return obj.lastChild.offsetLeft - obj.firstChild.offsetLeft + cmGetWidth (obj.lastChild);}
function cmGetHeight (obj)
{ var height = obj.offsetHeight; if (height > 0 || !cmIsTRNode (obj))
return height; if (!obj.firstChild)
return 0; return obj.firstChild.offsetHeight;}
function cmGetX (obj)
{ var x = 0; do
{ x += obj.offsetLeft; obj = obj.offsetParent;}
while (obj); return x;}
function cmGetXAt (obj, elm)
{ var x = 0; while (obj && obj != elm)
{ x += obj.offsetLeft; obj = obj.offsetParent;}
if (obj == elm)
return x; return x - cmGetX (elm);}
function cmGetY (obj)
{ var y = 0; do
{ y += obj.offsetTop; obj = obj.offsetParent;}
while (obj); return y;}
function cmIsTRNode (obj)
{ var tagName = obj.tagName; return tagName == "TR" || tagName == "tr" || tagName == "Tr" || tagName == "tR";}
function cmGetYAt (obj, elm)
{ var y = 0; if (!obj.offsetHeight && cmIsTRNode (obj))
{ var firstTR = obj.parentNode.firstChild; obj = obj.firstChild; y -= firstTR.firstChild.offsetTop;}
while (obj && obj != elm)
{ y += obj.offsetTop; obj = obj.offsetParent;}
if (obj == elm)
return y; return y - cmGetY (elm);}
function cmSetStatus (item)
{ var descript = ''; if (item.length > 4)
descript = (item[4] != null) ? item[4] : (item[2] ? item[2] : descript); else if (item.length > 2)
descript = (item[2] ? item[2] : descript); window.defaultStatus = descript;}
function cmGetProperties (obj)
{ if (obj == undefined)
return 'undefined'; if (obj == null)
return 'null'; var msg = obj + ':\n'; var i; for (i in obj)
msg += i + ' = ' + obj[i] + '; '; return msg;}
var cmThemeOfficeBase = '../includes/js/ThemeOffice/';
var cmThemeOffice ={mainFolderLeft: '&nbsp;',mainFolderRight: '&nbsp;',mainItemLeft: '&nbsp;',mainItemRight: '&nbsp;',folderLeft: '<img alt="" src="' + cmThemeOfficeBase + 'spacer.png">',folderRight: '<img alt="" src="' + cmThemeOfficeBase + 'arrow.png">',itemLeft: '<img alt="" src="' + cmThemeOfficeBase + 'spacer.png">',itemRight: '<img alt="" src="' + cmThemeOfficeBase + 'blank.png">',mainSpacing: 0,subSpacing: 0,delay: 500};
var cmThemeOfficeHSplit = [_cmNoAction, '<td class="ThemeOfficeMenuItemLeft"></td><td colspan="2"><div class="ThemeOfficeMenuSplit"></div></td>'];
var cmThemeOfficeMainHSplit = [_cmNoAction, '<td class="ThemeOfficeMainItemLeft"></td><td colspan="2"><div class="ThemeOfficeMenuSplit"></div></td>'];
var cmThemeOfficeMainVSplit = [_cmNoAction, '&nbsp;'];