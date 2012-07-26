<?php
/**
 * Checking PHP config
 *
 * @category   PHP
 * @package    root/tools/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
global $fromapproot;$fromapproot='../';

$PGE_HEAD_CSS_STYLES='<style type="text/css"> 
body {background-color: #ffffff; color: #000000;}
body, td, th, h1, h2 {font-family: sans-serif;}
pre {margin: 0px; font-family: monospace;}
a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse;}
.center {text-align: center;}
.center table { margin-left: auto; margin-right: auto; text-align: left;}
.center th { text-align: center !important; }
td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
h1 {font-size: 150%;}
h2 {font-size: 125%;}
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold; color: #000000;}
.h {background-color: #9999cc; font-weight: bold; color: #000000;}
.v {background-color: #cccccc; color: #000000;}
.vr {background-color: #cccccc; text-align: right; color: #000000;}
img {float: right; border: 0px;}
hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
</style>';

include $fromapproot.'includes/header0.php';

?>
<body class="window mult">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');

//print phpinfo() without headers, but include the style information
ob_start();                                                                                                        
phpinfo();                                                                                                         
$info = ob_get_contents();                                                                                         
ob_end_clean();                                                                                                    

$info = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $info);
echo $info;
  
?>
</body>
</html>