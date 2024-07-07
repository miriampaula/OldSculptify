<?php



$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

$id_inregistrare = $_GET['id'];

$sql = "DELETE FROM grocery_list_item WHERE grocery_list_id = $id_inregistrare";
    if ($db->query($sql) === TRUE) {
        echo "Registration deleted successfully.";
    } else {
        echo "Error deleting registration: " . $db->error;
    }


    $sql = "DELETE FROM grocery_list WHERE id = $id_inregistrare";
    if ($db->query($sql) === TRUE) {
        echo "Registration deleted successfully.";
    } else {
        echo "Error deleting registration: " . $db->error;
    }
    
?>