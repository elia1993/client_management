<?php 
include 'config.php';
if(isset($_POST['input'])){   
     $input = $_POST['input'];
    $filtering = $_POST['filtering'];   
    $sql_query = "SELECT * FROM `customers` WHERE $filtering = $input ";
    $result = mysqli_query($conn, $sql_query);
    $count = mysqli_num_rows($result);
    ?>
<table class="table">
    <?php 
    if($count){


?>
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
        <?php 
    }else{
        echo "אין נתונים";
    }
        ?>
    </thead>
    <tbody>
        <?php
               while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
        <td> <img style='max-width: 80px;max-height: 80px;' src="<?php echo $row['image'] ?>"></td>
        <td class="text-center"><?php echo $row['favorite_products'] ?></a></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td class="text-center"><?php echo $row['customer_Type'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['customer_name'] ?></td>
        <td><?php echo $row['id'] ?></td>
        <td   class="text-center"><a  id="<?php $row['id']?>" value="<?php echo $row['id']?>."  class="btn btn-danger btn-xs"><span  value="id.<?php echo $row['id']?>."  class="glyphicon glyphicon-remove"></span> Del</a></td>

    </tr>
    <?php
}
    ?>
    </tbody>
</table>
<?php
}
?>
<script>
    $(document).ready(function() { //Delete  form DB.
      $('.btn').on('click', function() {
        var id = $('.btn').attr('value');
        console.log(id);
          $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
              'id': id
          },
            cache: false,
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                $("#add").removeAttr("disabled");
                $('#myform').find('input:text').val('');
                alert('הלקוח נמחק');
                location.reload();
              } else if (dataResult.statusCode == 201) {
                alert("Error occured !");
              }

            }
          });

      });
    });

</script>