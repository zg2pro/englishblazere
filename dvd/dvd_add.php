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

if ($SRIPTACTION==="n"){
//SECURITY CONTROL
secur__actioncontrol('</body></html>');

	//NEW
	$formaction="dvd_rec.php?&a=".$SRIPTACTION;
} else if ($SRIPTACTION==="m" || $SRIPTACTION==="r") {
	//MODIFY

	$Id=$_GET["id"];

	if ($SRIPTACTION==="r"){//READING
		$inputmode=" readonly=\"readonly\" ";
		$formaction="dvd_add.php?&a=m&id=".$Id;
	} else {
  //SECURITY CONTROL
secur__actioncontrol('</body></html>');

  $formaction="dvd_rec.php?&a=".$SRIPTACTION."&id=".$Id;}


	//SQL REQUEST :
	$query = "SELECT $SQL_TABLE_DVD_NAME.*, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaTypeFormat`, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaVideoFormat`, $SQL_TABLE_DVD_MEDIAINFO_NAME.`MediaAudioFormat` FROM $SQL_TABLE_DVD_NAME LEFT OUTER JOIN $SQL_TABLE_DVD_MEDIAINFO_NAME ON ($SQL_TABLE_DVD_NAME.`Id`=$SQL_TABLE_DVD_MEDIAINFO_NAME.`Id_Movie`) 
   WHERE $SQL_TABLE_DVD_NAME.`Id`=".$Id.";";

	//PROCEED TO SQL :
	$res_query = mysql_query($query) or mysql_errorget('',$query);

	//echo mysql_num_rows($res)." enregistrement";if (mysql_num_rows($res_query)>1) {echo "s";}

	//READING THE RECORDSET :
	while($rs=mysql_fetch_array($res_query))
	{
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
    		
	}

} else if ($SRIPTACTION==="d"){
	//DELETE NOT IMPLEMENTED
}

if ($SRIPTACTION==="m" || $SRIPTACTION==="n"){echo '<form id="dvdadd" name="dvdadd" method="post"	action="'.$formaction.'" onsubmit="return SaveOrNot(TTS);">';} 
  else {echo '<form id="dvdadd" name="dvdadd" method="post"	action="'.$formaction.'"><input name="id" type="hidden" value="'.$Id.'">';}

?>

<fieldset class="ftitle"><legend><h1><?php if ($SRIPTACTION==="n"){echo $lang['REC_ACT_'.strtoupper($SRIPTACTION)].' '.$lang['AMOVIE'];} else {echo $ValueTitle;}?></h1></legend>
<p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY'];?></p>
<?php 
if  (isset ($_GET["msgerrv"]) ) {echo '<div class="msgwarning">'.str_replace("form","",$_GET["msgerrv"]).'</div>';}
?>
<!-- Main content link --><a href="#"  name="FillStart" title="Please, begin to fill"  target="_self" class="hiddenTextSR">Please, begin to fill</a>
<p><label for="Title">*<?php echo $lang['TBL_DVD_ALIAS_Title']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="Title" id="Title"
	value="<?php echo $ValueTitle;?>" />
	<?php
if ($SRIPTACTION!="r") echo '<input type="button" class="action helpme hiddenTextPRT" value="Request IMDB" id="btnIMDBTitle"/>';
	?>
	</p>
<p><label for="Title_en"><?php echo $lang['TBL_DVD_ALIAS_Title_en']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="Title_en" id="Title_en"
	value="<?php echo $ValueTitle_en;?>" />
	<?php
if ($SRIPTACTION!="r") echo '<input type="button" class="action helpme hiddenTextPRT" value="Request IMDB English" id="btnIMDBTitleEN"/>';
                       //echo '<input type="button" class="action viewposter hiddenTextPRT" value="See IMDB Poster" id="btnIMDBPoster"/>';
	?>
	</p>

<p><label for="Genres"><?php echo $lang['TBL_DVD_ALIAS_Genres']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="Genres" id="Genres"
	value="<?php echo $ValueGenres;?>" /></p>

<p><label for="Countries"><?php echo $lang['TBL_DVD_ALIAS_Countries']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="Countries" id="Countries"
	value="<?php echo $ValueCountries;?>" /></p>

<p><label for="IMDB_url"><?php echo $lang['TBL_DVD_ALIAS_IMDBURL']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="IMDB_url" id="IMDB_url"
	value="<?php echo $ValueIMDB_url;?>" />
	<input type="button" class="action viewit hiddenTextPRT" value="Open on IMDB" onclick="var neww=window.open('IMDB_url','_blank');neww.location=document.getElementById('IMDB_url').value;"/>
	<a href="http://www.imdb.com/" title="Search on IMDB" target=_blank class="hiddenTextPRT">
	<img src="./images/Hint.gif" width="16" alt="Help"/>
	</a></p>

<p><label for="IMDB_rating"><?php echo $lang['TBL_DVD_ALIAS_IMDBrate']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="IMDB_rating" id="IMDB_rating"
	value="<?php echo $ValueIMDB_rating;?>" /></p>

<p><label for="Score"><?php echo $lang['TBL_DVD_ALIAS_Score']; ?></label> <input
	type="text" <?php echo $inputmode;?> name="Score" id="Score"
	value="<?php echo $ValueScore;?>" /></p>
<p><label for="Year"><?php echo $lang['TBL_DVD_ALIAS_Year']; ?></label> <input name="Year"
	type="text" <?php echo $inputmode;?> id="Year"
	value="<?php echo $ValueYear;?>" size="8" maxlength="4" /></p>
</fieldset>	

<fieldset><legend><?php echo $lang['MOVIE_INFO']; ?></legend>
<p>
    <label for="MediaTypeFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_TFormat'];?></label>
    
<?php 
                                                                            
if ($SRIPTACTION==="r"){//READING
          $valselected=$MediaTypeFormat;    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaTypeFormat' AND $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`=$valselected";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    if ($nb!=0) {$labl = mysql_result($res, $i, $dbfieldsval);} else {$labl="";};
         ?><input	type="text" <?php echo $inputmode;?> name="MediaTypeFormat" id="MediaTypeFormat" value="<?php echo $labl;?>" /><?php                        
                                      
                                      } else {    
    echo '<select name="MediaTypeFormat" id="MediaTypeFormat" >';
    //echo '<option value=""></option>';    
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
}    
    ?>	
</p>    


<p>
    <label for="MediaVideoFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_VFormat'];?></label>
    
<?php 
                                                                            
if ($SRIPTACTION==="r"){//READING
          $valselected=$MediaVideoFormat;    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaVideoFormat' AND $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`=$valselected";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    if ($nb!=0) {$labl = mysql_result($res, $i, $dbfieldsval);} else {$labl="";};
         ?><input	type="text" <?php echo $inputmode;?> name="MediaVideoFormat" id="MediaVideoFormat" value="<?php echo $labl;?>" /><?php                        
                                      
                                      } else {    
    echo '<select name="MediaVideoFormat" id="MediaVideoFormat" >';
    //echo '<option value=""></option>';    
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
}    
    ?>	
</p>  




<p>
    <label for="MediaAudioFormat">*<?php echo $lang['TBL_DVD_MEDIAINFO_AFormat'];?></label>
    
<?php 
                                                                            
if ($SRIPTACTION==="r"){//READING
          $valselected=$MediaAudioFormat;    
    //SQL REQUEST :
    $dbfieldsval=$lang['DVD_MEDIAINFO_Value'];
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`,$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsval` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc`='MediaAudioFormat' AND $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`=$valselected";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    if ($nb!=0) {$labl = mysql_result($res, $i, $dbfieldsval);} else {$labl="";};
         ?><input	type="text" <?php echo $inputmode;?> name="MediaAudioFormat" id="MediaAudioFormat" value="<?php echo $labl;?>" /><?php                        
                                      
                                      } else {    
    echo '<select name="MediaAudioFormat" id="MediaAudioFormat" >';
    //echo '<option value=""></option>';    
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
}    
    ?>	
</p> 


</fieldset>

	
<fieldset><legend><?php echo $lang['FEELINGS']; ?></legend>
<p><label for="Sound"><?php echo $lang['TBL_DVD_ALIAS_Sound']; ?></label> <input name="Sound"
	type="text" <?php echo $inputmode;?> id="Sound"
	value="<?php echo $ValueSound;?>" /></p>
<p><label for="More"><?php echo $lang['TBL_DVD_ALIAS_More']; ?></label> <textarea <?php echo $inputmode;?>
	name="More" id="More" cols="45" rows="5"><?php echo $ValueMore;?></textarea>
</p>
<p><label for="Comments"><?php echo $lang['TBL_DVD_ALIAS_Comments']; ?></label> <textarea
<?php echo $inputmode;?> name="Comments" id="Comments" cols="45"
	rows="5"><?php echo $ValueComments;?></textarea></p>
</fieldset>

<div class="action"><?php
if ($SRIPTACTION!="r") {
	echo '<input type="submit" name="send" id="send" value="'.$lang['SAVE'].'" class="action savedoc hiddenTextPRT" onclick="TTS=true;"/>';
} else {
	if (IsAdmin()===true) echo "<input type=\"submit\" name=\"modify\" id=\"modify\" value=\"".$lang['MODIFY']."\" class=\"action moddoc hiddenTextPRT\" onclick=\"TTS=false;window.location='./dvd_add.php?&a=m&id=".$Id."';\"/>";
}
?>

<input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CLOSE'];?>"	class="action close hiddenTextPRT" onclick="TTS=false;"/>
</div>
<?php echo prnt_recordmod($rec_dtcrt,$rec_dtmod);

//if ($SRIPTACTION==="m" || $SRIPTACTION==="n"){echo '</form>';}
echo '</form>';
?>
</body>
</html>
<?php
	//CLOSING CONNECTION
	mysql_close($connection);
?>