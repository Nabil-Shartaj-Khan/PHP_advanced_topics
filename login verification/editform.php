<?php
require_once "database.php";
if (isset($_GET['edit_data'])){
    $user_id = $_GET['edit_data'];
    $show_info = "select * from users where user_id=$user_id";
    $run_database = mysqli_query($connection, $show_info);

    while ($row = mysqli_fetch_assoc($run_database)) {
?>
    
        <form action="dataupdate.php" method='post'>
            <input type="text" name="name" value="<?php echo $row["user_id"]; ?>" placeholder="Type your name">
            <input type="email" name="email" value="<?php echo $row["email"]; ?>"placeholder="Type your email">
            <input type="password" name="password"value="<?php echo $row["password"]; ?>" placeholder="Type your Password">
            <input type="submit" name="submit" value="Edit Data"> 
            <input type="hidden" name="hidden_id" value="<?php echo $user_id; ?>">
        </form>

<?php
    }
}
?>
