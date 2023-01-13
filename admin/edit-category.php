<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Edit category</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $category = getOne('categories', $_GET['id']);
                        if (mysqli_num_rows($category) > 0) {
                            $data = mysqli_fetch_assoc($category);

                    ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Category name" value="<?= $data['name']; ?>">
                                        <input type="hidden"  name="id" id="id" value="<?= $data['id']; ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Category slug" value="<?= $data['slug']; ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="myImage" id="image" placeholder="upload image">
                                        <label class="form-label">Current image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                        <img src="../images/categories/<?= $data['image']; ?>" alt="" height="50px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="3"><?= $data['meta_description']; ?>
                                        </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_title" class="form-label">Meta tile</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Category meta title" value="<?= $data['meta_title']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_keyword" class="form-label">Meta keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Category meta keyword" value="<?= $data['meta_keyword']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="checkbox" class="" name="status" id="status" <?= $data['status'] == 1 ? 'checked' : '' ?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="popular" class="form-label">Popular</label>
                                        <input type="checkbox" class="" name="popular" id="popular" <?= $data['popular'] == 1 ? 'checked' : '' ?>>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="edit-cate-btn" class="btn btn-primary">Save</button>
                                        <a href="all-categories.php" class="btn btn-primary">Go back</a>
                                    </div>
                                </div>
                            </form>

                    <?php   } else {
                            echo "No data found <br>";
                            echo '<a href="all-categories.php" class="btn btn-primary">Go back</a>';
                        }
                    } else {
                        echo "Some thing went wrong";
                    } ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>