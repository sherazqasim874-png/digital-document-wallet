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

        <h1>Digital Document Wallet</h1>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

    <!-- Main Container -->

    <div class="container">

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

        <div class="documents">

            <h2>Uploaded Documents</h2>

            <?php

            $sql = "SELECT * FROM documents ORDER BY id DESC";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

            ?>

            <div class="doc-card">

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

</body>
</html>