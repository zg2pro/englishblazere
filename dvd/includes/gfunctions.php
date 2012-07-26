<?php
/**
 * Global functions used in several PHP pages
 *
 * @category   PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

function is_db_tables_are_here(){
global $lang;
global $SQL_TABLE_DVD_PREFIX;
 //VERIF DBS INTEGRITY
$query = "SHOW TABLES LIKE '$SQL_TABLE_DVD_PREFIX%'";
//------------------------------------------------- SQL REQUEST
$res_query = mysql_query($query) or  mysql_errorget('',$query);
if (mysql_numrows($res_query)<5) {HTML_PRT_MSG($lang['MSG_ERROR_APP_CONFIG']);die("");}  
}

function is_email($chaine){
			if (preg_match("/^[a-zA-Z0-9.-]{1,}@[a-zA-Z0-9.-]{2,63}[.][a-zA-Z]{2,4}$/",$chaine)) {
			$resultat=true;}
			else{$resultat=false;}
			return $resultat;
			}

function url_encode($url_str){
    //'%27',	"'",
    //'%25', 	"%",
	/*
    $entities = array('%21', '%2A', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%23', '%5B', '%5D');
    $replacements = array('!', '*', "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "#", "[", "]");
    return str_replace($entities, $replacements, urlencode($url_str));
    */
   return rawurlencode($url_str);
	}

function url_decode($url_str){
	return rawurldecode($url_str);
}

function edit_configvar($rootfileconfig,$dbhost,$dbname,$dbmysqluname,$dbmysqlpass,$dbadmusername,$dbadmuserpass,$sitecss,$siteliquidhtml,$sitesecurity,$allowuserreg){
	$myFile = $rootfileconfig."configvar.php";
	$fh = fopen($myFile, 'wb') or die("Can't open file : ".$myFile);
	$stringData = '<?php ';
	fwrite($fh, $stringData);
	$stringData = '$dbhost="'.$dbhost.'";';
	fwrite($fh, $stringData);
	$stringData = '$dbname="'.$dbname.'";';
	fwrite($fh, $stringData);
	$stringData = '$dbadmusername="'.$dbadmusername.'";';
	fwrite($fh, $stringData);
	$stringData = '$dbadmuserpass="'.$dbadmuserpass.'";';
	fwrite($fh, $stringData);
	$system=1;
	$stringData = '$system='.$system.';';
	fwrite($fh, $stringData);
	$prefix="";
	$stringData = '$prefix="'.$prefix.'";';
	fwrite($fh, $stringData);
	$sitekey="";
	$stringData = '$sitekey="'.$sitekey.'";';
	fwrite($fh, $stringData);
	$stringData = '$sitecss="'.$sitecss.'";';
	fwrite($fh, $stringData);
	$stringData = '$siteliquidhtml='.$siteliquidhtml.';';
	fwrite($fh, $stringData);		
	$stringData = '$sitesecurity='.$sitesecurity.';';
	fwrite($fh, $stringData);
	$stringData = '$allowuserreg='.$allowuserreg.';';
	fwrite($fh, $stringData);	
	$stringData = ' ?>';
	fwrite($fh, $stringData);
	fclose($fh);
	return true;
}

function mysql_errorget($msgerror,$query){
  global $DEBUG;
	if($DEBUG==true && $query!='') die('<h1>'.$msgerror.'</h1><p>MySQL Error : sql query "'.$query.'" generates an error('.mysql_errno().') "'.mysql_error().'"</p>');
	else die('<h1>'.$msgerror.'</h1><p>MySQL Error : script generates an error ('.mysql_errno().')<p>');	
}

function datasforMySQL($stringvalue){
	//test : {&eéèëêçàùµ¤£$~'"()§\ <>=*-/+\Ý[	]TAB$%}
	//changed on 2011/04/04
		
	if (get_magic_quotes_gpc()===0) {
    $entities = array("\\",'"',"'");
  	$replacements = array("\\\\","'","\'");  	
  } else {
    $entities = array('"');
	 $replacements = array("'");
  }
	
	$newstringvalue = str_replace($entities,$replacements,$stringvalue);
	return $newstringvalue;
}

//slashes functions 
function addslashesfromenv($stringvalue){	
	//added on 2011/08/11
	  	
	if (get_magic_quotes_gpc()===0) {
    $newstringvalue=addcslashes($stringvalue,"'");  	
  } else {
    $newstringvalue=$stringvalue;
  }	
	return $newstringvalue;
}
function stripslashesfromenv($stringvalue){	
	//added on 2011/08/11
		
	if (get_magic_quotes_gpc()===0) {
    $newstringvalue=stripcslashes($stringvalue);  	
  } else {
    $newstringvalue=$stringvalue;
  }	
	return $newstringvalue;
}

//SQL string functions
function mySQLstrfromenvIN($stringvalue){	
	//added on 2011/08/11
	  	
	//if (get_magic_quotes_gpc()===0) {
    $newstringvalue=str_replace("\\","\\\\\\\\",$stringvalue);  	
  //} else {$newstringvalue=$stringvalue;}	
	return $newstringvalue;
}
function mySQLstrfromenvOUT($stringvalue){	
	//added on 2011/08/11
		
	//if (get_magic_quotes_gpc()===0) {
    $newstringvalue=str_replace("\\\\\\\\","\\",$stringvalue);  	
  //} else {$newstringvalue=$stringvalue;}	
	return $newstringvalue;
}

//SQL string LIKE & SEARCH functions conversion
function mySQLstrLIKEfromenvIN($stringvalue){	
	//added on 2011/09/16
	    	
	if (get_magic_quotes_gpc()===0) {
    $totreat = array("\\", "'");  	
    $treatas = array(str_repeat ( "\\" , 4 ), "\'");    
    $newstringvalue = str_replace($totreat, $treatas, $stringvalue);
  } else {
    $totreat = array( "\\");  	
    $treatas = array( str_repeat ( "\\" , 2 ));    
    $newstringvalue = str_replace($totreat, $treatas, $stringvalue); 
    $totreat = array( "\\\'");  	
    $treatas = array( "\'" );    
    $newstringvalue = str_replace($totreat, $treatas, $newstringvalue);   
  }	
	return $newstringvalue;
}
function mySQLstrLIKEfromenvOUT($stringvalue){	
	//added on 2011/09/16
	    	
	if (get_magic_quotes_gpc()===0) {    	
    $totreat = array(str_repeat ( "\\" , 4 ), "\'");    
    $treatas = array("\\", "'");
    $newstringvalue = str_replace($totreat, $treatas, $stringvalue);
  } else {  
    $totreat = array( str_repeat ( "\\" , 2 ));
    $treatas = array( "\\");
    $newstringvalue = str_replace($totreat, $treatas, $stringvalue);
    $totreat = array( "\'");  	
    $treatas = array( "'" );    
    $newstringvalue = str_replace($totreat, $treatas, $newstringvalue);   
  }	
	return $newstringvalue;
}


//HTML
function datasforHTML($stringvalue){
	//return $stringvalue;
	//$stringvalue=str_replace("&#92;","\\",$stringvalue);
	//return htmlentities($stringvalue);
	return $stringvalue;
}

function strrightback($value, $strtosearch){
	$count=strrpos ( $value , $strtosearch , 0 );
    return substr($value, $count);
}

function strleft($value, $strtosearch){
	$count=strrpos ( $value , $strtosearch , 0 );
    return substr($value, 0, $count);
}

function Format_str($chaine)
{
	if ( is_numeric($chaine) )
		{	if ($chaine>0 && $chaine<10) {	$chaine_f="0".$chaine;}	
			else {$chaine_f="".$chaine;}
		}
		
	return $chaine_f;
}

function dir_filterext($dirname,$filterext){
	//Open directory
$d = dir($dirname);
$filterext=mb_convert_case($filterext,MB_CASE_LOWER);
$dj=0;
$filelist;
//List files in directory
while (($file = $d->read()) !== false)
  {
  	$fileext=strrightback(mb_convert_case($file,MB_CASE_LOWER),$filterext);
  if($fileext==$filterext) {$filelist[$dj]=$file;$dj=$dj+1;}
  }
$d->close();
return $filelist;
}

function HTML_PRT_SELECTOPTION($value,$label,$valselected){
	$htmlsel="";
	if ($valselected==$value) $htmlsel=" selected ";
		  echo "<option value=\"$value\" $htmlsel>$label</option>";
}

function HTML_GET_SELECTOPTION($value,$label,$valselected){
	$htmlsel="";
	if ($valselected==$value) $htmlsel=" selected ";
		  return "<option value=\"$value\" $htmlsel>$label</option>";
}

?>
