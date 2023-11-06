<?php
require_once 'database.php';
session_start();

if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    $username = $_SESSION["name"];
    $email = $_SESSION['email'];

    $user_query = "SELECT * FROM `users`";
    $show_user = mysqli_query($connection, $user_query);

    if ($show_user) {
        echo "<h2>Stored profile information- </h2>";
        echo '<table border="1">';
        echo '<tr><th>User ID</th><th>Username</th><th>Email</th><th>Action</th></tr>';

        while ($generated_row = mysqli_fetch_assoc($show_user)) {
            echo '<tr>';
            echo '<td>' . $generated_row['user_id'] . '</td>';
            echo '<td>' . $generated_row['user'] . '</td>';
            echo '<td>' . $generated_row['email'] . '</td>';
            echo '<td><a href="editform.php?edit_data=' . $generated_row['user_id'] . '">Edit data</a>  || <a href="delete.php?id=' . $generated_row['user_id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>