<?php 
require_once('core.php');

if (isset($_SESSION['username'])){
	
if (isset($_POST['remove_num'])){
	$query = "DELETE FROM Ingredient WHERE ingredient_id = ".$_POST['remove_num'];
	$res = getData($query);
} else {
	if (isset($_POST['add_name'])){
		$query = "INSERT INTO Ingredient (ingredient_name,
	restriction_per_week) VALUES ('".$_POST['add_name']."', ".$_POST['add_restriction'].")";
		$res = getData($query);
	} else {
		if (isset($_POST['edit_num'])){
			$query = "UPDATE Ingredient SET restriction_per_week = ".$_POST['edit_restriction']."
			 WHERE ingredient_id = ".$_POST['edit_num'];
			
			//var_dump($query);
			
			$res = getData($query);
		}
	}
}
?>

<html>
<body>
<?php 

	require_once('menu.php');
?>
<div id="main">
<h2>List of ingredients</h2>
<table align="center" border="2" >
<tr>
<th>Ingredient Name</th>
<th>Restriction / week</th>
<th>Action</th>
</tr>
<?php 
require_once('core.php');

$query = "SELECT * FROM Ingredient";

$res = getData($query);

while ($row = mysql_fetch_assoc($res)) {
    echo "<tr>
    <td>".$row['ingredient_name']."</td>
    <td>".$row['restriction_per_week']."</td>
    <td>
    <form action='manage_food.php' method='POST'>
	    <input type='hidden' name='remove_num' value='".$row['ingredient_id']."'/>
	    <!--input type='submit' value='Remove' name='remove'/-->
    </form>
    <form action='manage_food.php' method='POST'><select name='edit_restriction'>
<option value='0'>0</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
</select>
	    <input type='hidden' name='edit_num' value='".$row['ingredient_id']."'/>
	    <input type='submit' value='Modify' name='remove'/>
    </form>
    </td>
    </tr>";
}

?>
<form action="manage_food.php" method="POST">
<tr>
<td><input type="text" name="add_name"/></td>
<td><select name="add_restriction">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
</select></td>
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