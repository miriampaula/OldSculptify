<?php

$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db,"fitflow2");


$email = $_SESSION['email'];


$query = "SELECT id FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$userId = $row['id'];

$query = "SELECT user_type FROM user WHERE id = '$userId'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$type = $row['user_type'];
echo($type);


 
$age =  $weightt = $height = $goal = $waist = $hip = $neck = $quad = "";


if ((empty($_POST["age"])) && (empty($_POST["weightt"])) && (empty($_POST["height"]))) {
  $nameErr = "hi";
  echo $nameErr; }
  else {
    $age = $_POST["age"];
    $weightt = $_POST["weightt"];
    $goal = $_POST["goal"];
    $waist = $_POST["waist"];
    $hip = $_POST["hip"];
    $neck = $_POST["neck"];
    $quad = $_POST["quad"];
    $height = $_POST['height'];
  $sql =  "INSERT INTO user_measurements(waist, hip, neck, quad, weightt, height, age, goal) VALUES ('$waist', '$hip', '$neck', '$quad', '$weightt', '$height', '$age', '$goal')";
  echo $sql;

  $results= mysqli_query($db,$sql);
if (!$results)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {
  echo "Inregistrarea a fost adaugata.</br>";
 


 }
  }

?>