<?php
require_once "database.php";

if (isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $file_rec=$_FILES['upload'];
    $image_name=$file_rec['name'];
    $temp_name=$file_rec['tmp_name'];
    
    if(!empty($image_name)){
        $loc="uploaded pictures/";

        if(move_uploaded_file($temp_name,$loc.$image_name)){
            header("location:showprofile.php");
        }
    }
    else{
        echo "Please upload a picture";
    }

    $user_query=  "INSERT INTO users (`pro_pic`,`user`, `password`, `email`) VALUES ('$image_name','$username', '$password', '$email')";

    $result=mysqli_query($connection,$user_query);

    if (!$result){
        die ("Not successful");
    }
}

?>