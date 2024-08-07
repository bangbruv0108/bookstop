<?php

function display_table()
{
    include "databaseconnection.php";
    $sql = "SELECT * FROM userTB ";
    $output = mysqli_query($conn, $sql);
    if (mysqli_num_rows($output) > 0) {
        $users = array();
        while ($rows = mysqli_fetch_assoc($output)) {
            $users[] = $rows;
            
        }
        $res = array("data"=>$users);
        echo json_encode($res);
    }

}
display_table();
?>