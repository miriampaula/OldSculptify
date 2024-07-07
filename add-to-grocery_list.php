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

    <form>
    <div id="alo">
        <p>al</p>
    </div>
    
    
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-0 medium-3 large-3"></div>
            <div style="padding-top: 60px; padding-bottom: 60px;" class="cell small-12 medium-6 large-6">
                <table style="margin: 0 auto;
      border-radius: 30px;
      overflow: hidden;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      border-collapse: separate;">
                    <thead>
                        <tr>
                            <td colspan="5" style="text-align: center;">YOUR GROCERY LIST</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <a href="#" class="custom-btn2 btn-3" style="width: 100%; height: 40px; font-size: medium;">+ ingredient</a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
                            <td style="width: 10%; padding-bottom: 0;">
                                <input type="checkbox" id="got" value="got">
                            </td>
                            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
                                <p class="cantitate">30</p>
                            </td>
                            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
                                <p class="tip_cantitate">gr</p>
                            </td>
                            <td style="width: 50%; padding-bottom: 0;">
                                <p>Nume ingredient</p>
                            </td>
                            <td style="width: 10%;">
                                <a href="#"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
                            </td>
                        </tr>





                    </tbody>
                </table>
            </div>
            <div class="cell small-0 medium-3 large-3"></div>


        </div>
    </div>

    <script>
        var mese = JSON.parse(localStorage.getItem('mese')) || [];

        var exerciseInfoDiv = document.getElementById('alo');
        var iduri = JSON.parse(localStorage.getItem('iduri')) || [];
        for (var i = 0; i < 21; i++) {
            iduri[i] = mese[i].reteta_bd_id;
        }
        exerciseInfoDiv.textContent = JSON.stringify(iduri);

        function fetch_ingredients() {


            echo("hi");
            var pairs = [];

            for (var i = 1; i <= 21; i++) {
                pairs.push([i, iduri[i - 1]]);
            }




            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the PHP file URL
            var url = 'fetch_ingredients.php';
            var method = 'POST';


            var recipeName = document.getElementById('recipeName').innerHTML;

            var iauite = JSON.stringify(pairs);

            
            alert(iauite);

            // Set up the AJAX request
            xhr.open(method, url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Set up the callback function to handle the response
            xhr.onreadystatechange = function() {
                alert(xhr.readyState)
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the PHP file
                    var response = JSON.parse(xhr.responseText);
                    alert("bunaaa");
                } else {
                    alert(xhr.responseText);
                }
            };

            // Send the AJAX request with the data
            xhr.send(iauite);


        }

        fetch_ingredients();
    </script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>