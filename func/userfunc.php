<?php
require_once('./config/dbconfig.php');
function redirect($url, $message)
{
    $_SESSION['status'] = $message;
    header("Location: $url");
    exit();
}

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status = 1";
    $result = mysqli_query($conn, $query);
    return $result;
}
function getOne($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id = $id AND status = 1";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getOneBySlug($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = 1 LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}
function getProduct($category_id)
{
    global $conn;
    $query = "SELECT * FROM products WHERE category_id = $category_id AND status = 1";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getCart($user_id)
{
    global $conn;
    $query = "SELECT * FROM carts WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    return $result;
}