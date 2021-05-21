<?php
   include_once("dbconnect.php");
   if(isset($_POST['submit'])){
       $filename = $_FILES['uploadfile']['name'];
       $filetmpname = $_FILES['uploadfile']['tmp_name'];
       $folder = '/xampp/htdocs/262118_myshop/images/';
       $prname = $_POST['prname'];
       $prtype = $_POST['prtype'];
       $prprice = $_POST['prprice'];
       $prqty = $_POST['prqty'];
   
       move_uploaded_file($filetmpname,$folder.$filename);
          $sqlinsert = "INSERT INTO tbl_products(image,prname,prtype,prprice,prqty) VALUES('$filename','$prname','$prtype','$prprice','$prqty')";
          try{
              $conn->exec($sqlinsert);
              echo "<script> alert('Add Success.')</script>";
              echo "<script> window.location.replace('../php/index.php')</script>";
          }catch(PDOException $e){
              echo "<script> alert('Add failed')</script>";
              echo "<script> window.location.replace('../php/newproduct.php')</script>";
          }
       }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Add New Page</title>
      <link rel="shortcut icon" type="image" href="../images/logocloth.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../js/validate.js"></script>
      <link rel="stylesheet" href="../css/style.css">
   </head>
   <body>
      <div class="header">
         <img src="../images/4.jpg" alt="Logo">
         <h1>Welcome to Clothhut Shop</h1>
         <p>Add New Product</p>
      </div>
      <div class="navbar">
         <a href="../php/index.php" class="left">Main Page</a>
      </div>
      <div class="main1">
         <br><br>
         <div class="container">
            <form name="newForm" action="../php/newproduct.php" onsubmit="return validateNewForm()" method="post" enctype="multipart/form-data">
               <!-- <input type="file" name="uploadfile" id="idimage"><br> -->
               <div class="row1">
                  <div class="col-25">
                     <i class="fa fa-upload icon"></i>
                     <label for="image">Insert Product Image </label>
                  </div>
                  <div class="col-75">
                     <input type="file" name="uploadfile" id="idimage" onchange="validateImage()" >
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-user-secret icon"></i>
                     <label for="prname"><b>Product Name</b></label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idname" name="prname" placeholder="Product name..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-shopping-bag icon"></i>
                     <label for="prtype"><b>Product Type</b></label>
                  </div>
                  <div class="col-75">
                     <select name="prtype" id="idtype">
                        <option value="noselection">Please select the product type</option>
                        <option value="Tshirt">T-shirt</option>
                        <option value="VneckShirt">V-neck Shirt</option>
                        <option value="Hoodies">Hoodies</option>
                        <option value="longSleeveShirt">Long Sleeve Shirt</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-money icon"></i>
                     <label for="prprice"><b>Product Price(RM)</b></label>
                  </div>
                  <div class="col-75">
                     <input type="tel" id="idprice" name="prprice" placeholder="Product price is..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-sort-numeric-asc icon"></i>
                     <label for="prqty"><b>Quantity</b></label>
                  </div>
                  <div class="col-75">
                     <input type="number" id="idqty" name="prqty" placeholder="Select product quantity.." min="1" max="100">
                  </div>
               </div>
               <div class="row">
                  <div><input type="submit" name="submit" value="Submit"></div>
               </div>
            </form>
         </div>
      </div>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>