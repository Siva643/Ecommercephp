<?php

include('../includes/connect.php');


?>

<?php


if(isset($_POST['insert_product']))
{
   $product_title=$_POST['product_title'];
   $product_description=$_POST['product_description'];
   $product_keywords=$_POST['product_keywords'];
   $category_id=$_POST['category_id'];
   $brand_id=$_POST['brand_id'];
   $product_price=$_POST['product_price'];
   
   $status='true';

   //accessing images
   $product_image1=$_FILES['product_image1']['name'];
   $product_image2=$_FILES['product_image2']['name'];
   $product_image3=$_FILES['product_image3']['name'];

   //accessing imge tmp name
   $tmp_image1=$_FILES['product_image1']['tmp_name'];
   $tmp_image2=$_FILES['product_image2']['tmp_name'];
   $tmp_image3=$_FILES['product_image3']['tmp_name'];
 

   //checking empty condition

   if($product_title=='' or $product_description=='' or $product_keywords=='' or $category_id=='' or
   $brand_id=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='')
   {
    echo "<script>alert('Please fill all the available fileds')</script>";
   }
   else{

    move_uploaded_file($tmp_image1,"./product_images/$product_image1");
    move_uploaded_file($tmp_image2,"./product_images/$product_image2");
    move_uploaded_file($tmp_image3,"./product_images/$product_image3");

    //insert query
    

$insert_product="insert into `products` (product_title,product_description,product_keywords,
category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
values ('$product_title','$product_description','$product_keywords','$category_id','$brand_id',
'$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$status')";

$result_query=mysqli_query($con,$insert_product);

if($result_query)
{
    echo "<script>alert('Successfully inserted the products')</script>";
}
else{
  echo mysqli_error($con);
}


     



   }





}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<body class="bg-light">
<div class="container mt-3">
<h1 class="text-center">Insert Products</h1>

<form action="" method="post" enctype="multipart/form-data">

<!-- title -->
<div class="form-outline mb-4 w-50 m-auto">
 <label for="product_title" class="form-label">Product title</label>

 <input type="text" name="product_title" id="product_title" class="form-control" 
 placeholder="Enter product title" autocomplete="off" required="required">

</div>

<!-- description -->

<div class="form-outline mb-4 w-50 m-auto">
 <label for="description" class="form-label">Product description</label>

 <input type="text" name="product_description" id="description" class="form-control" 
 placeholder="Enter product description" autocomplete="off" required="required">

</div>


<!-- keywords -->

<div class="form-outline mb-4 w-50 m-auto">
 <label for="product_keyword" class="form-label">Product keywords</label>

 <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
 placeholder="Enter product keywords" autocomplete="off" required="required">

</div>

<!-- categories -->

<div class="form-outline mb-4 w-50 m-auto">
<select name="category_id" id="" class="form-select">
<option value="">Select a Category</option>
<?php
 $select_query="Select * from categories";
 $result_query=mysqli_query($con,$select_query);
 while($row=mysqli_fetch_assoc($result_query))
 {
   $category_title=$row['category_title'];
   $category_id=$row['category_id'];
   echo "<option value='$category_id'>$category_title</option>";
 }
?>
</select>
</div>
<!-- Brands -->

<div class="form-outline mb-4 w-50 m-auto">
<select name="brand_id" id="" class="form-select">
<option value="">Select a Brands</option>
<?php
 $select_query="Select * from brands";
 $result_query=mysqli_query($con,$select_query);
 while($row=mysqli_fetch_assoc($result_query))
 {
   $brand_title=$row['brand_title'];
   $brand_id=$row['brand_id'];
   echo "<option value='$brand_id'>$brand_title</option>";
 }


?>



</select>
</div>

<!-- Image -->
<div class="form-outline mb-4 w-50 m-auto">
<label for="product_image1" class="form-label">Product Image 1</label>
<input type="file" name="product_image1" id="product_image1" class="form-control"
required="required">
</div>


<!-- Image 2 -->
<div class="form-outline mb-4 w-50 m-auto">
<label for="product_image2" class="form-label">Product Image 2</label>
<input type="file" name="product_image2" id="product_image2" class="form-control"
required="required">
</div>

<!-- Image 3 -->
<div class="form-outline mb-4 w-50 m-auto">
<label for="product_image3" class="form-label">Product Image 3</label>
<input type="file" name="product_image3" id="product_image3" class="form-control"
required="required">
</div>

<!-- Price -->

<div class="form-outline mb-4 w-50 m-auto">
 <label for="product_price" class="form-label">Product keywords</label>

 <input type="text" name="product_price" id="product_keywords" class="form-control" 
 placeholder="Enter product price" autocomplete="off" required="required">

</div>



<div class="form-outline mb-4 w-50 m-auto">
 
 <input type="submit" name="insert_product"  class="btn btn-info mb-3 px-3" value="Insert Products">

</div>


</form>



</div>
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>