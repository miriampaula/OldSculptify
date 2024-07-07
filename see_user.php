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
          } 
          ?>
        </ul>
      </nav>
    </div>
  </section>
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell small-12 medium-12 large-12" style="display: flex; justify-content: center; align-items: center;">
        <figure class="snip1336 hover" style="width: 700px;"><img src="imgs/milad-fakurian-E8Ufcyxz514-unsplash.jpg">
          <figcaption>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample2.jpg" alt="profile-sample2" class="profile" />
            <div style="display: flex;">
              <h2 style="padding-bottom: 40px; width: 100%;">Wisteria Widget<span>Weight Loss Plan</span></h2>
            </div>



            <table style="width: 100%; border-color: #7d477dbc;">
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">STARTED ___ WEEKS AGO</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">20 YEARS OLD</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">STARTTNG POINT:</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">1.60m</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">GOAL:</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">60kg</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">ACTUAL:</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">25% bfp</p>
                </td>
              </tr>

            </table>

            <table style="width: 100%; border-color: #7d477dbc;">
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">BMI</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">BMR</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">TDEE</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">hip</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">waist</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">neck</p>
                </td>
              </tr>
            </table>
          </figcaption>
        </figure>
      </div>
      <div class="cell small-hide medium-2 large-2"></div>
      <div class="cell small-12 medium-8 large-8">
        <h3 style="text-align: center;">Send message:</h3>
        <textarea></textarea>
      </div>
      <div class="cell small-hide medium-2 large-2"></div>

      <div class="cell small-12 medium-12 large-12" style="text-align: center;"><a href="#"class="custom-btn2 btn-3" style="width: 300px; height: 40px;" >SEND</a>
      </div>

      <div class="cell small-12 medium-12 large-12" style="text-align: center; padding-top: 50px;">
        <p style="font-size: xx-large;">MEAL PLAN</p>
    </div>
  

        <div class="cell medium-12 large-1 small-hide"></div>
        <div class="cell medium-12 large-2 small-hide"></div>
  <div class="cell medium-12 large-2 small-hide" style="text-align: center;">
    <p>BREAKFAST</p>
  </div>
  <div class="cell medium-12 large-2 small-hide" style="text-align: center;">
    <p>LUNCH</p>
  </div>
  <div class="cell medium-12 large-2 small-hide" style="text-align: center;">
    <p>DINNER</p>
  </div>
  <div class="cell medium-12 large-2 small-hide"></div>
  <div class="cell medium-12 large-1 small-hide"></div>




  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">MONDAY</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">TUESDAY</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">WEDNESDYA</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>

    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">THURSDAY</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">FRIDAT</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">SATURDAY</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-1"></div>
  <div class="cell small-12 medium-12 large-2">
    <p style="padding-top: 40px; text-align: center;">SUNDAY</p>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
        <a href="add-recipe-to-plan-profi.php"><img style="height: 100px;" src="https://placehold.co/200x100"></a>
    <P>700 kcal</P>
  </div>
  <div class="cell small-12 medium-12 large-2" style="text-align: center;">
    <p style="padding-top: 40px;">2100 kcal</p>
  </div>
  <div class="cell small-12 medium-12 large-1"></div>









  
  <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
    <div class="grid-x grid-margin-x">
        <div class="cell small-12 medium-12 large-12">
            <p style="font-size: xx-large;">WORKOUT PLAN</p>
        </div>
        
      <div class="cell small-12 medium-12 large-2">
        <p style="margin-top: 60px">WORKOUT #1</p>
        <label style="width: 70%;margin: 0 auto;">
          <select>
            <option value="All Meals">Full Body</option>
            <option value="Breakfast">Upper Body</option>
            <option value="Lunch">Lower Body</option>
          </select>
        </label>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>
      <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
        <a href="#"><img src="imgs/gunoidragut.png" style="height: 55px;"></a>
      </div>








      <div class="cell small-12 medium-12 large-2">
        <p style="margin-top: 60px">WORKOUT #2</p>
        <label style="width: 70%;margin: 0 auto;">
          <select>
            <option value="All Meals">Full Body</option>
            <option value="Breakfast">Upper Body</option>
            <option value="Lunch">Lower Body</option>
          </select>
        </label>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>
      <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
        <a href="#"><img src="imgs/gunoidragut.png" style="height: 55px;"></a>
      </div>

      <div class="cell small-12 medium-12 large-2">
        <p style="margin-top: 60px">WORKOUT #3</p>
        <label style="width: 70%;margin: 0 auto;">
          <select>
            <option value="All Meals">Full Body</option>
            <option value="Breakfast">Upper Body</option>
            <option value="Lunch">Lower Body</option>
          </select>
        </label>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>
      <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
        <a href="#"><img src="imgs/gunoidragut.png" style="height: 55px;"></a>
      </div>




      <div class="cell small-12 medium-12 large-2">
        <p style="margin-top: 60px">WORKOUT #4</p>
        <label style="width: 70%;margin: 0 auto;">
          <select>
            <option value="All Meals">Full Body</option>
            <option value="Breakfast">Upper Body</option>
            <option value="Lunch">Lower Body</option>
          </select>
        </label>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>


      <div class="cell small-12 medium-12 large-3" style="display: flex;">
        <div style="width: 50%; padding: 20px; padding-bottom: 0;">
          <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
          <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required=""value="3" style="text-align: center;">
                  <label>Sets</label>
              </div>
              <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
              </div>
              <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                  <input type="text" name="" required="" value="10" style="text-align: center;">
                  <label>Reps</label>
              </div>
          </form>
          <form class="login-box" style="display: flex; margin: 0; padding: 0;">
              <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                  <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                  <label>Weight</label>
              </div>
          </form>
      </div>
      <div style="width: 50%; padding: 20px; padding-bottom: 0;">
        <a href="add-exercise-trainer.php" ><img src="imgs/SQUAT.gif"></a>
        <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required=""value="3" style="text-align: center;">
                <label>Sets</label>
            </div>
            <div style="width: 20%; margin: 0; padding: 0;">
                <p style="padding-top: 10px;">X</p>
            </div>
            <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                <input type="text" name="" required="" value="10" style="text-align: center;">
                <label>Reps</label>
            </div>
        </form>
        <form class="login-box" style="display: flex; margin: 0; padding: 0;">
            <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                <input type="text" name="" required="" value="30 kg" style="padding: 0;">
                <label>Weight</label>
            </div>
        </form>
    </div>
      </div>
      <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
        <a href="#"><img src="imgs/gunoidragut.png" style="height: 55px;"></a>
      </div>

      <div class="cell small-12 medium-12 large-12" style="padding-top: 40px;">
        <a href="#"class="custom-btn btn-2" style="width: 300px;">+ WORKOUT</a>
      </div>




  
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
