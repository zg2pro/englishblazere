<?php
/**
 * Login POST management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'common.php';

	$login=$_REQUEST["login"];
	$password=$_REQUEST["password"];
  
  //we try to find it in MySQL TABLES too
  //CREATE SQL REQUEST :
  $user_password_enc = md5($password);
	$req_sql = "SELECT Id FROM $SQL_TABLE_DVD_USER WHERE User_Password='$user_password_enc' AND User_Login='$login' AND User_Status!='USR000';";
	//PROCEED TO SQL :
	//$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	$res_query=mysql_query($req_sql);
  if (!$res_query) { $req_nb=0; }else{$req_nb=mysql_num_rows($res_query);}
	
  if ( ($login == $dbadmusername && $password == $dbadmuserpass) ||  ( $req_nb==1 ) ){
           	// CHANGE SESSION LIFE (SECONDS)
        	ini_set("session.cookie_lifetime",(60 * 30));
        	// SESSION VAR WITH LOGIN
        	$_SESSION["security"] = $login;
        	// 1 year = 365 days = 8760 hours.
        	// 1 hour = 3600 secondes.
        	// 8760 hours * 3600 secondes = 31536000 secondes (means one year).
        	if ($req_nb>=1) {$row = mysql_fetch_row($res_query);}
        	else {$row[0]="0";}
        	$_SESSION["security_id"] = $row[0];
        	setcookie("security_id", $row[0], time() + 31536000);                 	
  }                            
	else {
        //BAD LOGIN OR PASSWORD
        //KILLS ALL SESSION VARIABLES :
        //session_unset();
        //KILLS SESSION ID :
        //session_destroy();	
      	header("Location:".$lang['URL_LOGIN']."?msgerrv=".$lang['MSG_LOGIN_FAILURE']);
	}
  //CLOSING CONNECTION
	mysql_close($connection);
  		
	//REDIRECT TO HOME
	header("Location:".$lang['URL_HOME_FRS']);

include 'includes/header0.php';
?>
<body class="window">
<?php echo $lang['MSG_LOGIN_SUCCESS']; ?>
<br /><a href="<?php echo $lang['URL_HOME_FRS'];?>"><?php echo $lang['SITE_NAME'];?></a>
</body>
</html>
