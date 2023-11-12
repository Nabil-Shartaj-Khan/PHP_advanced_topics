<?php

$connection=mysqli_connect('localhost','root','','usersdb');

if (!$connection){
    die ("Not connected".mysqli_connect_error());
}
?>