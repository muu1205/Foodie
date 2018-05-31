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
    $sql = "SELECT item,quantity,rate FROM cart WHERE username = '$user'";
    $result = $conn->query($sql);
    
    $total=0;
    $items="";
    $c=1;
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $total=$total+$row['quantity']*$row['rate'];
            $items=$items.$c." ".$row['item']."<br>";
            $c=$c+1;
        }
        $datee=date("Y/m/d");

        $sql2 = "INSERT INTO orderr (datee, item, total)
        VALUES ('$datee', '$items', $total)";
        if (mysqli_query($conn, $sql2)) {}
        else {}

        $sql = "DELETE FROM cart WHERE username = '$user'";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>window.location.href='address.php'</script>";
        } else {
        }
    }
    else{
        echo "<script type='text/javascript'>alert('There is nothing in the cart. Redirecting you to the homepage.'); window.location.href='home.php'</script>";
    }
    
    
    mysqli_close($conn);
}


else{
    header("location: index.html");
}


?>