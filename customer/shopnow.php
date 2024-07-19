<?php include "header.php"; ?>


<?php

        





?>

<?php
// Assuming $link is the database connection variable

// Initialize variables to store product information


// Check if the Buy Now button is clicked
if (isset($_POST["buy_now"])) {
    // Retrieve data from the form
    
    $name = $_POST["name"];
    $product = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $price = $_POST["price"];
    $image = $_POST["image"];


$loginUserEmail = $_SESSION["zama_customer_email"];


$loginUserEmail = $_SESSION["zama_customer_email"];
// select user id 

$queryS = "select * from signup where email = '$loginUserEmail'";

$runOK = mysqli_query($link, $queryS);

$fDaata = mysqli_fetch_array($runOK);

$user_id =  $fDaata["id"];




    // Step 1: Insert Order
    $insertOrderQuery = "INSERT INTO orders (name,user_id , product, price, quantity, address, contact, product_image, status) 
                         VALUES ('$name', '$user_id' ,'$product', '$price', '$quantity', '$address', '$contact', '$image', 'pending')";
    
    if (mysqli_query($link, $insertOrderQuery)) {
        // Insertion successful
        echo '<div class ="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Dear User!</strong> Youe order is conformed
        
        </div>';

        
    } else {
        // Insertion failed
        echo "Error: ". mysqli_error($link);
    }
} 
// else {
   // Fetch product information if not submitting the form
// if (isset($_GET['product_id'])) {
//     $product_id = $_GET['product_id'];

//     // Fetch product details from the database
//     $fetchProductQuery = "SELECT * FROM products WHERE product_id = '$product_id'";
//     $result = mysqli_query($link, $fetchProductQuery);

//     if ($result) {
//         // Check if any rows were returned
//         if (mysqli_num_rows($result) > 0) {
//             $row = mysqli_fetch_assoc($result);
//             $product_name = $row['product_name'];
//             $price = $row['price'];
//             $product_image = $row['product_image'];
//         } else {
//             echo "No product found with the provided ID.";
//         }
//     } else {
//         // Display the MySQL error if there's an issue with the query
//         echo "Error: " . mysqli_error($link);
//     }
// }
// }
?>

<?php
$Id=$_GET['buy_now'];
$query="select * from products where product_id='$Id'";
$x= mysqli_query($link, $query);
while($row=mysqli_fetch_array($x))
{

?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Order Form</h6>
                <form method="post" action="shopnow.php?buy_now=<?php echo $row["product_id"]; ?>" enctype="multipart/form-data">

                    <!-- Add hidden inputs for user_id and product_id -->

                    <!-- Display product information -->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['product_name']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                    </div>

                       <!-- Add hidden input for product image -->
                    <input type="hidden" name="image" value="<?php echo $row['product_image']; ?>">

                    <!-- Display product image -->
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image</label>
                        <img src="../admin/products_images/<?php echo $row['product_image']; ?>" alt="Product Image" class="img-fluid">
                    </div>


                    <!-- Add other form fields -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">name</label>
                        <input type="text" class="form-control" id="quantity" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>

                   

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="number" class="form-control" id="contact" name="contact">
                    </div>
<?php
}
?>

                        <input type="submit" name="buy_now" value="Buy Now" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
