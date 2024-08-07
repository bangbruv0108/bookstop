<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Client</title>
</head>

<body>
    
    <?php
    include "user-stuff.php";
    ?>
    <div class="wrapper">
        <?php
        include "client-sidebar.php";

        ?>
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
        <div class="container-fluid home-content">
            <div class="row poster">
                <p>BOOKSTOP</p>
                <p class="sent">a place to find peace of your mind</p>
            </div>
            <div class="card-area">
                <h3>Book List</h3>
                <div class=" row card-list d-flex cols-row-3 justify-content-around" id="card-list">


                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var catData = "";
            var cardData = "";
            // Displaying All Categories From CategoryTB in Sidebar 
            $.ajax({
                url: "display-cate-client.php",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    const category = data.data;
                    for (let key in category) {
                        catData += `<li class="my-2" onclick="get_items_by_category('${category[key].category}')">
                            <a href="#">
                            <i class='bx bxs-log-in-circle' ></i>
                            <span class="links-name" >${category[key].category} </span>
                            </a>
                        </li>`;

                    }
                    $(".sidebar-categories").html(catData);
                }
            });

            // Displaying All The items onLoad 
            $.ajax({
                url: "display-books.php",
                dataType: "JSON",
                type: "GET",
                success: function(data) {
                    const products = data.data;
                    for (let key in products) {
                        cardData += `<div class="card mb-5 p-3 col-4" style="max-width: 540px; min-width: auto; height:fit-content; font-family: 'Eczar', sans-serif; ">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src='../../Admin/html/image/${products[key].image}' class="img-fluid rounded card-image" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${products[key].name}</h5>
                                    <p class="card-text"> <span class="card-labels">Category: </span> ${products[key].category} </p>
                                    <p class="card-text"> <span class="card-labels">Description: </span> ${products[key].description.substr(0,50)}..</p>
                                    <p class="card-text" style="color:red"> <span class="card-labels">Rs. </span> ${products[key].price}</p>

                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                        <div class="col"><div class="btn atc-btn" onclick="addToCart(${products[key].id},'${products[key].name}','${products[key].category}','${products[key].price}','${products[key].image}')">Add To Cart</div></div>
                                <div class="col"><div class="btn atf-btn">Add To Favourite</div></div>
                        </div>
                    </div>`;

                    }
                    $("#card-list").html(cardData);

                },

            });


        });

        // Displaying Items by Clicking On Particular Category 
        function get_items_by_category(cat) {

            $.ajax({
                url: "display-catwise.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    category: cat
                },
                success: function(data) {
                    // if (data == 0) {
                    //     $("#toast").removeClass("toast align-items-center bg-success");
                    //     $("#toast").removeClass("toast align-items-center bg-danger");

                    //     $("#toast").addClass("toast align-items-center bg-warning")
                    //     $(".toast-body").html("Please Enter User Credentials");
                    // }
                    cardData = "";
                    const products = data.data;
                    for (let key in products) {
                        cardData += `<div class="card mb-5 p-3 col-4" style="max-width: 540px; height:fit-content; font-family: 'Eczar', sans-serif; ">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src='../../Admin/html/image/${products[key].image}' class="img-fluid rounded card-image" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${products[key].name}</h5>
                                    <p class="card-text"> <span class="card-labels">Category: </span> ${products[key].category} </p>
                                    <p class="card-text"> <span class="card-labels">Description: </span> ${products[key].description.substr(0,50)}..</p>
                                    <p class="card-text" style="color:red"> <span class="card-labels">Rs. </span> ${products[key].price}</p>

                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                                <div class="col"><div class="btn atc-btn" onclick="addToCart(${products[key].id},'${products[key].name}','${products[key].category}','${products[key].price}','${products[key].image}')">Add To Cart</div></div>
                                <div class="col"><div class="btn atf-btn">Add To Favourite</div></div>
                        </div>
                    </div>`;

                    }
                    $("#card-list").html("");
                    $("#card-list").html(cardData);

                },
            });
        }

        // Product Add To Cart API 
        function addToCart(pid, pname, pcategory, pprice, pimage) {
            $.ajax({
                url: "add-to-cart.php",
                type: "POST",
                data: {
                    pid: pid,
                    pname: pname,
                    pcategory: pcategory,
                    pprice: pprice,
                    pimage: pimage
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data == 1) {
                        alert("added to cart");
                    } else if (data == 2) {
                        alert("First you have to login");
                    } else {
                        alert("not able to add to cart");
                    }
                }
            });
        }
    </script>
    <!-- Toast msg Script  -->
    <script>
        const toastTrigger = document.getElementsByTagName('li');
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