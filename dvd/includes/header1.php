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
?>	
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $fromapproot;?>favicon_16x16.ico">
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="Description" CONTENT="<?php echo $lang['APP_NAME']; ?>" />
    <meta name="keywords" content="DVD" />
    <meta http-equiv="Content-Language" content="<?php echo $lang['LANG']; ?>" />
    <meta name="author" content="Patrice Chassaing" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $langcharset;?>" />
	<link rel=stylesheet type="text/css" media="handheld, all" href="<?php echo $fromapproot;?>css/standard.css" />
	<link rel=stylesheet type="text/css" media="handheld, all" href="<?php echo $fromapproot;?>css/<?php echo $sitecss;?>/theme.css" />
	<link rel=stylesheet type="text/css" media="handheld and (min-width: 481px)"  href="<?php echo $fromapproot;?>css/handheld+480.css" />
	<link rel=stylesheet type="text/css" media="handheld and (max-device-width: 480px)" href="<?php echo $fromapproot;?>css/handheld-480.css" />
	<meta name="viewport" content="width=device-width" />
	<style type="text/css">
  /*  CLASS ERROR */
  input.error, textarea.error, select.error, option.error {padding-right: 16px; border: 1px solid #FF6633; background-color: #FEC163; background-image: url(images/warning_obj.gif); background-position: right; background-repeat: no-repeat;}
  input.errordbl {padding-right: 16px; border: 1px solid #FF6633; background-color: #FEC163; background-image: url(images/warning_dbl.gif); background-position: right; background-repeat: no-repeat;}
  </style>
	<?php if($sitecss=="jquery-ui") echo '<link rel="stylesheet" type="text/css" href="'.$fromapproot.'themes/base/jquery.ui.all.css">'; ?>
	<script type="text/javascript" src="<?php echo $fromapproot;?>js/jquery.js">/*jquery-1.5.min.js*/</script>
	<?php if($sitecss=="jquery-ui") echo '<script type="text/javascript" src="'.$fromapproot.'js/jquery-ui.js">/*jquery-ui-1.8.10.custom.min.js*/</script>'; ?>
	<?php if($sitecss=="jquery-ui") echo '<script type="text/javascript" src="http://jqueryui.com/themeroller/themeswitchertool/"></script>'; ?>
	<script type="text/javascript" src="<?php echo $fromapproot;?>js/project.js">/*that project .js*/</script>
	<script type="text/javascript" src="<?php echo $fromapproot;?>js/jquery.cookies.js">/*jquery.cookies.2.2.0.min.js*/</script>
	<script type="text/javascript" src="<?php echo $fromapproot;?>js/jquery.blockUI.js">/*jQuery blockUI plugin Version 2.37 */</script>
	<script type="text/javascript" src="<?php echo $fromapproot;?>js/jquery.formvalidation.js"></script>
  <script type="text/javascript" src="<?php echo $fromapproot;?>js/jquery.formvalidation-regset-<?php echo strtolower($lang['LANG']);?>.js" charset="<?php echo $langcharset;?>"></script>
  <script type="text/javascript" src="<?php echo $fromapproot;?>css/<?php echo $sitecss;?>/theme.js?scpath=<?php echo $fromapproot.'css/'.$sitecss;?>"></script>  
  <script type="text/javascript">
  //global variables
  var waitmsg={ message: '<h1><img src="<?php echo $fromapproot;?>images/busy.gif" width="32" alt="Processing ..." />Processing ...</h1>' };
  var waitmsgajaxreq={ message: '<h1><img src="<?php echo $fromapproot;?>images/busy.gif" width="32" alt="Processing ..." />We are processing your request.  Please be patient.</h1>' };
  var waitmsgload={ message: null};//var waitmsgload={ message: '<h1><img src="<?php echo $fromapproot;?>images/busy.gif" width="32" alt="Processing ..." />Loading ...</h1>' };
  var waitmsgsave={ message: '<h1><img src="<?php echo $fromapproot;?>images/busy.gif" width="32" alt="Processing ..." />Saving ...</h1>' };
  //theme switcher
  <?php if($sitecss=="jquery-ui") echo "addThemeSwitcherTool();"; ?>
  </script>  
