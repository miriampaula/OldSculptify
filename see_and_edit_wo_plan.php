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



$curwo_1_type = $curwo_1_ex_1_name = $curwo_1_ex_1_sets = $curwo_1_ex_1_reps = $curwo_1_ex_1_weight = $curwo_1_ex_2_name = $curwo_1_ex_2_sets = $curwo_1_ex_2_reps = $curwo_1_ex_2_weight = "";
$curwo_1_ex_3_name = $curwo_1_ex_3_sets = $curwo_1_ex_3_reps = $curwo_1_ex_3_weight = $curwo_1_ex_4_name = $curwo_1_ex_4_sets = $curwo_1_ex_4_reps = $curwo_1_ex_4_weight = "";
$curwo_1_ex_5_name = $curwo_1_ex_5_sets = $curwo_1_ex_5_reps = $curwo_1_ex_5_weight = $curwo_1_ex_6_name = $curwo_1_ex_6_sets = $curwo_1_ex_6_reps = $curwo_1_ex_6_weight = "";

$curwo_2_type = $curwo_2_ex_1_name = $curwo_2_ex_1_sets = $curwo_2_ex_1_reps = $curwo_2_ex_1_weight = $curwo_2_ex_2_name = $curwo_2_ex_2_sets = $curwo_2_ex_2_reps = $curwo_2_ex_2_weight = "";
$curwo_2_ex_3_name = $curwo_2_ex_3_sets = $curwo_2_ex_3_reps = $curwo_2_ex_3_weight = $curwo_2_ex_4_name = $curwo_2_ex_4_sets = $curwo_2_ex_4_reps = $curwo_2_ex_4_weight = "";
$curwo_2_ex_5_name = $curwo_2_ex_5_sets = $curwo_2_ex_5_reps = $curwo_2_ex_5_weight = $curwo_2_ex_6_name = $curwo_2_ex_6_sets = $curwo_2_ex_6_reps = $curwo_2_ex_6_weight = "";


$curwo_3_type = $curwo_3_ex_1_name = $curwo_3_ex_1_sets = $curwo_3_ex_1_reps = $curwo_3_ex_1_weight = $curwo_3_ex_2_name = $curwo_3_ex_2_sets = $curwo_3_ex_2_reps = $curwo_3_ex_2_weight = "";
$curwo_3_ex_3_name = $curwo_3_ex_3_sets = $curwo_3_ex_3_reps = $curwo_3_ex_3_weight = $curwo_3_ex_4_name = $curwo_3_ex_4_sets = $curwo_3_ex_4_reps = $curwo_3_ex_4_weight = "";
$curwo_3_ex_5_name = $curwo_3_ex_5_sets = $curwo_3_ex_5_reps = $curwo_3_ex_5_weight = $curwo_3_ex_6_name = $curwo_3_ex_6_sets = $curwo_3_ex_6_reps = $curwo_3_ex_6_weight = "";

$curwo_4_type = $curwo_4_ex_1_name = $curwo_4_ex_1_sets = $curwo_4_ex_1_reps = $curwo_4_ex_1_weight = $curwo_4_ex_2_name = $curwo_4_ex_2_sets = $curwo_4_ex_2_reps = $curwo_4_ex_2_weight = "";
$curwo_4_ex_3_name = $curwo_4_ex_3_sets = $curwo_4_ex_3_reps = $curwo_4_ex_3_weight = $curwo_4_ex_4_name = $curwo_4_ex_4_sets = $curwo_4_ex_4_reps = $curwo_4_ex_4_weight = "";
$curwo_4_ex_5_name = $curwo_4_ex_5_sets = $curwo_4_ex_5_reps = $curwo_4_ex_5_weight = $curwo_4_ex_6_name = $curwo_4_ex_6_sets = $curwo_4_ex_6_reps = $curwo_4_ex_6_weight = "";


$curwo_1_ex_1_img = $curwo_1_ex_2_img = $curwo_1_ex_3_img = $curwo_1_ex_4_img = $curwo_1_ex_5_img = $curwo_1_ex_6_img = '';
$curwo_2_ex_1_img = $curwo_2_ex_2_img = $curwo_2_ex_3_img = $curwo_2_ex_4_img = $curwo_2_ex_5_img = $curwo_2_ex_6_img = '';
$curwo_3_ex_1_img = $curwo_3_ex_2_img = $curwo_3_ex_3_img = $curwo_3_ex_4_img = $curwo_3_ex_5_img = $curwo_3_ex_6_img = '';
$curwo_4_ex_1_img = $curwo_4_ex_2_img = $curwo_4_ex_3_img = $curwo_4_ex_4_img = $curwo_4_ex_5_img = $curwo_4_ex_6_img = '';








$email = $_SESSION['email'];


$query = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$userId = $row['id'];


$query = "SELECT * FROM current_plans_for_client WHERE user_id = '$userId'";

$resultv = mysqli_query($db, $query);
$myrow = mysqli_fetch_array($resultv);
$curwo_plan_id = $myrow['workout_plan_id'];


$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$curwo_plan_id' AND numb = 1";
$result = mysqli_query($db, $query);


// Fetch the data and convert it to an associative array

$row = mysqli_fetch_assoc($result);
$curwo_1_type = $row['tip'];
$curwo_1_id = $row['id'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_1_img = $row['img'];
$curwo_1_ex_1_name = $row['nume'];
$curwo_1_ex_1_sets = $row['nr_sets'];
$curwo_1_ex_1_reps = $row['nr_reps'];
$curwo_1_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_2_img = $row['img'];
$curwo_1_ex_2_name = $row['nume'];
$curwo_1_ex_2_sets = $row['nr_sets'];
$curwo_1_ex_2_reps = $row['nr_reps'];
$curwo_1_ex_2_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_3_img = $row['img'];
$curwo_1_ex_3_name = $row['nume'];
$curwo_1_ex_3_sets = $row['nr_sets'];
$curwo_1_ex_3_reps = $row['nr_reps'];
$curwo_1_ex_3_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_4_img = $row['img'];
$curwo_1_ex_4_name = $row['nume'];
$curwo_1_ex_4_sets = $row['nr_sets'];
$curwo_1_ex_4_reps = $row['nr_reps'];
$curwo_1_ex_4_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_5_img = $row['img'];
$curwo_1_ex_5_name = $row['nume'];
$curwo_1_ex_5_sets = $row['nr_sets'];
$curwo_1_ex_5_reps = $row['nr_reps'];
$curwo_1_ex_5_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_1_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_1_ex_6_img = $row['img'];
$curwo_1_ex_6_name = $row['nume'];
$curwo_1_ex_6_sets = $row['nr_sets'];
$curwo_1_ex_6_reps = $row['nr_reps'];
$curwo_1_ex_6_weight = $row['weight_used'];



$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$curwo_plan_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_type = $row['tip'];
$curwo_2_id = $row['id'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_1_img = $row['img'];
$curwo_2_ex_1_name = $row['nume'];
$curwo_2_ex_1_sets = $row['nr_sets'];
$curwo_2_ex_1_reps = $row['nr_reps'];
$curwo_2_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_2_img = $row['img'];
$curwo_2_ex_2_name = $row['nume'];
$curwo_2_ex_2_sets = $row['nr_sets'];
$curwo_2_ex_2_reps = $row['nr_reps'];
$curwo_2_ex_2_weight = $row['weight_used'];


$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_3_img = $row['img'];
$curwo_2_ex_3_name = $row['nume'];
$curwo_2_ex_3_sets = $row['nr_sets'];
$curwo_2_ex_3_reps = $row['nr_reps'];
$curwo_2_ex_3_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_4_name = $row['nume'];
$curwo_2_ex_4_img = $row['img'];
$curwo_2_ex_4_sets = $row['nr_sets'];
$curwo_2_ex_4_reps = $row['nr_reps'];
$curwo_2_ex_4_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_5_img = $row['img'];
$curwo_2_ex_5_name = $row['nume'];
$curwo_2_ex_5_sets = $row['nr_sets'];
$curwo_2_ex_5_reps = $row['nr_reps'];
$curwo_2_ex_5_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_2_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_2_ex_6_img = $row['img'];
$curwo_2_ex_6_name = $row['nume'];
$curwo_2_ex_6_sets = $row['nr_sets'];
$curwo_2_ex_6_reps = $row['nr_reps'];
$curwo_2_ex_6_weight = $row['weight_used'];


$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$curwo_plan_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_type = $row['tip'];
$curwo_3_id = $row['id'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_1_img = $row['img'];
$curwo_3_ex_1_name = $row['nume'];
$curwo_3_ex_1_sets = $row['nr_sets'];
$curwo_3_ex_1_reps = $row['nr_reps'];
$curwo_3_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_2_img = $row['img'];
$curwo_3_ex_2_name = $row['nume'];
$curwo_3_ex_2_sets = $row['nr_sets'];
$curwo_3_ex_2_reps = $row['nr_reps'];
$curwo_3_ex_2_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_3_img = $row['img'];
$curwo_3_ex_3_name = $row['nume'];
$curwo_3_ex_3_sets = $row['nr_sets'];
$curwo_3_ex_3_reps = $row['nr_reps'];
$curwo_3_ex_3_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_4_img = $row['img'];
$curwo_3_ex_4_name = $row['nume'];
$curwo_3_ex_4_sets = $row['nr_sets'];
$curwo_3_ex_4_reps = $row['nr_reps'];
$curwo_3_ex_4_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_5_img = $row['img'];
$curwo_3_ex_5_name = $row['nume'];
$curwo_3_ex_5_sets = $row['nr_sets'];
$curwo_3_ex_5_reps = $row['nr_reps'];
$curwo_3_ex_5_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_3_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_3_ex_6_img = $row['img'];
$curwo_3_ex_6_name = $row['nume'];
$curwo_3_ex_6_sets = $row['nr_sets'];
$curwo_3_ex_6_reps = $row['nr_reps'];
$curwo_3_ex_6_weight = $row['weight_used'];




$query = "SELECT * FROM workout WHERE current_workout_plan_id = '$curwo_plan_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_type = $row['tip'];
$curwo_4_id = $row['id'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_1_img = $row['img'];
$curwo_4_ex_1_name = $row['nume'];
$curwo_4_ex_1_sets = $row['nr_sets'];
$curwo_4_ex_1_reps = $row['nr_reps'];
$curwo_4_ex_1_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 2";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_2_img = $row['img'];
$curwo_4_ex_2_name = $row['nume'];
$curwo_4_ex_2_sets = $row['nr_sets'];
$curwo_4_ex_2_reps = $row['nr_reps'];
$curwo_4_ex_2_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 3";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_3_img = $row['img'];
$curwo_4_ex_3_name = $row['nume'];
$curwo_4_ex_3_sets = $row['nr_sets'];
$curwo_4_ex_3_reps = $row['nr_reps'];
$curwo_4_ex_3_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 4";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_4_img = $row['img'];
$curwo_4_ex_4_name = $row['nume'];
$curwo_4_ex_4_sets = $row['nr_sets'];
$curwo_4_ex_4_reps = $row['nr_reps'];
$curwo_4_ex_4_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 5";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_5_img = $row['img'];
$curwo_4_ex_5_name = $row['nume'];
$curwo_4_ex_5_sets = $row['nr_sets'];
$curwo_4_ex_5_reps = $row['nr_reps'];
$curwo_4_ex_5_weight = $row['weight_used'];

$query = "SELECT * FROM exercise WHERE workout_id = '$curwo_4_id' AND numb = 6";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$curwo_4_ex_6_img = $row['img'];
$curwo_4_ex_6_name = $row['nume'];
$curwo_4_ex_6_sets = $row['nr_sets'];
$curwo_4_ex_6_reps = $row['nr_reps'];
$curwo_4_ex_6_weight = $row['weight_used'];


































$wo_1_type = $wo_1_ex_1_name = $wo_1_ex_1_img = $wo_1_ex_1_sets = $wo_1_ex_1_reps = $wo_1_ex_1_weight = $wo_1_ex_2_name = $wo_1_ex_2_img = $wo_1_ex_2_sets = $wo_1_ex_2_reps = $wo_1_ex_2_weight =  "";
$wo_1_ex_3_name  = $wo_1_ex_3_img = $wo_1_ex_3_sets = $wo_1_ex_3_reps = $wo_1_ex_3_weight = $wo_1_ex_4_name = $wo_1_ex_4_sets = $wo_1_ex_4_img = $wo_1_ex_4_reps = $wo_1_ex_4_weight = "";
$wo_1_ex_5_name = $wo_1_ex_5_sets = $wo_1_ex_5_img = $wo_1_ex_5_reps = $wo_1_ex_5_weight = $wo_1_ex_6_name = $wo_1_ex_6_img = $wo_1_ex_6_sets = $wo_1_ex_6_reps = $wo_1_ex_6_weight = "";



$wo_2_ex_1_img = $wo_2_ex_2_img = $wo_2_ex_3_img = $wo_2_ex_4_img = $wo_2_ex_5_img = $wo_2_ex_6_img = '';
$wo_3_ex_1_img = $wo_3_ex_2_img = $wo_3_ex_3_img = $wo_3_ex_4_img = $wo_3_ex_5_img = $wo_3_ex_6_img = '';
$wo_4_ex_1_img = $wo_4_ex_2_img = $wo_4_ex_3_img = $wo_4_ex_4_img = $wo_4_ex_5_img = $wo_4_ex_6_img = '';


$wo_2_type = $wo_2_ex_1_name = $wo_2_ex_1_sets = $wo_2_ex_1_reps = $wo_2_ex_1_weight = $wo_2_ex_2_name = $wo_2_ex_2_sets = $wo_2_ex_2_reps = $wo_2_ex_2_weight =  "";
$wo_2_ex_3_name = $wo_2_ex_3_sets = $wo_2_ex_3_reps = $wo_2_ex_3_weight = $wo_2_ex_4_name = $wo_2_ex_4_sets = $wo_2_ex_4_reps = $wo_2_ex_4_weight = "";
$wo_2_ex_5_name = $wo_2_ex_5_sets = $wo_2_ex_5_reps = $wo_2_ex_5_weight = $wo_2_ex_6_name = $wo_2_ex_6_sets = $wo_2_ex_6_reps = $wo_2_ex_6_weight = "";


$wo_3_type = $wo_3_ex_1_name = $wo_3_ex_1_sets = $wo_3_ex_1_reps = $wo_3_ex_1_weight = $wo_3_ex_2_name = $wo_3_ex_2_sets = $wo_3_ex_2_reps = $wo_3_ex_2_weight =  "";
$wo_3_ex_3_name = $wo_3_ex_3_sets = $wo_3_ex_3_reps = $wo_3_ex_3_weight = $wo_3_ex_4_name = $wo_3_ex_4_sets = $wo_3_ex_4_reps = $wo_3_ex_4_weight = "";
$wo_3_ex_5_name = $wo_3_ex_5_sets = $wo_3_ex_5_reps = $wo_3_ex_5_weight = $wo_3_ex_6_name = $wo_3_ex_6_sets = $wo_3_ex_6_reps = $wo_3_ex_6_weight = "";

$wo_4_type = $wo_4_ex_1_name = $wo_4_ex_1_sets = $wo_4_ex_1_reps = $wo_4_ex_1_weight = $wo_4_ex_2_name = $wo_4_ex_2_sets = $wo_4_ex_2_reps = $wo_4_ex_2_weight =  "";
$wo_4_ex_3_name = $wo_4_ex_3_sets = $wo_4_ex_3_reps = $wo_4_ex_3_weight = $wo_4_ex_4_name = $wo_4_ex_4_sets = $wo_4_ex_4_reps = $wo_4_ex_4_weight = "";
$wo_4_ex_5_name = $wo_4_ex_5_sets = $wo_4_ex_5_reps = $wo_4_ex_5_weight = $wo_4_ex_6_name = $wo_4_ex_6_sets = $wo_4_ex_6_reps = $wo_4_ex_6_weight = "";


if ((empty($_POST["wo_1_ex_1_reps"])) && (empty($_POST["wo_1_ex_2_weight"]))) {
    $nameErr = "hi";
} else {

    $wo_1_type = $_POST["wo_1_type"];
    $wo_1_ex_1_name = $_POST["wo_1_ex_1_name"];
    $wo_1_ex_1_img = "imgs/" . $wo_1_ex_1_name . ".gif";
    $wo_1_ex_1_sets = $_POST["wo_1_ex_1_sets"];
    $wo_1_ex_1_reps = $_POST["wo_1_ex_1_reps"];
    $wo_1_ex_1_weight = $_POST["wo_1_ex_1_weight"];
    $wo_1_ex_2_name = $_POST["wo_1_ex_2_name"];
    $wo_1_ex_2_img = "imgs/" . $wo_1_ex_2_name . ".gif";
    $wo_1_ex_2_sets = $_POST["wo_1_ex_2_sets"];
    $wo_1_ex_2_reps = $_POST["wo_1_ex_2_reps"];
    $wo_1_ex_2_weight = $_POST["wo_1_ex_2_weight"];
    $wo_1_ex_3_name = $_POST["wo_1_ex_3_name"];
    $wo_1_ex_3_sets = $_POST["wo_1_ex_3_sets"];
    $wo_1_ex_3_img = "imgs/" . $wo_1_ex_3_name . ".gif";
    $wo_1_ex_3_reps = $_POST["wo_1_ex_3_reps"];
    $wo_1_ex_3_weight = $_POST["wo_1_ex_3_weight"];
    $wo_1_ex_4_name = $_POST["wo_1_ex_4_name"];
    $wo_1_ex_4_img = "imgs/" . $wo_1_ex_4_name . ".gif";
    $wo_1_ex_4_sets = $_POST["wo_1_ex_4_sets"];
    $wo_1_ex_4_reps = $_POST["wo_1_ex_4_reps"];
    $wo_1_ex_4_weight = $_POST["wo_1_ex_4_weight"];
    $wo_1_ex_5_name = $_POST["wo_1_ex_5_name"];
    $wo_1_ex_5_sets = $_POST["wo_1_ex_5_sets"];
    $wo_1_ex_5_img = "imgs/" . $wo_1_ex_5_name . ".gif";
    $wo_1_ex_5_reps = $_POST["wo_1_ex_5_reps"];
    $wo_1_ex_5_weight = $_POST["wo_1_ex_5_weight"];
    $wo_1_ex_6_name = $_POST["wo_1_ex_6_name"];
    $wo_1_ex_6_img = "imgs/" . $wo_1_ex_6_name . ".gif";
    $wo_1_ex_6_sets = $_POST["wo_1_ex_6_sets"];
    $wo_1_ex_6_reps = $_POST["wo_1_ex_6_reps"];
    $wo_1_ex_6_weight = $_POST["wo_1_ex_6_weight"];





    $wo_2_type = $_POST["wo_2_type"];
    $wo_2_ex_1_name = $_POST["wo_2_ex_1_name"];
    $wo_2_ex_1_img = "imgs/" . $wo_2_ex_1_name . ".gif";
    $wo_2_ex_1_sets = $_POST["wo_2_ex_1_sets"];
    $wo_2_ex_1_reps = $_POST["wo_2_ex_1_reps"];
    $wo_2_ex_1_weight = $_POST["wo_2_ex_1_weight"];
    $wo_2_ex_2_name = $_POST["wo_2_ex_2_name"];
    $wo_2_ex_2_img = "imgs/" . $wo_2_ex_2_name . ".gif";
    $wo_2_ex_2_sets = $_POST["wo_2_ex_2_sets"];
    $wo_2_ex_2_reps = $_POST["wo_2_ex_2_reps"];
    $wo_2_ex_2_weight = $_POST["wo_2_ex_2_weight"];
    $wo_2_ex_3_name = $_POST["wo_2_ex_3_name"];
    $wo_2_ex_3_sets = $_POST["wo_2_ex_3_sets"];
    $wo_2_ex_3_img = "imgs/" . $wo_2_ex_3_name . ".gif";
    $wo_2_ex_3_reps = $_POST["wo_2_ex_3_reps"];
    $wo_2_ex_3_weight = $_POST["wo_2_ex_3_weight"];
    $wo_2_ex_4_name = $_POST["wo_2_ex_4_name"];
    $wo_2_ex_4_img = "imgs/" . $wo_2_ex_4_name . ".gif";
    $wo_2_ex_4_sets = $_POST["wo_2_ex_4_sets"];
    $wo_2_ex_4_reps = $_POST["wo_2_ex_4_reps"];
    $wo_2_ex_4_weight = $_POST["wo_2_ex_4_weight"];
    $wo_2_ex_5_name = $_POST["wo_2_ex_5_name"];
    $wo_2_ex_5_img = "imgs/" . $wo_2_ex_5_name . ".gif";
    $wo_2_ex_5_sets = $_POST["wo_2_ex_5_sets"];
    $wo_2_ex_5_reps = $_POST["wo_2_ex_5_reps"];
    $wo_2_ex_5_weight = $_POST["wo_2_ex_5_weight"];
    $wo_2_ex_6_name = $_POST["wo_2_ex_6_name"];
    $wo_2_ex_6_img = "imgs/" . $wo_2_ex_6_name . ".gif";
    $wo_2_ex_6_sets = $_POST["wo_2_ex_6_sets"];
    $wo_2_ex_6_reps = $_POST["wo_2_ex_6_reps"];
    $wo_2_ex_6_weight = $_POST["wo_2_ex_6_weight"];






    $wo_3_type = $_POST["wo_3_type"];
    $wo_3_ex_1_name = $_POST["wo_3_ex_1_name"];
    $wo_3_ex_1_img = "imgs/" . $wo_3_ex_1_name . ".gif";
    $wo_3_ex_1_sets = $_POST["wo_3_ex_1_sets"];
    $wo_3_ex_1_reps = $_POST["wo_3_ex_1_reps"];
    $wo_3_ex_1_weight = $_POST["wo_3_ex_1_weight"];
    $wo_3_ex_2_name = $_POST["wo_3_ex_2_name"];
    $wo_3_ex_2_img = "imgs/" . $wo_3_ex_2_name . ".gif";
    $wo_3_ex_2_sets = $_POST["wo_3_ex_2_sets"];
    $wo_3_ex_2_reps = $_POST["wo_3_ex_2_reps"];
    $wo_3_ex_2_weight = $_POST["wo_3_ex_2_weight"];
    $wo_3_ex_3_name = $_POST["wo_3_ex_3_name"];
    $wo_3_ex_3_img = "imgs/" . $wo_3_ex_3_name . ".gif";
    $wo_3_ex_3_sets = $_POST["wo_3_ex_3_sets"];
    $wo_3_ex_3_reps = $_POST["wo_3_ex_3_reps"];
    $wo_3_ex_3_weight = $_POST["wo_3_ex_3_weight"];
    $wo_3_ex_4_name = $_POST["wo_3_ex_4_name"];
    $wo_3_ex_4_img = "imgs/" . $wo_3_ex_4_name . ".gif";
    $wo_3_ex_4_sets = $_POST["wo_3_ex_4_sets"];
    $wo_3_ex_4_reps = $_POST["wo_3_ex_4_reps"];
    $wo_3_ex_4_weight = $_POST["wo_3_ex_4_weight"];
    $wo_3_ex_5_name = $_POST["wo_3_ex_5_name"];
    $wo_3_ex_5_img = "imgs/" . $wo_3_ex_5_name . ".gif";
    $wo_3_ex_5_sets = $_POST["wo_3_ex_5_sets"];
    $wo_3_ex_5_reps = $_POST["wo_3_ex_5_reps"];
    $wo_3_ex_5_weight = $_POST["wo_3_ex_5_weight"];
    $wo_3_ex_6_name = $_POST["wo_3_ex_6_name"];
    $wo_3_ex_6_img = "imgs/" . $wo_3_ex_6_name . ".gif";
    $wo_3_ex_6_sets = $_POST["wo_3_ex_6_sets"];
    $wo_3_ex_6_reps = $_POST["wo_3_ex_6_reps"];
    $wo_3_ex_6_weight = $_POST["wo_3_ex_6_weight"];






    $wo_4_type = $_POST["wo_4_type"];
    $wo_4_ex_1_name = $_POST["wo_4_ex_1_name"];
    $wo_4_ex_1_img = "imgs/" . $wo_4_ex_1_name . ".gif";
    $wo_4_ex_1_sets = $_POST["wo_4_ex_1_sets"];
    $wo_4_ex_1_reps = $_POST["wo_4_ex_1_reps"];
    $wo_4_ex_1_weight = $_POST["wo_4_ex_1_weight"];
    $wo_4_ex_2_name = $_POST["wo_4_ex_2_name"];
    $wo_4_ex_2_img = "imgs/" . $wo_4_ex_2_name . ".gif";
    $wo_4_ex_2_sets = $_POST["wo_4_ex_2_sets"];
    $wo_4_ex_2_reps = $_POST["wo_4_ex_2_reps"];
    $wo_4_ex_2_weight = $_POST["wo_4_ex_2_weight"];
    $wo_4_ex_3_name = $_POST["wo_4_ex_3_name"];
    $wo_4_ex_3_img = "imgs/" . $wo_4_ex_3_name . ".gif";
    $wo_4_ex_3_sets = $_POST["wo_4_ex_3_sets"];
    $wo_4_ex_3_reps = $_POST["wo_4_ex_3_reps"];
    $wo_4_ex_3_weight = $_POST["wo_4_ex_3_weight"];
    $wo_4_ex_4_name = $_POST["wo_4_ex_4_name"];
    $wo_4_ex_4_sets = $_POST["wo_4_ex_4_sets"];
    $wo_4_ex_4_img = "imgs/" . $wo_4_ex_4_name . ".gif";
    $wo_4_ex_4_reps = $_POST["wo_4_ex_4_reps"];
    $wo_4_ex_4_weight = $_POST["wo_4_ex_4_weight"];
    $wo_4_ex_5_name = $_POST["wo_4_ex_5_name"];
    $wo_4_ex_5_sets = $_POST["wo_4_ex_5_sets"];
    $wo_4_ex_5_img = "imgs/" . $wo_4_ex_5_name . ".gif";
    $wo_4_ex_5_reps = $_POST["wo_4_ex_5_reps"];
    $wo_4_ex_5_weight = $_POST["wo_4_ex_5_weight"];
    $wo_4_ex_6_name = $_POST["wo_4_ex_6_name"];
    $wo_4_ex_6_img = "imgs/" . $wo_4_ex_6_name . ".gif";
    $wo_4_ex_6_sets = $_POST["wo_4_ex_6_sets"];
    $wo_4_ex_6_reps = $_POST["wo_4_ex_6_reps"];
    $wo_4_ex_6_weight = $_POST["wo_4_ex_6_weight"];


    $email = $_SESSION['email'];

    $query = "SELECT id FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $userId = $row['id'];

   




    $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$curwo_plan_id} AND numb = 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $wo_id = $row['id'];
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_1_name', nr_sets = '$wo_1_ex_1_sets', nr_reps = '$wo_1_ex_1_reps', weight_used = '$wo_1_ex_1_weight', img = '$wo_1_ex_1_img' WHERE workout_id = $wo_id AND numb = 1";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_2_name', nr_sets = '$wo_1_ex_2_sets', nr_reps = '$wo_1_ex_2_reps', weight_used = '$wo_1_ex_2_weight', img = '$wo_1_ex_2_img' WHERE workout_id = $wo_id AND numb = 2";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_3_name', nr_sets = '$wo_1_ex_3_sets', nr_reps = '$wo_1_ex_3_reps', weight_used = '$wo_1_ex_3_weight', img = '$wo_1_ex_3_img' WHERE workout_id = $wo_id AND numb = 3";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_4_name', nr_sets = '$wo_1_ex_4_sets', nr_reps = '$wo_1_ex_4_reps', weight_used = '$wo_1_ex_4_weight', img = '$wo_1_ex_4_img' WHERE workout_id = $wo_id AND numb = 4";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_5_name', nr_sets = '$wo_1_ex_5_sets', nr_reps = '$wo_1_ex_5_reps', weight_used = '$wo_1_ex_5_weight', img = '$wo_1_ex_5_img' WHERE workout_id = $wo_id AND numb = 5";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_1_ex_6_name', nr_sets = '$wo_1_ex_6_sets', nr_reps = '$wo_1_ex_6_reps', weight_used = '$wo_1_ex_6_weight', img = '$wo_1_ex_6_img' WHERE workout_id = $wo_id AND numb = 6";
    mysqli_query($db, $sql);
    
    $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$curwo_plan_id} AND numb = 2";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $wo_id = $row['id'];
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_1_name', nr_sets = '$wo_2_ex_1_sets', nr_reps = '$wo_2_ex_1_reps', weight_used = '$wo_2_ex_1_weight', img = '$wo_2_ex_1_img' WHERE workout_id = $wo_id AND numb = 1";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_2_name', nr_sets = '$wo_2_ex_2_sets', nr_reps = '$wo_2_ex_2_reps', weight_used = '$wo_2_ex_2_weight', img = '$wo_2_ex_2_img' WHERE workout_id = $wo_id AND numb = 2";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_3_name', nr_sets = '$wo_2_ex_3_sets', nr_reps = '$wo_2_ex_3_reps', weight_used = '$wo_2_ex_3_weight', img = '$wo_2_ex_3_img' WHERE workout_id = $wo_id AND numb = 3";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_4_name', nr_sets = '$wo_2_ex_4_sets', nr_reps = '$wo_2_ex_4_reps', weight_used = '$wo_2_ex_4_weight', img = '$wo_2_ex_4_img' WHERE workout_id = $wo_id AND numb = 4";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_5_name', nr_sets = '$wo_2_ex_5_sets', nr_reps = '$wo_2_ex_5_reps', weight_used = '$wo_2_ex_5_weight', img = '$wo_2_ex_5_img' WHERE workout_id = $wo_id AND numb = 5";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_2_ex_6_name', nr_sets = '$wo_2_ex_6_sets', nr_reps = '$wo_2_ex_6_reps', weight_used = '$wo_2_ex_6_weight', img = '$wo_2_ex_6_img' WHERE workout_id = $wo_id AND numb = 6";
    mysqli_query($db, $sql);
    
    $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$curwo_plan_id} AND numb = 3";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $wo_id = $row['id'];
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_1_name', nr_sets = '$wo_3_ex_1_sets', nr_reps = '$wo_3_ex_1_reps', weight_used = '$wo_3_ex_1_weight', img = '$wo_3_ex_1_img' WHERE workout_id = $wo_id AND numb = 1";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_2_name', nr_sets = '$wo_3_ex_2_sets', nr_reps = '$wo_3_ex_2_reps', weight_used = '$wo_3_ex_2_weight', img = '$wo_3_ex_2_img' WHERE workout_id = $wo_id AND numb = 2";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_3_name', nr_sets = '$wo_3_ex_3_sets', nr_reps = '$wo_3_ex_3_reps', weight_used = '$wo_3_ex_3_weight', img = '$wo_3_ex_3_img' WHERE workout_id = $wo_id AND numb = 3";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_4_name', nr_sets = '$wo_3_ex_4_sets', nr_reps = '$wo_3_ex_4_reps', weight_used = '$wo_3_ex_4_weight', img = '$wo_3_ex_4_img' WHERE workout_id = $wo_id AND numb = 4";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_5_name', nr_sets = '$wo_3_ex_5_sets', nr_reps = '$wo_3_ex_5_reps', weight_used = '$wo_3_ex_5_weight', img = '$wo_3_ex_5_img' WHERE workout_id = $wo_id AND numb = 5";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_3_ex_6_name', nr_sets = '$wo_3_ex_6_sets', nr_reps = '$wo_3_ex_6_reps', weight_used = '$wo_3_ex_6_weight', img = '$wo_3_ex_6_img' WHERE workout_id = $wo_id AND numb = 6";
    mysqli_query($db, $sql);
    

    $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$curwo_plan_id} AND numb = 4";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $wo_id = $row['id'];
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_1_name', nr_sets = '$wo_4_ex_1_sets', nr_reps = '$wo_4_ex_1_reps', weight_used = '$wo_4_ex_1_weight', img = '$wo_4_ex_1_img' WHERE workout_id = $wo_id AND numb = 1";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_2_name', nr_sets = '$wo_4_ex_2_sets', nr_reps = '$wo_4_ex_2_reps', weight_used = '$wo_4_ex_2_weight', img = '$wo_4_ex_2_img' WHERE workout_id = $wo_id AND numb = 2";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_3_name', nr_sets = '$wo_4_ex_3_sets', nr_reps = '$wo_4_ex_3_reps', weight_used = '$wo_4_ex_3_weight', img = '$wo_4_ex_3_img' WHERE workout_id = $wo_id AND numb = 3";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_4_name', nr_sets = '$wo_4_ex_4_sets', nr_reps = '$wo_4_ex_4_reps', weight_used = '$wo_4_ex_4_weight', img = '$wo_4_ex_4_img' WHERE workout_id = $wo_id AND numb = 4";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_5_name', nr_sets = '$wo_4_ex_5_sets', nr_reps = '$wo_4_ex_5_reps', weight_used = '$wo_4_ex_5_weight', img = '$wo_4_ex_5_img' WHERE workout_id = $wo_id AND numb = 5";
    mysqli_query($db, $sql);
    
    $sql = "UPDATE exercise SET nume = '$wo_4_ex_6_name', nr_sets = '$wo_4_ex_6_sets', nr_reps = '$wo_4_ex_6_reps', weight_used = '$wo_4_ex_6_weight', img = '$wo_4_ex_6_img' WHERE workout_id = $wo_id AND numb = 6";
    mysqli_query($db, $sql);
    

    $results = mysqli_query($db, $sql);

    if (!$results)
        die('Invalid querry:' . mysqli_error($db));
    else {
        echo "Inregistrarea a fost adaugata.</br>";
        echo '<script>window.location.href = "your_account_user.php";</script>';
        exit;
    }
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

    <div id="exerciseInfo">
        <p>lksdfa</p>
    </div>

    <div id="exerciseData">
        <p>NO</p>
    </div>

    <div id="wo_type">
        <p>NO</p>
    </div>


    <form name="adaugare" id="adaugare" method="POST" action="" style="max-width:none; width:100%;">
        <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-12 large-2">
                    <p style="margin-top: 60px">WORKOUT #1</p>
                    <label style="width: 70%;margin: 0 auto;">
                        <select class="workout_types" id="1" name="wo_1_type">
                            <option value="FullBody">Full Body</option>
                            <option value="UpperBody">Upper Body</option>
                            <option value="LowerBody">Lower Body</option>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg1" src="<?php echo $curwo_1_ex_1_img ?>"></a>
                        <input type="text" name="wo_1_ex_1_name" value="<?php echo $curwo_1_ex_1_name ?>" class="exercise-name" id="nume_ex1" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="1" value="<?php echo $curwo_1_ex_1_sets ?>" type="text" name="wo_1_ex_1_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="1" value="<?php echo $curwo_1_ex_1_reps ?>" type="text" name="wo_1_ex_1_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_1_weight ?>" type="text" name="wo_1_ex_1_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg2" src="<?php echo $curwo_1_ex_2_img ?>"></a>
                        <input type="text" name="wo_1_ex_2_name" value="<?php echo $curwo_1_ex_2_name ?>" class="exercise-name" id="nume_ex2" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="2" value="<?php echo $curwo_1_ex_2_sets ?>" type="text" name="wo_1_ex_2_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="2" value="<?php echo $curwo_1_ex_2_reps ?>" type="text" name="wo_1_ex_2_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_2_weight ?>" type="text" name="wo_1_ex_2_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg3" src="<?php echo $curwo_1_ex_3_img ?>"></a>
                        <input type="text" name="wo_1_ex_3_name" value="<?php echo $curwo_1_ex_3_name ?>" class="exercise-name" id="nume_ex3" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="3" value="<?php echo $curwo_1_ex_3_sets ?>" type="text" name="wo_1_ex_3_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="3" value="<?php echo $curwo_1_ex_3_reps ?>" type="text" name="wo_1_ex_3_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_3_weight ?>" type="text" name="wo_1_ex_3_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg4" src="<?php echo $curwo_1_ex_4_img ?>"></a>
                        <input type="text" name="wo_1_ex_4_name" value="<?php echo $curwo_1_ex_4_name ?>" class="exercise-name" id="nume_ex4" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="4" value="<?php echo $curwo_1_ex_4_sets ?>" type="text" name="wo_1_ex_4_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="4" value="<?php echo $curwo_1_ex_4_reps ?>" type="text" name="wo_1_ex_4_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_4_weight ?>" type="text" name="wo_1_ex_4_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg5" src="<?php echo $curwo_1_ex_5_img ?>"></a>
                        <input type="text" name="wo_1_ex_5_name" value="<?php echo $curwo_1_ex_5_name ?>" class="exercise-name" id="nume_ex5" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="5" value="<?php echo $curwo_1_ex_5_sets ?>" type="text" name="wo_1_ex_5_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="5" value="<?php echo $curwo_1_ex_5_reps ?>" type="text" name="wo_1_ex_5_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_5_weight ?>" type="text" name="wo_1_ex_5_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg6" src="<?php echo $curwo_1_ex_6_img ?>"></a>
                        <input type="text" name="wo_1_ex_6_name" value="<?php echo $curwo_1_ex_6_name ?>" class="exercise-name" id="nume_ex6" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="6" value="<?php echo $curwo_1_ex_6_sets ?>" type="text" name="wo_1_ex_6_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="6" value="<?php echo $curwo_1_ex_6_reps ?>" type="text" name="wo_1_ex_6_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_1_ex_6_weight ?>" type="text" name="wo_1_ex_6_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;"></div>







                <div class="cell small-12 medium-12 large-2">
                    <p style="margin-top: 60px">WORKOUT #2</p>
                    <label style="width: 70%;margin: 0 auto;">
                        <select class="workout_types" id="2" name="wo_2_type">
                            <option value="FullBody">Full Body</option>
                            <option value="UpperBody">Upper Body</option>
                            <option value="LowerBody">Lower Body</option>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg1" src="<?php echo $curwo_2_ex_1_img ?>"></a>
                        <input type="text" name="wo_2_ex_1_name" value="<?php echo $curwo_2_ex_1_name ?>" class="exercise-name" id="nume_ex1" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="1" value="<?php echo $curwo_2_ex_1_sets ?>" type="text" name="wo_2_ex_1_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="1" value="<?php echo $curwo_2_ex_1_reps ?>" type="text" name="wo_2_ex_1_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_1_weight ?>" type="text" name="wo_2_ex_1_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg2" src="<?php echo $curwo_2_ex_2_img ?>"></a>
                        <input type="text" name="wo_2_ex_2_name" value="<?php echo $curwo_2_ex_2_name ?>" class="exercise-name" id="nume_ex2" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="2" value="<?php echo $curwo_2_ex_2_sets ?>" type="text" name="wo_2_ex_2_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="2" value="<?php echo $curwo_2_ex_2_reps ?>" type="text" name="wo_2_ex_2_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_2_weight ?>" type="text" name="wo_2_ex_2_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg3" src="<?php echo $curwo_2_ex_3_img ?>"></a>
                        <input type="text" name="wo_2_ex_3_name" value="<?php echo $curwo_2_ex_3_name ?>" class="exercise-name" id="nume_ex3" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="3" value="<?php echo $curwo_2_ex_3_sets ?>" type="text" name="wo_2_ex_3_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="3" value="<?php echo $curwo_2_ex_3_reps ?>" type="text" name="wo_2_ex_3_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_3_weight ?>" type="text" name="wo_2_ex_3_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg4" src="<?php echo $curwo_2_ex_4_img ?>"></a>
                        <input type="text" name="wo_2_ex_4_name" value="<?php echo $curwo_2_ex_4_name ?>" class="exercise-name" id="nume_ex4" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="4" value="<?php echo $curwo_2_ex_4_sets ?>" type="text" name="wo_2_ex_4_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="4" value="<?php echo $curwo_2_ex_4_reps ?>" type="text" name="wo_2_ex_4_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_4_weight ?>" type="text" name="wo_2_ex_4_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg5" src="<?php echo $curwo_2_ex_5_img ?>"></a>
                        <input type="text" name="wo_2_ex_5_name" value="<?php echo $curwo_2_ex_5_name ?>" class="exercise-name" id="nume_ex5" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="5" value="<?php echo $curwo_2_ex_5_sets ?>" type="text" name="wo_2_ex_5_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="5" value="<?php echo $curwo_2_ex_5_reps ?>" type="text" name="wo_2_ex_5_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_5_weight ?>" type="text" name="wo_2_ex_5_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg6" src="<?php echo $curwo_2_ex_6_img ?>"></a>
                        <input type="text" name="wo_2_ex_6_name" value="<?php echo $curwo_2_ex_6_name ?>" class="exercise-name" id="nume_ex6" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="6" value="<?php echo $curwo_2_ex_6_sets ?>" type="text" name="wo_2_ex_6_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="6" value="<?php echo $curwo_2_ex_6_reps ?>" type="text" name="wo_2_ex_6_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_2_ex_6_weight ?>" type="text" name="wo_2_ex_6_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                </div>





                <div class="cell small-12 medium-12 large-2">
                    <p style="margin-top: 60px">WORKOUT #3</p>
                    <label style="width: 70%;margin: 0 auto;">
                        <select class="workout_types" id="3" name="wo_3_type">
                            <option value="FullBody">Full Body</option>
                            <option value="UpperBody">Upper Body</option>
                            <option value="LowerBody">Lower Body</option>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg1" src="<?php echo $curwo_3_ex_1_img ?>"></a>
                        <input type="text" name="wo_3_ex_1_name" value="<?php echo $curwo_3_ex_1_name ?>" class="exercise-name" id="nume_ex1" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="1" value="<?php echo $curwo_3_ex_1_sets ?>" type="text" name="wo_3_ex_1_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="1" value="<?php echo $curwo_3_ex_1_reps ?>" type="text" name="wo_3_ex_1_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_1_weight ?>" type="text" name="wo_3_ex_1_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg2" src="<?php echo $curwo_3_ex_2_img ?>"></a>
                        <input type="text" name="wo_3_ex_2_name" value="<?php echo $curwo_3_ex_2_name ?>" class="exercise-name" id="nume_ex2" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="2" value="<?php echo $curwo_3_ex_2_sets ?>" type="text" name="wo_3_ex_2_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="2" value="<?php echo $curwo_3_ex_2_reps ?>" type="text" name="wo_3_ex_2_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_2_weight ?>" type="text" name="wo_3_ex_2_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg3" src="<?php echo $curwo_3_ex_3_img ?>"></a>
                        <input type="text" name="wo_3_ex_3_name" value="<?php echo $curwo_3_ex_3_name ?>" class="exercise-name" id="nume_ex3" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="3" value="<?php echo $curwo_3_ex_3_sets ?>" type="text" name="wo_3_ex_3_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="3" value="<?php echo $curwo_3_ex_3_reps ?>" type="text" name="wo_3_ex_3_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_3_weight ?>" type="text" name="wo_3_ex_3_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg4" src="<?php echo $curwo_3_ex_4_img ?>"></a>
                        <input type="text" name="wo_3_ex_4_name" value="<?php echo $curwo_3_ex_4_name ?>" class="exercise-name" id="nume_ex4" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="4" value="<?php echo $curwo_3_ex_4_sets ?>" type="text" name="wo_3_ex_4_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="4" value="<?php echo $curwo_3_ex_4_reps ?>" type="text" name="wo_3_ex_4_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_4_weight ?>" type="text" name="wo_3_ex_4_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg5" src="<?php echo $curwo_3_ex_5_img ?>"></a>
                        <input type="text" name="wo_3_ex_5_name" value="<?php echo $curwo_3_ex_5_name ?>" class="exercise-name" id="nume_ex5" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="5" value="<?php echo $curwo_3_ex_5_sets ?>" type="text" name="wo_3_ex_5_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="5" value="<?php echo $curwo_3_ex_5_reps ?>" type="text" name="wo_3_ex_5_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_5_weight ?>" type="text" name="wo_3_ex_5_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg6" src="<?php echo $curwo_3_ex_6_img ?>"></a>
                        <input type="text" name="wo_3_ex_6_name" value="<?php echo $curwo_3_ex_6_name ?>" class="exercise-name" id="nume_ex6" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="6" value="<?php echo $curwo_3_ex_6_sets ?>" type="text" name="wo_3_ex_6_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="6" value="<?php echo $curwo_3_ex_6_reps ?>" type="text" name="wo_3_ex_6_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_3_ex_6_weight ?>" type="text" name="wo_3_ex_6_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                </div>










                <div class="cell small-12 medium-12 large-2">
                    <p style="margin-top: 60px">WORKOUT #4</p>
                    <label style="width: 70%;margin: 0 auto;">
                        <select class="workout_types" id="4" name="wo_4_type">
                            <option value="FullBody">Full Body</option>
                            <option value="UpperBody">Upper Body</option>
                            <option value="LowerBody">Lower Body</option>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg1" src="<?php echo $curwo_4_ex_1_img ?>"></a>
                        <input type="text" name="wo_4_ex_1_name" value="<?php echo $curwo_4_ex_1_name ?>" class="exercise-name" id="nume_ex1" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="1" value="<?php echo $curwo_4_ex_1_sets ?>" type="text" name="wo_4_ex_1_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="1" value="<?php echo $curwo_4_ex_1_reps ?>" type="text" name="wo_4_ex_1_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_1_weight ?>" type="text" name="wo_4_ex_1_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg2" src="<?php echo $curwo_4_ex_2_img ?>"></a>
                        <input type="text" name="wo_4_ex_2_name" value="<?php echo $curwo_4_ex_2_name ?>" class="exercise-name" id="nume_ex2" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="2" value="<?php echo $curwo_4_ex_2_sets ?>" type="text" name="wo_4_ex_2_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="2" value="<?php echo $curwo_4_ex_2_reps ?>" type="text" name="wo_4_ex_2_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_2_weight ?>" type="text" name="wo_4_ex_2_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg3" src="<?php echo $curwo_4_ex_3_img ?>"></a>
                        <input type="text" name="wo_4_ex_3_name" value="<?php echo $curwo_4_ex_3_name ?>" class="exercise-name" id="nume_ex3" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="3" value="<?php echo $curwo_4_ex_3_sets ?>" type="text" name="wo_4_ex_3_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="3" value="<?php echo $curwo_4_ex_3_reps ?>" type="text" name="wo_4_ex_3_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_3_weight ?>" type="text" name="wo_4_ex_3_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                    <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                        <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg4" src="<?php echo $curwo_4_ex_4_img ?>"></a>
                        <input type="text" name="wo_4_ex_4_name" value="<?php echo $curwo_4_ex_4_name ?>" class="exercise-name" id="nume_ex4" readonly>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputSets" id="4" value="<?php echo $curwo_4_ex_4_sets ?>" type="text" name="wo_4_ex_4_sets" required="" style="text-align: center;">
                                <label>Sets</label>
                            </div>
                            <div style="width: 20%; margin: 0; padding: 0;">
                                <p style="padding-top: 10px;">X</p>
                            </div>
                            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                <input class="inputReps" id="4" value="<?php echo $curwo_4_ex_4_reps ?>" type="text" name="wo_4_ex_4_reps" required="" style="text-align: center;">
                                <label>Reps</label>
                            </div>
                        </div>
                        <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_4_weight ?>" type="text" name="wo_4_ex_4_weight" required="" style="padding: 0;">
                                <label>Weight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cell small-12 medium-12 large-3" style="display: flex;">
                <div style="width: 50%; padding: 20px; padding-bottom: 0;">
    <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg5" src="<?php echo $curwo_4_ex_5_img ?>"></a>
    <input type="text" name="wo_4_ex_5_name" value="<?php echo $curwo_4_ex_5_name ?>" class="exercise-name" id="nume_ex5" readonly>
    <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
        <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
            <input class="inputSets" id="5" value="<?php echo $curwo_4_ex_5_sets ?>" type="text" name="wo_4_ex_5_sets" required="" style="text-align: center;">
            <label>Sets</label>
        </div>
        <div style="width: 20%; margin: 0; padding: 0;">
            <p style="padding-top: 10px;">X</p>
        </div>
        <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
            <input class="inputReps" id="5" value="<?php echo $curwo_4_ex_5_reps ?>" type="text" name="wo_4_ex_5_reps" required="" style="text-align: center;">
            <label>Reps</label>
        </div>
    </div>
    <div class="login-box" style="display: flex; margin: 0; padding: 0;">
        <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
            <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_5_weight ?>" type="text" name="wo_4_ex_5_weight" required="" style="padding: 0;">
            <label>Weight</label>
        </div>
    </div>
</div>

<div style="width: 50%; padding: 20px; padding-bottom: 0;">
    <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg6" src="<?php echo $curwo_4_ex_6_img ?>"></a>
    <input type="text" name="wo_4_ex_6_name" value="<?php echo $curwo_4_ex_6_name ?>" class="exercise-name" id="nume_ex6" readonly>
    <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
        <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
            <input class="inputSets" id="6" value="<?php echo $curwo_4_ex_6_sets ?>" type="text" name="wo_4_ex_6_sets" required="" style="text-align: center;">
            <label>Sets</label>
        </div>
        <div style="width: 20%; margin: 0; padding: 0;">
            <p style="padding-top: 10px;">X</p>
        </div>
        <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
            <input class="inputReps" id="6" value="<?php echo $curwo_4_ex_6_reps ?>" type="text" name="wo_4_ex_6_reps" required="" style="text-align: center;">
            <label>Reps</label>
        </div>
    </div>
    <div class="login-box" style="display: flex; margin: 0; padding: 0;">
        <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
            <input class="inputWeight" id="" value="<?php echo $curwo_4_ex_6_weight ?>" type="text" name="wo_4_ex_6_weight" required="" style="padding: 0;">
            <label>Weight</label>
        </div>
    </div>
</div>

                </div>
                <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                </div>



                <div class="cell small-12 medium-12 large-12">
                    <div style="display: flex; justify-content: center; padding: 40px">
                        <button type="submit" class="btn" name="submit">Submit</button>
                    </div>
                </div>




            </div>
        </div>
    </form>



    <script>
        /*
     var exercises1 = JSON.parse(localStorage.getItem('exercises1')) || [];
     var exercise_data = JSON.parse(localStorage.getItem('exercise_data')) || [];
     var workout_types = JSON.parse(localStorage.getItem('workout_types')) || [];




     var wo_types = document.querySelectorAll(".workout_types");
     wo_types.forEach(function(type) {
         type.addEventListener('change', function() {

             var value = this.value;
             var nr = this.getAttribute('id');

             if (!workout_types[nr]) {
                 workout_types[nr] = {};
             }

             workout_types[nr].type = value;
             workout_types[nr].id = nr;

             localStorage.setItem('workout_types', JSON.stringify(workout_types));

             var workout_types_string = JSON.stringify(workout_types);


             upate_wo_type_div();



         })
     })


     var input_sets = document.querySelectorAll(".inputSets");
     input_sets.forEach(function(sets) {
         sets.addEventListener('input', function() {




             var value = this.value;
             var nr = this.getAttribute('id');

             if (!exercise_data[nr]) {
                 exercise_data[nr] = {};
             }

             exercise_data[nr].sets = value;
             exercise_data[nr].id = nr;

             localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

             var exerciseDataString = JSON.stringify(exercise_data);


             updateExerciseDataDiv();



         })
     })


     var input_reps = document.querySelectorAll(".inputReps");
     input_reps.forEach(function(reps) {
         reps.addEventListener('input', function() {

             //alert('Reps!');

             var value = this.value;
             var nr = this.getAttribute('id');

             if (!exercise_data[nr]) {
                 exercise_data[nr] = {};
             }

             exercise_data[nr].reps = value;
             exercise_data[nr].id = nr;


             localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

             updateExerciseDataDiv();


         })
     })


     var input_weight = document.querySelectorAll(".inputWeight");
     input_weight.forEach(function(weight) {
         weight.addEventListener('input', function() {

             //alert('Weight!');

             var value = this.value;
             var nr = this.getAttribute('id');

             if (!exercise_data[nr]) {
                 exercise_data[nr] = {};
             }

             exercise_data[nr].weight = value;
             exercise_data[nr].id = nr;


             localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

             updateExerciseDataDiv();

         })
     })


     var clickableImages = document.querySelectorAll('.clickable-image');
     clickableImages.forEach(function(image) {
         image.addEventListener('click', function() {
             //alert('poza!');

             var exerciseId = this.id; // Get the ID of the clicked image
             localStorage.setItem('exerciseId', exerciseId); // Save the ID in local storage
         });
     });


     var exerciseName = localStorage.getItem('exerciseName');
     var exerciseImage = localStorage.getItem('exerciseImage');
     var exerciseId = localStorage.getItem('exerciseId');


     var exercise = {
         id: exerciseId,
         gif: exerciseImage,
         name: exerciseName,
     };

     updateExerciseInArray(exercise);

     updateExerciseInfoDiv();

     localStorage.setItem('exercises1', JSON.stringify(exercises1));


     function updateExerciseInArray(newExercise) {
         var existingExerciseIndex = -1;

         // Find the index of the existing exercise with the same ID
         for (var i = 0; i < exercises1.length; i++) {
             if (exercises1[i].id === newExercise.id) {
                 existingExerciseIndex = i;
                 break;
             }
         }

         if (existingExerciseIndex !== -1) {
             // Replace the existing exercise with the new exercise
             exercises1[existingExerciseIndex] = newExercise;
         } else {
             // Add the new exercise to the array
             exercises1.push(newExercise);
         }


     }

     function updateExerciseInfoDiv() {
         var exerciseInfoDiv = document.getElementById('exerciseInfo');
         exerciseInfoDiv.textContent = '';

         for (var i = 0; i < exercises1.length; i++) {
             var exercise = exercises1[i];
             var exerciseId = exercise.id;
             var exerciseImage = exercise.gif;
             var exerciseName = exercise.name;

             var existingEntryIndex = -1;
             for (var j = 0; j < exerciseInfoDiv.children.length; j++) {
                 if (exerciseInfoDiv.children[j].dataset.exerciseId === exerciseId) {
                     existingEntryIndex = j;
                     break;
                 }
             }

             var no = exerciseId.replace('exerciseImg', '');
             if (existingEntryIndex !== -1) {
                 var existingEntry = exerciseInfoDiv.children[existingEntryIndex];
                 existingEntry.textContent = 'Exercise ' + no + ':\n' +
                     'ID: ' + exerciseId + '\n' +
                     'GIF: ' + exerciseImage + '\n' +
                     'Name: ' + exerciseName + '\n\n';
                 existingEntry.dataset.exerciseId = exerciseId;
             } else {
                 var exerciseEntry = document.createElement('div');
                 exerciseEntry.textContent = 'Exercise ' + no + ':\n' +
                     'ID: ' + exerciseId + '\n' +
                     'GIF: ' + exerciseImage + '\n' +
                     'Name: ' + exerciseName + '\n\n';
                 exerciseEntry.dataset.exerciseId = exerciseId;
                 exerciseInfoDiv.appendChild(exerciseEntry);
             }

             var exerciseChangeImg = document.getElementById(exerciseId);
             exerciseChangeImg.setAttribute('src', exerciseImage);
         }

         var exerciseNameElements = document.getElementsByClassName('exercise-name');
         for (var i = 0; i < exercises1.length; i++) {
             var name = exercises1[i].name;
             var id = exercises1[i].id;
             var gif = exercises1[i].gif;

             var savedem = id.replace('exerciseImg', '');

             console.log(name, id, gif, savedem);
             exerciseNameElements[savedem - 1].value = name;
         }

     }




     function updateExerciseDataDiv() {

         var ExerciseDataDiv = document.getElementById('exerciseData');

         var exercise_data = localStorage.getItem('exercise_data') || '';

         var exerciseDataString = JSON.stringify(exercise_data);

         ExerciseDataDiv.textContent = exerciseDataString;



     }





     updateExerciseDataDiv();

     upate_wo_type_div();

     function upate_wo_type_div() {


         var wo_type_div = document.getElementById('wo_type');

         var workout_types = localStorage.getItem('workout_types') || '';

         var wo_string = JSON.stringify(workout_types);

         wo_type_div.textContent = wo_string;


     }

     document.addEventListener('DOMContentLoaded', function() {


         var exercise_data = JSON.parse(localStorage.getItem('exercise_data')) || [];

         for (var i = 1; i < 25; i++) {

             var ex = JSON.stringify(exercise_data[i]);

             var ia = exercise_data[i];
             if (ia) {
                 var sets = exercise_data[i].sets;
                 var adauga_sets = document.querySelector('.inputSets[id="' + i + '"]');

                 if (sets !== undefined && sets !== '') {
                     adauga_sets.value = sets;
                 } else {
                     continue;
                 }


                 var reps = exercise_data[i].reps;
                 var adauga_reps = document.querySelector('.inputReps[id="' + i + '"]');

                 if (reps !== undefined && reps !== '') {
                     adauga_reps.value = reps;
                 } else {
                     continue;
                 }



                 var weight = exercise_data[i].weight;
                 var adauga_weight = document.querySelector('.inputWeight[id="' + i + '"]');

                 if (weight !== undefined && weight !== '') {
                     adauga_weight.value = weight;
                 } else {
                     continue;
                 }

             } else {
                 continue;
             }




         }

     });

     */
    </script>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>