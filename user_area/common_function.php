<?php

include('connect.php');
//include('profile.php');

function getproducts()
{
  global $con;
 
   //condition to check isset or not
   if(!isset($_GET['category']))
   {
    if(!isset($_GET['brand']))
    {
   $select_query="Select * from `products` order by rand() LIMIT 0,61";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query))
   {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo  "<div class='col-md-4 mb-5' class='image1'>
    <div class='card bg-light  border-0' style='width: 18rem;'>
  <img class='card-img-top mt-4' style=' width:100%;
  height:200px;
  object-fit:contain;
  padding:10px;' src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'><br>
  <div class='card-body'>
  <h5 class='card-title fw-bold text-center'>$product_title</h5><br>
  <p class='card-text'>$product_description</p><br>
  <p class='card-text fw-bold text-center text-danger' style='font-size:20px;'><small class='text-dark'>Price :</small> &#8377;$product_price.00/- <small class='text-success fw-bold'>(10% off)</small></p>

  <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
  
  </div>
  </div>
    </div>";
   }

}
   }
  } 

  //getting all products
  function get_all_products()
{
  global $con;
 
   //condition to check isset or not
   if(!isset($_GET['category']))
   {
    if(!isset($_GET['brand']))
    {
   $select_query="Select * from `products` order by rand()";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query))
   {
    $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $product_image1=$row['product_image1'];
       $product_price=$row['product_price'];
       $category_id=$row['category_id'];
       $brand_id=$row['brand_id'];
    echo  "<div class='col-md-4 mb-5' class='image1'>
    <div class='card bg-light  border-0' style='width: 18rem;'>
  <img class='card-img-top mt-4' style=' width:100%;
  height:200px;
  object-fit:contain;
  padding:10px;' src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'><br>
  <div class='card-body'>
  <h5 class='card-title fw-bold text-center'>$product_title</h5><br>
  <p class='card-text'>$product_description</p><br>
  <p class='card-text fw-bold text-center text-danger' style='font-size:20px;'><small class='text-dark'>Price :</small> &#8377;$product_price.00/- <small class='text-success fw-bold'>(10% off)</small></p>

  <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
  
  </div>
  </div>
    </div>";
   }

}
   }
  } 

  //getting unique categories

  function get_unique_categories(){
  global $con;
  
  
     //condition to check isset or not
     if(isset($_GET['category']))
     {
     $category_id=$_GET['category'];
     $select_query="Select * from `products` where category_id=$category_id";
     $result_query=mysqli_query($con,$select_query);
     $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
}
     while($row=mysqli_fetch_assoc($result_query))
     {
       $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $product_image1=$row['product_image1'];
       $product_price=$row['product_price'];
       $category_id=$row['category_id'];
       $brand_id=$row['brand_id'];
       echo  "<div class='col-md-4 mb-5' class='image1'>
       <div class='card bg-light  border-0' style='width: 18rem;'>
     <img class='card-img-top mt-4' style=' width:100%;
     height:200px;
     object-fit:contain;
     padding:10px;' src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'><br>
     <div class='card-body'>
     <h5 class='card-title fw-bold text-center'>$product_title</h5><br>
     <p class='card-text'>$product_description</p><br>
     <p class='card-text fw-bold text-center text-danger' style='font-size:20px;'><small class='text-dark'>Price :</small> &#8377;$product_price.00/- <small class='text-success fw-bold'>(10% off)</small></p>
  
     <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
     
     </div>
     </div>
       </div>";
     }
  
  }
     }
    
  //getting unique brand

  function get_unique_brands(){
    global $con;
    
    
       //condition to check isset or not
       if(isset($_GET['brand']))
       {
       $brand_id=$_GET['brand'];
       $select_query="Select * from `products` where brand_id=$brand_id";
       $result_query=mysqli_query($con,$select_query);
       $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0)
  {
    echo "<h2 class='text-center text-danger'>This brand not available for service</h2>";
  }
       while($row=mysqli_fetch_assoc($result_query))
       {
        $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $product_image1=$row['product_image1'];
       $product_price=$row['product_price'];
       $category_id=$row['category_id'];
       $brand_id=$row['brand_id'];
        echo  "<div class='col-md-4 mb-5' class='image1'>
        <div class='card bg-light  border-0' style='width: 18rem;'>
      <img class='card-img-top mt-4'style=' width:100%;
      height:200px;
      object-fit:contain;
      padding:10px;' src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'><br>
      <div class='card-body'>
      <h5 class='card-title fw-bold text-center'>$product_title</h5><br>
      <p class='card-text'>$product_description</p><br>
      <p class='card-text fw-bold text-center text-danger' style='font-size:20px;'><small class='text-dark'>Price :</small> &#8377;$product_price.00/- <small class='text-success fw-bold'>(10% off)</small></p>
   
      <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
      
      </div>
      </div>
        </div>";
       }
    
    }
       }
      
    
  


function getbrands()
{
  global $con;
  $select_brands="Select * from brands";
  $result_brands=mysqli_query($con,$select_brands);
  
  while($row_data=mysqli_fetch_assoc($result_brands))
  {
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
    echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link text-light fw-bold' style='font-size:20px;'>$brand_title</a>
    </li><br>";
  }

}

function getcategories()

{
   global $con;
   $select_categories="Select * from categories";
$result_categories=mysqli_query($con,$select_categories);

while($row_data=mysqli_fetch_assoc($result_categories))
{
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo "<li class='nav-item'>
  <a href='index.php?category=$category_id' class='nav-link text-light fw-bold' style='font-size:20px;'>$category_title</a>
  </li><br>";
}
}

// searching products function

function search_products()
{
  global $con;
 
   //condition to search check isset or not
   if(isset($_GET['search_data_products']))
   {
   $search_data_value=$_GET['search_data'];
   $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
   $result_query=mysqli_query($con,$search_query);
   $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows==0)
   {
    echo "<h1 class='text-center text-danger'>No result match. No products found on this category!</h1>";
   }
   while($row=mysqli_fetch_assoc($result_query))
   {
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_image1=$row['product_image1'];
     $product_price=$row['product_price'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     echo  "<div class='col-md-4 mb-5' class='image1'>
     <div class='card bg-light  border-0' style='width: 18rem;'>
   <img class='card-img-top mt-4' style='    width:100%;
   height:200px;
   object-fit:contain;
   padding:10px;' src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'><br>
   <div class='card-body'>
   <h5 class='card-title fw-bold text-center'>$product_title</h5><br>
   <p class='card-text'>$product_description</p><br>
   <p class='card-text fw-bold text-center text-danger' style='font-size:20px;'><small class='text-dark'>Price :</small> &#8377;$product_price.00/- <small class='text-success fw-bold'>(10% off)</small></p>

   <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
   <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
   
   </div>
   </div>
     </div>";
   }

}
   }
  

   function view_details()
{
  global $con;
 
   //condition to check isset or not
   if(isset($_GET['product_id'])){
   if(!isset($_GET['category']))
   {
    if(!isset($_GET['brand']))
    {
      $product_id=$_GET['product_id'];
   $select_query="Select * from `products` where product_id=$product_id";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query))
   {
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_image1=$row['product_image1'];
     $product_image2=$row['product_image2'];
     $product_image3=$row['product_image3'];
     $product_price=$row['product_price'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     echo  "<div class='col-md-4 mb-5'>
     <div class='card bg-light border-0' style='width: 18rem;'>
   <img class='card-img-top' style=' width:100%;
   height:200px;
   object-fit:contain;
   padding:10px;' src='./admin_area/product_images/$product_image1' alt='$product_title'>
   <div class='card-body'>
   <h5 class='card-title'>$product_title</h5>
   <p class='card-text'>$product_description</p>
   <p class='card-text'>Price $product_price/-</p>

   <a href='index.php?add_to_card=$product_id' class='btn btn-warning'>Add to card</a>
   
   <a href='product_details.php?product_id=$product_id' class='btn btn-info'>View more</a>
   
   </div>
   </div>
     </div>
     
     
<div class='col-md-8'>
<!-- related images -->
<div class='row'>
    <div class='col-md-12'>
<h4 class='text-center text-info'>Related products</h4>

</div>
<div  class='col-md-6 mt-5'>
<img src='./admin_area/product_images/$product_image2' style='width:300px;height:250px;' class='carg-img-top'>
</div>
<div  class='col-md-6 mt-5'>
<img src='./admin_area/product_images/$product_image3'  style='width:300px;height:250px;' class='carg-img-top'>

</div>

</div>
</div>";
   }

}
   }
  } 
}

 //get ipAddress
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;


//card action
function card()
{
if (isset($_GET['add_to_card']))
{
  global $con;
  $get_ip_add= getIPAddress();
  $get_product_id=$_GET['add_to_card'];

  $select_query="Select * from card_details where ip_address='$get_ip_add'
  and product_id='$get_product_id'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0)
  {
    echo "<script>alert('The item already present inside card')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
else{
$insert_query="insert into card_details (product_id,ip_address,quantity)values('$get_product_id','$get_ip_add',0)";
$result_query=mysqli_query($con,$insert_query);
echo "<script>alert('item is added to card')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}



}

// function to get card item numbers
function card_item()
{
   if(isset($_GET['add_to_card']))
   {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from card_details where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_card_items=mysqli_num_rows($result_query);
}
   else{
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from card_details where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_card_items=mysqli_num_rows($result_query);

   }
  echo $count_card_items ;



}

// totel price function

function total_card_price()
{
  global $con;
  $get_ip_add = getIPAddress();
  $total_price=0;
  $card_query="Select * from card_details where ip_address='$get_ip_add'";
  $result=mysqli_query($con,$card_query);
  while($row=mysqli_fetch_array($result))
  {
    $product_id=$row['product_id'];
  $select_products="Select * from products where product_id='$product_id'";
  $result_products=mysqli_query($con,$select_products);
  while($row_product_price=mysqli_fetch_array($result_products))
  {
    $product_price=array($row_product_price['product_price']);
    $product_values=array_sum($product_price);
    $total_price+=$product_values;
  }

  }
  echo $total_price;
}


function get_user_order_detail()
{

global $con;
$username=$_SESSION['username'];
$get_details="Select * from user_table where user_username='$username'";
$result_query=mysqli_query($con,$get_details);
while($row_query=mysqli_fetch_array($result_query))
{
  $user_id=$row_query['user_id'];
  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(isset($_GET['pending_account'])){
$get_orders="Select * from orders where user_id='$user_id' and order_status='pending'";
$result_orders_query=mysqli_query($con,$get_orders);
$row_count=mysqli_num_rows($result_orders_query);
if($row_count>0)
{
  echo "<h3 class='text-center text-success mt-5'>You have $row_count pending order<h3>
  <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
}
else{
  echo "<h3 class='text-center text-success'>You have Zero pending order<h3>
  <p class='text-center'><a href='../index.php' class='text-dark'>Order Details</a></p>";

}

      }
     
      }
     
      }
    }
    
    }
   
    

  
  
  








?>