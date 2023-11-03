<?php

// file handling start

$rec_file = $_FILES['upload'];
$name = $rec_file['name'];
$tmp_name = $rec_file['tmp_name'];

if (!empty($name)) {
    $location = "uploads/";
    $target_file = $location . $name;

    if (move_uploaded_file($tmp_name, $target_file)) {
        echo "File has been uploaded as {$name} in the 'uploads/' directory. <br><br><br>";
        $path=$location.$name;
        echo "Here is a preview of your image- <br><br><br>";
        echo "<img src= '$path' width='200' height='200'>";
    } else {
        echo "Error uploading the file.";
    }
} else {
    echo "No file found.";
}

// file handling end

?>