<?php
require_once "database.php";
if (isset($_REQUEST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hidden_id = $_POST['hidden_id'];

    $update_query="UPDATE `users` SET `user` = '$username', `password` = '$password', `gender` = '$gender' WHERE `users`.`user_id` =$hidden_id";
    $final_query=mysqli_query($connection,$update_query);

    if($final_query==true){
        header("Location: showprofile.php?updated");
        exit;

    }
}
?>