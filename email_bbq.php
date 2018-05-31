<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

      $myexp = mysqli_real_escape_string($conn,$_POST['experience']);
      $mycomments = mysqli_real_escape_string($conn,$_POST['comments']);
      $myname = mysqli_real_escape_string($conn,$_POST['name']);
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);

    $myexp="Experience - ".$myexp."\r\n";
    $mycomments="Comments - ".$mycomments."\r\n";
    $myname="Name - ".$myname."\r\n";
    $myemail="Email ID - ".$myemail."\r\n";

    $myfile = fopen("bbq.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $myexp);
    fwrite($myfile, $mycomments);
    fwrite($myfile, $myname);
    fwrite($myfile, $myemail);
    fclose($myfile);
    
    echo "<script type='text/javascript'>alert('We have received your feedback.');window.location.href='home.php'</script>";

mysqli_close($conn);
?>