<?php
session_start();
include('includes/header.php');
require_once('./func/userfunc.php');

if (isset($_GET['category'])) {
    $slug = $_GET['category'];
    $category_data = getOneBySlug('categories', $slug);
    if (mysqli_num_rows($category_data) == 0) {
        echo "Some thing went wrong";
        return;
    } else {
        $category = mysqli_fetch_assoc($category_data);
        $products = getProduct($category['id']);
    }
?>
    <div class="py-5"></div>
    <div class="container">
        <h2 class="">
            <a href="index.php">Home</a><a href="category.php">/Categories</a>
            /<?=$_GET['category'];?></h2>
        <hr>
        <div class="row">
            <?php
            if (mysqli_num_rows($products) > 0) {
                foreach ($products as $product) {

            ?>
                    <div class="col-md-4">
                        <a class="" href="product-detail.php?product=<?= $product['slug']; ?>&category=<?=$_GET['category']?>">
                            <div class="card">
                                <div class="card-body">
                                    <img class=".card-img-top" src="./images/products/<?= $product['image']; ?>" width="100%">
                                </div>
                                <div class="card-footer">
                                    <h4 class="text-center"><?= $product['name'] ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>

    </div>
<?php
    include('includes/footer.php');
} ?>