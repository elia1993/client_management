<?php
    $servername ="localhost";
    $username = "root";
    $password ="";
    $db = "customers";
    $conn = mysqli_connect($servername , $username ,$password ,$db);
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>