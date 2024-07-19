<?php include "header.php"; ?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product Table</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        
                        <form method="post" action="upddel.php" enctype="multipart/form-data">


                        <?php 
if(isset($_GET["del_id"])){
    $del_id = $_GET["del_id"];
    $path = "products_images/";
    
    $select_img = "SELECT * FROM products WHERE product_id = '$del_id'";
    $run02 = mysqli_query($link, $select_img);
    $fetch_image02 = mysqli_fetch_array($run02);
    
    $img_name_ori = $fetch_image02["product_image"];
    
    $query02 = "DELETE FROM products WHERE product_id = '$del_id'";

    if (mysqli_query($link, $query02) && unlink("$path/$img_name_ori")) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>CONGRATS!</strong> DATA DELETED SUCCESFFULLY.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo "ERROR: " . mysqli_error($link);
    }
}
?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th class="serial">#</th> -->
                                    <th>ID</th>
                                    <th class="avatar">Product Image</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Price</th>
                                    <th>Quantity Available</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assume $link is the database connection variable
                                $query = "SELECT * FROM products";
                                $result = mysqli_query($link, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                       
                                        
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td class="avatar">
                                            <img class="rounded-circle" src="products_images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>">
                                        </td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_details']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['quantity_available']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td>
                                            <!-- Update Button -->
                                            <a href="process_update.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-success btn-sm">Update</a>

                                            <!-- Delete Button -->
                                            <a href="upddel.php?del_id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </form>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php include "footer.php"; ?>
