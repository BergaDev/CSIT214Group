<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userID = 0;

if (isset($_COOKIE["loginAuth"])) {
  $userID = $_COOKIE["loginAuth"];
  
} else {
  
}


function fetchData($userID) {
    //echo $userID;
    $conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT FirstName FROM userAccount WHERE UserID = '$userID'";

    $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
            //echo "User Exists";
            $Name = $row["FirstName"];
            echo $Name;
          }
  } else {
      echo "Not logged in, should've redirected already";
      }

}

// Method to do stuff
function performAction() {
    // Some other action
    echo "Other thing";
}

function getLounges(){
  $conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Lounges";

    $result = $conn->query($sql);

  if ($result->num_rows >= 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
            //echo "User Exists";
            $Name = $row["loungeName"];
            echo $Name;
          }
  } else {
      echo "No airports!?";
      }
}

// Check which method to call
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch($action) {
        case 'fetchData':
            fetchData($userID);
            break;
        case 'performAction':
            performAction();
            break;
          case 'getLounges':
            getLounges();
            break;
        // Hardcode more when needed
    }
}
?>
