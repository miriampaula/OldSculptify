<?php
$db = mysqli_connect("localhost:3306", "root", "");
mysqli_select_db($db,"fitflow2");
$recipe = "";

$sqlv = "SELECT * FROM recipe";


$resultv = mysqli_query($db, $sqlv);


$myrow = mysqli_fetch_array($resultv);
echo $myrow['nume_reteta'];

