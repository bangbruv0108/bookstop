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
    <div class="container-fluid">
      <div class="container cartproducts my-4">
        
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
    
    displayCart();
      
    });
    function displayCart(){
      var cartData = "";
      $.ajax({
        url: "display-cart.php",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          if(data == 0){
            cartData+= `<div class="" align="center">
          <img src="../images/doodle.png"  alt="cart is empty" srcset="">
                <p>Looks like ur cart is empty pal!</p>
        </div>`;
            $(".cartproducts").html(cartData);
          }
          const products = data.data;
          for (let key in products) {
            cartData += `<div class="d-flex product-bar p-3 my-4">
                <div class="flex-shrink-0">
                  <img src='../../Admin/html/image/${products[key].product_image}' class="flex-shrink-0 img-fluid rounded card-image me-3" alt="...">
                </div>
                <div class="flex-grow-0 ms-3">
                <h5 class="mt-0"> <span>Product ID: </span> ${products[key].productid}</h5>
                <p><span> Name: </span>${products[key].product_name}</p>
                <p><span> Category: </span>${products[key].product_category}</p>
                <p><span> Price: </span>${products[key].product_price}</p>  
                </div>

                <div class="ms-3" align="right">
                <div class="btn btn-success w-50" onclick="placeOrder(${products[key].productid},'${products[key].product_name}', '${products[key].product_category}','${products[key].product_price}','${products[key].product_image}')" >Place Order</div> 
                <div class="btn btn-danger my-1 w-50" onclick="removeFromCart(${products[key].oid})" >Delete</div>
                  <input type="number" class="form-control my-2 w-50" placeholder="Quantity" aria-label="First name">

                
                </div>
              </div>`;

          }
          $(".cartproducts").html(cartData);
        }
      });
    }
    function placeOrder(pid, pname, pcat, pprice, pimg) {
        console.log("blah blah");
        $.ajax({
          url: "add-to-order.php",
          type: "POST",
          dataType: "JSON",
          data: {
            pid: pid,
            pname: pname,
            pcat: pcat,
            pprice: pprice,
            pimg: pimg,
          },
          
          success: function(data) {
            if (data == 1) {
              alert("added to cart");
            } else {
              alert("not able to add");
            }
          }
        });
      }

      function removeFromCart(oid){
        $.ajax({
          url: "delete-from-cart.php",
          type: "POST",
          data:{oid:oid},
          dataType: "JSON",
          success:function(data){
            if(data == 1){
              alert("Item Removed from cart");
              displayCart();
            }
            else{
              alert("Something Went wrong");
            }
          }
        });
      } 
  </script>
</body>

</html>

