<?php
 include('../includes/connect.php');
 include('../user_area/common_function.php');

  session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        body{
        overflow:hidden;
        }
        </style>
    
</head>
<body>
    <div class="container-fluid">
    <h1 class="text-center text-success mt-4">Admin Registration</h1>

     <div class="d-flex jusity-content-center align-items-center mt-5">
        <div class="col-lg-6">
         <img src="./product_images/login.jpg" style="width:50%;height:50%;object-fit:contain;position:relative;left:200px;">
        </div>
        <div class="col-lg-6 mb-3">
        <form action="" method="post" class="">
          <div class="form-outline w-50 mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="admin_name" class="form-control w-90" required="required" name=""placeholder="Enter your username">
          </div> 
       
    <div class="form-outline w-50 mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" id="password" name="admin_password" class="form-control w-90" required="required" name="" placeholder="Enter your password">
   </div>
  
    <div>
       <input type="submit" name="admin_login" value="Register" class="btn btn-primary"><br>

       <small class="fw-bold">Don't your have an account?<a href="admin_registration.php" class="text-danger">Login</a></small>
   </div>
    </form>
    <div>
    </div>
   <div>
    </div>

    <?php

if(isset($_POST['admin_login']))
{
  $admin_name=$_POST['admin_name'];
  $admin_password=$_POST['admin_password'];

  $select_query="Select * from admin_table where admin_name='$admin_name'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  


  if($row_count>0)
  {
    $_SESSION['username']=$admin_name;
    

    if(password_verify($admin_password,$row_data['admin_password']))
    {
    $_SESSION['username']=$admin_name;

      //echo "<script>alert('login successfully')</script>";
      if($row_count==1 and $row_count_cart==0)
      {
    $_SESSION['username']=$admin_name;
        
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
      
    else{
    echo "<script>alert('Invalid Credentials')</script>";

  }
    }
}
}
?>
    
</body>
</html>