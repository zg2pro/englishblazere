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


	<!-- script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.simpletooltip-min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("a.tooltiplink").simpletooltip();
			$("a.clic").simpletooltip({click: true});
			$("a.delay").simpletooltip({hideDelay: 0.5});
			$("#demo_1").simpletooltip({ margin: 10 });
			$("#demo_2").simpletooltip({ showEffect: "fadeIn", hideEffect: "fadeOut" });
			$("#demo_3").simpletooltip({ showEffect: "slideDown", hideEffect: "slideUp" });
			$("#demo_4").simpletooltip({ showEffect: "show", hideEffect: "hide" });
			$("#demo_5").simpletooltip({ click: true });
			$("#demo_6").simpletooltip({ hideDelay: 0.5 });
			$("#demo_7").simpletooltip({ click: true, hideOnLeave: false });
			$("#demo_8").simpletooltip({
				callback: function(tooltip){
					window.alert('Callback : affichage de la tooltip #'+tooltip.id);
				}
			});
			$("#demo_9").simpletooltip({
				customTooltip: function(target){
					return '<p style="width:200px;height:50px;margin:0;padding:10px;background:#fff;border:1px solid #000;">Texte de l\'élément survolé :<br /> "'+ $(target).text() +'" </p>';
				},
				showEffect: "fadeIn",
				hideEffect: "fadeOut"
			});
		});
	</script -->	
	
<?php 
	
require_once('headers.strings.php');
require_once('glossary.strings.php');

require_once ("../PHP/rss.php");
require_once ("../PHP/headers.php");
if (file_exists ("../PHP/".$p.".php")) require_once ("../PHP/".$p.".php");
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
