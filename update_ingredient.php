<?php

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");


$updatedQty = $_POST['qty'];
$updatedMsr = $_POST['msr'];
$updatedIngr = $_POST['ingr'];

$id_inregistrare = $_GET['id'];



$stmt = $db->prepare("UPDATE grocery_list_item SET item_quantity = ?, item_measurement = ?, item_name = ? WHERE id = ?");
$stmt->bind_param("sssi", $updatedQty, $updatedMsr, $updatedIngr, $id_inregistrare);
$stmt->execute();

// Check if the update was successful
if ($stmt->affected_rows > 0) {
    echo "Ingredient updated successfully.";
} else {
    echo "Error updating ingredient aiiiiiiici.";
}

// Close the database connection and release resources
$stmt->close();




?>