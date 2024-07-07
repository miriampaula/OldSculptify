<?php
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db,"fitflow2");
$email = $password =  "";


if ((empty($_POST["email"])) && (empty($_POST["password"]))) {
  $nameErr = "Este necesar sa introduceti datele cerute!";
   }
  else {

    $email = $_POST["email"];
    echo $email;
    
    $password = $_POST["password"];
    echo $password;
  

    $emailExists = emailExists($email);
    $verificat = verifyEmailAndPassword($email, $password);

    if ($emailExists) {
      if ($verificat) {
        
        session_start();
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;

            // Redirect the user to the account page
            header("Location: your_account_professional.php");
            exit;
    } else {
        // Handle the case where the email and password combination is incorrect
        echo '<script>alert("Incorrect password.");</script>';
    }
    } else {
       
        echo '<script>alert("Email does not exist.");</script>';

    } }
  


  function verifyEmailAndPassword($email, $password)
{
    global $db;
    $sanitizedEmail = mysqli_real_escape_string($db, $email);
    $sanitizedPassword = mysqli_real_escape_string($db, $password);

    $query = "SELECT COUNT(*) AS count FROM user WHERE email = '$sanitizedEmail' AND pwd = '$sanitizedPassword' AND user_type='professional'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        return ($count > 0);
    } else {
        return false;
    }
}

function emailExists($email)
{
  global $db;
    $sanitizedEmail = mysqli_real_escape_string($db, $email);

    $query = "SELECT COUNT(*) AS count FROM user WHERE email = '$sanitizedEmail'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        return ($count > 0);
    } else {
        return false;
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
      <div style="padding-top: 50px; text-align: right;" class="cell small-2 medium-2 large-2">
        <a style="font-size: 50px; color: black;" href="javascript:history.back()">&#8678</a>
      </div>
      <div class="cell small-8 medium-6 large-4 login-box">
      <form style="padding-top: 60px;" name="adaugare" id="adaugare" method="POST">
              <h2>Login</h2>
              <br>
              <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
              </div>
              <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
              </div>
              <button type="submit" class="btn" name="submit">Submit</button>
              <a style="display: block; color: black; padding-top: 20px;" href="professional_signup.php">
                Don't have an account?
              </a>
            </form>
         </div>
        <div class="cell small-2 medium-4 large-6"></div>
    </div>
  </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
