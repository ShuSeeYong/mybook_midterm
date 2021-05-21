<?php
   session_start();
   include_once("dbconnect.php");
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Main Page</title>
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
         <p>Main Page</p>
      </div>
      <div class="navbar">
         <a href="../php/newproduct.php" class="right">Add Product</a>
      </div>
      <div class="main">
         <center>
            <!-- <img src="../images/logocloth.png"> -->
            <h1>Product List</h1>
         </center>
      </div>
      <div class="row">
         <?php
            $conn = mysqli_connect("localhost","root","") or die("Unable to connect");
            mysqli_select_db($conn,"myshopdb");
            
            $sql ="SELECT * FROM tbl_products";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            	while($row=mysqli_fetch_assoc($result)){
         ?>
         <div class="column-card" >
            <div class="card">
               <div class="left">
                  <!-- <div style="float:left;width:25%;text-align:center;padding:10px 50px 18px 50px"> -->
                  <img src = "/262118_myshop/images/<?php echo $row['image'];?>" height=80% width=80%/>
               </div>
               <div class="right">
                  <p>Product Name: &nbsp&nbsp<?php echo $row['prname']; ?></p>
                  <p>Product Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
                  <p>Product Price: &nbsp&nbsp<?php echo $row['prprice']; ?></p>
                  <p>Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
               </div>
            </div>
         </div>
         <?php
            }
            }
         ?>
      </div>
      <br>
      <br>
      <a href="newproduct.php" class="float">
      <i class="fa fa-plus my-float"></i>
      <span class="tooltiptext">Add New Product</span>
      </a>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>