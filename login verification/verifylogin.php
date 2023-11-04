<?php
require"index.php";

$username=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

$passLen=strlen($password);

if(!empty($username)&& !empty($email) && !empty($password)){
    if ($passLen >= 5 && $passLen <= 10) {
        header("location: homepage.php");
    } else {
        $generatedPassword = passwordGenerator(); // Generate the password
        header("location: index.php?passMessage=Password must be 5 to 10 characters. Your length was {$passLen}. <br> You can use the following password- <br> <b>{$generatedPassword}</b><br>");
    }
    
}
else {
    echo "Please provide all the information";
}

?>