<?php 
require_once('core.php');

function print_checked($a){
	if ($a > 0) echo "checked";
}

if (isset($_SESSION['username'])){

$restaurant_id = $_POST['edit_num'];

if (isset($_POST['name'])){
	
	$query = "UPDATE Restaurant
	SET restaurant_name = '".$_POST['name']."',
	restaurant_address =  '".$_POST['address']."',
	restaurant_comments =  '".$_POST['comments']."'
	WHERE restaurant_id = $restaurant_id";
	
	$res = getData($query);
	
	
	$query = "DELETE FROM RestaurantXIngredient
	WHERE restaurant_id = $restaurant_id";
	
	$res = getData($query);
	
	$ingredient = $_POST['ingredient'];
	if (sizeof($ingredient)>0)
	foreach ($ingredient as $key=>$value){
		$query = "INSERT INTO RestaurantXIngredient (restaurant_id, ingredient_id)
	VALUES ($restaurant_id, $key)";
		$res = getData($query);
	}
	
}



$query = "SELECT r.restaurant_id, r.restaurant_name, r.restaurant_address, 
r.restaurant_comments, AVG(Meal.budget_per_person) as average FROM Meal, 
Restaurant r WHERE Meal.restaurant_id = r.restaurant_id AND r.restaurant_id = $restaurant_id
GROUP BY r.restaurant_id
UNION
SELECT r.restaurant_id, r.restaurant_name, r.restaurant_address, r.restaurant_comments, 
'Unknown' as average FROM Restaurant r WHERE r.restaurant_id NOT IN (
SELECT restaurant_id FROM Meal
) 
AND r.restaurant_id = $restaurant_id";
		$res = getData($query);
$row = mysql_fetch_assoc($res);
?>

<html>
<body>
<?php 

	require_once('menu.php');
?>
	  	<div id="main">
<form action="edit_restaurant.php" method="POST">
<h2><?php echo $row['restaurant_name'];  ?></h2>
<h3>Description</h3>
<table>
<tr>
<td>Name</td>
<td><input type="text" value="<?php echo $row['restaurant_name'];  ?>" name="name" /></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" value="<?php echo $row['restaurant_address'];  ?>" name="address" /></td>
</tr>
<tr>
<td>Comments</td>
<td><input type="text" value="<?php echo $row['restaurant_comments'];  ?>" name="comments" /></td>
</tr>
<tr>
<td>Budget</td>
<td><?php echo $row['average'];  ?></td>
</tr>

</table>
<h3>Food available</h3>
<?php 

$query = "SELECT i.ingredient_id, i.ingredient_name, '1' as isHere 
FROM Ingredient i, RestaurantXIngredient 
WHERE i.ingredient_id = RestaurantXIngredient.ingredient_id 
AND RestaurantXIngredient.restaurant_id = $restaurant_id 
UNION 
SELECT i.ingredient_id, i.ingredient_name, '0' as isHere 
FROM Ingredient i
WHERE i.ingredient_id NOT IN ( 
SELECT i.ingredient_id 
FROM Ingredient i, RestaurantXIngredient 
WHERE i.ingredient_id = RestaurantXIngredient.ingredient_id 
AND RestaurantXIngredient.restaurant_id = $restaurant_id )";
$res = getData($query);
?>
<table>
<?php while (
$row = mysql_fetch_assoc($res)){
?>
<tr>
<td><input type="checkbox" <?php print_checked($row['isHere']); ?> name="ingredient[<?php echo $row['ingredient_id']; ?>]" /></td>
<td><?php echo $row['ingredient_name']; ?></td>
</tr>
<?php } ?>
</table>
<input type="hidden" name="edit_num" value="<?php echo $restaurant_id; ?>" />
<br/>
<input type="submit" value="OK"/>

</form>
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