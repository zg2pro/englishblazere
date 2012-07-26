<?php
/**
 * Common call & global variables used in all pages
 *
 * @category   PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
global $dbhost;global $dbname;global $dbadmusername;global $dbadmuserpass;global $connection;global $select_base;global $sitescriptdebug;global $siteliquidhtml;
global $PGE_HEAD_JS_SCRIPTS;global $PGE_HEAD_CSS_STYLES;
global $urlprotocol;
global $urlsrvport;
global $DEBUG; 
$path='..';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

	// SESSION USED FOR VARIABLES :
	session_name("DVD_Library");

	if (session_id()==="") session_start();
	
  if ($siteliquidhtml=="") $siteliquidhtml=0;

	$urlprotocol="http://";
	if (isset ($_server["HTTPS"])) if ($_server["HTTPS"] == "on") {$urlprotocol="https://";}

	$urlsrvport="";
	if (getenv("SERVER_PORT") != "") {$urlsrvport=":".getenv("SERVER_PORT");}
	
	if (! isset($_SESSION["lastviewdisplayed"])) {	$_SESSION["lastviewdisplayed"] = "dvd_view.php?&sort=1"; }                                                                                             	

require_once 	'includes/gfunctions.php';
require_once 	'includes/language.php';
require_once 	'includes/config.php';
require_once 	'includes/security.php';
require_once 	'includes/connect.php';
require_once 	'includes/workflow.php';
require_once  'includes/message.php';

if(isset($_SESSION["sitescriptdebug"])) {$DEBUG=$_SESSION["sitescriptdebug"];}else $DEBUG=false;

if (isset($_REQUEST['cancel']))  {header("Location:".$_SESSION["lastviewdisplayed"]);}
?>