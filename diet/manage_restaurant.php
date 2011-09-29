<?php 
require_once('core.php');

if (isset($_SESSION['username'])){
	

if (isset($_POST['remove_num'])){
	$query = "DELETE FROM Restaurant WHERE restaurant_id = ".$_POST['remove_num'];
	$res = getData($query);
} else {
	if (isset($_POST['add_name'])){
		$query = "INSERT INTO Restaurant (restaurant_name,
	restaurant_address) VALUES ('".$_POST['add_name']."', '".$_POST['add_address']."')";
		$res = getData($query);
	}
}
?>

<html>
<body>
<?php 

	require_once('menu.php');
?>
<div id="main">
<h2>List of restaurants</h2>
<table align="center" border="2" >
<tr>
<th>Name</th>
<th>Address</th>
<th>Action</th>
</tr>

<?php 
$query = "SELECT * FROM Restaurant ORDER BY restaurant_name";

$res = getData($query);

while ($row = mysql_fetch_assoc($res)) {
    echo "<tr>
    <td>".$row['restaurant_name']."</td>
    <td>".$row['restaurant_address']."</td>
    <td>
    <form action='manage_restaurant.php' method='POST'>
    <input type='hidden' name='remove_num' value='".$row['restaurant_id']."'/>
    <!-- input type='submit' value='Remove' name='remove'/-->
    </form>
    <form action='edit_restaurant.php' method='POST'>
    <input type='hidden' name='edit_num' value='".$row['restaurant_id']."'/>
    <input type='submit' value='Edit' name='edit'/>
    </form>
    </td>
    </tr>";
}

?>

<form action="manage_restaurant.php" method="POST">
<tr>
<td><input type="text" name="add_name"/></td>
<td><input type="text" name="add_address"/></td>
<td> <input type='submit' value='Add' name='add'/></td>
</tr>
</form>
</table>
</div>
</body>
</html>
<?php 
}
else {
?>
<meta http-equiv="refresh" content="0;url=index.php" />
<?php 
}
?>