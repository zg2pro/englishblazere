<?php


if (isset($_GET["hl"]))
	$hl = $_GET["hl"];
	
else 
if (!isset($_SESSION["hl"]))
	$hl=substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);

switch($hl){	
	case"fr":
	$_SESSION["hl"] = "fr";
	header ("location: fr/");
	break;
		
	default:
	$_SESSION["hl"] = "en";
	header ("location: en/");
	break;
}
	
?>
