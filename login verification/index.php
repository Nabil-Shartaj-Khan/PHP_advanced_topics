<html>
<body>
<h2>Verify login</h2>
<form action="verifylogin.php" method='post'>
    
    <input type="text" name="name" placeholder="Type your name">
    <input type="email" name="email" placeholder="Type your email">
    <input type="password" name="password" placeholder="Type your Password">
    <input type="submit" value="submit">

</form>

<?php
echo $_REQUEST['passMessage']
?>

</body>
</html>