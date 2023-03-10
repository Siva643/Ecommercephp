<?php

//include('connect.php');
//include('common_function.php');
//include('profile.php');


//session_start();
?>

<?php
if(isset($_GET['edit_account']))
{
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from user_table where user_username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    
    $row_fetch=mysqli_fetch_array($result_query);
   
    $user_id=$row_fetch['user_id'];
    $user_username=$row_fetch['user_username'];
    $user_email=$row_fetch['user_email'];
    //$user_image=$row_fetch['user_image'];
    $user_address=$row_fetch['user_address'];
    $user_contact=$row_fetch['user_contact'];
}



if(isset($_POST['user_update']))
{
    $update_id=$user_id;
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    //$user_image=$_FILES['user_image']['name'];
    
    //$user_image_tmp=$_FILES['user_image']['tmp_name'];
    //move_uploaded_file($user_image_tmp,"user_images/$user_image");

    //update query

    $update_data="update user_table set user_username='$user_username',user_email
    ='$user_email',user_address='$user_address',user_contact='$user_contact' where user_id=$update_id";
    $result_query_update=mysqli_query($con,$update_data);
    if($result_query_update)
    {
        echo "<script>alert('Data updated successfully')</script>";
    }
    else{
        die(mysqli_error($con));
    }
    
}



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
        .edit_image{

            width:120px;
            height:120px;
            object-fit:contain;
            position:absolute;
            left:71%;
            bottom:35%;
            top:60%;
        }

        </style>
   
</head>
<body class="">

<h4 class="text-center text-success mt-5 h2">Edit Account</h4>
<form action="" method="post" class="mt-5">
<div class="form-outline mb-5">
<input type="text" value="<?php echo $user_username ?>" name="user_username" class="form-control w-50 m-auto" placeholder="Enter your name">
</div>
<div class="form-outline mb-5">
<input type="text" value="<?php echo $user_email ?>"  name="user_email" class="form-control w-50 m-auto" placeholder="Enter your email">
</div>
<!--<div class="form-outline mb-5">
<input type="file" class="form-control w-50 m-auto">
<img src="./user_images/
 
alt="" class="edit_image">
</div>-->
<div class="form-outline mb-5">
<input type="text" value="<?php echo $user_address ?>"  name="user_address" class="form-control w-50 m-auto" placeholder="Enter your address">
</div>
<div class="form-outline mb-5">
<input type="text" value="<?php echo $user_contact ?>"  name="user_contact" class="form-control w-50 m-auto" placeholder="Enter your number">
</div>
<div>
<input type="submit" class="btn btn-success w-50  m-auto " name="user_update" style="position:relative;left:25%;" value="Update" name="">

</div>


</form>
    
</body>
</html>