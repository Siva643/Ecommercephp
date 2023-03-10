<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5 text-center">
   <thead class="bg-info">
<tr style="">

<th class="">Product ID</th>
<th>Product Title</th>
<th>Product Image</th>
<th>Product Price</th>
<!--<th>Total Sold</th>-->
<th>Status</th>
<th>Edit</th>
<th>Delete</th>


</tr>
<thead>
<tbody class="bg-secondary text-light">
<?php
$get_products="Select * from products";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result))
{
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    //$count_products=$row['counts_products'];

    $status=$row['status'];
    $number++;

    ?>
    <tr>
<td class=""><?php echo $product_id ?></td>
<td><?php echo $product_title ?></td>
<td><img  style="width:150px;height:150px;object-fit:contain;" src='./product_images/<?php echo $product_image1; ?>'></td>
<td><?php echo $product_price ?>/-</td>
<!--<td>
    <?php
    
//$count_products=mysqli_fetch_assoc('count_products');
//$get_count="Select * from orders_pending where count_products=$count_products";
//$result_count=mysqli_query($con,$get_count);
//$rows_count=mysqli_num_rows($result_count);
 //echo $rows_count;
  ?>
  </td>-->

<td><?php echo $status ?></td>
<td><a href="index.php?edit_products=<?php echo $product_id  ?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></td>
<td><a href="index.php?delete_product=<?php echo $product_id  ?>" class="text-light"><i class="fa-solid fa-trash"></i></td>
</tr>
<?php
}

?>

</tbody>
</table>

<!-- footer -->

</body>
</html>