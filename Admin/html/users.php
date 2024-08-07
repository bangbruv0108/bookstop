<?php include "databaseconnection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css plugins -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Users </title>
</head>

<body class="product-body">
    <!-- Sidebar Start  -->
    <?php include "sidebar.php" ?>
    <!-- Sidebar End  -->

    <!-- Modal Start  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="mb-3">
                            <input type="text" name="snoEdit" class="form-control bg-dark text-light custom-fields" id="modal-id">
                            <label for="titleedit" class="form-label">Username</label>
                            <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields"  id="modal-username">
                        </div>
                        <div class="mb-3">
                            <label for="descedit" class="form-label">Email</label>
                            <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields"  id="modal-email">
                        </div>
                        <div class="mb-3">
                            <label for="descedit" class="form-label">Password</label>
                            <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields"  id="modal-password">
                        </div>
                        <div class="mb-3">
                            <label for="descedit" class="form-label">Mobile No</label>
                            <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields"  id="modal-mobile">
                        </div>
                        <div class="mb-3">
                            <label for="descedit" class="form-label">City</label>
                            <input type="text" name="price_field" class="form-control bg-dark text-light custom-fields"  id="modal-city">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="save-btn" onclick="editUser(id,username,email,password,mobile,city)" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <div class="container-fluid home-content d-block">
        <div class="container product-page ">
            <h2 style="color: white;">Manage Users</h2>
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
        <table class="table my-3 table-primary table-hover userTB mx-auto">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="datatable">

            </tbody>
        </table>
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
                url: "display-userTB.php",
                type: "POST",
                dataType: "json",
                async: true,
                success: function(data) {
                    var no = 1;
                    const users = data.data;
                    var tableData = "";
                    for (let key in users) {
                        tableData += `<tr>
                                <td scope="row">${no}</td>
                                <td>${users[key].username}</td>
                                <td>${users[key].email}</td>
                                <td>${users[key].password}</td>
                                <td>${users[key].mobile}</td>
                                <td>${users[key].city}</td>
                                <td>
                                <button type="button" id="edit-btn" onclick="editUser(${users[key].id} ,'${users[key].username}' ,'${users[key].email}','${users[key].password}','${users[key].mobile}','${users[key].city}')" class="btn btn-warning">Edit</button>
                                <button type="button" id="delete-btn" onclick="delID(${users[key].id})" class="btn btn-danger">Delete</button>
                                </td>

                               </tr>`;
                        no++;
                    }
                    $("#datatable").html(tableData);
                }

            });
        }

        function delID(id) {
            console.log(id);
            $.ajax({
                url: "delete-user.php",
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
                        $(".toast-body").html("User Deleted Successfully");
                    } else {
                        console.log('Code is not right');
                    }
                }

            });
        }

        function editUser(id,username,email,password,mobile,city) {
           console.log(id);
            $("#editModal").modal("show");
            $("#modal-id").val(id).focus();
            $("#modal-username").val(username).focus();
            $("#modal-email").val(email);
            $("#modal-password").val(password);
            $("#modal-mobile").val(mobile);
            $("#modal-city").val(city);

            $("#save-btn").on('click',function(){
                var USERNAME = $("#modal-username").val();
                var EMAIL = $("#modal-email").val();
                var PASSWORD = $("#modal-password").val();
                var MOBILE = $("#modal-mobile").val();
                var CITY = $("#modal-city").val();


                $("#editModal").modal("hide");

                $.ajax({
                    url: "edit-user.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: id,
                        username:USERNAME,
                        email:EMAIL,
                        password:PASSWORD,
                        mobile:MOBILE,
                        city:CITY,
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#datatable").html("");
                            display_table();
    
                            $("#toast").removeClass("toast align-items-center bg-warning");
                            $("#toast").removeClass("toast align-items-center bg-danger");
    
                            $("#toast").addClass("toast align-items-center bg-success")
                            $(".toast-body").html("User Updated Successfully");
                        } else {
                            console.log('Code is not right');
                        }
                    }
    
                });
            });
        }

        $(document).ready(function() {
            display_table();
            
        });
    </script>




</body>

</html>