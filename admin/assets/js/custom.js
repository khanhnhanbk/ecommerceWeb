$(document).ready(function () {
  $(document).on("click", ".btn-delete-product", function (e) {
    e.preventDefault();
    let id = $(this).val();
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //   post to code.php
        $.ajax({
          type: "POST",
          url: "code.php",
          data: {
            id: id,
            delete_product_btn: true,
          },
          success: function (response) {
            console.log(response);
            if (response == "200") {
              swal("Product Deleted Successfully!", {
                icon: "success",
              });
              $("#table-product").load(location.href + " #table-product");
            } else {
              swal("Something went wrong!", {
                icon: "error",
              });
            }
          },
        });
      }
    });
  });
  $(document).on("click", ".delete_category_btn", function (e) {
    e.preventDefault();
    let id = $(this).val();
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //   post to code.php
        $.ajax({
          type: "POST",
          url: "code.php",
          data: {
            id: id,
            delete_category_btn: true,
          },
          success: function (response) {
            console.log(response);
            if (response == "200") {
              swal("Category Deleted Successfully!", {
                icon: "success",
              });
              $("#table-category").load(location.href + " #table-category");
            } else {
              swal("Something went wrong!", {
                icon: "error",
              });
            }
          },
        });
      }
    });
  });
});
