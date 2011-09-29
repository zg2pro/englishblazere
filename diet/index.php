<?php 

require_once('core.php');

if (isset($_POST['pwd'])){
	$query = "SELECT * FROM Users WHERE username = '".$_POST['username']."'";
	$res = getData($query);
	//var_dump("res=");var_dump($res);
	$row = mysql_fetch_assoc($res);
	if ($row['_password_'] == sha1($_POST['pwd'])){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['su'] = $row['isSuperUser'];
	}
} /*else {

if (isset($_POST['destroy'])){
	session_destroy();
}

}*/
?>
<html>
<body>

<?php 
if (isset($_SESSION['username'])){

	require_once('menu.php');
	?>
	<div id="main">
	This application was created on 26th October 2010, for a personal use.
	<br/> Copyright &copy; Gr&eacute;gory Anne
	<br/><br/>
	If you try out a new restaurant: 1/ Create the restaurant in db - 2/ Report meal.
	</div>
	<?php 
	
} else {
	?>
	<h1 class="h1_2_lines"><br/>MY PERSONAL DIET APPLICATION<br/></h1>
	<div id="main">
	<br/>
	<form action="index.php" method="post">
	Username  <input type="text" name="username"/><br/>
	Password  <input type="password" name="pwd"/><br/>
	<input type="submit" value="Connect"/>
	</form>
	<br/> 
	<small>Login with test:test to visit the application, 
	all modifications in the database will be disabled.</small>
	</div>
	<?php 
}
?>

</body>
</html>