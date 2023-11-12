<?php
require_once "database.php";
if (isset($_GET['edit_data'])){
    $user_id = $_GET['edit_data'];
    $show_info = "select * from users where user_id=$user_id";
    $run_database = mysqli_query($connection, $show_info);

    while ($row = mysqli_fetch_assoc($run_database)) {
?>
        
        <form action="dataupdate.php" method='post'>
            <label>Input your name- </label>
            <input type="text" name="name" value="<?php echo $row["user"]; ?>" placeholder="Type your name"><br>
            <label>Input your email- </label>
            <input type="email" name="email" value="<?php echo $row["email"]; ?>"placeholder="Type your email"><br>
            <label>Input your password- </label>
            <input type="password" name="password"value="<?php echo $row["password"]; ?>" placeholder="Type your Password"><br>
            <label>Input your gender- </label>
            <input type="gender" name="gender"value="<?php echo $row["gender"]; ?>" placeholder="Type your Gender"><br>
            <input type="submit" name="submit" value="Edit Data"> 
            <input type="hidden" name="hidden_id" value="<?php echo $user_id; ?>">
        </form>
        

<?php
    }
}
?>
