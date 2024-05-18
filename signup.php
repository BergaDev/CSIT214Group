<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST);

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$eMail = $_POST['email'];
$pNum = $_POST['pNum'];
$uPassword = $_POST['pWord'];
$randomNumber = rand(1, 2999);

$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `userAccount` (`UserID`, `FirstName`, `LastName`, `Phone`, `EmailAddress`, `UserPassword`) 
VALUES ('$randomNumber', '$fName', '$lName', '$pNum', '$eMail', '$uPassword');";

$result = $conn->query($sql);
$looper = false;

$sql = "SELECT UserID FROM userAccount WHERE EmailAddress = '$eMail' AND UserPassword = '$uPassword'";

$result = $conn->query($sql);


  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
            echo "User Exists";
            $UserIDVar = $row["UserID"];
            echo "UserID from row: " . $UserIDVar;
            $CookieSave = $UserIDVar;
            setrawcookie("loginAuth", $CookieSave, time() + 2 * 24 * 60 * 60);
            header("refresh:1;url=booking.html");
          }
  } else {
      echo "Save error try again?";
      header("refresh:2;url=signup.html");
      }


//setcookie("loginAuth", "userID:" . 69, time() + 2 * 24 * 60 * 60);


//Have a check here, the refering page should pass a value that tells this where to go
//header("refresh:1;url=account.php");
?>