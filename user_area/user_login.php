<?php

include('connect.php');
include('common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userlogin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
            body{

background-color:aqua;
font-weight:bold;
}
      </style>
  
</head>
<body>

<div class="container-fluid my-3">
    <h1 class="text-center">User Login</h1>
    <div class="row mt-5 d-flex align-item-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        
<form action="" method="post" enctype="multipart/form-data"> 
  <div class="form-outline mb-4">
<label class="form-label">Username</label>
<label class="form-label"></label>
<input type="text" name="user_username" placeholder="Enter your Username" class="form-control"> 
</div>
<div class="form-outline mb-4">
<label class="form-label">Password</label>
<input type="text" name="user_password" placeholder="Enter your password" class="form-control"><br>

<!--<a href="">Forgot password</a><br><br>-->
<div>
 <input type="submit" name="user_login" value="Login" class="btn btn-primary"><br><br>
 <span style="font-weight:bold">Dont' have an account? <a href="user_area/user_registration.php" class="text-danger">Register</a></span>
</div>
</div>

</form>

</div>

</div>
</div>
<?php

if(isset($_POST['user_login']))
{
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];

  $select_query="Select * from user_table where user_username='$user_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $user_ip=getIPAddress();


  $select_query_cart="Select * from card_details where ip_address='$user_ip'";
  $select_cart=mysqli_query($con,$select_query_cart);
  $row_count_cart=mysqli_num_rows($select_cart);

  if($row_count>0)
  {
    $_SESSION['username']=$user_username;
    

    if(password_verify($user_password,$row_data['user_password']))
    {
    $_SESSION['username']=$user_username;

      //echo "<script>alert('login successfully')</script>";
      if($row_count==1 and $row_count_cart==0)
      {
    $_SESSION['username']=$user_username;
        
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      }
      else{
        
    $_SESSION['username']=$user_username;
        
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
      }
    }
    else{
      echo "<script>alert('Invalid Credentials')</script>";

    }
  }
  else{
    echo "<script>alert('Invalid Credentials')</script>";

  }

}
?>
    
</body>
</html>