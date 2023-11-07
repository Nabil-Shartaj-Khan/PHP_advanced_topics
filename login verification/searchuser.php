<?php
require_once("database.php");

if(isset($_REQUEST['search_value'])){
    $rec_name=$_REQUEST['search'];
    $sort_query=("SELECT * FROM `users` WHERE `user` LIKE '%$rec_name%' ORDER BY `user_id` ASC");
    $show_user = mysqli_query($connection, $sort_query);

    if ($show_user) {
        echo "<h2>Stored profile information- </h2>";
        echo '<table border="1">';
        echo '<tr><th>User ID</th><th>Profile picture</th><th>Username</th><th>Email</th><th>Action</th></tr>';

        while ($generated_row = mysqli_fetch_assoc($show_user)) {
            echo '<tr>';
            echo '<td>' . $generated_row['user_id'] . '</td>';
            echo '<td><img src="uploaded pictures/' . $generated_row['pro_pic'] . '" width="50px height=15px"></td>';
            echo '<td>' . $generated_row['user'] . '</td>';
            echo '<td>' . $generated_row['email'] . '</td>';
            echo '<td> <a href="editform.php?edit_data=' . $generated_row['user_id'] . '" onclick="return confirm(\'Are you sure?\')">Edit data</a> || <a href="delete.php?id=' . $generated_row['user_id'] . '">Delete</a></td>';

       
            echo '</tr>';
        }
        echo '</table>';
    }
}

?>