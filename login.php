<?php
session_start();
include('includes/header.php');
?>


<div class="py-5">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['status'] ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <?php
                if (isset($_SESSION['success'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success'] ?>.
                    </div>
                <?php
                    unset($_SESSION['success']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="func/authcode.php" method="POST">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password">
                            </div>

                            <button type="submit" name="login-btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>