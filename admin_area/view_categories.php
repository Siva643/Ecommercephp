



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table class="table table-bordered">
    <thead class="bg-info text-center text-light">
        <tr>
            <th>S.NO</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

</thead>
<tbody class="text-center bg-secondary text-light">

<?php
$select_category="select * from categories";
$result=mysqli_query($con,$select_category);
$number=0;
while($row=mysqli_fetch_assoc($result))
{
   $category_id=$row['category_id'];
   $category_title=$row['category_title'];
   $number++;
?>
   <tr>
    <td><?php echo  $number  ?></td>
    <td><?php echo $category_title ?></td>
    <td><a href="index.php?edit_category=<?php echo $category_id ?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></td>
     <td><a href="index.php?delete_category=<?php echo $category_id ?>" class="text-light"><i class="fa-solid fa-trash"></i></td>

</tr>


<?php
}
?>
</tbody>
</table>
    
</body>
</html>