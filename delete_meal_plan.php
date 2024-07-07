<?php


$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['mp_id'])) {
        $mp_id = $_POST['mp_id'];

        $sqlv = "SELECT * FROM day_of_week_meal_plan WHERE current_meal_plan_id = $mp_id";
        $resultv = mysqli_query($db, $sqlv);
        
        while ($myrow = mysqli_fetch_array($resultv)) {
            $dayid = $myrow['id'];
        

            $deleteQuery = "DELETE FROM totals_for_day WHERE day_of_week_meal_plan_id = $dayid";
            mysqli_query($db, $deleteQuery);

            $delete_day = "DELETE FROM day_of_week_meal_plan WHERE id = $dayid";
            mysqli_query($db, $delete_day);

        }
        
        mysqli_free_result($resultv);

        $sql = "UPDATE current_plans_for_client SET meal_plan_id = ''";

        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
        
        $deleteQuery = "DELETE FROM meal_plan WHERE id = $mp_id";
        mysqli_query($db, $deleteQuery);
        
    } else {
        // Handle the case when mp_id parameter is not provided
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    }
} else {
    // Handle the case when the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
