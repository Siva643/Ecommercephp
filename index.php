<?php

include('includes/connect.php');
include('functions/common_function.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="titleimage.jpg">
    <title>Online Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
      .hidden{
        color:green;
      }
      body{
        display:flex;
        overflow-x:hidden;
        font-family: 'Poppins', sans-serif;
      }
  .card-img-top{
    width:100%;
    height:200px;
    object-fit:contain;
    padding:10px;
    
     }
.navimage{
  width:80px;
  height:80px;
  object-fit:contain;
}
.indexnav{
    width:4%;
    height:4%;
    border-radius: 50%;
    
}





     
      </style>
</head>
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg bg-primary" style="position:relative;top:0;">
  <div class="container-fluid">
    <img class="indexnav" src="nav.jpg">

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active text-light fw-bold" style="margin-left:20px;" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light fw-bold"  style="margin-left:20px;" aria-current="page" href="display_all.php">Product</a>
        </li>
<?php
        if(isset($_SESSION['username']))
        {
          echo " <li class='nav-item'>
          <a class='nav-link active fw-bold text-light'  style='margin-left:20px;' aria-current='page' href='user_area/profile.php'>My Account</a>
        </li>";
        }
else{
  "<li class='nav-item'>
  <a class='nav-link active' aria-current='page'  style='margin-left:20px;' href='user_area/user_registration.php'>Register</a>
</li>";
}

        ?>
       
        
        <li class="nav-item">
          <a class="nav-link active text-light fw-bold"  style="margin-left:20px;" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping"><sup><?php card_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
  
          <a class="nav-link active text-light fw-bold"  style="margin-left:20px;" aria-current="page" href="#">Total price:<?php echo total_card_price(); ?>/- </a>
        </li>
       
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" required>
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" class="btn btn-outline-light" value="search" name="search_data_products">
      </form>
    </div>
  </div>
</nav>


<!-- cardding calling function -->
<?php
card();
?>
 <!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="">
  <ul class="navbar-nav me-auto">
    <li class="nav-item" style="margin-left:20px;" >
    
        <a href="#" style="color:white;" class="nav-link mt-2">Welcome <?php //echo $_SESSION['username'] ?></a>
</li>
<?php
if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
  <a href='./user_area/user_login.php' style='color:white;margin-left:20px;' class='nav-link mt-2'>Login</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a href='./user_area/logout.php' style='color:white;margin-left:20px;' class='nav-link mt-2'>Logout</a>
</li>";
}

?>


</ul>  
</nav>
 

<div class="container bg-light">
  <div class="row">
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
    <img src="./admin_area/product_images/applemobile.jpg" class="navimage"><br>
      <p class="p-0 m-2 fw-bold" style="position:relative;right:5%;">iphone</p>
   
       </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/acer3.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;left:6%;">Laptop</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/camera4.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;right:6%;">Camera</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/computer.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;right:6%;">Computer</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/jeans4.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;left:6%;">Jeans</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/lenovo1.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;left:6%;">Tablet</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/samsungmobile.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;left:6%;">Mobile</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/shoes4.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;left:6%;">Shoes</p>

    </div>
    <div class="col-4 col-sm-4 col-md"  style="padding:30px">
      <img src="./admin_area/product_images/smarttv3.jpg" class="navimage">
      <p class="p-0 m-2 fw-bold" style="position:relative;right:6%;">Smart tv</p>

    </div>
 
   
  </div>
</div>

<!-- background -->




<!--third child -->

<!--<div class="bg-light">
    <h3 class="text-center hidden">Hidden store</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community </p>
</div>-->

<div class="row" style="margin-left:0px;">

<div class="col col-md-2 bg-dark p-0">

    <ul class="navbar-nav text-center">
        <li class="nav-item bg-warning">
            <a href="#" class="nav-link text-dark fw-bold"><h4 style="padding:20px;">Available Brands</h4></a>
</li><br><br>
<?php
getbrands();
/*$select_brands="Select * from brands";
$result_brands=mysqli_query($con,$select_brands);

while($row_data=mysqli_fetch_assoc($result_brands))
{
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_title'];
  echo "<li class='nav-item'>
  <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  </li>";
}*/

?>

</ul>


<ul class="navbar-nav text-center me-auto">
        <li class="nav-item bg-warning">
            <a href="#" class="nav-link text-dark fw-bold"><h4 style="padding:18px;">Available Products</h4></a>
</li><br><br>
<?php
getcategories();
/*$select_categories="Select * from categories";
$result_categories=mysqli_query($con,$select_categories);

while($row_data=mysqli_fetch_assoc($result_categories))
{
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo "<li class='nav-item'>
  <a href='index.php?brand=$category_id' class='nav-link text-light'>$category_title</a>
  </li>";
}*/

?>

</ul> 


</div> 

<!-- fourth child -->



<!--<div class="row mt-5">-->

<div class="col-md-10 p-0">
<div class="container-fluid m-0 p-0 mt-0">
  <div class="col-md-12">
   <img src="tshirtbackground.jpg"  style="height:300px;width:100%;" alt="img">
</div>
 
<div class="col-12 col-sm-12 col-md-12 mb-5">
   <img src="background1.jpg" class="img-responsive m-0 p-0" style="height:300px;width:100%;" alt="img">
</div>
        <!-- products--> 
          
          

        <div class="row" style="margin-left:30px;">
 
       

<?php
//search_product();
getproducts();
get_unique_categories();
get_unique_brands(); 

//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
/*$select_query="Select * from `products` order by rand() LIMIT 0,9";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query))
{
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brands_id=$row['brands_id'];
  echo  "<div class='col-md-4 mb-5'>
  <div class='card' style='width: 18rem;'>
<img class='card-img-top' src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<a href='#' class='btn btn-info'>Add to card</a>
<a href='#' class='btn btn-secondary'>View more</a>
</div>
</div>
  </div>";
}*/

?>

          
            <!-- row end -->
            </div>
            <!-- col end -->
</div> 

</div>



</div>


<?php
include("./includes/footer.php");

?>
</div>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html> 