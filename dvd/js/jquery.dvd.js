// JavaScript Document

$(document).ready(function() {

  $(document).ajaxStop($.unblockUI());

   function fld_double(obj,curid){            
      var queryp=$(obj).val().toLowerCase();
      var fieldobj=obj;
      $.get('./tools/distinctfield.php?&t=dvd&f=title&as=Id&q='+queryp, function(data) {        
        var datatable=data.split('\\n');
        if(data!='' && datatable.length==1){
          dataalias=data.split('|');
          if(dataalias[0].toLowerCase()==queryp & dataalias[1]!=curid){/*alert('Find a double : \\n'+data);*/$(fieldobj).addClass('errordbl')}
          else { $(fieldobj).removeClass('errordbl')}
        }
        else { $(fieldobj).removeClass('errordbl')} 
        });
   }
  
  //trim some fields when past from IMDB
  $('#Genres, #Countries').blur(function (){
  fldvals=$(this).val().split(' | ');
  fldvalstr=fldvals.join(',');
  //$(this).val(fldvalstr.split(' ').join(''));//remove cause we can enter phrases with spaces ...
  $(this).val(fldvalstr);
  }
  );
  //allow textarea resizing
  if (jQuery.ui) {if (!$.browser.opera) { $( 'textarea' ).resizable({ handles: 's' });}}
  
  
  function getIMDBAPIifo(text){
  urlimdbjsonp='http://www.imdbapi.com/?t='+escape(text);   
  $.ajax({url: urlimdbjsonp, dataType: 'jsonp',jsonpCallback: 'imdbapi',success: function(data) {      
  		if (data.Title!=undefined) {
  		  if (data.Poster!='') var newwp=window.open(data.Poster,'_blank');
        return data; 			
  			} else {
  			//if (data.error) {alert('\''+text+'\' : '+data.error)}else {alert('Title \''+text+'\' is not found !!!')}
        return '';
  			}
          			                   }
  	}  	
  	);//ending $.ajax
  }
  
  function getIMDBifo(text){
  //urlimdbjsonp='http://www.imdbapi.com/?t='+escape(text);
  urlimdbjsonp='http://www.deanclatworthy.com/imdb/?q='+escape(text)+'&type=jsonp';
  
  $.blockUI(waitmsgajaxreq);
  $.ajax({url: urlimdbjsonp, dataType: 'jsonp',jsonpCallback: 'imdbapi',success: function(data) {
  		if (data.title!=undefined) {
  			document.getElementById('Title_en').value=data.title;
  			document.getElementById('IMDB_url').value=data.imdburl;
  			document.getElementById('Countries').value=data.country;
  			document.getElementById('Genres').value=data.genres;
  			document.getElementById('IMDB_rating').value=data.rating;
  			document.getElementById('Year').value=data.year;
  			} else {
  			if (data.error) {alert('\''+text+'\' : '+data.error)}
  			else {alert('Title \''+text+'\' is not found !!!')}
  			}
  			$.unblockUI()
  										}
  	}  	
  	);//ending $.ajax
  }
  
  function getIMDBinfo(fldtitlename){
  var fldobj=document.getElementById(fldtitlename);
    
    $.translate.ready(function(){
      bingAppId='8FB28A507106655ED324C35E983A131949B89E59';
      $.translate.load(bingAppId);
      var languageFrom = 'fr';
      var languageTo = 'en';
      $.translate( fldobj.value, languageFrom, languageTo, {     
      complete: function(){
      var text = this.translation;
      getIMDBifo(text);
    	}
    	,error: function(){alert('Sorry, no traduction is available for \''+this.source+'\'.');}
    	,onTimeout: function(){alert('Sorry, timeout has occured when trying to translate \''+this.source+'\'.');}
    	,timeout: 3000  	
  	 });
    });
  
  }
  $('#btnIMDBTitle').click(function (){getIMDBinfo('Title');});
  $('#btnIMDBTitleEN').click(function (){getIMDBinfo('Title_en');});

});