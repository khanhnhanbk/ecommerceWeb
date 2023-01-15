<?php
require_once('../config/dbconfig.php');
function redirect($url, $message)
{
    $_SESSION['status'] = $message;
    header("Location: $url");
    exit();
}

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}
function getOne($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return $result;
}
