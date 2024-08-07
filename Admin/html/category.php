<?php
include "databaseconnection.php";
// $no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- css plugins -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Bookstop Dashboard</title>
</head>

<body class="category-body">
    <!-- Sidebar Start -->
    <?php include "sidebar.php" ?>
    <!-- Sidebar End  -->

    <div class="home-content">
        <div class="container category-page ">
            <h2 class="text-light">Add Categories of Book</h2>

            <div class="addcategory-form">
                <div class="my-3">
                    <input type="text" name="category_field" class="form-control bg-dark text-light login-fields" placeholder="Enter Category" id="category_field">
                </div>

                <button type="submit" id="add-category-btn" class="add-btn">Add Category</button>
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

            <table class="table my-3 table-primary table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cateory</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody id="datatable">



                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                url: "display-categoryTB.php",
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
                                <td>${products[key].category}</td>
                                
                                <td><button type="button" id="delete-btn" onclick="delID(${products[key].no})" class="btn btn-danger">Delete</button></td>
                               </tr>`;
                        no++;
                    }
                    $("#datatable").html(tableData);
                }

            });
        }
        $(document).ready(function() {
            display_table();

            $("#add-category-btn").on('click', function() {
                var category = $('#category_field').val();
                $('#category_field').val("");

                $.ajax({
                    url: "add-category.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        category: category
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#datatable").html("");
                            display_table();
                            $("#toast").removeClass("bg-warning");
                            $("#toast").addClass("bg-success");
                            $(".toast-body").html("Category Added");
                        } else if (data == 2) {
                            $("#toast").addClass("bg-warning");
                            $("#toast").removeClass("bg-success");
                            $(".toast-body").html("Please Enter Category");
                        } else {
                            console.log('errors he bhai');
                            $("#toast").addClass("bg-danger");
                            $(".toast-body").html("Unable to Add Category");
                        }
                    }

                });
            });


        });

        function delID(id) {
            console.log(id);
            $.ajax({
                url: "delete-category.php",
                type: "POST",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {
                        $("#datatable").html("");
                        display_table();

                        $("#toast").removeClass("toast align-items-center bg-warning");
                        $("#toast").removeClass("toast align-items-center bg-danger");

                        $("#toast").addClass("toast align-items-center bg-success")
                        $(".toast-body").html("Category Deleted Successfully");
                    } else {
                        console.log('Code is not right');
                    }
                }

            });
        }
    </script>


    <!-- Toast msg Script  -->
    <script>
        const toastTrigger = document.getElementById('add-category-btn');
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