<?php
require_once "../func/helper.php";

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_user']['role_as'] == 1) {
    } else {
        redirect("../index.php", "You are not authorized to access this page");
        return;
    }
} else {
    redirect("../login.php", "Please login to access this page");
}
