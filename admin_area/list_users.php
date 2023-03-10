<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 class="text-center text-success">All orders</h1>
   <table class="table table-bordered text-center">
    <thead class="bg-info">
        <?php

        $get_listusers="Select * from user_table";
        $result=mysqli_query($con,$get_listusers);
        $row_count=mysqli_num_rows($result);

  
        if($row_count==0)
  {
    echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
  }
  else{
    echo "
    <tr>
    <th>SI.NO</th>
    <th>Username</th>
    <th>User email</th>
    <th>User Image</th>
    <th>User Address</th>
    <th>User Mobile</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $user_id=$row_data['user_id'];
        $user_username=$row_data['user_username'];
        $user_email=$row_data['user_email'];
        $user_address=$row_data['user_address'];
        $user_contact=$row_data['user_contact'];
         $user_image=$row_data['user_image'];
        //$user_image_tmp=$row_data['user_image']['tmp_name'];


        //move_uploaded_file($user_image_tmp"/product_images/$user_image")

        
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$user_username</td>
        <td>$user_email</td>
        <td><img style='width:18%;height:18%;object-fit:contain;' src='../user_area/user_images/$user_image'</td>
        <td>$user_address</td>
        <td>$user_contact</td>
        <td><a href='index.php?users_delete=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
     </tr>";

    }
}
?>
</tbody>
</table>
</div>



</body>
</html>