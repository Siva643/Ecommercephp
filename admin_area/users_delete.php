<?php


if(isset($_GET['users_delete']))
{
   $users_delete=$_GET['users_delete'];

   $users_delete_query="delete from user_table where user_id=$users_delete";
   $result=mysqli_query($con,$users_delete_query);
   if($result)
   {
echo "<script>alert('User Deleted Successfully')</script>";
echo  "<script>window.open('index.php?list_users','_self')</script>";
   }
   else{
    echo "error";
   }


}


?>