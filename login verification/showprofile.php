<?php
require_once 'database.php';
session_start();

if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    $username = $_SESSION["name"];
    $email = $_SESSION['email'];

    $user_query = "SELECT * FROM `users` WHERE user='$username'";
    $show_user = mysqli_query($connection, $user_query);

    if($show_user){

        echo "<h2>Your profile information- </h2>";
        echo '<table border="1">';
        echo '<tr><th>User ID</th><th>Username</th><th>Email</th></tr>';
        
    while ($generated_row = mysqli_fetch_assoc($show_user)) {
        echo '<tr>';
        echo '<td>' . $generated_row['user_id'] . '</td>';
        echo '<td>' . $generated_row['user'] . '</td>';
        echo '<td>' . $generated_row['email'] . '</td>';
        echo '</tr>';
    }

    }

}
?>






