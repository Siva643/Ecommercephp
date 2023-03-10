<?php

//include('..includes/connect.php');
//include('..includes/connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.product_image
{
    width:100x;
    height:100px;
    object-fit:contain;
    }
</style>
</head>
<body>

<?php
//edit products
if(isset($_GET['edit_products']))
{
   $edit_id=$_GET['edit_products'];

   $get_data="Select * from products where product_id=$edit_id";
   $result=mysqli_query($con,$get_data);
   $row=mysqli_fetch_assoc($result);
   $product_title=$row['product_title'];
   $product_description=$row['product_description'];
   $product_keywords=$row['product_keywords'];
   $category_id=$row['category_id'];
   $brand_id=$row['brand_id'];
   $product_image1=$row['product_image1'];
   $product_image2=$row['product_image2'];
   $product_image3=$row['product_image3'];
   $product_price=$row['product_price'];

//fetching categories name

$select_category="Select * from categories where category_id=$category_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$category_title=$row_category['category_title'];







//fetching brands name

$select_brand="Select * from brands where brand_id=$brand_id";
$result_brand=mysqli_query($con,$select_brand);
$row_brand=mysqli_fetch_assoc($result_brand);
$brand_title=$row_brand['brand_title'];




}



?>


<form action="" method="post" enctype="multipart/form-data">
    
<h1 class="text-center mb-5">Edit Products</h1>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_title" class="form-label">Product Titel</label>
    <input type="text" id="product_title" name="product_title"
    value="<?php echo $product_title ?>" class=
    "form-control" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_description" class="form-label">Product Descrition</label>
    <input type="text" id="product_description" 
    value="<?php echo $product_description ?>" name="product_description" class=
    "form-control" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product Keywords</label>
    <input type="text" id="product_keywords" 
    value="<?php echo $product_keywords ?>" name="product_keywords" class=
    "form-control" required="required">
</div>

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_category" class="form-label">Product Category</label>
  <select class="form-select" name="category_id">
  <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

   <?php
$select_category_all="Select * from categories";
$result_category_all=mysqli_query($con,$select_category_all);
while($row_category_all=mysqli_fetch_assoc($result_category_all))
{
   $category_title=$row_category_all['category_title'];
   $category_id=$row_category_all['category_id'];
   echo "<option value='$category_id'>$category_title</option>";
}

?>
   
</select>
</div>


<div class="form-outline w-50 m-auto mb-4">
  <label for="product_brands" class="form-label">Product Brands</label>
  <select class="form-select" name="brand_id">

  <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
<?php
$select_brand_all="Select * from brands";
$result_brand_all=mysqli_query($con,$select_brand_all);
while($row_brand_all=mysqli_fetch_assoc($result_brand_all))
{
   $brand_title=$row_brand_all['brand_title'];
   $brand_id=$row_brand_all['brand_id'];
   echo "<option value='$brand_id'>$brand_title</option>";
}

?>
</select>
</div>
 

<div class="form-outline w-50 m-auto mb-4">
<label for="product_image1" class="form-label">Product Image1</label>
<div>
<input type="file" id="product_image1" name="product_image1" class="form-control
 w-30 m-auto" required="required">
 <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_image mt-4">
</div>
</div>


<div class="form-outline w-50 m-auto mb-4">
<label for="product_image2" class="form-label">Product Image2</label>
<div>
<input type="file" id="product_image2" name="product_image2" class="form-control
 w-90 m-auto" required="required">
 <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_image mt-4">
</div>
</div>

<div class="form-outline  w-50 m-auto mb-4">
<label for="product_image3" class="form-label">Product Image3</label>
<div>
<input type="file" id="product_image3" name="product_image3" class="form-control
 w-90 m-auto" required="required">
 <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_image mt-4">
</div>
</div>

<div class="form-outline w-50 m-auto mb-4">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class=
    "form-control" required="required">
</div>


<div class="text-center">
  <input type="submit" name="edit_products" value="Update product"
  class="btn btn-info px-3 mb-3 w-50">
<div>
</form>
</body>
</html>
<!-- Editing products  -->

<?php
if(isset($_POST['edit_products']))
{
  $product_title=$_POST['product_title'];
  $product_description=$_POST['product_description'];
  $product_keywords=$_POST['product_keywords'];
  $category_id=$_POST['category_id'];
  $brand_id=$_POST['brand_id'];
  $product_price=$_POST['product_price'];

  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];

  $tmp_image1=$_FILES['product_image1']['tmp_name'];
  $tmp_image2=$_FILES['product_image2']['tmp_name'];
  $tmp_image3=$_FILES['product_image3']['tmp_name'];

//cheacking of filelda emty or not

if($product_title=='' or $product_description=='' or $product_keywords=='' or 
$category_id=='' or $brand_id=='' or $product_image1=='' or $product_image2==''
or $product_image3=='' or $product_price=='')
{
   echo "<script>alert('please fill the all field and continue the process')</script>";
}

else{

move_uploaded_file($tmp_image1,"./product_images/$product_image1");
move_uploaded_file($tmp_image2,"./product_images/$product_image2");
move_uploaded_file($tmp_image3,"./product_images/$product_image3");

//query to update products

$update_product="update products set product_title='$product_title',
product_description='$product_description', product_keywords='$product_keywords',
category_id='$category_id',brand_id='$brand_id', product_image1='$product_image1',
product_image2='$product_image2',product_image3='$product_image3', product_price='$product_price',date=Now()
where product_id=$edit_id";
$result_update=mysqli_query($con,$update_product);
if($result_update)
{
    echo "<script>alert('product updated successfully')</script>";
    echo "<script>window.open('./insert_product.php','_self')</script>";

}


}

}
else{
    die(mysqli_error($con));
}

?>


