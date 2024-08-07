<?php
session_start();
include "databaseconnection.php";
$product_id = $_POST['pid'];
$product_name = $_POST['pname'];
$product_category = $_POST['pcategory'];
$product_price = $_POST['pprice'];
$product_image = $_POST['pimage'];
$user_id = $_SESSION['userid'];

if($user_id == ""){
    echo 2;
}

$sql = "INSERT INTO cartTB(`userid`,`productid`, `product_name`, `product_category`, `product_price`, `product_image`) VALUES ($user_id , $product_id, '$product_name', '$product_category', '$product_price', '$product_image')";
$result = mysqli_query($conn,$sql);
 if($result)
 {
    echo 1;
 }
else
{
    echo 0;
}
?>