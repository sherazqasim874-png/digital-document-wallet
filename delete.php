<?php

include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM documents WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$file = $row['file_name'];

unlink("uploads/".$file);

$delete = "DELETE FROM documents WHERE id='$id'";

mysqli_query($conn, $delete);

header("Location: dashboard.php");

?>