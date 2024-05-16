<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST);
*/

$uName = $_POST['email'];
$uPassword = $_POST['password'];

$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UserID FROM userAccount WHERE EmailAddress = '$uName' AND UserPassword = '$uPassword'";

$result = $conn->query($sql);
$looper = false;

  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
            //echo "User Exists";
            $UserIDVar = $row["UserID"];
            //echo "UserID from row: " . $UserIDVar;
            $CookieSave = $UserIDVar;
            setcookie("loginAuth", $CookieSave, time() + (2 * 24 * 60 * 60), "/");
          }
  } else {
      echo "No rows match search";
      header("refresh:2;url=login.html");
      }

//echo "Cookie data is: " . $_COOKIE["loginAuth"];
//Have a check here, the refering page should pass a value that tells this where to go
echo "Login Successful";
header("refresh:1;url=actionTest.html");
?>