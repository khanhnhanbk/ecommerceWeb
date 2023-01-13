<?php
session_start();
require_once('../config/dbconfig.php');

if (isset($_POST['add_category_btn'])) { # process add category
    # get data from form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    // save image
    $target_dir = "../images/categories/";
    $uploadOk = 1;
    $image = $_FILES['myImage']['name'];
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $target_file = time() . '.' . $imageFileType;


    # insert data to database
    $query = "INSERT INTO `categories`(`name`, `slug`, `description`, `image`, `meta_description`, `meta_title`, `meta_keyword`, `status`, `popular`) VALUES ('$name','$slug','$description','$target_file','$meta_description','$meta_title','$meta_keyword','$status','$popular')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($_FILES['myImage']['tmp_name'], $target_dir . $target_file);
        $_SESSION['success'] = "Category Added Successfully";
        header('location:all-categories.php');
    } else {
        $_SESSION['error'] = "Something went wrong";
        header('location:all-categories.php');
    }
} else if (isset($_POST['edit_category_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    // save image
    $old_image = $_POST['old_image'];
    $target_dir = "../images/categories/";
    $uploadOk = 1;
    $image = $_FILES['myImage']['name'];

    if ($image == '') {
        $target_file = $old_image;
    } else {
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $target_file = time() . '.' . $imageFileType;
    }

    $query = "UPDATE `categories` SET `name`='$name',`slug`='$slug',`description`='$description',`image`='$target_file',`meta_description`='$meta_description',`meta_title`='$meta_title',`meta_keyword`='$meta_keyword',`status`='$status',`popular`='$popular' WHERE id = " . $_POST['id'];
    $result = mysqli_query($conn, $query);
    if ($result) {
        if ($image != '') {
            unlink($target_dir . $old_image);
            move_uploaded_file($_FILES['myImage']['tmp_name'], $target_dir . $target_file);
        }
        $_SESSION['success'] = "Edit successfully";
        header('location: edit-category.php?id=' . $_POST['id']);
    } else {
        $_SESSION['success'] = "Something went wrong";
        header('location:index.php');
    }
} else if (isset($_POST['delete_category_btn'])) {
    $category = mysqli_query($conn, "SELECT * FROM `categories` WHERE id = " . $_POST['id']);
    $data = mysqli_fetch_assoc($category);
    $target_dir = "../images/categories/";
    $old_image = $data['image'];


    $query = "DELETE FROM `categories` WHERE id = " . $_POST['id'];
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (file_exists($target_dir . $old_image)) {
            unlink($target_dir . $old_image);
        }
        echo 200;
    } else {
        echo 500;
    }
} else if (isset($_POST['add_product_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $small_description = mysqli_real_escape_string($conn, $_POST['small_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keywords']);
    $original_price = mysqli_real_escape_string($conn, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($conn, $_POST['selling_price']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $status = isset($_POST['status']) ? 1 : 0;
    $trending = isset($_POST['trending']) ? 1 : 0;

    // save image
    $target_dir = "../images/products/";
    $uploadOk = 1;
    $image = $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $target_file = time() . '.' . $imageFileType;

    # insert data to database
    $query = "INSERT INTO `products`(`category_id`, `name`, `slug`, `small_description`, `description`, `meta_description`, `meta_title`, `meta_keywords`, `original_price`, `selling_price`, `qty`, `image`, `status`, `trending`) VALUES ('$category_id','$name','$slug','$small_description','$description','$meta_description','$meta_title','$meta_keyword','$original_price','$selling_price','$qty','$target_file','$status','$trending')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $target_file);
        $_SESSION['success'] = "Product Added Successfully";
        header('location:all-products.php');
    } else {
        $_SESSION['error'] = "Something went wrong";
        header('location:all-products.php');
    }
} else if (isset($_POST['delete_product_btn'])) {
    $product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = " . $_POST['id']);

    $data = mysqli_fetch_assoc($product);
    $old_image = $data['image'];


    $query = "DELETE FROM `products` WHERE id = " . $_POST['id'];
    $result = mysqli_query($conn, $query);
    $target_dir = "../images/products/";

    if ($result) {
        if (file_exists($target_dir . $old_image)) {
            unlink($target_dir . $old_image);
        }
        echo 200;
    } else {
        echo 500;
    }
} else if (isset($_POST['edit_product_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $small_description = mysqli_real_escape_string($conn, $_POST['small_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keywords']);
    $original_price = mysqli_real_escape_string($conn, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($conn, $_POST['selling_price']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $status = isset($_POST['status']) ? 1 : 0;
    $trending = isset($_POST['trending']) ? 1 : 0;

    // save image
    $old_image = $_POST['old_image'];
    $target_dir = "../images/products/";
    $uploadOk = 1;
    $image = $_FILES['image']['name'];

    if ($image == '') {
        $target_file = $old_image;
    } else {
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $target_file = time() . '.' . $imageFileType;
    }

    $query = "UPDATE `products` SET `category_id`='$category_id',`name`='$name',`slug`='$slug',`small_description`='$small_description',`description`='$description',`meta_description`='$meta_description',`meta_title`='$meta_title',`meta_keywords`='$meta_keyword',`original_price`='$original_price',`selling_price`='$selling_price',`qty`='$qty',`image`='$target_file',`status`='$status',`trending`='$trending' WHERE id = " . $_POST['id'];
    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($image != '') {
            if (file_exists($target_dir . $old_image)) {
                unlink($target_dir . $old_image);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $target_file);
        }

        $_SESSION['success'] = "Product Updated Successfully";
        header('location:edit-product.php' . '?id=' . $_POST['id']);
    } else {
        $_SESSION['error'] = "Something went wrong";
        header('location:edit-product.php' . '?id=' . $_POST['id']);
    }
}
