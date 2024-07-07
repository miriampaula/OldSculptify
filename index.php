<?php


session_start();


// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  $email = $_SESSION['email'];

  echo "Welcome , " . $email . "! You are logged in.";
  $db = mysqli_connect("localhost:3306", "root", "");
  mysqli_select_db($db, "fitflow2");

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

<body style="background-size: cover; background-repeat: no-repeat;">
  <section class="navigation">
    <div class="nav-container">
      <div class="brand">
        <a href="index.php">FIT FLOW</a>
      </div>
      <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">


          <?php
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

            $query = "SELECT * FROM drepturi WHERE tip_user = '$type'";
            $result = mysqli_query($db, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $linkText = $row['name_page'];
                $linkURL = $row['pagina'];
                echo "<li><a href=\"$linkURL\">$linkText</a></li>";
              }
            } else {
              echo "No dashboard links found.";
            }
          } else {
            echo "<li><a href=\"recipes.php\">Recipes</a></li>";
            echo "<li><a href=\"meal_plan.php\">Meal Plans</a></li>";
            echo "<li><a href=\"workout_plans.php\">Workouts</a></li>";
            echo "<li><a href=\"account.php\">Account</a></li>";
          }
          ?>

        </ul>
      </nav>
    </div>
  </section>
  <style>
    .responsive-image {
      background-image: url('imgs/Take control over your health.png');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 800px;
      /* Adjust the height according to your preference */
    }

    /* Media query for mobile devices */
    @media (max-width: 768px) {
      .responsive-image {
        width: 100%;
        background-image: url('imgs/lala.png');
        /* Update the image URL for mobile devices */
      }
    }
  </style>

  <div class="responsive-image"></div>


  <div style="text-align: center;">
    <a href="account.php" class="button" style="background-color: black; height: 50px; width: 200px;">START YOUR JOURNEY</a>
  </div>
  <div style="padding-top: 60px; text-align: center;">
    <h1>HOW IT WORKS</h1>
  </div>

  <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
    <div class="grid-x grid-margin-x">

      <div class="cell small-12 medium-6 large-6" style="padding: 10%;">
        <h3>CHOOSE YOUR GOAL</h3><br><br>
        <p>Get the right suggestions by letting us know your current status and where you would like to be</p>
      </div>

      <div class="cell small-12 medium-6 large-6">
        <img style="min-width: 300px; width: 75%; margin: 0 auto; padding-left: 0;" src="imgs/goal.svg">
      </div>



      <div class="cell small-12 medium-6 large-6">
        <img style="min-width: 300px; width: 75%; margin: 0 auto; padding-left: 0;" src="imgs/training.svg">
      </div>
      <div class="cell small-12 medium-6 large-6" style="padding: 10%;">
        <h3>DESIGN YOUR TRAINING PROGRAM</h3><br><br>
        <p>Choose from our wide variety of exercises, to target each and every muscle, or choose from our well-thought, pre-made training plans.</p>
      </div>


      <div class="cell small-12 medium-6 large-6" style="padding: 10%;">
        <h3>DESIGN YOUR MEAL PLAN</h3><br><br>
        <p>Choose from our wide variety of recipes, with full nutritional info, step-by-stpe instructions or take a look at our pre-made meal plans, designed with much thought and detail</p>
      </div>
      <div class="cell small-12 medium-6 large-6">
        <img style="min-width: 300px; width: 75%; margin: 0 auto; padding-left: 0;" src="imgs/plan.svg">
      </div>

    </div>
  </div>
  <div style="text-align: center;">
    <a href="account.php" class="button" style="background-color: black; height: 50px; width: 200px;">GET STARTED NOW</a>
  </div>






  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>