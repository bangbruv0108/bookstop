<?php
include "databaseconnection.php";

    $category = $_POST['category'];

    if($category != ""){
        $sql = "INSERT INTO `categoryTB` (`category`) VALUES ('$category')";
        $output = mysqli_query($conn, $sql) or die("insert failed");      
        
                        
        if($output)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else{
        echo "2";
    }
