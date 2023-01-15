<?php
session_start();
require_once "../config/dbconfig.php";

if (isset($_SESSION['auth']))
{
  if (isset($_POST['scope']))
  {
    $scope = $_POST['scope'];
   if ($scope == "add")
   {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['qty'];
    $user_id = $_SESSION['auth_user']['user_id'];

    // Check if product already exists in cart
    $check_product_query = "SELECT * FROM carts WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $check_product_query_run = mysqli_query($conn, $check_product_query);

    if (mysqli_num_rows($check_product_query_run) > 0)
    {
      echo 300;
      exit();
    }

    $add_to_cart_query = "INSERT INTO carts (product_id, product_qty, user_id) VALUES ('$product_id', '$quantity', '$user_id')";
    $add_to_cart_query_run = mysqli_query($conn, $add_to_cart_query);
    if ($add_to_cart_query_run)
    {
      echo 200;
    }
    else
    {
      echo 500;
    }
   }
  }
}
else
{
  echo  401;
}