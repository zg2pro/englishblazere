<?php
/**
 * OPENING ON DVD VIEW
 *
 * @category   PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'includes/language.php';
require_once 'includes/message.php';

if (file_exists('includes/configvar.php')!==true){
$fromapproot="./";
HTML_PRT_MSG($lang['MSG_ERROR_APP_CONFIG']);
  die("");}

if (isset($_GET['lang'])) {header("Location:".'dvd_view.php?&sort=1&lang='.$_GET['lang']);}
else header("Location:".'dvd_view.php?&sort=1&lang='.$lang['LANG']); 

?>
