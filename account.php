<?php




session_start();


$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");




// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user

  $email = $_SESSION['email'];

  $query = "SELECT id FROM user WHERE email = '$email'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $userId = $row['id'];


  $query = "SELECT user_type FROM user WHERE id = '$userId'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $type = $row['user_type'];


  header("Location:your_account_" . $type . ".php");
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
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div style="padding-top: 50px; text-align: center;" class="cell small-12 medium-12 large-12 text-center">
        <p class="title-account-page">CHOOSE YOUR ACCOUNT TYPE</p>
      </div>
      <div style="text-align: center; padding-top: 50px;" class="cell small-12 medium-4 large-4 text-center">
        <a href="user_login.php"><img src="imgs/Eco shopping-amico.svg"></a>
        <p class="user-type">USER</p>
      </div>
      <div style="text-align: center; padding-top: 50px;" class="cell small-12 medium-4 large-4 text-center">
        <a href="professional_login.php"><img src="imgs/Order food-amico.svg"></a>
        <p class="user-type">TRAINER</p>
      </div>
      <div style="text-align: center; padding-top: 50px;" class="cell small-12 medium-4 large-4 text-center">
        <a href="admin_login.php"><img src="imgs/Profile data-bro.svg"></a>
        <p class="user-type">ADMIN</p>
      </div>
    </div>
  </div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>