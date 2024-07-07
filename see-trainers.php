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
<body>
  <section class="navigation">
    <div class="nav-container">
      <div class="brand">
        <a href="index.php">FIT FLOW</a>
      </div>
      <nav>
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
      <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
        <figure class="snip1515">
            <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
            <figcaption>
              <h3>Norman Gordon</h3>
              <h4>Nutrition Professional</h4>
              <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
              <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
              <button class="hollow button" style="color: whitesmoke;">DELETE</button>
            </figcaption>
            
          </figure>
      </div>
          <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
            <figure class="snip1515">
                <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
                <figcaption>
                  <h3>Norman Gordon</h3>
                  <h4>Nutrition Professional</h4>
                  <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
                  <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
                  <button class="hollow button" style="color: whitesmoke;">DELETE</button>
                </figcaption>
                
              </figure>
          </div>
          <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
            <figure class="snip1515">
                <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
                <figcaption>
                  <h3>Norman Gordon</h3>
                  <h4>Nutrition Professional</h4>
                  <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
                  <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
                  <button class="hollow button" style="color: whitesmoke;">DELETE</button>
                </figcaption>
                
              </figure>
          </div>
          <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
            <figure class="snip1515">
                <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
                <figcaption>
                  <h3>Norman Gordon</h3>
                  <h4>Nutrition Professional</h4>
                  <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
                  <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
                  <button class="hollow button" style="color: whitesmoke;">DELETE</button>
                </figcaption>
                
              </figure>
          </div>
          <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
            <figure class="snip1515">
                <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
                <figcaption>
                  <h3>Norman Gordon</h3>
                  <h4>Nutrition Professional</h4>
                  <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
                  <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
                  <button class="hollow button" style="color: whitesmoke;">DELETE</button>
                </figcaption>
                
              </figure>
          </div>
          <div class="cell small-12 medium-6 large-4" style="padding-top: 60px; display: flex; justify-content: center;">
            <figure class="snip1515">
                <div class="profile-image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample83.jpg" alt="sample83" /></div>
                <figcaption>
                  <h3>Norman Gordon</h3>
                  <h4>Nutrition Professional</h4>
                  <p>Specialized dietitian with 5+ years of nutritionist experience. Helped in creating detailed diets for over 400 customers.</p>
                  <a class="clear button" href="see-trainer-profile.php" style="height: 40px; color: aliceblue; font-size: x-large;">SEE PROFILE</a><br>
                  <button class="hollow button" style="color: whitesmoke;">DELETE</button>
                </figcaption>
                
              </figure>
          </div>
    </div>
  </div>
  

  
  
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
