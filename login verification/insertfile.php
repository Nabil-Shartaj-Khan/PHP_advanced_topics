<?php
require_once "database.php";

if (isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $file_rec=$_FILES['upload'];
    $image_name=$file_rec['name'];
    $temp_name=$file_rec['tmp_name'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    
    if(!empty($image_name) && !empty($username) && !empty($email) && !empty($password) && !empty($gender) && !empty($country)) {
        $loc="uploaded pictures/";

        if(move_uploaded_file($temp_name,$loc.$image_name)){
            header("location:showprofile.php");
        }
        $user_query=  "INSERT INTO users (`pro_pic`,`user`, `password`, `email`, `gender`, `country`) VALUES ('$image_name','$username', '$password','$email','$gender', '$country')";

        $result=mysqli_query($connection,$user_query);
    
        if (!$result){
            die ("Not successful");
        }

    }
    else{
        echo "Please give every information";
    }


}

?>