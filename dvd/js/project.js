/*
 * js/project.js
 * 
 *
 * Copyright (c) 2010-2011 Patrice Chassaing
 * Not licensed at all.
 * http://p.chas.online.fr
 *
 * Date: 2011-08-09 13:13:21 -0500
 * Revision: xxxx
 */

//check input functions
function CheckAll(Act)
{
var IsCheck = Act.value=="Check all"?true:false;
var oColl = document.getElementsByName("POPUP_VALUES_LIST" );
for (i=0;i<oColl.length;i++){oColl.item(i).checked = IsCheck;}
if (IsCheck===true) {Act.style.backgroundImage='url(./radioCheck_off.gif)';}
else{Act.style.backgroundImage='url(./radioCheck_on.gif)';}
return IsCheck?"Uncheck All":"Check all";
}

function UnCheckAllex( idInput, ValueInput )
{
var oColl = document.getElementsByName( idInput );
for (i=0;i<oColl.length;i++)
 {oColl.item(i).checked = false;}
 oColl.item(ValueInput).checked = true;
}

function UnCheckAll( idInput )
{
var oColl = document.getElementsByName( idInput );
for (i=0;i<oColl.length;i++)
 {oColl.item(i).checked = false;}
}

//Generic Open Window
function makePopup(url, width, height, overflow)
{
if (width > 640) { width = 640; }
if (height > 480) { height = 480; }
if (overflow === '' || !/^(scroll|resize|both)$/.test(overflow))
{
overflow = 'both';
}
var win = window.open(url, '',
'width=' + width + ',height=' + height+ ',scrollbars=' + (/^(scroll|both)$/.test(overflow) ?
'yes' : 'no')+ ',resizable=' + (/^(resize|both)$/.test(overflow) ?'yes' : 'no')+ ',status=yes,toolbar=no,menubar=no,location=no');
return win;
}
//Advanced Open Window
function makePopupAdv(url, title, width, height, overflow, otherparameters)
{
if (width > 640) { width = 640; }
if (height > 480) { height = 480; }
if (overflow === '' || !/^(scroll|resize|both)$/.test(overflow)){overflow = 'both';}
var win = window.open(url, title,'width=' + width + ',height=' + height+ ',scrollbars=' + (/^(scroll|both)$/.test(overflow) ?'yes' : 'no')+ ',resizable=' + (/^(resize|both)$/.test(overflow) ?'yes' : 'no')+ otherparameters);
return win;
}


//Theming functions
function addThemeSwitcherTool(){
$(document).ready(function () {
    htmltoinsert='<script>$(document).ready(function(){$("#switcher").themeswitcher({loadTheme: "Swanky Purse"});});</script><div id="switcher" style="position:absolute;top:0;right:320px;"></div>';
    if (document.getElementById('userinfo')==null) {$('body').append(htmltoinsert);}
    else{$('#datebanner').append(htmltoinsert);}    
});
}
