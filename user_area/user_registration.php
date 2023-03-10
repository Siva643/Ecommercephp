
<?php

include('connect.php');
include('common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
body{
    background-color:#86F9FA;
    color:black;
    font-weight:bold;
}
        </style>
  
</head>
<body>
    <div class="container-fluid my-3">
        <h1 class="text-center">New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
<label class="form-label">Username</label>
    <input type="text" name="user_username" class="form-control" required="required" placeholder="Enter your username" autocomplete="off" >
</div>
<div class="form-outline mb-4">
<label class="form-label">Email</label>
    <input type="email" name="user_email" class="form-control" required="required" placeholder="Enter your email" autocomplete="off" >
</div>
<div>
<div class="form-outline mb-4">
<label class="form-label">User Image</label>
    <input type="file" name="user_image" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
<label class="form-label">Password</label>
    <input type="text" name="user_password" required="required" class="form-control" placeholder="Enter Your password" autocomplete="off">
</div>
<div class="form-outline mb-4">
<label class="form-label">Confirm Password</label>
    <input type="text" name="confirm_user_password" required="required" class="form-control" placeholder="Enter Your password" autocomplete="off">
</div>

<div class="form-outline mb-4">
<label class="form-label">Address</label>
    <input type="text" name="user_address" required="required" class="form-control" placeholder="Enter your address" autocomplete="off">
</div>
<div class="form-outline mb-4">
<label class="form-label">Contact</label>
    <input type="text" name="user_contact" required="required" class="form-control" placeholder="Enter your mobile number" autocomplete="off">
</div>
<div>
 <input type="submit" value="Register" name="user_register" class="btn btn-primary"><br><br>
 <span style="font-weight:fold;">Already have an account?<a href="user_login.php">Login</a><span>
</div>
  


</form>

</div>
</div>
</div>

<?php

if(isset($_POST['user_register']))
{
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
 $confirm_user_password=$_POST['confirm_user_password'];
  $user_ip=getIPAddress();
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];

  $select_query="Select * from user_table where user_username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count){
    echo "<script>alert('Username and Email already exist')</script>";
  }
  else if($user_password!=$confirm_user_password)
  {
    echo "<script>alert('Do not match password')</script>";
  }
  else{
  move_uploaded_file($user_image_tmp,"product_images/$user_image");
  $sql="Insert into user_table (user_username,user_email,user_image,user_password,
  user_ip,user_address,user_contact)
  values('$user_username','$user_email','$user_image','$hash_password',
  '$user_ip','$user_address','$user_contact')";
  $result=mysqli_query($con,$sql);

    
  }




$select_cart_items="Select * from card_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count)
{
    $_SESSION['username']=$user_username;
    echo "<script>alert('you have items in your cart')</script>";
    echo "<script>windows.open('checkout.php','_self')</script>";
}
else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>




