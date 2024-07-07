<?php

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

if (isset($_GET['id'])) {
  $user_id = $_GET['id'];

  $query = "SELECT * FROM user WHERE id = '$user_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $username = $row['nume'];


  $query = "SELECT * FROM user_measurements WHERE user_id = '$user_id'";
  $result = mysqli_query($db, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $age = $row['age'];
      $waist = $row['waist'];
      $hip = $row['hip'];
      $neck = $row['neck'];
      $quad = $row['quad'];
      $weightt = $row['weightt'];
      $height = $row['height'];

      $goal = $row['goal'];




      echo "User ID: " . $user_id . "<br>";
      echo "age: " . $age . "<br>";
      echo "waist: " . $waist . "<br>";
      echo "goal: " . $goal . "<br>";
    } else {
      echo "No user found with ID: " . $user_id;
    }
  } else {
    echo "Error executing query: " . mysqli_error($db);
  }



  $rec1 = $rec2 = $rec3 = $rec4 = $rec5 = $rec6 = $rec7 = $rec8 = $rec9 = $rec10 = $rec11 = $rec12 = $rec13 = $rec14 = $rec15 = $rec16 = $rec17 = $rec18 = $rec19 = $rec20 = $rec21 = '';
  $cal1 = $cal2 = $cal3 = $cal4 = $cal5 = $cal6 = $cal7 = $cal8 = $cal9 = $cal10 = $cal11 = $cal12 = $cal13 = $cal14 = $cal15 = $cal16 = $cal17 = $cal18 = $cal19 = $cal20 = $cal21 = '';
  $prot1 = $prot2 = $prot3 = $prot4 = $prot5 = $prot6 = $prot7 = $prot8 = $prot9 = $prot10 = $prot11 = $prot12 = $prot13 = $prot14 = $prot15 = $prot16 = $prot17 = $prot18 = $prot19 = $prot20 = $prot21 = '';
  $carbs1 = $carbs2 = $carbs3 = $carbs4 = $carbs5 = $carbs6 = $carbs7 = $carbs8 = $carbs9 = $carbs10 = $carbs11 = $carbs12 = $carbs13 = $carbs14 = $carbs15 = $carbs16 = $carbs17 = $carbs18 = $carbs19 = $carbs20 = $carbs21 = '';
  $fat1 = $fat2 = $fat3 = $fat4 = $fat5 = $fat6 = $fat7 = $fat8 = $fat9 = $fat10 = $fat11 = $fat12 = $fat13 = $fat14 = $fat15 = $fat16 = $fat17 = $fat18 = $fat19 = $fat20 = $fat21 = '';
  $id_ret1 = $id_ret2 = $id_ret3 = $id_ret4 = $id_ret5 = $id_ret6 = $id_ret7 = $id_ret8 = $id_ret9 = $id_ret10 = $id_ret11 = $id_ret12 = $id_ret13 = $id_ret14 = $id_ret15 = $id_ret16 = $id_ret17 = $id_ret18 = $id_ret19 = $id_ret20 = $id_ret21 = '';



  $query = "SELECT * FROM current_plans_for_client WHERE user_id = '$user_id'";

  $resultv = mysqli_query($db, $query);
  $myrow = mysqli_fetch_array($resultv);
  $mp_id = $myrow['meal_plan_id'];


  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'monday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $monday_braeakfast_id = $row['breakfast_id'];
  $monday_lunch_id = $row['lunch_id'];
  $monday_dinner_id = $row['dinner_id'];
  $id_luni = $row['id'];


  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_luni'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_luni = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$monday_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_bf_name = $row['recname'];
  $mon_bf_cals = $row['calories'];
  $mon_bf_prot = $row['grams_protein'];
  $mon_bf_carbs = $row['grams_carbs'];
  $mon_bf_fat = $row['grams_fats'];
  $mon_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$monday_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_lunch_name = $row['recname'];
  $mon_lunch_cals = $row['calories'];
  $mon_lunch_prot = $row['grams_protein'];
  $mon_lunch_carbs = $row['grams_carbs'];
  $mon_lunch_fat = $row['grams_fats'];
  $mon_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$monday_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $mon_din_name = $row['recname'];
  $mon_din_cals = $row['calories'];
  $mon_din_prot = $row['grams_protein'];
  $mon_din_carbs = $row['grams_carbs'];
  $mon_din_fat = $row['grams_fats'];
  $mon_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'tuesday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tuesday_braeakfast_id = $row['breakfast_id'];
  $tuesday_lunch_id = $row['lunch_id'];
  $tuesday_dinner_id = $row['dinner_id'];
  $id_marti = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_marti'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_marti = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$tuesday_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_bf_name = $row['recname'];
  $tues_bf_cals = $row['calories'];
  $tues_bf_prot = $row['grams_protein'];
  $tues_bf_carbs = $row['grams_carbs'];
  $tues_bf_fat = $row['grams_fats'];
  $tues_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$tuesday_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_lunch_name = $row['recname'];
  $tues_lunch_cals = $row['calories'];
  $tues_lunch_prot = $row['grams_protein'];
  $tues_lunch_carbs = $row['grams_carbs'];
  $tues_lunch_fat = $row['grams_fats'];
  $tues_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$tuesday_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $tues_din_name = $row['recname'];
  $tues_din_cals = $row['calories'];
  $tues_din_prot = $row['grams_protein'];
  $tues_din_carbs = $row['grams_carbs'];
  $tues_din_fat = $row['grams_fats'];
  $tues_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'wednseday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_breakfast_id = $row['breakfast_id'];
  $wed_lunch_id = $row['lunch_id'];
  $wed_dinner_id = $row['dinner_id'];
  $id_miercuri = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_miercuri'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_miercuri = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$wed_breakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_bf_name = $row['recname'];
  $wed_bf_cals = $row['calories'];
  $wed_bf_prot = $row['grams_protein'];
  $wed_bf_carbs = $row['grams_carbs'];
  $wed_bf_fat = $row['grams_fats'];
  $wed_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$wed_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_lunch_name = $row['recname'];
  $wed_lunch_cals = $row['calories'];
  $wed_lunch_prot = $row['grams_protein'];
  $wed_lunch_carbs = $row['grams_carbs'];
  $wed_lunch_fat = $row['grams_fats'];
  $wed_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$wed_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $wed_din_name = $row['recname'];
  $wed_din_cals = $row['calories'];
  $wed_din_prot = $row['grams_protein'];
  $wed_din_carbs = $row['grams_carbs'];
  $wed_din_fat = $row['grams_fats'];
  $wed_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'thursday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_braeakfast_id = $row['breakfast_id'];
  $joi_lunch_id = $row['lunch_id'];
  $joi_dinner_id = $row['dinner_id'];
  $id_joi = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_joi'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_joi = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$joi_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_bf_name = $row['recname'];
  $joi_bf_cals = $row['calories'];
  $joi_bf_prot = $row['grams_protein'];
  $joi_bf_carbs = $row['grams_carbs'];
  $joi_bf_fat = $row['grams_fats'];
  $joi_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$joi_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_lunch_name = $row['recname'];
  $joi_lunch_cals = $row['calories'];
  $joi_lunch_prot = $row['grams_protein'];
  $joi_lunch_carbs = $row['grams_carbs'];
  $joi_lunch_fat = $row['grams_fats'];
  $joi_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$joi_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $joi_din_name = $row['recname'];
  $joi_din_cals = $row['calories'];
  $joi_din_prot = $row['grams_protein'];
  $joi_din_carbs = $row['grams_carbs'];
  $joi_din_fat = $row['grams_fats'];
  $joi_din_img = $row['recipe_img'];





  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'friday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_braeakfast_id = $row['breakfast_id'];
  $fri_lunch_id = $row['lunch_id'];
  $fri_dinner_id = $row['dinner_id'];
  $id_vineri = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_vineri'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_vineri = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$fri_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_bf_name = $row['recname'];
  $fri_bf_cals = $row['calories'];
  $fri_bf_prot = $row['grams_protein'];
  $fri_bf_carbs = $row['grams_carbs'];
  $fri_bf_fat = $row['grams_fats'];
  $fri_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$fri_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_lunch_name = $row['recname'];
  $fri_lunch_cals = $row['calories'];
  $fri_lunch_prot = $row['grams_protein'];
  $fri_lunch_carbs = $row['grams_carbs'];
  $fri_lunch_fat = $row['grams_fats'];
  $fri_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$fri_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $fri_din_name = $row['recname'];
  $fri_din_cals = $row['calories'];
  $fri_din_prot = $row['grams_protein'];
  $fri_din_carbs = $row['grams_carbs'];
  $fri_din_fat = $row['grams_fats'];
  $fri_din_img = $row['recipe_img'];




  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'saturday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_braeakfast_id = $row['breakfast_id'];
  $sat_lunch_id = $row['lunch_id'];
  $sat_dinner_id = $row['dinner_id'];
  $id_sambata = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_sambata'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_sambata = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$sat_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_bf_name = $row['recname'];
  $sat_bf_cals = $row['calories'];
  $sat_bf_prot = $row['grams_protein'];
  $sat_bf_carbs = $row['grams_carbs'];
  $sat_bf_fat = $row['grams_fats'];
  $sat_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$sat_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_lunch_name = $row['recname'];
  $sat_lunch_cals = $row['calories'];
  $sat_lunch_prot = $row['grams_protein'];
  $sat_lunch_carbs = $row['grams_carbs'];
  $sat_lunch_fat = $row['grams_fats'];
  $sat_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$sat_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sat_din_name = $row['recname'];
  $sat_din_cals = $row['calories'];
  $sat_din_prot = $row['grams_protein'];
  $sat_din_carbs = $row['grams_carbs'];
  $sat_din_fat = $row['grams_fats'];
  $sat_din_img = $row['recipe_img'];



  $query = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = '$mp_id' AND day_of_week = 'sunday'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_braeakfast_id = $row['breakfast_id'];
  $sun_lunch_id = $row['lunch_id'];
  $sun_dinner_id = $row['dinner_id'];
  $id_duminica = $row['id'];

  $query = "SELECT * FROM totals_for_day WHERE day_of_week_meal_plan_id = '$id_duminica'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $total_cals_dum = $row['calories'];


  $query = "SELECT * FROM recipe WHERE id = '$sun_braeakfast_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_bf_name = $row['recname'];
  $sun_bf_cals = $row['calories'];
  $sun_bf_prot = $row['grams_protein'];
  $sun_bf_carbs = $row['grams_carbs'];
  $sun_bf_fat = $row['grams_fats'];
  $sun_bf_img = $row['recipe_img'];

  $query = "SELECT * FROM recipe WHERE id = '$sun_lunch_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_lunch_name = $row['recname'];
  $sun_lunch_cals = $row['calories'];
  $sun_lunch_prot = $row['grams_protein'];
  $sun_lunch_carbs = $row['grams_carbs'];
  $sun_lunch_fat = $row['grams_fats'];
  $sun_lunch_img = $row['recipe_img'];


  $query = "SELECT * FROM recipe WHERE id = '$sun_dinner_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $sun_din_name = $row['recname'];
  $sun_din_cals = $row['calories'];
  $sun_din_prot = $row['grams_protein'];
  $sun_din_carbs = $row['grams_carbs'];
  $sun_din_fat = $row['grams_fats'];
  $sun_din_img = $row['recipe_img'];
} else {
  echo "Invalid user ID";
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
            <a href="see-clients-admin.php">Clients</a>
          </li>
          <li>
          <li>
            <a href="see-trainers.php">Trainers</a>
          </li>
          <li>
            <a href="account.php">Account</a>
          </li>
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
              <h2 style="padding-bottom: 40px; width: 100%;"><?php echo $username;  ?><span> <?php echo $goal; ?></span></h2>
            </div>



            <table style="width: 100%; border-color: #7d477dbc;">
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">STARTED ___ WEEKS AGO</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large"><?php echo $age; ?>YEARS OLD</p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large">STARTTNG POINT:</p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large"><?php echo $height; ?>cm</p>
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
                  <p style="color: rgb(255, 255, 255); font-size: large"><?php echo $hip; ?></p>
                </td>
              </tr>
              <tr style="background-color:#7d477dbc;">
                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large"><?php echo $waist; ?></p>
                </td>

                <td>
                  <p style="color: rgb(255, 255, 255); font-size: large"><?php echo $neck; ?></p>
                </td>
              </tr>
            </table>
          </figcaption>
        </figure>
      </div>



      <div class="cell small-12 medium-12 large-12" style="text-align: center; padding-top: 50px;">
        <p style="font-size: xx-large;">MEAL PLAN</p>
      </div>





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
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_bf_name . '" readonly>'; ?>


        <?php echo '<a href="recipe' . $monday_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $mon_bf_img . '"></a>'; ?>

        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_bf_cals . '" readonly>'; ?>

        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_lunch_name . '" readonly>'; ?>


        <?php echo '<a href="recipe' . $monday_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $mon_lunch_img . '"></a>'; ?>

        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_lunch_cals . '" readonly>'; ?>

        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $mon_din_name . '" readonly>'; ?>


        <?php echo '<a href="recipe' . $monday_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $mon_din_img . '"></a>'; ?>

        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $mon_din_cals . '" readonly>'; ?>

        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $mon_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_luni . '"readonly>'; ?>

      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">TUESDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $tuesday_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $tues_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>

      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $tuesday_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $tues_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $tues_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $tuesday_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $tues_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $tues_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $tues_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_marti . '"readonly>'; ?>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">WEDNESAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $wed_breakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $wed_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $wed_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $wed_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $wed_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $wed_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $wed_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $wed_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $wed_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_miercuri . '"readonly>'; ?>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">THURSDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $joi_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $joi_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $joi_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $joi_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $joi_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $joi_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $joi_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $joi_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $joi_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_joi . '"readonly>'; ?>
      </div>



      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">FRIDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $fri_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $fri_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $fri_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $fri_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $fri_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $fri_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $fri_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $fri_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $fri_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_vineri . '"readonly>'; ?>
      </div>


      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">SATURDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sat_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sat_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sat_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sat_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sat_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sat_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sat_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sat_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sat_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_sambata . '"readonly>'; ?>
      </div>



      <div class="cell small-12 medium-2 large-2">
        <p style="margin-top: 60px">SUNDAY</p>
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_bf_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sun_braeakfast_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sun_bf_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_bf_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_bf_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_lunch_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sun_lunch_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sun_lunch_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_lunch_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_lunch_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-3 large-3">
        <?php echo '<input type="text" name="rec1" class="rec_name" id="nume_ret_1" value="' . $sun_din_name . '" readonly>'; ?>
        <?php echo '<a href="recipe' . $sun_dinner_id . '.php"><img class="clickable-image" id="img1" style="height: 150px; padding-top: 20px;" src="imgs/' . $sun_din_img . '"></a>'; ?>
        <?php echo '<input type="text" name="cal1" class="kal" style="margin-bottom: 0" value="' . $sun_din_cals . '" readonly>'; ?>
        <div style="width: 100%; display: flex;">
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_prot . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_carbs . '" readonly>'; ?>
          <?php echo '<input name="prot1" class="prot" type="text" style="width: 33.33%; flex-grow: 1;" value="' . $sun_din_fat . '" readonly>'; ?>
        </div>
        <input name="id_ret1" class="nr_reteta" type="text" style="display: none;">
      </div>
      <div class="cell small-12 medium-1 large-1">
        <?php echo '<input name="tot_luni" id="tot_luni" type="text"  value="' . $total_cals_dum . '"readonly>'; ?>
      </div>











      <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
        <div class="grid-x grid-margin-x">
          <div class="cell small-12 medium-12 large-12">
            <p style="font-size: xx-large;">WORKOUT PLAN #1</p>
          </div>

          <div class="cell small-12 medium-12 large-2">
            <p style="margin-top: 60px">WORKOUT #1</p>
            <p style="width: 70%;margin: 0 auto;">FULL BODY</p>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
          </div>








          <div class="cell small-12 medium-12 large-2">
            <p style="margin-top: 60px">WORKOUT #2</p>
            <p style="width: 70%;margin: 0 auto;">FULL BODY</p>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
          </div>


          <div class="cell small-12 medium-12 large-2">
            <p style="margin-top: 60px">WORKOUT #3</p>
            <p style="width: 70%;margin: 0 auto;">FULL BODY</p>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
          </div>




          <div class="cell small-12 medium-12 large-2">
            <p style="margin-top: 60px">WORKOUT #4</p>
            <p style="width: 70%;margin: 0 auto;">FULL BODY</p>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>


          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-3" style="display: flex;">
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
            <div style="width: 50%; padding: 20px; padding-bottom: 0;">
              <img src="imgs/SQUAT.gif">
              <form class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">3</p>
                </div>
                <div style="width: 20%; margin: 0; padding: 0;">
                  <p style="padding-top: 10px;">X</p>
                </div>
                <div style="width: 40%; margin: 0; padding: 0; flex-direction: column; align-items: center;">
                  <p style="padding-top: 10px;">10</p>
                </div>
              </form>
              <div style="margin: 0; padding: 0; width: 100%;">
                <p>30 KG</p>
              </div>
            </div>
          </div>
          <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">
          </div>








          <script src="js/vendor/jquery.js"></script>
          <script src="js/vendor/what-input.js"></script>
          <script src="js/vendor/foundation.js"></script>
          <script src="js/app.js"></script>
</body>

</html>