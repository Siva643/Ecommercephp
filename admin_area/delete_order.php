<?php

if(isset($_GET['delete_order']))
{
   $delete_order=$_GET['delete_order'];
   $delete_order_query="delete from orders where user_id='$delete_order'";
   $result_query=mysqli_query($con,$delete_order_query);
   if($result_query)
   {
    echo "<script>alert('Deleted Order Successfully')</script>";
    echo "<script>window.open('index.php?list_order','_self')</script>";
   }
   else{
    echo "error";
   }


}
?>