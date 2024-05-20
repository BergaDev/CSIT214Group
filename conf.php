<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "CSIT214GROUP";
$password = "CSIT214!";
$dbname = "csit214";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$userID = 0;
if (isset($_COOKIE["loginAuth"])) {
    $userID = $_COOKIE["loginAuth"];
}

if ($userID == 0) {
    die(json_encode(["error" => "User not authenticated"]));
}

// SQL query to fetch data
$sql = "SELECT * FROM `bookings` WHERE `userID` = '$userID' ORDER BY `bookings`.`day` ASC;";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . $conn->error]));
}

$bookings = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
} else {
    echo json_encode(["message" => "No bookings found for the user"]);
    exit;
}

echo json_encode($bookings);
$conn->close();
?>
