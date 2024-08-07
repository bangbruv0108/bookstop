<?php include "databaseconnection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <!-- CSS File plugins -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Product </title>
</head>

<body class="product-body">
    <!-- Sidebar Start  -->
    <?php include "sidebar.php" ?>
    <!-- Sidebar End  -->


    <div class="container-fluid home-content d-block">
        <div class="container product-page ">
            <h2 style="color: white;">Add Products</h2>

            <div class="addproduct-form">
                <input type="text" name="producut_name_field" class="form-control bg-dark text-light custom-fields" placeholder="Enter Product Name" id="p_name">

                <select class="form-select bg-dark text-light custom-fields" name="category_field" id="p_category">
                    <option selected>Select Category</option>
                    <?php
                    $sql = "SELECT * FROM categoryTB";
                    $result = mysqli_query($conn, $sql);

                    while ($output = mysqli_fetch_array($result)) {
                        echo "<option value=" . $output['category'] . ">" . $output['category'] . "</option>";
                    }
                    ?>
                </select>

                <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields" placeholder="Enter Price" id="p_price">

                <textarea class="form-control bg-dark text-light custom-fields" name="desc_field" placeholder="Write Description..." id="p_desc" style="height: 100px"></textarea>

                <input class="form-control bg-dark text-light custom-fields" name="product_img_field" type="file" id="p_img">

                <button type="button" id="add-product-btn" class="add-btn ">Add Product</button>
            </div>




        </div>

        <div class="toast-msg-box" id="toast-msg-box">
            <div class="toast align-items-center bg-warning" id="toast" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        Please Type The Category, The Field Cant't Be Empty.
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <table class="table my-3 table-primary table-hover productTB mx-auto">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody id="datatable">



            </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
        let btn = document.querySelector("#hamburger-btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>

    <script>
        var display_table = () => {
            $.ajax({
                url: "display-productTB.php",
                type: "POST",
                dataType: "json",
                async: true,
                success: function(data) {
                    var no = 1;
                    const products = data.data;
                    var tableData = "";
                    for (let key in products) {
                        tableData += `<tr>
                                <td scope="row">${no}</td>
                                <td>${products[key].name}</td>
                                <td>${products[key].category}</td>
                                <td>${products[key].price}</td>
                                <td>${products[key].description.substring(0,40)}...</td>
                                <td> <img src='./image/${products[key].image}'  class="product_img" alt=""> </td>
                                <td><button type="button" id="delete-btn" onclick="delID(${products[key].id})" class="btn btn-danger">Delete</button></td>
                               </tr>`;
                        no++;
                    }
                    $("#datatable").html(tableData);
                }

            });
        }
        $(document).ready(function() {
            display_table();

            $("#add-product-btn").on("click", function(e) {
                e.preventDefault();
                var p_name = $("#p_name").val();
                var p_price = $("#p_price").val();
                var p_category = $("#p_category").val();
                var p_description = $("#p_desc").val();

                var fd = new FormData();
                var p_image = $('#p_img')[0].files[0];

                if (p_image != null && p_name != "" && p_price != "" && p_category != "" && p_description != "") {

                    fd.append('p_img', p_image);
                    fd.append('p_name', p_name);
                    fd.append('p_price', p_price);
                    fd.append('p_category', p_category);
                    fd.append('p_desc', p_description);
                    $.ajax({
                        url: "add-product.php",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        // dataType: "html",
                        contentType: false,
                        processData: false,
                        // cache:false,
                        data: fd,
                        success: function(data) {
                            if (data == 1) {
                                $("#datatable").html("");
                                display_table();
                                $("#toast").removeClass("bg-warning");
                                $("#toast").addClass("bg-success");
                                $(".toast-body").html("Product Added Successfully");


                            } else if (data == 0) {
                                $("#toast").removeClass("bg-sucess");
                                $("#toast").addClass("bg-danger");
                                $(".toast-body").html("Not able to Product Add Successfully");

                            }
                        }
                    });
                } else {
                    $('#error').show();
                    $('#error').delay(5000).fadeOut(400)
                    $('#error').contents().filter(isTextNode).remove();
                    $('#error').append('Please Fill all fields');
                }

            });



        });

        function delID(id) {
            console.log(id);
            $.ajax({
                url: "delete-product.php",
                type: "POST",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {
                        $("#datatable").html("");
                        display_table();
                        $("#toast").removeClass("bg-warning");
                        $("#toast").addClass("bg-success");
                        $(".toast-body").html("Category Deleted Successfully");
                    } else {
                        console.log('loda code sarkho kar');
                    }
                }

            });
        }
    </script>

    <!-- Toast msg Script  -->
    <script>
        const toastTrigger = document.getElementById('add-btn');
        const toastLiveExample = document.getElementById('toast');
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample);

                toast.show();
            })
        }
    </script>
</body>

</html>