<?php
echo "Yeah we made it here";
$uName = $_POST['uName'];
$uPassword = $_POST['uPassword'];

$conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');

$sql = "SELECT fldName FROM testTable";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Value: " . $row["fldName"] . "<br>";
    }
} else {
    echo "0 results";
}

setcookie("loginAuth", "userID:" . $randomID, time() + 2 * 24 * 60 * 60);
echo "User ID is: " . $_COOKIE["loginAuth"];
?>