<?php
/**
 * Printing the HEAD includes of each pages
 *
 * @category   HTML,PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
function HTML_PRT_MSG($msgtxthtml){
global $lang;
global $fromapproot;
$sitecss="windows";
$PGE_HEAD_CSS_STYLES="";$PGE_HEAD_JS_SCRIPTS="";
//include_once $fromapproot.'includes/header0.php';
global $langcharset;
require_once 	'includes/language.php';
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
<body>
<div class="msgerrors">
<?php
echo $msgtxthtml;
?>
</div>
</body>
</html>
  <?php
}

?>
