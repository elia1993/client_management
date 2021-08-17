<?php
include 'config.php';
    $id = $_GET['delete'];
	$sql = "UPDATE `customers`  SET customer_Type = NULL  WHERE `id` = $id";
	if (mysqli_query($conn, $sql)) {
		header("Location: manage_table.php");
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>

