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

  $(".decrement-btn-cart").click(function (e) {
    e.preventDefault();
    let input = $(this).parent().find(".qty-input").val();
    if (input > 1) {
      input--;
    }
    $(this).parent().find(".qty-input").val(input);
    let product_id = $(this).val();
    console.log({ input, product_id });
    $.ajax({
      url: "func/cart.php",
      type: "POST",
      data: {
        product_id: product_id,
        qty: input,
        scope: "update",
      },
      success: function (response) {
        if (response == "200") {
          alertify.success("Product updated in cart");
        } else if (response == "300") {
          alertify.warning("Product already in cart");
        } else if (response == "401") {
          alertify.warning("Please login to add product to cart");
        } else if (response == "500") {
          alertify.warning("Internal Server Error");
        } else {
          alertify.warning("Something went wrong");
        }
      },
    });
  });
  $(".increment-btn-cart").click(function (e) {
    e.preventDefault();
    let input = $(this).parent().find(".qty-input").val();
    if (input < 10) input++;
    $(this).parent().find(".qty-input").val(input);
    let product_id = $(this).val();
    console.log({ input, product_id });
    $.ajax({
      url: "func/cart.php",
      type: "POST",
      data: {
        product_id: product_id,
        qty: input,
        scope: "update",
      },
      success: function (response) {
        if (response == "200") {
          alertify.success("Product updated in cart");
        } else if (response == "300") {
          alertify.warning("Product already in cart");
        } else if (response == "401") {
          alertify.warning("Please login to add product to cart");
        } else if (response == "500") {
          alertify.warning("Internal Server Error");
        } else {
          alertify.warning("Something went wrong");
        }
      },
    });
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
        } else if (response == "401") {
          alertify.warning("Please login to add product to cart");
        } else if (response == "500") {
          alertify.warning("Internal Server Error");
        } else {
          alertify.warning("Something went wrong");
        }
      },
    });
  });

  $(".remove-from-cart-btn").click(function (e) {
    e.preventDefault();
    let product_id = $(this).val();
    console.log(product_id);
    $.ajax({
      url: "func/cart.php",
      type: "POST",
      data: {
        product_id: product_id,
        scope: "remove",
      },
      success: function (response) {
        if (response == "200") {
          alertify.success("Product removed from cart");
          location.reload();
        } else if (response == "300") {
          alertify.warning("Product not in cart");
        } else if (response == "401") {
          alertify.warning("Please login to add product to cart");
        } else if (response == "500") {
          alertify.warning("Internal Server Error");
        } else {
          alertify.warning("Something went wrong");
        }
      },
    });
  });
});
