<?php
session_start();
require_once('../config/dbconfig.php');

if (isset($_POST['new-cate-btn'])) {
    print_r($_POST);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }
    if (isset($_POST['popular'])) {
        $popular = 1;
    } else {
        $popular = 0;
    }

    // save image
    $target_dir = "../images/";
    $uploadOk = 1;
    $image = $_FILES['myImage']['name'];
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $target_file = time() . '.' . $imageFileType;



    $query = "INSERT INTO `categories`(`name`, `slug`, `description`, `image`, `meta_description`, `meta_title`, `meta_keyword`, `status`, `popular`) VALUES ('$name','$slug','$description','$target_file','$meta_description','$meta_title','$meta_keyword','$status','$popular')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($_FILES['myImage']['tmp_name'], $target_dir . $target_file);
        $_SESSION['success'] = "Category Added Successfully";
        header('location:index.php');
    } else {
        $_SESSION['error'] = "Something went wrong";
        header('location:index.php');
    }
} else if (isset($_POST['edit-cate-btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }
    if (isset($_POST['popular'])) {
        $popular = 1;
    } else {
        $popular = 0;
    }

    // save image
    $old_image = $_POST['old_image'];
    $target_dir = "../images/";
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
}
