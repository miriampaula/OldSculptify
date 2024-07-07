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

  $query = "SELECT id FROM grocery_list WHERE user_id = '$userId'";
  $result = mysqli_query($db, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_lista = $row['id'];
    echo "<script>var id_list = " . json_encode($id_lista) . ";</script>";
  } else {
    // Handle the case when id_lista does not exist
    echo "<script>var id_list = null;</script>";
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


  <style>
    .wanted_row.checked td {
      position: relative;
    }

    .wanted_row.checked td:before {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      bottom: 50%;
      border-bottom: 2px solid purple;
      /* Adjust the color and style as desired */
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
            header("Location:account.php");
            exit;
          }
          ?>
        </ul>
      </nav>
    </div>
  </section>
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
              <td colspan="6" style="text-align: center;">YOUR GROCERY LIST</td>
            </tr>
            <tr>
              <td colspan="6">
                <a href="#" onclick="delete_grocery_list()" class="custom-btn2 btn-3" style="width: 100%; height: 40px; font-size: medium;">clear list</a>
              </td>
            </tr>
            <tr>
              <td colspan="6">
                <a href="#" onclick="add_new_row_for_Ingredient()" class="custom-btn2 btn-3" style="width: 100%; height: 40px; font-size: medium;">+ ingredient</a>
              </td>
            </tr>

          </thead>
          <tbody id="groceryList">
            <?php

            $sqlv = "SELECT * FROM grocery_list_item WHERE grocery_list_id = ? ORDER BY id DESC";
            $stmt = mysqli_prepare($db, $sqlv);
            mysqli_stmt_bind_param($stmt, "s", $id_lista);
            mysqli_stmt_execute($stmt);

            $resultv = mysqli_stmt_get_result($stmt);

            if ($resultv) {


              $rowIndex = 1; // Counter variable for row index

              while ($myrow = mysqli_fetch_array($resultv)) {
                $ingr = $myrow['item_name'];
                $qty = $myrow['item_quantity'];
                $msr = $myrow['item_measurement'];
                $id_inregistrare = $myrow['id'];

                echo '
                                <tr class="wanted_row" style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
            <td style="width: 5%; padding-bottom: 0;">  
              <input type="checkbox" class="checkbox" id="got" value="got">
            </td>
            <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
            <input readonly value="' . $qty . '" type="text" id="QtyInput' . $rowIndex . '">
            </td>
            <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
            <input readonly value="' . $msr . '"  type="text" id="MsrInput' . $rowIndex . '">
            </td>
            <td style="width: 45%; padding-bottom: 0;">
            <input readonly value="' . $ingr . '"  type="text" id="IngrInput' . $rowIndex . '">
            </td>
            <td style="width: 10%;">
              <a href="#" onclick="editare_ingredient(' . $id_inregistrare . ', event)"><img style="height: 30px;" src="imgs/creion.png"></a>
            </td> 
            <td style="width: 10%;">
              <a href="#" onclick="delete_grocery_list_item(' . $id_inregistrare . ')"><img style="height: 30px;" src="imgs/lagunoi.png"></a>
            </td> 
          
          </tr>
          
          
        ';

                $rowIndex++; // Increment the row index
              }
            } else {
              echo "Grocery list does not exist with the specified ID.";
            } ?>

          </tbody>
        </table>
      </div>
      <div class="cell small-0 medium-3 large-3"></div>


    </div>
  </div>
  <script>
    function delete_grocery_list_item(id_inregistrare) {

      //  alert("stergem inregistrare");
      // alert(id_inregistrare);
      // Send an AJAX request to the server-side script
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Handle the response from the server if necessary
          //     alert(this.responseText);

          location.reload();

        }
      };
      var url = "delete_grocery_list_item.php?id=" + encodeURIComponent(id_inregistrare);
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }


    function editare_ingredient(id_inregistrare, event) {
      event.preventDefault(); // Prevent the default click behavior

      // Get the row where the "creion" image was clicked
      var clickedRow = event.target.closest('tr');

      // Find the input fields within the clicked row using their IDs
      var qtyInput = clickedRow.querySelector('[id^="QtyInput"]');
      var msrInput = clickedRow.querySelector('[id^="MsrInput"]');
      var ingrInput = clickedRow.querySelector('[id^="IngrInput"]');
      var creionImage = clickedRow.querySelector('img');


      if (qtyInput.readOnly) {
        // Enable input fields for editing
        qtyInput.readOnly = false;
        msrInput.readOnly = false;
        ingrInput.readOnly = false;
        creionImage.src = "imgs/check.png";

      } else {

        // Disable input fields after editing
        qtyInput.readOnly = true;
        msrInput.readOnly = true;
        ingrInput.readOnly = true;
        creionImage.src = "imgs/creion.png";

        var updatedQty = qtyInput.value;
        var updatedMsr = msrInput.value;
        var updatedIngr = ingrInput.value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Handle the response from the server if necessary

            location.reload();
          }
        };


        var url = "update_ingredient.php?id=" + encodeURIComponent(id_inregistrare);
        var params = "qty=" + encodeURIComponent(updatedQty) + "&msr=" + encodeURIComponent(updatedMsr) + "&ingr=" + encodeURIComponent(updatedIngr);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(params);

      }
    }



    function add_new_row_for_Ingredient() {


      var groceryList = document.getElementById('groceryList');


      // Create a new row HTML with an incremented rowIndex
      var newRowIndex = 1;
      var newRowHTML = `
    <tr class="wanted_row" style="background-color: #ffffff; border: 1px solid #dddddd; width: 100%;">
      <td style="width: 5%; padding-bottom: 0;">  
        <input type="checkbox" class="checkbox" id="got" value="got">
      </td>
      <td style="width: 10%; padding-right: 10px; padding-bottom: 0;">
        <input readonly value="" type="text" id="QtyInput${newRowIndex}">
      </td>
      <td style="width: 10%; padding-left: 0; padding-bottom: 0;">
        <input readonly value="" type="text" id="MsrInput${newRowIndex}">
      </td>
      <td style="width: 45%; padding-bottom: 0;">
        <input readonly value="" type="text" id="IngrInput${newRowIndex}">
      </td>
      <td style="width: 10%;">
        <a href="#" onclick="add_ingredient_in_db(event)">
          <img style="height: 30px;" src="imgs/creion.png">
        </a>
      </td> 
      <td style="width: 10%;">
        <a href="#" onclick="delete_grocery_list_item(${newRowIndex})">
          <img style="height: 30px;" src="imgs/lagunoi.png">
        </a>
      </td> 
    </tr>`;


      groceryList.insertAdjacentHTML('afterbegin', newRowHTML);

      var rows = groceryList.getElementsByClassName('');
      for (var i = 0; i < rows.length; i++) {
        rows[i].querySelector(`[id^="QtyInput"]`).id = `QtyInput${i + 1}`;
        rows[i].querySelector(`[id^="MsrInput"]`).id = `MsrInput${i + 1}`;
        rows[i].querySelector(`[id^="IngrInput"]`).id = `IngrInput${i + 1}`;
      }



      add_ingredient_in_db(event);
    }


    function add_ingredient_in_db(event) {


      event.preventDefault(); // Prevent the default click behavior

      // Get the row where the "creion" image was clicked

      var idList = id_list;

      var qtyInput = document.getElementById("yourIdValue");

      // Find the input fields within the clicked row using their IDs
      var qtyInput = document.getElementById("QtyInput1");
      var msrInput = document.getElementById("MsrInput1");
      var ingrInput = document.getElementById("IngrInput1");


      var parentRow = qtyInput.closest("tr");

      // Select the image element within the parent tr
      var creionImage = parentRow.querySelector("img");


      if (qtyInput.readOnly) {
        // Enable input fields for editing
        qtyInput.readOnly = false;
        msrInput.readOnly = false;
        ingrInput.readOnly = false;
        creionImage.src = "imgs/check.png";

      } else {

        // Disable input fields after editing
        qtyInput.readOnly = true;
        msrInput.readOnly = true;
        ingrInput.readOnly = true;
        creionImage.src = "imgs/creion.png";
        var Qty = qtyInput.value;
        var Msr = msrInput.value;
        var Ingr = ingrInput.value;


        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {
              // Successful response from the server
              location.reload();
            } else {
              // Error response from the server
              alert("Error: " + this.status + "\n" + this.responseText);
              // Handle the error condition here
            }
          }
        };


        var url = "add_ingredient_from_grocery_list.php";
        var parameters = "qty=" + encodeURIComponent(Qty) + "&msr=" + encodeURIComponent(Msr) + "&ingr=" + encodeURIComponent(Ingr) + "&idlist=" + encodeURIComponent(idList);
        xml.open("POST", url, true);
        xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xml.send(parameters);


        xml.onerror = function() {
          // Handle request error
          alert("Request error occurred");
        };

      }

    }

    var checkboxes = document.getElementsByClassName('checkbox');

    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].addEventListener('click', function() {
        var row = this.closest('.wanted_row');
        row.classList.toggle('checked', this.checked);
        var isChecked = this.checked;

        updateDB(row, isChecked);
      });
    }

    function delete_grocery_list() {


      alert("ALOOOOOOO");
      alert(id_list);
      var xml = new XMLHttpRequest();
      xml.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {
            alert("BUNA ");
            alert(this.responseText);
            // Successful response from the server
            location.reload();
          } else {
            // Error response from the server
            alert("Error: " + this.status + "\n" + this.responseText);
            // Handle the error condition here
          }
        }
      };


      var url = "delete_grocery_list.php?id=" + encodeURIComponent(id_list);
      xml.open("GET", url, true);
      xml.send();

    }
  </script>


  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
</body>

</html>