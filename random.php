<?php


$to_email = 'parmeet12singh@gmail.com';
$subject = 'Testing PHP Mail'; 
$message = 'This mail is sent using the PHP mail '; 
$headers = 'From: noreply @ company. com'; 
//check if the email address is invalid $secure_chec    
$x=mail($to_email, $subject, $message, $headers); 

if($x){
    echo "done";
}
else{   
    echo"not done";
}
?>