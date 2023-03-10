<?php


//echo "<script>alert('Confirm logout')<script>";

session_start();
session_unset();
session_destroy();
echo "<script>alert('confirm logout')</script>";
// echo "hi";
echo "<script>window.open('../index.php','_self')</script>";

?>