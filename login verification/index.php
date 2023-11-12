<?php
require_once 'database.php';

if (isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $user_query=  "INSERT INTO `users` (`user`, `password`, `gender`, `country`, `email`) VALUES ('$username', '$password', '$gender', '$country', '$email');";

    $result=mysqli_query($connection,$user_query);

    if (!$result){
        die ("Not successful");
    }
}

?>


<html>
    <head>
        <title>
        Explore the opportunities now.
        </title>
    </head>
<body>
<h2>New user? Register here</h2>
<form action="registeruser.php" method='post'>
    
    <label>Enter your name- </label>
    <input type="text" name="name" placeholder="Type your name"><br><br>
    <label>Enter your Email- </label>
    <input type="email" name="email" placeholder="Type your email">
    <br><br>
    <label>Enter your password- </label>
    <input type="password" name="password" placeholder="Type your Password"><br><br>
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
<strong>Existing user? or Admin? <a href="loginuser.php">LOGIN</a> here</strong>

<?php
if (isset($_REQUEST['success'])){
    echo $_REQUEST['success'];
}

if (isset($_REQUEST['passMessage'])){
    echo $_REQUEST['passMessage'];
}


if (isset($_REQUEST['successful'])){
    echo $_REQUEST['successful'];
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

?>

</body>
</html>