<?php
/**
 * DVD Actions management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

global $fromapproot;
require_once 'common.php';

if  (isset ($_GET["msgerrv"]) ) {echo $_GET["msgerrv"];}

function HTML_PRT_SELECT(){
$dbfieldsrtc="Score";
//SQL REQUEST :
$query = "SELECT DISTINCT `$dbfieldsrtc` FROM $SQL_TABLE_DVD_NAME ORDER BY $SQL_TABLE_DVD_NAME.`$dbfieldsrtc` ASC ";
//PROCEED TO SQL :
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // we get recordset number
$i = 0;
//READING THE RECORDSET :
while ($i < $nb){
  $Note_var = mysql_result($res, $i, $dbfieldsrtc);
  if ($Note_var=="" ){
  	$Note_var='<!-- -->';
  } else {
  	echo '<li><a href="'.$currequrl.$cursort.'&t='.$dbfieldsrtc.'&rtc='.$Note_var.'" title="' . $Note_var  . '" target="_top">' . $Note_var  . '</a></li>';
  }
    $i++;
}

?><p>
    <label for="sitecss">*<?php echo $lang['PARAM_CSS'];?></label>
    <select name="sitecss" id="sitecss" >
    <option value=""></option>
    <?php
    $valselected=$sitecss;
    $dirname="css";$filterext=".css";
    $filelistcss=dir_filterext($dirname,$filterext);
    foreach ($filelistcss as $filecss) {
    	HTML_PRT_SELECTOPTION($filecss,$filecss,$valselected);
    }
    ?>
	</select>
</p><?php

}
      
?>
<?php

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS.'<link rel=stylesheet type="text/css" media="handheld, all" href="'.$fromapproot.'css/jquery.autocomplete.css" />
';
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS.'<script type="text/javascript" src="'.$fromapproot.'js/jquery.autocomplete.pack.js"></script>
';
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!--
$(document).ready(function() {
  $('#".$lang['TBL_DVD_Title']."').autocomplete('tools/distinctfield.php?&t=".$SQL_TABLE_DVD_NAME."&f=".$lang['TBL_DVD_Title']."', {
  		width: 260,
  		selectFirst: false
  	});
  $('#".$lang['TBL_DVD_Year']."').autocomplete('tools/distinctfield.php?&t=".$SQL_TABLE_DVD_NAME."&f=".$lang['TBL_DVD_Year']."', {
  		width: 260,
  		selectFirst: false
  	});
  $('#".$lang['TBL_DVD_Genres']."').autocomplete('tools/distinctfield.php?&t=".$SQL_TABLE_DVD_NAME."&f=".$lang['TBL_DVD_Genres']."', {
  		width: 260,
  		selectFirst: false
  	});
  $('#".$lang['TBL_DVD_Countries']."').autocomplete('tools/distinctfield.php?&t=".$SQL_TABLE_DVD_NAME."&f=".$lang['TBL_DVD_Countries']."', {
  		width: 260,
  		selectFirst: false
  	});
});  	
--></script>";  

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
function SaveForm() {
	var fieldstocontrol = new Array('dbhost','dbname','dbadmusername','dbadmuserpass','sitecss');
	if (FormIsValid(fieldstocontrol) === true) {
	  $.blockUI(waitmsgsave);
		return true;
	} else {
		return false;
	};
}

function SaveOrNot() {
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
<form id="advsearchform" name="advsearchform" method="post" action="dvd_view.php?&sort=1" onsubmit="//return SaveOrNot();">
  <h1><?php echo $lang['SEARCH'];?></h1>
  <p class="mandatory hiddenTextPRT"><?php echo $lang['SEARCH_INFO_01'];?></p>
  
<?php 
		foreach ($TABLE_DVD_SEARCHFIELDS as $sfield) {
    
    echo '<p><label for="'.$sfield.'">'.$lang['TBL_DVD_ALIAS_'.$sfield].'</label>';
    echo '<input type="text" name="'.$sfield.'" id="'.$sfield.'" value="'.''.'" /></p>';
    
    }

?>
  
  <div class="action">
  <input type="submit" name="AdvSearch" id="AdvSearch" value="OK" class="action savedoc"/>
  <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>" class="action cancel" />
  </div>

</form>
</body>
</html>