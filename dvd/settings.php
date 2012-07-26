<?php
/**
 * Settings management, one file for all
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'common.php';

$SRIPTACTION=$_GET["a"];

if (isset($_REQUEST['cancel'])){header("Location:".$_SESSION["lastviewdisplayed"]);}

if ($SRIPTACTION==="s") {
	//MODIFY
	$dbhost = $_POST["dbhost"];
	$dbname = $_POST["dbname"];
	if ($_POST["dbadmusername"]="") {$dbadmusername = $_POST["dbadmusername"];};
	if ($_POST["dbadmuserpass"]="") {$dbadmuserpass = $_POST["dbadmuserpass"];};
	$dbmysqluname="";
	$dbmysqlpass="";
	$sitecss = $_POST["sitecss"];
	$siteliquidhtml = $_POST["siteliquidhtml"];
	$sitesecurity = $_POST["sitesecurity"];
	$allowuserreg = $_POST["allowuserreg"];
  $sitescriptdebug = $_POST["sitescriptdebug"];
  $_SESSION["sitescriptdebug"] = $sitescriptdebug;

  //VALIDATES DATAS FROM FORM POST ACTION :
  $msgerrv="<ul>";
	if ($dbhost==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_HOST']."</li>";
	}
  	if ($dbname==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_DBNAME']."</li>";
	}
		if ($dbadmusername==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['ADMIN']."</li>";
	}
		/*
    if ($dbadmuserpass==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PASSWORD']."</li>";
	}   */
		if ($sitecss==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_CSS']."</li>";
	}
	if ($sitesecurity==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_SSECURITY']."</li>";
	}
	if ($allowuserreg==""){
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['PARAM_ALLOWUSERREG']."</li>";
	}	
		
  $msgerrv=$msgerrv."</ul>";
  
  if ($msgerrv!="<ul></ul>") {
    //REDIRECTING ERROR
    header("Location:"."settings.php?&a=r"."&msgerrv=".$msgerrv);
  } else {
    //SAVING THE CONFIGVAR FILE
  	if (edit_configvar('./includes/',$dbhost,$dbname,$dbmysqluname,$dbmysqlpass,$dbadmusername,$dbadmuserpass,$sitecss,$siteliquidhtml,$sitesecurity,$allowuserreg)) {
  		  if (isset($_REQUEST['apply'])) {$formaction="settings.php?&a=s";}
          else if (isset($_REQUEST['save'])){header("Location:".$_SESSION["lastviewdisplayed"]);}	
          else if (isset($_REQUEST['cancel'])){header("Location:".$_SESSION["lastviewdisplayed"]);}
  	   } else {die("Can't write the configvar file.");};
  }	

} else {
	$formaction="settings.php?&a=s";
	if(isset($_SESSION["sitescriptdebug"])) {$sitescriptdebug = $_SESSION["sitescriptdebug"];}
}



?>
<?php

$PGE_HEAD_CSS_STYLES=$PGE_HEAD_CSS_STYLES."<style>div.MySQLAdmin {display:none;} #MySQLAdminEdit {color:#D2BB78;}</style>";

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
var TTS=false;

function SaveForm() {
	var fieldstocontrol = new Array('dbhost','dbname','sitecss');
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

$(document).ready(function() {
$('#MySQLAdminEdit').click(
    function() {
        $('div.MySQLAdmin').slideToggle('normal');        
      }
    );

});

//--></script>   ";

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
    <label for="dbhost">*<?php echo $lang['PARAM_HOST'];?></label>
    <input type="text" name="dbhost" id="dbhost" value="<?php echo $dbhost;?>" />
    </p>
  <p>
    <label for="dbname">*<?php echo $lang['PARAM_DBNAME'];?></label>
    <input type="text" name="dbname" id="dbname" value="<?php echo $dbname;?>" />
    </p>
    
  
  <div>
  <div>
  <input type="button" name="MySQLAdminEdit" id="MySQLAdminEdit" class="rowmod" style="width:5em;" value="<?php echo $lang['MODIFY'].' '.$lang['ADMIN'].' '.$lang['DB'];?>"/> 
   : <?php echo $lang['ADMIN'].' '.$lang['DB'];?> 
  </div>
  <div class="MySQLAdmin">  
  <p>
    <label for="dbadmusername"><?php echo $lang['ADMIN'];?></label>
    <input type="text" name="dbadmusername" id="dbadmusername" value="<?php //echo $dbadmusername;?>" />
  </p>
  <p>
    <label for="dbadmuserpass"><?php echo $lang['PASSWORD'];?></label>
    <input type="password" name="dbadmuserpass" id="dbadmuserpass" value="<?php //echo $dbadmuserpass;?>" />
  </p>
  </div>
  </div>
  
  <p>
    <label for="sitecss">*<?php echo $lang['PARAM_CSS'];?></label>
    <select name="sitecss" id="sitecss" >
    <option value=""></option>
    <?php
    
    $valselected=$sitecss;                        
    $GLOB_ONLYD='css';
    $folder_exists = false; 
    $folder='';
    $search_folder = opendir($GLOB_ONLYD);
    while(false !== ($folder = readdir($search_folder))) { 
      if ($folder != '.' && $folder != '..' && is_dir($GLOB_ONLYD.'/'.$folder)) HTML_PRT_SELECTOPTION($folder,$folder,$valselected);
      }                                
                                      
    ?>
	</select><div id="switcher"></div>
  </p>
  
   <p>
    <label for="siteliquidhtml">*<?php echo $lang['PARAM_LIQUIDHTML'];?></label>
    <select name="siteliquidhtml" id="siteliquidhtml" >
    <?php
    $valselected=$siteliquidhtml;                       
    HTML_PRT_SELECTOPTION(0,$lang['NO'],$valselected);   //FALSE IS NOT RETURNED IN THE FUNCTION
    HTML_PRT_SELECTOPTION(TRUE,$lang['YES'],$valselected);                                  
    ?>
	</select>
  </p>
  
  
  <p>
    <label for="sitesecurity">*<?php echo $lang['PARAM_SSECURITY'];?></label>
    <select name="sitesecurity" id="sitesecurity" >
    <?php
    $valselected=$sitesecurity;                       
    HTML_PRT_SELECTOPTION(0,$lang['NO'],$valselected);   //FALSE IS NOT RETURNED IN THE FUNCTION
    HTML_PRT_SELECTOPTION(TRUE,$lang['YES'],$valselected);                                  
    ?>
	</select>
  </p>
  <p>
    <label for="allowuserreg">*<?php echo $lang['PARAM_ALLOWUSERREG'];?></label>
    <select name="allowuserreg" id="allowuserreg" >
    <?php
    $valselected=$allowuserreg;                       
    HTML_PRT_SELECTOPTION(0,$lang['NO'],$valselected);   //FALSE IS NOT RETURNED IN THE FUNCTION
    HTML_PRT_SELECTOPTION(TRUE,$lang['YES'],$valselected);                                  
    ?>
	</select>
  </p>
  
    <p>
    <label for="sitescriptdebug">*<?php echo $lang['PARAM_SSCRIPTSECU'];?></label>
    <select name="sitescriptdebug" id="sitescriptdebug" >
    <?php
    $valselected=$sitescriptdebug;                       
    HTML_PRT_SELECTOPTION(0,$lang['NO'],$valselected);   //FALSE IS NOT RETURNED IN THE FUNCTION
    HTML_PRT_SELECTOPTION(TRUE,$lang['YES'],$valselected);                                  
    ?>
	</select>
  </p>
  
  <div class="action">
  <input type="submit" name="apply" id="btnapply" value="<?php echo $lang['APPLY'];?>" class="action savedoc" onclick="TTS=true;"/>
  <input type="submit" name="save" id="btnsave" value="<?php echo $lang['SAVE'];?>" class="action savedoc"  onclick="TTS=true;"/>
  <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>" class="action cancel"  onclick="TTS=false;"/>
  </div>

</form>
</body>
</html>
