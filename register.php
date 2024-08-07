<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- css plugins -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <title>Bookstop Login</title>
</head>

<body class=" login-body d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="login-form">
        <h3 class="mb-3">Register To Bookstop</h3>

        <div>
            <input type="text" class="form-control bg-dark text-light login-fields" placeholder="Enter Username" id="username">
        </div>
        <div>
            <input type="text" class="form-control bg-dark text-light login-fields" placeholder="Enter Your Email" id="email">
        </div>
        <div class="row ">
            <div class="col-6">
                <input type="password" class="form-control bg-dark text-light login-fields" placeholder="Create Password" id="password">
            </div>
            <div class="col-6">
                <input type="password" class="form-control bg-dark text-light login-fields" placeholder="Confirm Password" id="cnfpassword">
            </div>
        </div>
        <div>
            <input type="text" class="form-control bg-dark text-light login-fields" placeholder="Enter Mobile No" id="mobileno">
        </div>

        <select class="form-select bg-dark text-light custom-fields" name="category_field" id="city">
            <option selected>Select Category</option>
            <option selected>Surat</option>
            <option selected>Baroda</option>
            <option selected>Pune</option>
            <option selected>Bengaluru</option>

        </select>

        <div class="mb-3 form-check">
            <label class="form-check-label" for="exampleCheck1"><input type="checkbox" class="form-check-input" id="exampleCheck1">Remember Me</label>
        </div>
        <button type="submit" class="add-btn" id="register-btn">Register</button>

        <div class="toast-msg-box" id="toast-msg-box">
            <div class="toast align-items-center" id="toast" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        Please Type The Category, The Field Cant't Be Empty.
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#register-btn").on('click', function() {
                var username = $("#username").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var cnfpassword = $("#cnfpassword").val();
                var mobileno = $("#mobileno").val();
                var city = $("#city").val();
                if (username != "" && email != "" && password != "" && cnfpassword != "" && mobileno != "" && city != "") {

                    $.ajax({
                        url: './Admin/html/add-users.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            username: username,
                            email: email,
                            password: password,
                            cnfpassword: cnfpassword,
                            mobileno: mobileno,
                            city: city
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#toast").removeClass("toast align-items-center bg-warning");
                                $("#toast").removeClass("toast align-items-center bg-danger");

                                $("#toast").addClass("toast align-items-center bg-success");
                                $(".toast-body").html("You have Signed up Successfully");
                                setTimeout(function() {
                                    window.location = './login.php';
                                }, 3000);

                            } else {
                                $("#toast").removeClass("toast align-items-center bg-success");
                                $("#toast").removeClass("toast align-items-center bg-danger");

                                $("#toast").addClass("toast align-items-center bg-warning")
                                $(".toast-body").html("Your Password is not matching with confirmation field");
                            }
                        }
                    });
                } else {
                    $("#toast").removeClass("toast align-items-center bg-success");
                    $("#toast").removeClass("toast align-items-center bg-warning");

                    $("#toast").addClass("toast align-items-center bg-danger")
                    $(".toast-body").html("Please Enter The Details");
                }
            });
        });
    </script>

    <!-- Toast msg Script  -->
    <script>
        const toastTrigger = document.getElementById('register-btn');
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