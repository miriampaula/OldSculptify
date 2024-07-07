<?php


session_start();

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  $email = $_SESSION['email'];
  echo "Welcome, " . $email . "! You are logged in.";
} 


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
          ?>
        </ul>
      </nav>
    </div>
  </section>
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg"  />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see_user.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
          </figcaption>
        </figure>
      </div>
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg"  />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see_user.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
          </figcaption>
        </figure>
      </div>
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg"  />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see_user.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
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
