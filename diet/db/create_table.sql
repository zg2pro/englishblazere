CREATE TABLE Meal (
	meal_id SERIAL PRIMARY KEY,	
	meal_date date,
	meal_time int,
	restaurant_id int FOREIGN KEY fk_m1 REFERENCES Restaurant(restaurant_id),
	budget_per_person int,
	user_id  int FOREIGN KEY fk_m2 REFERENCES Users(user_id),
);

CREATE TABLE Users (
	user_id SERIAL PRIMARY KEY,	
	username varchar(10),
	_password_ varchar(40),
	isSuperUser int
);

CREATE TABLE Ingredient (
	ingredient_id SERIAL PRIMARY KEY,
	ingredient_name varchar(20),
	restriction_per_week int
);

CREATE TABLE IngredientXMeal (
	ingredient_id int FOREIGN KEY fk_im1 REFERENCES Ingredient(ingredient_id),
	meal_id int FOREIGN_KEY fk_im2 REFERENCES Meal(meal_id),
	PRIMARY KEY (ingredient_id, meal_id)
);

CREATE TABLE Restaurant (
	restaurant_id SERIAL PRIMARY KEY,
	restaurant_name varchar(30),
	restaurant_address varchar(200),
	restaurant_comments varchar(100)
);

CREATE TABLE RestaurantXIngredient (
	restaurant_id  int FOREIGN KEY fk_ri1 REFERENCES Restaurant(restaurant_id),
	ingredient_id int  FOREIGN KEY fk_ri2 REFERENCES Ingredient(ingredient_id),
	PRIMARY KEY (ingredient_id, restaurant_id)
);


/**
Liste des ingredients autorises aujourdhui
*/
CREATE VIEW autorized_ingredients AS (
(	
	SELECT Ingredient.*
	FROM Ingredient, IngredientXMeal, Meal
	WHERE Ingredient.ingredient_id = IngredientXMeal.ingredient_id
	AND Meal.meal_id = IngredientXMeal.meal_id
	AND meal_date > DATE_SUB(CURDATE(), INTERVAL 7 DAY)
	GROUP BY Ingredient.ingredient_id
	HAVING COUNT(*) < Ingredient.restriction_per_week
)
UNION
(
	SELECT Ingredient.*
	FROM Ingredient
	WHERE Ingredient.ingredient_id NOT IN (
		SELECT Ingredient.ingredient_id
		FROM Ingredient, Meal, IngredientXMeal
		WHERE Ingredient.ingredient_id = IngredientXMeal.ingredient_id
		AND Meal.meal_id = IngredientXMeal.meal_id
		AND meal_date > DATE_SUB(CURDATE(), INTERVAL 7 DAY)
	)
)
);

/**
Budget moyen du restaurant
*/
SELECT Restaurant.restaurant_id, AVG(Meal.budget_per_person)
FROM Meal, Restaurant
WHERE Meal.restaurant_id = Restaurant.restaurant_id
GROUP BY Restaurant.restaurant_id

/**
Liste des restaurants proposant ces ingredients
*/
SELECT DISTINCT Restaurant.*, AVG(Meal.budget_per_person) as average
FROM Restaurant, RestaurantXIngredient, Meal
WHERE Restaurant.restaurant_id = RestaurantXIngredient.restaurant_id
AND Meal.restaurant_id = Restaurant.restaurant_id
AND RestaurantXIngredient.ingredient_id IN (
	SELECT ingredient_id FROM autorized_ingredients
)
GROUP BY Restaurant.restaurant_id
ORDER BY average

/**
Liste des ingredients d'un restaurant,
0=absent, 1=present
*/
(
SELECT ingredient_id, ingredient_name, "1" as isHere
FROM Ingredient, RestaurantXIngredient
WHERE Ingredient.ingredient_id = RestaurantXIngredient.ingredient_id
AND RestaurantXIngredient.restaurant_id = ??
)
UNION
(
SELECT ingredient_id, ingredient_name, "0" as isHere
FROM Ingredient
WHERE Ingredient.ingredient_id NOT IN (
		SELECT ingredient_id
		FROM Ingredient, RestaurantXIngredient
		WHERE Ingredient.ingredient_id = RestaurantXIngredient.ingredient_id
		AND RestaurantXIngredient.restaurant_id = ??
	)
)
