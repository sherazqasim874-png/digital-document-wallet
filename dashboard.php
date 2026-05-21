<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include "db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Digital Document Wallet</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Navbar -->

    <div class="navbar">

    <div class="logo-section">

        <img src="images/logo.png" class="logo">

        <h1>Digital Document Wallet</h1>

    </div>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

</div>

    <!-- Main Container -->

    <div class="container">
        <!-- Statistics Cards -->
         <?php

/* TOTAL DOCUMENTS */

$total_query =
mysqli_query($conn,
"SELECT * FROM documents");

$total_docs =
mysqli_num_rows($total_query);


/* PDF FILES */

$pdf_query =
mysqli_query($conn,
"SELECT * FROM documents
WHERE file_name LIKE '%.pdf'");

$pdf_docs =
mysqli_num_rows($pdf_query);


/* CERTIFICATES */

$certificate_query =
mysqli_query($conn,
"SELECT * FROM documents
WHERE category='Certificates'");

$certificate_docs =
mysqli_num_rows($certificate_query);

?>

<div class="stats-container">

    <div class="stat-card"
    onclick="filterDocs('all')">

        <h2>Total Documents</h2>

        <p><?php echo $total_docs; ?></p>

    </div>

    <div class="stat-card"
    onclick="filterDocs('pdf')">

        <h2>PDF Files</h2>

        <p><?php echo $pdf_docs; ?></p>

    </div>

    <div class="stat-card"
    onclick="filterDocs('Certificates')">

        <h2>Certificates</h2>

        <p><?php echo $certificate_docs; ?></p>

    </div>

</div>

        <!-- Upload Section -->

        <div class="upload-box">

            <h2>Upload New Document</h2>

            <form
            action="upload.php"
            method="POST"
            enctype="multipart/form-data">

                <input
                type="text"
                name="doc_name"
                placeholder="Enter Document Name"
                required>

                <select name="category" required>

                    <option value="">
                        Select Category
                    </option>

                    <option value="Education">
                        Education
                    </option>

                    <option value="Identity">
                        Identity
                    </option>

                    <option value="Medical">
                        Medical
                    </option>

                    <option value="Certificates">
                        Certificates
                    </option>

                </select>

                <input
                type="file"
                name="file"
                required>

                <button
                type="submit"
                class="upload-btn">

                    Upload Document

                </button>

            </form>

        </div>

        <!-- Documents Section -->
         <!-- Search Bar -->

<div class="search-box">

    <input
    type="text"
    id="searchInput"
    placeholder="Search Documents...">

</div>

        <div class="documents">

            <h2>Uploaded Documents</h2>

            <?php

            $sql = "SELECT * FROM documents ORDER BY id DESC";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

            ?>

            <div class="doc-card"

data-category="<?php echo $row['category']; ?>"

data-file="<?php echo $row['file_name']; ?>">

                <h3>
                    <?php echo $row['doc_name']; ?>
                </h3>

                <p>

                    <strong>Category:</strong>

                    <?php echo $row['category']; ?>

                </p>

                <p>

                    <strong>File:</strong>

                    <?php echo $row['file_name']; ?>

                </p>

                <a
                href="uploads/<?php echo $row['file_name']; ?>"
                target="_blank"
                class="open-btn">

                    Open File

                </a>

                <a
                href="delete.php?id=<?php echo $row['id']; ?>"
                class="delete-btn">

                    Delete

                </a>

            </div>

            <?php

                }

            } else {

                echo "<p>No Documents Uploaded Yet</p>";

            }

            ?>

        </div>

    </div>

    <!-- Footer -->

    <footer>

        <p>
            © 2026 Digital Document Wallet | Developed by Muhammad Sheraz Qasim
        </p>

    </footer>
    <script>

function filterDocs(type){

    let cards =
    document.querySelectorAll(".doc-card");

    cards.forEach(function(card){

        let category =
        card.getAttribute("data-category");

        let file =
        card.getAttribute("data-file");

        /* SHOW ALL */

        if(type === "all"){

            card.style.display = "block";
        }

        /* SHOW PDF FILES */

        else if(type === "pdf"){

            if(file.toLowerCase().endsWith(".pdf")){

                card.style.display = "block";

            }else{

                card.style.display = "none";
            }
        }

        /* SHOW CATEGORY */

        else{

            if(category === type){

                card.style.display = "block";

            }else{

                card.style.display = "none";
            }
        }

    });

}

</script>

</body>
</html>