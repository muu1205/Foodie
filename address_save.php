<?php
session_start();
if(isset($_SESSION['uname']))
{
    $user=$_SESSION['uname'];
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
    $myphone = mysqli_real_escape_string($conn,$_POST['phone']);
    $myhno = mysqli_real_escape_string($conn,$_POST['hno']);
    $myloc = mysqli_real_escape_string($conn,$_POST['loc']);
    $mystate = mysqli_real_escape_string($conn,$_POST['state']); 
    $mycity = mysqli_real_escape_string($conn,$_POST['city']); 
    $mypayment = mysqli_real_escape_string($conn,$_POST['payment']);
    $myuser=$_SESSION['uname'];
    $mydatee=date("Y/m/d");
    
    $sql2 = "INSERT INTO address (name, phone, hno, loc, city, state, payment, username, datee)
    VALUES ('$myname','$myphone','$myhno','$myloc','$mycity','$mystate','$mypayment','$myuser','$mydatee')";
    if (mysqli_query($conn, $sql2)) {echo "<script type='text/javascript'>alert('You order is confirmed.Hope to see you again.'); window.location.href='home.php'</script>";}
    else {}
    
    
    $mydatee=date("d/m/Y");
    $myname = $myname."\r\n";
    $myphone =$myphone."\r\n";
    $myhno = $myhno."\r\n";
    $myloc =$myloc."\r\n";
    $mystate = $mystate."\r\n";
    $mycity = $mycity."\r\n";
    $mypayment =$mypayment ."\r\n";
    $myuser=$myuser."\r\n";
    $mydatee=$mydatee."\r\n";
    
    $myfile = fopen("payment/payment.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $myname);
    fwrite($myfile, $myphone);
    fwrite($myfile, $myhno);
    fwrite($myfile, $myloc);
    fwrite($myfile, $mycity);
    fwrite($myfile, $mystate);
    fwrite($myfile, $mypayment);
    fwrite($myfile, $myuser);
    fwrite($myfile, $mydatee);
    fclose($myfile);
    
mysqli_close($conn);
}
else{
    header("location: index.html");
}
?>