<?php
require_once 'database.php';
session_start();
?>

<h2 style="text-align: center;">Upload your profile picture </h2>
<form action="insertfile.php" method='post' enctype="multipart/form-data">
    
    <input type="text" name="name" placeholder="Type your name">
    <input type="email" name="email" placeholder="Type your email">
    <input type="password" name="password" placeholder="Type your Password">
    <input type="file" name="upload" value="Upload Image">
    <select name='country'>
        <option value='null'>Select a country</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value='Canada'>Canada</option>
        <option value='Rest of the world'>Rest of the world</option>
    </select>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <input type="submit" name="submit" value="submit">
    </form>
    
    <h2>You can search for users here</h2>
    <form action="searchuser.php" method='post'>
    <input type="text" name="search" placeholder="Type your name">
    <input type="submit" name="search_value" value="Search">
    
   <br><br> <strong> You can<a href="logout.php"> Logout </a>here.</strong>

<?php

if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    $email = $_SESSION["email"];
    $password = $_SESSION['email'];  

    $user_query = "SELECT * FROM `users`";
    $show_user = mysqli_query($connection, $user_query);

    if ($show_user) {
        echo "<h2>Stored profile information- </h2>";
        echo '<table border="1">';
        echo '<tr><th>User ID</th><th>Profile picture</th><th>Username</th><th>Email</th><th>Gender</th><th>Country</th><th>Action</th></tr>';

        while ($generated_row = mysqli_fetch_assoc($show_user)) {
            echo '<tr>';
            echo '<td>' . $generated_row['user_id'] . '</td>';
            echo '<td><img src="uploaded pictures/' . $generated_row['pro_pic'] . '" width="50px height=15px"></td>';
            echo '<td>' . $generated_row['user'] . '</td>';
            echo '<td>' . $generated_row['email'] . '</td>';
            echo '<td>' . $generated_row['gender'] . '</td>';
            echo '<td>' . $generated_row['country'] . '</td>';
            echo '<td> <a href="editform.php?edit_data=' . $generated_row['user_id'] . '" onclick="return confirm(\'Are you sure?\')">Edit data</a> || <a href="delete.php?id=' . $generated_row['user_id'] . '"onclick="return confirm(\'Are you sure?\')">Delete</a></td>';

       
            echo '</tr>';
            
        }
        echo '</table>';

    
    }

    }


?>