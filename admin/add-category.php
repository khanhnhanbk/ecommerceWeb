<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Add new category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Category name">
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Category slug">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="myImage" id="image" placeholder="upload image">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_title" class="form-label">Meta tile</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Category meta title">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keyword" class="form-label">Meta keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Category meta keyword">
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <input type="checkbox" class="" name="status" id="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular" class="form-label">Popular</label>
                                <input type="checkbox" class="" name="popular" id="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="new-cate-btn" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>