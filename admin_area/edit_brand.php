
<?php

if(isset($_GET['edit_brand']))
{
  $edit_brand=$_GET['edit_brand'];
  $get_brands="Select * from brands where brand_id=$edit_brand";
  
  $result=mysqli_query($con,$get_brands);
 
  $row=mysqli_fetch_assoc($result);
  $brand_title=$row['brand_title'];
 
  //echo $category_title;
}

if(isset($_POST['edit_brand']))
{
  $brand_title=$_POST['brand_title'];
  $update_query="update brands set brand_title='$brand_title' where
  brand_id=$edit_brand";
  $result=mysqli_query($con,$update_query);
  if($result)
  {
    echo "<script>alert('Updated Successfully')</script>";
    echo "<script>window.open('./index.php?view_brand','_self')</script>";

  }
  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
    <div class="container">
     <h1 class="text-center mb-5">Edit Category</h1>

     <form action=""  method="post" class="text-center">
    <div class="form-outline w-50 m-auto">
     <label class="form-label text-center h4 mb-1">Edit Category</label>
     <input type="text" name="brand_title" value="<?php echo $brand_title ?>" class="form-control w-90 m-auto mb-4">

   </div>
   <div class="m-auto w-50">
   <input type="submit" name="edit_brand" value="Update brand" class="btn btn-success m-auto w-50">

   </div>
   

</form>



</div>
    
</body>
</html>

