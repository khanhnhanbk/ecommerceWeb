<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Edit product</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($_GET['id'])) {
                        $category = getOne('products', $_GET['id']);
                        if (mysqli_num_rows($category) > 0) {
                            $data = mysqli_fetch_assoc($category);

                    ?>

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <!-- category -->
                                    <div class="col-md-12">
                                        <label for="category" class="form-label">Category</label>
                                        <?php
                                        $category = getAll('categories');
                                        ?>
                                        <select class="form-control" name="category" id="category">
                                            <option>Category</option>
                                            <?php
                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $row) {
                                            ?>
                                                    <option value="<?php echo $row['id']; ?>" <?php if ($data['category_id'] == $row['id']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $row['name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No record found";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Product name" value="<?= $data['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug" class="form-label">Slud</label>
                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Product slug" value="<?= $data['slug']; ?>">
                                    </div>
                                    <!-- small_description -->
                                    <div class="col-md-12">
                                        <label for="small_description" class="form-label">Small Description</label>
                                        <textarea class="form-control" name="small_description" id="small_description" rows="3"><?= $data['small_description']; ?>
                                        </textarea>
                                    </div>
                                    <!-- description -->
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"><?= $data['description'] ?></textarea>
                                    </div>
                                    <!-- original_price -->
                                    <div class="col-md-4">
                                        <label for="original_price" class="form-label">Original price</label>
                                        <input type="number" class="form-control" name="original_price" id="original_price" placeholder="Original price" value="<?= $data['original_price']; ?>">
                                    </div>
                                    <!-- selling_price -->
                                    <div class="col-md-4">
                                        <label for="selling_price" class="form-label">Selling price</label>
                                        <input type="number" class="form-control" name="selling_price" id="selling_price" placeholder="Selling price" value="<?= $data['selling_price'] ?>">
                                    </div>

                                    <!-- quantity -->
                                    <div class="col-md-4">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" value="<?= $data['qty'] ?>">
                                    </div>
                                    <!-- image -->
                                    <div class="col-md-12">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        <label class="form-label">Current image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">

                                        <img src="../images/products/<?= $data['image']; ?>" alt="" height="50px">
                                    </div>
                                    <!-- status -->
                                    <div class="col-md-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="checkbox" name="status" id="status" <?= $data['status'] == '1' ? 'checked' : '' ?>>
                                    </div>
                                    <!-- trending -->
                                    <div class="col-md-3">
                                        <label for="trending" class="form-label">Trending</label>
                                        <input type="checkbox" name="trending" id="trending" <?= $data['trending'] == '1' ? "checked" : "" ?>>
                                    </div>
                                    <!-- meta_title -->
                                    <div class="col-md-12">
                                        <label for="meta_title" class="form-label">Meta title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta title" value="<?= $data['meta_title']; ?>">
                                    </div>
                                    <!-- meta_description -->
                                    <div class="col-md-12">
                                        <label for="meta_description" class="form-label">Meta description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="3"><?=$data['meta_description'];?></textarea>
                                    </div>
                                    <!-- meta_keywords -->
                                    <div class="col-md-12">
                                        <label for="meta_keywords" class="form-label">Meta keywords</label>
                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="3"><?=$data['meta_keywords'];?></textarea>
                                    </div>
                                    <!-- submit -->
                                    <div class="col-md-12">
                                        <button type="submit" name="edit_product_btn" class="btn btn-primary">Save</button>
                                        <a href="all-products.php" class='btn btn-success'>Go back</a>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "No record found";
                        }
                    } else {
                        echo "Wrong url.";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>