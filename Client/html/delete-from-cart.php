<?php
include "databaseconnection.php";

    $oid = $_POST['oid'];

        // die("vhenbhod");
        $sql = "DELETE FROM `cartTB` WHERE `oid` = $oid";
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