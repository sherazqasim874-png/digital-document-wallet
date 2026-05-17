<?php ?>
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
            font-family:Arial;
        }

        body{
            background:#f4f6f9;
        }

        /* Header */

        .header{
            background:#1e3a8a;
            color:white;
            padding:20px;
            text-align:center;
        }

        /* Main Container */

        .container{
            width:90%;
            margin:auto;
            margin-top:30px;
        }

        /* Upload Box */

        .upload-box{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            margin-bottom:30px;
        }

        .upload-box h2{
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

        button{
            background:#1e3a8a;
            color:white;
            border:none;
            padding:12px;
            width:100%;
            cursor:pointer;
            border-radius:5px;
            font-size:16px;
        }

        button:hover{
            background:#162d66;
        }

        /* Document Section */

        .documents{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .documents h2{
            margin-bottom:20px;
            color:#1e3a8a;
        }

        .doc-card{
            border:1px solid #ddd;
            padding:15px;
            margin-bottom:15px;
            border-radius:8px;
            background:#fafafa;
        }

        .doc-card h3{
            margin-bottom:10px;
        }

        .doc-card p{
            margin:5px 0;
        }

        .footer{
            background:#1e3a8a;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:40px;
        }

    </style>

</head>
<body>

    <!-- Header -->

    <div class="header">
        <h1>Digital Document Wallet Dashboard</h1>
    </div>

    <!-- Main Container -->

    <div class="container">

        <!-- Upload Section -->

        <div class="upload-box">

            <h2>Upload Document</h2>

            <input
            type="text"
            id="docName"
            placeholder="Enter Document Name">

            <select id="category">

                <option value="Education">Education</option>
                <option value="Identity">Identity</option>
                <option value="Medical">Medical</option>
                <option value="Other">Other</option>

            </select>

            <input
            type="file"
            id="fileInput">

            <button onclick="uploadDoc()">
                Upload Document
            </button>

        </div>

        <!-- Documents Section -->

        <div class="documents">

               <h2>Uploaded Documents</h2>

            <div class="documents">

               <h2>Uploaded Documents</h2>

               <?php include "get_documents.php"; ?>

            </div>

        </div>

    </div>

    <!-- Footer -->

    <div class="footer">
        © 2026 Digital Document Wallet Project
    </div>

    <!-- JavaScript -->

    <script>

    function uploadDoc(){

        let fileInput =
        document.getElementById("fileInput");

        if(fileInput.files.length == 0){

            alert("Please Select File");
            return;

        }

        let formData = new FormData();

        formData.append(
            "doc_name",
            document.getElementById("docName").value
        );

        formData.append(
            "category",
            document.getElementById("category").value
        );

        formData.append(
            "file",
            fileInput.files[0]
        );

        fetch("upload.php",{

            method:"POST",
            body:formData

        })

        .then(response => response.text())

        .then(data => {

            alert(data);

            location.reload();

        })

        .catch(error => {

            console.log(error);

        });

    }

    </script>

</body>
</html>