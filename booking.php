<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);


$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userID = 0;

if (isset($_COOKIE["loginAuth"])) {
  $userID = $_COOKIE["loginAuth"];
} 
$day = $_POST['day'];
$time = $_POST['time'];
$location = $_POST['location'];

$sql = "INSERT INTO `bookings` (`bookingID`, `userID`, `loungeID`, `day`, `time`) 
VALUES (NULL, '$userID', '$location', '$day', '$time');";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
        //echo "Good side";
        
      }
} else {
  echo "Bad Side";
  }

echo "Booking saved! Enjoy your flight!";
header("refresh:2;url=conf.html");
?>