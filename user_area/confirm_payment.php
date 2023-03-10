<?php

include('connect.php');
include('common_function.php');
session_start();

if(isset($_GET['order_id']))
{
$order_id=$_GET['order_id'];
//echo $order_id ;
$select_data="Select * from orders where order_id=$order_id";
$result=mysqli_query($con,$select_data);
$row_fetch=mysqli_fetch_assoc($result);
$invoice_number=$row_fetch['invoice_number'];
$amount_due=$row_fetch['amount_due'];
 
}


if(isset($_POST['confirm_payment']))
{
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into user_payments(order_id,invoice_number,amount,payment_mode)
    values('$order_id','$invoice_number','$amount','$payment_mode')";
   
    $result=mysqli_query($con,$insert_query);
    if($result)
    {
        echo "<h3 class='text-center text-light'><script>alert('Successfully completed the payment')</script></h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    
   $update_orders="update orders set order_status='Complete' where order_id='$order_id'";
   $result=mysqli_query($con,$update_orders);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
<style>
 body{
        
        font-family: 'Poppins', sans-serif;
      }
  </style>
    
</head>
<body class="bg-secondary">

  <div class="container my-5 m-auto">
  <h1 class="text-center text-light">Confirm payment</h1>
   <form action="" method="post">
  <div class="form-outline text-center my-4 w-50 m-auto">
  <input type="text"  class="form-control w-50 m-auto" value="<?php echo $invoice_number ?>" name="invoice_number">
</div>
<div class="form-outline text-center my-4 w-50 m-auto">
    <label class="form-label text-light h3">Amount</label>
  <input type="text"  class="form-control w-50 m-auto" value="<?php echo $amount_due ?>" name="amount">
</div>
<div class="form-outline text-center my-4 w-50 m-auto">
    <select name="payment_mode" class="form-select w-50 m-auto">
        <option>Select Payment Mode</option>
        <option>UPI</option>
        <option>Netbanking</option>
        <option>Paypal</option>
        <option>Cash on Delivery</option>
        <option>Pay offline</option>

</select>
</div>
<div class="form-outline text-center my-4 w-50 m-auto">
    
  <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm"
  name="confirm_payment">
</div>

</form>
  </div>
    
</body>
</html>