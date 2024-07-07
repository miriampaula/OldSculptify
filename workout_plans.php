<?php



session_start();



$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

  $email = $_SESSION['email'];
  echo "Welcome , " . $email . "! You are logged in.";

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

<body>
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
  <div class="grid-container" style="padding-top: 40px;">
    <div class="grid-x grid-margin-x">


      <?php

      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

        if ($type == 'professional') {
          echo '<div class="cell small-12 medium-12 large-12 text-center" style="padding-bottom: 50px;">
      <a href="profi-create-wo-plan.php"class="custom-btn2 btn-3" style="width: 250px; height: 50px;" >+ NEW PLAN</a>
  </div>';
        } else if ($type == 'user') {
          echo '<div class="cell small-12 medium-12 large-12 text-center">
      <a href="create_your_workout_plan.php"class="custom-btn2 btn-3">CREATE YOUR WORKOUT PLAN</a>
    </div>';
        }
      }
      ?>

      <div class="cell small-0 medium-3 large-3"></div>
      <div class="cell small-12 medium-6 large-6">
        <p style="text-align: center; padding-top: 40px; font-size: xx-large; font-family: 'Times New Roman', Times, serif;" ;>Or take a look at our pre made plans</p>
      </div>
      <div class="cell small-0 medium-2 large-3"></div>

      <div class="cell small-12 medium-6 large-6">
        <li class="menu">
          <form style="width: 100%;" class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit">Go</button>
          </form>
        </li>
      </div>
      <div class="cell small-0 medium-2 large-2"></div>
      <div class="cell small-12 medium-4 large-4">
        <label style="padding-top: 30px;">
          <select>
            <option value="All Meals">All Plans</option>
            <option value="Breakfast">Vegan</option>
            <option value="Lunch">Keto</option>
            <option value="Dinner">Quick Cook</option>
          </select>
        </label>
      </div>



      <div style="padding-top: 40px;" class="cell small-12 medium-12 large-12 text-center">
        <a href="workout-plan-1.php"><img style="height: 200px; width: 1000px; object-fit: cover; " src="https://placehold.co/1500x400"></a>
      </div>
      <div style="padding-top: 40px;" class="cell small-12 medium-12 large-12 text-center">
        <a href="workout-plan-1.php"><img style="height: 200px; width: 1000px; object-fit: cover; " src="https://placehold.co/1500x400"></a>
      </div>
      <div style="padding-top: 40px;" class="cell small-12 medium-12 large-12 text-center">
        <a href="workout-plan-1.php"><img style="height: 200px; width: 1000px; object-fit: cover; " src="https://placehold.co/1500x400"></a>
      </div>
    </div>
  </div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>