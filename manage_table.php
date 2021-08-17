<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <title>management customers</title>
    <style>
        .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
th{
    text-align: center;
}
tr{
    text-align: center;

}
input{
    margin-top: 15px;
}
#filtering{
    margin-top: 15px;

}
    </style>
</head>
<body>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
  
    <form id='myform' method="POST"  >
        <div>
            <select  id="filtering"  >
            <option name="filtering" value="id" >מזהה לקוח </option>
            <option name="filtering"  value="phone" >טלפון</option>
            <option name="filtering"  value="customer_name" >שם לקוח</option>
          </select>
          </div>
    <input  id="input" maxlength="20" type="text" name="input" placeholder="">

    </form>
    <table id="table" class="table table-striped custab">
    <thead>
        <tr>
            <th>תמונה </th>
            <th>מוצר מועדף</th>
            <th>מין</th>
            <th>כתובת</th>
            <th>דוא"ל</th>
            <th>סוג לקוח</th>
            <th>מס' טלפון</th>
            <th>שם לקוח </th>
            <th> מס' מזהה</th>
            <th>פעולה</th>
        </tr>
    </thead>
<tbody>
    <?php
    $query = "SELECT * FROM  `customers`";
    $r = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($r)){
    ?>
    <tr>
        <td> <img style='max-width: 80px;max-height: 80px;' src="<?php echo $row['image'] ?>"></td>
        <td class="text-center"><?php echo $row['favorite_products'] ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td class="text-center"><?php echo $row['customer_Type'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['customer_name'] ?></td>
        <td><?php echo $row['id'] ?></td>
        <td >

           <a style="margin:2px;" href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs remove"><span   class="glyphicon glyphicon-remove"></span> מחק לקוח</a>
        <a  style="margin:2px;" class="btn btn-danger btn-xs removeType" href="customer_type.php?delete=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-remove"></span> מחק סוג לקוח</a>
        <a style="margin:2px;" href="Favorite_product.php?id=<?php echo $row['id'];?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>מחק מוצר מועדף</a>
       <br><br>
        <a  href="updateProduct.php?id=<?php echo $row['id'];?>"  class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> עדכן</a> 

        </td>

      </tr>
    <?php
    } 
    ?>

 
</tbody>
</div>
</body>
</html>
<script>

       $(document).ready(function() { //display from DB
      $("#input").keyup( function() {
        var input = $('#input').val();
        var filtering = $('#filtering').val();
          $.ajax({
            url: "filter.php",
            type: "POST",
            data:{
                'input': input,
                'filtering': filtering
            },
          success: function(data){
              console.log(input);
              console.log(filtering);
              $('#table').html(data);
          }
    });
    });
});

</script>