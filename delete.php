<?php
include 'config.php';

    $id = $_GET['id'];
	$sql = "DELETE FROM `customers` WHERE `id` = $id";
	if (mysqli_query($conn, $sql)) {
		header("Location: manage_table.php");
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>