<?php

  if(isset($_GET['delete_payment']))
  {    
    $delete_payment=$_GET['delete_payment'];

    $delete_query="delete from user_payments where payment_id=$delete_payment";
    $result=mysqli_query($con,$delete_query);
    if($result)
    {
        echo "<script>alert('deleted payment successfully')</script>";
        echo "<script>window.open('index.php?all_payment','_self')</script>";
    }
    else{
        echo "error";
    }



  }



?>