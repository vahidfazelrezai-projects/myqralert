function runPopup() {
	mylink = 'popup.html';
	windowname = 'popup';
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, 'width=400,height=400,scrollbars=no');
	return false;
}