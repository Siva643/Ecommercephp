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
    <style>
      .hidden{
        color:green;
      }
      body{
        
        font-family: 'Poppins', sans-serif;
        
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
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="user_area/user_registration.php">Register</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping"><sup><?php card_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
  
          <a class="nav-link active fw-bold text-light" style="margin-left:20px;" aria-current="page" href="#">Total price:<?php echo total_card_price(); ?>/- </a>
        </li>
       
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
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
    <li class="nav-item" style="margin-left:20px;">
        <a href="#" style="color:white;" class="nav-link">Welcome <?php //echo $_SESSION['username']; ?></a>
</li>
<?php
if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
  <a href='./user_area/user_login.php' style='color:white;margin-left:20px;' class='nav-link'>Login</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a href='./user_area/user_logout.php' style='color:white;margin-left:20px;' class='nav-link'>Logout</a>
</li>";
}

?>
</ul>  
</nav>

<!--third child -->



<div class="container table-responsive mt-5">
  <form method="post" action="">
    
      
  <table class="table table-bordered text-center">
   
    <?php
global $con;
$get_ip_add = getIPAddress();
$total_price=0;
$card_query="Select * from card_details where ip_address='$get_ip_add'";
$result=mysqli_query($con,$card_query);
$result_count=mysqli_num_rows($result);
if($result_count>0)
{
  echo "  <tr class='mt-2' style='font-size:20px;'>
  <th>Product Title</th>
  <th>Product Image</th>
  <th>Quantity</th>
  <th>Total price</th>
  <th>Remove</th>
  <th>Opeartions</th>
</tr>";

while($row=mysqli_fetch_array($result))
{
  $product_id=$row['product_id'];
$select_products="Select * from products where product_id='$product_id'";
$result_products=mysqli_query($con,$select_products);
while($row_product_price=mysqli_fetch_array($result_products))
{
  $product_price=array($row_product_price['product_price']);
  $product_table=$row_product_price['product_price'];
  $product_title=$row_product_price['product_title'];
  $product_image1=$row_product_price['product_image1'];
  $product_values=array_sum($product_price);
  $total_price+=$product_values;
    ?>
    <tr>
       <td><?php echo $product_title ?></td>
       <td><img style="width:80px;height:80px;"src="./images/<?php echo $product_image1 ?>"></td>
       <td><input style="width:90px"; type="text" name="qty"></td>
<?php
$get_ip_add = getIPAddress();
if(isset($_POST['update_cart']))
{
   $quantities=$_POST['qty'];
   $update_cart="update card_details set quentity=$quantities where ip_address='$get_ip_add'";
   $result_products_quantity=mysqli_query($con,$update_cart);
   $total_price=$total_price*$quantities;
}



?>
       <td><?php echo $product_table ?></td>
       <td><input type="checkbox"  name="removeitem[]" value="<?php echo $product_id ?>"></td>
       <td>
        <div class="row">
          <div class="col-12 col-md-6  col-sm-12 mt-3">
        <input type="submit" class="btn btn-success" value="Updatecart" name="update_cart">
</div>
<div class="col-12 col-md-6  col-sm-12 mt-3">

        <input type="submit" class="btn btn-danger" value="Removeitem" name="remove_cart">
</div>
</div>

       </td>
    </tr>
    <?php }

}}

else{
    echo "<h1 class='text-center text-danger'>Cart is empty</h1>";
}
?>
    </table>
    

    </div>
 
    <div class="container col-12 col-sm-12" >
      
        
      <?php
global $con;
$get_ip_add = getIPAddress();

$card_query="Select * from card_details where ip_address='$get_ip_add'";
$result=mysqli_query($con,$card_query);
$result_count=mysqli_num_rows($result);
if($result_count>0)
{ 
  echo 
  "<div class='container'>
  <div class='row'>
   <div class='col-12  col-sm-6 col-md-3'>
  <h3 style='font-weight:bold;'class='px-1 mt-2'>Subtotal:<span class='text-danger'>$total_price/-</span>
  </div>
  <div class='col-6 mt-2 col-sm-6 col-md-2'>
  <input type='submit' value='Continue Shopping' class='btn btn-warning text-dark' name='continue_shopping'>
  </div>
  <div class='col-6 col-sm-6 col-md-3'>
  <button class='btn text-light'><a href='user_area/checkout.php' class='btn btn-primary'>Go to payment</a></button>
  </div>
  </div>
  </div>";
   
}
else{
  echo "<input type='submit' value='Continue Shopping' class='btn btn-primary' name='continue_shopping'>";

}
if(isset($_POST['continue_shopping']))
{
  echo "<script>window.open('index.php','_self')</script>";
}
      ?>
    </div>
</form>

<!-- function to remove item -->
<?php
function remove_cart_item()
{
  global $con;
  if(isset($_POST['remove_cart']))
  {
   foreach($_POST['removeitem'] as $remove_id)
  {
   echo $remove_id;
   $delete_query="Delete from card_details where product_id='$remove_id'";
   $run_delete=mysqli_query($con,$delete_query);
   if($run_delete){

    echo "<script>window.open('cart.php', '_self')</script>";
   }

  }


  }



}
echo $remove_item=remove_cart_item();
?>
</div>



<!--include("./includes/footer.php");-->
<div class="container-fluid mt-5 bg-dark p-3 footer text-center text-light fw-bold mt-3 p-0 footer">
    <p style="font-size:20px;height:15px;" class="text-light">Designed by Siva - 2022</p>
</div>














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html> 