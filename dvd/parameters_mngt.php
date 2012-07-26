<?php
/**
 * Parameters management, one file for all
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'common.php';

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
var TTS=false;

function SaveForm() {
	var fieldstocontrol = new Array('Info','Value');
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


$SRIPTACTION=$_GET["a"];

if (isset($_REQUEST['cancel'])){header("Location:".$_SESSION["lastviewdisplayed"]);}

//Id  Info  Value  DT_CRT  DT_MOD  
if (isset($_GET["id"])) {$Id=$_GET["id"];} else {$Id=0;};

if (isset($_REQUEST['modify'])){header("Location:./parameters_mngt.php?&a=m&id=".$Id);}

$Info="";
$Value="";
$rec_dtcrt="";
$rec_dtmod="";
$formaction="";
              
$SRIPTACTION=$_GET["a"];
              
  //SECURITY CONTROL
secur__actioncontrol('</body></html>');


if ($SRIPTACTION==="n") {
  $formaction="parameters_mngt.php?a=c";
  } else
if ($SRIPTACTION==="r" || $SRIPTACTION==="m") {
//NEW
//MODIFY
 	$Id = $_GET["id"];

  	//SQL REQUEST :
	$query = "SELECT * FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE `Id`=".$Id.";";

	//PROCEED TO SQL :
	$res_query = mysql_query($query) or mysql_errorget('',$query);

	//echo mysql_num_rows($res)." enregistrement";if (mysql_num_rows($res_query)>1) {echo "s";}

	//READING THE RECORDSET :
	while($rs=mysql_fetch_array($res_query))
	{
		$Info		  =datasforHTML($rs["Info"]);
		$Value		=datasforHTML($rs["Value"]);
		$rec_dtcrt=datasforHTML($rs["DT_CRT"]);
		$rec_dtmod=datasforHTML($rs["DT_MOD"]);
	
	}



  if ($SRIPTACTION==="r") {
    //READ
   $inputmode=" readonly=\"readonly\" ";
 }  
  else if ($SRIPTACTION==="m") {
  $formaction="parameters_mngt.php?a=u&id=$Id";
  }
 }
 else if ($SRIPTACTION==="c" || $SRIPTACTION==="u") {

  //$Id = $_POST["Id"];
	//$Id=datasforMySQL($Id);
	$Info = $_POST["Info"];
	$Info=datasforMySQL($Info);
	$Value = $_POST["Value"];
	$Value=datasforMySQL($Value);

 //VALIDATES DATAS FROM FORM POST ACTION :
  $msgerrv="<ul>";
	if ($Info==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_HOST']."</li>";
	}
  	if ($Value==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_DBNAME']."</li>";
	}

  $msgerrv=$msgerrv."</ul>";
  
  if ($msgerrv!="<ul></ul>") {
    //REDIRECTING ERROR
    header("Location:"."parameters_mngt.php?&a=$SRIPTACTION"."&msgerrv=".$msgerrv);
  } else {


         if ($SRIPTACTION==="c"){
        	//CREATE
        	//SQL REQUEST :
        	$req_sql = "INSERT INTO $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME(`Id`, `Info`, `Value`, `DT_CRT`)
           VALUES(NULL,'$Info','$Value',Now());";
        	//PROCEED TO SQL :
        	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
                  
        } else if ($SRIPTACTION==="u") {
          // UPDATE
        	//SQL REQUEST :
        	$req_sql = "UPDATE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME
        				SET
        				Info='$Info',
        				Value='$Value',
        				DT_MOD=Now()
        				WHERE Id=".$_GET["id"].";";
 					//PROCEED TO SQL :
        	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
        }
          
        	header("Location:".$_SESSION["lastviewdisplayed"]);
         
        	//CLOSING CONNECTION
        	mysql_close($connection);

  }
    
 } else 
if ($SRIPTACTION==="d") {
//DELETE
    header("Location:./parameters_del.php?&a=d&id=".$Id);
}

include 'includes/header0.php';
?>
<body class="window">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');

?>                                                                            
<form id="configmod" name="configmod" method="post" action="<?php echo $formaction;?>" onsubmit="return SaveOrNot(TTS);">  
  <h1><?php echo $lang['REC_ACT_M'].' '.$lang['SETTINGS'];?></h1>
  <p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY'];?></p>
  <?php 
  if  (isset ($_GET["msgerrv"]) ) {echo '<div class="msgwarning">'.str_replace("form","",$_GET["msgerrv"]).'</div>';}
  ?>
  
    <p>
    <label for="Info">*<?php echo $lang['TBL_DVD_MEDIAINFO_Info'];?></label>
<?php 
                                                                            
if ($SRIPTACTION==="r"){//READING
     $valselected=$Info;    
     $labl=$lang[$valselected];
         ?><input	type="text" <?php echo $inputmode;?> name="MediaTypeFormat" id="MediaTypeFormat" value="<?php echo $labl;?>" /><?php                        
                                      
    } else {    
    echo '<select name="Info" id="Info" >';
    //echo '<option value=""></option>';    
    $valselected=$Info;
    if ($valselected=="") {$valselected=1;}    
    //SQL REQUEST :
    $dbfieldsrtc=$lang['DVD_MEDIAINFO_Info'];
    $query = "SELECT DISTINCT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc` FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME ORDER BY $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`$dbfieldsrtc` ASC ";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    //READING THE RECORDSET :
    while ($i < $nb){
      $valu = mysql_result($res, $i, $dbfieldsrtc);
      $labl = $lang[$valu]; 
      HTML_PRT_SELECTOPTION($valu,$labl,$valselected);
        $i++;
    }
    echo '</select>';
}    
    ?>	
  </p>
  
  <p>
    <label for="Value">*<?php echo $lang['TBL_DVD_MEDIAINFO_Value'];?></label>
    <input type="text" name="Value" id="Value" value="<?php echo $Value;?>" />
 </p>

  <div class="action"><?php
if ($SRIPTACTION!="r") {
	echo '<input type="submit" name="send" id="send" value="'.$lang['SAVE'].'" class="action savedoc hiddenTextPRT" onclick="TTS=true;"/>';
} else {
	if (IsAdmin()===true) echo "<input type=\"submit\" name=\"modify\" id=\"modify\" value=\"".$lang['MODIFY']."\" class=\"action moddoc hiddenTextPRT\" onclick=\"TTS=false;window.location='./parameters_mngt.php?&a=m&id=".$Id."';\"/>";
}
?>

<input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>"	class="action cancel hiddenTextPRT" onclick="TTS=false;"/>
</div>
<?php echo prnt_recordmod($rec_dtcrt,$rec_dtmod);

echo '</form>';
?>
</body>
</html>
<?php
	//CLOSING CONNECTION
	mysql_close($connection);
?>
