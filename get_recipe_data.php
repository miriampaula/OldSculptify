<?php
// Retrieve the recipe name from the AJAX request

$recipeName = html_entity_decode($_POST['recipeName']);


$unescapedString = str_replace("&amp;", "", $recipeName);

echo $unescapedString;

// Example database query using mysqli extension
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");


// Construct the SQL query

$sql = "SELECT * FROM recipe WHERE recname = '$unescapedString'";

// Execute the query
$result = mysqli_query($db, $sql);

// Process the query result or generate the response data
if ($result) {
  // Fetch the data from the result
  $row = mysqli_fetch_assoc($result);
  // Process the data or generate the desired response
  $calories = $row['calories'];
  $recipe_img = $row['recipe_img'];
  $id = $row['id'];
  $grams_protein = $row['grams_protein'];
  $grams_fats = $row['grams_fats'];
  $grams_carbs = $row['grams_carbs'];

  $response = array(
    'id' => $id,
    'calories' => $calories,
    'recipe_img' => $recipe_img,
    'grams_protein' => $grams_protein,
    'grams_fats' => $grams_fats,
    'grams_carbs' => $grams_carbs
  );

   // Convert the response data to JSON format
   $jsonResponse = json_encode($response);

   // Send the JSON response back to the JavaScript code
   echo $jsonResponse;


} else {
  // Handle database query error
  echo "Error: " . mysqli_error($db);
}

// Close the database connection
mysqli_close($db);
?>
