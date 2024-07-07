<?php

session_start();

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  $email = $_SESSION['email'];
  echo "Welcome, " . $email . "! You are logged in.";
} else {
  // Session is not active or user is not logged in
  // Redirect the user to the login page or display an error message
  header("Location: user_login.php");
  exit;
}


$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

$rec1 = $rec2 = $rec3 = $rec4 = $rec5 = $rec6 = $rec7 = $rec8 = $rec9 = $rec10 = $rec11 = $rec12 = $rec13 = $rec14 = $rec15 = $rec16 = $rec17 = $rec18 = $rec19 = $rec20 = $rec21 = '';
$cal1 = $cal2 = $cal3 = $cal4 = $cal5 = $cal6 = $cal7 = $cal8 = $cal9 = $cal10 = $cal11 = $cal12 = $cal13 = $cal14 = $cal15 = $cal16 = $cal17 = $cal18 = $cal19 = $cal20 = $cal21 = '';
$prot1 = $prot2 = $prot3 = $prot4 = $prot5 = $prot6 = $prot7 = $prot8 = $prot9 = $prot10 = $prot11 = $prot12 = $prot13 = $prot14 = $prot15 = $prot16 = $prot17 = $prot18 = $prot19 = $prot20 = $prot21 = '';
$carbs1 = $carbs2 = $carbs3 = $carbs4 = $carbs5 = $carbs6 = $carbs7 = $carbs8 = $carbs9 = $carbs10 = $carbs11 = $carbs12 = $carbs13 = $carbs14 = $carbs15 = $carbs16 = $carbs17 = $carbs18 = $carbs19 = $carbs20 = $carbs21 = '';
$fat1 = $fat2 = $fat3 = $fat4 = $fat5 = $fat6 = $fat7 = $fat8 = $fat9 = $fat10 = $fat11 = $fat12 = $fat13 = $fat14 = $fat15 = $fat16 = $fat17 = $fat18 = $fat19 = $fat20 = $fat21 = '';
$id_ret1 = $id_ret2 = $id_ret3 = $id_ret4 = $id_ret5 = $id_ret6 = $id_ret7 = $id_ret8 = $id_ret9 = $id_ret10 = $id_ret11 = $id_ret12 = $id_ret13 = $id_ret14 = $id_ret15 = $id_ret16 = $id_ret17 = $id_ret18 = $id_ret19 = $id_ret20 = $id_ret21 = '';


$email = $_SESSION['email'];


$query = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$userId = $row['id'];


$query = "SELECT * FROM current_plans_for_client WHERE user_id = '$userId'";

$resultv = mysqli_query($db, $query);
$myrow = mysqli_fetch_array($resultv);
$mp_id = $myrow['meal_plan_id'];

echo $mp_id;


$query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'monday'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  // Fetch the data and convert it to an associative array


  $row = mysqli_fetch_assoc($result);
  $monday_braeakfast_id = $row['breakfast_id'];
  $monday_lunch_id = $row['lunch_id'];
  $monday_dinner_id = $row['dinner_id'];
  $id_luni = $row['id'];


  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_luni'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_luni = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$monday_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_bf_name = $row['recname'];
  $mon_bf_cals = $row['calories'];
  $mon_bf_prot = $row['grams_protein'];
  $mon_bf_carbs = $row['grams_carbs'];
  $mon_bf_fat = $row['grams_fats'];
  $mon_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$monday_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_lunch_name = $row['recname'];
  $mon_lunch_cals = $row['calories'];
  $mon_lunch_prot = $row['grams_protein'];
  $mon_lunch_carbs = $row['grams_carbs'];
  $mon_lunch_fat = $row['grams_fats'];
  $mon_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$monday_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_din_name = $row['recname'];
  $mon_din_cals = $row['calories'];
  $mon_din_prot = $row['grams_protein'];
  $mon_din_carbs = $row['grams_carbs'];
  $mon_din_fat = $row['grams_fats'];
  $mon_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'tuesday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tuesday_braeakfast_id = $row['breakfast_id'];
  $tuesday_lunch_id = $row['lunch_id'];
  $tuesday_dinner_id = $row['dinner_id'];
  $id_marti = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_marti'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_marti = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$tuesday_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_bf_name = $row['recname'];
  $tues_bf_cals = $row['calories'];
  $tues_bf_prot = $row['grams_protein'];
  $tues_bf_carbs = $row['grams_carbs'];
  $tues_bf_fat = $row['grams_fats'];
  $tues_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$tuesday_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_lunch_name = $row['recname'];
  $tues_lunch_cals = $row['calories'];
  $tues_lunch_prot = $row['grams_protein'];
  $tues_lunch_carbs = $row['grams_carbs'];
  $tues_lunch_fat = $row['grams_fats'];
  $tues_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$tuesday_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_din_name = $row['recname'];
  $tues_din_cals = $row['calories'];
  $tues_din_prot = $row['grams_protein'];
  $tues_din_carbs = $row['grams_carbs'];
  $tues_din_fat = $row['grams_fats'];
  $tues_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'wednseday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_breakfast_id = $row['breakfast_id'];
  $wed_lunch_id = $row['lunch_id'];
  $wed_dinner_id = $row['dinner_id'];
  $id_miercuri = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_miercuri'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_miercuri = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$wed_breakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_bf_name = $row['recname'];
  $wed_bf_cals = $row['calories'];
  $wed_bf_prot = $row['grams_protein'];
  $wed_bf_carbs = $row['grams_carbs'];
  $wed_bf_fat = $row['grams_fats'];
  $wed_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$wed_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_lunch_name = $row['recname'];
  $wed_lunch_cals = $row['calories'];
  $wed_lunch_prot = $row['grams_protein'];
  $wed_lunch_carbs = $row['grams_carbs'];
  $wed_lunch_fat = $row['grams_fats'];
  $wed_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$wed_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_din_name = $row['recname'];
  $wed_din_cals = $row['calories'];
  $wed_din_prot = $row['grams_protein'];
  $wed_din_carbs = $row['grams_carbs'];
  $wed_din_fat = $row['grams_fats'];
  $wed_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'thursday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_braeakfast_id = $row['breakfast_id'];
  $joi_lunch_id = $row['lunch_id'];
  $joi_dinner_id = $row['dinner_id'];
  $id_joi = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_joi'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_joi = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$joi_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_bf_name = $row['recname'];
  $joi_bf_cals = $row['calories'];
  $joi_bf_prot = $row['grams_protein'];
  $joi_bf_carbs = $row['grams_carbs'];
  $joi_bf_fat = $row['grams_fats'];
  $joi_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$joi_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_lunch_name = $row['recname'];
  $joi_lunch_cals = $row['calories'];
  $joi_lunch_prot = $row['grams_protein'];
  $joi_lunch_carbs = $row['grams_carbs'];
  $joi_lunch_fat = $row['grams_fats'];
  $joi_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$joi_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_din_name = $row['recname'];
  $joi_din_cals = $row['calories'];
  $joi_din_prot = $row['grams_protein'];
  $joi_din_carbs = $row['grams_carbs'];
  $joi_din_fat = $row['grams_fats'];
  $joi_din_img = $row['recipe_img'];





  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'friday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_braeakfast_id = $row['breakfast_id'];
  $fri_lunch_id = $row['lunch_id'];
  $fri_dinner_id = $row['dinner_id'];
  $id_vineri = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_vineri'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_vineri = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$fri_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_bf_name = $row['recname'];
  $fri_bf_cals = $row['calories'];
  $fri_bf_prot = $row['grams_protein'];
  $fri_bf_carbs = $row['grams_carbs'];
  $fri_bf_fat = $row['grams_fats'];
  $fri_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$fri_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_lunch_name = $row['recname'];
  $fri_lunch_cals = $row['calories'];
  $fri_lunch_prot = $row['grams_protein'];
  $fri_lunch_carbs = $row['grams_carbs'];
  $fri_lunch_fat = $row['grams_fats'];
  $fri_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$fri_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_din_name = $row['recname'];
  $fri_din_cals = $row['calories'];
  $fri_din_prot = $row['grams_protein'];
  $fri_din_carbs = $row['grams_carbs'];
  $fri_din_fat = $row['grams_fats'];
  $fri_din_img = $row['recipe_img'];




  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'saturday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_braeakfast_id = $row['breakfast_id'];
  $sat_lunch_id = $row['lunch_id'];
  $sat_dinner_id = $row['dinner_id'];
  $id_sambata = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_sambata'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_sambata = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$sat_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_bf_name = $row['recname'];
  $sat_bf_cals = $row['calories'];
  $sat_bf_prot = $row['grams_protein'];
  $sat_bf_carbs = $row['grams_carbs'];
  $sat_bf_fat = $row['grams_fats'];
  $sat_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$sat_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_lunch_name = $row['recname'];
  $sat_lunch_cals = $row['calories'];
  $sat_lunch_prot = $row['grams_protein'];
  $sat_lunch_carbs = $row['grams_carbs'];
  $sat_lunch_fat = $row['grams_fats'];
  $sat_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$sat_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_din_name = $row['recname'];
  $sat_din_cals = $row['calories'];
  $sat_din_prot = $row['grams_protein'];
  $sat_din_carbs = $row['grams_carbs'];
  $sat_din_fat = $row['grams_fats'];
  $sat_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'sunday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_braeakfast_id = $row['breakfast_id'];
  $sun_lunch_id = $row['lunch_id'];
  $sun_dinner_id = $row['dinner_id'];
  $id_duminica = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_duminica'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_dum = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$sun_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_bf_name = $row['recname'];
  $sun_bf_cals = $row['calories'];
  $sun_bf_prot = $row['grams_protein'];
  $sun_bf_carbs = $row['grams_carbs'];
  $sun_bf_fat = $row['grams_fats'];
  $sun_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$sun_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_lunch_name = $row['recname'];
  $sun_lunch_cals = $row['calories'];
  $sun_lunch_prot = $row['grams_protein'];
  $sun_lunch_carbs = $row['grams_carbs'];
  $sun_lunch_fat = $row['grams_fats'];
  $sun_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$sun_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_din_name = $row['recname'];
  $sun_din_cals = $row['calories'];
  $sun_din_prot = $row['grams_protein'];
  $sun_din_carbs = $row['grams_carbs'];
  $sun_din_fat = $row['grams_fats'];
  $sun_din_img = $row['recipe_img'];
} else {
  header("Location: your_account_user.php");
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
  <!--
  <div id="date">
    <p>NO</p>
  </div>-->

  <div class="cell small-12 medium-6 large-6 text-center">
    <a href="see_and_edit_current_meal_plan.php" class="custom-btn2 btn-3">EDIT MEAL PLAN</a>
  </div>
  <div class="cell small-12 medium-6 large-6 text-center">
    <a id="deleteMealPlan" class="custom-btn2 btn-3">DELETE MEAL PLAN</a>
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
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_bf_name . '" readonly>'; ?>


          <?php echo '<a href="recipe.php?id=' . $monday_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src=" ' . $mon_bf_img . '"></a>'; ?>

          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_bf_cals . '" readonly>'; ?>

          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_lunch_name . '" readonly>'; ?>


          <?php echo '<a href="recipe.php?id=' . $monday_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $mon_lunch_img . '"></a>'; ?>

          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_lunch_cals . '" readonly>'; ?>

          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_din_name . '" readonly>'; ?>


          <?php echo '<a href="recipe.php?id=' . $monday_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $mon_din_img . '"></a>'; ?>

          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_din_cals . '" readonly>'; ?>

          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_luni . '"readonly>'; ?>

        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">TUESDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_bf_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $tuesday_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $tues_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>

        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $tuesday_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $tues_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $tuesday_dinner_id . '""><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $tues_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_marti . '"readonly>'; ?>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">WEDNESAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_bf_name . '" readonly>'; ?>
          <?php echo '<ahref="recipe.php?id=' . $wed_breakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $wed_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $wed_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $wed_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $wed_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $wed_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_miercuri . '"readonly>'; ?>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">THURSDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_bf_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $joi_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $joi_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $joi_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $joi_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $joi_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $joi_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_joi . '"readonly>'; ?>
        </div>



        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">FRIDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_bf_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $fri_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $fri_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $fri_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $fri_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $fri_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $fri_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_vineri . '"readonly>'; ?>
        </div>


        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">SATURDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_bf_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sat_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sat_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sat_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sat_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sat_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sat_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_sambata . '"readonly>'; ?>
        </div>



        <div class="cell small-12 medium-2 large-2">
          <p style="margin-top: 60px">SUNDAY</p>
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_bf_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sun_braeakfast_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sun_bf_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_bf_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_lunch_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sun_lunch_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sun_lunch_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_lunch_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-3 large-3">
          <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_din_name . '" readonly>'; ?>
          <?php echo '<a href="recipe.php?id=' . $sun_dinner_id . '"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="' . $sun_din_img . '"></a>'; ?>
          <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_din_cals . '" readonly>'; ?>
          <div style="width: 100%; display: flex;">
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_prot . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_carbs . '" readonly>'; ?>
            <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_fat . '" readonly>'; ?>
          </div>
          <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
        </div>
        <div class="cell small-12 medium-1 large-1">
          <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_dum . '"readonly>'; ?>
        </div>


      </div>
    </div>
  </form>






  <script>
    /*
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


      localStorage.getItem('mese', JSON.stringify(mese));

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
        mese.push(rec);
      }


    }


    function updateRecipeInfoDiv() {
      var recipeInfoDiv = document.getElementById('date');
      recipeInfoDiv.textContent = '';

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


        var existingEntryIndex = -1;

        for (var j = 0; j < recipeInfoDiv.children.length; j++) {
          if (recipeInfoDiv.children[j].dataset.masaId === masaId) {
            existingEntryIndex = j;
            break;
          }
        }


        var no = masaId.replace('img', '');

        if (existingEntryIndex !== -1) {
          var existingEntry = recipeInfoDiv.children[existingEntryIndex];
          existingEntry.textContent =
            'nr: ' + no + '\n' +
            'ID: ' + masaId + '\n' +
            'reteta_bd_id: ' + reteta_bd_id + '\n' +
            'img: ' + masaImg + '\n' +
            'Cals: ' + masaCals + '\n' +
            'prot: ' + masaProt + '\n' +
            'carbs: ' + masaCarbs + '\n' +
            'Fats: ' + masaFat + '\n' +
            'Name: ' + masaNume + '\n\n';
          existingEntry.dataset.masaId = masaId;
        } else {
          var masaEntry = document.createElement('div');
          masaEntry.textContent =
            'nr: ' + no + '\n' +
            'ID: ' + masaId + '\n' +
            'reteta_bd_id: ' + reteta_bd_id + '\n' +
            'img: ' + masaImg + '\n' +
            'Cals: ' + masaCals + '\n' +
            'prot: ' + masaProt + '\n' +
            'carbs: ' + masaCarbs + '\n' +
            'Fats: ' + masaFat + '\n' +
            'Name: ' + masaNume + '\n\n';
          masaEntry.dataset.masaId = masaId;
          recipeInfoDiv.appendChild(masaEntry);
        }

        var masaChangeImg = document.getElementById(masaId);
        masaChangeImg.setAttribute('src', masaImg);
      }

      var recCalsElems = document.getElementsByClassName('kal');
      var recipe_ids = document.getElementsByClassName('nr_reteta');
      var recNameElems = document.getElementsByClassName('rec_name');
      var recProt = document.getElementsByClassName('prot');
      var recCarb = document.getElementsByClassName('carb');
      var recFat = document.getElementsByClassName('fat');



      for (var i = 0; i < mese.length; i++) {
        var name = mese[i].name;
        var id = mese[i].id;
        var ret_id = mese[i].reteta_bd_id;
        var kal = mese[i].cals;
        var prot = mese[i].prot;
        var carbs = mese[i].carb;
        var fat = mese[i].fat;
        var img = mese[i].img;

        var nr = id.replace('img', '');

        recipe_ids[nr - 1].value = ret_id;
        recCalsElems[nr - 1].value = kal;
        recNameElems[nr - 1].value = name;
        recProt[nr - 1].value = prot;
        recCarb[nr - 1].value = carbs;
        recFat[nr - 1].value = fat;

      }


    }



    updateRecipeInfoDiv();



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
*/

    document.getElementById('deleteMealPlan').addEventListener('click', function() {


      var mp_id = <?php echo json_encode($mp_id); ?>; // Assuming $mp_id is a valid PHP variable
      alert(mp_id);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'delete_meal_plan.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            window.location.href = 'your_account_user.php';
          } else {
            // Error response
            // Handle the error or display an error message
          }
        }
      };
      xhr.send('mp_id=' + encodeURIComponent(mp_id)); // Pass the mp_id as a parameter in the request

    });
  </script>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>