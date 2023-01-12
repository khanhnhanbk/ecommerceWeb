<?php 
session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
   
}
else {
    header('Location: login.php');
    return;
}
include('includes/header.php'); 
?>
    <h2>Hello <?=$_SESSION['auth_user']['name'] ?></h2>

    <button class="btn btn-primary">Click me</button>
<?php include('includes/footer.php'); ?>