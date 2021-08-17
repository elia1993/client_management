<?php
         $url = 'https://thatcopy.pw/catapi/rest/';
         $contents = file_get_contents($url,1,null,15);
         $short_url = explode(",",$contents);
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>new customers</title>
<style>
  img{
  max-width: 30%;
  max-height: 30%;
  margin-left:60%;
}
</style>
    </head>
    <body >
        <form   id="customer_form" method="POST"  >
          <fieldset>
          <div class="status-item">
            <h1 >טופס הוספת לקוח</h1>
           <br>
            <input id="name" maxlength="20" type="text" name="name" placeholder="שם מלא">
            <br>
          </div>
          <br>
          <h3>סוג לקוח</h3>
          <div id="Customer_Type" name="Customer_Type" >
            <input  type="radio" value="פרטי" id="Private" name="Customer_Type" />
            <label for="Private" class="radio">פרטי</label>
            <input  type="radio" value="עסקי" id="Business" name="Customer_Type"  />
            <label for="Business" class="radio">עסקי</label>
            <input type="radio" value="סטודנט" id="student" name="Customer_Type" />
            <label for="student" class="radio">סטודנט</label>
          </div>
          <br>
          <p><input id="phone" class="input"  name="phone" type="tel"    placeholder="מס' טלפון"   /></p>
          <input id="email" maxlength="20" type="text" name="email" placeholder='דוא"ל'>
          <br>
          <input id="address" maxlength="20" type="text" name="address" placeholder="כתובת מלאה">
          <h3>מין</h3>
          <div id="gender" name="gender" >
            <input type="radio" value="אחר" id="other" name="gender" />
            <label for="other" class="radio">אחר</label>
            <input  type="radio" value="אישה" id="female" name="gender"  />
            <label for="female" class="radio">אישה</label>
            <input  type="radio" value="גבר" id="male" name="gender" />
            <label for="male" class="radio">גבר</label>
          </div>
          <h3>מוצרים מועדפים</h3>
          <select id="Favorite_products" >
            <option name="Favorite_products" value="Macbook" >Macbook </option>
            <option name="Favorite_products"  value="iMac" >iMac</option>
            <option name="Favorite_products"  value="Airpods" >Airpods</option>
            <option name="Favorite_products"  selected value="Apple Watch" >Apple Watch</option>
            <option name="Favorite_products"  value="AppleTV" >AppleTV</option>
            <option name="Favorite_products"  value="iPhone" >iPhone</option>
            <option name="Favorite_products"  value="iPad" >iPad</option>
          </select>
          </div>
          <div ><img name="img" value="<?php echo $contents ?>" id="img" src=<?php echo $contents ?> ></div>
          <button id="add" class="button">שלח</button>
          <button type="reset" href="/" class="button" >נקה</button>
         </fieldset>
        </form>
    </body>
    </html>
 <script>


   $(document).ready(function() { //save form to data base.
      $('#add').on('click', function() {
        $("#add").attr("disabled", "disabled");
        var name = $('#name').val();
        var phone = $('#phone').val();
        var Customer_Type = $('input[name="Customer_Type"]:checked').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var gender =$('input[name="gender"]:checked').val();
        var Favorite_products = $('#Favorite_products').val();
        var img = <?php echo $short_url[0] ?>;
        if (name != "" && email != "") {
          $.ajax({
            url: "save.php",
            type: "POST",
            data: {
              'name': name,
              'Customer_Type': Customer_Type,
              'phone': phone,
              'email': email,
              'address' : address,
              'gender' : gender,
              'Favorite_products' : Favorite_products,
              'img' : img
          },
            cache: false,
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                $("#add").removeAttr("disabled");
                $('#myform').find('input:text').val('');
                alert('הנתונים נשמרו בהצלחה');
              } else if (dataResult.statusCode == 201) {
                alert("Error occured !");
              }

            }
          });
        } else {
          alert('בבקשה למלא כל השדות !');
        }
      });
    });
 </script>         
