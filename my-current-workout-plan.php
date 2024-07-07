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

$wo_1_type = $wo_1_ex_1_name = $wo_1_ex_1_sets = $wo_1_ex_1_reps = $wo_1_ex_1_weight = $wo_1_ex_2_name = $wo_1_ex_2_sets = $wo_1_ex_2_reps = $wo_1_ex_2_weight =  "";
$wo_1_ex_3_name = $wo_1_ex_3_sets = $wo_1_ex_3_reps = $wo_1_ex_3_weight = $wo_1_ex_4_name = $wo_1_ex_4_sets = $wo_1_ex_4_reps = $wo_1_ex_4_weight = "";
$wo_1_ex_5_name = $wo_1_ex_5_sets = $wo_1_ex_5_reps = $wo_1_ex_5_weight = $wo_1_ex_6_name = $wo_1_ex_6_sets = $wo_1_ex_6_reps = $wo_1_ex_6_weight = "";


$wo_2_type = $wo_2_ex_1_name = $wo_2_ex_1_sets = $wo_2_ex_1_reps = $wo_2_ex_1_weight = $wo_2_ex_2_name = $wo_2_ex_2_sets = $wo_2_ex_2_reps = $wo_2_ex_2_weight =  "";
$wo_2_ex_3_name = $wo_2_ex_3_sets = $wo_2_ex_3_reps = $wo_2_ex_3_weight = $wo_2_ex_4_name = $wo_2_ex_4_sets = $wo_2_ex_4_reps = $wo_2_ex_4_weight = "";
$wo_2_ex_5_name = $wo_2_ex_5_sets = $wo_2_ex_5_reps = $wo_2_ex_5_weight = $wo_2_ex_6_name = $wo_2_ex_6_sets = $wo_2_ex_6_reps = $wo_2_ex_6_weight = "";


$wo_3_type = $wo_3_ex_1_name = $wo_3_ex_1_sets = $wo_3_ex_1_reps = $wo_3_ex_1_weight = $wo_3_ex_2_name = $wo_3_ex_2_sets = $wo_3_ex_2_reps = $wo_3_ex_2_weight =  "";
$wo_3_ex_3_name = $wo_3_ex_3_sets = $wo_3_ex_3_reps = $wo_3_ex_3_weight = $wo_3_ex_4_name = $wo_3_ex_4_sets = $wo_3_ex_4_reps = $wo_3_ex_4_weight = "";
$wo_3_ex_5_name = $wo_3_ex_5_sets = $wo_3_ex_5_reps = $wo_3_ex_5_weight = $wo_3_ex_6_name = $wo_3_ex_6_sets = $wo_3_ex_6_reps = $wo_3_ex_6_weight = "";

$wo_4_type = $wo_4_ex_1_name = $wo_4_ex_1_sets = $wo_4_ex_1_reps = $wo_4_ex_1_weight = $wo_4_ex_2_name = $wo_4_ex_2_sets = $wo_4_ex_2_reps = $wo_4_ex_2_weight =  "";
$wo_4_ex_3_name = $wo_4_ex_3_sets = $wo_4_ex_3_reps = $wo_4_ex_3_weight = $wo_4_ex_4_name = $wo_4_ex_4_sets = $wo_4_ex_4_reps = $wo_4_ex_4_weight = "";
$wo_4_ex_5_name = $wo_4_ex_5_sets = $wo_4_ex_5_reps = $wo_4_ex_5_weight = $wo_4_ex_6_name = $wo_4_ex_6_sets = $wo_4_ex_6_reps = $wo_4_ex_6_weight = "";


$wo_1_ex_1_img = $wo_1_ex_2_img = $wo_1_ex_3_img = $wo_1_ex_4_img = $wo_1_ex_5_img = $wo_1_ex_6_img = '';

$wo_2_ex_1_img = $wo_2_ex_2_img = $wo_2_ex_3_img = $wo_2_ex_4_img = $wo_2_ex_5_img = $wo_2_ex_6_img = '';
$wo_3_ex_1_img = $wo_3_ex_2_img = $wo_3_ex_3_img = $wo_3_ex_4_img = $wo_3_ex_5_img = $wo_3_ex_6_img = '';
$wo_4_ex_1_img = $wo_4_ex_2_img = $wo_4_ex_3_img = $wo_4_ex_4_img = $wo_4_ex_5_img = $wo_4_ex_6_img = '';
$email = $_SESSION['email'];


$query = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$userId = $row['id'];


$query = "SELECT * FROM current_plans_for_client WHERE user_id = '$userId'";

$resultv = mysqli_query($db, $query);
$myrow = mysqli_fetch_array($resultv);
$wo_plan_id = $myrow['workout_plan_id'];


$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$wo_plan_id' AND numb = 1";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
  // Fetch the data and convert it to an associative array

$row = mysqli_fetch_assoc($result);
$wo_1_type = $row['tip'];
$wo_1_id = $row['id'];



$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_1_img = $row['img'];
$wo_1_ex_1_name = $row['nume'];
$wo_1_ex_1_sets = $row['nr_sets'];
$wo_1_ex_1_reps = $row['nr_reps'];
$wo_1_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_2_img = $row['img'];
$wo_1_ex_2_name = $row['nume'];
$wo_1_ex_2_sets = $row['nr_sets'];
$wo_1_ex_2_reps = $row['nr_reps'];
$wo_1_ex_2_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_3_img = $row['img'];
$wo_1_ex_3_name = $row['nume'];
$wo_1_ex_3_sets = $row['nr_sets'];
$wo_1_ex_3_reps = $row['nr_reps'];
$wo_1_ex_3_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_4_img = $row['img'];
$wo_1_ex_4_name = $row['nume'];
$wo_1_ex_4_sets = $row['nr_sets'];
$wo_1_ex_4_reps = $row['nr_reps'];
$wo_1_ex_4_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_5_img = $row['img'];
$wo_1_ex_5_name = $row['nume'];
$wo_1_ex_5_sets = $row['nr_sets'];
$wo_1_ex_5_reps = $row['nr_reps'];
$wo_1_ex_5_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_1_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_1_ex_6_img = $row['img'];
$wo_1_ex_6_name = $row['nume'];
$wo_1_ex_6_sets = $row['nr_sets'];
$wo_1_ex_6_reps = $row['nr_reps'];
$wo_1_ex_6_weight = $row['weight_used'];




$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$wo_plan_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_type = $row['tip'];
$wo_2_id = $row['id'];



$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_1_img = $row['img'];
$wo_2_ex_1_name = $row['nume'];
$wo_2_ex_1_sets = $row['nr_sets'];
$wo_2_ex_1_reps = $row['nr_reps'];
$wo_2_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_2_img = $row['img'];
$wo_2_ex_2_name = $row['nume'];
$wo_2_ex_2_sets = $row['nr_sets'];
$wo_2_ex_2_reps = $row['nr_reps'];
$wo_2_ex_2_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_3_img = $row['img'];
$wo_2_ex_3_name = $row['nume'];
$wo_2_ex_3_sets = $row['nr_sets'];
$wo_2_ex_3_reps = $row['nr_reps'];
$wo_2_ex_3_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_4_name = $row['nume'];
$wo_2_ex_4_img = $row['img'];
$wo_2_ex_4_sets = $row['nr_sets'];
$wo_2_ex_4_reps = $row['nr_reps'];
$wo_2_ex_4_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_5_img = $row['img'];
$wo_2_ex_5_name = $row['nume'];
$wo_2_ex_5_sets = $row['nr_sets'];
$wo_2_ex_5_reps = $row['nr_reps'];
$wo_2_ex_5_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_2_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_2_ex_6_img = $row['img'];
$wo_2_ex_6_name = $row['nume'];
$wo_2_ex_6_sets = $row['nr_sets'];
$wo_2_ex_6_reps = $row['nr_reps'];
$wo_2_ex_6_weight = $row['weight_used'];







$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$wo_plan_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_type = $row['tip'];
$wo_3_id = $row['id'];



$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_1_img = $row['img'];
$wo_3_ex_1_name = $row['nume'];
$wo_3_ex_1_sets = $row['nr_sets'];
$wo_3_ex_1_reps = $row['nr_reps'];
$wo_3_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_2_img = $row['img'];
$wo_3_ex_2_name = $row['nume'];
$wo_3_ex_2_sets = $row['nr_sets'];
$wo_3_ex_2_reps = $row['nr_reps'];
$wo_3_ex_2_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_3_img = $row['img'];
$wo_3_ex_3_name = $row['nume'];
$wo_3_ex_3_sets = $row['nr_sets'];
$wo_3_ex_3_reps = $row['nr_reps'];
$wo_3_ex_3_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_4_img = $row['img'];
$wo_3_ex_4_name = $row['nume'];
$wo_3_ex_4_sets = $row['nr_sets'];
$wo_3_ex_4_reps = $row['nr_reps'];
$wo_3_ex_4_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_5_img = $row['img'];
$wo_3_ex_5_name = $row['nume'];
$wo_3_ex_5_sets = $row['nr_sets'];
$wo_3_ex_5_reps = $row['nr_reps'];
$wo_3_ex_5_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_3_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_3_ex_6_img = $row['img'];
$wo_3_ex_6_name = $row['nume'];
$wo_3_ex_6_sets = $row['nr_sets'];
$wo_3_ex_6_reps = $row['nr_reps'];
$wo_3_ex_6_weight = $row['weight_used'];






$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$wo_plan_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_type = $row['tip'];
$wo_4_id = $row['id'];



$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_1_img = $row['img'];
$wo_4_ex_1_name = $row['nume'];
$wo_4_ex_1_sets = $row['nr_sets'];
$wo_4_ex_1_reps = $row['nr_reps'];
$wo_4_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_2_img = $row['img'];
$wo_4_ex_2_name = $row['nume'];
$wo_4_ex_2_sets = $row['nr_sets'];
$wo_4_ex_2_reps = $row['nr_reps'];
$wo_4_ex_2_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_3_img = $row['img'];
$wo_4_ex_3_name = $row['nume'];
$wo_4_ex_3_sets = $row['nr_sets'];
$wo_4_ex_3_reps = $row['nr_reps'];
$wo_4_ex_3_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_4_img = $row['img'];
$wo_4_ex_4_name = $row['nume'];
$wo_4_ex_4_sets = $row['nr_sets'];
$wo_4_ex_4_reps = $row['nr_reps'];
$wo_4_ex_4_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_5_img = $row['img'];
$wo_4_ex_5_name = $row['nume'];
$wo_4_ex_5_sets = $row['nr_sets'];
$wo_4_ex_5_reps = $row['nr_reps'];
$wo_4_ex_5_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$wo_4_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$wo_4_ex_6_img = $row['img'];
$wo_4_ex_6_name = $row['nume'];
$wo_4_ex_6_sets = $row['nr_sets'];
$wo_4_ex_6_reps = $row['nr_reps'];
$wo_4_ex_6_weight = $row['weight_used'];
}else {
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
        <a href="see_and_edit_wo_plan.php" class="custom-btn2 btn-3">EDIT WORKOUT PLAN</a>
    </div>
    <div class="cell small-12 medium-6 large-6 text-center">
        <a id="deleteWOplan" class="custom-btn2 btn-3">DELETE WORKOUT PLAN</a>
    </div>
    <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
        <div class="grid-x grid-margin-x">


            <div class="cell small-12 medium-12 large-2">
                <p style="margin-top: 60px">WORKOUT #1</p>
                <p style="width: 70%;margin: 0 auto;"><?php echo $wo_1_type ?></p>
            </div>
            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_1_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_1_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_1_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_1_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_1_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_2_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_2_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_2_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_2_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_2_weight ?> kg</p>
                    </div>
                </div>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_3_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_3_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_3_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_3_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_3_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_4_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_4_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_4_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_4_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_4_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_5_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_5_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_5_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_5_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_5_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_1_ex_6_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_1_ex_6_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_6_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_1_ex_6_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_1_ex_6_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
            </div>








            <div class="cell small-12 medium-12 large-2">
                <p style="margin-top: 60px">WORKOUT #2</p>
                <p style="width: 70%;margin: 0 auto;"><?php echo $wo_2_type ?></p>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_1_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_1_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_1_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_1_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_1_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_2_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_2_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_2_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_2_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_2_weight ?> kg</p>
                    </div>
                </div>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_3_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_3_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_3_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_3_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_3_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_4_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_4_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_4_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_4_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_4_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_5_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_5_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_5_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_5_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_5_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_2_ex_6_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_2_ex_6_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_6_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_2_ex_6_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_2_ex_6_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
            </div>


            <div class="cell small-12 medium-12 large-2">
                <p style="margin-top: 60px">WORKOUT #3</p>
                <p style="width: 70%;margin: 0 auto;"><?php echo $wo_3_type ?></p>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_1_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_1_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_1_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_1_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_1_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_2_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_2_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_2_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_2_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_2_weight ?> kg</p>
                    </div>
                </div>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_3_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_3_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_3_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_3_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_3_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_4_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_4_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_4_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_4_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_4_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_5_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_5_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_5_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_5_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_5_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_3_ex_6_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_3_ex_6_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_6_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_3_ex_6_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_3_ex_6_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
            </div>




            <div class="cell small-12 medium-12 large-2">
                <p style="margin-top: 60px">WORKOUT #4</p>
                <p style="width: 70%;margin: 0 auto;"><?php echo $wo_4_type ?></p>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_1_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_1_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_1_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_1_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_1_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_2_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_2_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_2_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_2_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_2_weight ?> kg</p>
                    </div>
                </div>
            </div>


            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_3_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_3_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_3_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_3_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_3_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_4_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_4_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_4_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_4_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_4_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_5_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_5_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_5_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_5_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_5_weight ?> kg</p>
                    </div>
                </div>
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                    <a><img src="<?php echo $wo_4_ex_6_img ?>"></a>
                    <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" value="<?php echo $wo_4_ex_6_name ?>" readonly>
                    <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_6_sets ?></p>
                        </div>
                        <div style="width: 20%; margin: 0; padding: 0;">
                            <p style="padding-top: 10px;">X</p>
                        </div>
                        <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                            <p style="padding-top: 10px;"><?php echo $wo_4_ex_6_reps ?></p>
                        </div>
                    </form>
                    <div style="margin: 0; padding: 0; width: 100%;">
                        <p><?php echo $wo_4_ex_6_weight ?> kg</p>
                    </div>
                </div>
            </div>
            <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
            </div>




<script>

    

document.getElementById('deleteWOplan').addEventListener('click', function() {


var wo_plan_id = <?php echo json_encode($wo_plan_id); ?>; // Assuming $mp_id is a valid PHP variable
alert(wo_plan_id);
var xhr = new XMLHttpRequest();
xhr.open('POST', 'delete_workout_plan.php', true);
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
xhr.send('wo_plan_id=' + encodeURIComponent(wo_plan_id)); // Pass the mp_id as a parameter in the request

});
</script>

            <script src="js/vendor/jquery.js"></script>
            <script src="js/vendor/what-input.js"></script>
            <script src="js/vendor/foundation.js"></script>
            <script src="js/app.js"></script>
</body>

</html>