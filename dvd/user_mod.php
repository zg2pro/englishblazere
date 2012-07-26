<?php 
/**
 * User MOD management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
$nosecurity=true;
require_once("common.php");

$PGE_HEAD_JS_SCRIPTS="";
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
var TTS=false;

function SaveForm() {
	var fieldstocontrol = new Array('genre','nom','prenom','jour','mois','annee','email','adresse','code_postal','ville','pays','user_login','user_password');
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

	$Id=$_SESSION["security_id"];
	if (isset($_GET["id"])) {$Id=$_GET["id"];}

?>
<body class="window ui-user">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>'); 
?>
<form id="modif" name="modif" method="post" action="user_rec.php"><input name="Id" type="hidden" value="<?php echo $Id; ?>">
  <fieldset class="ftitle"><legend><h1><?php echo $lang['SCREEN_TITLE_USERMOD']; ?></h1></legend>
  <p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY']; ?></p>
  <?php 
//DISPLAY UI ERRORS
if  (isset ($_GET["erreur"]) ) {
echo $_GET["erreur"];
}

  $googlemapaddress="";

  //CREATE CONNECTION
	//include("includes/connexion_db_inc.php");
	
	//CREATE SQL REQUEST :
	$where_sql=" WHERE Id='".$Id."' ;";
	$req_sql = "SELECT * FROM $SQL_TABLE_DVD_USER ".$where_sql;
	
	//PROCEED SQL REQUEST :
	//include("includes/connexion_query_inc.php");
  //PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);

  //Création d'une boucle avec une tête de lecture "$rs" (Record Set - Jeu d'enregistrements):
	while($rs=mysql_fetch_array($res_query))
		{	
		$Genre=$rs["User_Gender"];
?>
     <p>
      <label><?php echo $lang['GENDER'] ?></label>
      
        <input name="genre" type="radio" id="Genre_1" value="Mr" <?php if ($Genre=="Mr"){echo 'checked="checked"';}?>  class="radio"  /><label for="Genre_1"><?php echo $lang['MR'] ?></label>
        <input type="radio" name="genre" id="Genre_2" value="Mme" <?php if ($Genre=="Mme"){echo 'checked="checked"';}?>  class="radio" /><label for="Genre_2"><?php echo $lang['MRS'] ?></label>
        <input type="radio" name="genre" id="Genre_3" value="Mlle" <?php if ($Genre=="Mlle"){echo 'checked="checked"';}?>  class="radio" /><label for="Genre_3"><?php echo $lang['MSS'] ?></label>
      
    </p><br/>
    <p>
      <label for="nom"><?php echo $lang['LNAME'] ?></label>
      <input name="nom" type="text" id="nom" value="<?php echo htmlentities($rs["User_LName"]);?>" size="40" />
      
    </p>
    <p>
      <label for="prenom"><?php echo $lang['FNAME'] ?></label>
      <input name="prenom" type="text" id="prenom" value="<?php echo htmlentities($rs["User_FName"]);?>" size="40" />
      
    </p>
    <p>
    <?php 
    	$date_naiss = $rs["User_BirthDT"];
    	$annee_naiss = substr($date_naiss,0,4);
    	$mois_naiss = substr($date_naiss,5,2);
    	$jour_naiss = substr($date_naiss,8,2);
	   ?>
    <label for="jour"><?php echo $lang['BIRTHDT'] ?></label>
      <table border=0 cellspacing=0 cellpadding=0>
      <tr>
      <td>
      <label for="jour" class="hiddenTextSR"><?php echo $lang['DAY'] ?></label>
      </td>
      <td>
        <select name="jour" id="jour" class="datetime">
            <?php
              for ($i=1; $i<=31; $i++)
          	{
          	$cpt=Format_str($i);
          	HTML_PRT_SELECTOPTION($cpt,$cpt,$jour_naiss);
          	} ?>
        </select>
      </td>  
        <td>
        <label for="mois" class="hiddenTextSR"><?php echo $lang['MONTH'] ?></label>
        </td>
      <td>
        <select name="mois" id="mois" class="datetime">
            <?php
              for ($i=1; $i<=12; $i++)
          	{
          	$cpt=Format_str($i);
          	HTML_PRT_SELECTOPTION($cpt,$cpt,$mois_naiss);
          	} ?>
        </select>
        </td>
        <td>
        <label for="annee" class="hiddenTextSR"><?php echo $lang['YEAR'] ?></label>
        </td>
        <td>
        <input name="annee" type="text" id="annee" maxlength="4" class="datetime" value="<?php echo $annee_naiss;?>" />
        </td>
        </tr>
        </table>
    </p>
    <p>
      <label for="email"><?php echo $lang['EMAIL'] ?></label>
      <input name="email" type="text" id="email" value="<?php echo htmlentities($rs["Email"]);?>" size="40" />      
    </p>
    <p>
      <label for="lieux_dit"><?php echo $lang['SITES'] ?></label>
      <input name="lieux_dit" type="text" id="lieux_dit" value="<?php echo htmlentities($rs["Address_Site"]);?>" size="40" />
      <td width="375">&nbsp;
    </p>
    <p>
      <label for="adresse"><?php echo $lang['ADDRESS'] ?></label>
      <input name="adresse" type="text" id="adresse" value="<?php echo htmlentities($rs["Address"]);?>" size="40" />      
    </p>
    <p>
      <label for="code_postal"><?php echo $lang['ZIP'] ?></label>
      <input name="code_postal" type="text" id="code_postal" value="<?php echo htmlentities($rs["Address_ZIP"]);?>" size="16" />
      
    </p>
    <p>
      <label for="ville"><?php echo $lang['CITY'] ?></label>
      <input name="ville" type="text" id="ville" value="<?php echo htmlentities($rs["Address_City"]);?>" size="50" />
      
    </p>
    <p>
      <label for="pays"><?php echo $lang['COUNTRY'] ?></label>
         
      <select name="pays" id="pays">
      <?php
      $Pays = $rs["Address_Country"];
      $row = 1;
      if (($handle = fopen("includes/lists/ISO_3166_Codes_en.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
              $num = count($data);
              //echo "<p> $num fields in line $row: <br /></p>\n";
              $row++;
              /*
              for ($c=0; $c < $num; $c++) {
                  echo $data[$c] . "<br />\n";
              }*/
              if ($Pays==$data[1]){$selectedflag= ' selected ';} else {$selectedflag='';}
              echo '<option '.$selectedflag.'value="'.$data[1].'">'.$data[0].'</option>';
              
          }
          fclose($handle);
}      
  $googlemapaddress=$rs['Address'].' '.$rs['Address_ZIP'].' '.$rs['Address_City'].', '.$rs['Address_Country']; 
      ?>
      </select>
      
    </p>
    <p>
      <label for="user_login"><?php echo $lang['USERNAME'] ?></label>
      <input name="user_login" type="text" readonly="readonly" id="user_login" value="<?php echo htmlentities($rs["User_Login"]);?>" size="32" />
      
    </p>
    <p>
      <label for="user_password"><?php echo $lang['PASSWORD'] ?></label>
      <input name="user_password_indb" type="hidden" value="<?php echo htmlentities($rs["User_Password"]);?>" size="32" /><input name="user_password" type="password" id="user_password" value="<?php echo htmlentities($rs["User_Password"]);?>" size="32" />
      
    </p>
    <?php if (IsAdmin()===true) {?>
    
    <p>
      <label for="User_Status"><?php echo $lang['STATUS']; ?></label>
      
          <select name="User_Status" id="User_Status">          
          <?php
          $valselected=$rs["User_Status"];
          
          HTML_PRT_SELECTOPTION("USR000",$lang['USR000'],$valselected);
          HTML_PRT_SELECTOPTION("USR060",$lang['USR060'],$valselected);          
           ?>
          </select>     
    </p>   
    
    <?php } ?>
    </fieldset>
    
  <div class="action">
      <input type="submit" name="send" id="send" value="<?php echo $lang['SAVE']; ?>"  class="action savedoc" onclick="TTS=true;"/>
      <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL']; ?>" value="<?php echo $lang['CANCEL']; ?>" class="action cancel"/>
      <input name="IsNew" id="IsNew" type="hidden" value="0" />
  </div>
    
    
    <p>
      <td colspan=3>
      <div id="more" class="dmore" >
      <input type="button" id="morebtn" class="btninfo" value="<?php echo $lang['TELLMEMORE']; ?>" onclick="var objctt=document.getElementById('morectt');if (objctt.style.display=='none') {objctt.style.display='block'} else {objctt.style.display='none'};">
        <div id="morectt" style="display:none;">
        <iframe width="640" height="480" longdesc="Google Maps" src="http://maps.google.com/maps?f=q&source=s_q&hl=fr&geocode=&q=<?php echo $googlemapaddress; ?>&ie=UTF8&ahq=<?php echo $googlemapaddress; ?>&output=embed&z=16">
        </iframe>
        <br/>
        <small><a title="<?php echo $googlemapaddress; ?>" href="http://maps.google.com/maps?f=q&source=embed&hl=fr&geocode=&q=<?php echo $googlemapaddress; ?>&aq=&ie=UTF8&hq=<?php echo $googlemapaddress; ?>&z=15" style="color:#0000FF;text-align:left" target=_blank>Zoom</a></small>
        </div>
      </div>
      </td>
    </p>
    
  <?php  
  }
  	//FREE SQL RESULTS	
	mysql_free_result($res_query);
  
	//CLOSING CONNECTION
	mysql_close($connection);
  
  $googlemapaddress=urlencode($googlemapaddress);
  
   ?>
   </form>
</body>
</html>
