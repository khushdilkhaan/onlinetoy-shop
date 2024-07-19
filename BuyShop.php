<?php include "header.php"; ?>

 

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <?php
    // Assume $link is the database connection variable
    $query = "SELECT * FROM products";
    $result = mysqli_query($link, $query);
    ?>

    <div class="container">
        <div class="heading_container heading_center">
            <h2>ALL Arrivals</h2>
        </div>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border border-primary">
                        <a class="text-decoration-none text-dark">
                            <img src="admin/products_images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
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
                                <!-- Add a "Buy" button with a link to the product page or checkout -->
                                <a href="buy.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Buy Now</a>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="btn-box mt-3">
            <a href="all_products.php" class="btn btn-secondary">View All Products</a>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>
