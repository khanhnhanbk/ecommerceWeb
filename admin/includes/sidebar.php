<?php
$page = basename($_SERVER['PHP_SELF']);

?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="index.php" >
            <span class="ms-1 font-weight-bold text-white">PHP web</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white <?=$page == "index.php" ? "active bg-gradient-primary":"";?>" href="index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <!-- category -->
            <li class="nav-item">
                <a class="nav-link text-white <?=$page == "all-categories.php" ? "active bg-gradient-primary":"";?> " href="all-categories.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">All categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?=$page == "add-category.php" ? "active bg-gradient-primary":"";?>" href="add-category.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">Add new category</span>
                </a>
            </li>
              <!-- product -->
              <li class="nav-item">
                <a class="nav-link text-white <?=$page == "all-products.php" ? "active bg-gradient-primary":"";?> " href="all-products.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">All products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?=$page == "add-product.php" ? "active bg-gradient-primary":"";?>" href="add-product.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">Add new product</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100"
             href="../logout.php" type="button">Log out</a>
        </div>
    </div>
</aside>