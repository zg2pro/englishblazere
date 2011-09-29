<?php 
require_once('core.php');

if (isset($_SESSION['username'])){
?>
<html>
<body>
<?php 

	require_once('menu.php');
?>

	  	<div id="main">

<h2>Today, you can have</h2>
<ul>
<?php


$query = "SELECT * FROM autorized_ingredients";

$res = getData($query);

while ($row = mysql_fetch_assoc($res)) {
    echo "<li>".$row['ingredient_name']."</li>";
}

?>
</ul>
<br/>
<small>
You have already reached the limit for <?php 
$a = array();
$query = "SELECT * FROM Ingredient WHERE ingredient_id NOT IN (
SELECT ingredient_id FROM autorized_ingredients
)";
$res = getData($query);
while ($row = mysql_fetch_assoc($res)) {
   array_push($a, $row['ingredient_name']);
}
if (sizeof($a) < 1) echo "nothing!";
for ($k = 0; $k < sizeof($a)-1; $k++)
	echo $a[$k].", ";
echo $a[sizeof($a) - 1];
?></small>

<h2>You may go to one of these restaurants</h2>
<table align="center" border="2">
<tr>
<th>Name</th>
<th>Address</th>
<th>Budget</th>
</tr>
<?php

$query = "SELECT DISTINCT Restaurant.*, AVG(Meal.budget_per_person) as average
FROM Restaurant, RestaurantXIngredient, Meal
WHERE Restaurant.restaurant_id = RestaurantXIngredient.restaurant_id
AND Meal.restaurant_id = Restaurant.restaurant_id
AND RestaurantXIngredient.ingredient_id IN (
	SELECT ingredient_id FROM autorized_ingredients
)
GROUP BY Restaurant.restaurant_id
ORDER BY average";

$res = getData($query);

while ($row = mysql_fetch_assoc($res)) {
    echo "<tr>
    <td>".$row['restaurant_name']."</td>
    <td>".$row['restaurant_address']."</td>
    <td>".$row['average']."</td>
    </tr>";
}

?>
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