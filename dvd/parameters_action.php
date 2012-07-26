<?php
/**
 * parameters Actions management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

 if( isset($_REQUEST['addbtn']) ) {
     header("Location:".'parameters_mngt.php?&a=n');
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
 
 
 
?>
