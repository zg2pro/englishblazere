<?php
/**
 * USED TO QUERY DB BY AJAX REQUEST
 *
 * @category   HTML,PHP
 * @package    root/tools/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
require_once '../common.php';

$q = strtolower($_GET["q"]);
if (!$q) {return "no query|no query\n";}
else {$q=addslashesfromenv(mySQLstrfromenvIN($q));}

$dbtable=$_GET["t"];
$dbfield=$_GET["f"];
$dbfieldid="";
if(isset($_GET["as"])) $dbfieldid=$_GET["as"];

//SQL REQUEST :
if ($dbfieldid=="") {
$query = "SELECT DISTINCT `$dbfield` FROM $dbtable WHERE $dbtable.`$dbfield` LIKE '$q%' ORDER BY $dbtable.`$dbfield` ASC ";}
else{
$query = "SELECT DISTINCT `$dbfield`,`$dbfieldid` FROM $dbtable WHERE $dbtable.`$dbfield` LIKE '$q%' ORDER BY $dbtable.`$dbfield` ASC ";}
//PROCEED TO SQL :
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // we get recordset number
$i = 0;
//READING THE RECORDSET :
while ($i < $nb){
  //$rec_val = mysql_result($res, $i, $dbfieldsrtc);
  //$rec_val = mysql_result($res, $i, $dbfield);
  $rec_val[0] = mysql_result($res, $i, $dbfield);
  if ($dbfieldid!="") {$rec_val[1] = mysql_result($res, $i, 'Id');}
  else{$rec_val[1]=$rec_val[0];}
  if ($i < $nb-1) {echo "$rec_val[0]|$rec_val[1]\n";}
  else {echo "$rec_val[0]|$rec_val[1]";} 
    $i++;
}

?>
