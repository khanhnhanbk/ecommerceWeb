<?php
session_start();
include('includes/header.php');
require_once('./func/userfunc.php');
?>
<div class="py-5"></div>
<div class="container">
    <h2 class=""><a href="index.php">Home</a>/Categories</h2>
    <hr>
    <div class="row">
        <?php $categories = getAll('categories');
        if (mysqli_num_rows($categories) > 0) {
            while ($category = mysqli_fetch_assoc($categories)) {

        ?>
                <div class="col-md-4">
                    <a class="" href="product.php?category=<?= $category['slug'] ?>">
                        <div class="card">
                            <div class="card-body">
                                <img class=".card-img-top" src="./images/categories/<?= $category['image']; ?>" width="100%">
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center"><?= $category['name'] ?></h4>
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
<?php include('includes/footer.php'); ?>