<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "food";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      
   
    $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);      
      // If result matched $myusername and $mypassword, table row must be 1 row		
      if($count == 1) {
          $_SESSION["uname"] = $myusername;
              header("location: home.php");
      }
        else {
            $message = "Invalid credentials";
            echo "<script type='text/javascript'>alert('$message');window.location.href='index.html'</script>";
            exit();}
      }
mysqli_close($conn);
?>