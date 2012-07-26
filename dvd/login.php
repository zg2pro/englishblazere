<?php
/**
 * Login dialog box
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
<body class="login">
<?php
//// DISPLAY ERRORS
if  (isset ($_GET["msgerrv"]) ) {	echo $_GET["msgerrv"];}
?>
<form id="formlogin" name="formlogin" method="post"	action="login_post.php">

<table border="0" cellspacing="2" cellpadding="2" class="tbllogin">
<thead><tr><th colspan=2>Login</th></tr></thead>
<tbody>
	<tr>
		<td><label for="login"><?php echo $lang['LOGIN']; ?></label></td>
		<td><input type="text" name="login" id="login" tabindex="1" value="" /></td>
	</tr>
	<tr>
		<td><label for="password"><?php echo $lang['PASSWORD']; ?></label></td>
		<td><input type="password" name="password" id="password" tabindex="2"	value="" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="OK" id="OK" value="OK" class="action ok" />
			<input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>" class="action cancel" />
		</td>
	</tr>
  <tr>
		<td colspan=2><?php echo $lang['DSP_SENDUSERINFO'];?></td>
  </tr> 	
</tbody>
</table>
</form>
</body>
</html>
