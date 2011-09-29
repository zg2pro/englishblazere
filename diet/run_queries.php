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
<h2>SQL Schema</h2>
Users (<u>user_id</u>, username, _password_, isSuperUser)<br/>
Restaurant (<u>restaurant_id</u>, restaurant_name, restaurant_address, restaurant_comments)<br/>
Ingredient (<u>ingredient_id</u>, ingredient_name, restriction_per_week)<br/>
RestaurantXIngredient (<u>#restaurant_id, #ingredient_id</u>)<br/>
Meal (<u>meal_id</u>, meal_date, meal_time, #restaurant_id, #user_id, budget_per_person)<br/>
IngredientXMeal (<u>#ingredient_id, #meal_id</u>)<br/>


<form action="run_queries.php" method="POST">
<h2>Type in MySQL Query</h2>

<textarea rows="6" cols="100" name="query">
<?php 
if (isset($_POST['query'])) echo $query;
?>
</textarea>
<br/><input type="submit" value="Run"/>

</form>

<?php 
if (isset($_POST['query'])){
	$res = getData($_POST['query']);
	?>
	<table align="center" border="2" >
	<?php 
	$firstRow = 1;
	while ($row = mysql_fetch_assoc($res)){

		if ($firstRow){
		echo "<tr>";
		foreach ($row as $key=>$value){
	echo "<th>".$key."</th>"; 
}
		echo "</tr>";
		$firstRow = 0;
		}
	?>
	
<tr>
<?php 
foreach ($row as $key=>$value){
	echo "<td>".$value."</td>"; 
}
?>
</tr>
<?php 
	}
?>
</table>
	<?php 
}
?>

<br/><br/>
<small>
Examples: 
<ol>
<li><u>Total money spent on food:</u> select sum(budget_per_person), meal_time
from Meal
where meal_date > DATE_SUB( CURDATE( ) , INTERVAL 8 DAY)
group by (meal_time) with rollup</li>
<li><u>Average money spent on food:</u> select avg(budget_per_person), meal_time
from Meal
group by meal_time with rollup</li>
<li><u>Average money spent last week only:</u> select avg(budget_per_person), meal_time
from Meal
where meal_date > DATE_SUB( CURDATE( ) , INTERVAL 8 DAY)
group by meal_time with rollup</li>
<li><u>Most attended restaurants:</u> select Restaurant.restaurant_name, count(Meal.meal_id) as ct
from Meal, Restaurant
where Meal.restaurant_id = Restaurant.restaurant_id
group by Restaurant.restaurant_id
order by ct desc</li>
</ol>
</small>
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