<?php
session_start();
include "databaseconnection.php";
$user_id = $_SESSION['userid'];
$product_id = $_POST['pid'];
$product_name = $_POST['pname'];
$product_category = $_POST['pcat'];
$product_price = $_POST['pprice'];
$product_image = $_POST['pimg'];


$sql = "INSERT INTO orderTB(`userid`,`productid`, `p_name`, `p_category`, `p_price`, `p_image`) VALUES ($user_id , $product_id, '$product_name', '$product_category', '$product_price', '$product_image')";
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