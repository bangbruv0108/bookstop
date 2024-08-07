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

    <!-- Box icon CDN  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- TableJS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

</head>

<body>
    <!-- sidebar start  -->
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <i class='bx bx-book-bookmark'></i>
                <div class="logo-name">Bookstop</div>
            </div>
            <!-- <i class='bx bx-menu' id="hamburger-btn"></i> -->
        </div>

        <li class="mt-3 my-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Category">
            <a href="./category.php">
                <i class='bx bx-category'></i>
                <span class="links-name">Categories</span>
            </a>
        </li>
        <li class="my-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Products">
            <a href="./product.php">
                <i class='bx bx-package'></i>
                <span class="links-name">Products</span>
            </a>
        </li>
        <li class="my-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Users">
            <a href="./users.php">
                <i class='bx bxs-user-rectangle'></i>
                <span class="links-name">Users</span>
            </a>
        </li>
        <li class="my-2 " data-bs-toggle="tooltip" data-bs-placement="right" title="Orders">
            <a href="#">
                <i class='bx bx-basket'></i>
                <span class="links-name">Orders </span>
            </a>
        </li>

    </div>

    <!-- sidebar end  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>