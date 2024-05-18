<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST);

$userID = 0;

if (isset($_COOKIE["loginAuth"])) {
  $userID = $_COOKIE["loginAuth"];
  
} else {
  
}
$day = $_POST['day'];
$time = $_POST['time'];
$location = $_POST['location'];
$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `bookings` (`bookingID`, `userID`, `loungeID`, `day`, `time`) 
VALUES (NULL, '$userID', '$location', '$day', '$time');";

$result = $conn->query($sql);
?>