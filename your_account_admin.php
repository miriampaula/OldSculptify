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
      <div style="padding-top: 30px;" class="cell small-12 medium-3 large-3">
        
      </div>
    </div>
  </div>
  <div class="container">
    <div class="profile-header">
      <div class="profile-img image-box">
        <img src="imgs/Public talk-amico.svg" width="200" alt="Profile Image">
      </div>
      <div class="controls" style="display: none;">
        <input type="file" name="contact_image_1"/>
      </div>

      <div class="profile-nav-info">
        <h3 class="user-name">Romaniuc Miriam</h3>
        <a href="logout.php">Logout</a>

      </div>
    </div>
  
    <div class="main-bd">
      <div class="left-side">
        <div class="profile-side">
          <p class="user-mail"><i class="fa fa-envelope"></i> Brightisaac80@gmail.com</p>
          <p class="mobile-no"><i></i>+40765294410</p>
          <div class="user-bio">
            <p class="bio">
            </p>
          </div>
          <div class="profile-btn">
            <a href="update_user_info.php">
              <button class="createbtn" id="Create-post"><i class="fa fa-plus"></i>Update</button>
            </a>
          </div>
        </div>
  
      </div>
      <div class="right-side">
  
        <div class="nav">
          <ul>
            <li onclick="tabs(0)" class="user-post active">Messages</li>
          </ul>
        </div>
        <div class="profile-body">
          <div class="profile-posts tab">
            <div class="account-setting">
              <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit omnis eaque, expedita nostrum, facere libero provident laudantiu</p>
            </div>
            <table style="width: 100%;">
              <tr>
                <td>
                  <h2>From: User1</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam pariatur officia, aperiam quidem quasi, tenetur molestiae. Architecto mollitia laborum possimus iste esse. Perferendis tempora consectetur, quae qui nihil voluptas. Maiores debitis repellendus excepturi quisquam temporibus quam nobis voluptatem, reiciendis distinctio deserunt vitae! Maxime provident, distinctio animi commodi nemo, eveniet fugit porro quos nesciunt quidem a, corporis nisi dolorum minus sit eaque error sequi ullam. Quidem ut fugiat, praesentium velit aliquam!</p>
                </td>
              </tr>
              <tr>
                <td>
                  <h2>To: User2</h2>
                  <textarea></textarea>
                </td>
              </tr>
            </table>
            <a href="#"class="custom-btn2 btn-3" style="width: 300px; height: 40px;" >SEND</a>
            <div class="account-setting">
              <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit omnis eaque, expedita nostrum, facere libero provident laudantiu</p>
            </div>
            <table style="width: 100%;">
              <tr>
                <td>
                  <h2>From: Trainer1</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam pariatur officia, aperiam quidem quasi, tenetur molestiae. Architecto mollitia laborum possimus iste esse. Perferendis tempora consectetur, quae qui nihil voluptas. Maiores debitis repellendus excepturi quisquam temporibus quam nobis voluptatem, reiciendis distinctio deserunt vitae! Maxime provident, distinctio animi commodi nemo, eveniet fugit porro quos nesciunt quidem a, corporis nisi dolorum minus sit eaque error sequi ullam. Quidem ut fugiat, praesentium velit aliquam!</p>
                </td>
              </tr>
              <tr>
                <td>
                  <h2>To: Trainer1</h2>
                  <textarea></textarea>
                </td>
              </tr>
            </table>
            <a href="#"class="custom-btn2 btn-3" style="width: 300px; height: 40px;" >SEND</a>
          
        </div>
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
