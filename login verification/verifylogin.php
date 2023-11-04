<?php
session_start();
require "index.php";

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passLen = strlen($password);

        if ($passLen >= 5 && $passLen <= 10) {
            $_SESSION["name"] = $username;
            $_SESSION["password"] = $password;
            header("location: homepage.php");
        } else {
            $generatedPassword = passwordGenerator(); // Generate the password
            header("location: index.php?passMessage=Password must be 5 to 10 characters. Your length was $passLen. <br> You can use the following password- <br> <b>$generatedPassword</b><br>");
        }
    } else {
        echo "Please provide all the information";
    }
}
?>
