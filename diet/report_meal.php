<?php 
require_once('core.php');

if (isset($_SESSION['username'])){
?>
<html>
<body>

<?php 

	require_once('menu.php');

if (!isset($_POST['restaurant_id'])){
?>
<div id="main">
<form action="report_meal.php" method="POST">
<h2>Describe the meal</h2>
<table align="center" border="2" >
<tr>
<td>Restaurant</td><td>
<select name="restaurant_id">
<?php

$query = "SELECT * FROM Restaurant ORDER BY restaurant_name";
$res = getData($query);

while ($row = mysql_fetch_assoc($res)) {
    echo "<option value ='".$row['restaurant_id']."'>
    ".$row['restaurant_name']."</option>";
}

?>

?>
</select></td>
</tr><tr><td>
Expense</td><td><input type="text" value="100000" name="budget"/>
</td></tr><tr><td>
Meal type</td><td><select name="type">
<option value="0">Breakfast</option>
<option value="1">Lunch</option>
<option value="2" selected>Diner</option>
</select>
</td></tr><tr><td>
Date</td><td><select name="day">
<option value="0" selected>Today</option>
<option value="1">Yesterday</option>
<option value="2">Two days ago</option>
</select>
</td></tr></table><br/>
<input type="submit" value="OK"/>
</form>
</div>
<?php 
} else {
	
	if (!isset($_POST['ingredient'])){
	
?>
<div id="main">
<form action="report_meal.php" method="POST">
<h2>Select food</h2>
<?php 
$restaurant_id = $_POST['restaurant_id'];

$query = "SELECT i.ingredient_id, i.ingredient_name 
FROM Ingredient i, RestaurantXIngredient 
WHERE i.ingredient_id = RestaurantXIngredient.ingredient_id 
AND RestaurantXIngredient.restaurant_id = ".$restaurant_id;

$res = getData($query);
?>
<table>
<?php while (
$row = mysql_fetch_assoc($res)){
?>
<tr>
<td><input type="checkbox" name="ingredient[<?php echo $row['ingredient_id']; ?>]" /></td>
<td><?php echo $row['ingredient_name']; ?></td>
</tr>
<?php } ?>
</table>
<input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id; ?>" />
<input type="hidden" name="budget" value="<?php echo $_POST['budget']; ?>" />
<input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
<input type="hidden" name="day" value="<?php echo $_POST['day']; ?>" />
<br/>
<input type="submit" value="OK"/>

</form>
</div>
<?php 
	} else {
		$query = "INSERT INTO Meal (meal_date, meal_time,
	restaurant_id, user_id, budget_per_person) VALUES (DATE_SUB(CURDATE(), INTERVAL ".$_POST['day']." DAY), ".$_POST['type'].",
	".$_POST['restaurant_id'].", ".$_SESSION['user_id'].", ".$_POST['budget'].")";
		
	$res = getData($query);
	
	$id = mysql_insert_id(); 
	
	foreach($_POST['ingredient'] as $key=>$ing){
		$query = "INSERT INTO IngredientXMeal (ingredient_id, meal_id) VALUES
		($key, $id)";
		$res = getData($query);
	}
	?>
<meta http-equiv="refresh" content="0;url=report_meal.php" />
<?php 
	}
}
?>

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