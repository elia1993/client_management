<?php
include 'config.php';
$id=$_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM customers WHERE id=$id");
while($res=mysqli_fetch_array($result)){
    $Favorite_products = $res['favorite_products'];
    $Customer_Type = $res['customer_Type'];
    $id = $res['id'];
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET['id'];
    $Favorite_products=$_POST['favorite'];
    $Customer_Type= $_POST['customer'];
    $result = mysqli_query($conn,"UPDATE `customers` SET `favorite_products`='$Favorite_products' , `customer_Type` = '$Customer_Type' WHERE `id` = '$id'  ");
    if($result){

        header("Location: manage_table.php");
    }
    else{
        echo "error";
    }
	mysqli_close($conn);
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<form method="POST">
<br>
<div style="text-align:center;">
<h3>Favorite product</h3><input class="text-info" type="text" name="favorite" value="<?php echo $Favorite_products?> "> 
<br><br>
<h3>Customer Type</h3><input class="text-info" type="text" name="customer" value="<?php echo $Customer_Type ?>"> 
<br><br>
<input  type="submit"  class="btn btn-info btn-md" name="submit"  value="Update">
</div>
</form>