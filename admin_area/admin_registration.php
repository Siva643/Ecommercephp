<?php
 include('../includes/connect.php');

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
         <img src="./product_images/Reg.jpg" style="width:70%;height:70%;position:relative;left:100px;">
        </div>
        <div class="col-lg-6 mb-3">
        <form action="" method="post" class="">
          <div class="form-outline w-50 mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="admin_name" class="form-control w-90" required="required" name=""placeholder="Enter your username">
          </div> 
         <div class="form-outline w-50 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="admin_email" class="form-control w-90" required="required" name="" placeholder="Enter your email">
          </div>
    <div class="form-outline w-50 mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" id="password" name="admin_password" class="form-control w-90" required="required" name="" placeholder="Enter your password">
   </div>
   <div class="from-outline w-50 mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
        <input type="text" id="password" name="admin_confirm_password" class="form-control w-90" required="required" name="" placeholder="Enter your confirm password">
    </div>
    <div>
       <input type="submit" name="register" value="Register" class="btn btn-primary"><br>

       <small class="fw-bold">Do you already have an account?<a href="admin_login.php" class="text-danger">Login</a></small>
   </div>
    </form>
    <div>
    </div>
   <div>
    </div>

    <?php

if(isset($_POST['register']))
{
  $admin_name=$_POST['admin_name'];
  $admin_email=$_POST['admin_email'];
  $admin_password=$_POST['admin_password'];
  $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
  $admin_confirm_password=$_POST['admin_confirm_password'];


  $select_query="Select * from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count){
    echo "<script>alert('Username and Email already exist')</script>";
  }
  else if($admin_password!=$admin_confirm_password)
  {
    echo "<script>alert('Do not match password')</script>";
  }
  else{

  $sql="Insert into admin_table (admin_name,admin_email,admin_password)
  values('$admin_name','$admin_email','$hash_password')";
  $result=mysqli_query($con,$sql);

  if($result)
  {
    echo "<script>alert('Successfully inserted data')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";

  }

    
  }
}





?>
    
</body>
</html>