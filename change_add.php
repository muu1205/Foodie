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
    
    $what=$_POST["submit"];
    if($what=="addBarbecued"){
        $add="Barbecued Prawns";
        
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Barbecued Prawns'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Barbecued Prawns'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addCaeser"){
        $add="Caeser Salad";
        
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Caeser Salad'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Caeser Salad'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addClassic"){
        $add="Classic Cold Koffee";
        
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Classic Cold Koffee'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Classic Cold Koffee'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addCrunchy"){
        $add="Crunchy Chocolate";
        
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Crunchy Chocolate'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Crunchy Chocolate'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addEnglish"){
        $add="English Breakfast";
        
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'English Breakfast'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'English Breakfast'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addIce"){
        $add="Ice Cream Oreo";
                
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Ice Cream Oreo'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Ice Cream Oreo'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    elseif($what=="addIndian"){
        $add="Indian Breakfast";
                
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Indian Breakfast'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Indian Breakfast'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
    else{
        $add="Mojito Mint";
              
        $sql = "SELECT quantity FROM cart WHERE username = '$user' AND item = 'Mojito Mint'";
        $result = $conn->query($sql);
        $count=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $count=$row["quantity"];
            }
            $count=$count+1;
            $sql = "UPDATE cart SET quantity='$count' WHERE username = '$user' AND item = 'Mojito Mint'";
            if ($conn->query($sql) === TRUE) {
                header("location: cart.php");
            } 
            else {}
        }
    }
}
else
    header("location: index.html");
 ?>