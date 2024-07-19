<?php include "header.php"; ?>

<?php
// Assuming $link is the database connection variable

// Check if the Buy Now button is clicked
if (isset($_GET['buy_now']) && isset($_SESSION['user_id'])) {
    $product_id = $_GET['buy_now'];
    $user_id = $_SESSION['user_id'];

    // Step 1: Redirect to Shop Now page with necessary parameters
    header("Location: shopnow.php?product_id=$product_id&user_id=$user_id");
    exit();
}
?>

<!-- Display Products -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <?php
        // Assume $link is the database connection variable
        $query = "SELECT * FROM products";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Display Product Card -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border border-primary">
                    <a class="text-decoration-none text-dark">
                        <img src="../admin/products_images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title mb-2">
                                <a href="" class="text-dark"><?php echo $row['product_name']; ?></a>
                            </h5>
                            <p class="card-text mb-1">Details: <?php echo $row['product_details']; ?></p>
                            <p class="card-text mb-1">Category: <?php echo $row['category']; ?></p>
                            <p class="card-text mb-3">Available Quantity: <?php echo $row['quantity_available']; ?></p>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Price $<?php echo $row['price']; ?>
                            </h6>
                            <!-- Add a "Buy" button with a link to the Shop Now page -->
                            <a href="shopnow.php?buy_now=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Buy Now</a>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Cards End -->

<?php include "footer.php"; ?>
