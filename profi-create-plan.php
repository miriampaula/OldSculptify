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
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">TUESDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">WEDNESAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">THURSDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>



      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">FRIDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">SATURDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>



      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">SUNDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <a href="add-recipe-to-plan-profi.php"><img style="padding-top: 25px; height: 150px;" src="/imgs/plusss.jpg"></a>
        <P style="margin-bottom: 0";>cals</P>
      </div>
      <div class="cell small-12 medium-1 large-1">
        <p style="margin-top: 60px">TOTAL</p>
      </div>

      <div class="cell small-12 medium-12 large-12">
        <div style="display: flex; justify-content: center; padding-top: 40px">
          <label>
            <input type="text">
          </label>
          <a class="hollow button" href="#" style="height: 40px;">SAVE</a>
        </div>
      </div>




    </div>
  </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
