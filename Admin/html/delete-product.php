<?php
include "databaseconnection.php";

    $id = $_POST['id'];

        // die("vhenbhod");
        $sql = "DELETE FROM `productTB` WHERE `id` = '$id'";
        $output = mysqli_query($conn, $sql) or die("operation failed");
 
       
        // $status = unlink('./image/'.$output2);
        if($output)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
?>