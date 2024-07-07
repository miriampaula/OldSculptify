<?php



$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

$rec_id = $_GET['id'];

$sql = "DELETE FROM ingredient_for_recipe WHERE recipe_id = $rec_id";
if ($db->query($sql) === TRUE) {
    echo "Registration deleted successfully.";
} else {
    echo "Error deleting registration: " . $db->error;
}

$sql = "DELETE FROM category_for_recipe WHERE recipe_id = $rec_id";
if ($db->query($sql) === TRUE) {
    echo "Registration deleted successfully.";
} else {
    echo "Error deleting registration: " . $db->error;
}

$sql = "DELETE FROM recipe WHERE id = $rec_id";
    if ($db->query($sql) === TRUE) {
        echo "Registration deleted successfully.";
    } else {
        echo "Error deleting registration: " . $db->error;
    }
?>