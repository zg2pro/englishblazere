<?php
session_start();

$hl="fr";
$_SESSION["hl"] = "fr";

if (!isset($_GET["p"]))
	$p="mycv";
else {
	$p = $_GET["p"];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11203253-1");
pageTracker._trackPageview();
} catch(err) {}</script>


<?php 
	
require_once('headers.strings.php');
require_once('glossary.strings.php');

require_once ("../php/rss.php");
require_once ("../php/headers.php");
if (file_exists ("../php/".$p.".php")) require_once ("../php/".$p.".php");
else {
if (file_exists ($p.".php")) require_once ($p.".php");
else {
	echo "<div id='attention'>
	La page que vous avez demand&eacute; n'est pas encore disponible en langue fran&ccedil;aise.
	Merci.
	</div>
	";
	require_once ("../en/".$p.".php");
}
}
?>
