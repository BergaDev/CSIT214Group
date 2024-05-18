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
            if (is_nan($UserIDVar)){
              echo "Check login credentials";
              header("refresh:3;url=login.html");
            } else{
              $CookieSave = $UserIDVar;
              setcookie("loginAuth", $CookieSave, time() + (2 * 24 * 60 * 60), "/");
              header("refresh:0.5;url=booking.html");
            }
            
          }
  } else {
      echo "Check login credentials";
      header("refresh:2;url=login.html");
      }

?>