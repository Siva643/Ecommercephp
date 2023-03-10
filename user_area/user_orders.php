<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="titleimage.jpg">
    <title>Online Shopping</title>


</head>
<body>
    <?php
  $username=$_SESSION['username'];
  $get_user="Select * from user_table where user_username='$username'";
  $result=mysqli_query($con,$get_user);
  $row_fetch=mysqli_fetch_assoc($result);
  $user_id=$row_fetch['user_id'];


?>
   <div class="col-md-12">
    <h3 class="text-success text-center mt-5 fw-bold">All my orders</h3>
    <table class="table table-bordered mt-5">
<thead class="bg-light">
<tr>
   <th>SI no</th>
   <th>Amount Due</th>
   <th>count products</th>
   <th>Invoice number</th>
   <th>Date</th>
   <th>Complete/Incomlete</th>
   <th>Status</th>

</tr>
</thead>
<tbody class="bg-light text-dark">
<?php
$get_order_details="Select * from orders where user_id=$user_id"; 

$result_orders=mysqli_query($con,$get_order_details);
$number=1;

while($row_orders=mysqli_fetch_assoc($result_orders))
{
    $order_id=$row_orders['order_id'];
    $amount_due=$row_orders['amount_due'];
    //$amount_due=$row_orders['amount_due'];

    $count_products=$row_orders['count_products'];
    $invoice_number=$row_orders['invoice_number'];
    $order_date=$row_orders['order_date'];
    //$order_id=$row_orders['order_id'];
    $order_status=$row_orders['order_status'];
   
   echo "<tr>
   <td>$number</td>
   <td>$amount_due</td>
   <td>$count_products</td>
   <td>$invoice_number</td>
   <td>$order_date</td>
   <td>$order_status</td>";
?>
   <?php
     if($order_status=='Complete')
     {
        echo "<td class='bg-light'><button class='btn btn-success'>Paid</button></td>";
     }
     else{
        echo "<td class='bg-light'><a href='confirm_payment.php?order_id=$order_id' class='btn btn-warning'>
        Confirm</a></td>
        </tr>";
     }

   $number++;
}


?>


 </tbody>
</table>
</div>

</body>
</html>