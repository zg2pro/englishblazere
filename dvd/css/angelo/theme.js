/*!
 * jquery.anim.god v1.1.7
 * jQuery JavaScript Library for jQuery v1.4.2 or more
 * http://jquery.com/
 *
 * Copyright 2011, Patrice CHASSAING
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://p.chas.free.fr/
 *
 * Date: Mon Apr 06 06:06:06 2011 +0100
 */

//http://feather.elektrum.org/book/src.html
var scripts = document.getElementsByTagName('script');
var myScript = scripts[ scripts.length - 1 ];

var queryString = myScript.src.replace(/^[^\?]+\??/,'');

var params = parseQuery( queryString );

function parseQuery ( query ) {
   var Params = new Object ();
   if ( ! query ) return Params; // return empty object
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) continue;
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;
   }
   return Params;
}


 
/*  WORLD ANIMATION FUNCTIONS */
var windowwidth;
//jQuery.noConflict();
if (!ppathimages) {var ppathimages=params['scpath']+'/';}
var this_is_the_night=false;
var this_is_the_wrath_of_God=false;


function reversesign(sign){
if (sign=='-'){return '+'} else {return '-'}
}

function objmoveinscreen(objid,hmvtsign,vmvtsign) {
  $this=$('#' + objid);
  
  postopmore =  $this.offset().top;
  
  if ( postopmore < $(window).scrollTop() || postopmore < 26*3 ) {  
  //object are upper than user position in window
  //it must go to the bottom
     if (vmvtsign=='-') vmvtsign=reversesign(vmvtsign);
  }else{
  //object are lower than user position in window
  //it must go to the top
     if (vmvtsign=='+') vmvtsign=reversesign(vmvtsign);
  }
    
  
	$this.animate({
		left: hmvtsign+'=390',
		top: vmvtsign+'=45'
	}, 6000, function () {
		// Animation complete.    
		posleftmore = $(this).offset().left;		
		widthobj = $(this).width();
		posrightmore = $(this).offset().left+widthobj;
		if (posleftmore > 0 && posrightmore < windowwidth) {
			objmoveinscreen(objid,hmvtsign,vmvtsign);
		}
		else if (posleftmore < 0){
      if (hmvtsign=='-') hmvtsign= reversesign(hmvtsign);
      objmoveinscreen(objid,hmvtsign,vmvtsign);
    }
    else if (posrightmore > windowwidth){
      if (hmvtsign=='+') hmvtsign= reversesign(hmvtsign);
      objmoveinscreen(objid,hmvtsign,vmvtsign);
    }
		else {
			var randomtop = Math.floor(Math.random() * 200);
			var randomleft = $(this).outerWidth() + Math.floor(Math.random() * 180);
			$(this).offset({
				top: randomtop,
				left: -randomleft
			});
			objmoveinscreen(objid,hmvtsign,vmvtsign);
		}
	});
}

/* anim world */
/* move the clouds */
function cloudsmove(objid,limitright) {
	$('#' + objid).animate({
		left: '+=380'
	}, 25000, 'linear', function () {
		// Animation complete.    
		posleftmore = $(this).offset().left;
		if (posleftmore < limitright) {
			cloudsmove(objid,limitright);
		}
		else {
			var randomtop = Math.floor(Math.random() * (windowheight/2));
			var randomleft = $(this).outerWidth() + Math.floor(Math.random() * 180);
			$(this).offset({
				top: randomtop,
				left: -randomleft
			});
			cloudsmove(objid,limitright);
		}
	});
}

/* change the light */

function nighteffect(opacityfinal){
		//$('.cloud').css('background', 'url('+ppathimages+'images/cloud_night.gif) repeat top left');		
    $('#night').height(windowheight);
    //$('#night').width($(window).width());
		$('#night').fadeTo(0, opacityfinal);
}

function dayeffect(opacityfinal){
		//$('.cloud').css('background', 'url('+ppathimages+'images/cloud_night.gif) repeat top left');    
		$('#night').height(0);
    $('#night').fadeTo(0, opacityfinal);
		
}

function daylight() {
	var currentTime = new Date();
	var currentTimeYY = currentTime.getFullYear();
	var currentTimeMM = currentTime.getMonth();
	var currentTimeDD = currentTime.getDate();
	var currentTimehh = currentTime.getHours();
	var currentTimemin = currentTime.getMinutes();
	var currentTimess = currentTime.getMinutes();
	var ctJTms = currentTime.getTime(); //ms

	var nightbeginhh = 19;
	var nightendhh = 07;
	var nightlentghhh = ((24 - nightbeginhh) + nightendhh);

  if (nightbeginhh < nightendhh) {
		nightbeginTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD, nightbeginhh, currentTimemin, currentTimess);
		nightendTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD, nightendhh, currentTimemin, currentTimess);
	}
	else if (currentTimehh > nightbeginhh && ( currentTimehh <= 23 && currentTimemin <=59 && currentTimess <=59 ) ) {
		nightbeginTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD, nightbeginhh, currentTimemin, currentTimess);
		nightendTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD + 1, nightendhh, currentTimemin, currentTimess);
	} else {
		nightbeginTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD - 1, nightbeginhh, currentTimemin, currentTimess);
		nightendTime = new Date(currentTimeYY, currentTimeMM, currentTimeDD, nightendhh, currentTimemin, currentTimess);
	}

	var nightbeginJTms = nightbeginTime.getTime();
	var nightendJTms = nightendTime.getTime();

	if ( ctJTms > nightbeginJTms && ctJTms < nightendJTms  ) {
	  	
		nightmidJTms = nightbeginJTms + ((nightendJTms - nightbeginJTms) / 2);
		
		if (ctJTms>nightmidJTms) {
    nightelapsedtimepercent= 100 * ((ctJTms - nightmidJTms) / (nightendJTms - nightmidJTms));
    opacityfinal = 100 - (nightelapsedtimepercent);
    } 
    else {
    nightelapsedtimepercent= 100 * ((ctJTms - nightbeginJTms) / (nightmidJTms - nightbeginJTms));
    opacityfinal = nightelapsedtimepercent;
    }
		
		opacityfinal = parseInt(opacityfinal) / 100; //gives a %		
		if (!this_is_the_night){
		$('.god').css('display', 'none');
		$('#sunnb1').css('display', 'none');
		$('#moonnb1').css('display', 'block');
		}
		
    nighteffect(opacityfinal);
    //if ($('.clouddayl').length > 0) {$('.clouddayl').toggleClass( 'cloudnight')}
    this_is_the_night=true;
	}
	else{	  
	  if (this_is_the_night){ 
	  $('#moonnb1').css('display', 'none');
	  $('.god').css('display', 'block');
    $('#sunnb1').css('display', 'block');
    dayeffect(0);}		
    //$('.cloud').css('background', 'url('+ppathimages+'images/cloud.gif) repeat top left');
    if ($('.cloudnight').length > 0) {$('.cloudnight').removeClass( 'cloudnight')}
    this_is_the_night=false;
  }
  
	//Infinite Relaunch   
	var t = setTimeout("daylight()", 25000);
}


function birdmove(){
    $('body').append('<img id="fbpax" src="'+ppathimages+'images/fb-dwolive.gif" width="50" alt="pax">');
  $('#fbpax').css('left',windowwidth);
  $('#fbpax').animate({
		  left: '-='+2*windowwidth
	     }, 50000, 'linear', function(){$(this).remove()}
    );
	var t = setTimeout("birdmove()", 900000);
}


//deluge
var cloudmax=46;
function cloud_add(x,y){
  nb=$('.cloud').length+1;
  cloudid='cloudnb'+nb;  
  $('body').append('<div id="'+cloudid+'" class="cloud cloudrain" style="width:267px;height:200px;position:absolute;top:'+y+'px;left:'+x+'px;z-index:998;"></div>');
  //cloudsmove(cloudid,windowwidth);
  
  opacityfinal=70-((100/nb)); 
  opacityfinal = parseInt(opacityfinal) / 100; //gives a %
  
  nighteffect(opacityfinal);
    
  wrath_of_God();
  
}
var cloudx=-80;
var cloudy=-80;
var nbcloudx=0;
function wrath_of_God(){
  if ( $('.cloud').length <= cloudmax) {
    nbcloudx=$('.cloud').length+1;
    if ( ((nbcloudx*133)-480) > (windowwidth) ) { nbcloudx = 0;cloudy=cloudy+30;};
    cloudx=((nbcloudx*133)-480);
    var cld1 = setTimeout("cloud_add("+cloudx+","+cloudy+")", 500);
    var cld2 = setTimeout("cloud_add("+cloudx+","+(cloudy+60)+")", 500);
    var cld3 = setTimeout("cloud_add("+cloudx+","+(cloudy+120)+")", 500);
  }  
  $('.god').css('z-index','999');
  return true;                      
}


function forgiveness_of_God(){
    $('.cloudrain').remove();
    cloudx=-80;
    cloudy=-80;
    nbcloudx=0;
    if (!this_is_the_night) dayeffect(0);
}

//  ACTIVITY
var noactivitymin=10;//minutes

var lastActivityDateTime = null;
 function checkActivity() {     
         var currentTime = new Date();
         var diff = -(lastActivityDateTime.getTime( ) - currentTime.getTime( ));
         //window.status=(diff/1000).toString()+'s';     
          if ( diff >= noactivitymin*60*1000)     {         
              //user wasn't active;         ...
              if (!this_is_the_wrath_of_God) {$('body').css('overflow','hidden');this_is_the_wrath_of_God=wrath_of_God();}   
            }
            else{
            if (this_is_the_wrath_of_God) {$('body').css('overflow','auto');forgiveness_of_God();this_is_the_wrath_of_God=false;}
            }     
          setTimeout( checkActivity , noactivitymin*60*1000);
          }
   
 // for first time we setup for 1 min.   
 // for each event define handler and inside update global timer 
   
 function handler() {    lastActivityDateTime = new Date(); } 
 
$(document).ready(function () {	
	windowwidth = $(window).width();	
	windowheight = document.body.scrollHeight;	
	
	//special wordpress
	$('#wrapper').css('z-index','200');
		
	//create world
	$('body').append('<div id="god-face" class="god" ></div>');
	$('body').append('<div id="cloudnb1" class="cloud clouddayl nb1" ></div>');
	$('body').append('<div id="cloudnb2" class="cloud clouddayl nb2" ></div>');
	$('body').append('<div id="sunnb1" class="sun"></div><div id="moonnb1" class="moon"></div>');	
  $('body').append('<div id="night"></div>');
  
  //change light with time  
  //var t = setTimeout("daylight()", 0);
  
  birdmove();
     
	$('.god').each(function (index) {		objmoveinscreen(this.id,'-','+')	});
	$('.cloud').each(function (index) {		cloudsmove(this.id,windowwidth)	});
	
	//wrath of God when user is sleeping ;)
  /*	
	handler();
	$( "body").bind( 'mousemove', handler);
  setTimeout( checkActivity, 1000 );	
	*/
});
