<?php
include "databaseconnection.php";

    $id = $_POST['id'];

        // die("vhenbhod");
        $sql = "DELETE FROM `userTB` WHERE `id` = '$id'";
        $output = mysqli_query($conn, $sql) or die("operation failed");      
        
        if($output)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
?>