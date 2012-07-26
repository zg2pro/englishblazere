<?php
/**
 * User REC management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
if ($_POST['IsNew']==1) {$nosecurity=true;};
require_once("common.php");
include 'includes/header0.php';
?>

<body class="window ui-user">
<p>
<?php 
  //ERROR VARIABLES
	settype($erreur,"string");
	$erreur="";

  //GETTING VALUES FROM FIELDS
	$genre=$_POST["genre"];
	if ($genre==""){
	$erreur.="<li>".$lang['MSG_FIELD_MANDATORY']." ".$lang['GENDER']."</li>";
	}
	else
	{
	$genre=$genre;
	}

	$nom=$_POST["nom"];
	if ($nom==""){
	$erreur.="<li>".$lang['MSG_FIELD_MANDATORY']." ".$lang['LNAME']."</li>";
	}
	else
	{
	$nom=datasforMySQL(strtoupper($nom));
	}
	
	$prenom=$_POST["prenom"];
	if ($prenom==""){
	$erreur.="<li>".$lang['MSG_FIELD_MANDATORY']." ".$lang['FNAME']."</li>";
	}
	else
	{
	$prenom=datasforMySQL(ucfirst($prenom));
	}
	
	$jour=(int)$_POST["jour"];
	$mois=(int)$_POST["mois"];
	$annee=(int)$_POST["annee"];
	
	if(checkdate($mois,$jour,$annee)){$date_naissance="$annee-$mois-$jour";}
	else{$erreur.="<li>".$lang['MSG_FIELD_ERROR']." ".$lang['BIRTHDT']."</li>";}

	$email=$_POST["email"];
		if ($email!=""){	$email=datasforMySQL($email);	}
	
	$lieux_dit=$_POST["lieux_dit"];
		if ($lieux_dit!=""){	$lieux_dit=datasforMySQL($lieux_dit);	}
	
	$adresse=$_POST["adresse"];
		if ($adresse!=""){	$adresse=datasforMySQL($adresse);	}
	
	$code_postal=$_POST["code_postal"];
		if ($code_postal!=""){	$code_postal=datasforMySQL(strtoupper($code_postal));	}
				
	$ville=$_POST["ville"];
		if ($ville!=""){	$ville=datasforMySQL(strtoupper($ville));	}
	
	$pays=$_POST["pays"];
		if ($pays!=""){	$pays=$pays;	}
	
	$user_login=$_POST["user_login"];
		if ($user_login!=""){
	$user_login=addslashes($user_login);
	
  	
	//CREATE CONNECTION
	//include("includes/connexion_db_inc.php");		
	
	//CREATE SQL REQUEST :
	$req_sql = "SELECT * FROM $SQL_TABLE_DVD_USER WHERE User_login='".$user_login."';"  ;
	
	//PROCEED SQL REQUEST :
	//include("includes/connexion_query_inc.php");
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	$result=$res_query;

  $num_rows = mysql_num_rows($result);

	if ( $num_rows>=1 && ($_POST["IsNew"]=="1") ){ $erreur.="<li>".$lang["MSG_USER_DBLLOGIN"]."</li>"; }
	
	//FREE SQL RESULTS	
	mysql_free_result($result);
	
	//$cnx=$connection;
	
	//CLOSING CONNECTION
	//mysql_close($cnx);
		}	
		else  { $erreur.="<li>".$lang['MSG_FIELD_MANDATORY']." ".$lang['LOGIN']."</li>"; }
    
	$user_password=$_POST["user_password"];
		if ($user_password!=""){	$user_password=addslashes($user_password);	}
		else  { $erreur.="<li>".$lang['MSG_FIELD_MANDATORY']." ".$lang['PASSWORD']."</li>"; }
	

//Affichage des informations :
	if  ($erreur) {
		HTML_PRT_MSG($lang['MSG_FIELDS_ERRORS']." :<br/><ul>".$erreur."</ul>");
	}
	else
	{
	
  //CREATE CONNECTION
	//include("includes/connexion_db_inc.php");
	//$select_base=@mysql_selectdb("$dbname");
	
	//CREATE SQL REQUEST :	
	if (($_POST["IsNew"])=="1")
	{
	$user_password_enc = md5($user_password);
	$req_sql = "INSERT INTO $SQL_TABLE_DVD_USER(User_Status,User_Gender,User_LName,User_FName,User_BirthDT,Email,Address_Site,Address,Address_ZIP,Address_City,Address_Country,User_Login,User_Password,DT_CRT)
				VALUES('USR000','$genre','$nom','$prenom','$date_naissance','$email','$lieux_dit','$adresse','$code_postal','$ville','$pays','$user_login','$user_password_enc',Now());";
	//PROCEED SQL REQUEST :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	$req_sql = "INSERT INTO $SQL_TABLE_DVD_USER_SETTINGS (`Id`, `Id_User`, `Css`, `RowsByPageNb`, `UserRoles`, `DT_CRT`, `DT_MOD`) VALUES (NULL, '".mysql_insert_id()."', 'japan', '50', '[ADMIN]', Now(), '0000-00-00 00:00:00');";
	//PROCEED SQL REQUEST :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	
	
	}
	else
	{
	$user_status=$_POST['User_Status'];
	$Id=$_SESSION["security_id"];
	if (isset($_POST["Id"])) {$Id=$_POST["Id"];}
	$updatepassword="";
	$user_password_indb=$_POST["user_password_indb"];
	if ($user_password_indb!=$user_password) {$updatepassword="User_password='$user_password',";}
	$req_sql = "UPDATE $SQL_TABLE_DVD_USER
				SET
				User_Status='$user_status',
				User_Gender='$genre',
				User_LName='$nom',
				User_FName='$prenom',
				User_BirthDT='$date_naissance',
				Email='$email',
				Address_Site='$lieux_dit',
				Address='$adresse',
				Address_ZIP='$code_postal',
				Address_City='$ville',
				Address_Country='$pays',
				$updatepassword
				DT_MOD=Now()
				WHERE Id =$Id ;";
	$req_sql = $req_sql."";	
	//PROCEED SQL REQUEST :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);	  
	
	}
	
  $cnx=$connection;
	 
	//TESTING SQL ERROR
	if(mysql_error($cnx)){	echo "SQL ERROR ".mysql_error($cnx);}//." ".$req_sql;	}
		else {
    if	($_POST["IsNew"]=="1"){	
              if (IsAdmin()!=true) {echo $lang["MSG_USER_REGISTERSUCCESS"]."<br/>".$lang['DSP_LOGIN']."<br/>".$lang['DSP_LIBRARY'];}
              else {echo $lang["MSG_USER_REGISTERSUCCESS"]."<br/>".$lang['DSP_LIBRARY']."<br/>".$lang['DSP_PARAMETERS'];}   
        }
        else{
              if (IsAdmin()!=true) {echo $lang["MSG_USER_REGISTERMODIFIED"]."<br/>".$lang['DSP_LOGIN']."<br/>".$lang['DSP_LIBRARY'];}
              else {echo $lang["MSG_USER_REGISTERMODIFIED"]."<br/>".$lang['DSP_LIBRARY']."<br/>".$lang['DSP_PARAMETERS'];}  
        } 
		}
		
	//CLOSING CONNECTION
	mysql_close($cnx);
	}
	
	?>
</p>
</body>
</html>
