<!DOCTYPE html>

<html lang="en">
  <style>
    body {
      background-color: #272727;
      color: white;
    }
  </style>
  <body>
    <div class="header">
    <form method="post" action="login.html">
    <input type="submit" value="Logout">
    <script>
      document.cookie = "loginAuth=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    </script>
  </form>
    </div>

    <div class="content">
      <br>
      <p id="welcomeMessage"></p>
      <p> <?php echo "Heyooo"; ?> </p>
    </div>

    <script>
      if (document.cookie === "") {
        header("refresh:1;url=login.html");
      } else {
    
      }

    function getName(){
    <?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    var_dump($_POST);
    
    $conn = mysqli_connect('localhost', 'CSIT214GROUP', 'CSIT214!','csit214');
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $userID = $_COOKIE["loginAuth"];
    $sql = "SELECT firstName FROM userAccount WHERE UserID = '$userID'";
    
    $result = $conn->query($sql);
    $looper = false;
    
      if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
            echo $row["firstName"];
                return $row["firstName"];
              }
      } else {
          echo "No rows match search";
          }
    ?>
    }

    var welcP = document.getElementById("welcomeMessage");
    var name = getName();
    var welcM = "Welcome " + name;
    welcP.innerText = welcM;

    
    
  </script>
  </body>

</html>
