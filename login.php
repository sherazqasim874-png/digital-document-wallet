<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Digital Wallet</title>

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

        /* Container */

        .container{
            display:flex;
            justify-content:center;
            align-items:center;
            height:80vh;
        }

        /* Login Box */

        .login-box{
            background:white;
            width:350px;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:20px;
            color:#1e3a8a;
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:12px;
            background:#1e3a8a;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#162d66;
        }

        .register-link{
            text-align:center;
            margin-top:15px;
        }

        .register-link a{
            color:#1e3a8a;
            text-decoration:none;
            font-weight:bold;
        }

        /* Footer */

        .footer{
            background:#1e3a8a;
            color:white;
            text-align:center;
            padding:15px;
            position:fixed;
            bottom:0;
            width:100%;
        }

    </style>

</head>
<body>

    <!-- Header -->

    <div class="header">
        <h1>Digital Document Wallet</h1>
    </div>

    <!-- Login Section -->

    <div class="container">

        <div class="login-box">

            <h2>User Login</h2>

            <form action="login_process.php" method="POST">

                <input
                type="email"
                name="email"
                placeholder="Enter Email"
                required>

                <input
                type="password"
                name="password"
                placeholder="Enter Password"
                required>

                <button type="submit">
                    Login
                </button>

            </form>

            <div class="register-link">

                Don't have an account?

                <a href="register.html">
                    Register
                </a>

            </div>

        </div>

    </div>

    <!-- Footer -->

    <div class="footer">
        © 2026 Digital Document Wallet
    </div>

</body>
</html>