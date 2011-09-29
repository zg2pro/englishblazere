<!--

/*
Configure menu styles below
NOTE: To edit the link colors, go to the STYLE tags and edit the ssm2Items colors
*/
YOffset=150; // no quotes!!
XOffset=0;
staticYOffset=30; // no quotes!!
slideSpeed=50 // no quotes!!
waitTime=2000; // no quotes!! this sets the time the menu stays out for after the mouse goes off it.
menuBGColor="black";
menuIsStatic="yes"; //this sets whether menu should stay static on the screen
menuWidth=600; // Must be a multiple of 10! no quotes!!
menuCols=2;
hdrFontFamily="verdana";
hdrFontSize="2";
hdrFontColor="white";
hdrBGColor="#f3f3f3";
hdrAlign="left";
hdrVAlign="center";
hdrHeight="100";
linkFontFamily="Verdana";
linkFontSize="2";
linkBGColor="white";
linkOverBGColor="#f3f3f3";
linkTarget="_top";
linkAlign="Left";
barBGColor="#444444";
barFontFamily="Verdana";
barFontSize="2";
barFontColor="white";
barVAlign="center";
barWidth=30; // no quotes!!
barText="HELLO"; // <IMG> tag supported. Put exact html for an image to show.

///////////////////////////
/*
ifrm = document.createElement("IFRAME");
ifrm.setAttribute("src", "../SWF/handguide.html");
ifrm.style.width = 600+"px";
ifrm.style.height = 100+"px";
*/ 
// ssmItems[...]=[name, link, target, colspan, endrow?] - leave 'link' and 'target' blank to make a header
//ssmItems[0]=["Menu"] //create header
//ssmItems[0]=[ifrm] //create header


buildMenu();

//-->