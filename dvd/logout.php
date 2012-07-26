<?php
/**
 * Ending connection
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
include 'includes/header0.php';
?>
<body class="window">
<p><?php echo $lang['MSG_LOGOUT']; ?><br /><br />
<?php echo '<a href="'.$lang['URL_HOME_FRS'].'" title="'.$lang['APP_NAME'].'">'.$lang['APP_NAME'].'</a>'; ?>
</p>
</body>
</html>
<?php
	//INITIALIZE A SESSION IF NEEDED
	if (session_id()==="") session_start();

	//DESTROY ALL SESSION VARIABLES
	session_unset();

	//DESTROY CURRENT SESSION
	$skill=session_destroy();
?>
