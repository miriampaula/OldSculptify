<?php


session_start();

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
} else {
    echo "No recipe ID provided.";
}





if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    echo "Welcome , " . $email . "! You are logged in.";
}







$f_recipe_name = $f_recipe_img = $f_calories = $f_time = $f_description = $f_directions = $f_prot = $f_carbs = $f_fats = $f_fibers = $f_sugar = "";


$sqlv = "SELECT * FROM recipe WHERE id = $recipeId";


$resultv = mysqli_query($db, $sqlv);


$myrow = mysqli_fetch_array($resultv);
$f_recipe_name = $myrow['recname'];
$f_calories = $myrow['calories'];
$f_time = $myrow['time_to_pret'];
$f_recipe_img = $myrow['recipe_img'];
$f_description = $myrow['descripti'];
$f_directions = $myrow['directions'];
$f_prot = $myrow['grams_protein'];
$f_servings = $myrow['servings'];
$f_carbs = $myrow['grams_carbs'];
$f_fats = $myrow['grams_fats'];
$f_fibers = $myrow['grams_fibers'];
$f_sugar = $myrow['grams_sugar'];




$name_for_recipe = $recipe_image = $servings =  $calories = $time = $description =  $directions = $prot = $carbs = $fats = $fibers = $sugar = "";

$ingredients = array();

if ((empty($_POST["recipe_name"])) && (empty($_POST["calories"])) && (empty($_POST["directions"]))) {
    $nameErr = "hi";
    echo $nameErr;
} else {


    // Iterate over the table rows
    foreach ($_POST as $key => $value) {
        if (preg_match('/^qty(\d+)$/', $key, $matches)) {
            $rowIndex = $matches[1]; // Extract the numeric part of the input name


            // Retrieve the corresponding ingredient
            $ingredient = array(
                'qty' => $_POST["qty{$rowIndex}"],
                'msr' => $_POST["msr{$rowIndex}"],
                'ingr' => $_POST["ingr{$rowIndex}"]
            );

            // Add the ingredient to the array
            $ingredients[$rowIndex] = $ingredient;
        }
    }








    $name_for_recipe = $_POST["name_for_recipe"];

    $recipe_image = $_POST["img_src"];
    $calories = $_POST["calories"];
    $time = $_POST["time"];
    $description = $_POST["description"];
    $directions = $_POST["directions"];
    $prot = $_POST["prot"];
    $carbs = $_POST['carbs'];
    $fats = $_POST['fats'];
    $fibers = $_POST['fibers'];
    $sugar = $_POST['sugar'];
    $servings = $_POST['servings'];



    $sqlv = "SELECT * FROM recipe WHERE id = $recipeId";
    $resultv = mysqli_query($db, $sqlv);

    if (!$resultv) {
        // Error handling if the query execution fails
        echo "Failed to execute query: " . mysqli_error($db);
    } else {
        $myrow = mysqli_fetch_array($resultv);

        if (!$myrow) {
            // Error handling if no rows are found
            echo "No rows found for recipe with ID $recipeId";
        } else {
            $registrationId = $myrow['id'];
        }
    }





    $sql = "UPDATE recipe SET recipe_img = '$recipe_image', time_to_pret = '$time', calories = $calories, grams_protein = $prot,  grams_carbs = $carbs, grams_fats = $fats, grams_fibers = $fibers, grams_sugar = $sugar, servings = $servings WHERE id = $registrationId";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }





    $stmt = $db->prepare("UPDATE recipe SET recname=?, descripti=?, directions=? WHERE id=?");

    if (!$stmt) {
        // Error handling if the statement preparation fails
        echo "Failed to prepare statement: " . $db->error;
    } else {
        // Binding the parameters
        if (!$stmt->bind_param("sssi", $name_for_recipe, $description, $directions, $recipeId)) {
            // Error handling if the binding fails
            echo "Failed to bind parameters: " . $stmt->error;
        } else {
            // Execute the statement
            if (!$stmt->execute()) {
                // Error handling if the execution fails
                echo "Failed to execute statement: " . $stmt->error;
            } else {
                echo "Update statement executed successfully.";
                echo $name_for_recipe;
            }
        }

        $stmt->close();
    }




    if (isset($_POST['vegan'])) {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'vegan' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Registration already exists for the specified category and recipe ID.";
        } else {
            // Insert the registration
            $sql = "INSERT INTO category_for_recipe (category, recipe_id) VALUES ('vegan', $recipeId)";
            if (mysqli_query($db, $sql)) {
                echo "Registration inserted successfully.";
            } else {
                echo "Error inserting registration: " . mysqli_error($db);
            }
        }
    } else {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'vegan' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $deleteSql = "DELETE FROM category_for_recipe WHERE category = 'vegan' AND recipe_id = $recipeId";
            if (mysqli_query($db, $deleteSql)) {
                echo "Existing registration deleted successfully.";
            } else {
                echo "Error deleting existing registration: " . mysqli_error($db);
            }
        }
    }

    if (isset($_POST['gluten_free'])) {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'gluten_free' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Registration already exists for the specified category and recipe ID.";
        } else {
            // Insert the registration
            $sql = "INSERT INTO category_for_recipe (category, recipe_id) VALUES ('gluten_free', $recipeId)";
            if (mysqli_query($db, $sql)) {
                echo "Registration inserted successfully.";
            } else {
                echo "Error inserting registration: " . mysqli_error($db);
            }
        }
    } else {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'gluten_free' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $deleteSql = "DELETE FROM category_for_recipe WHERE category = 'gluten_free' AND recipe_id = $recipeId";
            if (mysqli_query($db, $deleteSql)) {
                echo "Existing registration deleted successfully.";
            } else {
                echo "Error deleting existing registration: " . mysqli_error($db);
            }
        }
    }

    if (isset($_POST['quick'])) {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'quick' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Registration already exists for the specified category and recipe ID.";
        } else {
            // Insert the registration
            $sql = "INSERT INTO category_for_recipe (category, recipe_id) VALUES ('quick', $recipeId)";
            if (mysqli_query($db, $sql)) {
                echo "Registration inserted successfully.";
            } else {
                echo "Error inserting registration: " . mysqli_error($db);
            }
        }
    } else {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'quick' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $deleteSql = "DELETE FROM category_for_recipe WHERE category = 'quick' AND recipe_id = $recipeId";
            if (mysqli_query($db, $deleteSql)) {
                echo "Existing registration deleted successfully.";
            } else {
                echo "Error deleting existing registration: " . mysqli_error($db);
            }
        }
    }

    if (isset($_POST['diaryfree'])) {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'diaryfree' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Registration already exists for the specified category and recipe ID.";
        } else {
            // Insert the registration
            $sql = "INSERT INTO category_for_recipe (category, recipe_id) VALUES ('diaryfree', $recipeId)";
            if (mysqli_query($db, $sql)) {
                echo "Registration inserted successfully.";
            } else {
                echo "Error inserting registration: " . mysqli_error($db);
            }
        }
    } else {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'diaryfree' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $deleteSql = "DELETE FROM category_for_recipe WHERE category = 'diaryfree' AND recipe_id = $recipeId";
            if (mysqli_query($db, $deleteSql)) {
                echo "Existing registration deleted successfully.";
            } else {
                echo "Error deleting existing registration: " . mysqli_error($db);
            }
        }
    }

    if (isset($_POST['vegeterian'])) {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'vegeterian' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Registration already exists for the specified category and recipe ID.";
        } else {
            // Insert the registration
            $sql = "INSERT INTO category_for_recipe (category, recipe_id) VALUES ('vegeterian', $recipeId)";
            if (mysqli_query($db, $sql)) {
                echo "Registration inserted successfully.";
            } else {
                echo "Error inserting registration: " . mysqli_error($db);
            }
        }
    } else {
        $sql = "SELECT * FROM category_for_recipe WHERE category = 'vegeterian' AND recipe_id = $recipeId";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $deleteSql = "DELETE FROM category_for_recipe WHERE category = 'vegeterian' AND recipe_id = $recipeId";
            if (mysqli_query($db, $deleteSql)) {
                echo "Existing registration deleted successfully.";
            } else {
                echo "Error deleting existing registration: " . mysqli_error($db);
            }
        }
    }

    foreach ($ingredients as $ingredient) {
        $qty = $ingredient['qty'];
        $msr = $ingredient['msr'];
        $ingr = $ingredient['ingr'];


        $sqlCheck = "SELECT COUNT(*) AS count FROM ingredient_for_recipe WHERE ingredient = '$ingr' AND recipe_id = $recipeId";
        $resultCheck = mysqli_query($db, $sqlCheck);
        $rowCheck = mysqli_fetch_assoc($resultCheck);
        $count = $rowCheck['count'];

        if ($count > 0) {
            // Step 2: Update the registration
            $sql = "UPDATE ingredient_for_recipe SET quantity = '$qty', measurement = '$msr' WHERE ingredient = '$ingr' AND recipe_id = $recipeId";
            // Execute the update query here
            echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
        } else {
            // Step 3: Create the registration
            $sql = "INSERT INTO ingredient_for_recipe (ingredient, quantity, measurement, recipe_id) VALUES ('$ingr', '$qty', '$msr', $recipeId)";
            // Execute the insert query here
            echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
        }
    }




    // Step 1: Get the list of existing ingredients for the recipeId
    $sqlExistingIngredients = "SELECT ingredient FROM ingredient_for_recipe WHERE recipe_id = $recipeId";
    $resultExistingIngredients = mysqli_query($db, $sqlExistingIngredients);


    // Create an array to store existing ingredients
    $existingIngredients_in_db = array();
    while ($row = mysqli_fetch_assoc($resultExistingIngredients)) {
        $existingIngredients_in_db[] = $row['ingredient'];
    }


    // Print the array
    echo ("IN DATA BASE WE HAVE:");
    echo "<pre>";
    print_r($existingIngredients_in_db);
    echo "</pre>";

    echo ("ON SITE WE HAVE:");
    echo "<pre>";
    print_r($ingredients);
    echo "</pre>";
    /*
    foreach ($existingIngredients_in_db as $ingredient) {

        if (!in_array($ingredient, $ingredients)) {

            $sqlDelete = "DELETE FROM ingredient_for_recipe WHERE recipe_id = $recipeId AND ingredient = '$ingredient'";
            echo $sqlDelete;
            if ($db->query($sqlDelete) === TRUE) {
                echo "Records deleted successfully";
            } else {
                echo "Error deleting records: " . $db->error;
            }
        }
    }*/
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... Process the form submission

       echo '<script>localStorage.clear();</script>';
      header("Location: recipe.php?id=" . $recipeId);
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

    <style>
        .preview-image {
            max-width: 100%;
            max-height: 300px;
        }
    </style>
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


    <div id="date"></div>
    <div id="ing"></div>




    <div class="grid-container" style="padding-top: 40px; text-align: center;">
        <div class="grid-x grid-margin-x">


            <form name="adaugare" id="myForm" method="POST" action="" enctype="multipart/form-data">


                <div class="cell small-2 medium-2 large-2 text-right">
                    <a style="font-size: 50px; color: black;" href="javascript:history.back()">&#8678</a>
                </div>

                <div class="cell small-10 medium-8 large-8">
                    <label for="name_for_recipe">Recipe Name:</label>
                    <input value="<?php echo $f_recipe_name; ?>" class="input-update" type="text" id="id_recipe_name" name="name_for_recipe">
                </div>
                <div class="cell small-0 medium-2 large-2"></div>

                <div class="cell small-0 medium-2 large-2" style=" display: flex;
      justify-content: center;
      align-items: center;"></div>
                <div class="cell small-12 medium-8 large-8">
                    <input type="file" name="recipe_image" id="imageUpload">
                    <img id="previewImage" src="<?php echo $f_recipe_img; ?>">
                </div>
                <input type="hidden" name="img_src" id="recipeImageSrc">


                <div class="cell small-0 medium-2 large-2"></div>



                <div class="cell small-0 medium-2 large-2"></div>
                <div class="cell small 12 medium-8 large-8">
                    <ul class="menu" style="padding:2%; text-align: center; background-color: rgb(216, 204, 216);">
                        <li>Servings</li>
                        <input class="input-update" type="text" id="servings" value="<?php echo $f_servings; ?>" name="servings">
                        <li>Calories</li>
                        <input class="input-update" type="text" id="calories" value="<?php echo $f_calories; ?>" name="calories">
                        <li>Time to prep</li>
                        <input class="input-update" type="text" id="time" value="<?php echo $f_time; ?>" name="time">
                    </ul>

                </div>
                <div class="cell small-0 medium-2 large-2"></div>


                <div class="cell small-0 medium-2 large-2"></div>
                <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
                    <label for="description">description:</label>
                    <textarea class="input-update" id="description" name="description" oninput="adjustTextareaHeight(this)"><?php echo $f_description; ?></textarea>
                </div>
                <div class="cell small-0 medium-2 large-2"></div>


                <div class="cell small-0 medium-2 large-2"></div>
                <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">

                    <?php

                    $sqlv = "SELECT * FROM category_for_recipe WHERE recipe_id = $recipeId";
                    $resultv = mysqli_query($db, $sqlv);

                    $f_categories = "";
                    while ($myrow = mysqli_fetch_array($resultv)) {
                        $category = $myrow['category'];
                        $f_categories .= $category . ", ";
                    }
                    echo $f_categories;
                    ?>

                    <label for="categories">Category:</label>

                    <input type="checkbox" name="vegan" id="option1" <?php echo (strpos($f_categories, 'vegan') !== false) ? 'checked' : ''; ?>>
                    <label for="option1">vegan</label>

                    <input type="checkbox" name="gluten free" id="option2" <?php echo (strpos($f_categories, 'gluten_free') !== false) ? 'checked' : ''; ?>>
                    <label for="option2">gluten free</label>

                    <input type="checkbox" name="quick" id="option3" <?php echo (strpos($f_categories, 'quick') !== false) ? 'checked' : ''; ?>>
                    <label for="option3">quick</label>

                    <input type="checkbox" name="diaryfree" id="option4" <?php echo (strpos($f_categories, 'diaryfree') !== false) ? 'checked' : ''; ?>>
                    <label for="option4">Diary Free</label>

                    <input type="checkbox" name="vegeterian" id="option5" <?php echo (strpos($f_categories, 'vegeterian') !== false) ? 'checked' : ''; ?>>
                    <label for="option5">Vegeterian</label>

                </div>
                <div class="cell small-0 medium-2 large-2"></div>


                <div class="cell small-0 medium-2 large-2"></div>
                <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">

                    <button type="button" onclick="addRow()">Add Row</button>
                    <button type="button" onclick="deleteLastRow()">Delete Row</button>


                    <table id="ingredients-table" style="margin: 0 auto; border-radius: 30px; overflow: hidden; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); border-collapse: separate;">
                        <thead>
                            <tr>
                                <td colspan="4" style="text-align: center;">INGREDIENTS</td>
                            </tr>
                        </thead>
                        <tbody id="ingredients-body" style="text-align: left;">
                            <?php
                            $sqlv = "SELECT * FROM ingredient_for_recipe WHERE recipe_id = $recipeId";
                            $resultv = mysqli_query($db, $sqlv);
                            $rowIndex = 0; // Counter variable for row index

                            while ($myrow = mysqli_fetch_array($resultv)) {
                                $ingr = $myrow['ingredient'];
                                $qty = $myrow['quantity'];
                                $msr = $myrow['measurement'];

                                echo '<tr>
        <td style="width: 20%;"><input name="qty' . $rowIndex . '" value="' . $qty . '" class="ingredient_info" type="text"></td>
        <td style="width: 30%;"><input name="msr' . $rowIndex . '" value="' . $msr . '" class="ingredient_info" type="text"></td>
        <td style="width: 50%;"><input name="ingr' . $rowIndex . '" value="' . $ingr . '" class="ingredient_info" type="text"></td>
    </tr>';

                                $rowIndex++; // Increment the row index
                            } ?>

                        </tbody>
                    </table>

                </div>
                <div class="cell small-0 medium-2 large-2"></div>


                <div class="cell small-0 medium-2 large-2"></div>
                <div style="padding-top: 20px;" class="cell small 12 medium-8 large-8">
                    <h2>
                        Directions
                    </h2>
                    <p>
                        <label for="Directions">Directions (please add a ”/n" at every new line):</label>
                        <textarea class="input-update" id="directions" name="directions" oninput="adjustTextareaHeight(this)"><?php echo str_replace('<br />', "\n", $f_directions); ?></textarea>
                    </p>
                </div>
                <div class="cell small-0 medium-2 large-2"></div>


                <div class="cell small-0 medium-2 large-2"></div>
                <div style="padding-top: 20px; padding-bottom: 70px;" class="cell small 12 medium-8 large-8">
                    <table style="margin: 20px;
        width: 50%;

      border-radius: 30px;
      overflow: hidden;
      margin: 0 auto;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      border-collapse: separate;">
                        <thead>
                            <tr>
                                <td colspan="4" style="text-align: center;">NUTRITIONAL INFO / PER SERVINGS</td>
                            </tr>
                        </thead>
                        <tbody class="tabel-alb">
                            <tr>
                                <td style="width: 30%;">
                                    <input class="input-update" type="text" value="<?php echo $f_calories; ?>" id="cals" name="kcal" readonly>
                                </td>
                                <td style="width: 60%;">kcal</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <input class="input-update" type="text" value="<?php echo $f_fats ?>" id="fats" name="fats">
                                </td>
                                </td>
                                <td style="width: 75%;">Fat</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <input class="input-update" type="text" value="<?php echo $f_carbs; ?>" id="carbs" name="carbs">
                                </td>
                                </td>
                                <td style="width: 75%;">Carbs</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <input class="input-update" type="text" value="<?php echo $f_sugar ?>" id="sugars" name="sugar">
                                </td>
                                </td>
                                <td style="width: 75%;">Sugars</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <input class="input-update" type="text" value="<?php echo $f_fibers ?>" id="fibers" name="fibers">
                                </td>

                                </td>
                                <td style="width: 75%;">Fiber</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <input class="input-update" type="text" value="<?php echo $f_prot ?>" id="protein" name="prot">
                                </td>
                                <td style="width: 75%;">Protein</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cell small-0 medium-2 large-2"></div>
                <button type="submit" id="submitButton" class="btn">Add</button>

            </form>


        </div>
    </div>

    <script>
        var recipeImageSrc = document.getElementById('recipeImageSrc');
        var valoare = "<?php echo $f_recipe_img; ?>";

        recipeImageSrc.value = valoare;

        var data = JSON.parse(localStorage.getItem('data')) || [];
        var ingredients8 = JSON.parse(localStorage.getItem('ingredients8')) || [];


        //stocare servings reteta in localstorage
        var recipeNameInput = document.getElementById('id_recipe_name');

        recipeNameInput.addEventListener('input', function() {
            var inputValue = recipeNameInput.value;
            localStorage.setItem('recipeName', inputValue);
        });


        //stocare image in localstorage
        var recipeImageSrc = document.getElementById('recipeImageSrc');
        var recipeImg = document.getElementById('imageUpload');
        var previewImage = document.getElementById('previewImage');

        recipeImg.addEventListener('change', function(event) {
            var selectedFile = event.target.files[0];
            var imageName = selectedFile.name;

            previewImage.src = URL.createObjectURL(selectedFile);
            localStorage.setItem('recipeImg', "imgs/" + imageName);
            recipeImageSrc.value = "imgs/" + imageName;

        });

        //stocare fat in localstorage
        var fat_elem = document.getElementById('fats');

        fat_elem.addEventListener('input', function() {
            var inputValue = this.value;
            localStorage.setItem('recipeFat', inputValue);
        });


        //stocare carbs in localstorage
        var carbs_elem = document.getElementById('carbs');

        carbs_elem.addEventListener('input', function() {
            var inputValue = this.value;
            localStorage.setItem('recipeCarbs', inputValue);
        });


        //stocare sugars in localstorage
        var sugar_elem = document.getElementById('sugars');

        sugar_elem.addEventListener('input', function() {
            var inputValue = this.value;
            localStorage.setItem('recipeSugar', inputValue);
        });

        //stocare fiber in localstorage
        var fiber_elem = document.getElementById('fibers');

        fiber_elem.addEventListener('input', function() {
            var inputValue = this.value;
            localStorage.setItem('recipeFiber', inputValue);
        });

        //stocare protein in localstorage
        var prot_elem = document.getElementById('protein');

        prot_elem.addEventListener('input', function() {
            var inputValue = this.value;
            localStorage.setItem('recipeProt', inputValue);
        });



        //stocare servings reteta in localstorage
        var recipeServings = document.getElementById('servings');

        recipeServings.addEventListener('input', function() {
            var inputValue = recipeServings.value;
            localStorage.setItem('recipeServings', inputValue);
        });



        //stocare calories reteta in localstorage
        var recipeCals = document.getElementById('calories');

        recipeCals.addEventListener('input', function() {
            var inputValue = recipeCals.value;
            localStorage.setItem('recipeCals', inputValue);
        });



        //stocare prep time reteta in localstorage
        var prep_time = document.getElementById('time');

        prep_time.addEventListener('input', function() {
            var inputValue = prep_time.value;
            localStorage.setItem('prep_time', inputValue);
        });



        //stocare descriere reteta in localstorage
        var desc_elem = document.getElementById('description');

        desc_elem.addEventListener('input', function(event) {
            var inputValue = event.target.value;
            localStorage.setItem('descriptionValue', inputValue);
        });


        //stocare instructiuni reteta in localstorage
        var elem_ins = document.getElementById('directions');

        elem_ins.addEventListener('input', function(event) {
            var inputValue = event.target.value;
            localStorage.setItem('instructiuniValue', inputValue);
        });



        var option1Checkbox = document.getElementById('option1');
        var option2Checkbox = document.getElementById('option2');
        var option3Checkbox = document.getElementById('option3');
        var option4Checkbox = document.getElementById('option4');
        var option5Checkbox = document.getElementById('option5');




        option1Checkbox.addEventListener('change', function() {
            if (option1Checkbox.checked) {
                localStorage.setItem('vegan', 'true');
            } else {
                localStorage.removeItem('vegan');
            }
        });

        option2Checkbox.addEventListener('change', function() {
            if (option2Checkbox.checked) {
                localStorage.setItem('glutenFree', 'true');
            } else {
                localStorage.removeItem('glutenFree');
            }
        });

        option3Checkbox.addEventListener('change', function() {
            if (option3Checkbox.checked) {
                localStorage.setItem('quick', 'true');
            } else {
                localStorage.removeItem('quick');
            }
        });

        option4Checkbox.addEventListener('change', function() {
            if (option4Checkbox.checked) {
                localStorage.setItem('diaryfree', 'true');
            } else {
                localStorage.removeItem('diaryfree');
            }
        });


        option5Checkbox.addEventListener('change', function() {
            if (option5Checkbox.checked) {
                localStorage.setItem('vegeterian', 'true');
            } else {
                localStorage.removeItem('vegeterian');
            }
        });


        window.addEventListener('load', function() {

            var instr = localStorage.getItem('instructiuniValue');
            if (instr) {
                elem_ins.value = instr;

                var fats = localStorage.getItem('recipeFat');

                if (fats) {
                    fat_elem.value = fats;
                }
            }

            var carbs = localStorage.getItem('recipeCarbs');

            if (carbs) {
                carbs_elem.value = carbs;
            }


            var sugars = localStorage.getItem('recipeSugar');

            if (sugars) {
                sugar_elem.value = sugars;
            }


            var fiber = localStorage.getItem('recipeFiber');

            if (fiber) {
                fiber_elem.value = fiber;
            }

            var protein = localStorage.getItem('recipeProt');

            if (protein) {
                prot_elem.value = protein;
            }


            var desc = localStorage.getItem('descriptionValue');

            if (desc) {
                desc_elem.value = desc;
            }

            var time = localStorage.getItem('prep_time');
            if (time) {
                prep_time.value = time;
            }


            var second_cals = document.getElementById('cals');

            var cals = localStorage.getItem('recipeCals');
            if (cals) {
                recipeCals.value = cals;
                second_cals.value = cals;
            }


            var storedImage = localStorage.getItem('recipeImg');
            if (storedImage) {
                previewImage.src = storedImage;
                recipeImageSrc.value = storedImage;
            }


            var servings = localStorage.getItem('recipeServings');
            if (servings) {
                recipeServings.value = servings;
            }

            var veganChecked = localStorage.getItem('vegan');
            if (veganChecked) {
                option1Checkbox.checked = true;
            }

            var glutenFreeChecked = localStorage.getItem('glutenFree');
            if (glutenFreeChecked) {
                option2Checkbox.checked = true;
            }

            var quickChecked = localStorage.getItem('quick');
            if (quickChecked) {
                option3Checkbox.checked = true;
            }

            var diaryfreechecked = localStorage.getItem('diaryfree');
            if (diaryfreechecked) {
                option4Checkbox.checked = true;
            }

            var vegeterianchecked = localStorage.getItem('vegeterian');
            if (vegeterianchecked) {
                option5Checkbox.checked = true;
            }


            var name = localStorage.getItem('recipeName');
            if (name) {
                recipeNameInput.value = name;
            }


        });








        var poza_reteta = localStorage.getItem('recipeImg');
        var nume_reteta = localStorage.getItem('recipeName');

        var grasimi = localStorage.getItem('recipeFat');

        var carbo = localStorage.getItem('recipeCarbs');

        var zahar = localStorage.getItem('recipeSugars');

        var fibra = localStorage.getItem('recipeFiber');
        var proteina = localStorage.getItem('recipeProt');
        var servings_reteta = localStorage.getItem('recipeServings');
        var calorii_reteta = localStorage.getItem('recipeCals');
        var timp_reteta = localStorage.getItem('prep_time');
        var descriptionValue = localStorage.getItem('descriptionValue');
        var instructiuniValue = localStorage.getItem('instructiuniValue');
        var vegan = localStorage.getItem('vegan');
        var glutenFree = localStorage.getItem('glutenFree');
        var quick = localStorage.getItem('quick');
        var diaryfree = localStorage.getItem('diaryfree');
        var vegeterian = localStorage.getItem('vegeterian');






        var reteta = {
            nume: nume_reteta,
            poza: poza_reteta,
            servings: servings_reteta,
            cals: calorii_reteta,
            prep_time: timp_reteta,
            descriptionValue: descriptionValue,
            instructiuniValue: instructiuniValue,
            vegan: vegan,
            glutenFree: glutenFree,
            quick: quick,
            diaryfree: diaryfree,
            vegeterian: vegeterian,



            fat: grasimi,
            carbs: carbo,

            sugars: zahar,

            fiber: fibra,
            protein: proteina,

        };





        localStorage.setItem('data', JSON.stringify(data));

        function updateRecipe(rec) {

            localStorage.getItem('data', JSON.stringify(data));
            data = rec;


        }

        updateRecipe(reteta);



        function updateRecipeInfoDiv() {
            var recipeInfoDiv = document.getElementById('date');
            recipeInfoDiv.textContent = '';
            name = data.nume;
            poza = data.poza;
            servings = data.servings;
            cals = data.cals;
            time = data.prep_time;
            descriptionValue = data.descriptionValue;
            instructiuniValue = data.instructiuniValue;
            vegan = data.vegan;
            glutenFree = data.glutenFree;
            quick = data.quick;
            diaryfree = data.diaryfree;
            vegeterian = data.vegeterian;


            fat = data.fat;
            carbs = data.carbs;

            sugars = data.sugars;

            fiber = data.fiber;
            protein = data.protein;


            recipeInfoDiv.textContent =
                'nume: ' + name + '\n' +
                'servings: ' + servings + '\n' +
                'cals: ' + cals + '\n' +
                'time: ' + time + '\n' +
                'vegan: ' + vegan + '\n' +
                'glutenFree: ' + glutenFree + '\n' +
                'quick: ' + quick + '\n' +
                'diaryfree: ' + diaryfree + '\n' +
                'vegeterian: ' + vegeterian + '\n' +


                'descriptionValue: ' + descriptionValue + '\n' +
                'instructiuniValue: ' + instructiuniValue + '\n' +
                'fat: ' + fat + '\n' +

                'carbs: ' + carbs + '\n' +

                'sugars: ' + sugars + '\n' +

                'fiber: ' + fiber + '\n' +
                'protein: ' + protein + '\n' +
                'poza: ' + poza + '\n\n';


        }

        updateRecipeInfoDiv();



        var inputFields = document.querySelectorAll('#ingredients-body .ingredient_info');

        inputFields.forEach(function(input) {
            input.addEventListener('input', function() {
                var value = this.value;
                var inputName = event.target.name;
                var type = inputName.slice(0, 3);
                var nr = inputName.match(/\d+/g).join('');


                if (!ingredients8[nr]) {
                    ingredients8[nr] = {};
                }


                if (type === "qty") {
                    ingredients8[nr].qty = value;
                } else if (type === "msr") {
                    ingredients8[nr].msr = value;
                } else if (type === "ing") {
                    ingredients8[nr].ingr = value;
                }
                localStorage.setItem('ingredients8', JSON.stringify(ingredients8));


                updateIngredients();


            });
        });





        function addRow() {
            var tableBody = document.getElementById("ingredients-body");
            var newRow = document.createElement("tr");
            var rowIndex = tableBody.getElementsByTagName("tr").length + 1;
            newRow.innerHTML =
                `<td style="width: 20%;"><input name="qty${rowIndex}" class="ingredient_info" type="text"></td>
       <td style="width: 30%;"><input name="msr${rowIndex}" class="ingredient_info" type="text"></td>
       <td style="width: 50%;"><input name="ingr${rowIndex}" class="ingredient_info" type="text"></td>`;
            tableBody.appendChild(newRow);


            var inputFields = newRow.querySelectorAll('.ingredient_info');
            inputFields.forEach(function(input) {
                input.addEventListener('input', function() {
                    var value = this.value;
                    var inputName = event.target.name;
                    var type = inputName.slice(0, 3);
                    var nr = inputName.match(/\d+/g).join('');


                    if (!ingredients8[nr]) {
                        ingredients8[nr] = {};
                    }

                    if (type === "qty") {
                        ingredients8[nr].qty = value;
                    } else if (type === "msr") {
                        ingredients8[nr].msr = value;
                    } else if (type === "ing") {
                        ingredients8[nr].ingr = value;
                    }

                    localStorage.setItem('ingredients8', JSON.stringify(ingredients8));


                    updateIngredients();
                });
            });
        }

        function deleteLastRow() {
            var tableBody = document.getElementById("ingredients-body");
            var rows = tableBody.getElementsByTagName("tr");
            if (rows.length > 1) {
                var rowIndex = rows.length - 1;
                tableBody.removeChild(rows[rowIndex]);

                // Remove the corresponding element from the 2 array
                ingredients8.splice(rowIndex + 1, 1);
                localStorage.setItem('ingredients8', JSON.stringify(ingredients8));
                updateIngredients();
            }
        }


        function updateIngredients() {
            var ingredients8 = JSON.parse(localStorage.getItem('ingredients8')) || [];

            // Get the target <div> element
            var ingredientsDiv = document.getElementById('ing');

            // Set the content of the <div> to the string representation of the array
            ingredientsDiv.textContent = JSON.stringify(ingredients8);


        }

        updateIngredients();

        document.addEventListener('DOMContentLoaded', function() {


            var ingredients8 = JSON.parse(localStorage.getItem('ingredients8')) || [];



            var rowCount = getRowCount();

            populateRow(1, ingredients8);

            for (var i = 2; i < ingredients8.length; i++) {


                if (i > rowCount) {
                    addRow();
                }
                populateRow(i, ingredients8);

            }


        });

        function getRowCount() {
            var tableBody = document.getElementById("ingredients-body");
            var rows = tableBody.getElementsByTagName("tr");
            return rows.length;
        }


        function populateRow(index, data) {
            var ia = data[index];
            if (ia) {
                var qty = ia.qty;
                var adauga_cantitate = document.querySelector(`td input.ingredient_info[name="qty${index}"]`);
                if (qty !== undefined && qty !== '') {
                    adauga_cantitate.value = qty;
                }

                var msr = ia.msr;
                var adauga_msr = document.querySelector(`td input.ingredient_info[name="msr${index}"]`);
                if (msr !== undefined && msr !== '') {
                    adauga_msr.value = msr;
                }

                var ingr = ia.ingr;
                var adauga_ingr = document.querySelector(`td input.ingredient_info[name="ingr${index}"]`);
                if (ingr !== undefined && ingr !== '') {
                    adauga_ingr.value = ingr;
                }
            }
        }


        function adjustTextareaHeight(textarea) {
            textarea.style.height = "auto"; // Reset the height to auto to recalculate
            textarea.style.height = textarea.scrollHeight + "px"; // Set the height to the scrollHeight
        }

        window.onload = function() {
            var textarea = document.getElementById("directions");
            adjustTextareaHeight(textarea);
            var descriptionTextarea = document.getElementById("description");
            adjustTextareaHeight(descriptionTextarea);
        };
        document.getElementById("submitButton").addEventListener("click", function() {
            // Explicitly submit the form when the button is clicked
            document.getElementById("myForm").submit();
            localStorage.clear();

        });
    </script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>