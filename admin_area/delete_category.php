<?php

if(isset($_GET['delete_category']))
{
   $delete_category=$_GET['delete_category'];

   $delete_category_query="delete from categories where category_id=$delete_category";
   $delete_category_cheack=mysqli_query($con,$delete_category_query);
   if($delete_category_cheack)
   {
    echo "<script>alert('Deleted Category Successfully')</script>";
    echo "<script>window.open('index.php?view_categories','_self')</script>";
   }


}




?>