<?php
/**
 * User ADD management
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
?>

<body class="window ui-user">
<?php

//DISPLAY UI ERRORS
if  (isset ($_GET["erreur"]) ) {
echo $_GET["erreur"];
}
?>

<form id="ajout" name="ajout" method="post" action="user_rec.php?&lang=<?php echo $lang['LANG'];?>" class="" onsubmit="return SaveOrNot(TTS);">
  <fieldset class="ftitle"><legend><h1><?php //if ($SRIPTACTION==="n"){echo $lang['REC_ACT_'.strtoupper($SRIPTACTION)].' '.$lang['AMOVIE'];} else {echo $ValueTitle;}
  echo $lang['SCREEN_TITLE_REGISTER'];
  ?></h1></legend>
  
    <p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY'] ?></p>
    <p>
      <label><?php echo $lang['GENDER'] ?></label>
      
        <input type="radio" name="genre" id="Genre_1" value="Mr" checked="checked" class="radio" /><label for="Genre_1" class="radio"><?php echo $lang['MR'] ?></label>
        <input type="radio" name="genre" id="Genre_2" value="Mme" class="radio" /><label for="Genre_2" class="radio"><?php echo $lang['MRS'] ?></label>
        <input type="radio" name="genre" id="Genre_3" value="Mlle" class="radio" /><label for="Genre_3" class="radio"><?php echo $lang['MSS'] ?></label>
      
    </p><br/>
    <p>
      <label for="nom"><?php echo $lang['LNAME'] ?></label>
      <input name="nom" type="text" id="nom" size="40" />
      
    </p>
    <p>
      <label for="prenom"><?php echo $lang['FNAME'] ?></label>
      <input name="prenom" type="text" id="prenom" size="40" />
      
    </p>
    <p>
      <label for="jour"><?php echo $lang['BIRTHDT'] ?></label>
      <table border=0 cellspacing=0 cellpadding=0>
      <tr>
      <td>
      <label for="jour" class="hiddenTextSR"><?php echo $lang['DAY'] ?></label>
      </td>
      <td>
        <select name="jour" id="jour" class="datetime">
          <option value="01">01 </option>
          <option value="02">02 </option>
          <option value="03">03 </option>
          <option value="04">04 </option>
          <option value="05">05 </option>
          <option value="06">06 </option>
          <option value="07">07 </option>
          <option value="08">08 </option>
          <option value="09">09 </option>
          <option value="10">10 </option>
          <option value="11">11 </option>
          <option value="12">12 </option>
          <option value="13">13 </option>
          <option value="14">14 </option>
          <option value="15">15 </option>
          <option value="16">16 </option>
          <option value="17">17 </option>
          <option value="18">18 </option>
          <option value="19">19 </option>
          <option value="20">20 </option>
          <option value="21">21 </option>
          <option value="22">22 </option>
          <option value="23">23 </option>
          <option value="24">24 </option>
          <option value="25">25 </option>
          <option value="26">26 </option>
          <option value="27">27 </option>
          <option value="28">28 </option>
          <option value="29">29 </option>
          <option value="30">30 </option>
          <option value="31">31 </option>
        </select>
        </td>
        <td>
        <label for="mois" class="hiddenTextSR"><?php echo $lang['MONTH'] ?></label>
        </td>
      <td>
        <select name="mois" id="mois" class="datetime">
          <option value="01">01 </option>
          <option value="02">02 </option>
          <option value="03">03 </option>
          <option value="04">04 </option>
          <option value="05">05 </option>
          <option value="06">06 </option>
          <option value="07">07 </option>
          <option value="08">08 </option>
          <option value="09">09 </option>
          <option value="10">10 </option>
          <option value="11">11 </option>
          <option value="12">12 </option>
        </select>
        </td>
        <td>
        <label for="annee" class="hiddenTextSR"><?php echo $lang['YEAR'] ?></label>
        </td>
      <td>
        <input name="annee" type="text" id="annee" maxlength="4" class="datetime" />
        </td>
        </tr>
        </table>
    </p>
    <p>
      
      <label for="email"><?php echo $lang['EMAIL'] ?></label>
      <input name="email" type="text" id="email" size="40" />
      
    </p>
    <p>
      <label for="lieux_dit"><?php echo $lang['SITES'] ?></label>
      <input name="lieux_dit" type="text" id="lieux_dit" size="40" />
      &nbsp;
    </p>
    <p>
      <label for="adresse"><?php echo $lang['ADDRESS'] ?></label>
      <input name="adresse" type="text" id="adresse" size="40" />
      
    </p>
    <p>
      <label for="code_postal"><?php echo $lang['ZIP'] ?></label>
      <input name="code_postal" type="text" id="code_postal" size="16" />
      
    </p>
    <p>
      <label for="ville"><?php echo $lang['CITY'] ?></label>
      <input name="ville" type="text" id="ville" size="50" />
      
    </p>
    <p>
      <label for="pays"><?php echo $lang['COUNTRY'] ?></label>
      <select name="pays" id="pays">
      <?php
      $Pays = 'FR';
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
      ?>
      </select>      
    </p>
    <p>
      <label for="user_login"><?php echo $lang['USERNAME'] ?></label>
      <input name="user_login" type="text" id="user_login" size="32" />
      
    </p>
    <p>
      <label for="user_password"><?php echo $lang['PASSWORD'] ?></label>
      <input name="user_password" type="password" id="user_password" size="32" />
      
    </p>
  </fieldset>
  <div class="action">
    <input type="submit" name="send" id="send" value="<?php echo $lang['SAVE']; ?>"  class="action savedoc" onclick="TTS=true;"/>
    <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL']; ?>" class="action cancel"/>
  </div>
  <input name="IsNew" id="IsNew" type="hidden" value="1" />  
</form>
</body>
</html>      