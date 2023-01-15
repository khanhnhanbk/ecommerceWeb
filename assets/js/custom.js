$(document).ready(function () {
  $(".increment-btn").click(function (e) {
    e.preventDefault();
    let input = $(this).parent().find(".qty-input").val();
    if (input < 10) input++;
    $(this).parent().find(".qty-input").val(input);
  });
  $(".decrement-btn").click(function (e) {
    e.preventDefault();
    let input = $(this).parent().find(".qty-input").val();
    if (input > 1) {
      input--;
    }
    $(this).parent().find(".qty-input").val(input);
  });

  $(".add-to-cart-btn").click(function (e) {
    e.preventDefault();

    let qty = $(this).closest(".product").find(".qty-input").val();
    let product_id = $(this).val();
    console.log(qty, product_id);
    $.ajax({
      url: "func/cart.php",
      type: "POST",
      data: {
        product_id: product_id,
        qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == "200") {
          alertify.success("Product added to cart");
        } else if (response == "300") {
          alertify.warning("Product already in cart");
        }
        else if (response == "401") {
          alertify.warning("Please login to add product to cart");
        }
        else if (response == "500") {
          alertify.warning("Internal Server Error");
        }
        else {
          alertify.warning("Something went wrong");
        }
      }
    });
  
  });

});
