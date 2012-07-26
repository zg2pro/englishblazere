<?php
/**
 * About
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

$PGE_HEAD_CSS_STYLES ="<style>.intro{height:220px;overflow:hidden;padding-left:10px;}</style>";
$PGE_HEAD_JS_SCRIPTS="<script>
var t;
function scrollDivToTop(){
  var div = document.getElementById('dintro');
    if (div.scrollTop>200)    
      {div.style.overflow='scroll';
      div.style.overflowX='hidden';    
      div.style.overflowY='scroll';} 
       
    if (div.scrollTop>=0 && div.scrollTop<230){
       div.scrollTop++; //scroll 1 pixel up
       t = setTimeout('scrollDivToTop()', 100);
    }
    else {clearTimeout(t);}
}
</script>";
 
include 'includes/header0.php';
?>
<body class="window about" onload="scrollDivToTop()">

<h1>About</h1>
<h2><?php echo $lang['APP_NAME']; ?></h2>
<p>Created by : Patrice CHASSAING, 2011-2012</p>

<div id="dintro" class="intro">
<br/><br/>
<div>Icons have been downloaded from : 
  <ul>
	<li><a href="http://www.small-icons.com/packs/24x24-free-application-icons.htm"
	target=_blank title="Small Icons">Small-Icons</a> & created by <a href="http://www.aha-soft.com/" target=_blank
	title="aha-soft">AHA-SOFT</a></li>
	<li> or <a	href="http://www.gettyicons.com/free-icon/103/flags-icon-set/free-united-states-flag-icon-png/"
	target=_blank title="http://www.gettyicons.com">http://www.gettyicons.com</a></li>
	</ul>
</div>
<br/>
<div>Using some 'greats' libraries or codes :
<ul>
	<li><a href="http://www.jquery.com/" target="_blank" title="jQuery">jQuery</a></li>
	<li><a href="http://jqueryui.com/" target="_blank" title="jQuery UI">jQuery UI</a></li>
	<li><a href="http://code.google.com/p/jquery-translate/" target="_blank" title="jquery-translate ">jquery-translate</a></li>
	<li><a href="http://www.deanclatworthy.com/imdb/" target="_blank" title="Imdb web services">Imdb web services</a></li>
	<li><a href="http://www.i-marco.nl/weblog/" target="_blank"	title="Simple jQuery Accordion Menu">Simple jQuery Accordion Menu</a></li>
	<li><a href="http://atutility.com/" target="_blank"	title="'mysqldump.php' by Huang Kai">'mysqldump.php' by Huang Kai</a></li>
	<li><a href="http://bassistance.de/jquery-plugins/jquery-plugin-autocomplete/" target="_blank"	title="jQuery Autocomplete plugin by Jörn Zaefferer">jQuery Autocomplete plugin</a></li>  
  <li><a href="http://plugins.jquery.com/project/swap-jumble" target="_blank"	title="'swap() and jumble() functions for jQuery' by mindplay-dk">swap() and jumble() functions for jQuery</a></li>	
	<li><a href="http://code.google.com/p/cookies/" target="_blank"	title="'jquery.cookies.js' by James Auldridge">jquery.cookies.js</a></li>
	<li><a href="http://malsup.com/jquery/block/" target="_blank"	title="jQuery blockUI plugin by M. Alsup">jQuery blockUI plugin</a></li>
  <li><a href="http://code.google.com/intl/fr-FR/apis/maps/index.html" target="_blank"	title="Google Maps API Family">Google Maps API Family</a></li>
</ul>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<p>Your opinion matters to us.</p>

<p>You must not change the code.<br />
You must read each authors licenses for material use.<br />
All requests must be done on <a href="http://sourceforge.net/projects/dvd-at-home/" title="Support" target="_blank">sourceforge project page</a>.
</p>

<p>Release : 1.201204.01</p>

</div>

</body>
</html>
