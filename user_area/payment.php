<?php

include('connect.php');
include('common_function.php');
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

body{
        
        font-family: 'Poppins', sans-serif;
        background-color:aqua;
      }
    .paymentimg
    {
        
        width:30%;
        height:30%;
      
        border-radius:50%;
        padding:30px;

    }
    .offline:hover{
      color:red;
      transition-duration:0.3s;

    }
    
    
    </style>
</head>
<body>

<!-- php code to acccess user id -->

<?php
$user_ip=getIPAddress();
$get_user="Select * from user_table where user_ip='$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>
<div class="container mt-5">
<h2 class="text-center text-dark">Payment Options</h2>
<div class="row d-flex justify-contant-center align-items-center my-5">
<div class="col-12 col-sm-12 col-md-6">
<a href="https://paytm.com/" target="_blank" >
<img class="paymentimg" src="product_images/paytm.jpg" alt=""></a>
  

<a href="https://pay.google.com/about/" target="_blank">
<img class="paymentimg" src="product_images/gpay.jpg" alt=""></a>
  

<a href="https://www.phonepe.com/" target="_blank">
<img class="paymentimg" src="product_images/phonepe.jpg" alt=""></a>
  </div>

<div class="col-12 col-sm-12 col-md-6">
  <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class='text-center offline'>Click Pay offline</h2></a>
</div>
</div>


</div>
</div>
    
</body>
</html>