<html>
    <head>
        <title>
    Become one of our own
    </title></head>

<form action="loginuser.php" method='post'>
<h2>
        Existing user? Click here to login.
    </h2>
    <label>Enter your email- </label>
    <input type="email" name="email" placeholder="Type your email"><br><br>
    <label>Enter your password- </label>
    <input type="password" name="password" placeholder="Type your password">
    <input type="submit" name="login" value="login">
</form>
</html>

<?php
require_once 'database.php';
session_start();

if (isset($_REQUEST['errorMessage'])){
    echo $_REQUEST['errorMessage'];
}

if (isset($_POST['login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_query="SELECT * FROM `users` WHERE `email` = '$email' && `password`= '$password'";
        $verify_user = mysqli_query($connection, $pass_query);
        $row_count=mysqli_num_rows($verify_user);

        if ($row_count) {
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            header("location: homepage.php?success=LOGIN successful");
            
        } else {
            header("location: loginuser.php?errorMessage=Username or password didn't match. Please check both or please register.");
        }
    } else {
        echo "Please provide all the information";
    }
}
?>
