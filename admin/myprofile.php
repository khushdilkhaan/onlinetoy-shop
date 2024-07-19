<?php include "header.php"; ?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <?php
            // Assuming $link is the database connection variable

            // Fetch admin data from the database based on the role
            $fetchAdminQuery = "SELECT * FROM signup WHERE role = 'admin' LIMIT 1"; // Ensure only one admin is retrieved
            $result = mysqli_query($link, $fetchAdminQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                $admin = mysqli_fetch_assoc($result);
                // Construct the path to the profile image
                $imagePath = '../customer_profile/' . $admin['profile_image'];
            ?>
                <div class="col-lg-8">
                    <section class="card">
                        <div class="twt-feed blue-bg p-4">
                            
                            

                            <div class="media">
                                
                                    <img class="align-self-center rounded-circle mr-3" style="width:140px; height:140px;" alt="" src="<?php echo $imagePath; ?>">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-white display-6">Admin name: <?php echo $admin['username']; ?></h2>
                                    <p class="text-light">Address: <?php echo $admin['address']; ?></p>
                                    <p class="text-light">Contact: <?php echo $admin['contact']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            <?php
            } else {
                echo '<p>No admin data found.</p>';
            }
            ?>
        </div><!-- .row -->
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include "footer.php"; ?>
