<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

echo "<pre>";
print_r($_FILES);
echo "</pre>";

if(isset($_FILES['file'])){

    $doc_name = $_POST['doc_name'];
    $category = $_POST['category'];

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];

    $path = "uploads/" . $file_name;

    echo "Temp File: " . $temp_name . "<br>";
    echo "Target Path: " . $path . "<br>";

    if(move_uploaded_file($temp_name, $path)){

        echo "File moved successfully <br>";

        $sql = "INSERT INTO documents
        (doc_name, category, file_name, file_path)

        VALUES
        ('$doc_name','$category','$file_name','$path')";

        if(mysqli_query($conn,$sql)){

            echo "Saved in database";

        }
        else{

            echo mysqli_error($conn);

        }

    }
    else{

        echo "move_uploaded_file failed";

    }

}
else{

    echo "No file received";

}

?>