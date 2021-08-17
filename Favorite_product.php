<?php
include 'config.php';
    $id = $_GET['id'];
	$sql = "UPDATE `customers`  SET favorite_products = NULL  WHERE `id` = $id";
	if (mysqli_query($conn, $sql)) {
		header("Location: manage_table.php");
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>

