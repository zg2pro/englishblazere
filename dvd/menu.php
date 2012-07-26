<?php
/**
 * Display php, must be include
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
if (isset($_GET["t"])){$menusel='.'.$_GET["t"];} else {$menusel=":first";}

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\" src=\"js/jquery.menu-collapsed.js\"></script>
<script type=\"text/javascript\">
function initMenu() {
$('#menuleft ul').hide();
$('#menuleft ul".$menusel."').show();
$('#menuleft li a').click(
function() {
var checkElement = $(this).next();
if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
return false;
}
if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
$('#menuleft ul:visible').slideUp('normal');
checkElement.slideDown('normal');
return false;
}
}
);
}</script>";

is_db_tables_are_here();           

/*****************************************************************/
/****************************** DVD ******************************/
/*****************************************************************/
function prnt_menu($tablename){
global $lang;
global $SQL_TABLE_DVD_NAME;
global $cursort;
global $curcount;

$currequrl=$lang['URL_TABLE_MAIN'].'?';

echo '<div class="header"><a href="'.$lang['URL_HOME_FRS'].'" title="Home" target="_top"><h1>'.$lang['APP_NAME'].'</h1></a></div>';
echo '<ul id="menuleft">';

$dbfieldsrtc="Genres";
echo '<li class="'.$dbfieldsrtc.'"><a href="#">'.$lang['NAV_MENU_BY_GENRE'].'</a>';
echo '<ul class="menunav '.$dbfieldsrtc.'">';
echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'" title="' . $lang['NAV_MENU_ALL']  . '" target="_top">' . $lang['NAV_MENU_ALL']  . '</a></li>';
//SQL REQUEST :
$query = "SELECT DISTINCT `$dbfieldsrtc` FROM $SQL_TABLE_DVD_NAME ORDER BY $SQL_TABLE_DVD_NAME.`$dbfieldsrtc` ASC ";
//PROCEED TO SQL :
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // we get recordset number
$i = 0;
$allcolimp = "";
//READING THE RECORDSET :
while ($row = mysql_fetch_array($res)) {$allcolimp = $allcolimp.','.$row[0];}
$allcolexp=array_unique(explode(',',$allcolimp));
sort($allcolexp);
foreach ($allcolexp as $Genre_var){
if ($Genre_var==='' ){
  	$Genre_var='<!-- 0 -->';
  } else {
  	echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'&rtc='.urlencode($Genre_var).'" title="' . $Genre_var  . '" target="_top">' . $Genre_var  . '</a></li>';
  }
}
echo '</ul>';
echo '<li>';

$dbfieldsrtc="Score";
echo '<li class="'.$dbfieldsrtc.'"><a href="#">'.$lang['NAV_MENU_BY_SCORE'].'</a>';
echo '<ul class="menunav '.$dbfieldsrtc.'">';
echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'" title="' . $lang['NAV_MENU_ALL']  . '" target="_top">' . $lang['NAV_MENU_ALL']  . '</a></li>';
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
  	echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'&rtc='.urlencode($Note_var).'" title="' . $Note_var  . '" target="_top">' . $Note_var  . '</a></li>';
  }
    $i++;
}
echo '</ul>';
echo '<li>';

$dbfieldsrtc="Year";
echo '<li class="'.$dbfieldsrtc.'"><a href="#">'.$lang['NAV_MENU_BY_YEAR'].'</a>';
echo '<ul class="menunav '.$dbfieldsrtc.'">';
echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'" title="' . $lang['NAV_MENU_ALL']  . '" target="_top">' . $lang['NAV_MENU_ALL']  . '</a></li>';
//SQL REQUEST :
$query = "SELECT DISTINCT `$dbfieldsrtc` FROM $SQL_TABLE_DVD_NAME ORDER BY $SQL_TABLE_DVD_NAME.`$dbfieldsrtc` ASC ";
//PROCEED TO SQL :
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // we get recordset number
$i = 0;
//READING THE RECORDSET :
while ($i < $nb){
  $Year_var = mysql_result($res, $i, $dbfieldsrtc);
  if ($Year_var==='0' ){
  	$Year_var='<!-- 0 -->';
  } else {
  	echo '<li><a href="'.$currequrl.$cursort.$curcount.'&t='.$dbfieldsrtc.'&rtc='.urlencode($Year_var).'" title="' . $Year_var  . '" target="_top">' . $Year_var  . '</a></li>';
  }
    $i++;
}
echo '</ul>';
echo '<li>';

echo '</ul>';
}









/*****************************************************************/
/***************************** PARAM *****************************/
/*****************************************************************/
function prnt_menu_param($tablename,$fieldsstring,$fieldrtc,$itable){
global $lang;
//global $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME;
global $cursort;

$currequrl=$lang['URL_TABLE_PARAMS'].'?'.'&ti='.$itable;

//SQL REQUEST :
if ($fieldsstring!=="*") {
$query = "SELECT $fieldsstring FROM $tablename GROUP BY $fieldrtc ORDER BY $tablename.$fieldsstring ASC ";
}
else{
$query = "SELECT $fieldsstring FROM $tablename GROUP BY $fieldrtc ";
}
//PROCEED TO SQL :
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // we get recordset number
$i = 0;
//READING THE RECORDSET :
while ($i < $nb){
  $menu_lev1 = mysql_result($res, $i, $fieldrtc);
  if ($menu_lev1=="" ){
  	$menu_lev1='<!-- -->';
  } else {
  	
        //$dbfieldsrtc="Info";
        $dbfieldsrtc=$fieldrtc;
        //echo '<li class="'.$dbfieldsrtc.'"><a href="#">'.$lang['MOVIE_INFO'].'</a>';
        echo '<li class="'.$dbfieldsrtc.'"><a href="#">'.$lang['SQL_TABLE_'.strtoupper(str_replace("`", "", $tablename)).'_NAME_ALIAS'].'</a>';
        echo '<ul class="menunav '.$dbfieldsrtc.'">';
        echo '<li><a href="'.$currequrl.$cursort.'&t='.$dbfieldsrtc.'" title="' . $lang['NAV_MENU_ALL']  . '" target="_top">' . $lang['NAV_MENU_ALL']  . '</a></li>';
        //SQL REQUEST :
             
        $query_lev2 = "SELECT DISTINCT `$dbfieldsrtc` FROM $tablename ORDER BY $tablename.`$dbfieldsrtc` ASC ";
        //PROCEED TO SQL :
        $res_lev2 = mysql_query($query_lev2) or  mysql_errorget('',$query_lev2);
        $nb = mysql_numrows($res_lev2);  // we get recordset number
        $i = 0;
        //READING THE RECORDSET :
        while ($i < $nb){
          $elemli_var = mysql_result($res_lev2, $i, $dbfieldsrtc);
          if ($elemli_var==='0' ){
          	$elemli_var='<!-- 0 -->';
          } else {
          	//echo '<li><a href="'.$currequrl.$cursort.'&t='.$dbfieldsrtc.'&rtc='.$elemli_var.'" title="' . $elemli_var  . '" target="_top">' . $lang[$elemli_var]  . '</a></li>';
          	echo '<li><a href="'.$currequrl.$cursort.'&t='.$dbfieldsrtc.'&rtc='.$elemli_var.'" title="' . $elemli_var  . '" target="_top">' . $lang[$elemli_var]  . '</a></li>';
          }
            $i++;
        }
        echo '</ul>';
        echo '<li>';  	
  	
  }
    $i++;
}

}



?>