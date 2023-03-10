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
        <h1 class="text-center text-success">All orders</h1>
   <table class="table table-bordered text-center">
    <thead class="bg-info">
        <?php

        $get_orders="Select * from orders";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);

  if($row_count==0)
  {
    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
  }
  else{
    echo "
    <tr>
    <th>SI.NO</th>
    <th>Order id</th>
    <th>Amount Due</th>
    <th>Invoice number</th>
    <th>Count products</th>
    <th>Order Date</th>
    <th>Order Status</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $order_id=$row_data['order_id'];
        $amount_due=$row_data['amount_due'];
        $user_id=$row_data['user_id'];
        $invoice_number=$row_data['invoice_number'];
        $count_products=$row_data['count_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$order_id</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$count_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='index.php?delete_order=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
     </tr>";

    }
}
?>
</tbody>
</table>
</div>



</body>
</html>