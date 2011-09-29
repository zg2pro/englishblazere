<?php 
require_once('core.php');

if (isset($_SESSION['username'])){


$query = "
select m.*, r.restaurant_name, GROUP_CONCAT(i.ingredient_name SEPARATOR ', ') as ing
from Meal m, IngredientXMeal im, Ingredient i, Restaurant r
where m.meal_id = im.meal_id
and im.ingredient_id = i.ingredient_id
and m.meal_date > DATE_SUB( CURDATE( ) , INTERVAL 8
DAY )
and m.user_id = ".$_SESSION['user_id']."
and r.restaurant_id = m.restaurant_id
group by m.meal_id
order by meal_date desc, meal_time desc";
		$res = getData($query);
?>

<html>
<body>
<?php 

	require_once('menu.php');
?>
	  	<div id="main">

<h2> History of Meals </h2>
<table align="center" border="2">
<tr><th>Day</th><th>Time</th>
<th>Restaurant</th><th>Expense</th><th>Food taken</th></tr>
<?php 
$types = array(
	"Breakfast", "Lunch", "Diner");

while ($row = mysql_fetch_assoc($res)){
?>
<tr>
<td><?php echo $row['meal_date']; ?> </td>
<td><?php echo $types[$row['meal_time']]; ?> </td>
<td><?php echo $row['restaurant_name']; ?> </td>
<td><?php echo $row['budget_per_person']; ?> </td>
<td> <?php echo $row['ing']; ?> </td>
</tr>
<?php } 
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