<?php

$username=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

$passLen=strlen($password);

if($passLen>=5 && $passLen<=10) {
    header("location:homepage.php");
}
else{

    header("location:index.php?passMessage=Password must be 5 to 10 characters. Your length was {$passLen}");

}

?>