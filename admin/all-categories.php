<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>All category</h4>
                    <a href="add-category.php" class="btn btn-primary float-end">Add new category</a>
                </div>
                <div class="card-body" id="table-category">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">ID</th>
                                    <th class="text-uppercase ps-2">Name</th>
                                    <th class="text-uppercase ps-2">Image</th>
                                    <th class="text-uppercase">Status</th>
                                    <th class="text-uppercase">Edit</th>
                                    <th class="text-uppercase">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data = getAll('categories');
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
                                                <img src="../images/categories/<?php echo $value['image']; ?>" class="ms-2 avatar" alt="apple">
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold"><?php echo $value['status']; ?></span>
                                            </td>
                                            <td>
                                                <a href="edit-category.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a>
                                                <!-- <form action="code.php" method="post">
                                            <input type="hidden" name="old_image" value="<?= $value['image']; ?>">
                                            <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                            <button type="submit" name="delete_category_btn" class="btn btn-danger">Delete</button>
                                        </form> -->
                                            </td>
                                            <td>
                                                <button class="btn btn-danger delete_category_btn" value="<?= $value['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <p class="text-sm font-weight-bold mb-0">No data found</p>
                                        </td>
                                    </tr>
                                <?php
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