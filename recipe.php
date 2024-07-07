<?php




session_start();

if (isset($_GET['id'])) {
  $recipeId = $_GET['id'];
} else {
  echo "No recipe ID provided.";
}

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  $email = $_SESSION['email'];

  echo "Welcome , " . $email . "! You are logged in.";

  // Fetch the user ID from the database using session information
  $email = $_SESSION['email'];

  $query = "SELECT * FROM user WHERE email = '$email'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $userId = $row['id'];
  $username = $row['nume'];


  $query = "SELECT user_type FROM user WHERE id = '$userId'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $type = $row['user_type'];
}

$recipe_name = $recipe_img = $calories = $time = $description  = $directions = $prot = $carbs = $fats = $fibers = $sugar = "";


$sqlv = "SELECT * FROM recipe WHERE id = $recipeId";


$resultv = mysqli_query($db, $sqlv);


$myrow = mysqli_fetch_array($resultv);
$recipe_name = $myrow['recname'];
$calories = $myrow['calories'];
$time = $myrow['time_to_pret'];
$recipe_img = $myrow['recipe_img'];
$description = $myrow['descripti'];
$directions = $myrow['directions'];
$directions = nl2br($directions);
$prot = $myrow['grams_protein'];
$carbs = $myrow['grams_carbs'];
$fats = $myrow['grams_fats'];
$fibers = $myrow['grams_fibers'];
$sugar = $myrow['grams_sugar'];







?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foundation for Sites</title>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/app.css">
</head>

<body>
  <section class="navigation">
    <div class="nav-container">
      <div class="brand">
        <a href="index.php">FIT FLOW</a>
      </div>
      <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
          <li>
            <a href="recipes.php">Recipes</a>
          </li>
          <li>
            <a href="meal_plan.php">Meal Plans</a>
          </li>
          <li>
            <a href="workout_plans.php">Workouts</a>
          </li>
          <li>
            <a href="grocery_list.php">Grocery List</a>
          </li>
          <li>
            <a href="account.php">Account</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>


  <?php

  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

    if ($type == 'professional') {
      echo '<div style="padding-left: 600px;">
              <a href="edit-recipe.php?id=' . $recipeId . '" class="custom-btn2 btn-3" style="width: 300px;">EDIT THIS RECIPE</a>
          </div>';
    }
  }
  ?>

  <div class="grid-container" style="padding-top: 40px; text-align: center;">
    <div class="grid-x grid-margin-x">

      <div class="cell small-2 medium-2 large-2 text-right">
        <a style="font-size: 50px; color: black;" onclick="history.back()">&#8678</a>
      </div>

      <div class="cell small-10 medium-8 large-8">
        <p style="font-size: 30px; padding-top: 20px;"><?php echo $recipe_name; ?></p>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>

      <div class="cell small-0 medium-2 large-2" style=" display: flex;
      justify-content: center;
      align-items: center;"></div>
      <div class="cell small-12 medium-8 large-8">
        <img src="<?php echo $recipe_img; ?>">
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-4"></div>
      <div class="cell small 12 medium-8 large-4">
        <ul class="menu" style="padding:2%; text-align: center;">
          <li style="width: 50%;">
            <div class="add">
              <button class="round-6">+</button>
            </div>
          </li>
          <li style="width: 50%;">
            <div class="add">
              <button class="round-6">&#x2665</button>
            </div>
          </li>
        </ul>
      </div>
      <div class="cell small-0 medium-2 large-4"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div class="cell small 12 medium-8 large-8">
        <ul class="menu" style="padding:2%; text-align: center; background-color: rgb(216, 204, 216);">
          <li style="width: 33%;"> 4 Servings</li>
          <li style="width: 33%;"><?php echo $calories; ?> kcal</li>
          <li style="width: 33%;"><?php echo $time; ?></li>
        </ul>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
        <p><?php echo $description; ?></p>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
        <p><b>
          <?php 
           $sqlv = "SELECT * FROM category_for_recipe WHERE recipe_id = $recipeId";
           $resultv = mysqli_query($db, $sqlv);

           while ($myrow = mysqli_fetch_array($resultv)) {
             $category = $myrow['category'];

             echo "<p> $category </p> ";
           }
          ?>
        </b></p>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
        <table style="margin: 0 auto;
      border-radius: 30px;
      overflow: hidden;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      border-collapse: separate;">
          <thead>
            <tr>
              <td colspan="4" style="text-align: center;">INGREDIENTS</td>
            </tr>
          </thead>
          <tbody style="text-align: left;">

            <?php
            $sqlv = "SELECT * FROM ingredient_for_recipe WHERE recipe_id = $recipeId";
            $resultv = mysqli_query($db, $sqlv);

            while ($myrow = mysqli_fetch_array($resultv)) {
              $ingr = $myrow['ingredient'];
              $qty = $myrow['quantity'];
              $msr = $myrow['measurement'];

              echo "<tr>
          <td style='width: 20%;'>$qty</td>
          <td style='width: 30%;'>$msr</td>
          <td style='width: 50%;'>$ingr</td>
        </tr>";
            }
            ?>


          </tbody>
        </table>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
        <h2>
          Directions
        </h2>
        <p>
          <?php echo nl2br($directions); ?>
        </p>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>


      <div class="cell small-0 medium-2 large-2"></div>
      <div style="padding-top: 20px; padding-bottom: 70px;" class="cell small 12 medium-8 large-8">
        <table style="margin: 20px;
        width: 50%;

      border-radius: 30px;
      overflow: hidden;
      margin: 0 auto;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      border-collapse: separate;">
          <thead>
            <tr>
              <td colspan="4" style="text-align: center;">NUTRITIONAL INFO / PER SERVINGS</td>
            </tr>
          </thead>
          <tbody class="tabel-alb">
            <tr>
              <td style="width: 25%;"><?php echo $calories; ?></td>
              <td style="width: 75%;">kcal</td>
            </tr>
            <tr>
              <td style="width: 25%;"><?php echo $fats; ?> g</td>
              <td style="width: 75%;">Fat</td>
            </tr>
            <tr>
              <td style="width: 25%;"><?php echo $carbs; ?> g</td>
              <td style="width: 75%;">Carbs</td>
            </tr>
            <tr>
              <td style="width: 25%;"><?php echo $sugar; ?> g</td>
              <td style="width: 75%;">Sugars</td>
            </tr>
            <tr>
              <td style="width: 25%;"><?php echo $fibers; ?> g</td>
              <td style="width: 75%;">Fiber</td>
            </tr>
            <tr>
              <td style="width: 25%;"><?php echo $prot; ?> g</td>
              <td style="width: 75%;">Protein</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>
    </div>
  </div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>