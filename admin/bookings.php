<?php include "header.php"; ?>




<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Order Table</strong>
                    </div>


                    <?php
// Your existing code...

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Check which button was clicked
    if (isset($_POST['approve'])) {
        // Update order status to 'approved'
        mysqli_query($link, "UPDATE orders SET status = 'approved' WHERE order_id = $orderId");
    } elseif (isset($_POST['reject'])) {
        // Update order status to 'rejected'
        mysqli_query($link, "UPDATE orders SET status = 'reject' WHERE order_id = $orderId");
    }
}

// Fetch orders from the database
$fetchOrdersQuery = "SELECT * FROM orders";
$result = mysqli_query($link, $fetchOrdersQuery);

// Your existing code to display orders...
?>


                    <div class="table-stats order-table ov-h">
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch orders from the database
                                $fetchOrdersQuery = "SELECT * FROM orders";
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
                                            <img src="products_images/<?php echo $order['product_image']; ?>" alt="Product Image" class="img-fluid"
                                            style="max-width: 100px; max-height: 100px;"></td>

                                            <td><?php echo $order['address']; ?></td>
                                            <td><?php echo $order['contact']; ?></td>
                                            <td>
                                            
                                            <form method="post" class="status-form">
                                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                            </form>
    

                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="10">No orders found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include "footer.php"; ?>
