<?php
/**
 * Get and set Languages for the site
 *
 * @category   PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

if(isSet($_GET['lang']))
{
$langget = $_GET['lang'];

// REGISTER THE SESSION AND COOKIE
$_SESSION['lang'] = $langget;

setcookie('lang', $langget, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$langget = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$langget = $_COOKIE['lang'];
}
else
{
$langget = 'en';
}

$langcharset = 'utf-8';
switch (strtolower($langget)) {
  case 'en':
  $langget_file = 'en.php';
  $langcharset = 'ISO-8859-1';
  break;

  case 'de':
  $langget_file = 'de.php';
  break;

  case 'es':
  $langget_file = 'es.php';
  break;

  case 'fr':
  $langget_file = 'fr.php';
  $langcharset = 'ISO-8859-1';
  break;

  default:
  $langget_file = 'en.php';

}

include 'lang/'.$langget_file;
?>