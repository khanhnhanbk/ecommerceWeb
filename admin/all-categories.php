<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>All category</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase">ID</th>
                      <th class="text-uppercase ps-2">Name</th>
                      <th class="text-uppercase ps-2">Image</th>
                      <th class="text-uppercase">Status</th>
                      <th class="text-uppercase">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $data = getAll('categories'); 
                        if (mysqli_num_rows($data) > 0) {
                            foreach ($data as $key => $value) {
                                ?>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $value['id']; ?></p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $value['name']; ?></p>
                                    </td>
                                    <td>
                                        <img src="../images/<?php echo $value['image'];?>" class="ms-2 avatar" alt="apple">
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold"><?php echo $value['status']; ?></span>
                                    </td>
                                    <td>
                                        <a href="edit-category.php?id=<?=$value['id'];?>" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else {
                            ?>
                            <tr>
                                <td colspan="5">
                                    <p class="text-sm font-weight-bold mb-0">No data found</p>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                  
                  </tbody>
                </table>
              </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>