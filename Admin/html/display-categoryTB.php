<?php

function display_table()
{
    include "databaseconnection.php";
    $sql = "SELECT * FROM categoryTB ";
    $output = mysqli_query($conn, $sql);
    if (mysqli_num_rows($output) > 0) {
        $category = array();
        while ($rows = mysqli_fetch_assoc($output)) {
            $category[] = $rows;
            
        }
        $res = array("data"=>$category);
        echo json_encode($res);
    }

}
display_table();
?>