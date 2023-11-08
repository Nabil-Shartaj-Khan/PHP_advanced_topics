<?php
require_once 'database.php';
session_start();

if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    
    $email = $_SESSION["email"];
    $password = $_SESSION['password'];
    $pass_message = "LOGIN successful";
    echo $pass_message;
    echo "<br><br> Your email is {$email}";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the page</title>
</head>
<body>
    <h1 style="text-align:center">You are here means you passed the password test</h1>
    <p style="text-align:center">Welcome to this page. Congratulations.</p>

    <form action="homepage.php" method="post" id='form'>
    <label>Logout here or checkout your profile page</label><br>
    <input type="submit" name="logout" value="logout" class="logout-button">
    <input type="submit" name="profile" value="profile" class="profile">
</form>
</body>
</html>

<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
}

if (isset($_POST['profile'])) {
    header('location: showprofile.php');
}
?>