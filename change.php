<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_SESSION['uname']))
{
    $user=$_SESSION['uname'];
    
    echo $user."<br>";
    echo $_POST["submit"];
    echo $_POST["submit"];
}
else
    header("location: index.html");
 ?>