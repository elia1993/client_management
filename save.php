<?php
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $Customer_Type = $_POST['Customer_Type'];   
    $phone = $_POST['phone'];  
    $email = $_POST['email'];  
    $address = $_POST['address'];  
    $gender = $_POST['gender'];  
    $img = $_POST['img'];  
    $Favorite_products = $_POST['Favorite_products'];  
        $sql_query = "INSERT INTO `customers` (`customer_name`,`phone`,`customer_Type`,`email`,`address`,`gender`,`favorite_products`,`image`)
	 VALUES ('$name','$phone','$Customer_Type','$email','$address','$gender','$Favorite_products','$img')";
     if (mysqli_query($conn, $sql_query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
}




?>