<?php
/**
 * User Send Info
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
  

$nosecurity=true; 
global $fromapproot;
require_once 'common.php';

if (isset($_POST["cancel"])) {header("Location:login.php");} 

include 'includes/header0.php';
?>
<body class="window">
<?php
//DISPLAY UI ERRORS
if  (isset ($_GET["erreur"]) ) {
echo $_GET["erreur"];
}

$email        ="";
$user_login   ="";
$user_password="";

if (isset($_POST["send"])) {
     echo "<p>";
      
     $email         =$_POST["email"];
     $user_login    =$_POST["user_login"];
     
	   $req_sql = "SELECT User_LName,User_FName,Email,User_Login,User_Password,User_Gender FROM dbmix_user WHERE Email='$email' OR User_Login='$user_login';";
	   //MUST BE ONE USER FOR THAT EMAIL AND LOGIN
	   //PROCEED SQL REQUEST :
	   $res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);

     while ($row = mysql_fetch_array($res_query)) {        
        $lastname       = $row[0];
        $firstname      = $row[1];
        $email          = $row[2];
        $user_login     = $row[3];
        $user_password  = $row[4];
        $gender         = $row[5];
        $res_mail=@mail($email, $lang["MSG_USER_SENDINFOMAILSUBJECT"], "$gender $firstname $lastname,".$lang["MSG_USER_SENDINFOMAILBODY"]."\n \n ".$lang['USERNAME'].": $user_login\n ".$lang['PASSWORD'].": $user_password\n" );
        if ($res_mail==FALSE){echo $lang["MSG_ERROR_SEND_MAIL"]."<br/>".$lang['DSP_LIBRARY'];}
     }
    
    if ($res_mail==TRUE){ 
      if ($user_password!="") {    
      echo $lang["MSG_USER_SENDINFOSOK"].$email."<br/>".$lang['DSP_LIBRARY'];
      }
      else{ 
      echo $lang["MSG_USER_SENDINFOSKO"]."<br/>".$lang['DSP_LIBRARY'];    
      }
    } 

    //FREE SQL RESULTS
    mysql_free_result($res_query);
    
  	//CLOSING CONNECTION
  	mysql_close($connection);
  	
    die("</p></body></html>"); 
}                                                                
else{
?>
<form id="authreq" name="authreq" method="post" action="user_sndinfo.php">
  <fieldset class="ftitle"><legend><h1><?php echo $lang['SCREEN_TITLE_SENDME'] ?></h1></legend>
  <p class="mandatory hiddenTextPRT"><?php echo $lang['MANDATORY'] ?></p>
  
    <p>
      <label for="email"><?php echo $lang['EMAIL']; ?></label> 
      <input name="email" type="text" id="email" size="40" />
    </p>
    <p>
      <label for="label"><?php echo $lang['LOGIN']; ?></label> 
      <input name="user_login" type="text" id="label" size="32" />
    </p>
  </fieldset>
  <div class="action">
    <input type="submit" name="send" id="send" value="<?php echo $lang['SAVE']; ?>" class="action savedoc"/>
    <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL']; ?>" class="action cancel"/>
  </div>
</form>
<?php 
}
?>
</body>
</html>