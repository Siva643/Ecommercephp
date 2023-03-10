<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 class="text-center text-success">All Payments</h1>
   <table class="table table-bordered text-center text-light">
    <thead class="bg-info text-dark">
        <?php

        $get_payment="Select * from user_payments";
        $result=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows($result);

  if($row_count==0)
  {
    echo "<h2 class='text-danger text-center mt-5'>No Payment yet</h2>";
  }
  else{
    echo "
    <tr>
    <th>SI.NO</th>
    <th>Amount</th>
    <th>Invoice number</th>
    
    <th>Order Date</th>
    <th>Payment_mode</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        //$count_products=$row_data['count_products'];
        $date=$row_data['date'];
        $payment_mode=$row_data['payment_mode'];
        //$order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$amount</td>
        <td>$invoice_number</td>
        <td>$date</td>
        <td>$payment_mode</td>
        <td><a href='index.php?delete_payment=$payment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
     </tr>";

    }
}
?>
</tbody>
</table>
</div>



</body>
</html>