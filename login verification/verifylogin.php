<?php
require_once 'database.php';
session_start();
require "index.php";

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passLen = strlen($password);

        if ($passLen >= 4 && $passLen <= 15) {
            $_SESSION["name"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;

            header("location: homepage.php");
        } else {
            header("location: index.php?passMessage=Password must be 4 to 15 characters. Your length was $passLen.");
        }
    } else {
        echo "Please provide all the information";
    }
}
?>
