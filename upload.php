<?php

include 'db.php';

$doc_name = isset($_POST['doc_name']) ? $_POST['doc_name'] : '';

$category = $_POST['category'];

$file_name = $_FILES['file']['name'];

$temp_name = $_FILES['file']['tmp_name'];

$target = "uploads/" . $file_name;

move_uploaded_file($temp_name, $target);

$query = mysqli_query($conn,
"INSERT INTO documents(doc_name, category, file_name)
VALUES('$doc_name','$category','$file_name')");

if($query){

    header("Location: dashboard.php");
    exit();

} else {

    echo "Database Error";

}

?>