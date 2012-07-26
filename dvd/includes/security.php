<?php
/**
 * Security functions used in several PHP pages
 * Check security
 * @category   PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

 if (! isset($_SESSION["security"])) {
	$_SESSION["security"] = "Anonymous";
 }
 else {if ($_SESSION["security"]==="Anonymous") {
 	//super !!!
 }};

 if ($sitesecurity==true  && $_SESSION["security"]=="Anonymous" ) {
     if ( strpos (getenv("SCRIPT_NAME"),"login.php")<=0 &&  strpos (getenv("SCRIPT_NAME"),"login_post.php")<=0 ) {
       include 'includes/header0.php';
       echo "<body class=\"window\">";
       echo "<div class=\"msgerrors mustlogin\">".$lang['MSG_AUTHENTICATION_FAILURE']."</div>"."</body></html>";
       die("<!-- bye Bye -->");       
     } 
 }

 function IsAdmin(){
 $vAdmin=false;
 if (isset($_SESSION["security"]) && $_SESSION["security"]!="Anonymous") $vAdmin=true;
 return $vAdmin;
 };
 
 function secur__actioncontrol($msgtxt){
   global $lang;
   if ( !IsAdmin() ) {
    die("<div class=\"msgerrors mustlogin\">".$lang['MSG_AUTHORIZATION_FAILURE']."</div>".$msgtxt);
    }
    else {return 1;} 
 }
 
 function IsLogged(){
   $IsLogged=false;
   if(isset($_SESSION["security_id"])) $IsLogged=true;
   return $IsLogged; 
 }
  
?>