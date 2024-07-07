<?php


$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db, "fitflow2");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['wo_plan_id'])) {
        $wo_plan_id = $_POST['wo_plan_id'];

        $sqlv = "SELECT * FROM workout WHERE current_workout_plan_id = $wo_plan_id";
        $resultv = mysqli_query($db, $sqlv);
        
        while ($myrow = mysqli_fetch_array($resultv)) {
            $woid = $myrow['id'];
        

            $deleteQuery = "DELETE FROM exercise WHERE workout_id = $woid";
            mysqli_query($db, $deleteQuery);

            $delete_day = "DELETE FROM workout WHERE id = $woid";
            mysqli_query($db, $delete_day);

        }
        
        mysqli_free_result($resultv);

        $sql = "UPDATE current_plans_for_client SET workout_plan_id = ''";

        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
        
        $deleteQuery = "DELETE FROM workout_plan WHERE id = $wo_plan_id";
        mysqli_query($db, $deleteQuery);
        
    } else {
        // Handle the case when mp_id parameter is not provided
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    }
} else {
    // Handle the case when the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
