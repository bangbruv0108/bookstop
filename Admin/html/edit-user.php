<?php
include "databaseconnection.php";

die($id = $_POST['id']);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];

$sql = "UPDATE `userTB` SET `password` = '$password', `username` = '$username', `email` = '$email', `mobile` = $mobile, `city` = '$city' WHERE `id` = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
}
else{
    echo 0;
}

?>