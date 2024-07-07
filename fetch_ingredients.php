<?php



$iauite = $_POST['iauite'];

// Decode the JSON data into an array
$data = json_decode($iauite, true) || [];

echo $data;
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

$ingredients = []; 
$id = '';
for ($i = 1; $i <= 21; $i++) {


    $id = $iauite[$i];

    $query = "SELECT * FROM ingredient_for_recipe WHERE recipe_id = $id";

    $result = mysqli_query($db, $query);
    $recipeIngredients = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $ingredient = $row['ingredient'];
        $qty = $row['quantity'];
        $recipeIngredients[] = array('ingredient' => $ingredient, 'qty' => $qty);

    }
    $ingredients[$id] = $recipeIngredients;


  }
  


echo json_encode($ingredients);

?>