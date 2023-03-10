<?php

if(isset($_GET['delete_brand']))
{
   $delete_brand=$_GET['delete_brand'];

   $delete_brand_query="delete from brands where brand_id=$delete_brand";
   $delete_brand_cheack=mysqli_query($con,$delete_brand_query);
   if($delete_brand_cheack)
   {
    echo "<script>alert('Deleted Category Successfully')</script>";
    echo "<script>window.open('index.php?view_brand','_self')</script>";
   }


}




?>