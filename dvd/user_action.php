<?php
/**
 * user Actions management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 include 'common.php';
 include 'dvd_functions.php';

 $Q_S=getenv("QUERY_STRING");

 $_REQUEST = array_merge($_GET, $_POST); 

 if( isset($_REQUEST['addbtn']) ) {
     header("Location:".'user_add.php?&a=n');
 }
 else if( isset($_REQUEST['actiondel']) ) {
    if  (isset ($_POST['SelectRow']) ) {
    $arr=$_POST['SelectRow'];
    foreach ($arr as $idtodel) {user_delete($idtodel);}
    }
    header("Location:".$_SESSION["lastviewdisplayed"]);
 }  
 else if( isset($_REQUEST['searchbtn']) ) {
     header("Location:".'dvd_search.php?&t=DVD');
 }
 else if (isset($_REQUEST['settingsbtn'])) {     
     header("Location:".'settings.php?a=m'); 
 }
  else if (isset($_REQUEST['deconnctbtn'])) {     
     header("Location:".'logout.php');      
 }
   else if (isset($_REQUEST['connctbtn'])) {     
     header("Location:".'login.php');      
 }
   else if (isset($_REQUEST['aboutbtn'])) {     
     header("Location:".'about.php');      
 } 
   else if (isset($_REQUEST['exportbtn'])) {     
     header("Location:".'tools/mysqldump.php');      
 }
 else  if (isset($_REQUEST['ModifyRow']))  {
 $arrid=$_POST['ModifyRow']; foreach ($arrid as $cle => $element) {header("Location: user_mod.php?&a=m&id=$cle");} 
 }
 else if (isset($_REQUEST['DeleteRow']))  {
 $arrid=$_POST['DeleteRow']; foreach ($arrid as $cle => $element) {header("Location: user_del.php?&a=d&id=$cle");} 
 };  
 
 
?>
