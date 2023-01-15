<?php
session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
} else {
    header('Location: login.php');
    return;
}
include('includes/header.php');
require_once('./func/userfunc.php');
?>

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>

                </div>
                <?php
                $carts_data = getCart($_SESSION['auth_user']['user_id']);
                $total = 0;
                if (mysqli_num_rows($carts_data) > 0) {
                    foreach ($carts_data as $cart) {
                        $product_data = getOne('products', $cart['product_id']);
                        $product = mysqli_fetch_assoc($product_data);
                        $total += $product['selling_price'] * $cart['product_qty'];

                ?>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="images/products/<?php echo $product['image']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?= $product['name']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2 decrement-btn-cart" value="<?= $cart['product_id']; ?>">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <input disabled id="form1" min="0" name="quantity" value="<?= $cart['product_qty']; ?>" type="number" class="form-control form-control-sm qty-input" />

                                        <button class="btn btn-link px-2 increment-btn-cart" value="<?= $cart['product_id']; ?>">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">$<?= $product['selling_price']; ?></h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <button class="text-danger remove-from-cart-btn" style="border: none;" value="<?=$cart['product_id'];?>"><i class="fas fa-trash fa-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo '<h3 class="text-center">No Product in Cart</h3>';
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5 class="mb-0">Total</h5>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 text-end">
                            <h5 class="mb-0">$<?= $total; ?></h5>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center">

                            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>


<?php

include('includes/footer.php');

?>