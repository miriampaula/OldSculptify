<?php



session_start();

$email = $_SESSION['email'];

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  echo "Welcome , " . $email . "! You are logged in.";
  echo "<br>";
} else {
  // Session is not active or user is not logged in
  // Redirect the user to the login page or display an error message
  header("Location: user_login.php");
  exit;
}

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");



$query = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$userId = $row['id'];

$query = "SELECT user_type FROM user WHERE id = '$userId'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$type = $row['user_type'];





$rec1 = $rec2 = $rec3 = $rec4 = $rec5 = $rec6 = $rec7 = $rec8 = $rec9 = $rec10 = $rec11 = $rec12 = $rec13 = $rec14 = $rec15 = $rec16 = $rec17 = $rec18 = $rec19 = $rec20 = $rec21 = '';
$cal1 = $cal2 = $cal3 = $cal4 = $cal5 = $cal6 = $cal7 = $cal8 = $cal9 = $cal10 = $cal11 = $cal12 = $cal13 = $cal14 = $cal15 = $cal16 = $cal17 = $cal18 = $cal19 = $cal20 = $cal21 = '';
$prot1 = $prot2 = $prot3 = $prot4 = $prot5 = $prot6 = $prot7 = $prot8 = $prot9 = $prot10 = $prot11 = $prot12 = $prot13 = $prot14 = $prot15 = $prot16 = $prot17 = $prot18 = $prot19 = $prot20 = $prot21 = '';
$carbs1 = $carbs2 = $carbs3 = $carbs4 = $carbs5 = $carbs6 = $carbs7 = $carbs8 = $carbs9 = $carbs10 = $carbs11 = $carbs12 = $carbs13 = $carbs14 = $carbs15 = $carbs16 = $carbs17 = $carbs18 = $carbs19 = $carbs20 = $carbs21 = '';
$fat1 = $fat2 = $fat3 = $fat4 = $fat5 = $fat6 = $fat7 = $fat8 = $fat9 = $fat10 = $fat11 = $fat12 = $fat13 = $fat14 = $fat15 = $fat16 = $fat17 = $fat18 = $fat19 = $fat20 = $fat21 = '';
$id_ret1 = $id_ret2 = $id_ret3 = $id_ret4 = $id_ret5 = $id_ret6 = $id_ret7 = $id_ret8 = $id_ret9 = $id_ret10 = $id_ret11 = $id_ret12 = $id_ret13 = $id_ret14 = $id_ret15 = $id_ret16 = $id_ret17 = $id_ret18 = $id_ret19 = $id_ret20 = $id_ret21 = '';

if ((empty($_POST["rec1"])) && (empty($_POST["cal1"]))) {
  $nameErr = "hi";
} else {



  $query = "SELECT * FROM grocery_list WHERE user_id = '$userId'";
  $result = mysqli_query($db, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //   echo "este: " . $row['user_id'] . "<br>";
        //   echo "<br>";
      }
    } else {
      $sql = "INSERT INTO grocery_list(user_id) VALUES ($userId)";
      mysqli_query($db, $sql);
      //   echo "No list for this user.";
    }
  } else {
    //  echo "Error executing query: " . mysqli_error($db);
  }

  $query = "SELECT id FROM grocery_list WHERE user_id = '$userId'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $list_id = $row['id'];


  
  for ($i = 1; $i <= 21; $i++) {
    $id_ret = $_POST["id_ret" . $i];

    $query = "SELECT * FROM ingredient_for_recipe WHERE recipe_id = '$id_ret'";
    $result = mysqli_query($db, $query);

    if ($result) {

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo $i;

          $name = $row['ingredient'];
          $qty = $row['quantity'];
          $msr = $row['measurement'];
          $id = $row['id'];
          $sql = "INSERT INTO grocery_list_item(grocery_list_id, item_name, item_quantity, item_measurement, item_first_id) VALUES ($list_id, '$name', '$qty', '$msr', $id)";
          mysqli_query($db, $sql);
        }
      } else {
          echo "No ingredients found for the recipe.";
      }
    } else {
         echo "Error executing query: " . mysqli_error($db);
    }
  }

  


$id_ret1 = $_POST["id_ret1"];
$id_ret2 = $_POST["id_ret2"];
$id_ret3 = $_POST["id_ret3"];
$id_ret4 = $_POST["id_ret4"];
$id_ret5 = $_POST["id_ret5"];
$id_ret6 = $_POST["id_ret6"];
$id_ret7 = $_POST["id_ret7"];
$id_ret8 = $_POST["id_ret8"];
$id_ret9 = $_POST["id_ret9"];
$id_ret10 = $_POST["id_ret10"];
$id_ret11 = $_POST["id_ret11"];
$id_ret12 = $_POST["id_ret12"];
$id_ret13 = $_POST["id_ret13"];
$id_ret14 = $_POST["id_ret14"];
$id_ret15 = $_POST["id_ret15"];
$id_ret16 = $_POST["id_ret16"];
$id_ret17 = $_POST["id_ret17"];
$id_ret18 = $_POST["id_ret18"];
$id_ret19 = $_POST["id_ret19"];
$id_ret20 = $_POST["id_ret20"];
$id_ret21 = $_POST["id_ret21"];





  $rec1 = $_POST["rec1"];
  $rec2 = $_POST["rec2"];
  $rec3 = $_POST["rec3"];
  $rec4 = $_POST["rec4"];
  $rec5 = $_POST["rec5"];
  $rec6 = $_POST["rec6"];
  $rec7 = $_POST["rec7"];
  $rec8 = $_POST["rec8"];
  $rec9 = $_POST["rec9"];
  $rec10 = $_POST["rec10"];
  $rec11 = $_POST["rec11"];
  $rec12 = $_POST["rec12"];
  $rec13 = $_POST["rec13"];
  $rec14 = $_POST["rec14"];
  $rec15 = $_POST["rec15"];
  $rec16 = $_POST["rec16"];
  $rec17 = $_POST["rec17"];
  $rec18 = $_POST["rec18"];
  $rec19 = $_POST["rec19"];
  $rec20 = $_POST["rec20"];
  $rec21 = $_POST["rec21"];
  $cal1 = $_POST["cal1"];
  $cal2 = $_POST["cal2"];
  $cal3 = $_POST["cal3"];
  $cal4 = $_POST["cal4"];
  $cal5 = $_POST["cal5"];
  $cal6 = $_POST["cal6"];
  $cal7 = $_POST["cal7"];
  $cal8 = $_POST["cal8"];
  $cal9 = $_POST["cal9"];
  $cal10 = $_POST["cal10"];
  $cal11 = $_POST["cal11"];
  $cal12 = $_POST["cal12"];
  $cal13 = $_POST["cal13"];
  $cal14 = $_POST["cal14"];
  $cal15 = $_POST["cal15"];
  $cal16 = $_POST["cal16"];
  $cal17 = $_POST["cal17"];
  $cal18 = $_POST["cal18"];
  $cal19 = $_POST["cal19"];
  $cal20 = $_POST["cal20"];
  $cal21 = $_POST["cal21"];
  $prot1 = $_POST["prot1"];
  $prot2 = $_POST["prot2"];
  $prot3 = $_POST["prot3"];
  $prot4 = $_POST["prot4"];
  $prot5 = $_POST["prot5"];
  $prot6 = $_POST["prot6"];
  $prot7 = $_POST["prot7"];
  $prot8 = $_POST["prot8"];
  $prot9 = $_POST["prot9"];
  $prot10 = $_POST["prot10"];
  $prot11 = $_POST["prot11"];
  $prot12 = $_POST["prot12"];
  $prot13 = $_POST["prot13"];
  $prot14 = $_POST["prot14"];
  $prot15 = $_POST["prot15"];
  $prot16 = $_POST["prot16"];
  $prot17 = $_POST["prot17"];
  $prot18 = $_POST["prot18"];
  $prot19 = $_POST["prot19"];
  $prot20 = $_POST["prot20"];
  $prot21 = $_POST["prot21"];
  $carbs1 = $_POST["carbs1"];
  $carbs2 = $_POST["carbs2"];
  $carbs3 = $_POST["carbs3"];
  $carbs4 = $_POST["carbs4"];
  $carbs5 = $_POST["carbs5"];
  $carbs6 = $_POST["carbs6"];
  $carbs7 = $_POST["carbs7"];
  $carbs8 = $_POST["carbs8"];
  $carbs9 = $_POST["carbs9"];
  $carbs10 = $_POST["carbs10"];
  $carbs11 = $_POST["carbs11"];
  $carbs12 = $_POST["carbs12"];
  $carbs13 = $_POST["carbs13"];
  $carbs14 = $_POST["carbs14"];
  $carbs15 = $_POST["carbs15"];
  $carbs16 = $_POST["carbs16"];
  $carbs17 = $_POST["carbs17"];
  $carbs18 = $_POST["carbs18"];
  $carbs19 = $_POST["carbs19"];
  $carbs20 = $_POST["carbs20"];
  $carbs21 = $_POST["carbs21"];
  $fat1 = $_POST["fat1"];
  $fat2 = $_POST["fat2"];
  $fat3 = $_POST["fat3"];
  $fat4 = $_POST["fat4"];
  $fat5 = $_POST["fat5"];
  $fat6 = $_POST["fat6"];
  $fat7 = $_POST["fat7"];
  $fat8 = $_POST["fat8"];
  $fat9 = $_POST["fat9"];
  $fat10 = $_POST["fat10"];
  $fat11 = $_POST["fat11"];
  $fat12 = $_POST["fat12"];
  $fat13 = $_POST["fat13"];
  $fat14 = $_POST["fat14"];
  $fat15 = $_POST["fat15"];
  $fat16 = $_POST["fat16"];
  $fat17 = $_POST["fat17"];
  $fat18 = $_POST["fat18"];
  $fat19 = $_POST["fat19"];
  $fat20 = $_POST["fat20"];
  $fat21 = $_POST["fat21"];



  $sql =  "INSERT INTO meal_plan(nume, user_id) VALUES ('$email', $userId)";
  mysqli_query($db, $sql);


  
if (mysqli_affected_rows($db) > 0) {
  $mp_id = mysqli_insert_id($db);
 // echo "Registration ID: " . $mp_id;
} else {
  echo "Error inserting registration into the database.";
}

  // Check if a registration exists for the current user ID
  $query = "SELECT * FROM current_plans_for_client WHERE user_id = $userId";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    // Update the registration with the mp_id
    $sql = "UPDATE current_plans_for_client SET meal_plan_id = $mp_id WHERE user_id = $userId";
 //   echo ("avem");

 //   echo $sql;
    mysqli_query($db, $sql);

  } else {
    $sql =  "INSERT INTO current_plans_for_client(user_id, meal_plan_id) VALUES ($userId, $mp_id)";
  //  echo ("nu avem");

    mysqli_query($db, $sql);
  }

  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'monday', '$rec1', '$rec2', '$rec3', $id_ret1, $id_ret2, $id_ret3)";

  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal1 + $cal2 + $cal3;
  $carbstot = $carbs1 + $carbs2 + $carbs3;
  $prottot = $prot1 + $prot2 + $prot3;
  $fattot = $fat1 + $fat2 + $fat3;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
    ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);


  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'tuesday', '$rec4', '$rec5', '$rec6', '$id_ret4', '$id_ret5', '$id_ret5')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal4 + $cal5 + $cal6;
  $carbstot = $carbs4 + $carbs5 + $carbs6;
  $prottot = $prot4 + $prot5 + $prot6;
  $fattot = $fat4 + $fat5 + $fat6;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);



  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'wednseday', '$rec7', '$rec8', '$rec9', '$id_ret7', '$id_ret8', '$id_ret9')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal7 + $cal8 + $cal9;
  $carbstot = $carbs7 + $carbs8 + $carbs9;
  $prottot = $prot7 + $prot8 + $prot9;
  $fattot = $fat7 + $fat8 + $fat9;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);



  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'thursday', '$rec10', '$rec11', '$rec12', '$id_ret10', '$id_ret11', '$id_ret12')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal10 + $cal11 + $cal12;
  $carbstot = $carbs10 + $carbs11 + $carbs12;
  $prottot = $prot10 + $prot11 + $prot12;
  $fattot = $fat10 + $fat11 + $fat12;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);

  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'friday', '$rec13', '$rec14', '$rec15', '$id_ret13', '$id_ret14', '$id_ret15')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal13 + $cal14 + $cal15;
  $carbstot = $carbs13 + $carbs14 + $carbs15;
  $prottot = $prot13 + $prot14 + $prot15;
  $fattot = $fat13 + $fat14 + $fat15;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);




  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'saturday', '$rec16', '$rec17', '$rec18', '$id_ret16', '$id_ret17', '$id_ret18')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal16 + $cal17 + $cal17;
  $carbstot = $carbs16 + $carbs17 + $carbs18;
  $prottot = $prot16 + $prot17 + $prot18;
  $fattot = $fat16 + $fat17 + $fat18;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);


  $sql =  "INSERT INTO day_of_week_meal_plan(current_meal_plan_id, day_of_week, breakfast_name, lunch_name, dinner_name, breakfast_id, lunch_id, dinner_id) VALUES 
  ($mp_id, 'sunday', '$rec19', '$rec20', '$rec21', '$id_ret19', '$id_ret20', '$id_ret21')";


  mysqli_query($db, $sql);
  $insertedId = mysqli_insert_id($db);


  $calstot = $cal19 + $cal20 + $cal20;
  $carbstot = $carbs19 + $carbs20 + $carbs21;
  $prottot = $prot19 + $prot20 + $prot21;
  $fattot = $fat19 + $fat20 + $fat21;


  $sql = "INSERT INTO totals_for_day(day_of_week_meal_plan_id, calories, grams_protein, grams_carbs, grams_fats) VALUES
  ($insertedId, '$calstot', '$prottot', '$carbstot', '$fattot')";
  mysqli_query($db, $sql);


   header("Location: meal_plan.php");
 exit;

}






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

  <div id="date">
    <p>NO</p>
  </div>

  <form name="adaugare" id="adaugare" method="POST" action="" style="max-width:none; width:100%;">

    <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
      <div class="grid-x grid-margin-x">

        <div class="cell medium-2 large-2 small-hide"></div>
        <div class="cell medium-3 large-3 small-hide">
          <p>BREAKFAST</p>
        </div>
        <div class="cell medium-3 large-3 small-hide">
          <p>LUNCH</p>
        </div>
        <div class="cell medium-3 large-3 small-hide">
          <p>DINNER</p>
        </div>
        <div class="cell medium-1 large-1 small-hide"></div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">MONDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec1" class="rec_name" id="nume_ret_1" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal1" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs1" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat1" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec2" class="rec_name" id="nume_ret_2" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img2" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal2" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot2" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs2" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat2" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret2" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec3" class="rec_name" id="nume_ret_3" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img3" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal3" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot3" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs3" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat3" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret3" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_luni" id='tot_luni' type="text" readonly>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">TUESDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec4" class="rec_name" id="nume_ret_4" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img4" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal4" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot4" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs4" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat4" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret4" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec5" class="rec_name" id="nume_ret_5" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img5" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal5" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot5" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs5" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat5" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret5" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec6" class="rec_name" id="nume_ret_6" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img6" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal6" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot6" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs6" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat6" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret6" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_marti" id="tot_marti" type="text" readonly>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">WEDNESAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec7" class="rec_name" id="nume_ret_7" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img7" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal7" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot7" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs7" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat7" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret7" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec8" class="rec_name" id="nume_ret_8" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img8" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal8" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot8" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs8" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat8" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret8" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec9" class="rec_name" id="nume_ret_9" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img9" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal9" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot9" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs9" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat9" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret9" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_miercuri" id="tot_miercuri" type="text" readonly>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">THURSDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec10" class="rec_name" id="nume_ret_10" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img10" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal10" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot10" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs10" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat10" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret10" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec11" class="rec_name" id="nume_ret_11" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img11" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal11" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot11" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs11" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat11" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret11" class="nr_reteta" type="text" style="display: none;">


        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec12" class="rec_name" id="nume_ret_12" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img12" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal12" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot12" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs12" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat12" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret12" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_joi" id="tot_joi" type="text" readonly>
        </div>



        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">FRIDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec13" class="rec_name" id="nume_ret_13" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img13" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal13" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot13" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs13" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat13" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret13" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec14" class="rec_name" id="nume_ret_14" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img14" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal14" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot14" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs14" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat14" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret14" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec15" class="rec_name" id="nume_ret_15" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img15" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal15" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot15" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs15" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat15" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret15" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_vineri" id="tot_vineri" type="text" readonly>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">SATURDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec16" class="rec_name" id="nume_ret16" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img16" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal16" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot16" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs16" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat16" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret16" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec17" class="rec_name" id="nume_ret_17" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img17" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal17" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot17" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs17" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat17" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret17" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec18" class="rec_name" id="nume_ret_18" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img18" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal18" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot18" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs18" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat18" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret18" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_samb" id="tot_samb" type="text" readonly>
        </div>



        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">SUNDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec19" class="rec_name" id="nume_ret_19" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img19" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal19" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot19" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs19" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat19" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret19" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec20" class="rec_name" id="nume_ret_20" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img20" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal20" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot20" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs20" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat20" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret20" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-3 large-3">
          <input type="text" name="rec21" class="rec_name" id="nume_ret_21" readonly>
          <a href="add-recipe-to-plan.php"><img class="clickable-image" id="img21" style="height: 150px; padding-top: 20px;" src="imgs/plll.jpg"></a>
          <input type="text" name="cal21" class="kal" style="margin-bottom: 0" readonly>
          <div style="width: 100%; display: flex;">
            <input name="prot21" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="carbs21" class="carb" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
            <input name="fat21" class="fat" type="text" style="width: 33.33%; flex-grow: 1;" readonly>
          </div>
          <input name="id_ret21" class="nr_reteta" type="text" style="display: none;">

        </div>
        <div class="cell small-12 medium-1 large-1">
          <input name="tot_dum" id="tot_dum" type="text" readonly>
        </div>

        <div class="cell small-12 medium-12 large-12">
          <div style="display: flex; justify-content: center; padding-top: 40px">

          <button type="submit" class="btn" name="submit" id="addButton">Add</button>
          </div>
        </div>

      </div>
    </div>
  </form>






  <script>
     document.getElementById('addButton').addEventListener('click', function() {
        localStorage.clear();
    });
    var mese = JSON.parse(localStorage.getItem('mese')) || [];



    var clickableImages = document.querySelectorAll('.clickable-image');
    clickableImages.forEach(function(image) {
      image.addEventListener('click', function() {
        var recipeId = this.getAttribute('id');
        localStorage.setItem('recipeId', recipeId); // Save the ID in local storage
        
      });
    });




    var reteta_bd_id = localStorage.getItem('id');
    var recipeName = localStorage.getItem('recipeName');
    var recipeCals = localStorage.getItem('recipeCals');
    var recipeId = localStorage.getItem('recipeId');
    var recipeImg = localStorage.getItem('recipeImg');
    var recipeProt = localStorage.getItem('recipeProt');
    var recipeCarbs = localStorage.getItem('recipeCarbs');
    var recipeFats = localStorage.getItem('recipeFats');




    var recipe = {
      id: recipeId,
      reteta_bd_id: reteta_bd_id,
      name: recipeName,
      cals: recipeCals,
      img: recipeImg,
      prot: recipeProt,
      carb: recipeCarbs,
      fat: recipeFats,
    };


    updateRecipeinArray(recipe);
    updateRecipeInfoDiv();



    localStorage.setItem('mese', JSON.stringify(mese));




    function updateRecipeinArray(rec) {


      var existingRecipeIndex = -1;


      for (var i = 0; i < mese.length; i++) {

        if (mese[i].id === rec.id) {
          existingRecipeIndex = i;
          break;
        }
      }

      if (existingRecipeIndex !== -1) {
        mese[existingRecipeIndex] = rec;
      } else { 
mese.push(rec); // Perform the push operation


      }


    }


    function updateRecipeInfoDiv() {
      var recipeInfoDiv = document.getElementById('date');
      recipeInfoDiv.textContent = '';
      recipeInfoDiv.textContent = JSON.stringify(mese);

      
      
      for (var i = 0; i < mese.length; i++) {
        var masa = mese[i];
        var reteta_bd_id = masa.reteta_bd_id;
        var masaId = masa.id;
        var masaNume = masa.name;
        var masaCals = masa.cals;
        var masaImg = masa.img;
        var masaProt = masa.prot;
        var masaCarbs = masa.carb;
        var masaFat = masa.fat;

        var masaChangeImg = document.getElementById(masaId);
        masaChangeImg.setAttribute('src', masaImg);
      
        var nr = masaId.replace('img', '');


        var calid = "cal" + nr;
        var calories = document.getElementsByName(calid)[0];
        calories.setAttribute("value", masaCals);

        var idreteta = "id_ret" + nr;
        var id_pt_reteta = document.getElementsByName(idreteta)[0];
        id_pt_reteta.setAttribute("value", reteta_bd_id);


        var nume_ret = "rec" + nr;
        var nume_pt_ret = document.getElementsByName(nume_ret)[0];
        nume_pt_ret.setAttribute("value", masaNume);


        var prot_ret = "prot" + nr;
        var prot_pt_ret = document.getElementsByName(prot_ret)[0];
        prot_pt_ret.setAttribute("value", masaProt);


        var carb_ret = "carbs" + nr;
        var carb_pt_ret = document.getElementsByName(carb_ret)[0];
        carb_pt_ret.setAttribute("value", masaCarbs);


        var fat_ret = "fat" + nr;
        var fat_pt_ret = document.getElementsByName(fat_ret)[0];
        fat_pt_ret.setAttribute("value", masaFat);
      }

    }






    function calculate_luni() {
      var cal1 = parseInt(document.getElementsByName('cal1')[0].value);
      var cal2 = parseInt(document.getElementsByName('cal2')[0].value);
      var cal3 = parseInt(document.getElementsByName('cal3')[0].value);
      var tot_luni = (isNaN(cal1) ? 0 : cal1) + (isNaN(cal2) ? 0 : cal2) + (isNaN(cal3) ? 0 : cal3);
      var div_luni = document.getElementById('tot_luni');
      div_luni.value = 'Total: ' + tot_luni;
    }

    function calculate_marti() {

      var cal4 = parseInt(document.getElementsByName('cal4')[0].value);
      var cal5 = parseInt(document.getElementsByName('cal5')[0].value);
      var cal6 = parseInt(document.getElementsByName('cal6')[0].value);
      var tot_marti = (isNaN(cal4) ? 0 : cal4) + (isNaN(cal5) ? 0 : cal5) + (isNaN(cal6) ? 0 : cal6);
      var div_marti = document.getElementById('tot_marti');
      div_marti.value = 'Total: ' + tot_marti;
    }


    function calculate_miercuri() {

      var cal7 = parseInt(document.getElementsByName('cal7')[0].value);
      var cal8 = parseInt(document.getElementsByName('cal8')[0].value);
      var cal9 = parseInt(document.getElementsByName('cal9')[0].value);
      var tot_miercuri = (isNaN(cal7) ? 0 : cal7) + (isNaN(cal8) ? 0 : cal8) + (isNaN(cal9) ? 0 : cal9);
      var div_miercuri = document.getElementById('tot_miercuri');
      div_miercuri.value = 'Total: ' + tot_miercuri;
    }

    function calculate_joi() {



      var cal10 = parseInt(document.getElementsByName('cal10')[0].value);
      var cal11 = parseInt(document.getElementsByName('cal11')[0].value);
      var cal12 = parseInt(document.getElementsByName('cal12')[0].value);
      var tot_joi = (isNaN(cal10) ? 0 : cal10) + (isNaN(cal11) ? 0 : cal11) + (isNaN(cal12) ? 0 : cal12);
      var div_joi = document.getElementById('tot_joi');
      div_joi.value = 'Total: ' + tot_joi;
    }

    function calculate_vineri() {



      var cal13 = parseInt(document.getElementsByName('cal13')[0].value);
      var cal14 = parseInt(document.getElementsByName('cal14')[0].value);
      var cal15 = parseInt(document.getElementsByName('cal15')[0].value);
      var tot_vineri = (isNaN(cal13) ? 0 : cal13) + (isNaN(cal14) ? 0 : cal14) + (isNaN(cal15) ? 0 : cal15);
      var div_vineri = document.getElementById('tot_vineri');
      div_vineri.value = 'Total: ' + tot_vineri;

    }

    function calculate_samb() {

      var cal16 = parseInt(document.getElementsByName('cal16')[0].value);
      var cal17 = parseInt(document.getElementsByName('cal17')[0].value);
      var cal18 = parseInt(document.getElementsByName('cal18')[0].value);
      var tot_samb = (isNaN(cal16) ? 0 : cal16) + (isNaN(cal17) ? 0 : cal17) + (isNaN(cal18) ? 0 : cal18);
      var div_samb = document.getElementById('tot_samb');
      div_samb.value = 'Total: ' + tot_samb;
    }

    function calculate_dum() {
      var cal19 = parseInt(document.getElementsByName('cal19')[0].value);
      var cal20 = parseInt(document.getElementsByName('cal20')[0].value);
      var cal21 = parseInt(document.getElementsByName('cal21')[0].value);
      var tot_dum = (isNaN(cal19) ? 0 : cal19) + (isNaN(cal20) ? 0 : cal20) + (isNaN(cal21) ? 0 : cal21);
      var div_dum = document.getElementById('tot_dum');
      div_dum.value = 'Total: ' + tot_dum;
    }

    calculate_luni();
    calculate_marti();
    calculate_miercuri();
    calculate_joi();
    calculate_vineri();
    calculate_samb();
    calculate_dum();
  </script>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>