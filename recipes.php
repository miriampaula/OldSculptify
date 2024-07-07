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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
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

  <?php

  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

    if ($type == 'professional') {
      echo '<div style="padding-left: 600px;">
              <a href="add-recipe.php" class="custom-btn2 btn-3" style="width: 300px;">ADD NEW RECIPE</a>
          </div>';
    }
  }
  ?>
  <div style="padding-top: 80px;" class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell small-12 medium-12 large-6">
        <li class="menu" style="padding-top: 20px;">
          <form style="width: 100%;" class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit">Go</button>
          </form>
        </li>
      </div>
      <div class="cell small-6 medium-6 large-3" style="padding-top: 40px;">
        <label>
          <select>
            <option value="All Meals">All Meals</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
            <option value="Snack">Snack</option>
          </select>
        </label>
      </div>
      <div class="cell small-6 medium-3 large-3" style="padding-top: 40px; float: right;">

        <button id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Filter by ingredients<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg></button>

        <!-- Dropdown menu -->
        <div id="dropdownToggle" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
          <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
            <li>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Avocado</span>
                </label>
              </div>
            </li>
            <li>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Beef</span>
                </label>
              </div>
            </li>
            <li>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Beans</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Chicken</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Cheese</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Eggs</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Fruit</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Oats</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Pasta</span>
                </label>
              </div>
              <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label class="relative inline-flex items-center w-full cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer">
                  <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Rice</span>
                </label>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>



  <div class="grid-container">
    <div class="grid-x grid-margin-x" style="padding-top: 50px;">
      <?php
      $query = "SELECT * FROM recipe";
      $result = mysqli_query($db, $query);

      while ($row = mysqli_fetch_assoc($result)) {
        $recipeId = $row['id'];
        $recipeName = $row['recname'];
        $recipeImg = $row['recipe_img'];
        // Add more variables from the database as needed

        echo '<div class="cell small-12 medium-6 large-4" style="padding: 2%;">
      <a href="recipe.php?id=' . $recipeId . '"><img src="' . $recipeImg . '"></a>
      <p class="recipe-name-list">' . $recipeName . '</p>';

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
          if ($type == 'user') {
            echo '<ul style="width: 100%;" class="menu">
          <li style="width: 50%; text-align: center;">
            <div class="add">
              <button class="round-6">+</button>
            </div>
          </li>
          <li style="width: 50%; text-align: center;">
            <div class="add">
              <button class="round-6">&#x2665</button>
            </div>
          </li>
        </ul>';
          }
          else if ($type == 'professional') {
            echo '
            <a href="#" onclick="delete_recipe(' . $recipeId . ')"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
            ';
          }
        }

        echo '</div>';
      }
      ?>

      <div class="container middle">
        <div class="pagination paginatie">
          <ul>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="active"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </div>


    </div>
  </div>
  <script>

    function delete_recipe(id_recipe) {

            alert("stergem inregistrare");
       alert(id_recipe);
      // Send an AJAX request to the server-side script
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Handle the response from the server if necessary
             alert(this.responseText);

          location.reload();

        }
      };
      var url = "delete_recipe_from_db.php?id=" + encodeURIComponent(id_recipe);
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>