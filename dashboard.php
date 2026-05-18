<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

include "db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Digital Document Wallet</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
        }

        /* Sidebar */

        .sidebar{
            width:250px;
            height:100vh;
            background:#1e3a8a;
            color:white;
            position:fixed;
            padding:20px;
        }

        .sidebar h2{
            text-align:center;
            margin-bottom:40px;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar ul li{
            margin:20px 0;
        }

        .sidebar ul li a{
            color:white;
            text-decoration:none;
            font-size:18px;
            display:block;
            padding:10px;
            border-radius:5px;
            transition:0.3s;
        }

        .sidebar ul li a:hover{
            background:white;
            color:#1e3a8a;
        }

        /* Main Content */

        .main-content{
            margin-left:250px;
            width:100%;
            padding:20px;
        }

        /* Header */

        .header{
            background:white;
            padding:20px;
            border-radius:10px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .header h1{
            color:#1e3a8a;
        }

        .logout-btn{
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

        /* Cards */

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-top:20px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .card h2{
            color:#1e3a8a;
            margin-bottom:10px;
        }

        .card p{
            font-size:25px;
            font-weight:bold;
        }

        /* Upload Section */

        .upload-section{
            background:white;
            margin-top:30px;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .upload-section h2{
            margin-bottom:20px;
            color:#1e3a8a;
        }

        input, select{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .upload-btn{
            width:100%;
            padding:12px;
            background:#1e3a8a;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        .upload-btn:hover{
            background:#162d66;
        }

        /* Documents Section */

        .documents-section{
            margin-top:30px;
        }

        .documents-section h2{
            color:#1e3a8a;
            margin-bottom:20px;
        }

        .document-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
            gap:20px;
        }

        .document-card{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .document-card h3{
            margin-bottom:10px;
            color:#1e3a8a;
        }

        .document-card p{
            margin:8px 0;
        }

        .btn-group{
            display:flex;
            gap:10px;
            margin-top:15px;
        }

        .open-btn{
            background:#1e3a8a;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

        .delete-btn{
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

        /* Footer */

        .footer{
            margin-top:40px;
            text-align:center;
            color:gray;
        }

        /* Responsive */

        @media(max-width:768px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main-content{
                margin-left:0;
            }

            body{
                display:block;
            }

        }

    </style>

</head>
<body>

    <!-- Sidebar -->

    <div class="sidebar">

        <h2>Digital Wallet</h2>

        <ul>

            <li>
                <a href="#">Dashboard</a>
            </li>

            <li>
                <a href="#upload">Upload Documents</a>
            </li>

            <li>
                <a href="#documents">My Documents</a>
            </li>

            <li>
                <a href="logout.php">Logout</a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->

    <div class="main-content">

        <!-- Header -->

        <div class="header">

            <h1>
                Welcome,
                <?php echo $_SESSION['user']; ?>
            </h1>

            <a href="logout.php">
                <button class="logout-btn">
                    Logout
                </button>
            </a>

        </div>

        <!-- Dashboard Cards -->

        <div class="cards">

            <?php

            $count_sql = "SELECT * FROM documents";
            $count_result = mysqli_query($conn, $count_sql);
            $total_documents = mysqli_num_rows($count_result);

            ?>

            <div class="card">

                <h2>Total Documents</h2>

                <p>
                    <?php echo $total_documents; ?>
                </p>

            </div>

            <div class="card">

                <h2>Categories</h2>

                <p>4</p>

            </div>

            <div class="card">

                <h2>Status</h2>

                <p>Active</p>

            </div>

        </div>

        <!-- Upload Section -->

        <div class="upload-section" id="upload">

            <h2>Upload New Document</h2>

            <form action="upload.php" method="POST" enctype="multipart/form-data">

                <input
                type="text"
                name="document_name"
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

                    <option value="Financial">
                        Financial
                    </option>

                </select>

                <input
                type="file"
                name="file"
                required>

                <button type="submit" class="upload-btn">
                    Upload Document
                </button>

            </form>

        </div>

        <!-- Documents Section -->

        <div class="documents-section" id="documents">

            <h2>Uploaded Documents</h2>

            <div class="document-grid">

                <?php

                $sql = "SELECT * FROM documents ORDER BY id DESC";

                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                ?>

                <div class="document-card">

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

                    <p>
                        <strong>Status:</strong>
                        Uploaded
                    </p>

                    <div class="btn-group">

                        <a href="uploads/<?php echo $row['file_name']; ?>" target="_blank">

                            <button class="open-btn">
                                Open File
                            </button>

                        </a>

                        <a href="delete.php?id=<?php echo $row['id']; ?>">

                            <button class="delete-btn">
                                Delete
                            </button>

                        </a>

                    </div>

                </div>

                <?php

                }

                ?>

            </div>

        </div>

        <!-- Footer -->

        <div class="footer">

            <p>
                © 2026 Digital Document Wallet | Developed by Muhammad Sheraz Qasim
            </p>

        </div>

    </div>

</body>
</html>