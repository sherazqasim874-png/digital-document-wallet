<?php

include "db.php";

$sql = "SELECT * FROM documents ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

    echo "
    
    <div class='doc-card'>

        <h3>".$row['doc_name']."</h3>

        <p>
        <strong>Category:</strong>
        ".$row['category']."
        </p>

        <a href='".$row['file_path']."' target='_blank'>
            Open File
        </a>

    </div>

    ";

}

?>