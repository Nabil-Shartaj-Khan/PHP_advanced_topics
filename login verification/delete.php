<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $delete_query = "DELETE FROM `users` WHERE user_id = $user_id";
    $result = mysqli_query($connection, $delete_query);

    if ($result) {
        
        header('location: showprofile.php');
        exit();
    } else {
        echo "Error deleting the user.";
    }
}
?>