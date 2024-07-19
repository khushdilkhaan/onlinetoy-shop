
<?php include "header.php"; ?>
<?php
if (isset($_GET["product_id"])) {
    $update_id  = $_GET["product_id"];
    $querySelect = "SELECT * FROM products WHERE product_id = '$update_id'";
    $queryRun = mysqli_query($link, $querySelect);

    if ($queryRun) {
        $exe_Query = mysqli_fetch_array($queryRun);

        // Your HTML form for update
        ?>
        <div class="container mt-5">

        <?php

if (isset($_POST["submit"]) && isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $product_name = $_POST["product_name"];
    $product_details = $_POST["product_details"];
    $price = $_POST["price"];
    $quantity_available = $_POST["quantity_available"];
    $category = $_POST["category"];

    // Check if a new image is selected
    $new_image = $_FILES["product_image"]["name"];
    $target_directory = "products_images/";

    // Update query
    $update_query = "UPDATE products SET 
        product_name = '$product_name',
        product_details = '$product_details',
        price = '$price',
        quantity_available = '$quantity_available',
        category = '$category'";

    // Include the image update if a new image is provided
    if (!empty($new_image)) {
        // Include code for handling the new image
        $update_query .= ", product_image = '$new_image'";

        // Move the uploaded file to the desired directory
        $target_file = $target_directory . basename($new_image);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Image upload successful
        } else {
            // Handle image upload failure
            echo "Error uploading image.";
            exit(); // Exit the script if image upload fails
        }
    }

    $update_query .= " WHERE product_id = '$product_id'";

    // Execute the update query
    if (mysqli_query($link, $update_query)) {
        // Handle success (e.g., redirect to product table)
        header("Location: upddel.php");
        exit();
    } else {
        // Handle error
        echo "Error updating record: " . mysqli_error($link);
    }
} 


?>

<div class="container mt-5">
            <form action="process_update.php?product_id=<?php echo $update_id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $update_id; ?>">

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name:</label>
                    <input type="text" name="product_name" class="form-control" value="<?php echo $exe_Query['product_name']; ?>">
                </div>

                <div class="mb-3">
                    <label for="product_details" class="form-label">Product Details:</label>
                    <textarea name="product_details" class="form-control"><?php echo $exe_Query['product_details']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $exe_Query['price']; ?>">
                </div>

                <div class="mb-3">
                    <label for="quantity_available" class="form-label">Quantity Available:</label>
                    <input type="text" name="quantity_available" class="form-control" value="<?php echo $exe_Query['quantity_available']; ?>">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <input type="text" name="category" class="form-control" value="<?php echo $exe_Query['category']; ?>">
                </div>

                <div class="mb-3">
                    <label for="product_image" class="form-label">Old Product Image:</label>
                    <img src="products_images/<?php echo $exe_Query['product_image']; ?>" alt="Old Image" class="img-thumbnail">
                </div>

                <div class="mb-3">
                    <label for="product_image" class="form-label">New Product Image:</label>
                    <input type="file" name="product_image" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    <?php
    } else {
        echo "Error fetching record: " . mysqli_error($link);
    }
} else {
    echo "Product ID not provided.";
}

?>

<?php include "footer.php"; ?>
