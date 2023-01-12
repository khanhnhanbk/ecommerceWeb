<?php 
session_start();
include('includes/header.php'); 

?>
<div class="py-5">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['status']))
                {
                    ?>                
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?=$_SESSION['status'] ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="func/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPass" id="confirmPass" placeholder="Confirm password">
                            </div>

                            <button type="submit" name="regis_btn" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>