<?php




session_start();

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

// Check if the session is active and if the required session variables are set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
  // Session is active and user is logged in
  // Access the session variables or perform actions for the logged-in user
  $email = $_SESSION['email'];

  echo "Welcome , " . $email . "! You are logged in.";

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

  <div style="padding-top: 20px;" class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell small-1 medium-1 large-1">
        <a style="font-size: 50px; color: black;" href="javascript:history.back()">&#8678</a>
    </div>
      <div class="cell small-11 medium-7 large-7">
          <li class="menu" style="position: left;">
            <form style="width: 100%;" class="search-bar">
              <input type="text" placeholder="Search...">
              <button type="submit">Go</button>
            </form>
          </li>
      </div>
    <div class="cell small-6 medium-2 large-2" style="padding-top: 30px;">
        <label>
          <select>
            <option value="All ex">All Exercises</option>
            <option value="upper">Upper Bodt</option>
            <option value="lower">Lower Body</option>
          </select>
        </label>
      </div>
      <div class="cell small-6 medium-2 large-2" style="padding-top: 30px;">
        <label>
          <select>
            <option value="All Meals">Weighted</option>
            <option value="Breakfast">Cable</option>
            <option value="Breakfast">Bodyweight</option>
          </select>
        </label>
      </div>
    </div>
  </div>


  <div class="grid-container">
    <div class="grid-x grid-margin-x">


    <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/sidelunge.gif"></a>
            <h2>Side Lunge</h2>
            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('side lunge', 'imgs/sidelunge.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>


          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/front-lunge.gif"></a>
            <h2>Front Lunge</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('lunge', 'imgs/front-lunge.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

      
          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/hip-bridge.gif"></a>
            <h2>Hip Bridge</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('hip bridge', 'imgs/hip-bridge.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

    <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/burpees.gif"></a>
            <h2>Burpees</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('burpees', 'imgs/burpees.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>



        <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/squatt.gif"></a>
            <h2>Squat</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('squat', 'imgs/squatt.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/chestpress.gif"></a>
            <h2>Chest Press</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('chest-press', 'imgs/chestpress.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>


          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/push-ups.gif"></a>
            <h2>Push Up</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('push-up', 'imgs/push-ups.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

          
          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/shoulder-press.gif"></a>
            <h2>Shoulder Press</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('shoulder press', 'imgs/shoulder-press.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/row.gif"></a>
            <h2>Row</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('row', 'imgs/row.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>


          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/pull-up.gif"></a>
            <h2>Pull Up</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('pull up', 'imgs/pull-up.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

          

          <div class="cell small-6 medium-4 large-3" style="padding:2%">
            <a href="#" ><img src="imgs/crunch.gif"></a>
            <h2>Crunch</h2>

            <div style="display: flex; justify-content: center; align-items: center;">
                <div class="add">
                <button onclick="saveExercise('crunch', 'imgs/crunch.gif')" class="round-6">&#10003</button>
                </div>
          </div>
          </div>

  

      

      <div class="container middle">
        <div class="pagination paginatie">
            <ul>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li class="active"><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        </div>
      </div>
      
      

      
  <script>


  function saveExercise(exerciseName, exerciseImage, exerciseId) {
    localStorage.setItem('exerciseName', exerciseName);
    localStorage.setItem('exerciseImage', exerciseImage);
    window.location.href = 'create_your_workout_plan.php';
  }
</script>
    </div>
  </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
