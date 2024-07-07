 <?php

    session_start();

    // Check if the session is active and if the required session variables are set
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {
        // Session is active and user is logged in
        // Access the session variables or perform actions for the logged-in user
        $email = $_SESSION['email'];
        echo "Welcome, " . $email . "! You are logged in.";
    } else {
        // Session is not active or user is not logged in
        // Redirect the user to the login page or display an error message
        header("Location: user_login.php");
        exit;
    }


    $db = mysqli_connect("localhost:3306", "root", "");
    mysqli_select_db($db, "fitflow2");

    $wo_1_type = $wo_1_ex_1_name = $wo_1_ex_1_img = $wo_1_ex_1_sets = $wo_1_ex_1_reps = $wo_1_ex_1_weight = $wo_1_ex_2_name = $wo_1_ex_2_img = $wo_1_ex_2_sets = $wo_1_ex_2_reps = $wo_1_ex_2_weight =  "";
    $wo_1_ex_3_name  = $wo_1_ex_3_img = $wo_1_ex_3_sets = $wo_1_ex_3_reps = $wo_1_ex_3_weight = $wo_1_ex_4_name = $wo_1_ex_4_sets = $wo_1_ex_4_img = $wo_1_ex_4_reps = $wo_1_ex_4_weight = "";
    $wo_1_ex_5_name = $wo_1_ex_5_sets = $wo_1_ex_5_img = $wo_1_ex_5_reps = $wo_1_ex_5_weight = $wo_1_ex_6_name = $wo_1_ex_6_img = $wo_1_ex_6_sets = $wo_1_ex_6_reps = $wo_1_ex_6_weight = "";



    $wo_2_ex_1_img = $wo_2_ex_2_img = $wo_2_ex_3_img = $wo_2_ex_4_img = $wo_2_ex_5_img = $wo_2_ex_6_img = '';
    $wo_3_ex_1_img = $wo_3_ex_2_img = $wo_3_ex_3_img = $wo_3_ex_4_img = $wo_3_ex_5_img = $wo_3_ex_6_img = '';
    $wo_4_ex_1_img = $wo_4_ex_2_img = $wo_4_ex_3_img = $wo_4_ex_4_img = $wo_4_ex_5_img = $wo_4_ex_6_img = '';


    $wo_2_type = $wo_2_ex_1_name = $wo_2_ex_1_sets = $wo_2_ex_1_reps = $wo_2_ex_1_weight = $wo_2_ex_2_name = $wo_2_ex_2_sets = $wo_2_ex_2_reps = $wo_2_ex_2_weight =  "";
    $wo_2_ex_3_name = $wo_2_ex_3_sets = $wo_2_ex_3_reps = $wo_2_ex_3_weight = $wo_2_ex_4_name = $wo_2_ex_4_sets = $wo_2_ex_4_reps = $wo_2_ex_4_weight = "";
    $wo_2_ex_5_name = $wo_2_ex_5_sets = $wo_2_ex_5_reps = $wo_2_ex_5_weight = $wo_2_ex_6_name = $wo_2_ex_6_sets = $wo_2_ex_6_reps = $wo_2_ex_6_weight = "";


    $wo_3_type = $wo_3_ex_1_name = $wo_3_ex_1_sets = $wo_3_ex_1_reps = $wo_3_ex_1_weight = $wo_3_ex_2_name = $wo_3_ex_2_sets = $wo_3_ex_2_reps = $wo_3_ex_2_weight =  "";
    $wo_3_ex_3_name = $wo_3_ex_3_sets = $wo_3_ex_3_reps = $wo_3_ex_3_weight = $wo_3_ex_4_name = $wo_3_ex_4_sets = $wo_3_ex_4_reps = $wo_3_ex_4_weight = "";
    $wo_3_ex_5_name = $wo_3_ex_5_sets = $wo_3_ex_5_reps = $wo_3_ex_5_weight = $wo_3_ex_6_name = $wo_3_ex_6_sets = $wo_3_ex_6_reps = $wo_3_ex_6_weight = "";

    $wo_4_type = $wo_4_ex_1_name = $wo_4_ex_1_sets = $wo_4_ex_1_reps = $wo_4_ex_1_weight = $wo_4_ex_2_name = $wo_4_ex_2_sets = $wo_4_ex_2_reps = $wo_4_ex_2_weight =  "";
    $wo_4_ex_3_name = $wo_4_ex_3_sets = $wo_4_ex_3_reps = $wo_4_ex_3_weight = $wo_4_ex_4_name = $wo_4_ex_4_sets = $wo_4_ex_4_reps = $wo_4_ex_4_weight = "";
    $wo_4_ex_5_name = $wo_4_ex_5_sets = $wo_4_ex_5_reps = $wo_4_ex_5_weight = $wo_4_ex_6_name = $wo_4_ex_6_sets = $wo_4_ex_6_reps = $wo_4_ex_6_weight = "";


    if ((empty($_POST["wo_1_ex_1_reps"])) && (empty($_POST["wo_1_ex_2_weight"]))) {
        $nameErr = "hi";
    } else {

        $wo_1_type = $_POST["wo_1_type"];
        $wo_1_ex_1_name = $_POST["wo_1_ex_1_name"];
        $wo_1_ex_1_img = "imgs/" . $wo_1_ex_1_name . ".gif";
        $wo_1_ex_1_sets = $_POST["wo_1_ex_1_sets"];
        $wo_1_ex_1_reps = $_POST["wo_1_ex_1_reps"];
        $wo_1_ex_1_weight = $_POST["wo_1_ex_1_weight"];
        $wo_1_ex_2_name = $_POST["wo_1_ex_2_name"];
        $wo_1_ex_2_img = "imgs/" . $wo_1_ex_2_name . ".gif";
        $wo_1_ex_2_sets = $_POST["wo_1_ex_2_sets"];
        $wo_1_ex_2_reps = $_POST["wo_1_ex_2_reps"];
        $wo_1_ex_2_weight = $_POST["wo_1_ex_2_weight"];
        $wo_1_ex_3_name = $_POST["wo_1_ex_3_name"];
        $wo_1_ex_3_sets = $_POST["wo_1_ex_3_sets"];
        $wo_1_ex_3_img = "imgs/" . $wo_1_ex_3_name . ".gif";
        $wo_1_ex_3_reps = $_POST["wo_1_ex_3_reps"];
        $wo_1_ex_3_weight = $_POST["wo_1_ex_3_weight"];
        $wo_1_ex_4_name = $_POST["wo_1_ex_4_name"];
        $wo_1_ex_4_img = "imgs/" . $wo_1_ex_4_name . ".gif";
        $wo_1_ex_4_sets = $_POST["wo_1_ex_4_sets"];
        $wo_1_ex_4_reps = $_POST["wo_1_ex_4_reps"];
        $wo_1_ex_4_weight = $_POST["wo_1_ex_4_weight"];
        $wo_1_ex_5_name = $_POST["wo_1_ex_5_name"];
        $wo_1_ex_5_sets = $_POST["wo_1_ex_5_sets"];
        $wo_1_ex_5_img = "imgs/" . $wo_1_ex_5_name . ".gif";
        $wo_1_ex_5_reps = $_POST["wo_1_ex_5_reps"];
        $wo_1_ex_5_weight = $_POST["wo_1_ex_5_weight"];
        $wo_1_ex_6_name = $_POST["wo_1_ex_6_name"];
        $wo_1_ex_6_img = "imgs/" . $wo_1_ex_6_name . ".gif";
        $wo_1_ex_6_sets = $_POST["wo_1_ex_6_sets"];
        $wo_1_ex_6_reps = $_POST["wo_1_ex_6_reps"];
        $wo_1_ex_6_weight = $_POST["wo_1_ex_6_weight"];





        $wo_2_type = $_POST["wo_2_type"];
        $wo_2_ex_1_name = $_POST["wo_2_ex_1_name"];
        $wo_2_ex_1_img = "imgs/" . $wo_2_ex_1_name . ".gif";
        $wo_2_ex_1_sets = $_POST["wo_2_ex_1_sets"];
        $wo_2_ex_1_reps = $_POST["wo_2_ex_1_reps"];
        $wo_2_ex_1_weight = $_POST["wo_2_ex_1_weight"];
        $wo_2_ex_2_name = $_POST["wo_2_ex_2_name"];
        $wo_2_ex_2_img = "imgs/" . $wo_2_ex_2_name . ".gif";
        $wo_2_ex_2_sets = $_POST["wo_2_ex_2_sets"];
        $wo_2_ex_2_reps = $_POST["wo_2_ex_2_reps"];
        $wo_2_ex_2_weight = $_POST["wo_2_ex_2_weight"];
        $wo_2_ex_3_name = $_POST["wo_2_ex_3_name"];
        $wo_2_ex_3_sets = $_POST["wo_2_ex_3_sets"];
        $wo_2_ex_3_img = "imgs/" . $wo_2_ex_3_name . ".gif";
        $wo_2_ex_3_reps = $_POST["wo_2_ex_3_reps"];
        $wo_2_ex_3_weight = $_POST["wo_2_ex_3_weight"];
        $wo_2_ex_4_name = $_POST["wo_2_ex_4_name"];
        $wo_2_ex_4_img = "imgs/" . $wo_2_ex_4_name . ".gif";
        $wo_2_ex_4_sets = $_POST["wo_2_ex_4_sets"];
        $wo_2_ex_4_reps = $_POST["wo_2_ex_4_reps"];
        $wo_2_ex_4_weight = $_POST["wo_2_ex_4_weight"];
        $wo_2_ex_5_name = $_POST["wo_2_ex_5_name"];
        $wo_2_ex_5_img = "imgs/" . $wo_2_ex_5_name . ".gif";
        $wo_2_ex_5_sets = $_POST["wo_2_ex_5_sets"];
        $wo_2_ex_5_reps = $_POST["wo_2_ex_5_reps"];
        $wo_2_ex_5_weight = $_POST["wo_2_ex_5_weight"];
        $wo_2_ex_6_name = $_POST["wo_2_ex_6_name"];
        $wo_2_ex_6_img = "imgs/" . $wo_2_ex_6_name . ".gif";
        $wo_2_ex_6_sets = $_POST["wo_2_ex_6_sets"];
        $wo_2_ex_6_reps = $_POST["wo_2_ex_6_reps"];
        $wo_2_ex_6_weight = $_POST["wo_2_ex_6_weight"];






        $wo_3_type = $_POST["wo_3_type"];
        $wo_3_ex_1_name = $_POST["wo_3_ex_1_name"];
        $wo_3_ex_1_img = "imgs/" . $wo_3_ex_1_name . ".gif";
        $wo_3_ex_1_sets = $_POST["wo_3_ex_1_sets"];
        $wo_3_ex_1_reps = $_POST["wo_3_ex_1_reps"];
        $wo_3_ex_1_weight = $_POST["wo_3_ex_1_weight"];
        $wo_3_ex_2_name = $_POST["wo_3_ex_2_name"];
        $wo_3_ex_2_img = "imgs/" . $wo_3_ex_2_name . ".gif";
        $wo_3_ex_2_sets = $_POST["wo_3_ex_2_sets"];
        $wo_3_ex_2_reps = $_POST["wo_3_ex_2_reps"];
        $wo_3_ex_2_weight = $_POST["wo_3_ex_2_weight"];
        $wo_3_ex_3_name = $_POST["wo_3_ex_3_name"];
        $wo_3_ex_3_img = "imgs/" . $wo_3_ex_3_name . ".gif";
        $wo_3_ex_3_sets = $_POST["wo_3_ex_3_sets"];
        $wo_3_ex_3_reps = $_POST["wo_3_ex_3_reps"];
        $wo_3_ex_3_weight = $_POST["wo_3_ex_3_weight"];
        $wo_3_ex_4_name = $_POST["wo_3_ex_4_name"];
        $wo_3_ex_4_img = "imgs/" . $wo_3_ex_4_name . ".gif";
        $wo_3_ex_4_sets = $_POST["wo_3_ex_4_sets"];
        $wo_3_ex_4_reps = $_POST["wo_3_ex_4_reps"];
        $wo_3_ex_4_weight = $_POST["wo_3_ex_4_weight"];
        $wo_3_ex_5_name = $_POST["wo_3_ex_5_name"];
        $wo_3_ex_5_img = "imgs/" . $wo_3_ex_5_name . ".gif";
        $wo_3_ex_5_sets = $_POST["wo_3_ex_5_sets"];
        $wo_3_ex_5_reps = $_POST["wo_3_ex_5_reps"];
        $wo_3_ex_5_weight = $_POST["wo_3_ex_5_weight"];
        $wo_3_ex_6_name = $_POST["wo_3_ex_6_name"];
        $wo_3_ex_6_img = "imgs/" . $wo_3_ex_6_name . ".gif";
        $wo_3_ex_6_sets = $_POST["wo_3_ex_6_sets"];
        $wo_3_ex_6_reps = $_POST["wo_3_ex_6_reps"];
        $wo_3_ex_6_weight = $_POST["wo_3_ex_6_weight"];






        $wo_4_type = $_POST["wo_4_type"];
        $wo_4_ex_1_name = $_POST["wo_4_ex_1_name"];
        $wo_4_ex_1_img = "imgs/" . $wo_4_ex_1_name . ".gif";
        $wo_4_ex_1_sets = $_POST["wo_4_ex_1_sets"];
        $wo_4_ex_1_reps = $_POST["wo_4_ex_1_reps"];
        $wo_4_ex_1_weight = $_POST["wo_4_ex_1_weight"];
        $wo_4_ex_2_name = $_POST["wo_4_ex_2_name"];
        $wo_4_ex_2_img = "imgs/" . $wo_4_ex_2_name . ".gif";
        $wo_4_ex_2_sets = $_POST["wo_4_ex_2_sets"];
        $wo_4_ex_2_reps = $_POST["wo_4_ex_2_reps"];
        $wo_4_ex_2_weight = $_POST["wo_4_ex_2_weight"];
        $wo_4_ex_3_name = $_POST["wo_4_ex_3_name"];
        $wo_4_ex_3_img = "imgs/" . $wo_4_ex_3_name . ".gif";
        $wo_4_ex_3_sets = $_POST["wo_4_ex_3_sets"];
        $wo_4_ex_3_reps = $_POST["wo_4_ex_3_reps"];
        $wo_4_ex_3_weight = $_POST["wo_4_ex_3_weight"];
        $wo_4_ex_4_name = $_POST["wo_4_ex_4_name"];
        $wo_4_ex_4_sets = $_POST["wo_4_ex_4_sets"];
        $wo_4_ex_4_img = "imgs/" . $wo_4_ex_4_name . ".gif";
        $wo_4_ex_4_reps = $_POST["wo_4_ex_4_reps"];
        $wo_4_ex_4_weight = $_POST["wo_4_ex_4_weight"];
        $wo_4_ex_5_name = $_POST["wo_4_ex_5_name"];
        $wo_4_ex_5_sets = $_POST["wo_4_ex_5_sets"];
        $wo_4_ex_5_img = "imgs/" . $wo_4_ex_5_name . ".gif";
        $wo_4_ex_5_reps = $_POST["wo_4_ex_5_reps"];
        $wo_4_ex_5_weight = $_POST["wo_4_ex_5_weight"];
        $wo_4_ex_6_name = $_POST["wo_4_ex_6_name"];
        $wo_4_ex_6_img = "imgs/" . $wo_4_ex_6_name . ".gif";
        $wo_4_ex_6_sets = $_POST["wo_4_ex_6_sets"];
        $wo_4_ex_6_reps = $_POST["wo_4_ex_6_reps"];
        $wo_4_ex_6_weight = $_POST["wo_4_ex_6_weight"];


        $email = $_SESSION['email'];

        $query = "SELECT id FROM user WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];


        $sql =  "INSERT INTO workout_plan(nume, user_id) VALUES ('$email', $userId)";
        mysqli_query($db, $sql);


      
      
        
      if (mysqli_affected_rows($db) > 0) {
        $woplan_id = mysqli_insert_id($db);
       // echo "Registration ID: " . $mp_id;
      } else {
        echo "Error inserting registration into the database.";
      }

        echo ($woplan_id);

        // Check if a registration exists for the current user ID
        $query = "SELECT * FROM current_plans_for_client WHERE user_id = $userId";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Update the registration with the mp_id
            $sql = "UPDATE current_plans_for_client SET workout_plan_id = $woplan_id WHERE user_id = $userId";
            echo $sql;
            mysqli_query($db, $sql);
        } else {
            $sql =  "INSERT INTO current_plans_for_client(user_id, workout_plan_id) VALUES ($userId, $woplan_id)";
            echo $sql;
            mysqli_query($db, $sql);


        }


        $sql =  "INSERT INTO workout(current_workout_plan_id, tip, numb) VALUES ($woplan_id, '$wo_1_type', 1)";
        mysqli_query($db, $sql);
        //echo $sql;

        $sql =  "INSERT INTO workout(current_workout_plan_id, tip, numb) VALUES ($woplan_id, '$wo_2_type', 2)";
        mysqli_query($db, $sql);
        //echo $sql;

        $sql =  "INSERT INTO workout(current_workout_plan_id, tip, numb) VALUES ($woplan_id, '$wo_3_type', 3)";
        mysqli_query($db, $sql);
        // echo $sql;

        $sql =  "INSERT INTO workout(current_workout_plan_id, tip, numb) VALUES ($woplan_id, '$wo_4_type', 4)";
        mysqli_query($db, $sql);
        // echo $sql;





        $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$woplan_id} AND numb = 1";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $wo_id = $row['id'];

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_1_name', '$wo_1_ex_1_sets', '$wo_1_ex_1_reps', '$wo_1_ex_1_weight', 1, '$wo_1_ex_1_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_2_name', '$wo_1_ex_2_sets', '$wo_1_ex_2_reps', '$wo_1_ex_2_weight', 2, '$wo_1_ex_2_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_3_name', '$wo_1_ex_3_sets', '$wo_1_ex_3_reps', '$wo_1_ex_3_weight', 3, '$wo_1_ex_3_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_4_name', '$wo_1_ex_4_sets', '$wo_1_ex_4_reps', '$wo_1_ex_4_weight', 4, '$wo_1_ex_4_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_5_name', '$wo_1_ex_5_sets', '$wo_1_ex_5_reps', '$wo_1_ex_5_weight', 5, '$wo_1_ex_5_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_1_ex_6_name', '$wo_1_ex_6_sets', '$wo_1_ex_6_reps', '$wo_1_ex_6_weight', 6, '$wo_1_ex_6_img')";
        mysqli_query($db, $sql);



        $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$woplan_id} AND numb = 2";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        $wo_id = $row['id'];


        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_1_name', '$wo_2_ex_1_sets', '$wo_2_ex_1_reps', '$wo_2_ex_1_weight', 1, '$wo_2_ex_1_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_2_name', '$wo_2_ex_2_sets', '$wo_2_ex_2_reps', '$wo_2_ex_2_weight', 2, '$wo_2_ex_2_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_3_name', '$wo_2_ex_3_sets', '$wo_2_ex_3_reps', '$wo_2_ex_3_weight', 3, '$wo_2_ex_3_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_4_name', '$wo_2_ex_4_sets', '$wo_2_ex_4_reps', '$wo_2_ex_4_weight', 4, '$wo_2_ex_4_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_5_name', '$wo_2_ex_5_sets', '$wo_2_ex_5_reps', '$wo_2_ex_5_weight', 5, '$wo_2_ex_5_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_2_ex_6_name', '$wo_2_ex_6_sets', '$wo_2_ex_6_reps', '$wo_2_ex_6_weight', 6, '$wo_2_ex_6_img')";
        mysqli_query($db, $sql);


        $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$woplan_id} AND numb = 3";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $wo_id = $row['id'];

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_1_name', '$wo_3_ex_1_sets', '$wo_3_ex_1_reps', '$wo_3_ex_1_weight', 1, '$wo_3_ex_1_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_2_name', '$wo_3_ex_2_sets', '$wo_3_ex_2_reps', '$wo_3_ex_2_weight', 2, '$wo_3_ex_2_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_3_name', '$wo_3_ex_3_sets', '$wo_3_ex_3_reps', '$wo_3_ex_3_weight', 3, '$wo_3_ex_3_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_4_name', '$wo_3_ex_4_sets', '$wo_3_ex_4_reps', '$wo_3_ex_4_weight', 4, '$wo_3_ex_4_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_5_name', '$wo_3_ex_5_sets', '$wo_3_ex_5_reps', '$wo_3_ex_5_weight', 5, '$wo_3_ex_5_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_3_ex_6_name', '$wo_3_ex_6_sets', '$wo_3_ex_6_reps', '$wo_3_ex_6_weight', 6, '$wo_3_ex_6_img')";
        mysqli_query($db, $sql);



        $query = "SELECT id FROM workout WHERE current_workout_plan_id = {$woplan_id} AND numb = 4";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $wo_id = $row['id'];

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_1_name', '$wo_4_ex_1_sets', '$wo_4_ex_1_reps', '$wo_4_ex_1_weight', 1, '$wo_4_ex_1_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_2_name', '$wo_4_ex_2_sets', '$wo_4_ex_2_reps', '$wo_4_ex_2_weight', 2, '$wo_4_ex_2_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_3_name', '$wo_4_ex_3_sets', '$wo_4_ex_3_reps', '$wo_4_ex_3_weight', 3, '$wo_4_ex_3_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_4_name', '$wo_4_ex_4_sets', '$wo_4_ex_4_reps', '$wo_4_ex_4_weight', 4, '$wo_4_ex_4_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_5_name', '$wo_4_ex_5_sets', '$wo_4_ex_5_reps', '$wo_4_ex_5_weight', 5, '$wo_4_ex_5_img')";
        mysqli_query($db, $sql);

        $sql =  "INSERT INTO exercise(workout_id, nume, nr_sets, nr_reps, weight_used, numb, img) VALUES ($wo_id, '$wo_4_ex_6_name', '$wo_4_ex_6_sets', '$wo_4_ex_6_reps', '$wo_4_ex_6_weight', 6, '$wo_4_ex_6_img')";
        mysqli_query($db, $sql);



         $results = mysqli_query($db, $sql);
        
        if (!$results)
            die('Invalid querry:' . mysqli_error($db));
        else {
            echo "Inregistrarea a fost adaugata.</br>";
              echo '<script>window.location.href = "your_account_user.php";</script>';
              exit;
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

     <div id="exerciseInfo">
         <p>lksdfa</p>
     </div>

     <div id="exerciseData">
         <p>NO</p>
     </div>

     <div id="wo_type">
         <p>NO</p>
     </div>


     <form name="adaugare" id="adaugare" method="POST" action="" style="max-width:none; width:100%;">
         <div class="grid-container" style="padding-top: 40px; max-width: 100%; text-align: center;">
             <div class="grid-x grid-margin-x">
                 <div class="cell small-12 medium-12 large-2">
                     <p style="margin-top: 60px">WORKOUT #1</p>
                     <label style="width: 70%;margin: 0 auto;">
                         <select class="workout_types" id="1" name="wo_1_type">
                             <option value="FullBody">Full Body</option>
                             <option value="UpperBody">Upper Body</option>
                             <option value="LowerBody">Lower Body</option>
                         </select>
                     </label>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                 <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg1" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_1_name" class="exercise-name" id="nume_ex1" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="1" type="text" name="wo_1_ex_1_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="1" type="text" name="wo_1_ex_1_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="" type="text" name="wo_1_ex_1_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>
                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg2" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_2_name" class="exercise-name" id="nume_ex2" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="2" type="text" name="wo_1_ex_2_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="2" type="text" name="wo_1_ex_2_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="2" type="text" name="wo_1_ex_2_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg3" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_3_name" class="exercise-name" id="nume_ex3" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="3" type="text" name="wo_1_ex_3_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="3" type="text" name="wo_1_ex_3_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="3" type="text" name="wo_1_ex_3_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg4" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_4_name" class="exercise-name" id="nume_ex4" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="4" type="text" name="wo_1_ex_4_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="4" type="text" name="wo_1_ex_4_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="4" type="text" name="wo_1_ex_4_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg5" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_5_name" class="exercise-name" id="nume_ex5" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="5" type="text" name="wo_1_ex_5_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="5" type="text" name="wo_1_ex_5_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="5" type="text" name="wo_1_ex_5_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg6" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_1_ex_6_name" class="exercise-name" id="nume_ex6" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="6" type="text" name="wo_1_ex_6_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="6" type="text" name="wo_1_ex_6_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="6" type="text" name="wo_1_ex_6_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;"></div>







                 <div class="cell small-12 medium-12 large-2">
                     <p style="margin-top: 60px">WORKOUT #2</p>
                     <label style="width: 70%;margin: 0 auto;">
                         <select class="workout_types" id="2" name="wo_2_type">
                             <option value="FullBody">Full Body</option>
                             <option value="UpperBody">Upper Body</option>
                             <option value="LowerBody">Lower Body</option>
                         </select>
                     </label>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg7" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_1_name" class="exercise-name" id="nume_ex7" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="7" type="text" name="wo_2_ex_1_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="7" type="text" name="wo_2_ex_1_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="7" type="text" name="wo_2_ex_1_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg8" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_2_name" class="exercise-name" id="nume_ex8" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="8" type="text" name="wo_2_ex_2_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="8" type="text" name="wo_2_ex_2_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="8" type="text" name="wo_2_ex_2_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg9" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_3_name" class="exercise-name" id="nume_ex9" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="9" type="text" name="wo_2_ex_3_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps " id="9" type="text" name="wo_2_ex_3_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="9" type="text" name="wo_2_ex_3_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg10" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_4_name" class="exercise-name" id="nume_ex10" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="10" type="text" name="wo_2_ex_4_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="10" type="text" name="wo_2_ex_4_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="10" type="text" name="wo_2_ex_4_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg11" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_5_name" class="exercise-name" id="nume_ex11" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="11" type="text" name="wo_2_ex_5_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="11" type="text" name="wo_2_ex_5_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="11" type="text" name="wo_2_ex_5_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg12" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_2_ex_6_name" class="exercise-name" id="nume_ex11" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="12" type="text" name="wo_2_ex_6_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="12" type="text" name="wo_2_ex_6_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="12" type="text" name="wo_2_ex_6_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                 </div>





                 <div class="cell small-12 medium-12 large-2">
                     <p style="margin-top: 60px">WORKOUT #3</p>
                     <label style="width: 70%;margin: 0 auto;">
                         <select class="workout_types" id="3" name="wo_3_type">
                             <option value="FullBody">Full Body</option>
                             <option value="UpperBody">Upper Body</option>
                             <option value="LowerBody">Lower Body</option>
                         </select>
                     </label>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg13" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_1_name" class="exercise-name" id="nume_ex13" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="13" type="text" name="wo_3_ex_1_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="13" type="text" name="wo_3_ex_1_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="13" type="text" name="wo_3_ex_1_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>
                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg14" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_2_name" class="exercise-name" id="nume_ex14" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="14" type="text" name="wo_3_ex_2_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="14" type="text" name="wo_3_ex_2_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="14" type="text" name="wo_3_ex_2_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg15" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_3_name" class="exercise-name" id="nume_ex15" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="15" type="text" name="wo_3_ex_3_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="15" type="text" name="wo_3_ex_3_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="15" type="text" name="wo_3_ex_3_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg16" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_4_name" class="exercise-name" id="nume_ex16" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="16" type="text" name="wo_3_ex_4_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="16" type="text" name="wo_3_ex_4_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="16" type="text" name="wo_3_ex_4_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg17" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_5_name" class="exercise-name" id="nume_ex17" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="17" type="text" name="wo_3_ex_5_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="17" type="text" name="wo_3_ex_5_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="17" type="text" name="wo_3_ex_5_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg18" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_3_ex_6_name" class="exercise-name" id="nume_ex18" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="18" type="text" name="wo_3_ex_6_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="18" type="text" name="wo_3_ex_6_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="18" type="text" name="wo_3_ex_6_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                 </div>










                 <div class="cell small-12 medium-12 large-2">
                     <p style="margin-top: 60px">WORKOUT #4</p>
                     <label style="width: 70%;margin: 0 auto;">
                         <select class="workout_types" id="4" name="wo_4_type">
                             <option value="FullBody">Full Body</option>
                             <option value="UpperBody">Upper Body</option>
                             <option value="LowerBody">Lower Body</option>
                         </select>
                     </label>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg19" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_1_name" class="exercise-name" id="nume_ex19" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="19" type="text" name="wo_4_ex_1_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="19" type="text" name="wo_4_ex_1_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="19" type="text" name="wo_4_ex_1_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg20" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_2_name" class="exercise-name" id="nume_ex20" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="20" type="text" name="wo_4_ex_2_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="20" type="text" name="wo_4_ex_2_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="20" type="text" name="wo_4_ex_2_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg21" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_3_name" class="exercise-name" id="nume_ex21" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="21" type="text" name="wo_4_ex_3_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="21" type="text" name="wo_4_ex_3_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="21" type="text" name="wo_4_ex_3_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg22" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_4_name" class="exercise-name" id="nume_ex22" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="22" type="text" name="wo_4_ex_4_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="22" type="text" name="wo_4_ex_4_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="22" type="text" name="wo_4_ex_4_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-3" style="display: flex;">
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg23" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_5_name" class="exercise-name" id="nume_ex23" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="23" type="text" name="wo_4_ex_5_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="23" type="text" name="wo_4_ex_5_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="23" type="text" name="wo_4_ex_5_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                     <div style="width: 50%; padding: 20px; padding-bottom: 0;">
                         <a href="add-exercise.php"><img class="clickable-image" id="exerciseImg24" src="imgs/plll.jpg"></a>
                         <input type="text" name="wo_4_ex_6_name" class="exercise-name" id="nume_ex24" readonly>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0; height: 40px;">
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputSets" id="24" type="text" name="wo_4_ex_6_sets" required="" style="text-align: center;">
                                 <label>Sets</label>
                             </div>
                             <div style="width: 20%; margin: 0; padding: 0;">
                                 <p style="padding-top: 10px;">X</p>
                             </div>
                             <div class="user-box" style="width: 40%; margin: 0; padding: 0; height: 20px; flex-direction: column; align-items: center;">
                                 <input class="inputReps" id="24" type="text" name="wo_4_ex_6_reps" required="" style="text-align: center;">
                                 <label>Reps</label>
                             </div>
                         </div>
                         <div class="login-box" style="display: flex; margin: 0; padding: 0;">
                             <div class="user-box" style="margin: 0; padding: 0; width: 100%;">
                                 <input class="inputWeight" id="24" type="text" name="wo_4_ex_6_weight" required="" style="padding: 0;">
                                 <label>Weight</label>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="cell small-12 medium-12 large-1" style="padding-top: 40px;">

                 </div>



                 <div class="cell small-12 medium-12 large-12">
                     <div style="display: flex; justify-content: center; padding: 40px">
                         <button type="submit" class="btn" name="submit">Submit</button>
                     </div>
                 </div>




             </div>
         </div>
     </form>



     <script>
         var exercises1 = JSON.parse(localStorage.getItem('exercises1')) || [];
         var exercise_data = JSON.parse(localStorage.getItem('exercise_data')) || [];
         var workout_types = JSON.parse(localStorage.getItem('workout_types')) || [];




         var wo_types = document.querySelectorAll(".workout_types");
         wo_types.forEach(function(type) {
             type.addEventListener('change', function() {

                 var value = this.value;
                 var nr = this.getAttribute('id');

                 if (!workout_types[nr]) {
                     workout_types[nr] = {};
                 }

                 workout_types[nr].type = value;
                 workout_types[nr].id = nr;

                 localStorage.setItem('workout_types', JSON.stringify(workout_types));

                 var workout_types_string = JSON.stringify(workout_types);


                 upate_wo_type_div();



             })
         })


         var input_sets = document.querySelectorAll(".inputSets");
         input_sets.forEach(function(sets) {
             sets.addEventListener('input', function() {




                 var value = this.value;
                 var nr = this.getAttribute('id');

                 if (!exercise_data[nr]) {
                     exercise_data[nr] = {};
                 }

                 exercise_data[nr].sets = value;
                 exercise_data[nr].id = nr;

                 localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

                 var exerciseDataString = JSON.stringify(exercise_data);


                 updateExerciseDataDiv();



             })
         })


         var input_reps = document.querySelectorAll(".inputReps");
         input_reps.forEach(function(reps) {
             reps.addEventListener('input', function() {

                 //alert('Reps!');

                 var value = this.value;
                 var nr = this.getAttribute('id');

                 if (!exercise_data[nr]) {
                     exercise_data[nr] = {};
                 }

                 exercise_data[nr].reps = value;
                 exercise_data[nr].id = nr;


                 localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

                 updateExerciseDataDiv();


             })
         })


         var input_weight = document.querySelectorAll(".inputWeight");
         input_weight.forEach(function(weight) {
             weight.addEventListener('input', function() {

                 //alert('Weight!');

                 var value = this.value;
                 var nr = this.getAttribute('id');

                 if (!exercise_data[nr]) {
                     exercise_data[nr] = {};
                 }

                 exercise_data[nr].weight = value;
                 exercise_data[nr].id = nr;


                 localStorage.setItem('exercise_data', JSON.stringify(exercise_data));

                 updateExerciseDataDiv();

             })
         })


         var clickableImages = document.querySelectorAll('.clickable-image');
         clickableImages.forEach(function(image) {
             image.addEventListener('click', function() {
                 //alert('poza!');

                 var exerciseId = this.id; // Get the ID of the clicked image
                 localStorage.setItem('exerciseId', exerciseId); // Save the ID in local storage
             });
         });


         var exerciseName = localStorage.getItem('exerciseName');
         var exerciseImage = localStorage.getItem('exerciseImage');
         var exerciseId = localStorage.getItem('exerciseId');


         var exercise = {
             id: exerciseId,
             gif: exerciseImage,
             name: exerciseName,
         };

         updateExerciseInArray(exercise);

         updateExerciseInfoDiv();

         localStorage.setItem('exercises1', JSON.stringify(exercises1));


         function updateExerciseInArray(newExercise) {
             var existingExerciseIndex = -1;

             // Find the index of the existing exercise with the same ID
             for (var i = 0; i < exercises1.length; i++) {
                 if (exercises1[i].id === newExercise.id) {
                     existingExerciseIndex = i;
                     break;
                 }
             }

             if (existingExerciseIndex !== -1) {
                 // Replace the existing exercise with the new exercise
                 exercises1[existingExerciseIndex] = newExercise;
             } else {
                 // Add the new exercise to the array
                 exercises1.push(newExercise);
             }


         }

         function updateExerciseInfoDiv() {
             var exerciseInfoDiv = document.getElementById('exerciseInfo');
             exerciseInfoDiv.textContent = '';

             for (var i = 0; i < exercises1.length; i++) {
                 var exercise = exercises1[i];
                 var exerciseId = exercise.id;
                 var exerciseImage = exercise.gif;
                 var exerciseName = exercise.name;

                 var existingEntryIndex = -1;
                 for (var j = 0; j < exerciseInfoDiv.children.length; j++) {
                     if (exerciseInfoDiv.children[j].dataset.exerciseId === exerciseId) {
                         existingEntryIndex = j;
                         break;
                     }
                 }

                 var no = exerciseId.replace('exerciseImg', '');
                 if (existingEntryIndex !== -1) {
                     var existingEntry = exerciseInfoDiv.children[existingEntryIndex];
                     existingEntry.textContent = 'Exercise ' + no + ':\n' +
                         'ID: ' + exerciseId + '\n' +
                         'GIF: ' + exerciseImage + '\n' +
                         'Name: ' + exerciseName + '\n\n';
                     existingEntry.dataset.exerciseId = exerciseId;
                 } else {
                     var exerciseEntry = document.createElement('div');
                     exerciseEntry.textContent = 'Exercise ' + no + ':\n' +
                         'ID: ' + exerciseId + '\n' +
                         'GIF: ' + exerciseImage + '\n' +
                         'Name: ' + exerciseName + '\n\n';
                     exerciseEntry.dataset.exerciseId = exerciseId;
                     exerciseInfoDiv.appendChild(exerciseEntry);
                 }

                 var exerciseChangeImg = document.getElementById(exerciseId);
                 exerciseChangeImg.setAttribute('src', exerciseImage);
             }

             var exerciseNameElements = document.getElementsByClassName('exercise-name');
             for (var i = 0; i < exercises1.length; i++) {
                 var name = exercises1[i].name;
                 var id = exercises1[i].id;
                 var gif = exercises1[i].gif;

                 var savedem = id.replace('exerciseImg', '');

                 console.log(name, id, gif, savedem);
                 exerciseNameElements[savedem - 1].value = name;
             }

         }




         function updateExerciseDataDiv() {

             var ExerciseDataDiv = document.getElementById('exerciseData');

             var exercise_data = localStorage.getItem('exercise_data') || '';

             var exerciseDataString = JSON.stringify(exercise_data);

             ExerciseDataDiv.textContent = exerciseDataString;



         }





         updateExerciseDataDiv();

         upate_wo_type_div();

         function upate_wo_type_div() {


             var wo_type_div = document.getElementById('wo_type');

             var workout_types = localStorage.getItem('workout_types') || '';

             var wo_string = JSON.stringify(workout_types);

             wo_type_div.textContent = wo_string;


         }

         document.addEventListener('DOMContentLoaded', function() {


             var exercise_data = JSON.parse(localStorage.getItem('exercise_data')) || [];

             for (var i = 1; i < 25; i++) {

                 var ex = JSON.stringify(exercise_data[i]);

                 var ia = exercise_data[i];
                 if (ia) {
                     var sets = exercise_data[i].sets;
                     var adauga_sets = document.querySelector('.inputSets[id="' + i + '"]');

                     if (sets !== undefined && sets !== '') {
                         adauga_sets.value = sets;
                     } else {
                         continue;
                     }


                     var reps = exercise_data[i].reps;
                     var adauga_reps = document.querySelector('.inputReps[id="' + i + '"]');

                     if (reps !== undefined && reps !== '') {
                         adauga_reps.value = reps;
                     } else {
                         continue;
                     }



                     var weight = exercise_data[i].weight;
                     var adauga_weight = document.querySelector('.inputWeight[id="' + i + '"]');

                     if (weight !== undefined && weight !== '') {
                         adauga_weight.value = weight;
                     } else {
                         continue;
                     }

                 } else {
                     continue;
                 }




             }

         });
     </script>


     <script src="js/vendor/jquery.js"></script>
     <script src="js/vendor/what-input.js"></script>
     <script src="js/vendor/foundation.js"></script>
     <script src="js/app.js"></script>
 </body>

 </html>