<?php
require_once 'database.php';

if (isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=password_hash($password,PASSWORD_DEFAULT);
    $user_query=  "INSERT INTO users (`user`, `password`, `email`) VALUES ( '$username', '$password', '$email')";

    $result=mysqli_query($connection,$user_query);

    if (!$result){
        die ("Not successful");
    }
}

?>


<html>
<body>
<h2>Verify login</h2>
<form action="verifylogin.php" method='post'>
    
    <input type="text" name="name" placeholder="Type your name">
    <input type="email" name="email" placeholder="Type your email">
    <input type="password" name="password" placeholder="Type your Password">
    <input type="submit" name="submit" value="submit"> 

</form>

<?php

if (isset($_REQUEST['passMessage'])){
    echo $_REQUEST['passMessage'];
}

function passwordGenerator() {
    $all_keys = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+[]{}|\\:;,<>.?';
    $str = '';
    $final_length = rand(5, 10);

    for ($i = 0; $i < $final_length; $i++) {
        $str .= $all_keys[rand(0, strlen($all_keys) - 1)];
    }
    return $str;
}

$randomGeneratedPassword = passwordGenerator();

echo "You can use the following password to login- <br><br> <b>{$randomGeneratedPassword}</b><br>";
?>

</body>
</html>