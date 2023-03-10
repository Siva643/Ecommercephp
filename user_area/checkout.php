<?php

include('connect.php');

@session_start();

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
    <style>
      .hidden{
        color:green;
      }
      
.logo{
    width:5%;
    height:5%;
    border-radius: 50%;
}
body{
  overflow-x:hidden;
  font-family: 'Poppins', sans-serif;


}
.indexnav{
    width:4%;
    height:4%;
    border-radius: 50%;
    }
    .card-img-top{
    width:100%;
    height:200px;
    object-fit:contain;
    padding:10px;
    
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
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="../display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="user_registration.php">Register</a>
        </li>
       
       
       
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_products">
      </form>
    </div>
  </div>
</nav>

<!-- cardding calling function -->

 <!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav me-auto">
    <li class="nav-item" style='margin-left:20px'>
        <a href="#" style="color:white;" class="nav-link">Welcome</a>
</li>
<?php
if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
  <a href='./user_area/user_login.php' style='color:white;margin-left:20px' class='nav-link'>Login</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a href='./user_area/user_logout.php' style='color:white;margin-left:20px' class='nav-link'>Logout</a>
</li>";
}

?>
</ul>  
</nav>

<!--third child -->



<!-- fourth child -->
<div class="container">
<div  class="row">
    <div class="col-12 col-md-12 col-sm-12">
<!-- products -->
<div class="row">
<div class="col-12 col-md-12 col-sm-12">

<?php 

if(!isset($_SESSION['username']))
{
    include('user_login.php');
}
else{
    include('payment.php');
}
  ?>        
            <!-- row end -->
            </div>
            <!-- col end -->
</div> 
</div>
</div>
</div>





<?php
include("footer.php");

?>
</div>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html> 