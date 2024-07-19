<?php include "header.php"; ?>

<!-- Widget Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title mb-4">Customer Information</h5>

                    <?php
                    // Fetch customer data from the signup table
                $customerEmail = $_SESSION['zama_customer_email'];
                $fetchCustomerQuery = "SELECT * FROM signup WHERE email = '$customerEmail'";
                $result = mysqli_query($link, $fetchCustomerQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $customer = mysqli_fetch_assoc($result);
                    ?>
                        <div class="text-center mb-4">
                            <?php
                            $imagePath = '../customer_profile/' . $customer['profile_image'];

                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 100%; height: auto;">';
                            } else {
                                echo '<p>Image not found</p>';
                            }
                            ?>
                        </div>

                        <div class="text-center">
                            <h6>UserName: <?php echo $customer['username']; ?></h6>
                            <p>Contact: <?php echo $customer['contact']; ?></p>
                            <p>Address: <?php echo $customer['address']; ?></p>
                        </div>
                    <?php
                    } else {
                        echo '<p>No customer found with the provided email.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Widget End -->

<?php include "footer.php"; ?>
