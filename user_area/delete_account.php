<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="">
 
<h3 class="text-danger text-center mb-4">Delete Account</h3>
<form action="" method="post" class="mt-5">
<div class="form-outline mb-4">
<input type="submit" class="form-control bg-danger text-light w-50 m-auto" name="delete" value="Delete Account">

</div>
<div class="form-outline mb-4">
<input type="submit" class="form-control bg-success text-light w-50 m-auto" name="dont_delete" value="Don't Delete Account">

</div>


</form>

    


<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete']))
{
    $delete_query="Delete from user_table where user_username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result)
    {
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
    }
}
if(isset($_POST['dont_delete']))
{
    //echo "<script>alert('s')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

?>
</body>
</html>