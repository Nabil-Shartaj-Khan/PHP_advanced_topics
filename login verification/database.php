<?php

$connection=mysqli_connect('localhost','root','','usersdb',3307);

if (!$connection){
    die ("Not connected".mysqli_connect_error());
}
?>