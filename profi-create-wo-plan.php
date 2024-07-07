<?php
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db,"fitflow2");
$type =  $sets = $reps = $weight_used = $name = "";



if ((empty($_POST["type"])) && (empty($_POST["name"])) && (empty($_POST["reps"]))) {
    $nameErr = "Este necesar sa introduceti datele cerute!";
    echo $nameErr; }
    else {
  
      $tpye = $_POST["type"];
      $sets = $_POST["sets"];
      $reps = $_POST["reps"];
      $weight_used = $_POST["weight_used"];
      $name = $_POST["name"];

      $sql="INSERT INTO workout(type) VALUES ('$type')";
      echo $sql;
    
      $results= mysqli_query($db,$sql);
    if (!$results)
     die('Invalid querry:' .mysqli_error($db));
     else 
     {
      echo "Inregistrarea a fost adaugata.</br>";
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
            <li>
              <a href="see_clients.php">Clients</a>
            </li>
            <li>
              <a href="meal-plans-modify.php">Meal Plans</a>
            </li>
            <li>
              <a href="workout-plans-modify.php">Workouts</a>
            </li>
            <li>
              <a href="account.php">Account</a>
            </li>
          </ul>
      </nav>
    </div>
  </section>
  <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
    <div class="grid-x grid-margin-x">



        
        <div class="cell small-12 medium-12 large-2">
            <p style="margin-top: 60px">WORKOUT #1</p>
            <label style="width: 70%;margin: 0 auto;">
            <select name="type">
                  <option value="All Meals">Full Body</option>
                  <option value="Breakfast">Upper Body</option>
                  <option value="Lunch">Lower Body</option>
                </select>
              </label>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
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
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0; ">
                        <p  style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
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
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
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
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0; ">
                        <p  style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                <a href="add-exercise-trainer.php" ><img src="imgs/plll.jpg"></a>
                <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Sets</label>
                    </div>
                    <div style="width: 20%; margin: 0; padding: 0;">
                        <p style="padding-top: 10px;">X</p>
                    </div>
                    <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                        <input type="text" name="" required="" style="text-align: center;">
                        <label>Reps</label>
                    </div>
                </form>
                <form class="login-box" style="display: flex; margin: 0; padding: 0;">
                    <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                        <input type="text" name="" required="" style="padding: 0;">
                        <label>Weight</label>
                    </div>
                </form>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
            <a href="#"><img src="imgs/gunoidragut.png" style="height: 55px;"></a>
          </div>
      <div class="cell small-12 medium-6 large-6" style="padding-top: 40px;">
        <a href="#"class="custom-btn btn-2" style="width: 300px;">+ WORKOUT</a>
      </div>
      <div class="cell small-12 medium-6 large-6">
        <div style="display: flex; justify-content: center; padding: 40px">
            <label>
              <input type="text">
            </label>
            <button type="submit" class="btn" name="submit" >Add</button>
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
