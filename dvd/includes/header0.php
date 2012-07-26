<?php
/**
 * Printing the HTML & HEAD TAGS of each pages
 *
 * @category   HTML,PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

if (!isset($fromapproot)) {global $fromapproot;$fromapproot='';} 
require_once $fromapproot.'common.php';
if (isset($_REQUEST['cancel']))  {header("Location:".$_SESSION["lastviewdisplayed"]);}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="<?php echo $lang['LANG']; ?>">
<head>
<title><?php echo $lang['APP_NAME']; ?></title>
<?php
require_once 'header1.php';
echo $PGE_HEAD_CSS_STYLES;
echo $PGE_HEAD_JS_SCRIPTS;
?>
</head>
