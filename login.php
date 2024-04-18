<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST);

$uName = $_POST['uName'];
$uPassword = $_POST['uPassword'];

$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UserPassword FROM userAccount WHERE UserName = '$uName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["UserPassword"] == $uPassword){
          echo "User Exists";
        } else {
          echo "No Match";
        }
    }
} else {
    echo "No rows match search";
}

setcookie("loginAuth", "userID:" . 69, time() + 2 * 24 * 60 * 60);

echo "User ID is: " . $_COOKIE["loginAuth"];
?>