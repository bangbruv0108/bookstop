<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- css plugins -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=Eczar:wght@500;600&display=swap" rel="stylesheet">

    <!-- Box icon CDN  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- TableJS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    
</head>

<body>
    <div class="user-stuff-bar d-flex justify-items-center">
        <a id="home">
            <i class='bx bx-home bx-sm bx-tada-hover'></i>
            <span class="links-name"></span>
        </a>
        <a id="cart">
            <i class='bx bx-cart bx-sm bx-tada-hover'></i>
            <span class="links-name"></span>
        </a>
        <a id="fav">
            <i class='bx bx-heart bx-sm bx-tada-hover'></i>
            <span class="links-name"></span>
        </a>
        <a id="logout">
            <i class='bx bx-log-out bx-sm bx-tada-hover'></i>
            <span class="links-name"></span>
        </a>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("#home").on('click', function(){
                window.location.href = "index.php";
            });
            $("#cart").on('click', function(){
                window.location.href = "cart.php";
            });
            $("#fav").on('click', function(){
                window.location.href = "";
            });
            $("#logout").on('click', function(){
                window.location.href = "../../login.php";
            });
        });
    </script>
</body>

</html>