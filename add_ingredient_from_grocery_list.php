<?php

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");


$Qty = $_POST['qty'];
$Msr = $_POST['msr'];
$Ingr = $_POST['ingr'];
$id_lista = $_POST['idlist'];


$sql = "INSERT INTO grocery_list_item(grocery_list_id, item_name, item_quantity, item_measurement) VALUES
($id_lista, '$Ingr', '$Qty', '$Msr')";
$result = mysqli_query($db, $sql);

if ($result) {
    // Query executed successfully
    echo "Item added successfully";
} else {
    $error = mysqli_error($db);
    http_response_code(500); // Set an appropriate HTTP status code for the error
    echo $error;
}
