<?php
/**
 * Installer
 *
 * @category   HTML,PHP
 * @package    root/install/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

global $dbhost;global $dbname;global $dbadmusername;global $dbadmuserpass;global $connection;global $select_base;
global $PGE_HEAD_JS_SCRIPTS;

global $fromapproot;$fromapproot='../';
require_once $fromapproot.'includes/gfunctions.php';
require_once $fromapproot.'includes/config.php';
require_once $fromapproot.'includes/language.php';

//TEST IF WE FOUND CONFIGVAR.PHP
if (!isset($sitecss)){$dbhost="";$dbname="";$dbadmusername="AdminDVD";$dbadmuserpass="Cabale";$sitecss="japan";$sitesecurity=0;$allowuserreg=0;}

//// DISPLAY ERRORS
if  (isset ($_GET["msgerrv"]) ) {	echo $_GET["msgerrv"];}

if  (isset ($_GET["a"]) ) {$SRIPTACTION=$_GET["a"];} else {$SRIPTACTION="";};

	$file = 'dvdtbl_install.sql';
	if (file_exists($file)) {$req_sql = file_get_contents($file, true);}else {$req_sql="";}

if ($SRIPTACTION==="m" && $req_sql!="") {
	//MODIFY

	$dbhost = $_POST["dbhost"];
	$dbname = $_POST["dbname"];
	$dbmysqluname = $_POST["dbmysqluname"];
	$dbmysqlpass = $_POST["dbmysqlpass"];
	$dbadmusername = $_POST["dbadmusername"];
	$dbadmuserpass = $_POST["dbadmuserpass"];
	$sitecss = $_POST["sitecss"];
	$siteliquidhtml=0;
	$sitesecurity = $_POST["sitesecurity"];
  
	if (!$connection) $connection = @mysql_connect($dbhost,$dbmysqluname,$dbmysqlpass);
	if (!$connection){die('Could not connect: ' . mysql_error());}
	if (!$select_base) $select_base=@mysql_selectdb($dbname);
	if (!$select_base){echo "<b>Bad settings</b><br/>
Check the mysql administrator, he must have those rights on <b>$dbname</b> :<br/>
Select, Insert, Update, Delete tables<br/>
Create, Alter, Drop, Index tables<br/>
Create ,Grant users<br/>";}else{/*die("Connect string = ".$dbhost.";".$dbname.";".$dbuname.";".$dbpass);*/}

/*
  //removed cause installer work as an update
	$query = "SHOW TABLES LIKE '".str_replace("`", "", $SQL_TABLE_DVD_NAME)."'";
	//------------------------------------------------- SQL REQUEST
	$res_query = mysql_query($query) or  mysql_errorget('',$query);
	if (mysql_numrows($res_query)==1) die("It seems there's already a table called $SQL_TABLE_DVD_NAME. You could not run that installer.");
*/
  
	edit_configvar("../includes/",$dbhost,$dbname,$dbmysqluname,$dbmysqlpass,$dbadmusername,$dbadmuserpass,$sitecss,$siteliquidhtml,$sitesecurity,$allowuserreg);

	$formaction="installer.php?&a=r";


	//PROCEED TO SQL :
	// Opn SQL file in a array of lines
	$lines = file($file);

	// Launch each SQL line request
	foreach ($lines as $line_num => $line) {
    	//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
    	$res_query=mysql_query($line);
    	//if(mysql_error($connection)){echo 'SQL error on '.$line;};
    	//mysql_errorget('',$line);
	}

	//TEST SQL ERROR :
	if(mysql_error($connection)){	echo "Echec de la requete SQL:".mysql_error($connection);	}
	else {header("Location:"."../".$lang['URL_HOME_FRS']);}
	//CLOSING CONNECTION
	mysql_close($connection);

} else {
	$formaction="installer.php?&a=m";
	$dbmysqluname = "";
	$dbmysqlpass = "";
	//security addition
	$dbadmusername = "";
  $dbadmuserpass = "";
  $siteliquidhtml = 0;
  $sitesecurity = 0;
  $allowuserreg=0;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="<?php echo $lang['LANG']; ?>">
<head>
<title>Installer</title>
<?php
require_once $fromapproot.'includes/header1.php';
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
function SaveForm() {
	var fieldstocontrol = new Array('dbhost','dbname','dbmysqluname','dbmysqlpass','dbadmusername','dbadmuserpass','sitecss');
	if (FormIsValid(fieldstocontrol) === true) {
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
//--></script>";
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
<!-- 
function CopyMySQLUserParams() {
	document.forms[0].dbadmusername.value=document.forms[0].dbmysqluname.value;
	document.forms[0].dbadmuserpass.value=document.forms[0].dbmysqlpass.value;
};
//--></script>";

echo $PGE_HEAD_JS_SCRIPTS;
?>
</head>
<body class="window">
<h1><?php echo $lang['INSTALL'];?></h1>
<!-- Main content linkto --><a href="#navtoMain" title="Skip to Main"  target="_self" class="hiddenTextSR">Skip to Main</a>
<form id="formlogin" name="formlogin" method="post"	action="<?php echo $formaction;?>" onsubmit="return SaveOrNot();">
<!-- Main content link --><a href="#"  name="navtoMain" title="Main content"  target="_self" class="hiddenTextSR">Main content</a>
<fieldset><legend>MySQL parameters</legend>
  <p>
    <label for="dbhost">*Host</label>
    <input type="text" name="dbhost" id="dbhost" value="<?php echo $dbhost;?>" /><input type="button" value="Assist-me" onclick="document.forms[0].dbhost.value=window.location.hostname;" style="width:16px;height:16px;text-indent:-9999em;text-align:left;vertical-align:top;background:url(../images/Assist_16x16.gif) no-repeat right top;"/>
    </p>
  <p>
    <label for="dbname">*Database name</label>
    <input type="text" name="dbname" id="dbname" value="<?php echo $dbname;?>" />
    </p>
<p class="msgwarning">MySQL Admin user must have the following rights :</p>
<ul>
	<li>CREATE, DROP a table</li>
	<li>INSERT, UPDATE, DELETE records</li>
</ul>
<br/>
<p>
    <label for="dbmysqluname">*MySQL Admin login (will not be saved anywhere)</label>
    <input type="text" name="dbmysqluname" id="dbmysqluname" value="<?php echo $dbmysqluname;?>" />
  </p>
  <p>
    <label for="dbmysqlpass">*MySQL Admin password (will not be saved anywhere)</label>
    <input type="password" name="dbmysqlpass" id="dbmysqlpass" value="<?php echo $dbmysqlpass;?>" />
  </p>
</fieldset>
<p>If you can not create user privileges, <input type="button" value="copy" onclick="CopyMySQLUserParams();" style="width:6em;text-align:left;vertical-align:top;height:16px;background:url(../images/Assist_16x16.gif) no-repeat right top;border:dashed 1px black;"/> these values above in
those fields :</p>
<p class="msgwarning">Admin user must have the following rights :</p>
<ul>
	<li>INSERT, UPDATE, DELETE records</li>
</ul>
<br/>
<fieldset><legend>Those application parameters</legend>
  <p>
    <label for="dbadmusername">*Admin login</label>
    <input type="text" name="dbadmusername" id="dbadmusername" value="<?php echo $dbadmusername;?>" />
  </p>
  <p>
    <label for="dbadmuserpass">*Admin password (will not reset password in MySQL database)</label>
    <input type="password" name="dbadmuserpass" id="dbadmuserpass" value="<?php echo $dbadmuserpass;?>" />
  </p>
</fieldset>

<fieldset><legend>User interface</legend>
  <p>
    <label for="sitecss">*Site css</label>
    <input type="text" name="sitecss" id="sitecss" value="<?php echo $sitecss;?>" />
  </p>
  <p>
    <label for="sitesecurity">*<?php echo $lang['PARAM_SSECURITY'];?></label>
    <select name="sitesecurity" id="sitesecurity" >
    <?php
    $valselected=$sitesecurity;                       
    HTML_PRT_SELECTOPTION(0,$lang['NO'],$valselected);   //FALSE IS NOT RETURNED IN THE FUNCTION
    HTML_PRT_SELECTOPTION(TRUE,$lang['YES'],$valselected);                                  
    ?>
	</select>
  </p>
</fieldset>


<?php
//hidden for security reason
/* 
<fieldset><legend>SQL statement</legend>
  <p><label for="SQLtxt">SQL Request</label> <textarea readonly="readonly"
	name="SQLtxt" id="SQLtxt" cols="45" rows="30"><php echo $req_sql;></textarea>
  </p>
</fieldset>
*/
?>

  <div class="action">
  <input type="submit" name="send" id="send" value="Apply" class="action savedoc"/>
  <input type="button" name="cancel" id="cancel" value="Cancel" class="action cancel" onclick="top.location='./<?php echo $lang['URL_HOME_FRS'];?>';" />
  </div>

</form>
</body>
</html>
