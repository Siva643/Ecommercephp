<?php

include('connect.php');
include('common_function.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="titleimage.jpg">
    
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
      .hidden{
        color:green;
      }
      body{
        
        font-family: 'Poppins', sans-serif;
        over-flow:hidden;
      }
      .logo{
    width:5%;
    height:5%;
    border-radius: 50%;
    
}
.indexnav{
    width:4%;
    height:4%;
    border-radius: 50%;
    }
     
      </style>
</head>
<body>
    <div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <!--<img class="logo" src="https://miro.medium.com/max/1200/0*WKr5tRzykYjW22XZ.jpeg">-->
    <img class="indexnav" src="nav.jpg">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active  fw-bold text-light" style="margin-left:20px;" aria-current="page" href="../display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active  fw-bold text-light" style="margin-left:20px;" aria-current="page" href="user_registration.php">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active  fw-bold text-light" style="margin-left:20px;" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping"><sup><?php card_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
  
          <a class="nav-link active  fw-bold text-light" style="margin-left:20px;" aria-current="page" href="#">Total price:<?php echo total_card_price(); ?>/- </a>
        </li>
       
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" required placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
      </form>
    </div>
  </div>
</nav>

<!-- cardding calling function -->
<?php
card();
?>
 <!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav me-auto">
    <li class="nav-item" style="margin-left:20px">
        <a href="#" style="color:white;" class="nav-link">Welcome <?php //echo $_SESSION['username']; ?></a>
</li>
<?php
   /*if(!isset($_SESSION['username']))
   {
    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a>";
   }
   else{
    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>";

   }*/
   ?>
   <?php
if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
  <a href='user_login.php' style='color:white;margin-left:20px' class='nav-link'>Login</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a href='logout.php' style='color:white;margin-left:20px' class='nav-link'>Logout</a>
</li>";
}

?>

</ul>  
</nav>

<!--third child -->





<!--fourth child-->
<div class="row">
<div class="col-md-2 p-0">
<ul class="navbar-nav  bg-dark text-center">
     <li class="nav-item bg-primary">
<a class="nav-link text-light" href="#"><h4>Your profile</h4></a> 
</li>


<?php
$username=$_SESSION['username'];
$user_image="Select * from user_table where user_username='$username'";
$result=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($result);
$user_image=$row_image['user_image'];
echo "<li class='nav-item mb-4'>
<img src='user_images/$user_image' style='width:254px;height:50x;border:1px solid black;'>
</li>";
  


?>
<li class="nav-item">
    <a class="nav-link text-light" href="profile.php?pending_account"><h4>Pending orders<h4></a>
</li>
<li class="nav-item">
    <a class="nav-link text-light" href="profile.php?edit_account"><h4>Edit Account<h4></a>
</li>
<li class="nav-item">
    <a class="nav-link text-light" href="profile.php?my_orders"><h4>My orders<h4></a>
</li>
<li class="nav-item">
    <a class="nav-link text-light" href="profile.php?delete_account"><h4>Delete Account<h4></a>
</li>
<li class="nav-item">
    <a class="nav-link text-light" href="logout.php"><h4>Logout<h4></a>
</li>
    <ul>
</div>
<div class="col-md-10">
<?php 
get_user_order_detail();

if(isset($_GET['edit_account']))
{
  include('edit_account.php');
}
if(isset($_GET['my_orders']))
{  
  include('user_orders.php');
}
if(isset($_GET['delete_account']))
{  
  include('delete_account.php');
}

?>
</div>

</div>


<?php
include("footer.php");

?>
</div>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html> 