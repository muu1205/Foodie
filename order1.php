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
    $sql1 = "INSERT INTO cart (item,quantity,rate,username)
    VALUES ('Crunchy Chocolate', '1', '150','$user')";
    if (mysqli_query($conn, $sql1)) {
        echo "<script type='text/javascript'>alert('Crunchy Chocolate is waiting for you in the cart.'); window.location.href='home.php'</script>";
    }
    else {
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
                echo "<script type='text/javascript'>alert('Crunchy Chocolate is waiting for you in the cart.'); window.location.href='home.php'</script>";
            } 
            else {}
        }
    }
    
mysqli_close($conn);
}
else{
    header("location: index.html");
}
?>