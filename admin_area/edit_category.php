<?php

if(isset($_GET['edit_category']))
{
  $edit_category=$_GET['edit_category'];
  $get_categories="Select * from categories where category_id=$edit_category";
  
  $result=mysqli_query($con,$get_categories);
 
  $row=mysqli_fetch_assoc($result);
  $category_title=$row['category_title'];
 
  //echo $category_title;
}

if(isset($_POST['edit_category']))
{
  $category_title=$_POST['category_title'];
  $update_query="update categories set category_title='$category_title' where
  category_id=$edit_category";
  $result=mysqli_query($con,$update_query);
  if($result)
  {
    echo "<script>alert('Updated Successfully')</script>";
    echo "<script>window.open('./index.php?view_categories','_self')</script>";

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
     <input type="text" name="category_title" value="<?php echo $category_title ?>" class="form-control w-90 m-auto mb-4">

   </div>
   <div class="m-auto w-50">
   <input type="submit" name="edit_category" value="Update Category" class="btn btn-success m-auto w-50">

   </div>
   

</form>



</div>
    
</body>
</html>

