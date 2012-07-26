<?php
/**
 * user management, one file for all, not used at all
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'common.php';
 
$Id=$_GET["id"];

$SRIPTACTION=$_GET["a"];

if ($SRIPTACTION==="m" or $SRIPTACTION==="r") {
    header("Location:./user_mod.php?&a=m&id=".$Id);
}
elseif ($SRIPTACTION==="d") {
//DELETE
    header("Location:./user_del.php?&a=d&id=".$Id);
}