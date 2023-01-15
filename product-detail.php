<?php
session_start();
include('includes/header.php');
require_once('./func/userfunc.php');

if (isset($_GET['product'])) {
    $slug = $_GET['product'];
    $product_data = getOneBySlug('products', $slug);
    if (mysqli_num_rows($product_data) == 0) {
        echo "Some thing went wrong";
        return;
    } else {
        $product = mysqli_fetch_assoc($product_data);

?>
        <div class="container mt-5 mb-5 product-card">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="./images/products/<?= $product['image']; ?>" width="250" /> </div>
                                    <!-- <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="product.php?category=<?= $_GET['category'] ?>">
                                            <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div>
                                        </a>
                                        <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"></span>
                                        <h5 class="text-uppercase"><?= $product['name']; ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?= $product['original_price']; ?></span>
                                            <div class="ml-2"> <small class="dis-price"><?= $product['selling_price']; ?></small></div>
                                        </div>
                                    </div>
                                    <p class="about"><?= $product['description']; ?></p>
                                    <!-- quantity -->

                                    <div class="input-group mb-3" style="width:140px;">
                                        <button class="input-group-text btn btn-primary decrement-btn">-</button>
                                        <input type="number" class="form-control text-center qty-input" disabled value="1">
                                        <button class="input-group-text btn btn-primary increment-btn">+</button>
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <button class="btn btn-danger text-uppercase mr-2 px-4 add-to-cart-btn" value="<?= $product['id']; ?>">Add to cart</button>
                                        <i class="fa fa-heart text-muted"></i>
                                        <i class="fa fa-share-alt text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

        include('includes/footer.php');
    }
} ?>