<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- css plugins -->
    <link rel="stylesheet" href="./Admin/css/style.css">

    <!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <title>Bookstop Login</title>
</head>

<body class=" login-body d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="login-form">
        <div>
            <h3 class="">Login To Bookstop</h1>
                <div class="my-3">
                    <input type="text" class="form-control bg-dark text-light login-fields" placeholder="Enter Your Username" id="username" aria-describedby="emailHelp">
                </div>
                <div class="my-3">
                    <input type="password" class="form-control bg-dark text-light login-fields" placeholder="Enter Password" id="password">
                </div>
                <div class="mb-3 form-check">
                    <a href="./register.php" class="register-link">Dont't Have Any Account?</a>
                </div>

                <button type="submit" class="login-btn" id="login-btn">Login</button>
        </div>
    </div>

    <div class="toast-msg-box" id="toast-msg-box">
        <div class="toast align-items-center bg-warning" id="toast" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <!-- Please Type The Category, The Field Cant't Be Empty. -->
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#login-btn").on('click', function() {

                var username = $('#username').val();
                var password = $('#password').val();
                if (username == "admin" && password == "admin123") {
                    $(location).attr('href', './Admin/html/category.php');

                } else {

                    $.ajax({
                        url: './Admin/html/check-user.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            username: username,
                            password: password,
                        },
                        success: function(data) {
                            if (data == "admin") {
                                $(location).attr('href', './Admin/html/category.php');
                            } else if (data == 0) {
                                $("#toast").removeClass("toast align-items-center bg-success");
                                $("#toast").removeClass("toast align-items-center bg-danger");

                                $("#toast").addClass("toast align-items-center bg-warning")
                                $(".toast-body").html("Please Enter User Credentials");
                            } else if (data == 1) {
                                $(location).attr('href', './Client/html/index.php   ');

                            } else {
                                $("#toast").removeClass("toast align-items-center bg-success");
                                $("#toast").removeClass("toast align-items-center bg-warning");

                                $("#toast").addClass("toast align-items-center bg-danger")
                                $(".toast-body").html("User Does Not Exist");
                            }
                        }
                    });
                }
            });
        });
    </script>

    <!-- Toast msg Script  -->
    <script>
        const toastTrigger = document.getElementById('login-btn');
        const toastLiveExample = document.getElementById('toast');
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample);

                toast.show();
            });
        }
    </script>
</body>

</html>