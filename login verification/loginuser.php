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
    <input type="submit" name="login" value="LOGIN as User">
</form>
<form action="loginuser.php" method='post'>
<h2>
        ***Admin LOGIN***
    </h2>
    <p>Please note, if you are an admin, you must login with a special code provided. Further, input your email to ensure security.</p>
    <label><b>Enter your email- </b></label>
    <input type="email" name="adminmail" placeholder="Type your email"><br><br>
    <label><b>Enter code- </b></label>
    <input type="code" name="code" placeholder="Enter secret code"><br><br>
    <input type="submit" name="adminlogin" value="LOGIN as Admin">
</form>

<strong>Need to register? <a href="index.php">Register</a> here</strong>
</html>
</html>

<?php
require_once 'database.php';
session_start();

if (isset($_REQUEST['errorAdmin'])){
    echo "<br>";
    echo ($_REQUEST['errorAdmin']);
}

if (isset($_REQUEST['errorMessage'])){
    echo "<br>";
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

if (isset($_POST['adminlogin'])){

    if (!empty($_POST['adminmail']) && !empty($_POST['code'])){
        $code=$_POST['code'];
        $adminmail=$_POST['adminmail'];
        $main_code=123456;

        $admin_query="SELECT * FROM `users` WHERE `email` = '$adminmail' && login_id = 1";
        $verify_admin = mysqli_query($connection, $admin_query);
        $row_count=mysqli_num_rows($verify_admin);

        if ($row_count && $code==$main_code){
            $admin_data = mysqli_fetch_assoc($verify_admin);
            $ad_username=$admin_data['user'];
            $_SESSION['admin_username']=$ad_username;
            $_SESSION['ad_email']=$ad_email;
            header("location:showprofile.php?");

        }
        else{
            header("location: loginuser.php?errorAdmin=One of the information is wrong. Please check again");

        }

    }
    else{
        echo "Please fillup all the information";
    }


}
?>
