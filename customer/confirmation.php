<?php include "header.php"; ?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Order Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php






                                            $loginUserEmail = $_SESSION["zama_customer_email"];
                                            // select user id 

                                            $queryS = "select * from signup where email = '$loginUserEmail'";

                                            $runOK = mysqli_query($link, $queryS);

                                            $fDaata = mysqli_fetch_array($runOK);

                                            $user_id =  $fDaata["id"];





                            // Fetch orders from the database
                            $fetchOrdersQuery = "SELECT * FROM orders where user_id = '$user_id'";
                            $result = mysqli_query($link, $fetchOrdersQuery);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($order = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td><?php echo $order['name']; ?></td>
                                        <td><?php echo $order['quantity']; ?></td>
                                        <td><?php echo $order['product']; ?></td>
                                        <td><?php echo $order['price']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td>
                                        <img src="../admin/products_images/<?php echo $order['product_image']; ?>" alt="Product Image" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                              </td>

                                        <td><?php echo $order['address']; ?></td>
                                        <td><?php echo $order['contact']; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="9">No orders found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->

<?php include "footer.php"; ?>
