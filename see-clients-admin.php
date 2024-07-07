<?php

session_start();

$email = $_SESSION['email'];

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  echo "Welcome , " . $email . "! You are logged in.";
  echo "<br>";
} 




$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

$html = "";

$user_goal = "";


$query = "SELECT * FROM user_measurements WHERE user_id = 'user'";
$result = mysqli_query($db, $query);



$query = "SELECT id FROM user WHERE email = '$email'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $userId = $row['id'];


  $query = "SELECT user_type FROM user WHERE id = '$userId'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $type = $row['user_type'];


$query = "SELECT * FROM user WHERE user_type = 'user'";
$result = mysqli_query($db, $query);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
    $username = $row['nume'];
    $email = $row['email'];

    echo "User ID: " . $user_id . "<br>";
    echo "Username: " . $username . "<br>";
/*

    $query = "SELECT * FROM user_measurements WHERE user_id = 'user'";
    $result = mysqli_query($db, $query);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $user_goal = $row['goal'];
      }
      $user_goal = "no plan";

    } else {
      echo "Error executing query: " . mysqli_error($db);
    }

*/
    $element  = <<<HTML
<div class="cell small-12 medium-6 large-4">
    <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg"  />
        <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2> $username <span>Plan: $user_goal</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see-user-from-admin.php?id=$user_id" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
            <table>
                <tr style="padding-top: 30px; background-color: #7d477dbc; width: 100%; text-align: center;">
                    <td style="width: 100%; border-color: #7d477dbc;"><a href="see-trainer-profile.php">Assigned to: Norman Gordon</a></td>
                </tr>
            </table>
            <a href="#" class="info">DELETE</a>
        </figcaption>
    </figure>
</div>
HTML;


    $html .= $element;
  }
} else {
  // Handle the case when the query fails
  echo "Error executing query: " . mysqli_error($db);
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


      <!--
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg" />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see-user-from-admin.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
            <table>
              <tr style="padding-top: 30px; background-color: #7d477dbc; width: 100%; text-align: center;">
                <td style="width: 100%; border-color: #7d477dbc;"><a href="see-trainer-profile.php">Assigned to: Norman Gordon</a></td>
              </tr>
            </table>
            <a href="#" class="info">DELETE</a>

          </figcaption>
        </figure>

      </div>
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg" />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see-user-from-admin.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
            <table>
              <tr style="padding-top: 30px; background-color: #7d477dbc; width: 100%; text-align: center;">
                <td style="width: 100%; border-color: #7d477dbc;"><a href="see-trainer-profile.php">Assigned to: Norman Gordon</a></td>
              </tr>
            </table>
            <a href="#" class="info">DELETE</a>
          </figcaption>
        </figure>
      </div>
      <div class="cell small-12 medium-6 large-4">
        <figure class="snip1336 hover"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg" />
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <h2>Wisteria Widget<span>Weight Loss Plan</span></h2>
            <p>STARTED ___ WEEKS AGO</p>
            <p>START POINT: </p>
            <p>GOAL: </p>
            <p>ACTUAL: </p>
            <a href="see-user-from-admin.php" class="follow">SEE PLAN</a>
            <a href="#" class="info">REASIGN</a>
            <table>
              <tr style="padding-top: 30px; background-color: #7d477dbc; width: 100%; text-align: center;">
                <td style="width: 100%; border-color: #7d477dbc;"><a href="see-trainer-profile.php">Assigned to: Norman Gordon</a></td>
              </tr>
            </table>
            <a href="#" class="info">DELETE</a>
          </figcaption>
        </figure>
      </div>-->

      <?php echo $html; ?>
    </div>
  </div>


  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>