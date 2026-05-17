<?php

include "db.php";

if(isset($_POST['email']) && isset($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(email,password)
    VALUES('$email','$password')";

    if(mysqli_query($conn,$sql)){
        echo "Registration Successful";
    }
    else{
        echo "Registration Failed";
    }

}
else{
    echo "No Data Received";
}

?>