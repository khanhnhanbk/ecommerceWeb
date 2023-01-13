<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Add new product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- category -->
                            <div class="col-md-12">
                                <label for="category" class="form-label">Category</label>
                                <?php
                                $category = getAll('categories');
                                ?>
                                <select class="form-control" name="category" id="category">
                                    <option selected>Category</option>
                                    <?php
                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $row) {
                                    ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
                                <input type="text" class="form-control" name="name" id="name" placeholder="Product name">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slud</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Product slug">
                            </div>
                            <!-- small_description -->
                            <div class="col-md-12">
                                <label for="small_description" class="form-label">Small Description</label>
                                <textarea class="form-control" name="small_description" id="small_description" rows="3"></textarea>
                            </div>
                            <!-- description -->
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                            <!-- original_price -->
                            <div class="col-md-4">
                                <label for="original_price" class="form-label">Original price</label>
                                <input type="number" class="form-control" name="original_price" id="original_price" placeholder="Original price">
                            </div>
                            <!-- selling_price -->
                            <div class="col-md-4">
                                <label for="selling_price" class="form-label">Selling price</label>
                                <input type="number" class="form-control" name="selling_price" id="selling_price" placeholder="Selling price">
                            </div>

                            <!-- quantity -->
                            <div class="col-md-4">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity">
                            </div>
                            <!-- image -->
                            <div class="col-md-12">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <!-- status -->
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <!-- trending -->
                            <div class="col-md-3">
                                <label for="trending" class="form-label">Trending</label>
                                <input type="checkbox" name="trending" id="trending">
                            </div>
                            <!-- meta_title -->
                            <div class="col-md-12">
                                <label for="meta_title" class="form-label">Meta title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta title">
                            </div>
                            <!-- meta_description -->
                            <div class="col-md-12">
                                <label for="meta_description" class="form-label">Meta description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description" rows="3"></textarea>
                            </div>
                            <!-- meta_keywords -->
                            <div class="col-md-12">
                                <label for="meta_keywords" class="form-label">Meta keywords</label>
                                <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="3"></textarea>
                            </div>
                            <!-- submit -->
                            <div class="col-md-12">
                                <button type="submit" name="add_product_btn" class="btn btn-primary">Add product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>