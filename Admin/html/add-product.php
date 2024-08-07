<?php
include "databaseconnection.php";
$p_name = $_POST['p_name'];
$p_image = $_FILES['p_img'];
$p_price = $_POST['p_price'];
$p_category = $_POST['p_category'];
$p_description = $_POST['p_desc'];
 
 if($_FILES['p_img']['name'] !='')
 {
    $filename=$_FILES['p_img']['name'];
    $filesize=$_FILES['p_img']['size'];
    $file_tmp=$_FILES['p_img']['tmp_name'];
    $file_type=$_FILES['p_img']['type'];
    $extension = pathinfo($filename,PATHINFO_EXTENSION);
    
    $new_name=rand().".".$file_name.$extension;
 
    move_uploaded_file($file_tmp,"image/".$new_name);
 
 }
$sql = "INSERT INTO `productTB` (`name`, `category`, `price`, `description`, `image`) VALUES ('$p_name', '$p_category', '$p_price', '$p_description', '$new_name')";
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