<?php

function display_table()
{
    include "databaseconnection.php";
    $sql = "SELECT * FROM productTB ";
    $output = mysqli_query($conn, $sql);
    if (mysqli_num_rows($output) > 0) {
        $products = array();
        while ($rows = mysqli_fetch_assoc($output)) {
            $products[] = $rows;
            
        }
        $res = array("data"=>$products);
        echo json_encode($res);
    }

}
display_table();
?>