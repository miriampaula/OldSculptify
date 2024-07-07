<?php
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db,"fitflow2");



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
    header("Location: login.php");
    exit;
}


$age =  $weightt = $height = $goal = $waist = $hip = $neck = $quad = "";


if ((empty($_POST["age"])) && (empty($_POST["weightt"])) && (empty($_POST["height"]))) {
  $nameErr = "hi";
}
  else {
    $age = $_POST["age"];
    $weightt = $_POST["weightt"];
    $goal = $_POST["goal"];
    $waist = $_POST["waist"];
    $hip = $_POST["hip"];
    $neck = $_POST["neck"];
    $quad = $_POST["quad"];
    $height = $_POST['height'];


    // Fetch the user ID from the database using session information
    $email = $_SESSION['email'];

    $query = "SELECT id FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $userId = $row['id'];

    echo "Welcome, " . $email . "! You are logged in.";


  $sql =  "INSERT INTO user_measurements(waist, hip, neck, quad, weightt, height, age, goal, user_id) VALUES ('$waist', '$hip', '$neck', '$quad', '$weightt', '$height', '$age', '$goal', $userId)";
  echo $sql;

  $results= mysqli_query($db,$sql);
if (!$results)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
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
      <div class="row">
  <div class="col-md-12">
    <form name="adaugare" id="adaugare" method="POST" action="">
      <h1>Edit Info </h1>
      
      <fieldset id="input">
        <label for="age">Age:</label>
        <input class="input-update" type="text" id="age" name="age">
        <label for="Weightt">Weight:</label>
        <input class="input-update" type="text" id="weightt" name="weightt">
         <label for="height">Height:</label>
        <input class="input-update" type="text" id="height" name="height">
        <label for="goal">Current goal:</label>
        <select id="goal" name="goal">
            <option value="maintanance">Maintanance</option>
            <option value="weight_loss">Weight Loss</option>
            <option value="weight_gain">Weight Gain</option>
        </select>
        <p>Now your mesaurements</p> 
        <label  for="waist">Waist:</label>
        <input class="input-update" type="text" id="waist" name="waist">
        <label  for="hips">Hip:</label>
        <input class="input-update" type="text" id="hip" name="hip">
        <label  for="neck">Neck:</label>
        <input class="input-update" type="text" id="neck" name="neck">
        <label  for="quad">Quad:</label>
        <input class="input-update" type="text" id="quad" name="quad">

       
       </fieldset>
       <button type="submit" class="btn" name="submit" >Add</button>
     </form>


      </div>
    </div>  
  </body>
</html>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
