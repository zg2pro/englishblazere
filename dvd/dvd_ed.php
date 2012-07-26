<?php
/**
 * DVD ADD management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

//for multiple hide we change some css 
if (isset($_GET["ifr"])) {$PGE_HEAD_CSS_STYLES=	'<style type="text/css">
body, body.window,body.window form{background-image:none;}
body, body.window,body.window form, fieldset{border:none;margin:0;padding:0;}
legend{display:none;}
</style>';}
 
$PGE_HEAD_JS_SCRIPTS='<script type="text/javascript" src="js/jquery.translate.js"></script>';
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS.'<script type="text/javascript" src="js/jquery.dvd.js"></script>';

if (isset($_GET["id"])) {$Id=$_GET["id"];} else {$Id=0;};

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
$(document).ready(function() {  

   $('#Title').keyup(function (){fld_double(this,$Id)});
   $('#Title_en').keyup(function (){fld_double(this,$Id)});
   
});
</script>";

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
var TTS=false;

function SaveForm() {
	var fieldstocontrol = new Array('Title');
	if (FormIsValid(fieldstocontrol) === true) {
	  $.blockUI(waitmsgsave);
		return true;
	} else {
		return false;
	};
}

function SaveOrNot(TTS) {
  if (TTS!=true) return true;
	if (SaveForm()) {
		return true;
	}
	else {
		return false;
	}
};
//--></script>   ";

include 'includes/header0.php';
?>
<body class="window">
<?php

//RECORD WORKFLOW DATES
$rec_dtcrt="";
$rec_dtmod="";


$ValueTitle		="";
$ValueScore		="";
$ValueYear		="";
$ValueSound		="";
$ValueMore		="";
$ValueComments	="";

$ValueTitle_en	="";
$ValueGenres	="";
$ValueCountries	="";
$ValueIMDB_url	="";
$ValueIMDB_rating="";

$MediaTypeFormat="";
$MediaVideoFormat="";
$MediaAudioFormat="";

$SRIPTACTION=$_GET["a"];

$inputmode="";
$formaction="";

if ($SRIPTACTION==="em") {
	//MODIFY

	$Id=$_GET["id"];
	$IdT=explode(",",$Id);

  //SECURITY CONTROL
secur__actioncontrol('</body></html>');

  //$formaction="dvd_ed.php?&a=".$SRIPTACTION."&id=".$Id;
  //$formaction="dvd_ed.php?&a=m&id=".$Id;
  $formaction="dvd_ed.php?&a=m";

	//SQL REQUEST :
	$query = "SELECT $SQL_TABLE_DVD_NAME.*, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaTypeFormat`, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaVideoFormat`, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaAudioFormat` 
   FROM $SQL_TABLE_DVD_NAME 
   LEFT OUTER JOIN $SQL_TABLE_DVD_MEDIAINFO_NAME ON ($SQL_TABLE_DVD_NAME.`Id`=$SQL_TABLE_DVD_MEDIAINFO_NAME.`Id_Movie`) 
   WHERE $SQL_TABLE_DVD_NAME.`Id`=".implode($IdT," OR $SQL_TABLE_DVD_NAME.`Id`=").";";
   
	//PROCEED TO SQL :
	$res_query = mysql_query($query) or mysql_errorget('',$query);
  
	//READING THE RECORDSET :
	$ri=0;
	while($rs=mysql_fetch_array($res_query))
	{
	$ri=$ri+1;	
	if ($ri==1) {
    $ValueTitle		=datasforHTML($rs["Title"]);
		$ValueScore		=datasforHTML($rs["Score"]);
		$ValueYear		=datasforHTML($rs["Year"]);
		$ValueSound		=datasforHTML($rs["Sound"]);
		$ValueMore		=datasforHTML($rs["More"]);
		$ValueComments	=datasforHTML($rs["Comments"]);
		$ValueTitle_en	=datasforHTML($rs["Title_en"]);
		$ValueGenres	=datasforHTML($rs["Genres"]);
		$ValueCountries	=datasforHTML($rs["Countries"]);
		$ValueIMDB_url	=datasforHTML($rs["IMDB_url"]);
		$ValueIMDB_rating=datasforHTML($rs["IMDB_rating"]);
		$rec_dtcrt=datasforHTML($rs["DT_CRT"]);
		$rec_dtmod=datasforHTML($rs["DT_MOD"]);
		
		$MediaTypeFormat=datasforHTML($rs["MediaTypeFormat"]);
		$MediaVideoFormat=datasforHTML($rs["MediaVideoFormat"]);
		$MediaAudioFormat=datasforHTML($rs["MediaAudioFormat"]);
  }else{
  
		if ($ValueTitle==$rs["Title"]) {$ValueTitle		=datasforHTML($rs["Title"]);} else {$ValueTitle="";};
		if ($ValueScore==$rs["Score"]) {$ValueScore		=datasforHTML($rs["Score"]);}                                          else {$ValueScore="";};
		if ($ValueYear==$rs["Year"]) {$ValueYear		=datasforHTML($rs["Year"]);}                                             else {$ValueYear="";};
		if ($ValueSound==$rs["Sound"]) {$ValueSound		=datasforHTML($rs["Sound"]);}                                          else {$ValueSound="";};
		if ($ValueMore==$rs["More"]) {$ValueMore		=datasforHTML($rs["More"]);}                                             else {$ValueMore="";};
		if ($ValueComments==$rs["Comments"]) {$ValueComments	=datasforHTML($rs["Comments"]);}                               else {$ValueComments="";};
		if ($ValueTitle_en==$rs["Title_en"]) {$ValueTitle_en	=datasforHTML($rs["Title_en"]);}                               else {$ValueTitle_en="";};
		if ($ValueGenres==$rs["Genres"]) {$ValueGenres	=datasforHTML($rs["Genres"]);}                                       else {$ValueGenres="";};
		if ($ValueCountries==$rs["Countries"]) {$ValueCountries	=datasforHTML($rs["Countries"]);}                            else {$ValueCountries="";};
		if ($ValueIMDB_url==$rs["IMDB_url"]) {$ValueIMDB_url	=datasforHTML($rs["IMDB_url"]);}                               else {$ValueIMDB_url="";};
		if ($ValueIMDB_rating==$rs["IMDB_rating"]) {$ValueIMDB_rating=datasforHTML($rs["IMDB_rating"]);}                     else {$ValueIMDB_rating="";};
		if ($rec_dtcrt==$rs["DT_CRT"]) {$rec_dtcrt=datasforHTML($rs["DT_CRT"]);}                                             else {$rec_dtcrt="";};
		if ($rec_dtmod==$rs["DT_MOD"]) {$rec_dtmod=datasforHTML($rs["DT_MOD"]);}                                             else {$rec_dtmod="";};
		
		if ($MediaTypeFormat==$rs["MediaTypeFormat"]) {$MediaTypeFormat=datasforHTML($rs["MediaTypeFormat"]);}               else {$MediaTypeFormat="";};
		if ($MediaVideoFormat==$rs["MediaVideoFormat"]) {$MediaVideoFormat=datasforHTML($rs["MediaVideoFormat"]);}           else {$MediaVideoFormat="";};
		if ($MediaAudioFormat==$rs["MediaAudioFormat"]) {$MediaAudioFormat=datasforHTML($rs["MediaAudioFormat"]);}           else {$MediaAudioFormat="";};

	}	
    		
	}

} else if ($SRIPTACTION==="m") {

	//GETTING DATAS FORM POST ACTION :
  $POSTT=$_POST;
    
  $Id=$POSTT["fS"]["id"];
	$IdT=explode(",",$Id);
    
    $updfld="";
    foreach ($POSTT["fR1"] as $fname => $fvalue) {
        if ($fvalue!="") {
        //echo $fname.':'.$fvalue;
         if ($updfld=="") {$updfld=$fname."='".datasforMySQL($fvalue)."'";}
         else {$updfld=$updfld.",".$fname."='".datasforMySQL($fvalue)."'";}
        }  
      }     
    //echo $updfld;
  //MODIFY
	//SQL REQUEST :
	if ($updfld!="") {
  $req_sql = "UPDATE $SQL_TABLE_DVD_NAME
				SET
        ".$updfld."
				,DT_MOD=Now()
				WHERE id=".implode($IdT," OR id=").";";
					//PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	}
    
    
    $updfld="";
    foreach ($POSTT["fR2"] as $fname => $fvalue) {
        if ($fvalue!="") {
        //echo $fname.':'.$fvalue;
         if ($updfld=="") {$updfld=$fname."='".datasforMySQL($fvalue)."'";}
         else {$updfld=$updfld.",".$fname."='".datasforMySQL($fvalue)."'";}
        }  
      }     
    if ($updfld!="") {
    $req_sql = "UPDATE $SQL_TABLE_DVD_MEDIAINFO_NAME
				SET
				".$updfld."
				WHERE Id_Movie=".implode($IdT," OR Id_Movie=").";";
		//PROCEED TO SQL :
	 $res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
   }	
    
		//CLOSING CONNECTION
	//mysql_close($connection);
	
	echo $lang['DSP_LIBRARY'];
	}

if ($SRIPTACTION==="em") {
echo '<form id="dvdedmult" name="dvdedmult" method="post"	action="'.$formaction.'"><input name="fS[id]" type="hidden" value="'.$Id.'">'; 
?>

<fieldset class="ftitle"><legend><h1><?php echo $lang['EDITMULT'];echo " (";echo mysql_num_rows($res_query)." ".$lang['RECORD'];if (mysql_num_rows($res_query)>1) {echo "s";};echo ")";?></h1></legend>
<p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY'];?></p>
<?php 
if  (isset ($_GET["msgerrv"]) ) {echo '<div class="msgwarning">'.str_replace("form","",$_GET["msgerrv"]).'</div>';}
?>
<!-- Main content link --><a href="#"  name="FillStart" title="Please, begin to fill"  target="_self" class="hiddenTextSR">Please, begin to fill</a>
<p><label for="Title">*<?php echo $lang['TBL_DVD_ALIAS_Title']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[Title]" id="Title"
	value="<?php echo $ValueTitle;?>" />
	<?php
if ($SRIPTACTION!="r") echo '<input type="button" class="action helpme hiddenTextPRT" value="Request IMDB" onclick="getIMDBinfo(\'Title\')"/>';
	?>
	</p>
<p><label for="Title_en"><?php echo $lang['TBL_DVD_ALIAS_Title_en']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[Title_en]" id="Title_en"
	value="<?php echo $ValueTitle_en;?>" />
	<?php
if ($SRIPTACTION!="r") echo '<input type="button" class="action helpme hiddenTextPRT" value="Request IMDB" onclick="getIMDBinfo(\'Title_en\')"/>';
	?>
	</p>

<p><label for="Genres"><?php echo $lang['TBL_DVD_ALIAS_Genres']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[Genres]" id="Genres"
	value="<?php echo $ValueGenres;?>" /></p>

<p><label for="Countries"><?php echo $lang['TBL_DVD_ALIAS_Countries']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[Countries]" id="Countries"
	value="<?php echo $ValueCountries;?>" /></p>

<p><label for="IMDB_url"><?php echo $lang['TBL_DVD_ALIAS_IMDBURL']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[IMDB_url]" id="IMDB_url"
	value="<?php echo $ValueIMDB_url;?>" />
	<input type="button" class="action viewit hiddenTextPRT" value="Open on IMDB" onclick="var neww=window.open('IMDB_url','_blank');neww.location=document.getElementById('IMDB_url').value;"/>
	<a href="http://www.imdb.com/" title="Search on IMDB" target=_blank class="hiddenTextPRT">
	<img src="./images/Hint.gif" width="16" alt="Help"/>
	</a></p>

<p><label for="IMDB_rating"><?php echo $lang['TBL_DVD_ALIAS_IMDBrate']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[IMDB_rating]" id="IMDB_rating"
	value="<?php echo $ValueIMDB_rating;?>" /></p>

<p><label for="Score"><?php echo $lang['TBL_DVD_ALIAS_Score']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="fR1[Score]" id="Score"
	value="<?php echo $ValueScore;?>" /></p>
<p><label for="Year"><?php echo $lang['TBL_DVD_ALIAS_Year']; ?></label> <input name="fR1[Year]"
	type="text" <?php echo $inputmode;?> id="Year"
	value="<?php echo $ValueYear;?>" size="8" maxlength="4" /></p>
</fieldset>	

<fieldset><legend><?php echo $lang['MOVIE_INFO']; ?></legend>
<p>
    <label for="MediaTypeFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_TFormat'];?></label>
    
<?php
    echo '<select name="fR2[MediaTypeFormat]" id="MediaTypeFormat" >';
    echo '<option value=""></option>';    
    $valselected=$MediaTypeFormat;
    if ($valselected=="") {$valselected=1;}    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaTypeFormat' ORDER BY $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` ASC ";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    //READING THE RECORDSET :
    while ($i < $nb){
      $valu = mysql_result($res, $i, 'Id');
      $labl = mysql_result($res, $i, $dbfieldsval);
      HTML_PRT_SELECTOPTION($valu,$labl,$valselected);
        $i++;
    }
    echo '</select>';
?>	
</p>    


<p>
    <label for="MediaVideoFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_VFormat'];?></label>
    
<?php  
    echo '<select name="fR2[MediaVideoFormat]" id="MediaVideoFormat" >';
    echo '<option value=""></option>';    
    $valselected=$MediaVideoFormat;
    if ($valselected=="") {$valselected=1;}    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaVideoFormat' ORDER BY $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` ASC ";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    //READING THE RECORDSET :
    while ($i < $nb){
      $valu = mysql_result($res, $i, 'Id');
      $labl = mysql_result($res, $i, $dbfieldsval);
      HTML_PRT_SELECTOPTION($valu,$labl,$valselected);
        $i++;
    }
    echo '</select>';
    ?>	
</p>  




<p>
    <label for="MediaAudioFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_AFormat'];?></label>
    
<?php 
    echo '<select name="fR2[MediaAudioFormat]" id="MediaAudioFormat" >';
    echo '<option value=""></option>';    
    $valselected=$MediaAudioFormat;
    if ($valselected=="") {$valselected=1;}    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaAudioFormat' ORDER BY $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` ASC ";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    //READING THE RECORDSET :
    while ($i < $nb){
      $valu = mysql_result($res, $i, 'Id');
      $labl = mysql_result($res, $i, $dbfieldsval);
      HTML_PRT_SELECTOPTION($valu,$labl,$valselected);
        $i++;
    }
    echo '</select>';  
    ?>	
</p> 


</fieldset>

	
<fieldset><legend><?php echo $lang['FEELINGS']; ?></legend>
<p><label for="Sound"><?php echo $lang['TBL_DVD_ALIAS_Sound']; ?></label> <input name="fR1[Sound]"
	type="text" <?php echo $inputmode;?> id="Sound"
	value="<?php echo $ValueSound;?>" /></p>
<p><label for="More"><?php echo $lang['TBL_DVD_ALIAS_More']; ?></label> <textarea <?php echo $inputmode;?>
	name="fR1[More]" id="More" cols="45" rows="5"><?php echo $ValueMore;?></textarea>
</p>
<p><label for="Comments"><?php echo $lang['TBL_DVD_ALIAS_Comments']; ?></label> <textarea
<?php echo $inputmode;?> name="fR1[Comments]" id="Comments" cols="45"
	rows="5"><?php echo $ValueComments;?></textarea></p>
</fieldset>

<div class="action"><?php
	echo '<input type="submit" name="send" id="send" value="'.$lang['SAVE'].'" class="action savedoc hiddenTextPRT" onclick="TTS=true;"/>';
?>

<input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CLOSE'];?>"	class="action close hiddenTextPRT" onclick="TTS=false;"/>
</div>
<?php 
//echo prnt_recordmod($rec_dtcrt,$rec_dtmod);
echo '</form>';}
?>
</body>
</html>
<?php
	//CLOSING CONNECTION
	mysql_close($connection);
?>