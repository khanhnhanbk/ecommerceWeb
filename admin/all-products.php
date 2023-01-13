<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>All Products</h4>
                    <!-- add product button -->
                    <a href="add-product.php" class="btn btn-primary float-end">Add new product</a>
                </div>
                <div class="card-body" id="table-product">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">ID</th>
                                    <th class="text-uppercase ps-2">Name</th>
                                    <th class="text-uppercase ps-2">Image</th>
                                    <th class="text-uppercase">Price</th>
                                    <th class="text-uppercase">Category</th>
                                    <th class="text-uppercase">Status</th>
                                    <th class="text-uppercase">Edit</th>
                                    <th class="text-uppercase">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data = getAll('products');
                                if (mysqli_num_rows($data) > 0) {
                                    foreach ($data as $key => $value) {
                                ?>
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?php echo $value['id']; ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?php echo $value['name']; ?></p>
                                            </td>
                                            <td>
                                                <img src="../images/products/<?php echo $value['image']; ?>" class="ms-2 avatar" alt="apple">
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold"><?php echo $value['original_price']; ?></span>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold"><?php
                                                                                        $category = getOne('categories', $value['category_id']);
                                                                                        $data = mysqli_fetch_assoc($category);
                                                                                        echo $data['name']; ?></span>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold"><?php echo $value['status']; ?></span>
                                            </td>
                                            <td>
                                                <a href="edit-product.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a>
                                                <!-- <form action="code.php" method="post">
                                                    <input type="hidden" name="old_image" value="<?= $value['image']; ?>">
                                                    <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                                    <button type="submit" name="delete_product_btn" class="btn btn-danger">Delete</button>
                                                </form> -->
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-delete-product" value="<?= $value['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>