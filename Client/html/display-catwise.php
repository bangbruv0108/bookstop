<?php
function display_books()
{
    $category = $_POST['category'];
    include "databaseconnection.php";
    $sql = "SELECT * FROM `productTB` WHERE `category` = '$category'";
    $output = mysqli_query($conn, $sql);
    if (mysqli_num_rows($output) > 0) {
        $cat_products = array();
        while ($rows = mysqli_fetch_assoc($output)) {
            $cat_products[] = $rows;
            
        }
        $res = array("data"=>$cat_products);
        echo json_encode($res);
    }
    else{
        echo 0;
    }

}
display_books();
?>