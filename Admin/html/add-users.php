<?php
include "databaseconnection.php";
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cnfpassword = $_POST['cnfpassword'];
$mobileno = $_POST['mobileno'];
$city = $_POST['city'];

if($password == $cnfpassword){

    $sql = "INSERT INTO `userTB` (`username`, `email`, `password`, `mobile`, `city`) VALUES ( '$username', '$email', '$password', '$mobileno', '$city')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo 1;
    }
    else{
        echo 2;
    }
}
else{
    echo 0;
}
