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

      $myname = mysqli_real_escape_string($conn,$_POST['name']);
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $myphone = mysqli_real_escape_string($conn,$_POST['phone']); 
      $mycode = mysqli_real_escape_string($conn,$_POST['countryCode']); 


$sql1 = "INSERT INTO data (name, username, email, password, code, phone)
VALUES ('$myname', '$myusername', '$myemail', '$mypassword', '$mycode', '$myphone')";
if (mysqli_query($conn, $sql1)) {
    header("location: index.html");
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

$sql2 = "INSERT INTO login (username, password)
VALUES ('$myusername', '$mypassword')";
if (mysqli_query($conn, $sql2)) {
    header("location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>