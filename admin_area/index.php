<?php

include('../includes/connect.php');
//include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
   
    .logo{
    width:5%;
    height:5%;
    border-radius: 50%;
    }
    
    .admin_image{
   width:100px;
   object-fit: contain;  
}
.footer{
    position:absolute;
    bottom:0;
}
        </style>

</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">

    <div class="container-fluid">
        <img src="https://miro.medium.com/max/1200/0*WKr5tRzykYjW22XZ.jpeg" alt="" class="logo">
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="" class="nav-link">Welcome</a>
        </li>
        <?php
if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
  <a href='admin_login.php' style='color:white;'' class='nav-link'>Login</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a href='logout.php' style='color:white;'' class='nav-link'>Logout</a>
</li>";
}

?>
</ul>
</nav>
    </div>
</nav>

<!--  second child -->



<!-- third child -->

<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="https://5.imimg.com/data5/LT/XB/MY-28787720/pineapple-drink-1000x1000.jpg" alt="" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
</div>
<div class="button text-center p-0">
    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-primary mt-1">Insert Products</a></button>
    <button><a href="index.php?view_products" class="nav-link text-light bg-info mt-1">View Productes</a></button>
    <button><a href="index.php?insert_category" class="nav-link text-light bg-primary mt-1">Insert Categories</a></button>
    <button><a href="index.php?view_categories" class="nav-link text-light bg-primary mt-1">View Categories</a></button>
    <button><a href="index.php?insert_brand" class="nav-link text-light bg-primary mt-1">Insert Brands</a></button>
    <button><a href="index.php?view_brand" class="nav-link text-light bg-primary mt-1">View Brands</a></button>
    <button><a href="index.php?list_order" class="nav-link text-light bg-primary mt-1">All orders</a></button>
    <button><a href="index.php?all_payment" class="nav-link text-light bg-primary mt-1">All Payments</a></button>
    <button><a href="index.php?list_users" class="nav-link text-light bg-primary mt-1">List users</a></button>
    <button><a href="logout.php" class="nav-link text-light bg-primary mt-1">Logout</a></button>

</div>
        
</div>

</div>


<!-- fourth child -->

<div class="container my-3">
<?php 
if(isset($_GET['insert_product']))
{
    include('insert_product.php');
}
if(isset($_GET['insert_category']))
{
    include('insert_categories.php');
}
if(isset($_GET['insert_brand']))
{
    include('insert_brands.php');
}
if(isset($_GET['view_products']))
{
    include('view_products.php');
}
if(isset($_GET['edit_products']))
{  
  include('edit_products.php');
}
if(isset($_GET['delete_product']))
{  
  include('delete_product.php');
}
if(isset($_GET['view_categories']))
{
  include('view_categories.php');
}
if(isset($_GET['view_brand']))
{
    include('view_brand.php');
}
if(isset($_GET['edit_category'])){
    
    include('edit_category.php');
}
if(isset($_GET['edit_brand']))
{
    include('edit_brand.php');
}
if(isset($_GET['delete_category']))
{
    include('delete_category.php');
}
if(isset($_GET['delete_brand']))
{
    include('delete_brand.php');
}
if(isset($_GET['list_order']))
{
    include('list_order.php');
}
if(isset($_GET['delete_order']))
{

    include('delete_order.php');
}
if(isset($_GET['all_payment']))
{
    include('all_payment.php');
}
if(isset($_GET['delete_payment']))
{
    include('delete_payment.php');
}
if(isset($_GET['list_users']))
{
    include('list_users.php');
}
if(isset($_GET['users_delete']))
{
    include('users_delete.php');
}

?>
</div>

<!-- last child -->
<?php 
 include('../includes/footer.php');
?>


    
</div>
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  
</body>
</html>